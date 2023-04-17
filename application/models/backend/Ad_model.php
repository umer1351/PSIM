<?php
class Ad_model extends CI_Model {

    function __construct() {
    	parent::__construct();
    }
	
	//FUNCTIONS LIST:
	//01: getAds
	//02: getAdById
	//03: isCategoryExist
	//04: getAdDimensions
	//05: updateAdStatus
	//06: updateAd
	//07: insertAd
	
	//--- Get Functions ---
	//01: getAds
	function getAds(){
		$qStr = "SELECT ads.*,ad_dimensions.name as dimension_name,ad_dimensions.width,ad_dimensions.height
				FROM
					ads
				LEFT JOIN
					ad_dimensions
				ON
					ads.dimension_id = ad_dimensions.id
				WHERE 
					ads.is_active !=".DELETED_STATUS_ID."
				 ORDER BY ads.created DESC";
		$query = $this->db->query($qStr);
        return $query->result_array();
	}
	//02: getAdById
	function getAdById($ad_id){
		$qStr = "SELECT ads.*,ad_dimensions.width,ad_dimensions.height
					FROM
				 ads
				LEFT JOIN
					ad_dimensions
				ON
					ads.dimension_id = ad_dimensions.id
				 WHERE 
				 ads.is_active !=".DELETED_STATUS_ID." and ads.id = ".$ad_id."";
		$query = $this->db->query($qStr);
        return $query->row_array();
	}
	//03: isCategoryExist
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
	
	//04: getAdDimensions
	function getAdDimensions(){ 
		$qStr = "SELECT *
					FROM
				 ad_dimensions
				 WHERE 
				 is_active !=".DELETED_STATUS_ID;
		$query = $this->db->query($qStr);
		
        return $query->result_array();
	}
	
	//--- Get Functions ---
	//--- Update Functions ---
	//05: updateAdStatus
	function updateAdStatus($ad_id,$status){
		$qStr ="UPDATE ads
					SET
					is_active = '".$status."', modified='".time()."'
					WHERE	
					id=".$ad_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	
	//06: updateAd
	function updateAd($ad_id,$dimension_id,$link,$file_name){
		$qStr ="UPDATE ads
					SET
					dimension_id = '".$dimension_id."',link = '".$link."',url = '".$file_name."', modified='".time()."'
					WHERE	
					id=".$ad_id;
		$query = $this->db->query($qStr);
		return $this->db->affected_rows();	
	}
	//--- Update Functions ---
	
	//--- Insert Functions ---
	//07: insertAd
	function insertAd($dimension_id,$link,$file_name){
		$qStr = "INSERT INTO 
						ads
					 SET
						dimension_id = '".$dimension_id."',link = '".$link."',url = '".$file_name."',is_active = '".ACTIVE_STATUS_ID."', created = ".time();
		$query = $this->db->query($qStr);
		return $this->db->insert_id();
	}
	//--- Insert Functions ---
}
/* End of file Ad_model.php */
/* Location: ./application/models/backend/Ad_model.php */
?>