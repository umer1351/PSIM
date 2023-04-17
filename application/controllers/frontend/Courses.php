<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends Common {

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
		// $this->isLoggedIn();
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

     public function index() {
    	
		//assign public class values to function variable
		
			
			$data = $this->data;
		    

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$data['listing']=$this->page_model->getExamsListing();
			$template['body_content'] = $this->load->view('frontend/pages/courses/index', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);			
	}

	 public function foundation() {
    	
		//assign public class values to function variable
		
			
			$data = $this->data;
		    

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$data['listing']=$this->page_model->getExamsListing();
			$template['body_content'] = $this->load->view('frontend/pages/foundation/index', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);			
	}

	

	public function details($value='')
	{$data = $this->data;
		
		$objResponse = new xajaxResponse();
		$data['common_data'] = $this->common_data;
		
		
		$template['body_content'] = $this->load->view('frontend/pages/courses/details', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);

		
	}

	public function sort($value='')
	{	$data = $this->data;
		
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$id = $_GET['type'];

			$data['listing']=$this->page_model->getExamsListingSort($id);
			// print_r($data['listing']);
			// exit;
			$data['type'] = $_GET['type'];
			$template['body_content'] = $this->load->view('frontend/pages/courses/sort', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);

		
	}

	public function academic_sort($value='')
	{	$data = $this->data;
		
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$id = $_GET['type'];

			$data['listing']=$this->page_model->getAcademicsListingSort($id);
			// print_r($data['listing']);
			// exit;
			$data['type'] = $_GET['type'];
			$template['body_content'] = $this->load->view('frontend/pages/academic/sort', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);

		
	
	}

	public function intervention_sort($value='')
	{	$data = $this->data;
		
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$id = $_GET['type'];

			$data['listing']=$this->page_model->getinterventionListingSort($id);
			// print_r($data['listing']);
			// exit;
			$data['type'] = $_GET['type'];
			$template['body_content'] = $this->load->view('frontend/pages/intervention/sort', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);

		
	}

	public function physician_sort($value='')
	{	$data = $this->data;
		
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$id = $_GET['type'];

			$data['listing']=$this->page_model->getphysicianListingSort($id);
			// print_r($data['listing']);
			// exit;
			$data['type'] = $_GET['type'];
			$template['body_content'] = $this->load->view('frontend/pages/physician/sort', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);

		
	}
	public function partner_sort($value='')
	{	$data = $this->data;
		
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$id = $_GET['type'];

			$data['listing']=$this->page_model->getpartnerListingSort($id);
			// print_r($data['listing']);
			// exit;
			$data['type'] = $_GET['type'];
			$template['body_content'] = $this->load->view('frontend/pages/partners/sort', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);

		
	}

	public function fellowship_sort($value='')
	{	$data = $this->data;
		
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$id = $_GET['type'];

			$data['listing']=$this->page_model->getfellowshipListingSort($id);
			// print_r($data['listing']);
			// exit;
			$data['type'] = $_GET['type'];
			$template['body_content'] = $this->load->view('frontend/pages/fellowship/sort', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);

		
	}

	public function upcoming_activities($value='')
	{

		$data = $this->data;
		
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$id = $_GET['type'];

			$data['listing']=$this->page_model->getExamsListingSort($id);
			$data['academics']=$this->page_model->getAcademicsListingSort($id);
			$data['intervention']=$this->page_model->getinterventionListingSort($id);
			$data['physician']=$this->page_model->getphysicianListingSort($id);
			$data['partners']=$this->page_model->getpartnerListingSort($id);
			$data['fellowship']=$this->page_model->getfellowshipListingSort($id);
			// print_r($data['listing']);
			// exit;
			$data['type'] = $_GET['type'];
			$template['body_content'] = $this->load->view('frontend/pages/upcoming/sort', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);

		
	}



	public function archive($value='')
	{	$data = $this->data;
		    

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$data['listing']=$this->page_model->getArchiveListing();
			$template['body_content'] = $this->load->view('frontend/pages/archive/index', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);
	}

	public function modules($value='')
	{
		
		$data = $this->data;

		$template['body_content'] = $this->load->view('frontend/Pages/courses/details', $data, true);

	}
	public function subscribe($value='')
	{
		$this->isLoggedIn();
		$id = decrypt_url($_GET['u']);
		$type = decrypt_url($_GET['t']);
		$data = $this->data;
		$data['user'] = $id;
		$data['type'] = $type;
	
	$data['common_data'] = $this->common_data;
	//echo("arg1");die();
	if($data['type'] == 'exams'){
		
		$data['sub_module'] = $this->page_model->get_sub_modules_exams($id);
		$data['listing']=$this->page_model->getExamsListingDet($id);
		$data['listing_det']=$this->page_model->getExamsListingDetails($id);
		
		
		 $data['files'] = $this->page_model->getRows($id);
		$template['body_content'] = $this->load->view('frontend/cart/details', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
	}
	if($data['type'] == 'academics'){

		
		$data['listing']=$this->page_model->getacadamicsListingDet($id);
		$data['listing_det']=$this->page_model->getacadamicsListingDetails($id);
			$data['sub_module'] = $this->page_model->get_sub_modules_acadamics($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_acadamics($id);
			 $data['files'] = $this->page_model->getRowsAcademic($id);
			 $data['poster'] = $this->page_model->getPoster($id);
			$template['body_content'] = $this->load->view('frontend/cart/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
		if($data['type'] == 'mets'){
			$data['sub_module'] = $this->page_model->get_sub_modules_mets($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_mets($id);
			$template['body_content'] = $this->load->view('frontend/cart/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
		if($data['type'] == 'physician'){
			$data['sub_module'] = $this->page_model->get_sub_modules_physician($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_physician($id);
			$template['body_content'] = $this->load->view('frontend/cart/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
		if($data['type'] == 'partners'){
			$data['sub_module'] = $this->page_model->get_sub_modules_partners($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_partners($id);
			$template['body_content'] = $this->load->view('frontend/cart/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
		if($data['type'] == 'fellowship'){
			 $data['listing']=$this->page_model->getFellowhispListingDet($id);
			 $data['listing_det']=$this->page_model->getfellowshipDetails($id);
			 $data['sub_module'] = $this->page_model->get_sub_modules_fellowship($id);
			 $data['already_subscribe'] = $this->page_model->get_sub_modules_fellowship($id);
			 $data['files'] = $this->page_model->getRowsFellowship($id);
			 $data['poster'] = $this->page_model->getPosterFellowship($id);

			
			$template['body_content'] = $this->load->view('frontend/pages/cart/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
	
	}

	public function subscription($value='')
	{
		$this->isLoggedIn();
		$id = $this->common_data['user_data']['id'];
		// $type = decrypt_url($_GET['t']);

		$data = $this->data;
		$data['user'] = $id;
	

	$data['common_data'] = $this->common_data;
	//echo("arg1");die();
	$data['listing']=$this->page_model->getsubsciptions($id);
	
	$template['body_content'] = $this->load->view('frontend/subscription/index', $data, true);	
	$this->load->view('frontend/layouts/template', $template, false);
		
	}
	
	public function subscribe_fellowship(){
	    $this->isLoggedIn();
		$id = $this->common_data['user_data']['id'];
		// $type = decrypt_url($_GET['t']);

		$data = $this->data;
		$data['user'] = $id;
	

	$data['common_data'] = $this->common_data;
	//echo("arg1");die();
	$data['listing']=$this->page_model->getsubsciptions($id);
	
	$template['body_content'] = $this->load->view('frontend/subscription/fellowship', $data, true);	
	$this->load->view('frontend/layouts/template', $template, false);
	}

	
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
//initializing public data variable for class

// / End of file pages.php / 
// / Location: ./application/controllers/frontend/pages.php /




