<div class="page-fixed-main-content" style="min-height: 380px">
<!-- BEGIN PAGE BASE CONTENT -->

<div class="col-md-12 col-xs-12 col-sm-12 performance-form">

<div class="page-heading-related">
	<h3 class="form-section float-left-style">Edit <?php echo $page_headings ?></h3>
</div>

<a class="btn blue pull-right add-button" href="javascript:void(0)" onclick="addFaqs()"> <i class="fa fa-plus"></i> Add New Section</a>
                        
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<br><br><br>
<div class="portlet light bordered">

	<div class="portlet-body">

		<table id="stream_table1" class="table table-striped table-bordered table-hover table-checkable order-column students_list_table" >

			<thead>

				<tr>

					<th style="display:none"></th>

					<th>#</th>

					<th> Heading </th>

					<th> Paragraph </th>

					<th> Actions </th>

				</tr>

			</thead>

			<tbody>

		<?php if(!empty($privacy_policy_content)){

			$count = 1;

				foreach($privacy_policy_content as $privacy_policy){?>

				<tr class="odd gradeX">

					<td style="display:none"></td>

					<td> <?php echo $count ?> </td>

					<td><?php echo $privacy_policy['heading'] ?></td>

					<td><?php echo $privacy_policy['content'] ?></td>

					<td>

						<div class="btn-group view_detail_lesson_request">
							<?php $removed_spaces_content = preg_replace('!\s+!', ' ', $privacy_policy['content']) ;?>
							<a href="javascript:void(0)" onclick="editPrivacyPolicy('<?php echo $privacy_policy['id']?>','<?php  echo $privacy_policy['heading']?>','<?php echo $removed_spaces_content ?>','<?php echo $privacy_policy['content_order']?>')" class="btn btn-sm btn-circle btn-default view_detail_btn"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
							<a href="javascript:void(0)" onclick="deletePrivacyPolicy(<?php echo $privacy_policy['id']?>,'Delete this? Are you sure?')" class="btn btn-sm btn-circle btn-default view_detail_btn"><i class="fa fa-trash" aria-hidden="true"></i> Delete </a>

						</div>

					</td>

				</tr>

		<?php $count++; }

		} ?>

			</tbody>

		</table>
		<div class="modal fade" id="delete_modal_pp" tabindex="-1" role="basic" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		                <h4 class="modal-title">Save Changes</h4>
		            </div>
		            <div class="modal-body"> Are you sure you want to delete? </div>
		            <div class="modal-footer">
		                <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
		                <button type="button" class="btn blue">Delete</button>
		            </div>
		        </div>
		   
		    </div>

</div>

	</div>

</div>

<!-- END EXAMPLE TABLE PORTLET-->

</div>

<!-- END PAGE BASE CONTENT -->
</div>
