<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends Common {

	//initializing public data variable for class
	public $data = array();
    function __construct() {
        parent::__construct();	
        //I.E Fix: Holds SESSION accross the DOMAIN
        header('P3P: CP="CAO PSA OUR"');
		//$this->comingSoon();
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
		$this->isLoggedIn();
		$this->commonFunction();
        //------------ Common Function <End> -----------------//
		//------------ Class Common Values <Start> -----------------//
		$this->data['module'] = "03";
		$this->data['moduleName'] = "Pages";
		$this->data['page'] = 'pages';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: Portfolio view
	--------------------------------------------------------------------------------------------------------------------------*/
	

     public function index() {
    	
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			
			$data = $this->data;
		    

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'message';

			$data['messages']= $this->Message_model->getAllMessages($user_id);	

			$count = 0;
			foreach ($data['messages'] as $key => $value) {
				$data['messages'][$key]['user_type'] = $this->Message_model->getSenderType($value['sender_id']);
				$data['messages'][$key]['sender_image'] = $this->Message_model->getSenderImage($value['sender_id']);
				$data['messages'][$key]['sender_name'] = $this->Message_model->getSenderName($value['sender_id']);
				$data['respnds']= $this->Message_model->update_latest_msg_details($value['sender_id'],$user_id);	
				if ($value['notification'] == '1') {
					$count++;
				}
			}
			// if (empty($data['messages'])) {
			// 	$data['messages']= $this->Message_model->getAllMessages1($user_id);	
			// }
			// print_r($data['messages']);	
			// exit();	
			// $data['common_data']['message_count'] = $count;
			// $data['message_count'] = $count;	
			$template['body_content'] = $this->load->view('frontend/messages/index', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);			
	}

	public function delete_message($value='')
	{
		$sender_id = $value['s_id'];
		$receiver_id = $value['r_id'];
		$objResponse = new xajaxResponse();
		$data['messages']= $this->Message_model->delete_message($sender_id, $receiver_id);	
		$objResponse->script( "window.location.reload();" );
		return $objResponse;
	

	}

	public function details($value='')
	{$data = $this->data;
		$sender_id = $_GET['s'];
		$receiver_id = $_GET['r'];
		$objResponse = new xajaxResponse();
		$data['common_data'] = $this->common_data;
		$data['common_data']['page'] = 'message';
		$data['respnds']= $this->Message_model->update_latest_msg_details($sender_id,$receiver_id);
		$data['messages']= $this->Message_model->getMessageDetails($sender_id,$receiver_id);
		$data['sender_id'] = 	$sender_id;
		$data['receiver_id'] = 	$receiver_id;
		// $data['common_data']['message_count']= '';
		// if ($data['respnds']) {
		// 	$objResponse->script( "$('.cs').removeClass('msg-not-opened')" );
		// 	$objResponse->script( "$('.cs').addClass('msg-opened')" );
		// }
		$template['body_content'] = $this->load->view('frontend/messages/details', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
		
	}

	public function get_latest_msg_details($value='')
	{	

		$data = $this->data;
		$sender_id = $_POST['sender_id'];  
		
		$receiver_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
	
		$data['common_data'] = $this->common_data;
		$data['common_data']['page'] = 'message';
		$data['messages']= $this->Message_model->get_latest_msg_details($sender_id,$receiver_id);
		
		echo json_encode($data['messages']);

		
	}

	public function update_latest_msg_details($value='')
	{	

		$data = $this->data;
		$sender_id = $_POST['receiver_id'];  
		
		$receiver_id = $_POST['sender_id'];
		
		$data['common_data'] = $this->common_data;
		$data['common_data']['page'] = 'message';

		$data['messages']= $this->Message_model->update_latest_msg_details($sender_id,$receiver_id);
		
		
	}

	public function send_message($value='')
	{
		
		$file_element_name = 'imgInp';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."messages";
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					
			}  else {
					$data = array('upload_data' => $this->upload->data());
			}

		// $file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
		// echo $file_name;
		// exit();
		// $message ;
		// $media ;
		// if ($file_name == '') {
			$message = $_POST['msg_text'];
			$media = '0';
		// }
		// else{
		// 	$message = $file_name;
		// 	$media = '1';
		// }
		$sender_id = $_POST['receiver_id'];
		$receiver_id = $_POST['sender_id']; 
		// print_r($sender_id);
		// print_r($receiver_id);
		// exit();
		// $message = $value['message'];
		$data['response']= $this->Message_model->send_message($sender_id,$receiver_id, $message,$media);

	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
//initializing public data variable for class

// / End of file pages.php /
// / Location: ./application/controllers/frontend/pages.php /




