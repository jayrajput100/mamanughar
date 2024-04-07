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
            <li class="active"><a href="#">Add</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
          <input type="hidden" id="action" name="action" value="supplier/add">
          <div class="info">
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Add Supplier</span></h4>
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
                      <label for="validationCustom01">Supplier Name</label>
                      <input type="text" class="form-control" id="validationCustom01" name="supplier_name" placeholder="Enter Supplier Name" required>
                      <div class="invalid-feedback">Please provide a valid Supplier Name...</div>
                    </div>
                    <div class="form-row">
                      <label for="company_name">Company Name</label>
                      <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" required>
                      <div class="invalid-feedback">Please provide a valid Company name...</div>
                    </div>
                    <div class="form-row">
                      <label for="contact_person">Contact Person Name</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person Name" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">Please provide a valid contact person name...</div>
                      </div>
                    </div>
                    <div class="form-row">
                      <label for="mobile">Mobile No.</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile No." required>
                      <div class="invalid-feedback">Please provide a valid Mobile Number...</div>
                    </div>
                    <div class="form-row">
                      <label for="mobile">Alternate Mobile No.</label>
                      <input type="text" class="form-control" id="alternate_mobile" name="alternate_mobile" placeholder="Alternate Mobile No." >
                      <div class="invalid-feedback">Please provide a valid Mobile Number...</div>
                    </div>
                    <div class="form-row">
                      <label for="email">Email ID</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID" required>
                      <div class="invalid-feedback">Please provide a valid Email address....</div>
                    </div>
                    <div class="form-row">
                      <label for="email">Alternate Email ID</label>
                      <input type="email" class="form-control" id="alternate_email" name="alternate_email" placeholder="Alternate Email ID" >
                      <div class="invalid-feedback">Alternate Email ID</div>
                    </div>
                    <div class="form-row">
                      <label for="email">Phone No.</label>
                      <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone No." >
                      <div class="invalid-feedback">Alternate Email ID</div>
                    </div>
                  </div>  
                  <div class="col-md-6">
                    <div class="form-row">
                      <label for="country_id">Country</label>
                      <select class="form-control basic custom-select-sm" required name="country_id" id="country_id" onchange="drpcountrychange(this.value)">
                        <option value="">Select Country</option>
                        <?php foreach ($country as $key => $value) { ?>
                          <option value="<?php echo $value['country_id'] ?>"><?php print_r($value['country_name']) ?></option>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please Select country... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="validationCustomUsername">State</label>
                      <select class="form-control basic"  required name="state_id" id="state_id" onchange="drpstatechange(this.value)">
                        <option value="">Please select first country</option>
                      </select> 
                      <div class="invalid-feedback"> Please select country... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="validationCustomUsername">City</label>
                      <select class="form-control basic" required name="city_id" id="city_id">
                        <option value="">Please select first state</option>
                      </select>
                      <div class="invalid-feedback"> Please select state... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="location">Location / Landmark</label>
                      <textarea type="text" rows="3" class="form-control" name="location"  id="location" placeholder="Location / Landmark..." aria-describedby="inputGroupPrepend"> </textarea>
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
                          <option value="<?php print_r($key);?>"><?php print_r($value);?></option>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please Select business category... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="validationCustompersonname">Company Status</label>
                      <select class="form-control basic" required name="supplier_type">
                        <option value="">Select Company Status</option>
                        <?php foreach ($supplier_type as $key => $value) { ?>
                          <option value="<?php print_r($key);?>"><?php print_r($value);?></option>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback"> Please supplier type... </div>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="form-row">
                      <label for="website">Supplier website</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="website" name="website" placeholder="Supplier website..." aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback"> Please provide a valid Supplier website.</div>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-row">
                      
                        <div class="col-md-10">
                          <label for="validationCustompersonname">Category</label>
                          <select class="form-control tagging" name="category_id[]" id="category_id" required onchange="drpchange(this)" multiple="multiple">
                           
                            <?php foreach ($category as $key => $value) { ?>
                              <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                            <?php } ?>
                          </select>
                          <div class="invalid-feedback"> Please Select the category </div>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 5px;">
                          <button type="button" class="btn btn-fill btn-fill-primary mt-3" data-toggle="modal" data-target=".bd-example-modal-sm-category"><span class="flaticon-add-circle-outline"></span></button>
                        </div>
                     
                    </div>
                    <div class="form-row">
                     
                        <div class="col-md-10">
                          <label for="validationCustompersonname">Product Subcategory</label>
                          <select class="form-control nested tagging" name="subcategory_id[]" id="subcategory_id" required onchange="subdrpchange(this)" multiple="multiple">
                           
                          </select>
                          <div class="invalid-feedback"> Please Select Subcategory</div>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 5px;">
                          <button type="button" class="btn btn-fill btn-fill-primary mt-3" data-toggle="modal" data-target=".bd-example-modal-sm-subcategory"><span class="flaticon-add-circle-outline"></span></button>
                        </div>
                      
                    </div>
                    <div class="form-row">
                      
                        <div class="col-md-10">
                          <label for="validationCustompersonname">Product Third subcategory</label>
                          <select class="form-control tagging" name="third_subcategory_id[]" id="third_subcategory_id" multiple="multiple">
                           
                          </select>
                          <div class="invalid-feedback"> Please select third subcategory</div>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 10px;">
                          <button type="button" class="btn btn-fill btn-fill-primary mt-3" data-toggle="modal" data-target=".bd-example-modal-sm-thirdsubcategory"><span class="flaticon-add-circle-outline"></span></button>
                        </div>
                      
                    </div>
                  </div>
                </div> 
                
              </div>
              <div class="card-footer">
                <button class="btn btn-fill btn-fill-success mr-3 float-right" type="submit">Save</button>
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
<div class="modal md-effect-12 fade bd-example-modal-sm-category" tabindex="-1" id="modal-12"  role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form class="needs-validation general-info popup_form" novalidate id="popup_form_cat">
        <input type="hidden" id="action_cat" name="action" value="popupcategory/add">
        <div class="info">
          <div class="modal-header">
            <h5 class="modal-title" id="mySmallModalLabel">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="col-md-12 mb-2">
                <label for="validationCustom01">Category Name </label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Category Name"  required name="category_name" id="category_name">
                <div class="invalid-feedback">Please provide a valid Category Name.</div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-2">
                <label for="validationCustom01">Category Description </label>
                <textarea class="form-control" placeholder="Category Description" name="category_desc"></textarea>  
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-2">
                <label for="validationCustom01">Category Image</label>
                <input type="file" id="file" class="dropify" data-default-file="" data-max-file-size="2M" name="category_image" />
                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Category Image</p>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-fill btn-fill-success mr-3 float-right cat" id="cat" type="button">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal md-effect-12 fade bd-example-modal-sm-subcategory" tabindex="-1" id="modal-12"  role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="needs-validation general-info popup_form" novalidate id="popup_form_sub_cat">
        <input type="hidden" id="action_sub_cat" name="action" value="popupcategory/subadd">
        <div class="info">
          <div class="modal-header">
            <h5 class="modal-title" id="mySmallModalLabel">Add Subcategory</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustom01">Sub Category Name </label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Category Name"  required name="sub_cat_name" id="sub_cat_name">
                    <div class="invalid-feedback"> Please provide a valid Category Name.</div>
                    <div class="valid-feedback"> Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustompersonname">Category</label>
                    <select class="form-control basic" name="category_id" id="category_id1" required>
                      <option value="">Select Category</option>
                      <?php foreach ($category as $key => $value) { ?>
                      <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                      <?php } ?>
                    </select>
                    <div class="invalid-feedback">Please Select the Category</div>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustom01">Sub Category Description </label>
                    <textarea class="form-control" placeholder="Category Description" name="sub_cat_desc"></textarea>  
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustom01">Sub Category Image</label>
                    <input type="file" id="file" class="dropify" data-default-file="" data-max-file-size="2M" name="category_image" />
                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Sub Category Image</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-fill btn-fill-success mr-3 float-right cat" id="sub_cat" type="button">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal md-effect-12 fade bd-example-modal-sm-thirdsubcategory" tabindex="-1" id="modal-12"  role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="needs-validation general-info popup_form" novalidate id="popup_form_third_sub_cat">
        <input type="hidden" id="action_third_sub_cat" name="action" value="popupcategory/thirdsubadd">
        <div class="info">
          <div class="modal-header">
            <h5 class="modal-title" id="mySmallModalLabel">Add Third sbucategory</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="name">Third Subcategory Name </label>
                    <input type="text" class="form-control" id="third_subcategory_name" required name="third_subcategory_name" placeholder="Third subcategory name...">
                    <div class="invalid-feedback">
                      Please provide a valid Third subcategory name...
                    </div>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustompersonname">Category</label>
                    <select class="form-control basic" name="category_id" id="category_id1" required onchange="drpchange1(this.value)">
                      <option>Select Category</option>
                      <?php foreach ($category as $key => $value) { ?>
                      <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                      <?php } ?>
                    </select>
                    <div class="invalid-feedback"> Please Select the Category </div>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustompersonname">Sub Category</label>
                    <select class="form-control basic" name="subcategory_id" id="subcategory_id1" required>
                       <option>Select Category</option>
                    </select>
                    <div class="invalid-feedback"> Please Select the Category </div>
                    <div class="valid-feedback">   Looks good! </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustomUsername">Description</label>
                    <div class="input-group">
                      <textarea type="text" class="form-control" name="description"  id="validationCustomEmail" placeholder="Description..." aria-describedby="inputGroupPrepend"> </textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustom01">Image</label>
                    <input type="file" id="file" class="dropify" data-default-file="" data-max-file-size="2M" name="category_image"/>
                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Image</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-fill btn-fill-success mr-3 float-right cat" id="third_sub_cat" type="button">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>