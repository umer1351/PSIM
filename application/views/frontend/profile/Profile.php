	<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title">Profile</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="<?php  echo base_url();?>">Home</a></li>
                            <li class="">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><div class="container standard-padding-y-half">
<div class="row">
		<div class="col-12">
			<!-- <h2 class="secondary-heading dark-colored hello-user-text">
			<img src="<?php echo (empty($common_data["user_data"]["profile_image"])?ASSET_USERS_UPLOADS_FRONTEND_DIR.'no-profile.jpg':ASSET_USERS_UPLOADS_FRONTEND_DIR.$common_data["user_data"]['profile_image'])?>" class="img-fluid rounded-circle mr-4" alt="" />Hi <?php echo $common_data['user_data']['first_name']; ?>!
			</h2> -->
		</div>
	</div>
	<div class="low-spacer"></div>
<div class="row">
		

			<!--   -->
		
		<div class="col-md-8 account-pages-main-section">
			<form class="custom-form"  id="updateServiceProviderAccount">
				<div class="form-row">
			    <div class="col">
			    	<div class="form-group text-center text-md-left">
			    		<!-- <div class="profile-pic-update">
			    			<input id="imgInp" type="file" name="imgInp" >
			    			<img src="<?php echo (empty($common_data["user_data"]["profile_image"])?ASSET_USERS_UPLOADS_FRONTEND_DIR.'no-profile.jpg':ASSET_USERS_UPLOADS_FRONTEND_DIR.$common_data["user_data"]['profile_image'])?>" alt="" id="image-preview" class="img-fluid rounded-circle" alt="" />
					    	<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>add-dp-icon.svg" class="update-pp-icon" alt="" />

								<input type="hidden" id="profile_image" value="<?php echo $common_data['user_data']['profile_image'] ?>">
								<input type="hidden" id="profile_image_base64" value="">
								<input type="hidden" id="is_base64_method" value="0">
			    			<input type="hidden" id="role_type" value="<?php echo $common_data['user_data']['user_type'] ?>">
			    		</div> -->
					  </div>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_fname">Name</label>
					    <input type="text" class="form-control" id="account_fname" aria-describedby="account_fnameHelp" placeholder="John" required="" value="<?php echo $common_data['user_data']['first_name'] ?>" required/>
					  </div>
			    </div>
			    <div class="col">
			      <div class="form-group text-left">
				    	<label for="account_lname">PMDC ID</label>
					    <input type="text" class="form-control" id="account_lname" aria-describedby="account_lnameHelp" placeholder="Doe" value="<?php echo $common_data['user_data']['id'] ?>" readonly />
					  </div>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_phone">Email</label>
					    <input type="text" class="form-control" id="account_email" aria-describedby="account_phoneHelp" placeholder="someone@plaany.com"  value="<?php echo $common_data['user_data']['email'] ?>" disabled />
					  </div>
			    </div>
			    <div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_phone">Phone</label>
					    <input type="text" class="form-control" id="account_phone" aria-describedby="account_phoneHelp" placeholder="+00-0000000" required="" value="<?php echo $common_data['user_data']['phone'] ?>" required />
					  </div>
			    </div>
			    
			  </div>
			  <div class="form-row">
			  	<div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_phone">Institute</label>
					    <input type="text" class="form-control" id="institute" aria-describedby="account_phoneHelp" placeholder="Institute"  value="<?php echo $common_data['user_data']['institute'] ?>"  />
					  </div>
			    </div>
			    <div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_phone">Designation</label>
					    <input type="text" class="form-control" id="designation" aria-describedby="account_phoneHelp" placeholder="designation" required="" value="<?php echo $common_data['user_data']['designation'] ?>" required />
					  </div>
			    </div>
			    
			  </div>
			  <div class="form-row">
			  	<div class="col-6" style="display:none;">
			      <div class="form-group text-left">
				    	<label for="account_state_province" style="display:none;">State</label>
					  
					    <select class="form-control selectpicker select2" id="states" name="states" >
							
							
							<option value="1">Punjab</option>
							
						</select>
					  </div>
			    </div>
			    <div class="col-6" style="display:none;">
			    	<div class="form-group text-left">
				    	<label for="account_country" style="display:none;">Country</label>
				    	<select class="form-control selectpicker select3" id="country" name="country" >
							
							<option value="1">pakistan</option>
						
						</select>
					  </div>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col" style="display:none;">
			    	<div class="form-group text-left">
				    	<label for="account_city" style="display:none;">City</label>				    	
					   
					    <select class="form-control selectpicker select3" id="account_city" name="account_city" >
							<!-- <option value="0">Country</option> -->
							
							<option value="1">Lahore</option>
						
						</select>
					  </div>
			    </div>
			    <div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_address">Address</label>
					    <input type="text" class="form-control" id="account_address" aria-describedby="account_addressHelp" placeholder="1891 Progress Way" required="" value="<?php echo $common_data['user_data']['address']  ?>"  required/>
					  </div>
			    </div>
			    <div class="col">
			    	<div class="form-group text-left">
				    	<label for="account_address">Password</label>
					    <input type="text" class="form-control" id="password" aria-describedby="account_addressHelp"  required="" value=""  required/>
					  </div>
			    </div>
			  </div>
			  <div class="form-row " style ="display: none;">
			    <div class="col" >
			    	<div class="form-group text-left">
				    	<label for="account_about_me">About me</label>
				    	<textarea class="form-control" id="account_about_me" aria-describedby="account_about_meHelp" placeholder="" ><?php echo $common_data['user_data']['about']  ?>appsters</textarea>
					  </div>
			    </div>
			  </div>
			  <div class="low-spacer"></div>
			  <div class="actions">
			  	<button type="button" onclick="updateServiceProviderAccount(<?php echo $common_data['user_data']['id']; ?>); " class="btn btn-custom">Update</button>
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
