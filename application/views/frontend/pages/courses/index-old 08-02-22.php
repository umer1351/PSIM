

<div class="mainContentDiv">
    <div class="soapbox-row">
        <div class="soapbox-outer-container">
            <div calss="row">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>exams-sort?type=Upcoming">Upcoming Courses</a>                   
                <a class="btn btn-primary" href="<?php echo base_url(); ?>exams-sort?type=Completed">Completed Courses</a>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>exams-sort?type=Deferred">Deferred Courses</a>
                <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>">Back To Home</a>
            </div>
        </div>
    </div>
    
    <div id="promo-banner-or-social-proof">
        <div class="soapbox-row">
            <?php $count = 1; foreach ($listing as $key => $value) { ;

                if($key <= $count){
             ?>
                <div class="soapbox-outer-container non-last-item item" onclick="listing_detail(<?php echo encrypt_url($value['id']); ?>) " >

                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-M-Y', $value['course_start_date']); ?></span></div>

                            <h3 class="title"><a href="#" tabindex="-1" aria-hidden="true"><?php echo $value['title'] ?></a></h3>

                        </div>
                        <p><?php echo $value['details'] ?></p>
                        <div class="">
                            <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                <span class="_1lutnh9y">View Details</span>
                            </a>
                            <?php if($value['type'] == '1' && $value['deferred'] != '1'){ ?>
                                <a href="<?php echo base_url(); ?>subscribe-exam-course?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" onclick="subscribed(<?php echo $value['id'] ?>, <?php echo 'exams' ?>); return false;">
                                    <span class="_1lutnh9y">Course Registration</span>
                                </a>
                            <?php } ?>   
                        </div>
                    </div>
                    <div class="right-side-container">
                        <img class="img-fluid" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
           <?php } }  ?>
        </div>
        <div class="soapbox-row">
            <?php $count1 = 1; foreach ($listing as $key => $value) { ;

                if($key > $count1 && $key <= 3){
             ?>
                <div class="soapbox-outer-container non-last-item item">
                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-M-Y', $value['course_start_date']); ?></span></div>
                            <h3 class="title"><a href="#" tabindex="-1" aria-hidden="true"><?php echo $value['title'] ?></a></h3>
                        </div>
                        <p><?php echo $value['details'] ?></p>
                        <div class="">
                            <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                <span class="_1lutnh9y">View Details</span>
                            </a>
                            <?php if($value['type'] == '1' && $value['deferred'] != '1'){ ?>
                                <a href="<?php echo base_url(); ?>subscribe-exam-course?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" onclick="subscribed(<?php echo $value['id'] ?>, <?php echo 'exams' ?>); return false;">
                                    <span class="_1lutnh9y">Course Registration</span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="right-side-container">
                        <img class="img-fluid" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
           <?php } }  ?>

        </div>
        <div class="soapbox-row">
            <?php $count2 = 3; foreach ($listing as $key => $value) { ;

                if($key > $count2 && $key <= 5){
             ?>
                <div class="soapbox-outer-container non-last-item item">
                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-M-Y', $value['course_start_date']); ?></span></div>
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
                        <img class="img-fluid" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
           <?php } }  ?>

        </div>
        <div class="soapbox-row">
            <?php $count3 = 5; foreach ($listing as $key => $value) { ;

                if($key > $count3 && $key <= 7){
             ?>
                <div class="soapbox-outer-container non-last-item item">
                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-M-Y', $value['course_start_date']); ?></span></div>
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
                        <img class="img-fluid" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
           <?php } }  ?>

        </div>
        <div class="soapbox-row">
            <?php $count3 = 7; foreach ($listing as $key => $value) { ;

                if($key > $count3 && $key <= 9){
             ?>
                <div class="soapbox-outer-container non-last-item item">
                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-M-Y', $value['course_start_date']); ?></span></div>
                            <h3 class="title"><a href="#" tabindex="-1" aria-hidden="true"><?php echo $value['title'] ?></a></h3>
                        </div>
                        <p><?php echo $value['details'] ?></p>
                        <div class="">
                            <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                <span class="_1lutnh9y">View Details</span>
                            </a>
                            <?php if($value['type'] == '1'  && $value['deferred'] != '1'){ ?>
                                <a href="<?php echo base_url(); ?>subscribe-exam-course?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" onclick="subscribed(<?php echo $value['id'] ?>, <?php echo 'exams' ?>); return false;">
                                    <span class="_1lutnh9y">Course Registration</span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="right-side-container">
                        <img class="img-fluid" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
           <?php } }  ?>

        </div>
        <div class="soapbox-row">
            <?php $count3 = 9; foreach ($listing as $key => $value) { ;

                if($key > $count3 && $key <= 11){
             ?>
                <div class="soapbox-outer-container non-last-item item">
                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-M-Y', $value['course_start_date']); ?></span></div>
                            <h3 class="title"><a href="#" tabindex="-1" aria-hidden="true"><?php echo $value['title'] ?></a></h3>
                        </div>
                        <p><?php echo $value['details'] ?></p>
                        <div class="">
                            <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                <span class="_1lutnh9y">View Details</span>
                            </a>
                            <?php if($value['type'] == '1'  && $value['deferred'] != '1'){ ?>
                                <a href="<?php echo base_url(); ?>subscribe-exam-course?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" onclick="subscribed(<?php echo $value['id'] ?>, <?php echo 'exams' ?>); return false;">
                                    <span class="_1lutnh9y">Course Registration</span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="right-side-container">
                        <img class="img-fluid" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
           <?php } }  ?>

        </div>
        <div class="soapbox-row">
            <?php $count3 = 11; foreach ($listing as $key => $value) { ;

                if($key > $count3 && $key <= 13){
             ?>
                <div class="soapbox-outer-container non-last-item item">
                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-M-Y', $value['course_start_date']); ?></span></div>
                            <h3 class="title"><a href="#" tabindex="-1" aria-hidden="true"><?php echo $value['title'] ?></a></h3>
                        </div>
                        <p><?php echo $value['details'] ?></p>
                        <div class="">
                            <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                <span class="_1lutnh9y">View Details</span>
                            </a>
                            <?php if($value['type'] == '1'  && $value['deferred'] != '1'){ ?>
                                <a href="<?php echo base_url(); ?>subscribe-exam-course?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" onclick="subscribed(<?php echo $value['id'] ?>, <?php echo 'exams' ?>); return false;">
                                    <span class="_1lutnh9y">Course Registration</span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="right-side-container">
                        <img class="img-fluid" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
           <?php } }  ?>

        </div>
         <div class="soapbox-row">
            <?php $count3 = 13; foreach ($listing as $key => $value) { ;

                if($key > $count3 && $key <= 15){
             ?>
                <div class="soapbox-outer-container non-last-item item">
                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?><span class="<?php if($value['course_start_date'] >=  strtotime('now') ){ echo 'lifeTimeMemberBtn' ;}elseif($value['course_start_date'] < strtotime('now') ){ echo 'annualSubscriberBtn';} ?> ml-2"><?php echo date('d-M-Y', $value['course_start_date']); ?></span></div>
                            <h3 class="title"><a href="#" tabindex="-1" aria-hidden="true"><?php echo $value['title'] ?></a></h3>
                        </div>
                        <p><?php echo $value['details'] ?></p>
                        <div class="">
                            <a href="<?php echo base_url(); ?>details?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                <span class="_1lutnh9y">View Details</span>
                            </a>
                            <?php if($value['type'] == '1'  && $value['deferred'] != '1'){ ?>
                                <a href="<?php echo base_url(); ?>subscribe-exam-course?u=<?php echo encrypt_url($value['id']);?>&t='<?php echo encrypt_url('exams'); ?>'" tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg" onclick="subscribed(<?php echo $value['id'] ?>, <?php echo 'exams' ?>); return false;">
                                    <span class="_1lutnh9y">Course Registration</span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="right-side-container">
                        <img class="img-fluid" src="<?php echo ASSET_UPLOADS_FRONTEND_DIR."exams/".$value['image'] ?>" alt="" aria-hidden="true">
                    </div>
                </div>
            </div>
           <?php } }  ?>

        </div>
    </div>
</div>
