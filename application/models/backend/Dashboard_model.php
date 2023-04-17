<?php
class Dashboard_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: Get surveys
	//02: Get users
	//03: getUsersInvited
	//04: getTotalUserAppointment
	//05: getUserAppointment
	//06: getSurveysCompleted
	
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
	//01: Get surveys
	function getSurveys($admin_role,$admin_id){
		$where = "";
		$where .= ($admin_role != SUPER_ADMIN) ?  "surveys.admin_id = '".$admin_id."' AND " : "";
		$qStr = "SELECT id as survey_id, survey_title
					FROM
				 surveys
				 WHERE 
				 ".$where." is_active =".ACTIVE_STATUS_ID."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	//02: Get users
	function getUsers($survey_status,$user_status,$survey_id,$admin_role,$admin_id){
		$where_survey_id = "";
		$where_survey_id .= ($survey_id != 0)? 'AND users.survey_id = '.$survey_id:'';
		$where = "";
		$where .= ($admin_role != SUPER_ADMIN) ?  "surveys.admin_id = '".$admin_id."' AND " : "";
		$where .= ($survey_status != 0 && $user_status == 0)? 'users.survey_status = '.$survey_status:'';
		$where .= ($survey_status == 0 && $user_status != 0 && $user_status != 1)? 'users.is_active ='.$user_status:'';
		$where .= ($survey_status == 0 && $user_status != 0 && $user_status == 1)? 'users.survey_status !='.$survey_status:'';
		$where .= ($survey_status == 0 && $user_status == 0)? 'users.is_active !='.DELETED_STATUS_ID:'';
		$qStr = "SELECT count(*) as total_user
					FROM
				 users
				INNER JOIN
					surveys
						ON
					users.survey_id =surveys.id
				 WHERE
				".$where." ".$where_survey_id;
		$query = $this->db->query($qStr);
        $result = $query->row_array();
		if(!empty($result)){
			return $result['total_user'];
		} else {
			return 0;
		}
	}
	//03: getUsersInvited
	function getUsersInvited($survey_id,$admin_role,$admin_id){
		$where = "";
		$where .= ($admin_role != SUPER_ADMIN) ?  "surveys.admin_id = '".$admin_id."' AND " : "";
		$where .= ($survey_id != 0)? 'users.survey_id = '.$survey_id.' AND':'';
		$qStr = "SELECT count(*) as total_user
					FROM
				 users
				INNER JOIN
					surveys
						ON
					users.survey_id =surveys.id
				 WHERE
				".$where." users.survey_status != ".INACTIVE_STATUS_ID;
		$query = $this->db->query($qStr);
        $result = $query->row_array();
		if(!empty($result)){
			return $result['total_user'];
		} else {
			return 0;
		}
	}
	//04: getTotalUserAppointment
	function getTotalUserAppointment($survey_id,$admin_role,$admin_id){
		$where = "";
		$where .= ($admin_role != SUPER_ADMIN) ?  "surveys.admin_id = '".$admin_id."' AND " : "";
		$where .= ($survey_id != 0)? 'survey_id = '.$survey_id.' AND':'';
		$qStr = "SELECT count(*) as total_appointments
					FROM
				 user_appointments
				INNER JOIN
					surveys
						ON
					user_appointments.survey_id = surveys.id
				 WHERE
				 ".$where."
				 user_appointments.status = ".CONDUCTED;
		$query = $this->db->query($qStr);
        $result = $query->row_array();
		if(!empty($result)){
			return $result['total_appointments'];
		} else {
			return 0;
		}		
	}
	//05: getUserAppointment
	function getUserAppointment($survey_id,$admin_role,$admin_id){
		$where = "";
		$where .= ($admin_role != SUPER_ADMIN) ?  "surveys.admin_id = '".$admin_id."' AND " : "";
		$where .= ($survey_id != 0)? 'users.survey_id = '.$survey_id.' AND':'';
		$qStr = "SELECT users.id, users.survey_id, users.name, users.survey_score, user_accounts.image, user_appointments.appointment
					FROM
				 users
				 LEFT JOIN 
					user_accounts
					ON
					user_accounts.user_id = users.id
				 INNER JOIN
					user_appointments
					ON
					user_appointments.user_id = users.id
				INNER JOIN
					surveys
						ON
					users.survey_id =surveys.id
					WHERE
				 ".$where." users.is_active != ".DELETED_STATUS_ID." AND user_appointments.appointment >= ".time()."
				 ORDER BY user_appointments.appointment DESC
				 LIMIT 6";
		$query = $this->db->query($qStr);
        return $result = $this->checkHashValueNew($query->result_array());		
	}
	//06: getSurveysCompleted
	function getSurveysCompleted($survey_id,$admin_role,$admin_id){
		$where = "";
		$where .= ($admin_role != SUPER_ADMIN) ?  "surveys.admin_id = '".$admin_id."' AND " : "";
		$where .= ($survey_id != 0)? 'users.survey_id = '.$survey_id.' AND':'';
		$qStr = "SELECT users.modified, count(*) as total_surveys
					FROM
				 users
					INNER JOIN
					surveys
						ON
					users.survey_id =surveys.id
				 WHERE
				 ".$where." users.modified >= ".time()."-".WEEK." AND users.is_active =".ACTIVE_STATUS_ID."
				 GROUP BY modified
				 ORDER BY modified ASC";
		$query = $this->db->query($qStr);
        return $result = $query->result_array();
				
	}
	
}
?>
