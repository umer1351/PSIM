<div class="info-page-content-wrapper text-center standard-padding-y-less">
	<h2 class="sub-heading bold-text dark-colored">Thank you for joining our community</h2>
	<div class="medium-spacer"></div>
	<div class="image-div">
		<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>verification-email-img.svg" alt="" class="img-fluid">
	</div>
	<div class="medium-spacer"></div>
	<div class="regular-text medium-text">An email has been sent to your email address. Please verify your email. If you don't see an email in your inbox then please check your spam folder.</div>
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
        <div class="medium-spacer"></div>
		<a href="http://dev.appstersinc.com/plaany/plaany_web/sign-in" class="underlined-link"><span>Login</span></a>
	</div>
</div>