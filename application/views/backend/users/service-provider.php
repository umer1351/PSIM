<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->

		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<svg xmlns="http://www.w3.org/2000/svg" width="55.846" height="41.187" viewBox="0 0 55.846 41.187">
							  <g id="Group_3502" data-name="Group 3502" transform="translate(0 5.25)">
							    <path id="Path_170" data-name="Path 170" d="M120.64,93.78a6.015,6.015,0,1,0-6.015-6.015A6.015,6.015,0,0,0,120.64,93.78Zm0-9.692a3.688,3.688,0,1,1-3.688,3.688A3.688,3.688,0,0,1,120.64,84.089Zm0,0" transform="translate(-103.956 -78.902)"></path>
							    <path id="Path_171" data-name="Path 171" d="M89.238,234.873a9.027,9.027,0,0,0-6.539,2.734,9.65,9.65,0,0,0-2.7,6.83,1.167,1.167,0,0,0,1.163,1.163H97.312a1.167,1.167,0,0,0,1.163-1.163,9.65,9.65,0,0,0-2.7-6.83A9.026,9.026,0,0,0,89.238,234.873Zm-6.83,8.4a7.117,7.117,0,0,1,1.955-4.037,6.854,6.854,0,0,1,9.75,0,7.151,7.151,0,0,1,1.955,4.037Zm0,0" transform="translate(-72.554 -217.772)"></path>
							    <path id="Path_172" data-name="Path 172" d="M50.029-5.25H5.817A5.82,5.82,0,0,0,0,.567V30.119a5.82,5.82,0,0,0,5.817,5.817H50.029a5.82,5.82,0,0,0,5.817-5.817V.567A5.82,5.82,0,0,0,50.029-5.25Zm3.49,35.369a3.5,3.5,0,0,1-3.49,3.49H5.817a3.5,3.5,0,0,1-3.49-3.49V.567a3.5,3.5,0,0,1,3.49-3.49H50.029a3.5,3.5,0,0,1,3.49,3.49Zm0,0"></path>
							    <path id="Path_173" data-name="Path 173" d="M363.343,203.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -189.32)"></path>
							    <path id="Path_174" data-name="Path 174" d="M363.343,283.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -261.874)"></path>
							    <path id="Path_175" data-name="Path 175" d="M363.343,123.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -116.767)"></path>
							  </g>
							</svg> Service Providers </div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a>
					<a href="#portlet-config" data-toggle="modal" class="config"> </a>
					<a href="javascript:;" class="reload"> </a>
					<!-- <a href="javascript:;" class="remove"> </a> -->
				</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
							<tr>
								<th scope="col"> # </th>
								<th scope="col"> Name </th>
								<th scope="col"> Email </th>
								<th scope="col"> Country </th>   
								
								<th scope="col"> Status </th>
								
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
						<?php
						//print_r($users);die();
						if(!empty($users)){
							$count = 0;
							foreach($users as $user){
							$count++;
						?>
								<tr id="user<?php echo $user['id'] ?>">
									<td><?php echo $count; ?></td>
									<td class="premium-member-star"><span><?php if($user['stripe_connection'] === '1'){ ?><?php echo $user['first_name']?> <?php echo $user['last_name']?></span><svg xmlns="http://www.w3.org/2000/svg" width="46.391" height="44.38" viewBox="0 0 46.391 44.38"> <g id="star" transform="translate(1.525 -10.296)">
							    <g id="Group_3428" data-name="Group 3428" transform="translate(0 11.796)">
							      <path id="Path_2460" data-name="Path 2460" d="M43.279,27.5a1.269,1.269,0,0,0-1.025-.864L28.818,24.679,22.809,12.5a1.27,1.27,0,0,0-2.277,0L14.523,24.679,1.087,26.631a1.27,1.27,0,0,0-.7,2.166l9.722,9.477L7.811,51.655a1.27,1.27,0,0,0,1.842,1.338l12.017-6.318,12.017,6.318a1.27,1.27,0,0,0,1.842-1.339l-2.3-13.382L42.957,28.8A1.269,1.269,0,0,0,43.279,27.5Z" transform="translate(0 -11.796)" fill="none" stroke="#1b2328" stroke-width="3"></path>
							    </g>
							  </g>
							</svg>
<?php } else{?>
<?php echo $user['first_name']?> <?php echo $user['last_name']?>
<?php }?></td>
									<td><?php echo $user['email']; ?></td>
									<td><?php echo $user['country_name']; ?></td>
									
									<td>
									<?php
									if($user['account_status']==ACTIVE_STATUS_ID){
									?>
									<div class="btn-group">
										<button class="btn btn-xs <?php echo 'green' ?> space-in-btns" type="button"> <?php echo "Approved"; ?> 
										</button>
									</div>
									<?php 
									}else{
									?>	
									<?php
									$modal_text = "";
									$approval_text = "Activate";
									if($user['account_status']== 2){
										$text = "Pending";
										$color = "blue";
									}else if($user['account_status']==4){
										$text = "Suspended";
										$color = "yellow";
										$modal_text = "Suspension Reason";
									}else if($user['account_status']==3){
										$text = "Rejected";
										$color = "red";
										$modal_text = "Rejection Reason";
										$approval_text = "Approve";
									}else if($user['is_active']==DISABLED_STATUS_ID){
										$text = "Deactivated";
										$color = "grey";
									}else if($user['is_active']==PENDING_STATUS_ID){
										$text = "Pending";
										$color = "blue";
									}
									
									?>
									<div class="btn-group"><button class="btn btn-xs <?php echo $color; ?> space-in-btns" type="button"> <?php echo $text; ?> </button></div>
									<?php
									if($user['is_active']==SUSPENDED_STATUS_ID || $user['is_active']==REJECTED_STATUS_ID){
										
									?>
									</br>
									<a href="javascript:void(0)" onclick='showMessageContent("<?php echo addslashes($user['reason_for_suspension']) ?>","<?php echo $modal_text; ?>");' >View Reason</a>
									<?php
									}
									?>
									<?php	
									}
									?>
									<?php 

									if($user['account_status']==4){ ?>
										<a class="reason-suspend-btn tooltip-line" onclick="suspendfunction('<?php echo $user['reason_for_suspension'] ?>');" data-toggle="modal" data-target="#exampleModal" href="#" data-tooltip="Reason for Suspension" ><i class="icon-question"></i></a>
									<?php }									

									?>
									</td>
									
									
									<td>
									<a href="<?php echo BACKEND_SERVICE_PROVIDER_DETAIL_URL."?user_id=".$user['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-eye"></i>  View Details</a>
									
									<!-- <a data-toggle="modal" onclick="update_user_status('<?php echo $user['id'] ?>','Delete User','changeUserStatus','<?php echo DELETED_STATUS_ID ?>','<?php echo $user['is_active'] ?>','user<?php echo $user['id']?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-trash"></i> Delete</a> -->


<select class ="btn btn-sm btn-circle btn-default update_user_active_status" id="update_user_active_status" data="<?php echo $user['id'];?>">
 <option value="1" 
									  <?php if ($user['account_status'] == 1): 
									  	echo "Selected";
									  ?>
									  	
									  <?php endif ?>

									  >Approve</option>
								  <option value="3"
									  <?php if ($user['account_status'] == 3): 
									  	echo "Selected";
									  ?>
									  	
									  <?php endif ?>

									  >Reject</option> 
									  <option value="2" 

									   <?php if ($user['account_status'] == 2): 
									  	echo "Selected";
									  ?>
									  	
									  <?php endif ?>

									  

									  >Pending</option>
									 <option value="4" 
									   <?php if ($user['account_status'] == 4): 
									  	echo "Selected";
									  ?>
									  	
									  <?php endif ?>

									  
									  >Suspend</option>

</select>
									
									</td>
								</tr>

						<?php
							}
						}else{
						?>
						<th colspan="6" style="text-align:center">No User Found!</th>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>

			<div class="premium-member-star premium-member-label">
				<svg xmlns="http://www.w3.org/2000/svg" width="46.391" height="44.38" viewBox="0 0 46.391 44.38"> <g id="star" transform="translate(1.525 -10.296)">
				<g id="Group_3428" data-name="Group 3428" transform="translate(0 11.796)">
				  <path id="Path_2460" data-name="Path 2460" d="M43.279,27.5a1.269,1.269,0,0,0-1.025-.864L28.818,24.679,22.809,12.5a1.27,1.27,0,0,0-2.277,0L14.523,24.679,1.087,26.631a1.27,1.27,0,0,0-.7,2.166l9.722,9.477L7.811,51.655a1.27,1.27,0,0,0,1.842,1.338l12.017-6.318,12.017,6.318a1.27,1.27,0,0,0,1.842-1.339l-2.3-13.382L42.957,28.8A1.269,1.269,0,0,0,43.279,27.5Z" transform="translate(0 -11.796)" fill="none" stroke="#1b2328" stroke-width="3"></path>
				</g>
				</g>
				</svg>
				<span>represent active premium members.</span>
			</div>
				
			</div>

		</div>      
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason for Suspend</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- END PAGE BASE CONTENT -->
</div>
<script type="text/javascript">
	


	jQuery(document).ready(function(){
		
		//jQuery('.page-sidebar-menu > li').removeClass('active');
		jQuery("#users_li").addClass('open');
	});

</script>