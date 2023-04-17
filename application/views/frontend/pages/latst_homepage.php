
<?php

?><div class="mainContentDiv">
	<div class="container mt-5">
		<div class="row">
			<div class="col-sm-6">
				<!-- Start Slider section --> 
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php $count = 0; foreach ($slider as $key => $value) {?>
							<div class="carousel-item <?php if($count == 0){ echo 'active' ;} ?> ">
								<img class="d-block w-100" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR.'homeslider/'.$value['image_url'] ?>" alt="First slide">
							</div>
						<?php $count++; } ?>
						<!-- <div class="carousel-item active">
							<img class="d-block w-100" src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>slide1.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>slide2.jpg" alt="Second slide">
						</div> -->          
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<!-- End Slider section --> 
			</div>
			<div class="col-sm-6">
				<div class="card panel-default">
					<div class="card-header"> 
						<span class="glyphicon glyphicon-list-alt"></span>
						<b>Activities</b>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-xs-12">
								<ul class="demo1">
									<li class="news-item">                           
										<h5>ASCVD Prevention Course</h5>
										<p>Pakistan Society of Internal Medicine (PSIM) ASCVD Prevention Course... <a href="https://psim.org.pk/details?u=Z34%3D&t=%27mcWiudI%3D%27">Read more</a></p>
									</li>
									<li class="news-item">                           
										<h5>HYPERTENSION COURSE 2021</h5>
										<p>Pakistan Society of Internal Medicine is pleased to launch Hypertension Online... <a href="https://psim.org.pk/details?u=ZoI%3D&t=%27mcWiudI%3D%27">Read more</a></p>
									</li>
									<li class="news-item">                           
										<h5>UPDATE ON DIABETES</h5>
										<p>Updates on Diabetes 6-Months online... <a href="https://psim.org.pk/details?u=ZoM%3D&t=%27mcWiudI%3D%27">Read more</a></p>
									</li>
									<li class="news-item">                           
										<h5>HYPERTENSION A TO Z COURSE</h5>
										<p>1st Annual Hypertension A to Z Certificate Programme by Pakistan Society... <a href="https://psim.org.pk/details?u=ZoU%3D&t=%27mcWiudI%3D%27">Read more</a></p>
									</li>
									<li class="news-item">                           
										<h5>MANAGEMENT OF HYPERTENSION</h5>
										<p>Pakistan Society of Internal Medicine (PSIM) Webinar on Management... <a href="https://psim.org.pk/details?u=aH8%3D&t=%27lbCisMSmoJys%27">Read more</a></p>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
					<div class="card-footer"> </div>
				</div>
			</div>
		</div>
	</div>

   <!-- Service Section start -->

   <div class="standard-padding-y-less plaany-market-place-section">
	   <div class="container">         
		   <div class="medium-spacer"></div>
		   <div class="icons-and-text-row" >
			   
			   <div class="row">
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="<?php echo base_url(); ?>examination-courses">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="examinationIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content">											
											<h4>Examination Courses</h4>
										</div>
									</div>
								</div>
							</div>
					   </a>
				   </div>
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="<?php echo base_url(); ?>academic-initiatives">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="academicIntiativeIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content">										
											<h4>Academic Initiatives</h4>									
										</div>
									</div>
								</div>
							</div>
					   </a>
				   </div>
				   
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="https://psimj.com/" target="_blank">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="JpsimIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">										
										<div class="service-content">
											<h4>JPSIM</h4>
										</div>											
									</div>
								</div>
							</div>
					   </a>
				   </div>
				   
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="<?php echo base_url(); ?>public-intervention">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="publicInterventionIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content" style="width: 170%;">											
											<h4>METS Alliance</h4>
										</div>
									</div>
								</div>
							</div>
					   </a>
				   </div>
				   <div class="clearBoth clearfix mt-3 mb-3"> </div>
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="<?php echo base_url(); ?>physician-academy">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="physicianAcademyIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content">
											<h4>Physician Academy</h4>
										</div>
									</div>
								</div>
							</div>
					   </a>
				   </div>
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a target="_blank" href="<?php echo base_url(); ?>foundation">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="psimFoundationIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content">											
											<h4>PSIM Foundation</h4>								
										</div>
									</div>
								</div>
							</div>
					   </a>
				   </div>
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="<?php echo base_url(); ?>psim-partners">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="psimPartnersIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content">
											<h4>PSIM Partners</h4>								
										</div>
									</div>
								</div>
							</div>
					   </a>
				   </div>
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="<?php echo base_url(); ?>psim-fellowship">
					   		<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="psimConferenceIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content">											
											<h4>PSIM Fellowship</h4>									
										</div>
									</div>
								</div>
							</div>
					   </a>
					</div>					
			   </div>
			   <div class="clearBoth clearfix"></div>
			   
			   <div class="row justify-content-md-center">
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="<?php echo base_url(); ?>psim-fellowship">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="psimConferenceIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content">											
											<h4>PSIM Conferences</h4>									
										</div>
									</div>
								</div>
							</div>
					   	</a>
				   </div>
				   <div class="col-lg-3 col-md-3 col-12 mb-3">
				   		<a href="<?php echo base_url(); ?>upcoming-activities?type=Upcoming">
							<div class="Service-box">
								<div class="row">
									<div class="col-lg-3 col-md-4 col-3 paddingLeftRight10 d-flex align-items-center">
										<div class="icon-bg">                                       
											<span class="examinationIcon"></span>
										</div>
									</div>
									<div class="col-lg-9 col-md-8 col-9">
										<div class="service-content">											
											<h4>Upcoming Activities</h4>											
										</div>
									</div>
								</div>
							</div>
					   	</a>
				   </div>
			   </div>
			   <div class="clearBoth clearfix"></div>          
		   </div>
	   </div>
   </div>

   <!-- Service Section end -->    

</div>