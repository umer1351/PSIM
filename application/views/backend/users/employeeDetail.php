
<div class="page-fixed-main-content">
	<!-- BEGIN PAGE BASE CONTENT -->

	<div class="col-md-12 col-xs-12 col-sm-12 inner-content-details performance-form">
		<!--<h3 class="form-section float-left-style">Edit User</h3>-->
		
		
		<!-- BEGIN FORM-->
			<form class="horizontal-form student-details-form custom-details-form" method="post" id="updateUserForm" name="updateUserForm" onsubmit="updateUser(<?php echo $user['id']; ?>); return false;">
				<div class="form-body">
					<!--/row-->
					<div class="row">
						<div class="col-md-12">
							<div class="form-group profile-picture">
							   <label class="control-label col-md-12" style="padding-left: 0;"><?php echo $user['first_name']?>  <a href="<?php echo BACKEND_EVENT_ORGANIZER_URL ?>" class="btn btn-custom back-to-button" ><i class="fa fa-angle-left"></i> Back to Users</a></label>
								   
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px;">
										<img src="<?php echo (empty($user['profile_image'])?ASSET_USERS_UPLOADS_FRONTEND_DIR.'no-profile.jpg':ASSET_USERS_UPLOADS_FRONTEND_DIR.$user['profile_image'])?>" alt="" /> </div>
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
								<label class="control-label">Name</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['first_name']?>" placeholder="John" readonly> 
							</div>
						</div>
												
						
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['email']?>" placeholder="omar@appstersinc.com" readonly> 
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
								<label class="control-label">PMDC ID</label>
								<input type="text" name="name"  class="form-control" value="<?php echo $user['id']?>" placeholder="Address" readonly> 
							</div>
						</div>
						
												
						
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Designation</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['designation']?>" placeholder="Address" readonly> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Institute</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['institute']?>" placeholder="Address" readonly> 
							</div>
						</div>
						

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Fee Receipt </label>
								<img src="<?php echo (empty($user["fee_receipt"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_USERS_UPLOADS_FRONTEND_DIR_PORTFOLIO.$user['fee_receipt'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">PMDC Certificate </label>
								<img src="<?php echo (empty($user["pmdc_id"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."PMDCCERTIFICATE/".$user['pmdc_id'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
								
							</div>
						</div>
					
						

					</div>
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">ID card (back) </label>
								<img src="<?php echo (empty($user["id_card_back"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."IDCARDBACK/".$user['id_card_back'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">ID card (front) </label>
								<img src="<?php echo (empty($user["id_card_front"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."IDCARDFRONT/".$user['id_card_front'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
								
							</div>
						</div>
					
						

					</div>
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">fellowship fee </label>
								<img src="<?php echo (empty($user["fellowshipFee"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."fellowshipFee/".$user['fellowshipFee'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Fellowship CV</label>
								<img src="<?php echo (empty($user["fellowshipCV"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."fellowshipFee/".$user['fellowshipCV'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
								
							</div>
						</div>
					
						

					</div>
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Fellowship Application </label>
								<img src="<?php echo (empty($user["fellowhsipApplication"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."fellowshipFee/".$user['fellowhsipApplication'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
								
							</div>
						</div>
						
					
						

					</div>
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Degree </label>
								<img src="<?php echo (empty($user["degree"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."Degree/".$user['degree'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
								
							</div>
						</div>
					<div class="row">
						
					<div class="col-md-6">

							<div class="form-group">

								<label class="control-label">Approve Membership </label>
								<div class="form-check">
								  <input style="-webkit-appearance: radio;" class="form-check-input" type="radio" name="approveM" id="exampleRadios1" value="1" checked> Yes
								 
								  <input style="-webkit-appearance: radio;" class="form-check-input" type="radio" name="approveM" id="exampleRadios2" value="0" checked> No
								
								</div>
								
								
							</div>
						</div>
						<br>
						<br>
						<br>
						<button type="submit" onclick="approve_membership(<?php echo $user['id']?>); return false;">Submit</button>
						

					</div>
					<div class="row">
						
					
						

					</div>
					</br>
					</br>
					</br>
				</br>
				<h3><b>Subscriptions</b></h3>
					<div class="portlet-body">
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Name </th>
								
								<th scope="col"> Payment Status </th>   
							
								<!--<th scope="col"> Verified </th>-->
								<th scope="col"> Approval Status </th>
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($subscriptions)){
							$count = 0;
							foreach($subscriptions as $user){
							$count++;
						?>
								<tr id='user<?php echo $user['id']?>'>
									<td><?php echo $count; ?></td>
									<td><?php echo 'Examination Course'?></td>
									<td><?php if($user['payment_status'] == '1'){ echo 'Done'; }else{
										echo 'Pending';
									}   ?></td>
									<td><?php echo 'Examination Course'?></td>
									
									<td>
										<select class ="btn btn-sm  btn-default update_user_subscribe_status" id="update_user_subscribe_status" data="<?php echo $user['id'];?>">
									<option value="0" 
									  <?php if ($user['approval'] == 0): 
									  	echo "Selected";
									  ?>
									  	
									  <?php endif ?>

									  >Select</option>		
 								  <option value="1" 
									  <?php if ($user['approval'] == 1): 
									  	echo "Selected";
									  ?>
									  	
									  <?php endif ?>

									  >Approve</option>
								  <option value="2" 
									  <?php if ($user['approval'] == 2): 
									  	echo "Selected";
									  ?>
									  	
									  <?php endif ?>

									  >Reject</option> 
									  
									
								</select>					
									</td>
								
								</tr>
						<?php
							}
						}else{
						?>
						<th colspan="6" style="text-align:center">No Subscriptions Found!</th>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
					<!-- <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Business Name</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['business_name']?>" placeholder="Business Name" readonly> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">About our Business</label>
								<input type="text" name="name" class="form-control" value="<?php echo $user['about']?>" placeholder="About Business" readonly> 
							</div>
						</div>
												
						
					</div> -->
					
					<!--/row-->
					<!--/row-->
					<!--<div class="row">                            
						<div class="col-md-6">
						   <div class="form-group">
							   <label class="control-label">Profession</label>
								<input type="text" name="profession" class="form-control" value="<?php echo $user['profession_cat_id']?>" placeholder="Engineer"> 
							</div>
						</div>-->
					   <!-- <div class="col-md-6">
							<div class="form-group">
								<label class="control-label">D.O.B</label>
								<div class="custom-calender-input-style">
									<?php
									$date = date_create($user['d.o.b']);
									?>
									<input id="date-picker" name="dob" class="form-control form-control-inline date-picker" size="16" type="text" value="<?php echo ($user['d.o.b'] != "0000-00-00")?date_format($date,"m/d/Y"):''; ?>" placeholder="05/14/1990" readonly/>
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
								</div>
							</div> 
						</div>
					</div>-->
					<!--/row-->
					<!--/row-->
					<!--<div class="row">
						<div class="col-md-6">
						   <div class="form-group">
								<label class="control-label">Gender</label>
								<div class="mt-radio-inline">
									<label class="mt-radio">
										<input type="radio" class="gender" name="gender" id="optionsRadios4" value="<?php echo MALE ?>" <?php echo ($user['gender']==MALE)?'checked':''?>> Male
										<span></span>
									</label>
									<label class="mt-radio">
										<input type="radio" class="gender" name="gender" id="optionsRadios5" value="<?php echo FEMALE ?>" <?php echo ($user['gender']==FEMALE)?'checked':''?>> Female
										<span></span>
									</label>
								</div>
							</div>
						</div>
					</div> -->
					<!--/row-->
					<div class="row">
						<div class="col-md-12">
							<!-- <div class="form-group">
								<label class="control-label">About Employer</label>
								<textarea class="form-control" rows="5" placeholder="Lorem quis ut libero malesuada feugiat." disabled=""><?php echo $user['bio'] ?></textarea>
							</div> -->
						</div>   
					</div>
				</div>
				<div class="form-group">
					<div class="errorMsg " style="color:red"></div>
				</div>
				<!--<div class="form-actions right">
					<button type="submit" class="btn blue"> <i class="fa fa-check"></i> Save Changes</button>
					<!--<button type="button" class="btn default">Cancel</button>
				</div>-->
			</form>
			<!-- END FORM-->

	</div>

	<!-- END PAGE BASE CONTENT -->
	</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#date-picker').datepicker({
			maxDate: '0'
		});
		jQuery('.page-sidebar-menu > li').removeClass('active');
		jQuery('#employer_li').addClass('active');
		//jQuery("#users_li").addClass('open');
	});
	
</script>