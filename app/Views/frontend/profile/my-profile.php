<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">
  <div class="page_header element_to_stick">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
          <div class="breadcrumbs">
            <ul>
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li><a href="#">Profile</a></li>
              <li>My Profile</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container margin_30_40">
    <div class="row">
      <aside class="col-lg-3" id="sidebar_fixed">
        <div class="widget">
            <div class="widget-title">
              <h4>Profile</h4>
            </div>
            <ul class="cats">
              <li><a href="#">My Profile </a></li>
             <!--  <li><a href="#">Change Password </a></li>
              <li><a href="#">My Order</a></li>
              <li><a href="#">Logout </a></li> -->
            </ul>
          </div>
      </aside>
      <div class="col-lg-6">
        <?php $profile = $profile[0]; ?>
          
        <form id="form">
          <input type="hidden" id="action" value="up_profile">
          <input type="hidden" id="actionmsg" value="Please wait... Signup running...!">
          <input type="hidden" name="id" id="user_id" value="<?php print_r($profile['id'])?>">
          <div class="sign_up">
            <div class="head">
              <div class="title">
                <h3> <i class="icon_profile"></i> Profile</h3>
              </div>
            </div>
            <!-- /head -->
            <div class="main">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" name="first_name" class="form-control required error" value="<?php print_r($profile['fname'])?>" placeholder="First  Name" required>
                    <i class="icon_profile"></i>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" name="last_name" value="<?php print_r($profile['lname'])?>" class="form-control required error" placeholder="Last Name">
                    <i class="icon_profile"></i>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input class="form-control required error" value="<?php print_r($profile['company_name'])?>" placeholder="Company Name" name="company_name">
                <i class="icon_grid-2x2"></i>
              </div>

              <div class="form-group">
                <input class="form-control required error" value="<?php print_r($profile['mobile'])?>" placeholder="Mobile" name="mobile">
                <i class="icon_mobile"></i>
              </div>
              <div class="form-group <?php echo ($profile['is_email_verified']=="Pending")?"row":'' ?>">
               <?php 
                if($profile['is_email_verified']=="Pending")
                { 

                  ?>
                <div class="col-md-7">
                  
                
                <input class="form-control required error" value="<?php print_r($profile['email'])?>" placeholder="Email Address" name="email" id="user_email"><i class="icon_mail" style="right: 15px;"></i>
               </div>
               <div class="col-md-5">

                   <button type="button" name="process" class="btn_1 btn_scroll" onclick="sendusermail()">Verify Your Email</button>
               </div>
               <?php }else
               { ?>
                   
                 <input class="form-control required error" value="<?php print_r($profile['email'])?>" placeholder="Email Address" name="email" id="user_email"><i class="icon_mail" ></i>
  
              <?php }
                ?>  
              </div>

              <div class="form-group">
                <input class="form-control required error" placeholder="Password" id="password_sign" name="password_sign">
                <i class="icon_lock"></i>
              </div>
              <div class="form-group">
                <input class="form-control required error" placeholder="Confirm Password" id="conf_password_sign" name="conf_password_sign">
                <i class="icon_lock"></i>
              </div>
              <div class="form-group">
                <input class="form-control required error" value="<?php print_r($profile['address'])?>" placeholder="Address" name="address" >
                <i class="icon_pin"> </i>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <select class="form-control required" name="country_id" id="country_id" onchange="drpcountrychange(this.value)" required>
                      <option value="">Your Country</option>

                      <?php if(isset($country)){?>
                        <?php if(is_array($country) && count($country) >=1){?>
                          <?php foreach ($country as $key => $value) { ?>
                            <?php if($profile['country_id']==$value['country_id']){?>
                              <option value="<?php echo $value['country_id'] ?>" selected="true"><?php print_r($value['country_name']) ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $value['country_id'] ?>"><?php print_r($value['country_name']) ?></option>
                            <?php } ?> 
                          <?php } ?>
                        <?php } ?>
                      <?php } ?>

                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group" >
                    <select class="form-control required" name="state_id" id="state_id" onchange="drpstatechange(this.value)" required>
                      <option value="">Your State</option>

                      <?php if(isset($state)){?>
                        <?php if(is_array($state) && count($state) >=1){?>

                          <?php foreach ($state as $key => $value) { ?>s
                            <?php if($profile['state_id']==$value['state_id']){?>
                              <option value="<?php echo $value['state_id'] ?>" selected="true"><?php print_r($value['state_name']) ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $value['state_id'] ?>"><?php print_r($value['state_name']) ?></option>
                            <?php } ?>
                          <?php } ?>

                        <?php } ?>
                      <?php } ?>


                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <select class="form-control required" name="city_id" id="city_id" required>
                      <option value="">Your City</option>
                       <?php if(isset($city)){?>
                        <?php if(is_array($city) && count($city) >=1){?>
                          <?php foreach ($city as $key => $value) { ?>
                            <?php if($profile['city_id']==$value['city_id']){?>
                              <option value="<?php echo $value['city_id'] ?>" selected="true"><?php print_r($value['city_name']) ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $value['city_id'] ?>"><?php print_r($value['city_name']) ?></option>
                            <?php } ?> 
                          <?php } ?>
                        <?php } ?>
                      <?php } ?>
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