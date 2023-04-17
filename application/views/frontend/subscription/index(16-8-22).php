	<div class="mainContentDiv">
	</div>
	<div class="container standard-padding-y-half">
<div class="row">
		<div class="col-12">
			<h2 class="secondary-heading dark-colored hello-user-text">
			<img src="<?php echo (empty($common_data["user_data"]["profile_image"])?ASSET_USERS_UPLOADS_FRONTEND_DIR.'no-profile.jpg':ASSET_USERS_UPLOADS_FRONTEND_DIR.$common_data["user_data"]['profile_image'])?>" class="img-fluid rounded-circle mr-4" alt="" />Hi <?php echo $common_data['user_data']['first_name']; ?>!
			</h2>
			<p>Below is your subscriptions list</p>
		</div>
	</div>
	
<div class="row">
		

			<!--   -->
		
    <div id="promo-banner-or-social-proof">
        <div class="soapbox-row">
<div class="portlet-body">
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Module </th>
								<th scope="col"> Payment Status </th>
								<th scope="col"> Approval Status </th>   
								
								
								
							</tr>
						</thead>
						<tbody>
						<?php
						//print_r($users);die();
						if(!empty($listing)){
							$count = 0;
							foreach($listing as $list){
							$count++;
						?>
								<tr id="user">
									<td><?php echo $count; ?></td>
									<td ><?php
											
												echo 'Examination Courses';
											
									 ?></td>
									<td><?php 
											if($list['payment_status'] == '1'){
												echo 'Done';
											}else if($list['payment_status'] == '0'){
												echo 'Pending';
											} ?></td>
									<td><?php  if($list['approval'] == '1'){
												echo 'Approved';
											}else if($list['approval'] == '0'){
												echo 'Pending';
											}else if($list['approval'] == '2'){
												echo 'Rejected';
											}  ?></td>
									
									
									
									
									
								</tr>

						<?php
							}
						}else{
						?>
						<th colspan="6" style="text-align:center">No Subscriptions Found!</th>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
	</div>
</div>
</div>
</div>
	</div>
</div>
</div>
