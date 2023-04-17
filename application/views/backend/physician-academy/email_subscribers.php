<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->

		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					
					<svg xmlns="http://www.w3.org/2000/svg" width="55.846" height="41.187" viewBox="0 0 55.846 41.187">
							  <g id="Group_3502" data-name="Group 3502" transform="translate(0 5.25)">
							    <path id="Path_170" data-name="Path 170" d="M120.64,93.78a6.015,6.015,0,1,0-6.015-6.015A6.015,6.015,0,0,0,120.64,93.78Zm0-9.692a3.688,3.688,0,1,1-3.688,3.688A3.688,3.688,0,0,1,120.64,84.089Zm0,0" transform="translate(-103.956 -78.902)"></path>
							    <path id="Path_171" data-name="Path 171" d="M89.238,234.873a9.027,9.027,0,0,0-6.539,2.734,9.65,9.65,0,0,0-2.7,6.83,1.167,1.167,0,0,0,1.163,1.163H97.312a1.167,1.167,0,0,0,1.163-1.163,9.65,9.65,0,0,0-2.7-6.83A9.026,9.026,0,0,0,89.238,234.873Zm-6.83,8.4a7.117,7.117,0,0,1,1.955-4.037,6.854,6.854,0,0,1,9.75,0,7.151,7.151,0,0,1,1.955,4.037Zm0,0" transform="translate(-72.554 -217.772)"></path>
							    <path id="Path_172" data-name="Path 172" d="M50.029-5.25H5.817A5.82,5.82,0,0,0,0,.567V30.119a5.82,5.82,0,0,0,5.817,5.817H50.029a5.82,5.82,0,0,0,5.817-5.817V.567A5.82,5.82,0,0,0,50.029-5.25Zm3.49,35.369a3.5,3.5,0,0,1-3.49,3.49H5.817a3.5,3.5,0,0,1-3.49-3.49V.567a3.5,3.5,0,0,1,3.49-3.49H50.029a3.5,3.5,0,0,1,3.49,3.49Zm0,0"></path>
							    <path id="Path_173" data-name="Path 173" d="M363.343,203.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -189.32)"></path>
							    <path id="Path_174" data-name="Path 174" d="M363.343,283.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -261.874)"></path>
							    <path id="Path_175" data-name="Path 175" d="M363.343,123.5H349.788a1.163,1.163,0,0,0,0,2.327h13.554a1.163,1.163,0,0,0,0-2.327Zm0,0" transform="translate(-316.176 -116.767)"></path>
							  </g>
							</svg> Users </div>
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
								
								<th scope="col"> Email </th>
								 
							</tr>
						</thead>
						<tbody>
						<?php
						if(!empty($users)){
							$count = 0;
							foreach($users as $user){
							$count++;
						?>
								<tr id='user<?php echo $user['id']?>'>
									<td><?php echo $count; ?></td>
									
									<td><?php echo $user['email']; ?></td>
							
									
	
								</tr>
						<?php
							}
						}else{
						?>
						<th colspan="6" style="text-align:center">No User Found!</th>
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
