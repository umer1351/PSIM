<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sp_event extends Common {
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
    public function serviceProviderevents() {
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			$data = $this->data;
			$data['record']=$this->Sp_event_model->getEvents($user_id);
			// print_r($data['record']);die();
						foreach ($data['record'] as $key => $value) {
				
				$data['record'][$key]['jstatus']=$this->Sp_event_model->checkjobs1($value['job_id'], $value['ep_id'],  $value['sp_id'], $user_id);
				//print_r($data['check']);die();
				// $data['record'][$key]['jstatus'] = $this->Sp_event_model->getStatus($value['job_id']);
					
					// if($data['check']>1)
					// {
					// //print_r($data['check']['0']['job_id']);
					// $data['record'][$key]['check']='1';
					// }
					// else{

					// 	$data['record'][$key]['check']='0';
					// }


			}
			
			// print_r($data['record']);
			// exit();
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'event';
			$template['body_content'] = $this->load->view('frontend/sp-event/sp-event', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
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
	 public function eventDetailsSp() {
		//assign public class values to function variable
		//echo "1";die();
		$data = $this->data;
		//print_r($_GET['s']);die();
		$data['sp_id'] = $user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		$data['ep_id'] = $_GET['eo'];
		$data['job_id'] = $_GET['job_id'];
		$data['service_id'] = $_GET['s'];
		$data['common_data']['page'] = 'event';
		// $data['status1'] = $this->Sp_event_model->getStatusSP($data['sp_id'],$data['job_id'],$data['ep_id'],$data['service_id']);
		// print_r($data['status1']);
		// exit();
		$data['services']=$this->Sp_event_model->getStatusDetails($data['sp_id'],$data['job_id'],$data['ep_id']);
 		$data['details']=$this->Sp_event_model->getJobData($data['job_id']);
		// $data['status'] = $this->Sp_event_model->getStatus($data['job_id']);
		$data['status']=$this->Sp_event_model->checkjobs1($data['job_id'], $data['ep_id'],  $data['sp_id'], $user_id);
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
				// print_r($value);
				$data['check']=$this->Sp_event_model->checkjobstatus($data['record'][$key]['id']);
				//print_r($data['check']);die();
					//print_r($data['check']['0']['job_id']);
					// $data['response']=$this->Sp_event_model->updatejobstatus($data['check']['0']['job_id']);
					$data['record'][$key]['status_event'] = $this->Sp_event_model->getStatus($value['id']);
					$data['record'][$key]['status_for_delete'] = $this->Sp_event_model->getStatusForDelete($value['id']);

			}
			

			// die();
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'event';
			$template['body_content'] = $this->load->view('frontend/em-event/sp-event', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}

	public function DeleteEventAjax($id='')
	{		

		$id = $id['id'];
		$objResponse = new xajaxResponse();
		
		$qStr = "Delete from job_status where job_id = '".$id."'";
		$qStr1 = "Delete from user_job where job_id = '".$id."'";
		$qStr2 = "Delete from job where id = '".$id."'";
		$query = $this->db->query($qStr);
		$query = $this->db->query($qStr1);
		$query = $this->db->query($qStr2);
		
		$objResponse->script('location.reload();');
		
		return $objResponse;

		

	
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
		$data['uj'] = $_GET['uj'];
		
		
		$data['details']=$this->Sp_event_model->getEventDetail($data['event_id']);
		$data['offers']=$this->Sp_event_model->getJobOffers($data['event_id'],$data['event_provider_id'],$data['service_id']);
		$data['status1'] = $this->Sp_event_model->getStatusUserJob($data['uj']);
		foreach ($data['offers'] as $key => $value) {
			//print_r($value['sp_id']);die();
			$data['offers'][$key]['avg']=$this->Review_model->avgreview($value['sp_id']);


		}
		// print_r($data['offers']);
		// exit();
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
		$location = $param['location'];
		$date = $param['date'];
	    $arr = explode("-",$date);
	    $date1 = $arr[0]; 
	    $date2 = $arr[1];
	    $date3 = '';
	    
	    $date2 = strtotime($date2);
	    $date1 = strtotime($date1);
	    if($date1 == $date2){
	    	

	    	$date3 = date('M d, Y', $date2);
	    }else{
	    	$date3 = date('M d, Y', $date1)." - ".date('M d, Y', $date2);
	    }
	
	    $date2 = date('Y-m-d', $date2);
		$arr1 = explode(",",$param['services']);
	 	$arr2 = explode(",",$param['price']);
	 	$total_budget = array_sum($arr2);
	  	$f_array =	array_filter($arr1);
	  	$f_array2 =	array_filter($arr2);
	 	$var_arr = array_combine($f_array, $f_array2);



		$deadline = $param['deadline'];


		$deadline = strtotime($deadline);
		 $date4 = strtotime($date2);
		if ($deadline < $date4) {
			
			$objResponse->script("$('.errorMsg').html('Event deadline should not be less than event dates!');");
			return $objResponse;
		}else{
	
		$services = $param['services'];
		$budget = $param['price'];	
		
		// $var_arr = array_combine($array, $array1);
		
		// $services = implode(',', $param['services']);
		$services_old = $param['services'];		
		


		$response = $this->Sp_event_model->create_event_ajax($title,$details,$date2,$deadline,$services,$budget,$user_id,$services_old,$var_arr,$total_budget ,$date3,$location);
		
			if($response){

			$objResponse->script('window.location ="http://dev.appstersinc.com/plaany/plaany_web/event-provider-event";');
			return $objResponse;
		}
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
		$status='4';	

		
		
	  	$response =$this->Sp_event_model->update_job_status($job_id, $ep_id, $service_id, $sp_id,$status);
		

	  	  //Event Details
      $qstr3 = "SELECT * FROM job WHERE id = '".$job_id."'";
      $query3 = $this->db->query($qstr3);
      $res3 = $query3->row_array();

      //Service Provider Details
      $qstr4 = "SELECT * FROM user WHERE id = '".$sp_id."'";
      $query4 = $this->db->query($qstr4);
      $res4 = $query4->row_array();

      //Event Provider Details
      $qstr5 = "SELECT * FROM user WHERE id = '".$ep_id."'";
      $query5 = $this->db->query($qstr5);
      $res5 = $query5->row_array();

      //Services Details
      $qstr6 = "SELECT name As service_name FROM service WHERE id = '".$service_id."'";
      $query6 = $this->db->query($qstr6);
      $res6 = $query6->row_array()['service_name'];

      //Total Amount 
      $qstr7 = "SELECT amount_offered  As amount FROM user_job WHERE job_id = '".$job_id."' AND sp_id ='".$sp_id."' AND eo_id = '".$ep_id."' AND service_id = '".$service_id."'";
      $query7 = $this->db->query($qstr7);
      $res7 = $query7->row_array()['amount'];

      //Plaany's commission
      $qstr8 = "SELECT price  As commission_amount FROM commission_settings WHERE id = '1' ";
      $query8 = $this->db->query($qstr8);
      $res8 = $query8->row_array()['commission_amount'];

      $commission = $res8/100 *$res7;
      $amount_to_deliver = $res7 - $commission;

    //Send Email To Service Provider  

    $sender = 'no-reply@plaany.com';
    $receiver = $res4['email'];
    $subject = "Event Completed";
    $msg = "Hello ".ucwords($res4['first_name']).",<br /><br />
                Your ".$res6." service has been marked complete by ".$res5['first_name'].". 
                Following are the details:<br /><br />
                Event Name          : ".$res3['event_title']."<br />
                Event Location      : ".$res3['location']."<br />
                Event Date(s)       : ".$res3['event_date']."<br />
                Service Charges  : $".$res7."<br />
                <br /> <br />

                Plaany will deduct ".$res8."% from the service charges. Plaany will transfer your payment within 24-48 hours.
                <br/><br/>  
                Regards,<br/>Support Team";
                
    sendEmail($sender,$receiver,$msg,$subject);

    //Send Email To Event Planner  

 
    $sender = 'no-reply@plaany.com';
    $receiver = $res5['email'];;
    $subject = "Event Completed";
    $msg = "Hello ".ucwords($res5['first_name']).",<br /><br />
                You have marked ".ucwords($res4['first_name'])."'s ".$res6." service as complete.  
                Following are the details:<br /><br />
                Event Name          : ".$res3['event_title']."<br />
                Event Location      : ".$res3['location']."<br />
                Event Date(s)       : ".$res3['event_date']."<br />
                Service Charges     : $".$res7."<br />
                <br />
                Plaany will release the payment to the service provider within 24-48 hours.<br /><br />
                Regards,<br/>Support Team";
                
    sendEmail($sender,$receiver,$msg,$subject);

// exit();
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