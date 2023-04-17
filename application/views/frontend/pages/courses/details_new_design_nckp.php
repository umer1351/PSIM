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
                /*width: 20%;
                float: left;
                padding-left: 5px;
                padding-right: 5px;*/
            }
            .col-sm-3 img , .col-sm-2 img{
                max-width: 100%;
                min-width: 100%;
                min-height: 100px;
                object-fit: cover;
            }
            .gallery_container .col-sm-3, .video_container .col-sm-3,
            .gallery_container .col-sm-2, .video_container .col-sm-2{
            margin: 0px 0;
            margin-bottom: 20px;
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
                margin-left: 5px;
                width: calc(100% - 5px);
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

<!--====== Start Hero Area ======-->
<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title">Examination Courses</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="#">Home</a></li>
                            <li class="">Examination Courses</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Hero Area ======-->
        
<!--====== Start Examination Courses Grid ======-->
<section class="blog-area examination-course-grid pt-80 pb-40">
    <div class="container">                
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <img src="http://demo.psim.org.pk/assets/frontend/images/service/courseImg.jpg" alt="Examination Courses">
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <table class="table">
                  <thead class="thead-blue">
                    <tr>
                      <th scope="col">Course Name:</th>
                      <th scope="col">Our Pre-Med Skills Certificate Program</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Date:</td>
                      <td>21-08-2022</td>
                    </tr>
                    <tr>
                      <td>Manage by:</td>
                      <td>Pakistan institute of Medicines</td>
                    </tr>
                    <tr>
                        <td>Course Director:</td>
                        <td> 
                            <p>Prof. Tariq Waseem</p>
                            <p>(Senior Vice President, PSIM)</p>
                            <p>tariqwaseem@psim.com.pk</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Collaboration with:</td>
                        <td>
                            <p>
                                Pakistan Hospitals Society
                            </p>
                            <p>                                    
                                Sheikh Zahid institute of Medicines
                            </p>
                            <p>                                
                                Aspirin Foundation Pakistan
                            </p>
                            <p>
                                Pakistan Hypertension League
                            </p>
                        </td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="thead-blue">
                        <tr>
                          <th scope="col">Chapter 1</th>
                          <th scope="col">Pre Mid Skills</th>
                          <th class="text-right color-yellow">3<sup>rd</sup> Oct 2022</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Speaker:</td>
                          <td colspan="2">Pro. Tariq Waseem</td>
                        </tr>
                        <tr>
                          <td>Moderator:</td>
                          <td colspan="2">Prof. Ali Asad</td>
                        </tr>
                        <tr>
                            <td>Panelists:</td>
                            <td colspan="2"> 
                                <p>Prof. Bilal Ahmed</p>
                                <p>Prof. Hasnat Jillani</p>
                                <p>Prof. Ahmed waseem</p>
                                <p>Prof. Abdullah Nawaz</p>
                            </td>
                        </tr>
                        <tr>
                            <td>02:00 pm to 2:30 pm:</td>
                            <td colspan="2">
                                Panel Discussion
                            </td>
                        </tr>
                        <tr>
                            <td>02:00 pm to 2:30 pm:</td>
                            <td colspan="2">
                                Question Answer
                            </td>
                        </tr>
                        <tr>
                            <td>02:00 pm to 2:30 pm:</td>
                            <td colspan="2">
                                Ending Current session
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="thead-blue">
                        <tr>
                          <th scope="col">Chapter 2</th>
                          <th scope="col">Advance Mid Skills</th>
                          <th class="text-right color-yellow">4<sup>th</sup> Oct 2022</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Speaker:</td>
                          <td colspan="2">Pro. Tariq Waseem</td>
                        </tr>
                        <tr>
                          <td>Moderator:</td>
                          <td colspan="2">Prof. Ali Asad</td>
                        </tr>
                        <tr>
                            <td>Panelists:</td>
                            <td colspan="2"> 
                                <p>Prof. Bilal Ahmed</p>
                                <p>Prof. Hasnat Jillani</p>
                                <p>Prof. Ahmed waseem</p>
                                <p>Prof. Abdullah Nawaz</p>
                            </td>
                        </tr>
                        <tr>
                            <td>02:00 pm to 2:30 pm:</td>
                            <td colspan="2">
                                Panel Discussion
                            </td>
                        </tr>
                        <tr>
                            <td>02:00 pm to 2:30 pm:</td>
                            <td colspan="2">
                                Question Answer
                            </td>
                        </tr>
                        <tr>
                            <td>02:00 pm to 2:30 pm:</td>
                            <td colspan="2">
                                Ending Current session
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>                    
        </div>
    </div>
</section>
<!--====== End Examination Courses Grid ======-->

<!--====== Start Media Gallery Grid ======-->
<section class="blog-area media-gallery-grid pt-0 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header cardHeaderFont text-center text-white blue-bg">
                        Media Gallery
                    </div>
                    <div class="card-body">
                      <div class="row">
                          <div class="mainContentDiv galleryVideoPage">
                               <div class="gallery_container row">
                                  <div class="col-sm-2">
                                     <a class="lightbox" href="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg">
                                     <img src="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg" alt="Bridge">
                                     </a>
                                  </div>
                                  <div class="col-sm-2">
                                     <a class="lightbox" href="https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350">
                                     <img src="https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350" alt="Bridge">
                                     </a>
                                  </div>
                                  <div class="col-sm-2">
                                     <a class="lightbox" href="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg">
                                     <img src="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg" alt="Bridge">
                                     </a>
                                  </div>
                                  <div class="col-sm-2">
                                     <a class="lightbox" href="https://media.istockphoto.com/photos/plant-growing-picture-id510222832?k=6&m=510222832&s=612x612&w=0&h=Pzjkj2hf9IZiLAiXcgVE1FbCNFVmKzhdcT98dcHSdSk=">
                                     <img src="https://media.istockphoto.com/photos/plant-growing-picture-id510222832?k=6&m=510222832&s=612x612&w=0&h=Pzjkj2hf9IZiLAiXcgVE1FbCNFVmKzhdcT98dcHSdSk=" alt="Bridge">
                                     </a>
                                  </div>
                                  <div class="col-sm-2">
                                     <a class="lightbox" href="https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350">
                                     <img src="https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350" alt="Bridge">
                                     </a>
                                  </div>
                                  <div class="col-sm-2">
                                     <a class="lightbox" href="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg">
                                     <img src="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg" alt="Bridge">
                                     </a>
                                  </div>
                                  <div class="col-sm-2">
                                     <a class="lightbox" href="https://media.istockphoto.com/photos/plant-growing-picture-id510222832?k=6&m=510222832&s=612x612&w=0&h=Pzjkj2hf9IZiLAiXcgVE1FbCNFVmKzhdcT98dcHSdSk=">
                                     <img src="https://media.istockphoto.com/photos/plant-growing-picture-id510222832?k=6&m=510222832&s=612x612&w=0&h=Pzjkj2hf9IZiLAiXcgVE1FbCNFVmKzhdcT98dcHSdSk=" alt="Bridge">
                                     </a>
                                  </div>
                               </div>
                               <div class="video_container row">
                                  <div class="col-sm-2">
                                     <div>
                                         <a href="https://www.youtube.com/watch?v=oNxCporOofo" class="video_model">
                                             <img src="https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350">
                                             <img src="http://pluspng.com/img-png/play-button-png-projects-330.png">
                                        </a>
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                     <div><a href="https://www.youtube.com/watch?v=NmgxYwpTm2I&ab_channel=CremedelaCreme" class="video_model"><img src="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg"><img src="http://pluspng.com/img-png/play-button-png-projects-330.png"></a></div>
                                  </div>
                                  <div class="col-sm-2">
                                     <div><a href="https://www.youtube.com/watch?v=GClKpGHtMF0" class="video_model"><img src="https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=350"><img src="http://pluspng.com/img-png/play-button-png-projects-330.png"></a></div>
                                  </div>
                                  <div class="col-sm-2">
                                     <div><a href="https://www.youtube.com/watch?v=oNxCporOofo" class="video_model"><img src="https://cdn.pixabay.com/photo/2016/10/27/22/53/heart-1776746_960_720.jpg"><img src="http://pluspng.com/img-png/play-button-png-projects-330.png"></a></div>
                                  </div>
                               </div>
                            </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Media Gallery Grid ======-->