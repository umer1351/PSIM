<style type="text/css">
	table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    table tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
        background-color: rgba(0,0,0,.05);
    }
    table tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05);
    }
    table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
</style>
<div class="mainContentDiv">
	<div class="container">
		<div id="promo-banner-or-social-proof">
		   <!--  <a class="btn btn-secondary mt-5" href="<?php echo base_url(); ?>examination-courses">Back to listing</a> -->
			<div class="row mt-3 mb-5">
				<div class="col-12">

					<div class="card mb-5">						
						<h4 class="card-header text-center bg-primary text-white" style="    margin-top: 60px;
    background-color: #162542 !important;">
							<?php print_r($listing['top_information']); ?></h4>
						<div class="card-body" style="max-height: 500px; overflow-y: scroll;">
							<p class="text-center font-weight-bold">
								<?php print_r($listing['title']); ?>
							</p>
							
							

							<div class="alert alert-info text-primary text-center">
								<?php  print_r(str_replace('%^', '"', $listing['details'])); ?>
							</div>
							<div class="table-responsive" style="    overflow-x: unset !important;">
							<?php echo str_replace('%^', '"', $listing_det['details']); ?>
						<!-- 	<table id="stream_table" class="table table-bordered table-striped table-hover">
									<thead class="thead-light"> 
										<tr>
											<th scope="col"> # </th>
											<th scope="col"> Time </th>
											<th scope="col"> Speaker </th>
											<th scope="col"> Topic </th>   
											
											<th scope="col"> Details </th>
											
										</tr>
									</thead>
									<tbody>
									<?php
							
									if(!empty($sub_module)){
										$count = 0;
										foreach($sub_module as $module){
										$count++;
									?>
											<tr id="user">
												<td><?php echo $count; ?></td>
												<td ><?php echo date('h:i a', $module['time']); ?></td>
												<td><?php echo $module['speaker']; ?></td>
												<td><?php echo $module['topic']; ?></td>
												
												<td>
												<?php echo $module['details']; ?>
												</td>
												
												
												
											</tr>

									<?php
										}
									}else{
									?>
									<th colspan="6" style="text-align:center">No Details Found!</th>
									<?php
									}
									?>
									</tbody>
								</table>  -->
							</div>

						</div>
						<br>
						<h4 class="card-header text-center bg-primary text-white" style="    margin-top: 60px;
    background-color: #162542 !important;">
							<?php $id = decrypt_url($_GET['u']); ?>
				<?php $t = decrypt_url($_GET['t']); ?>
				<a href="<?php echo base_url(); ?>checkout?u=<?php echo encrypt_url($id);?>&t='<?php echo encrypt_url($t); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" ; >
                    <span class="_1lutnh9y">Click here to Subscribe this course.</span>
                </a></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

  


				</div>
				
	</div>
