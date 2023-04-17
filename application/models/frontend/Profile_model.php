<?php
class Profile_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	/*------------ Function List <Start>-----------------
	01: isEmailExist
	02: getEmployerBookmarks
	03: checkEmployerProfile
	04: checkTalentProfile
	05: checkTalentPortfolio
	06: getCategoryById
	07: getCategoryFieldIds
	08: getCategoryFieldNames
	09: getEmployerJobs
	10: getTalentJobs
	11: getEmployerJobById
	12: getEmployerJobTalent
	13: getEmployerJobReviews
	14: getTalentJobById
	15: getReview
	16: getCategoryFields
	17: getCategoryFieldOptions
	18: getCategories
	19: getAllCategories
	20: getSubCategories
	21: getFieldCategoriesID
	22: getPricePackages
	23: getTalentActivePayments
	24: isCouponCodeExist
	25: getCouponById
	26: getCouponReserveCountById
	27: isTransIdExist
	28: getTalentTransactions
	29: getUnAvailabilityByTalentId
	30: getSampleVideos
	31: getPortfolioUploadLimit
	32: getPortfolioUploadLimit
	33: getLastFileAdded
	34: checkUserBannerImages
	35: checkUserFeaturedVideo
	36: getVideoYoutubeId
	37: updateEmployerPayment
	38: update
	39: updateTalentPublicProfileAjax
	40: updateTalentUnavailabilityRemovalRequest
	41: updatePassword
	42: changeUserStatus
	43: updateEmployerBookmarkStatus
	44: updateTalentJobStatus
	45: changeVideoStatus
	46: changeVideoThumbnail
	47: changePortfolioMediaStatus
	48: changePortfolioFeaturedStatus
	49: writeReview
	50: addTalentQuery
	51: addTalentPayment
	52: addScheduleEntry
	53: uploadPortfolioImage
	54: uploadPortfolioVideo
	55: deleteScheduleEntry
	------------ Function List <End>-----------------*/
	/* -------- GET FUNCTIONS <START> -------- */
	//01: isEmailExist
	function isEmailExist($email,$user_id){
        $qStr = "SELECT
					*
				 FROM
					user
				 WHERE
					email = '".$email."' AND id != '".$user_id."' AND is_active != ".DELETED_STATUS_ID;

        $query = $this->db->query($qStr);
		$result = $query->row_array();
		if(!empty($result)){
			return $result['id'];
		}else{
			return 0;
		}
	}
	
	//02: getEmployerBookmarks
	function getEmployerBookmarks($employer_id){
        $qStr = "SELECT
					bookmarked_talent.*,users.first_name, users.last_name,users.talent_category_id,talent_categories.title,talent_categories.parent_id
				 FROM
					bookmarked_talent
				 LEFT JOIN
					users
				 ON
					bookmarked_talent.talent_id = users.id
				 LEFT JOIN
					talent_categories
				 ON
					users.talent_category_id = talent_categories.id
				 WHERE
					bookmarked_talent.employer_id = '".$employer_id."' AND bookmarked_talent.is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
		$result = $query->result_array();
		return $result;
	}
	
	//03: checkEmployerProfile
	function checkEmployerProfile($id) {
        $qStr = "SELECT
					users.*
				 FROM
					users
				 WHERE
					users.id = '".$id."'";

        $query = $this->db->query($qStr);
        $result = $query->row_array();    
		if(empty($result['gender']) || empty($result['phone']) || empty($result['title'])){
			return 0;
		}else{
			return 1;
		}
    }
	
	//04: checkTalentProfile
	function checkTalentProfile($id,$query_condition) {
        $qStr = "SELECT
					users.*
				 FROM
					users
				 WHERE
					users.id = '".$id."' AND gender!=0 AND phone!='' AND title!=0".$query_condition;
        $query = $this->db->query($qStr);
        $result = $query->row_array();  
		
		if(empty($result)){
			return 0;
		}else{
			return 1;
		}
    }
	
	//05: checkTalentPortfolio
	function checkTalentPortfolio($user_id) {
		$qStr = "SELECT 
					talent_portfolio_media.*
				 FROM
					talent_portfolio_media
				 WHERE 
					talent_portfolio_media.user_id = '".$user_id."' AND talent_portfolio_media.status != ".REJECTED_VIDEO_STATUS_ID." AND talent_portfolio_media.is_active = ".ACTIVE_STATUS_ID."";
		$query = $this->db->query($qStr);
		$result = $query->result_array();
		
		if(empty($result)){
			return 0;
		}else{
			return 1;
		}
    }
	
	//06: getCategoryById
	function getCategoryById($cat_id){
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." and id = ".$cat_id."";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	
	//07: getCategoryFieldIds
	function getCategoryFieldIds($category_id){
		$qStr2 = "SELECT
					talent_categories.field_ids
				 FROM
					talent_categories
				 WHERE
					talent_categories.id = '".$category_id."'";

        $query2 = $this->db->query($qStr2);
        return $result2 = $query2->row_array();
	}
	
	//08: getCategoryFieldNames
	function getCategoryFieldNames($field_ids){
		$field_condition = ((!empty($field_ids))?" AND categories_fields.id IN (".$field_ids.")":"");
		$qStr2 = "SELECT
					categories_fields.name,categories_fields.title
				 FROM
					categories_fields
				 WHERE
					categories_fields.is_active IN (".ACTIVE_STATUS_ID.")".$field_condition."";
	    $query2 = $this->db->query($qStr2);
        return $result2 = $query2->result_array();
	}
	
	//09: getEmployerJobs
	function getEmployerJobs($user_id){
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
	
	//10: getTalentJobs
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
	
	//11: getEmployerJobById
	function getEmployerJobById($job_id){
		$qStr = "SELECT jobs.*,talent_categories.title as talent_category,talent_categories.parent_id,users.first_name as user_name
				 FROM
					jobs
				 LEFT JOIN
					users
				 ON	
					jobs.employer_id = users.id
				 LEFT JOIN
					talent_categories
				 ON
					jobs.talent_category_id = talent_categories.id
				 WHERE 
				 jobs.is_active !=".DELETED_STATUS_ID." and jobs.id = ".$job_id."";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	
	//12: getEmployerJobTalent
	function getEmployerJobTalent($job_id){
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
	
	//13: getEmployerJobReviews
	function getEmployerJobReviews($job_id){
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
	
	//14: getTalentJobById
	function getTalentJobById($job_id,$talent_id){
		$qStr = "SELECT jobs.*,talent_categories.title as talent_category,users.first_name as user_first_name,users.last_name as user_last_name,talent_job_details.payment_amount as talent_payment_amount,
				talent_job_details.id as talent_detail_id,talent_job_details.payment_status as talent_payment_status,talent_job_details.talent_status, talent_job_details.talent_comments,
				talent_job_details.is_approved as talent_is_approved
				 FROM
					jobs
				 LEFT JOIN
					users
				 ON	
					jobs.employer_id = users.id
				 LEFT JOIN
					talent_categories
				 ON
					jobs.talent_category_id = talent_categories.id
				 LEFT JOIN
					talent_job_details
				 ON 
					jobs.id = talent_job_details.job_id AND talent_job_details.talent_id = ".$talent_id."
				 WHERE 
				 jobs.is_active !=".DELETED_STATUS_ID." and jobs.id = ".$job_id."";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	
	//15: getReview
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
	
	//16: getCategoryFields
	function getCategoryFields(){
		$qStr = "SELECT categories_fields.*
				 FROM
					categories_fields
				 WHERE 
				categories_fields.is_active = ".ACTIVE_STATUS_ID."";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//17: getCategoryFieldOptions
	function getCategoryFieldOptions($cat_id){
		$qStr = "SELECT category_field_options.*
				 FROM
					category_field_options
				 WHERE 
				category_field_options.is_active = ".ACTIVE_STATUS_ID." AND category_field_options.	category_field_id=".$cat_id;
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//18: getCategories
	function getCategories(){
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active =".ACTIVE_STATUS_ID." AND parent_id=".INACTIVE_STATUS_ID."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        $categories = $query->result_array();
		foreach($categories as $index=>$category){
			$categories[$index]['sub_cats'] = $this->getSubCategories($category['id']);
		}
		return $categories;
	}
	
	//19: getAllCategories
	function getAllCategories(){
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active =".ACTIVE_STATUS_ID."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();		
	}
	
	//20: getSubCategories
	function getSubCategories($parent_id){
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active =".ACTIVE_STATUS_ID." AND parent_id=".$parent_id."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//21: getFieldCategoriesID
	function getFieldCategoriesID($field_id){
		$condition = "";
		$qStr = "SELECT 
					id
				 FROM
					talent_categories
				 WHERE 
					is_active != '".DELETED_STATUS_ID."' AND find_in_set('".$field_id."',field_ids) <> 0";
		$query = $this->db->query($qStr);  
		$results = $query->result_array();
		$final_result = "";
		foreach($results as $index=>$result){
			$final_result[$index] = $result['id'];
		}
		return $final_result;
	}
	
	//22: getPricePackages
	function getPricePackages($id=""){
		$cond = (!empty($id))?" AND id = ".$id."":"";
		$qStr = "SELECT *
					FROM
				 payment_packages
				 WHERE 
				 is_active !=".DELETED_STATUS_ID.$cond."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//23: getTalentActivePayments	
	function getTalentActivePayments($user_id){
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
					talent_company_payments.user_id = '".$user_id."' AND talent_company_payments.is_active = ".ACTIVE_STATUS_ID;
		
		$query = $this->db->query($qStr);
		return $query->result_array();		
	}
	
	//24: isCouponCodeExist
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
	
	//25: getCouponById
	function getCouponById($coupon_id){
		$qStr = "SELECT *
					FROM
				 coupon_codes
				 WHERE 
				 coupon_codes.is_active !=".DELETED_STATUS_ID." and id=".$coupon_id;
		$query = $this->db->query($qStr);
		
        return $query->row_array();
	}
	
	//26: getCouponReserveCountById
	function getCouponReserveCountById($coupon_id){
		$qStr = "SELECT count(id) as total_count
					FROM
				 talent_company_payments
				 WHERE 
				 talent_company_payments.is_approved !=".REJECTED_PAYMENT_STATUS_ID." and talent_company_payments.is_active =".ACTIVE_STATUS_ID." and talent_company_payments.coupon_id=".$coupon_id;
		$query = $this->db->query($qStr);
		$result = $query->row_array();
        return $result['total_count'];
	}
	
	//27: isTransIdExist
	function isTransIdExist($trans_id){
		$qStr = "SELECT id
					FROM
				 talent_company_payments
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." and is_approved !=".REJECTED_PAYMENT_STATUS_ID." and transaction_id = '".$trans_id."'";
		$query = $this->db->query($qStr);
		
        return $query->row_array();
	}
	
	//28: getTalentTransactions
	function getTalentTransactions($type,$user_id){
		$and = (!empty($type))? ' AND talent_company_payments.type = '.$type :'';
		$and .= (!empty($user_id))? ' AND talent_company_payments.user_id = '.$user_id :'';
		$qStr = "SELECT 
					talent_company_payments.*,payment_packages.amount as package_amount,payment_packages.month_frequency,coupon_codes.id as coupon_id,coupon_codes.code as coupon_code,
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
	
	//29: getUnAvailabilityByTalentId
	function getUnAvailabilityByTalentId($user_id){
		$qStr ="SELECT * FROM
					talent_unavailability
				WHERE
					user_id = ".$user_id;
		$query = $this->db->query($qStr);
		$result = $query->result_array();
		return $result;
	}
	
	//30: getSampleVideos
	function getSampleVideos(){
		$qStr ="SELECT * FROM
					categories_sample_videos
				WHERE
					is_active = ".ACTIVE_STATUS_ID;
		$query = $this->db->query($qStr);
		$result = $query->result_array();
		return $result;
	}
	
	//31: getPortfolioUploadLimit
	function getPortfolioUploadLimit(){
		$qStr ="SELECT * FROM
					settings
				WHERE 1";
		$query = $this->db->query($qStr);
		$result = $query->row_array();
		return $result['image_upload_limit'];
	}
	
	//32: getPortfolioUploadLimit
	function getPortfolioImageCount($user_id){
		$qStr = "SELECT
					*
				 FROM
					talent_portfolio_media
				 WHERE
					user_id = '".$user_id."' AND is_active = '".ACTIVE_STATUS_ID."' AND media_type = ".MEDIA_IMAGE;

        $query = $this->db->query($qStr);
		$result = $query->result_array();
		return count($result);
	}
	
	//33: getLastFileAdded
	function getLastFileAdded($id){
		$qStr = "SELECT 
					talent_portfolio_media.*
				 FROM
					talent_portfolio_media
				 WHERE 
					talent_portfolio_media.id = ".$id." AND talent_portfolio_media.is_active != ".DELETED_STATUS_ID;
		//echo $qStr; die();
		$query = $this->db->query($qStr);  
		$result = $query->row_array();
		//pr($result); die();
		return $result;		
	}
	
	//34: checkUserBannerImages
	function checkUserBannerImages($user_id){
	$qStr = "SELECT 
					talent_portfolio_media.*
				 FROM
					talent_portfolio_media
				 WHERE 
					user_id = ".$user_id." AND is_banner = ".ACTIVE_STATUS_ID." AND media_type = ".MEDIA_IMAGE." AND is_active = ".ACTIVE_STATUS_ID;
		//echo $qStr; die();
		$query = $this->db->query($qStr);  
		$result = $query->result_array();
		//pr($result); die();
		return $result;		
	}
	
	//35: checkUserFeaturedVideo
	function checkUserFeaturedVideo($user_id){
		$qStr = "SELECT
					*
				 FROM
					talent_portfolio_media
				 WHERE
					user_id = '".$user_id."' AND is_banner = '".ACTIVE_STATUS_ID."' AND is_active = '".ACTIVE_STATUS_ID."' AND media_type = ".MEDIA_VIDEO." AND youtube_status IN (".PUBLIC_YOUTUBE_STATUS_ID.") AND status=".APPROVED_VIDEO_STATUS_ID;

        $query = $this->db->query($qStr);
		return $result = $query->result_array();
	}
	
	//36: getVideoYoutubeId
	function getVideoYoutubeId($id){
		$qStr = "SELECT
					url
				 FROM
					talent_portfolio_media
				 WHERE
					id=".$id;

        $query = $this->db->query($qStr);
		$result = $query->row_array();
		return $result['url'];
	}
	/* -------- GET FUNCTIONS <END> -------- */
	
	
	
	/* -------- UPDATE FUNCTIONS <START> -------- */
	//37: updateEmployerPayment
	function updateEmployerPayment($job_id,$trans_id,$payment_type){
		$qStr = "UPDATE 
					jobs
					SET
				`transaction_id` = '".$trans_id."',`transaction_type` = '".$payment_type."',`payment_status` = '".PENDING_PAYMENT_STATUS_ID."',`modified` = '".time()."'
				 WHERE 
					`id` = '".$job_id."'";
		return $query = $this->db->query($qStr);
	}
	
	//38: update
	function update($institute, $designation,$user_id,$business_name,$first_name,$last_name,$province,$city,$country,$phone,$services,$address,$about,$file_name,$about_me,$pwd){
	
		
		$qStr = "UPDATE 
					user
					SET
				`first_name` = '".addslashes($first_name)."',`last_name` = '".addslashes($last_name)."', 
				`country_id` = '".$country."',`city` = '".addslashes($city)."', state = '".addslashes($province)."', services ='".$services."', business_about = '".addslashes($about)."', 
				`phone` = '".$phone."',`address` = '".$address."',`profile_image` = '".$file_name."',`modified` = '".time()."', `institute` = '".$institute."', `designation` = '".$designation."',
				`about`='".addslashes($about_me)."', `password`='".addslashes($pwd)."'
				 WHERE 
					`id` = '".$user_id."'";
		return $query = $this->db->query($qStr);
	}
	
	//39: updateTalentPublicProfileAjax
	function updateTalentPublicProfileAjax($user_id,$fields){
		$qStr = 'Update users set';
		foreach($fields as $index=>$field){
			$qStr .= ' '.$index.'="'.$field.'",';
		}
		$qStr .= ' modified='.time().' where id='.$user_id;
		return $query = $this->db->query($qStr);
	}
	
	//40: updateTalentUnavailabilityRemovalRequest
	function updateTalentUnavailabilityRemovalRequest($id,$status){
		$qStr = "UPDATE 
					talent_unavailability
					SET
				`removal_requested` = '".$status."', `modified` = '".time()."'
				 WHERE 
					talent_job_detail_id = '".$id."'";
		return $query = $this->db->query($qStr);
	}
	
	//41: updatePassword
	function updatePassword($user_id,$new_password){
		$qStr = "UPDATE 
					user
					SET
				`password` = '".$new_password."', `modified` = '".time()."'
				 WHERE 
					id = '".$user_id."'";
		return $query = $this->db->query($qStr);
	}
	
	//42: changeUserStatus
	function changeUserStatus($user_id,$status){
		$qStr ="UPDATE
						user
					SET
						is_active = ".$status.", modified = ".time()."
					WHERE
						id=".$user_id;
        return $query = $this->db->query($qStr);		
	}
	
	//43: updateEmployerBookmarkStatus
	function updateEmployerBookmarkStatus($bookmark_id,$status){
		$qStr ="UPDATE bookmarked_talent
					SET
					is_active = '".$status."', modified='".time()."'
					WHERE	
					id=".$bookmark_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//44: updateTalentJobStatus
	function updateTalentJobStatus($id,$talent_comments,$status){
		$qStr ="UPDATE
						talent_job_details
					SET
						talent_status = ".$status.", talent_comments = '".$talent_comments."', modified = ".time()."
					WHERE
						id=".$id;
        return $query = $this->db->query($qStr);		
	}
	
	//45: changeVideoStatus
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
	
	//46: changeVideoThumbnail
	function changeVideoThumbnail($id,$thumbnail) {
		$qStr = "UPDATE 
					talent_portfolio_media
				 SET
					thumbnail = '".$thumbnail."', modified = ".time()."
				 WHERE 
					id = '".$id."'";
		return $query = $this->db->query($qStr);

	}
	
	//47: changePortfolioMediaStatus
	function changePortfolioMediaStatus($portfolio_id,$status){
		$qStr ="UPDATE
						talent_portfolio_media
					SET
						is_active = ".$status.", modified = ".time()."
					WHERE
						id=".$portfolio_id;
        return $query = $this->db->query($qStr);		
	}
	
	//48: changePortfolioFeaturedStatus
	function changePortfolioFeaturedStatus($portfolio_id,$status){
		$qStr ="UPDATE
						talent_portfolio_media
					SET
						is_banner = ".$status.", modified = ".time()."
					WHERE
						id=".$portfolio_id;
        return $query = $this->db->query($qStr);	
	}
	/* -------- UPDATE FUNCTIONS <END> -------- */
	/* -------- INSERT FUNCTIONS <START> -------- */
	//49: writeReview
	function writeReview($review_id,$review,$rating,$talent_id,$employer_id,$job_id,$role){
		if($review_id==0){
			$qStr="INSERT into reviews set
				employer_id='".$employer_id."',	talent_id='".$talent_id."',	job_id='".$job_id."',
				rating='".$rating."',review='".$review."',reviewer_role='".$role."',is_active='".INACTIVE_STATUS_ID."',created='".time()."'";
		}else{
			$qStr = "UPDATE 
					reviews
					SET
				`rating` = '".$rating."',`review` = '".$review."',`is_active` = '".INACTIVE_STATUS_ID."',`modified` = '".time()."'
				 WHERE 
					`id` = '".$review_id."'";
		}
		return $query = $this->db->query($qStr);
		
		
	}
	
	//50: addTalentQuery
	function addTalentQuery($user_id,$subject,$description){
		$qStr="INSERT into contact_us set
				user_id='".$user_id."',subject='".$subject."',
				type='".TALENT."',enquiry='".$description."',is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
		return $query = $this->db->query($qStr);
	}
	
	//51: addTalentPayment
	function addTalentPayment($payment_package_id,$payment_type,$trans_id,$coupon_id,$amount,$user_id){
		$qStr="INSERT into talent_company_payments set
				user_id='".$user_id."',	payment_package_id='".$payment_package_id."',
				type='".$payment_type."',transaction_id='".$trans_id."',coupon_id='".$coupon_id."',amount='".$amount."',
				is_active='".ACTIVE_STATUS_ID."',is_approved='".INACTIVE_STATUS_ID."',created='".time()."'";
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	
	//52: addScheduleEntry
	function addScheduleEntry($user_id,$date){
		$qStr="INSERT into talent_unavailability set
				user_id='".$user_id."',	timestamp='".$date."',
				is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	
	
	
	//53: uploadPortfolioImage
	function uploadPortfolioImage($user_id,$file_name,$fileType){
		$qStr="INSERT into talent_portfolio_media set
				user_id='".$user_id."',	url='".$file_name."',
				media_type='".$fileType."',thumbnail='".$file_name."',
				is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	
	//54: uploadPortfolioVideo
	function uploadPortfolioVideo($user_id,$video_id,$thumbnail,$file_name,$fileType){
		$qStr="INSERT into talent_portfolio_media set
				user_id='".$user_id."',	url='".$video_id."', title='".$file_name."',
				media_type='".$fileType."',thumbnail='".$thumbnail."',
				is_active='".ACTIVE_STATUS_ID."',created='".time()."'";
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	/* -------- INSERT FUNCTIONS <END> -------- */
	/* -------- DELETE FUNCTIONS <START> -------- */
	//55: deleteScheduleEntry
	function deleteScheduleEntry($user_id,$date){
		$qStr = "DELETE FROM talent_unavailability WHERE user_id='".$user_id."' and timestamp='".$date."'";
		return $query = $this->db->query($qStr);
	}
	
	/* -------- DELETE FUNCTIONS <END> -------- */
}
/* End of file Profile_model.php */
/* Location: ./application/models/frontend/Profile_model.php */
?>