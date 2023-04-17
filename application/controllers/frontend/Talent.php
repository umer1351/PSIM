<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talent extends Common {
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
        //------------ Common Function <End> -----------------//
		//------------ Class Common Values <Start> -----------------//
		$this->data['module'] = "06";
		$this->data['moduleName'] = "Talent";
		$this->data['page'] = 'talent';
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
	01: addTalenToCartAjax
	--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 01: addTalenToCartAjax
	 *
	 * This function is used to add talent to the cart
	 *
	 *
	 */
	function addTalenToCartAjax($param=null){
		// Checking whether parametres are nullor not
		if ($param != null) {

			$talent_id = $param['user_id'];
			$employer_id = $param['employer_id'];
			$date = $param['date'];

			$objResponse = new xajaxResponse();
			
			$cart_talents = $this->session->userdata(WEBSITE_CART_SESSION);
			$talents = (isset($cart_talents) && !empty($cart_talents))? $cart_talents:array();
	//		$last_key = key( array_slice( $talents, -1, 1, TRUE ) );
			if(!in_array($talent_id, $talents)){
				array_push($talents,$talent_id);
			}
			$this->session->set_userdata(WEBSITE_CART_SESSION,$talents);
			$all_cart_talents = array();
			foreach($talents as $key=>$talent){
				$all_cart_talents[$key] = $this->user_model->getUserById($talent);
			}
			$cart_html = "";
			foreach($all_cart_talents as $all_cart_talent){
				$cart_html .= '<li class="media talent-cart-'.$all_cart_talent['id'].'"><div class="media-left media-middle"><a href="'.ROUTE_PORTFOLIO_DETAIL.'?talent='.$all_cart_talent['id'].'"><img src="'.ASSET_UPLOADS_FRONTEND_DIR.'profile/'.$all_cart_talent['profile_image'].'" alt=""></a></div><div class="media-body media-middle"><h4><a href="'.ROUTE_PORTFOLIO_DETAIL.'?talent='.$all_cart_talent['id'].'">'.ucwords($all_cart_talent['first_name'].' '.$all_cart_talent['last_name']).'</a></h4></div><div class="media-body media-middle"><a href="javascript:void(0)" class="remove" onclick="removeTalent('.$all_cart_talent['id'].')" title="Remove this item"><i class="rt-icon2-trash highlight"></i></a></div></li>';
				
			}
			$cart_talent_id = "";
			if(isset($talents) && !empty($talents)){
				foreach($talents as $cart_talent_session){
					$cart_talent_id .= $cart_talent_session."-";
				}
				$objResponse->script('$("#talent_ids").val("'.$cart_talent_id.'");');
			}
			$objResponse->script('$("#talent_count").show();');
			$objResponse->script('$("#book_more").show();');
			$objResponse->script('$("#talent_count").text("");');
			$objResponse->script('$("#talent_count").text("'.count($talents).'");');
			$objResponse->script('$("#no_talent_cart").hide();');
			$objResponse->script('$("#talent_cart").show();');
			$objResponse->script('$("#all_cart_talents").html("");');
			$objResponse->script('$("#complete_assignment_modal #all_cart_talents").html("");');
			$objResponse->script("$('#all_cart_talents').html('".$cart_html."');");
			$objResponse->script("$('#complete_assignment_modal #all_cart_talents').html('".$cart_html."');");
			$objResponse->script('$(".already_in_cart").show();');
		} 
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Ed>
	|--------------------------------------------------------------------------
	*/
	
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	//FUNCTIONS LIST:
	//01: talentDetail
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 01: talentDetail
	 *
	 * This function is the entery point to this class. 
	 * It shows talent detail view to the user.
	 *
	 */
	
    public function talentDetail() {
		$this->isLoggedIn();
		//assign public class values to function variable
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		
		if(!isset($_GET['talent']) || empty($_GET['talent'])){
			header("Location: ".SERVER_URL);
			die();
		}

		$data['talent_id'] = $_GET['talent'];
		
		$data['user'] = $this->user_model->getUserById($data['talent_id']);


		if(empty($data['user'])){
			header("Location: ".SERVER_URL);
			die();
		}
		$data['bookmark_status'] = 2;
		$data['show_bookmark'] = 0;
		if($data['common_data']['user_data']['role']==USER_ROLE_EMPLOYER && $data['user']['is_active']!=ACTIVE_STATUS_ID){
			header("Location: ".SERVER_URL);
			die();
		}else if($data['common_data']['user_data']['role']==USER_ROLE_EMPLOYER && $data['common_data']['user_data']['is_active']!=ACTIVE_STATUS_ID){
			header("Location: ".SERVER_URL);
			die();
		}else if(($data['common_data']['user_data']['role']==USER_ROLE_TALENT && $data['common_data']['user_id']!=$data['talent_id'])){
			header("Location: ".SERVER_URL);
			die();
		}
		if($data['common_data']['user_data']['role']==USER_ROLE_EMPLOYER){
			$data['bookmark_status'] = $this->portfolio_model->checkBookmarkStatus($data['common_data']['user_id'],$data['talent_id']);
			$data['show_bookmark'] =1;
		}
		if(!empty($data['user']) && !empty($data['user']['parent_id'])){
			$parent_category = $this->profile_model->getCategoryById($data['user']['parent_id']);
			$data['user']['parent_category'] = "";
			if(!empty($parent_category)){
				$data['user']['parent_category'] = $parent_category['title'];
			}
		}
		$counter = 0;
		if(!$this->session->userdata('profile_visited') && $data['common_data']['user_data']['role']==USER_ROLE_EMPLOYER){
				//echo "test"; die();
				$counter +=1;
				$this->portfolio_model->updateProfileViewCount($data['talent_id']);
				$this->session->set_userdata('profile_visited',TRUE);
				$data['user']['views'] = $this->portfolio_model->getProfileViewCount($data['talent_id']);
				//$this->session->set_userdata('counter',TRUE);
				//$_SESSION['visited'] = TRUE;
				//$_SESSION['counter'] = $counter;
		}
		$field_ids = $this->profile_model->getCategoryFieldIds($data['user']['talent_category_id']);
		$data['field_names'] = $this->profile_model->getCategoryFieldNames($field_ids['field_ids']);
		$data['show_bio'] = 0 ;
		foreach($data['field_names'] as $field){
			if($field['name']=="bio"){
				$data['show_bio'] = 1;
			}
		}
		
		$portfolio_videos = $this->portfolio_model->getTalentPortfolioVideos($data['talent_id']);
		$portfolio_images = $this->portfolio_model->getTalentPortfolioImages($data['talent_id']);
		$data['user']['portfolio'] = array_merge($portfolio_videos,$portfolio_images);
		$data['user']['reviews'] = $this->portfolio_model->getTalentReviews($data['talent_id']);
		$data['events'] = $this->profile_model->getUnAvailabilityByTalentId($data['talent_id']);
		if(!empty($data['events'])){
			
			foreach($data['events'] as $key=>$row){
					$data['events'][$key]['db_id'] = $row['id'];
					$data['events'][$key]['title'] = ($row['is_wowzer_job'] == 1)? 'Engaged with wowzer':'Not Available';
					$data['events'][$key]['start'] = date('Y-m-d',$row['timestamp']);
					$data['events'][$key]['end'] = date('Y-m-d',$row['timestamp']);
					$data['events'][$key]['is_wowzer_job'] = $row['is_wowzer_job'];
					$data['events'][$key]['talent_job_detail_id'] = $row['talent_job_detail_id'];
					$data['events'][$key]['removal_requested'] = $row['removal_requested'];
					$data['events'][$key]['job_id'] = $row['job_id'];
					$data['events'][$key]['backgroundColor'] = ($row['is_wowzer_job'] == 1)? '#0000FF':'#FF0000';
			}
		}
		$data['selectable'] = 1;
		if($data['common_data']['user_data']['role'] == USER_ROLE_TALENT){
			$data['selectable'] = 0;
		}
		
		$template['body_content'] = $this->load->view('frontend/talent/portfolioDetail', $data, true);	
		$this->load->view('frontend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
	
}
/* End of file Talent.php */
/* Location: ./application/controllers/frontend/talent.php */