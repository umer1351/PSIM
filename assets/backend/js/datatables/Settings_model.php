<?php
class Page_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	
	/* -------- GET FUNCTIONS <START> -------- */
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
	
	function getDefaultAdStatus(){
		$qStr = "SELECT
					default_ad_status
				 FROM
				 settings
				 WHERE 
				 1";
		$query = $this->db->query($qStr);
        $result = $query->row_array();
		return  $result['default_ad_status'];
	}
	
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
	/* -------- GET FUNCTIONS <END> -------- */
	
	/* -------- ADD FUNCTIONS <START> -------- */
	function addPageHeading($page_id,$page_heading) {
        $qStr = "INSERT INTO faq_headings 
					SET
				 page_id = ".$page_id.",is_active = ".ACTIVE_STATUS_ID.", heading = '".addslashes($page_heading)."', created = ".time()."";
        $query = $this->db->query($qStr);
        return $query;				
	}
	function addFaqs($faq_heading_id,$page_question,$page_answer) {
        $qStr = "INSERT INTO faqs 
					SET
				 faq_heading_id = ".$faq_heading_id.", question = '".addslashes($page_question)."', answer = '".addslashes($page_answer)."',is_active = ".ACTIVE_STATUS_ID.",
				 created = ".time()."";
        $query = $this->db->query($qStr);
        return $query;				
	}
	/* -------- ADD FUNCTIONS <END> -------- */

	/* -------- UPDATE FUNCTIONS <START> -------- */
	function updatePageContent($page_id,$content){
        $qStr = "UPDATE pages 
					SET
				 content = '".addslashes($content)."', modified = ".time()."
				WHERE
					page_id = ".$page_id;
        $query = $this->db->query($qStr);
        return $query;
	}
	function changePageHeadingStatus($id,$status){
        $qStr = "UPDATE faq_headings 
					SET
				 is_active = '".$status."', modified = ".time()."
				WHERE
					id = ".$id;
        $query = $this->db->query($qStr);
        return $query;
	}
	function changeFaqStatus($id,$status){
        $qStr = "UPDATE faqs 
					SET
				 is_active = '".$status."', modified = ".time()."
				WHERE
					id = ".$id;
        $query = $this->db->query($qStr);
        return $query;
	}
	function changeSettings($ad_status_setting){
        $qStr = "UPDATE settings 
					SET
				 default_ad_status = '".$ad_status_setting."',modified=".time()."
				WHERE
					id = 1";
        $query = $this->db->query($qStr);
        return $query;		
	}
	/* -------- UPDATE FUNCTIONS <END> -------- */
}
?>
