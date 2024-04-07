<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<style type="text/css">
  .btn-outline-default:hover {
    background-color: #e9ecef;
}
.btn-group>.btn, .btn-group .btn {
    padding: 8px 14px;
}
.btn-group-vertical>.btn, .btn-group>.btn {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}
.bs-placeholder,.btn-info ,.btn-outline-default{
    border: 1px solid #e9ecef !important;
    color: #3b3f5c !important;
    background-color: transparent;
    box-shadow: none;
}
.btn {
    border: none;
    font-family: inherit;
    font-size: inherit;
    color: inherit;
    cursor: pointer;
    padding: 10px 24px;
    border-radius: 4px;
    display: inline-block;
    text-transform: uppercase;
    letter-spacing: 1px;
    outline: none;
    position: relative;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}
.mb2
{
    margin-bottom: 1.5rem!important;
    margin-top:1.2rem !important;
}
.mb4
{
    margin-bottom: 3rem!important;
}
</style>
<main class="bg_gray pattern">
  <div class="container margin_60_40">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <form id="form" class="general-info">
        	<input type="hidden" id="action" value="dosuppliersignup">
        	<input type="hidden" id="actionmsg" value="Please wait... Signup running...!">
          <div class="sign_up">
            <div class="head">
              <div class="title">
                <h3> <i class="icon_profile"></i> Supplier Sign Up</h3>
              </div>
            </div>
            <!-- /head -->
            <div class="main">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" name="supplier_name" class="form-control required error" placeholder="Supplier Name / Company Name" required>
                    <i class="icon_profile"></i>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <input type="text" name="contact_person" class="form-control required error" placeholder="Contact Person Name" required>
                    <i class="icon_profile"></i>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <input type="text" name="mobile" class="form-control required error" placeholder="Mobile No." required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" minlength="10" maxlength="10">
                      <i class="icon_mobile"></i>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <input type="text" name="alternate_mobile" class="form-control required error" placeholder="Alternate Mobile No." onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" minlength="10" maxlength="10">
                      <i class="icon_mobile"></i>
                    </div>
                  </div> 
                   <div class="col-3">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control required error" placeholder="Email ID" required>
                      <i class="icon_mail"></i>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <input type="email" name="alternate_email" class="form-control required error" placeholder="Alternate Email" >
                      <i class="icon_mail"></i>
                    </div>
                  </div>  
                </div>


              </div>
              <div class="form-group">
               <div class="form-group">
                      <input type="password" name="password" id="password_sign" class="form-control required error" placeholder="Password" required>
                      <i class="icon_lock"></i>
                    </div>
              </div>
              <div class="form-group">
               <div class="form-group">
                      <input type="password" name="conf_password" id="password_sign" class="form-control required error" placeholder="Confirm Password" required>
                      <i class="icon_lock"></i>
                    </div>
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
              <div class="row">
                 <div class="col-6">
                    <div class="form-group">
                      <input type="text" name="location" class="form-control required error" placeholder="Location / Landmark" required>
                      <i class="icon_pin"></i>
                    </div>
                  </div> 
                  <div class="col-6">
                    <div class="form-group">
                      <input type="text" name="pin_code" maxlength="6" minlength="6" class="form-control required error" placeholder="Pin Code" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                      <i class="icon_pin"></i>
                    </div>
                  </div>
              </div> 
 
              <div class="row">
                 <div class="col-6">
                    <div class="form-group">
                      <input type="text" name="website" class="form-control required error" placeholder="Website" >
                      <i class="icon_globe-2"></i>
                    </div>
                  </div> 
                  <div class="col-6">
                    <div class="form-group">
                      <input type="text" name="phone_no" class="form-control" placeholder="Phone No : (999) 999-9999" >
                      <i class="icon_mobile"></i>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <select class="form-control required" name="business_category" id="business_category"  required>
                      <option value="">Your Business Category</option>
                      <?php foreach ($business_category as $key => $value) { ?>
                              <option value="<?php echo $key ?>"><?php print_r($value) ?></option>
                      <?php } ?>
                     
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <select class="form-control required" name="supplier_type" id="supplier_type"  required>
                      <option value="">Your Company Status</option>
                      <?php foreach ($supplier_type as $key => $value) { ?>
                              <option value="<?php echo $key ?>"><?php print_r($value) ?></option>
                      <?php } ?>
                     
                    </select>
                  </div>
                </div>

              </div>  
              <div class="row mb4">
                <div class="col-4 mb2">
                  <div class="form-group">
                    <label for="validationCustompersonname">Category</label>
                    <select class="form-control selectpicker required" name="category_id[]" id="category_id_0" onchange="drpchange(this,0)" required>
                      <option value="">Your Category</option>
                      <?php foreach ($category as $key => $value) { ?>
                              <option value="<?php echo $value['category_id'] ?>"><?php print_r($value['category_name']) ?></option>
                      <?php } ?>
                     
                    </select>
                  </div>
                </div>
                <div class="col-4 mb2">
                      <label for="validationCustompersonname">Sub Category</label>
                   <select class="form-control selectpicker  sub required" name="subcategory_id[]" id="subcategory_id_0" multiple  required onchange="subdrpchange(this,0)"> 
                    <option value="">Your Sub Category</option>
                     
                     
                    </select>
                  </div>
               
               <div class="col-4 mb2">
                <div class="form-group">
                   <label for="validationCustompersonname">Product Name</label>
                    <div id="third_subcategory_id_0">
                            
                    </div>
                 </div>  
               </div>  

              </div>
              <div id="add_row">

              </div>  
                    
              <br/>   
              <br/>
              <br/>
              <div class="form-row">
                     <button class="btn_1 aqua btn_scroll" type="button" id="add_new_row" >Add Category Row</button>
              </div>
              <br/>
              <br/>


              <div class="form-row">
                   <div class="col-12">
                        <div class="form-group">
                           <label for="validationCustompersonname">Supplier Logo</label>
                             
                              <input type="file" id="file" class="dropify" data-default-file="" data-max-file-size="2M" name="supplier_logo" />
                              <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Supplier Logo</p>
                            
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