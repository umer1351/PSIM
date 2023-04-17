<div class="mainContentDiv">
    <div id="promo-banner-or-social-proof">
        <div class="soapbox-row">
<div class="portlet-body">
				<div class="">
					<table id="stream_table" class="table table-striped table-bordered table-hover table-students">
						<thead> 
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