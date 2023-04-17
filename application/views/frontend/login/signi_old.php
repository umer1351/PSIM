
<div class="login-signup-container" id="container">
    <div class="form-container sign-up-container" id="sign-up">

       <!--  <form class="custom-form choose-account-type-form register_form"  onsubmit="registerByEmail(); return false;">
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
                        <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>event-planner.svg" alt="" class="img-fluid" />
                    </div>
                    <div class="account-type-text">
                        <p>  I am an <u> Event Planner</u></p>
                    </div>
                </div>
            </a>
            <a href="javascript:void(0)" class="account-type service-provider-form-link">
                <div class="account-type-inner d-flex align-items-center">
                    <div class="account-type-image">
                        <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>service-provider.svg" alt="" class="img-fluid" />
                    </div>
                    <div class="account-type-text">
                        <p>I am a <u>Service Provider</u></p>
                    </div>
                </div>
            </a>
          </div>
        </form> -->
       
       
    </div>
    <div class="form-container sign-in-container">
        <form class="custom-form" id= "loginForm" onsubmit="loginByEmail(); return false;">
        <h4 class="secondary-heading purple-colored text-center d-block d-sm-none mb-5">Hello again!</h4>
            <h2>Track Your Order</h2>
            <div class="large-spacer"></div>
            <div class="form-row">
            <div class="col">
                  <div class="form-group">
                    <label for="exampleInputEmail">Order Number</label>
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" required="" />
                  </div>
                </div>
            </div>
            <!-- <div class="form-row">
            <div class="col">
                  <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" required="" />
                  </div>
                </div>
            </div> -->
            <div class="form-row">
            <div class="col">
                  <div class="d-flex justify-content-between align-items-center">
                <div class="form-check-label">
                   <!--  <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="remember" id="remember">
                                  <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                  Remember me
                                </label>
                            </div> -->
                </div>
                <!-- <div class="forgot-password-link">
                    <a href="<?php echo ROUTE_FORGOT_PASSWORD ?>" class="underlined-link">Forgot Password?</a>
                </div> -->
              </div>
            </div>
            
          </div>
          <div class="large-spacer"></div>
          <!-- <div class="large-spacer"></div> -->
          <div class="login-signup-actions">
              <button type="submit" class="btn btn-custom">Track Your Order</button>
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

        <div class="background-image-pattern d-none">
            <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>page-x-axis-bottom-pattern.svg" alt="">
        </div>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <form class="custom-form" id= "loginForm" onsubmit="loginByEmail(); return false;">
        <h4 class="secondary-heading purple-colored text-center d-block d-sm-none mb-5">Hello again!</h4>
            <h2>Track Your Order</h2>
            <div class="large-spacer"></div>
            <div class="form-row">
            <div class="col">
                  <div class="form-group">
                    <label for="exampleInputEmail">Order Number</label>
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" required="" />
                  </div>
                </div>
            </div>
            <!-- <div class="form-row">
            <div class="col">
                  <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" required="" />
                  </div>
                </div>
            </div> -->
            <div class="form-row">
            <div class="col">
                  <div class="d-flex justify-content-between align-items-center">
                <div class="form-check-label">
                   <!--  <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="remember" id="remember">
                                  <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                  Remember me
                                </label>
                            </div> -->
                </div>
                <!-- <div class="forgot-password-link">
                    <a href="<?php echo ROUTE_FORGOT_PASSWORD ?>" class="underlined-link">Forgot Password?</a>
                </div> -->
              </div>
            </div>
            
          </div>
          <div class="large-spacer"></div>
          <!-- <div class="large-spacer"></div> -->
          <div class="login-signup-actions">
              <button type="submit" class="btn btn-custom">Track Your Order</button>
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