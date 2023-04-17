
                <!-- BEGIN FOOTER -->
             <!--    <p class="copyright-v2">&copy; 2020 Plaany. All rights reserved.</p> -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- <button type="button" class="quick-sidebar-toggler" data-toggle="collapse">
                    <span class="sr-only">Toggle Quick Sidebar</span>
                    <i class="icon-logout"></i>
                    <div class="quick-sidebar-notification">
                        <span class="badge badge-danger">7</span>
                    </div>
                </button> -->
                <!-- END QUICK SIDEBAR TOGGLER -->
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>
        <!-- END CONTAINER -->

 <!-- SUSPEND MODAL -->
 <!-- Talent Engagement Modal -->
<div id="talentEngageModal" class="modal fade" role="dialog">
</div>
 <!-- Amount Update Modal <Start> -->
<div class="modal fade" id="amount_update_modal" tabindex="-1" role="basic" aria-hidden="true">
   <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Amount Update</h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<div class="input-group"><span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
						<input type="text" class="form-control" id="amount" value="" placeholder="Amount">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group errorMsg" style="color:red">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default blue" >Update</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Amount Update Modal <End> -->
<!-- Payment Approval Modal <Start> -->
<div class="modal fade" id="payment_approval_modal" tabindex="-1" role="basic" aria-hidden="true">
   <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment Details</h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Transaction ID</label>
					<div class="input-group"><span class="input-group-addon"><i class="fa fa-info" aria-hidden="true"></i></span>
						<input type="text" class="form-control" id="trans_id" value="" placeholder="Transaction ID">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Transaction Medium</label>
					<div class="input-group"><span class="input-group-addon"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
						<input type="text" class="form-control" id="payment_method" value="" placeholder="Payment Method">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Transaction Amount</label>
					<div class="input-group"><span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
						<input type="text" class="form-control" id="amount" value="" placeholder="Amount">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Payment Package</label>
					<div class="input-group"><span class="input-group-addon"><i class="fa fa-repeat" aria-hidden="true"></i></span>
						<input type="text" class="form-control" id="payment_package" value="" placeholder="Payment Package">
					</div>
				</div>
			</div>
		</div>
		<div class="row coupon_code">
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">Coupon Code</label>
					<div class="input-group"><span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
						<input type="text" class="form-control" id="coupon_code" value="" placeholder="Code">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group errorMsg" style="color:red">
      </div>
      <div class="modal-footer">
	   <button type="button" target="_blank" class="btn btn-default transaction_detail"  >Transaction Detials</button>
        <button type="button" class="btn btn-default blue" >Confirm</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Payment Approval Modal <End> -->
<!-- Settings modal <START> -->

	<div class="modal fade" id="settings" tabindex="-1" role="basic" aria-hidden="true">
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


<div class="modal fade" id="homepage_update" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Homepage</h4>
			</div>
			<div class="modal-body text">Changes saved !</div>
			<div class="modal-footer">
				<button type="button" onclick="location.reload();" class="btn blue" id="url" data-dismiss="modal">OK</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>
<!-- Settings modal <END> -->

<!-- Ad rejection View Reason Modal <START> -->
<div class="modal fade" id="ad_view_reason" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Account Settings</h4>
			</div>
			<div class="modal-body"> 
			<h4 class="control-label text_heading">Reason:</h4>
			<label class="text"></label>
			<h4 class="missing_details_label"></h4>
			<ul class="missing_details_list">
			
			</ul>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="location.href='<?php echo BACKEND_CHANGE_PASSWORD_URL ?>';" class="btn blue" id="url" data-dismiss="modal">OK</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>
<!-- Ad rejection View Reason Modal <START> -->


 <!-- SUSPEND MODAL -->

 <!-- REJECT MODAdAL -->

<div class="modal fade" id="reject_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Reject Ad</h4>
            </div>
            <div class="modal-body"> 
			<textarea name="reason_for_rejection" class="form-control" rows="5" placeholder="Rejection Reason"></textarea> 
			<div class="mt-radio-inline">
			<h4 class="control-label">Missing Details</h4>
			<?php
			foreach($approval_checklist as $list){
			?>
				<label class="mt-checkbox">
					<input type="checkbox" class="approval_checklist" name="approval_checklist" id="optionsRadios<?php echo $list['id'] ?>" value="<?php echo $list['id'] ?>"><label> <?php echo $list['name'] ?></label>
					<span></span>
				</label>
			<?php
			}
			//pr($approval_checklist);
			?>
			</div>
			<div class="modal-error errorMsg" style="color:red;"> </div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn blue">Submit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

 <!-- REJECT MODAL -->

 <!-- DELETE MODAdAL -->
 
<div class="modal fade" id="delete_modal" tabindex="-1" role="basic" aria-hidden="true">
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


 
 <!-- DELETE MODAL -->

        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
<!-- Script -->

