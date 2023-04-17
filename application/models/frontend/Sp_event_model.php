<?php
class Sp_event_model extends CI_Model {

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

public function updatePricesettings($month,$year,$commission)
{
	$qStr = "Update go_pro
		SET price = '".$month."' where type = '2'
			";
		 
		$query = $this->db->query($qStr);

	$qStr2 = "Update go_pro
		SET price = '".$year."' where type = '1'
			";
		 
		$query2 = $this->db->query($qStr2);	

	$qStr3 = "Update commission_settings
		SET price = '".$commission."' where id = '1'
			";
		 
		$query3 = $this->db->query($qStr3);		

		return 1;
}

	public function disclose_name($value='')
	{
		$qStr = "Update job
		SET disclose_name = '1' where id = '".$value."'
			";
		return $query = $this->db->query($qStr);
		 
	}

	public function getStatus($id='')
	{

	
		$qStr = "SELECT @count1 := (select COUNT(*) from user_job WHERE job_id='".$id."') AS c1;";
		$qStr2 = "SELECT @count2  := (SELECT COUNT(*) FROM user_job WHERE job_id= '".$id."' AND job_status IN (4)) As c2;";
		$query = $this->db->query($qStr);
		$query2 = $this->db->query($qStr2);
		$result = $query->row_array()['c1'];
		$result2 = $query2->row_array()['c2'];
		if ($result == $result2) {
			return 1;
		}else{
			return 0;
		}
		
	}

	public function getStatusForDelete($id='')
	{
		$qStr = "SELECT
					status as st from job_status Where job_id = '".$id."' AND status != '0'";
		$query = $this->db->query($qStr);
		// print_r($query);
		if ($query->num_rows() != 0) {
			return 1; //Hired
		}else{
			return 0; //Not Hired
		}			

	}

	public function change_status($event_id,$status)
	{
		 
 	 $qStr = "Update job
		SET  is_active='".$status."'  where id = '".$event_id."'
			";
			//die();
		return $query = $this->db->query($qStr);
	}

	public function getEventDertails($event_id='')
	{
		$qStr = "SELECT
				job.*, job.id as job_id, user_job.*, service.name as service_name, user_job.job_status as st, job.job_status as js
				FROM
				job
				LEFT JOIN
				user_job
				ON
				job.id = user_job.job_id
				LEFT JOIN
				service
				ON
				user_job.service_id = service.id
				WHERE 
				user_job.job_id = '".$event_id."' AND job.is_active = '1' 
			";
		$query = $this->db->query($qStr);
		return $result = $query->result_array();
	}
public function checkjobs($job_id='',$user_id)
	{
		$qStr = "SELECT
				*
				FROM
				job_status
				
				
				
				WHERE
				job_id =  '". $job_id."' AND status = '4' AND sp_id =  '". $user_id."'
				
			";
			
		$query = $this->db->query($qStr);
		//print_r($query->result_array());die();
		if ($query->num_rows() > 0) {
		return $result = $query->result_array();

		}
		else{
			return 0;
		}

		//print_r($query->result_array());die();
		
		
	}
	public function checkjobs1($job_id='', $ep_id , $sp_id ,$user_id)
	{
		 $qStr = "SELECT
				job_status as st
				FROM
				user_job
				
				
				
				WHERE
				job_id =  '". $job_id."' AND eo_id = '".$ep_id."' AND sp_id = '".$sp_id."'  AND sp_id =  '". $user_id."'
				
			";
	
		$query = $this->db->query($qStr);
		//print_r($query->result_array());die();
	
		return $result = $query->row_array()['st'];

		

		//print_r($query->result_array());die();
		
		
	}
	public function getStatusUserJob($value='')
	{
		$qStr = "SELECT
				job_status as stt
				FROM
				user_job
				WHERE 
				id = '".$value."' 
			";
	$query = $this->db->query($qStr);
	return $result = $query->row_array()['stt'];
	}
	public function getStatusSP($sp='', $job="", $ep_id ="", $s="")
	{
		$qStr = "SELECT
				job_status as stt
				FROM
				user_job
				WHERE 
				service_id = '".$s."' AND job_id = '".$job."' AND sp_id = '".$sp."' AND eo_id = '".$ep_id."' 
			";
	$query = $this->db->query($qStr);
	return $result = $query->row_array()['stt'];
	}
	function getEvents($user_id){
	
		$qStr = "SELECT
					job_status.*,job.event_title, job.deadline
				 FROM
					job_status
				 
				INNER JOIN
				job
				ON
					job_status.job_id = job.id
					WHERE 
						job_status.sp_id = '".$user_id."' && job_status.job_id = job.id AND (job_status.status = 2 OR job_status.status = 4) order by job_status.created DESC
			";
			        $query = $this->db->query($qStr);
			       // print_r( $query->result_array());die();
		return $result = $query->result_array();
	}

