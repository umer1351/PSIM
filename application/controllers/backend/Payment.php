<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends Backendcommon {
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
		$this->data['module'] = "07";	
		$this->data['moduleName'] = "Payment";
		$this->data['topModuleName'] = "Talent";
		$this->data['topModuleLink'] = BACKEND_TALENT_URL;
		$this->data['moduleLink'] = BACKEND_PAYMENT_PACKAGES_URL;
		$this->data['page'] = 'payment';
		//------------ Class Common Values <Start> -----------------//
    }
    
    /*
	|--------------------------------------------------------------------------
	| AJAX FUNCTIONS <Start>
	|--------------------------------------------------------------------------
	*/
	/*--------------------------------------------------------------------------------------------------------------------------
	
	FUNCTIONS LIST:
	01: addPricePackageAjax
	02: updateAdAjax
	03: changeAdStatusAjax
	02: editPricePackageAjax
	03: changePricePackageStatusAjax
	04: changeCouponCodeStatusAjax
	05: addCouponAjax
	06: editCouponAjax
	07: deleteTransactionAjax
	--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 01: addPricePackageAjax
	 *
	 * This function is used to add new price packages
	 * 
	 *
	 */
	public function addPricePackageAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$name = $param['name'];
			$amount = $param['amount'];
			$month_frequency = $param['month_frequency'];
			$description = $param['description']; 
			$check_category = $this->payment_model->isPricePackageExist($name,$month_frequency,$amount);
			if(!empty($check_category)){
				$objResponse->script('$(".errorMsg").text("Price package with same details already exists");');
				return $objResponse;
			}
			$response = $this->payment_model->addPricePackage($name,$amount,$month_frequency,$description);
			if($response){
				$objResponse->script('$("#settings .modal-title").text("Price Packages");');
				$objResponse->script('$("#settings .text").text("Price Package Added Successfully");');
				$url = "'".BACKEND_PAYMENT_PACKAGES_URL."'";
				$objResponse->script('var url="'.$url.'";');
				$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","redirect("+url+")");');
				$objResponse->script('$("#settings").modal("show");');
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 02: editPricePackageAjax
	 *
	 * This function is used to edit price packages
	 * 
	 *
	 */
	
	public function editPricePackageAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$pack_id = $param['pack_id'];
			$name = $param['name'];
			$amount = $param['amount'];
			$month_frequency = $param['month_frequency'];
			$description = $param['description']; 
			$check_category = $this->payment_model->isPricePackageExist($name,$month_frequency,$amount,$pack_id);
			if(!empty($check_category)){
				$objResponse->script('$(".errorMsg").text("Price package with same details already exists");');
				return $objResponse;
			}
			$response = $this->payment_model->updatePricePackage($pack_id,$name,$amount,$month_frequency,$description);
			if($response){
				$objResponse->script('$("#settings .modal-title").text("Price Packages");');
				$objResponse->script('$("#settings .text").text("Price Package Updated Successfully");');
				$url = "'".BACKEND_PAYMENT_PACKAGES_URL."'";
				$objResponse->script('var url="'.$url.'";');
				$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","redirect("+url+")");');
				$objResponse->script('$("#settings").modal("show");');
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 03: changePricePackageStatusAjax
	 *
	 * This function is used to change status of price packages
	 * 
	 *
	 */
	public function changePricePackageStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$pack_id = $param['pack_id'];
			$status = $param['status']; 
			$update_response = $this->payment_model->updatePricePackageStatus($pack_id,$status);
			if($update_response){
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 04: changeCouponCodeStatusAjax
	 *
	 * This function is used to change status of coupon code
	 * 
	 *
	 */
	public function changeCouponCodeStatusAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$coupon_id = $param['coupon_id'];
			$status = $param['status']; 
			$update_response = $this->payment_model->updateCouponCodeStatus($coupon_id,$status);
			if($update_response){
				$objResponse->script( "window.location.reload();");	
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 05: addCouponAjax
	 *
	 * This function is used to add coupon code
	 * 
	 *
	 */
	public function addCouponAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$discount_code = $param['coupon_code'];
			$startDate = strtotime($param['startDate']);
			$endDate = strtotime($param['endDate']);
			$discount_type = $param['discount_type'];
			$discount_value = $param['discount_value'];
			$reedeem_type = $param['reedeem_type'];
			$reedeem_cycle = $param['reedeem_cycle'];
			$check_coupon = $this->payment_model->isCouponCodeExist($discount_code);
			if(!empty($check_coupon)){
				$objResponse->script('$(".errorMsg").text("Coupon with same code already exists");');
				return $objResponse;
			}
			$response = $this->payment_model->addCouponCode($discount_code,$startDate,$endDate,$discount_type,$discount_value,$reedeem_type,$reedeem_cycle);
			if($response){
				$objResponse->script('$("#settings .modal-title").text("Coupon Codes");');
				$objResponse->script('$("#settings .text").text("Coupon Code Added Successfully");');
				$url = "'".BACKEND_COUPON_URL."'";
				$objResponse->script('var url="'.$url.'";');
				$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","redirect("+url+")");');
				$objResponse->script('$("#settings").modal("show");');
			}
		}
		return $objResponse;
	}
	/*--------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * 06: editCouponAjax
	 *
	 * This function is used to edit coupon code
	 * 
	 *
	 */
	public function editCouponAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$coupon_id = $param['coupon_id'];
			$discount_code = $param['coupon_code'];
			$startDate = strtotime($param['startDate']);
			$endDate = strtotime($param['endDate']);
			$discount_type = $param['discount_type'];
			$discount_value = $param['discount_value'];
			$reedeem_type = $param['reedeem_type'];
			$reedeem_cycle = $param['reedeem_cycle'];
			$check_coupon = $this->payment_model->isCouponCodeExist($discount_code,$coupon_id);
			if(!empty($check_coupon)){
				$objResponse->script('$(".errorMsg").text("Coupon with same code already exists");');
				return $objResponse;
			}
			$response = $this->payment_model->updateCouponCode($coupon_id,$discount_code,$startDate,$endDate,$discount_type,$discount_value,$reedeem_type,$reedeem_cycle);
			if($response){
				$objResponse->script('$("#settings .modal-title").text("Coupon Codes");');
				$objResponse->script('$("#settings .text").text("Coupon Code Updated Successfully");');
				$url = "'".BACKEND_COUPON_URL."'";
				$objResponse->script('var url="'.$url.'";');
				$objResponse->script('$("#settings .modal-footer>.blue").attr("onclick","redirect("+url+")");');
				$objResponse->script('$("#settings").modal("show");');
			}
		}
		return $objResponse;
	}
	
	/**
	 * 07: deleteTransactionAjax
	 *
	 * This function is used to delete subscription transaction
	 * 
	 *
	 */
	public function deleteTransactionAjax($param = null){
		$objResponse = new xajaxResponse();
		if ($param != null) { 
			$id = $param['id'];
			$status = $param['status']; 
			$update_response = $this->payment_model->deleteTransaction($id,$status);
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
	//02: addPricePackages
	//03: editPricePackages
	//04: editPricePackages
	//05: couponDetails
	//06: addCouponCode
	//07: editCouponCode
	//08: transactions
	//09: transactionDetail
	/*--------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * 01: index
	 *
	 * This function is the entery point to this class. 
	 * It shows website price packages listing view
	 *
	 */
	public function index() {
		$this->data['moduleName'] = "Price Packages";
		$this->data['page'] = 'price_package';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['packages'] = $this->payment_model->getPricePackages();
		//pr($data['packages']); die();
		$template['body_content'] = $this->load->view('backend/price-packages/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 02: addPricePackages
	 *
	 * This function is the entery point to this class. 
	 * It shows website price packages add view
	 *
	 */
	 public function addPricePackages() {
		$this->data['moduleName'] = "Price Packages";
		$this->data['page'] = 'price_package';
		$this->data['subModuleName'] = "Add Price Package";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		//pr($data['fields']); die();
		$template['body_content'] = $this->load->view('backend/price-packages/add', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 03: editPricePackages
	 *
	 * This function is the entery point to this class. 
	 * It shows website price packages edit view
	 *
	 */
	 public function editPricePackages() {
		$this->data['moduleName'] = "Price Packages";
		$this->data['page'] = 'price_package';
		$this->data['subModuleName'] = "Edit Price Package";
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		if(!isset($_GET['pack_id'])) {
            header("Location: ".BACKEND_PAYMENT_PACKAGES_URL);
            die();
        }
		$data['pack_id'] = $_GET['pack_id'];
		$data['price_package'] = $this->payment_model->getPricePackageById($data['pack_id'] );
		if(empty($data['price_package'])){
			header("Location: ".BACKEND_PAYMENT_PACKAGES_URL);
            die();
		}
		$template['body_content'] = $this->load->view('backend/price-packages/edit', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 04: editPricePackages
	 *
	 * This function is the entery point to this class. 
	 * It shows website coupon codes listing view
	 *
	 */
	public function couponCodes() {
		$this->data['moduleLink'] = BACKEND_COUPON_URL;
		$this->data['moduleName'] = "Coupons";
		$this->data['page'] = 'coupon';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['coupons'] = $this->payment_model->getCouponCodes();
		//pr($data['coupons']); die(); 
		$template['body_content'] = $this->load->view('backend/coupon-codes/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 05: couponDetails
	 *
	 * This function is the entery point to this class. 
	 * It shows website coupon codes detail view
	 *
	 */
	public function couponDetails() {
		$this->data['moduleLink'] = BACKEND_COUPON_URL;
		$this->data['moduleName'] = "Coupons";
		$this->data['subModuleName'] = "Coupon Details";
		$this->data['page'] = 'coupon';
		$data = $this->data;
		if(!isset($_GET['coupon_id'])) {
            header("Location: ".BACKEND_COUPON_URL);
            die();
        }
		$data['common_data'] = $this->common_data;
		$data['coupon_details'] = $this->payment_model->getCouponStatusDetails($_GET['coupon_id']);
		$data['coupon'] = $this->payment_model->getCouponById($_GET['coupon_id']);
		//pr($data['coupons']); die(); 
		$template['body_content'] = $this->load->view('backend/coupon-codes/couponDetails', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 06: addCouponCode
	 *
	 * This function is the entery point to this class. 
	 * It shows website coupon codes add view
	 *
	 */
	public function addCouponCode() {
		$this->data['moduleLink'] = BACKEND_COUPON_URL;
		$this->data['moduleName'] = "Coupons";
		$this->data['subModuleName'] = "Add New Coupon";
		$this->data['page'] = 'coupon';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$data['auto_coupon_code'] = generate_code(6);
		//echo $data['auto_coupon_code']; die();
		//pr($data['fields']); die();
		$template['body_content'] = $this->load->view('backend/coupon-codes/add', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 07: editCouponCode
	 *
	 * This function is the entery point to this class. 
	 * It shows website coupon codes edit view
	 *
	 */
	public function editCouponCode() {
		$this->data['moduleLink'] = BACKEND_COUPON_URL;
		$this->data['moduleName'] = "Coupons";
		$this->data['subModuleName'] = "Edit Coupon";
		$this->data['page'] = 'coupon';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		if(!isset($_GET['coupon_id'])) {
            header("Location: ".BACKEND_COUPON_URL);
            die();
        }
		$data['coupon_id'] = $_GET['coupon_id'];
		$data['coupon'] = $this->payment_model->getCouponById($data['coupon_id'] );
		$data['coupon']['start_date'] = date('d/m/Y',$data['coupon']['start_date']);
		$data['coupon']['end_date'] = date('d/m/Y',$data['coupon']['end_date']);
		if(empty($data['coupon'])){
			header("Location: ".BACKEND_COUPON_URL);
            die();
		}
		$data['auto_coupon_code'] = generate_code(6);
		//echo $data['auto_coupon_code']; die();
		//pr($data['fields']); die();
		$template['body_content'] = $this->load->view('backend/coupon-codes/edit', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 08: transactions
	 *
	 * This function is the entery point to this class. 
	 * It shows website transactions edit view
	 *
	 */
	public function transactions() {
		$this->data['moduleLink'] = BACKEND_TRANSACTIONS_URL;
		$this->data['moduleName'] = "Transactions";
		$this->data['page'] = 'transaction';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		$type = isset($_GET['type'])? $_GET['type']:0;
		$user_id = isset($_GET['user_id'])? $_GET['user_id']:0;
		$data['transactions'] = $this->payment_model->getTalentTransactions($type,$user_id);
		$data['users'] = $this->user_model->getUsers(USER_ROLE_TALENT);
		//pr($data['transactions']); die(); 
		$template['body_content'] = $this->load->view('backend/transactions/index', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	
	/**
	 * 09: transactionDetail
	 *
	 * This function is the entery point to this class. 
	 * It shows website transactions detail view
	 *
	 */
	public function transactionDetail() {
		$this->data['moduleLink'] = BACKEND_TRANSACTIONS_URL;
		$this->data['moduleName'] = "Talent Transactions";
		$this->data['subModuleName'] = "Transaction Details";
		$this->data['page'] = 'transaction';
		$data = $this->data;
		$data['common_data'] = $this->common_data;
		if(!isset($_GET['id'])) {
            header("Location: ".BACKEND_TRANSACTIONS_URL);
            die();
        }
		$data['id'] = $_GET['id'];
		$data['transaction'] = $this->payment_model->getTransactionByID($data['id']);
		if(empty($data['transaction'])){
			header("Location: ".BACKEND_TRANSACTIONS_URL);
            die();
		}
		//pr($data['transaction']); die(); 
		$template['body_content'] = $this->load->view('backend/transactions/transactionDetail', $data, true);	
		$this->load->view('backend/layouts/template', $template, false);		
	}
	/*-------------------------------------------------------------------------------------------------------------------------*/
}
/* End of file Payment.php */
/* Location: ./application/controllers/backend/payment.php */