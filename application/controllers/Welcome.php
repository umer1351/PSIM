<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Common {
public $data = array();
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
		$this->data['module'] = "03";
		$this->data['moduleName'] = "Pages";
		$this->data['page'] = 'pages';
		//------------ Class Common Values <Start> -----------------//
    }
	public function index()
	{
		$this->load->view('product_form');		
	}

	public function check()
	{ 
		//check whether stripe token is not empty
		//echo("arg1");die();
		//print_r($_GET['amount']);die();
		if(!empty($_POST['stripeToken']))
		{ 
			//get token, card and user info from the form
			//print_r($_GET['services']);die();
			$token  = $_POST['stripeToken'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$card_num = $_POST['card_num_'];
			$card_cvc = $_POST['cvc'];
			$card_exp_month = $_POST['exp_month'];
			$card_exp_year = $_POST['exp_year'];
			$Service_id = $_GET['services'];
			$event_provider_id = $_GET['eventprovider'];
			$event = $_GET['event'];
			$amount = $_GET['amount'];
			$service_provider_id = $_GET['service_provider_id'];
			//include Stripe PHP library
			require_once APPPATH."third_party/stripe/init.php";
			
			//set api key
			$stripe = array(
			  "secret_key"      => "sk_test_wRQvAP7z1Z4IGRhlEtv3rjGU00UAqsvUc8",
			  "publishable_key" => "pk_test_N2lKycCMf0cMGL9FDRdP6z0T00ZEjL9YbP"
			);
			
			\Stripe\Stripe::setApiKey($stripe['secret_key']);
			
			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
				'email' => $email,
				'source'  => $token
			));
			
			//item information
			$itemName = "Stripe Donation";
			$itemNumber = $event;
			$itemPrice =$amount*10;
			$currency = "usd";
			$orderID = "SKA92712382139";
			
			//charge a credit or a debit card
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => $itemPrice,
				'currency' => $currency,
				'description' => $itemNumber,
				'metadata' => array(
					'item_id' => $itemNumber
				)
			));
			
			//retrieve charge details
			$chargeJson = $charge->jsonSerialize();

			//check whether the charge is successful
			if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
			{
				//order details 
			//	$amount = $chargeJson['amount'];
				$balance_transaction = $chargeJson['balance_transaction'];
				$currency = $chargeJson['currency'];
				$status = $chargeJson['status'];
				$date = date("Y-m-d H:i:s");
	//	print_r($amount);die();	
				
				//insert tansaction data into the database
				$dataDB = array(
					'event_planner_id' => $event_provider_id ,
					'service_provider_id' => $_GET['service_provider_id'],
					'job_id' => $event,
					'service_id'=> $Service_id,
					'name' => $name,
					'email' => $email, 
					'card_num' => $card_num, 
					'card_cvc' => $card_cvc, 
					'card_exp_month' => $card_exp_month, 
					'card_exp_year' => $card_exp_year, 
					'item_name' => $itemName, 
					'item_number' => $itemNumber, 
					'item_price' => $amount, 
					'item_price_currency' => $currency, 
					'paid_amount' => $amount, 
					'paid_amount_currency' => $currency, 
					'txn_id' => $balance_transaction, 
					'payment_status' => $status,
					'created' => $date,
					'modified' => $date
				);
				$this->db->insert('orders', $dataDB);

				$qStr = "UPDATE user_job set sp_id = '".$_GET['service_provider_id']."', job_status = '2', amount = '".$amount."' WHERE service_id = '".$Service_id."' AND job_id = '".$event."' AND eo_id = '".$event_provider_id."'";
				$query = $this->db->query($qStr);

				$qStr1 = "UPDATE job_status set status = '2' WHERE service_id = '".$Service_id."' AND job_id = '".$event."' AND ep_id = '".$event_provider_id."' AND sp_id = '".$_GET['service_provider_id']."'";
				$query1 = $this->db->query($qStr1);

				$qStr2 = "UPDATE job_status set status = '3' WHERE service_id = '".$Service_id."' AND job_id = '".$event."' AND ep_id = '".$event_provider_id."' AND sp_id != '".$_GET['service_provider_id']."'";
				$query2 = $this->db->query($qStr2);
				// return $result = $query->result_array();

				// if ($this->db->insert('orders', $dataDB)) {
					$data = $this->data;
					if($this->db->insert_id() && $status == 'succeeded'){
						$data['insertID'] = $this->db->insert_id();
						$user_id = $this->session->userdata(WEBSITE_FRONTEND_SESSION);

			
						//$data['record']=$this->Sp_event_model->getEventsEp($user_id);

						$data['common_data'] = $this->common_data;
						$data['common_data']['page'] = 'transactions';
						redirect($_SERVER['HTTP_REFERER']); 
					// 	$template['body_content'] = $this->load->view('frontend/em-transactions/transactions', $data, true);	
					// $this->load->view('frontend/layouts/template', $template, false);
						// redirect('Welcome/payment_success','refresh');
					// }else{
					// 	echo "Transaction has been failed";
					// }
				}
				else
				{
					redirect($_SERVER['HTTP_REFERER']); 
				}

			}
			else
			{
				echo "Invalid Token";
				$statusMsg = "";
			}
		}
	}

	public function payment_success()
	{
		$this->load->view('payment_success');
	}

	public function payment_error()
	{
		$this->load->view('payment_error');
	}

	public function help()
	{
		$this->load->view('help');
	}
}
