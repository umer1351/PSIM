
 
  

<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style"><?php echo ($slide ? 'Edit':'Add'); ?> Exams Details</h3>
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
			<form class="horizontal-form student-details-form custom-details-form" onsubmit="addExamsDetails(<?php echo ((isset($slide['id']) && !empty($slide['id'])) ? $slide["id"]:'0');?>); return false;" id="addHomepageSlideForm" name="addHomepageSlideForm" >
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
							<div class="col-md-12" style="display:none;">
								<div class="form-group">
									<label class="control-label c-label" >Title</label>
									<input type="text" class="form-control" id="topic" placeholder="Topic" value="a">
								</div>
							</div>
							<div class="col-md-12" style="display:none;">
								<div class="form-group">
									<label class="control-label c-label" style="display:none;">Short Description</label>
									<input type="" id="short_desc" value = "a" class="form-control">
									
								</div>
							</div>
							<div class="col-md-12" style="display:none;">
								<div class="form-group">
									<label class="control-label c-label">Venue</label>
									<input type="text" class="form-control" id="venue" placeholder="Venue" value="">
								</div>
							</div>
							<div class="col-md-12" style="display:none;">
								<div class="form-group">
									<label class="control-label c-label">Date </label>
									<input type="date" class="form-control" id="Time" placeholder="Registration date" value="">
									
								</div>
							</div>
							<div class="col-md-12" style="display:none;">
								<div class="form-group">
									<label class="control-label c-label">Speaker</label>
									<input type="text" class="form-control" id="Speaker" placeholder="Speaker" value="">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label c-label">Add Details</label>
									<textarea id="Details" class="form-control"></textarea>
								</div>
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
					<button type="submit" class="btn blue" onClick="addFellowshipDetails(<?php echo ((isset($slide['id']) && !empty($slide['id'])) ? $slide["id"]:0);?>); return false;"> <i class="fa fa-check"></i> Save</button>
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