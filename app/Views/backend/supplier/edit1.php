<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Supplier</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Supplier</a></li>
            <li class="active"><a href="#">Edit</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
          <input type="hidden" id="action" name="action" value="supplier/update">
          <input type="hidden" id="id" name="id" value="<?php print_r($supplier['id']);?>">
          <div class="info">
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Update Supplier</span></h4>
                  </div>
                  <div class="actions align-self-center">
                    <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/supplier/list"> <i class="fa fa-list"></i> List Supplier</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-row">
                      <label for="validationCustom01"> Name</label>
                      <input type="text" class="form-control" id="validationCustom01" name="supplier_name" placeholder="Enter full name..." value="<?php print_r($supplier['supplier_name']);?>" required>
                      <div class="invalid-feedback">Please provide a valid Full Name...</div>
                    </div>
                    <div class="form-row">
                      <label for="company_name">Company name</label>
                      <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name..." value="<?php print_r($supplier['company_name']);?>" required>
                      <div class="invalid-feedback">Please provide a valid Company name...</div>
                    </div>
                    <div class="form-row">
                      <label for="contact_person">Contact Person Name</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter contact person name..." value="<?php print_r($supplier['contact_person']);?>" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">Please provide a valid contact person name...</div>
                      </div>
                    </div>
                    <div class="form-row">
                      <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number..." value="<?php print_r($supplier['mobile']);?>"  required>
                      <div class="invalid-feedback">Please provide a valid Mobile Number...</div>
                    </div>
                    <div class="form-row">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter email address..." value="<?php print_r($supplier['email']);?>" required>
                      <div class="invalid-feedback">Please provide a valid Email address....</div>
                    </div>
                  </div>  
                  <div class="col-md-6">
                    <div class="form-row">
                      <label for="country_id">Country</label>
                      <select class="form-control basic" required name="country_id" id="country_id" onchange="drpcountrychange(this.value)">
                        <option value="">Select Country</option>
                        <?php foreach ($country as $key => $value) { ?>
                          <?php if($value['country_id'] == $supplier['country_id']){?>
                            <option value="<?php echo $value['country_id'] ?>" selected><?php print_r($value['country_name']) ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $value['country_id'] ?>"><?php print_r($value['country_name']) ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please Select country... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="validationCustomUsername">State</label>
                      <select class="form-control basic"  required name="state_id" id="state_id" onchange="drpstatechange(this.value)">
                        <?php foreach ($state as $key => $value) { ?>
                          <?php if($value['state_id'] == $supplier['state_id']){?>
                            <option value="<?php echo $value['state_id'] ?>" selected><?php print_r($value['state_name']) ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $value['state_id'] ?>"><?php print_r($value['state_name']) ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select> 
                      <div class="invalid-feedback"> Please select country... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="validationCustomUsername">City</label>
                      <select class="form-control basic" required name="city_id" id="city_id">
                        <?php foreach ($city as $key => $value) { ?>
                          <?php if($value['city_id'] == $supplier['city_id']){?>
                            <option value="<?php echo $value['city_id'] ?>" selected><?php print_r($value['city_name']) ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $value['city_id'] ?>"><?php print_r($value['city_name']) ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please select state... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="location">Location / Landmark</label>
                      <textarea type="text" rows="3" class="form-control" name="location"  id="location" placeholder="Location / Landmark..." aria-describedby="inputGroupPrepend"><?php print_r($supplier['location']);?> </textarea>
                      <div class="invalid-feedback">Please provide a valid Location...</div>
                    </div>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-md-6">
                    <div class="form-row">
                      <label for="business_category">Business Category</label>
                      <select class="form-control basic" required name="business_category" id="business_category">
                        <option value="">Select business category</option>
                        <?php foreach ($business_category as $key => $value) { ?>
                          <?php if($key == $supplier['business_category']){?>
                            <option value="<?php print_r($key);?>" selected><?php print_r($value);?></option>
                          <?php } else { ?>
                            <option value="<?php print_r($key);?>"><?php print_r($value);?></option>
                          <?php } ?>  
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please Select business category... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="validationCustompersonname">Company Status</label>
                      <select class="form-control basic" required name="supplier_type">
                        <option value="">Select supplier type</option>
                        <?php foreach ($supplier_type as $key => $value) { ?>
                          <?php if($key == $supplier['supplier_type']){?>
                            <option value="<?php print_r($key);?>" selected><?php print_r($value);?></option>
                          <?php } else { ?>
                            <option value="<?php print_r($key);?>"><?php print_r($value);?></option>
                          <?php } ?>  
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please supplier type... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>

                    <div class="form-row">
                      <label for="website">Supplier website</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="website" name="website" placeholder="Supplier website..." aria-describedby="inputGroupPrepend" value="<?php echo $supplier['website'] ?>" required>
                        <div class="invalid-feedback"> Please provide a valid Supplier website.</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-row">
                      <label for="validationCustompersonname">Category</label>
                      <select class="form-control tagging" name="category_id[]" id="category_id" required onchange="drpchange(this)" multiple="multiple">
                        <option value="">Select Category</option>
                        <?php 
                          //print_r($supplier);
                          $chk_cat=json_decode($supplier['category_id'],true);
                          foreach ($category as $key => $value) 
                            { ?>
                          <?php if(in_array($value['category_id'], $chk_cat)){?>
                            <option value="<?php echo $value['category_id'] ?>" selected><?php echo $value['category_name'] ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please Select the Category </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    
                    <div class="form-row">
                      <label for="validationCustompersonname">Product subcategory</label>
                      <select class="form-control tagging nested" name="subcategory_id[]" id="subcategory_id" required onchange="subdrpchange(this)" multiple="multiple">
                        <option value="">First Select Category</option>
                        <?php 
                         $chk_sub_cat=json_decode($supplier['subcategory_id'],true);
                         foreach ($subcategory as $key => $value) { ?>
                          <?php if(in_array($value['subcategory_id'], $chk_sub_cat)){?>
                            <option value="<?php echo $value['subcategory_id'] ?>" selected><?php echo $value['sub_cat_name'] ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please Select subcategory</div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="validationCustompersonname">Product Third subcategory</label>
                      <select class="form-control tagging" name="third_subcategory_id[]" id="third_subcategory_id" multiple="multiple">
                        
                        <?php 
                        if($supplier['third_subcategory_id']!='null')
                        {  
                        $chk_third_sub_cat=json_decode($supplier['third_subcategory_id'],true);   
                        foreach ($third_subcategory as $key => $value) { ?>
                          <?php if(in_array($value['third_subcategory_id'], $chk_third_sub_cat)){?>
                            <option value="<?php echo $value['third_subcategory_id'] ?>" selected>
                              <?php echo $value['third_subcategory_name'] ?>
                            </option>
                          <?php } ?>
                        <?php } ?>
                       <?php } ?> 
                      </select>
                      <div class="invalid-feedback"> Please select third subcategory</div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                  </div>
                </div> 
              </div>
              <div class="card-footer">
                <button class="btn btn-fill btn-fill-success mr-3 float-right" type="submit">Update</button>
                <button class="btn btn-fill btn-fill-warning mr-3 float-right" type="reset">Cancel</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  END CONTENT PART  -->
</div>
<!-- END MAIN CONTAINER -->