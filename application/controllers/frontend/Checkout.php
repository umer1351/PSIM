<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends Common {

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
		    
		$id = decrypt_url($_GET['u']);
		$type = decrypt_url($_GET['t']);
		$data = $this->data;
		$data['user'] = $id;
		$data['type'] = $type;
	

		//echo("arg1");die();
	
			$data['sub_module'] = $this->page_model->get_module_details($id);
		
			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$data['listing']=$this->page_model->getExamsListing();
			$template['body_content'] = $this->load->view('frontend/cart/add_to_cart', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);			
	}

	

	public function details($value='')
	{$data = $this->data;
		
		$objResponse = new xajaxResponse();
		$data['common_data'] = $this->common_data;
		
		
		$template['body_content'] = $this->load->view('frontend/pages/courses/details', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);

		
	}

	public function payAjax($value='')
	{


		$objResponse = new xajaxResponse();
			//print_r( $_POST['user_id']);die();
		//Getting Variables	
		$user_id =  $this->session->userdata(WEBSITE_FRONTEND_SESSION);
		//echo("arg1");die();
		// $user_role = $_POST['role'];
		$first_name = $_POST['first_name'];
		$pmdc = $_POST['pmdc'];
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$designation = $_POST['designation'];
	
		$institute = $_POST['institute'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		
				
		
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
					// die();
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
			$qResponse = $this->page_model->addSubscription($file_name, $user_id,$pmdc,$id,$email,$name,$designation,$institute,$phone,$address);
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
			// if($qResponse){
				// serviceProviderPortfolio();
				// header('Location: '.$_SERVER['REQUEST_URI']);
				 	echo '<script language="javascript">';
				    echo 'top.location.href = "http://demo.psim.org.pk/subscription";';
				    echo '</script>'; 
		// }
	}



	public function archive($value='')
	{	$data = $this->data;
		    

			$data['common_data'] = $this->common_data;
			$data['common_data']['page'] = 'courses';
			$data['listing']=$this->page_model->getArchiveListing();
			$template['body_content'] = $this->load->view('frontend/pages/archive/index', $data, true);	
		    $this->load->view('frontend/layouts/template', $template, false);
	}

	public function modules($value='')
	{
		
		$data = $this->data;

		$template['body_content'] = $this->load->view('frontend/Pages/courses/details', $data, true);

	}
	public function subscribe($value='')
	{
		$id = decrypt_url($_GET['u']);
		$type = decrypt_url($_GET['t']);
		$data = $this->data;
		$data['user'] = $id;
		$data['type'] = $type;
	
		$data['common_data'] = $this->common_data;
		//echo("arg1");die();
		if($data['type'] == 'exams'){
			$data['sub_module'] = $this->page_model->get_sub_modules_exams($id);
			$data['already_subscribe'] = $this->page_model->get_sub_modules_exams($id);
			$template['body_content'] = $this->load->view('frontend/cart/details', $data, true);	
			$this->load->view('frontend/layouts/template', $template, false);
		}
	}

	public function subscription($value='')
	{
		$this->isLoggedIn();
		$id = $this->common_data['user_data']['id'];
		// $type = decrypt_url($_GET['t']);

		$data = $this->data;
		$data['user'] = $id;
	

	$data['common_data'] = $this->common_data;
	//echo("arg1");die();
	$data['listing']=$this->page_model->getsubsciptions($id);
	
	$template['body_content'] = $this->load->view('frontend/subscription/index', $data, true);	
	$this->load->view('frontend/layouts/template', $template, false);
		
	}

	
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
//initializing public data variable for class

// / End of file pages.php / 
// / Location: ./application/controllers/frontend/pages.php /




