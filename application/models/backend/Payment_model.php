<?php
class Payment_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//02: getCategories
	//03: getPricePackageById
	//04: isPricePackageExist
	//05: getCouponCodes
	//06: getCouponStatusDetails
	//07: getCouponById
	//08: isCouponCodeExist
	//09: getMaxExpiryDate
	//10: getTalentTransactions
	//11: getTransactionByID
	//12: updatePricePackageStatus
	//13: updatePricePackage
	//14: updateCouponCode
	//15: updateCouponCodeStatus
	//16: deleteTransaction
	//18: changeTalentPaymentStatus	
	//19: changeTalentCouponStatus	
	//20: addPricePackage
	
	
	
	//--- Get Functions ---
	//01: getTalentLatestPayments	
	function getTalentLatestPayments($user_id){
		$qStr = "SELECT 
					talent_company_payments.*,payment_packages.month_frequency,coupon_codes.id as coupon_id,coupon_codes.code as coupon_code,
					coupon_codes.discount_type as discount_type,coupon_codes.value as discount_value,coupon_codes.use_status
				 FROM
					talent_company_payments
				 JOIN
					payment_packages
				 ON
					talent_company_payments.payment_package_id = payment_packages.id
				 LEFT JOIN
					coupon_codes
				 ON
					talent_company_payments.coupon_id = coupon_codes.id
				 WHERE 
					talent_company_payments.user_id = '".$user_id."' AND talent_company_payments.is_approved != ".APPROVED_PAYMENT_STATUS_ID." AND talent_company_payments.is_active = ".ACTIVE_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->result_array();		
	}
	
	//02: getCategories
	function getPricePackages(){
		$qStr = "SELECT *
					FROM
				 payment_packages
				 WHERE 
				 is_active !=".DELETED_STATUS_ID."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	//03: getPricePackageById
	function getPricePackageById($pack_id){
		$qStr = "SELECT *
					FROM
				 payment_packages
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." and id = ".$pack_id."";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	//04: isPricePackageExist
	function isPricePackageExist($pack_name,$month_frequency,$amount,$pack_id=""){
		$where = ($pack_id!="")?" and id!=".$pack_id:"";
		$qStr = "SELECT *
					FROM
				 payment_packages
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." and amount = '".$amount."' and month_frequency = '".$month_frequency."'".$where;
		$query = $this->db->query($qStr);
		
        return $query->row_array();
	}
	
	//05: getCouponCodes
	function getCouponCodes(){
		$qStr = "SELECT *
					FROM
				 coupon_codes 
				 WHERE 
				 is_active !=".DELETED_STATUS_ID."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//06: getCouponStatusDetails
	function getCouponStatusDetails($coupon_id){
		$qStr = "SELECT talent_company_payments.*,users.first_name as user_name
					FROM
				 talent_company_payments
				JOIN 
				 users
				ON
				talent_company_payments.user_id = users.id
				 WHERE 
				 talent_company_payments.is_active !=".DELETED_STATUS_ID." and coupon_id=".$coupon_id;
		$query = $this->db->query($qStr);
		
        return $query->result_array();
	}
	
	//07: getCouponById
	function getCouponById($coupon_id){
		$qStr = "SELECT *
					FROM
				 coupon_codes
				 WHERE 
				 coupon_codes.is_active !=".DELETED_STATUS_ID." and id=".$coupon_id;
		$query = $this->db->query($qStr);
		
        return $query->row_array();
	}
	
	//08: isCouponCodeExist
	function isCouponCodeExist($discount_code,$coupon_id=""){
		$where = ($coupon_id!="")?" and id!=".$coupon_id:"";
		$qStr = "SELECT *
					FROM
				 coupon_codes
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." and code = '".$discount_code."'".$where;
		$query = $this->db->query($qStr);
		
        return $query->row_array();
	}
	
	//09: getMaxExpiryDate
	function getMaxExpiryDate($user_id=""){
		$where = ($user_id!="")?" and user_id=".$user_id:"";
		$qStr = "SELECT max(expiry_date) as max_expiry_date
					FROM
				 talent_company_payments
				 WHERE 
				 is_active =".ACTIVE_STATUS_ID." and is_approved != '".REJECTED_PAYMENT_STATUS_ID."'".$where;
		$query = $this->db->query($qStr);
		
       $result = $query->row_array();
	   return $result['max_expiry_date'];
	}
	
	//10: getTalentTransactions
	function getTalentTransactions($type,$user_id){
		$and = (!empty($type))? ' AND talent_company_payments.type = '.$type :'';
		$and .= (!empty($user_id))? ' AND talent_company_payments.user_id = '.$user_id :'';
		$qStr = "SELECT 
					talent_company_payments.*,payment_packages.month_frequency,coupon_codes.id as coupon_id,coupon_codes.code as coupon_code,
					coupon_codes.discount_type as discount_type,coupon_codes.value as discount_value,coupon_codes.use_status,users.first_name as talent_name
				 FROM
					talent_company_payments
				 JOIN
					users
				 ON
					talent_company_payments.user_id = users.id
				 JOIN
					payment_packages
				 ON
					talent_company_payments.payment_package_id = payment_packages.id
				 LEFT JOIN
					coupon_codes
				 ON
					talent_company_payments.coupon_id = coupon_codes.id
				 WHERE 
					talent_company_payments.is_active!=".DELETED_STATUS_ID.$and;
		//echo $qStr; die();
		$query = $this->db->query($qStr);
		return $query->result_array();		
	}
	
	//11: getTransactionByID
	function getTransactionByID($id){
		$qStr = "SELECT 
					talent_company_payments.*,payment_packages.month_frequency,payment_packages.amount as package_amount,coupon_codes.id as coupon_id,coupon_codes.code as coupon_code,
					coupon_codes.discount_type as discount_type,coupon_codes.value as discount_value,coupon_codes.use_status,users.first_name as talent_name
				 FROM
					talent_company_payments
				 JOIN
					users
				 ON
					talent_company_payments.user_id = users.id
				 JOIN
					payment_packages
				 ON
					talent_company_payments.payment_package_id = payment_packages.id
				 LEFT JOIN
					coupon_codes
				 ON
					talent_company_payments.coupon_id = coupon_codes.id
				 WHERE 
					talent_company_payments.is_active!=".DELETED_STATUS_ID." AND talent_company_payments.id=".$id;
		//echo $qStr; die();
		$query = $this->db->query($qStr);
		return $query->row_array();		
	}
	//--- Get Functions ---
	
	//--- Update Functions ---
	//12: updatePricePackageStatus
	function updatePricePackageStatus($pack_id,$status){
		$qStr ="UPDATE payment_packages
					SET
					is_active = '".$status."', modified='".time()."'
					WHERE	
					id=".$pack_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//13: updatePricePackage
	function updatePricePackage($pack_id,$name,$amount,$month_frequency,$description){
		$qStr ="UPDATE payment_packages
					SET
					name = '".$name."',description = '".$description."',amount = '".$amount."',month_frequency = '".$month_frequency."', modified='".time()."'
					WHERE	
					id=".$pack_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	
	//14: updateCouponCode
	function updateCouponCode($coupon_id,$discount_code,$startDate,$endDate,$discount_type,$discount_value,$reedeem_type,$reedeem_cycle){
		$qStr ="UPDATE coupon_codes
					SET
					use_status = '".PENDING_COUPON_STATUS_ID."',code = '".$discount_code."',start_date = '".$startDate."',end_date = '".$endDate."',discount_type = '".$discount_type."',value = '".$discount_value."',avail_type = '".$reedeem_type."',use_cycle = '".$reedeem_cycle."',is_active = '".ACTIVE_STATUS_ID."', modified = '".time()."'
					WHERE	
					id=".$coupon_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//15: updateCouponCodeStatus
	function updateCouponCodeStatus($coupon_id,$status){
		$qStr ="UPDATE coupon_codes
					SET
					is_active = '".$status."', modified='".time()."'
					WHERE	
					id=".$coupon_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	//16: deleteTransaction
	function deleteTransaction($id,$status){
		$qStr ="UPDATE talent_company_payments
					SET
					is_active = '".$status."', modified='".time()."'
					WHERE	
					id=".$id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//17: changeTalentSubscriptionExpiry
	function changeTalentSubscriptionExpiry($user_id,$expiry_date){
		$qStr ="UPDATE users
					SET
					subscription_expiry = '".$expiry_date."', modified='".time()."'
					WHERE	
					id=".$user_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	//18: changeTalentPaymentStatus	
	function changeTalentPaymentStatus($transaction_id,$status,$reason,$expiry_date){
		$status_condition = ($status==REJECTED_PAYMENT_STATUS_ID?", is_active = '".INACTIVE_STATUS_ID."'":'');
		$expiry_condition = ($status==APPROVED_PAYMENT_STATUS_ID?", expiry_date = '".$expiry_date."'":'');
		$where = ($reason!=""?", reason_for_rejection = '".$reason."'":'');
		$qStr = "UPDATE 
					talent_company_payments
				 SET
					is_approved = '".$status."', modified = ".time().$where.$status_condition.$expiry_condition."
				 WHERE 
					id = '".$transaction_id."'";
		return $query = $this->db->query($qStr);	
	}
	//19: changeTalentCouponStatus	
	function changeTalentCouponStatus($coupon_id,$status,$is_active_status){
		$status_condition = ($is_active_status!=''?", is_active = '".INACTIVE_STATUS_ID."'":'');
		$qStr = "UPDATE 
					coupon_codes
				 SET
					avail_count = (avail_count+1), use_status = '".$status."', modified = ".time().$status_condition."
				 WHERE 
					id = '".$coupon_id."'";
		return $query = $this->db->query($qStr);	
	}
	//--- Update Functions ---
	
	//--- Insert Functions ---
	//20: addPricePackage
	function addPricePackage($name,$amount,$month_frequency,$description){
		$qStr = "INSERT INTO 
						payment_packages
					 SET
						name = '".$name."',description = '".$description."',month_frequency = '".$month_frequency."',amount = '".$amount."',is_active = '".ACTIVE_STATUS_ID."', created = ".time();
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	
	//21: addCouponCode
	function addCouponCode($discount_code,$startDate,$endDate,$discount_type,$discount_value,$reedeem_type,$reedeem_cycle){
		$qStr = "INSERT INTO 
						coupon_codes
					 SET
						use_status = '".PENDING_COUPON_STATUS_ID."',code = '".$discount_code."',start_date = '".$startDate."',end_date = '".$endDate."',discount_type = '".$discount_type."',value = '".$discount_value."',avail_type = '".$reedeem_type."',use_cycle = '".$reedeem_cycle."',is_active = '".ACTIVE_STATUS_ID."', created = ".time();
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	//--- Insert Functions ---
	
}
/* End of file Payment_model.php */
/* Location: ./application/models/backend/Payment_model.php */
?>