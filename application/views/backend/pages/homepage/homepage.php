<!-- Top Content -->
<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style">Edit Top Section</h3>
			<div class="actions product-det-heading-n-btn">
				<div class="btn-group margin-between-buttons">
	
				</div>
			</div>
		</div>
		
		<!-- BEGIN FORM-->
			<form class="horizontal-form student-details-form custom-details-form" id="addAboutForm" name="addAboutForm"  >
				<div class="form-body">
					<!--/row-->
					<div class="row">
						<?php foreach ($homepage_top_content as $key => $value) { ?>
							
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="control-label c-label"><b>Heading</b></label>
									<input type="text" class="form-control" id="heading" placeholder="" value="<?php echo  $value['heading'];?>">
								</div>
							</div>
							
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="form-group cateogory-banner-custom">
								<label class="control-label"><b>Image</b></label><br>
								<!-- <span class="img_name"></span> -->
								  <input type="hidden" class="image_64" id="image_64">
								  <input type="hidden" class="image_64" id="page_section" value="1">
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
						<?php } ?>
						
						
						
					<!--/row-->
				</div>
				
				<!-- <i class="error-icon"></i> <i class="success-icon"> -->
				<p class="error-message-note">Please check all fields</p>
				<p class="success-message-note">Content has been updated!</p>
				<div class="form-actions right">
					<button type="submit" onclick="updateTopContent(); return false;" class="btn blue">Save Changes</button>
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