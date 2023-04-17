<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Backendcommon {
	//initializing public data variable for class
	public $data = '';
    function __construct() {
        parent::__construct();	
        //I.E Fix: Holds SESSION accross the DOMAIN
        header('P3P: CP="CAO PSA OUR"');
       $this->isLoggedIn();	
        //------------ Model Functions <Start>-----------------//	
        //------------ Model Functions <End>-----------------//	
        	
        //------------ Libraries <Start> -----------------//
		//------------ Libraries <End> -----------------//
		
		//------------ XAJAX <Start> -----------------//
		$this->xajax->configure('javascript URI',base_url().'xajax' );
		$this->xajax->processRequest();
		$this->xajax_js = $this->xajax->getJavascript( base_url() ); 	
		//------------ XAJAX <End> -----------------//
        $this->output->enable_profiler(false);
        
         //------------ Common Function <Start> -----------------//
        $this->commonFunction();
        //------------ Common Function <End> -----------------//
		//------------ Class Common Values <Start> -----------------//
		$this->data['module'] = "06";	
		$this->data['moduleName'] = "Settings";
		$this->data['topModuleName'] = "Talent";
		$this->data['topModuleLink'] = BACKEND_SETTINGS_URL;
		$this->data['page'] = 'settings';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: editSettingsAjax
	02: fileUploadAjax
	03: deleteFileAjax
	04: changeFileStatusAjax
	05: updateGeneralSettings
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 01: editSettingsAjax
	*
	* This function is used to update image upload limit
	*
	*/
	public function editSettingsAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$image_upload_limit = $param['image_upload_limit'];
			$qResponse = $this->settings_model->changeSettings($image_upload_limit);
			$url = BACKEND_SETTINGS_URL;
			$objResponse->script( "showModal('Settings Updated Successfully','Settings','".$url."')" );
		}
		return $objResponse ;
	}
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	* 02: fileUploadAjax
	*
	* This function is used to upload sample videos
	*
	*/
	public function fileUploadAjax(){
		//pr($_FILES); die();
		if (!empty($_FILES)) {
			$user_id = $this->session->userdata('wowzer_admin_id');
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			//$fileType = $_FILES['file']['type'];
			$fileType = 2;
			$fileSize = round(($_FILES['file']['size']/1024/1024),2);
			$config['upload_path'] = ASSET_BACKEND_UPLOADS_PATH."samples/videos";
			$config['allowed_types'] = 'mp4';
			$config['max_size']	= '0';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('file')) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 2;
				$response['status'] = $status;
				$response['response'] = $msg;
				echo json_encode($response);
				die();					
			}else {
				$data = array('upload_data' => $this->upload->data());
			}
			//validate image
			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
			if($data['upload_data']){
				$id = $this->settings_model->uploadFiles($user_id,$file_name,$fileSize,$fileType);
				$images = $this->settings_model->getLastFileAdded($id);
				echo json_encode($images);
				die();
			}
        }
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 03: deleteFileAjax
	*
	* This function is used to delete sample videos
	*
	*/
	public function deleteFileAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		
		$file_id = (isset($param['file_id']) && $param['file_id']!="")?$param['file_id']:0;
		$status = $param['status'];
		// Changing user status in DB
		$delete_response = $this->settings_model->changeFileStatus($file_id,$status);
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 04: changeFileStatusAjax
	*
	* This function is used to change status of the sample video
	*
	*/
	public function changeFileStatusAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		
		$file_id = (isset($param['file_id']) && $param['file_id']!="")?$param['file_id']:0;
		$status = $param['status'];
		// Changing user status in DB
		$delete_response = $this->settings_model->changeFileStatus($file_id,$status);
		if($delete_response){
			$objResponse->script( "window.location.reload();");	
		}
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 05: updateGeneralSettings
	*
	* This function is used to update general settings
	*
	*/
	public function updateGeneralSettings($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		
		$social_links = $param['social_links'];
		// Changing user status in DB
		$delete_response = $this->page_model->updateSocialLinks($social_links);
		if($delete_response){
			$objResponse->script( "window.location.reload();");	
		}
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <End>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	//FUNCTIONS LIST:
	//01: index
	//02: talent_settings
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: index
	 *
	 * This function is used to show edit view of the general settings 
	 */
    public function index() {
        $this->data['moduleLink'] = BACKEND_SETTINGS_URL;
		$this->data['topModuleName'] = "Pages";
		$this->data['moduleName'] = "Pages";
		$this->data['page'] = 'pages';
        $data = $this->data;
        $data['common_data'] = $this->common_data;
        $data['page'] = "general";
        $data['moduleName'] = "Site Info";
		$data['page_data'] = $this->page_model->getPageAllData(SOCIAL_LINKS);
		$data['contact'] = $this->page_model->getPageAllData(CONTACT_US);
        $template['body_content'] = $this->load->view('backend/settings/general', $data, true);	
        $this->load->view('backend/layouts/template', $template, false);		
    }
     

	/**
	 * 02: talent_settings
	 *
	 * This function is used to show edit view of the talent settings 
	 */	 
    public function talent_settings() {
		$this->data['topModuleName'] = "Talent";
        $this->data['moduleLink'] = BACKEND_TALENT_SETTINGS_URL;
        $this->data['moduleName'] = "Talent Settings";
        $data = $this->data;
        $data['common_data'] = $this->common_data;
        $data['page'] = "settings";
        $data['moduleName'] = "Settings";
        $data['default_image_upload_limit'] = $this->settings_model->getImageUploadLimit();
        $data['files'] = $this->settings_model->getFiles();
        $template['body_content'] = $this->load->view('backend/settings/settings', $data, true);	
        $this->load->view('backend/layouts/template', $template, false);		
    }
	/*--------------------------------------------------------------------------------------------------------------------------*/
}
/* End of file settings.php */
/* Location: ./application/controllers/backend/settings.php */