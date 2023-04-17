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
				<?php $id = decrypt_url($_GET['u']); ?>
				<?php $t = decrypt_url($_GET['t']); ?>
				<a href="<?php echo base_url(); ?>checkout?u=<?php echo encrypt_url($id);?>&t='<?php echo encrypt_url($t); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" ; >
                    <span class="_1lutnh9y">Subscribe</span>
                </a>
	</div>
</div>
</div>
</div>