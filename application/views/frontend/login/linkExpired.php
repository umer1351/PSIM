<div class="info-page-content-wrapper text-center standard-padding-y-less">
	<h2 class="sub-heading bold-text dark-colored">Verification link expired</h2>
	<div class="medium-spacer"></div>
	<div class="image-div">
		<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>resend-verification-img.svg" alt="" class="img-fluid">
	</div>
	<div class="medium-spacer"></div>
	<div class="regular-text medium-text">Your verification link has expired. Please click the button below to get a new verification link.</div>
	<div class="medium-spacer"></div>
	<div class="text-center">
		<input type="hidden" id="reset_email" value="<?php echo $_GET['email'];?>" name="">
		<button type="button" onclick="resetViaEmail(); return false;" class="btn btn-custom">Resend Email</button>
		<div class="medium-spacer"></div>
		<div class="info-msg error-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>error-warning.svg" class="img-fluid" alt="">
          <div class="info-msg-text erro"></div>
        </div>
        <div class="info-msg success-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>success-tick.svg" class="img-fluid" alt="">
          <div class="info-msg-text succs"></div>
        </div>
		<!-- <button type="button" class="btn btn-custom">Resend Email</button> -->
	</div>
</div>