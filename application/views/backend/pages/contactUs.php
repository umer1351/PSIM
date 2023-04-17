<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->
<!--<h1 class="page-title"> Contact-->
	<div class="filter-select">

		<select class="form-control" id="message_type_filter" onchange="messageTypeFilter()">

			<option value="0" <?php echo (!isset($_GET['type']) || $_GET['type'] == 0)? "selected":""; ?>>All Queries</option>

			<option value="<?php echo TALENT ?>" <?php echo (isset($_GET['type']) && $_GET['type'] == TALENT)? "selected":""; ?>>Talent</option>

			<option value="<?php echo MARKETING ?>" <?php echo (isset($_GET['type']) && $_GET['type'] == MARKETING)? "selected":""; ?>>Marketing</option>

			<option value="<?php echo GENERAL_QUERY ?>" <?php echo (isset($_GET['type']) && $_GET['type'] == GENERAL_QUERY)? "selected":""; ?>>General Query</option>

		</select>

	</div>
<!--</h1>-->
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-phone" aria-hidden="true"></i>Queries </div>
				
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
								<th scope="col"> Phone </th>
								<th scope="col"> Subject </th>   
								<th scope="col"> Enquiry </th>
								<th scope="col"> Type </th>
								<th scope="col"> Date </th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($messages)){
							$count = 0;
							foreach($messages as $message){
							$count++;	
							$contact_message_type = unserialize(CONTACT_MESSAGE_TYPE);
							?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo ($message['user_id']==0)?$message['name']:"<a target='_blank' href='".BACKEND_EMPLOYEE_DETAIL_URL."?user_id=".$message['user_id']."'>".$message['name']."</a>"; ?></td>
									<td><?php echo $message['email']; ?></td>
									<td><?php echo (!empty($message['phone']))?$message['phone']:"N/A"; ?></td>
									<td><?php echo $message['subject']; ?></td>
									<td><a href="javascript:void(0)" onclick='showMessageContent("<?php echo addslashes($message['enquiry']) ?>","<?php echo addslashes($message['subject']) ?>")' >View Enquiry</a></td>
									<td><?php echo $contact_message_type[$message['type']]?></td>
									<td><?php echo date("d-M-Y", $message['created']); ?></td>
									
								</tr>
							<?php
							}
						}else{
						?>
						<th style="text-align:center" colspan="6">No Messages Found!</th>
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
	jQuery("#contact_li").addClass('active');
});
</script>