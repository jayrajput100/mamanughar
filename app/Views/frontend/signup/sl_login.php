<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main class="bg_gray pattern">
  <div class="container margin_60_40">
    <div class="row justify-content-center">
      <div class="col-lg-6">
          <form id="form">
          	<input type="hidden" id="action" value="sl/login_code">
          	<input type="hidden" id="actionmsg" value="Please wait...!">
            <div class="sign_up">
              <div class="head">
                <div class="title">
                  <h3> <i class="icon_profile"></i> Sign In</h3>
                </div>
              </div>
              <!-- /head -->
              <div class="main">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email Id" required="">
                      <i class="icon_mail_alt"></i>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input type="password"class="form-control" name="pass" id="pass" placeholder="Password" required="">
                      <i class="icon_lock_alt"></i>
                    </div>
                  </div>
                </div>
               <div class="float-right mt-1"><a id="forgot" href="<?php echo base_url() ?>/suppliersignup">Sign Up</a></div>
                
                <div id="bottom-wizard">
                  <a href="<?php echo previous_url() ?>" name="cancel" class="btn_1 gray btn_scroll">
                    <i class="arrow_carrot-left_alt2"></i>
                    Cancel

                  </a>
                  <button type="submit" name="process" class="btn_1 btn_scroll">
                    Login
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