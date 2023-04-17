<!-- <div class="page-fixed-main-content" style="min-height: 380px">
	
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style">Edit Section</h3>
			<div class="actions product-det-heading-n-btn">
				<div class="btn-group margin-between-buttons">
	
				</div>
			</div>
		</div>
		
		
			<form class="horizontal-form student-details-form custom-details-form" id="addAboutForm" name="addAboutForm" onsubmit="updatePricing(); return false;" >
				<div class="form-body">
				
					<div class="row">
						
						
							<div class="col-md-12">
								<label class="control-label c-label"><b>Top Section</b></label>
								<div class="form-group">
									<label class="control-label c-label">Heading</label>
									<input type="text" class="form-control" id="top_section_1_heading" placeholder="" value="<?php echo $top_section_1_heading; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Top Content</label>
									<input type="text" class="form-control" id="top_section_1_content" placeholder="" value="<?php echo $top_section_1_content; ?>">
								</div>
							</div>
							
							<div class="col-md-12">
								<label class="control-label c-label"><b>Planny's commission</b></label>
								<div class="form-group">
									<label class="control-label c-label">Heading</label>
									<input type="text" class="form-control" id="top_section_2_heading" placeholder="" value="<?php echo $top_section_2_heading; ?>">
								</div>
								<div class="form-group">
									<label class="control-label c-label">Content</label>
									<textarea class="form-control" id="top_section_2_content"><?php echo $top_section_2_content;?></textarea>
								</div>
								<label class="control-label">Image</label><br>
								<div class="col-md-12 col-xs-12 col-sm-12">
							 <div class="form-group cateogory-banner-custom">
								<label class="control-label">Image</label><br>
								  <input type="hidden" class="image_64" id="image_64">
								 
								   <input type="hidden" id='page_section' value="3">
								  <div id='add_product_image' class="category_banner_image">
									<img src="<?php echo ASSET_USERS_UPLOADS_BACKEND_DIR ?><?php echo $top_section_2_image ?>" id='image_id' class="image" alt="Home Top Image" data-tag="0">
                                    <input type="hidden" id="previously_empty_img" value="<?php echo (isset($top_section_2_image) && !empty($top_section_2_image))? $top_section_2_image:""; ?>" />
                                   </div>
									<span class="btn blue fileinput-button" onclick="upload_image_btn();"><span > <input type="file" name="imgInp" id='imgInp' >Choose Image</span></span>
								  <br>
							</div> 
						</div>
								 
							</div>
							</br>
							<div class="col-md-12">
								<label class="control-label c-label"><b>Price plans - Free</b></label>
								<div class="form-group">
									<label class="control-label c-label">Title</label>
									<input type="text" class="form-control" id="price_heading_free" placeholder="" value="<?php echo $top_section_3_title; ?>">
								</div>
								<div class="form-group">
									<label class="control-label c-label">Price</label>
									<input type="text" class="form-control" id="price_val" placeholder="" value="<?php echo $top_section_3_price; ?>">
								</div>	
								<div class="form-group">
									<label class="control-label c-label">Heading</label>
									<input type="text" class="form-control" id="heading_4" placeholder="" value="<?php echo $top_section_3_heading; ?>">
								</div>
								<div class="form-group">
									<label class="control-label c-label">Content</label>
									<textarea class="form-control" id="content_4" ><?php echo $top_section_3_content;?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<label class="control-label c-label"><b>Price plans - Pro</b></label>
								<div class="form-group">
									<label class="control-label c-label">Title</label>
									<input type="text" class="form-control" id="top_section_4_title" placeholder="" value="<?php echo $top_section_4_title; ?>">
								</div>
								<div class="form-group">
									<label class="control-label c-label">Price</label>
									<textarea class="form-control" id="top_section_4_price"><?php echo $top_section_4_price; ?></textarea> 
								</div>	
								<div class="form-group">
									<label class="control-label c-label">Heading</label>
									<input type="text" class="form-control" id="top_section_4_heading" placeholder="" value="<?php echo $top_section_4_heading; ?>">
								</div>
								<div class="form-group">
									<label class="control-label c-label">Content</label>
									<textarea class="form-control" id="top_section_4_content" ><?php echo $top_section_4_content;?></textarea>
								</div>
							</div>
							
						
						
				
				</div>
				<div class="form-group">
					<div class="errorMsg " style="color:red"></div>
				</div>
				<div class="form-actions right">
					<button type="submit" class="btn blue"> <i class="fa fa-check"></i> Save</button>
				</div>
				<br>
			</form>
	</div>
	
</div>
<script type="text/javascript">
    function remove_style() {
            jQuery("#image_id").removeAttr("style");
    }
    
</script> -->