<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>bootstrap.min.js"></script><!-- Bootstrap -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>js.cookie.min.js"></script><!-- cookie -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.slimscroll.min.js"></script> <!-- jquery slim scroll -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.blockui.min.js"></script> <!-- jquery block ui -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>bootstrap-switch.min.js"></script> <!-- bootstrap switch -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>dropzone.min.js"></script> <!-- dropzone -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>moment.min.js"></script> <!-- moment -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>daterangepicker.min.js"></script><!-- bootstrap Date Range Picker -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>morris.min.js"></script> <!-- morris -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>raphael-min.js"></script> <!-- raphael -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.waypoints.min.js"></script> <!-- jquery.waypoints.min -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.counterup.min.js"></script> <!-- jquery.counterup.min -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>fullcalendar.min.js"></script> <!-- fullcalendar -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>jquery.easypiechart.min.js"></script><!-- jquery easypiechart -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>jquery.sparkline.min.js"></script><!-- jquery sparkline -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.vmap.js"></script><!-- jquery vmap -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.vmap.sampledata.js"></script><!-- jquery vmap Sample data-->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>bootstrap-datepicker.min.js"></script><!-- bootstrap datepicker -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>bootstrap-timepicker.min.js"></script><!-- bootstrap timepicker -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>bootstrap-datetimepicker.min.js"></script><!-- bootstrap datetimepicker -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>clockface.js"></script> <!-- clockface  -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>bootstrap-tagsinput.min.js"></script> <!-- bootstrap tagsinput  -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>handlebars.min.js"></script> <!-- handlebars  -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>typeahead.bundle.min.js"></script> <!-- typeahead bundle -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>bootstrap-fileinput.js"></script> <!-- bootstrap fileinput -->
<script  type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>jquery.cubeportfolio.min.js"></script><!-- jquery.cubeportfolio.min.js -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>app.min.js"></script><!-- app -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>ajaxfileupload.js"></script><!-- ajaxfileupload -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>form-dropzone.min.js"></script><!-- form dropzone -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>dashboard.min.js"></script><!-- dashboard -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>profile.min.js"></script><!-- profile -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>components-date-time-pickers.min.js"></script><!-- components-date-time-pickers -->
<script  type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>portfolio-1.min.js"></script><!-- portfolio-4.min.js -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>layout.min.js"></script><!-- layout -->
<script  type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>quick-sidebar.min.js"></script><!-- quick-sidebar -->
<script  type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>quick-nav.min.js"></script><!-- quick-nav -->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>nicEdit-latest.js"></script><!-- nicEdit-latest -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>bootbox.js"></script><!-- Bootbox -->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>table-datatables-managed.js"></script><!-- datatable script  script-->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>datatable.js"></script><!-- datatable script  script-->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>datatables/datatables.min.js"></script><!-- datatable   script-->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>datatables/plugins/bootstrap/datatables.bootstrap.js"></script><!-- datatable bootstrap  script-->
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR;?>html5lightbox/html5lightbox.js"></script><!-- lightbox-->
<script type="text/javascript" src="<?php echo ASSET_JS_BACKEND_DIR;?>jquery.rateyo.js"></script> <!-- jquery rateyo -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
<script type="text/javascript"  src="<?php echo ASSET_JS_BACKEND_DIR ?>script.js"></script><!-- Script -->
<?php //if(strpos($_SERVER['REQUEST_URI'], 'admin_content')){?>
 <script type="text/javascript">

$(document).ready(function(){

$('.nicEdit-main').css('background' , '#ffffff');

//<![CDATA[

  bkLib.onDomLoaded(function() {

       // new nicEditor({maxHeight : 200}).panelInstance('page_content');

        new nicEditor({fullPanel : true,maxHeight : 500}).panelInstance('page_content');

  });

  //]]>

});

</script>
 <script type="text/javascript">
	jQuery(document).ready(function(){
		$('#stream_table').DataTable({
			columnDefs: [

                 {"className": "dt-head-left", "targets": "_all"}

			]
					/* paging: false,
			searching: false,
			info: false */
		});
		$('#stream_table1').DataTable({
			columnDefs: [

                 {"className": "dt-head-left", "targets": "_all"}

			]
			/* paging: false,
			searching: false,
			info: false */
		});
		
		<?php
		 if($this->session->userdata('action_row')){
			 //echo "test"; die();
			 $action_row = $this->session->userdata('action_row');
		 ?>
		 //alert('working');
		  $(".dataTable > tbody > tr#<?php echo $action_row ?>").addClass('highlighted');
		  setTimeout(function () {
					$(".dataTable > tbody > tr#<?php echo $action_row ?>").removeClass('highlighted');
				}, 10000);
		 <?php	
		 $this->session->unset_userdata('action_row');
		 }
		 ?>
		jQuery('.page-sidebar-menu > li > a').click(function() {
			jQuery('.page-sidebar-menu > li').removeClass('active');
			//jQuery(this).parent().addClass('active');
		});

	});
	jQuery(document).ready(function()
	{
		jQuery('#clickmewow').click(function()
		{
			jQuery('#radio1003').attr('checked', 'checked');
		});
	})
</script>

<script type="text/javascript">

	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker-2" ).datepicker();
	});

<?php  if(isset($page) && !empty($page)){ ?>
	$('.page-sidebar-menu li').removeClass('active open');
	//$('.page-sidebar-menu li#<?php echo $page;?>').addClass('active open');
	$('.page-sidebar-menu li#<?php echo $page;?>_li').addClass('active open');
<?php } ?>
</script>
<script>
	$(".dropdown-menu.landing-page-dropdown-menu li a").click(function(){
	  var selText = $(this).text();
	  $(this).parents('.btn-group.landing-page-btn-group').find('.dropdown-toggle.landing-page-dropdown-toggle').html('Sort By: '+selText+' <span class="caret"></span>');
	});
	$(document).ready(function(){
		$('.dropdown-menu.landing-page-dropdown-menu li').click(function(){
			$(this).addClass('dropdown_active');
			$(this).siblings().removeClass('dropdown_active');

		});
		//Switches
		//var elem = document.querySelector('.js-switch');
		//var init = new Switchery(elem, { size: 'small' });
	});
</script>


<!--************************* FOOTER <End> ************************* -->
<?php 
//This line of code will enable js functions to call CI's XAJAX functions
echo ( isset($this->xajax_js) )?$this->xajax_js:''; 
?>
<?php 
/* End of file footer.php */
/* Location: ./application/views/backend/elements/footer.php */
?>
