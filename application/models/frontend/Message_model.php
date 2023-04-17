<?php
class Message_model extends CI_Model {

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
	

	//01: getTalentPortfolioVideos sender_id = '".$id."' OR

function getSenderType($id='')
{
	 $qStr = "SELECT user.user_type AS user_type FROM 

		  user 

		  WHERE user.id = '".$id."' ";
		  $query = $this->db->query($qStr);
		  return  $query->row_array()['user_type'];
}

	function getAllMessages($id=''){

	
		 $qStr = "


		 SELECT id, sender_id, receiver_id, message, notification, created
			FROM message
			WHERE (receiver_id = '".$id."') AND id IN (
			    SELECT MAX(id)
			    FROM message
			    GROUP BY sender_id
			) ;";

	 	 $query = $this->db->query($qStr);
		 return  $query->result_array();

		
	}

	public function getAllMessages1($id='')
	{
		$qStr = "


		 SELECT id, sender_id, receiver_id, message, notification, created
			FROM message
			WHERE (sender_id = '".$id."') AND id IN (
			    SELECT MAX(id)
			    FROM message
			    GROUP BY sender_id
			) ;";

	 	 $query = $this->db->query($qStr);
		 return  $query->result_array();
	}

	public function delete_message($s_id,$r_id)
	{
		$qStr = "Delete from message where (message.sender_id = '".$s_id."' AND message.receiver_id = '".$r_id."') OR (message.sender_id = '".$r_id."' AND message.receiver_id = '".$s_id."') ";

	 	return $query = $this->db->query($qStr);
	}

	public function get_latest_msg_details($s_id,$r_id)
	{


		$qStr = "SELECT message.* , user.profile_image


		  FROM 

		  message 

		  LEFT JOIN user

		  on user.id = message.sender_id

		  WHERE  message.receiver_id = '".$r_id."' AND message.notification = '1' AND message.sender_id = '".$s_id."' ORDER BY id DESC  LIMIT 1;    ";
		   $query = $this->db->query($qStr);

		   $qStr = "SELECT message.* , user.profile_image


		  FROM 

		  message 

		  LEFT JOIN user

		  on user.id = message.sender_id

		  WHERE  message.receiver_id = '".$r_id."' AND message.notification = '1' AND message.sender_id = '".$s_id."' ORDER BY id DESC  LIMIT 1;    ";
		   $query = $this->db->query($qStr);
		   
		    // $qstr2 = "UPDATE message set notification = '0' WHERE (message.sender_id = '".$s_id."' AND message.receiver_id = '".$r_id."')  OR (message.sender_id = '".$r_id."' AND message.receiver_id = '".$s_id."' ) "; 
		    // $query2 = $this->db->query($qstr2);

		return  $query->row_array();

		// $qStr = "SELECT message.* ,

		// user.profile_image

		// FROM 

		//   message 
		// LEFT JOIN user

		//   on user.id = message.sender_id
		//   WHERE  (message.sender_id = '".$receiver_id."' AND message.receiver_id = '".$sender_id."' AND message.notification = '1') OR (message.sender_id = '".$sender_id."' AND message.receiver_id = '".$receiver_id."' AND message.notification = '1')  ";
		//    $query = $this->db->query($qStr);

		//   $qstr2 = "UPDATE message set notification = '0' WHERE  sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."'"; 
		//     $query2 = $this->db->query($qstr2);
		

		// return  $query->row_array();
	}

	public function update_latest_msg_details($s_id,$r_id)
	{


	
		   
		    $qstr2 = "UPDATE message set notification = '0' WHERE (message.sender_id = '".$s_id."' AND message.receiver_id = '".$r_id."') "; 
		    return $query2 = $this->db->query($qstr2);

		    // if ($query2->num_rows() != 0) {
		    // 	return 1;
		    // }
		// return  $query->result_array();

		// $qStr = "SELECT message.* ,

		// user.profile_image

		// FROM 

		//   message 
		// LEFT JOIN user

		//   on user.id = message.sender_id
		//   WHERE  (message.sender_id = '".$receiver_id."' AND message.receiver_id = '".$sender_id."' AND message.notification = '1') OR (message.sender_id = '".$sender_id."' AND message.receiver_id = '".$receiver_id."' AND message.notification = '1')  ";
		//    $query = $this->db->query($qStr);

		//   $qstr2 = "UPDATE message set notification = '0' WHERE  sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."'"; 
		//     $query2 = $this->db->query($qstr2);
		

		// return  $query->row_array();
	}



	public function send_message($sender_id,$receiver_id, $message, $media ='')
	{
		// print_r($message);
		// exit();
		$qStr = "Insert Into message Set sender_id = '".$sender_id."', receiver_id = '".$receiver_id."', message='".addslashes($message)."', media = '".$media."',created = '".Now()."', is_active = '1', notification ='1' ";

	 	 $query = $this->db->query($qStr);
			}

	public function getMessageDetails($s_id='', $r_id='')
	{

		$qStr = "SELECT message.* , user.profile_image


		  FROM 

		  message 

		  LEFT JOIN user

		  on user.id = message.sender_id

		  WHERE  (message.sender_id = '".$s_id."' AND message.receiver_id = '".$r_id."') OR (message.sender_id = '".$r_id."' AND message.receiver_id = '".$s_id."')";
		   $query = $this->db->query($qStr);
		   

		return  $query->result_array();
	}
	
	public function getSenderImage($id='')
	{
		 $qStr = "SELECT user.profile_image AS image FROM 

		  user 

		  WHERE user.id = '".$id."' ";
		  $query = $this->db->query($qStr);
 		// $items[] = $query->row_array()['name'];

		return  $query->row_array()['image'];
	}
	
	public function getSenderName($id='')
	{
		$qStr = "SELECT user.first_name AS name FROM 

		  user 

		  WHERE user.id = '".$id."' ";
		  $query = $this->db->query($qStr);
 

		return  $query->row_array()['name'];
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
					job.*,user.profile_image,user.first_name,user.last_name
				 FROM
					job
				 
				INNER JOIN
				user
				ON
					job.parent_id = user.id
					WHERE 
						JOB.id = '".$id."' && JOB.parent_id=user.id
			";
			//print_r($qStr);die();
		$query = $this->db->query($qStr);
		return $result = $query->result_array();

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
				service_id='".$service_id."',amount='".$amount."',sp_affirmation='".$reason."',is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
				
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