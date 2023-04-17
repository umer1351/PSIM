<div class="mainContentDiv">
    <div id="promo-banner-or-social-proof">
        <?php $count = 1; foreach ($listing as $key => $value) { ;

            
             ?>
        <div class="soapbox-row">
            
                <div class="soapbox-outer-container non-last-item item">
                <div class="soapbox-inner-container white" role="link" tabindex="0">
                    <div class="left-side-container">
                        <div class="title-with-partner">
                            <div class="partner-name"><?php echo $value['top_information'] ?></div>
                            <h3 class="title"><a href="#" tabindex="-1" aria-hidden="true"><?php echo $value['title'] ?></a></h3>
                        </div>
                        <p><?php echo $value['details'] ?></p>
                        <div class="">
                            <button tabindex="-1" aria-hidden="true" role="link" class="_6qs2ybg">
                                <span class="_1lutnh9y">Sign up to attend</span>
                            </button>
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