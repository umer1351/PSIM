<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends Backendcommon {
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
		$this->data['module'] = "09";	
		$this->data['moduleName'] = "Jobs";
		$this->data['moduleLink'] = BACKEND_JOBS_URL;
		$this->data['page'] = 'job';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: addJobAjax
	02: editJobAjax
	03: deleteJobAjax
	04: changeJobStatusAjax
	05: changeReviewStatusAjax
	06: showTalentEngageModalAjax
	07: addTalentToJobAjax
	08: getFilteredTalent
	09: changeJobPaymentStatusAjax

	--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 01: addJobAjax
	 *
	 * This function is used to add new job
	 * 
	 *
	 */
	public function addJobAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$submit_type = $param['submit_type'];
			$employer_id = $param['employer_id'];
			$title = $param['title'];
			$startDate = strtotime($param['startDate']);
			$endDate = strtotime($param['endDate']);
			$talent_type = $param['talent_type'];
			$talent_quantity = $param['talent_quantity'];
			$amount = $param['amount'];
			$description = $param['description'];
			
			$response = $this->job_model->addJob($employer_id,$title,$startDate,$endDate,$talent_type,$talent_quantity,$amount,$description);
			if($response){
				$objResponse->script('$("#settings .modal-title").text("Jobs");');
				$objResponse->script('$("#settings .text").text("Job Added Successfully");');
				if($submit_type==2){
					$url = "'".BACKEND_EDIT_JOB_URL."?job_id=".$response."'";
				}else{
					$url = "'".BACKEND_JOBS_URL."'";
				}
				
				$objResponse->script('var url="'.$url.'";');
				$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","redirect("+url+")");');
				$objResponse->script('$("#settings").modal("show");');
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 02: editJobAjax
	 *
	 * This function is used to edit job
	 * 
	 *
	 */
	public function editJobAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$job_id = $param['job_id'];
			$user_id = $param['user_id'];
			$title = $param['title'];
			$reason = $param['reason'];
			$startDate = strtotime($param['startDate']);
			$endDate = strtotime($param['endDate']);
			$talent_type = $param['talent_type'];
			$talent_quantity = $param['talent_quantity'];
			$amount = $param['amount'];
			$job_status = $param['job_status'];
			$description = $param['description'];
			
			$response = $this->job_model->updateJob($job_id,$title,$reason,$startDate,$endDate,$talent_type,$talent_quantity,$amount,$job_status,$description);
			if($response){
				if($job_status!=''){
				 $user = $this->user_model->getUserById($user_id);
				 //Email details available in this function already
				 $to_email = $user['email'];
				 userJobStatusEmail($job_status,$reason,$user['first_name'],$to_email,$job_id);	
				}
				
				$objResponse->script('$("#settings .modal-title").text("Jobs");');
				$objResponse->script('$("#settings .text").text("Job Updated Successfully");');
				$url = "'".BACKEND_JOBS_URL."'";
				$objResponse->script('var url="'.$url.'";');
				$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","redirect("+url+")");');
				$objResponse->script('$("#settings").modal("show");');
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 03: deleteJobAjax
	 *
	 * This function is used delete the job
	 * 
	 *
	 */
	public function deleteJobAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$job_id = $param['job_id'];
			$status = $param['status']; 
			$update_response = $this->job_model->deleteJob($job_id,$status);
			if($update_response){
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 04: changeJobStatusAjax
	 *
	 * This function is used change status of the job
	 * 
	 *
	 */
	public function changeJobStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) {
			$user_id = $param['user_id'];			
			$job_id = $param['id'];
			$status = $param['status']; 
			$reason = $param['reason']; 
			$action_row_type = $param['action_row_type']; 
			$update_response = $this->job_model->updateJobStatus($job_id,$status,$reason);
			if($update_response){
				if(!empty($action_row_type)){
					$this->session->set_userdata('action_row',$action_row_type);
				}
				$user = $this->user_model->getUserById($user_id);
				//Email details available in this function already
				$to_email = $user['email'];
				userJobStatusEmail($status,$reason,$user['first_name'],$to_email,$job_id);
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 05: changeReviewStatusAjax
	 *
	 * This function is used change status of the job review
	 * 
	 *
	 */	
	public function changeReviewStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) {
			$user_id = $param['user_id'];			
			$reviewed_id = $param['reviewed_id'];			
			$id = $param['id'];
			$job_id = $param['job_id'];
			$user_name = $param['user_name'];
			$status = $param['status']; 
			$reason = $param['reason']; 
			$reviewer_role =  $param['reviewer_role']; 
			$action_row_type =  $param['action_row_type']; 
			$update_response = $this->job_model->updateReviewStatus($id,$status,$reason);
			if($update_response){
				if(!empty($action_row_type)){
					$this->session->set_userdata('action_row',$action_row_type);
				}
				$user = $this->user_model->getUserById($user_id);
				//Email details available in this function already
				$to_email = $user['email'];
				reviewStatusEmail($status,$reason,$user['first_name']." ".$user['last_name'],$user_name,$to_email,$job_id);
				if($status == APPROVED_REVIEW_STATUS_ID){
					$user_talent = $this->user_model->getUserById($reviewed_id);
					//Email details available in this function already
					$to_email = $user_talent['email'];
					$user_name = $user['first_name']." ".$user['last_name'];
					reviewStatusEmailToReviewed($status,$reason,$user_talent['first_name']." ".$user_talent['last_name'],$user_name,$to_email,$job_id,$reviewer_role);
				}
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 06: showTalentEngageModalAjax
	 *
	 * This function is used to show the talent job engagement modal
	 * 
	 *
	 */
	function showTalentEngageModalAjax($param=null){
		// Checking whether parametres are nullor not
		if ($param != null) { 
			$objResponse = new xajaxResponse();
			$data['job_id'] = $param['job_id'];
			$data['talent_ids'] = $param['talent_ids'];
			$data['categories'] = $this->category_model->getCategories();
			$data['users'] = $this->user_model->getUsers(USER_ROLE_TALENT,$data['talent_ids']);
			if(empty($data['users'])){
				$objResponse->script("showMessageContent('All talents are already engaged in this job.','Talent Not Available')");	
				return $objResponse;
			}
			$html = $this->load->view('backend/jobs/talentEngageModal', $data, true);		
			return $objResponse->call("showtalentEngageModal",$html);		
		}
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 07: addTalentToJobAjax
	 *
	 * This function is used to engage talent in a particular job
	 * 
	 *
	 */
	public function addTalentToJobAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) {
			$user_id = $param['user_id'];			
			$job_id = $param['job_id'];
			$update_response = $this->job_model->addTalentToJob($user_id,$job_id);
			if($update_response){
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 08: getFilteredTalent
	 *
	 * This function is used to get filtered talent by category
	 * 
	 *
	 */
	public function getFilteredTalent() {
		//assign public class values to function variable
		$data = $this->data;
		$talent_ids = $_POST['talent_ids'];
		if (isset($_POST['cat_id']) && $_POST['cat_id']!="" && $_POST['cat_id']!="0"){
			$cat_id = $_POST['cat_id'];
		}else{
			$cat_id = "";
		}
		$data['common_data'] = $this->common_data;
		$data['users'] = $this->user_model->getUsers(USER_ROLE_TALENT,$talent_ids,$cat_id);
		$html = "<option value='0'>--Select Talent--</option>";
		foreach($data['users'] as $index=>$user){
			$html .= "<option value='".$user['id']."' >".$user['first_name']."</option>";
		} 
		echo $html;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 09: changeJobPaymentStatusAjax
	 *
	 * This function is used to change job payment status
	 * 
	 *
	 */
	public function changeJobPaymentStatusAjax($param = null){
	$objResponse = new xajaxResponse();
	// Checking whether parametres are nullor not
	if ($param != null) { 
		$user_id = $param['user_id'];
		$transaction_id = $param['transaction_id'];
		$id = $param['id'];
		$payment_type = $param['payment_type'];
		$amount = $param['amount'];
		$reason = $param['reason'];
		$status = $param['status'];
		$action_row_type = $param['action_row_type'];
		$update_response = $this->job_model->changeJobPaymentStatus($id,$status,$reason);
		if($update_response){
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
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <End>
	|--------------------------------------------------------------------------
	*/
	//FUNCTIONS LIST:
	//01: index
	//02: addJob
	//03: editJob
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 01: index
	 *
	 * This function is the entery point to this class. 
	 * It shows website jobs listing view
	 *
	 */
	 public function index() {
		$this->data['page'] = 'job';
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$user_id = (isset($_GET['user_id']) && $_GET['user_id'] != 0)?$_GET['user_id']:0;
		$data['jobs'] = $this->job_model->getJobs($user_id);
		$data['users'] = $this->user_model->getUsers(USER_ROLE_EMPLOYER);
		/* foreach($data['users'] as $index=>$user){
			$data['users'][$index]['latest_payment'] = $this->payment_model->getTalentLatestPayment($user['id']);
		} */
		//pr($data['users']); die();
		$template['body_content'] = $this->load->view('backend/jobs/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 02: addJob
	 *
	 * This function is the entery point to this class. 
	 * It shows website add job view
	 *
	 */
	 public function addJob() {
		$this->data['subModuleName'] = "Add Job";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['categories'] = $this->category_model->getCategories();
		$data['employers'] = $this->user_model->getUsers(USER_ROLE_EMPLOYER);
		//pr($data['fields']); die();
		$template['body_content'] = $this->load->view('backend/jobs/addJob', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 03: editJob
	 *
	 * This function is the entery point to this class. 
	 * It shows website edit job view
	 *
	 */
	 public function editJob() {
		$this->data['subModuleName'] = "Edit Job";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		if(!isset($_GET['job_id'])) {
            header("Location: ".BACKEND_JOBS_URL);
            die();
        }
		$data['job_id'] = $_GET['job_id'];
		$data['job'] = $this->job_model->getJobById($data['job_id'] );
		$data['talents'] = $this->job_model->getJobTalent($data['job_id'] );
		$data['talent_ids'] = "";
		foreach($data['talents'] as $talent){
			$data['talent_ids'] .= $talent['talent_id'].",";
		}
		
		$data['talent_ids'] = rtrim($data['talent_ids'],",");
		$data['reviews'] = $this->job_model->getJobReviews($data['job_id'] );
		$data['dates_empty'] = 1;
		if(!empty($data['job']['start_date']) && !empty($data['job']['end_date'])){
			$data['dates_empty'] = 0;
			$data['job']['start_date'] = date('d/m/Y',$data['job']['start_date']);
			$data['job']['end_date'] = date('d/m/Y',$data['job']['end_date']);
		}
		$data['categories'] = $this->category_model->getCategories();
		if(empty($data['job'])){
			header(BACKEND_JOBS_URL);
            die();
		}
		$template['body_content'] = $this->load->view('backend/jobs/editJob', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
/* End of file Job.php */
/* Location: ./application/controllers/backend/job.php */
