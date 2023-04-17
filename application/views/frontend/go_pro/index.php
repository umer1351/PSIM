<!--====== Start Hero Area ======-->
<section class="hero-area">
    <div class="breadcrumbs-area bg_cover bg-with-overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h1 class="title">Become a Member</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="index.html">Home</a></li>
                            <li class="">Become a Member</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Hero Area ======-->

<!--====== Start Become-A-Member ======-->
<section class="Become-a-Member pt-40 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center  pb-40">
                <p class="h2 m-0 color-blue">You have currently subscription of PSIM’s <a class="color-yellow" href="#"> <?php if($record['approval_member'] == '1'){ ?>  <?php }elseif($record['approval_member'] == '0' && $record['premium_subscription'] != '0') { ?> applied for <?php } ?>  PSIM's<span class="bold-text dark-colored"><?php if($record['premium_subscription'] == '0'){ echo " Free Plan.";}elseif($record['premium_subscription'] == '1'){ echo " Life time Plan."; }else{ echo " Annual Plan.";  } ?> </a> </p>
            </div>
            <div class="col-lg-12 pb-40">
                <p class="h4 m-0 color-blue">
                    Get Lifetime membership and enjoy the following benefits.
                </p>
                <ul class="becomeMemberUl">
                    <li>You will get unlimited free registrations.</li>
                    <li>No recurring payment every year.</li>
                </ul>
            </div>
            <div class="col-lg-12 text-center">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-12"></div>
                    <?php foreach ($record2 as $key => $value) { ?>
                        <?php if($value['type'] == '2'){?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="memberContent memberContentActive">
                            <p class="h2 mb-3">Lifetime</p>

                            <p class="h2 mb-3">RS  <?php echo $value['price']; ?> </p>
                            <button class="memberBtn"><input type="radio"  data_attr="<?php echo $value['price']; ?>" class="choose-account-option" name="choose-account" id="" value="1"/>Choose package</button>
                        </div>
                    </div>
           
                <?php }else{ ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="memberContent">
                            <p class="h2 mb-3">Annual</p>
                            <p class="h2 mb-3">RS <?php echo $value['price']; ?> /Year </p>
                            <button class="memberBtn"><input type="radio" class="choose-account-option"    data_attr="<?php echo $value['price']; ?>" name="choose-account" id="" value="1" />Choose package</button>
                        </div>
                    </div>
                    <?php } } ?>
                    <div class="col-lg-2 col-md-6 col-sm-12"></div>
                </div>
                <div class="medium-spacer"></div>
                <br>
        <?php if($this->common_data['user_data']['premium_subscription'] == '0'){ ?>
        <button type="button" onclick="make_payment_modal(); return false;" class="btn btn-custom btn-custom-2 memberBtn">Pay Now </button>
        <?php }elseif($record['approval_member'] == '1' && $this->common_data['user_data']['premium_subscription'] == '1'){ ?>
            <p>You have already subscribed to Life time plan. Hence, you cannot subscribe to other plan.</p>

        
        <?php }elseif($record['approval_member'] == '1' && $this->common_data['user_data']['premium_subscription'] == '2'){ ?>
            <button type="button" onclick="make_payment_modal(); return false;" class="btn btn-custom btn-custom-2 memberBtn">Pay Now </button>

        <?php }elseif($record['approval_member'] == '0' && $this->common_data['user_data']['premium_subscription'] == '2'){ ?>
            <p>*You have already applied. Please wait for the approval.</p>

        <?php }?>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function make_payment_modal() {
     if($('input[name=choose-account]').is(':checked')) {
        var selected = $('input[name=choose-account]:checked').val();  

        var price = $('input[name=choose-account]:checked').attr('data_attr'); 
        $("#payment_selected").val(selected);
        $("#payment_value").val(price);
        // $("#makePayment-modal").modal().show(); 
        var url = "http://demo.psim.org.pk/member?type="+selected;
        window.location = url;
        }else{

        alert('Please select atleast one option');  

        }
        
    }

    function cancel_renewal() {
        
        $("#cancel-modal").modal().show(); 
    }
    function show_go_pro() {

        $('.gp').show();
        // $('.gpro').hide();
        
    }

</script>
<!--====== End Become-A-Member ======-->