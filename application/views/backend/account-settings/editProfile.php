<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PROFILE SIDEBAR -->
		<div class="profile-sidebar">
			<!-- PORTLET MAIN -->
			<div class="portlet light profile-sidebar-portlet bordered">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
				<a href="javascript:;"><img src="<?php echo (!empty($common_data['user_data']['profile_image']))? ASSET_UPLOADS_BACKEND_DIR.'users/'.$common_data['user_data']['profile_image']:  ASSET_IMAGES_BACKEND_DIR.'profile-placeholder.png'?>" id="profile_image" class="img-responsive change-profile-image image" alt="">
					<i class="fa fa-pencil profile-edit"></i>
				</a>
				</div>
				 
				 <!-- <img src="<?php echo ASSET_IMAGES_BACKEND_DIR ?>avatar1.jpg" class="img-responsive" alt=""> -->
				
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<input id="imgInp2" type="file" name="imgInp2" style="display:none">
				<div class="profile-usertitle custom-padin-botom-15">
					<div class="profile-usertitle-name"> <?php echo ucfirst($common_data['user_data']['first_name']).' '.ucfirst($common_data['user_data']['last_name']) ?> </div>
					
				</div>
				<!-- END SIDEBAR USER TITLE -->
			</div>
			<!-- END PORTLET MAIN -->
		</div>
		<!-- END BEGIN PROFILE SIDEBAR -->
		<!-- BEGIN PROFILE CONTENT -->
		<div class="profile-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light bordered">
						<div class="portlet-title portlet-heading tabbable-line">
							<div class="caption caption-md">
								<i class="icon-user-following font-blue-madison"></i>
								<span class="caption-subject font-blue-madison bold uppercase">Edit Profile</span>
							</div>
						   <!-- <ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">Personal Info</a>
								</li>
							</ul>-->
						</div>
						<div class="portlet-body">
							<div class="tab-content">
								<!-- PERSONAL INFO TAB -->
								<div class="tab-pane active" id="tab_1_1">
									<form class="sec form-admin" method="post" id="updateAdminForm" name="updateAdminForm" onsubmit="updateAccount(<?php echo $common_data['user_data']['id'] ?>); return false;">
										<div class="form-group">
											<label class="control-label">First Name*</label>
											<input name="first_name" type="text" placeholder="John" class="form-control" value="<?php echo ucfirst($common_data['user_data']['first_name']) ?>"/></div>
										<div class="form-group">
											<label class="control-label">Last Name*</label>
											<input name="last_name" type="text" placeholder="Doe" class="form-control" value="<?php echo ucfirst($common_data['user_data']['last_name']) ?>"/></div>
										<div class="form-group">
											<label class="control-label">Phone*</label>
											<input name="phone" type="text" placeholder="+9710000000" class="form-control" value="<?php echo $common_data['user_data']['phone']?>"/> </div>
										<div class="form-group">
											<label class="control-label">Email</label>
											<input name="email" type="text" placeholder="omar@appstersinc.com" value="<?php echo $common_data['user_data']['email']?>" class="form-control" readonly/></div>
										<div class="form-group">

											<p class="error-message-note"></p>
											<p class="success-message-note"></p>
										</div>

										<div class="margiv-top-10">
											<button type="submit" class="btn blue update-button"> Save Changes</button>
											<!--<a href="javascript:;" class="btn default"> Cancel </a>-->
										</div>
									</form>
								</div>
								<!-- END PERSONAL INFO TAB -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PROFILE CONTENT -->
	</div>
</div>

<!-- END PAGE BASE CONTENT -->
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.page-sidebar-menu > li').removeClass('active');
});
</script>