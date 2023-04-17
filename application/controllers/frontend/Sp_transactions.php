<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sp_Transactions extends Common {
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
    public function Serviceprovidertransactions() {
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			//echo "1";die();
			$data = $this->data;
			//$data['record']=$this->Sp_event_model->getEventsEp($user_id);
						$data = $this->data;
			//$data['record']=$this->Sp_event_model->getEventsEp($user_id);

			//print_r($data['record'][0]['service_id']);die();
			$data['transaction']=$this->Transactions_model->getSpTransactions($user_id);
			foreach ($data['transaction']as $key => $value) {
				$data['transaction'][$key]['e_name'] = $this->Transactions_model->getTransactionsEventName($value['job_id']);
			}
			
			// foreach ($data['transaction'] as $key => $value) {
			// 	$data['transaction'][$key]['pay_status'] = $this->Transactions_model->getSpTransactionsstatus($value['event_plaaner_id'], $value['service_provider_id'], $value['service_id'], $value['job_id']);
			// }
			//$data['services']=$this->Sp_event_model->getEventDetails($user_id);
			// print_r($data);die();
			//$data['common_data'] = $this->common_data;
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'transactions';
			$template['body_content'] = $this->load->view('frontend/sp-transactions/transactions', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);	

	}


	public function update_stripe($value='')
	{
		$data = $this->data;
		$objResponse = new xajaxResponse();
		$data['ac_id'] = $value['ac_id'];
		$data['sk'] = $value['sk'];
		$data['s'] =base64_url_encode($data['sk']);
	
		$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.stripe.com/v1/accounts/'.$data['ac_id'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Basic '.$data['s']
		  ),
		));

		$response = curl_exec($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		if($httpcode == '200'){
				 
				$objResponse->script( "$('.a-s').removeClass('d-none');" );
				$objResponse->script( "$('.a-f').addClass('d-none');" );

			$data['transaction']=$this->Transactions_model->UpdateStripe($user_id,$data['ac_id'],$data['sk']);	
			
		}else{

			$objResponse->script( "$('.a-f').removeClass('d-none');" );
			$objResponse->script( "$('.a-s').addClass('d-none');" );

		}
		return $objResponse;
		

	}

	public function Serviceprovidertransactionsdetail($value='')
	{
		$data = $this->data;
		//print_r($_GET['event']);die();
		// $data['event_id'] = $_GET['event'];
		// $data['event_provider_id'] = $_GET['eventprovider'];
		// $data['service_id'] = $_GET['services'];
		
		$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		$data['transaction']=$this->Transactions_model->getSpTransactionsdetail($user_id,$_GET['event']);		
		$data['job_details']=$this->Transactions_model->getServiceDetails($user_id,$_GET['uj']);
		foreach ($data['job_details'] as $key => $value) {
			$data['job_details'][$key]['service_name']=$this->Transactions_model->getServiceName($value['service_id']);
		}
		// print_r($data['job_details']);die();

		$data['common_data'] = $this->common_data;
		//Getting all users
		$data['common_data']['page'] = 'transactions';
		$template['body_content'] = $this->load->view('frontend/sp-transactions/sp-transactions-detail', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
	}
    public function EventmanagerConnection($param='') {
		//assign public class values to function variable
		//echo("arg1");die();
			//$objResponse = new xajaxResponse();
	//print_r($this->input->post());die();


			 	$data = "123_String";    
				//$year = substr($param['month'], strpos($param['month'], " ") + 1);
			 	$curl = curl_init();
 				//$monthdate=date('m', strtotime($param['month']));

				//$first_day_this_month = date(''.$year.'-'.$monthdate.'-01'); // hard-coded '01' for first day
				//$last_day_this_month  = date(''.$year.'-'.$monthdate.'-t');
				curl_setopt_array($curl, array(
        		CURLOPT_RETURNTRANSFER => 1,
       			CURLOPT_URL => 'https://masooms.pk/wc-api/v3/reports/sales?filter[date_min]='.$first_day_this_month.'&filter[date_max]='.$last_day_this_month.'&consumer_key='.CONSUMER_KEY.'&consumer_secret='.CONSUMER_SECRET.'',
        		CURLOPT_USERAGENT => 'Codular Sample cURL Request'
  		  ));

		$response = curl_exec($curl);
		curl_close($curl);
		$Array = json_decode($response, true);
		//print_r($Array);die();
		if($Arraymonthly['sales']['total_sales'])
		{

			$objResponse->script('$("#set_month").text("'.$Arraymonthly['sales']['total_sales'].'")');
			return $objResponse;
		}

			
			

		$data = $this->data;
		$data['today_sales'] = $todayArray;
		$data['monthly_sales'] = $monthArray;
		$data['overall_sales'] = $overallArray;
		$data['orders'] =  $this->Reporting_model->get_top_selling_orders();
		$data['product_sales'] =  $this->Reporting_model->get_sales();
		$data['cities'] =  $this->Reporting_model->get_cities();
		$data['all_cities'] =  $this->Reporting_model->get_all_cities();
		$data['get_dates'] =  $this->Reporting_model->get_dates();
		// print_r($data['get_dates']);
		// exit();
		foreach($data['cities'] as $index=>$city){
			$data['cities'][$index]['today'] = $this->Reporting_model->get_today_sales($city['id']);
		}
		$data['chart_data'] = json_encode( $data['cities']);
		$data['common_data'] = $this->common_data;
		$this->load->view('backend/reporting/index', $data);


			

	}	
	

	/*-------------------------------------------------------------------------------------------------------------------------*/



}
/* End of file pages.php */
/* Location: ./application/controllers/frontend/pages.php */
?>