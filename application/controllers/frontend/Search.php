<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends Common {
	//initializing public data variable for class
	public $data = '';
    function __construct() {
        parent::__construct();	
        //I.E Fix: Holds SESSION accross the DOMAIN
        header('P3P: CP="CAO PSA OUR"');
		//$this->comingSoon();
        //------------ Model Functions <Start>-----------------//	
        //------------ Model Functions <End>-----------------//	
        	
        //------------ Libraries <Start> -----------------//
		//------------ Libraries <End> -----------------//
		
		//------------ XAJAX <Start> -----------------//
		$this->xajax->configure('javascript URI',base_url().'xajax' );
		$this->xajax->processRequest();
		$this->xajax_js = $this->xajax->getJavascript( base_url() ); 	
		//------------ XAJAX <End> -----------------//
        $this->output->enable_profiler(false);
        
         //------------ Common Function <Start> -----------------//
		$this->commonFunction();
		$this->isLoggedIn();
		//$this->isLoggedIn();
        //------------ Common Function <End> -----------------//
		//------------ Class Common Values <Start> -----------------//
		$this->data['module'] = "04";
		$this->data['moduleName'] = "Search";
		$this->data['page'] = 'search';
		$this->data['menuName'] = "talent";
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: talents_scroll_ajax
	02: updateUserPastSearchAjax
	03: city_ajax

	--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: talents_scroll_ajax
	 *
	 * This function is used to add onload scroll in talent listing 
	 * 
	 *
	 */
	function talents_scroll_ajax(){
		//sanitize post value
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		$item_per_page = ITEMS_PER_ROW;
		$position = (($page_number-1) * $item_per_page);
		
		/* Filters */
		$query = $_POST['query'];
		$category = $_POST['category'];
		$gender = $_POST['gender'];
		$eye = (!empty($_POST['eye']))? '("' . str_replace(',', '","', $_POST['eye']) . '")':"";
		$hair = (!empty($_POST['hair']))? '("' . str_replace(',', '","', $_POST['hair']) . '")':"";
		$height = (!empty($_POST['height']))? '("' . str_replace(',', '","', $_POST['height']) . '")':"";
		$weight = $_POST['weight'];
		$age = $_POST['age'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		/* Filters */

		
		
		$user_details = $this->user_model->getUserById($this->session->userdata(WEBSITE_FRONTEND_SESSION));

		/* active applications */
		$talents = "";
		$talents = $this->search_model->getAllTalents($position,$item_per_page,$query,$category,$gender,$eye,$hair,$height,$weight,$age,$city,$country);
		// check if talent is bookmarked
		//pr($talents); die();
		if(!empty($talents)){
			foreach($talents as $key=>$row){
				$talents[$key]['bookmarked'] = $this->search_model->getBookmarkedTalent($row['id'],$user_details['id']);
			}
		}
		$cart_talents = $this->session->userdata(WEBSITE_CART_SESSION);
		$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION); 
		foreach($talents as $talent){
			$profile_image = (!empty($talent['profile_image']))? $talent['profile_image']:"profile-pic.jpg";
			$title = ($talent['bookmarked'] == ACTIVE_STATUS_ID)? "Bookmarked":"Bookmark";
			$bookmark_status = ($talent['bookmarked'] == ACTIVE_STATUS_ID)? DELETED_STATUS_ID:ACTIVE_STATUS_ID;
			$bookmark_class = ($talent['bookmarked'] == ACTIVE_STATUS_ID)? "fa-heart":"fa-heart-o";
			$bookmark = '';
			if($user_details['role'] == USER_ROLE_EMPLOYER && $user_details['role'] == ACTIVE_STATUS_ID){
				$bookmark = '<div class="product-buttons" id="bookmark_'.$talent["id"].'" title="'.$title.'">
								<a href="javascript:void(0)" onclick="bookmarkTalent('.$talent['id'].','.$user_details['id'].','.$bookmark_status.')" rel="nofollow" class="favorite_button">
									<i class="fa '.$bookmark_class.'"></i>
								</a>
							</div>';
			}
			$cat_fields = '';
			if($user_details['role'] == ACTIVE_STATUS_ID){
				if(!empty($talent['visible_category_fields'])){
					foreach($talent['visible_category_fields'] as $visible_category){
						if(!empty($talent[$visible_category['name']])){
							$cat_fields .= '<div><span class="bold">'.$visible_category['placeholder'].'</span><br>
											<span>'.$talent[$visible_category['name']].'</span>
										  </div>';
						}
					}
				}
			}
			$cart_class = "";
			if(isset($cart_talents) && !empty($cart_talents)){
				if(in_array($talent['id'],$cart_talents)){
					$cart_class = "in_cart";
				}
			}
			if(!empty($user_details) && $user_details['is_active'] != ACTIVE_STATUS_ID){
				$cat_fields = "Please complete your profile <a href='".ROUTE_PROFILE."'>here</a> to view details";
			}else if(empty($user_id)){
				$cat_fields = "Please <a href='".ROUTE_LOGIN."'>sign-in</a> to view details";
			}
			echo	'<div class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-4 talent-summary-view '.str_replace(" ","_", strtolower($talent['talent_category']))." ".'">
								<div id="listing'.$talent['id'].'" class="vertical-item item-type1 '.$cart_class.'">
									<div class="item-media">
										<img src="'.ASSET_UPLOADS_FRONTEND_DIR.'profile/'.$profile_image.'" alt="s">
										<span class="badge badge-warning cart-lable"><i class="flaticon-shopping-bag"></i> Already in cart</span>
										'.$bookmark.'
									</div>
									<div class="item-content">
										<h4>
											<a href="'.ROUTE_PORTFOLIO_DETAIL.'?talent='.$talent['id'].'">'.ucwords($talent['first_name'].' '.$talent['last_name']).'</a>
										</h4>
										<p>'.$talent['talent_category'].'</p>
										<div class="item-meta">
											'.$cat_fields.'
										</div>
										<div class="ds item-social darklinks">
											<div>
												<a class="talent_theme_button" href="'.ROUTE_PORTFOLIO_DETAIL.'?talent='.$talent['id'].'">Book Me</a>
											</div>
										</div>
									</div>
								</div>
							</div>';
		}
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 02: updateUserPastSearchAjax
	 *
	 * This function is used to update user search patterns 
	 * 
	 *
	 */
	function updateUserPastSearchAjax($param=null){
		// Checking whether parametres are nullor not
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$user_id = $param['user_id'];
			$status = $param['status'];
			$status = $this->search_model->updateUserPastSearch($user_id,$status);
			if($status){
				$objResponse->script( "window.location.reload();");
			} 
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 03: city_ajax
	 *
	 * This function is used to auto complete cities in the text field
	 * 
	 *
	 */
	function city_ajax(){
		if(isset($_GET['term'])){
			$city = $_GET['term'];
			$cities = $this->search_model->searchCity($city);
		}
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Ed>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	//FUNCTIONS LIST:
	//01: listing
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: listing
	 *
	 * This function is the entery point to this class. 
	 * It shows search listing view to the user
	 *
	 */
	
    public function listing() {
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		// ads
		$data['upper_ads'] = $this->page_model->getAdsById(M_RECTANGLE_300_250);
		$data['middle_ads'] = $this->page_model->getAdsById(HALF_PAGE_300_600);
		$data['lower_ads'] = $this->page_model->getAdsById(SQUARE_250_250);
		/* GET Filter value <start>*/
		$data['categories'] = $this->search_model->getAllCategories(0,0);
		//pr($data['categories']); die();
		$data['category_fields'] = $this->search_model->getAllCategoryFields();
		
		$data['countries'] = $this->user_model->getCountries();
		/* GET Filter value <end>*/
		
		$global_filters = array('query','category','gender','eye','hair','height','weight','age','city','country');
		$filters = $_GET;
		if(!empty($_GET)){
			$i=0;
			foreach($filters as $key=>$row){
				$abc[$i] = $key;
				$i++;
			}
			$containsSearch = $containsSearch = count(array_intersect($abc, $global_filters)) == count($abc);
			if(empty($containsSearch)){
				show_404();
				die();
			}
		}
		/* Filters */
		$query = (isset($_GET['query']))? $_GET['query']:"";
		$category = (isset($_GET['category']) && !empty($_GET['category']))? $_GET['category']:"";
		$gender = (isset($_GET['gender']) && !empty($_GET['gender']))? $_GET['gender']:"";
		$eye = (isset($_GET['eye']) && !empty($_GET['eye']))? '("' . str_replace(',', '","', $_GET['eye']) . '")':"";
		$hair = (isset($_GET['hair']) && !empty($_GET['hair']))? '("' . str_replace(',', '","', $_GET['hair']) . '")':"";
		$height = (isset($_GET['height']) && !empty($_GET['height']))? '("' . str_replace(',', '","', $_GET['height']) . '")':"";
		//$height = (isset($_GET['height']) && !empty($_GET['height']))? $_GET['height']:"";
		$weight = (isset($_GET['weight']) && !empty($_GET['weight']))? $_GET['weight']:"";
		$age = (isset($_GET['age']))? $_GET['age']:0;
		$city = (isset($_GET['city']))? $_GET['city']:"";
		$country = (isset($_GET['country']))? $_GET['country']:0;
		/* Filters */
		
		if(isset($data['common_data']['user_data']) && !empty($data['common_data']['user_data'])){
			/* save search */
			$search_array = array();
			$search_array['talent_catgory_id'] = (isset($_GET['category']) && !empty($_GET['category']))? explode(",",$_GET['category']):array();
			$search_array['eye_color'] = (isset($_GET['eye']) && !empty($_GET['eye']))? explode(",",$_GET['eye']):array();
			$search_array['hair_color'] = (isset($_GET['hair']) && !empty($_GET['hair']))? explode(",",$_GET['hair']):array();
			$search_array['height'] = (isset($_GET['height']) && !empty($_GET['height']))? explode(",",$_GET['height']):array();
			$search_array['weight'] = (isset($_GET['weight']) && !empty($_GET['weight']))? explode(",",$_GET['weight']):array();
			if(!empty($search_array['talent_catgory_id'])){
				$this->search_model->updateUserSearch($data['common_data']['user_data']['id'],$search_array['talent_catgory_id'],'talent_catgory_id');
			}
			if(!empty($search_array['eye_color'])){
				$this->search_model->updateUserSearch($data['common_data']['user_data']['id'],$search_array['eye_color'],'eye_color');
			}
			if(!empty($search_array['hair_color'])){
				$this->search_model->updateUserSearch($data['common_data']['user_data']['id'],$search_array['hair_color'],'hair_color');
			}
			if(!empty($search_array['height'])){
				$this->search_model->updateUserSearch($data['common_data']['user_data']['id'],$search_array['height'],'height');
			}
			if(!empty($search_array['weight'])){
				$this->search_model->updateUserSearch($data['common_data']['user_data']['id'],$search_array['weight'],'weight');
			}
			$data['search_cat_id'] = $this->search_model->getUserSearch($data['common_data']['user_data']['id'],'talent_catgory_id');
			$data['search_eye_color']= $this->search_model->getUserSearch($data['common_data']['user_data']['id'],'eye_color');
			$data['search_hair_color'] = $this->search_model->getUserSearch($data['common_data']['user_data']['id'],'hair_color');
			$data['search_height'] = $this->search_model->getUserSearch($data['common_data']['user_data']['id'],'height');
			$data['search_weight'] = $this->search_model->getUserSearch($data['common_data']['user_data']['id'],'weight');
			if($data['common_data']['user_data']['suggested_talents'] == ACTIVE_STATUS_ID && !isset($_GET['category'])){
				$category = (!empty($data['search_cat_id']))? $data['search_cat_id']:$category;
				$eye = (!empty($data['search_eye_color']))? '("' . str_replace(',', '","', $data['search_eye_color']) . '")':$eye;
				$hair = (!empty($data['search_hair_color']))? '("' . str_replace(',', '","', $data['search_hair_color']) . '")':$hair;
				$height = (!empty($data['search_height']))? '("' . str_replace(',', '","', $data['search_height']) . '")':$height;
				//$height = (!empty($data['search_height']))? $data['search_height']:$height;
				$weight = (!empty($data['search_weight']))? $data['search_weight']:$weight;
			}
			$data['past_search'] = $this->search_model->checkUserPastSearch($data['common_data']['user_data']['id']);
			//pr($data['past_search']); die();
			/* save search */
		}
		
		
		// get all talents
		$item_per_page = ITEMS_PER_ROW;
		$position = ((1-1) * $item_per_page);
		$data['talents'] = $this->search_model->getAllTalents($position,$item_per_page,$query,$category,$gender,$eye,$hair,$height,$weight,$age,$city,$country);
		// check if talent is bookmarked
		
		if(!empty($data['talents'])){
			foreach($data['talents'] as $key=>$row){
				if(isset($data['common_data']['user_data']) && !empty($data['common_data']['user_data'])){
					$data['talents'][$key]['bookmarked'] = $this->search_model->getBookmarkedTalent($row['id'],$data['common_data']['user_data']['id']);
				}else{
					$data['talents'][$key]['bookmarked'] = 0;
				}
			}
		
		}

		foreach($data['category_fields']['eye_color']['field_options'] as $index2=>$eye_colors){
			$count = 0;
			foreach($data['talents'] as $key=>$row){
				if($eye_colors['value_option']==$row['eye_color']){
					$data['category_fields']['eye_color']['field_options'][$index2]['count'] = ++$count;
				}
			}
		}
		
		foreach($data['category_fields']['hair_color']['field_options'] as $index3=>$hair_colors){
			$count = 0;
			foreach($data['talents'] as $key=>$row){
				if($row['hair_color'] == $hair_colors['value_option']){
					
					$data['category_fields']['hair_color']['field_options'][$index3]['count'] = ++$count;
				}
			}
		}
		$data['sub_cats'] = $this->page_model->getAllSubCategories($category);
		if(!empty($data['sub_cats']) && !empty($data['talents'])){
			foreach($data['sub_cats'] as $cat_index=>$cat){
				$count = 0;
				foreach($data['talents'] as $tal){
					if($cat['id'] == $tal['talent_category_id']){
						$data['sub_cats'][$cat_index]['talent_count'] = ++$count;
					}
				}
				if(!isset($data['sub_cats'][$cat_index]['talent_count'])){
					$data['sub_cats'][$cat_index]['talent_count'] = 0;
				}
			}
			
		}
		$data['talents_count'] = $this->search_model->getAllTalentsCount();
		
		$template['body_content'] = $this->load->view('frontend/search/listing', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
/* End of file Search.php */
/* Location: ./application/controllers/frontend/search.php */