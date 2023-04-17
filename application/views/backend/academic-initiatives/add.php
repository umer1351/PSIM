<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style"><?php echo ($slide ? 'Edit':'Add'); ?> Academic Initiatives</h3>
			<div class="actions product-det-heading-n-btn">
				<div class="actions product-det-heading-n-btn">
				<?php if($slide){ ?>
				<!-- <a href="<?php echo BACKEND_ACADEMIC_DETAILS_ADD."?slide=".$slide['id'] ?>">Add Details</a> -->
				<a href="<?php echo BACKEND_ACADEMIC_MEDIA_ADD."?slide=".$slide['id'] ?>"> Add Poster & Media</a>
			<?php } ?>
			<?php
			if(isset($slide['is_active']) && $slide['is_active']==INACTIVE_STATUS_ID){
			?>
				
			<?php
			}
			if(isset($slide['is_active']) && $slide['is_active']==ACTIVE_STATUS_ID){
			?>
				
			<?php
			}
			?>
				
			</div>
			<?php
			if(isset($slide['is_active']) && $slide['is_active']==INACTIVE_STATUS_ID){
			?>
				<!-- <div class="btn-group margin-between-buttons">
					<a class="btn green-btn-custom" data-toggle="modal" onclick="update_status('<?php echo $slide['id'] ?>','homeSlide','changeHomeSlideStatus','<?php echo ACTIVE_STATUS_ID ?>')" href="javascript:void(0)"> <span><i class="fa fa-check"></i> Enable</span> </a>
					
				</div> -->
			<?php
			}
			if(isset($slide['is_active']) && $slide['is_active']==ACTIVE_STATUS_ID){
			?>
				<!-- <div class="btn-group margin-between-buttons">
					<a class="btn btn-danger" data-toggle="modal" onclick="update_status('<?php echo $slide['id'] ?>','homeSlide','changeHomeSlideStatus','<?php echo INACTIVE_STATUS_ID ?>')" href="javascript:void(0)"> <span><i class="fa fa-times"></i> Disable</span> </a>
				</div> -->
			<?php
			}
			?>
				<!-- <div class="btn-group margin-between-buttons">
					 <a class="btn blue" data-toggle="modal" onclick="update_status('<?php echo $slide['id'] ?>','homeSlide','changeHomeSlideStatus','<?php echo DELETED_STATUS_ID ?>')" href="javascript:void(0)"> <span><i class="fa fa-trash"></i> Delete</span> </a>
				</div> -->
			</div>
		</div>
		
		<!-- BEGIN FORM-->
		<form class="horizontal-form student-details-form custom-details-form" onsubmit="addExamsListing(<?php echo ((isset($slide['id']) && !empty($slide['id'])) ? $slide["id"]:'0');?>); return false;" id="addHomepageSlideForm" name="addHomepageSlideForm" >
				<div class="form-body">
					<!--/row-->
					<div class="row">
						<div class="col-md-4">
							<!-- <div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Slide URL</label>
									<input type="text" class="form-control" id="slide_url" placeholder="Slide Link" value="<?php echo ((isset($slide['slide_url']) && !empty($slide['slide_url'])) ? $slide['slide_url']:'');?>">
								</div>
							</div> -->
							<!-- <div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">URL Button Text</label>
									<input type="text" class="form-control" id="url_btn_text" placeholder="e.g. Read More" value="<?php echo ((isset($slide['url_btn_text']) && !empty($slide['url_btn_text'])) ? $slide['url_btn_text']:'');?>">
								</div>
							</div> -->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Top Information</label>
									<input type="text" class="form-control" id="top_information" placeholder="Top Information" value="<?php echo ((isset($slide['top_information']) && !empty($slide['top_information'])) ? $slide['top_information']:'');?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Title</label>
									<input type="text" class="form-control" id="title" placeholder="Title" value="<?php echo ((isset($slide['title']) && !empty($slide['title'])) ? $slide['title']:'');?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Details</label>
									<input type="text" class="form-control" id="details" placeholder="Details" value="<?php echo ((isset($slide['details']) && !empty($slide['details'])) ? $slide['details']:'');?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Register Date</label>
									<input type="date" class="form-control" id="register_date" placeholder="Registration date" value="<?php echo ((isset($slide['register_date']) && !empty($slide['register_date'])) ?  date('Y-m-d', $slide['register_date']):'') ;?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Expiry Date</label>
									<input type="date" class="form-control" id="expiry_date" placeholder="Course Duration" value="<?php echo ((isset($slide['expiry_date']) && !empty($slide['expiry_date'])) ? date('Y-m-d', $slide['expiry_date']):'');?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Course Starting Date</label>
									<input type="date" class="form-control" id="course_start_date" placeholder="Registration date" value="<?php echo ((isset($slide['course_start_date']) && !empty($slide['course_start_date'])) ? date('Y-m-d', $slide['register_date']):'');?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Price</label>
									<input type="text" class="form-control" id="price" placeholder="Price" value="<?php echo ((isset($slide['price']) && !empty($slide['price'])) ? $slide['price']:'');?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Subscription Required</label>
									<div class="form-check">
									  <input class="form-check-input radio-type" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
									
									    Yes
									  
									  <input class="form-check-input radio-type" type="radio" name="exampleRadios" id="exampleRadios2" value="0" >
									    No
									  
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Deffered</label>
									<div class="form-check">
									  <input class="form-check-input radio-type" type="radio" name="exampleRadios5" id="exampleRadios3" value="1" >
									
									    Yes
									  
									  <input class="form-check-input radio-type" type="radio" name="exampleRadios5" id="exampleRadios4" value="0" checked>
									    No
									  
									</div>
								</div>
							</div>
							<br>
							<br>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Enable Life time membership?</label>
									<div class="form-check">
									  <input class="form-check-input radio-type" type="radio" name="exampleRadios1" id="exampleRadios3" value="1" >
									
									    Enable
									  
									  <input class="form-check-input radio-type" type="radio" name="exampleRadios1" id="exampleRadios4" value="0" checked >
									    Disable
									  
									</div>
								</div>
							</div>
								
						</div>	
						<div class="col-md-8">
							<div class="form-group cateogory-banner-custom">
								<label class="control-label">Image</label><br>
								<!-- <span class="img_name"></span> -->
								  <input type="hidden" class="image_64" id="image_64">
								  <input type="file" name="imgInp" id='imgInp' style="display:none;" onclick="remove_style();">
								  <div id='add_product_image' class="category_banner_image">
									<img src="<?php echo (isset($slide['image']) && !empty($slide['image']))? ASSET_UPLOADS_FRONTEND_DIR."academic/".$slide['image']:ASSET_IMAGES_BACKEND_DIR.'dummy-img.png'; ?>" id='image_id' class="image" alt="Home Slider Image" data-tag="<?php echo (isset($slide['image']) && !empty($slide['image']))? $slide['image']:0; ?>">
                                    <input type="hidden" name="previously_empty_img" value="<?php echo (isset($slide['image']) && !empty($slide['image']))? 0:1; ?>" />
                                   </div>
									<!-- The fileinput-button span is used to style the file input field as button -->
									<span class="btn blue fileinput-button" onclick="upload_image_btn();"><span >Upload</span></span>
								  <br>
							</div>
							
						</div>
						<br />						
						<!-- <div class="col-md-12">
							<div class="form-group">

								<textarea class="form-control" id="page_content" placeholder="Description">

									<?php echo (!empty($slide['content']))? $slide['content']:''?>

								</textarea>

							</div>
						</div> -->	
					</div>
					<!--/row-->
				</div>
				<div class="form-group">
					<div class="errorMsg " style="color:red"></div>
				</div>
				<div class="form-actions right">
					<button type="submit" class="btn blue" onClick="addAcademicsAjax(<?php echo ((isset($slide['id']) && !empty($slide['id'])) ? $slide["id"]:0);?>); return false;"> <i class="fa fa-check"></i> Save</button>
					<!--<button type="button" class="btn default">Cancel</button>-->
				</div>
				<br>
			</form>
			</br>
			<div class="portlet-body">
				
				<div class="">
					<label class="control-label c-label"><h3><b>Course Details:</b></h3></label>
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Time </th>
								<th scope="col"> Speaker </th>
								<th scope="col"> Topic </th>   
								
								<th scope="col"> Details </th>
								
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
						<?php
						//print_r($users);die();
						if(!empty($sub_module)){
							$count = 0;
							foreach($sub_module as $module){
							$count++;
						?>
								<tr id="user">
									<td><?php echo $count; ?></td>
									<td ><?php echo $module['time']; ?></td>
									<td><?php echo $module['speaker']; ?></td>
									<td><?php echo $module['topic']; ?></td>
									
									<td>
									<?php echo $module['details']; ?>
									</td>
									
									
									<td>
									<a href="<?php echo BACKEND_EXAMS_DETAILS_EDIT."?module=".$module['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-eye"></i> Edit Details</a>
									</td>
								</tr>

						<?php
							}
						}else{
						?>
						<tr id="user" style="display: none;">
											<td>1</td>
											<td >N/A</td>
											<td>N/A</td>
											<td>N/A</td>
											
											
											
											
											<td>
												N/A
											
											
											</td>
											<td>
												N/A
											
											
											</td>
											</tr>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="portlet-body">
				<label class="control-label c-label"><h3><b>Registered users for this course:</b></h3></label>
						<div class="">
							<table id="stream_table1" class="table table-striped table-bordered table-hover table-students">
								<thead> 
									<tr>
										<th scope="col"> # </th>
										<th scope="col"> User Name </th>
										<th scope="col"> Payment Status </th>
										<th scope="col"> User Type </th>   
										
									
										
										<th scope="col"> Actions </th>
									</tr>
								</thead>
								<tbody>
								<?php
								//print_r($users);die();
								if(!empty($users_module)){
									$count = 0;
									foreach($users_module as $module){
									$count++;
								?>
										<tr id="user">
											<td><?php echo $count; ?></td>
											<td ><?php echo $module['first_name']; ?></td>
											<td><?php if($module['payment_status'] == '0'){
													echo 'Pending';
												}else{
													echo 'Paid';
												} ?></td>
											<td><?php 
											if($module['premium_subscription'] == '0'){
													echo 'Not a member';
												}elseif($module['premium_subscription'] == '1'){
													echo 'Lifetime member';
												}else{
													echo 'Annual member';
												}
										 ?></td>
											
											
											
											
											<td>

											<a href="<?php echo BACKEND_EVENT_ORGANIZER_DETAIL_URL."?user_id=".$module['user_id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-eye"></i> Edit Details</a>
											<select class ="btn btn-sm  btn-default update_user_subscribe_status1" id="update_user_subscribe_status" data="<?php echo $module['id'];?>">
													<option value="0" 
													  <?php if ($module['approval'] == 0): 
													  	echo "Selected";
													  ?>
													  	
													  <?php endif ?>

													  >Select</option>		
				 								  <option value="1" 
													  <?php if ($module['approval'] == 1): 
													  	echo "Selected";
													  ?>
													  	
													  <?php endif ?>

													  >Approve</option>
												  <option value="2" 
													  <?php if ($module['approval'] == 2): 
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
								<tr id="user" style="display: none;">
											<td>1</td>
											<td >N/A</td>
											<td>N/A</td>
											<td>N/A</td>
											
											
											
											
											<td>
												N/A
											
											
											</td>
										</tr>
								<?php
								}
								?>
								</tbody>
							</table>
						</div>
			</div>
			
	</div>
	<!-- END PAGE BASE CONTENT -->
</div>
<script type="text/javascript">
    function remove_style() {
            jQuery("#image_id").removeAttr("style");
    }
    jQuery(document).ready(function(){
            jQuery('.page-sidebar-menu > li').removeClass('active');
           jQuery("#pages_li").addClass('active').addClass('open');
						jQuery(".<?php echo $page ?>").addClass('active');
    });
</script>