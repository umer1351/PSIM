<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style type="text/css">
	.spacer20{
		clear: both;
		height: 20px;
	}
	.spacer10{
		clear: both;
		height: 10px;
	}
</style>
<div class="page-fixed-main-content" style="min-height: 380px">
	<!-- BEGIN PAGE BASE CONTENT -->
	
		<!-- BEGIN FORM-->
<form action="<?php echo  BACKEND_EXAMS_MEDIA_AJAX ; ?>?exams_id=<?php echo $_GET['slide'] ?>" class="dropzone"></form>
<div class="row">

	<?php 
	if(!empty($files)){ foreach($files as $row){ 
		if($row['type'] == '1'){ ?>
		
	
		<div class="col-md-2" style="margin-top: 20px;">

	 <embed style="max-height: 100px; max-width: 100px;" type="image/png" src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'exams/'.$row['file_name']); ?>" > 
	 	<div class="clearfix spacer10"></div>
	 	<a data-toggle="modal" onclick="update_status('<?php echo $row['id'] ?>','Image','changeExamsImages','<?php echo DELETED_STATUS_ID ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"> Delete</a>
	 	</div>
	<?php } } }else{ ?> 
		
		<p>No file(s) found...</p>
	
	<?php } ?>
	<div class="clearfix spacer20"></div>
	</div>

	<div class="row">
		
		<form action="<?php echo  BACKEND_EXAMS_VIDEOS_AJAX ; ?>" class="">
			<div class="col-md-4">
				<input type="text" name="vid" value="" class="form-control">
				<input type="hidden" name="exam_id" value="<?php echo $_GET['slide'] ?>">
			</div>
			<div class="col-md-3">
				<button type="submit" class="btn btn-default">add videos</button>
			</div>
		</form>
		<div class="clearfix spacer20"></div>
	</div>
	
	<div class="row">
		<?php 
		if(!empty($files)){ foreach($files as $row){  

			if($row['type'] == '2'){ ?>
					    	 
		         <div class="col-md-2"  style="margin-bottom: 20px;">
		         	<a href="<?php echo $row['file_name'] ?>" class="video_model">
		         	<?php

		         	 $url=$row['file_name'];
					 $fetch=explode("v=", $url);
					 	
		         	 if(isset($fetch[1])){ 
		         	 	$videoid=$fetch[1];	
		         	 	?>
		         		<img style="max-height: 100px; max-width: 100px;" src="http://img.youtube.com/vi/<?php echo $videoid ?>/0.jpg" />
		         		<div class="clearfix spacer10"></div>
		         		<a data-toggle="modal" onclick="update_status('<?php echo $row['id'] ?>','Image','changeExamsImages','<?php echo DELETED_STATUS_ID ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"> Delete</a>
		         	<?php }else{ ?>
		         		<img style="max-height: 100px; max-width: 100px;" src="http://pluspng.com/img-png/play-button-png-projects-330.png">
		         		<div class="clearfix spacer10"></div>
		         		<a data-toggle="modal" onclick="update_status('<?php echo $row['id'] ?>','Image','changeExamsImages','<?php echo DELETED_STATUS_ID ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"> Delete</a>
		         	<?php } ?>	
		         </a>
		     	</div>
		      
		    <?php } ?> 

		<?php } } ?>
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