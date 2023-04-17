<?php
class Job_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: getJobs
	//02: getJobById
	//03: getJobTalent
	//04: getJobReviews
	//05: isCategoryExist
	//06: getCategoryFields
	//07: checkUserAvailability
	//08: getTalentJobs
	//09: getReview
	//10: deleteJob
	//11: updateJobStatus
	//12: updateTalentJobStatus
	//13: updateTalentPaymentStatus
	//14: updateTalentAmount
	//15: updateReviewStatus
	//16: updateJob
	//17: changeJobPaymentStatus	
	//18: addCategory
	//19: addTalentToJob
	//20: addTalentUnavailability
	//21: deleteUserUnavailability



	
	//--- Get Functions ---
	//01: getJobs
	function getJobs($user_id){
		$where = (!empty($user_id))?" and jobs.employer_id=".$user_id:"";
		$qStr = "SELECT jobs.*,talent_categories.title as talent_category, users.first_name as employer_name
					FROM
				 jobs
				 LEFT JOIN
					talent_categories
				 ON
					jobs.talent_category_id = talent_categories.id
				 LEFT JOIN
					users
				 ON
					jobs.employer_id = users.id
				 WHERE 
				 jobs.is_active !=".DELETED_STATUS_ID.$where."
				 ORDER BY jobs.created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	//02: getJobById
	function getJobById($job_id){
		$qStr = "SELECT jobs.*,users.first_name as user_name
				 FROM
					jobs
				 LEFT JOIN
					users
				 ON	
					jobs.employer_id = users.id
				 WHERE 
				 jobs.is_active !=".DELETED_STATUS_ID." and jobs.id = ".$job_id."";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	//03: getJobTalent
	function getJobTalent($job_id){
		$qStr = "SELECT talent_job_details.*,users.first_name as user_name
				 FROM
					talent_job_details
				 LEFT JOIN
					users
				 ON	
					talent_job_details.talent_id = users.id
				 WHERE 
				 talent_job_details.is_approved !=".TALENT_JOB_REMOVED_STATUS_ID." and talent_job_details.job_id = ".$job_id."";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//04: getJobReviews
	function getJobReviews($job_id){
		$qStr = "SELECT reviews.*,users.first_name as talent_name
				 FROM
					reviews
				 LEFT JOIN
					users
				 ON	
					reviews.talent_id = users.id
				 WHERE 
				reviews.job_id = ".$job_id."";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	//05: isCategoryExist
	function isCategoryExist($cat_name,$cat_id=""){
		$where = ($cat_id!="")?" and id!=".$cat_id:"";
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." and title = '".$cat_name."'".$where;
		$query = $this->db->query($qStr);
		
        return $query->row_array();
	}
	
	//06: getCategoryFields
	function getCategoryFields(){
		$qStr = "SELECT *
					FROM
				 categories_fields
				 WHERE 
				 is_active !=".DELETED_STATUS_ID;
		$query = $this->db->query($qStr);
		
        return $query->result_array();
	}
	
	//07: checkUserAvailability
	function checkUserAvailability($user_id,$job_start_date,$job_end_date){
		$qStr = "SELECT *
					FROM
				  talent_unavailability
				 WHERE 
				 user_id =".$user_id." and timestamp >= ".$job_start_date." and timestamp <= ".$job_end_date."";
		$query = $this->db->query($qStr);
		
        $result = $query->result_array();
		return $result;
	}
	
	//08: getTalentJobs
	function getTalentJobs($user_id){
		$where = (!empty($user_id))?" and talent_job_details.talent_id=".$user_id:"";
		$qStr = "SELECT talent_job_details.*,jobs.id as job_id,jobs.title as job_title,jobs.description as job_description,jobs.payment_amount as job_payment_amount,jobs.job_status,
				jobs.start_date,jobs.end_date,jobs.reason_for_rejection,jobs.payment_status as job_payment_status,talent_categories.title as talent_category,
				users.first_name as employer_name,jobs.employer_id
					FROM
				 talent_job_details
				 LEFT JOIN
					jobs
				 ON
					talent_job_details.job_id = jobs.id
				 LEFT JOIN
					talent_categories
				 ON
					jobs.talent_category_id = talent_categories.id
				 LEFT JOIN
					users
				 ON
					jobs.employer_id = users.id
				 WHERE 
				 talent_job_details.is_approved !=".DELETED_STATUS_ID.$where."
				 ORDER BY jobs.created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//09: getReview
	function getReview($talent_id,$employer_id,$job_id,$role,$status){
		$status_condition = (!empty($status))?" AND reviews.is_active = ".ACTIVE_STATUS_ID."":"";
		$qStr = "SELECT reviews.*,users.first_name as talent_name
				 FROM
					reviews
				 LEFT JOIN
					users
				 ON	
					reviews.talent_id = users.id
				 WHERE 
				reviews.reviewer_role=".$role." AND reviews.employer_id=".$employer_id." AND reviews.talent_id=".$talent_id." AND reviews.job_id = ".$job_id."".$status_condition;
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	//--- Get Functions ---
	
	
	//--- Update Functions ---
	//10: deleteJob
	function deleteJob($job_id,$status){
		$qStr ="UPDATE jobs
					SET
					is_active = '".$status."', modified='".time()."'
					WHERE	
					id=".$job_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	//11: updateJobStatus
	function updateJobStatus($job_id,$status,$reason){
		$where = ($reason!=""?", reason_for_rejection = '".$reason."'":'');
		$qStr ="UPDATE jobs
					SET
					job_status = '".$status."', modified=".time().$where."
					WHERE	
					id=".$job_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//12 updateTalentJobStatus
	function updateTalentJobStatus($id,$status,$reason){
		$where = ($reason!=""?", reason_for_removal = '".$reason."'":'');
		$qStr ="UPDATE talent_job_details
					SET
					is_approved = '".$status."', modified=".time().$where."
					WHERE	
					id=".$id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//13: updateTalentPaymentStatus
	function updateTalentPaymentStatus($id,$status){
		$qStr ="UPDATE talent_job_details
					SET
					payment_status = '".$status."', modified=".time()."
					WHERE	
					id=".$id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	//14: updateTalentAmount
	function updateTalentAmount($id,$amount){
		$qStr ="UPDATE talent_job_details
					SET
					payment_amount = '".$amount."', modified=".time()."
					WHERE	
					id=".$id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//15: updateReviewStatus
	function updateReviewStatus($id,$status,$reason){
		$where = ($reason!=""?", reason_for_rejection = '".$reason."'":'');
		$qStr ="UPDATE reviews
					SET
					is_active = '".$status."', modified=".time().$where."
					WHERE	
					id=".$id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	//16: updateJob
	function updateJob($job_id,$title,$reason,$startDate,$endDate,$talent_type,$talent_quantity,$amount,$job_status,$description){
		$where = ($job_status!=""?", job_status = '".$job_status."'":'');
		$reason_condition = ($reason!=""?", reason_for_rejection = '".$reason."'":'');
		$qStr ="UPDATE jobs
					SET
					title = '".$title."',talent_category_id = '".$talent_type."',no_of_talent = '".$talent_quantity."',payment_amount = '".$amount."',
					description = '".$description."',start_date = '".$startDate."',end_date = '".$endDate."',modified=".time().$where.$reason_condition."
					WHERE	
					id=".$job_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//17: changeJobPaymentStatus	
	function changeJobPaymentStatus($job_id,$status,$reason){
		$where = ($reason!=""?", payment_rejection_reason = '".$reason."'":'');
		$qStr = "UPDATE 
					jobs
				 SET
					payment_status = '".$status."', modified = ".time().$where."
				 WHERE 
					id = '".$job_id."'";
		return $query = $this->db->query($qStr);	
	}
	//--- Update Functions ---
	
	//--- Insert Functions ---
	//18: addCategory
	function addJob($employer_id,$title,$startDate,$endDate,$talent_type,$talent_quantity,$amount,$description){
		$qStr = "INSERT INTO 
						jobs
					 SET
						employer_id = '".$employer_id."',title = '".$title."',talent_category_id = '".$talent_type."',no_of_talent = '".$talent_quantity."',payment_amount = '".$amount."',
						description = '".$description."',start_date = '".$startDate."',end_date = '".$endDate."',is_active = '".ACTIVE_STATUS_ID."',created=".time();
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	
	//19: addTalentToJob
	function addTalentToJob($user_id,$job_id){
		$qStr = "INSERT INTO 
						talent_job_details
					 SET
						job_id = '".$job_id."',talent_id = '".$user_id."', created = ".time();
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	
	
	
	//20: addTalentUnavailability
	function addTalentUnavailability($id,$job_id,$user_id,$timestamps){
		foreach($timestamps as $timestamp){
			$qStr="INSERT into talent_unavailability set
				user_id='".$user_id."',	timestamp='".$timestamp."',talent_job_detail_id='".$id."',job_id='".$job_id."',
				is_wowzer_job='".ACTIVE_STATUS_ID."',is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
			$query = $this->db->query($qStr);
		}
		return $this->db->insert_id();
	}
	
	//--- Insert Functions ---
	
	//--- Delete Functions ---
	//21: deleteUserUnavailability
	function deleteUserUnavailability($user_id,$talent_job_detail_id){
		$qStr = "DELETE FROM talent_unavailability WHERE user_id='".$user_id."' and talent_job_detail_id='".$talent_job_detail_id."'";
		return $query = $this->db->query($qStr);
	}
	//--- Delete Functions ---
}
/* End of file Job_model.php */
/* Location: ./application/models/backend/Job_model.php */
?>