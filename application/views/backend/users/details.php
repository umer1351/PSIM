<div class="page-fixed-main-content">

	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-xs-12 col-sm-12 inner-content-details detail-view-01">	

		<div class="main-content-body">
			<div class="events-details-section">
			
				<div class="event-title-and-number">
					<div class="event-titles">
						<h2 class="sub-heading dark-colored bold-text"><?php echo $details['event_title']; ?></h2>
						<div class="regular-text event-number">Event #<?php echo $details['id']; ?></div>
					</div>
					<a href="<?php echo ACKEND_EVENT_ORGANIZER_URL ?>" class="btn btn-custom backt-to-button"><i class="fa fa-angle-left"></i> Back to Events</a>
				</div>

				<div class="event-date-and-status">
					<div class="date-status">
						<div class="small-heading">Date: <div class="regular-text"><?php echo date('d-m-Y', $details['deadline']); ?></div></div>
					</div>
					<div class="event-status">
						<select class ="btn btn-sm btn-circle btn-default" id="update_event_status" onchange="update_event_status('<?php echo $details['id']; ?>','<?php echo $details['event_detail']; ?>'); return false;">
									<option value="1" 
								  <?php if ($details['is_active'] == 1): 
								  	echo "Selected";
								  ?>
								  	
								  <?php endif ?>

								  >Approved</option>
								  <option value="2" 
								  <?php if ($details['is_active'] == 2): 
								  	echo "Selected";
								  ?>
								  	
								  <?php endif ?>

								  >Rejected</option>
									
								</select>	
						<!-- <b><?php //if($details['is_active'] == '0'){echo 'Rejected';}elseif ($details['is_active'] == '1') { echo 'Approved' ;} ?></b> -->
					</div>
				</div>				

				<div class="event-description-and-date">
					<div class="heading">
						<div class="small-heading">Event Details</div>
					</div>
					<textarea id="even_details"><?php echo $details['event_detail']; ?></textarea>
				</div>
			</div>
			
			<div class="heading">
				<div class="small-heading">Payment Details</div>
			</div>

			<table class="table standard-table-custom" id="custom-table">
			  <thead class="">
			    <tr>
			      <th scope="col">Service</th>
			      <th scope="col">Total charges</th>
			      <th scope="col">Plaany's Commission</th>
			      <th scope="col">Payable Amount</th>
			      <th scope="col">Job Status</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($services as $key => $value): ?>
			  		<?php  $percentage = (15 / 100)* $value['amount']; ?>
			  		<?php  $Deliverable = $value['amount']-$percentage; ?>
			  	<tr>
			      <td><?php echo $value['service_name'];?></td>
			      <td>$<?php echo $value['amount'];?></td>
			       <td>$<?php echo $percentage; ?></td>
			       <td>$<?php echo $Deliverable; ?></td>
			      <td><?php if($value['job_status'] == '0'){echo 'Pending';}elseif ($value['job_status'] == '1') { echo 'Completed' ;}elseif ($value['job_status'] == '2') { echo 'Rejected' ;} ?></td>
			      <td>
			      	<?php if($value['job_status'] == '1' && $value['payment_status'] != '1'){ ?> 
			      	<a href="javascript:void(0)" onclick="editComission('<?php echo $value['id']?>','<?php echo $Deliverable ?>','<?php echo $percentage?>')" class="btn btn-sm btn-circle btn-default view_detail_btn"> Release Payment </a>
			      <?php }elseif($value['job_status'] == '1' && $value['payment_status'] == '1'){ ?>
			      	Payment Done
			      <?php }else{ ?>
			      	N/A
			      <?php } ?>	
			      </td>
			    </tr>
			  	<?php endforeach ?>
			    
			  </tbody>
			</table>
		</div>

	</div>
	<!-- END PAGE BASE CONTENT -->

</div>

