<?php

?>
<div class="mainContentDiv">
    <div id="promo-banner-or-social-proof">
<div class="login-signup-container" id="container">
    <div class="form-container sign-up-container" id="sign-up">

        <!-- <form class="custom-form choose-account-type-form register_form"  onsubmit="registerByEmail(); return false;">
          <input type="hidden" class="account-type-user" name="" value="">
          <div class="d-block d-sm-flex justify-content-between align-items-center">
            <h4 class="secondary-heading purple-colored text-center d-block d-sm-none mb-5">Welcome to Planny</h4>
            <h2>Choose account type</h2>
            <div class="text-right text-sm-left regular-text bold-text">Step 1 of 2</div>
          </div>
            <div class="large-spacer"></div>
          <div class="account-type-outer">
            <a href="javascript:void(0)" class="account-type event-planner-form-link">
                <div class="account-type-inner d-flex align-items-center">
                    <div class="account-type-image">
                       
                    </div>
                    <div class="account-type-text">
                        <p>  I am an <u> Event Planner</u></p>
                    </div>
                </div>
            </a>
            <a href="javascript:void(0)" class="account-type service-provider-form-link">
                <div class="account-type-inner d-flex align-items-center">
                    <div class="account-type-image">
                      
                    </div>
                    <div class="account-type-text">
                        <p>I am a <u>Service Provider</u></p>
                    </div>
                </div>
            </a>
          </div>
        </form> -->
        <form class="custom-form choose-account-type-form register_form  reg_form " onsubmit="registerPlannerByEmail(); return false;">
            <input type="hidden" class="account-type-user" name="" value="">
            <div class="d-block d-sm-flex justify-content-between align-items-center">
                <h4 class="secondary-heading purple-colored text-center d-block d-sm-none mb-5">A few clicks away<p class="regular-text">from joining our community</p></h4>
                <h2>Enter your details</h2>
                <div class="text-right text-sm-left regular-text bold-text"><i class="fa fa-angle-left back-to-choose-account-link mr-2" title="Back to step 1"></i>Step 2 of 2</div>
            </div>
            <div class="large-spacer"></div>
            <div class="form-fields">
                <div class="form-row">
                <div class="col">
                      <div class="form-group">
                        <label for="ep_signup_fname">First Name</label>
                        <input type="text" class="form-control first_name" id="ep_signup_fname" aria-describedby="ep_signup_fname_help" required="" />
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="ep_signup_lname">Last Name</label>
                        <input type="text" class="form-control last_name" id="ep_signup_lname" aria-describedby="ep_signup_lname_help" required="" />
                      </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                      <div class="form-group">
                        <label for="ep_signup_email">Email</label>
                        <input type="email" class="form-control email" id="ep_signup_email" aria-describedby="ep_signup_email_help" required="" />
                      </div>
                    </div>
                </div>

                <div class="form-row">
                <div class="col">
                      <div class="form-group">
                        <label for="ep_signup_password">Password</label>
                        <input type="password" class="form-control password" id="ep_signup_password" aria-describedby="ep_signup_password_help" required="" />
                      </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label for="ep_signup_confirm_password">Confirm Password</label>
                        <input type="password" class="form-control password1" id="ep_signup_confirm_password" aria-describedby="ep_signup_confirm_password_help" required="" />
                      </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                      <div class="form-group">
                        <label for="ep_signup_email">Captcha</label>
                        <input type="text" class="form-control email" id="img" aria-describedby="" readonly value="37g4IK-<?php echo(rand(10,100)); ?>" />
                        <input type="text" class="form-control email" id="captcha" aria-describedby="ep_signup_email_help" required="" />
                      </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                      <div class="form-group">
                       <!--  <div class="form-check form-check-inline form-radio-label mr-5">
                              <div class="radio">
                                  <label>
                                    <input type="radio" name="planne_account_type" class="planne_account_type" value="1" required="" checked>
                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                    Individual
                                  </label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline form-radio-label">
                              <div class="radio">
                                  <label>
                                    <input type="radio" class="planne_account_type" name="planne_account_type" value="2" required="">
                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                    Business
                                  </label>
                                </div>
                            </div> -->

                           
                        </div>
                    </div>
                </div>
          </div>
          <!-- <div class="errorMsg"></div> -->
          <div class="medium-spacer"></div>
           <!-- <div class="medium-spacer"></div> -->
          <div class="login-signup-actions" >
            <button type="submit" class="btn btn-custom">Sign up</button>
          </div>
             <div class="medium-spacer"></div>
          <div class="info-msg error-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>error-warning.svg" class="img-fluid" alt="">
          <div class="info-msg-text erro"></div>
        </div>
        <div class="info-msg success-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>success-tick.svg" class="img-fluid" alt="">
          <div class="info-msg-text succs"></div>
        </div>  
        </form>
        <form class="custom-form service-provider-form" onsubmit="registerServiceProviderByEmail(); return false;">
            <input type="hidden" class="account-type" name="" value="">
            <div class="d-block d-sm-flex justify-content-between align-items-center">
                <h4 class="secondary-heading purple-colored text-center d-block d-sm-none mb-5">A few clicks away<p class="regular-text">from joining our community</p></h4>
                <h2>Enter your details</h2>
                <div class="text-right text-sm-left regular-text bold-text"><i class="fa fa-angle-left back-to-choose-account-link mr-2" title="Back to step 1"></i>Step 2 of 2</div>
            </div>
            <div class="large-spacer"></div>
            <div class="form-fields">
              <div class="form-row">
                <div class="col">
                      <div class="form-group">
                        <label for="sp_signup_fname">First Name</label>
                        <input type="text" class="form-control first_name" id="sp_signup_fname" aria-describedby="sp_signup_fname_help" required="" />
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="sp_signup_lname">Last Name</label>
                        <input type="text" class="form-control last_name" id="sp_signup_lname" aria-describedby="sp_signup_lname_help" required="" />
                      </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                      <div class="form-group">
                        <label for="sp_signup_email">Email</label>
                        <input type="email" class="form-control email" id="sp_signup_email" aria-describedby="sp_signup_email_help" required="" />
                      </div>
                    </div>
                </div>
             <div class="form-row" style="display: none;"> 
                <div class="col">
                      <div class="form-group">
                        <label for="sp_signup_business_name">Business Name</label>
                        <input type="text" class="form-control business_name" id="sp_signup_business_name" aria-describedby="sp_signup_business_name_help" value="Appsters" />
                        <span class="field-sub-text">(Optional)</span>
                      </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label for="sp_signup_password">Password</label>
                        <input type="password" class="form-control password" id="sp_signup_password" aria-describedby="sp_signup_password_help" required="" />
                      </div>
                    </div>
                <div class="col">
                      <div class="form-group">
                        <label for="sp_signup_confirm_password">Confirm Password</label>
                        <input type="password" class="form-control password1" id="sp_signup_confirm_password" aria-describedby="sp_signup_confirm_password_help" required="" />
                      </div>
                    </div>
                </div>
            </div>
            <!-- <div class="errorMsg"></div> -->
            <div class="medium-spacer"></div>
            <div class="login-signup-actions">
            <button type="submit" class="btn btn-custom">Sign up</button>
          </div>
          <div class="medium-spacer"></div>
          <div class="info-msg error-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>error-warning.svg" class="img-fluid" alt="">
          <div class="info-msg-text erro"></div>
        </div>
        <div class="info-msg success-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>success-tick.svg" class="img-fluid" alt="">
          <div class="info-msg-text succs"></div>
        </div> 
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form class="custom-form" id= "loginForm" onsubmit="loginByEmail(); return false;">
        <h4 class="secondary-heading purple-colored text-center d-block d-sm-none mb-5">Hello again!</h4>
            <h2>Login</h2>
            <div class="large-spacer"></div>
            <div class="form-row">
            <div class="col">
                  <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" required="" />
                  </div>
                </div>
            </div>
            <div class="form-row">
            <div class="col">
                  <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" required="" />
                  </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                      <div class="form-group">
                        <label for="ep_signup_email">Captcha</label>
                        <input type="text" class="form-control email" id="img" aria-describedby="" readonly value="37g4IK-<?php echo(rand(10,100)); ?>" />
                        <input type="text" class="form-control email" id="captcha" aria-describedby="ep_signup_email_help" required="" />
                      </div>
                    </div>
                </div>
            <div class="form-row">
            <div class="col">
                  <div class="d-flex justify-content-between align-items-center">
                <div class="form-check-label">
                    <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="remember" id="remember">
                                  <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                  Remember me
                                </label>
                            </div>
                </div>
                <div class="forgot-password-link">
                    <a href="<?php echo ROUTE_FORGOT_PASSWORD ?>" class="underlined-link">Forgot Password?</a>
                </div>
              </div>
            </div>
            
          </div>
          <div class="large-spacer"></div>
          <!-- <div class="large-spacer"></div> -->
          <div class="login-signup-actions">
              <button type="submit" class="btn btn-custom">Login</button>
            </div>
            <div class="medium-spacer"></div>
          <div class="info-msg loerror error-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>error-warning.svg" class="img-fluid" alt="">
          <div class="info-msg-text err"></div>
        </div>
        <div class="info-msg success-info-msg" style="display: none;">
          <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>success-tick.svg" class="img-fluid" alt="">
          <div class="info-msg-text succs"></div>
        </div>  
        </form>

        
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <div class="welcome-to-plaany plaany-signup-welcome">
                  <h2 class="white-text mb-0 text-center">Welcome to PSIM</h2>
                  <div class="medium-spacer"></div>
                  <div class="overlay-panel-image">
                  
                  </div>
                </div>
                <div class="event-planner-welcome plaany-signup-welcome">
                  <h2 class="white-text mb-0 text-left">A few clicks away<p class="regular-text">from joining our community</p></h2>
                  <div class="medium-spacer"></div>
                  <div class="overlay-panel-image">
                    
                  </div>
                </div>
                <div class="service-provider-welcome plaany-signup-welcome">
                  <h2 class="white-text mb-0 text-left">A few clicks away<p class="regular-text">from joining our community</p></h2>
                  <div class="medium-spacer"></div>
                  <div class="overlay-panel-image">
                   
                  </div>
                </div>
                <div class="d-none d-sm-block large-spacer"></div>
                <p class="regular-text">If you are already a member, <br />then please</p>
                <div class="low-spacer"></div>
                <button class="ghost btn btn-custom btn-white" id="signIn">Login</button>
            </div>
            <div class="overlay-panel overlay-right">
            <h2 class="d-none d-sm-block white-text">Hello again!</h2>
                <div class="d-none d-sm-block medium-spacer"></div>
                <div class="d-none d-sm-block overlay-panel-image">
                    
                </div>
                <div class="d-none d-sm-block large-spacer"></div>
                <p class="regular-text">If you are new to PSIM, <br />then please</p>
                <div class="low-spacer"></div>
                <button class="ghost btn btn-custom btn-white" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php 
//This line of code will enable js functions to call CI's XAJAX functions
echo ( isset($this->xajax_js) )?$this->xajax_js:''; 
?>

<script type="text/javascript">
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>