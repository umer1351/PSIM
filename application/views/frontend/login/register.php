<section class="page_breadcrumbs ls ms theme_breadcrumbs parallax section_padding_bottom_15 section_padding_top_75">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="heading text-center bottom_border">
					<p class="text-uppercase josefin grey fontsize_20"><?php echo WEBSITE_NAME ?></p>
					<h1 class="section_header topmargin_5">Registration</h1>
				</div>
				<ol class="breadcrumb">
					<li>
						<a href="index.php">
							Home
						</a>
					</li>

					<li class="active">Registration</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="ls section_padding_top_100 section_padding_bottom_75 sign_up">
	<div class="container">

		<div class="row">

			<div class="col-sm-8 col-md-8 col-lg-8">

				<!-- <h2>Registration</h2> -->
				<!-- <div class="heading bottom_border1 col-md-offset-4 col-sm-offset-5">
                    <button class="loginBtn loginBtn--facebook" onclick="loginByFacebook();"> Signup with Facebook</button>
				<span class="orr">OR</span>
               </div> -->

				<form class="form-horizontal registerForm checkout shop-checkout" method="post" name="registerForm" id="registerForm" onsubmit="registerByEmail(); return false;">
					<div class="form-group" validate-required radio id="billing_first_name_field">
                        <label for="billing_first_name" class="col-sm-4 control-label ownst">
                            <span class="grey">Select Role</span>
                            <span class="required">*</span>
                        </label>
                        <div class="col-sm-8">
                            <div class="radio-group" style="width: 100%;">
                                <!--<input type="radio" class="btn btn-primary" name="user_role" id="user_role">Talent</button>
                                                <button type="radio" class=" btn btn-secondary" name="user_role" id="user_role">Employer</button> -->
                                <input type="radio" id="option-one" name="role" value="<?php echo USER_SERVICE_PROVIDER ?>" checked="checked">
                                <label for="option-one" class="tlent">I am a Service Provider</label>
                                <input type="radio" id="option-two" name="role" value="<?php echo USER_ORGANIZER ?>">
                                <label for="option-two" class="cntre1">I am an Event Planner</label>
                            </div>

                        </div>
                    </div>
                    <div class="service_provider">
						<div class="form-group validate-required" id="billing_first_name_field">
							<label for="billing_first_name_field" class="col-sm-4 control-label ownst">
								<span class="grey">First Name </span>
								<span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="John" value="">
							</div>
						</div>

						<div class="form-group validate-required validate-email" id="billing_last_name_field">
							<label for="billing_last_name_field" class="col-sm-4 control-label ownst">
								<span class="grey">Last Name</span>
								<span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control " name="last_name" id="last_name" placeholder="Doe" value="">
							</div>
						</div>
						
						<div class="form-group validate-required validate-email" id="billing_email_field">
							<label for="billing_email" class="col-sm-4 control-label ownst">
								<span class="grey">Email </span>
								<span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control " name="email" id="email" placeholder="johndoe@example.com" value="">
							</div>
						</div>
						<div class="form-group validate-required validate-phone" id="billing_password">
							<label for="billing_password" class="col-sm-4 control-label ownst">
								<span class="grey">Password </span>
								<span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="password" class="form-control " name="password" id="password" placeholder="******" value="">
							</div>
						</div>
						<div class="form-group validate-required validate-phone" id="billing_password_confirm">
							<label for="billing_password" class="col-sm-4 control-label ownst">
								<span class="grey">Confirm Password </span>
								<span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<input type="password" class="form-control " name="password1" id="password1" placeholder="******" value="">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-12">
							<div class="checkbox">
								<label>
									<input id="newsletter_sub" type="checkbox"> Sign up for newsletter
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input id="agree_terms" type="checkbox">  I’ve read and accept the <a href="<?php echo ROUTE_TERMS_AND_CONDITIONS ?>">terms & conditions *</a>
								</label>
							</div>
							 <div class="place-order topmargin_50">
								 <div class="form-group errorMsg" style="color:red">
								 </div>
								<input type="submit" class="theme_button color1" name="checkout_place_order" id="place_order" value="Register">
							</div>
							<div class="register-signin-p">
                                <p> Already have an account? <a href="<?php echo ROUTE_LOGIN ?>">Sign in</a>
                                </p>
                            </div>
						</div>
					   
					</div>
					
				</form>

			</div>
			<!--eof .col-sm-8 (main content)-->


			<!-- sidebar -->
			<aside class="col-sm-5 col-md-4 col-lg-4">
				<img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>model1.png">
				
			</aside>
			<!-- eof aside sidebar -->
		</div>
	</div>

</section>
