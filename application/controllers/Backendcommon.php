<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backendcommon extends CI_Controller {
	//------------ Global data <Start>-----------------//	
	public $common_data = array();
	//------------ Global data <Start>-----------------//	
	function __construct() {
		parent::__construct();	    
		//session_start();
		//I.E Fix: Holds SESSION accross the DOMAIN 
		header('P3P: CP="CAO PSA OUR"'); 	
		//------------ Model Functions <Start>-----------------//
		$this->load->model('backend/login_model');
		$this->load->model('backend/user_model');
		$this->load->model('backend/page_model');
		$this->load->model('backend/category_model');
		$this->load->model('backend/payment_model');
		$this->load->model('backend/settings_model');
		$this->load->model('backend/job_model');
		$this->load->model('backend/ad_model');
		$this->load->model('backend/academic_initiative');
		$this->load->model('frontend/Sp_event_model');
		$this->load->model('frontend/portfolio_model');
		//------------ Model Functions <End>-----------------//	
				
		//------------ XAJAX <Start> -----------------//
		$this->xajax->registerFunction(array('logoutAjax', $this, 'logoutAjax'));
		$this->xajax->registerFunction(array('MGRequestAjax', $this, 'MGRequestAjax'));
		$this->xajax->registerFunction(array('updateAccountAjax', $this, 'updateAccountAjax'));
		$this->xajax->registerFunction(array('updateUserAjax', $this, 'updateUserAjax'));
		$this->xajax->registerFunction(array('addNewAdAjax', $this, 'addNewAdAjax'));
		$this->xajax->registerFunction(array('editAdAjax', $this, 'editAdAjax'));
		$this->xajax->registerFunction(array('addhomepageSlideAjax', $this, 'addhomepageSlideAjax'));
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
	03: changeUserPaymentStatusAjax
	04: changeTalentJobStatusAjax
	05: changeTalentPaymentStatusAjax
	06: updateTalentAmountAjax
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
		$objResponse = new xajaxResponse();
		//unsetting user session
		$cookie_name = 'wowzer_admin_auth';
		setcookie($cookie_name, "", time()-3600000);
		$this->session->unset_userdata('wowzer_admin_email');
		$this->session->unset_userdata('wowzer_admin_id');
		$objResponse->script( "window.location = '".BACKEND_SERVER_URL."';" );
		
		while(!$this->session->userdata('wowzer_admin_email')) {
			return $objResponse;
		}
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 03: changeUserPaymentStatusAjax
	*
	* This function changes user subscription payment status i.e. "Approved / Rejected"
	*
	*/
	public function changeUserPaymentStatusAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		$user_id = $param['user_id'];
		$transaction_id = $param['transaction_id'];
		$id = $param['id'];
		$payment_type = $param['payment_type'];
		$amount = $param['amount'];
		$month_frequency = $param['month_frequency'];
		$coupon_code = $param['coupon_code'];
		$coupon_id = $param['coupon_id'];
		$reason = $param['reason'];
		$status = $param['status'];
		$action_row_type = $param['action_row_type'];
		// Changing user status in DB
		$coupon_response = 1;
		//echo date('Y-m-d',$expiry_date); die();
		if($coupon_id!=0 && $status!=REJECTED_PAYMENT_STATUS_ID){
			$coupon_detail = $this->payment_model->getCouponById($coupon_id);
			$is_active_status = "";
			if($coupon_detail['use_cycle']==($coupon_detail['avail_count']+1)){
				$is_active_status = INACTIVE_STATUS_ID;
			}
			$coupon_response = $this->payment_model->changeTalentCouponStatus($coupon_id,AVAILED_COUPON_STATUS_ID,$is_active_status);
		}
		$max_expiry_date = $this->payment_model->getMaxExpiryDate($user_id);
		if(!empty($max_expiry_date) && date('Y-m-d', $max_expiry_date) > date("Y-m-d")){
			$expiry_date = strtotime('+'.$month_frequency.' month',$max_expiry_date);  
		}else{
			$expiry_date = strtotime('+'.$month_frequency.' month',time());  
		}
		$update_response = $this->payment_model->changeTalentPaymentStatus($id,$status,$reason,$expiry_date);
		if($status==APPROVED_PAYMENT_STATUS_ID){
			 $this->payment_model->changeTalentSubscriptionExpiry($user_id,$expiry_date);
		}
		if($update_response && $coupon_response){
			if(!empty($action_row_type)){
				$this->session->set_userdata('action_row',$action_row_type);
			}
			$user = $this->user_model->getUserById($user_id);
			//Email details available in this function already
			$to_email = $user['email'];
			userPaymentStatusEmail($status,$reason,$user['first_name'],$to_email,$transaction_id);
			$objResponse->script( "window.location.reload()" );
		}
	}
	return $objResponse ;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 04: changeTalentJobStatusAjax
	*
	* This function changes user talent job engagement status i.e. "Approved / Removed"
	*
	*/
	public function changeTalentJobStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) {
			$user_id = $param['user_id'];			
			$id = $param['id'];
			$job_id = $param['job_id'];
			$status = $param['status']; 
			$reason = $param['reason']; 
			$action_row_type = $param['action_row_type']; 
			$job_start_date1 = str_replace('/', '-', $param['job_start_date']);
			$job_end_date1 = str_replace('/', '-', $param['job_end_date']);
			$job_start_date = strtotime($job_start_date1); 
			$job_end_date = strtotime($job_end_date1);   
			$user_available = $this->job_model->checkUserAvailability($user_id,$job_start_date,$job_end_date);
			
			if($status==TALENT_JOB_REMOVED_STATUS_ID){
				$this->job_model->deleteUserUnavailability($user_id,$id);
			}else if(!empty($user_available) && $status==APPROVED_TALENT_JOB_STATUS_ID){
				$objResponse->script( "$('#delete_modal').modal('hide')");	
				$objResponse->script( "showMessageContent('Selected talent is not available within the selected dates.','Talent Busy');");	
				return $objResponse;
			}else if(empty($user_available) && $status==APPROVED_TALENT_JOB_STATUS_ID){
				if($job_start_date1!=$job_end_date1){
					$period = new DatePeriod(
					 new DateTime($job_start_date1),
					 new DateInterval('P1D'),
					 new DateTime($job_end_date1)
					);
					foreach($period as $key => $date) { 
						$timestamps[] = strtotime($date->format('d-m-Y')); 
					}
					array_push($timestamps, $job_end_date);					
				}else{
					$timestamps[] = strtotime($job_start_date1); 
				}
				
				//pr($timestamps); die();
				
				if(!empty($timestamps)){
					$this->job_model->addTalentUnavailability($id,$job_id,$user_id,$timestamps);
				}
			}
			$update_response = $this->job_model->updateTalentJobStatus($id,$status,$reason);
			
			if($update_response){
				if(!empty($action_row_type)){
					$this->session->set_userdata('action_row',$action_row_type);
				}
				$user = $this->user_model->getUserById($user_id);
				//Email details available in this function already
				$to_email = $user['email'];
				userTalentJobStatusEmail($status,$reason,$user['first_name'],$to_email,$job_id);
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 05: changeTalentPaymentStatusAjax
	*
	* This function changes user talent job payment status i.e. "paid / not paid"
	*
	*/
	public function changeTalentPaymentStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) {
			$id = $param['id'];
			$status = $param['status']; 
			$action_row_type = $param['action_row_type']; 
			$update_response = $this->job_model->updateTalentPaymentStatus($id,$status);
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
	/**
	* 06: updateTalentAmountAjax
	*
	* This function changes talent job amount in a particular job
	*
	*/
	public function updateTalentAmountAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) {
			$id = $param['id'];
			$amount = $param['amount']; 
			$action_row_type = $param['action_row_type'];  
			$update_response = $this->job_model->updateTalentAmount($id,$amount);
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
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: commonFunction
	02: isLoggedIn
	03: isUserLoggedIn
	04: errorPage
	05: movePage
	--------------------------------------------------------------------------------------------------------------------------*/
   /**
	 * 01: commonFunction
	 *
	 * This function is used to save user common data which can be used globaly in this website
	 *
	 */
		public function commonFunction(){
		
		 if($this->session->userdata('wowzer_admin_email')) {
			$this->common_data['user_data'] = $this->user_model->getAdminByEmail($_SESSION['wowzer_admin_email']);
		 }	else{
			 $this->common_data['user_data'] = '';
		 } 
	 }
	/**
	 * 02: isLoggedIn
	 *
	 * This function checks whether admin is logged in or not, if user is not logged n it will redirect to the login page
	 */
	public function isLoggedIn() { 
		if($this->session->userdata('wowzer_admin_email')) {
			//Do Nothing
		}else {    
			header("Location: ".BACKEND_SERVER_URL);
   			die();
        }			
	}
	/**
	 * 03: isUserLoggedIn
	 *This function is used to prevent redirection to the login page without logout
	*/
	public function isUserLoggedIn() {
		if($this->session->userdata('wowzer_admin_email')) {
			header("Location: ".BACKEND_TALENT_URL);
   			die();
		}else {    
			return false;
        }			
	}
	/**
	 * 04: errorPage
	 *This function is used to redirect the user to the error page
	*/
    public function errorPage(){
		header("Location: ".ROUTE_404_ERROR);
		die();
	}
	
	/**
	 * 05: movePage
	 *This function is used to redirect the user to any page
	*/
	public function movePage($url){
		header("Location: ".$url);
		die();
	} 		
}
/* End of file Backendcommon.php */
/* Location: ./application/controllers/backend/Backendcommon.php */