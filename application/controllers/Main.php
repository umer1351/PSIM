<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends Common {

	// echo "string";
	//initializing public data variable for class
	public $data = array();
    function __construct() {
        parent::__construct();	
        //I.E Fix: Holds SESSION accross the DOMAIN
        header('P3P: CP="CAO PSA OUR"');
        //------------ Model Functions <Start>-----------------//
        //------------ Model Functions <End>-----------------//	
        	
        //------------ Libraries <Start> -----------------//
		//------------ Libraries <End> -----------------//
		$this->xajax->configure('javascript URI',base_url().'xajax' );
		$this->xajax->processRequest();
		$this->xajax_js = $this->xajax->getJavascript( base_url() ); 
        $this->output->enable_profiler(false);
        
        //------------ Common Function <Start> -----------------//
        $this->commonFunction();
        $this->load->library('session');
        //------------ Common Function <End> -----------------//
		//------------ Class Common Values <Start> -----------------//
		$this->data['module'] = "01";	
		$this->data['moduleName'] = "Homepage";	
		$this->data['page'] = 'homepage';
		//------------ Class Common Values <Start> -----------------//
    }
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Ed>
	|--------------------------------------------------------------------------
	*/
	/*--------------------------------------------------------------------------------------------------------------------------
    FUNCTIONS LIST:
	01: index
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 01: index
	*
	* This function is the entry point to website's homepage
	*
	*/
    

	public function registerByEmailAjax($param=null) {
		
	
		// Checking whether parametres are nullor not
		if ($param != null) {
			$first_name = $param['first_name'];
			$last_name = $param['last_name'];
			$name = $first_name." ".$last_name;
			$email = $param['email'];
			$password = $param['password'];
			$business_name = '';
			$planner_account_type = '';

			$role = '3';
				
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

	 public function loginAjax($param=null) {
	 	

	 	$objResponse = new xajaxResponse();
		// Checking whether parametres are nullor not
		if ($param != null) {
			$email = $param['email'];
			$password = encrypt_url($param['password']);
			$remember_me = 0;

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
					// 	$cookie_time = (3600 * 24 * 30); // 30 days
					// 	$hash = md5($user_data['created']); // will result in a 32 characters hash
					// 	setcookie (WEBSITE_COOKIE, 'usr='.$user_data['email'].'&hash='.$hash, time() + $cookie_time);
						
					// }
					//Redirecting to DSHBOARD
					setcookie('is_wowzer_logged_in', '1', time() + (86400 * 30), "/");
					$this->session->set_userdata(WEBSITE_FRONTEND_SESSION , $user_data['id']);
					$this->session->set_userdata('Name' , $user_data['first_name']);
					$this->session->set_userdata('premium_subscription' , $user_data['premium_subscription']);
					if ($user_data['user_type'] == '3') {


							// Service Provider Logged in
							if ($user_data['stripe_connection'] == '1') {
								
								$objResponse->script( "window.location.reload();" );

							}elseif($user_data['stripe_connection'] == '0' || $user_data['stripe_connection'] == ''){
								
								$objResponse->script( "window.location.reload();" );
							}
					}else{
						
						$this->session->set_userdata(WEBSITE_FRONTEND_SESSION , $user_data['id']);
					$this->session->set_userdata('Name' , $user_data['first_name']);
					// $this->session->set_userdata('premium_subscription' , $user_data['premium_subscription']);
					// print_r($_SESSION);
					// exit;
						// Event planner logged in
						$objResponse->script( "window.location.reload();" );
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

    public function index() {
    	
		$this->data['menuName'] = "home";
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['slider'] = $this->page_model->getHomeSlider();

		$data['top_content'] = $this->page_model->getTopContent();
		$data['middle_content'] = $this->page_model->getMiddleContent();
		foreach ($data['middle_content'] as $key => $value) {
			if ($value['mid_section'] == 0) {
			
				$data['middle_main_heading'] = $value['heading'];
				$data['middle_main_sub_heading'] = $value['sub_heading'];
				$data['middle_main_content'] = $value['content'];
			
			}			
			
		}
		$data['bottom_content'] = $this->page_model->getBottomContent();
		foreach ($data['bottom_content'] as $key1 => $value1) {
			$data['bottom_main_heading'] = $value1['heading'];
			$data['bottom_sub_headings'] = $value1['sub_heading'];
			$data['html_content'] = $value1['content'];
		}
		
		$template['body_content'] = $this->load->view('frontend/pages/homepage', $data, true);
		$this->load->view('frontend/layouts/template', $template, false);
	}


	public function subscribe_now($value='')
	{
		$objResponse = new xajaxResponse();
		$qStr ="INSERT INTO
					subscription_email
				SET
					email = '".$value['id']."'";
		$query = $this->db->query($qStr);
	

				$objResponse->script('alert("You have subscribed to our portal. Thanks!");'); 
			return $objResponse;	
	}
}
/* End of file main.php */
/* Location: ./application/controllers/main.php */
