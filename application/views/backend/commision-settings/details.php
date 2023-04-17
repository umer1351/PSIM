
<div class="container standard-padding-y-half">

<div class="row">
<div class="col-md-4 account-pages-sidebar-section">
		</div>
		<div class="col-md-8 account-pages-main-section">
			<div class="main-content-header-section">
				
			</div>
			<div class="medium-spacer"></div>
			<div class="main-content-body">
				<div class="events-details-section">
					<div class="d-flex justify-content-between align-items-start">
						<div class="event-title-and-number">
							<h2 class="sub-heading dark-colored bold-text"><?php echo $details['event_title']; ?></h2>
							<div class="regular-text event-number">Event #<?php echo $details['id']; ?></div>
						</div>
						
						<div class="event-status" style="float: right;">
							
							<b><?php if($details['is_active'] == '0'){echo 'Rejected';}elseif ($details['is_active'] == '1') { echo 'Approved' ;} ?></b></div>
						</div>

					<div class="low-spacer"></div>

					<div class="event-description-and-date">
						<div class="heading">
							<div class="small-heading">Details</div>
						</div>
						<div class="text">
							<div class="regular-text"><?php echo $details['event_detail']; ?></div>
						</div>
						<div class="heading">
							<div class="small-heading">Date(s)</div>
						</div>
						<div class="text">
							<div class="regular-text"><?php echo date('d-m-Y', $details['deadline']); ?></div>
						</div>
					</div>
				</div>

				<div class="medium-spacer"></div>

				<table class="table standard-table-custom" id="custom-table">
				  <thead class="">
				    <tr>
				      <th scope="col">Service</th>
				      <th scope="col">Budget</th>
				      <th scope="col">Status</th>
				      <th scope="col">Commission</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($services as $key => $value): ?>

				  	<tr>
				      <td><?php echo $value['service_name'];?></td>
				      <td><?php echo $value['amount'];?></td>
				      <td><?php if($value['job_status'] == '0'){echo 'Pending';}elseif ($value['job_status'] == '1') { echo 'Completed' ;}elseif ($value['job_status'] == '2') { echo 'Rejected' ;} ?></td>
				      <td><?php echo $value['commission_amount'];?></td>
				     <td>

						<div class="btn-group view_detail_lesson_request">
							<?php $removed_spaces_content = preg_replace('!\s+!', ' ', $value['id']) ;?>
							<a href="javascript:void(0)" onclick="editComission('<?php echo $value['id']?>','<?php echo $value['amount'] ?>','<?php echo $value['commission_percentage']?>','<?php echo $value['job_id'] ?>')" class="btn btn-sm btn-circle btn-default view_detail_btn"><i class="fa fa-trash" aria-hidden="true"></i> Edit </a>
					

						</div>

					</td>
				    </tr>
				  	<?php endforeach ?>
				    
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>