<?php
class Portfolio_model extends CI_Model {


    function __construct() {
    	parent::__construct();
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
	

	//01: getTalentPortfolioVideos
	function getTalentPortfolioVideos($user_id){
        $qStr = "SELECT
					*
				 FROM
					talent_portfolio_media
				 WHERE
					user_id = '".$user_id."' AND is_active = '".ACTIVE_STATUS_ID."' AND media_type = ".MEDIA_VIDEO." AND youtube_status=".PUBLIC_YOUTUBE_STATUS_ID." AND status=".APPROVED_VIDEO_STATUS_ID;

        $query = $this->db->query($qStr);
		return $result = $query->result_array();
	}
	
	//02: getTalentPortfolioImages
	function getTalentPortfolioImage($user_id){
        $qStr = "SELECT
					*
				 FROM
					talent_portfolio_media
				 WHERE
					user_id = '".$user_id."' AND is_active = '".ACTIVE_STATUS_ID."' AND media_type = ".MEDIA_IMAGE;

        $query = $this->db->query($qStr);
		return $result = $query->result_array();
	}
	
	//03: getTalentReviews
	function getTalentReviews($user_id){
		$qStr = "SELECT reviews.*,users.first_name as employer_name,users.profile_image as employer_image
				 FROM
					reviews
				 LEFT JOIN
					users
				 ON	
					reviews.employer_id = users.id
				 WHERE 
				reviews.talent_id = ".$user_id." AND reviews.reviewer_role=".USER_ROLE_EMPLOYER." AND reviews.is_active=".ACTIVE_STATUS_ID."";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//04: getUserPortfolioById
	function getUserPortfolioById($user_id,$type) {
		$qStr = "SELECT 
					talent_portfolio_media.*
				 FROM
					talent_portfolio_media
				 WHERE 
					talent_portfolio_media.user_id = ".$user_id." AND talent_portfolio_media.media_type = ".$type." AND talent_portfolio_media.is_active NOT IN (".DELETED_STATUS_ID.",".TALENT_DELETED_VIDEO_STATUS_ID.") AND talent_portfolio_media.youtube_status != ".DELETED_YOUTUBE_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->result_array();
	}
	
	//05: checkBookmarkStatus
	function checkBookmarkStatus($employer_id,$talent_id){
		$qStr = "SELECT *
				 FROM
				 bookmarked_talent
				 WHERE 
				talent_id = ".$talent_id." AND employer_id=".$employer_id." AND is_active=".ACTIVE_STATUS_ID."";
		$query = $this->db->query($qStr);
        $result = $query->row_array();
		if(!empty($result)){
			return 1;
		}else{
			return 2;
		}
	}
	
	//06: getProfileViewCount
	function getProfileViewCount($talent_id){
		 $qStr = "SELECT
					views
				 FROM
					users
				 WHERE
					id = ".$talent_id;

        $query = $this->db->query($qStr);
		$result = $query->row_array();
		return $result['views'];
	}
	
	//07: getTalentUnavailability
	function getTalentUnavailability($talent_id,$job_start_date,$job_end_date){
		$qStr = "SELECT
					*
				 FROM
					talent_unavailability
				 WHERE
					user_id = ".$talent_id." AND timestamp BETWEEN ".$job_start_date." AND ".$job_end_date." ";
        $query = $this->db->query($qStr);
		$result = $query->row_array();
		if(!empty($result)){
			return $result['user_id'];			
		} else {
			return 0;
		}
	}
	/* -------- GET FUNCTIONS <END> -------- */
	/* -------- UPDATE FUNCTIONS <START> -------- */
	//08: updateProfileViewCount
	function updateProfileViewCount($talent_id){
		$qStr ="UPDATE
						users
					SET
						views = views+1, modified=".time()."
					WHERE
						id=".$talent_id;
						
        $query = $this->db->query($qStr);
	}
	/* -------- UPDATE FUNCTIONS <END> -------- */
	/* -------- INSERT FUNCTIONS <START> -------- */
	//09: bookTalentDetails
	function bookTalentDetails($employer_id,$talent_ids,$job_title,$job_category,$job_start_date,$job_end_date,$job_compensation,$job_description){
		$qStr="INSERT INTO 
					jobs 
				SET
					title='".addslashes($job_title)."',	employer_id='".$employer_id."',
					talent_category_id='".$job_category."',compensation='".$job_compensation."',payment_amount='".$job_compensation."',no_of_talent='".count($talent_ids)."',
					description='".addslashes($job_description)."', start_date='".$job_start_date."', end_date='".$job_end_date."',
					is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
		$query = $this->db->query($qStr);
		$job_id = $this->db->insert_id();
		if(!empty($job_id)){
			foreach($talent_ids as $talent_id){
				$qStr="INSERT INTO 
							talent_job_details 
						SET
							job_id='".$job_id."',talent_id='".$talent_id."' ,created='".time()."'";
				$query = $this->db->query($qStr);
			}
		}
		return $job_id;
	}

	// 11: getPortfoliorecord
	function getPortfolioRecord($user_id){
		//print_r($user_id);die();

		$qStr = "SELECT
				 	*
				 FROM
				 	portfolio
				 WHERE 
					is_active = 1 and sp_id= '".$user_id."'";
							 
		$query = $this->db->query($qStr);

		return $query->row_array();		
	}


	//12: changeSettings
	function addPortfolioImage($file_name, $portfolio_id){
		 $qStr = "INSERT INTO 
					media 
					SET
					po_id = '".$portfolio_id."', media='".$file_name."'";
				 
        $query = $this->db->query($qStr);

        return $query;	
	}

	function getPortfolioImage($portfolio_id){
		

		$qStr = "SELECT
				 	*
				 FROM
				 	media
				 	
				 
				 WHERE 
					po_id= '".$portfolio_id."' AND is_active = '1'";
							 
		$query = $this->db->query($qStr);
		//print_r($query->result_array());die();	
		return $query->result_array();	

	}

	function PortfolioRecordDelete($id){
		
		
		$qStr ="UPDATE
						media
					SET
						is_active = 0
					WHERE
						id= '".$id."'";
							 
		$query = $this->db->query($qStr);
		
		return $query;	

	}
		//02: getTalentPortfolioImages
	function getServiceProfile($service_provider){
        $qStr = "SELECT
					*
				 FROM
					user
				 WHERE
					id = '".$service_provider."' AND is_active = '".ACTIVE_STATUS_ID."'";

        $query = $this->db->query($qStr);
        //print_r($query->result_array());die();
		return $result = $query->result_array();
	}

	
	/* -------- INSERT FUNCTIONS <END> -------- */
}
