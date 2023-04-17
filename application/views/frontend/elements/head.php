
<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>
		 <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--====== Title ======-->
        <title>PSIM</title>
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="<?php echo ASSET_FRONTEND ?>images/favicon.png" type="image/png">
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_CSS_FRONTEND_DIR ?>bootstrap.min.css">
        <!--====== FontAwesoem css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_FRONTEND ?>fonts/fontawesome/css/all.min.css">
        <!--====== Flaticon css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_FRONTEND ?>fonts/flaticon/flaticon.css">
        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_CSS_FRONTEND_DIR ?>magnific-popup.css">
        <!--====== Slick css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_CSS_FRONTEND_DIR ?>slick.css">
        <!--====== Nice-select css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_CSS_FRONTEND_DIR ?>nice-select.css">
        <!--====== Animate css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_CSS_FRONTEND_DIR ?>animate.css">
        <!--====== Default css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_CSS_FRONTEND_DIR ?>default.css">
        <!--====== Style css ======-->
        <link rel="stylesheet" href="<?php echo ASSET_CSS_FRONTEND_DIR ?>style.css">
        
        <style>
            /* Magnific Popup CSS */
            .mfp-bg {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1042;
            overflow: hidden;
            position: fixed;
            background: #0b0b0b;
            opacity: 0.8; }

            .mfp-wrap {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1043;
            position: fixed;
            outline: none !important;
            -webkit-backface-visibility: hidden; }

            .mfp-container {
            text-align: center;
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            padding: 0 8px;
            box-sizing: border-box; }

            .mfp-container:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle; }

            .mfp-align-top .mfp-container:before {
            display: none; }

            .mfp-content {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            margin: 0 auto;
            text-align: left;
            z-index: 1045; }

            .mfp-inline-holder .mfp-content,
            .mfp-ajax-holder .mfp-content {
            width: 100%;
            cursor: auto; }

            .mfp-ajax-cur {
            cursor: progress; }

            .mfp-zoom-out-cur, .mfp-zoom-out-cur .mfp-image-holder .mfp-close {
            cursor: -moz-zoom-out;
            cursor: -webkit-zoom-out;
            cursor: zoom-out; }

            .mfp-zoom {
            cursor: pointer;
            cursor: -webkit-zoom-in;
            cursor: -moz-zoom-in;
            cursor: zoom-in; }

            .mfp-auto-cursor .mfp-content {
            cursor: auto; }

            .mfp-close,
            .mfp-arrow,
            .mfp-preloader,
            .mfp-counter {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none; }

            .mfp-loading.mfp-figure {
            display: none; }

            .mfp-hide {
            display: none !important; }

            .mfp-preloader {
            color: #CCC;
            position: absolute;
            top: 50%;
            width: auto;
            text-align: center;
            margin-top: -0.8em;
            left: 8px;
            right: 8px;
            z-index: 1044; }
            .mfp-preloader a {
                color: #CCC; }
                .mfp-preloader a:hover {
                color: #FFF; }

            .mfp-s-ready .mfp-preloader {
            display: none; }

            .mfp-s-error .mfp-content {
            display: none; }

            button.mfp-close,
            button.mfp-arrow {
            overflow: visible;
            cursor: pointer;
            background: transparent;
            border: 0;
            -webkit-appearance: none;
            display: block;
            outline: none;
            padding: 0;
            z-index: 1046;
            box-shadow: none;
            touch-action: manipulation; }

            button::-moz-focus-inner {
            padding: 0;
            border: 0; }

            .mfp-close {
            width: 44px;
            height: 44px;
            line-height: 44px;
            position: absolute;
            right: 0;
            top: 0;
            text-decoration: none;
            text-align: center;
            opacity: 0.65;
            padding: 0 0 18px 10px;
            color: #FFF;
            font-style: normal;
            font-size: 28px;
            font-family: Arial, Baskerville, monospace; }
            .mfp-close:hover,
            .mfp-close:focus {
                opacity: 1; }
            .mfp-close:active {
                top: 1px; }

            .mfp-close-btn-in .mfp-close {
            color: #333; }

            .mfp-image-holder .mfp-close,
            .mfp-iframe-holder .mfp-close {
            color: #FFF;
            right: -6px;
            text-align: right;
            padding-right: 6px;
            width: 100%; }

            .mfp-counter {
            position: absolute;
            top: 0;
            right: 0;
            color: #CCC;
            font-size: 12px;
            line-height: 18px;
            white-space: nowrap; }

            .mfp-arrow {
            position: absolute;
            opacity: 0.65;
            margin: 0;
            top: 50%;
            margin-top: -55px;
            padding: 0;
            width: 90px;
            height: 110px;
            -webkit-tap-highlight-color: transparent; }
            .mfp-arrow:active {
                margin-top: -54px; }
            .mfp-arrow:hover,
            .mfp-arrow:focus {
                opacity: 1; }
            .mfp-arrow:before,
            .mfp-arrow:after {
                content: '';
                display: block;
                width: 0;
                height: 0;
                position: absolute;
                left: 0;
                top: 0;
                margin-top: 35px;
                margin-left: 35px;
                border: medium inset transparent; }
            .mfp-arrow:after {
                border-top-width: 13px;
                border-bottom-width: 13px;
                top: 8px; }
            .mfp-arrow:before {
                border-top-width: 21px;
                border-bottom-width: 21px;
                opacity: 0.7; }

            .mfp-arrow-left {
            left: 0; }
            .mfp-arrow-left:after {
                border-right: 17px solid #FFF;
                margin-left: 31px; }
            .mfp-arrow-left:before {
                margin-left: 25px;
                border-right: 27px solid #3F3F3F; }

            .mfp-arrow-right {
            right: 0; }
            .mfp-arrow-right:after {
                border-left: 17px solid #FFF;
                margin-left: 39px; }
            .mfp-arrow-right:before {
                border-left: 27px solid #3F3F3F; }

            .mfp-iframe-holder {
            padding-top: 40px;
            padding-bottom: 40px; }
            .mfp-iframe-holder .mfp-content {
                line-height: 0;
                width: 100%;
                max-width: 900px; }
            .mfp-iframe-holder .mfp-close {
                top: -40px; }

            .mfp-iframe-scaler {
            width: 100%;
            height: 0;
            overflow: hidden;
            padding-top: 56.25%; }
            .mfp-iframe-scaler iframe {
                position: absolute;
                display: block;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
                background: #000; }

            /* Main image in popup */
            img.mfp-img {
            width: auto;
            max-width: 100%;
            height: auto;
            display: block;
            line-height: 0;
            box-sizing: border-box;
            padding: 40px 0 40px;
            margin: 0 auto; }

            /* The shadow behind the image */
            .mfp-figure {
            line-height: 0; }
            .mfp-figure:after {
                content: '';
                position: absolute;
                left: 0;
                top: 40px;
                bottom: 40px;
                display: block;
                right: 0;
                width: auto;
                height: auto;
                z-index: -1;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
                background: #444; }
            .mfp-figure small {
                color: #BDBDBD;
                display: block;
                font-size: 12px;
                line-height: 14px; }
            .mfp-figure figure {
                margin: 0; }

            .mfp-bottom-bar {
            margin-top: -36px;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            cursor: auto; }

            .mfp-title {
            text-align: left;
            line-height: 18px;
            color: #F3F3F3;
            word-wrap: break-word;
            padding-right: 36px; }

            .mfp-image-holder .mfp-content {
            max-width: 100%; }

            .mfp-gallery .mfp-image-holder .mfp-figure {
            cursor: pointer; }

            @media screen and (max-width: 800px) and (orientation: landscape), screen and (max-height: 300px) {
                /** * Remove all paddings around the image on small screen */
                .mfp-img-mobile .mfp-image-holder {
                    padding-left: 0;
                    padding-right: 0; }
                .mfp-img-mobile img.mfp-img {
                    padding: 0; }
                .mfp-img-mobile .mfp-figure:after {
                    top: 0;
                    bottom: 0; }
                .mfp-img-mobile .mfp-figure small {
                    display: inline;
                    margin-left: 5px; }
                .mfp-img-mobile .mfp-bottom-bar {
                    background: rgba(0, 0, 0, 0.6);
                    bottom: 0;
                    margin: 0;
                    top: auto;
                    padding: 3px 5px;
                    position: fixed;
                    box-sizing: border-box; }
                    .mfp-img-mobile .mfp-bottom-bar:empty {
                    padding: 0; }
                .mfp-img-mobile .mfp-counter {
                    right: 5px;
                    top: 3px; }
                .mfp-img-mobile .mfp-close {
                    top: 0;
                    right: 0;
                    width: 35px;
                    height: 35px;
                    line-height: 35px;
                    background: rgba(0, 0, 0, 0.6);
                    position: fixed;
                    text-align: center;
                    padding: 0; } 
            }

            @media all and (max-width: 900px) {
                .mfp-arrow {
                    -webkit-transform: scale(0.75);
                    transform: scale(0.75); }
                .mfp-arrow-left {
                    -webkit-transform-origin: 0;
                    transform-origin: 0; }
                .mfp-arrow-right {
                    -webkit-transform-origin: 100%;
                    transform-origin: 100%; }
                .mfp-container {
                    padding-left: 6px;
                    padding-right: 6px; } 
            }

            .galleryVideoPage .col-sm-3{
                width: 7%;
                float: left;
                padding-left: 5px;
                padding-right: 5px;
            }
            .col-sm-3 img {
                max-width: 100%;
                min-width: 100%;
                min-height: 100px;
                max-height: 100px;
                object-fit: cover;
            }
            .gallery_container .col-sm-3, .video_container .col-sm-3{
            margin: 0px 0;
            }
            .gallery_container, .video_container{
            margin: 10px 0;
            
            width: 100%;
            }
            .video_container img + img{
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            top: 50%;
            transform: translateY(-50%);
            max-width: 30px;
            max-height: 30px;
            min-width: 30px;
            min-height: 30px;
            z-index: 9;
            }
            .gallery_container a.lightbox::before {
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top: -13px;
                margin-left: -13px;
                opacity: 0;
                color: #fff;
                font-size: 26px;
                font-family: 'fontAwesome';
                content: "\f00e";
                pointer-events: none;
                z-index: 9;
                transition: 0.4s;
            }
            .gallery_container a.lightbox:hover:before {
                opacity: 1;
            }
            .gallery_container a:after {
                position: absolute;
                top: 0;
                left: 0;
                /*margin-left: 5px;*/
                width: calc(100% - 0px);
                height: 100%;
                opacity: 0;
                background-color: rgba(69, 68, 68, 0.9);
                content: '';
                transition: 0.4s;
            }
            .gallery_container a:hover:after {
                opacity: 1;
            }
        </style>
		
	</head>
	<!-- end::Head -->
   <body>
        <!--====== Start Preloader ======-->
        <!-- <div class="preloader">
            <div class="loader">
                <img src="<?php echo ASSET_FRONTEND ?>images/loader.png" alt="loader">
            </div>
        </div> -->
        <!--====== End Preloader ======-->
        <!--====== Search From ======-->
		<div class="modal fade" id="search-modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form>
                        <div class="form_group">
                        	<input type="text" class="form_control" placeholder="Search here...">
                        	<button class="search_btn"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--====== Search From ======-->
        
        <!--====== Login Modal ======-->
        <div class="modal fade loginRegisterFrom" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="login-modalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row mt-60 mb-60">
                    <div class="err text-center mb-20 col-md-12" style="color: red;"></div>
                    <div class="col-lg-10 m-auto">
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                            <small id="passwordHelp" class="form-text color-yellow text-right"><a href="<?php echo base_url()?>forgot-password">Forgot Password?</a></small>
                        </div>
                        <div class="form-group position-relative mb-50">
                            <input type="password" class="form-control" id="login-password1" placeholder="Enter Captcha" required>
                            <input type="text" class="form-control captchaImgInput" id="img" aria-describedby="" readonly="" value="a413" aria-invalid="true">
                            <div class="invalid-feedback">
                                Please Re Enter Captcha.
                            </div>
                        </div>
                        <div class="form-group position-relative mb-50">
                            
                            <div class="">
                                Please login first to perform subscriptions.
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-block btnLogin" onclick="loginByEmail(); return false;">Login</button>
                        </div>
                    </div>
                </div>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div> -->
            </div>
          </div>
        </div>
        <!--====== Login Modal ======-->
        
        <!--====== Redister Modal ======-->
        <div class="modal fade loginRegisterFrom" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register-modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="register-modalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row mt-60 mb-60">
                    <div class="col-lg-10 m-auto">
                        <div class="err text-center mb-20 col-md-12" style="color: red;"></div>
                        <div class="form-group">
                            <input type="text" class="form-control first_name" id="register-firstN" aria-describedby="nameHelp" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control last_name" id="register-lastN" aria-describedby="nameHelp" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control email" id="register-email" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control password" id="register-password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control password1" id="register-confirmP" placeholder="Password">
                        </div>
                        <div class="form-group position-relative mb-50">
                            <input type="password" class="form-control" id="redister-captcha" placeholder="Enter Captcha" required>
                            <input type="text" class="form-control captchaImgInput" id="img" aria-describedby="" readonly="" value="a435" aria-invalid="true">
                            <div class="invalid-feedback">
                                Please Re Enter Captcha.
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button"  onclick="registerServiceProviderByEmail(); return false;" class="btn btn-primary btn-block btnLogin">Register</button>
                        </div>
                    </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
        <!--====== Redister Modal ======-->

        <!--====== Onload Modal ======-->
        <div class="modal fade loginRegisterFrom myModalOnload" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal-modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="login-modalLabel">Upcoming Events</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row mt-60 mb-60">
                    <div class="col-lg-10 m-auto">
                        <img src="<?php echo ASSET_FRONTEND ?>images/psimLoadImg.jpg" alt="PSIM">
                    </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
        <!--====== Onload Modal ======-->
        
        <!--====== offcanvas-panel ======-->
        <div class="offcanvas-panel">
            <div class="offcanvas-panel-inner">
                <div class="panel-logo">
                    <a href="<?php echo base_url() ?>who-we-are"><img src="<?php echo ASSET_FRONTEND ?>images/logo/logo-1.png" alt="Qempo"></a>
                </div>
                <div class="about-us">
                    <h5 class="panel-widget-title">About Us</h5>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsam alias quae cupiditate quas, neque eum magni impedit asperiores ad id sint repudiandae quaerat, omnis commodi consequatur dolore rerum deleniti!
                    </p>
                </div>
                <div class="contact-us">
                    <h5 class="panel-widget-title">Contact Us</h5>
                    <ul>
                        <li>
                            <i class="fal fa-map-marker-alt"></i>
                            121 King St, Melbourne VIC 3000, Australia.
                        </li>
                        <li>
                            <i class="fal fa-envelope-open"></i>
                            <a href="mailto:hello@barky.com"> hello@barky.com</a>
                            <a href="mailto:info@barky.com">info@barky.com</a>
                        </li>
                        <li>
                            <i class="fal fa-phone"></i>
                            <a href="tel:(312)-895-9800">(312) 895-9800</a>
                            <a href="tel:(312)-895-9888">(312) 895-9888</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="panel-close"><i class="fal fa-times"></i></a>
            </div>
        </div><!--====== offcanvas-panel ======-->
        <!--====== Start Header ======-->
        <header class="header-area-one">
            <!-- Header Top Bar -->
            <div class="header-top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-block text-right">
                                <ul class="social-link social-link-header d-inline-flex">
                                    <li><a href="https://www.facebook.com/PSIMpak/"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/psimpak?lang=en"><i class="fab fa-twitter"></i></a></li>
                                   
                                    <li><a href="https://www.youtube.com/channel/UCt03KDYywmyQ4A6f2-gCjcw"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                                <p class="d-inline-flex"> 

                                    <?php if(isset($this->session->userdata['Name'])){ ?>
                                        
                            
                           <!--  <div class="dropdown custom-nav-dropdown"> -->
                            <div class="dropdown d-inline-flex">
                              <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $this->session->userdata['Name'] ?>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                <a class="dropdown-item" href="<?php echo base_url() ?>edit-profile">Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>logout">Logout</a>

                                
                                
                              </div>
                            </div>
                               <!--  <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">

                                    <span></span> 
                                      
                                    
                                </a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    
                                    <a class="dropdown-item" href="http://demo.psim.org.pk/subscription">
                                        <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>edit-profile-icon.svg" class="img-fluid dropdown-item-icon" alt="">
                                        <span class="dropdown-item-text">My Subscriptions</span>
                                    </a>
                                    
                                    
                                    
                                    
                                    <a class="dropdown-item" href="<?php echo ROUTE_PROFILE ?>">
                                        <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>edit-profile-icon.svg" class="img-fluid dropdown-item-icon" alt="">
                                        <span class="dropdown-item-text">Edit Profile</span>
                                    </a>
                                    
                                    
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="logout();">
                                        <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>logout-icon.svg" class="img-fluid dropdown-item-icon" alt="">
                                        <span class="dropdown-item-text">Logout</span>
                                    </a>
                                </div>
                            </div> -->
                            
                        <?php }else{ ?>
                            <a href="#" data-toggle="modal" data-target="#login-modal"> Login</a> |
                            <a href="#" data-toggle="modal" data-target="#register-modal"> Register </a>
                        <?php } ?>
                                     
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Logo Area -->
            <div class="header-logo-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="site-branding">
                                <a href="<?php echo base_url() ?>" class="brand-logo">
                                    <img src="<?php echo ASSET_FRONTEND ?>images/logo/logo-1.png" alt="Lawgne">
                                    Pakistan Society Of Internal Medicine (PSIM)
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="site-info">
                                <ul class="info-list">                                    
                                    <li>
                                        <div class="icon">
                                            <a href="mailto:info@psim.org.pk"><i class="flaticon-open"></i></a>
                                        </div>
                                        <div class="info">
                                            <h5><a href="mailto:info@psim.org.pk">info@psim.org.pk</a></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <a href="tel:+924237809311">
                                                <i class="flaticon-call"></i>
                                                <!-- <i class="far fa-phone"></i> -->
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h5><a href="tel:+924236366767">+92 42 36366767</a></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Navigation -->
            <div class="header-navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-12">
                                <!-- Primary Menu -->
                                <div class="primary-menu">
                                    <div class="nav-menu">
                                        <div class="navbar-close"><i class="far fa-times"></i></div>
                                        <nav class="main-menu">
                                            <ul>
                                                <li class="menu-item ">
                                                    <a href="<?php echo base_url() ?>" class="<?php  if($_SERVER['REQUEST_URI'] == '/'){ echo 'active';} ?>"> Home </a>
                                                </li>
                                                <li class="menu-item "><a class="<?php  if($_SERVER['REQUEST_URI'] == '/who-we-are'){ echo 'active';} ?>" href="<?php echo base_url() ?>who-we-are">About us</a>
                                                </li>
                                                <li class="menu-item"><a class="<?php  if($_SERVER['REQUEST_URI'] == '/office-bearers'){ echo 'active';} ?>" href="<?php echo base_url() ?>office-bearers">Office Bearers</a>
                                                </li>
                                                <li class="menu-item"><a class="<?php  if($_SERVER['REQUEST_URI'] == '/chapters'){ echo 'active';} ?>" href="<?php echo base_url() ?>chapters">Chapters</a>
                                                </li>
                                                <li class="menu-item"><a class="<?php  if($_SERVER['REQUEST_URI'] == '/frequently-asked-questions'){ echo 'active';} ?>" href="<?php echo base_url() ?>frequently-asked-questions">FAQs</a>
                                                </li>
                                                <li class="menu-item"><a class="<?php  if($_SERVER['REQUEST_URI'] == '/media'){ echo 'active';} ?>" href="<?php echo base_url() ?>media">Media </a>
                                                </li>
                                                <?php if(isset($this->session->userdata['Name'])){ ?>
                                                <li class="menu-item"><a href="<?php echo base_url() ?>premium-membership">Become a member</a></li>
                                                <?php } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="navbar-toggler">
                                        <span></span><span></span><span></span>
                                    </div>
                                </div>
                            </div>
                          <!--   <div class="col-lg-3 col-8">
                                
                                <div class="header-right-nav d-flex align-items-center">
                                    <ul>
                                        <li><a href="#" class="search-btn" data-toggle="modal" data-target="#search-modal"><i class="far fa-search"></i></a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--====== End Header ======-->