	function getEventsEp($user_id){
	
	$qStr = "SELECT
				*
				FROM
				job
				WHERE 
				event_provider_id = '".$user_id."' AND is_active = '1' ORDER BY id desc
			";
	$query = $this->db->query($qStr);
	return $result = $query->result_array();
	}

	function getServiceName($id='')
	{
		$qStr = "SELECT
				name AS service_name
				FROM
				service
				WHERE 
				id = '".$id."'
			";
	$query = $this->db->query($qStr);
	return $result = $query->row_array()['service_name'];
	}

	public function getEventDetail($event_id='')
	{

		$qStr = "SELECT
				job.*
				FROM
				job
				
				WHERE 
				id = '".$event_id."' AND job.is_active = '1' 
				";
		$query = $this->db->query($qStr);
			       // print_r( $query->result_array());die();
		return $result = $query->row_array();
		
	}

	public function getEventDetailBackend($event_id='')
	{

		$qStr = "SELECT
				job.*, job.id as job_id, user_job.*, service.id as serv_id, service.name as service_name, user_job.job_status as st,user.first_name as first,user.last_name as last , job.is_active as js
				FROM
				job
				LEFT JOIN
				user_job
				ON
				job.id = user_job.job_id
				LEFT JOIN
				service
				ON
				user_job.service_id = service.id
				LEFT JOIN
				user
				ON
				job.parent_id = user.id
				WHERE 
				job.id = '".$event_id."'  
				";
		$query = $this->db->query($qStr);
			    
		return $result = $query->row_array();
		
	}

	public function getEventDetails($event_id='')
	{

		$qStr = "SELECT
				job.*, job.id as job_id, user_job.*, service.id as serv_id, service.name as service_name, user_job.job_status as st,user.first_name as first,user.last_name as last , job.job_status as js
				FROM
				job
				LEFT JOIN
				user_job
				ON
				job.id = user_job.job_id
				LEFT JOIN
				user
				ON
				user_job.sp_id = user.id
				LEFT JOIN
				service
				ON
				user_job.service_id = service.id
				WHERE 
				user_job.job_id = '".$event_id."' AND job.is_active = '1' 
			";
		$query = $this->db->query($qStr);
		return $result = $query->result_array();
		
	}

	public function getJobOffers($event_id='', $ep_id='', $service_id='' )
	{
		$qStr = "SELECT
				job_status.*, user.*, job_status.id as jobid
				FROM
				job_status
				LEFT JOIN
				user
				ON
				job_status.sp_id = user.id
				
				WHERE 
				job_status.job_id = '".$event_id."' AND job_status.service_id = '".$service_id."' AND job_status.ep_id = '".$ep_id."' AND job_status.is_active = '1' ORDER BY user.stripe_connection DESC
			";

		$query = $this->db->query($qStr);
		return $result = $query->result_array();
		
	}

	public function hire_sp($value='')
	{

		$qStr = "UPDATE
				job_status
				SET
				status = '1'
				WHERE 
				id = '".$value."' 
			";
			//print_r($qStr);die();
		return	$query = $this->db->query($qStr);
			     
	}

