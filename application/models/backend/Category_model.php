<?php
class Category_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: getCategories
	//02: getAllCategories
	//03: getCategoryById
	//04: isCategoryExist
	//05: getCategoryFields
	//06: getCategoryFields
	//07: getSubCategories
	//08: updateCategoryStatus
	//09: updateCategory
	//10: addCategory
	
	//--- Get Functions ---
	//01: getCategories
	function getCategories(){
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." AND parent_id=".INACTIVE_STATUS_ID."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        $categories = $query->result_array();
		foreach($categories as $index=>$category){
			$categories[$index]['sub_cats'] = $this->getSubCategories($category['id']);
		}
		return $categories;
	}
	
	//02: getAllCategories
	function getAllCategories(){
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active !=".DELETED_STATUS_ID."
				 ORDER BY created DESC";
		$query = $this->db->query($qStr);
        $categories = $query->result_array();
		return $categories;
	}
	
	//03: getCategoryById
	function getCategoryById($cat_id){
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." and id = ".$cat_id."";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	//04: isCategoryExist
	function isCategoryExist($cat_name,$cat_id=""){
		$where = ($cat_id!="")?" and id!=".$cat_id:"";
		$qStr = "SELECT *
					FROM
				 talent_categories
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." and title = '".$cat_name."'".$where;
		$query = $this->db->query($qStr);
		
        return $query->row_array();
	}

	//05: getCategoryFields
	function getCategoryFields(){
		$qStr = "SELECT *
					FROM
				 categories_fields
				 WHERE 
				 is_active !=".DELETED_STATUS_ID;
		$query = $this->db->query($qStr);
		
        return $query->result_array();
	}
	
	//06: getCategoryFields
	function getParentCategories($parent_id){
		$qStr = "SELECT title
					FROM
				 talent_categories
				 WHERE 
				 is_active !=".DELETED_STATUS_ID." AND id = ".$parent_id."";
		$query = $this->db->query($qStr);
        $result = $query->row_array();
		return $result['title'];
	}
	
	//07: getSubCategories
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
	//--- Get Functions ---
	//--- Update Functions ---
	//08: updateCategoryStatus
	function updateCategoryStatus($cat_id,$status){
		$qStr ="UPDATE talent_categories
					SET
					is_active = '".$status."', modified='".time()."'
					WHERE	
					id=".$cat_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//09: updateCategory
	function updateCategory($cat_id,$title,$description,$category_fields,$parent_id,$is_featured,$show_category_fields){
		$qStr ="UPDATE talent_categories
					SET
					title = '".$title."',description = '".$description."',field_ids = '".$category_fields."',visible_field_ids = '".$show_category_fields."',parent_id = '".$parent_id."',is_featured = '".$is_featured."', modified='".time()."'
					WHERE	
					id=".$cat_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	//--- Update Functions ---
	
	//--- Insert Functions ---
	//10: addCategory
	function addCategory($title,$description,$category_fields,$parent_id,$is_featured,$show_category_fields){
		$qStr = "INSERT INTO 
						talent_categories
					 SET
						title = '".$title."',description = '".$description."',field_ids = '".$category_fields."',visible_field_ids = '".$show_category_fields."',parent_id = '".$parent_id."',is_featured = '".$is_featured."',is_active = '".ACTIVE_STATUS_ID."', created = ".time();
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	//--- Insert Functions ---
}
/* End of file Category_model.php */
/* Location: ./application/models/backend/Category_model.php */
?>