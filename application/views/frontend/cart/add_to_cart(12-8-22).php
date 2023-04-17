	<div class="container standard-padding-y-half">
<div class="row">
		<div class="col-12">
			<h2 class="secondary-heading dark-colored hello-user-text">
			<img src="<?php echo (empty($common_data["user_data"]["profile_image"])?ASSET_USERS_UPLOADS_FRONTEND_DIR.'no-profile.jpg':ASSET_USERS_UPLOADS_FRONTEND_DIR.$common_data["user_data"]['profile_image'])?>" class="img-fluid rounded-circle mr-4" alt="" />Hi <?php echo $common_data['user_data']['first_name']; ?>!
			</h2>
		</div>
	</div>
	<div class="low-spacer"></div>
<div class="row">
		

			<!--   -->
		
		<div class="col-md-8 account-pages-main-section">
			<form class="custom-form"  id="updateServiceProviderAccount">
				
			  <div class="form-row">
			    <div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_fname">Full Name</label>
					    <input type="text" class="form-control" id="account_fname" aria-describedby="account_fnameHelp" placeholder="John" required="" value="<?php echo $common_data['user_data']['first_name'] ?>" disabled/>
					  </div>
			    </div>
			    <div class="col">
			      <div class="form-group text-left">
				    	<label for="account_lname">PMDC ID</label>
					    <input type="text" class="form-control" id="account_lname" aria-describedby="account_lnameHelp" placeholder="Doe" required="" value="<?php echo $common_data['user_data']['id'] ?>"  disabled/>
					  </div>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_phone"> Email</label>
					    <input type="text" class="form-control" id="account_email" aria-describedby="account_phoneHelp" placeholder="someone@plaany.com"  value="<?php echo $common_data['user_data']['email'] ?>" disabled />
					  </div>
			    </div>
			    <div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_phone">Phone</label>
					    <input type="number" class="form-control" id="account_phone" aria-describedby="account_phoneHelp" placeholder="92-0000000" required="" value="<?php echo $common_data['user_data']['phone'] ?>" required />
					  </div>
			    </div>
			    
			  </div>
			  <div class="form-row">
			  	<div class="col-6">
			      <div class="form-group text-left">
				    	<label for="account_state_province">Institute</label>
					  
					    <input type="text" class="form-control" id="institute" aria-describedby="account_phoneHelp" placeholder="Institute" required="" value="<?php echo $common_data['user_data']['institute'] ?>" required />
					  </div>
			    </div>
			    <div class="col-6">
			    	<div class="form-group text-left">
				    	<label for="account_country">Designation</label>
				    	<input type="text" class="form-control" id="designation" aria-describedby="account_phoneHelp" placeholder="Designation" required="" value="<?php echo $common_data['user_data']['designation'] ?>" required />
					  </div>
			    </div>
			  </div>
			  <div class="form-row">
			  
			    <div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_address">Address</label>
					    <input type="text" class="form-control" id="account_address" aria-describedby="account_addressHelp" placeholder="1891 Progress Way" required="" value="<?php echo $common_data['user_data']['address']  ?>"  required/>
					  </div>
			    </div>
			  </div>
			   	<?php $id = decrypt_url($_GET['u']); ?>
				<?php $t = decrypt_url($_GET['t']); ?>
			  <?php if($this->common_data['user_data']['premium_subscription'] == '1' && $this->common_data['user_data']['approval_member'] == '1' && $sub_module['premium_active'] == '1'){ ?>

			  	<label for="account_address">You're a lifetime member so you don't need to pay registration fee receipt.</label></br>

			  <?php }elseif($this->common_data['user_data']['premium_subscription'] == '2' && $this->common_data['user_data']['approval_member'] == '1'  && $sub_module['premium_active'] == '1'){  ?>

			  	<label for="account_address">You're an annual member so you don't need to pay registration fee receipt.</label></br>

			  <?php }else{?>

			  	<div class="form-row">
			    <div class="col">
			    	<div class="form-group text-center text-md-left">
			    		<label for="account_address">Payment Receipt</label></br>
			    		<div class="profile-pic-update">
			    			<input id="imgInp" type="file" name="imgInp" >
			    			<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>upload.png" alt="" id="image-preview" class="img-fluid rounded-circle" alt="" />
					    	<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>add-dp-icon.svg" class="update-pp-icon" alt="" />

								<!-- <input type="hidden" id="profile_image" value="<?php echo $common_data['user_data']['profile_image'] ?>"> -->
								<input type="hidden" id="profile_image_base64" value="">
								<input type="hidden" id="is_base64_method" value="0">
			    			<input type="hidden" id="role_type" value="<?php echo $common_data['user_data']['user_type'] ?>">
			    		</div>
					  </div>
			    </div>
			  </div>
			  <?php } ?>	
			  
			  <div class="low-spacer"></div>
			  <div class="actions">
			 
			 
			  
			
			  	<button type="button" onclick="checkout('<?php echo $id; ?>','<?php echo $t; ?>'); " class="btn btn-custom">Subscribe</button>
			  	<!-- <button type="button" class="btn btn-custom btn-custom-2 ml-2">Cancel</button> -->
			  </div>
			   <div class="medium-spacer"></div>
		          <div class="info-msg error-info-msg" style="display: none;">
		          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>error-warning.svg" class="img-fluid" alt="">
		          <div class="info-msg-text erro"></div>
		        </div>
		        <div class="info-msg success-info-msg" style="display: none;">
		          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>success-tick.svg" class="img-fluid" alt="">
		          <div class="info-msg-text succs"></div>
		        </div>
			</form>
		</div>
	</div>
</div>
</div>
