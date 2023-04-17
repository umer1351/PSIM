<div class="page-fixed-main-content">
	<!-- BEGIN PAGE BASE CONTENT -->

	<div class="col-md-12 col-xs-12 col-sm-12 inner-content-details performance-form">
	
		
			<form class="horizontal-form student-details-form custom-details-form" method="post" id="updateUserForm" name="updateUserForm" onsubmit="updateUser(<?php echo $user['id']; ?>); return false;">
				<div class="form-body">
					<!--/row-->
					<div class="row">
						<div class="col-md-12">
							<div class="form-group profile-picture">
							   <label class="control-label col-md-12" style="padding-left: 0;">
							   	
<?php if($user['account_type'] === '2'){

	?>
							   	<?php echo $user['first_name']?> <?php echo $user['last_name']?><span class="premium-members"><svg xmlns="http://www.w3.org/2000/svg" width="46.391" height="44.38" viewBox="0 0 46.391 44.38"> <g id="star" transform="translate(1.525 -10.296)">
							    <g id="Group_3428" data-name="Group 3428" transform="translate(0 11.796)">
							      <path id="Path_2460" data-name="Path 2460" d="M43.279,27.5a1.269,1.269,0,0,0-1.025-.864L28.818,24.679,22.809,12.5a1.27,1.27,0,0,0-2.277,0L14.523,24.679,1.087,26.631a1.27,1.27,0,0,0-.7,2.166l9.722,9.477L7.811,51.655a1.27,1.27,0,0,0,1.842,1.338l12.017-6.318,12.017,6.318a1.27,1.27,0,0,0,1.842-1.339l-2.3-13.382L42.957,28.8A1.269,1.269,0,0,0,43.279,27.5Z" transform="translate(0 -11.796)" fill="none" stroke="#1b2328" stroke-width="3"></path>
							    </g>
							  </g>
							</svg></span>
<?php } else{?>
<?php echo $user['first_name']?> <?php echo $user['last_name']?>
<?php }?>
							   	 <a href="<?php echo BACKEND_SERVICE_PROVIDER_URL ?>" class="btn btn-custom back-to-button" ><i class="fa fa-angle-left"></i> Back to Service Providers</a></label>
								   
								<div class="fileinput fileinput-new " data-provides="fileinput">
									<div class="fileinput-new thumbnail align-center" style="width: 200px; ">
										<img src="<?php echo (empty($user['profile_image'])?
										ASSET_USERS_UPLOADS_FRONTEND_DIR.'no-profile.jpg':ASSET_USERS_UPLOADS_FRONTEND_DIR.$user['profile_image'])?>" alt="" /> </div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
									<div>
									   <!-- <span class="btn default btn-file">
											<span class="fileinput-new"> Select image </span>
											<span class="fileinput-exists"> Change </span>
											<input type="hidden" value="" name="..."><input type="file" id="logo1" name="logo1"></span>
										<a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>-->
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">First Name</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['first_name']?>" placeholder="John" readonly> 
							</div>
						</div>
												<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['last_name']?>" placeholder="Doe" readonly> 
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['email']?>" placeholder="Email" readonly> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Phone</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['phone']?>" placeholder="+00-0000000" readonly> 
							</div>
						</div>
												
						
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Address</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['address']?>" placeholder="Address" readonly> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">City</label>
								<!-- <input type="text" name="name" class="form-control" value="<?php echo $user['city']?>" placeholder="City" readonly> --> 
								 <select class="form-control selectpicker " id="account_city" name="account_city" disabled="" >
							<!-- <option value="0">Country</option> -->
							<?php foreach($city as $cities){ ?>
							<option value="<?php echo $cities['id'] ?>" <?php echo ($cities['id'] == $user['city'])? 'selected':''; ?>><?php echo $cities['city'] ?></option>
							<?php } ?>
						</select>
							</div>
						</div>
												
						
					</div>
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">State/Province</label>
								<!-- <input type="text" class="form-control" name="email" value="<?php echo $user['state']?>" placeholder="State" readonly>  -->
								<select class="form-control selectpicker select2" id="states" name="states" >
							
							<?php foreach($states as $state){ ?>
							<option value="<?php echo $state['id'] ?>" <?php echo ($state['id'] == $common_data['user_data']['states'])? 'selected':''; ?>><?php echo $state['name'] ?></option>
							<?php } ?>
						</select>
							</div>
						</div>
