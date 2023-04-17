<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45pt" height="45pt" viewBox="0 0 45 45" version="1.1">
						<g id="surface1">
							<path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 38.792969 0 L 13.351562 0 C 12.011719 0 10.917969 1.089844 10.917969 2.433594 L 10.917969 3.570312 L 9.78125 3.570312 C 8.4375 3.570312 7.347656 4.660156 7.347656 6.003906 L 7.347656 7.140625 L 6.210938 7.140625 C 4.867188 7.140625 3.773438 8.230469 3.773438 9.570312 L 3.773438 42.566406 C 3.773438 43.910156 4.867188 45 6.210938 45 L 31.648438 45 C 32.988281 45 34.082031 43.910156 34.082031 42.566406 L 34.082031 41.429688 L 35.21875 41.429688 C 36.5625 41.429688 37.652344 40.339844 37.652344 38.996094 L 37.652344 37.859375 L 38.792969 37.859375 C 40.132812 37.859375 41.226562 36.769531 41.226562 35.429688 L 41.226562 2.433594 C 41.226562 1.089844 40.132812 0 38.792969 0 Z M 31.648438 43.242188 L 6.210938 43.242188 C 5.835938 43.242188 5.53125 42.941406 5.53125 42.566406 L 5.53125 9.570312 C 5.53125 9.199219 5.835938 8.898438 6.210938 8.898438 L 25.871094 8.898438 L 25.871094 14.464844 C 25.871094 14.949219 26.265625 15.34375 26.75 15.34375 L 32.324219 15.34375 L 32.324219 42.566406 C 32.324219 42.941406 32.019531 43.242188 31.648438 43.242188 Z M 31.078125 13.585938 L 27.628906 13.585938 L 27.628906 10.136719 Z M 35.894531 38.996094 C 35.894531 39.371094 35.59375 39.671875 35.21875 39.671875 L 34.082031 39.671875 L 34.082031 14.46875 C 34.082031 14.46875 34.078125 14.453125 34.078125 14.425781 C 34.074219 14.210938 33.988281 14.007812 33.835938 13.855469 C 33.832031 13.851562 27.371094 7.394531 27.371094 7.394531 C 27.371094 7.394531 27.359375 7.386719 27.347656 7.371094 C 27.183594 7.222656 26.972656 7.136719 26.75 7.140625 L 9.105469 7.140625 L 9.105469 6.003906 C 9.105469 5.628906 9.40625 5.328125 9.78125 5.328125 L 35.21875 5.328125 C 35.59375 5.328125 35.894531 5.628906 35.894531 6.003906 Z M 39.46875 35.429688 C 39.46875 35.800781 39.164062 36.101562 38.792969 36.101562 L 37.652344 36.101562 L 37.652344 6.003906 C 37.652344 4.660156 36.5625 3.570312 35.21875 3.570312 L 12.675781 3.570312 L 12.675781 2.433594 C 12.675781 2.0625 12.980469 1.757812 13.351562 1.757812 L 38.792969 1.757812 C 39.164062 1.757812 39.46875 2.0625 39.46875 2.433594 Z M 39.46875 35.429688 "></path>
						</g>
					</svg>Homepage Sections</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Section </th>
								<th scope="col"> Image </th>
								<!-- <th scope="col"> Link </th> -->
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>	

								<?php $section_name; ?>
								
								
								<?php foreach ($homepage_content as $key => $value) { ?>
								<tr id='home1'>
								
									<?php 

									if($value['section'] == '1'){

										$section_name = 'Top Section';
										

									}elseif($value['section'] == '2'){

										$section_name = 'Middle Section';
										if($value['mid_section'] == '0'){
											$section_name = 'Middle Section - Top';
										}elseif($value['mid_section'] == '1'){
											$section_name = 'Middle Section - Left';
										}else{
											$section_name = 'Middle Section - Right';
										}

									}elseif($value['section'] == '3'){

										$section_name = 'Bottom Section';

									}

									?>
										
										<td><?php echo $value['id']; ?></td>
										<td><?php echo $section_name; ?></td>
										<td><img style="height: 60px;" src="<?php echo (!empty($value['image'])) ? ASSET_USERS_UPLOADS_BACKEND_DIR.$value['image']:  ASSET_USERS_UPLOADS_BACKEND_DIR.'no-image.png' ; ?>" id='image_id' class="image" alt="Home Top Image" data-tag="0"></td>
										<!-- <td><?php echo $value['links']; ?></td> -->
										<td><a href="<?php echo BACKEND_EDIT_HOME_SECTIONS."?page_section=".$value['id'] ?>"  class="btn btn-sm btn-circle btn-default"><i class="fa fa-pencil"></i> Edit</a></td>	
															
								</tr>
								<?php } ?>
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