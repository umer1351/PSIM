<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-picture-o"></i>Homepage Sections</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Section </th>
								<th scope="col"> Image </th>
								<th scope="col"> Link </th>
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
								<tr id='home1'>
									<td>1</td>
									<td>Homepage History Section</td>
									<td><img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'home_about/'.$page_data['homepage_history']['image_url']); ?>" alt="" width="70" style="margin:0 30%; "></td>
									<td><?php echo $page_data['homepage_history']['url']; ?></td>
									<td>
									<a href="<?php echo BACKEND_EDIT_ABOUT_SECTIONS."/".$page_data['homepage_history']['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" onclick="updateAboutContentStatus('<?php echo $page_data['homepage_history']['id'] ?>','<?php echo ($page_data['homepage_history']['is_active']==ACTIVE_STATUS_ID)?"Disable this section":"Enable this section"?>','<?php echo ($page_data['homepage_history']['is_active']==ACTIVE_STATUS_ID)?INACTIVE_STATUS_ID:ACTIVE_STATUS_ID?>','home1')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa <?php echo ($page_data['homepage_history']['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($page_data['homepage_history']['is_active']==ACTIVE_STATUS_ID)?'Disable':"Enable"?></a>
									</td>
								</tr>
								<tr id='home2'>
									<td>2</td>
									<td>Homepage Casting Section</td>
									<td><img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'home_about/'.$page_data['homepage_casting']['image_url']); ?>" alt="" width="70" style="margin:0 30%; "></td>
									<td><?php echo $page_data['homepage_casting']['url']; ?></td>
									<td>
									<a href="<?php echo BACKEND_EDIT_ABOUT_SECTIONS."/".$page_data['homepage_casting']['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" onclick="updateAboutContentStatus('<?php echo $page_data['homepage_casting']['id'] ?>','<?php echo ($page_data['homepage_casting']['is_active']==ACTIVE_STATUS_ID)?"Disable this section":"Enable this section"?>','<?php echo ($page_data['homepage_casting']['is_active']==ACTIVE_STATUS_ID)?INACTIVE_STATUS_ID:ACTIVE_STATUS_ID?>','home2')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa <?php echo ($page_data['homepage_casting']['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($page_data['homepage_casting']['is_active']==ACTIVE_STATUS_ID)?'Disable':"Enable"?></a>
									</td>
								</tr>
								<tr id='home3'>
									<td>2</td>
									<td>Homepage Footer Section</td>
									<?php if (isset($page_data['homepage_footer']['image_url']) && $page_data['homepage_footer']['image_url'] != "none"){ ?>
									<td><img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'home_about/'.$page_data['homepage_footer']['image_url']); ?>" alt="" width="70" style="margin:0 30%; "></td>
									<?php } else { echo "<td>N/A</td>"; } ?>
									<td><?php echo $page_data['homepage_footer']['url']; ?></td>
									<td>
									<a href="<?php echo BACKEND_EDIT_ABOUT_SECTIONS."/".$page_data['homepage_footer']['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" onclick="updateAboutContentStatus('<?php echo $page_data['homepage_footer']['id'] ?>','<?php echo ($page_data['homepage_footer']['is_active']==ACTIVE_STATUS_ID)?"Disable this section":"Enable this section"?>','<?php echo ($page_data['homepage_footer']['is_active']==ACTIVE_STATUS_ID)?INACTIVE_STATUS_ID:ACTIVE_STATUS_ID?>','home3')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa <?php echo ($page_data['homepage_footer']['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($page_data['homepage_footer']['is_active']==ACTIVE_STATUS_ID)?'Disable':"Enable"?></a>
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