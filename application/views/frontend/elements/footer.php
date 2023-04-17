
<footer class="footer-area">
            <div class="footer-wrapper-one position-relative bg_cover pb-30">
                <div class="container">
                    <div class="footer-widget pt-80 pb-20">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget about-widget wow fadeInUp" data-wow-delay=".2s">
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="<?php echo ASSET_FRONTEND ?>images/logo/logo-2.png" alt="Logo"></a>
                                    </div>
                                    <p>To be the recognized leader in quality patient care, advocacy, education and enhancing career satisfaction for internal medicine experts.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget social-widget wow fadeInUp text-center" data-wow-delay=".3s">
                                    <h4 class="widget-title">Follow  Us</h4>
                                    <div class="share">
                                        <ul class="social-link">
                                            <li><a href="https://www.facebook.com/PSIMpak/"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/psimpak?lang=en"><i class="fab fa-twitter"></i></a></li>
                                   
                                    <li><a href="https://www.youtube.com/channel/UCt03KDYywmyQ4A6f2-gCjcw"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget contact-info-widget wow fadeInUp" data-wow-delay=".5s">
                                    <h4 class="widget-title">Contact Us</h4>
                                    <div class="info-widget-content mb-10">
                                        <p><i class="fal fa-phone"></i><a href="tel:+924236366767">+92 42 36366767</a></p>
                                        <p><i class="fal fa-envelope"></i><a href="mailto:info@psim.org.pk"> info@psim.org.pk</a></p>
                                        <p><i class="fal fa-map-marker-alt"></i>49-Mozang Road, Lahore Pakistan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="copyright-text text-center">
                                    <p>
                                        Copyright 2022 <span>PSIM.</span> All Rights Reserved
                                    </p>
                                </div>
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
        <!--====== End Footer ======-->
        <!--====== back-to-top ======-->
        <a href="#" class="back-to-top" ><i class="fas fa-angle-up"></i></a>
        <!--====== Jquery js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/vendor/jquery-3.6.0.min.js"></script>
        <!--====== Popper js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/popper.min.js"></script>
        <!--====== Bootstrap js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/bootstrap.min.js"></script>
        <!--====== Slick js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/slick.min.js"></script>
        <!--====== Magnific Popup js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/jquery.magnific-popup.min.js"></script>
        <!--====== Isotope js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/isotope.pkgd.min.js"></script>
        <!--====== Imagesloaded js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/imagesloaded.pkgd.min.js"></script>
        <!--====== Nice-select js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/jquery.nice-select.min.js"></script>
        <!--====== counterup js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/jquery.counterup.min.js"></script>
        <!--====== waypoints js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/jquery.waypoints.js"></script>
        <!--====== Wow js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/wow.min.js"></script>
        <!--====== Main js ======-->
        <script src="<?php echo ASSET_FRONTEND ?>js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"> </script>
        <script id="rendered-js">
            /* Video Popup*/
            jQuery(document).ready(function ($) {
                // Define App Namespace
           var popup = {
                // Initializer
                init: function() {
                popup.popupVideo();
                },
                popupVideo : function() {

                    $('.video_model').magnificPopup({
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false,
                    gallery: {
                        enabled:true
                        }
                    });

                    /* Image Popup*/ 
                    $('.gallery_container').magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        mainClass: 'mfp-fade',
                        removalDelay: 160,
                        preloader: false,
                        fixedContentPos: false,
                        gallery: {
                            enabled:true
                            }
                    });

                }
            };
                popup.init($);
            });


        </script>
        <script type="text/javascript">
            $(document).ready(function() {
              $("#toggle").click(function() {
                var elem = $("#toggle").text();
                if (elem == "Read More") {
                  //Stuff to do when btn is in the read more state
                  $("#toggle").text("Read Less");
                  $("#text").slideDown();
                } else {
                  //Stuff to do when btn is in the read less state
                  $("#toggle").text("Read More");
                  $("#text").slideUp();
                }
              });
              $("#toggle1").click(function() {
                var elem = $("#toggle1").text();
                if (elem == "Read More") {
                  //Stuff to do when btn is in the read more state
                  $("#toggle1").text("Read Less");
                  $("#text1").slideDown();
                } else {
                  //Stuff to do when btn is in the read less state
                  $("#toggle1").text("Read More");
                  $("#text1").slideUp();
                }
              });
            });
        </script>

        <script type="text/javascript">    
            $(window).on('load', function () {
              jQuery('#myModal').modal('show');
            });
        </script>

        <script src="<?php echo ASSET_JS_FRONTEND_DIR ?>ajaxfileupload.js" type="text/javascript"></script>
    <script src="<?php echo ASSET_JS_FRONTEND_DIR ?>script.js" type="text/javascript"></script>

    
    <script src="<?php echo ASSET_JS_FRONTEND_DIR ?>custom-scripts.js" type="text/javascript"></script>
    </body>
</html>
<?php 
//This line of code will enable js functions to call CI's XAJAX functions
echo ( isset($this->xajax_js) )?$this->xajax_js:''; 
?>