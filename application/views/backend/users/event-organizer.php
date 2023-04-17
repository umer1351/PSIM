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
							</svg> Users </div>
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
								 <th scope="col"> Member Type </th>    
							
								<th scope="col"> Membership Status </th>
								<th scope="col"> Registeration Status </th>
								<th scope="col"> Actions </th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($users)){
							$count = 0;
							foreach($users as $user){
							$count++;
						?>
								<tr id='user<?php echo $user['id']?>'>
									<td><?php echo $count; ?></td>
									<td><?php echo $user['first_name']; ?> </td>
									<td><?php echo $user['email']; ?></td>
								<td><?php if($user['premium_subscription'] == '1' && $user['approval_member'] == '1'){echo 'Lifetime Member';}elseif($user['premium_subscription'] == '2' && $user['approval_member'] == '1'){echo 'Annual Member';}elseif($user['premium_subscription'] == '2' && $user['approval_member'] == '0'){echo ' Annual Member';}elseif($user['premium_subscription'] == '1' && $user['approval_member'] == '0'){echo ' Lifetime Member';}elseif($user['premium_subscription'] == '0' && $user['approval_member'] == '0'){echo 'Registered User';}  ?></td> 
									<td><?php if($user['premium_subscription'] == '1' && $user['approval_member'] == '1'){echo 'Approved';}elseif($user['premium_subscription'] == '2' && $user['approval_member'] == '1'){echo 'Approved';}elseif($user['premium_subscription'] == '2' && $user['approval_member'] == '0'){echo 'Pending';}elseif($user['premium_subscription'] == '1' && $user['approval_member'] == '0'){echo 'Pending';}elseif($user['premium_subscription'] == '0' && $user['approval_member'] == '0'){echo '-';}  ?>
								  </td>
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
									</td>
									<td>
									<a href="<?php echo BACKEND_EVENT_ORGANIZER_DETAIL_URL."?user_id=".$user['id'] ?>" class="btn btn-sm btn-circle btn-default"><i class="fa fa-eye"></i> View Details</a>
									<?php 
									if($user['account_status']==INACTIVE_STATUS_ID){
									if($user['is_active']!=PENDING_STATUS_ID){
									?>
									<a data-toggle="modal" onclick="update_user_status('<?php echo $user['id'] ?>','<?php echo ($user['is_active']==ACTIVE_STATUS_ID)?"Suspend User":$approval_text." User"?>','changeUserStatus','<?php echo ($user['is_active']==ACTIVE_STATUS_ID)?SUSPENDED_STATUS_ID:ACTIVE_STATUS_ID?>','<?php echo $user['is_active'] ?>','user<?php echo $user['id']?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa <?php echo ($user['is_active']==ACTIVE_STATUS_ID)?'fa-times':'fa-check'?>"></i> <?php echo ($user['is_active']==ACTIVE_STATUS_ID)?'Suspend':$approval_text?></a>
									<?php 
									}if($user['is_active']==PENDING_STATUS_ID){
									?>
										<a data-toggle="modal" onclick="update_user_status('<?php echo $user['id'] ?>','Approve User','changeUserStatus','<?php echo APPROVED_STATUS_ID?>','<?php echo $user['is_active'] ?>','user<?php echo $user['id']?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-check"></i> Approve</a>
										<a data-toggle="modal" onclick="update_user_status('<?php echo $user['id'] ?>','Reject User','changeUserStatus','<?php echo REJECTED_STATUS_ID?>','<?php echo $user['is_active'] ?>','user<?php echo $user['id']?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-times"></i> Reject</a>
									<?php
									}
									}
									?>
									<!-- <a data-toggle="modal" onclick="update_user_status('<?php echo $user['id'] ?>','Delete User','changeUserStatus','<?php echo DELETED_STATUS_ID ?>','<?php echo $user['is_active'] ?>','user<?php echo $user['id']?>')" href="javascrpt:void(0)" class="btn btn-sm btn-circle btn-default"><i class="fa fa-trash"></i> Delete</a> -->
								<!-- 	<select class ="btn btn-sm btn-circle btn-default update_user_active_status" id="update_user_active_status" data="<?php echo $user['id'];?>">
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

</select> -->
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
			</div>
		</div>      

<!-- END PAGE BASE CONTENT -->
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.page-sidebar-menu > li').removeClass('active');
	jQuery('#employer_li').addClass('active');
	//jQuery("#users_li").addClass('open');
});
</script>