<div class="page-fixed-main-content">
<!-- BEGIN PAGE BASE CONTENT -->
<!-- -->

    <div class="dashboard-cont">        
        <div class="col-xl-12">
            <div class="row gutter-b first-row">
                <div class="col-xl-4 events-created">
                    <div class="card card-custom justify-content-center bg-transparent bgi-no-repeat bgi-no-repeat bgi-size-cover">
                        <div class="card-body d-flex flex-column z-index-1">
                            <div class="text-white font-bold font-size-h4 icon-white icon-svg d-flex align-items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="47.04" height="41.344" viewBox="0 0 47.04 41.344">
                              <path id="Jobs_Icon" data-name="Jobs Icon" d="M45.671,5.513h-12.5V4.134A4.139,4.139,0,0,0,29.033,0H18.008a4.139,4.139,0,0,0-4.134,4.134V5.512H1.378A1.382,1.382,0,0,0,0,6.891V37.209a4.139,4.139,0,0,0,4.134,4.134H42.906a4.139,4.139,0,0,0,4.134-4.134V6.914a1.338,1.338,0,0,0-1.37-1.4ZM16.63,4.134a1.38,1.38,0,0,1,1.378-1.378H29.033a1.38,1.38,0,0,1,1.378,1.378V5.512H16.63ZM43.75,8.269,39.47,21.108a1.376,1.376,0,0,1-1.307.942H30.411V20.672a1.378,1.378,0,0,0-1.378-1.378H18.008a1.378,1.378,0,0,0-1.378,1.378V22.05H8.877a1.376,1.376,0,0,1-1.307-.942L3.291,8.269ZM27.655,22.05v2.756H19.386V22.05ZM44.284,37.209a1.38,1.38,0,0,1-1.378,1.378H4.135a1.38,1.38,0,0,1-1.378-1.378V15.383l2.2,6.6a4.128,4.128,0,0,0,3.922,2.827H16.63v1.378a1.378,1.378,0,0,0,1.378,1.378H29.033a1.378,1.378,0,0,0,1.378-1.378V24.806h7.752a4.128,4.128,0,0,0,3.922-2.827l2.2-6.6Zm0,0" transform="translate(0)"></path>
                            </svg><span class="fex-1-1"><?php if(empty($allevent[0]['COUNT(id)'])){echo '0';}else{ echo $allevent[0]['COUNT(id)'] ;} ?></span> Total Courses</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 transactions-details">
                    <div class="card card-custom justify-content-center">
                        <div class="card-space-3rem d-flex align-items-center justify-content-between flex-wrap">
                            <div class="mr-2">
                                <h3 class="text-dark font-bold font-size-h3">Transactions Details</h3>
                                <div class="font-normal font-size-p mt-2">view all transactions details</div>
                            </div>
                            <a href="<?php echo BACKEND_PROCESS_PAYMENT_URL ?>" class="btn btn-primary font-weight-bold py-3 px-6">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-custom bg-transparent overlay-none bgi-no-repeat bgi-size-cover gutter-b premium-service-providers">
                        <div class="card-body d-flex align-items-center">
                            <div>
                                <h3 class="text-white font-bold font-size-h3 mb-5">Premium Users</h3>
                                <a href="#" class="btn btn-primary white-btn btn-2 font-weight-bold px-6 py-3"><?php if(empty($allPremiumServiceProvider)){echo '0';}else{ echo $allPremiumServiceProvider ;} ?></a>
                            </div>
                            <img src="../assets/backend/images/plaany-service-providers.png" alt="premium-service-provider">
                        </div>
                    </div>
              
                    <div class="row box-half-n-half">
                        <div class="col-xl-6 service-proviers">
                            <div class="card card-custom bg-primary gutter-b">
                                <div class="card-body">
                                    <span class="img-icon">
                                        <img src="../assets/backend/images/plaany-service-providers.png" alt="service-providers">
                                    </span>
                                    <div class="text-dark font-bold font-size-h5 d-flex flex-column align-items-baseline align-items-center">
                                        <span>Regular Users</span>
                                        <span class="m-2rem"><?php echo $getserviceprovider[0]['allevent'];?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 events-planners">
                            <div class="card card-custom gutter-b">
                                <div class="card-body">
                                    <span class="img-icon">                               
                                        <img src="../assets/backend/images/plaany-event-planners.png" alt="event-planners">
                                    </span>
                                    <div class="text-dark font-bold font-size-h5 d-flex flex-column align-items-baseline align-items-center">
                                        <span>Exams Conducted</span>
                                        <span class="m-2rem"><?php echo $geteventplanner[0]['allevent'];?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                   
                    <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b card-stretch commission-earnings">
                      
                        <div class="card-body card-space-3rem d-flex flex-column align-items-start justify-content-start bg-transparent bgi-no-repeat bgi-no-repeat bgi-size-cover">
                            <div class="p-1 d-flex flex-column justify-content-between flex-grow-1 z-index-1">
                                <div class="text-white text-white font-bold font-size-h5 icon-white icon-svg d-flex flex-column align-items-baseline align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="49.964" height="57.595" viewBox="0 0 49.964 57.595">
                                      <g id="wallet" transform="translate(-21.961 0)">
                                        <g id="Group_2041" data-name="Group 2041" transform="translate(21.961 0)">
                                          <g id="Group_2040" data-name="Group 2040" transform="translate(0 0)">
                                            <path id="Path_1351" data-name="Path 1351" d="M70.053,9.919,52.471.4a3.708,3.708,0,0,0-4.865,1.459L37.32,20.97H24.81a2.818,2.818,0,0,0-2.849,2.849V54.745a2.818,2.818,0,0,0,2.849,2.849H64.772a2.818,2.818,0,0,0,2.849-2.849V47.518H68.8a1.1,1.1,0,0,0,1.112-1.112v-8.27A1.1,1.1,0,0,0,68.8,37.024H67.621V28.892a2.9,2.9,0,0,0-2.224-2.78l6.116-11.328A3.643,3.643,0,0,0,70.053,9.919ZM57.544,5.68,46.563,26.043H43.436L55.181,4.429ZM49.621,2.9a1.367,1.367,0,0,1,1.807-.556l1.737.973L40.934,26.043H37.112ZM24.115,23.749a.671.671,0,0,1,.625-.556H36.069l-1.529,2.78h-9.8a1.924,1.924,0,0,0-.625.069V23.749Zm41.212,31a.623.623,0,0,1-.625.625H24.741a.623.623,0,0,1-.625-.625V28.892a.623.623,0,0,1,.625-.625H64.633a.623.623,0,0,1,.625.625v8.131H61.019a3.337,3.337,0,0,0-3.336,3.336v3.822a3.337,3.337,0,0,0,3.336,3.336h4.309v7.228Zm2.224-15.5h.069v6.046h-6.6a1.1,1.1,0,0,1-1.112-1.112V40.359a1.1,1.1,0,0,1,1.112-1.112ZM69.5,13.672,62.826,26.043H49.065L59.49,6.792l9.452,5.143A1.216,1.216,0,0,1,69.5,13.672Z" transform="translate(-21.961 0)"></path>
                                          </g>
                                        </g>
                                        <g id="Group_2043" data-name="Group 2043" transform="translate(59.62 12.007)">
                                          <g id="Group_2042" data-name="Group 2042" transform="translate(0)">
                                            <path id="Path_1352" data-name="Path 1352" d="M244.348,69.731l-.556-.278a3.042,3.042,0,0,0-4.031,1.181l-.695,1.32a2.927,2.927,0,0,0-.208,2.293,2.8,2.8,0,0,0,1.459,1.737l.556.278a3.164,3.164,0,0,0,1.39.347,3.126,3.126,0,0,0,2.641-1.529l.7-1.32A3.114,3.114,0,0,0,244.348,69.731Zm-.764,2.988-.695,1.32a.785.785,0,0,1-1.042.278l-.556-.347a1.022,1.022,0,0,1-.347-.417.525.525,0,0,1,.07-.556l.695-1.32a.922.922,0,0,1,.695-.417.626.626,0,0,1,.347.07l.556.278A1.081,1.081,0,0,1,243.584,72.72Z" transform="translate(-238.71 -69.108)"></path>
                                          </g>
                                        </g>
                                      </g>
                                      <!-- <?php // echo 
                                    $getComissionEarnings[0]['totalcommissionamount'];?> -->
                                    </svg><span class="m-2rem">Earnings</span><span>$<?php if(empty($getComissionEarnings)){echo '0' ;}else{echo $getComissionEarnings ;} ?></span></div>   
                                <div class="text-white text-white font-bold font-size-h5 icon-white icon-svg d-flex flex-column align-items-flex-end align-items-center membership-fee">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                          <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"></path>
                                       </g>
                                       <!-- <?php // echo round($p, 2); ?> -->
                                        <?php $p =  $getmembershipfee;  ?>
                                    </svg><span class="m-2rem">Membership Fee</span><span>$<?php echo $p ;?>/y</span></div>                                                                

                            </div>
                        </div>
                        
                    </div>
               
                </div>
            </div>
        </div>

    </div>


<!-- END PAGE BASE CONTENT -->
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.page-sidebar-menu > li').removeClass('active');
		$("#dashboard_li").addClass('active');
	});
</script>