<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>User</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">User</a></li>
            <li class="active"><a href="#">Add</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
          <input type="hidden" id="action" name="action" value="user/update">
          <input type="hidden" id="id" name="id" value="<?php echo $user['id'] ?>">
          <div class="info">
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Add User</span></h4>
                  </div>
                  <div class="actions align-self-center">
                    <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/user/list"> <i class="fa fa-list"></i> List User</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" name="fname" placeholder="First name" required value="<?php echo $user['fname'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid First name.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" name="lname" placeholder="Last name" required value="<?php echo $user['lname'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Last name.
                    </div>
                  </div>
                   <div class="col-md-4">
                    <label for="validationCustom02">Company Name </label>
                    <input type="text" class="form-control" id="validationCustom02" name="company_name" placeholder="Company Name" value="<?php echo $user['company_name'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Last name.
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="validationCustomUsername">Email</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustomEmail" name="email" placeholder="Email" aria-describedby="inputGroupPrepend" required value="<?php echo $user['email'] ?>">
                      <div class="invalid-feedback">
                        Please provide a valid email.
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom03">Mobile</label>
                    <input type="text" class="form-control" id="validationCustomMobile" name="mobile" placeholder="Mobile" required value="<?php echo $user['mobile'] ?>">
                    <div class="invalid-feedback">
                      Please provide a valid Mobile.
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustomUsername">Gender</label>
                    <select class="form-control basic" required name="gender">
                    
                        <option value="Male" <?php echo ($user['gender']=="Male")?"selected":''?>>Male</option>
                        <option value="Female" <?php echo ($user['gender']=="Female")?"selected":''?>>Female</option>
                      
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid Mobile.
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustomUsername">Address</label>
                    <div class="input-group">
                      <textarea type="text" class="form-control" name="address"  id="validationCustomEmail" placeholder="Address" aria-describedby="inputGroupPrepend" required><?php echo $user['address'] ?></textarea>
                      <div class="invalid-feedback">
                        Please provide a valid email.
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