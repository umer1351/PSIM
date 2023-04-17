<!--************************* login <Start> ************************* -->
<!-- BEGIN : LOGIN PAGE 5-2 -->
<div class="user-login-5">
	<div class="row bs-reset">
		<div class="col-md-6 login-container bs-reset login-cont-left">
			
			<div class="login-content" >
				<!-- <h1>User Login</h1> -->
			   <!--  <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p> -->
				<form class="login-form" method="post" id="loginForm" name="loginForm" onsubmit="loginByEmail(); return false;">
					<div class="alert alert-danger display-hide errorMsg">
						<button class="close" data-close="alert"></button>
						<span class=""></span>
					</div>
					<div class="row username_row">
						<div class="col-xs-7">
							<input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="username"/> </div>
						<div class="col-xs-7">
							<input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password"/> </div>
					</div>
					<div class="row sign-in-row">
						<div class="col-xs-12">
							<label class="rememberme mt-checkbox mt-checkbox-outline">
								<input type="checkbox" id="remember" name="remember" value="1" /> Remember me
								<span></span>
							</label>
						</div>
						<div class="col-xs-12">
							<!--<a href="<?php echo BACKEND_DASHBOARD_URL ?>" class="btn red" type="submit">Sign In</a>-->
							 <button type="submit" class="btn red">Sign In</button>
						</div>
					</div>
					 <div class="row sign-in-row text-right">
					 <div class="col-sm-12">
							<div class="forgot-password">
								<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
							</div>
						</div>
					 </div>
				</form>
				<!-- BEGIN FORGOT PASSWORD FORM -->
				<form class="forget-form text-left" style="display:none" method="post" id="resetForm" name="resetForm" onSubmit="resetViaEmail(); return false;">
					<h3>Forgot Password ?</h3>
					<p> Enter your e-mail address below to reset your password. </p>
					<br/>
					<div class="alert alert-danger display-hide errorMsg">
						<button class="close" data-close="alert"></button>
						<span class=""></span>
					</div>
					<div class="form-group">
						<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
					<div class="form-actions">
						<button type="button" id="back-btn" class="btn blue btn-outline">Back</button>
						<button type="submit" class="btn blue uppercase pull-right">Submit</button>
					</div>
				</form>
				<!-- END FORGOT PASSWORD FORM -->
			</div>
			<div class="login-footer">
				<div class="row bs-reset">
					<!-- <div class="col-xs-5 bs-reset">
						<ul class="login-social">
							<li>
								<a href="javascript:;">
									<i class="icon-social-facebook"></i>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<i class="icon-social-twitter"></i>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<i class="icon-social-dribbble"></i>
								</a>
							</li>
						</ul>
					</div> -->
					<div class="col-xs-12 bs-reset">
						<div class="login-copyright">
							<p>&copy; 2021 PSIM. All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 bs-reset">

			<!-- <div class="login-bg"> </div> -->
		</div>
	</div>
</div>
<!-- END : LOGIN PAGE 5-2 -->
<!--************************* viaEmail <End> ************************* -->
<?php 
/* End of file login.php */
/* Location: ./application/views/backend/login/login.php */
?>