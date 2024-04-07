<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Institute</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Institute</a></li>
            <li class="active"><a href="#">Add</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
          <input type="hidden" id="action" name="action" value="institute/add">
          <div class="info">
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Add Institute</span></h4>
                  </div>
                  <div class="actions align-self-center">
                    <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/institute/list"> <i class="fa fa-list"></i> List Institute</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-6" id="ins_name">
                    <label for="validationCustom01">Institute Name *</label>
                    <input type="text" class="form-control" id="validationCustom01" name="institute_name" placeholder="Institute Name" required>
                    <div class="invalid-feedback">
                      Please provide a valid Institute Name.
                    </div>
                  </div>
                  <div class="col-md-6" id="ins_type">
                    <label for="validationCustom01">Institute Type *</label>
                    <select class="form-control" required name="institute_type" onchange="select_type(this.value)">
                      <option value="">Select Institute Type</option>
                      <option value="Testing">Testing Institute</option>
                      <option value="Education">Education Institute</option>
                    </select>  
                    <div class="invalid-feedback">
                      Please Select a valid Type.
                    </div>
                  </div>
                  <div id="test_or_edu" class="col-md-4">
                    
                  </div>
                </div>
                 <div class="form-row">
                  <div class="col-md-6">
                    <label for="validationCustom01"> Contact Person Name *</label>
                    <input type="text" class="form-control" id="validationCustom01" name="institute_contact_person" placeholder="Contact Person Name" required>
                    <div class="invalid-feedback">
                      Please provide a valid Contact Person Name.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom01"> Email ID *</label>
                     <input type="text" class="form-control" id="validationCustom01" name="institute_email" placeholder="Email ID" required>
                    <div class="invalid-feedback">
                      Please provide a valid Email ID.
                    </div>
                  </div>
                  
                  
                </div>
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="validationCustom01"> Mobile Number *</label>
                     <input type="text" class="form-control" id="validationCustom01" name="institute_mobile" placeholder="Mobile Number" required>
                    <div class="invalid-feedback">
                      Please provide a valid Mobile Number.
                    </div>
                  </div>
                   <div class="col-md-4">
                    <label for="validationCustom01"> Phone No</label>
                     <input type="text" class="form-control mb-4"  name="ins_phone_no" placeholder="(999) 999-9999">
                    <div class="invalid-feedback">
                      Please provide a valid Website.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom01"> Website *</label>
                     <input type="text" class="form-control" id="validationCustom01" name="institute_website" placeholder="Website" required>
                    <div class="invalid-feedback">
                      Please provide a valid Website.
                    </div>
                  </div>

                </div> 
                <div class="form-row">
                          <div class="col-md-12 mb-2">
                            <label for="validationCustom01">Institute Logo</label>
                            <div class="ml-md-5 pr-md-4">
                              <input type="file" id="file" class="dropify" data-default-file="" data-max-file-size="2M" name="institute_image" />
                              <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Institute Logo</p>
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