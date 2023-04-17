<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Users extends Backendcommon {
	//initializing public data variable for class
	public $data = array();
    function __construct() {
        parent::__construct();	
        //I.E Fix: Holds SESSION accross the DOMAIN
        header('P3P: CP="CAO PSA OUR"');
       $this->isLoggedIn();	
       //$this->isSurveySession();	
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
		$this->data['moduleName'] = "Users";
		$this->data['topModuleName'] = "Talent";
		$this->data['topModuleLink'] = BACKEND_SERVICE_PROVIDER_URL;
		$this->data['moduleLink'] = BACKEND_SERVICE_PROVIDER_URL;
		$this->data['page'] = 'users';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: changeUserStatusAjax
	02: changeUserSponsorStatusAjax
	03: changeVideoStatusAjax
	04: changePortfolioImageStatusAjax

	--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	* 01: changeUserStatusAjax
	*
	* This function changes user status i.e. "Active / Inactive / Deleted"
	*
	*/
	public function changeUserStatusAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		$user_id = $param['user_id'];
		$status = $param['status'];
		$reason = $param['reason'];
		$action_row_type = $param['action_row_type'];
		$current_status = $param['current_status'];
		// Changing user status in DB
		$delete_response = $this->user_model->changeStatus($user_id,$status,$reason);
		if($delete_response){
			
			if($status!=DELETED_STATUS_ID){
				if(!empty($action_row_type)){
					$this->session->set_userdata('action_row',$action_row_type);
				}
				$user = $this->user_model->getUserById($user_id);
				//Email details available in this function already
				$to_email = $user['email'];
				userStatusEmail($status,$current_status,$reason,$user['first_name'],$to_email);
			}
			$objResponse->script( "window.location.reload()" );
		}
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 02: changeUserSponsorStatusAjax
	*
	* This function changes user sponsorship status i.e. "Active / Inactive"
	*
	*/
public function update_member_status($param = null){

	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	 
		$user_id = $param['id'];
		$status = $param['sub'];

		// Changing user status in DB
		$delete_response = $this->user_model->update_member_status($user_id,$status);
		if($delete_response){
			
			
			 $objResponse->script( "window.location.reload()" );
		}

	return $objResponse ;
	}


	public function changeUserSponsorStatusAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		$user_id = $param['user_id'];
		$status = $param['status'];
		$action_row_type = $param['action_row_type'];
		// Changing user status in DB
		$delete_response = $this->user_model->changeSponsorStatus($user_id,$status);
		if($delete_response){
			if(!empty($action_row_type)){
				$this->session->set_userdata('action_row',$action_row_type);
			}
			/*if($status!=DELETED_STATUS_ID){
				$user = $this->user_model->getUserById($user_id);
				//Email details available in this function already
				$to_email = $user['email'];
				userStatusEmail($status,$current_status,$reason,$user['first_name'],$to_email);
			}*/
			$objResponse->script( "window.location.reload()" );
		}
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 03: changeVideoStatusAjax
	*
	* This function changes user video status
	*
	*/
	public function changeVideoStatusAjax($param = null){
	//echo "yeah"; die();
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		$user_id = $param['user_id'];
		$main_status = $param['status'];
		$delete_status = $param['delete_status'];
		$current_status = $param['current_status'];
		$id = $param['id'];
		$vid_id = $param['vid_id'];
		$reason = $param['reason'];
		$is_active = $param['is_active'];
		/////////////////////////////////////Video Status Update///////////////////////////////////////////////////
		$key = file_get_contents(ROOT_DIRECTORY.'token.txt');
		//print_r($key); die();
		require_once ROOT_DIRECTORY.'vendor/autoload.php';

		$client_id = YOUTUBE_CLIENT_ID;
		$client_secret = YOUTUBE_CLIENT_SECRET;
		try{
			// Client init
			$client = new Google_Client();
			$client->setClientId($client_id);
			$client->setAccessType('offline');
			$client->setApprovalPrompt('force');
			$client->setAccessToken($key);
			$client->setClientSecret($client_secret);
			//print_r($client->getAccessToken()); die();
			if ($client->getAccessToken()) {
				/**
				 * Check to see if our access token has expired. If so, get a new one and save it to file for future use.
				 */
				if($client->isAccessTokenExpired()) {
					//print_r($client->getAccessToken()); die();
					$newToken = json_decode($key);
				    $client->refreshToken($newToken->refresh_token);
					//print_r($client->getAccessToken()); die();
					$access_token = $client->getAccessToken();
					$access_token['refresh_token'] = $newToken->refresh_token;
					$data_test = json_encode($access_token);
					file_put_contents(ROOT_DIRECTORY.'token.txt', $data_test);
				}
		 
				$youtube = new Google_Service_YouTube($client);
				// REPLACE this value with the video ID of the video being updated.
				$videoId = $vid_id;

				// Call the API's videos.list method to retrieve the video resource.
				$listResponse = $youtube->videos->listVideos("status,snippet",
					array('id' => $videoId));
				// If $listResponse is empty, the specified video was not found.
				$thumbnail="";
				if (empty($listResponse) || !isset($listResponse[0])) {
					$delete_status = 3;
					$reason = "Deleted by admin from YouTube";
					$delete_response = $this->user_model->changeVideoStatus($id,REJECTED_VIDEO_STATUS_ID,DELETED_YOUTUBE_STATUS_ID,$reason,$delete_status,$thumbnail);
					if($current_status == APPROVED_VIDEO_STATUS_ID || $current_status == PENDING_VIDEO_STATUS_ID){
						$user = $this->user_model->getUserById($user_id);
						//Email details available in this function already
						$to_email = $user['email'];
						if($is_active!=TALENT_DELETED_VIDEO_STATUS_ID){
							videoStatusEmail(DELETED_YOUTUBE_STATUS_ID,$id,$reason,$user['first_name'],$to_email);
						}
						
					}
					$objResponse->script('$(".modal").modal("hide");');
					$objResponse->script('$("#settings .modal-title").text("Portfolio");');
					$objResponse->script('$("#settings .text").text("This video has been deleted from YouTube");');
					$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","window.location.reload()");');
					$objResponse->script('$("#settings").modal("show");');
					return $objResponse;
				} else {
				  // Since the request specified a video ID, the response only
				  // contains one video resource.
				  $thumbnail = $listResponse[0]->snippet['thumbnails']['high']['url'];
				  $video = $listResponse[0];
				  if(!empty($delete_status)){
				    $delete_response = $this->user_model->changeVideoStatus($id,REJECTED_VIDEO_STATUS_ID,DELETED_YOUTUBE_STATUS_ID,$reason,$delete_status,$thumbnail);
					$youtube->videos->delete($videoId); 
					if($current_status == APPROVED_VIDEO_STATUS_ID || $current_status == PENDING_VIDEO_STATUS_ID){
						$user = $this->user_model->getUserById($user_id);
						//Email details available in this function already
						$to_email = $user['email'];
						if($is_active!=TALENT_DELETED_VIDEO_STATUS_ID){
							videoStatusEmail(DELETED_YOUTUBE_STATUS_ID,$id,$reason,$user['first_name'],$to_email);
						}
					}
					$objResponse->script( "window.location.reload()" );
					return $objResponse;
				  }else if($video->status['uploadStatus']=='rejected'){
					$reason = $video->status['rejectionReason']; 
					$delete_response = $this->user_model->changeVideoStatus($id,REJECTED_VIDEO_STATUS_ID,DUPLICATE_YOUTUBE_STATUS_ID,$reason,$delete_status,$thumbnail);
					$user = $this->user_model->getUserById($user_id);
					//Email details available in this function already
					$to_email = $user['email'];
					videoStatusEmail(REJECTED_VIDEO_STATUS_ID,$id,$reason,$user['first_name'],$to_email);
					$objResponse->script('$(".modal").modal("hide");');
					$objResponse->script('$("#settings .modal-title").text("Portfolio");');
					$objResponse->script('$("#settings .text").text("This video has been termed duplicate by YouTube");');
					$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","window.location.reload()");');
					$objResponse->script('$("#settings").modal("show");');
					return $objResponse;
				  } else {
					$youtube_status = ($main_status == REJECTED_VIDEO_STATUS_ID)?PRIVATE_YOUTUBE_STATUS_ID:PUBLIC_YOUTUBE_STATUS_ID;
					$delete_response = $this->user_model->changeVideoStatus($id,$main_status,$youtube_status,$reason,$delete_status,$thumbnail);
					$user = $this->user_model->getUserById($user_id);
					$to_email = $user['email'];
					videoStatusEmail($main_status,$id,$reason,$user['first_name'],$to_email);
					// Create a video status with privacy status. Options are "public", "private" and "unlisted".
					$status = new Google_Service_YouTube_VideoStatus();
					if($main_status == REJECTED_VIDEO_STATUS_ID){
						$status->setPrivacyStatus("private");
						$status->setPublicStatsViewable(false);
					}else{
						$status->setPrivacyStatus("public");
						$status->setPublicStatsViewable(true);
					}
					$status->setEmbeddable(true); // Google defect still not editable https://code.google.com/p/gdata-issues/issues/detail?id=4861
					$video->setStatus($status);
				 
				  // Update the video resource by calling the videos.update() method.
					$updateResponse = $youtube->videos->update("status,snippet", $video);
					$objResponse->script( "window.location.reload()" );
					return $objResponse;
				  }
				}
			} else{
				// @TODO Log error
				echo 'Problems creating the client';
			}

		} catch(Google_Service_Exception $e) {
			//print "Caught Google service Exception ".$e->getCode(). " message is ".$e->getMessage();
			//print "Stack trace is ".$e->getTraceAsString();
		}catch (Exception $e) {
			//print "Caught Google service Exception ".$e->getCode(). " message is ".$e->getMessage();
			//print "Stack trace is ".$e->getTraceAsString();
		}
		/////////////////////////////////////Video Status Update///////////////////////////////////////////////////
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 04: changePortfolioImageStatusAjax
	*
	* This function changes user portfolio image status
	*
	*/
	public function changePortfolioImageStatusAjax($param = null){
	//echo "yeah"; die();
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		$user_id = $param['user_id'];
		$main_status = $param['status'];
		$id = $param['id'];
		$reason = $param['reason'];
		$delete_response = $this->user_model->changePortfolioImageStatus($id,$main_status,$reason);
		if($delete_response){
			if($main_status==DELETED_STATUS_ID){
				$user = $this->user_model->getUserById($user_id);
				//Email details available in this function already
				$to_email = $user['email'];
				userPortfolioImageEmail($main_status,$id,$reason,$user['first_name'],$to_email);
			}
			$objResponse->script( "window.location.reload()" );
		}
	}	
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/

	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Ed>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	//FUNCTIONS LIST:
	//01: index
	//02: talent
	//03: employee
	//04: employeeDetail
	//05: talentDetail
	//06: checkVideoStatus

	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: Index
	 *
	 * This function is the entery point to this class. 
	 * It shows users list view to admin.
	 *
	 */
	
    public function index() {
		
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['users'] = $this->user_model->getUsers();
		$template['body_content'] = $this->load->view('backend/users/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}

	 public function email_subscribers() {
		
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['users'] = $this->user_model->getSubcribers();
		$template['body_content'] = $this->load->view('backend/users/email_subscribers', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	 * 02: Talent
	 *
	 * This function is the entery point to this class. 
	 * It shows users (talent) list view to admin.
	 *
	 */
	
    public function service_provider() {
		$this->data['page'] = 'service-provider';
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "service_provider";
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		
		$data['users'] = $this->user_model->getServiceProviders(USER_SERVICE_PROVIDER);
		// foreach($data['users'] as $index=>$user){
		// 	$data['users'][$index]['latest_payment'] = $this->payment_model->getTalentLatestPayments($user['id']);
		// 	$data['users'][$index]['pending_trans_count'] = count($data['users'][$index]['latest_payment']);
		// 	$data['users'][$index]['max_expiry_date'] = $this->payment_model->getMaxExpiryDate($user['id']);
		// }
		$template['body_content'] = $this->load->view('backend/users/service-provider', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}

	  public function update_user_active_status($param=null) {
		
		$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		
		if ($param != null) { 
			$user_id = $param['user_id'];
			$status = $param['status'];
			if (isset($param['reason'])) {
			$reason = $param['reason'];	
			}else{
			$reason = '';	
			}
			
			//print_r($param);die();
			// $reason = $param['reason'];
			// $action_row_type = $param['action_row_type'];
			// $current_status = $param['current_status'];
			// Changing user status in DB
			$delete_response = $this->user_model->changeStatus($user_id,$status,$reason);
			// print_r($status);die();
			if($delete_response){
				if ($status == '3' || $status == '4') {
					if ($status == '4') {
						$type ='Suspended';
					}else{
						$type ='Rejected';
					}
					$qstr4 = "SELECT * FROM user WHERE id = '".$user_id."'";
			      $query4 = $this->db->query($qstr4);
			      $res4 = $query4->row_array();


			     $sender = 'no-reply@plaany.com';
			    $receiver = $res4['email'];
			    $subject = "Account ".$type;
			    $msg = "Hello ".ucwords($res4['first_name']).",<br /><br />
			                Your account has been ".$type." by our team due to following reason <br /> 
			                '".$reason."'.
			                <br />
			               
			                <br />
			                Regards,<br/>Support Team";
			                
			    sendEmail($sender,$receiver,$msg,$subject); 
				
				
				}
			  
			}
			$objResponse->script( "window.location.reload()" );
			return $objResponse;
		}
	 }

	 
	   public function update_user_subscribe_status($param=null) {
		
		$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		
		if ($param != null) { 
			$user_id = $param['user_id'];
			$status = $param['status'];
			
			
			$delete_response = $this->user_model->changeSubStatus($user_id,$status);
			// print_r($status);die();
		
			$objResponse->script( "window.location.reload()" );
			return $objResponse;
		}
	 }


	 public function event_organizer() {
		$this->data['page'] = 'event-organizer';
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "event_organizer";
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		
		$data['users'] = $this->user_model->getEventOrganizer(USER_ORGANIZER);
		// foreach($data['users'] as $index=>$user){
		// 	$data['users'][$index]['latest_payment'] = $this->payment_model->getTalentLatestPayments($user['id']);
		// 	$data['users'][$index]['pending_trans_count'] = count($data['users'][$index]['latest_payment']);
		// 	$data['users'][$index]['max_expiry_date'] = $this->payment_model->getMaxExpiryDate($user['id']);
		// }
		$template['body_content'] = $this->load->view('backend/users/event-organizer', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/ 
	/**
	 * 03: Employee
	 *
	 * This function is the entery point to this class. 
	 * It shows users (employee) list view to admin.
	 *
	 */
	
    public function employee() {
		//assign public class values to function variable
		$this->data['topModuleLink'] = BACKEND_EMPLOYEE_URL;
		$this->data['moduleName'] = "";
		$this->data['topModuleName'] = "Employers";
		$this->data['page'] = 'employee';
		//$this->data['subModuleName'] = "Employers";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['users'] = $this->user_model->getUsers(USER_ROLE_EMPLOYER);
		$template['body_content'] = $this->load->view('backend/users/employee', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
   /**
	 * 04: employeeDetail
	 *
	 * This function is used to show details of user type employee
	 */
	
    public function eventOrganizerDetail() {
		//assign public class values to function variable
		$this->data['topModuleLink'] = BACKEND_EMPLOYEE_URL;
		$this->data['moduleLink'] = BACKEND_EMPLOYEE_URL;
		$this->data['moduleName'] = "";
		$this->data['page'] = 'event-organizer';
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "event_organizer";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		if(!isset($_GET['user_id'])) {
            header("Location: ".BACKEND_EMPLOYEE_URL);
            die();
        }
		$data['user_id'] = $_GET['user_id'];
		$data['user'] = $this->user_model->getUserById($data['user_id']);
		$data['cities'] = $this->user_model->getCities();
		$data['countries'] = $this->user_model->getCountries();
		$data['services'] = $this->user_model->get_services();
		$data['subscriptions'] = $this->user_model->get_subscriptions($data['user_id']);
		$data['city'] = $this->user_model->get_city();
		$data['countries'] = $this->user_model->getCountries();
		$data['states'] = $this->user_model->get_states();
		foreach ($data['services'] as $key => $value) {
			$data['services'][$key]['selected'] = $this->user_model->get_selected_services($value['id'],$data['user_id']);
		}
		if(empty($data['user'])){
			header("Location: ".BACKEND_EMPLOYEE_URL);
            die();
		}
		//Getting all users
		$template['body_content'] = $this->load->view('backend/users/employeeDetail', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
   /**
	 * 05: talentDetail
	 *
	 * This function is used to show details of user type talent
	 */
	
    public function talentDetail() {
		//assign public class values to function variable
		$this->data['page'] = 'service-provider';
		$this->data['moduleName'] = "";
		$this->data['subModuleName'] = "service_provider";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		if(!isset($_GET['user_id'])) {
            header("Location: ".BACKEND_TALENT_URL);
            die();
        }
		$data['user_id'] = $_GET['user_id'];
		$data['user'] = $this->user_model->getUserById($data['user_id']);
		//pr($data['user']); die();
		$data['cities'] = $this->user_model->getCities();
		$data['countries'] = $this->user_model->getCountries();
		$data['services'] = $this->user_model->get_services();

		$data['city'] = $this->user_model->get_city();
		$data['countries'] = $this->user_model->getCountries();
		$data['states'] = $this->user_model->get_states();
		//print_r($data['user']);die();
		$user_id=$data['user']['id'];
		$data['record']=$this->portfolio_model->getPortfolioRecord($user_id);


		$data['media']=$this->portfolio_model->getPortfolioImage($user_id);
		// print_r($data['media']);
		// exit();
		foreach ($data['services'] as $key => $value) {
			$data['services'][$key]['selected'] = $this->user_model->get_selected_services($value['id'],$data['user_id']);
		}

		// $data['selected_services'] = explode(",", $data['user']['services']);
		// foreach ($data['selected_services'] as $key => $value) {
		//  	$data['selected_services'][$key] = $this->user_model->get_selected_services($value);
		//  } 
		// print_r($data);
		// exit();
		if(empty($data['user'])){
			header("Location: ".BACKEND_TALENT_URL);
            die();
		}
		//Getting all users
		$template['body_content'] = $this->load->view('backend/users/talentDetail', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 06: checkVideoStatus
	 *
	 * This function is used to check YouTube video status
	 */
	public function checkVideoStatus($user_id,$id,$vid_id,$current_status){
		/////////////////////////////////////Video Status Update///////////////////////////////////////////////////
		$key = file_get_contents(ROOT_DIRECTORY.'token.txt');
		//print_r($key); die();
		require_once ROOT_DIRECTORY.'vendor/autoload.php';

		$client_id = YOUTUBE_CLIENT_ID;
		$client_secret = YOUTUBE_CLIENT_SECRET;
		try{
			// Client init
			$client = new Google_Client();
			$client->setClientId($client_id);
			$client->setAccessType('offline');
			$client->setApprovalPrompt('force');
			$client->setAccessToken($key);
			$client->setClientSecret($client_secret);
		 //print_r($client->getAccessToken()); die();
			if ($client->getAccessToken()) {
				/**
				 * Check to see if our access token has expired. If so, get a new one and save it to file for future use.
				 */
				if($client->isAccessTokenExpired()) {
					//print_r($client->getAccessToken()); die();
					$newToken = json_decode($key);
				    $client->refreshToken($newToken->refresh_token);
					//print_r($client->getAccessToken()); die();
					$access_token = $client->getAccessToken();
					$access_token['refresh_token'] = $newToken->refresh_token;
					$data_test = json_encode($access_token);
					file_put_contents(ROOT_DIRECTORY.'token.txt', $data_test);
				}
				
				$youtube = new Google_Service_YouTube($client);
				// REPLACE this value with the video ID of the video being updated.
				$videoId = $vid_id;

				// Call the API's videos.list method to retrieve the video resource.
				$listResponse = $youtube->videos->listVideos("status,snippet",
					array('id' => $videoId));
				$thumbnail = "";
				// If $listResponse is empty, the specified video was not found.
				if (empty($listResponse) || !isset($listResponse[0])) {
					$delete_status = 3;
					$reason = "Deleted by admin from YouTube";
					$delete_response = $this->user_model->changeVideoStatus($id,REJECTED_VIDEO_STATUS_ID,DELETED_YOUTUBE_STATUS_ID,$reason,$delete_status,$thumbnail);
					if($current_status == APPROVED_VIDEO_STATUS_ID || $current_status == PENDING_VIDEO_STATUS_ID){
						$user = $this->user_model->getUserById($user_id);
						//Email details available in this function already
						$to_email = $user['email'];
						videoStatusEmail(DELETED_YOUTUBE_STATUS_ID,$id,$reason,$user['first_name'],$to_email);
					}
					
				} else {
				  $thumbnail = $listResponse[0]->snippet['thumbnails']['high']['url'];
				  $this->user_model->changeVideoThumbnail($id,$thumbnail);
				  // Since the request specified a video ID, the response only
				  // contains one video resource.
				  $video = $listResponse[0];
				  if($video->status['uploadStatus']=='rejected'){
					$delete_status = 0;
					$reason = $video->status['rejectionReason']; 
					$delete_response = $this->user_model->changeVideoStatus($id,REJECTED_VIDEO_STATUS_ID,DUPLICATE_YOUTUBE_STATUS_ID,$reason,$delete_status,$thumbnail);
					$user = $this->user_model->getUserById($user_id);
					//Email details available in this function already
					$to_email = $user['email'];
					videoStatusEmail(REJECTED_VIDEO_STATUS_ID,$id,$reason,$user['first_name'],$to_email);
				  }
				}
			} else{
				// @TODO Log error
				echo 'Problems creating the client';
			}

		} catch(Google_Service_Exception $e) {
			//print "Caught Google service Exception ".$e->getCode(). " message is ".$e->getMessage();
			//print "Stack trace is ".$e->getTraceAsString();
		}catch (Exception $e) {
			//print "Caught Google service Exception ".$e->getCode(). " message is ".$e->getMessage();
			//print "Stack trace is ".$e->getTraceAsString();
		}
		/////////////////////////////////////Video Status Update///////////////////////////////////////////////////
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
/* End of file users.php */
/* Location: ./application/controllers/backend/users.php */