<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style"><?php echo ($slide ? 'Edit':'Add'); ?> Slide</h3>
			<div class="actions product-det-heading-n-btn">
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
			<form class="horizontal-form student-details-form custom-details-form" onsubmit="addHomeSlide(<?php echo ((isset($slide['id']) && !empty($slide['id'])) ? $slide["id"]:'0');?>); return false;" id="addHomepageSlideForm" name="addHomepageSlideForm" >
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
									<label class="control-label c-label">Slide Order</label>
									<input type="number" class="form-control" id="slide_order" placeholder="Slide Order" value="<?php echo ((isset($slide['order_id']) && !empty($slide['order_id'])) ? $slide['order_id']:'');?>">
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
									<img src="<?php echo (isset($slide['image_url']) && !empty($slide['image_url']))? ASSET_UPLOADS_FRONTEND_DIR."homeslider/".$slide['image_url']:ASSET_IMAGES_BACKEND_DIR.'dummy-img.png'; ?>" id='image_id' class="image" alt="Home Slider Image" data-tag="<?php echo (isset($slide['image_url']) && !empty($slide['image_url']))? $slide['image_url']:0; ?>">
                                    <input type="hidden" name="previously_empty_img" value="<?php echo (isset($slide['image_url']) && !empty($slide['image_url']))? 0:1; ?>" />
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
					<button type="submit" class="btn blue" onClick="addHomeSlide(<?php echo ((isset($slide['id']) && !empty($slide['id'])) ? $slide["id"]:0);?>); return false;"> <i class="fa fa-check"></i> Save</button>
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