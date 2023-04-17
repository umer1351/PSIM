<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_settings extends Backendcommon {
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
		$this->data['module'] = "04";	
		$this->data['moduleName'] = "Account Settings";	
		$this->data['moduleLink'] = BACKEND_EDIT_PROFILE_URL;	
		$this->data['page'] = 'account-settings';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
    /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: changePasswordAjax
	02: updateAccountAjax
	--------------------------------------------------------------------------------------------------------------------------*/
    
	/**
	 * 01: changePasswordAjax
	 *
	 * This function is used to change admin user passwrod
	 * 
	 *
	 */
    public function changePasswordAjax($param=null) {
		// Checking whether parametres are nullor not
		if ($param != null) { 
			$objResponse = new xajaxResponse();
			$current_password = $param['current_password'];
			$new_password = $param['new_password'];
			//redirect to login if user not logged in
			$user_email = $this->session->userdata('wowzer_admin_email');
			//verify user password using user id
			$db_user = $this->login_model->getUserByEmail($user_email);
			if(!empty($db_user)){
				//does db password match with current password?
				if(encrypt_url($current_password) == $db_user['password']) {
					//encrypt password
					$new_password = encrypt_url($new_password);
					//Update new password
					$update=$this->login_model->updatePassword($user_email,$new_password);

						//echo("arg1");die();
						$objResponse->script('$(".success-message-note").show();');
					$objResponse->script('$(".success-message-note").text("Password has been updated!");');
					//return $objResponse ;
					
					//$objResponse->script('$("#settings").modal("show");');
				} else {
						$objResponse->script('$(".error-message-note").show();'); 
						$objResponse->script('$(".error-message-note").text("Invalid current password");'); 
						$objResponse->script('$( "#changePasswordForm input[name=newPassword]" ).addClass("error");'); 
						
		
				}
			}
		}
		return $objResponse;
    }
	/* ------------------------------------------------------------------------------------*/
	/**
	 * 02: updateAccountAjax
	 *
	 * This function is used to update admin user account info
	 * 
	 *
	 */
    function updateAccountAjax($param=null){
		//Getting Variables	
		$user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$phone = $_POST['phone'];
		//Getting Current Profile Image
		$user_image = $this->user_model->getAdminById($user_id);

		//Uploading Image
		$file_element_name = 'imgInp2';  
		$config['upload_path'] = ASSET_BACKEND_UPLOADS_PATH."users";
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($file_element_name)) {
			$msg = $this->upload->display_errors('', ''); 
			$status = 0;
				$response['status'] = $status;
				$response['response'] = $msg;
				// echo json_encode($response);
				// echo $msg;
				// die();
				
				
		}  else {
				$data = array('upload_data' => $this->upload->data());
		}
		//upload file <end>

		//validate image
		$file_name = (isset($data['upload_data']) ? $data['upload_data']['file_name']:$user_image['profile_image']);
	
		$qResponse = $this->user_model->updateAdmin($user_id,$first_name,$last_name,$phone,$file_name);
		if($qResponse){
			//Redirect to User profile page
			$msg = 'Your account settings have been saved!';
			$status = 1;
			$url = BACKEND_EDIT_PROFILE_URL;
		}else {
			$msg = 'Profile Not Updated Successfully'; 
			$status = 0;
		}
		$response['status'] = $status;
		$response['response'] = $msg;
		$response['url'] = $url;
		echo json_encode($response);
		die();
	}
	/* ------------------------------------------------------------------------------------*/
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <End>
	|--------------------------------------------------------------------------
	*/
    /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: changePassword
	02: editProfile
	--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	* 01: changePassword
	*
	* This function is the entery point to this class. 
	* It shows change password view to the admin 
	*
	*/
	public function changePassword() { 
		$this->data['subModuleName'] = "Change Password";	
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$template['body_content'] = $this->load->view('backend/account-settings/changePassword', $data, true);
		$this->load->view('backend/layouts/template', $template, false);
		
    }
	
	/**
	* 02: editProfile
	*
	* This function is the entery point to this class. 
	* It shows edit profile view to the admin 
	*
	*/
	public function editProfile() { 
		$this->data['subModuleName'] = "Edit Profile";	
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$template['body_content'] = $this->load->view('backend/account-settings/editProfile', $data, true);
		$this->load->view('backend/layouts/template', $template, false);
		
    }
}
/* End of file Account_settings.php */
/* Location: ./application/controllers/backend/account_settings.php */