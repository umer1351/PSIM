

<!--====== Start Hero Area ======-->
<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title">Password Reset</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="index.html">Home</a></li>
                            <li class="">Password Reset</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Hero Area ======-->
<section class="course-registration-form pt-80 pb-60">
    <div class="container">
<div class="forgot-password-content-wrapper text-center standard-padding-y-half">
	<h2 class="secondary-heading dark-colored">Forgot Password?</h2>
	<div class="medium-spacer"></div>
	
	<div class="medium-spacer"></div>
	<form class="custom-form" id="resetForm" onsubmit="resetEmail(); return false;">
	  <div class="form-group text-left">
    	<label for="exampleInputEmail1">Email</label>
	    <input type="email" class="form-control" name="reset_email" id="reset_email" aria-describedby="emailHelp" required="" />
	  </div>
	  <div class="low-spacer"></div>
	  <button type="submit" class="btn btn-custom">Get Password</button>
	</form>
	<div class="medium-spacer"></div>
	
           <!-- <div class="medium-spacer"></div> -->
          
          
	<div class="text-center">
		<div class="info-msg error-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>error-warning.svg" class="img-fluid" alt="">
          <div class="info-msg-text erro"></div>
        </div>
        <div class="info-msg success-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>success-tick.svg" class="img-fluid" alt="">
          <div class="info-msg-text succs"></div>
        </div>
		<!-- <a href="<?php echo ROUTE_LOGIN ?>" class="underlined-link">Back to Login</a> -->
	</div>

</div>
</div>
</section>
 <div class="modal fade" id="resetPassMsg" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    <div class="modal-body">
                        <div class="pass-reset-msg">
                            <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>password-reset.png" alt="Password Reset">
                            <p><span> Your Password has been reset</span><br/> Please check your email for further instructions</p>  
                            <div class="reset-msg-border"></div>
                        </div>
                    </div>
                </div>
               

            </div>
        </div>
<?php 
//This line of code will enable js functions to call CI's XAJAX functions
echo ( isset($this->xajax_js) )?$this->xajax_js:''; 
?>