<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Backendcommon {
	//initializing public data variable for class
	public $data = array();
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
		$this->data['moduleName'] = "Pages";
		$this->data['page'] = 'pages';
		$this->data['topModuleName'] = "Pages";
		$this->data['topModuleLink'] = BACKEND_PAGES_URL;
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: addhomepageSlideAjax
	02: editPageAjax
	03: addPageHeadingAjax
	04: changePageHeadingStatusAjax
	05: changeHomeSlideStatusAjax
	06: addFaqsAjax
	07: changeFaqStatusAjax
	08: editSettingsAjax
	09: updateSocialLinksAjax
	10: updateAboutContentStatusAjax
	11: editAboutSectionAjax
	12: addTeamMemberAjax
	13: changeTeamMemberStatusAjax

	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 01: addhomepageSlideAjax
	*
	* This function is used to add home page slides
	*
	*/

	public function eventEdit($value='')
	{
			$this->data['moduleLink'] ="/1";
			$this->data['moduleName'] = "";
			$this->data['subModuleName'] = "Events";
			$this->data['page_id'] = '1';
			
			$data = $this->data;
			$data['records']=$this->Sp_event_model->getAllEventsAdmin();

			$data['common_data'] = $this->common_data;
			$template['body_content'] = $this->load->view('backend/Event/index', $data, true);	
			$this->load->view('backend/layouts/template', $template, false);
	}

	public function event_detail($value='')
	{
			$this->data['moduleLink'] ="/1";
			$this->data['moduleName'] = "";
			$this->data['subModuleName'] = "Events";
			$this->data['page_id'] = '1';
			$event_id = $_GET['event_id'];
			$data = $this->data;
			$data['services']=$this->Sp_event_model->getEventDetails($event_id);
			$data['details']=$this->Sp_event_model->getEventDetail($event_id);
			
			$data['common_data'] = $this->common_data;
			$template['body_content'] = $this->load->view('backend/Event/details', $data, true);	
			$this->load->view('backend/layouts/template', $template, false);
	}

	public function update_event_status($value='')
	{
		
		$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		
		
		$event_id = $value['id'];
		$content = $value['privacy_policy_content'];
		$status = $value['status'];
		$data=$this->Sp_event_model->change_status($event_id,$content,$status);
		$objResponse->script( "location.reload();" );
		return $objResponse ;
	}
	public function disclose_name($value='')
	{
		$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		
		
		$event_id = $value['id'];
		$data=$this->Sp_event_model->disclose_name($event_id);
		$objResponse->script( "location.reload();" );
		return $objResponse ;
	}

	public function eventOffers($value='')
	{
		$data = $this->data;
		$data['moduleLink'] ="/1";
		$data['event_id'] = $_GET['e'];
		$data['event_provider_id'] = $_GET['eo'];
		$data['service_id'] = $_GET['s'];
		
		
		$data['details']=$this->Sp_event_model->getEventDetail($data['event_id']);
		$data['offers']=$this->Sp_event_model->getJobOffers($data['event_id'],$data['event_provider_id'],$data['service_id']);
		

		$data['common_data'] = $this->common_data;
		//Getting all users
		$template['body_content'] = $this->load->view('backend/Event/job_offers', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);
	}

	public function terms_and_conditions()
	{
		$this->data['moduleLink'] ="/1";
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "terms_and_conditions";
		$this->data['page_id'] = '1';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_id'] = "1";
		$page_type = ACTIVE_STATUS_ID;
		// $data['page_data'] = $this->page_model->getPageData($page_id,$page_type);
		// if(empty($data['page_data'])){
		// 	show_404();
		// 	die();
		// }
		$data['page_headings'] = "Terms And Conditions";
		$data['terms_and_conditions_content'] = $this->page_model->getTermsAndConditions();

		$template['body_content'] = $this->load->view('backend/pages/TermsAndConditions/termsAndConditions', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);
	}

	public function editHomePageSection()
	{

		$this->data['moduleLink'] = BACKEND_FAQ_PAGES_URL."/1";
		$page = '';
		
		$id = $_GET['page_section'];

		// $page_id = $param['sub_section']; 
		$data = $this->data;
		$data['common_data'] = $this->common_data;	
		if($id == '1'){
			$data['homepage_top_content'] = $this->page_model->getHomepageTopContent();
			$page = 'homepage';
		}
		elseif($id == '2'){
			$data['homepage_top_Mid_content'] = $this->page_model->getHomepageMidTopContent();
			$page = 'homepage2';
		}
		elseif($id == '4'){
			$data['homepage_Left_Mid_content'] = $this->page_model->getHomepageLeftMidContent();
			$page = 'homepage4';
		}
		elseif($id == '3'){

			$data['homepage_Right_Mid_content'] = $this->page_model->getHomepageRightMidContent();
			$page = 'homepage3';
			
		}
		elseif($id == '5'){
			$data['homepage_Bottom_content'] = $this->page_model->getHomepageBottomContent();
			$page = 'homepage5';
		}	
		
		// $data['homepage_mid_content'] = $this->page_model->getHomepageMidContent();
		// $data['homepage_bottom_content'] = $this->page_model->getHomepageBottomContent();
		$template['body_content'] = $this->load->view('backend/pages/homepage/'.$page, $data, true);	
		 // print_r($template);
		$this->load->view('backend/layouts/template', $template, false);
	}


public function updateBottomAjax()
{
	$heading = $_POST['heading'];
		$sub_heading = $_POST['content'];
		

		//validate image
		$qResponse = $this->page_model->updateHomeBottomSection($heading,$sub_heading);
		if($qResponse){
			//Redirect to User profile page
			$msg = 'Your account settings have been saved!';
			$status = 1;
			$url = '';
		}else {
			$msg = 'Profile Not Updated Successfully'; 
			$status = 0;
		}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
}
	
	

	function updateMidRightContentAjax()
	{
		// echo "string";;
		// exit();
		$heading = $_POST['heading'];
		$sub_heading = $_POST['sub_heading'];
		$content = $_POST['content'];
		// print_r($heading);
		// exit();
		$user_image = $this->user_model->getAdminById(1);

		//Uploading Image
		$file_element_name = 'imgInp';  
		$config['upload_path'] = ASSET_BACKEND_UPLOADS_PATH."users";
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($file_element_name)) {
			$msg = $this->upload->display_errors('', ''); 
			$status = 0;
				$response['status'] = $status;
				$response['response'] = $msg;
				// echo json_encode($response);
				// echo $msg;
				// die();
				
				
		}  else {
				$data = array('upload_data' => $this->upload->data());
		}
		//upload file <end>

		//validate image
		$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$user_image['profile_image']);
		$qResponse = $this->page_model->updateMidRightContentAjax($heading,$sub_heading,$content,$file_name);
		if($qResponse){
			//Redirect to User profile page
			$msg = 'Your account settings have been saved!';
			$status = 1;
			$url = '';
		}else {
			$msg = 'Profile Not Updated Successfully'; 
			$status = 0;
		}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
	}


	function updateMidLeftContentAjax()
	{
		// echo "string";;
		// exit();
		$heading = $_POST['heading'];
		$sub_heading = $_POST['sub_heading'];
		$content = $_POST['content'];
		// print_r($heading);
		// exit();
		$user_image = $this->user_model->getAdminById(1);

		//Uploading Image
		$file_element_name = 'imgInp';  
		$config['upload_path'] = ASSET_BACKEND_UPLOADS_PATH."users";
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($file_element_name)) {
			$msg = $this->upload->display_errors('', ''); 
			$status = 0;
				$response['status'] = $status;
				$response['response'] = $msg;
				// echo json_encode($response);
				// echo $msg;
				// die();
				
				
		}  else {
				$data = array('upload_data' => $this->upload->data());
		}
		//upload file <end>

		//validate image
		$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$user_image['profile_image']);
		$qResponse = $this->page_model->updateMidLeftContentAjax($heading,$sub_heading,$content,$file_name);
		if($qResponse){
			//Redirect to User profile page
			$msg = 'Your account settings have been saved!';
			$status = 1;
			$url = '';
		}else {
			$msg = 'Profile Not Updated Successfully'; 
			$status = 0;
		}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
	}


	

	function homePageEdit() {

		$this->data['moduleLink'] = BACKEND_FAQ_PAGES_URL."/1";
		// $this->data['moduleName'] = "";
		// $this->data['subModuleName'] = "FAQs";
		// $this->data['page_id'] = $page_id;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		// $data['page_id'] = $page_id;
		// $page_type = ACTIVE_STATUS_ID;
		// $data['page_data'] = $this->page_model->getPageData($page_id,$page_type);
		// if(empty($data['page_data'])){
		// 	show_404();
		// 	die();
		// }
		// $data['page_headings'] = $this->page_model->getFaqPageHeading($page_id);
		$data['homepage_content'] = $this->page_model->getHomepageContent();
		// $data['homepage_mid_content'] = $this->page_model->getHomepageMidContent();
		$data['homepage_bottom_content'] = $this->page_model->getHomepageBottomContent();
		$template['body_content'] = $this->load->view('backend/pages/homepage/home-page-edit', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);

	}


	Public function privacy_policy()
	{
		$this->data['moduleLink'] ="/1";
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "privacy_policy";
		$this->data['page_id'] = '1';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_id'] = "1";
		$page_type = ACTIVE_STATUS_ID;
		// $data['page_data'] = $this->page_model->getPageData($page_id,$page_type);
		// if(empty($data['page_data'])){
		// 	show_404();
		// 	die();
		// }
		$data['page_headings'] = "Privacy Policy";
		$data['privacy_policy_content'] = $this->page_model->getPrivacyPolicyContent();

		$template['body_content'] = $this->load->view('backend/pages/privacy-policy/privacy-policy-page', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);
	}

	public function addhomepageSlideAjax(){
		//Getting Variables	
		$slide_id = $_POST['slide_id'];
		$slide_url = $_POST['slide_url'];
		$url_btn_text = $_POST['url_btn_text'];
		$slide_content = $_POST['content'];
		$slide_content = str_replace('%^','"',$slide_content);
		$slide_order = $_POST['slide_order'];
		$image_upload = $_POST['image_upload'];
                $slide_image = $_POST['slide_image'];
		//Getting Current Ad Image
		if($image_upload==1){
			//Uploading Image
			$file_element_name = 'imgInp';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."homeslider";
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			/*$config['max_width'] = $width;
			$config['max_height'] = $height;
			$config['min_width'] = $width;
			$config['min_height'] = $height;*/
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					//echo $msg;
					die();
					
					
			}  else {
					$data = array('upload_data' => $this->upload->data());
			}
			$image_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$slide_image);
		}else{
			$image_name = $slide_image;
		}
		
		if($slide_id==0){
                    $qResponse = $this->page_model->addHomepageSlide($slide_order,$slide_url,$slide_content,$image_name,$url_btn_text);
                    $msg_c = 'added';
                }else{
                        $qResponse = $this->page_model->updateHomepageSlide($slide_id,$slide_order,$slide_url,$slide_content,$image_name,$url_btn_text);
                    $msg_c = 'updated';
                }
                    if($qResponse){
			//Redirect to User profile page
			$msg = 'Home Slide '.$msg_c.' successfully!';
			$status = 1;
			$url = BACKEND_HOMESLIDER_URL;
		}else {
			$msg = 'Home Slide '.$msg_c.' successfully!'; 
			$status = 0;
		}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
            
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 02: editPageAjax
	*
	* This function used to edit cms page from admin panel
	*
	*/
	public function editPageAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$page_id = $param['page_id'];
			$content = $param['content'];
			$qResponse = $this->page_model->updatePageContent($page_id,$content);
			$url = BACKEND_PAGES_URL.'/'.$page_id;
			$objResponse->script( "showModal('Page Updated Successfully','Update Page','".$url."')" );
		}
		return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 03: addPageHeadingAjax
	*
	* This function is used to add faq page headings 
	*
	*/
	public function addPageHeadingAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$page_id = $param['page_id'];
			$page_heading = $param['page_heading'];
			$qResponse = $this->page_model->addPageHeading($page_id,$page_heading);
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 04: changePageHeadingStatusAjax
	*
	* This function change FAQ Page Heading status
	*
	*/
	public function changePageHeadingStatusAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$id = $param['id'];
			$status = $param['status'];
			$page_id = $param['page_id'];
			$qResponse = $this->page_model->changePageHeadingStatus($id,$status);
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	* 05: changeHomeSlideStatusAjax
	*
	* This function changes the home slider slide's status
	*
	*/
	public function changeHomeSlideStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$slide_id = $param['slide_id'];
			$status = $param['status']; 
			$update_response = $this->page_model->changeHomeSlideStatus($slide_id,$status);
			if($update_response){
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	* 06: addFaqsAjax
	*
	* This function is used to add faq
	*
	*/
	public function addFaqsAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$heading = $param['privacy_heading'];
			$content = $param['privacy_policy_content'];
			$order_id = $param['order_id'];
			$qResponse = $this->page_model->addFaqs($heading,$content,$order_id);
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}


	public function addTermsAndCondtions($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$heading = $param['heading'];
			$content = $param['content'];
			$order_id = $param['order_id'];
			$qResponse = $this->page_model->addTermsAndCondtions($heading,$content,$order_id);
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}

	public function addFaq($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$heading = $param['heading'];
			$content = $param['content'];
			$order_id = $param['order_id'];
			$qResponse = $this->page_model->addFaq($heading,$content,$order_id);
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}

	public function editFaqAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$id = $param['id'];
			$heading = $param['heading'];
			$content = $param['content'];
			$order_id = $param['order_id'];
			$qResponse = $this->page_model->editFaqAjax($id,$heading,$content,$order_id);
			if($qResponse){
				$objResponse->script( "location.reload();" );
			}

			
		}
		return $objResponse ;
	}

	public function editPrivacyPolicyAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$id = $param['id'];
			$heading = $param['privacy_heading'];
			$content = $param['privacy_policy_content'];
			$order_id = $param['order_id'];
			$qResponse = $this->page_model->editPrivacyPolicy($id,$heading,$content,$order_id);
			if($qResponse){
				$objResponse->script( "location.reload();" );
			}

			
		}
		return $objResponse ;
	}
	
	public function editTermsAndConditionsAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$id = $param['id'];
			$heading = $param['heading'];
			$content = $param['content'];
			$order_id = $param['order_id'];
			$qResponse = $this->page_model->editTermsAndConditions($id,$heading,$content,$order_id);
			if($qResponse){
				$objResponse->script( "location.reload();" );
			}

			
		}
		return $objResponse ;
	}

	public function faq()
	{
		$this->data['moduleLink'] ="/1";
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "faq";
		$this->data['page_id'] = '1';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_id'] = "1";
		$page_type = ACTIVE_STATUS_ID;

		// $data['page_data'] = $this->page_model->getPageData($page_id,$page_type);
		// if(empty($data['page_data'])){
		// 	show_404();
		// 	die();
		// }
		$data['page_headings'] = "Faqs";
		$data['faqs'] = $this->page_model->getFaqs();

		$template['body_content'] = $this->load->view('backend/pages/Faqs/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);
	}

	/*--------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	* 07: deletePrivacyPolicyAjax
	*
	* This function is used to change the faq status
	*
	*/

	

	public function deleteTermsAndConditionsAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$id = $param['id'];
		
			$qResponse = $this->page_model->deleteTermsAndConditionsAjax($id);
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}

	public function deleteFaqAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$id = $param['id'];
		
			$qResponse = $this->page_model->deleteFaqAjax($id);
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}
	public function deletePrivacyPolicyAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$id = $param['id'];
		
			$qResponse = $this->page_model->deletePrivacyPolicyAjax($id);
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	* 08: editSettingsAjax
	*
	* This function changes settings
	*
	*/
	public function editSettingsAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$ad_status_setting = $param['ad_status_setting'];
			$qResponse = $this->page_model->changeSettings($ad_status_setting);
			$url = BACKEND_SETTINGS_URL;
			$objResponse->script( "showModal('Settings Updated Successfully','Settings','".$url."')" );
		}
		return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	* 09: updateSocialLinksAjax
	*
	* This function updates webiste's social links
	*
	*/
	public function updateSocialLinksAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$page_id = $param['page_id'];
			$social_links = $param['social_links'];
			$qResponse = $this->page_model->updateSocialLinks($page_id,$social_links);
			$url = BACKEND_SOCIAL_LINKS;
			$objResponse->script( "showModal('Social Links Updated Successfully','Social Links','".$url."')" );
		}
		return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	* 10: updateAboutContentStatusAjax
	*
	* This function is used to update the content of about us pageq
	*
	*/
	public function updateAboutContentStatusAjax($param = null){
	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$id = $param['id'];
			$status = $param['status'];
			$action_row_type = $param['action_row_type'];
			
			$qResponse = $this->page_model->updateAboutStatus($id,$status);
			if(!empty($action_row_type)){
				$this->session->set_userdata('action_row',$action_row_type);
			}
			$objResponse->script( "location.reload();" );
		}
		return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	* 11: editAboutSectionAjax
	*
	* This function is used to update the images of the about section in homepage
	*
	*/
	function editAboutSectionAjax(){
		//Getting Variables	
		$id = $_POST['id'];
		$url = $_POST['url'];
		$content = $_POST['content'];
		$content = str_replace('%^','"',$content);
		$home_about_id = $_POST['home_about_id'];
		$home_about_url = $_POST['home_about_url'];
		//Getting Current Profile Image
		$page_data = $this->page_model->getAboutSection($home_about_id,$id);
		//Uploading Image
		$file_element_name = 'imgInp';  
		$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."home_about";
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($file_element_name)) {
			$msg = $this->upload->display_errors('', ''); 
			$status = 0;
				$response['status'] = $status;
				$response['response'] = $msg;
				//echo json_encode($response);
				//echo $msg;
				//die();
		}  else {
				$data = array('upload_data' => $this->upload->data());
		}
			//upload file <end>
			//validate image
			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$page_data['image_url']);
				$qResponse = $this->page_model->editAboutSection($id,$url,$content,$file_name);

				if($qResponse){
					//Redirect to User profile page
					$msg = 'Section updated';
					$status = 1;
					$url = $home_about_url."/".$id;
				}else {
					$url = $home_about_url."/".$id;
					$msg = 'Something went wrong! please try again'; 
					$status = 0;
				}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
	}
	
	/**
	* 12: addTeamMemberAjax
	*
	* This function is used to add team member
	*
	*/
	public function addTeamMemberAjax(){
		//Getting Variables	
		$id = $_POST['id'];
		$slide_content = $_POST['content'];
		$slide_content = str_replace('%^','"',$slide_content);
		$slide_order = $_POST['slide_order'];
		$name = $_POST['name'];
		$url = $_POST['url'];
		$image_upload = $_POST['image_upload'];
		$slide_image = $_POST['slide_image'];
		//Getting Current Ad Image
		if($image_upload==1){
			//Uploading Image
			$file_element_name = 'imgInp';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."team";
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			/*$config['max_width'] = $width;
			$config['max_height'] = $height;
			$config['min_width'] = $width;
			$config['min_height'] = $height;*/
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					//echo $msg;
					die();
					
					
			}  else {
					$data = array('upload_data' => $this->upload->data());
			}
			$image_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$slide_image);
		}else{
			$image_name = $slide_image;
		}
		
		if($id==0){
                    $qResponse = $this->page_model->addTeamMember($slide_order,$slide_content,$image_name,$name,$url);
                    $msg_c = 'added';
                }else{
                        $qResponse = $this->page_model->updateTeamMember($id,$slide_order,$slide_content,$image_name,$name,$url);
                    $msg_c = 'updated';
                }
                    if($qResponse){
			//Redirect to User profile page
			$msg = 'Team Member '.$msg_c.' successfully!';
			$status = 1;
			$url = BACKEND_OUR_TEAM_URL;
		}else {
			$msg = 'Team Member '.$msg_c.' successfully!'; 
			$status = 0;
		}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
            
	}
	
	/**
	* 13: changeTeamMemberStatusAjax
	*
	* This function changes the team member's status
	*
	*/
	public function changeTeamMemberStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$id = $param['id'];
			$status = $param['status']; 
			$update_response = $this->page_model->changeTeamMemberStatus($id,$status);
			if($update_response){
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
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
	//02: faqPage
	//03: contactUs
	//04: settings
	//05: homepageSlider
	//06: addhomepageSlide
	//07: homeAboutSection
	//08: editAboutSection
	//09: aboutContent
	//10: editAboutUs
	//11: ourTeamContent
	//12: addTeamMember
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: index
	 *
	 * This function is the entery point to this class. 
	 * It shows edit static page view 
	 */
	public function index($page_id) {
		$data['page_id'] = $page_id;
		$this->data['page_id'] = $page_id;
		$this->data['moduleLink'] = BACKEND_PAGES_URL."/".$page_id;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$page_type = INACTIVE_STATUS_ID;
		$data['page_data'] = $this->page_model->getPageData($page_id,$page_type);
		$data['moduleName'] = "";
		$data['subModuleName'] = $data['page_data']['page_name'];
		if(empty($data['page_data']['content'])){
			show_404();
			die();
		}
		$template['body_content'] = $this->load->view('backend/pages/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);
	}

	public function homePageSections() {
		
		$this->data['moduleLink'] = BACKEND_FAQ_PAGES_URL."/1";
		// $this->data['moduleName'] = "";
		// $this->data['subModuleName'] = "FAQs";
		// $this->data['page_id'] = $page_id;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		// $data['page_id'] = $page_id;
		// $page_type = ACTIVE_STATUS_ID;
		// $data['page_data'] = $this->page_model->getPageData($page_id,$page_type);
		// if(empty($data['page_data'])){
		// 	show_404();
		// 	die();
		// }
		// $data['page_headings'] = $this->page_model->getFaqPageHeading($page_id);
		$data['homepage_top_content'] = $this->page_model->getHomepageTopContent();
		$data['homepage_mid_content'] = $this->page_model->getHomepageMidContent();
		$data['homepage_bottom_content'] = $this->page_model->getHomepageBottomContent();
		$template['body_content'] = $this->load->view('backend/pages/homepage', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);
	}





	
	/**
	 * 02: faqPage
	 *
	 * This function is the entery point to this class. 
	 * It shows edit faq page view 
	 */
	public function faqPage($page_id) {
		$this->data['moduleLink'] = BACKEND_FAQ_PAGES_URL."/".$page_id;
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "FAQs";
		$this->data['page_id'] = $page_id;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_id'] = $page_id;
		$page_type = ACTIVE_STATUS_ID;
		$data['page_data'] = $this->page_model->getPageData($page_id,$page_type);
		if(empty($data['page_data'])){
			show_404();
			die();
		}
		$data['page_headings'] = $this->page_model->getFaqPageHeading($page_id);
		$data['faq_content'] = $this->page_model->getFaqPageContent($page_id);

		$template['body_content'] = $this->load->view('backend/pages/faq-page', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);
	}
	
	
	/**
	 * 03: contactUs
	 *
	 * All queries from frontend contact form will be listed here
	 *
	 */
	 public function contactUs() {
		$this->data['topModuleLink'] = "";
		$this->data['topModuleName'] = "";
		$this->data['page'] = 'contact';
		$this->data['moduleName'] = "Queries";
		$this->data['moduleLink'] = BACKEND_CONTACT_US_URL;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$type = isset($_GET['type'])? $_GET['type']:0;
		$data['messages'] = $this->page_model->getContactMessages($type);
		if(!empty($data['messages'])){
			foreach($data['messages'] as $index=>$message){
				if($message['user_id']!=0){
					$user = $this->user_model->getUserById($message['user_id']);
					$data['messages'][$index]['name'] = $user['first_name'];
					$data['messages'][$index]['email'] = $user['email'];
					$data['messages'][$index]['phone'] = $user['phone'];
				}
			}
		}
		$template['body_content'] = $this->load->view('backend/pages/contactUs', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 04: settings
	 *
	 * Static page settings
	 *
	 */
	
    public function settings() {
		$this->data['moduleLink'] = BACKEND_SETTINGS_URL;
		$this->data['moduleName'] = "Settings";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page'] = "settings";
		$data['moduleName'] = "Settings";
		$data['default_ad_status'] = $this->page_model->getDefaultAdStatus();
		$data['ad_approval_checklist'] = $this->page_model->getAdApprovalChecklist();
		$template['body_content'] = $this->load->view('backend/pages/settings', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 05: homepageSlider
	 *
	 * It shows  home page slider list view
	 *
	 */
	public function homepageSlider() {
		//Variables Declaration and Initialization
		$this->data['page'] = 'home-slider';
		$this->data['moduleName'] = "Home Slider";
		$this->data['moduleLink'] = BACKEND_HOMESLIDER_URL;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['home_slider'] = $this->page_model->getAllHomepageSlides();
		$template['body_content'] = $this->load->view('backend/pages/home-slider/index', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/**
	 * 06: addhomepageSlide
	 *
	 * It shows add home page slider view
	 *
	 */
	public function addhomepageSlide() {
		//Variables Declaration and Initialization
		$this->data['page'] = 'home-slider';
		$this->data['moduleName'] = "Home Slider";
		$this->data['moduleLink'] = BACKEND_HOMESLIDER_URL;
		$this->data['subModuleName'] = (isset($_GET['slide']) ? "Edit Slide":"Add Slide");
		$data = $this->data;
		$data['slide'] = (isset($_GET['slide']) ? $this->page_model->getHomepageSlideByID($_GET['slide']):false);
		$data['common_data'] = $this->common_data;
		$template['body_content'] = $this->load->view('backend/pages/home-slider/add', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 07: homeAboutSection
	 *
	 * It shows home page about section listing view
	 *
	 */
	public function homeAboutSection() {
		//Variables Declaration and Initialization
		$this->data['page'] = 'home-about';
		$this->data['moduleName'] = "Homepage About Sections";
		$this->data['moduleLink'] = BACKEND_HOME_ABOUT_SECTIONS;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_data'] = $this->page_model->getHomeAoutAllData(HOMEPAGE);
		$template['body_content'] = $this->load->view('backend/pages/home-about/home', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 08: editAboutSection
	 *
	 * It shows home page about section edit view
	 *
	 */
	public function editAboutSection($id) {
		//Variables Declaration and Initialization
		$this->data['page'] = 'home-about';
		$this->data['moduleName'] = "Homepage About Sections";
		$this->data['moduleLink'] = BACKEND_HOME_ABOUT_SECTIONS;
		$this->data['subModuleName'] = "Edit About Section";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_data'] = $this->page_model->getAboutSection(HOMEPAGE,$id);
		$template['body_content'] = $this->load->view('backend/pages/home-about/add', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 09: aboutContent
	 *
	 * It shows about section listing view
	 *
	 */
	public function aboutContent() {
		//Variables Declaration and Initialization
		$this->data['page'] = 'about-us';
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "Who We Are";
		$this->data['moduleLink'] = BACKEND_ABOUT_SECTIONS;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_data'] = $this->page_model->getHomeAoutAllData(ABOUT_US);
		$template['body_content'] = $this->load->view('backend/pages/about', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/**
	 * 10: editAboutUs
	 *
	 * It shows about section edit view
	 *
	 */
	public function editAboutUs($id) {
		//Variables Declaration and Initialization
		$this->data['page'] = 'about-us';
		$this->data['moduleName'] = "Who We Are";
		$this->data['moduleLink'] = BACKEND_ABOUT_SECTIONS;
		$this->data['subModuleName'] = "Edit Who We Are";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_data'] = $this->page_model->getAboutSection(ABOUT_US,$id);
		$template['body_content'] = $this->load->view('backend/pages/editAbout', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/**
	 * 11: ourTeamContent
	 *
	 * It shows our team list view
	 *
	 */
	public function ourTeamContent() {
		//Variables Declaration and Initialization
		$this->data['page'] = 'our-team';
		$this->data['moduleName'] = "Our Team";
		$this->data['moduleLink'] = BACKEND_OUR_TEAM_URL;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['members'] = $this->page_model->getAllTeamMembers();
		$template['body_content'] = $this->load->view('backend/pages/our-team/index', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	public function pricing_edit() {

		//Variables Declaration and Initialization
		$this->data['page'] = 'our-team';
		$this->data['moduleName'] = "Our Team";
		$this->data['moduleLink'] = BACKEND_OUR_TEAM_URL;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['top_content'] = $this->page_model->getPricingTopContent();
		// print_r($data['top_content']);
		// exit();
		foreach ($data['top_content'] as $key => $value) {
			if ($value['sub_section'] == '1') {
				$data['top_section_1_heading'] = $value['heading']; 
				$data['top_section_1_content'] = $value['content'];
			}
			if ($value['sub_section'] == '2') {
				$data['top_section_2_heading'] = $value['heading']; 
				$data['top_section_2_content'] = $value['content'];
				$data['top_section_2_image'] = $value['image'];
			}
			if ($value['sub_section'] == '3') {
				$data['top_section_3_heading'] = $value['heading'];
				$data['top_section_3_sub_heading'] = $value['sub_heading'];  
				$data['top_section_3_content'] = $value['content'];
				$data['top_section_3_price'] = $value['price'];
				$data['top_section_3_title'] = $value['title'];
				$data['top_section_3_link'] = $value['links'];
			}
			if ($value['sub_section'] == '4') {
				$data['top_section_4_heading'] = $value['heading'];
				$data['top_section_4_sub_heading'] = $value['sub_heading'];  
				$data['top_section_4_content'] = $value['content'];
				$data['top_section_4_price'] = $value['price'];
				$data['top_section_4_title'] = $value['title'];
				$data['top_section_4_link'] = $value['links'];
			}
			
			
			
		}
		$template['body_content'] = $this->load->view('backend/pages/pricing-plan/index', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}


	public function contact_edit() {

		//Variables Declaration and Initialization
		$this->data['page'] = 'our-team';
		$this->data['moduleName'] = "Our Team";
		$this->data['moduleLink'] = BACKEND_OUR_TEAM_URL;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['top_content'] = $this->page_model->getcontactUs();

		foreach ($data['top_content'] as $key => $value) {
			if ($value['section'] == '1') {
				$data['heading'] = $value['heading'];
				$data['content'] = $value['content'];
				$data['image'] = $value['image'];
			}	
		}		
		$template['body_content'] = $this->load->view('backend/pages/contact/index', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}

	function updateContact()
	{
		// echo "string";;
		// exit();
		$heading = $_POST['heading'];
		// $sub_heading = $_POST['sub_heading'];
		$content = $_POST['content'];
		// print_r($heading);
		// exit();
		$user_image = $this->user_model->getAdminById(1);

		//Uploading Image
		$file_element_name = 'imgInp';  
		$config['upload_path'] = ASSET_BACKEND_PAGE_UPLOADS;
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($file_element_name)) {
			$msg = $this->upload->display_errors('', ''); 
			$status = 0;
				$response['status'] = $status;
				$response['response'] = $msg;
				// echo json_encode($response);
				// echo $msg;
				// die();
				
				
		}  else {
				$data = array('upload_data' => $this->upload->data());
		}
		//upload file <end>

		//validate image
		$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
		
		$qResponse = $this->page_model->updateContactAjax($heading,$content,$file_name);
		if($qResponse){
			//Redirect to User profile page
			$msg = 'Your account settings have been saved!';
			$status = 1;
			$url = '';
		}else {
			$msg = 'Profile Not Updated Successfully'; 
			$status = 0;
		}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
	}

	function update_pricing_ajax()
	{
		// echo "string";;
		// exit();
		$heading = $_POST['heading'];
		// $sub_heading = $_POST['sub_heading'];
		// $content = $_POST['content'];
		// print_r($heading);
		// exit();
		$user_image = $this->user_model->getAdminById(1);

		//Uploading Image
		$file_element_name = 'imgInp';  
		$config['upload_path'] = ASSET_BACKEND_PAGE_UPLOADS;
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($file_element_name)) {
			$msg = $this->upload->display_errors('', ''); 
			$status = 0;
				$response['status'] = $status;
				$response['response'] = $msg;
				// echo json_encode($response);
				// echo $msg;
				// die();
				
				
		}  else {
				$data = array('upload_data' => $this->upload->data());
		}
		//upload file <end>

		//validate image
		$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
		
		$qResponse = $this->page_model->updatePricingAjax($heading,$file_name);
		if($qResponse){
			//Redirect to User profile page
			$msg = 'Your account settings have been saved!';
			$status = 1;
			$url = '';
		}else {
			$msg = 'Profile Not Updated Successfully'; 
			$status = 0;
		}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
	}


	/**
	 * 12: addTeamMember
	 *
	 * It shows add team member view
	 *
	 */
	public function addTeamMember() {
		//Variables Declaration and Initialization
		$this->data['page'] = 'our-team';
		$this->data['moduleName'] = "Our Team";
		$this->data['moduleLink'] = BACKEND_OUR_TEAM_URL;
		$this->data['subModuleName'] = (isset($_GET['id']) ? "Edit Member":"Add Member");
		$data = $this->data;
		$data['slide'] = (isset($_GET['id']) ? $this->page_model->getTeamMemberByID($_GET['id']):false);
		$data['common_data'] = $this->common_data;
		$template['body_content'] = $this->load->view('backend/pages/our-team/add', $data, true);			
		$this->load->view('backend/layouts/template', $template, false);		
	}


// Homepage Top

	function updatePageContentAjax()
	{
		$objResponse = new xajaxResponse();
		
		$heading = $_POST['heading'];
		$image_upload = $_POST['image_upload'];
		$link = $_POST['link'];
		$user_image = $this->user_model->getAdminById(1);

		//Uploading Image
		$file_element_name = 'imgInp';  
		$config['upload_path'] = ASSET_BACKEND_UPLOADS_PATH."users";
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($file_element_name)) {
			$msg = $this->upload->display_errors('', ''); 
			$status = 0;
				$response['status'] = $status;
				$response['response'] = $msg;
				// echo json_encode($response);
				// echo $msg;
				// die();
				
				
		}  else {
				$data = array('upload_data' => $this->upload->data());
		}
		//upload file <end>

		//validate image
		$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$user_image['profile_image']);
		if ($image_upload == '0') {
			$qResponse = $this->page_model->updateTopContent_without_image($heading,$link);
		}else{
			$qResponse = $this->page_model->updateTopContent($heading,$link,$file_name);
		}
		
		    $text = "Employee has been alloted Successfully." ;
		    $objResponse->script('$(".errorMsg").hide();');
		    // $objResponse->script("$('.SuccessMsg').html('".$text."')");   
		    $objResponse->script('$("#homepage_update").modal("show");');    
	   
		// $("#settings .modal-title").text("Home Slide");
		// $("#settings .text").text(obj.response);
		// $("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
		// $("#settings").modal("show");
		// $response['status'] = $status;
		// $response['response'] = $msg;
		// $response['url'] = $url;
		// echo json_encode($response);
		// die();
			return $objResponse ;
		
		// if($qResponse){
		// 	//Redirect to User profile page
		// 	$msg = 'Your account settings have been saved!';
		// 	$status = 1;
		// 	$url = '';
		// }else {
		// 	$msg = 'Profile Not Updated Successfully'; 
		// 	$status = 0;
		// }
		// $response['status'] = $status;
		// $response['response'] = $msg;
		// $response['url'] = $url;
		// echo json_encode($response);
		// die();
	}

	 function updateHomePageMidTopSection($param='')
	{
		$objResponse = new xajaxResponse();
		$heading = $param['heading'];
		$sub_heading = $param['sub_heading'];
		$content = $param['content'];

		//validate image
		$qResponse = $this->page_model->updateHomePageMidTopSection($heading,$sub_heading,$content);
		// if($qResponse){
		// 	//Redirect to User profile page
		// 	$msg = 'Your account settings have been saved!';
		// 	$status = 1;
		// 	$url = '';
		// }else {
		// 	$msg = 'Profile Not Updated Successfully'; 
		// 	$status = 0;
		// }
		if ($qResponse) {
		    $text = "Employee has been alloted Successfully." ;
		    $objResponse->script('$(".errorMsg").hide();');
		    // $objResponse->script("$('.SuccessMsg').html('".$text."')");   
		    $objResponse->script('$("#homepage_update").modal("show");');    
	    }
		// $("#settings .modal-title").text("Home Slide");
		// $("#settings .text").text(obj.response);
		// $("#settings .modal-footer>.blue").attr("onclick","redirect('"+obj.url+"')");
		// $("#settings").modal("show");
		// $response['status'] = $status;
		// $response['response'] = $msg;
		// $response['url'] = $url;
		// echo json_encode($response);
		// die();
			return $objResponse ;
	}


}
/* End of file Pages.php */
/* Location: ./application/controllers/backend/Pages.php */