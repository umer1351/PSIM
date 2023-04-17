<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Controller {


	//------------ Global data <Start>-----------------//	
	public $common_data = array();
	//------------ Global data <Start>-----------------//	
	function __construct() {
		parent::__construct();	 
		// print_r($_SERVER['HTTP_HOST']);
		//error(); 
		//session_start();
		//I.E Fix: Holds SESSION accross the DOMAIN 
		header('P3P: CP="CAO PSA OUR"'); 	
		//------------ Model Functions <Start>-----------------//
		$this->load->model('frontend/user_model');
		$this->load->model('frontend/profile_model');
		$this->load->model('frontend/Message_model');
		$this->load->model('frontend/page_model');
	    $this->load->model('frontend/portfolio_model');
	    $this->load->model('frontend/job_model');
	    $this->load->model('frontend/Sp_event_model');
	    $this->load->model('frontend/Review_model');
	    $this->load->model('frontend/Transactions_model');
		//------------ Model Functions <End>-----------------//	

				
		//------------ XAJAX <Start> -----------------//
		$this->xajax->registerFunction(array('logoutAjax', $this, 'logoutAjax'));
		$this->xajax->registerFunction(array('loginByFacebook', $this, 'loginByFacebook'));
		$this->xajax->registerFunction(array('MGRequestAjax', $this, 'MGRequestAjax'));
		$this->xajax->registerFunction(array('editTalentProfileAjax', $this, 'editTalentProfileAjax'));
		$this->xajax->registerFunction(array('portfolioVideoUploadAjax', $this, 'portfolioVideoUploadAjax'));
		$this->xajax->registerFunction(array('editProfileAjax', $this, 'editProfileAjax'));
		
		//$this->xajax->registerFunction(array('showOfferModalAjax', $this, 'showOfferModalAjax'));
		$this->xajax->configure('javascript URI',base_url().'xajax' );
		$this->xajax->processRequest();
		$this->xajax_js = $this->xajax->getJavascript( base_url() ); 	
		//------------ XAJAX <End> -----------------//
		
		$this->output->enable_profiler(false);	                    
	}
	
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: MGRequestAjax
	02: logoutAjax
	03: loginByFacebook
	04: bookmarkTalentAjax
	05: removeCartTalentAjax
	06: bookTalentAjax
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: MGRequestAjax
	 *
	 * This function is the calling point to every other ajax function 
	 *
	 */
	public function MGRequestAjax($functionName,$param=null) {
		$objResponse = new xajaxResponse();
		$objResponse = $this->$functionName($param);
        return $objResponse;   
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/	
	 /**
	* 02: logoutAjax
	*
	* This function is to logout admin
	*
	*/
	public function logoutAjax() { 
		// echo "A";
		// exit;
		$objResponse = new xajaxResponse();
		//unsetting user session
		setcookie(WEBSITE_COOKIE, "", time()-36000000);
		setcookie('is_wowzer_logged_in', "", time()-36000000);
		$this->session->unset_userdata(WEBSITE_CART_SESSION);
		$this->session->unset_userdata(WEBSITE_FRONTEND_SESSION);
		$this->session->unset_userdata('profile_visited');
		$this->session->unset_userdata('Name');
		$this->session->unset_userdata('premium_subscription');
		header ("location: https://psim.org.pk/");
		$objResponse->script( "window.location = 'http://demo.psim.org.pk/';" );
		
		// while(!$this->session->userdata(WEBSITE_FRONTEND_SESSION)) {
			return $objResponse;
		// }
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 03: loginByFacebook
	 *
	 * This function is for Register/Login with facebook.
	 *
	 */
    public function loginByFacebook() {
		// Checking whether parametres are nullor not
			$objResponse = new xajaxResponse();
			
			//get user data from facebook
			$user_fb_data = fbh_initialize_fb_php();
			if(!empty($user_fb_data)) {
				$name = explode(' ',$user_fb_data['name']);
				$first_name = $name[0];
				$last_name = $name[1];
				$email = $user_fb_data['email'];
				$profile_image =  "http://graph.facebook.com/".$user_fb_data['id']."/picture?type=large";
				$fb_id = $user_fb_data['id'];
				$file_name = $fb_id.'.jpg';
				copy($profile_image,ASSET_FRONTEND_UPLOADS_PATH.'profile/'.$fb_id.'.jpg');
				//$role = $_SESSION['fb_role'];
				//login user 
				$userExist = $this->user_model->isFBUserEmailExist($email);
				
				$user_id = $this->user_model->loginByFacebook($fb_id,$first_name,$last_name,$email,$file_name);
				if($user_id) {
					$this->session->set_userdata(WEBSITE_FRONTEND_SESSION , $user_id);
					setcookie('is_wowzer_logged_in', '1', time() + (86400 * 30), "/");
					if(empty($userExist)) {
						$sender = NO_REPLY;
						$receiver = $email;
						$subject = "Account Confirmation";
						$msg = "Dear ".ucfirst($first_name)."!<br /><br />
									You have been successfully logged in to Wowzer using Facebook. Please complete your profile to get listed.<br /><br />
									Regards,<br /> Support Team";
						sendEmail($sender,$receiver,$msg,$subject);
						//Admin notification email
						//Admin notification email
						$sender1 = NO_REPLY;
						$settings = $this->user_model->getSiteSettings();
						$receiver1 = $settings['contact_email'];
						$subject1 = "New Account Pending Approval";
						$msg1 = "Hello Administrator!<br /><br />
									A new user has just registered on Wowzer through facebook.<br /><br />
									Regards,<br /> Support Team";
						sendEmail($sender1,$receiver1,$msg1,$subject1);
						$objResponse->script('location.href="'.ROUTE_PROFILE.'"');
					} else {
						$objResponse->script('location.href="'.ROUTE_PROFILE.'"');
					}
					$this->session->unset_userdata('fb_role');
				}
			}
        return $objResponse;
    }
    /*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 04: bookmarkTalentAjax
	 *
	 * This function is used for bookmarking talent.
	 *
	 */
	function bookmarkTalentAjax($param=null){
		// Checking whether parametres are nullor not
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$talent_id = $param['talent_id'];
			$employer_id = $param['employer_id'];
			$status = $param['status'];
			$bookmark = $this->search_model->bookmarkTalent($talent_id,$employer_id,$status);
			if($bookmark){
				if($status == DELETED_STATUS_ID){
					$objResponse->script( "$('#bookmark_".$talent_id." .favorite_button').attr('onclick','bookmarkTalent(".$talent_id.",".$employer_id.",".ACTIVE_STATUS_ID.")');");
					$objResponse->script( "$('#bookmark_".$talent_id." .favorite_button i').removeClass('fa-heart');");
					$objResponse->script( "$('#bookmark_".$talent_id." .favorite_button i').addClass('fa-heart-o');");
				} else {
					$objResponse->script( "$('#bookmark_".$talent_id." .favorite_button').attr('onclick','bookmarkTalent(".$talent_id.",".$employer_id.",".DELETED_STATUS_ID.")');");
					$objResponse->script( "$('#bookmark_".$talent_id." .favorite_button i').removeClass('fa-heart-o');");
					$objResponse->script( "$('#bookmark_".$talent_id." .favorite_button i').addClass('fa-heart');");
				}
			} 
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 05: removeCartTalentAjax
	 *
	 * This function is used for removing talent from cart.
	 *
	 */
	function removeCartTalentAjax($param=null){
		// Checking whether parametres are nullor not
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$talent_id = $param['talent_id'];
			$cart_talents = $this->session->userdata(WEBSITE_CART_SESSION);
			$pos = array_search($talent_id, $cart_talents);
			unset($cart_talents[$pos]);
			$this->session->set_userdata(WEBSITE_CART_SESSION,$cart_talents);

			$cart_talent_id = "";
			if(isset($cart_talents) && !empty($cart_talents)){
				foreach($cart_talents as $cart_talent_session){
					$cart_talent_id .= $cart_talent_session."-";
				}
				$objResponse->script('$("#talent_ids").val("'.$cart_talent_id.'");');
			} else {
				$objResponse->script('$("#talent_ids").val("'.$cart_talent_id.'");');
				$objResponse->script('$("#book_more").hide();');
				$objResponse->script('$("#talent_count").hide();');
				$objResponse->script('$("#no_talent_cart").show();');
				$objResponse->script('$("#talent_cart").hide();');
			}

			$objResponse->script('$("#talent_count").text("");');
			$objResponse->script('$("#talent_count").text("'.count($cart_talents).'");');
			$objResponse->script('$(".talent-cart-'.$talent_id.'").remove();');
			$objResponse->script('$("#listing'.$talent_id.'").removeClass("in_cart");');
			$objResponse->script('$("#listingSmall'.$talent_id.'").removeClass("in_cart");');
			$objResponse->script('$(".already_in_cart").hide();');
			
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 06: bookTalentAjax
	 *
	 * This function is used to add talent in the cart and book it.
	 *
	 */
	function bookTalentAjax($param=null){
		// Checking whether parametres are nullor not
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$employer_id = $param['employer_id'];
			$talent_ids = $param['talent_ids'];
			$talent_ids = explode("-",rtrim($talent_ids,"-"));
			$c_talent_ids = array();
			foreach($talent_ids as $talent_id){
				$c_talent_ids[$talent_id][] = $talent_id;
			}
			$job_title = $param['job_title'];
			$job_category = $param['job_category'];
			$job_start_date = $param['job_start_date'];
			$job_start_date = strtotime($job_start_date);
			$job_end_date = $param['job_end_date'];
			$job_end_date = strtotime($job_end_date);
			$job_compensation = $param['job_compensation'];
			$job_description = $param['job_description'];
			// check if talent is not already booked
			$booked_talents = array();
			foreach($talent_ids as $key=>$talent_id){
				$results = $this->portfolio_model->getTalentUnavailability($talent_id,$job_start_date,$job_end_date);
				if($results != 0){
					$booked_talents[$key] = $results;
				}
			}
			foreach($booked_talents as $booked_talent){
				$c_talent_ids[$booked_talent][] = 0;
			}
			if(!empty($booked_talents)){
			$all_users = array();
				foreach($c_talent_ids as $key=>$talent_id){
					$user = $this->user_model->getUserById($talent_id[0]);
					$all_users[$key] = $user;
					if(isset($talent_id[1])){
						$all_users[$key]['exist'] = 1;
					} else {
						$all_users[$key]['exist'] = 0;
					}
				}
				$html = "";
				foreach($all_users as $all_user){
					$exist_text = ($all_user['exist'] == 1)? "Talent is busy in the requried dates":"";
					$html .= '<li class="media talent-cart-'.$all_user['id'].'"><div class="media-left media-middle" style="width: 20%;"><a href="'.ROUTE_PORTFOLIO_DETAIL.'?talent='.$all_user['id'].'"><img src="'.ASSET_UPLOADS_FRONTEND_DIR.'profile/'.$all_user['profile_image'].'" alt=""></a></div><div class="media-body media-middle"><h4><a href="'.ROUTE_PORTFOLIO_DETAIL.'?talent='.$all_user['id'].'">'.ucwords($all_user['first_name'].' '.$all_user['last_name']).'</a></h4><h4>'.$exist_text.'</h4></div><div class="media-body media-middle"><a href="javascript:void(0)" class="remove" onclick="removeTalent('.$all_user['id'].')" title="Remove this item"><i class="rt-icon2-trash highlight"></i></a></div></li>';
				}
				$objResponse->script('$("#book_talent_button").prop("disabled",false);');
				$objResponse->script('$("#booked_talents_list").html("");');
				$objResponse->script("$('#booked_talents_list').html('".$html."');");
				$objResponse->script('$("#booked_talents").modal("show");');
				$objResponse->script('$("#complete_assignment_modal").modal("hide");');
			} else {
				$employer = $this->user_model->getUserById($employer_id);
				$username = $employer['first_name']." ".$employer['last_name'];
				$job_id = $this->portfolio_model->bookTalentDetails($employer_id,$talent_ids,$job_title,$job_category,$job_start_date,$job_end_date,$job_compensation,$job_description);
				talentBookingEmail($job_id,$username,ADMIN_EMAIL);
				$this->session->unset_userdata(WEBSITE_CART_SESSION);
				$objResponse->script('location.href = "'.ROUTE_EMPLOYER_JOBS.'"');
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
	/*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: commonFunction
	02: isLoggedIn
	03: isUserLoggedIn
	04: showError
	05: uploadYoutubeVid
	06: checkVideoStatus
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 01: commonFunction
	*
	* This function is used to save user common data which can be used globaly in this website
	*
	*/
	public function commonFunction(){
		
		 if($this->session->userdata(WEBSITE_FRONTEND_SESSION)) {
				$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
				$this->common_data['user_data'] = $this->user_model->getUserById($user_id);
				// //$this->common_data['total_lessons'] = $this->profile_model->getTutorTotalLessons($user_id);
				$this->common_data['user_id'] = $user_id;

					$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
					$data['messages']= $this->Message_model->getAllMessages($user_id);		
					$count = 0;
					foreach ($data['messages'] as $key => $value) {
						$data['messages'][$key]['sender_image'] = $this->Message_model->getSenderImage($value['sender_id']);
						$data['messages'][$key]['sender_name'] = $this->Message_model->getSenderName($value['sender_id']);
						if ($value['notification'] == '1') {
							$count++;
						}
					}
					$data['common_data']['message_count'] = $count;
					$data['message_count'] = $count;
					if ($count > 0) {
						$this->common_data['message_count'] = $count;
					}
					
					// print_r($data['common_data']['message_count']);
					// exit();
				// //$this->common_data['message_count'] = $this->message_model->getUnreadMsgsByReceiverId($user_id);
				// $this->common_data['site_settings'] = $this->user_model->getSiteSettings();
				//$tutor_details = $this->profile_model->getTutorDetailsById($user_id);
				if(!empty($tutor_details)){
					//$level_update = $this->user_model->tutorLevelUpdate($user_id,$tutor_details['level_id']);
				}
		 }
		 else{
				$this->common_data['user_data'] = '';
				// $this->common_data['site_settings'] = $this->user_model->getSiteSettings();
		 }	 
				// $this->common_data['social_links'] = $this->page_model->getPageData(SOCIAL_LINKS);
				// $this->common_data['home_about'] = $this->page_model->getHomeAboutAllData(HOMEPAGE);
				// $this->common_data['contact_us'] = $this->page_model->getPageData(CONTACT_US);
				// //pr($this->common_data['contact_us']); die();
				// $this->common_data['cart_talents'] = "";
				// $cart_talents = $this->session->userdata(WEBSITE_CART_SESSION);
				// if(isset($cart_talents) && !empty($cart_talents)){
				// 	foreach($cart_talents as $key=>$talent){
				// 		$this->common_data['cart_talents_common'][$key] = $this->user_model->getUserById($talent);
				// 	}
				// }
				// $this->common_data['all_categries'] = $this->profile_model->getCategories();
	}
	/**
	* 02: isLoggedIn
	* 
	* This function checks whether admin is logged in or not, if user is not logged n it will redirect to the login page
	*
	*/	
	public function isLoggedIn() {
		if($this->session->userdata(WEBSITE_FRONTEND_SESSION)) {
			return $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		}else {  
		
			header("Location: ".SERVER_URL);
			echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
   			die();
        }			
	}
	/**
	* 03: isUserLoggedIn
	* 
	* This function is used to prevent redirection to the login page without logout
	*
	*/
	public function isUserLoggedIn() {
		if($this->session->userdata(WEBSITE_FRONTEND_SESSION)) {
			header("Location: ".ROUTE_PROFILE);
   			die();
		}else {    
			return false;
        }
	}
	
	/**
	* 04: showError
	* 
	* This function is used to show 404 page incase of url not found
	*
	*/
    public function showError() {
		$data = array();
		$this->commonFunction();
		$data['common_data'] = $this->common_data;
		$template['body_content'] = $this->load->view('frontend/error/404', $data, true);
		$this->load->view('frontend/layouts/template', $template, false);
	}
	
	/**
	* 05: uploadYoutubeVid
	* 
	* This function is used to upload video in YouTube
	*
	*/
	public function uploadYoutubeVid($vid_path,$vid_title) {
		$key = file_get_contents(ROOT_DIRECTORY.'token.txt');
		//print_r($key); die();
		require_once ROOT_DIRECTORY.'vendor/autoload.php';

		$client_id = YOUTUBE_CLIENT_ID;
		$client_secret = YOUTUBE_CLIENT_SECRET;

		$videoPath = $vid_path;
		//$videoTitle = "PRSRV Render";
		$videoTitle = $vid_title;
		$videoDescription = "";
		$videoCategory = "22";
		$videoTags = array();

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
		 
				// Create a snipet with title, description, tags and category id
				$snippet = new Google_Service_YouTube_VideoSnippet();
				$snippet->setTitle($videoTitle);
				$snippet->setDescription($videoDescription);
				$snippet->setCategoryId($videoCategory);
				$snippet->setTags($videoTags);
				$snippet->setDefaultLanguage("en");
				$snippet->setDefaultAudioLanguage("en");

				$recordingDetails = new Google_Service_YouTube_VideoRecordingDetails();
				$recordingDetails->setLocationDescription("United States of America");
				$recordingDetails->setRecordingDate("2016-01-20T12:34:00.000Z");
				$locationdetails = new Google_Service_YouTube_GeoPoint();
				$locationdetails->setLatitude("38.8833");
				$locationdetails->setLongitude("77.0167");
				$recordingDetails->setLocation($locationdetails);

				// Create a video status with privacy status. Options are "public", "private" and "unlisted".
				$status = new Google_Service_YouTube_VideoStatus();
				$status->setPrivacyStatus("private");
				$status->setPublicStatsViewable(false);
				$status->setEmbeddable(true); // Google defect still not editable https://code.google.com/p/gdata-issues/issues/detail?id=4861
		 
				// Create a YouTube video with snippet and status
				$video = new Google_Service_YouTube_Video();
				$video->setSnippet($snippet);
				$video->setRecordingDetails($recordingDetails);
				$video->setStatus($status);
		 
				// Size of each chunk of data in bytes. Setting it higher leads faster upload (less chunks,
				// for reliable connections). Setting it lower leads better recovery (fine-grained chunks)
				$chunkSizeBytes = 1 * 1024 * 1024;

				// Setting the defer flag to true tells the client to return a request which can be called
				// with ->execute(); instead of making the API call immediately.
				$client->setDefer(true);

				// Create a request for the API's videos.insert method to create and upload the video.
				$insertRequest = $youtube->videos->insert("status,snippet,recordingDetails", $video);
				//print_r($insertRequest); 
				// Create a MediaFileUpload object for resumable uploads.
				$media = new Google_Http_MediaFileUpload(
					$client,
					$insertRequest,
					'video/*',
					null,
					true,
					$chunkSizeBytes
				);
				$media->setFileSize(filesize($videoPath));

				// Read the media file and upload it chunk by chunk.
				$status = false;
				$handle = fopen($videoPath, "rb");
				while (!$status && !feof($handle)) {
					$chunk = fread($handle, $chunkSizeBytes);
					$status = $media->nextChunk($chunk);
				}

				fclose($handle);

				/**
				 * Video has successfully been uploaded, now lets perform some cleanup functions for this video
				 */
				if ($status->status['uploadStatus'] == 'uploaded') {
					// Actions to perform for a successful upload
					$video_details['id'] = $status->id;
					$video_details['thumbnail_url'] = $status->snippet['thumbnails']['high']['url'];
					//print_r("VideoID: ".$status->id."<br>");
					//print_r($status->snippet);
					//print_r("Thumbnail URL: ".$status->snippet['thumbnails']['high']['url']."<br>");
					return $video_details;
				}
				//print_r($status->status);
				// If you want to make other calls after the file upload, set setDefer back to false
				$client->setDefer(false);

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

	}
	
	
	/**
	* 06: checkVideoStatus
	* 
	* This function is used to check YouTube video status using API
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
					$delete_response = $this->profile_model->changeVideoStatus($id,REJECTED_VIDEO_STATUS_ID,DELETED_YOUTUBE_STATUS_ID,$reason,$delete_status,$thumbnail);
					if($current_status == APPROVED_VIDEO_STATUS_ID || $current_status == PENDING_VIDEO_STATUS_ID){
						$user = $this->user_model->getUserById($user_id);
						//Email details available in this function already
						$to_email = $user['email'];
						videoStatusEmail(DELETED_YOUTUBE_STATUS_ID,$id,$reason,$user['first_name'],$to_email);
					}
					
				} else {
				  $thumbnail = $listResponse[0]->snippet['thumbnails']['high']['url'];
				  $this->profile_model->changeVideoThumbnail($id,$thumbnail);
				  // Since the request specified a video ID, the response only
				  // contains one video resource.
				  $video = $listResponse[0];
				  if($video->status['uploadStatus']=='rejected'){
					$delete_status = 0;
					$reason = $video->status['rejectionReason']; 
					$delete_response = $this->profile_model->changeVideoStatus($id,REJECTED_VIDEO_STATUS_ID,DUPLICATE_YOUTUBE_STATUS_ID,$reason,$delete_status,$thumbnail);
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
}
/* End of file common.php */
/* Location: ./application/controllers/frontend/common.php */
