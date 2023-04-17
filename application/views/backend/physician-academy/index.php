<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-picture-o"></i>Physician Academy Listing</div>
			</div>
			<div class="portlet-body">
					<div class="add-new-btn-custom">
						<div class="btn-group">
							<a id="sample_editable_1_new" href="<?php echo BACKEND_ADD_PHYSICIAN_URL;  ?>"  class="btn blue"> <i class="fa fa-plus"></i> Add New </a>
						</div>
					</div>
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Title </th>
								<th scope="col"> Image </th>
								<th scope="col"> Details </th>
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($listing)){
							$count = 0;
							foreach($listing as $slide){
							$count++;
						?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $slide['title']; ?></td>
									<td><img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'exams/'.$slide['image']); ?>" alt="" width="70" style="margin:0 30%; "></td>
									<td><?php echo $slide['details']; ?></td>
									<td>
									<a href="<?php echo BACKEND_EDIT_PHYSICIAN."?slide=".$slide['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<!-- <a data-toggle="modal" onclick="update_status('<?php echo $slide['id'] ?>','homeslide','changeHomeSlideStatus','<?php echo DELETED_STATUS_ID ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-trash"></i> Delete</a> -->
									
									</td>
								</tr>
						<?php
							}
						}else{
						?>
						<th colspan="7" style="text-align:center">No Slide Found!</th>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>      

<!-- END PAGE BASE CONTENT -->
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.page-sidebar-menu > li').removeClass('active');
	jQuery("#pages_li").addClass('active').addClass('open');
	jQuery(".<?php echo $page ?>").addClass('active');
});
</script>