	public function create_event_ajax($title,$details,$date,$deadline,$services,$budget,$user_id,$services_old,$array,$total_budget, $date1, $location )
	{

		$qStr = "INSERT INTO job SET event_title = '".addslashes($title)."', event_detail = '".addslashes($details)."', event_date ='".$date."', event_range_date ='".$date1."', deadline = '".$deadline."', service_id = '".$services."', total_budget = '".$budget."', event_provider_id = '".$user_id."', parent_id ='".$user_id."', event_budget = '".$total_budget."', is_active = '1', job_status = '0', location = '".addslashes($location)."'";
		$query = $this->db->query($qStr);
		$last_id = $this->db->insert_id();

		foreach ($array  as $key => $value) {
			$qStr1 = "INSERT INTO user_job SET service_id = '".$key."', service_detail = '".addslashes($details)."', job_id ='".$last_id."',  amount = '".$value."', eo_id = '".$user_id."', is_active = '1'";
			$query = $this->db->query($qStr1);
		}
		return $last_id;
	}


	public function getAllEvents($value='')
	{
		$qStr = "SELECT
				*
				FROM
				job
				
				
				
				WHERE 
				is_active = '1' 
			";
		$query = $this->db->query($qStr);
		return $result = $query->result_array();
	}
	public function hire_sp_user_job($service_id='',$job_id='')
	{

		$qStr = "UPDATE
				user_job
				SET
				job_status = '1'
				WHERE 
				job_id = '".$job_id."' && service_id = '".$service_id."'
			";
		//	print_r($qStr);die();

		return	$query = $this->db->query($qStr);
			     
	}

	public function update_job_status($job_id, $ep_id, $service_id, $sp_id,$status)
	{

		$qStr = "UPDATE
				user_job
				SET
				job_status = '".$status."'
				WHERE 
				job_id = '".$job_id."' && service_id = '".$service_id."' && sp_id = '".$sp_id."' && eo_id ='".$ep_id."'
			";

		$qStr2 = "UPDATE
				job_status
				SET
				status = '".$status."'
				WHERE 
				job_id = '".$job_id."' && service_id = '".$service_id."' && sp_id = '".$sp_id."' && ep_id ='".$ep_id."'
			";
			$query = $this->db->query($qStr2);	
		//	print_r($qStr);die();

			$query = $this->db->query($qStr);
			return 1;
			     
	}

	public function update_event_details($event_id,$content)
	{
		$qsts ="Update job Set event_detail = '".$content."' Where id = '".$event_id."'";
		return	$query = $this->db->query($qsts);
	}
	public function getAllEventsAdmin($value='')
	{
		$qStr = "SELECT
				job.*, user.first_name,user.last_name
				FROM
				job
				 LEFT JOIN
				user
				ON
				user.id = job.parent_id 
				
				
				WHERE 
				job.is_active != '0' 
			";
		$query = $this->db->query($qStr);
		return $result = $query->result_array();
	}

	public function checkjobstatus($value='')
	{
		$qStr = "SELECT
				*
				FROM
				user_job
				
				
				
				WHERE
				job_id =  '". $value."' AND job_status = '1'
				
			";
			
		$query = $this->db->query($qStr);
		if ($query->num_rows() > 0) {
		return $result = $query->result_array();

		}
		else{
			return 0;
		}

		//print_r($query->result_array());die();
		
	}
	public function updatejobstatus($value='')
	{
		$qStr = "UPDATE
					job
				 SET 
					job_status = 1, modified =".time()."
				 WHERE 
					id ='".$value."'";
					//print_r($qStr);die();
		$query = $this->db->query($qStr);
		return 1;
	}

public function getStatusDetails($sp_id='',$job_id='',$ep_id='')
	{
		//print_r($job_id);die();
		$qStr = "SELECT
				job_status.*, user.profile_image,user.first_name, user.last_name
				FROM
				job_status
				
				LEFT JOIN
				user
				ON
				job_status.ep_id = user.id	
				
				WHERE 
				job_status.sp_id = '".$sp_id."' AND job_status.job_id = '".$job_id."' AND user.id = '".$ep_id."'
			";
			//print_r($qStr);die();
		$query = $this->db->query($qStr);
		
		return $result = $query->result_array();
	}
	public function getJobData($job_id='')
	{

		$qStr = "SELECT
				*
				FROM
				job
		
				
				
				WHERE 
				id = '".$job_id."' 
			";
		$query = $this->db->query($qStr);
		//print_r($query->result_array());die();
		return $result = $query->row_array();
	}

}
//
/* End of file Profile_model.php */
/* Location: ./application/models/frontend/Profile_model.php */
?>