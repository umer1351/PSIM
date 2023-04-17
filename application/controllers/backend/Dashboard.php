<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Backendcommon {
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
		$this->data['module'] = "02";	
		$this->data['moduleName'] = "Dashboard";
		$this->data['moduleLink'] = BACKEND_DASHBOARD_URL;
		$this->data['page'] = 'dashboard';
		//------------ Class Common Values <Start> -----------------//
    }
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
    /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: //
	--------------------------------------------------------------------------------------------------------------------------*/
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <End>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	//FUNCTIONS LIST:
	//01: Dashboard
	/*--------------------------------------------------------------------------------------------------------------------------*/
	  
	//01: Dashboard
    public function Dashboard() { 
		//assign public class values to function variable
		
			$data = $this->data;
			$data['common_data'] = $this->common_data;
		$this->data['moduleLink'] ="/31";
			$this->data['moduleName'] = "";
			$this->data['subModuleName'] = "Dashboard";
			$this->data['page_id'] = '31';
			$data['allevent']=$this->page_model->getAllEventsCount();
			$data['allPremiumServiceProvider']=$this->page_model->premiumServiceProviderCount();
			$data['geteventplanner']=$this->page_model->geteventplanner();
			$data['getserviceprovider']=$this->page_model->getserviceprovider();
			$data['getComissionEarnings']=$this->page_model->getComissionEarnings();
			$data['getmembershipfee']=$this->page_model->getmembershipfee();
			$data['total_premium_user']=$this->page_model->getTotalUser();
			
			//print_r($data);die();


		//Organizing chart data <end>
		$template['body_content'] = $this->load->view('backend/dashboard/dashboard', $data, true);
		$this->load->view('backend/layouts/template', $template, false);
	/*--------------------------------------------------------------------------------------------------------------------------*/		
    }
}
/* End of file dashboard.php */
/* Location: ./application/controllers/backend/dashboard.php */
