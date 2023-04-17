<?php
class Job_model extends CI_Model {

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
	

	//01: getTalentPortfolioVideos
	function getJobs($query='',$categories='',$max_amount='',$min_amount='',$date1='',$date2='',$search=''){
	//print_r($categories);die();
		if($query){
			$search = $query;
		}
		else{
			$search='';
		}
		if($categories){
			$category=implode(',', $categories);
		}
		else{
			$category='';
		}

		$items = array();
		$now=now();
		
		$date=date('y/m/d' , $now);
		if(!empty($max_amount)){
			//print_r($categories);
			if(!empty($categories)){
			foreach ($categories as $key => $value){
			$min_date= date("Y-m-d", strtotime($date1));  ;
			$max_date=date("Y-m-d", strtotime($date2));
	            $qStr = "SELECT
						 job.*
						 FROM
							job
						WHERE 
							event_date >= '".$date."' && event_title LIKE '%".$search."%'  && find_in_set('".$categories[$key]."',service_id) && event_budget <='".$max_amount."' && event_date BETWEEN '".$min_date."' AND '".$max_date."' AND is_active = 1 Order By id desc 

				";
			 	$query = $this->db->query($qStr);
				if ($query->num_rows() > 0) {
					$items[]=$query->result_array();

				}
			}
			}
		$result = [];

		foreach ($items as $value) {
		    $result = array_merge($result, $value);
		}
		//print_r( $result);die();

		$items_thread = array_unique($result, SORT_REGULAR);
		// print_r($items_thread);
		// exit();	
			return  $items_thread;
		
		}
	else{
		 $qStr = "SELECT
				*
			 FROM
				job
			WHERE 
					event_date >= '".$date."'  AND is_active = 1  Order By id desc 

		";
				//die();
				// print_r($qStr);
				// die();
	 	$query = $this->db->query($qStr);
		// print_r($query->result_array());die();
		return  $query->result_array();

		}
	
	}
	function getUserJobs($service_id){
		//print_r($user_id);die();
		
        $items = array();


		$qStr = "SELECT name FROM service where  id = '".$service_id."' ";

	 	$query = $this->db->query($qStr);
 		$items[] = $query->row_array()['name'];


		return $items;
	}
	
	function get_selected_jobs($service_id,$user_id){
		 $myArray = explode(',',$service_id);
		 $items = array();
	foreach ($myArray as $key => $value){
		$id=$myArray[$key];
		$qStr = "SELECT name FROM service where  id = '".$id."' ";

	 	$query = $this->db->query($qStr);

 		$items[] = $query->row_array()['name'];

		}
//print_r($items);die();
		return $items;

	}

		function getJobDetailData($id){
			$qStr = "SELECT
					job.*,user.id as u_id,user.profile_image,user.first_name,user.last_name,user.city, user.address
				 FROM
					job
				 
				INNER JOIN
				user
				ON
					job.parent_id = user.id
					WHERE 
						job.id = '".$id."' && job.parent_id=user.id 
			";
			// AND job_status != 0 AND job_status != 4
			//print_r($qStr);die();
		$query = $this->db->query($qStr);
		return $result = $query->result_array();

		}
		
		function getAppliedStatus($id,$user_id,$eo,$service_id,$job_id){
			$qStr = "SELECT
					status as applied_status
				 FROM
					job_status
				 
				
				WHERE
					sp_id = '".$user_id."' && ep_id = '".$eo."' && service_id ='".$service_id."' && job_id = '".$job_id."'
			";
			$query = $this->db->query($qStr);
			if ($query->num_rows() == 1) {
				return 1;
			}else{
				return 0;
			}
			//print_r($query->result_array());die();
		//return $result = $query->row_array();

		}
		function getoffer($id,$user_id,$eo,$service_id,$job_id)
		{
			$qStr = "SELECT
					amount as applied_amount
				 FROM
					user_job
				 
				
				WHERE
					sp_id = '".$user_id."' && eo_id = '".$eo."' && service_id ='".$service_id."' && job_id = '".$job_id."'
			";
			$query = $this->db->query($qStr);
			return $query->row_array()['applied_amount'];
		}

		function getServicesJobDetailData($id){
			$qStr = "SELECT
					user_job.*,service.id as service_id,service.name
				 FROM
					user_job
				 
				LEFT JOIN
				service
				ON
					user_job.service_id = service.id 
				WHERE
					user_job.job_id = '".$id."' && user_job.service_id = service.id
			";
			$query = $this->db->query($qStr);
			//print_r($query->result_array());die();
		return $result = $query->result_array();

		}
		function insertjoboffer($sp_id,$ep_id,$service_id,$job_id,$amount,$reason){
				//print_r($sp_id);die();
		
       $qStr="INSERT into job_status set
				sp_id='".$sp_id."',ep_id='".$ep_id."',job_id='".$job_id."',
				service_id='".$service_id."',amount='".$amount."',sp_affirmation='".addslashes($reason)."',is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
		$qStr2="UPDATE user_job set sp_id='".$sp_id."', amount_offered='".$amount."' WHERE
				eo_id='".$ep_id."'  AND job_id='".$job_id."' AND
				service_id='".$service_id."'";		
		$query2 = $this->db->query($qStr2);		
		return $query = $this->db->query($qStr);
		
		}
		function fetch_data($query)
						 {

						  $this->db->select("*");
						  $this->db->from("job");
						  if($query != '')
						  {
						   $this->db->like('event_title', $query);
						  }
						 
						  return $this->db->get();
						 }
	/* -------- INSERT FUNCTIONS <END> -------- */
}
//
/* End of file Profile_model.php */
/* Location: ./application/models/frontend/Profile_model.php */
?>