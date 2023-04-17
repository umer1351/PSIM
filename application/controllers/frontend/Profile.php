<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Umer-testing

//Hamza-testing
class Profile extends Common {
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
         $this->commonFunction();
         $this->isLoggedIn();
        //------------ Common Function <End> -----------------//
		//------------ Class Common Values <Start> -----------------//
		$this->data['module'] = "05";
		$this->data['moduleName'] = "Profile";
		$this->data['page'] = 'profile';
		$this->data['menu_number'] = EMLOYER_MENU_EDIT_ACCOUNT;
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: editProfileAjax
	02: roleConfirmationAjax
	03: changePasswordAjax
	04: bookTalentQueryAjax
	05: changeEmployerBookmarkStatusAjax
	06: showReviewModalAjax
	07: writeReviewAjax
	08: showEmployerPaymentModalAjax
	09: editEmployerPaymentAjax
	10: editTalentProfileAjax
	11: changeTalentJobStatusAjax
	12: editTalentPublicProfileAjax
	13: addTalentPaymentAjax
	14: addScheduleEntryAjax
	15: deleteScheduleEntryAjax
	16: portfolioImageUploadAjax
	17: deletePortfolioMediaAjax
	18: changePortfolioMediaStatusAjax
	19: changePortfolioFeaturedStatusAjax
	20: portfolioVideoUploadAjax
	21: cancelPortfolioMediaAjax
	22: profileImageUploadAjax
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 01: editProfileAjax
	*
	* This function edit user profile
	*
	*/
	public function editProfileAjax() {

		
	$objResponse = new xajaxResponse();
		//Getting Variables	
		$user_id = $_POST['user_id'];
		$user_role = $_POST['role'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$province = $_POST['province'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$institute = $_POST['Institute'];
		$password = $_POST['pwd'];
		$designation = $_POST['designation'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		// if ($user_role == '3') {
			$services = 'a';
			$about = 'a';
			$business_name = 'a';
			$about_me = '';
		// }elseif ($user_role == '2') {
			$about_me = 'a';
			$services = 'a';
			$about = 'a';
			$business_name = 'a';
		// }
				

		
		// $is_base64_method = $_POST['is_base64_method']; 
		// $base64 = $_POST['base64']; 
	
		//Getting Current Profile Image
		$user_image = $this->user_model->getUserById($user_id);
		//Uploading Image
		// if($is_base64_method==1){
		// 	$fileUniqName = upload_image_base64img($base64);
		// 	$file_name = (($fileUniqName==0)?$user_image['profile_image']:$fileUniqName);	
		// }else{
			$file_element_name = 'imgInp';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."profile";
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					//echo json_encode($response);
					// echo $msg;
					// die();
			}  else {
					$data = array('upload_data' => $this->upload->data());
			}
				//upload file <end>
				//validate image
			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$user_image['profile_image']);
		// }
			// echo $file_name; die();
			//Check If user With Phone Number Exist
			$emailResponse = $this->profile_model->isEmailExist($email,$user_id);
				if($emailResponse != 0) {
					$msg = 'User with this email already exists';
					$status = 2;
					$url = "";
				}else {
					$qResponse = $this->profile_model->update($institute, $designation, $user_id,$business_name,$first_name,$last_name,$province,$city,$country,$phone,$services,$address,$about,$file_name,$about_me,encrypt_url($password));

					// print_r($qResponse);
					// redirect("frontend/profile/index","refresh");

					if($qResponse){
//      echo "
// <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
//      <script> 
//      $('#show_pop_modal').hide();
//   </script>";

					}else {
						$msg = 'Profile not updated successfully'; 
						$status = 0;
					}	
				}
		// $response['status'] = $status;
		// $response['response'] = $msg;
		// $response['url'] = $url;
				// redirect($_SERVER['HTTP_REFERER']);
				// 
// 				echo"<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'>

			
// 				window.location.href = 'http://dev.appstersinc.com/plaany/plaany_web/edit-profile';
			

// </script>
// ";
// return $objResponse ;
		echo true;
		// die();

    }

    public function delete_account($param='')
    {
    	if ($param != null) { 
			$user_id = $param['user_id'];
			$objResponse = new xajaxResponse();
			$delAccount = $this->user_model->deleteAccount($user_id);
			session_destroy();
			if($delAccount){
				$objResponse->script( "window.location = '".ROUTE_LOGIN."';" );
			}
		}
		return $objResponse;
    }
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 02: roleConfirmationAjax
	*
	* This function helps user to select role (talent/employer) after login with facebook
	*
	*/
	function roleConfirmationAjax($param=null){
		// Checking whether parametres are nullor not
		if ($param != null) { 
			$role = $param['role'];
			$user_id = $param['user_id'];
			$newsletter = $param['newsletter'];
			$objResponse = new xajaxResponse();
			$changeRole = $this->user_model->changeUserRole($user_id,$role,$newsletter);
			if($changeRole){
				$objResponse->script( "window.location = '".ROUTE_PROFILE."';" );
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/

	/**
	* 01: changePassword
	*
	* This function is the entery point to this class. 
	* It shows change password view to the admin 
	*
	*/
	public function changePassword() { 
		$this->data['subModuleName'] = "Change Password";	
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['common_data']['page'] = 'account';
		$template['body_content'] = $this->load->view('frontend/profile/changePassword', $data, true);
		$this->load->view('frontend/layouts/template', $template, false);
		
    }

	/**
	* 03: changePasswordAjax
	*
	* This function helps user to change his password
	*
	*/
    public function changePasswordAjax($param=null) {

		// Checking whether parametres are nullor not
		if ($param != null) { 
			$objResponse = new xajaxResponse();
			$user_id = $param['user_id'];
			$current_password = $param['current_password'];
			$new_password = $param['new_password1'];
			
			//verify user password using user id
			$db_user = $this->user_model->getUserById($user_id);
			if(!empty($db_user)){
				//does db password match with current password?
				if(encrypt_url($current_password) == $db_user['password']) {
					//encrypt password
					$new_password = encrypt_url($new_password);
					//Update new password
					$this->profile_model->updatePassword($user_id,$new_password);
					$msg = "Password has been changed successfully";
					$url = ROUTE_PROFILE;
					$objResponse->script('$("#changePasswordForm .successMsg").text("Your password has been changed ");');
				} else {
						$objResponse->script('$("#changePasswordForm .errorMsg").text("Invalid current password");'); 
				}
			}
		}
		return $objResponse;
    }


    public function verification($user) {
		// $user = decrypt_url($user);
		// print_r($user);
		// exit();

		// $user = decrypt_url($user);
		// $user_id = explode('-',$user);
$objResponse = new xajaxResponse();
		$login_user = $this->user_model->getUserById($user);

	
		session_destroy (); 
		//  $data = $this->data;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		/* $data['common_data'] = $this->common_data;
		$data['page'] = 'contact_us';
		$data['moduleName'] = 'Contact Us'; */

		$template['body_content'] = $this->load->view('frontend/login/AccountDeleted', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
		// $data['common_data'] = '';
		// $data['common_data']['user_data'] = 
	
		/* $data['common_data'] = $this->common_data;
		$data['page'] = 'contact_us';
		$data['moduleName'] = 'Contact Us'; */

		// $template['body_content'] = $this->load->view('frontend/login/AccountDeleted', $data, true);	
		// $this->load->view('frontend/layouts/template', $template, false);

		// $template['body_content'] = $this->load->view('frontend/login/AccountDeleted', $data, true);	
		// $this->load->view('frontend/layouts/template', $template, false);
			$qstr = "DELETE From user WHERE id = '".$user."'";
		 $query = $this->db->query($qstr);
		// 
		 // $objResponse->script( "window.location = '".ROUTE_THANKYOU_JOIN."';" );
		 // return $objResponse;
		// $timeStart = date('y-m-d h:i:s', $login_user['created']);

	    // $timeOfcalculation =  strtotime('+5 minutes', strtotime($timeStart));
	    // $timeEnd = date('y-m-d h:i:s', $timeOfcalculation);
	    // if (date('y-m-d h:i:s') < $timeEnd ) {

	  //   	if($login_user['confirmation_code'] != $user_id[1]){
	    		
			// header("Location: ".ROUTE_LINK_EXPIRE);
			// 	die();
			// } else if ($login_user['account_status'] == INACTIVE_STATUS_ID){

			// 	$this->user_model->changeUserLoginStatusToPending($login_user['id'],"2");
			// 	// print_r($login_user);
			// 	// $confirmation_url = 'http://dev.appstersinc.com/plaany/plaany_web/admin6y34q/service-provider';
			// 	// $msg = "Hello ".ucfirst($login_user['first_name'])."!<br /><br />
			// 	// 			You have been successfully registered with Wowzer. Please confirm their account by clicking the following link: <a href=".$confirmation_url.">".$confirmation_url."</a>.<br /><br />
			// 	// 			Regards,<br /> Support Team";
			// 	// $sender = NO_REPLY;
			// 	// $receiver = ADMIN_EMAIL;
			// 	// $subject = "User SignUp";										
			// 	// sendEmail($sender,$receiver,$mail,$subject);
			// 	// header("Location: ".ROUTE_TERMS_AND_CONDITIONS);

			// } else {
			// 	if ( $login_user['account_status'] == ACTIVE_STATUS_ID) {
			// 		$this->session->set_userdata(WEBSITE_FRONTEND_SESSION,$login_user['id']);
			// 		header("Location: ".ROUTE_PROFILE);
					
			// 	} else {
			// 		header("Location: ".ROUTE_TERMS_AND_CONDITIONS);
			// 	}
			// }
	    	
	  //   }else{
	  //   	header("Location: ".ROUTE_LINK_EXPIRE);
			// die();
	  //   }
	}



     public function confirmPasswordAjax($param=null) {

		// Checking whether parametres are nullor not
		if ($param != null) { 
			$objResponse = new xajaxResponse();
			$user_id = $param['user_id'];
			$current_password = $param['current_password'];
			
			
			//verify user password using user id
			$db_user = $this->user_model->getUserById($user_id);
			if(!empty($db_user)){
				$confirmation_code = generate_code();
				// print_r($confirmation_code);
				// exit();
				//does db password match with current password?
				if(encrypt_url($current_password) == $db_user['password']) {
					$confirmation_url = ROUTE_ACCOUNT_DELETE.'/'.$db_user['id'];
					$sender = 'no-reply@plaany.com';
						$receiver = $db_user['email'];
						$subject = "Delete Account";
						$msg = "Dear ".ucwords($db_user['first_name'])."!<br /><br />
									Please click on the link to delete your account: <a href=".$confirmation_url.">".$confirmation_url."</a>.<br /><br />
									Regards,<br/>Support Team";
									
						sendEmail($sender,$receiver,$msg,$subject);
						$con = decrypt_url($confirmation_code);
						$qstr = 'Update user set confirmation_code = "'.$confirmation_code.'" WHERE email = "'.$db_user['email'].'"';
						 $query = $this->db->query($qstr);
						 
						  $objResponse->script('$(".delete_acc").hide();');
						 $objResponse->script('$(".del_ac").text("An email has been sent to your email address. Please click the link in the email to delete your account. ");');
					// $delAccount = $this->user_model->deleteAccount($user_id);
					// session_destroy();
					// if($delAccount){
					// 	// $objResponse->script( "window.location = '".ROUTE_LOGIN."';" );
					// }
					//encrypt password
					// $new_password = encrypt_url($new_password);
					// //Update new password
					// $this->profile_model->updatePassword($user_id,$new_password);
					// $msg = "Password has been changed successfully";
					// $url = ROUTE_PROFILE;
					// $objResponse->script('$("#changePasswordForm .successMsg").text("Your password has been changed ");');
				} else {
						$objResponse->script('$(".errorMsg2").text("Invalid current password");'); 
				}
			}
		}
		return $objResponse;
    }
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	* 04: bookTalentQueryAjax
	*
	* This function helps user to contact admin to book talent
	*
	*/
	function bookTalentQueryAjax($param=null){
		// Checking whether parametres are nullor not
		if ($param != null) {
			$contact_subject = $param['subject'];
			$contact_message = $param['description'];
			$user_id = $param['user_id'];
			$user_detail = $this->user_model->getUserById($user_id);
			$contact_name = $user_detail['first_name']." ".$user_detail['last_name'];
			$contact_email = $user_detail['email'];
			//$contact_phone = $param['contact_phone'];
			$query_type = TALENT;
			$message_type_array = unserialize(CONTACT_MESSAGE_TYPE);
			$objResponse = new xajaxResponse();
			//check if user already exist in database
			$sender = "no-reply@".WEBSITE_URL;
			$receiver = $contact_email;
			$subject = "Contact Us - ".WEBSITE_NAME;
			$msg = "Dear ".ucfirst($contact_name).",<br /><br />
						This is an auto generated email from Wowzer's <a href='".ROUTE_CONTACT_US."'>Contact Us Bot</a>. You have just sent an email to <a href='".SERVER_URL."'>Wowzer</a>.<br>
						Your query details:<br /><br />
						<b>Name:</b> ".$contact_name."<br>
						<b>Email:</b> ".$contact_email."<br>
						<b>Query Purpose:</b> ".$message_type_array[$query_type]."<br>
						<b>Message:</b> ".$contact_message."<br>
						Sincerely,<br />
						Support Team";
			sendEmail($sender,$receiver,$msg,$subject);
			//Admin notification email
			$sender1 = $contact_email;
			$settings = $this->user_model->getSiteSettings();
			$receiver1 = $settings['contact_email'];
			$subject1 = $contact_subject;
			$msg1 = "Dear Admin,<br /><br />
						Someone recently contacted you from Wowzer's <a href='".ROUTE_CONTACT_US."'>Contact Us Bot</a>.<br>
						Query details:<br /><br />
						<b>Name:</b> ".$contact_name."<br>
						<b>Email:</b> ".$contact_email."<br>
						<b>Query Purpose:</b> ".$message_type_array[$query_type]."<br>
						<b>Message:</b> ".$contact_message."<br>
						Sincerely,<br />
						Support Team";
			sendEmail($sender1,$receiver1,$msg1,$subject1);
			$web_url = ROUTE_EMPLOYER_PROFILE_TALENT_BOOKING;
			$web_msg = "Email Sent Successfully!";
		
			$this->profile_model->addTalentQuery($user_id,$contact_subject,$contact_message);
			//echo "test"; die();
			$objResponse->script('successAlerts("'.$web_msg.'","'.$web_url.'");');
		} 
		return $objResponse;
	}
	/**
	* 05: changeEmployerBookmarkStatusAjax
	*
	* This function helps employer to change bookmark status of the particular talent
	*
	*/
    public function changeEmployerBookmarkStatusAjax($param=null) {
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$bookmark_id = $param['bookmark_id'];
			$status = $param['status']; 
			$update_response = $this->profile_model->updateEmployerBookmarkStatus($bookmark_id,$status);
			if($update_response){
				$objResponse->script('redirect("'.ROUTE_EMPLOYER_BOOKMARKS.'");');
			}
		}
		return $objResponse;
    }
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 06: showReviewModalAjax
	*
	* This function is used to show user a review modal
	*
	*/
	function showReviewModalAjax($param=null){
		// Checking whether parametres are nullor not
		if ($param != null) { 
			$objResponse = new xajaxResponse();
			$data['talent_id'] = $param['talent_id'];
			$data['employer_id'] = $param['employer_id'];
			$data['job_id'] = $param['job_id'];
			$data['review_type'] = $param['review_type'];
			$data['role'] = $param['role'];
			$data['review'] = "";
			if($data['review_type'] == "one"){
				$data['review'] = $this->profile_model->getReview($data['talent_id'],$data['employer_id'],$data['job_id'],$data['role'],0);
			}
			$html = $this->load->view('frontend/profile/reviewModal', $data, true);		
			return $objResponse->call("showReviewModal",$html);		
		}
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 07: writeReviewAjax
	*
	* This function is used to add a new review  
	*
	*/
    public function writeReviewAjax($param=null) {
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$review_id = $param['review_id'];
			$review = $param['review'];
			$rating = $param['rating'];
			$talent_id = $param['talent_id'];
			$employer_id = $param['employer_id'];
			$job_id = $param['job_id'];
			$review_type = $param['review_type']; 
			$role = $param['role'];
			if($review_type == "one"){
				//echo "if"; die();
				$update_response = $this->profile_model->writeReview($review_id,$review,$rating,$talent_id,$employer_id,$job_id,$role);
			}else {
				//echo "else"; die();
				$talent_ids = explode(',', $talent_id);
				//pr();
				foreach($talent_ids as $id){
					$review_data = $this->profile_model->getReview($id,$employer_id,$job_id,$role,0);
					$review_id = (!empty($review_data))?$review_data['id']:0;
					$update_response = $this->profile_model->writeReview($review_id,$review,$rating,$id,$employer_id,$job_id,$role);
				}
			}
			
			if($update_response){
				if($role == USER_ROLE_EMPLOYER){
					$url = ROUTE_EMPLOYER_JOB_DETAIL."?job_id=".$job_id;	
					$user_detail = $this->user_model->getUserById($employer_id);
					$subject = "Review Submitted by Employer - ".WEBSITE_NAME;
					$reviewer = "Employer";
				}else{
					$url = ROUTE_TALENT_JOB_DETAIL."?job_id=".$job_id;	
					$user_detail = $this->user_model->getUserById($talent_id);
					$subject = "Review Submitted by Talent - ".WEBSITE_NAME;
					$reviewer = "Talent";
				}
				
				$contact_name = $user_detail['first_name']." ".$user_detail['last_name'];
				$contact_email = $user_detail['email'];
				//check if user already exist in database
				$sender = NO_REPLY;
				$receiver = ADMIN_EMAIL;
				$edit_job_url = BACKEND_EDIT_JOB_URL."?job_id=".$job_id;
				$msg1 = "Hello Admin,<br /><br />
							".$reviewer." '".$contact_name."' has submitted review against job with ID# '".$job_id."', Kindly review at: <a href='".$edit_job_url."' href='_blank'>Link</a>.<br><br>
							Sincerely,<br />
							Support Team";
				sendEmail($sender,$receiver,$msg1,$subject);
				$msg = "Your review has been submitted successfuly";
				
				//Success Message
				$objResponse->script('$("#reviewModal").hide()');
				$objResponse->script('successAlerts("'.$msg.'","'.$url.'");');
				//$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
    }
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 08: showEmployerPaymentModalAjax
	*
	* This function is used to show add/edit payment modal
	*
	*/
	function showEmployerPaymentModalAjax($param=null){
		// Checking whether parametres are nullor not
		if ($param != null) { 
			$objResponse = new xajaxResponse();
			$data['job_id'] = $param['job_id'];
			$data['amount'] = $param['amount'];
			$data['payment_type'] = $param['payment_type'];
			$data['trans_id'] = $param['trans_id'];
			$data['employer_id'] = $param['employer_id'];
			$html = $this->load->view('frontend/profile/employerPaymentModal', $data, true);		
			return $objResponse->call("showEmployerPaymentModal",$html);		
		}
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 09: editEmployerPaymentAjax
	*
	* This function is used to add/edit employer payment against the job
	*
	*/
    public function editEmployerPaymentAjax($param=null) {
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$payment_type = $param['payment_type'];
			$trans_id = $param['trans_id']; 
			$job_id = $param['job_id'];
			$employer_id = $param['employer_id'];
			$amount = $param['amount'];
			$token = $param['token'];
			
			if($payment_type==PAYMENT_METHOD_CCARD){
				$user_detail = $this->user_model->getUserById($employer_id);
				$name = $user_detail['first_name']."".$user_detail['last_name'];
				$country = $user_detail['country_name'];
				$city = $user_detail['city_name'];
				$email = $user_detail['email'];
				$job_detail = "Payment for Job ID: ".$job_id;
				$co_response = $this->send2COPayment($amount,$name,$country,$city,$email,$job_detail,$token);
				if($co_response['response_code']=="APPROVED"){
					$trans_id = $co_response['trans_id'];
					if(empty($trans_id)){
						$objResponse->script('$("#employerPaymentForm .errorMsg").text("Invalids response from the payment vendor, kindly try again!");');
						$objResponse->script('$("#employer_payment_modal_submit").prop("disabled", false);');
						return $objResponse;
					}
					$update_response = $this->profile_model->updateEmployerPayment($job_id,$trans_id,$payment_type);
				}else{
					$error = $co_response['error'];
					$objResponse->script('$("#employerPaymentForm .errorMsg").text("'.$error.'");');
					$objResponse->script('$("#employer_payment_modal_submit").prop("disabled", false);');
					return $objResponse;
				}
				
			}else{
				$update_response = $this->profile_model->updateEmployerPayment($job_id,$trans_id,$payment_type);
			}
			
			
			if($update_response){
				$url = ROUTE_EMPLOYER_JOB_DETAIL."?job_id=".$job_id;	
				$user_detail = $this->user_model->getUserById($employer_id);
				$subject = "Payment Submitted by Employer - ".WEBSITE_NAME;
				
				$contact_name = $user_detail['first_name']." ".$user_detail['last_name'];
				$contact_email = $user_detail['email'];
				//check if user already exist in database
				$sender = NO_REPLY;
				$receiver = $contact_email;
				$edit_job_url = BACKEND_EDIT_JOB_URL."?job_id=".$job_id;
				$msg1 = "Dear Admin,<br /><br />
							Employer '".$contact_name."' has submitted payment against job with ID# '".$job_id."', Kindly review at: <a href='".$edit_job_url."' href='_blank'>Link</a>.<br><br>
							Sincerely,<br />
							Support Team";
				sendEmail($sender,$receiver,$msg1,$subject);
				$msg = "Your payment has been submitted successfuly";
				
				//Success Message
				$objResponse->script('$("#employer_payment_modal_submit").prop("disabled", false);');
				$objResponse->script('$("#makePayment").hide()');
				$objResponse->script('successAlerts("'.$msg.'","'.$url.'");');
				//$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
    }
	
	/**
	* 10: editTalentProfileAjax
	*
	* This function edit talent profile
	*
	*/
	public function editTalentProfileAjax() {
		//Getting Variables	
		$user_id = $_POST['user_id'];
		$company_name = "";
		// $title = $_POST['title'];
		// $gender = $_POST['gender'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$country_id = $_POST['country_id'];
		$country_name = $_POST['country_name'];
		$city = $_POST['city'];
		// $postal_code = $_POST['postal_code'];
		// $phone_code = $_POST['phone_code'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$about_me = $_POST['about_me'];
		$is_base64_method = $_POST['is_base64_method']; 
		$base64 = $_POST['base64']; 
		//pr($file_json); die();
		$bio = "";
	
		//Getting Current Profile Image
		$user_image = $this->user_model->getUserById($user_id);
		//Uploading Image
		if($is_base64_method==1){
			$fileUniqName = upload_image_base64img($base64);
			$file_name = (($fileUniqName==0)?$user_image['profile_image']:$fileUniqName);	
		}else{
			$file_element_name = 'imgInp2';  
			//$file_element_name = 'profile_image';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."profile";
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$this->load->library('upload', $config);
			//pr($_FILES[$file_element_name]); die();
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
			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$user_image['profile_image']);	
		}
		
			//echo $file_name; die();
			//Check If user With Phone Number Exist
			$emailResponse = $this->profile_model->isEmailExist($email,$user_id);
				if($emailResponse != 0) {
					$msg = 'User with this email already exists';
					$status = 2;
					$url = "";
				}else {
					$qResponse = $this->profile_model->update($user_id,$first_name,$last_name,$email,$country_id,$city,$phone,$address,$file_name,$about_me);

					if($qResponse){
						//Redirect to User profile page
						$msg = 'Profile updated successfully';
						$status = 1;
						$url = ROUTE_PROFILE;
					}else {
						$msg = 'Profile not updated successfully'; 
						$status = 0;
					}	
				}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
    }
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/** 
	* 11: changeTalentJobStatusAjax
	*
	* This function is used to update talent availability response in the DB
	*
	*/
	function changeTalentJobStatusAjax($param=null){
		// Checking whether parametres are nullor not
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$id = $param['id'];
			$talent_comments = $param['talent_comments'];
			$status = $param['status'];
			$update_event = $param['update_event'];
			$update_response = $this->profile_model->updateTalentJobStatus($id,$talent_comments,$status);
			if($update_response){
				if($update_event==1){
					if($status==TALENT_JOB_APPROVED_STATUS_ID){
						$removal_status = 0;
					}else if($status==TALENT_JOB_REMOVED_STATUS_ID){
						$removal_status = 1;
					}
					$this->profile_model->updateTalentUnavailabilityRemovalRequest($id,$removal_status);
				}
				$objResponse->script( "window.location.reload();");	
				//$objResponse->script('redirect("'.ROUTE_TALENT_JOBS.'");');
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 12: editTalentPublicProfileAjax
	*
	* This function edit talent public profile
	*
	*/
	public function editTalentPublicProfileAjax($param=null) {
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			//Getting Variables	
			$user_id = $param['user_id'];
			unset($param['user_id']);
			unset($param['fields']);
			/*
			echo $category_id = $param['category_id'];
			echo $country_id = $param['country_id'];
			echo $city = $param['city'];
			echo $fields = $param['fields'];
			echo $height = $param['height'];
			echo $weight = $param['weight'];
			echo $age = $param['age'];
			die(); */
			//pr($param); die();
			$update_response = $this->profile_model->updateTalentPublicProfileAjax($user_id,$param);
			
			if($update_response){
				$url = ROUTE_TALENT_PUBLIC_PROFILE;	
				$msg = "Your profile has been updated successfuly";
				
				//Success Message
				$objResponse->script('successAlerts("'.$msg.'","'.$url.'");');
				//$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
    }
	
	/**
	* 13: addTalentPaymentAjax
	*
	* This function is used to add talent subscription payment
	*
	*/
    public function addTalentPaymentAjax($param=null) {
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$token = $param['token']; 
			$payment_package = $param['payment_package'];
			$payment_type = $param['payment_type'];
			$trans_id = $param['trans_id']; 
			$coupon_code = $param['coupon_code']; 
			$amount = $param['package_amount']; 
			$user_id = $param['user_id'];
			$coupon_id = 0;
			$trans_exist = $this->profile_model->isTransIdExist($trans_id);
			if(!empty($trans_exist)){
				$objResponse->script('$("#talentPaymentForm .errorMsg").text("Transaction ID already used in another payment");');
				$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
				return $objResponse;
			}else if(!empty($coupon_code)){
				$coupon_exist = $this->profile_model->isCouponCodeExist($coupon_code);
				if(empty($coupon_exist)){
					$objResponse->script('$("#talentPaymentForm .errorMsg").text("Coupon code dose not exist");');
					$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
					return $objResponse;
				}else{
					$coupon_detail = $this->profile_model->getCouponById($coupon_exist['id']);
					$coupon_reserve_count = $this->profile_model->getCouponReserveCountById($coupon_exist['id']);
					if(date('Y-m-d', $coupon_detail['end_date']) < date("Y-m-d") || date('Y-m-d', $coupon_detail['start_date']) > date("Y-m-d")){
						$objResponse->script('$("#talentPaymentForm .errorMsg").text("Coupon used in this transaction is not valid");');
						$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
						return $objResponse;
					} else if($coupon_detail['use_cycle']==$coupon_detail['avail_count'] || $coupon_reserve_count>=$coupon_detail['use_cycle']){
						$objResponse->script('$("#talentPaymentForm .errorMsg").text("Coupon used in this transaction is no more valid");');
						$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
						return $objResponse;
					}else{
						if($coupon_detail['discount_type']==DISCOUNT_TYPES_AMOUNT){
							$amount = $amount - $coupon_detail['value'];
							
						}else if($coupon_detail['discount_type']==DISCOUNT_TYPE_PERCENTAGE){
							$amount = $amount - (($coupon_detail['value']*$amount)/100);
						}
						if($amount<0){
							$objResponse->script('$("#talentPaymentForm .errorMsg").text("Coupon used is not valid for selected payment package");');
							$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
							return $objResponse;
						}
						$coupon_id = $coupon_detail['id'];
						if($payment_type==PAYMENT_METHOD_CCARD){
							$user_detail = $this->user_model->getUserById($user_id);
							$name = $user_detail['first_name']."".$user_detail['last_name'];
							$country = $user_detail['country_name'];
							$city = $user_detail['city_name'];
							$email = $user_detail['email'];
							$package_details = $this->profile_model->getPricePackages($payment_package);
							$co_response = $this->send2COPayment($amount,$name,$country,$city,$email,$package_details[0]['name'],$token);
							if($co_response['response_code']=="APPROVED"){
								$trans_id = $co_response['trans_id'];
								if(empty($trans_id)){
									$objResponse->script('$("#talentPaymentForm .errorMsg").text("Invalids response from the payment vendor, kindly try again!");');
									$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
									return $objResponse;
								}
								$update_response = $this->profile_model->addTalentPayment($payment_package,$payment_type,$trans_id,$coupon_id,$amount,$user_id);
							}else{
								$error = $co_response['error'];
								$objResponse->script('$("#talentPaymentForm .errorMsg").text("'.$error.'");');
								$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
								return $objResponse;
							}
							
						}else{
							$update_response = $this->profile_model->addTalentPayment($payment_package,$payment_type,$trans_id,$coupon_id,$amount,$user_id);
						}
						
					}
				}
			}else{
				if($payment_type==PAYMENT_METHOD_CCARD){
					$user_detail = $this->user_model->getUserById($user_id);
					$name = $user_detail['first_name']."".$user_detail['last_name'];
					$country = $user_detail['country_name'];
					$city = $user_detail['city_name'];
					$email = $user_detail['email'];
					$package_details = $this->profile_model->getPricePackages($payment_package);
					$co_response = $this->send2COPayment($amount,$name,$country,$city,$email,$package_details[0]['name'],$token);
					if($co_response['response_code']=="APPROVED"){
						$trans_id = $co_response['trans_id'];
						if(empty($trans_id)){
							$objResponse->script('$("#talentPaymentForm .errorMsg").text("Invalids response from the payment vendor, kindly try again!");');
							$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
							return $objResponse;
						}
						$update_response = $this->profile_model->addTalentPayment($payment_package,$payment_type,$trans_id,$coupon_id,$amount,$user_id);
					}else{
						$error = $co_response['error'];
						$objResponse->script('$("#talentPaymentForm .errorMsg").text("'.$error.'");');
						$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
						return $objResponse;
					}
					
				}else{
					$update_response = $this->profile_model->addTalentPayment($payment_package,$payment_type,$trans_id,$coupon_id,$amount,$user_id);
				}
			}
			
			if($update_response){
				$url = ROUTE_TALENT_PAYMENT;	
				$user_detail = $this->user_model->getUserById($user_id);
				$subject = "Payment Submitted by Talent - ".WEBSITE_NAME;
				
				$contact_name = $user_detail['first_name']." ".$user_detail['last_name'];
				$contact_email = $user_detail['email'];
				//check if user already exist in database
				$sender = NO_REPLY;
				$receiver = ADMIN_EMAIL;
				$edit_job_url = BACKEND_TRANSACTION_DETAIL_URL."?id=".$update_response;
				$msg1 = "Hello Admin,<br /><br />
							Talent '".$contact_name."' has submitted the contract payment, Kindly review at: <a href='".$edit_job_url."' href='_blank'>Link</a>.<br><br>
							Sincerely,<br />
							Support Team";
				sendEmail($sender,$receiver,$msg1,$subject);
				$msg = "Your payment has been submitted successfuly";
				$objResponse->script('$(".tab-content").removeClass("profile-custom-overlay");');
				//Success Message
				$objResponse->script('successAlerts("'.$msg.'","'.$url.'");');
				//$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
    }
	
	/**
	* 14: addScheduleEntryAjax
	*
	* This function is used to add schedule entry for the talent
	*
	*/
	function addScheduleEntryAjax($param=null){
		// Checking whether parametres are nullor not
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$user_id = $param['user_id'];
			$date = $param['date'];
			$date = strtotime($date);
			$update_response = $this->profile_model->addScheduleEntry($user_id,$date);
			/* if($update_response){
				$objResponse->script( "window.location.reload();");	
			} */
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	* 15: deleteScheduleEntryAjax
	*
	* This function is used to delete schedule entry for the talent
	*
	*/
	function deleteScheduleEntryAjax($param=null){
		// Checking whether parametres are nullor not
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$user_id = $param['user_id'];
			$date = $param['date'];
			$date = strtotime($date);
			$event_id = $param['event_id'];
			$talent_job_detail_id = $param['talent_job_detail_id'];
			$is_wowzer_job = $param['is_wowzer_job'];
			if($is_wowzer_job==1){
				return $objResponse->call("change_talent_job_status",$talent_job_detail_id,REJECTED_TALENT_JOB_STATUS_ID,'Request to free the slot','changeTalentJobStatus','1');		
			}else{
				$update_response = $this->profile_model->deleteScheduleEntry($user_id,$date);
				if($update_response){
					$objResponse->script( "$('#calendar').fullCalendar('removeEvents','".$event_id."');");	
				} 
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	* 16: portfolioImageUploadAjax
	*
	* This function is used to upload portfolio images of the talent
	*
	*/
	public function portfolioImageUploadAjax(){
		if (!empty($_FILES)) {
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			$upload_limit = $this->profile_model->getPortfolioUploadLimit();
			$current_count = $this->profile_model->getPortfolioImageCount($user_id);
			$to_be_count = $current_count+1;
			
			if($to_be_count > $upload_limit){
				//alert("You have exceeded maximum limit for image upload");
				$msg = "You have exceeded maximum limit for image upload"; 
				$status = 2;
				$response['status'] = $status;
				$response['response'] = $msg;
				echo json_encode($response);
				die();					
			}
			//echo "test"; die();
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			//$fileType = $_FILES['file']['type'];
			$fileType = 2;
			$fileSize = round(($_FILES['file']['size']/1024/1024),2);
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."portfolio/images";
			$config['allowed_types'] = 'jpg|png|jpeg';
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
				$id = $this->profile_model->uploadPortfolioImage($user_id,$file_name,MEDIA_IMAGE);
				$images = $this->profile_model->getLastFileAdded($id);
				echo json_encode($images);
				die();
			}
        }
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 17: deletePortfolioMediaAjax
	*
	* This function is used to delete the talent portfolio (video / image)
	*
	*/
	public function deletePortfolioMediaAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		
		$portfolio_id = (isset($param['portfolio_id']) && $param['portfolio_id']!="")?$param['portfolio_id']:0;
		$status = $param['status'];
		// Changing user status in DB
		$delete_response = $this->profile_model->changePortfolioMediaStatus($portfolio_id,$status);
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 18: changePortfolioMediaStatusAjax
	*
	* This function is used change the status of talent's porfolio media 
	*
	*/
	public function changePortfolioMediaStatusAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		
		$portfolio_id = (isset($param['portfolio_id']) && $param['portfolio_id']!="")?$param['portfolio_id']:0;
		$status = $param['status'];
		// Changing user status in DB
		$delete_response = $this->profile_model->changePortfolioMediaStatus($portfolio_id,$status);
		if($delete_response){
			$objResponse->script('redirect("'.ROUTE_TALENT_PORTFOLIO.'");');
		}
	}
	return $objResponse ;
	}
	
	/**
	* 19: changePortfolioFeaturedStatusAjax
	*
	* This function is used to change featured / is banner status of the portfolio media
	*
	*/
	public function changePortfolioFeaturedStatusAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		$user_id = (isset($param['user_id']) && $param['user_id']!="")?$param['user_id']:0;
		$portfolio_id = (isset($param['portfolio_id']) && $param['portfolio_id']!="")?$param['portfolio_id']:0;
		$status = $param['status'];
		$media_type = $param['media_type'];
		if($status==ACTIVE_STATUS_ID){
			if($media_type==MEDIA_VIDEO){
				$check = $this->profile_model->checkUserFeaturedVideo($user_id);
			}else{
				$check = $this->profile_model->checkUserBannerImages($user_id);
			}
			
			
			if(!empty($check)){
				if($media_type==MEDIA_VIDEO){
					$objResponse->script( "showMessageContent('Only one video can be set as a featured at a time.','Error');;");	
				}else{
					$objResponse->script( "showMessageContent('Only one image can be set as a banner at a time.','Error');;");	
				}
				
				return $objResponse ;
			}
		}
		
		// Changing user status in DB
		$delete_response = $this->profile_model->changePortfolioFeaturedStatus($portfolio_id,$status);
		if($delete_response){
			if($status==ACTIVE_STATUS_ID){
				
				$msg = ($media_type==MEDIA_VIDEO)?"Video has been set as a featured":"Image has been set as a banner";
			}else{
				$msg = ($media_type==MEDIA_VIDEO)?"Video has been removed as a featured":"Image has been removed as a banner";
			}
			$url = ROUTE_TALENT_PORTFOLIO;
			$objResponse->script('successAlerts("'.$msg.'","'.$url.'");');
		}
	}
	return $objResponse ;
	}
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 20: portfolioVideoUploadAjax
	*
	* This function is used to upload portfolio video
	*
	*/
	public function portfolioVideoUploadAjax(){
		//pr($_FILES); die();
		if (!empty($_FILES)) {
			
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			/* $upload_limit = $this->profile_model->getPortfolioUploadLimit();
			$current_count = $this->profile_model->getPortfolioImageCount($user_id);
			$to_be_count = $current_count+1;
			
			if($to_be_count > $upload_limit){
				//alert("You have exceeded maximum limit for image upload");
				$msg = "You have exceeded maximum limit for video upload"; 
				$status = 2;
				$response['status'] = $status;
				$response['response'] = $msg;
				echo json_encode($response);
				die();					
			} */
			//echo "test"; die();
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			$fileSize = round(($_FILES['file']['size']/1024/1024),2);
			if($fileSize>10){
				$msg = "Maximum size upload limit is 10mb"; 
				$status = 2;
				$response['status'] = $status;
				$response['response'] = $msg;
				echo json_encode($response);
				die();					
			}
			//$fileType = $_FILES['file']['type'];
			$details = $this->uploadYoutubeVid($tempFile,$fileName);
			$fileType = 2;
			
			/* 
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."portfolio/images";
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '0';
			$this->load->library('upload', $config); */
			//pr($details);
			if(!empty($details)){
				//echo "test"; die();
				//echo json_encode("test".$details['id']); die();
				$id = $this->profile_model->uploadPortfolioVideo($user_id,$details['id'],$details['thumbnail_url'],$fileName,MEDIA_VIDEO);
				$images = $this->profile_model->getLastFileAdded($id);
				echo json_encode($images);
				die();
			}
        }
	}
	/**
	* 21: cancelPortfolioMediaAjax
	*
	* This function is used to cancel portfolio media upload
	*
	*/
	public function cancelPortfolioMediaAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		
		$portfolio_id = (isset($param['portfolio_id']) && $param['portfolio_id']!="")?$param['portfolio_id']:0;
		$status = $param['status'];
		$vid_id = $this->profile_model->getVideoYoutubeId($portfolio_id);
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
				if (empty($listResponse) || !isset($listResponse[0])) {
				    $youtube->videos->delete($videoId); 
					$delete_response = $this->profile_model->changePortfolioMediaStatus($portfolio_id,$status);
					return $objResponse;
				} else {
				  // Since the request specified a video ID, the response only
				  // contains one video resource.
				  $youtube->videos->delete($videoId); 
				  $delete_response = $this->profile_model->changePortfolioMediaStatus($portfolio_id,$status);
				  return $objResponse;
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
		// Changing user status in DB
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	* 22: profileImageUploadAjax
	*
	* This function is used upload profile image using drag n drop feature
	*
	*/
	public function profileImageUploadAjax(){
		// echo "string";
		// exit();
		if (!empty($_FILES)) {
			echo json_encode($_FILES);
			die();	
        }
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Ed>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------
	
	//FUNCTIONS LIST:
	01: index
	02: employerBookmarks
	03: employerBookTalent
	04: employerJobs
	05: employerJobDetail
	06: talentJobs
	07: talentJobDetail
	08: talentPublicProfile
	09: talentPayment
	10: talentPaymentHistory
	11: talentSchedule
	12: talentPortfolio
	13: send2COPayment
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: index
	 *
	 * This function is the entery point to this class. 
	 * It shows edit profile view to the talent/employer edit account module in profile
	 *
	 */
	
    public function index() {
    	
		//assign public class values to function variable
		//echo  $is_ajax; die();
		$this->data['subModuleName'] = "Edit Account";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['common_data']['page']="edit-profile";
		// print_r($data);
		// exit();
		$data['menu_number'] = EMLOYER_MENU_EDIT_ACCOUNT;
		//pr($data['common_data']); die();
		$user_role = $data['common_data']['user_data']['user_type'];
		$user_id = $data['common_data']['user_data']['id'];
		$data['cities'] = $this->user_model->getCities();
		$data['countries'] = $this->user_model->getCountries();
		$data['services'] = $this->user_model->get_services();

		$data['states'] = $this->user_model->get_states();
		$data['city'] = $this->user_model->get_city();
		foreach ($data['services'] as $key => $value) {
			$data['services'][$key]['selected'] = $this->user_model->get_selected_services($value['id'],$user_id);
		}
	//	print_r($data['services']);die();
		// if($user_role==USER_ROLE_SERVICE_PROVIDER){
		// 	$data['complete_profile'] = $this->profile_model->checkEmployerProfile($data['common_data']['user_id']);
		// }else{
		// 	$field_ids = $this->profile_model->getCategoryFieldIds($data['common_data']['user_data']['talent_category_id']);
		// 	$field_names = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		// 	//pr($field_names);  die();
		// 	$query_condition= "";
		// 	foreach($field_names as $field){
		// 		$query_condition .= " AND ".$field['name']."!=''";
		// 	}
		// 	$data['complete_schedule'] = 1;
		// 	$subscription_expiry = $data['common_data']['user_data']['subscription_expiry']; 
		// 	$data['complete_payment'] = (empty($subscription_expiry) || date('Y-m-d',$subscription_expiry) < date("Y-m-d"))?0:1;
		// 	$data['complete_account_info'] = $this->profile_model->checkTalentProfile($data['common_data']['user_id'],$query_condition);
		// 	$data['complete_portfolio_info'] = $this->profile_model->checkTalentPortfolio($data['common_data']['user_id']);
			
		// 	if($data['complete_schedule'] == 1 && $data['complete_payment'] == 1 && $data['complete_account_info']==1 && $data['complete_portfolio_info']==1){
		// 		$data['complete_profile'] = 1;
		// 	}else{
		// 		$data['complete_profile'] = 0;
		// 	}
		// }
		// $past_search = $this->search_model->checkUserPastSearch($data['common_data']['user_data']['id']);
		// if(!empty($past_search) && $data['common_data']['user_data']['suggested_talents'] == INACTIVE_STATUS_ID){
		// 	$this->search_model->updateUserPastSearch($data['common_data']['user_data']['id'],ACTIVE_STATUS_ID);
		// } 
		//echo $user_role; die();
		//pr($data['common_data']); die();
		// if($user_role==USER_ROLE_EVENT_PLANNER){
			// $template['body_content'] = $this->load->view('frontend/profile/employerProfile', $data, true);	
		// }else{
			// $template['body_content'] = $this->load->view('frontend/profile/talentProfile', $data, true);	
		// }
		
		// if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
		// 	$is_ajax = $_GET['is_ajax'];
		// }else{
		// 	$is_ajax = 0;
		// }
		// if($is_ajax==1){

			// echo $template['body_content'];
		// }else{
			// if ($user_role == '2') {
				
			// }
			if($this->common_data['user_data']['user_type'] == '3'){
				$template['body_content'] = $this->load->view('frontend/profile/ServiceProviderProfile', $data, true);	
			}elseif ($this->common_data['user_data']['user_type'] == '2') {
				$template['body_content'] = $this->load->view('frontend/profile/Profile', $data, true);	
			}
			
			$this->load->view('frontend/layouts/template', $template, false);		
		// }
		
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 02: employerBookmarks
	 *
	 * This function is the entery point to this class. 
	 * It shows employer bookmark view
	 *
	 */
	public function employerBookmarks(){
		$this->data['subModuleName'] = "My Favrouties";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = EMLOYER_MENU_FAVOURITES;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_EMPLOYER){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		$data['bookmarks'] = $this->profile_model->getEmployerBookmarks($data['common_data']['user_id']);
		if(!empty($data['bookmarks'])){
			foreach($data['bookmarks'] as $index=>$bookmark){
				if(!empty($bookmark['parent_id'])){
					$parent_category = $this->profile_model->getCategoryById($bookmark['parent_id']);
					$data['bookmarks'][$index]['parent_category'] = "";
					if(!empty($parent_category)){
						$data['bookmarks'][$index]['parent_category'] = $parent_category['title'];
					}
				}
			}
		}
		$data['complete_profile'] = $this->profile_model->checkEmployerProfile($data['common_data']['user_id']);
		$template['body_content'] = $this->load->view('frontend/profile/employerBookmarks', $data, true);	
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 03: employerBookTalent
	 *
	 * This function is the entery point to this class. 
	 * It shows booke talent view
	 *
	 */
	public function employerBookTalent(){
		$this->data['subModuleName'] = "Book A Talent";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = EMLOYER_MENU_BOOK_TALENT;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_EMPLOYER){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		$data['complete_profile'] = $this->profile_model->checkEmployerProfile($data['common_data']['user_id']);
		//pr($data['common_data']); die();
		$template['body_content'] = $this->load->view('frontend/profile/employerBookTalent', $data, true);	
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 04: employerJobs
	 *
	 * This function is the entery point to this class. 
	 * It shows employer jobs
	 *
	 */
	public function employerJobs(){
		$this->data['subModuleName'] = "My Jobs";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = EMLOYER_MENU_JOBS;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_EMPLOYER){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		$data['jobs'] = $this->profile_model->getEmployerJobs($data['common_data']['user_id']);
		//pr($data['jobs']); die();
		$data['complete_profile'] = $this->profile_model->checkEmployerProfile($data['common_data']['user_id']);
		//pr($data['common_data']); die();
		$template['body_content'] = $this->load->view('frontend/profile/employerJobs', $data, true);	
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 05: employerJobDetail
	 *
	 * This function is the entery point to this class. 
	 * It shows employer job detail
	 *
	 */
	public function employerJobDetail(){
		//assign public class values to function variable
		$this->data['subModuleName'] = "My Jobs";
		$this->data['lastModuleName'] = "Job Detail";
		$data = $this->data;
		//$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = EMLOYER_MENU_JOBS;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_EMPLOYER){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		$data['complete_profile'] = $this->profile_model->checkEmployerProfile($data['common_data']['user_id']);
		if(!isset($_GET['job_id'])) {
            header("Location: ".ROUTE_EMPLOYER_JOBS);
            die();
        }
		$data['job_id'] = $_GET['job_id'];
		$data['job'] = $this->profile_model->getEmployerJobById($data['job_id'] );
		if(!empty($data['job']) && !empty($data['job']['parent_id'])){
			$parent_category = $this->profile_model->getCategoryById($data['job']['parent_id']);
			$data['job']['parent_category'] = "";
			if(!empty($parent_category)){
				$data['job']['parent_category'] = $parent_category['title'];
			}
		}
		
		$data['talents'] = $this->profile_model->getEmployerJobTalent($data['job_id'] );
		$data['talent_ids'] = "";
		foreach($data['talents'] as $talent){
			$data['talent_ids'] .= $talent['talent_id'].",";
		}
		$data['employer_review'] = array();
		$data['talent_reviews'] = array();
		$data['talent_ids'] = rtrim($data['talent_ids'],",");
		$data['reviews'] = $this->profile_model->getEmployerJobReviews($data['job_id'] );
		
		foreach($data['reviews'] as $index=>$review){
			if($review['reviewer_role']==USER_ROLE_EMPLOYER){
				$data['employer_review'][$review['talent_id']] = $review;
			}else if($review['reviewer_role']==USER_ROLE_TALENT && $review['is_active']==ACTIVE_STATUS_ID){
				$data['talent_reviews'][$index] = $review;
				$data['talent_reviews'][$index]['profile_pic'] = $this->user_model->getUserById($review['talent_id'])['profile_image'];
			}
		}
		foreach($data['talents'] as $index2=>$talent2){
			if (array_key_exists($talent2['talent_id'], $data['employer_review'])){
				$data['talent_review_ids'][$talent2['talent_id']] = $data['employer_review'][$talent2['talent_id']]['id'];
			}else{
				$data['talent_review_ids'][$talent2['talent_id']] = 0;
			}
		}
		//pr($data['talent_reviews']); die();
		$data['dates_empty'] = 1;
		if(!empty($data['job']['start_date']) && !empty($data['job']['end_date'])){
			$data['dates_empty'] = 0;
			$data['job']['start_date'] = date('d/m/Y',$data['job']['start_date']);
			$data['job']['end_date'] = date('d/m/Y',$data['job']['end_date']);
		}
		//pr($data['job']); die();
		if(empty($data['job'])){
			header(ROUTE_EMPLOYER_JOBS);
            die();
		}
		/* pr($data['job']);
		//pr($data['reviews']);
		pr($data['talent_reviews']);
		pr($data['employer_review']);
		pr($data['talents']);
		die();  */
		
		$template['body_content'] = $this->load->view('frontend/profile/employerJobDetail', $data, true);	
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 06: talentJobs
	 *
	 * This function is the entery point to this class. 
	 * It shows talent jobs
	 *
	 */
	public function talentJobs(){
		$this->data['subModuleName'] = "My Jobs";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = TALENT_MENU_JOBS;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_TALENT){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		$data['jobs'] = $this->profile_model->getTalentJobs($data['common_data']['user_id']);
		
		foreach($data['jobs'] as $index=>$job){
			$data['jobs'][$index]['review'] = $this->profile_model->getReview($data['common_data']['user_id'],$job['employer_id'],$job['job_id'],USER_ROLE_EMPLOYER,1);
		}
		//pr($data['jobs']); die();
		//pr($data['jobs']); die();
		//pr($data['jobs']); die();
		$field_ids = $this->profile_model->getCategoryFieldIds($data['common_data']['user_data']['talent_category_id']);
		$field_names = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		//pr($field_names);  die();
		$query_condition= "";
		foreach($field_names as $field){
			$query_condition .= " AND ".$field['name']."!=''";
		}
		$data['complete_schedule'] = 1;
		$subscription_expiry =$data['common_data']['user_data']['subscription_expiry'];
		$data['complete_payment'] = (empty($subscription_expiry) || date('Y-m-d',$subscription_expiry) < date("Y-m-d"))?0:1;
		$data['complete_account_info'] = $this->profile_model->checkTalentProfile($data['common_data']['user_id'],$query_condition);
		$data['complete_portfolio_info'] = $this->profile_model->checkTalentPortfolio($data['common_data']['user_id']);
		
		if($data['complete_schedule'] == 1 && $data['complete_payment'] == 1 && $data['complete_account_info']==1 && $data['complete_portfolio_info']==1){
			$data['complete_profile'] = 1;
		}else{
			$data['complete_profile'] = 0;
		}
		//pr($data['common_data']); die();
		$template['body_content'] = $this->load->view('frontend/profile/talentJobs', $data, true);	
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 07: talentJobDetail
	 *
	 * This function is the entery point to this class. 
	 * It shows talent job detail
	 *
	 */
	public function talentJobDetail(){
		//assign public class values to function variable
		$this->data['subModuleName'] = "My Jobs";
		$this->data['lastModuleName'] = "Job Detail";
		$data = $this->data;
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = TALENT_MENU_JOBS;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_TALENT){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		if(!isset($_GET['job_id'])) {
            header("Location: ".ROUTE_TALENT_JOBS);
            die();
        }
		$data['job_id'] = $_GET['job_id'];
		//echo $data['common_data']['user_id']; die();
		$data['job'] = $this->profile_model->getTalentJobById($data['job_id'],$data['common_data']['user_id']);
		//pr($data['job']); die();
		$data['employer_review'] = array();
		$data['your_review'] = array();
		$data['reviews'] = $this->profile_model->getEmployerJobReviews($data['job_id'] );
		//pr($data['reviews']); die();
		foreach($data['reviews'] as $index=>$review){
			if($review['reviewer_role']==USER_ROLE_TALENT && $review['talent_id']==$data['common_data']['user_id']){
				$data['your_review'] = $review;
			}else if($review['reviewer_role']==USER_ROLE_EMPLOYER && $review['is_active']==ACTIVE_STATUS_ID && $review['talent_id']==$data['common_data']['user_id']){
				$data['employer_review'] = $review;
				$data['employer_review']['profile_pic'] = $this->user_model->getUserById($review['employer_id'])['profile_image'];
			}
		}
		$data['dates_empty'] = 1;
		
		if(!empty($data['job']['start_date']) && !empty($data['job']['end_date'])){
			$data['dates_empty'] = 0;
			$data['job']['start_date'] = date('d/m/Y',$data['job']['start_date']);
			$data['job']['end_date'] = date('d/m/Y',$data['job']['end_date']);
		}
		$field_ids = $this->profile_model->getCategoryFieldIds($data['common_data']['user_data']['talent_category_id']);
		$field_names = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		//pr($field_names);  die();
		$query_condition= "";
		foreach($field_names as $field){
			$query_condition .= " AND ".$field['name']."!=''";
		}
		$data['complete_schedule'] = 1;
		$subscription_expiry = $data['common_data']['user_data']['subscription_expiry'];
		$data['complete_payment'] = (empty($subscription_expiry) || date('Y-m-d',$subscription_expiry) < date("Y-m-d"))?0:1;
		$data['complete_account_info'] = $this->profile_model->checkTalentProfile($data['common_data']['user_id'],$query_condition);
		$data['complete_portfolio_info'] = $this->profile_model->checkTalentPortfolio($data['common_data']['user_id']);
		
		if($data['complete_schedule'] == 1 && $data['complete_payment'] == 1 && $data['complete_account_info']==1 && $data['complete_portfolio_info']==1){
			$data['complete_profile'] = 1;
		}else{
			$data['complete_profile'] = 0;
		}
		
		if(empty($data['job'])){
			header(ROUTE_TALENT_JOBS);
            die();
		}
		
		//pr($data['your_review']);
		//pr($data['employer_review']); die();
		$template['body_content'] = $this->load->view('frontend/profile/talentJobDetail', $data, true);	
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 08: talentPublicProfile
	 *
	 * This function is the entery point to this class. 
	 * It shows edit public profile view to the user.
	 *
	 */
	
    public function talentPublicProfile() {
		//assign public class values to function variable
		$this->data['subModuleName'] = "Public Profile";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = TALENT_MENU_PUBLIC_PROFILE;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_TALENT){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		//pr($data['common_data']); die();
		$user_role = $data['common_data']['user_data']['role'];
		$data['cities'] = $this->user_model->getCities();
		$data['countries'] = $this->user_model->getCountries();
		$data['categories'] = $this->profile_model->getCategories();
		$data['category_fields'] = $this->profile_model->getCategoryFields();
		
		//pr($data['categories']); die();
		foreach($data['category_fields']  as $index=>$category_field){
			if($category_field['type']==FIELD_TYPE_DROPDOWN){
				$data['category_fields'][$index]['options'] = $this->profile_model->getCategoryFieldOptions($category_field['id']);
				$data['category_fields'][$index]['category_ids'] = $this->profile_model->getFieldCategoriesID($category_field['id']);
			}else{
				$data['category_fields'][$index]['category_ids'] = $this->profile_model->getFieldCategoriesID($category_field['id']);
				$data['category_fields'][$index]['options'] = "";
			}
		}
		//echo $data['common_data']['user_data']['talent_category_id'];
		//pr($data['category_fields']); die();
		//pr($data['category_fields']); die();
		$field_ids = $this->profile_model->getCategoryFieldIds($data['common_data']['user_data']['talent_category_id']);
		$field_names = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		$query_condition= "";
		foreach($field_names as $field){
			$query_condition .= " AND ".$field['name']."!=''";
		}
		$data['complete_schedule'] = 1;
		$subscription_expiry = $data['common_data']['user_data']['subscription_expiry'];
		$data['complete_payment'] = (empty($subscription_expiry) || date('Y-m-d',$subscription_expiry) < date("Y-m-d"))?0:1;
		$data['complete_account_info'] = $this->profile_model->checkTalentProfile($data['common_data']['user_id'],$query_condition);
		$data['complete_portfolio_info'] = $this->profile_model->checkTalentPortfolio($data['common_data']['user_id']);
		
		if($data['complete_schedule'] == 1 && $data['complete_payment'] == 1 && $data['complete_account_info']==1 && $data['complete_portfolio_info']==1){
			$data['complete_profile'] = 1;
		}else{
			$data['complete_profile'] = 0;
		}
		//echo $user_role; die();
		//pr($data['common_data']); die();
		
		$template['body_content'] = $this->load->view('frontend/profile/talentPublicProfile', $data, true);	
		
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 09: talentPayment
	 *
	 * This function is the entery point to this class. 
	 * It shows talent payment view to the user.
	 *
	 */
	
    public function talentPayment() {
		//assign public class values to function variable
		$this->data['subModuleName'] = "My Payments";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = TALENT_MENU_PAYMENTS;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_TALENT){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		//pr($data['common_data']); die();
		$user_role = $data['common_data']['user_data']['role'];
		$data['price_packages'] = $this->profile_model->getPricePackages();
		//$data['active_payments'] = $this->profile_model->getTalentActivePayments($data['common_data']['user_id']);
		$field_ids = $this->profile_model->getCategoryFieldIds($data['common_data']['user_data']['talent_category_id']);
		$field_names = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		//pr($field_names);  die();
		$query_condition= "";
		foreach($field_names as $field){
			$query_condition .= " AND ".$field['name']."!=''";
		}
		$data['complete_schedule'] = 1;
		$subscription_expiry = $data['common_data']['user_data']['subscription_expiry'];
		$data['complete_payment'] = (empty($subscription_expiry) || date('Y-m-d',$subscription_expiry) < date("Y-m-d"))?0:1;
		$data['complete_account_info'] = $this->profile_model->checkTalentProfile($data['common_data']['user_id'],$query_condition);
		$data['complete_portfolio_info'] = $this->profile_model->checkTalentPortfolio($data['common_data']['user_id']);
		
		if($data['complete_schedule'] == 1 && $data['complete_payment'] == 1 && $data['complete_account_info']==1 && $data['complete_portfolio_info']==1){
			$data['complete_profile'] = 1;
		}else{
			$data['complete_profile'] = 0;
		}
	
		$template['body_content'] = $this->load->view('frontend/profile/talentPayment', $data, true);	
		//echo $_GET['is_ajax'];
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 10: talentPaymentHistory
	 *
	 * This function is the entery point to this class. 
	 * It shows talent payment history
	 *
	 */
	public function talentPaymentHistory(){
		$this->data['subModuleName'] = "My Payments";
		$this->data['lastModuleName'] = "Payment History";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = TALENT_MENU_PAYMENTS;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_TALENT){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		$data['transactions'] = $this->profile_model->getTalentTransactions(0,$data['common_data']['user_id']);
		//pr($data['transactions']); die();
		$field_ids = $this->profile_model->getCategoryFieldIds($data['common_data']['user_data']['talent_category_id']);
		$field_names = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		//pr($field_names);  die();
		$query_condition= "";
		foreach($field_names as $field){
			$query_condition .= " AND ".$field['name']."!=''";
		}
		$data['complete_schedule'] = 1;
		$subscription_expiry = $data['common_data']['user_data']['subscription_expiry'];
		$data['complete_payment'] = (empty($subscription_expiry) || date('Y-m-d',$subscription_expiry) < date("Y-m-d"))?0:1;
		$data['complete_account_info'] = $this->profile_model->checkTalentProfile($data['common_data']['user_id'],$query_condition);
		$data['complete_portfolio_info'] = $this->profile_model->checkTalentPortfolio($data['common_data']['user_id']);
		
		if($data['complete_schedule'] == 1 && $data['complete_payment'] == 1 && $data['complete_account_info']==1 && $data['complete_portfolio_info']==1){
			$data['complete_profile'] = 1;
		}else{
			$data['complete_profile'] = 0;
		}
		//pr($data['common_data']); die();
		$template['body_content'] = $this->load->view('frontend/profile/talentPaymentHistory', $data, true);	
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 11: talentSchedule
	 *
	 * This function is the entery point to this class. 
	 * It shows talent schedule
	 *
	 */
	public function talentSchedule(){
		$this->data['subModuleName'] = "My Schedule";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = TALENT_MENU_SCHEDULE;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_TALENT){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		$data['jobs'] = $this->profile_model->getTalentJobs($data['common_data']['user_id']);
		
		foreach($data['jobs'] as $index=>$job){
			$data['jobs'][$index]['review'] = $this->profile_model->getReview($data['common_data']['user_id'],$job['employer_id'],$job['job_id'],USER_ROLE_EMPLOYER,1);
		}
		//pr($data['jobs']); die();
		//pr($data['jobs']); die();
		//pr($data['jobs']); die();
		$data['events'] = $this->profile_model->getUnAvailabilityByTalentId($data['common_data']['user_id']);
		if(!empty($data['events'])){
			
			foreach($data['events'] as $key=>$row){
					$data['events'][$key]['db_id'] = $row['id'];
					$data['events'][$key]['title'] = ($row['is_wowzer_job'] == 1)? 'Engaged with wowzer':'Not Available';
					$data['events'][$key]['start'] = date('Y-m-d',$row['timestamp']);
					$data['events'][$key]['end'] = date('Y-m-d',$row['timestamp']);
					$data['events'][$key]['is_wowzer_job'] = $row['is_wowzer_job'];
					$data['events'][$key]['talent_job_detail_id'] = $row['talent_job_detail_id'];
					$data['events'][$key]['removal_requested'] = $row['removal_requested'];
					$data['events'][$key]['job_id'] = $row['job_id'];
					$data['events'][$key]['backgroundColor'] = ($row['is_wowzer_job'] == 1)? '#0000FF':'#FF0000';
			}
		}
		//pr($data['events']); die();
		$field_ids = $this->profile_model->getCategoryFieldIds($data['common_data']['user_data']['talent_category_id']);
		$field_names = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		//pr($field_names);  die();
		$query_condition= "";
		foreach($field_names as $field){
			$query_condition .= " AND ".$field['name']."!=''";
		}
		$data['complete_schedule'] = 1;
		$subscription_expiry =$data['common_data']['user_data']['subscription_expiry'];
		$data['complete_payment'] = (empty($subscription_expiry) || date('Y-m-d',$subscription_expiry) < date("Y-m-d"))?0:1;
		$data['complete_account_info'] = $this->profile_model->checkTalentProfile($data['common_data']['user_id'],$query_condition);
		$data['complete_portfolio_info'] = $this->profile_model->checkTalentPortfolio($data['common_data']['user_id']);
		
		if($data['complete_schedule'] == 1 && $data['complete_payment'] == 1 && $data['complete_account_info']==1 && $data['complete_portfolio_info']==1){
			$data['complete_profile'] = 1;
		}else{
			$data['complete_profile'] = 0;
		}
		//pr($data['common_data']); die();
		$template['body_content'] = $this->load->view('frontend/profile/talentSchedule', $data, true);	
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 12: talentPortfolio
	 *
	 * This function is the entery point to this class. 
	 * It shows add/edit talent portfolio view to the user.
	 *
	 */
	
    public function talentPortfolio() {
		//assign public class values to function variable
		$this->data['menuName'] = "portfolio";
		$this->data['subModuleName'] = "My Portfolio";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['menu_number'] = TALENT_MENU_PORTFOLIO;
		if($data['common_data']['user_data']['role'] == INACTIVE_STATUS_ID || $data['common_data']['user_data']['role'] != USER_ROLE_TALENT){
			header("Location: ".ROUTE_PROFILE);
			die();
		}
		//pr($data['common_data']); die();
		$user_role = $data['common_data']['user_data']['role'];
		$data['sample_videos'] = $this->profile_model->getSampleVideos();
		$data['portfolio_images'] = $this->portfolio_model->getTalentPortfolioImages($data['common_data']['user_id']);
		
		//pr($data['jobs']); die();
		$videos = $this->portfolio_model->getUserPortfolioById($data['common_data']['user_id'],MEDIA_VIDEO);
		$data['portfolio_videos'] = array();
		//pr($data['portfolio_videos']); die();
		if(!empty($videos)){
			foreach($videos as $video){
				$this->checkVideoStatus($data['common_data']['user_id'],$video['id'],$video['url'],$video['status']);
			}
			$data['portfolio_videos'] = $this->portfolio_model->getUserPortfolioById($data['common_data']['user_id'],MEDIA_VIDEO);
		} 
		
		$field_ids = $this->profile_model->getCategoryFieldIds($data['common_data']['user_data']['talent_category_id']);
		$field_names = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		//pr($field_names);  die();
		$query_condition= "";
		foreach($field_names as $field){
			$query_condition .= " AND ".$field['name']."!=''";
		}
		$data['complete_schedule'] = 1;
		$subscription_expiry = $data['common_data']['user_data']['subscription_expiry'];
		$data['complete_payment'] = (empty($subscription_expiry) || date('Y-m-d',$subscription_expiry) < date("Y-m-d"))?0:1;
		$data['complete_account_info'] = $this->profile_model->checkTalentProfile($data['common_data']['user_id'],$query_condition);
		$data['complete_portfolio_info'] = $this->profile_model->checkTalentPortfolio($data['common_data']['user_id']);
		//pr($data['complete_portfolio_info']); die();
		if($data['complete_schedule'] == 1 && $data['complete_payment'] == 1 && $data['complete_account_info']==1 && $data['complete_portfolio_info']==1){
			$data['complete_profile'] = 1;
		}else{
			$data['complete_profile'] = 0;
		}
	
		$template['body_content'] = $this->load->view('frontend/profile/talentPortfolio', $data, true);	
		
		if(isset($_GET['is_ajax']) && !empty($_GET['is_ajax'])){
			$is_ajax = $_GET['is_ajax'];
		}else{
			$is_ajax = 0;
		}
		if($is_ajax==1){
			echo $template['body_content'];
		}else{
			$this->load->view('frontend/layouts/template', $template, false);		
		}
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 13: send2COPayment
	 *
	 * This function is used to send 2co payment
	 *
	 *
	 */
	
    public function send2COPayment($amount,$name,$country,$city,$email,$product,$token) {
		require_once("application/libraries/Twocheckout.php");

		Twocheckout::privateKey("".TWO_CO_PRIVATE_KEY.""); //Private Key
		Twocheckout::sellerId("".TWO_CO_SELLER_ID.""); // 2Checkout Account Number
		// To use your sandbox account set sandbox to true
		//Twocheckout::sandbox(true);

		try {
			$charge = Twocheckout_Charge::auth(array(
				"merchantOrderId" => "".$product."",
				"token"      => $token,
				"currency"   => 'PKR',
				"total"      => $amount,
				"billingAddr" => array(
					"name" => "".$name."",
					"addrLine1" => 'N/A',
					"city" =>  "".$city."",
					"state" => '',
					"zipCode" => '',
					"country" => "".$country."",
					"email" => "".$email."",
					"phoneNumber" => ''
				)
			));

			$result['response_code'] = $charge['response']['responseCode'];
			$result['error'] = $charge['validationErrors'];
			$result['trans_id'] = $charge['response']['transactionId'];
			return $result;
		} catch (Twocheckout_Error $e) {
			$result['response_code'] = 0;
			$result['error'] = $e->getMessage();
			$result['trans_id'] = 0;
			return $result;
		}
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
/* End of file profile.php */
/* Location: ./application/controllers/frontend/profile.php */
