<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style"><b>Price Settings</b></h3>
			<div class="actions product-det-heading-n-btn">
				<div class="btn-group margin-between-buttons">
	
				</div>
			</div>
		</div>
		
		<!-- BEGIN FORM-->
			<form class="horizontal-form student-details-form custom-details-form price-setting-form" id="addAboutForm" name="addAboutForm" >
				<div class="form-body">
					<!--/row-->
					<div class="row">
						
						
							<div class="col-md-4">
								
								<div class="form-group">
									<label class="control-label c-label">Plaany's Commission (%)</label>
									<input type="text" class="form-control" id="top_section_1_heading_com" value="<?php echo $commission['price'] ;?>" placeholder="" >
								</div>
							</div>
					</div>
							<br>
					<div class="row">
						<?php foreach ($price_plan as $key => $value) { ?>
							<?php if($value['type'] == '2'){?>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label c-label">Premium Membership Fee / mo ($)</label>
									<input type="text" class="form-control" id="top_section_1_content_com" value="<?php echo $value['price'] ;?>" placeholder="" >
								</div>
							</div>
						<?php }else{?>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label c-label">Premium Membership Fee / yr ($)</label>
									<input type="text" class="form-control"  value="<?php echo $value['price'] ;?>" id="top_section_2_content_com" placeholder="" >
								</div>
							</div>
						<?php } }?>
							
							<!-- <div class="col-md-4">
								<div class="form-group">
									<label class="control-label c-label">Premium Membership Fee / yr</label>
									<input type="text" class="form-control" id="top_section_2_content_com" placeholder="" >
								</div>
							</div> -->
					</div>		
				<div class="form-group">

				<p class="error-message-note"></p>
				<p class="success-message-note"></p>
			</div>
				<div class="form-actions" style="float: left">
					<button type="button" onclick ="updatePricesettings(); return false;"  class="btn blue"> <i class="fa fa-check"></i> Save Changes</button>
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