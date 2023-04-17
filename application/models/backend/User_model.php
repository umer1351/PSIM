<?php
class User_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: getUsers
	//02: getAdminByEmail	
	//03: getAdminById	
	//04: getCities
	//05: getCountries
	//06: getUserById
	//07: getUserPortfolioById
	//08: isUserPhoneExist
	//09: isUserEmailExist
	//10: changeVideoStatus
	//11: getUserPortfolioTypeById
	//12: ChangeStatus
	//13: updateAdmin
	//14: updateUser
	//15: changeSponsorStatus
	//16: changePortfolioImageStatus
	//17: changeVideoThumbnail
	//18: add
	//19: addUserAccount

	//--- Get Functions ---
	//01: getUsers
	function getServiceProviders($type,$not_allowed_users="",$category=""){
		// $where = ($not_allowed_users!=""?" AND user.id NOT IN (".$not_allowed_users.")":'');
		// $where_cat = ($category!=""?" AND users.talent_category_id = ".$category."":'');
		$qStr = "SELECT 
					user.*,country.name as country_name
				 FROM
					user
				
				 LEFT JOIN country
				 ON user.country_id = country.id
				 WHERE 
					user.account_status != 3 AND user_type = '".USER_SERVICE_PROVIDER."'";
		$query = $this->db->query($qStr);
		return $query->result_array();		
	}

	public function getSubcribers($value='')
	{
		$qStr = "SELECT 
					*
				 FROM
					subscription_email";
		$query = $this->db->query($qStr);
		return $query->result_array();	
	}

	function getEventOrganizer($type,$not_allowed_users="",$category=""){
		// $where = ($not_allowed_users!=""?" AND user.id NOT IN (".$not_allowed_users.")":'');
		// $where_cat = ($category!=""?" AND users.talent_category_id = ".$category."":'');
		$qStr = "SELECT 
					user.*,country.name as country_name
				 FROM
					user
				 LEFT JOIN country
				 ON user.country_id = country.id
				 WHERE 
					user.account_status != 3 AND user_type = '".USER_ORGANIZER."'";
		$query = $this->db->query($qStr);
		return $query->result_array();		
	}
	//02: getAdminByEmail	
	function getAdminByEmail($email){
		$qStr = "SELECT 
					*
				 FROM
					user
				 WHERE 
					email = '".$email."' AND user.user_type = '1' AND is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->row_array();		
	}
	
	//03: getAdminById	
	function getAdminById($id){
		$qStr = "SELECT 
					*
				 FROM
					user
				 WHERE 
					id = '".$id."' AND user.user_type = '1' AND is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->row_array();		
	}
	
	function update_member_status($user_id,$status){
		$qStr = "UPDATE 
					user
				 SET
					approval_member = '".$status."'
				 WHERE 
					id = '".$user_id."'";
		return $query = $this->db->query($qStr);
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
	//04: getCities
	function getCities() {
		$qStr = "SELECT 
					*
				 FROM
					city
				 ORDER BY name ASC";
		
		$query = $this->db->query($qStr);  
		return $query->result_array();
	}
	
	//05: getCountries
	function getCountries() {
		$qStr = "SELECT 
					*
				 FROM
					country
				 ORDER BY name ASC";
		
		$query = $this->db->query($qStr);  
		return $query->result_array();
	}
	
	//06: getUserById
	function getUserById($user_id) {
		$qStr = "SELECT 
					user.*,country.name as country_name
				 FROM
					user
			
				
				LEFT JOIN 
					country
				 ON
					user.country_id = country.id 
				 WHERE 
					user.id = ".$user_id." AND user.is_active != ".DELETED_STATUS_ID;
		
		$query = $this->db->query($qStr);
		$result = $query->row_array();
		// $result['ad_pictures'] = "";
		
		// if(!empty($result)){
		// 	$result['user_porfolio'] = $this->getUserPortfolioById($user_id);
		// }
		return $result;
	}
	
	//07: getUserPortfolioById
	function getUserPortfolioById($user_id) {
		$qStr = "SELECT 
					talent_portfolio_media.*
				 FROM
					talent_portfolio_media
				 WHERE 
					talent_portfolio_media.user_id = ".$user_id." AND talent_portfolio_media.is_active != ".DELETED_STATUS_ID." AND talent_portfolio_media.youtube_status != ".DELETED_YOUTUBE_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->result_array();
	}
	
	//08: isUserPhoneExist
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
	
	//09: isUserEmailExist
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
	
	//10: changeVideoStatus
	function changeVideoStatus($id,$status,$youtube_status,$reason,$delete_status,$thumbnail) {
		$where = ($reason!=""?", reason_for_rejection = '".$reason."'":'');
		$delete_status_condition = (!empty($delete_status)?", is_active = '".DELETED_STATUS_ID."'":'');
		$thumbnail_condition = (!empty($thumbnail)?", thumbnail = '".$thumbnail."'":'');
		$qStr = "UPDATE 
					talent_portfolio_media
				 SET
					status = '".$status."',youtube_status = '".$youtube_status."', modified = ".time().$where.$delete_status_condition.$thumbnail_condition."
				 WHERE 
					id = '".$id."'";
		return $query = $this->db->query($qStr);

	}
	
	//11: getUserPortfolioTypeById
	function getUserPortfolioTypeById($user_id,$type) {
		$where = ($user_id!=0?" AND talent_portfolio_media.user_id = '".$user_id."'":'');
		$qStr = "SELECT 
					talent_portfolio_media.*,users.first_name as user_name,talent_categories.title as cat_title
				 FROM
					talent_portfolio_media
				 LEFT JOIN 
					users
				 ON 
					talent_portfolio_media.user_id = users.id
				 LEFT JOIN 
					talent_categories
				 ON 
					users.talent_category_id = talent_categories.id
				 WHERE 
					talent_portfolio_media.media_type = ".$type." AND talent_portfolio_media.status != ".REJECTED_VIDEO_STATUS_ID." AND talent_portfolio_media.is_active != ".DELETED_STATUS_ID." AND talent_portfolio_media.youtube_status IN (".PRIVATE_YOUTUBE_STATUS_ID.",".PUBLIC_YOUTUBE_STATUS_ID.")".$where."";
		$query = $this->db->query($qStr);
		return $query->result_array();
	}
	
	//*** Get Functions ***
	
	//--- Update Functions ---
	//12: ChangeStatus
	function changeStatus($user_id,$status,$reason) {
		// $where = ($reason!=""?", reason_for_suspension = '".$reason."'":'');
		// $first_login_cond = ($status==ACTIVE_STATUS_ID?", first_login = '".INACTIVE_STATUS_ID."'":'');
	//	print_r($reason);die();
		 $qStr = "UPDATE 
					user
				 SET
				reason_for_suspension = '".$reason."',	account_status = '".$status."', modified = ".time()."
				 WHERE 
					id = '".$user_id."'"; 

		return $query = $this->db->query($qStr);

	}
	function changeSubStatus1($user_id,$status) {
			
		$payment = '0';	
		if($status == 1){
			$payment = '1';	
		}	

		 $qStr = "UPDATE 
					subscription
				 SET
				 	approval = '".$status."', payment_status = '".$payment."'
				 WHERE 
					user_id = '".$user_id."'  "; 



		return $query = $this->db->query($qStr);

	}

	function changeSubStatus($user_id,$status) {
			
		$payment = '0';	
		if($status == 1){
			$payment = '1';	
		}	

		 $qStr = "UPDATE 
					subscription
				 SET
				 	approval = '".$status."', payment_status = '".$payment."'
				 WHERE 
					id = '".$user_id."'"; 



		return $query = $this->db->query($qStr);

	}


	//13: updateAdmin
	function updateAdmin($admin_id,$first_name,$last_name,$phone,$file_name) {
		$qStr = "UPDATE 
					user
					SET
				`first_name` = '".$first_name."', `last_name` = '".$last_name."', `phone` = '".$phone."', `profile_image` = '".$file_name."', `modified` = '".time()."'
				 WHERE 
					id = '".$admin_id."'";
					
		return $query = $this->db->query($qStr);
	
	}
	//14: updateUser
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
	//15: changeSponsorStatus
	function changeSponsorStatus($user_id,$status) {
		$qStr = "UPDATE 
					users
				 SET
					is_sponsored = '".$status."', modified = ".time()."
				 WHERE 
					id = '".$user_id."'";
		return $query = $this->db->query($qStr);

	}
	
	//16: changePortfolioImageStatus
	function changePortfolioImageStatus($id,$status,$reason) {
		$where = ($reason!=""?", reason_for_rejection = '".$reason."'":'');
		$qStr = "UPDATE 
					talent_portfolio_media
				 SET
					is_active = '".$status."', modified = ".time().$where."
				 WHERE 
					id = '".$id."'";
		return $query = $this->db->query($qStr);

	}
	
	//17: changeVideoThumbnail
	function changeVideoThumbnail($id,$thumbnail) {
		$qStr = "UPDATE 
					talent_portfolio_media
				 SET
					thumbnail = '".$thumbnail."', modified = ".time()."
				 WHERE 
					id = '".$id."'";
		return $query = $this->db->query($qStr);

	}
	
	//*** Update Functions ***	
	
	//--- Insert Functions ---
	//18: add
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
	//19: addUserAccount
	function addUserAccount($user_id,$user_email,$file_name){
		$qStr = "INSERT INTO 
				`user_accounts`
					SET
				`user_id` = '".$user_id."', `email` = '".$user_email."', `image` = '".$file_name."',
				`is_active` = '".ACTIVE_STATUS_ID."', `created` = '".time()."'";
					
		$query = $this->db->query($qStr);
	}

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
	 	// print_r($query);
	 	// exit();
	 	// return $query->result_array();
	}

	function get_subscriptions($user)
	{
		$qStr = "SELECT * FROM subscription where user_id = '".$user."'";
					
	 	$query = $this->db->query($qStr);
	 	return $query->result_array();
	}
	//*** Insert Functions ***	
}
/* End of file User_model.php */
/* Location: ./application/models/backend/User_model.php */
?>