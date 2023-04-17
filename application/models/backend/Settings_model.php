<?php
class Settings_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: getFiles
	//02: getContactMessages
	//03: getPageData
	//04: getFaqPageHeading
	//05: getFaqPageContent
	//06: getFaqPageContent
	//07: getAdApprovalChecklist
	//08: getAdApprovalChecklistById
	//09: getLastFileAdded
	//10: addPageHeading
	//11: addFaqs
	//12: uploadFiles
	//13: updatePageContent
	//14: changePageHeadingStatus
	//15: changeFaqStatus
	//16: changeSettings
	//17: changeFileStatus
	
	/* -------- GET FUNCTIONS <START> -------- */
	//01: getFiles
	function getFiles() {
		$qStr = "SELECT 
					categories_sample_videos.*
				 FROM
					categories_sample_videos
				 WHERE 
					categories_sample_videos.is_active != ".DELETED_STATUS_ID."
				 ORDER BY
					id ASC";
		//echo $qStr; die();
		$query = $this->db->query($qStr);  
		$result = $query->result_array();
		//pr($result); die();
		return $result;
	}
	
	//02: getContactMessages
	function getContactMessages($type){
		$and = ($type != 0)? ' AND type = '.$type :'';
		$qStr = "SELECT *
					FROM
				 contact_us
				 WHERE 
				 is_active =".ACTIVE_STATUS_ID. $and."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	//03: getPageData
	function getPageData($page_id,$page_type) { 
        $qStr = "SELECT 
					#PAGES
					id, page_name, content
				 FROM
					pages 
				 WHERE
					page_id = ".$page_id." AND page_type = ".$page_type." AND
					is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
    }
	
	//04: getFaqPageHeading
	function getFaqPageHeading($page_id) { 
        $qStr = "SELECT 
					*
				 FROM
					faq_headings 
				 WHERE
					page_id = ".$page_id." AND
					is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        return $result;
    }
	
	//05: getFaqPageContent
	function getFaqPageContent($page_id) { 
        $qStr = "SELECT
					faqs.*,faq_headings.heading,faq_headings.page_id
				 FROM
					faqs
				 INNER JOIN
					faq_headings
					ON
					faq_headings.id = faqs.faq_heading_id
				 WHERE
					faq_headings.page_id = ".$page_id." AND				 
					faqs.is_active != ".DELETED_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        return $result;
    }
	
	//06: getFaqPageContent
	function getImageUploadLimit(){
		$qStr = "SELECT
					image_upload_limit
				 FROM
				 settings
				 WHERE 
				 1";
		$query = $this->db->query($qStr);
        $result = $query->row_array();
		return  $result['image_upload_limit'];
	}
	
	//07: getAdApprovalChecklist
	function getAdApprovalChecklist(){
		$qStr = "SELECT
					*
				 FROM
				 ad_approval_checklist
				 WHERE 
				 1";
		$query = $this->db->query($qStr);
        return $result = $query->result_array();
	}
	
	//08: getAdApprovalChecklistById
	function getAdApprovalChecklistById($id){
		$qStr = "SELECT
					*
				 FROM
				 ad_approval_checklist
				 WHERE 
				 id=".$id;
		$query = $this->db->query($qStr);
        return $result = $query->row_array();
	}
	
	//09: getLastFileAdded
	function getLastFileAdded($id){
		$qStr = "SELECT 
					categories_sample_videos.*
				 FROM
					categories_sample_videos
				 WHERE 
					categories_sample_videos.id = ".$id." AND categories_sample_videos.is_active != ".DELETED_STATUS_ID;
		//echo $qStr; die();
		$query = $this->db->query($qStr);  
		$result = $query->row_array();
		//pr($result); die();
		return $result;		
	}
	/* -------- GET FUNCTIONS <END> -------- */
	
	/* -------- INSERT FUNCTIONS <START> -------- */
	//10: addPageHeading
	function addPageHeading($page_id,$page_heading) {
        $qStr = "INSERT INTO faq_headings 
					SET
				 page_id = ".$page_id.",is_active = ".ACTIVE_STATUS_ID.", heading = '".addslashes($page_heading)."', created = ".time()."";
        $query = $this->db->query($qStr);
        return $query;				
	}
	
	//11: addFaqs
	function addFaqs($faq_heading_id,$page_question,$page_answer) {
        $qStr = "INSERT INTO faqs 
					SET
				 faq_heading_id = ".$faq_heading_id.", question = '".addslashes($page_question)."', answer = '".addslashes($page_answer)."',is_active = ".ACTIVE_STATUS_ID.",
				 created = ".time()."";
        $query = $this->db->query($qStr);
        return $query;				
	}
	
	//12: uploadFiles
	function uploadFiles($user_id,$fileName,$fileSize,$fileType){
		$time = time();
		$qStr = "INSERT INTO 
					categories_sample_videos
				 SET
					admin_id = '".$user_id."',url = '".$fileName."',size = '".$fileSize."',media_type = '".$fileType."',
					is_active = '".ACTIVE_STATUS_ID."', created = ".$time;
		$query = $this->db->query($qStr);
		$file_id = $this->db->insert_id();
		return $file_id;
	}
	/* -------- ADD FUNCTIONS <END> -------- */

	/* -------- UPDATE FUNCTIONS <START> -------- */
	//13: updatePageContent
	function updatePageContent($page_id,$content){
        $qStr = "UPDATE pages 
					SET
				 content = '".addslashes($content)."', modified = ".time()."
				WHERE
					page_id = ".$page_id;
        $query = $this->db->query($qStr);
        return $query;
	}
	
	//14: changePageHeadingStatus
	function changePageHeadingStatus($id,$status){
        $qStr = "UPDATE faq_headings 
					SET
				 is_active = '".$status."', modified = ".time()."
				WHERE
					id = ".$id;
        $query = $this->db->query($qStr);
        return $query;
	}
	
	//15: changeFaqStatus
	function changeFaqStatus($id,$status){
        $qStr = "UPDATE faqs 
					SET
				 is_active = '".$status."', modified = ".time()."
				WHERE
					id = ".$id;
        $query = $this->db->query($qStr);
        return $query;
	}
	
	//16: changeSettings
	function changeSettings($image_upload_limit){
        $qStr = "UPDATE settings 
					SET
				 image_upload_limit = '".$image_upload_limit."',modified=".time()."
				WHERE
					id = 1";
        $query = $this->db->query($qStr);
        return $query;		
	}
	
	//17: changeFileStatus
	function changeFileStatus($file_id,$status) {
		$time = time();		
		$qStr = "UPDATE 
					categories_sample_videos
				 SET
					is_active = '".$status."', modified = ".$time."
				 WHERE 
					id = ".$file_id;
		return $query = $this->db->query($qStr);

	}
	/* -------- UPDATE FUNCTIONS <END> -------- */
}
/* End of file Settings_model.php */
/* Location: ./application/models/backend/Settings_model.php */
?>