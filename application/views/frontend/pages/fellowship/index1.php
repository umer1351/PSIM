<!--====== Start Hero Area ======-->
<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title">PSIM Conferences</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="">PSIM Conferences</li>
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
            <div class="col-lg-12 col-md-12 col-sm-12 text-center mb-50">
                <a href="<?php echo base_url(); ?>fellowship" class="main-btn filled-btn ">
                    All
                </a>
                <!-- <a href="<?php echo base_url(); ?>exams-sort?type=Upcoming" class="main-btn filled-btn ">
                    Upcoming Courses
                </a>
                <a href="<?php echo base_url(); ?>exams-sort?type=Completed" class="main-btn filled-btn">
                    Completed Courses
                </a>
                <a href="<?php echo base_url(); ?>exams-sort?type=Deferred" class="main-btn filled-btn borderRadiusRight35">
                    Deferred Courses
                </a> -->
            </div>
        </div>
        <div class="row">  
        <?php $count = 1; foreach ($listing as $key => $value) { ;

                
             ?>                  
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-post-item blog-post-item-five mb-50 wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="post-thumbnail">
                        <img style="    width: 50%;" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."fellowship/". $value['image'] ;?>" alt="Blog Thumb" >
                        <a href="#" class="arrow">
                            <i class="far fa-angle-right"></i>
                        </a>
                    </div>
                    <div class="entry-content">
                        <div class="post-admin">
                            <span class="color-yellow"><a href="#"><?php echo $value['top_information'] ?></a></span>
                            <span>Date: <?php echo date('d-M-Y', $value['course_start_date']); ?></span>
                        </div>
                        <h3 class="title m-0">
                            Conference Outline
                        </h3>
                        <div class="post-meta">
                            <p><?php echo substr($value['details'], 0, 100);  ?>...</p>
                            
                        </div>
                        <div class="post-button text-right mt-5">
                            <span class="color-yellow fontSize13">
                                <?php if(isset($this->session->userdata['Name'])){ ?>
                                <a  href="<?php echo base_url(); ?>subscribe-fellowship?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('fellowship'); ?>"> Course Registration </a> 
                                <?php }else{?>
                                <a href="#" data-toggle="modal" data-target="#login-modal">Login For Subscription</a>
                                <?php } ?>  |
                                <a  href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('fellowship'); ?>"> View Detail </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }   ?>
            
            
        </div>
    </div>
</section>
<!--====== End Examination Courses Grid ======-->