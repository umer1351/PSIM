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
	function dragDropVideos($vid,$exam_id){
		$qStr = "INSERT INTO
				 exams_images SET exam_id = '$exam_id', type = '2', file_name = '$vid', uploaded_on =".date("Y-m-d");
		$query = $this->db->query($qStr);
     
	}


	public function commission($value='')
	{
		$qStr = "SELECT *
					FROM
				 commission_settings WHERE is_active = '1'";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	public function commissions($value='')
	{
		$qStr = "SELECT price as pric
					FROM
				 commission_settings WHERE is_active = '1'";
		$query = $this->db->query($qStr);
        return $query->row_array()['pric'];
	}
	public function getmembershipfee($value='')
	{
		$qStr = "SELECT price as pr
					FROM
				 go_pro WHERE type = '2'";
		$query = $this->db->query($qStr);
        return $query->row_array()['pr'];
	}

	public function getTotalUser($value='')
	{
		$qStr = "SELECT COUNT(id) as total_user
				FROM user;";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}

	public function priceplan($value='')
	{
		$qStr = "SELECT *
					FROM
				 go_pro WHERE is_active = '1'";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
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
		public function getEventDetails($event_id='')
	{

	 $qStr = "SELECT
				job.*, job.id as job_id, user_job.*, service.id as serv_id, service.name as service_name, user_job.job_status as st, user_job.job_id as j_id, user.first_name as first,user.last_name as last , job.job_status as js
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
				user_job.job_id = '".$event_id."' AND (user_job.job_status = 2 OR user_job.job_status = 4)
			"; 
		
		$query = $this->db->query($qStr);
		return $result = $query->result_array();
		
	}
			public function getTransactionsDetails($event_id='')
	{

		  $qStr = "SELECT
				job.*, job.id as job_id, user_job.*, service.id as serv_id, service.name as service_name, user_job.job_status as st,user.first_name as first,user.last_name as last , job.job_status as js,user.account_type
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
				 job.is_active = '1' AND (user_job.job_status = 2 OR user_job.job_status = 4) 
			"; //die();
		$query = $this->db->query($qStr);
		return $result = $query->result_array();
		
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

	function updatePricingAjax($heading,$file_name,$top_section_2_heading,$price_heading_free,$top_section_4_price,$top_section_2_content,$price_val,$heading_4,$content_4,$top_section_4_title,$top_section_4_heading,$top_section_4_content)
	{


		echo	 $qStr = "UPDATE pricing_cms 
					SET
				 	top_section_2_heading = '".$top_section_2_heading."', price_heading_free = '".$price_heading_free."' , top_section_4_price = '".$top_section_4_price."' , top_section_2_content = '".$top_section_2_content."' , top_section_2_content = '".$top_section_2_content."' , price_val = '".$price_val."' , heading_4 = '".$heading_4."', content_4 = '".$content_4."', top_section_4_title = '".$top_section_4_title."', top_section_4_heading = '".$top_section_4_heading."' , top_section_4_content = '".$top_section_4_content."' , image= '".$image."', modified = ".time()."
					WHERE
					is_active = 1 ";
					die();
	        $query = $this->db->query($qStr);
	        return $query;
		
		 
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
	

 function	getAllcontactdetail(){
    	$qStr = "SELECT 
					
					*
				 FROM
					contact_queries
				 WHERE
					is_active = ".ACTIVE_STATUS_ID." "  ;


        $query = $this->db->query($qStr);
        $result= $query->result_array();
    //print_r($result);die();
        return $result;

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
	function editCommissionAjax($id,$commission,$deliverable) {

		// print_r($id);
		
		// 	 amount = ".$deliverable.",
			$qStr = "UPDATE user_job 
					SET
				 commission_amount = ".$commission.",
				 deliverable_amount = ".$deliverable.",
			
				 payment_status = '1'

				
				 WHERE 	id =".$id."	";
				// print_r($qStr);die();
        	$query = $this->db->query($qStr);
		
		return $query;
	}	
		function editGoProAjax($id,$commission) {

		
		
			$qStr = "UPDATE go_pro 
					SET
				 price = ".$commission."
				
				 WHERE 	id =".$id."	";
				// print_r($qStr);die();
        	$query = $this->db->query($qStr);
		
		return $query;
	}	
	function gettransactions(){

				$qStr = "SELECT
				job.*, job.id as job_id, user_job.*, service.id as serv_id, service.name as service_name, user_job.job_status as st,user.first_name,user.last_name,user.account_type
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
				 job.is_active = '1'
			";

		$query = $this->db->query($qStr);
		//print_r($query->result_array());die();
		return $result = $query->result_array();
       
	}

	function getGoPro() {

		
		
			$qStr = "SELECT
					*
				 FROM
				 	go_pro
				 	";
				// print_r($qStr);die();
        	$query = $this->db->query($qStr);

		
		        $result= $query->result_array();
        return $result;
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
	function addHomepageSlide($slide_order,$slide_url,$image_name,$url_btn_text){
		$qStr ="INSERT INTO
						home_slider
					SET
						order_id = ".$slide_order.", slide_url = '".$slide_url."', url_btn_text = '".$url_btn_text."',  image_url = '".$image_name."',
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
	 public function getRowsFellowship($id = ''){ 
        $this->db->select('id,exam_id,type,file_name,uploaded_on'); 
        $this->db->from('fellowship_images'); 
        if($id){ 
            $this->db->where('exam_id',$id); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        }else{ 
            $this->db->order_by('uploaded_on','desc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        return !empty($result)?$result:false; 
    }
    public function getFellowshipPoster($id = ''){ 
        $this->db->select('id,exam_id,type,file_name,uploaded_on'); 
        $this->db->from('fellowship_poster'); 
        if($id){ 
            $this->db->where('exam_id',$id); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        }else{ 
            $this->db->order_by('uploaded_on','desc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        return !empty($result)?$result:false; 
    }
	 public function getPoster($id = ''){ 
        $this->db->select('id,exam_id,type,file_name,uploaded_on'); 
        $this->db->from('academic_poster'); 
        if($id){ 
            $this->db->where('exam_id',$id); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        }else{ 
            $this->db->order_by('uploaded_on','desc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        return !empty($result)?$result:false; 
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
	 public function insert($data = array()){ 
        $insert = $this->db->insert('fellowship_images', $data); 
        return $insert?true:false; 
    } 

    public function insert_academic($data = array()){ 
        $insert = $this->db->insert('academic_images', $data); 
        return $insert?true:false; 
    } 
     public function insert_fellowship($data = array()){ 
        $insert = $this->db->insert('fellowship_images', $data); 
        return $insert?true:false; 
    } 
    public function insert_fellowship_poster($data = array()){ 
        $insert = $this->db->insert('fellowship_poster', $data); 
        return $insert?true:false; 
    }
      public function insert_academic_poster($data = array()){ 
        $insert = $this->db->insert('academic_poster', $data); 
        return $insert?true:false; 
    }
    public function insert_exams($data = array()){ 
        $insert = $this->db->insert('exams_images', $data); 
        return $insert?true:false; 
    } 

    public function getRows($id = ''){ 
        $this->db->select('id,exam_id,type,file_name,uploaded_on'); 
        $this->db->from('exams_images'); 
        if($id){ 
            $this->db->where('exam_id',$id); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        }else{ 
            $this->db->order_by('uploaded_on','desc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        return !empty($result)?$result:false; 
    } 

     public function getRowsAcademic($id = ''){ 
        $this->db->select('id,exam_id,type,file_name,uploaded_on'); 
        $this->db->from('academic_images'); 
        if($id){ 
            $this->db->where('exam_id',$id); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        }else{ 
            $this->db->order_by('uploaded_on','desc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        return !empty($result)?$result:false; 
    }

    

	function changeFellowshipStatusAjax($id,$status){
        $qStr = "
        Delete from fellowship_images where id = '".$id."'";
        $query = $this->db->query($qStr);
        return $query;
	}
	function changeFellowshipStatusPoster($id,$status){
        $qStr = "
        Delete from fellowship_poster where id = '".$id."'";
        $query = $this->db->query($qStr);
        return $query;
	}

	function changeExamsStatusAjax($id,$status){
        $qStr = "
        Delete from exams_listing where id = '".$id."'";
        $query = $this->db->query($qStr);
        return $query;
	}

	function changeAcademicStatus($id,$status){
        $qStr = "
        Delete from academic_initiative where id = '".$id."'";
        $query = $this->db->query($qStr);
        return $query;
	}
    
    function changeAcademicImage($id,$status){
        $qStr = "
        Delete from academic_images where id = '".$id."'";
        $query = $this->db->query($qStr);
        return $query;
	}
	 function changeAcademicPoster($id,$status){
        $qStr = "
        Delete from academic_poster where id = '".$id."'";
        $query = $this->db->query($qStr);
        return $query;
	}
	function changeExamsImages($id,$status){
        $qStr = "
        Delete from exams_images where id = '".$id."'";
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
	function updateHomepageSlide($slide_id,$slide_order,$slide_url,$image,$url_btn_text){
		$qStr ="UPDATE
						home_slider
					SET
						order_id = ".$slide_order.", slide_url = '".$slide_url."', url_btn_text = '".$url_btn_text."', ".($image!==''?"image_url = '".$image."',":"")." modified = ".time()." 
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


	public function updateMidLeftContentAjax($heading,$sub_heading,$file_name,$page_section)
	{

		if($file_name != ''){
		 $qStr = 'UPDATE homepage_cms
					SET
				 heading = "'.$heading.'", sub_heading = "'.$sub_heading.'", image ="'.$file_name.'"
				WHERE
					id = "'.$page_section.'"';
		
        $query = $this->db->query($qStr);
        return $query;
    }
    else{
    	 $qStr = 'UPDATE homepage_cms
					SET
				 heading = "'.$heading.'", sub_heading = "'.$sub_heading.'"
				WHERE
					id = "'.$page_section.'"';
		
        $query = $this->db->query($qStr);
        return $query;
    }
	}

	public function updateMidRightContentAjax($heading,$sub_heading,$content,$file_name)
	{
		if(empty($file_name))
				{
		 $qStr = 'UPDATE homepage_cms
					SET
				 heading = "'.$heading.'",  content="'.$content.'" 
				WHERE
					id = "4"'; 
        $query = $this->db->query($qStr);
        return $query;
    }
    else
    {
    	 $qStr = "UPDATE homepage_cms
					SET
				 heading = '".$heading."', sub_heading = '".$sub_heading."', image ='".$file_name."', content='".$content."' 
				WHERE
					id = '4'"; 
        $query = $this->db->query($qStr);
        return $query;
    }
	}

	public function updateHomeBottomSection($heading,$sub_heading)
	{

		 $qStr = "UPDATE homepage_cms
					SET
				 heading = '".$heading."', sub_heading='".$sub_heading."' 
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
   
	    function	getAllreviews(){
    	$qStr = "
				 SELECT
					review.*,job.event_title,user.first_name,user.last_name,user.user_type
				 FROM
					review
				 INNER JOIN
					job
					ON
					review.job_id = job.id
				INNER JOIN
					user
					ON
					review.parent_id = user.id
				 WHERE
					review.job_id = job.id AND				 
					review.parent_id = user.id;
				" 


				 ;


        $query = $this->db->query($qStr);
        $result= $query->result_array();
   //print_r($result);die();
        return $result;

    }
 	    function	updatereview($id,$status){
 	    	
		  $qStr = "UPDATE review 
					SET
				 is_active = '".$status."'
					WHERE
					id = $id ";
        $query = $this->db->query($qStr);
        return $query;

    }
 	    function	update_event_name_status($id,$status){
 	    	
		  $qStr = "UPDATE user 
					SET
				 name_status = '".$status."'
					WHERE
					id = $id ";
        $query = $this->db->query($qStr);
        return $query;

    }
 	    function	getSumOfCommision($event_id){
 	    
    	$qStr = "SELECT 
					
					SUM(commission_amount) as sum_commission
				 FROM
					user_job
				 WHERE
					job_id='".$event_id."' AND is_active = ".ACTIVE_STATUS_ID." "  ;

//print_r($qStr)	;die();
        $query = $this->db->query($qStr);
        $result= $query->result_array();
    //print_r($result);die();
        return $result;
    }
     	    function	editCommissionJobAjax($id,$sum){
 	    	
		  $qStr = "UPDATE job 
					SET
				 commission_amount = '".$sum."'
					WHERE
					id = '".$id."' ";
        $query = $this->db->query($qStr);
        return $query;

    }
    

    function	editeventdetailajax($id,$detail){
 	    	
		  $qStr = "UPDATE job 
					SET
				 event_detail = '".$detail."'
					WHERE
					id = '".$id."' ";
					//print_r( $qStr);die();
        $query = $this->db->query($qStr);
        return $query;

    }
    function getcommission(){
 	    	
		  $qStr = "SELECT 
					
					*
				 FROM
					commission_settings
				";
					
        $query = $this->db->query($qStr);
     //  print_r($query->result_array());die();
        $result= $query->result_array();
return $result;
    }
    function getAllEventsCount(){

	 $qStr = "SELECT 
					COUNT(id)
					FROM
				 job
					";
					//die();
		$query = $this->db->query($qStr);
	//	print_r($query->result_array());
		return $result = $query->result_array();
	}
	 function premiumServiceProviderCount(){
    	
	 $qStr = "SELECT 
					*
					FROM
				 user
				 WHERE
				 user_type = '3' AND stripe_connection = '1'
					";
					//die();
		$query = $this->db->query($qStr);
		
	return	$count_rows = $query->num_rows();
		//print_r($query->result_array());
		 // $result = $query->result_array();
	}
		 function geteventplanner(){
    	
	 $qStr = "SELECT 
					COUNT(id) as allevent
					FROM
				 user
				 WHERE
				 user_type = 2
					";
					//die();
		$query = $this->db->query($qStr);
		//print_r($query->result_array());
		return $result = $query->result_array();
	}
			 function getserviceprovider(){
    	
	 $qStr = "SELECT 
					COUNT(id) as allevent
					FROM
				 user
				 WHERE
				 user_type = 3
					";
					//die();
		$query = $this->db->query($qStr);
		//print_r($query->result_array());
		return $result = $query->result_array();
	}
	function getComissionEarnings(){
    
    $qStr1 = "SELECT price as p from commission_settings; ";
    $query1 = $this->db->query($qStr1);
		//print_r($query->result_array());
		 $commision_price = $query1->row_array()['p'];	

	 $qStr = "SELECT 
					SUM(  amount/100 * '".$commision_price."') as totalcommissionamount
					FROM
				 user_job
				 WHERE payment_status=1
					";
					//die();
		$query = $this->db->query($qStr);
		//print_r($query->result_array());
		return $result = $query->row_array()['totalcommissionamount'];
	}


	public function getExamsListing($value='')
	{
		$qStr1 = "SELECT * from exams_listing; ";
    	$query1 = $this->db->query($qStr1);
	
		return $query1->result_array();
	}



	function addExamsSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$image_name,$title,$details,$register_date,$top_information,$sub){
		$qStr ="INSERT INTO
						exams_listing
					SET
					price = '".$price."', premium_active = '".$lifetime."',	top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = ".strtotime($register_date).", course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."', image = '".$image_name."', type='".$sub."',
						is_active = ".ACTIVE_STATUS_ID." ";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	function addExamDetailsAjax($topic,$slide_id,$Time,$Speaker,$Details){
		$qStr ="INSERT INTO
						exams_listing_detail
					SET
						exams_listing_id = '".$slide_id."', time = '".strtotime($Time)."', details='".$Details."', topic = '".$topic."',  speaker = '".$Speaker."'";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}
	function editExamDetailsAjax($topic,$slide_id,$Time,$Speaker,$Details){
		$qStr ="UPDATE
						exams_listing_detail
					SET
						 time = '".strtotime($Time)."', details='".$Details."', topic = '".$topic."',  speaker = '".$Speaker."'
					WHERE id = '".$slide_id."'

						";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	function getExamByID($slide_id){
		$qStr = "SELECT 
					
					*
				 FROM
					exams_listing 
				 WHERE
					 is_active != ".DELETED_STATUS_ID." AND id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}

	function getExamDetailsID($slide_id){
		$qStr = "SELECT 
					
					*
				 FROM
					exams_listing_detail 
				 WHERE
					 id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}

	public function getExamRegisteredByID($value='')
	{
		$qStr = "SELECT 
					
					subscription.*, user.*	

				 FROM

					subscription 

				INNER JOIN	

					user
				ON
				user.id = subscription.user_id
				 WHERE
					 subscription.module_id= $value;";

        $query = $this->db->query($qStr);
       $result= $query->result_array();
       
        return $result;
	}
	public function getExamDetailByID($value='')
	{
		 $qStr = "SELECT 
					
					*
				 FROM
					exams_listing_detail 
				 WHERE
					 exams_listing_id= $value;";

        $query = $this->db->query($qStr);
       $result= $query->result_array();
       
        return $result;
	}
	public function getFellowshipRegisteredByID($value='')
	{
		$qStr = "SELECT 
					
					subscription.*, user.*	

				 FROM

					subscription 

				INNER JOIN	

					user
				ON
				user.id = subscription.user_id
				 WHERE
					 subscription.module_id= $value;";

        $query = $this->db->query($qStr);
       $result= $query->result_array();
       
        return $result;
	}
	public function getFellowshipDetailByID($value='')
	{
		 $qStr = "SELECT 
					
					*
				 FROM
					fellowship_detail 
				 WHERE
					 exams_listing_id= $value;";

        $query = $this->db->query($qStr);
       $result= $query->result_array();
       
        return $result;
	}
	public function getExamDetailsByID($slide_id='')
	{
		$qStr = "SELECT 
					
					*
				 FROM
					exams_listing_detail 
				 WHERE
					  id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}



	function updateExamsSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$slide_id,$image_name,$title,$details,$register_date,$top_information, $sub){
		
		$qStr ="UPDATE
						exams_listing
					SET
						price = '".$price."', premium_active = '".$lifetime."', top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = '".$register_date."', image = '".$slide_id."', ".($image_name!==''?"image = '".$image_name."',":"")." register_date = ".strtotime($register_date).",course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."',  exam_date = '', type='".$sub."' 
					WHERE 
						id = ".$slide_id;
					
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}
	function updateExamDetailsAjax($slide_id,$image_name,$title,$details,$register_date,$top_information, $sub){
		
		$qStr ="UPDATE
						exams_listing_detail
					SET
						top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = '".$register_date."', image = '".$slide_id."', ".($image_name!==''?"image = '".$image_name."',":"")." register_date = ".strtotime($register_date).", exam_date = '', type='".$sub."' 
					WHERE 
						id = ".$slide_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}




	function addAcademicsSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$image_name,$title,$details,$register_date,$top_information,$sub){
		$qStr ="INSERT INTO
						academic_initiative
					SET
							price = '".$price."', premium_active = '".$lifetime."',	top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = ".strtotime($register_date).", course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."', image = '".$image_name."', type='".$sub."',
						is_active = ".ACTIVE_STATUS_ID." ";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	function getAcadamicByID($slide_id){
		$qStr = "SELECT 
					
					id, top_information, title,is_active,image,details,type,register_date,exam_date
				 FROM
					academic_initiative 
				 WHERE
					 is_active != ".DELETED_STATUS_ID." AND id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}

	function updateAcademicsSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$slide_id,$image_name,$title,$details,$register_date,$top_information,$sub){
		
		$qStr ="UPDATE
						academic_initiative
					SET
						price = '".$price."', premium_active = '".$lifetime."', top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = '".$register_date."', image = '".$slide_id."', ".($image_name!==''?"image = '".$image_name."',":"")." register_date = ".strtotime($register_date).",course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."',  exam_date = '', type='".$sub."' 
					WHERE 
						id = ".$slide_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}

	function addacademicDetailsAjax($topic,$slide_id,$Time,$Speaker,$Details){
		$qStr ="INSERT INTO
						academic_initiative_detail
					SET
						exams_listing_id = '".$slide_id."', time = '".strtotime($Time)."', details='".$Details."', topic = '".$topic."',  speaker = '".$Speaker."'";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}
	function editacademicDetailsAjax($topic,$slide_id,$Time,$Speaker,$Details){
		$qStr ="UPDATE
						academic_initiative_detail
					SET
						 time = '".strtotime($Time)."', details='".$Details."', topic = '".$topic."',  speaker = '".$Speaker."'
					WHERE id = '".$slide_id."'

						";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	

	function getacademicDetailsID($slide_id){
		$qStr = "SELECT 
					
					*
				 FROM
					academic_initiative_detail 
				 WHERE
					 id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}


	public function getinterventionListing($value='')
	{
		$qStr1 = "SELECT * from public_intervention; ";
    	$query1 = $this->db->query($qStr1);
	
		return $query1->result_array();
	}



	function addInterventionSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$image_name,$title,$details,$register_date,$top_information,$sub){
		$qStr ="INSERT INTO
						public_intervention
					SET
						price = '".$price."', premium_active = '".$lifetime."',	top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = ".strtotime($register_date).", course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."', image = '".$image_name."', type='".$sub."',
						is_active = ".ACTIVE_STATUS_ID." ";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	function getInterventionByID($slide_id){
		$qStr = "SELECT 
					
					id, top_information, title,is_active,image,details,type,register_date,exam_date
				 FROM
					public_intervention 
				 WHERE
					 is_active != ".DELETED_STATUS_ID." AND id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}

	function updateInterventionSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$slide_id,$image_name,$title,$details,$register_date,$top_information,$sub){
		
		$qStr ="UPDATE
						public_intervention
					SET
						price = '".$price."', premium_active = '".$lifetime."', top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = '".$register_date."', image = '".$slide_id."', ".($image_name!==''?"image = '".$image_name."',":"")." register_date = ".strtotime($register_date).",course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."',  exam_date = '', type='".$sub."' 
					WHERE 
						id = ".$slide_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}

	public function getphysianListing($value='')
	{
		$qStr1 = "SELECT * from physian_academy; ";
    	$query1 = $this->db->query($qStr1);
	
		return $query1->result_array();
	}



	function addphysianSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$image_name,$title,$details,$register_date,$top_information,$sub){
		$qStr ="INSERT INTO
						physian_academy
					SET
						price = '".$price."', premium_active = '".$lifetime."',	top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = ".strtotime($register_date).", course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."', image = '".$image_name."', type='".$sub."',
						is_active = ".ACTIVE_STATUS_ID." ";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	function getphysianByID($slide_id){
		$qStr = "SELECT 
					
					id, top_information, title,is_active,image,details,type,register_date,exam_date
				 FROM
					physian_academy 
				 WHERE
					 is_active != ".DELETED_STATUS_ID." AND id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}

	function updatephysianSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$slide_id,$image_name,$title,$details,$register_date,$top_information,$sub){
		
		$qStr ="UPDATE
						physian_academy
					SET
						price = '".$price."', premium_active = '".$lifetime."', top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = '".$register_date."', image = '".$slide_id."', ".($image_name!==''?"image = '".$image_name."',":"")." register_date = ".strtotime($register_date).",course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."',  exam_date = '', type='".$sub."' 
					WHERE 
						id = ".$slide_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}

	public function getPartnersListing($value='')
	{
		$qStr1 = "SELECT * from partners; ";
    	$query1 = $this->db->query($qStr1);
	
		return $query1->result_array();
	}



	function addPartnersSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$image_name,$title,$details,$register_date,$top_information,$sub){
		$qStr ="INSERT INTO
						partners
					SET
						price = '".$price."', premium_active = '".$lifetime."',	top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = ".strtotime($register_date).", course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."', image = '".$image_name."', type='".$sub."',
						is_active = ".ACTIVE_STATUS_ID." ";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	function getPartnersByID($slide_id){
		$qStr = "SELECT 
					
					id, top_information, title,is_active,image,details,type,register_date,exam_date
				 FROM
					partners 
				 WHERE
					 is_active != ".DELETED_STATUS_ID." AND id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}

	function updatePartnersSlide($deffered,$course_start_date,$expiry_date,$lifetime,$price,$slide_id,$image_name,$title,$details,$register_date,$top_information,$sub){
		
		$qStr ="UPDATE
						partners
					SET
						price = '".$price."', premium_active = '".$lifetime."', top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = '".$register_date."', image = '".$slide_id."', ".($image_name!==''?"image = '".$image_name."',":"")." register_date = ".strtotime($register_date).",course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."',  exam_date = '', type='".$sub."' 
					WHERE 
						id = ".$slide_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}



	public function getFellowshipListing($value='')
	{
		$qStr1 = "SELECT * from fellowship; ";
    	$query1 = $this->db->query($qStr1);
	
		return $query1->result_array();
	}



	function addFellowshipSlide($flag,$deffered,$course_start_date,$expiry_date,$lifetime,$price,$image_name,$title,$details,$register_date,$top_information,$sub){
		$qStr ="INSERT INTO
						fellowship
					SET
						price = '".$price."', premium_active = '".$lifetime."',	top_information = '".$top_information."', title = '".$title."', details='".$details."', register_date = ".strtotime($register_date).", course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."', image = '".$image_name."', type='".$sub."', decision_flag='".$flag."',
						is_active = ".ACTIVE_STATUS_ID." ";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	function getFellowshipByID($slide_id){
		$qStr = "SELECT 
					
					*
				 FROM
					fellowship 
				 WHERE
					 is_active != ".DELETED_STATUS_ID." AND id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	}
	function getFellowshipDetailsID($slide_id){
		$qStr = "SELECT 
					
					*
				 FROM
					fellowship_detail 
				 WHERE
					 id=".$slide_id;

        $query = $this->db->query($qStr);
        $result= $query->row_array();
        return $result;
	} 

	function editFellowshipDetailsAjax($topic,$slide_id,$Time,$Speaker,$Details){
		$qStr ="UPDATE
						fellowship_detail
					SET
						 time = '".strtotime($Time)."', details='".$Details."', topic = '".$topic."',  speaker = '".$Speaker."'
					WHERE id = '".$slide_id."'

						";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}

	function updateFellowshipSlide($flag,$deffered,$course_start_date,$expiry_date,$lifetime,$price,$slide_id,$image_name,$title,$details,$register_date,$top_information,$sub){
		
		$qStr ="UPDATE
						fellowship
					SET
							price = '".$price."', premium_active = '".$lifetime."', top_information = '".$top_information."', title = '".$title."', details='".$details."',  image = '".$slide_id."', ".($image_name!==''?"image = '".$image_name."',":"")." register_date = ".strtotime($register_date).",course_start_date = ".strtotime($course_start_date).",expiry_date = ".strtotime($expiry_date).", deferred = '".$deffered."',  exam_date = '', type='".$sub."', decision_flag='".$flag."' 
					WHERE 
						id = ".$slide_id;
						
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();
	}
	function addfellowshipDetailsAjax($topic,$slide_id,$Time,$Speaker,$Details){
		$qStr ="INSERT INTO
						fellowship_detail
					SET
						exams_listing_id = '".$slide_id."', time = '".strtotime($Time)."', details='".$Details."', topic = '".$topic."',  speaker = '".$Speaker."'";
			$query = $this->db->query($qStr);
			return $this->db->insert_id();
	}



	/* -------- UPDATE FUNCTIONS <END> -------- */
   
}
/* End of file Page_model.php */
/* Location: ./application/models/backend/Page_model.php */
?>