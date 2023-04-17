
<div class="mainContentDiv" style="padding-left: 20rem;">
	<div class="col-sm-12 col-md-8 account-pages-main-section">

		
		<div class="medium-spacer"></div>

		<div class="d-flex align-items-center">
			<div>
				<div class="regular-text-lg ">You have currently <?php if($record['approval_member'] == '1'){ ?> subscription of <?php }elseif($record['approval_member'] == '0' && $record['premium_subscription'] != '0') { ?> applied for <?php } ?>  PSIM's<span class="bold-text dark-colored"><?php if($record['premium_subscription'] == '0'){ echo " Free Plan.";}elseif($record['premium_subscription'] == '1'){ echo " Life time Plan."; }else{ echo " Annual Plan.";  } ?></span></div>
				<?php if($record['stripe_account_type'] == '1'){ ?>
				<div class="regular-text">account valid till, 
					<span class="bold-text">
					<?php
						if($this->common_data['user_data']['stripe_account_type'] == '1'){
							$date = date('M d, Y', $this->common_data['user_data']['stripe_expiry_date'] );
							$new_date = strtotime($date);
							// $new_date = strtotime('+ 1 year', $date);
							echo date('M d, Y.', $new_date);
						}elseif($this->common_data['user_data']['stripe_account_type'] == '2'){
							$date = date('M d, Y', $this->common_data['user_data']['stripe_expiry_date'] );
							$new_date = strtotime($date);
							// $new_date = strtotime('+ 1 month', $date);
							echo date('M d, Y.', $new_date);
						}
					  
					 ?>

					</span>


				</div>
				
			<?php }else if($record['stripe_account_type'] == '2'){?>
				<div class="regular-text">Monthly Plan</div>
			<?php }if($record['stripe_connection'] == '0' || $record['stripe_connection'] == NULL){?>
				<!-- <div class="regular-text">Go Pro and enjoy the benefits of being Pro</div> -->
			<?php } ?>	
			</div>
			<div class="ml-auto">
				
			</div>
		</div>
		
		<div class="custom-breaker"></div>
		

		Get Lifetime membership and enjoy the following benefits:</br></br>
		<li>You will get unlimited free registrations.</li>
		<li>No recurring payment every year</li>
			


		<div class="medium-spacer"></div>
		<form class="custom-form gp" action=""  style="">
			<div class="row">
				<?php foreach ($record2 as $key => $value) { ?>
					
						
							<?php if($value['type'] == '2'){?>
								<div class="col-6 col-sm-5 pl-sm-3 pl-1">
								<div class="pkg-box <?php if($this->common_data['user_data']['premium_subscription'] == '1'){echo "pkg-selected" ;} ?>">
									<input type="radio" class="choose-account-option"    data_attr="<?php echo $value['price']; ?>" name="choose-account" id="" value="1" />
									<div class="pkg-name sub-heading">Lifetime</div>
									<div class="pkg-amount">Rs. <?php echo $value['price']; ?><small></small></div>
								</div>
							</div>
							<?php }else{ ?>
								<div class="col-6 col-sm-5 pr-sm-3 pr-1">
								<div class="pkg-box <?php if($this->common_data['user_data']['premium_subscription'] == '2'){echo "pkg-selected" ;} ?>">
									<input type="radio"  data_attr="<?php echo $value['price']; ?>" class="choose-account-option" name="choose-account" id="" value="2"/>
									<div class="pkg-name sub-heading">Annual</div>
									<div class="pkg-amount">Rs. <?php echo $value['price']; ?><small> /year</small></div>
								</div>
							</div>
							<?php } ?>
						
					
				<?php } ?>
				
			</div>
			<div class="medium-spacer"></div>
		<?php if($this->common_data['user_data']['premium_subscription'] == '0'){ ?>
		<button type="button" onclick="make_payment_modal(); return false;" class="btn btn-custom btn-custom-2">Pay Now </button>
		<?php }elseif($record['approval_member'] == '1' && $this->common_data['user_data']['premium_subscription'] == '1'){ ?>
			<p>You have already subscribed to Life time plan. Hence, you cannot subscribe to other plan.</p>

		
		<?php }elseif($record['approval_member'] == '1' && $this->common_data['user_data']['premium_subscription'] == '2'){ ?>
			<button type="button" onclick="make_payment_modal(); return false;" class="btn btn-custom btn-custom-2">Pay Now </button>

		<?php }elseif($record['approval_member'] == '0' && $this->common_data['user_data']['premium_subscription'] == '2'){ ?>
			<p>*You have already applied. Please wait for the approval.</p>

		<?php }?>	
		
		</form>
		<div class="medium-spacer"></div>
		<div class="medium-spacer"></div>
		<div class="medium-spacer"></div>
		<!-- <?php //if(!empty($record3)){ ?> -->
		
					
	</div>
	
</div>
</div>
<div class="modal fade standard-popup" id="makePayment-modal" tabindex="-1" aria-labelledby="makePayment-modalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>/cross-icon.svg" alt="">
						</button>
						<div class="text-center">
							<h4 class="sub-heading bold-text">Make Payment</h4>
							<input type="hidden" id="payment_selected" name="" value="">
							<input type="hidden" id="payment_value" name="" value="">
							<div class="medium-spacer"></div>
							<div class="standard-popup-image">
								<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>/make-payment-image.svg" class="img-fluid" alt="" />
							</div>
							<div class="medium-spacer"></div>
							<a href="javascript:void(0)" onclick="stripe_pymt1(); return false;" class="btn btn-custom btn-custom-small">Make Payment</a>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="modal fade standard-popup" id="cancel-modal" tabindex="-1" aria-labelledby="makePayment-modalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>/cross-icon.svg" alt="">
						</button>
						<div class="text-center">
							<h4 class="sub-heading bold-text">Are you sure you want to cancel renewal?</h4>
							<input type="hidden" id="payment_selected" name="" value="">
							<input type="hidden" id="payment_value" name="" value="">
							<div class="medium-spacer"></div>
							<div class="standard-popup-image">
								<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>/make-payment-image.svg" class="img-fluid" alt="" />
							</div>
							<div class="medium-spacer"></div>
							<a href="javascript:void(0)" onclick="cancel_renewal_ajax(); return false;" class="btn btn-custom btn-custom-small">Cancel Renewal</a>
						</div>
					</div>
				</div>
			</div>
		</div>		
<script type="text/javascript">
	function make_payment_modal() {
	 if($('input[name=choose-account]').is(':checked')) {
	 	var selected = $('input[name=choose-account]:checked').val();  

	 	var price = $('input[name=choose-account]:checked').attr('data_attr'); 
	 	$("#payment_selected").val(selected);
	 	$("#payment_value").val(price);
	 	// $("#makePayment-modal").modal().show(); 
		var url = "http://demo.psim.org.pk/member?type="+selected;
		window.location = url;
		}else{

		alert('Please select atleast one option');	

		}
		
	}

	function cancel_renewal() {
		
	 	$("#cancel-modal").modal().show(); 
	}
	function show_go_pro() {

		$('.gp').show();
		// $('.gpro').hide();
		
	}

</script>