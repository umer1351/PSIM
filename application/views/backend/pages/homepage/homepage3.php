<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style">Edit Middle Section (Left)</h3>
			<div class="actions product-det-heading-n-btn">
				<div class="btn-group margin-between-buttons">
					<!--<a class="btn green-btn-custom" data-toggle="modal" onclick="updateAboutContentStatus('<?php echo $page_data['id'] ?>','<?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?"Disable this section":"Enable this section"?>','<?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?INACTIVE_STATUS_ID:ACTIVE_STATUS_ID?>')" href="javascript:void(0)"> <span><i class="fa <?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?'Disable':"Enable"?></span> </a>-->
				</div>
			</div>
		</div>
		
		<!-- BEGIN FORM-->
			<form class="horizontal-form student-details-form custom-details-form" id="addAboutForm" name="addAboutForm" onsubmit="updateMidLeftContent('3'); return false;" >
				<div class="form-body">
					<!--/row-->
					<div class="row">
						<?php foreach ($homepage_Right_Mid_content as $key => $value) { ?>
							
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="control-label c-label"><b>Heading</b></label>
									<input type="text" class="form-control" id="heading" placeholder="" value="<?php echo  $value['heading'];?>">
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="control-label c-label"><b>Paragraph</b></label>
									<input type="text" class="form-control" id="page_content_new" placeholder="" value="<?php echo  $value['sub_heading'];?>">
								</div>
							</div>
							<!-- style="display:none;" onclick="remove_style();" -->
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="form-group cateogory-banner-custom">
								<label class="control-label"><b>Image</b></label><br>
								<!-- <span class="img_name"></span> -->
								  <input type="hidden" class="image_64" id="image_64">
								   <input type="hidden" class="image_64" id="page_section" value="3">
								  <input type="file" name="imgInp" id='imgInp' style="display:none;" onclick="remove_style();">
								  <div id='add_product_image' class="category_banner_image">
									<img src="<?php echo ASSET_USERS_UPLOADS_BACKEND_DIR ?><?php echo $value['image'] ?>" id='image_id' class="image" alt="Home Top Image" data-tag="0">
                                    <input type="hidden" id="previously_empty_img" value="<?php echo (isset($value['image']) && !empty($value['image']))? $value['image']:""; ?>" />
                                   </div>
									<!-- The fileinput-button span is used to style the file input field as button -->
									<span class="btn blue fileinput-button" onclick="upload_image_btn();"><span >Choose Image</span></span>
								  <br>
								</br>
							</div>
							
						</div>	
							<div class="col-md-12 col-xs-12 col-sm-12">
								<!-- <div class="form-group">
									<label class="control-label c-label"><b>Paragraph</b></label>
									<textarea >

									<?php echo (!empty($value['content']))? $value['content']:''?>

								</textarea>
									
								</div> -->
								<!-- <div class="form-group">
									<label class="control-label c-label"><b>Paragraph</b></label>
									 <textarea class="form-control" id="page_content"><?php echo  $value['content'];?></textarea>
									<input type="text" class="form-control" id="page_content" placeholder="" value="<?php echo  $value['content'];?>">
								</div> -->
							</div>


						<?php } ?>
						
						
						<!-- <input type="hidden" value="<?php echo ABOUT_US ?>" data-url="<?php echo BACKEND_EDIT_ABOUT_US ?>" id="home_about_id">
						<br />						
						<div class="col-md-12">
							<div class="form-group">

								<textarea class="form-control" id="page_content" placeholder="Description">

									<?php echo (!empty($page_data['content']))? $page_data['content']:''?>

								</textarea>

							</div>
						</div>	
					</div> -->
					<!--/row-->
				</div>
				<p class="error-message-note">Please check all fields</p>
				<p class="success-message-note">Content has been updated!</p>
				<div class="form-actions right">
					<button type="submit" class="btn blue">Save Changes</button>
					<!--<button type="button" class="btn default">Cancel</button>-->
				</div>
				<br>
			</form>
	</div>
	<!-- END PAGE BASE CONTENT -->
</div>

<script type="text/javascript">
    function remove_style() {
            jQuery("#image_id").removeAttr("style");
    }
    jQuery(document).ready(function(){
    	$("[unselectable=on]").css("display", "none");
    	jQuery('.page-sidebar-menu > li').removeClass('active');
			jQuery('.page-sidebar-menu > li').removeClass('active');
			jQuery("#pages_li").addClass('active').addClass('open');
			jQuery(".<?php echo $page ?>").addClass('active');
    });
</script>