<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Test</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Test</a></li>
            <li class="active"><a href="#">Add</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
            <input type="hidden" id="action" name="action" value="test/add">
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-plus"></i> Add Test</span></h4>
                            </div>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/test/list"> <i class="fa fa-list"></i> List Test</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                          <div class="col-md-12 mb-2">
                            <label for="validationCustom01">Testing Parameter Name *</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Testing Parameter Name"  required name="test_name" id="test_name">
                            <div class="invalid-feedback">
                              Please provide a valid Testing Parameter Name.
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