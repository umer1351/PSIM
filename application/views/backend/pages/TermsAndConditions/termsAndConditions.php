<div class="page-fixed-main-content" style="min-height: 380px">
<!-- BEGIN PAGE BASE CONTENT -->

<div class="col-md-12 col-xs-12 col-sm-12 performance-form">

<div class="page-heading-related">
	<h3 class="form-section float-left-style">Edit Terms & Conditions</h3>
</div>

<a class="btn blue pull-right add-button" href="javascript:void(0)" onclick="addTermsAndCondtions()"> <i class="fa fa-plus"></i> Add New Section</a>
                        
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

		<?php if(!empty($terms_and_conditions_content)){

			$count = 1;

				foreach($terms_and_conditions_content as $terms_and_conditions){?>

				<tr class="odd gradeX">

					<td style="display:none"></td>

					<td> <?php echo $count ?> </td>

					<td><?php echo $terms_and_conditions['heading'] ?></td>

					<td><?php echo $terms_and_conditions['content'] ?></td>

					<td>

						<div class="btn-group view_detail_lesson_request">
							<?php $removed_spaces_content = preg_replace('!\s+!', ' ', $terms_and_conditions['content']) ;?>
							<a href="javascript:void(0)" onclick="editTermsAndConditions('<?php echo $terms_and_conditions['id']?>','<?php  echo $terms_and_conditions['heading']?>','<?php echo $removed_spaces_content ?>','<?php echo $terms_and_conditions['content_order']?>')" class="btn btn-sm btn-circle btn-default view_detail_btn"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
							<a href="javascript:void(0)" onclick="deleteTermsAndConditions(<?php echo $terms_and_conditions['id']?>,'Delete this? Are you sure?')" class="btn btn-sm btn-circle btn-default view_detail_btn"><i class="fa fa-trash" aria-hidden="true"></i> Delete </a>

						</div>

					</td>

				</tr>

		<?php $count++; }

		} ?>

			</tbody>

		</table>
		<div class="modal fade" id="delete_modal_faq" tabindex="-1" role="basic" aria-hidden="true">
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
