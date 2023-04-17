<!--====== Start Hero Area ======-->
<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title"></h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="">PSIM Fellowship</li>
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
                <a href="<?php echo base_url(); ?>fellowship-sort?type=Upcoming" class="main-btn filled-btn borderRadiusLeft35">
                    Upcoming Courses
                </a>
                <a href="<?php echo base_url(); ?>fellowship-sort?type=Completed" class="main-btn filled-btn">
                    Completed Courses
                </a>
                <a href="<?php echo base_url(); ?>fellowship-sort?type=Deferred" class="main-btn filled-btn borderRadiusRight35">
                    Deferred Courses
                </a>
            </div>
        </div>
        <div class="row">  
        <?php $count = 1; foreach ($listing as $key => $value) { ;

                
             ?>                  
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-post-item blog-post-item-five mb-50 wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="post-thumbnail">
                        <img src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."fellowship/".$value['image'] ?>" alt="Blog Thumb" style="width: 452px !important;height: 400px !important;">
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
                            Course Outline
                        </h3>
                        <div class="post-meta">
                            <p><?php echo substr($value['details'], 0, 20);  ?>...</p>
                            
                        </div>
                        <div class="post-button text-right mt-5">
                            <span class="color-yellow fontSize13">
                                <?php if($value['decision_flag'] == '1'){ ?>
                                <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('fellowship'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                    <span class="_1lutnh9y">View Workshop</span> |
                                </a>
                           <?php }else{ ?>
                                <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('fellowship'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                    <span class="_1lutnh9y"> View Details</span> 
                                </a>

                           <?php } ?>
                            <?php if($value['type'] == '1' && $value['deferred'] != '1' ){ ?>
                             |   <a href="<?php echo base_url(); ?>subscribe-exam-course?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" onclick="subscribed(<?php echo $value['id'] ?>, <?php echo 'fellowship' ?>); return false;">
                                    <span class="_1lutnh9y"> Course Registration</span>
                                </a>
                            <?php } ?>
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