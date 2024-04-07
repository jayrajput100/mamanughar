<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main class="bg_gray pattern">
  <div class="container margin_60_40">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form id="form">
        	<input type="hidden" id="action" value="updatepass">
        	<input type="hidden" id="actionmsg" value="Please wait...!">
          <div class="sign_up">
            <div class="head">
              <div class="title">
                <h3> <i class="icon_profile"></i> New Password</h3>
              </div>
            </div>
            <!-- /head -->
           <?php
            $uz=session()->get('uz');

           ?> 
            <div class="main">
               <h3 class="main_question wizard-header">Hi <?php echo $uz['user_name'] ?> , Welcome Back</strong></h3>
               <input type="hidden" id="user_id" name="user_id" value="<?php echo $uz['user_id'] ?>">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <input class="form-control required error" placeholder="Password" id="password_sign" name="password_sign" required="true">
                  
                  </div>

                </div>
                <div class="col-12">
                  <div class="form-group">
                    <input type="password"class="form-control" name="conf_password" id="password_sign" placeholder="Confirm Password" required="">
                   
                  </div>
                </div>
                
              </div>
             
              
              <div id="bottom-wizard">
                <a href="<?php echo previous_url() ?>" name="cancel" class="btn_1 gray btn_scroll">
                  <i class="arrow_carrot-left_alt2"></i>
                  Cancel

                </a>
                <button type="submit" name="process" class="btn_1 btn_scroll">
                  Update Password
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