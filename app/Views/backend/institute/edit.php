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
            <li class="active"><a href="#">Update</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
          <input type="hidden" id="action" name="action" value="institute/update">
          <input type="hidden" id="id" name="id" value="<?php echo $institute['institute_id'] ?>">
          <div class="info">
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Update Institute</span></h4>
                  </div>
                  <div class="actions align-self-center">
                    <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/institute/list"> <i class="fa fa-list"></i> List Institute</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="validationCustom01"> Name</label>
                    <input type="text" class="form-control" id="validationCustom01" name="institute_name" placeholder="Name" required value="<?php echo $institute['institute_name'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Name.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom01"> Type</label>
                    <select class="form-control " required name="institute_type" onchange="select_type(this.value)">
                      <option value="">Select Type</option>
                      <option value="Testing" <?php echo ($institute['institute_type']=="Testing")?"selected=true":''?>>Testing Institute</option>
                      <option value="Education" <?php echo ($institute['institute_type']=="Education")?"selected=true":''?>>Education Institute</option>
                    </select>  
                    <div class="invalid-feedback">
                      Please Select a valid Type.
                    </div>
                  </div>
                   <div id="test_or_edu" class="col-md-4">
                    <?php 
                    if($institute['institute_type']=="Testing")
                    { ?>
                     <label for="validationCustom01">Testing Parameter *</label>
                     <select class="form-control" required name="test_id" id="test_id">
                       <?php 
                        foreach ($test as $key => $value) 
                        { ?>
                          <option value="<?php echo $value['test_id'] ?>" <?php echo ($value['test_id']==$institute['test_id'])?'selected':''?>><?php echo $value['test_name'] ?></option>
                        <?php } ?>

                     </select> 
                     <div class="invalid-feedback">Please Select a valid Testing Parameter.</div>   
                    <?php } else { ?>  
                       <label for="validationCustom01">Institute Course *</label>
                       <select class="form-control" required name="ins_course" id="ins_course">
                         <option value="Diploma">Diploma</option>
                         <option value="PG-Diploma">PG. Diploma</option>
                         <option value="BE">BE/B.Tech</option>
                         <option value="ME">ME/M.Tech</option>
                         <option value="Phd">PHD</option>
                       </select> 
                    <?php } ?>
                  </div>
                </div>
                 <div class="form-row">
                  <div class="col-md-6">
                    <label for="validationCustom01"> Contact Person Name</label>
                    <input type="text" class="form-control" id="validationCustom01" name="institute_contact_person" placeholder="Contact Person Name" required value="<?php echo $institute['institute_contact_person'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Contact Person Name.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom01"> Email ID</label>
                     <input type="text" class="form-control" id="validationCustom01" name="institute_email" placeholder="Email ID" required value="<?php echo $institute['institute_email'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Email ID.
                    </div>
                  </div>
                  
                  
                </div>
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="validationCustom01"> Mobile Number</label>
                     <input type="text" class="form-control" id="validationCustom01" name="institute_mobile" placeholder="Mobile Number" required value="<?php echo $institute['institute_mobile'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Mobile Number.
                    </div>
                  </div>
                   <div class="col-md-4">
                    <label for="validationCustom01"> Phone No</label>
                     <input type="text" class="form-control mb-4" id="ph-number" name="ins_phone_no" placeholder="(999) 999-9999" value="<?php echo $institute['ins_phone_no'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Website.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom01"> Website</label>
                     <input type="text" class="form-control" id="validationCustom01" name="institute_website" placeholder="Website" required value="<?php echo $institute['institute_website'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Website.
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