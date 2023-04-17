<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Common {

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
         $this->isUserLoggedIn();
        //------------ Common Function <End> -----------------//
		//------------ Class Common Values <Start> -----------------//
		$this->data['module'] = "02";
		$this->data['moduleName'] = "Login";
		$this->data['page'] = 'login';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: registerByEmailAjax
	02: loginAjax
	03: resetPasswordAjax
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: registerByEmailAjax
	 *
	 * This function is for register with email address.
	 *
	 */
	public function registerByEmailAjax($param=null) {
		
	
		// Checking whether parametres are nullor not
		if ($param != null) {
			$role = $param['role'];
			$first_name = $param['first_name'];
			$last_name = $param['last_name'];
			$name = $first_name." ".$last_name;
			$email = $param['email'];
			$password = $param['password'];
			$business_name = '';
			$planner_account_type = '';

			if ($role == '3') {
				$business_name = $param['business_name'];	
			}
			if ($role == '2') {
				$planner_account_type = '2';	
			}
			// $newsletter = $param['newsletter'];
			$objResponse = new xajaxResponse();
			//check if user already exist in database
			$isUserExist = $this->user_model->isUserEmailExist($email);
			if(empty($isUserExist)){
				//generate confirmation code
				$confirmation_code = generate_code();
				
				//encrypt password
				$password = encrypt_url($password);
				$status = PENDING_STATUS_ID;
				
				//Save user record in database
				$new_user = $this->user_model->registerByEmail($role,$first_name,$last_name,$email,$password,$status,$confirmation_code, $planner_account_type, $business_name);
				//Send confirmation email to user
				$confirmation_url = ROUTE_FIRST_LOGIN.'/'.encrypt_url($new_user.'-'.$confirmation_code);
				// Confirmation Email Send Email
				if($new_user){
					if (WEBSITE_MODE == "dev"){
						$msg = "Your Verification url is ".$confirmation_url;
						$url = "";
						//Success Message
						$objResponse->script('alert("'.$msg.'","'.$url.'");');
						$objResponse->script('$("#registerForm")[0].reset();');
					} else {

						$sender = 'no-reply@psim.com';
						$receiver = $email;
						$subject = "Account Confirmation";
						$msg = "Dear ".ucwords($name)."!<br /><br />
									You have been successfully registered with PSIM. Please confirm your account by clicking the following link: <a href=".$confirmation_url.">".$confirmation_url."</a>.<br /><br />
									Regards,<br/>Support Team";

									
						sendEmail($sender,$receiver,$msg,$subject);
						
						// $objResponse->script('alert("'.$msg.'","'.$url.'");');
						// header("Location: ".ROUTE_THANKYOU_JOIN);
						$objResponse->script( "window.location = '".ROUTE_THANKYOU_JOIN.'?email='.$receiver."';" );
						// $data = $this->data;
						// $data['common_data'] = $this->common_data;
						// $template['body_content'] = $this->load->view('frontend/login/welcomePlanny', $data, true);	
						// $this->load->view('frontend/layouts/template', $template, false);

						// $data = $this->data;
						// $data['common_data'] = $this->common_data;
						// $data['email'] = $receiver;
						// $template['body_content'] = $this->load->view('frontend/login/welcomePlanny', $data, true);	

						//Admin notification email
						// $sender1 = NO_REPLY;
						// $settings = $this->user_model->getSiteSettings();
						// $receiver1 = $settings['contact_email'];
						// $subject1 = "New Account Pending Approval";
						
						// $backend_url = (($role==USER_ROLE_EMPLOYER)?BACKEND_EMPLOYEE_DETAIL_URL:BACKEND_TALENT_DETAIL_URL)."?user_id=".$new_user;
						// $msg1 = "Hello Administrator!<br /><br />
						// 			A new account has just registered on Wozer, Kindly review it at: <a href=".$backend_url.">".$backend_url."</a>.<br /><br />
						// 			Regards,<br/>Support Team";
						// sendEmail($sender1,$receiver1,$msg1,$subject1);
						// $objResponse->script('$("#registerForm .errorMsg").html("An email has been sent to <b>'.$email.'</b> for email verification. Please verify your email address.");');
						// $objResponse->script('$("#registerForm")[0].reset();');
					}
				}
			}
			else {
				$objResponse->script('$(".err").show();'); 
				$objResponse->script('$(".error-info-msg").show();');
				$objResponse->script('$(".erro").text("Email address has already been registered");');
			}	
		} 
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 02: loginAjax
	 *
	 * This function is to validate and grand access to admin via Email login.
	 *
	 */
     public function loginAjax($param=null) {
     
		// Checking whether parametres are nullor not
		if ($param != null) {
			$email = $param['email'];
			$password = encrypt_url($param['password']);
			// $remember_me = $param['remember_me'];
			$objResponse = new xajaxResponse();
			// Encoding password
			$password = $password;
			//Validating email and password 
			$user_data = $this->user_model->login($email,$password);
			if(!empty($user_data)) {
				if($user_data['account_status'] == 0)
				{
					$objResponse->script('$("#loginForm .errorMsg").html("Please confirm your email first or <a href='."javascript:void(0)".' id='."resend_confirm_url".'>Resend Confirmation Link</a>");');
				}else if($user_data['account_status'] == 2){
					$objResponse->script('$(".err").html("You have not verified your email address yet, or your registration is pending approval. ");');
					$objResponse->script('$(".succs").hide();'); 
				$objResponse->script('$(".success-info-msg").hide();');
				$objResponse->script('$(".err").show();'); 
				$objResponse->script('$(".error-info-msg").show();');
				}else {
					// if($remember_me == 1)
					// {
						$cookie_time = (3600 * 24 * 30); // 30 days
						$hash = md5($user_data['created']); // will result in a 32 characters hash
						setcookie (WEBSITE_COOKIE, 'usr='.$user_data['email'].'&hash='.$hash, time() + $cookie_time);
						
					// }
					//Redirecting to DSHBOARD
					setcookie('is_wowzer_logged_in', '1', time() + (86400 * 30), "/");
					$this->session->set_userdata(WEBSITE_FRONTEND_SESSION , $user_data['id']);
					$this->session->set_userdata('Name' , $user_data['first_name']);
					$this->session->set_userdata('premium_subscription' , $user_data['premium_subscription']);
					if ($user_data['user_type'] == '3') {
							// Service Provider Logged in
							if ($user_data['stripe_connection'] == '1') {
								
								$objResponse->script( "window.location = '".SERVER_URL."';" );

							}elseif($user_data['stripe_connection'] == '0' || $user_data['stripe_connection'] == ''){

								$objResponse->script( "window.location = '".SERVER_URL."';" );
							}
					}else{

						// Event planner logged in
						$objResponse->script( "window.location = '".SERVER_URL."';" );
					}				
				}
			}else {
				//Failure Message
				$objResponse->script('$(".err").text("You have entered incorrect credentials.");'); 

				$objResponse->script('$(".succs").hide();'); 
				$objResponse->script('$(".success-info-msg").hide();');
				$objResponse->script('$(".err").show();'); 
				$objResponse->script('$(".error-info-msg").show();');
			}
		}
		return $objResponse;
    }

    public function login_old($value='')
    {
    	$this->data['menuName'] = "login_link";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$template['body_content'] = $this->load->view('frontend/login/signi_old', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
    }
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 03: resetPasswordAjax
	 *
	 * This function is to reset admin password via Email.
	 *
	 */
    public function resetPasswordAjax($param=null) {

		// Checking whether parametres are null or not
		if ($param != null) { 
		    $email = $param['email'];
			$objResponse = new xajaxResponse();
			//Verifying email existance
			$user_data = $this->user_model->isUserEmailExist($email);
			if(!empty($user_data)) {
				//Generate and Update new password
				$new_password = generate_password();
				$new_password_encrypted = encrypt_url($new_password);
				$this->user_model->updatePassword($email,$new_password_encrypted);
				
				if (WEBSITE_MODE == "dev"){
					$msg = "Your Password is ".$new_password;
					$url = ROUTE_LOGIN;
					//Success Message
					// $objResponse->script('$("#resetPass").modal("hide")');
					// $objResponse->script('setTimeout(
					// 				function() {
					// 				  $("#resetPassMsg").modal("show")
					// 				}, 400);');
					$objResponse->script('alert("'.$msg.'","'.$url.'");');
				} else {
					//Email details available in this function already
					$to_email = $email;
					$password = $new_password;
					
					//Getting email details from DB
					$from_email = NO_REPLY;
					$email_subject = "Forgot Password?";
					$email_content = "Hello ".ucfirst($user_data['first_name'])."!<br /><br />Did you forget your password again? Don't worry we have updated it for you.<br>New Password: <b>".$password."</b><br><br>
					Regards,<br> Support Team";
					
					//Send Email (Function in common helper)
					$email = sendEmail($from_email,$to_email,$email_content,$email_subject);
					
					//Success Message
					$objResponse->script('$(".erro").hide();'); 
				$objResponse->script('$(".error-info-msg").hide();');
						$objResponse->script('$(".succs").show();'); 
						$objResponse->script('$(".success-info-msg").show();');
					    $objResponse->script('$(" .succs").text("An updated email has been sent to your email. if you dont see an email please check your spam folder");');
					//$objResponse->script('$("#resetForm .errorMsg").text("An email has been sent with an updated password. If you do not receive it within 10 minutes, check your spam folder.");');
				}
			}else {
				//Failure Message
				// $objResponse->script('$(".forgot-password-content-wrapper.errorMsg").text("Invalid email address");');
				$objResponse->script('$(".succs").hide();'); 
						$objResponse->script('$(".success-info-msg").hide();');
				$objResponse->script('$(".erro").show();'); 
				$objResponse->script('$(".error-info-msg").show();');
			    $objResponse->script('$(" .erro").text("Email address not found");');
			}
		}
		return $objResponse;
    }
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Ed>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: logIn
	02: register
	03: forgotPassword
	04: verification
	05: resendConfirmUrl
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: logIn
	 *
	 * This function is the entery point to this class. 
	 * It shows login view to the user.
	 *
	 */
	
    public function logIn() {

    
		//assign public class values to function variable
		$this->data['menuName'] = "login_link";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$template['body_content'] = $this->load->view('frontend/login/signIn', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 *02: register
	 *
	 * This function is the entery point to this class. 
	 * It shows registeration view to user.
	 *
	 */
	
    public function register() {
		//assign public class values to function variable
		$this->data['menuName'] = "register_link";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		/* $data['common_data'] = $this->common_data;
		$data['page'] = 'contact_us';
		$data['moduleName'] = 'Contact Us'; */

		$template['body_content'] = $this->load->view('frontend/login/register', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 03: forgotPassword
	*
	* This function is the entery point to this class. 
	* It shows forgot password view to user.
	*
	*/
	
    public function forgotPassword() {
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		/* $data['common_data'] = $this->common_data;
		$data['page'] = 'contact_us';
		$data['moduleName'] = 'Contact Us'; */

		$template['body_content'] = $this->load->view('frontend/login/forgotPassword', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	
	/**
	* 04: verification
	*
	* This function is used to verify user email
	*
	*/
	
	public function verification($user) {
		
		

		$user = decrypt_url($user);
		$user_id = explode('-',$user);

		$login_user = $this->user_model->getUserById($user_id[0]);
		$timeStart = date('y-m-d h:i:s', $login_user['created']);

	    $timeOfcalculation =  strtotime('+4000 minutes', strtotime($timeStart));
	    $timeEnd = date('y-m-d h:i:s', $timeOfcalculation);
	    if (date('y-m-d h:i:s') < $timeEnd ) {

	    	if($login_user['confirmation_code'] != $user_id[1]){
	    		
			header("Location: ".ROUTE_LINK_EXPIRE);
				die();
			} else if ($login_user['account_status'] == INACTIVE_STATUS_ID){

				$this->user_model->changeUserLoginStatusToPending($login_user['id'],"2");
				// print_r($login_user);
				// $confirmation_url = 'http://dev.appstersinc.com/plaany/plaany_web/admin6y34q/service-provider';
				// $msg = "Hello ".ucfirst($login_user['first_name'])."!<br /><br />
				// 			You have been successfully registered with Wowzer. Please confirm their account by clicking the following link: <a href=".$confirmation_url.">".$confirmation_url."</a>.<br /><br />
				// 			Regards,<br /> Support Team";
				// $sender = NO_REPLY;
				// $receiver = ADMIN_EMAIL;
				// $subject = "User SignUp";										
				// sendEmail($sender,$receiver,$mail,$subject);
				// header("Location: ".ROUTE_TERMS_AND_CONDITIONS);

			} else {
				if ( $login_user['account_status'] == ACTIVE_STATUS_ID) {
					$this->session->set_userdata(WEBSITE_FRONTEND_SESSION,$login_user['id']);
					$this->session->set_userdata('Name' , $login_user['first_name']);
					header("Location: ".SERVER_URL);
					
				} else {
					header("Location: ".ROUTE_TERMS_AND_CONDITIONS);
				}
			}
	    	
	    }else{
	    	// "window.location = '".ROUTE_THANKYOU_JOIN.'?email='.$receiver."';"
	    	header("Location: ".ROUTE_LINK_EXPIRE.'?email='.$login_user['email']);
			die();
	    }
	}
	public function expired()
	{
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		/* $data['common_data'] = $this->common_data;
		$data['page'] = 'contact_us';
		$data['moduleName'] = 'Contact Us'; */

		$template['body_content'] = $this->load->view('frontend/login/linkExpired', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
	}
	public function welcome_plaany()
	{
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		/* $data['common_data'] = $this->common_data;
		$data['page'] = 'contact_us';
		$data['moduleName'] = 'Contact Us'; */

		$template['body_content'] = $this->load->view('frontend/login/welcomePlanny', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
	}
	// }
	/**
	* 05: resendConfirmUrl
	*
	* This function is used to send confirmation url again to the user
	*
	*/
	
	function resendConfirmUrl($param=null) {
		if ($param != null) {
			$email = $param['email'];

			$objResponse = new xajaxResponse();
			$user_data = $this->user_model->isUserEmailExist($email);
			if(!empty($user_data)) {
				$confirmation_url = ROUTE_FIRST_LOGIN.'/'.encrypt_url($user_data['id'].'-'.$user_data['confirmation_code']);
				$sender = NO_REPLY;
				$receiver = $email;
				$subject = "Account Confirmation";
				$msg = "Dear ".ucfirst($user_data['first_name'])."!<br /><br />
							You have been successfully registered with Plaany. Please confirm your account by clicking the following link: <a href=".$confirmation_url.">".$confirmation_url."</a>.<br /><br />
							Regards,<br /> Support Team";
				sendEmail($sender,$receiver,$msg,$subject);
				
				$objResponse->script('$(".success-info-msg").show();');
				$objResponse->script('$(".succs").text("Confirmation link sent successfully");');
			}else {
				$objResponse->script('$(".errorMsg").text("Email does not exist");'); 
			}
		}
		return $objResponse;		
	}

	// function resendConfirmUrl($param=null) {
	// 	if ($param != null) {
	// 		$email = $param['email'];

	// 		$objResponse = new xajaxResponse();
	// 		$user_data = $this->user_model->isUserEmailExist($email);
	// 		if(!empty($user_data)) {
	// 			$confirmation_url = ROUTE_FIRST_LOGIN.'/'.encrypt_url($user_data['id'].'-'.$user_data['confirmation_code']);
	// 			$sender = NO_REPLY;
	// 			$receiver = $email;
	// 			$subject = "Account Confirmation";
	// 			$msg = "Hello ".ucfirst($user_data['first_name'])."!<br /><br />
	// 						You have been successfully registered with Wowzer. Please confirm your account by clicking the following link: <a href=".$confirmation_url.">".$confirmation_url."</a>.<br /><br />
	// 						Regards,<br /> Support Team";
	// 			sendEmail($sender,$receiver,$msg,$subject);
				
	// 			$objResponse->script('$("#loginForm .errorMsg").html("Confirmation link sent successfully");');
	// 		}else {
	// 			$objResponse->script('$(".errorMsg").text("Email does not exist");'); 
	// 		}
	// 	}
	// 	return $objResponse;		
	// }
}
/* End of file Login.php */
/* Location: ./application/controllers/frontend/login.php */