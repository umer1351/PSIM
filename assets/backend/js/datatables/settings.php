
                <div class="page-fixed-main-content" style="min-height: 380px">
                    <!-- BEGIN PAGE BASE CONTENT -->

                    <div class="col-md-12 col-xs-12 col-sm-12 performance-form">

                        <div class="page-heading-related">
                            <h3 class="form-section float-left-style">Settings</h3>
                        </div>
                        
                        <!-- BEGIN FORM-->
                            <form class="horizontal-form student-details-form custom-details-form" method="post" id="editSettingsForm" name="editSettingsForm" onsubmit="editSettings(); return false;">
                                <div class="form-body">
                                    <!--/row-->
									 <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Ad Approval Checklist</label>
												<ul class="ad_approval_checklist" name="ad_approval_checklist">
													<?php
													foreach($ad_approval_checklist as $list){
													?>
													<li><i class="icon-check"></i> <?php echo $list['name']?></li>
													<?php
													}
													?>
												</ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Default Ad Status</label>
												<select name="ad_status_setting" class="form-control">
													<option value="<?php echo PENDING_AD_STATUS ?>" <?php echo ($default_ad_status==PENDING_AD_STATUS)?'selected':''?>>Pending</option>
													<option value="<?php echo APPROVED_AD_STATUS ?>" <?php echo ($default_ad_status==APPROVED_AD_STATUS)?'selected':''?>>Approved</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
								<div class="form-group">
									<div class="errorMsg " style="color:red"></div>
								</div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn blue"> <i class="fa fa-check"></i> Save Changes</button>
                                    <!--<button type="button" class="btn default">Cancel</button>-->
                                </div>
                            </form>
                            <!-- END FORM-->

                    </div>

                    <!-- END PAGE BASE CONTENT -->
                </div>