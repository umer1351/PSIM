<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Backendcommon {
	//initializing public data variable for class
	public $data = '';
    function __construct() {
        parent::__construct();	
        //I.E Fix: Holds SESSION accross the DOMAIN
        header('P3P: CP="CAO PSA OUR"');
		 $this->isLoggedIn();	
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
        //------------ Common Function <End> -----------------//
		//------------ Class Common Values <Start> -----------------//
		$this->data['module'] = "06";	
		$this->data['moduleName'] = "Categories";
		$this->data['topModuleName'] = "Talent";
		$this->data['topModuleLink'] = BACKEND_TALENT_URL;
		$this->data['moduleLink'] = BACKEND_CATEGORIES_URL;
		$this->data['page'] = 'categories';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	 /*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: addCategoryAjax
	02: editCategoryAjax
	03: changeCategoryStatusAjax
	--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 01: addCategoryAjax
	 *
	 * This function is used to add new category
	 * 
	 *
	 */
	
	public function addCategoryAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$title = $param['title'];
			$description = $param['description']; 
			$category_fields = $param['category_fields']; 
			$parent_id = $param['parent_id'];
			$is_featured = $param['is_featured']; 
			$show_category_fields = $param['show_category_fields']; 
			$show_category_fields = implode(",",$show_category_fields);
			$check_category = $this->category_model->isCategoryExist($title);
			if(!empty($check_category)){
				$objResponse->script('$(".errorMsg").text("Category with same name already exists");');
				return $objResponse;
			}
			$response = $this->category_model->addCategory($title,$description,$category_fields,$parent_id,$is_featured,$show_category_fields);
			if($response){
				$objResponse->script('$("#settings .modal-title").text("Categories");');
				$objResponse->script('$("#settings .text").text("Category Added Successfully");');
				$url = "'".BACKEND_CATEGORIES_URL."'";
				$objResponse->script('var url="'.$url.'";');
				$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","redirect("+url+")");');
				$objResponse->script('$("#settings").modal("show");');
			}
		}
		return $objResponse;
	}
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 02: editCategoryAjax
	 *
	 * This function is used to edit category
	 * 
	 *
	 */
	public function editCategoryAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$cat_id = $param['cat_id'];
			$title = $param['title'];
			$description = $param['description']; 
			$category_fields = $param['category_fields']; 
			$parent_id = $param['parent_id'];
			$is_featured = $param['is_featured']; 
			$check_category = $this->category_model->isCategoryExist($title,$cat_id);
			if(!empty($check_category)){
				$objResponse->script('$(".errorMsg").text("Category with same name already exists");');
				return $objResponse;
			}
			$show_category_fields = $param['show_category_fields']; 
			$show_category_fields = implode(",",$show_category_fields);
			$response = $this->category_model->updateCategory($cat_id,$title,$description,$category_fields,$parent_id,$is_featured,$show_category_fields);
			if($response){
				$objResponse->script('$("#settings .modal-title").text("Categories");');
				$objResponse->script('$("#settings .text").text("Category Updated Successfully");');
				$url = "'".BACKEND_CATEGORIES_URL."'";
				$objResponse->script('var url="'.$url.'";');
				$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","redirect("+url+")");');
				$objResponse->script('$("#settings").modal("show");');
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 03: changeCategoryStatusAjax
	 *
	 * This function is used update category status
	 * 
	 *
	 */
	public function changeCategoryStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$cat_id = $param['cat_id'];
			$status = $param['status']; 
			$update_response = $this->category_model->updateCategoryStatus($cat_id,$status);
			if($update_response){
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <End>
	|--------------------------------------------------------------------------
	*/
	//FUNCTIONS LIST:
	//01: index
	//02: addCategory
	//03: editCategory
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: index
	 *
	 * This function is the entery point to this class. 
	 * It shows website category listing view
	 *
	 */
	 public function index() {
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['categories'] = $this->category_model->getAllCategories();
		if(!empty($data['categories'])){
			foreach($data['categories'] as $key=>$category){
				if($category['parent_id'] != 0){
					$data['categories'][$key]['parent_category'] = $this->category_model->getParentCategories($category['parent_id']);
				} else {
					$data['categories'][$key]['parent_category'] = "N/A";
				}
			}
		}
		$template['body_content'] = $this->load->view('backend/category/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 02: addCategory
	 *
	 * This function is the entery point to this class. 
	 * It shows website add new category view
	 *
	 */
	 public function addCategory() {
		$this->data['subModuleName'] = "Add Category";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['fields'] = $this->category_model->getCategoryFields();
		$data['categories'] = $this->category_model->getCategories();
		//pr($data['fields']); die();
		$template['body_content'] = $this->load->view('backend/category/addCategory', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 03: editCategory
	 *
	 * This function is the entery point to this class. 
	 * It shows website edit existing category view
	 *
	 */
	 public function editCategory() {
		$this->data['subModuleName'] = "Edit Category";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['fields'] = $this->category_model->getCategoryFields();
		if(!isset($_GET['cat_id'])) {
            header("Location: ".BACKEND_CATEGORIES_URL);
            die();
        }
		$data['cat_id'] = $_GET['cat_id'];
		$data['category'] = $this->category_model->getCategoryById($data['cat_id'] );
		$data['category']['field_ids'] = explode(',', $data['category']['field_ids']);
		$data['category']['visible_field_ids'] = explode(',', $data['category']['visible_field_ids']);
		if(empty($data['category'])){
			header("Location: ".BACKEND_CATEGORIES_URL);
            die();
		}
		$data['categories'] = $this->category_model->getCategories();
		$template['body_content'] = $this->load->view('backend/category/editCategory', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
/* End of file Category.php */
/* Location: ./application/controllers/backend/category.php */
