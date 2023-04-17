<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style">Edit Section</h3>
			<div class="actions product-det-heading-n-btn">
				<div class="btn-group margin-between-buttons">
					<!--<a class="btn green-btn-custom" data-toggle="modal" onclick="updateAboutContentStatus('<?php echo $page_data['id'] ?>','<?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?"Disable this section":"Enable this section"?>','<?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?INACTIVE_STATUS_ID:ACTIVE_STATUS_ID?>')" href="javascript:void(0)"> <span><i class="fa <?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?'Disable':"Enable"?></span> </a>-->
				</div>
			</div>
		</div>
		
		<!-- BEGIN FORM-->
			<form class="horizontal-form student-details-form custom-details-form" id="addAboutForm" name="addAboutForm" onsubmit="editAboutSection(<?php echo $page_data['id']?>); return false;" >
				<div class="form-body">
					<!--/row-->
					<div class="row">
						<div class="col-md-4" style="display:none">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">URL</label>
									<input type="text" class="form-control" id="section_url" placeholder="" value="<?php echo ((isset($page_data['url']) && !empty($page_data['url'])) ? $page_data['url']:'');?>">
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
									<img src="<?php echo (isset($page_data['image_url']) && !empty($page_data['image_url']))? ASSET_UPLOADS_FRONTEND_DIR."home_about/".$page_data['image_url']:ASSET_IMAGES_BACKEND_DIR.'dummy-img.png'; ?>" id='image_id' class="image" alt="Home Slider Image" data-tag="<?php echo (isset($page_data['image_url']) && !empty($page_data['image_url']))? $page_data['image_url']:0; ?>">
                                                                        <input type="hidden" id="previously_empty_img" value="<?php echo (isset($page_data['image_url']) && !empty($page_data['image_url']))? $page_data['image_url']:""; ?>" />
                                                                  </div>
									<!-- The fileinput-button span is used to style the file input field as button -->
									<span class="btn blue fileinput-button" onclick="upload_image_btn();"><span >Upload</span></span>
								  <br>
							</div>
						</div>
						<input type="hidden" value="<?php echo ABOUT_US ?>" data-url="<?php echo BACKEND_EDIT_ABOUT_US ?>" id="home_about_id">
						<br />						
						<div class="col-md-12">
							<div class="form-group">

								<textarea class="form-control" id="page_content" placeholder="Description">

									<?php echo (!empty($page_data['content']))? $page_data['content']:''?>

								</textarea>

							</div>
						</div>	
					</div>
					<!--/row-->
				</div>
				<div class="form-group">
					<div class="errorMsg " style="color:red"></div>
				</div>
				<div class="form-actions right">
					<button type="submit" class="btn blue"> <i class="fa fa-check"></i> Save</button>
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
			jQuery('.page-sidebar-menu > li').removeClass('active');
			jQuery("#pages_li").addClass('active').addClass('open');
			jQuery(".<?php echo $page ?>").addClass('active');
    });
</script>