<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Country</label>
								<!-- <select name="city" class="form-control" disabled>
								<option value="0">Country</option>
								<?php
								foreach($countries as $country){
								?>                                                  
								  <option value="<?php echo $country['id'] ?>" <?php echo ($country['id']==$user['country_id'])?'selected':''?>><?php echo $country['name'] ?></option>
								 <?php
								 }
								 ?>
								</select>  -->
								<select class="form-control selectpicker select3" id="country" name="country"  disabled="">
							<!-- <option value="0">Country</option> -->
							<?php foreach($countries as $country){ ?>
							<option value="<?php echo $country['id'] ?>" <?php echo ($country['id'] == $user['country_id'])? 'selected':''; ?>><?php echo $country['name'] ?></option>
							<?php } ?>
						</select>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Services</label>

								<select class="form-control js-example-basic-single" id="account_select_service" aria-describedby="account_select_serviceHelp" multiple="multiple">
								<option value="0">Services</option>
									<?php foreach($services as $service){ ?>
									<option value="<?php echo $service['id'] ?>" 

									<?php

									if($service['selected'] == '1'){ echo 'selected'; }

									// echo ($service[''] == $common_data['user_data']['service_id'])? 'selected':''; ?>
									>

									<?php echo $service['name'] ?>
										
								</option> 
								<?php } ?>
							</select>
							<!-- 	<input type="text" class="form-control" name="city" value="<?php
										$i = 0;
										$len = count($services);
										foreach ($services as $service) {

											

										   if ($i == $len - 1) {
										        // last
										   	echo $service['name'];
										    }
										    else{
										    	echo $service['name'].", ";
										    }
										    // …
										    $i++;
										}
								

								  ?>" placeholder="" readonly>  -->
							</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
								<label class="control-label">About me</label>
								<input type="text" class="form-control" name="email" value="<?php echo $user['business_about']?>" placeholder="About me" readonly> 
							</div>
						
					</div>
					
				</div>
				<div class="form-group">
					<div class="errorMsg " style="color:red"></div>
				</div>
				
			</form>
			<!-- END FORM-->
			<!--/row--> 
			
			
		<div class="inner-portfolio">
			<h2>Portfolio</h2>
			<?php if(!empty($media)){ ?>
			<div class="carousel-wrap">
			  <div class="owl-carousel">
<?php
foreach ($media as $value) {

?>
			    <div class="item">

			    	<?php

$media_type = pathinfo($value['media']); ?>
<?php if($media_type['extension'] == 'mp4'){ ?>

<video width="100%" height="100%" controls>
<source src="<?php echo ASSET_USERS_UPLOADS_FRONTEND_DIR_PORTFOLIO.$value['media']?>" type="video/mp4">
</video>

<?php } else{ ?>

<img src="<?php echo ASSET_USERS_UPLOADS_FRONTEND_DIR_PORTFOLIO.$value['media']?>" >

<?php } ?>


			    </div>
		    
<?php }?>			  
			  </div>
			</div> 
		<?php }else{ ?>

		<div class="text-center">
		<h2 class="sub-heading dark-colored bold-text"><?php echo $user['first_name'] ?> has not uploaded his/her portfolio yet.</h2>
		<div class="medium-spacer"></div>
		<img class="img-fluid standard-empty-state" src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>no-reviews.svg" alt="" />
	</div>
		<?php }?>	
		</div>


</div>

		<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#date-picker').datepicker({
			maxDate: '0'
		});
	   //jQuery('.page-sidebar-menu > li').removeClass('active');
		jQuery("#users_li").addClass('open');
	});
</script>
	<!-- END PAGE BASE CONTENT -->
	</div>
	
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#date-picker').datepicker({
			maxDate: '0'
		});
	   //jQuery('.page-sidebar-menu > li').removeClass('active');
		jQuery("#users_li").addClass('open');
	});


jQuery('.owl-carousel').owlCarousel({
  loop: false,
  autoplay: false,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-angle-left'></i>",
    "<i class='fa fa-angle-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 2
    }
  }
})
	
</script>