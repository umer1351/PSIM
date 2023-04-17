<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style">Edit Contact Page</h3>
			<div class="actions product-det-heading-n-btn">
				<div class="btn-group margin-between-buttons">
	
				</div>
			</div>
		</div>
		
		<!-- BEGIN FORM-->
			<form class="horizontal-form student-details-form custom-details-form" id="addAboutForm" name="addAboutForm" onsubmit="updateContact(); return false;" >
				<div class="form-body">
					<!--/row-->
					<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label"><b>Heading</b></label>
									<input type="text" class="form-control" id="top_section_1_heading" placeholder="" value="<?php echo $heading; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label"><b>Paragraph<b></label>
									<input type="text" class="form-control" id="top_section_1_content" placeholder="" value="<?php echo $content; ?>">
								</div>
							</div>
							
							<div class="col-md-12">
								<label class="control-label c-label"><b>Image</b></label>
								
								
								<!-- <span class="img_name"></span> -->
								  <input type="hidden" class="image_64" id="image_64">
								  <input type="file" name="imgInp" id='imgInp' style="display:none;" onclick="remove_style();">
								  <div id='add_product_image' class="category_banner_image">

									<img style=" width: 150px;margin-bottom: 10px;" src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?><?php echo $image ;?>" id='image_id' class="image" alt="Home Top Image" data-tag="0"> 
                                    <input type="hidden" id="previously_empty_img" value="<?php echo ($image && !empty($image))? $image:""; ?>" /> 
                                   </div>
									<!-- The fileinput-button span is used to style the file input field as button -->
									<span class="btn blue fileinput-button" onclick="upload_image_btn();"><span >Choose Image</span></span>
									<br/>
							</div>
							</br>			
					<!--/row-->
				</div>
				<p class="error-message-note">Please check all fields</p>
				<p class="success-message-note">Content has been updated!</p>
				<div class="form-actions right">
					<button type="submit" class="btn blue">Save Changes</button>
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
    
</script>