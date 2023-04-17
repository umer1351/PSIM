<?php
class Review_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    	$this->load->helper('date');
    }
	
	/*------------ Function List <Start>-----------------
	01: getTalentPortfolioVideos
	02: getTalentPortfolioImages
	03: getTalentReviews
	04: getUserPortfolioById
	05: checkBookmarkStatus
	06: getProfileViewCount
	07: getTalentUnavailability
	08: updateProfileViewCount
	09: bookTalentDetails
	------------ Function List <End>-----------------*/
	/* -------- GET FUNCTIONS <START> -------- */
	

	//01: getTalentPortfolioVide-os
	function getJobstatus($event_id){
		 $qStr = "SELECT
				job_status.*, service.*,user.first_name as employer_name,user.profile_image as employer_image, job.event_title
				FROM
				job_status
				JOIN
				service
				ON
				job_status.service_id = service.id
								JOIN
				user
				ON
				job_status.sp_id = user.id
												JOIN
				job
				ON
				job.id = job_status.job_id
				WHERE 
				job_status.job_id = '".$event_id."' AND job_status.service_id = service.id AND job_status.sp_id = user.id  AND job_status.is_active = '1' AND job_status.status = '4' 
			";

			//die();
		$query = $this->db->query($qStr);
		//print_r($query->result_array());die();
		return $result = $query->result_array();
		}


	function insertReview($sp_id,$ep_id,$service_id,$job_id,$review,$stars,$user_type,$user_id){
 $qStr="INSERT into review set
				sp_id='".$sp_id."',eo_id='".$ep_id."',job_id='".$job_id."',
				service_id='".$service_id."',rating='".$stars."',review='".$review."',parent_id='".$user_id."',user_type='".$user_type."',is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
				
		return $query = $this->db->query($qStr);
	}
	function getreviews($sp_id,$service_id){
		$qStr = "SELECT
				 	review.*,service.*,user.first_name as employer_name,user.profile_image as user_image,review.created as review_created
				 FROM
				 	review
				 JOIN
				service
				ON
				review.service_id = service.id
				 JOIN
				user
				ON
				review.eo_id = user.id
				 WHERE 
				review.sp_id = '".$sp_id."' AND	review.eo_id = user.id  AND review.service_id = '".$service_id."' AND review.user_type = 1" ;
				
$query = $this->db->query($qStr);
	//print_r($query->result_array());die();
		return $result = $query->result_array();
	}

	function getreviewscheck($event_id,$service_id,$user_id){
		$qStr = "SELECT
				 	review.*,service.*,user.first_name as employer_name,user.profile_image as employer_image,review.created as review_created
				 FROM
				 	review
				 JOIN
				service
				ON
				review.service_id = service.id
				 JOIN
				user
				ON
				review.eo_id = user.id
				 WHERE 
					job_id ='".$event_id."' AND review.eo_id = user.id  AND review.service_id = '".$service_id."' AND review.user_type = 1 AND review.eo_id= '".$user_id."'" ;

$query = $this->db->query($qStr);
	//print_r($query->result_array());die();
if ($query->num_rows() > 0) {
return 1;

	}
	else {
		return 0;
	}
	
	}
	function getreviewsEmcheck($event_id,$service_id,$user_id){
		$qStr = "SELECT
				 	review.*,service.*,user.first_name as employer_name,user.profile_image as employer_image,review.created as review_created
				 FROM
				 	review
				 JOIN
				service
				ON
				review.service_id = service.id
				 JOIN
				user
				ON
				review.eo_id = user.id
				 WHERE 
					job_id ='".$event_id."' AND review.eo_id = user.id  AND review.service_id = '".$service_id."' AND review.user_type = 2 AND review.sp_id= '".$user_id."'" ;

$query = $this->db->query($qStr);
	//print_r($query->result_array());die();
if ($query->num_rows() > 0) {
return 1;

	}
	else {
		return 0;
	}
	
	}
	function getSpreview($user_id){


$qStr = "SELECT
				 	review.*,service.*,user.first_name as employer_name,user.profile_image as employer_image,review.created as review_created
				 FROM
				 	review
				 JOIN
				service
				ON
				review.service_id = service.id
				 JOIN
				user
				ON
				review.eo_id = user.id
				 WHERE 
					review.sp_id ='".$user_id."'  AND review.service_id = service.id AND review.parent_id != '".$user_id."'  Group By review.eo_id Order By review.created ASC " ;

$query = $this->db->query($qStr);
//print_r($query->result_array());die();
		return $result = $query->result_array();
	}
		function avgreview($user_id){


	$qStr = "SELECT
				 	AVG(rating) as review_rating
				 FROM
				 	review
				 
				 WHERE 
					review.sp_id ='".$user_id."' AND review.user_type =1 " ;

$query = $this->db->query($qStr);
//print_r($query->result_array());die();
		return $result = $query->result_array();
	}
	function avgreviewEP($user_id){


	$qStr = "SELECT
				 	AVG(rating) as review_rating
				 FROM
				 	review
				 
				 WHERE 
					review.eo_id ='".$user_id."' " ;

$query = $this->db->query($qStr);
//print_r($query->result_array());die();
		return $result = $query->result_array();
	}

	function get_em_review($user_id){
		$qStr = "SELECT
				 	review.*,service.*,user.first_name as employer_name,user.profile_image as employer_image,review.created as review_created
				 FROM
				 	review
				 JOIN
				service
				ON
				review.service_id = service.id
				 JOIN
				user
				ON
				review.sp_id = user.id
				 WHERE 
					review.eo_id ='".$user_id."' AND review.parent_id != '".$user_id."'  Order By review.created Desc " ;

$query = $this->db->query($qStr);
//print_r($query->result_array());die();
		return $result = $query->result_array();
	}

		function getSpJobstatus($event_id,$service_id){
		 $qStr = "SELECT
				job_status.*, service.*,user.first_name as employer_name,user.profile_image as employer_image, job.event_title
				FROM
				job_status
				JOIN
				service
				ON
				job_status.service_id = service.id
								JOIN
				user
				ON
				job_status.ep_id = user.id
												JOIN
				job
				ON
				job.id = job_status.job_id
				WHERE 
				job_status.job_id = '".$event_id."' AND job_status.sp_id = '".$service_id."' AND job_status.service_id = service.id AND job_status.ep_id = user.id  AND job_status.is_active = '1' AND job_status.status = '4' 
			";

		// exit();	
		$query = $this->db->query($qStr);
		//print_r($query->result_array());die();
		return $result = $query->result_array();
		}
		function getEmreviews($eo_id,$event_id,$service_id){
		$qStr = "SELECT
				 	review.*,service.*,user.first_name as employer_name,user.profile_image as user_image,review.created as review_created
				 FROM
				 	review
				 JOIN
				service
				ON
				review.service_id = service.id
				 JOIN
				user
				ON
				review.sp_id = user.id
				 WHERE 
					review.eo_id = '".$eo_id."'  AND review.sp_id = user.id  AND review.service_id = '".$service_id."'  AND review.user_type = 2" ;

$query = $this->db->query($qStr);
	//print_r($query->result_array());die();
		return $result = $query->result_array();
	}	
			function getAvgEpReview($user_id){


 $qStr = "SELECT
				 	AVG(rating) as review_rating
				 FROM
				 	review
				 
				 WHERE 
					review.eo_id ='".$user_id."' AND review.user_type =2 " ;

$query = $this->db->query($qStr);
		return $result = $query->result_array();
	}
				function getAvgSpReview($user_id){


 $qStr = "SELECT
				 	AVG(rating) as review_rating
				 FROM
				 	review
				 
				 WHERE 
					review.eo_id ='".$user_id."' AND review.user_type =1 " ;

$query = $this->db->query($qStr);
		return $result = $query->result_array();
	}

	/* -------- INSERT FUNCTIONS <END> -------- */
}
//
/* End of file Profile_model.php */
/* Location: ./application/models/frontend/Profile_model.php */
?>