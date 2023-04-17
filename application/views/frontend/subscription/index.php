<!--====== Start Hero Area ======-->
<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title">Subscription List</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="<?php  echo base_url();?>">Home</a></li>
                            <li class="">Subscription List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Hero Area ======-->
        
<!--====== Start Subscription List ======-->
<section class="subscription-list pt-40 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center  pb-40">
                <p class="h2 m-0 color-blue">Below is your subscription list</p>
            </div>
            <div class="col-lg-12 text-center">
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="thead-blue">
                        <tr>
                          <th>#</th>
                          <th>Module</th>
                          <th>Payment Status</th>
                          <th>Approval Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //print_r($users);die();
                        if(!empty($listing)){
                            $count = 0;
                            foreach($listing as $list){
                            $count++;
                        ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php
                                            
                                    echo 'Examination Course'; ?>
                                        
                         </td>
                          <td class="

                          <?php 
                                            if($list['payment_status'] == '1'){
                                                echo 'text-success';
                                            }else if($list['payment_status'] == '0'){
                                                echo 'color-yellow';
                                            } ?>">

                                            <?php 
                                            if($list['payment_status'] == '1'){
                                                echo 'Done';
                                            }else if($list['payment_status'] == '0'){
                                                echo 'Pending';
                                            } ?>
                                                
                            </td>
                            
                                <td class="

                          <?php 
                                            if($list['approval'] == '1'){
                                                echo 'text-success';
                                            }else if($list['approval'] == '0'){
                                                echo 'color-yellow';
                                            } ?>">
                                            <?php  if($list['approval'] == '1'){
                                                echo 'Approved';
                                            }else if($list['approval'] == '0'){
                                                echo 'Pending';
                                            }else if($list['approval'] == '2'){
                                                echo 'Rejected';
                                            }  ?>
                                        </td>
                            
                          
                        </tr>
                        <?php } } ?>
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Subscription List ======-->