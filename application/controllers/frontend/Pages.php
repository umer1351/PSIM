<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Common {
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
	01: sendEmailAjax
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 01: sendEmailAjax
	*
	* This function is used to send email to admin and the person who contacted wowzer
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
	public function media_gallery($value='')
	{

		$this->data['menuName'] = "about";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
	
		$template['body_content'] = $this->load->view('frontend/pages/courses/gallery', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
		
	}
	function sendEmailAjax($param=null){
		// Checking whether parametres are nullor not
		if ($param != null) {
			$contact_name = $param['contact_name'];
			$contact_email = $param['contact_email'];
			//$contact_phone = $param['contact_phone'];
			$contact_subject = $param['contact_subject'];
			$contact_message = $param['contact_message'];
			$query_type = $param['query_type'];
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
			$msg1 = "Hello Admin,<br /><br />
						Someone recently contacted you from Wowzer's <a href='".ROUTE_CONTACT_US."'>Contact Us Bot</a>.<br>
						Query details:<br /><br />
						<b>Name:</b> ".$contact_name."<br>
						<b>Email:</b> ".$contact_email."<br>
						<b>Query Purpose:</b> ".$message_type_array[$query_type]."<br>
						<b>Message:</b> ".$contact_message."<br>
						Sincerely,<br />
						Support Team";
			sendEmail($sender1,$receiver1,$msg1,$subject1);
			$web_url = ROUTE_CONTACT_US;
			$web_msg = "Email Sent Successfully!";
			
			$this->page_model->addContactQuery($contact_name,$contact_email,$contact_subject,$contact_message,$query_type);
			//echo "test"; die();
			//$objResponse->script('successAlerts("'.$web_msg.'","'.$web_url.'");');
			$objResponse->script('$("#contact_success_modal").modal("show")');
		} 
		return $objResponse;
	}
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Ed>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	//FUNCTIONS LIST:
	//01: aboutUs
	//02: contact
	//03: privacyPolicy
	//04: termAndConditions
	//05: pricing
	//06: faq
	//07: ourTeam
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: aboutUs
	 *
	 * This function is the entery point to this class. 
	 * It shows about us view to the user.
	 *
	 */

	
	public function how_to_reg() {
		//assign public class values to function variable
		$this->data['menuName'] = "about";
		$data = $this->data;
		$data['common_data'] = $this->common_data;

		$template['body_content'] = $this->load->view('frontend/pages/how-to-reg', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	
    public function aboutUs() {
		//assign public class values to function variable
		$this->data['menuName'] = "about";
		$data = $this->data;
		$data['common_data'] = $this->common_data;

		$template['body_content'] = $this->load->view('frontend/pages/about-us', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 *02: contactUs
	 *
	 * This function is the entery point to this class. 
	 * It shows contact view to user.
	 *
	 */
	
    public function contactUs() {
		//assign public class values to function variable
		$this->data['menuName'] = "contact";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		/* $data['common_data'] = $this->common_data;
		$data['page'] = 'contact_us';
		$data['moduleName'] = 'Contact Us'; */

		$data['page_data'] = $this->page_model->getContact();
		$template['body_content'] = $this->load->view('frontend/pages/contact', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 *03: privacyPolicy
	 *
	 * This function is the entery point to this class. 
	 * It shows privacy policy view to user.
	 *
	 */
	
    public function privacyPolicy() {
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_data'] = $this->page_model->getprivacyPolicyData();
		$template['body_content'] = $this->load->view('frontend/pages/privacyPolicy', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 *04: termAndConditions
	 *
	 * This function is the entery point to this class. 
	 * It shows terms and conditions view to user.
	 *
	 */
	
    public function termAndConditions() {
    	
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		// $data['page_data'] = $this->page_model->getPageData(TERMS_CONDITIONS_ID);

		$template['body_content'] = $this->load->view('frontend/pages/termsAndConditions', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}


	public function terms_and_conditions()
	{
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_data'] = $this->page_model->getTermsAndConditions();

		$template['body_content'] = $this->load->view('frontend/pages/terms-and-conditions', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 *05: pricing
	 *
	 * This function is the entery point to this class. 
	 * It shows pricing view to user.
	 *
	 */
	
    public function pricing() {
		//assign public class values to function variable
		$this->data['menuName'] = "pricing";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['top_content'] = $this->page_model->getPricingTopContent();
		$data['commission'] = $this->page_model->commission();
		$data['price_plan'] = $this->page_model->priceplan();
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
		$data['page_faqs'] = $this->page_model->getFaq();	
			
			
		}

	
	

		$template['body_content'] = $this->load->view('frontend/pages/pricing', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 *06: faqs
	 *
	 * This function is the entery point to this class. 
	 * It shows Faqs view to user.
	 *
	 */
	
    public function faqs() {
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['page_faqs'] = $this->page_model->getFaq();

		$template['body_content'] = $this->load->view('frontend/pages/faqs', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	/**
	 *07 ourTeam
	 *
	 * This function is the entery point to this class. 
	 * It shows Our Team view to user.
	 *
	 */
	
    public function ourTeam() {
		//assign public class values to function variable
		$this->data['menuName'] = "team";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['members'] = $this->page_model->getAllTeamMembers();
		$template['body_content'] = $this->load->view('frontend/pages/ourTeam', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}

		public function contactQueries()
	{
			$this->data['moduleLink'] ="/1";
			$this->data['moduleName'] = "";
			$this->data['subModuleName'] = "Events";
			$this->data['page_id'] = '1';
			
			$data = $this->data;
			$data['contact']=$this->page_model->getAllcontactdetail();

			$data['common_data'] = $this->common_data;
			//echo("arg1");die();
			$template['body_content'] = $this->load->view('backend/contact/contact_queries', $data, true);	
			$this->load->view('backend/layouts/template', $template, false);
	}
	 public function contactquery($param='') {
		
	

		$objResponse = new xajaxResponse();
		$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		
		$data['members'] = $this->page_model->addContactQuery($param['name'],$param['email'],$param['message']);
		$sender = $param['email'];
		if($data['members']){
		$sender = $param['email'];
		$receiver = 'hamza@appstersinc.com';
		$subject = "Contact Query";
		$msg = $param['message'];

		// sendEmail($sender,$receiver,$msg,$subject);
		$objResponse->script( "$('.success-info-msg').show();");	
		}

	}
	public function subscription($value='')
	{
		$id = decrypt_url($_GET['u']);
		$type = decrypt_url($_GET['t']);
		$data = $this->data;
		$data['user'] = $id;
		$data['type'] = $type;

	$data['common_data'] = $this->common_data;
	//echo("arg1");die();
	$template['body_content'] = $this->load->view('frontend/subscription/index', $data, true);	
	$this->load->view('frontend/layouts/template', $template, false);
		
	}
	public function details($value='')
	{
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
		$template['body_content'] = $this->load->view('frontend/pages/courses/details', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
	}
	if($data['type'] == 'academics'){

		
		$data['listing']=$this->page_model->getacadamicsListingDet($id);
		$data['listing_det']=$this->page_model->getacadamicsListingDetails($id);
			$data['sub_module'] = $this->page_model->get_sub_modules_acadamics($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_acadamics($id);
			 $data['files'] = $this->page_model->getRowsAcademic($id);
			 $data['poster'] = $this->page_model->getPoster($id);
			$template['body_content'] = $this->load->view('frontend/pages/academic/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
		if($data['type'] == 'mets'){
			$data['sub_module'] = $this->page_model->get_sub_modules_mets($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_mets($id);
			$template['body_content'] = $this->load->view('frontend/pages/intervention/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
		if($data['type'] == 'physician'){
			$data['sub_module'] = $this->page_model->get_sub_modules_physician($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_physician($id);
			$template['body_content'] = $this->load->view('frontend/pages/physician/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
		if($data['type'] == 'partners'){
			$data['sub_module'] = $this->page_model->get_sub_modules_partners($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_partners($id);
			$template['body_content'] = $this->load->view('frontend/pages/partners/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
		if($data['type'] == 'fellowship'){
			 $data['listing']=$this->page_model->getFellowhispListingDet($id);
			 $data['listing_det']=$this->page_model->getfellowshipDetails($id);
			 $data['sub_module'] = $this->page_model->get_sub_modules_fellowship($id);
			 $data['already_subscribe'] = $this->page_model->get_sub_modules_fellowship($id);
			 $data['files'] = $this->page_model->getRowsFellowship($id);
			 $data['poster'] = $this->page_model->getPosterFellowship($id);

			
			$template['body_content'] = $this->load->view('frontend/pages/fellowship/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
	
		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
/* End of file pages.php */
/* Location: ./application/controllers/frontend/pages.php */
