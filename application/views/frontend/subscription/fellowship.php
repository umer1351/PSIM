<script type="text/javascript">
/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}
</script>

<!--====== Start Hero Area ======-->
<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title">Conference Subsscription</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="index.html">Home</a></li>
                            <li class="">Conference Subscription</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Hero Area ======-->

<!--====== Start Course Registration Form ======-->
<section class="course-registration-form pt-80 pb-60">
    <div class="container">
        <div class="row align-items-center mb-50">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="account_fname" value="<?php echo $common_data['user_data']['first_name'] ?>"  placeholder="Full Name">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="account_lname" value=""   placeholder="PMDC ID">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="email" class="form-control" id="account_email" value="<?php echo $common_data['user_data']['email'] ?>" placeholder="Email">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="number" class="form-control" id="account_phone" placeholder="Contact Number">
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
                <?php $id = decrypt_url($_GET['u']); ?>
                <?php $t = decrypt_url($_GET['t']); ?>
              <?php if($this->common_data['user_data']['premium_subscription'] == '1' && $this->common_data['user_data']['approval_member'] == '1' && $sub_module['premium_active'] == '1'){ ?>

                <label for="account_address">You're a lifetime member so you don't need to pay registration fee receipt.</label></br>

              <?php }elseif($this->common_data['user_data']['premium_subscription'] == '2' && $this->common_data['user_data']['approval_member'] == '1'  && $sub_module['premium_active'] == '1'){  ?>

                <label for="account_address">You're an annual member so you don't need to pay registration fee receipt.</label></br>

              <?php }else{?>
            
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <!-- <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div> -->

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="account_address"><b>Payment Receipt</b></label></br>
                            <!-- Upload image input-->
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"><input id="imgInp" type="file" name="imgInp" ></small></label>
                                    <input type="hidden" id="profile_image_base64" value="">
                                <input type="hidden" id="is_base64_method" value="0">
                            <input type="hidden" id="role_type" value="<?php echo $common_data['user_data']['user_type'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>upload.png" alt="" id="image-preview" class="img-fluid " alt="" /></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="button" onclick="checkout('<?php echo $id; ?>','<?php echo $t; ?>'); "  class="btn main-btn register-btn btn-block">Register</button>
            </div>
        </div>                
    </div>
</section>
<!--====== End Course Registration Form ======-->