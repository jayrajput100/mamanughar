<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Profile</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Profile</a></li>
            <li class="active"><a href="#">Change Password</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
            <input type="hidden" id="action" name="action" value="sl/chgpass">
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-plus"></i> Change Password</span></h4>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                          <div class="col-md-12 mb-2">
                            <label for="validationCustom01">Password</label>
                            <input type="password" class="form-control" id="validationCustom01" placeholder="Password"  required name="password" id="password" >
                            <div class="invalid-feedback">
                              Please provide a valid Password.
                            </div>
                          </div>
                          <div class="col-md-12 mb-2">
                            <label for="validationCustom01">Confirm Password</label>
                            <input type="password" class="form-control" id="validationCustom01" placeholder="Confirm Password"  required name="conf_password" id="conf_password">
                            <div class="invalid-feedback">
                              Please provide a valid Confirm Password.
                            </div>
                          </div>
                        </div>
                        
                       
                    </div>  
                    <div class="card-footer">
                        <button class="btn btn-fill btn-fill-success mr-3 float-right" type="submit" id="chg_pas">Update Password</button>
                        <a href="<?php echo previous_url() ?>" name="cancel" class="btn btn-fill btn-fill-warning mr-3 float-right">Cancel</a>
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