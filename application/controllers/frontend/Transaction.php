<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends Common {
	//initializing public data variable for class
	public $data = array();
    function __construct() {
        parent::__construct();	
        //I.E Fix: Holds SESSION accross the DOMAIN
        header('P3P: CP="CAO PSA OUR"');
		//$this->comingSoon();
        //------------ Model Functions <Start>-----------------//	
        //------------ Model Functions <End>-----------------//	
        	// 
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

	public function index() {
		$data['common_data'] = $this->common_data;
			$template['body_content'] = $this->load->view('frontend/transactions/index', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
	}


public function make_payment() {
		$data['common_data'] = $this->common_data;
			$template['body_content'] = $this->load->view('frontend/transactions/make-payment', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	
	}
    public function serviceProviderJobBoard() {
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			
			$data = $this->data;

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
    public function serviceProviderJobDetail() {
		//assign public class values to function variable
		//print_r($_GET['job_id']);die();
			$id = $_GET['job_id'];
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			$data = $this->data;
			$data['common_data'] = $this->common_data;
			$data['record']=$this->job_model->getJobDetailData($id);
			$data['services']=$this->job_model->getServicesJobDetailData($id);
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
				
		$response['status'] = $status;
		$response['response'] = $msg;
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
     						//print_r($data['services']);die();
     						//echo "1";
					   foreach($data['services'] as $value)
					   {
					  		$enddate=date('Y-m-d');

						    $start = DateTime::createFromFormat('Y-m-d', $value['event_date']);
						    $end = DateTime::createFromFormat('Y-m-d', $enddate);
						   // print_r($value['event_date']);die();
						    $diffDays = $end->diff($start)->format("%a");
						    $date=date("M d", strtotime($value['event_date']));
						    	$edit=ROUTE_SERVICE_PROVIDER_JOB_DETAIL."?job_id=".$value['id'];

					    $output .= '
					      <div class="job-item ';if($c===0 || $c===1 || $c===2 || $c===3){
					      	$output .= 'add" id="load">';} else{
					      	$output .= 'neg" id="load">';	
					      	}
					      					$output .= '<div class="event-name-and-date d-flex align-items-center">
						<div class="">
							<h4 class="sub-heading bold-text mb-0">'.$value['event_title'].'</h4>
							<div>'.$date.'</div>
						</div>
						<div class="ml-auto">
							<div class="note-text note-text-light">Expires in  '.$diffDays.'  days</div>
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
					   	$output .= '			<div class="text-center standard-padding-top-half">
					<a href="#" id="'.$last_id.'" data-id="'.$last_id.'" class="btn btn-custom load-more">Load more</a>
				</div>';
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
