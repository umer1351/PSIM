<?php
class Search_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	/*------------ Function List <Start>-----------------
	01: getAllTalents
	02: getVisibleCategory
	03: getBookmarkedTalent
	04: getAllTalentsCount
	05: getAllCategories
	06: getAllCategoryFields
	07: getCategoryFieldsOptions
	08: getUserSearch
	09: checkUserPastSearch
	10: searchCity
	11: getTotalTalents
	12: getTalentsByCategoryId
	13: bookmarkTalent
	14: updateUserSearch
	15: updateUserPastSearch
	------------ Function List <End>-----------------*/
	/* -------- GET FUNCTIONS <START> -------- */
	
	//01: getAllTalents
	function getAllTalents($position,$item_per_page,$query,$category,$gender,$eye,$hair,$height,$weight,$age,$city,$country) {
		$and = "";
		$and .= ($query != "") ? " AND (users.first_name LIKE '%".$query."%' OR users.last_name LIKE '%".$query."%')":"";
		$and .= ($category != "") ? " AND users.talent_category_id IN (".$category.") ":"";
		$and .= ($gender != "") ? " AND users.gender IN (".$gender.") ":"";
		$and .= ($eye != "") ? " AND users.eye_color IN ".$eye." ":"";
		$and .= ($hair != "") ? " AND users.hair_color IN ".$hair." ":"";
		
		$and .= ($city != "") ? " AND users.city LIKE '%".$city."%'":"";
		$and .= ($country != 0) ? " AND users.country_id = ".$country."":"";
		$and .= ($height != "") ? " AND users.height IN ".$height." ":"";
		/* if(!empty($height)){
			$heights = explode(',',$height);
			foreach($heights as $index=>$new_height){
				if (strpos($new_height, '.') !== false) {
					$heights[$index] = str_replace(".","'",$new_height);
				}else{
					$heights[$index] = $new_height."'0";
				}
			}
			//pr($heights); die();
			$and .= ' AND (users.height BETWEEN "'.$heights[0].'" AND "'.$heights[1].'") ';
		} */
		
		if(!empty($weight)){
			$weights = explode(',',$weight);
			if(isset($weights[1])){
				$and .= " AND (users.weight BETWEEN ".$weights[0]." AND ".$weights[1].") ";
			}else{
				$and .= " AND users.weight IN (".$weight.") ";
			}
			
		}
		
		if(!empty($age)){
			$ages = explode(',',$age);
			if(isset($ages[1])){
				$and .= " AND (users.age BETWEEN ".$ages[0]." AND ".$ages[1].") ";
			}else{
				$and .= " AND users.age IN (".$age.") ";
			}
			
		}
		
		$qStr = "SELECT
				 	users.*, talent_categories.title as talent_category, talent_categories.visible_field_ids
				 FROM
				 	users
					INNER JOIN talent_categories
						ON
						users.talent_category_id = talent_categories.id
				 WHERE 
					users.is_active = ".ACTIVE_STATUS_ID." AND subscription_expiry >= ".strtotime(date('Y-m-d'))." AND users.role = ".USER_ROLE_TALENT."
					".$and."
					ORDER BY users.is_sponsored ASC LIMIT ".$position.",".$item_per_page."";
		$query = $this->db->query($qStr);
		$result = $query->result_array();
		if(!empty($result)){
			foreach($result as $key=>$row){
				$result[$key]['visible_category_fields'] = $this->getVisibleCategory($row['visible_field_ids']);
			}
		}
		return $result;
    }
	//02: getVisibleCategory
	function getVisibleCategory($visible_field_ids){
		$qStr = "SELECT
				 	categories_fields.name, categories_fields.placeholder
				 FROM
				 	categories_fields
				 WHERE 
					categories_fields.id IN (".$visible_field_ids.") AND categories_fields.is_active = ".ACTIVE_STATUS_ID;
		$query = $this->db->query($qStr);
		return $query->result_array();		
	}
	//03: getBookmarkedTalent
	function getBookmarkedTalent($talent_id,$employer_id){
        $qStr = "SELECT
					count(*) as bookmarked_talents
				 FROM
					bookmarked_talent
				 WHERE
					bookmarked_talent.employer_id = '".$employer_id."' AND bookmarked_talent.talent_id = '".$talent_id."' AND bookmarked_talent.is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
		$result = $query->row_array();
		return $result['bookmarked_talents'];
	}
	//04: getAllTalentsCount
	function getAllTalentsCount(){
		$qStr = "SELECT
				 	count(*) as total_talents
				 FROM
				 	users
					INNER JOIN talent_categories
						ON
						users.talent_category_id = talent_categories.id
				 WHERE 
					users.is_active = ".ACTIVE_STATUS_ID." AND subscription_expiry >= ".strtotime(date('Y-m-d'))." AND users.role = ".USER_ROLE_TALENT."
					ORDER BY users.is_sponsored ASC";
		$query = $this->db->query($qStr);
		$result = $query->row_array();
		return $result['total_talents'];
	}
	//05: getAllCategories
	function getAllCategories($parent_id,$level) {
		$qStr = "SELECT talent_categories.id, talent_categories.title, talent_categories.visible_field_ids, talent_categories.parent_id
				 FROM
					talent_categories
				 WHERE 
					talent_categories.parent_id = ".$parent_id." AND talent_categories.is_active = ".ACTIVE_STATUS_ID."
					ORDER BY talent_categories.is_featured ASC, talent_categories.title ASC";
		$query = $this->db->query($qStr);  
		$result = $query->result_array();
		$menu = "";
		$i=0;
		$selected = "";
		while($i< count($result)) 
		{
				$menu .="<li class='level-".$result[$i]['id']."'><a id='".$result[$i]['id']."' href=javascript:void(0)>".$result[$i]['title']."</a>";
				$menu .= "<ul>".$this->getAllCategories($result[$i]['id'], $level +1)."</ul>";
				$menu .="</li>"; 
				$i++;
		}
		return $menu;
    }
	
	// 06: getAllCategoryFields
	function getAllCategoryFields() { 
        $qStr = "SELECT 
					id, title, name
				 FROM
					categories_fields 
				 WHERE
					is_active = ".ACTIVE_STATUS_ID;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        $category_fields = '';
        if(!empty($result)){ 
			foreach($result as $data){
				$category_fields[$data['name']] = $data;
				$category_fields[$data['name']]['field_options'] = $this->getCategoryFieldsOptions($data['id']);
			}
		}
        return $category_fields;
    }
	
	//07: getCategoryFieldsOptions
	function getCategoryFieldsOptions($cat_field_id){
        $qStr = "SELECT 
					id, value_option, value, value_code
				 FROM
					category_field_options 
				 WHERE
					is_active = ".ACTIVE_STATUS_ID." AND category_field_id =".$cat_field_id;
        $query = $this->db->query($qStr);
        $result= $query->result_array();
        return $result;		
	}
	
	//08: getUserSearch
	function getUserSearch($user_id,$search_name){
        $qStr = "SELECT 
					search_value
				 FROM
					user_search_history 
				 WHERE
					user_id = ".$user_id." AND search_name='".$search_name."'
					ORDER BY count DESC LIMIT 1";
        $query = $this->db->query($qStr);
        $result = $query->row_array();
		if(!empty($result)){
			return $result['search_value'];
		} else {
			return "";
		}
	}
	
	//09: checkUserPastSearch
	function checkUserPastSearch($user_id){
        $qStr = "SELECT 
					*
				 FROM
					user_search_history 
				 WHERE
					user_id = ".$user_id." AND count >=".MIN_SEARCH_FILTER_COUNT;
        $query = $this->db->query($qStr);
        $result = $query->result_array();
		return $result;
	}
	
	//10: searchCity
	function searchCity($city){
		$qStr ="SELECT
					DISTINCT city
				FROM
					users
				WHERE
					city LIKE '%".$city."%' AND role=".USER_ROLE_TALENT."
				ORDER BY city ASC LIMIT 30";
        $query = $this->db->query($qStr);
        $result = $query->result_array();
        if(!empty($result)){ 
			foreach($result as $key=>$record) {
				$data[$key]['label'] = $record['city'];
				$data[$key]['value'] = $record['city'];
			}
		echo json_encode($data);
		}
	}
	
	//11: getTotalTalents
	function getTotalTalents($cat_id){
		$qStr = "SELECT
				 	count(*) as total_talents
				 FROM
				 	users
				 WHERE 
					is_active = ".ACTIVE_STATUS_ID." AND subscription_expiry >= ".strtotime(date('Y-m-d'))." AND talent_category_id = ".$cat_id."
					AND users.role = ".USER_ROLE_TALENT."";
		$query = $this->db->query($qStr);
		$result = $query->row_array();
		return $result['total_talents'];		
	}
	
	//12: getTalentsByCategoryId
	function getTalentsByCategoryId($cat_id){
		$qStr = "SELECT
				 	users.id, users.first_name, users.last_name, users.profile_image
				 FROM
				 	users
				 WHERE 
					users.is_active = ".ACTIVE_STATUS_ID." AND subscription_expiry >= ".strtotime(date('Y-m-d'))." AND users.talent_category_id = ".$cat_id."
					AND users.role = ".USER_ROLE_TALENT."
					";
		$query = $this->db->query($qStr);
		return $query->result_array();
	}
	/* -------- GET FUNCTIONS <END> -------- */
	/* -------- INSERT FUNCTIONS <START> -------- */
	/* -------- INSERT FUNCTIONS <END> -------- */
	/* -------- UPDATE FUNCTIONS <START> -------- */
	
	//13: bookmarkTalent
	function bookmarkTalent($talent_id,$employer_id,$status){
		if($status == DELETED_STATUS_ID){
			$qStr ="UPDATE bookmarked_talent
						SET
						is_active = '".$status."', modified='".time()."'
						WHERE	
						talent_id=".$talent_id." AND employer_id=".$employer_id."";
			$query = $this->db->query($qStr);
			return $this->db->affected_rows();
		} else {
			$qStr ="INSERT INTO bookmarked_talent
						SET
						is_active = '".$status."', created='".time()."', talent_id=".$talent_id.", employer_id=".$employer_id."";
			$query = $this->db->query($qStr);
			return $this->db->affected_rows();
		}
	}
	//14: updateUserSearch
	function updateUserSearch($user_id,$search_id,$search_name){
		foreach($search_id as $search){
			$qStr = "SELECT
						*
					 FROM
						user_search_history
					 WHERE 
						user_id = ".$user_id." AND search_value = '".addslashes($search)."' AND search_name = '".addslashes($search_name)."'";
			$query = $this->db->query($qStr);
			$result = $query->row_array();
			if(empty($result)){
				$qStr1 = "INSERT INTO
							user_search_history
						 SET 
							user_id = ".$user_id.", search_value = '".addslashes($search)."', search_name = '".addslashes($search_name)."', count = 1, created =".time();
				$query1 = $this->db->query($qStr1);
				$this->db->affected_rows();
			} else {
				$count = $result['count']+1;
				$qStr1 = "UPDATE
							user_search_history
						 SET 
							count = ".$count.", modified =".time()."
						 WHERE 
							id =".$result['id'];
				$query1 = $this->db->query($qStr1);
				$this->db->affected_rows();				
			}
		}
	}
	
	//15: updateUserPastSearch
	function updateUserPastSearch($user_id,$status){
		$qStr1 = "UPDATE
					users
				 SET 
					suggested_talents = ".$status.", modified =".time()."
				 WHERE 
					id =".$user_id;
		$query1 = $this->db->query($qStr1);
		return $this->db->affected_rows();
	}
	/* -------- UPDATE FUNCTIONS <END> -------- */


}
/* End of file Search_model.php */
/* Location: ./application/models/frontend/Search_model.php */
?>