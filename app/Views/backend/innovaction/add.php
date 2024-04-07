<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Innovation</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Innovation</a></li>
            <li class="active"><a href="#">Add</a></li>
          </ul>
        </div>
      </div>
    </div>
   
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
          <input type="hidden" id="action" name="action" value="innovaction/add">
          <div class="info">
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Add Innovation</span></h4>
                  </div>
                  <?php
                  if(session()->get('user_type')=="admin")
                  { ?>
                    <div class="actions align-self-center">
                    <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/innovaction/list"> <i class="fa fa-list"></i> List Innovaction</a>
                  </div>  
                  <?php } ?>  
                  
                </div>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustom01"> Title</label>
                    <input type="text" class="form-control" id="validationCustom01" name="innovaction_title" placeholder="Title" required>
                    <div class="invalid-feedback">
                      Please provide a valid Title.
                    </div>
                  </div>
                  
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="validationCustom01">Image</label>
                    <div class="ml-md-5 pr-md-4">
                      <input type="file" id="file" class="dropify" data-default-file="" data-max-file-size="2M" name="file" />
                      <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Image</p>
                    </div>
                  </div>
                 </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="validationCustom01">Description </label>
                    <textarea class="form-control" placeholder="Description" name="innovaction_description"></textarea>  
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-fill btn-fill-success mr-3 float-right" type="submit">Save</button>
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