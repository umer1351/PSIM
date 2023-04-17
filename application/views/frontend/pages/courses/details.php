<style type="text/css">
	table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    table tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
        background-color: rgba(0,0,0,.05);
    }
    table tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05);
    }
    table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
</style>
<div class="mainContentDiv">
	<div class="container">
		<div id="promo-banner-or-social-proof">
		   <!--  <a class="btn btn-secondary mt-5" href="<?php echo base_url(); ?>examination-courses">Back to listing</a> -->
			<div class="row mt-3 mb-5">
				<div class="col-12">

					<div class="card mb-5">						
						<h4 class="card-header text-center bg-primary text-white" style="    margin-top: 60px;
    background-color: #162542 !important;">
							<?php print_r($listing['top_information']); ?></h4>
						<div class="card-body" style="max-height: 500px; overflow-y: scroll;">
							<p class="text-center font-weight-bold">
								<?php print_r($listing['title']); ?>
							</p>
							
							

							<div class="alert alert-info text-primary text-center">
								<?php  print_r(str_replace('%^', '"', $listing['details'])); ?>
							</div>
							<div class="table-responsive" style="    overflow-x: unset !important;">
							<?php echo str_replace('%^', '"', $listing_det['details']); ?>
						<!-- 	<table id="stream_table" class="table table-bordered table-striped table-hover">
									<thead class="thead-light"> 
										<tr>
											<th scope="col"> # </th>
											<th scope="col"> Time </th>
											<th scope="col"> Speaker </th>
											<th scope="col"> Topic </th>   
											
											<th scope="col"> Details </th>
											
										</tr>
									</thead>
									<tbody>
									<?php
							
									if(!empty($sub_module)){
										$count = 0;
										foreach($sub_module as $module){
										$count++;
									?>
											<tr id="user">
												<td><?php echo $count; ?></td>
												<td ><?php echo date('h:i a', $module['time']); ?></td>
												<td><?php echo $module['speaker']; ?></td>
												<td><?php echo $module['topic']; ?></td>
												
												<td>
												<?php echo $module['details']; ?>
												</td>
												
												
												
											</tr>

									<?php
										}
									}else{
									?>
									<th colspan="6" style="text-align:center">No Details Found!</th>
									<?php
									}
									?>
									</tbody>
								</table>  -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
	display: inline-block;
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
<div class="galleryVideoPage">
	<div class="container">

	<h4 class="card-header text-center bg-primary text-white">Media Gallery</h4>
   <div class="gallery_container">
   	
	
	<div class="col-sm-3">
	   <a class="lightbox" href="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'exams/'.$listing['image']); ?>">
	   <img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'exams/'.$listing['image']); ?>" alt="Bridge">
	   </a>
	</div>
   

      
   </div>
   
  
  
</div>
</div>



<div class="galleryVideoPage">
	<div class="container">

	<h4 class="card-header text-center bg-primary text-white" style="
    background-color: #162542 !important;">Media Gallery</h4>
   <div class="gallery_container">
   	<?php 
if(!empty($files)){ foreach($files as $row){  ?>
	<?php if($row['type'] == '1'){ ?>
	<div class="col-sm-3">
	   <a class="lightbox" href="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'exams/'.$row['file_name']); ?>">
	   <img src="<?php echo displayImage(ASSET_UPLOADS_FRONTEND_DIR.'exams/'.$row['file_name']); ?>" alt="Bridge">
	   </a>
	</div>
    <?php } ?>

    	 
 

<?php }}?>
      
     
      
   </div>
   <div class="video_container">
   	<?php 
if(!empty($files)){ foreach($files as $row){  

	if($row['type'] == '2'){



	 ?>
		

    	 <div class="col-sm-3">
         <div><a href="<?php echo $row['file_name'] ?>" class="video_model">
         	<?php

         	 $url=$row['file_name'];
			 $fetch=explode("v=", $url);
			 	

         	 if(isset($fetch[1])){ 
         	 	$videoid=$fetch[1];	
         	 	?>
         		<img src="http://img.youtube.com/vi/<?php echo $videoid ?>/0.jpg" />
         	<?php }else{ ?>
         		<img src="http://pluspng.com/img-png/play-button-png-projects-330.png">
         	<?php } ?>	
         </a>
     	</div>
      </div>
    <?php } ?> 

<?php } } ?>	
      
   </div>
  
</div>
</div>
