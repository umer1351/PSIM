<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Premium_membership extends Common {
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

	public function connect_stripe($value='')
	{
		$objResponse = new xajaxResponse();
		$id = $value['id'];		
	 	$response=$this->Transactions_model->connect_stripe($id);
	
		if($response){
			$objResponse->script('location.reload();');
		}
		return $objResponse;
	}

	public function index()
	{
		    $subscription = $this->common_data['user_data']['premium_subscription'];
		    $user_id = $this->common_data['user_data']['id'];
			$data = $this->data;
			$data['record1']=$this->Transactions_model->getMembershipDetails($user_id,$subscription);
			$data['record']=$this->Transactions_model->getMembership($user_id);
			$data['record2']=$this->Transactions_model->getMembershipStatus();
			$data['record3']=$this->Transactions_model->getPaymentDetails($user_id);
			// print_r($data['record3']);
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'premium-membership';
			$template['body_content'] = $this->load->view('frontend/go_pro/index', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);	
	}
    public function serviceProviderevents() {
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			$data = $this->data;
			$data['record']=$this->Sp_event_model->getEvents();
			//print_r($data['record']);die();
						foreach ($data['record'] as $key => $value) {
				
				$data['check']=$this->Sp_event_model->checkjobs($data['record'][$key]['id'],$user_id);
				//print_r($data['check']);die();

					
					if($data['check']>1)
					{
					//print_r($data['check']['0']['job_id']);
					$data['record'][$key]['check']='1';
					}
					else{

						$data['record'][$key]['check']='0';
					}


			}


			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'event';
			$template['body_content'] = $this->load->view('frontend/sp-event/sp-event', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}

	public function premium($value='')
	{	
		 	$subscription = $this->common_data['user_data']['premium_subscription'];
		    $user_id = $this->common_data['user_data']['id'];
			$data = $this->data;
			$data['record1']=$this->Transactions_model->getMembershipDetails($user_id,$subscription);
			$data['record']=$this->Transactions_model->getMembership($user_id);
			$data['record2']=$this->Transactions_model->getMembershipStatus();
			$data['record3']=$this->Transactions_model->getPaymentDetails($user_id);
			// print_r($data['record3']);
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'premium-membership';
			$template['body_content'] = $this->load->view('frontend/go_pro/become_member', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);	
	}

	public function payNow1($value='')
	{


		$objResponse = new xajaxResponse();

		//Getting Variables	
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);
	
		
		
				

			$file_element_name = 'imgInp1';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."IDCARDFRONT";
			//print_r($file_element_name);die();
			$config['allowed_types'] = 'jpg|png|jpeg|gif|mp4';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					echo $msg;
					die();
			}  else {
				//echo("arg1");die();
					$data = array('upload_data' => $this->upload->data());
			}

			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
			
		
			$qResponse = $this->page_model->addfrontCard($file_name, $user_id);
			
			
	}
	public function payNow3($value='')
	{


		$objResponse = new xajaxResponse();
		
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);
	
		
		
				
	
			$file_element_name = 'imgInp3';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."PMDCCERTIFICATE";
			//print_r($file_element_name);die();
			$config['allowed_types'] = 'jpg|png|jpeg|gif|mp4';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					echo $msg;
					die();
			}  else {
				
					$data = array('upload_data' => $this->upload->data());
			}

			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
			
		// }
			$qResponse = $this->page_model->addPMDC($file_name, $user_id);
			
	}
	public function payNow2($value='')
	{


		$objResponse = new xajaxResponse();
	
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);

		
				
		

			$file_element_name = 'imgInp2';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."IDCARDBACK";

			$config['allowed_types'] = 'jpg|png|jpeg|gif|mp4';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					echo $msg;
					die();
			}  else {

					$data = array('upload_data' => $this->upload->data());
			}

			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
		

			$qResponse = $this->page_model->addbackCard($file_name, $user_id);
		
	}
	public function payNow4($value='')
	{


		$objResponse = new xajaxResponse();
	
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);

		
				
		

			$file_element_name = 'imgInp4';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."Degree";

			$config['allowed_types'] = 'jpg|png|jpeg|gif|mp4';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					echo $msg;
					die();
			}  else {

					$data = array('upload_data' => $this->upload->data());
			}

			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
		

			$qResponse = $this->page_model->addDegreeCard($file_name, $user_id);
		
	}

	public function payNow5($value='')
	{


		$objResponse = new xajaxResponse();
	
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);

		
				
		

			$file_element_name = 'imgInp5';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."fellowshipFee";

			$config['allowed_types'] = 'jpg|png|jpeg|gif|mp4';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					echo $msg;
					die();
			}  else {

					$data = array('upload_data' => $this->upload->data());
			}

			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
		

			$qResponse = $this->page_model->addfellowshipFee($file_name, $user_id);
		
	}
	public function payNow6($value='')
	{


		$objResponse = new xajaxResponse();
	
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);

		
				
		

			$file_element_name = 'imgInp6';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."fellowshipFee";

			$config['allowed_types'] = 'jpg|png|jpeg|gif|mp4|pdf';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					echo $msg;
					die();
			}  else {

					$data = array('upload_data' => $this->upload->data());
			}

			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
		

			$qResponse = $this->page_model->addDefellowshipCV($file_name, $user_id);
		
	}
	public function payNow7($value='')
	{


		$objResponse = new xajaxResponse();
	
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);

		
				
		

			$file_element_name = 'imgInp7';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."fellowshipFee";

			$config['allowed_types'] = 'jpg|png|jpeg|gif|mp4|pdf';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					echo $msg;
					die();
			}  else {

					$data = array('upload_data' => $this->upload->data());
			}

			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
		

			$qResponse = $this->page_model->addfellowhsipApplication($file_name, $user_id);
		
	}

	public function payNow($value='')
	{


		$objResponse = new xajaxResponse();
	
		//Getting Variables	
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		
	
	
		$id = $_POST['user_id'];
		
		$designation = $_POST['designation'];
	
		$institute = $_POST['institute'];
		$phone = $_POST['account_phone'];
		$address = $_POST['account_address'];
		$sel = $_POST['sel'];
		
				
	
			$file_element_name = 'imgInp';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."portfolio";
		
			$config['allowed_types'] = 'jpg|png|jpeg|gif|mp4';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($file_element_name)) {
				$msg = $this->upload->display_errors('', ''); 
				$status = 0;
					$response['status'] = $status;
					$response['response'] = $msg;
					echo json_encode($response);
					echo $msg;
					
			}  else {
				
					$data = array('upload_data' => $this->upload->data());
			}

				
			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
			 
			$qResponse = $this->page_model->addmember($sel,$file_name, $user_id,$designation,$institute,$phone,$address);
		
				 	echo '<script language="javascript">';
				    echo 'top.location.href = "http://demo.psim.org.pk/premium-membership-success";';
				    echo '</script>'; 
	
	}

	public function success($value='')
	{
		$data = $this->data;
		//print_r($_GET['s']);die();
		

		$data['common_data'] = $this->common_data;
		$data['common_data']['page'] = 'event';
		//Getting all users
		$template['body_content'] = $this->load->view('frontend/go_pro/success', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
	}

	public function serviceProviderDetails()
	{
		$service_provider = $_GET['sp'];

		$user_id = $service_provider;
			
			$data = $this->data;

		

			$data['record']=$this->portfolio_model->getPortfolioRecord($user_id);
			$data['media']=$this->portfolio_model->getPortfolioImage($user_id);
			$data['review']=$this->Review_model->getSpreview($user_id);
			$data['avgreview']=$this->Review_model->avgreview($user_id);
			$data['service_provider']=$this->portfolio_model->getServiceProfile($service_provider);

			$service_id=$data['service_provider'][0]['services'];
			$data['service_provider']['name'] = $this->job_model->get_selected_jobs($service_id,$user_id);

			
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'event';
			$template['body_content'] = $this->load->view('frontend/em-event/sp_portfolio', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);	

	}

	public function cancel_renewal_ajax($value='')
	{
		 $user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		 $qstr = "UPDATE user set stripe_connection = '0', stripe_account_type = '0', stripe_expiry_date ='0' WHERE id = '".$user_id."'";
		 $query = $this->db->query($qstr);
		 $objResponse = new xajaxResponse();
		if($query){
			$objResponse->script('location.reload();');
		}
		return $objResponse;
	}
	 public function eventDetailsSp() {
		//assign public class values to function variable
		//echo "1";die();
		$data = $this->data;
		//print_r($_GET['s']);die();
		$data['sp_id'] = $user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		$data['ep_id'] = $_GET['eo'];
		$data['job_id'] = $_GET['job_id'];
		$data['common_data']['page'] = 'event';
		$data['services']=$this->Sp_event_model->getStatusDetails($data['sp_id'],$data['job_id'],$data['ep_id']);
 		$data['details']=$this->Sp_event_model->getJobData($data['job_id']);
		$data['status'] = $this->Sp_event_model->getStatus($data['job_id']);

		$data['common_data'] = $this->common_data;
		$data['common_data']['page'] = 'event';
		//Getting all users
		$template['body_content'] = $this->load->view('frontend/sp-event/detail', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	public function eventPoviderEvents() {
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);

			$data = $this->data;
			$data['record']=$this->Sp_event_model->getEventsEp($user_id);
			foreach ($data['record'] as $key => $value) {
				//print_r();die();
				$data['check']=$this->Sp_event_model->checkjobstatus($data['record'][$key]['id']);
				//print_r($data['check']);die();

					
					if($data['check']>1)
					{
					//print_r($data['check']['0']['job_id']);
					$data['response']=$this->Sp_event_model->updatejobstatus($data['check']['0']['job_id']);
				}

			}
			//die();
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'event';
			$template['body_content'] = $this->load->view('frontend/em-event/sp-event', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}
	

	 public function eventDetails() {
		//assign public class values to function variable
		
		$data = $this->data;
		
		$data['event_id'] = $_GET['event_id'];
		
		
		$data['services']=$this->Sp_event_model->getEventDetails($data['event_id']);
		// print_r($data['services']);
		// exit();
		$data['details']=$this->Sp_event_model->getEventDetail($data['event_id']);
		$data['status'] = $this->Sp_event_model->getStatus($data['event_id']);
		// print_r($data['status']);
		// exit();
		$data['common_data'] = $this->common_data;
		$data['common_data']['page'] = 'event';
		//Getting all users
		$template['body_content'] = $this->load->view('frontend/em-event/detail', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}

	
	public function eventOffers($value='')
	{
		$data = $this->data;
		
		$data['event_id'] = $_GET['e'];
		$data['event_provider_id'] = $_GET['eo'];
		$data['service_id'] = $_GET['s'];
		
		
		$data['details']=$this->Sp_event_model->getEventDetail($data['event_id']);
		$data['offers']=$this->Sp_event_model->getJobOffers($data['event_id'],$data['event_provider_id'],$data['service_id']);
		
		foreach ($data['offers'] as $key => $value) {
			//print_r($value['sp_id']);die();
			$data['offers'][$key]['avg']=$this->Review_model->avgreview($value['sp_id']);


		}
		$data['service_name'] = $this->Sp_event_model->getServiceName($data['service_id']);
		//print_r($data['offers']);die();

		$data['common_data'] = $this->common_data;
		//Getting all users
		$data['common_data']['page'] = 'event';
		$template['body_content'] = $this->load->view('frontend/em-event/job_offers', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
	}

	public function hire_sp($param='')
	{
		$objResponse = new xajaxResponse();
		//$id = $param['user_id'];
		$id = $param['id'];		
				//$user_id = $param['user_id'];
		$service_id=$param['service_id'];	
		$job_id=$param['job_id'];	
	  $response =$this->Sp_event_model->hire_sp($id);
		$response =$this->Sp_event_model->hire_sp_user_job($service_id,$job_id);
		//print_r($response);die();
		if($response){
			$objResponse->script('location.reload();');
		}
		return $objResponse;
		
	}
	
	public function create()
	{
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);

			$data = $this->data;
			// $data['record']=$this->Sp_event_model->getEventsEp($user_id);

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'event';
			$template['body_content'] = $this->load->view('frontend/em-event/create', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		
	}
	public function create_event_ajax($param='')
	{

		$objResponse = new xajaxResponse();
		$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		$title = $param['title'];
		$details = $param['details'];
		$date = $param['date'];
	    $arr = explode("-",$date);
	    $date1 = $arr[0]; 
	    $date2 = $arr[1];
	    $date2 = strtotime($date2);
	    $date1 = strtotime($date1);
	    $date2 = date('Y-m-d', $date2);
		$arr1 = explode(",",$param['services']);
	 	$arr2 = explode(",",$param['price']);
	 	$total_budget = array_sum($arr2);
	  	$f_array =	array_filter($arr1);
	  	$f_array2 =	array_filter($arr2);
	 	$var_arr = array_combine($f_array, $f_array2);



		$deadline = $param['deadline'];
		$deadline = strtotime($deadline);
		$services = $param['services'];
		$budget = $param['price'];	
		
		// $var_arr = array_combine($array, $array1);
		
		// $services = implode(',', $param['services']);
		$services_old = $param['services'];		
		


		$response = $this->Sp_event_model->create_event_ajax($title,$details,$date2,$deadline,$services,$budget,$user_id,$services_old,$var_arr,$total_budget );
		
			if($response){
			$objResponse->script('location.reload();');
			return $objResponse;
		}
	}

		public function confirmPayment($param='')
	{
		// print_r($param);
		$qStr = "UPDATE user_job set sp_id = '".$param['sp_id']."', job_status = '2', amount = '".$param['amount']."' WHERE service_id = '".$param['service_id']."' AND job_id = '".$param['job_id']."' AND eo_id = '".$param['event_planner_id']."'";
				$query = $this->db->query($qStr);

				$qStr1 = "UPDATE job_status set status = '2' WHERE service_id = '".$param['service_id']."' AND job_id = '".$param['job_id']."' AND ep_id = '".$param['event_planner_id']."' AND sp_id = '".$param['sp_id']."'";
				$query1 = $this->db->query($qStr1);

				$qStr2 = "UPDATE job_status set status = '3' WHERE service_id = '".$param['service_id']."' AND job_id = '".$param['job_id']."' AND ep_id = '".$param['event_planner_id']."' AND sp_id != '".$param['sp_id']."'";
				$query2 = $this->db->query($qStr2);
	}

	public function update_job_status($param='')
	{
		$objResponse = new xajaxResponse();
		//$id = $param['user_id'];
		$job_id = $param['job_id'];		
		$ep_id = $param['event_planner_id'];
		$service_id=$param['service_id'];	
		$sp_id=$param['sp_id'];	
		$status=$param['status'];	

		
	  	$response =$this->Sp_event_model->update_job_status($job_id, $ep_id, $service_id, $sp_id,$status);
		// $response =$this->Sp_event_model->hire_sp_user_job($service_id,$job_id);
		//print_r($response);die();
		if($response){
			$objResponse->script('location.reload();');
		}
		return $objResponse;
		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/



}
/* End of file pages.php */
/* Location: ./application/controllers/frontend/pages.php */
?>