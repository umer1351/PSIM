<?php
class User_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	/*------------ Function List <Start>-----------------
	01: isUserExist
	02: isUserEmailExist
	03: isFBUserEmailExist
	04: getUserById
	05: Login
	06: loginByFacebook
	07: getUser
	08: getUserByEmail
	09: getAdminEmail
	10: getCountries
	11: getCities
	12: getLanguages
	13: getSiteStatus
	14: getSiteSettings
	15: registerByEmail
	16: deactivateUserFirstLogin
	17: updatePassword
	18: changeUserRole
	------------ Function List <End>-----------------*/
	/* -------- GET FUNCTIONS <START> -------- */
    //01: isUserExist

    function deleteAccount($user_id='')
    {
    	$sql = "Update user set is_active = 0 where id = '".$user_id."'";
    	$query = $this->db->query($sql);
    	return $query;

    }
	function isUserExist($email) {
        $qStr = "SELECT
					id,email
				 FROM
					user
				 WHERE
					email = '".$email."' AND is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        return $query->row_array();
    }
    
	//02: isUserEmailExist
    function isUserEmailExist($email) {
        $qStr = "SELECT
					*
				 FROM
					user
				 WHERE
					email = '".$email."' AND is_active != ".DELETED_STATUS_ID." ";

        $query = $this->db->query($qStr);
        $user_id = $query->row_array();
        return $user_id;
    }
	
	//03: isFBUserEmailExist
    function isFBUserEmailExist($email) {
        $qStr = "SELECT
					*
				 FROM
					users
				 WHERE
					email = '".$email."' AND is_active != ".DELETED_STATUS_ID." AND account_type = ".FACEBOOK_ACCOUNT_TYPE."";

        $query = $this->db->query($qStr);
        $user_id = $query->row_array();
        return $user_id;
    }
	
    //04: getUserById
	function getUserById($id) {
        $qStr = "SELECT
					user.*,country.name as country_name
				 FROM
					user
				 
				LEFT JOIN 
					country
				 ON
					user.country_id = country.id 
				 WHERE
					user.id = '".$id."'";

        $query = $this->db->query($qStr);
        return $query->row_array();        
    }
	
	//05: Login
	function login($email,$password) {
		$qStr = "SELECT
				 	*
				 FROM
				 	user
				 WHERE 
					user.email = '".$email."' AND user.password = '".$password."' AND is_active = ".ACTIVE_STATUS_ID."";
		$query = $this->db->query($qStr);
		return $query->row_array();
	}
	//06: loginByFacebook
    function loginByFacebook($fb_id,$first_name,$last_name,$email,$image_url) {
		//Check if User Entry Exists
		$qStr = "SELECT
					id,email,is_active
				 FROM
					user
				 WHERE
					email = '".$email."' AND is_active != ".DELETED_STATUS_ID;	
		$query = $this->db->query($qStr);
		$user_id ='';
		$result = $query->row_array();
           
		if(empty($result)) {	//Case: New User
			$qStr1 = "INSERT INTO 
				 	 	user
				 	 SET 
						first_name = '".$first_name." ".$last_name."', email = '".$email."', profile_image = '".$image_url."',
						fb_id = '".$fb_id."', is_active = ".PENDING_STATUS_ID.", account_type = ".FACEBOOK_ACCOUNT_TYPE." , created = ".time();  
				$query1= $this->db->query($qStr1);
				$user_id = $this->db->insert_id();
		} else {
			$qStr1 = "UPDATE 
				 	 	user
				 	 SET 
						modified = ".time().", email = '".$email."', fb_id = '".$fb_id."'
					 WHERE
					  id = ".$result['id'];
				$query1= $this->db->query($qStr1);
			$user_id = $result['id'];
		}
                return $user_id;
		
	}
	
	//07: getUser
	function getUser($email) {
		$qStr = "SELECT 
					*
				 FROM
					user
				 WHERE 
					email = '".$email."'
					AND is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);  
		return $query->row_array();
	}

	//08: getUserByEmail
	function getUserByEmail($email) {
		$qStr = "SELECT 
					email,password,created
				 FROM
					user
				 WHERE 
					email = '".$email."'";
		
		$query = $this->db->query($qStr);  
		return $query->row_array();
	}
	
	//09: getAdminEmail
	public function getAdminEmail(){
		$qStr = "SELECT 
					email
				 FROM
					admin
				 WHERE 
					is_active = ".ACTIVE_STATUS_ID;
		
		$query = $this->db->query($qStr);  
		$admin = $query->row_array();
		return (!empty($admin) ? $admin['email']:'');
	}
	
	//10: getCountries
	function getCountries(){
		$qStr = "SELECT 
					*
				 FROM
					country
				 ORDER BY name ASC";
		
		$query = $this->db->query($qStr);  
		return $query->result_array();
	}
	
	//11: getCities
	function getCities() {
		$qStr = "SELECT 
					*
				 FROM
					city
				 ORDER BY name ASC";
		
		$query = $this->db->query($qStr);  
		return $query->result_array();
	}
	
	//12: getLanguages
	function getLanguages(){
		$qStr = "SELECT 
					*
				 FROM
					languages";
		
		$query = $this->db->query($qStr);  
		return $query->result_array();		
	}
	
	//13: getSiteStatus
	function getSiteStatus(){
		$qStr = "SELECT 
					*
				 FROM
					settings";
		$query = $this->db->query($qStr);  
		$result = $query->row_array();
		return $result['is_live'];
	}
	
	//14: getSiteSettings
	function getSiteSettings(){
		// $qStr = "SELECT 
		// 			*
		// 		 FROM
		// 			settings";
		// $query = $this->db->query($qStr);  
		// $result = $query->row_array();
		// return $result;
	}

	/* -------- GET FUNCTIONS <END> -------- */
	/* -------- INSERT FUNCTIONS <START> -------- */
	//15: registerByEmail
	public function registerByEmail($role,$first_name,$last_name,$email,$password,$status,$confirmation_code, $planner_account_type, $business_name) {
		$qStr ="INSERT INTO
					user
				SET
					user_type = '2',first_name = '".$first_name."',last_name = '".$last_name."',  password = '".$password."' , business_name = '".$business_name."', account_type = '".$planner_account_type."',
					is_active = ".ACTIVE_STATUS_ID.", email = '".$email."', confirmation_code = '".$confirmation_code."', account_status = '1', 
					created = ".time();
		$query = $this->db->query($qStr);
		$user_id = $this->db->insert_id();
        return $user_id;
	}
	/* -------- INSERT FUNCTIONS <END> -------- */
	/* -------- UPDATE FUNCTIONS <START> -------- */
	//16: deactivateUserFirstLogin
    function deactivateUserFirstLogin($user_id,$code_type) {
		$qStr ="UPDATE
						user
				SET
						account_status = ".ACTIVE_STATUS_ID."
					WHERE
						id=".$user_id;
        $query = $this->db->query($qStr);
	}

	//17: updatePassword
	function updatePassword($email, $password) {
		$qStr = "UPDATE 
					user
				 SET
					password = '".$password."', modified = ".time()."
				 WHERE 
					email = '".$email."'";
					
		$query = $this->db->query($qStr);
	}
	
	//18: changeUserRole
	function changeUserRole($user_id,$role,$newsletter){
		$qStr ="UPDATE
						user
					SET
						role = ".$role.",newsletter_subscription	 = ".$newsletter."
					WHERE
						id=".$user_id;
        return $query = $this->db->query($qStr);
	}

	//18: activateUserLogin
    function activateUserLogin($user_id,$code_type) {
		$qStr ="UPDATE
						user
				SET
						account_status = ".ACTIVE_STATUS_ID."
					WHERE
						id=".$user_id;
        $query = $this->db->query($qStr);
	}

	function changeUserLoginStatusToPending($user_id,$code_type)
	{
		$qStr ="UPDATE
						user
				SET
						account_status = ".PENDING_STATUS."
					WHERE
						id=".$user_id;
        $query = $this->db->query($qStr);
	}


	
	/* -------- UPDATE FUNCTIONS <END> -------- */
	

	function get_services()
	{
		$qStr = "SELECT * FROM service where is_active = '".ACTIVE_STATUS_ID."'";
					
	 	$query = $this->db->query($qStr);
	 	return $query->result_array();
	}

	function get_selected_services($id,$user_id){
		$qStr = "SELECT * FROM user where id= '".$user_id."' AND FIND_IN_SET('".$id."', services) ";
					
	 	$query = $this->db->query($qStr);
	 	if($query->num_rows() != 0){
	 		return 1;
	 	}else{
	 		return 0;
	 	}
	}

	function get_states()
	{
		$qStr = "SELECT * FROM states";
					
	 	$query = $this->db->query($qStr);
	 	return $query->result_array();
	}
	function get_city()
	{
		$qStr = "SELECT * FROM next_destinations";
					
	 	$query = $this->db->query($qStr);
	 	return $query->result_array();
	}

}
/* End of file User_model.php */
/* Location: ./application/models/frontend/User_model.php */
?>