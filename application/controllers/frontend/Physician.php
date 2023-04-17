<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Physician extends Common {

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
		// $this->isLoggedIn();
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
	

     public function index() {
    	
		//assign public class values to function variable
		
			
			$data = $this->data;
		    

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$data['listing']=$this->page_model->getPhysicianListing();
			$template['body_content'] = $this->load->view('frontend/pages/physician/index', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);			
	}

	

	public function details($value='')
	{$data = $this->data;
		
		$objResponse = new xajaxResponse();
		$data['common_data'] = $this->common_data;
		
		
		$template['body_content'] = $this->load->view('frontend/pages/physician/details', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);
		
	}



	public function archive($value='')
	{	$data = $this->data;
		    

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$data['listing']=$this->page_model->getArchiveListing();
			$template['body_content'] = $this->load->view('frontend/pages/archive/index', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);
	}

	
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
//initializing public data variable for class

// / End of file pages.php /
// / Location: ./application/controllers/frontend/pages.php /




