<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Em_Review extends Common {
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
	01: ServiceProvider Review
	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	* 01: ServiceProvider
	*
	* This function is used to add review to the serviceprovider
	*
	*/
    public function Eventmanagerreview() {
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);

			$data = $this->data;
			$data['record']=$this->Sp_event_model->getEventsEp($user_id);
			// print_r($data['record']);
			// exit();
			//$data['services']=$this->Sp_event_model->getEventDetails($user_id);
			foreach ($data['record'] as $key => $value) {
				$data['record'][$key]['jstatus'] = $this->Sp_event_model->getStatus($value['id']);
				
				$data['check']=$this->Sp_event_model->checkjobstatus($data['record'][$key]['id']);
				//print_r($data['check']);die();

					
					if($data['check']>1)
					{
					//print_r($data['check']['0']['job_id']);
					$data['response']=$this->Sp_event_model->updatejobstatus($data['check']['0']['job_id']);
				}

			}
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'review';
			$template['body_content'] = $this->load->view('frontend/em-review/review', $data, true);	//echo "1";die();
		$this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}
	 public function Eventmanagerreviewdetail() {
		//assign public class values to function variable
		
		$data = $this->data;
		$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		$data['event_id'] = $_GET['event_id'];

		$data['details']=$this->Review_model->getJobstatus($data['event_id']);
		
		foreach ($data['details'] as $key => $value) {
			
			$service_id=$data['details'][$key]['service_id'];

			$data['details'][$key]['avg']=$this->Review_model->getAvgSpReview($data['details'][$key]['ep_id']);
			$data['details'][$key]['review']=$this->Review_model->getreviews($data['details'][$key]['sp_id'],$service_id);

			$data['details'][$key]['check']=$this->Review_model->getreviewscheck($data['event_id'],$service_id,$user_id);
			//print_r($data['details'][$key]['review']);die();
			// if($data['details'][$key]['review'][$key]['eo_id']==$data['event_id'] )
			// {
			// 	$data['details'][$key]['review']['check']='1';
			// }
			// else{
			// 	$data['details'][$key]['review']['check']='0';
			// }
			//$data['details'][$key]['review']['review']=$this->Review_model->getreviews($data['event_id'],$service_id);
		}
		
//print_r($data['details']);die();
		$data['common_data'] = $this->common_data;
		//print_r($data);die();

	//	$data['common_data'] = $this->common_data;
		$data['common_data']['page'] = 'review';
		//Getting all users
		//echo("arg1");die();
		$template['body_content'] = $this->load->view('frontend/em-review/view-reviews-sp-content', $data, true);	
		//echo "1";die();
		$this->load->view('frontend/layouts/template', $template, false);		
	}	

	public function submitReviewAjax($param='')
	{
		$objResponse = new xajaxResponse();
			$sp_id=$param['sp_id'];
	    	$ep_id=$param['ep_id'];
	    	$service_id=$param['service_id'];
	    	$job_id=$param['job_id'];
	    	$review=$param['review'];
	    	$stars=$param['stars'];
$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
	    	$user_type=$param['user_type'];

		$qResponse=$this->Review_model->insertReview($sp_id,$ep_id,$service_id,$job_id,$review,$stars,$user_type,$user_id);
		//print_r($qResponse);die();
			if($qResponse>0){
				// serviceProviderPortfolio();
				// header('Location: '.$_SERVER['REQUEST_URI']);
				
$objResponse->script( "location.reload();" );
//$objResponse->script('$("#reviewsubmit")[0].reset()');
		}
		return $objResponse;
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/



}
/* End of file pages.php */
/* Location: ./application/controllers/frontend/pages.php */
?>