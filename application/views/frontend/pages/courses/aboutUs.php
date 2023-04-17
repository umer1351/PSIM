<section class="page_breadcrumbs ls ms theme_breadcrumbs parallax section_padding_bottom_15 section_padding_top_75">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<div class="heading text-center bottom_border">
								<p class="text-uppercase josefin grey fontsize_20">Wowzer</p>
								<h1 class="section_header topmargin_5">About Us</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<a href="./">
										Home
									</a>
								</li>
								<li class="active">Who We Are</li>
							</ol>
						</div>
					</div>
				</div>
			</section>

			<?php if(isset($page_data['about_history']['content']) && !empty($page_data['about_history']['content'])){ ?>
			<section class="ls section_padding_top_110 columns_margin_0 image-overflow">
				<div class="container">
					<div class="row">
						<div class="col-md-offset-1 col-md-10 col-lg-offset-0 col-lg-6">
							<?php echo $page_data['about_history']['content'] ?>
						</div>
						<div class="col-md-offset-1 col-md-10 col-lg-offset-0 col-lg-6 text-center text-lg-right to_animate" data-animation="fadeInRight">
							<img src="<?php echo ASSET_UPLOADS_FRONTEND_DIR.'home_about/'.$page_data['about_history']['image_url'] ?>" alt="" class="top-overlap-small right-offset">
						</div>
					</div>
				</div>
			</section>
			<?php } ?>

<?php if(!empty($reviews)){?>
			<section class="cs parallax page_testimonials section_padding_100">
				<div class="flexslider">
					<ul class="slides">
					<?php foreach ($reviews as $review){ ?>
						<li>
							<div class="container">
								<div class="row">
									<div class="col-sm-12 text-center text-md-right">
										<div class="slide_description_wrapper">
											<div class="slide_description text-center">
												<div class="quote-sign josefin grey bottommargin_50"></div>
												<div class="heading text-center">
													<h2 class="section_header bottommargin_0 grey">What people say</h2>
													<p class="josefin text-uppercase grey">About us</p>
												</div>
												<div class="row">
													<div class="col-md-8 col-md-offset-2">
														<blockquote class="no-border margin_0">
															<?php echo $review['review'] ?>

															<div class="item-meta fontsize_16 topmargin_75">
																<span class="bold josefin fontsize_20 grey"><?php echo ucwords($review['first_name'].' '.$review['last_name']) ?> </span> <!--Manager Co.-->
															</div>
														</blockquote>
													</div>
												</div>
											</div>
										</div>
										<!-- eof .slide_description_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</li>
					<?php } ?>
					</ul>
				</div>
				<!-- eof flexslider -->
			</section>
<?php } ?>
			<?php if(isset($page_data['about_services']['content']) && !empty($page_data['about_services']['content'])){ ?>
			<section class="ls section_padding_top_110 columns_margin_0 services">
				<div class="container">
					<div class="row">

						<div class="col-md-push-3 col-md-9 col-lg-push-4 col-lg-8">
							<?php echo $page_data['about_services']['content'] ?>
						</div>
						<div class="col-md-pull-9 col-md-3 col-lg-pull-8 col-lg-4 text-center text-md-right to_animate" data-animation="fadeInLeft">
							<img src="<?php echo ASSET_UPLOADS_FRONTEND_DIR.'home_about/'.$page_data['about_services']['image_url'] ?>" alt="" class="top-overlap-small">
						</div>
					</div>
				</div>
			</section>
			<?php } ?>