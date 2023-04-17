<?php
class Transactions_model extends CI_Model {

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

	public function connect_stripe($value='')
	{
		$qStr = "UPDATE
				
				user
				
				SET 

				stripe_connection = '1'

			
				
				WHERE 
				id = '".$value."'
			";

		return $query = $this->db->query($qStr);
		
	}

	public function getPaymentDetails($value='')
	{
		$qStr = "Select
					* FROM				
				payment_package
				
				

			
				
				WHERE 
				u_id = '".$value."' ORDER BY id Desc
			";

	 $query = $this->db->query($qStr);
	 return $result = $query->result_array();
		
	}

	public function getMembershipDetails($id='',$subscription='')
	{
		$qStr = "SELECT
				
				go_pro.*
				
				FROM
				go_pro
				
				WHERE 
				id = '".$subscription."'
			";

		$query = $this->db->query($qStr);
		return $result = $query->row_array();

	}

	public function getMembership($id='',$subscription='')
	{
		$qStr = "SELECT
				
				user.*
				
				FROM
				user
				
				WHERE 
				id = '".$id."'
			";

		$query = $this->db->query($qStr);
		return $result = $query->row_array();

	}

	public function getMembershipStatus()
	{
		$qStr = "SELECT
				
				go_pro.*
				
				FROM
				go_pro
				
				
			";

		$query = $this->db->query($qStr);
		return $result = $query->result_array();
	}

		public function getJobOffers($event_id='', $ep_id='', $service_id='' )
	{
		 $qStr = "SELECT
				job_status.*, user.*, job_status.id as jobid,service.name as service_name
				FROM
				job_status
				LEFT JOIN
				user
				ON
				job_status.sp_id = user.id
				LEFT JOIN
				service
				ON
				job_status.service_id = service.id
				
				WHERE 
				job_status.job_id = '".$event_id."' AND job_status.service_id = '".$service_id."' AND job_status.ep_id = '".$ep_id."' AND job_status.is_active = '1' AND job_status.status = '1'
			";

		$query = $this->db->query($qStr);
		if($query->num_rows()>0)
		{
		return $result = $query->result_array();
		}
	}
	public function getTransactionsEventName($value='')
	{
	 	$qStr = "SELECT
				event_title as e_title
				FROM
				job
				WHERE
				id = '".$value."'  ";
				//die();
				$query = $this->db->query($qStr);
				///print_r($query->result_array());
				return $query->row_array()['e_title'];

	}
	public function getTransactions($user_id){
		 $qStr = "SELECT
				*
				FROM
				user_job
				WHERE
				eo_id = '".$user_id."' AND (job_status = '2' || job_status = '4') ";
				//die();
				$query = $this->db->query($qStr);
				///print_r($query->result_array());
				return $result = $query->result_array();

	}
	public function getSpTransactions($user_id){
		 $qStr = "SELECT
				*
				FROM
				user_job
				WHERE
				sp_id = '".$user_id."' AND job_status = '4' AND payment_status = '1' Order BY id DESC";
				//die();
				$query = $this->db->query($qStr);
				///print_r($query->result_array());
				return $result = $query->result_array();

	}

	public function UpdateStripe($u_id='', $ac_id='', $sk='')
	{
		$qStr = "UPDATE
				
				user
				
				SET 

				stripe_account_id = '".$ac_id."', stripe_sk = '".$sk."'

			
				
				WHERE 
				id = '".$u_id."'
			";

		return $query = $this->db->query($qStr);
	}

	public function getSpTransactionsstatus($ep_id ="", $sp_id ="", $service_id="", $job_id="" )
	{
		 $qStr = "SELECT
					payment_status
				FROM
					user_job
				WHERE
				service_id = '".$service_id."' AND job_id ='".$job_id."' AND sp_id = '".$sp_id."' AND eo_id = '".$ep_id."' AND payment_status = '1'";
				//die();

				$query = $this->db->query($qStr);
				if ($query->num_rows() == 1) {
					return 1;
				}else{
					return 1;
				}
				///print_r($query->result_array());
				// return $result = $query->result_array();
	}

	public function getServiceDetails($user_id,$jobid)
	{
		$qStr = "SELECT
					*
				FROM
					user_job
				WHERE
				id = '".$jobid."' ";
				//die();

				$query = $this->db->query($qStr);
			return $result = $query->result_array();
				
	}

	public function getServiceName($value='')
	{
		$qStr = "SELECT
					name as s_name
				FROM
					service
				WHERE
				id = '".$value."' ";
				//die();

				$query = $this->db->query($qStr);
			return $result = $query->row_array()['s_name'];
	}
	public function getSpTransactionsdetail($user_id,$jobid){
		 // $qStr = "SELECT
			// 	orders.*, service.name as service_name,job.*
			// 	FROM
			// 	orders
			// 	LEFT JOIN
			// 	service
			// 	ON
			// 	orders.service_id = service.id
			// 	 JOIN
			// 	job
			// 	ON
			// 	orders.job_id = job.id				
			// 	WHERE
			// 	service_provider_id = '".$user_id."' AND job_id = '".$jobid."'";
			// 	//die();
			// 	$query = $this->db->query($qStr);
			// //	print_r($query->result_array());die();
			// 	return $result = $query->result_array();


		$qStr = "SELECT
				job.*, job.id as job_id, user_job.*, user_job.amount as j_amount, service.name as service_name, user_job.job_status as st, job.job_status as js
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
				user_job.job_id = '".$jobid."' AND job.is_active = '1' 
			";
		$query = $this->db->query($qStr);
		return $result = $query->result_array();		

	}	
		public function checktransactionsstatus($services,$id){

			$service_array=explode(',', $services);
			//print_r($service_array);die();

			foreach ($service_array as $key => $value) {
				
		  $qStr = "SELECT
				*
				FROM
				orders
				WHERE
				service_id = '".$value."' AND job_id = '".$id."' ";
				
				$query = $this->db->query($qStr);
				//print_r($query->result_array());die();
				if($query->num_rows()>0)
				{
				return 1;
			}
			else{
				return 0;
			}

			}

	}
	
}
//
/* End of file Profile_model.php */
/* Location: ./application/models/frontend/Profile_model.php */
?>