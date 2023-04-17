<div class="mainContentDiv">
   <div class="container standard-padding-y-half">
      <div class="row">
         <div class="col-12">
            <h2 class="secondary-heading dark-colored hello-user-text">
               <img src="<?php echo (empty($common_data["user_data"]["profile_image"])?ASSET_USERS_UPLOADS_FRONTEND_DIR.'no-profile.jpg':ASSET_USERS_UPLOADS_FRONTEND_DIR.$common_data["user_data"]['profile_image'])?>" class="img-fluid rounded-circle mr-4" alt="" />Hi <?php echo $common_data['user_data']['first_name']; ?>!
            </h2>
         </div>
      </div>
      <div class="low-spacer"></div>
      <div class="row">
         <!--   -->
         <div class="col-md-8 account-pages-main-section">
            <form class="custom-form"  id="updateServiceProviderAccount">
               <div class="form-row">
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_fname">Name</label>
                        <input type="text" class="form-control" id="account_fname" aria-describedby="account_fnameHelp" placeholder="John" value="<?php echo $common_data['user_data']['first_name'] ?>" disabled />
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_lname">Father/Husband Name</label>
                        <input type="text" class="form-control" id="account_lname" aria-describedby="account_lnameHelp" placeholder="Doe"  value="<?php echo $common_data['user_data']['last_name'] ?>"   Disabled/>
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">DOB</label>
                        <input type="text" class="form-control" id="dob" aria-describedby="account_phoneHelp" placeholder="09-11-1994"  value="<?php echo $common_data['user_data']['dob'] ?>"  />
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">PMDC Number</label>
                        <input type="text" class="form-control" id="account_cnic" aria-describedby="account_phoneHelp" placeholder="*************"  value="<?php echo $common_data['user_data']['pmdc_number'] ?>"  />
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">Terminal Qualification</label>
                        <input type="text" class="form-control" id="qualification" aria-describedby="account_phoneHelp" placeholder="Qualification"  value="<?php echo $common_data['user_data']['terminal_qualification'] ?>"  />
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">Mailing Address</label>
                        <input type="text" class="form-control" id="account_address" aria-describedby="account_phoneHelp" placeholder="Address"  value="<?php echo $common_data['user_data']['address'] ?>"  />
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">Email</label>
                        <input type="text" class="form-control" id="account_email" aria-describedby="account_phoneHelp" placeholder="someone@plaany.com"  value="<?php echo $common_data['user_data']['email'] ?>" disabled />
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">Phone</label>
                        <input type="text" class="form-control" id="account_phone" aria-describedby="account_phoneHelp" placeholder="+00-0000000" required="" value="<?php echo $common_data['user_data']['phone'] ?>" required />
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">CNIC</label>
                        <input type="text" class="form-control" id="account_email" aria-describedby="account_phoneHelp" placeholder="someone@plaany.com"  value="<?php echo $common_data['user_data']['cnic'] ?>" disabled />
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">Institute</label>
                        <input type="text" class="form-control" id="institute" aria-describedby="account_phoneHelp" placeholder="Institute" required="" value="<?php echo $common_data['user_data']['institute'] ?>" required />
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col">
                     <div class="form-group text-left">
                        <label for="account_phone">Designation</label>
                        <input type="text" class="form-control" id="designation" aria-describedby="account_phoneHelp" placeholder="designation"  value="<?php echo $common_data['user_data']['designation'] ?>"  />
                     </div>
                  </div>
               </div>
               <div class="form-row">
                 <!--  -->
               </div>
               <div class="form-row">
                  <div class="col">
                     <div class="form-group text-center text-md-left">
                        <label for="account_about_me">Fee Receipt </label>
                        <div class="profile-pic-update">
                           <input id="imgInp" type="file" name="imgInp" >
                           <img src="<?php echo (empty($common_data["user_data"]["fee_receipt"])? FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_USERS_UPLOADS_FRONTEND_DIR_PORTFOLIO.$common_data["user_data"]['fee_receipt'])?>" alt="" id="image-preview" class="img-fluid rounded-circle" alt="" />
                           <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>add-dp-icon.svg" class="update-pp-icon" alt="" />
                           <input type="hidden" id="profile_image" value="<?php echo $common_data['user_data']['fee_receipt'] ?>">
                           <input type="hidden" id="profile_image_base64" value="">
                           <input type="hidden" id="is_base64_method" value="0">
                           <input type="hidden" id="role_type" value="<?php echo $common_data['user_data']['user_type'] ?>">
                        </div>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group text-center text-md-left">
                        <label for="account_about_me">ID Card (Front) </label>
                        <div class="profile-pic-update">
                           <input id="imgInp1" type="file" name="imgInp1" >
                           <img src="<?php echo (empty($common_data["user_data"]["id_card_front"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."IDCARDFRONT/".$common_data["user_data"]['id_card_front'])?>" alt="" id="image-preview1" class="img-fluid rounded-circle" alt="" />
                           <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>add-dp-icon.svg" class="update-pp-icon" alt="" />
                           <input type="hidden" id="profile_image1" value="<?php echo $common_data['user_data']['id_card_front'] ?>">
                           <input type="hidden" id="profile_image_base641" value="">
                           <input type="hidden" id="is_base64_method1" value="0">
                        </div>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group text-center text-md-left">
                        <label for="account_about_me">ID Card (Back) </label>
                        <div class="profile-pic-update">
                           <input id="imgInp2" type="file" name="imgInp2" >
                           <img src="<?php echo (empty($common_data["user_data"]["id_card_back"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."IDCARDBACK/".$common_data["user_data"]['id_card_back'])?>" alt="" id="image-preview2" class="img-fluid rounded-circle" alt="" />
                           <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>add-dp-icon.svg" class="update-pp-icon" alt="" />
                           <input type="hidden" id="profile_image2" value="<?php echo $common_data['user_data']['id_card_back'] ?>">
                           <input type="hidden" id="profile_image_base642" value="">
                           <input type="hidden" id="is_base64_method2" value="0">
                        </div>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-group text-center text-md-left">
                        <label for="account_about_me">PMDC Certificate </label>
                        <div class="profile-pic-update">
                           <input id="imgInp3" type="file" name="imgInp3" >
                           <img src="<?php echo (empty($common_data["user_data"]["pmdc_id"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."PMDCCERTIFICATE/".$common_data["user_data"]['pmdc_id'])?>" alt="" id="image-preview3" class="img-fluid rounded-circle" alt="" />
                           <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>add-dp-icon.svg" class="update-pp-icon" alt="" />
                           <input type="hidden" id="profile_image3" value="<?php echo $common_data['user_data']['pmdc_id'] ?>">
                           <input type="hidden" id="profile_image_base643" value="">
                           <input type="hidden" id="is_base64_method3" value="0">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col">
                     <div class="form-group text-center text-md-left">
                        <label for="account_about_me">Internal Medicine </label>
                        <div class="profile-pic-update">
                           <input id="imgInp4" type="file" name="imgInp4" >
                           <img  src="<?php echo (empty($common_data["user_data"]["pmdc_id"])?FRONTEND_ASSET_IMAGES_DIR.'upload.png':ASSET_UPLOADS_FRONTEND_DIR."PMDCCERTIFICATE/".$common_data["user_data"]['pmdc_id'])?>" alt="" id="image-preview4" class="img-fluid rounded-circle" alt="" />
                           <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>add-dp-icon.svg" class="update-pp-icon" alt="" />
                           <input type="hidden" id="profile_image4" value="<?php echo $common_data['user_data']['pmdc_id'] ?>">
                           <input type="hidden" id="profile_image_base644" value="">
                           <input type="hidden" id="is_base64_method4" value="0">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="low-spacer"></div>
               <div class="actions">
                  <button type="button" onclick="payNow(<?php echo $common_data['user_data']['id']; ?>,<?php echo $_GET['type']; ?>); " class="btn btn-custom">Save</button>
                  <!-- <button type="button" class="btn btn-custom btn-custom-2 ml-2">Cancel</button> -->
               </div>
               <div class="medium-spacer"></div>
               <div class="info-msg error-info-msg" style="display: none;">
                  <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>error-warning.svg" class="img-fluid" alt="">
                  <div class="info-msg-text erro"></div>
               </div>
               <div class="info-msg success-info-msg" style="display: none;">
                  <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>success-tick.svg" class="img-fluid" alt="">
                  <div class="info-msg-text succs"></div>
               </div>
            </form>
         </div>
         <div class="col-md-4 account-pages-right-section">
            <div class="row">
               <div class="col-md-12 mb-3">
                  <p>
                     <b>ID Card Front Image</b>
                  </p>
                  <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>idCardFront.png" alt="" aria-hidden="true">
               </div>
               <div class="col-md-12 mb-3">
                  <p>
                     <b>ID Card Back Image</b>
                  </p>
                  <img src="<?php echo FRONTEND_ASSET_IMAGES_DIR ?>idCardBack.png" alt="" aria-hidden="true">
               </div>
            </div>
         </div>

      </div>
   </div>
</div>