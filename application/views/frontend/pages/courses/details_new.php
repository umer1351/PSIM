<div class="mainContentDiv">
	<div class="container">
		<div id="promo-banner-or-social-proof">
			<div class="row mt-5 mb-5">
				<div class="col-12">
					<div class="card mb-5">						
						<h4 class="card-header text-center bg-primary text-white">Featured</h4>
						<div class="card-body">
							<p class="text-center font-weight-bold">
								Center aligned text on all viewport sizes.
							</p>
							<p class="text-center font-weight-bold">
								Center aligned text on all viewport sizes.
							</p>
							<div class="alert alert-info text-primary text-center">
								This is a dark alert—check it out!
							</div>

							<div class="alert alert-info text-primary text-center">
								This is a dark alert—check it out!
							</div>
							<div class="table-responsive">
								<table id="stream_table" class="table table-bordered table-striped table-hover">
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
									//print_r($users);die();
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
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>