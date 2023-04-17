

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 performance-form">
		<div class="page-heading-related">
			<h3 class="form-section float-left-style"><?php echo ($slide ? 'Edit':'Add'); ?> Conference Details</h3>
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
		<br/>
		<br/>
		
		<!-- BEGIN FORM-->
			<h4>Media Gallery</h4>
			<form action="<?php echo  BACKEND_FELLOWSHIP_MEDIA_AJAX ; ?>?exams_id=<?php echo $_GET['slide'] ?>" class="dropzone"></form>
			<?php 
			if(!empty($files)){ foreach($files as $row){ 
			?> 
			<a data-toggle="modal" onclick="update_status('<?php echo $row['id'] ?>','Image','changeFellowshipStatus','<?php echo DELETED_STATUS_ID ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><img style="max-width: 100px;
			    max-height: 100px;" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR.'exams/'.$row['file_name'] ?>"> Delete</a> 



			<?php 
			} }else{ 
			?> 
			<p>No file(s) found...</p> 
			<?php } ?>
			<br/>
			<br/>
			<h4>Add Poster</h4>

			<form action="<?php echo  BACKEND_FELLOWSHIP_POSTER_AJAX ; ?>?exams_id=<?php echo $_GET['slide'] ?>" class="dropzone"></form>
			<?php 
			if(!empty($poster)){ foreach($poster as $row){ 
			?> 
			<a data-toggle="modal" onclick="update_status('<?php echo $row['id'] ?>','Image','changeFellowshipStatusPoster','<?php echo DELETED_STATUS_ID ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><img style="max-width: 100px;
			    max-height: 100px;" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR.'exams/'.$row['file_name'] ?>"> Delete</a> 



			<?php 
			} }else{ 
			?> 
			<p>No file(s) found...</p> 
			<?php } ?>
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