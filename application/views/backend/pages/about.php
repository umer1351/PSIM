<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-picture-o"></i>Who We Are Sections</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Section </th>
								<th scope="col"> Image </th>
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
								<tr id='about1'>
									<td>1</td>
									<td>History</td>
									<td><img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'home_about/'.$page_data['about_history']['image_url']); ?>" alt="" width="70" style="margin:0 30%; "></td>
									<td>
									<a href="<?php echo BACKEND_EDIT_ABOUT_US."/".$page_data['about_history']['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" onclick="updateAboutContentStatus('<?php echo $page_data['about_history']['id'] ?>','<?php echo ($page_data['about_history']['is_active']==ACTIVE_STATUS_ID)?"Disable this section":"Enable this section"?>','<?php echo ($page_data['about_history']['is_active']==ACTIVE_STATUS_ID)?INACTIVE_STATUS_ID:ACTIVE_STATUS_ID?>','about1')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa <?php echo ($page_data['about_history']['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($page_data['about_history']['is_active']==ACTIVE_STATUS_ID)?'Disable':"Enable"?></a>
									</td>
								</tr>
								<tr id='about2'>
									<td>2</td>
									<td>Services</td>
									<td><img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'home_about/'.$page_data['about_services']['image_url']); ?>" alt="" width="70" style="margin:0 30%; "></td>
									<td>
									<a href="<?php echo BACKEND_EDIT_ABOUT_US."/".$page_data['about_services']['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" onclick="updateAboutContentStatus('<?php echo $page_data['about_services']['id'] ?>','<?php echo ($page_data['about_services']['is_active']==ACTIVE_STATUS_ID)?"Disable this section":"Enable this section"?>','<?php echo ($page_data['about_services']['is_active']==ACTIVE_STATUS_ID)?INACTIVE_STATUS_ID:ACTIVE_STATUS_ID?>','about2')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa <?php echo ($page_data['about_services']['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($page_data['about_services']['is_active']==ACTIVE_STATUS_ID)?'Disable':"Enable"?></a>
									</td>
								</tr>
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