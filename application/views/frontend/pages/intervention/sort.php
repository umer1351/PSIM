<div class="mainContentDiv">
    <div class="soapbox-row">
            <div class="col-md-12">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $type; ?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>public-intervention">All</a> 
                    <a class="dropdown-item" href="<?php echo base_url(); ?>intervention-sort?type=Upcoming">Upcoming Courses</a>                   
                    <a class="dropdown-item" href="<?php echo base_url(); ?>intervention-sort?type=Completed">Completed Courses</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>intervention-sort?type=Deferred">Deferred Courses</a>
                  </div>
                </div>
            </div>
        </div>
    <div id="promo-banner-or-social-proof">
        
            <?php  foreach ($listing as $key => $value) { ;

             
             ?>
             <div class="soapbox-row">
                <?php //echo date('y-m-d H:i'); $value['course_start_date'] ?>
                <div class="soapbox-outer-container non-last-item item" onclick="listing_detail(<?php echo encrypt_url($value['id']); ?>) " >

                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-m-Y', $value['course_start_date']); ?></span></div>
                            <h3 class="title"><a href="#" tabindex="-1" aria-hidden="true"><?php echo $value['title'] ?></a></h3>
                        </div>
                        <p><?php echo $value['details'] ?></p>
                        <div class="">
                            <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                <span class="_1lutnh9y">View Details</span>
                            </a>
                            <?php if($value['type'] == '1' && $value['deferred'] != '1' ){ ?>
                                <a href="<?php echo base_url(); ?>subscribe-exam-course?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" onclick="subscribed(<?php echo $value['id'] ?>, <?php echo 'exams' ?>); return false;">
                                    <span class="_1lutnh9y">Course Registration</span>
                                </a>
                            <?php } ?>   
                        </div>
                    </div>
                    <div class="right-side-container">
                        <img src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
            </div>
           <?php }   ?>
        
    </div>
</div>