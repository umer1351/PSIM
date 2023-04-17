<?php
class User_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: getAdminByEmail	
	//02: getAdminById	
	//03: Get Countries
	//04: getCountries
	//05: getUserById
	//06: isUserPhoneExist
	//07: isUserEmailExist
	//08: ChangeStatus
	//09: updateAdmin
	//10: add
	//11: addUserAccount

	// FOR MULTIDIMENSIONAL ARRAY
	function checkHashValueNew($arr){
        if(isset($arr) && is_array($arr) && count($arr)>0 ){
            foreach ($arr as  &$row) {
                
                if(isset($row["name"])) {
                    
                    $row["name"] = decrypt_url($row["name"]);
                    
                }
                if (isset($row["phone"])) {
                    $row["phone"] = decrypt_url($row["phone"]);
                }
                if (isset($row["email"])) {
                    $row["email"] = decrypt_url($row["email"]);
                }                
            }
        }
        
        return $arr;
    }
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
        }
        
        return $arr;
    }
	//--- Get Functions ---
	//01: getUsers
	function getUsers($type){
		$qStr = "SELECT 
					users.*,cities.name as city_name,countries.nicename as country_name
				 FROM
					users
				 LEFT JOIN cities
				 ON users.city_id = cities.id
				 LEFT JOIN countries
				 ON users.country_id = countries.id
				 WHERE 
					users.is_active NOT IN (".DELETED_STATUS_ID.") AND users.role=".$type;
		
		$query = $this->db->query($qStr);
		return $query->result_array();		
	}
	//01: getAdminByEmail	
	function getAdminByEmail($email){
		$qStr = "SELECT 
					*
				 FROM
					admin
				 WHERE 
					email = '".$email."' AND is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->row_array();		
	}
	
	//02: getAdminById	
	function getAdminById($id){
		$qStr = "SELECT 
					*
				 FROM
					admin
				 WHERE 
					id = '".$id."' AND is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->row_array();		
	}
	//03: getCities
	function getCities() {
		$qStr = "SELECT 
					*
				 FROM
					cities
				 ORDER BY name ASC";
		
		$query = $this->db->query($qStr);  
		return $query->result_array();
	}
	//04: getCountries
	function getCountries() {
		$qStr = "SELECT 
					*
				 FROM
					countries
				 ORDER BY name ASC";
		
		$query = $this->db->query($qStr);  
		return $query->result_array();
	}
	//05: getUserById
	function getUserById($user_id) {
		$qStr = "SELECT 
					users.*,cities.name as city_name,talent_categories.name as talent_category_name
				 FROM
					users
				 LEFT JOIN 
					cities
				 ON
					users.city_id = cities.id 
				LEFT JOIN talent_categories
				 ON users.talent_category_id = talent_categories.id
				 WHERE 
					users.id = ".$user_id." AND users.is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);
		$result = $query->row_array();
		$result['ad_pictures'] = "";
		
		if(!empty($result)){
			$result['user_porfolio'] = $this->getUserPortfolioById($user_id);
		}
		return $result;
	}
	//06: getUserPortfolioById
	function getUserPortfolioById($user_id) {
		$qStr = "SELECT 
					talent_portfolio_media.url,talent_portfolio_media.media_type,talent_portfolio_media.is_banner
				 FROM
					talent_portfolio_media
				 WHERE 
					talent_portfolio_media.user_id = ".$user_id." AND talent_portfolio_media.is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->result_array();
	}
	//06: isUserPhoneExist
	function isUserPhoneExist($user_phone,$user_id,$survey_id) {
		$where = "";
		if(!empty($user_id)){
			$where .= " users.id != ".$user_id." AND";
		}
		$qStr = "SELECT
					*
				 FROM
					users
				 WHERE 
					".$where." `phone` = '".$user_phone."' AND `survey_id` = '".$survey_id."' AND is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);  
		$result = $query->row_array();		
		return $result['id'];
	}
	//07: isUserEmailExist
	function isUserEmailExist($user_email,$user_id){
		$qStr = "SELECT 
					users.*
				 FROM
					users
				 WHERE 
					users.email='".$user_email."' AND users.id!=".$user_id." AND users.is_active=".ACTIVE_STATUS_ID;
		
		$query = $this->db->query($qStr);
		$result = $query->row_array();
		if(!empty($result['email'])){
			return $result['id'];
		}else{
			return 0;
		}
	}
	//*** Get Functions ***
	
	//--- Update Functions ---
	//08: ChangeStatus
	function changeStatus($user_id,$status,$reason) {
		$where = ($reason!=""?", reason_for_suspension = '".$reason."'":'');
		$qStr = "UPDATE 
					users
				 SET
					is_active = '".$status."', modified = ".time().$where."
				 WHERE 
					id = '".$user_id."'";
		return $query = $this->db->query($qStr);

	}
	//09: updateAdmin
	function updateAdmin($admin_id,$first_name,$last_name,$phone,$file_name) {
		$qStr = "UPDATE 
					admin
					SET
				`first_name` = '".$first_name."', `last_name` = '".$last_name."', `phone` = '".$phone."', `image` = '".$file_name."', `modified` = '".time()."'
				 WHERE 
					id = '".$admin_id."'";
					
		return $query = $this->db->query($qStr);
	
	}
	//09: updateUser
	function updateUser($user_id,$user_email,$user_name,$user_phone,$user_dob,$user_gender,$user_city,$file_name,$user_profession) {
		$qStr = "UPDATE 
					users
					SET
				`first_name` = '".$user_name."', `email` = '".$user_email."', `phone` = '".$user_phone."', `profile_image` = '".$file_name."'
				, `d.o.b` = '".$user_dob."', `gender` = '".$user_gender."', `city_id` = '".$user_city."', `profession` = '".$user_profession."', `modified` = '".time()."'
				 WHERE 
					id = '".$user_id."'";
					
		return $query = $this->db->query($qStr);
	
	}
	//*** Update Functions ***	
	
	//--- Insert Functions ---
	//10: add
	function add($survey_id,$user_name,$user_phone,$user_dob,$age,$user_gender,$phone_code) {
		$qStr = "INSERT INTO 
				`users`
					SET
				`survey_id` = '".$survey_id."', `name` = '".$user_name."', `phone_code` = '".$phone_code."', `phone` = '".$user_phone."', `country_id` = 0,
				`gender` = '".$user_gender."',`age` = '".$age."',`DOB` = '".$user_dob."',
				`is_active` = '".INACTIVE_STATUS_ID."', `created` = '".time()."'";
					
		$query = $this->db->query($qStr);
		return $this->db->insert_id();	
	}
	//11: addUserAccount
	function addUserAccount($user_id,$user_email,$file_name){
		$qStr = "INSERT INTO 
				`user_accounts`
					SET
				`user_id` = '".$user_id."', `email` = '".$user_email."', `image` = '".$file_name."',
				`is_active` = '".ACTIVE_STATUS_ID."', `created` = '".time()."'";
					
		$query = $this->db->query($qStr);
	}	
	//*** Insert Functions ***	
}
?>
