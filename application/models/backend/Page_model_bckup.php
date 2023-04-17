<?php
class Page_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: getContactMessages
	//02: getPageData
	//03: getFaqPageHeading
	//04: getFaqPageContent
	//05: getDefaultAdStatus
	//06: getAdApprovalChecklist
	//07: getAdApprovalChecklistById
	//08: getPageAllData
	//09: getHomeAoutAllData
	//10: getAboutSection
	//11: getAllHomepageSlides
	//12: getHomepageSlideByID
	//13: getTeamMemberByID
	//14: getAllTeamMembers
	//15: addPageHeading
	//16: addFaqs
	//17: addHomepageSlide
	//18: addTeamMember
	//19: updatePageContent
	//20: changePageHeadingStatus
	//21  changeHomeSlideStatus
	//22: changeFaqStatus
	//23: changeSettings
	//24: updateHomepageSlide
	//25: updateTeamMember
	//26: deleteHomepageSlide
	//27: updateSocialLinks
	//28 updateAboutStatus
	//29: editAboutSection
	//30: changeTeamMemberStatus
	/* -------- GET FUNCTIONS <START> -------- */
	
	//01: getContactMessages

	function getHomepageContent()
	{
		$qStr = "SELECT *
					FROM
				 homepage_cms WHERE is_active = '1'";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	function updateTopContent($heading='', $link = '', $image='')
	{
		  $qStr = "UPDATE homepage_cms 
					SET
				 heading = '".$heading."', image='".$image."', links='".$link."', modified = ".time()."
					WHERE
					id = 1 ";
        $query = $this->db->query($qStr);
        return $query;
	}
	function updateTopContent_without_image($heading='', $link = '')
	{
		  $qStr = "UPDATE homepage_cms 
					SET
				 heading = '".$heading."', links = '".$link."', modified = ".time()."
					WHERE
					id = 1 ";
        $query = $this->db->query($qStr);
        return $query;
	}

	function updatePricingAjax($heading='', $image='')
	{

		if (!empty($image)) {
			 $qStr = "UPDATE pricing_cms 
					SET
				 	heading = '".$heading."', image= '".$image."', modified = ".time()."
					WHERE
					is_active = 1 ";
	        $query = $this->db->query($qStr);
	        return $query;
		}else{
			$qStr = "UPDATE pricing_cms 
					SET
				 	heading = '".$heading."', modified = ".time()."
					WHERE
					is_active = 1 ";
	        $query = $this->db->query($qStr);
	        return $query;
		}
		 
	}
	
	function getHomepageTopContent()
	{
		$qStr = "SELECT *
					FROM
				 homepage_cms WHERE section = '1'";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	
	function updateHomePageMidTopSection($heading='',$sub_heading='', $content='')
	{
		  $qStr = "UPDATE homepage_cms 
					SET
				 heading = '".$heading."', content = '".$content."', sub_heading = '".$sub_heading."', modified = ".time()."
					WHERE
					id = 2 AND mid_section = 0";
        $query = $this->db->query($qStr);
        return $query;
	}
	


	function getHomepageMidTopContent()
	{
		$qStr = "SELECT *
					FROM
				 homepage_cms WHERE section = '2' AND mid_section = '0'";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	function getHomepageRightMidContent()
	{
		$qStr = "SELECT *
					FROM
				 homepage_cms WHERE section = '2' AND mid_section = '1'";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	function getHomepageLeftMidContent()
	{
		$qStr = "SELECT *
					FROM
				 homepage_cms WHERE section = '2' AND mid_section = '2'";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}

	function getHomepageBottomContent()
	{
		$qStr = "SELECT *
					FROM
				 homepage_cms WHERE section = '3'";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}

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

	function getPrivacyPolicyContent()
	{
		$qStr = "SELECT 
					*
				 FROM
					privacy_policy_cms 
				 WHERE
					is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        return $result;
	}

	function getTermsAndConditions()
	{
		$qStr = "SELECT 
					*
				 FROM
					terms_and_conditions_cms 
				 WHERE
					is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        return $result;
	}
	
	function getFaqs()
	{
		$qStr = "SELECT 
					*
				 FROM
					faq_cms 
				 WHERE
					is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        return $result;
	}

	function getcontactUs()
	{

		$qStr = "SELECT *
					FROM
				 contact_cms WHERE is_active = '1'";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	public function updateContactAjax($heading,$content,$file_name='')
	{
		if (!empty($file_name)) {
			 $qStr = "UPDATE contact_cms 
					SET
				 	heading = '".$heading."', content ='".$content."', image= '".$file_name."', modified = ".time()."
					WHERE
					is_active = 1 ";
	        $query = $this->db->query($qStr);
	        return $query;
		}else{
			$qStr = "UPDATE contact_cms 
					SET
				 	heading = '".$heading."',content ='".$content."',  modified = ".time()."
					WHERE
					is_active = 1 ";
	        $query = $this->db->query($qStr);
	        return $query;
		}
	}
	//02: getPageData
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
	
	//03: getFaqPageHeading
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
	
	//04: getFaqPageContent
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
	
	//05: getDefaultAdStatus
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
	
	//06: getAdApprovalChecklist
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
	
	//07: getAdApprovalChecklistById
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
	
	//08: getPageAllData
	function getPageAllData($page_id) { 
        $qStr = "SELECT 
					#PAGES
					id, page_id, page_name, field_name, content
				 FROM
					pages 
				 WHERE
					page_id = ".$page_id." AND
					is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        $page_data = '';
        if(!empty($result)){ 
			foreach($result as $data){
				$page_data[$data['field_name']] = $data;
			}
		}
        return $page_data;
    }
	
	//09: getHomeAoutAllData
	function getHomeAoutAllData($page_id) { 
        $qStr = "SELECT 
					*
				 FROM
					home_about_content 
				 WHERE
					page_id = ".$page_id." AND
					is_active != ".DELETED_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        $page_data = '';
        if(!empty($result)){ 
			foreach($result as $data){
				$page_data[$data['field_name']] = $data;
			}
		}
        return $page_data;
    }
	
	//10: getAboutSection
	function getAboutSection($page_id,$id) { 
        $qStr = "SELECT 
					*
				 FROM
					home_about_content 
				 WHERE
					page_id = ".$page_id." AND id=".$id." AND
					is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
    }
	
	
	//11: getAllHomepageSlides
	function getAllHomepageSlides(){
		$qStr = "SELECT 
					
					id, image_url, content, is_active, slide_url, order_id
				 FROM
					home_slider 
				 WHERE
					 is_active != ".DELETED_STATUS_ID;

        $query = $this->db->query($qStr);
        $result= $query->result_array();
        return $result;
	}
	
	//12: getHomepageSlideByID
	function getHomepageSlideByID($slide_id){
		$qStr = "SELECT 
					
					id, image_url, content,is_active,slide_url,order_id,url_btn_text
				 FROM
					home_slider 
				 WHERE
					 is_active != ".DELETED_STATUS_ID." AND id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}
	
	//13: getTeamMemberByID
	function getTeamMemberByID($id){
		$qStr = "SELECT 
					
					id, image_url,content,is_active,name,url,order_id
				 FROM
					our_team 
				 WHERE
					 is_active != ".DELETED_STATUS_ID." AND id=".$id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}
	
	//14: getAllTeamMembers
	function getAllTeamMembers(){
		$qStr = "SELECT 
					
					id, image_url, content, is_active, name, url, order_id
				 FROM
					our_team 
				 WHERE
					 is_active != ".DELETED_STATUS_ID;

        $query = $this->db->query($qStr);
        $result= $query->result_array();
        return $result;
	}
	/* -------- GET FUNCTIONS <END> -------- */
	
	/* -------- INSERT FUNCTIONS <START> -------- */
	
	//15: addPageHeading
	function addPageHeading($page_id,$page_heading) {
        $qStr = "INSERT INTO faq_headings 
					SET
				 page_id = ".$page_id.",is_active = ".ACTIVE_STATUS_ID.", heading = '".addslashes($page_heading)."', created = ".time()."";
        $query = $this->db->query($qStr);
        return $query;				
	}
	
	function editFaqAjax($id,$heading,$content,$order_id) {

		
		
			$qStr = "UPDATE faq_cms 
					SET
				 content_order = ".$order_id.", heading = '".$heading."', content = '".$content."',is_active = ".ACTIVE_STATUS_ID.",
				 modified = ".time()." 
				 WHERE 	id =".$id."	";
        	$query = $this->db->query($qStr);
		
		return $query;
	}

	//16: addFaqs

	

	function addFaq($heading,$content,$order_id) {
        $qStr = "INSERT INTO faq_cms 
					SET
				 content_order = ".$order_id.", heading = '".$heading."', content = '".$content."',is_active = ".ACTIVE_STATUS_ID.",
				 created = ".time()."";
        $query = $this->db->query($qStr);
        return $query;				
	}

	function addFaqs($heading,$content,$order_id) {
        $qStr = "INSERT INTO privacy_policy_cms 
					SET
				 content_order = ".$order_id.", heading = '".$heading."', content = '".$content."',is_active = ".ACTIVE_STATUS_ID.",
				 created = ".time()."";
        $query = $this->db->query($qStr);
        return $query;				
	}
	function addTermsAndCondtions($heading,$content,$order_id) {
        $qStr = "INSERT INTO terms_and_conditions_cms 
					SET
				 content_order = ".$order_id.", heading = '".$heading."', content = '".$content."',is_active = ".ACTIVE_STATUS_ID.",
				 created = ".time()."";
        $query = $this->db->query($qStr);
        return $query;				
	}

function editTermsAndConditions($id,$heading,$content,$order_id) {

		
		
			$qStr = "UPDATE terms_and_conditions_cms 
					SET
				 content_order = ".$order_id.", heading = '".$heading."', content = '".$content."',is_active = ".ACTIVE_STATUS_ID.",
				 modified = ".time()." 
				 WHERE 	id =".$id."	";
        	$query = $this->db->query($qStr);
		
		return $query;
	}

	function editPrivacyPolicy($id,$heading,$content,$order_id) {

		$checkQry = "SELECT id FROM privacy_policy_cms WHERE content_order = '".$order_id."'";

		$qry = $this->db->query($checkQry);
		$count_rows = $qry->num_rows();
		
			$qStr = "UPDATE privacy_policy_cms 
					SET
				 content_order = ".$order_id.", heading = '".$heading."', content = '".$content."',is_active = ".ACTIVE_STATUS_ID.",
				 modified = ".time()." 
				 WHERE 	id =".$id."	";
        	$query = $this->db->query($qStr);
		
		return $query;
	}

	public function deletePrivacyPolicyAjax($id='')
	{
		$qStr = "UPDATE privacy_policy_cms 
					SET
				 is_active = ".INACTIVE_STATUS_ID.",
				 modified = ".time()." 
				 WHERE 	id =".$id."	";
        	$query = $this->db->query($qStr);
		
		return $query;
		
	}
	public function deleteFaqAjax($id='')
	{
		$qStr = "UPDATE faq_cms 
					SET
				 is_active = ".INACTIVE_STATUS_ID.",
				 modified = ".time()." 
				 WHERE 	id =".$id."	";
        	$query = $this->db->query($qStr);
		
		return $query;
		
	}

	public function deleteTermsAndConditionsAjax($id='')
	{
		$qStr = "UPDATE terms_and_conditions_cms 
					SET
				 is_active = ".INACTIVE_STATUS_ID.",
				 modified = ".time()." 
				 WHERE 	id =".$id."	";
        	$query = $this->db->query($qStr);
		
		return $query;
		
	}
	
	//17: addHomepageSlide
	function addHomepageSlide($slide_order,$slide_url,$slide_content,$image_name,$url_btn_text){
		$qStr ="INSERT INTO
						home_slider
					SET
						order_id = ".$slide_order.", slide_url = '".$slide_url."', url_btn_text = '".$url_btn_text."', content = '".$slide_content."', image_url = '".$image_name."',
						is_active = ".ACTIVE_STATUS_ID.", created = ".time();
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}
	
	//18: addTeamMember
	function addTeamMember($slide_order,$slide_content,$image_name,$name,$url){
		$qStr ="INSERT INTO
						our_team
					SET
						order_id = ".$slide_order.", name = '".$name."', url = '".$url."', content = '".$slide_content."', image_url = '".$image_name."',
						is_active = ".ACTIVE_STATUS_ID.", created = ".time();
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}
	/* -------- INSERT FUNCTIONS <END> -------- */

	/* -------- UPDATE FUNCTIONS <START> -------- */
	//19: updatePageContent
	function updatePageContent($page_id,$content){
        $qStr = "UPDATE pages 
					SET
				 content = '".addslashes($content)."', modified = ".time()."
				WHERE
					id = ".$page_id;
        $query = $this->db->query($qStr);
        return $query;
	}
	
	//20: changePageHeadingStatus
	function changePageHeadingStatus($id,$status){
        $qStr = "UPDATE faq_headings 
					SET
				 is_active = '".$status."', modified = ".time()."
				WHERE
					id = ".$id;
        $query = $this->db->query($qStr);
        return $query;
	}
	
	//21: changeHomeSlideStatus
	function changeHomeSlideStatus($id,$status){
        $qStr = "UPDATE home_slider 
					SET
				 is_active = '".$status."', modified = ".time()."
				WHERE
					id = ".$id;
        $query = $this->db->query($qStr);
        return $query;
	}
    
	//22: changeFaqStatus
	function changeFaqStatus($id,$status){
        $qStr = "UPDATE faqs 
					SET
				 is_active = '".$status."', modified = ".time()."
				WHERE
					id = ".$id;
        $query = $this->db->query($qStr);
        return $query;
	}
	
	//23: changeSettings
	function changeSettings($ad_status_setting){
        $qStr = "UPDATE settings 
					SET
				 default_ad_status = '".$ad_status_setting."',modified=".time()."
				WHERE
					id = 1";
        $query = $this->db->query($qStr);
        return $query;		
	}
	
	//24: updateHomepageSlide
	function updateHomepageSlide($slide_id,$slide_order,$slide_url,$slide_content,$image,$url_btn_text){
		$qStr ="UPDATE
						home_slider
					SET
						order_id = ".$slide_order.", slide_url = '".$slide_url."', url_btn_text = '".$url_btn_text."', content = '".$slide_content."', ".($image!==''?"image_url = '".$image."',":"")." modified = ".time()." 
					WHERE 
						id = ".$slide_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}
	
	//25: updateTeamMember
	function updateTeamMember($id,$slide_order,$slide_content,$image,$name,$url){
		$qStr ="UPDATE
						our_team
					SET
						order_id = ".$slide_order.", name = '".$name."', url = '".$url."', content = '".$slide_content."', ".($image!==''?"image_url = '".$image."',":"")." modified = ".time()." 
					WHERE 
						id = ".$id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}
	
	//26: deleteHomepageSlide
	function deleteHomepageSlide($slide_id){
		$qStr ="UPDATE
						home_slider
					SET
						is_active = ".DELETED_STATUS_ID.", modified = ".time()."
					WHERE
						id = ".$slide_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}
	
	//27: updateSocialLinks
	function updateSocialLinks($social_links){
		foreach($social_links as $link) {
			$qStr = "UPDATE 
					pages
				 SET
					content = '".$link[1]."', modified = ".time()."
				 WHERE 
					id = '".$link[0]."'";
			$query = $this->db->query($qStr);
		}
		return $query;
	}
	
	//28: updateAboutStatus
	function updateAboutStatus($id,$status){
		$qStr = "UPDATE 
				home_about_content
			 SET
				is_active = '".$status."', modified = ".time()."
			 WHERE 
				id = '".$id."'";
		$query = $this->db->query($qStr);
		return $query;
	}
	
	//29: editAboutSection
	function editAboutSection($id,$url,$content,$file_name){
		$qStr ="UPDATE
						home_about_content
					SET
						url = '".$url."', content = '".addslashes($content)."', image_url = '".$file_name."', modified = ".time()." 
					WHERE 
						id = ".$id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}
	
	//30: changeTeamMemberStatus
	function changeTeamMemberStatus($id,$status){
        $qStr = "UPDATE our_team
					SET
				 is_active = '".$status."', modified = ".time()."
				WHERE
					id = ".$id;
        $query = $this->db->query($qStr);
        return $query;
	}


	public function updateMidLeftContentAjax($heading,$sub_heading,$content,$file_name)
	{

		 $qStr = "UPDATE homepage_cms
					SET
				 heading = '".$heading."', sub_heading = '".$sub_heading."', image ='".$file_name."', content='".$content."' 
				WHERE
					id = '3'";
        $query = $this->db->query($qStr);
        return $query;
	}

	public function updateMidRightContentAjax($heading,$sub_heading,$content,$file_name)
	{

		 $qStr = "UPDATE homepage_cms
					SET
				 heading = '".$heading."', sub_heading = '".$sub_heading."', image ='".$file_name."', content='".$content."' 
				WHERE
					id = '4'";
        $query = $this->db->query($qStr);
        return $query;
	}

	public function updateHomeBottomSection($heading,$content)
	{

		 $qStr = "UPDATE homepage_cms
					SET
				 heading = '".$heading."', content='".$content."' 
				WHERE
					id = '5'";
        $query = $this->db->query($qStr);
        return $query;
	}

	function getPricingTopContent()
    {
    	$qStr = "SELECT 
					
					*
				 FROM
					pricing_cms 
				 WHERE
					is_active = ".ACTIVE_STATUS_ID." AND top_section = '1'"  ;

        $query = $this->db->query($qStr);
        $result= $query->result_array();
    
        return $result;
    }

	
	/* -------- UPDATE FUNCTIONS <END> -------- */
   
}
/* End of file Page_model.php */
/* Location: ./application/models/backend/Page_model.php */
?>