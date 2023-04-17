<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JobBoard extends Common {
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
	01: Portfolio view
	--------------------------------------------------------------------------------------------------------------------------*/
	/**

	* 01: Portfolio view
	*
	* This function is used to send email to admin and the person who contacted wowzer
	*
	*/
    public function serviceProviderJobBoard() {
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			
			$data = $this->data;

			$qStr = "SELECT MAX(event_budget) AS 'max'
					 FROM job
					 ;";
			$query = $this->db->query($qStr);
			$result = $query->row_array()['max'];
			// print_r($result);
			// exit();		 
// 					$data['services']=$this->job_model->getJobs();
// //print_r($data['services']);die();
// 		foreach ($data['services'] as $key => $value) {

// 			$service_id=$data['services'][$key]['service_id'];

// 			$data['services'][$key]['name'] = $this->job_model->get_selected_jobs($service_id,$user_id);

// 		}
		

		// foreach ($data['services'] as $key => $value) {

		// 	$service_id=$data['services'][$key]['service_id'];

		// 	$data['services'][$key]['name'] = $this->job_model->get_selected_jobs($service_id,$user_id);

		// }
			$data['common_data'] = $this->common_data;
			$data['max_val'] = $result;
			$template['body_content'] = $this->load->view('frontend/job-board/ServiceJobBoard', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}
 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	02: Portfolio view
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 01: Portfolio view
	*
	* This function is used to send email to admin and the person who contacted wowzer
	*
	*/

	public function eventMangerReviews()
	{
			$service_provider = $_GET['ep'];

		$user_id = $service_provider;
			
			$data = $this->data;

		

			$data['record']=$this->portfolio_model->getPortfolioRecord($user_id);
			$data['media']=$this->portfolio_model->getPortfolioImage($user_id);
			$data['review']=$this->Review_model->getSpreview($user_id);
			$data['avgreview']=$this->Review_model->avgreview($user_id);
			$data['service_provider']=$this->portfolio_model->getServiceProfile($service_provider);

			$service_id=$data['service_provider'][0]['services'];
			$data['service_provider']['name'] = $this->job_model->get_selected_jobs($service_id,$user_id);
			// $data['record']=$this->job_model->getJobDetailData($id);
			// print_r($data['record']);die();
			$data['review']= $this->Review_model->get_em_review($user_id);
			// $data['services']=$this->job_model->getServicesJobDetailData($id);
			// foreach ($data['services'] as $key => $value) {
			// 	$data['services'][$key]['applied_status'] = $this->job_model->getAppliedStatus($id,$user_id,$value['eo_id'], $value['service_id'], $value['job_id']);
			// 	$data['services'][$key]['applied_amount'] = $this->job_model->getoffer($id,$user_id,$value['eo_id'], $value['service_id'], $value['job_id']);
			// }
			// $user_id = $data['record'][0]['u_id'];
			// print_r($user_id);
			// exit();
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'event';

			$data['avgreview']=$this->Review_model->avgreviewEP($user_id);
		//print_r($data['record']);die();
			// $result = array(); 

   //    $result = array_merge($result, $data['services']); 
			

    //print_r($data['services']);die();
			$template['body_content'] = $this->load->view('frontend/job-board/EM_Reviews', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
	}

    public function serviceProviderJobDetail() {
		//assign public class values to function variable
		//print_r($_GET['job_id']);die();
			$id = $_GET['job_id'];
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			$data = $this->data;
			$data['common_data'] = $this->common_data;
			$data['record']=$this->job_model->getJobDetailData($id);
			// print_r($data['record']);die();
			$data['services']=$this->job_model->getServicesJobDetailData($id);
			foreach ($data['services'] as $key => $value) {
				$data['services'][$key]['applied_status'] = $this->job_model->getAppliedStatus($id,$user_id,$value['eo_id'], $value['service_id'], $value['job_id']);
				$data['services'][$key]['applied_amount'] = $this->job_model->getoffer($id,$user_id,$value['eo_id'], $value['service_id'], $value['job_id']);
			}
			$user_id = $data['record'][0]['u_id'];
			// print_r($user_id);
			// exit();
			$data['avgreview']=$this->Review_model->avgreviewEP($user_id);
		//print_r($data['record']);die();
			// $result = array(); 

   //    $result = array_merge($result, $data['services']); 
			

    //print_r($data['services']);die();
			$template['body_content'] = $this->load->view('frontend/job-board/ServiceJobDetail', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}

	    public function serviceProviderJobOffer($param='') {
	    	$objResponse = new xajaxResponse();
		//assign public class values to function variable
	//	print_r($param['sp']);die();
	    	$sp_id=$param['sp'];
	    	$ep_id=$param['ep'];
	    	$service_id=$param['service'];
	    	$job_id=$param['job'];
	    	$amount=$param['amount'];
	    	$reason=$param['reason'];

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





      $sender = 'no-reply@plaany.com';
    $receiver = "".$res5['first_name'].",";
    $subject = "Job Offer";
    $msg = "Dear ".ucwords($res5['first_name']).",<br /><br />
                You have just received an $".$amount." offer for the following service: 
                Following are the details:<br /><br />
                Service: ".$res6."<br />
                Event Name: ".$res3['event_title']."<br />
                Event Location: ".$res3['location']."<br />
                Event Date(s): ".$res3['event_date']."<br />
             
                <br />
                Please log in to your account to accept this offer: http://dev.appstersinc.com/plaany/plaany_web/sign-in.<br /><br />
                Regards,<br/>Support Team";
                
    sendEmail($sender,$receiver,$msg,$subject);

			$data['record']=$this->job_model->insertjoboffer($sp_id,$ep_id,$service_id,$job_id,$amount,$reason);
			if($data['record']==1){
						//Redirect to User profile page
				//echo"(arg1)";die();
						$msg = 'Your off has been sent';
						$status = 1;
						//$url = ROUTE_PROFILE;
				$objResponse->script('$("#offer-success").show();');
				$objResponse->script('$("#offer").hide()');
				$objResponse->script('$("#job_offer")[0].reset()');
					}else {
						$msg = 'Profile not updated successfully'; 
						$status = 0;
					}

// 		Dear {event planner},

// You have just received an ${offer amount} offer for the following service:

// Service: {service name}
// Event Name: {event name}
// Event Location: {event location}
// Event Date(s): {event date(s)}

// Please log in to your account to accept this offer: http://dev.appstersinc.com/plaany/plaany_web/sign-in.

// Regards,
// Support Team		


		
				
		$response['status'] = $status;
		$response['response'] = $msg;
		$objResponse->script('location.reload();');
		//$response['url'] = $url;
return $objResponse;
			//print_r($data['record']);die();
		// 	$template['body_content'] = $this->load->view('frontend/job-board/ServiceJobDetail', $data, true);	
		// $this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}

public	function fetch()
					 {
				
					  $output = '';
					  $query = '';
					// print_r($_POST);die();
					  if($this->input->post('query'))
					  {
					   $query = $this->input->post('query');
					   
					  }
					  else{
					  	$query='';
					  }
					  if($this->input->post('id'))
					  {
					   $id = $this->input->post('id');
					   
					  }
					  else{
					  	$id='';
					  }					  
					  if($this->input->post('selected'))
					  {
					   $categories = $this->input->post('selected');
					   
					  }
					  else{
					  	$categories='';
					  }
					  if($this->input->post('max'))
					  {
					   $max_amount = $this->input->post('max');
					   
					  }
					  else{
					  	$max_amount='';
					  }

					  if($this->input->post('min'))
					  {
					   $min_amount = $this->input->post('min');
					   
					  }
					  else{
					  	$min_amount='';
					  }
					  if($this->input->post('date'))
					  {
					   $date = $this->input->post('date');
					   $arr = explode("-",$date);
					   $date1 = $arr[0]; 
					   $date2 = $arr[1];
					   
					   
					  }
					  else{
					  	$date1='';
					  	$date2='';
					  }
					  if($this->input->post('search'))
					  {
					   $search = $this->input->post('search');
					   
					  }
					  else{
					  	$search='';
					  }


					  $data['services'] = $this->job_model->getJobs($query,$categories,$max_amount,$min_amount,$date1,$date2);

					  if($data)
					  {
					  	

			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);

		foreach ($data['services'] as $key => $value) {

			$service_id=$data['services'][$key]['service_id'];

			$data['services'][$key]['name'] = $this->job_model->get_selected_jobs($service_id,$user_id);

		}
			
						$last_id = '';
						$c=0;
						if($data['services'])
     					{
     						// print_r($data['services']);die();
     						//echo "1";
					   foreach($data['services'] as $value)
					   {
					  		$enddate=date('Y-m-d');

						    $start = DateTime::createFromFormat('Y-m-d', $value['event_date']);
						    $end = DateTime::createFromFormat('Y-m-d', $enddate);
						    $eventDat = $value['event_range_date'];
						   // print_r($value['event_date']);die();
						    $diffDays = $end->diff($start)->format("%a");
						    $date=date("M d", strtotime($value['event_date']));
						    	$edit=ROUTE_SERVICE_PROVIDER_JOB_DETAIL."?job_id=".$value['id'];

						    if ($diffDays != '0') {
						    		$expDays = 'Expires in '.$diffDays.' days';
						    	}else{
						    		$expDays = 'Expiring Today';
						    	}	

					    $output .= '
					      <div class="job-item ';if($c===0 || $c===1 || $c===2 || $c===3){
					      	$output .= 'add" id="load">';} else{
					      	$output .= 'neg" id="load">';	
					      	}
					      					$output .= '<div class="event-name-and-date d-flex align-items-center">
						<div class="">
							<h4 class="sub-heading bold-text mb-0">'.$value['event_title'].'</h4>
							<div><i class="fa fa-map-marker mr-2"></i>'.$value['location'].'<i class="fa fa-calendar-o mr-2 ml-3"></i>
					          <span>'.$eventDat.'</span>
					          
					        </div>	
						</div>
						<div class="ml-auto">
							<div class="note-text note-text-light"> '.$expDays.'</div>
						</div>
					</div>

					<div class="event-description regular-text">'.$value['event_detail'].'</div>

					<div class="skills-and-action d-flex align-items-center">
						<div class="looking-for d-flex align-items-center">
							<div class="looking-for mr-2">Looking for:</div>
							<ul class="skills-list skills-list-smaller list-unstyled list-inline">';
								foreach ($value['name'] as $key => $name) {
									if(!empty($name)){
								 $output .= '<li class="list-inline-item">
									<div class="skill">'. $name .'</div>
								</li>';
							}
								}
							 $output .= '</ul>
						</div>
						<div class="ml-auto">
							<a href="'.$edit.'" class="btn btn-custom btn-custom-small">View Details</a>
						</div>
					</div>
				</div>

					    ';
					    $last_id = $value['id'];
					    $c++;
					   }
					   	$output .= '';
					  }

					
					  else
					  {
					   $output .= '<tr>
					       <td colspan="5">No Data Found</td>
					      </tr>';
					  }
					  $output .= '</table>';
					  echo $output;
					 }
					}
	/*-------------------------------------------------------------------------------------------------------------------------*/



}
/* End of file pages.php */
/* Location: ./application/controllers/frontend/pages.php */
