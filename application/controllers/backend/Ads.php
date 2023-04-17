<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends Backendcommon {
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
		$this->data['module'] = "10";	
		$this->data['moduleName'] = "Ads";
		$this->data['moduleLink'] = BACKEND_ADS_URL;
		$this->data['page'] = 'ads';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>  
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: addNewAdAjax
	02: updateAdAjax
	03: changeAdStatusAjax
	--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 01: addNewAdAjax
	 *
	 * This function is used to add new website-ads
	 * 
	 *
	 */
	public function addNewAdAjax($param = null){
		//Getting Variables	
		$dimension_id = $_POST['dimension_id'];
		$link = $_POST['link'];
		$width = $_POST['width'];
		$height = $_POST['height'];
		
		//Uploading Image
		$file_element_name = 'imgInp';  
		$config['upload_path'] = ASSET_BACKEND_UPLOADS_PATH."ads";
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_width'] = $width;
		$config['max_height'] = $height;
		$config['min_width'] = $width;
		$config['min_height'] = $height;
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
		$file_name = $data['upload_data']['file_name'];
		//upload file <end>
		$qResponse = $this->ad_model->insertAd($dimension_id,$link,$file_name);
		if($qResponse){
			//Redirect to User profile page
			$msg = 'Ad created successfully!';
			$status = 1;
			$url = BACKEND_ADS_URL;
		}else {
			$msg = 'Ad not created successfully!'; 
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
	 * 02: updateAdAjax
	 *
	 * This function is used to update website-ads
	 * 
	 *
	 */
	public function updateAdAjax($param = null){
		//Getting Variables	
		$ad_id = $_POST['ad_id'];
		$dimension_id = $_POST['dimension_id'];
		$link = $_POST['link'];
		$width = $_POST['width'];
		$height = $_POST['height'];
		$image_upload = $_POST['image_upload'];
		//Getting Current Ad Image
		$ad_image = $this->ad_model->getAdById($ad_id);
		if($image_upload==1){
			//Uploading Image
			$file_element_name = 'imgInp';  
			$config['upload_path'] = ASSET_BACKEND_UPLOADS_PATH."ads";
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['max_width'] = $width;
			$config['max_height'] = $height;
			$config['min_width'] = $width;
			$config['min_height'] = $height;
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
			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$ad_image['url']);
		}else{
			$file_name = $ad_image['url'];
		}
		
		//upload file <end>
		$qResponse = $this->ad_model->updateAd($ad_id,$dimension_id,$link,$file_name);
		if($qResponse){
			//Redirect to User profile page
			$msg = 'Ad updated successfully!';
			$status = 1;
			$url = BACKEND_ADS_URL;
		}else {
			$msg = 'Ad not updated successfully!'; 
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
	 * 03: changeAdStatusAjax
	 *
	 * This function is used to update status of website-ads
	 * 
	 *
	 */
	public function changeAdStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$ad_id = $param['ad_id'];
			$status = $param['status']; 
			$action_row_type = $param['action_row_type']; 
			$update_response = $this->ad_model->updateAdStatus($ad_id,$status);
			if($update_response){
			if(!empty($action_row_type)){
				$this->session->set_userdata('action_row',$action_row_type);
			}

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
	
	//FUNCTIONS LIST:
	//01: index
	//02: addAd
	//03: editAd
	//04: youtubeAds
	//04: youtubeAds
	//05: checkVideoStatus
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 01: index
	 *
	 * This function is the entery point to this class. 
	 * It shows website ads listing view
	 *
	 */
	 public function index() {
		$this->data['page'] = 'website-ads';
		$this->data['subModuleName'] = "Website Ads";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['ads'] = $this->ad_model->getAds();
		//pr($data['ads']); die();
		//pr($data['categories']); die();
		$template['body_content'] = $this->load->view('backend/ads/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 02: addAd
	 *
	 * This function is the entery point to this class. 
	 * It shows add new ad view to user
	 *
	 */
	 public function addAd() {
		$this->data['page'] = 'website-ads';
		$this->data['subModuleName'] = "Create Website Ad";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['dimensions'] = $this->ad_model->getAdDimensions(); 
		//pr($data['fields']); die();
		$template['body_content'] = $this->load->view('backend/ads/newAd', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 03: aditAd
	 *
	 * This function is the entery point to this class. 
	 * It shows edit existing ad view to user
	 * Time effort cost
	 */
	 public function editAd() {
		$this->data['page'] = 'website-ads';
		$this->data['subModuleName'] = "Edit Website Ad";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['dimensions'] = $this->ad_model->getAdDimensions(); 
		if(!isset($_GET['ad_id'])) {
            header("Location: ".BACKEND_ADS_URL);
            die();
        }
		$data['ad_id'] = $_GET['ad_id'];
		$data['ad'] = $this->ad_model->getAdById($data['ad_id'] );
		if(empty($data['ad'])){
			header("Location: ".BACKEND_ADS_URL);
            die();
		}
		$template['body_content'] = $this->load->view('backend/ads/editAd', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	
	/**
	 * 04: youtubeAds
	 *
	 * This function is the entery point to this class. 
	 * It shows YouTube ads listing view to the user
	 *
	 */
	public function youtubeAds() {
		$this->data['page'] = 'youtube-ads';
		$this->data['subModuleName'] = "YouTube Ads";
		$data = $this->data;
		$user_id = (isset($_GET['user_id']) && $_GET['user_id'] != 0)?$_GET['user_id']:0;
		$data['common_data'] = $this->common_data;
		$data['ads'] = $this->user_model->getUserPortfolioTypeById($user_id,MEDIA_VIDEO);
		$data['users'] = $this->user_model->getUsers(USER_ROLE_TALENT);
		if(!empty($data['ads'])){
			foreach($data['ads'] as $ad){
				$this->checkVideoStatus($ad['user_id'],$ad['id'],$ad['url'],$ad['status']);
			}
			$data['ads'] = $this->user_model->getUserPortfolioTypeById($user_id,MEDIA_VIDEO);
		}
		$template['body_content'] = $this->load->view('backend/ads/youtubeAds', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 05: checkVideoStatus
	 *
	 * This function is used to check YouTube video status before listing them
	 * 
	 *
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
/* End of file Ads.php */
/* Location: ./application/controllers/backend/ads.php */
