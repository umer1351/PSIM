<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-picture-o"></i>Home Slider</div>
			</div>
			<div class="portlet-body">
					<div class="add-new-btn-custom">
						<div class="btn-group">
							<a id="sample_editable_1_new" href="<?php echo BACKEND_ADD_HOMESLIDE_URL;  ?>"  class="btn blue"> <i class="fa fa-plus"></i> Add New </a>
						</div>
					</div>
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Image </th>
								<th scope="col"> Slide Order </th>
								<th scope="col"> Status </th>
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($home_slider)){
							$count = 0;
							foreach($home_slider as $slide){
							$count++;
						?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'homeslider/'.$slide['image_url']); ?>" alt="" width="70" style="margin:0 30%; "></td>
									<td><?php echo $slide['order_id']; ?></td>
									<td><div class="btn-group"><button class="btn btn-xs <?php echo ($slide['is_active']==ACTIVE_STATUS_ID)?'green':'red'?> space-in-btns" type="button"><?php echo ($slide['is_active']==ACTIVE_STATUS_ID)?'Enabled':'Disabled'?></button></div></td>
									<td>
									<a href="<?php echo BACKEND_EDIT_HOMESLIDE_URL."?slide=".$slide['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" onclick="update_status('<?php echo $slide['id'] ?>','homeslide','changeHomeSlideStatus','<?php echo DELETED_STATUS_ID ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-trash"></i> Delete</a>
									<a data-toggle="modal" onclick="update_status('<?php echo $slide['id'] ?>','homeslide','changeHomeSlideStatus','<?php if($slide['is_active']==ACTIVE_STATUS_ID){echo REJECTED_STATUS_ID ;}else{echo ACTIVE_STATUS_ID ;} ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Change Status</a>
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