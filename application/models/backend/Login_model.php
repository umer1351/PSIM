<?php
class Login_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: login
	//02: getUser
	//03: getEmailDetails
	//04: getUserByEmail
	//05: updatePassword
	//06: updateAccount
	
	// FOR SINGLE ARRAY
	function checkHashValue($arr){
        if(isset($arr) && is_array($arr) && count($arr)>0 ){                
			if(isset($arr["name"])) {
				
				$arr["name"] = decrypt_url($arr["name"]);
				
			}
			if (isset($arr["phone"])) {
				$arr["phone"] = decrypt_url($arr["phone"]);
			}
			if (isset($arr["email"])) {
				$arr["email"] = decrypt_url($arr["email"]);
			}
			if (isset($arr["address"])) {
				$arr["address"] = decrypt_url($arr["address"]);
			}
        }
        
        return $arr;
    }

	//--- Get Functions ---
	//01: Login
	function login($email,$password) { 
		$qStr = "SELECT
				 	user.id, user.email, user.created
				 FROM
				 	user
				 WHERE 
					user.email = '".$email."' AND user.password = '".$password."' AND user.user_type = '1'  AND is_active = ".ACTIVE_STATUS_ID ;
		
		$query = $this->db->query($qStr);  
		return $this->checkHashValue($query->row_array());		
	}
	
	//02: getUser
	function getUser($email) {
		$qStr = "SELECT 
					*
				 FROM
					user
				 WHERE 
					email = '".$email."'";
		
		$query = $this->db->query($qStr);  
		return $this->checkHashValue($query->row_array());
	}
	
	//03: getEmailDetails
	function getEmailDetails($email_type) {
		$qStr = "SELECT 
					*
				 FROM
					email_settings
				 WHERE 
					email_type = '".$email_type."' AND is_active=".ACTIVE_STATUS_ID;
		
		$query = $this->db->query($qStr);  
		return $this->checkHashValue($query->row_array());
	}
	
	//04: getUserByEmail
	function getUserByEmail($email) {
		$qStr = "SELECT 
					*
				 FROM
					user
				 WHERE 
					email = '".$email."'";
		
		$query = $this->db->query($qStr);  
		return $this->checkHashValue($query->row_array());
	}
	//*** Get Functions ***
	
	//--- Update Functions ---
	//05: updatePassword
	function updatePassword($email, $password) {
		$qStr = "UPDATE 
					user
				 SET
					password = '".$password."', modified = ".time()."
				 WHERE 
					email = '".$email."'";
					
		$query = $this->db->query($qStr);
	}
	//06: updateAccount
	function updateAccount($name,$email,$phone,$address,$admin_email){
		$qStr = "UPDATE 
					admin
				 SET
					name = '".$name."',email = '".$email."',phone = '".$phone."',address = '".$address."', modified = ".time()."
				 WHERE 
					email = '".$admin_email."'";
					
		$query = $this->db->query($qStr);		
	}
	//*** Update Functions ***	
}
/* End of file Login_model.php */
/* Location: ./application/models/backend/Login_model.php */
?>