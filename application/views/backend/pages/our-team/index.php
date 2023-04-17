<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-picture-o"></i>Our Team</div>
			</div>
			<div class="portlet-body">
					<div class="add-new-btn-custom">
						<div class="btn-group">
							<a id="sample_editable_1_new" href="<?php echo BACKEND_ADD_TEAM_MEMBER_URL;  ?>"  class="btn blue"> <i class="fa fa-plus"></i> Add New </a>
						</div>
					</div>
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Image </th>
								<th scope="col"> Member Order </th>
								<th scope="col"> Status </th>
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($members)){
							$count = 0;
							foreach($members as $slide){
							$count++;
						?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'team/'.$slide['image_url']); ?>" alt="" width="70" style="margin:0 30%; "></td>
									<td><?php echo $slide['order_id']; ?></td>
									<td><div class="btn-group"><button class="btn btn-xs <?php echo ($slide['is_active']==ACTIVE_STATUS_ID)?'green':'red'?> space-in-btns" type="button"><?php echo ($slide['is_active']==ACTIVE_STATUS_ID)?'Enabled':'Disabled'?></button></div></td>
									<td>
									<a href="<?php echo BACKEND_EDIT_TEAM_MEMBER_URL."?id=".$slide['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" onclick="update_status('<?php echo $slide['id'] ?>','Team Member','changeTeamMemberStatus','<?php echo DELETED_STATUS_ID ?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-trash"></i> Delete</a>
									</td>
								</tr>
						<?php
							}
						}else{
						?>
						<th colspan="7" style="text-align:center">No Team Member Found!</th>
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