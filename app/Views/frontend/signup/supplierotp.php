<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<?php 
  $data=session()->get('sl');

?>
<style type="text/css">

</style>
<main class="bg_gray pattern margin_60_40">
  <div class="container margin_60_40">
    <div class="row justify-content-center">
	  <div class="col-lg-6"> 
	    <form id="form">
	      <input type="hidden" id="action" value="verifysupplierotp">
          <input type="hidden" id="actionmsg" value="Please wait..."> 
          <div class="sign_up">
            <div class="head">
              <div class="title">
                <h3> <i class="icon_profile"></i> OTP Verification</h3>
              </div>
            </div>
            <?php 
                $p_url=explode("/",$previous_url);
                
              ?>
            <input type="hidden" name="p_url" value="<?php echo $p_url[3] ?>">  
            <div class="main">
            <h3 class="main_question wizard-header">Enter the code we just send on your mobile phone<strong> +91 <?php echo  $data['supplier_mobile'] ?></strong>
             <a href="#collapseFilters" data-toggle="collapse" aria-expanded="true" style="float: right;margin-top: -25px"><i class="icon_adjust-vert" onclick="sh()"></i></a>

            </h3>
            
            <div class="collapse hide" id="collapseFilters" style="">
               
                      Enter the Number You want the OTP
                        <div class="form-group">
                            <input class="form-control required error" placeholder="Enter Mobile Number" name="supplier_mobile" id="supplier_mobile" maxlength="10" minlength="10" required="true" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo  $data['supplier_mobile'] ?>" id="supplier_mobile">
                            <i class="icon_mobile"></i>
                          </div>
                          <button type="button" name="process" class="btn_1 btn_scroll" onclick="go_back()">
                          <i class="arrow_carrot-left_alt2"></i> Go Back
                             
                          </button>
                          <button type="button" name="process" class="btn_1 btn_scroll" onclick="send_supplier_otp()">
                           Send OTP 
                             <i class="arrow_carrot-right_alt2"></i>
                          </button>
                    
                    <!-- /row -->
               
            </div>


              <div class="form-group" id="otp_section">
                <input class="form-control required error" placeholder="Enter OTP" name="otp" maxlength="4" minlength="4" required="true" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                <i class="icon_grid-2x2"></i>
              </div>
                   
              
              <h3 class="main_question wizard-header">Don't receive the code?  <a href="#" onclick="resend_supplier_otp()">Resend OTP</a></h3>
              
              <div id="bottom-wizard">
                <a href="javascript:window.history.go(-1);" name="cancel" class="btn_1 gray btn_scroll">
                  <i class="arrow_carrot-left_alt2"></i>
                  Cancel

                </a>
                <button type="submit" name="process" class="btn_1 btn_scroll">
                  Verify
                  <i class="arrow_carrot-right_alt2"></i>
                </button>
              </div>
            </div>
          </div>	
        </form>
      </div>
    </div>
  </div>
</main>      	

<?= $this->endSection('content')?>
