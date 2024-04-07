<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Admin</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Admin</a></li>
            <li class="active"><a href="#">Profile</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      
      <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="general-info" id="form" enctype= multipart/form-data>
          <input type="hidden" id="action" name="action" value="admin/update_profile">
          <input type="hidden" id="id" name="id" value="<?php echo $profile[0]['id'] ?>">
          <div class="info">
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-user"></i> Admin Profile</span></h4>
                  </div>
                  <div class="actions align-self-center">
                    <a class="btn btn-fill btn-fill-warning mr-2" href="#"> <i class="flaticon-user-plus"></i> Profile Info</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-5">
                    <div class="upload ml-md-5 mt-4 pr-md-4">
                      <input type="file" id="file" class="dropify" data-default-file="<?php echo $profile[0]['admin_image_path'] ?>" data-max-file-size="2M" name="admin_image" />
                      <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-7 mt-md-0 mt-4">
                    <div class="form">
                      <div class="form-group">
                        <label for="admin_name">Name</label>
                        <input type="text" class="form-control mb-4" id="admin_name" name="admin_name" placeholder="" value="<?php echo $profile[0]['admin_name']?>" required="true">
                      </div>
                      <div class="form-group">
                        <label for="lastName">Email ID</label>
                        <input type="text" class="form-control mb-4" id="admin_email" name="admin_email" placeholder="" value="<?php echo $profile[0]['admin_email']?>" readonly="true" required="true">
                      </div>
                      <div class="form-group">
                        <label for="profession">Mobile Number</label>
                        <input type="text" class="form-control mb-4" id="admin_mobile" name="admin_mobile" placeholder="" value="<?php echo $profile[0]['admin_mobile']?>" required="true">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-fill btn-fill-success float-right mr-3" type="submit">Update</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>