<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main class="bg_gray pattern" style="padding: 130px 0px;">
  <div class="container margin_60_40">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form id="form">
        	<input type="hidden" id="action" value="forgotemail">
        	<input type="hidden" id="actionmsg" value="Please wait...!">
          <div class="sign_up">
            <div class="head">
              <div class="title">
                <h3> <i class="icon_lock"></i> Forgot Password ?</h3>
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
                
              </div>
             
              
              <div id="bottom-wizard">
                <a href="javascript:window.history.go(-1);" name="cancel" class="btn_1 gray btn_scroll">
                  <i class="arrow_carrot-left_alt2"></i>
                  Cancel

                </a>
                <button type="submit" name="process" class="btn_1 btn_scroll">
                  Verify Ur Email
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