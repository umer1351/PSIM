<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends Common {

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
		$this->isLoggedIn();
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
	* 01: sendEmailAjax
	*
	* This function is used to send email to admin and the person who contacted wowzer
	*
	*/
   
	/**
	* 02: editPortfolioAjax
	*
	* This function is used to update image upload limit
	*
	*/
		public function editPortfolioAjax() {
			$objResponse = new xajaxResponse();
			//print_r( $_POST['user_id']);die();
		//Getting Variables	
		$portfolio_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		//echo("arg1");die();
		// $user_role = $_POST['role'];
		// $first_name = $_POST['first_name'];
		// $last_name = $_POST['last_name'];
		// $email = $_POST['email'];
		// $province = $_POST['province'];
		// $country = $_POST['country'];
		// $city = $_POST['city'];
		// $phone = $_POST['phone'];
		// $address = $_POST['address'];
		// if ($user_role == '3') {
		// 	$services = $_POST['services'];
		// 	$about = $_POST['about'];
		// 	$business_name = $_POST['business_name'];
		// 	$about_me = '';
		// }elseif ($user_role == '2') {
		// 	$about_me = $_POST['about_me'];
		// 	$services = '';
		// 	$about = '';
		// 	$business_name = '';
		// }
				
		
		// $is_base64_method = $_POST['is_base64_method']; 
		// $base64 = $_POST['base64']; 
	
		//Getting Current Profile Image
		// $user_image = $this->user_model->getUserById($user_id);
		//Uploading Image
		// if($is_base64_method==1){
		// 	$fileUniqName = upload_image_base64img($base64);
		// 	$file_name = (($fileUniqName==0)?$user_image['profile_image']:$fileUniqName);	
		// }else{
			$file_element_name = 'imgInp';  
			$config['upload_path'] = ASSET_FRONTEND_UPLOADS_PATH."portfolio";
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

				//upload file <end>
				//validate image
			$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:'');
			 // print_r($file_name);
			 // exit();
		// }
			$qResponse = $this->portfolio_model->addPortfolioImage($file_name, $portfolio_id);
			// echo $file_name; die();
			//Check If user With Phone Number Exist
			// $emailResponse = $this->profile_model->isEmailExist($user_id);
			// 	if($emailResponse != 0) {
			// 		$msg = 'User with this email already exists';
			// 		$status = 2;
			// 		$url = "";
			// 	}else {
			// 		$qResponse = $this->profile_model->update($user_id,$business_name,$first_name,$last_name,$province,$city,$country,$phone,$services,$address,$about,$file_name,$about_me);

			// 		if($qResponse){
			// 			//Redirect to User profile page
			// 			$msg = 'Profile updated successfully';
			// 			$status = 1;
			// 			$url = ROUTE_PROFILE;
			// 		}else {
			// 			$msg = 'Profile not updated successfully'; 
			// 			$status = 0;
			// 		}	
			// 	}
		// $response['status'] = $status;
		// $response['response'] = $msg;
		// $response['url'] = $url;
		// echo json_encode($response);
		// die();
			if($qResponse){
				// serviceProviderPortfolio();
				// header('Location: '.$_SERVER['REQUEST_URI']);
				 	echo '<script language="javascript">';
				    echo 'top.location.href = "http://dev.appstersinc.com/plaany/plaany_web/service-provider";';
				    echo '</script>'; 
		}
		
    }

     public function serviceProviderPortfolio() {
    	
		//assign public class values to function variable
			$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);
			
			$data = $this->data;
		    // $data['record']=$this->portfolio_model->getPortfolioRecord($user_id);
			
		
			$data['media']=$this->portfolio_model->getPortfolioImage($user_id);

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'portfolio';
			$template['body_content'] = $this->load->view('frontend/portfolio/servicePortfolio', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);	
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}
	     public function deletePortfolio($param="") {
    	$objResponse = new xajaxResponse();

    	//echo "1";die();
    	$data['delete']=$this->portfolio_model->PortfolioRecordDelete($param['id']);
			if($data['delete']){
				$objResponse->script( "location.reload();" );
				return $objResponse ;

			}

    	//print_r($data['delete']);die();
		//assign public class values to function variable
			
		//$this->load->view('frontend/c/servicePortfolio', $template, false);		
	}

	/*-------------------------------------------------------------------------------------------------------------------------*/
}
//initializing public data variable for class

// / End of file pages.php /
// / Location: ./application/controllers/frontend/pages.php /




