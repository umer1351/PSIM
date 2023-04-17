<!-- Middle Top Content -->
<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style">Edit Middle Section (Top)</h3>
			<div class="actions product-det-heading-n-btn">
				<div class="btn-group margin-between-buttons">
					<!--<a class="btn green-btn-custom" data-toggle="modal" onclick="updateAboutContentStatus('<?php echo $page_data['id'] ?>','<?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?"Disable this section":"Enable this section"?>','<?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?INACTIVE_STATUS_ID:ACTIVE_STATUS_ID?>')" href="javascript:void(0)"> <span><i class="fa <?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($page_data['is_active']==ACTIVE_STATUS_ID)?'Disable':"Enable"?></span> </a>-->
				</div>
			</div>
		</div>
		
		<!-- BEGIN FORM-->
			<form class="horizontal-form student-details-form custom-details-form" id="addAboutForm" name="addAboutForm">
				<div class="form-body">
					<!--/row-->
					<div class="row">
						<?php foreach ($homepage_top_Mid_content as $key => $value) { ?>
							
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="control-label c-label"><b>Heading</b></label>
									<input type="text" class="form-control" id="heading" placeholder="" value="<?php echo  $value['heading'];?>">
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<input type="hidden" name="" id="page_section" value="2">
									<label class="control-label c-label"><b>Sub-heading</b></label>
									<input type="text" class="form-control" id="sub_heading" placeholder="" value="<?php echo  $value['sub_heading'];?>">
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<label class="control-label c-label"><b>Paragraph</b></label>
									<textarea class="form-control" id="content"><?php echo  $value['content'];?></textarea>
									
								</div>
							</div>
							
						
						<?php } ?>
						
				</div>
				<!-- <div class="form-group">
					<div class="errorMsg " style="color:red"></div>
				</div> -->
			
				<p class="error-message-note">Please check all fields</p>
				<p class="success-message-note">Content has been updated!</p>

				<div class="form-actions right">
					<button type="submit" class="btn blue"  onclick="updateMidTopContent(); return false;" >Save Changes</button>
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