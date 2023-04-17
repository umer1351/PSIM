<!--====== Start Hero Area ======-->
<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title">Become A Member</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="index.html">Home</a></li>
                            <li class="">Become A Member</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Hero Area ======-->

<!--====== Start Become A Member Free Form ======-->
<section class="course-registration-form become-member-form pt-80 pb-60">
    <div class="container">
        <div class="row align-items-center mb-50">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="account_fname" placeholder="Full Name">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="account_lname" placeholder="Father/Husband Name">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="dob" placeholder="DOB">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="account_cnic" placeholder="PMDC Number">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="qualification" placeholder="Technical Qualification">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="email" class="form-control" id="account_email" placeholder="Email">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="number" class="form-control" id="account_phone" placeholder="Contact Number">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="account_email" placeholder="CNIC">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="institute" placeholder="Institute">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="designation" placeholder="Designation">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="account_address" placeholder="Address">
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="clearfix"></div>                        
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <!-- Upload image input-->
                            <label>Payment Reciept</label>
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"><input id="imgInp" type="file" name="imgInp" ></small></label>
                                    <input type="hidden" id="profile_image_base64" value="">
                                    <input type="hidden" id="is_base64_method" value="0">
                                    <input type="hidden" id="role_type" value="<?php echo $common_data['user_data']['user_type'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"><img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>upload.png" alt="" id="image-preview" class="img-fluid " alt="" /></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <!-- Upload image input-->
                            <label>ID Card (Front)</label>
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"><input id="imgInp1" type="file" name="imgInp1" ></small></label>
                                    <input type="hidden" id="profile_image1" value="<?php echo $common_data['user_data']['id_card_front'] ?>">
                                    <input type="hidden" id="profile_image_base641" value="">
                                    <input type="hidden" id="is_base64_method1" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"><img src="<?php echo (empty($common_data["user_data"]["id_card_front"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."IDCARDFRONT/".$common_data["user_data"]['id_card_front'])?>" alt="" id="image-preview1" class="img-fluid rounded-circle" alt="" /></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <!-- Upload image input-->
                            <label>ID Card (Back)</label>
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"><input id="imgInp2" type="file" name="imgInp2" ></small></label>
                                    <input type="hidden" id="profile_image2" value="<?php echo $common_data['user_data']['id_card_back'] ?>">
                                    <input type="hidden" id="profile_image_base642" value="">
                                    <input type="hidden" id="is_base64_method2" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"><img src="<?php echo (empty($common_data["user_data"]["id_card_back"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."IDCARDBACK/".$common_data["user_data"]['id_card_back'])?>" alt="" id="image-preview2" class="img-fluid rounded-circle" alt="" /></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <!-- Upload image input-->
                            <label>PMDC Certificate</label>
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"><input id="imgInp3" type="file" name="imgInp3" ></small></label>
                                    <input type="hidden" id="profile_image3" value="<?php echo $common_data['user_data']['pmdc_id'] ?>">
                                    <input type="hidden" id="profile_image_base643" value="">
                                    <input type="hidden" id="is_base64_method3" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"> <img src="<?php echo (empty($common_data["user_data"]["pmdc_id"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."PMDCCERTIFICATE/".$common_data["user_data"]['pmdc_id'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" /></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <!-- Upload image input-->
                            <label>Internal Medicine</label>
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"><input id="imgInp4" type="file" name="imgInp4" ></small></label>
                                    <input type="hidden" id="profile_image4" value="<?php echo $common_data['user_data']['pmdc_id'] ?>">
                                    <input type="hidden" id="profile_image_base644" value="">
                                    <input type="hidden" id="is_base64_method4" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"> <img  src="<?php echo (empty($common_data["user_data"]["pmdc_id"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."PMDCCERTIFICATE/".$common_data["user_data"]['pmdc_id'])?>" alt="" id="image-preview4" class="img-fluid rounded-circle" alt="" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="button" class="btn main-btn register-btn btn-block" onclick="payNow(<?php echo $common_data['user_data']['id']; ?>,<?php echo $_GET['type']; ?>); ">Save</button>
            </div>
        </div>                
    </div>
</section>
<!--====== End Become A Member Free Form ======-->