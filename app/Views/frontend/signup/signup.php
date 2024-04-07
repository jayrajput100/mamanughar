<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main class="bg_gray pattern">
  <div class="container margin_60_40">
    <div class="row justify-content-center">
      <div class="col-lg-6">
       
          
        <form id="form">
        	<input type="hidden" id="action" value="dosignup">
        	<input type="hidden" id="actionmsg" value="Please wait... Signup running...!">
          <div class="sign_up">
            <div class="head">
              <div class="title">
                <h3> <i class="icon_profile"></i> Sign Up</h3>
              </div>
            </div>
            <!-- /head -->
            <div class="main">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" name="first_name" class="form-control required error" placeholder="First  Name" required>
                    <i class="icon_profile"></i>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" name="last_name" class="form-control required error" placeholder="Last Name" required>
                    <i class="icon_profile"></i>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input class="form-control required error" placeholder="Company Name" name="company_name">
                <i class="icon_grid-2x2"></i>
              </div>

              <div class="form-group">
                <input type="text" class="form-control required error" placeholder="Mobile" name="mobile" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" minlength="10" maxlength="10">
                <i class="icon_mobile"></i>
              </div>
              <div class="form-group">
                <input type="email" class="form-control required error" placeholder="Email Address" name="email" required>
                <i class="icon_mail"></i>
              </div>

              <div class="form-group">
                <input class="form-control required error" placeholder="Password" id="password_sign" name="password_sign" required>
                <i class="icon_lock"></i>
              </div>
              <div class="form-group">
                <input class="form-control required error" placeholder="Confirm Password" id="password_sign" name="conf_password_sign" required>
                <i class="icon_lock"></i>
              </div>
              <div class="form-group">
                <input class="form-control required error" placeholder="Address" name="address" >
                <i class="icon_pin"> </i>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <select class="form-control required" name="country_id" id="country_id" onchange="drpcountrychange(this.value)" required>
                      <option value="">Your Country</option>
                      <?php foreach ($country as $key => $value) { ?>
                              <option value="<?php echo $value['country_id'] ?>"><?php print_r($value['country_name']) ?></option>
                      <?php } ?>
                     
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group" >
                    <select class="form-control required" name="state_id" id="state_id" onchange="drpstatechange(this.value)" required>
                      <option value="">Your State</option>
                     
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <select class="form-control required" name="city_id" id="city_id" required>
                      <option value="">Your City</option>
                      
                    </select>
                  </div>
                </div>
              </div>
              
              
              <div id="bottom-wizard">
                <a href="javascript:window.history.go(-1);" name="cancel" class="btn_1 gray btn_scroll">
                  <i class="arrow_carrot-left_alt2"></i>
                  Cancel

                </a>
                <button type="submit" name="process" class="btn_1 btn_scroll">
                  Submit
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