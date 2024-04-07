<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Advertisment</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Advertisment</a></li>
            <li class="active"><a href="#">Add</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
          <input type="hidden" id="action" name="action" value="advertisment/update">
          <input type="hidden" id="add_id" name="add_id" value="<?php echo $advertisment['add_id'] ?>">
          <div class="info">
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Add Advertisment</span></h4>
                  </div>
                  <div class="actions align-self-center">
                    <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/advertisment/list"> <i class="fa fa-list"></i> List Advertisment</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="validationCustom01"> Title *</label>
                    <input type="text" class="form-control" id="validationCustom01" name="title" value="<?php print_r($advertisment['title'])?>" placeholder="Title" required>
                    <div class="invalid-feedback">
                      Please provide a valid Title.
                    </div>
                  </div>
                   <div class="col-md-6">
                    <label for="validationCustom01"> Supplier *</label>
                      <select class="form-control" name="supplier_id" required="true"> 
                       <option value="">Please Select Supplier</option>
                      <?php 
                        foreach ($supplier as $key => $value) 
                        { ?>
                           <option value="<?php echo $value['id'] ?>" <?php echo ($value['id']==$advertisment['supplier_id'])?'selected':'' ?>><?php echo $value['supplier_name'] ?></option>
                       <?php  } 
                      ?> 
                      </select>

                    <div class="invalid-feedback">
                      Please Select a valid Supplier.
                    </div>
                  </div>
                </div>
                  <div class="form-row">
                  <div class="col-md-6">
                    <label for="validationCustom01">From Date(With Time) *</label>
                    <input type="text" class="form-control" name="from_date" value="<?php echo $advertisment['start_date'] ?>" />
                    <div class="invalid-feedback">
                      Please provide a valid Exhibition From Date(With Time).
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom01">To Date(With Time) *</label>
                    <input type="text" class="form-control" name="to_date" value="<?php echo $advertisment['end_date'] ?>" />
                    <div class="invalid-feedback">
                      Please provide a valid Exhibition To Date(With Time).
                    </div>
                  </div>
                  
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label for="validationCustom01">Image</label>
                    <div class="ml-md-5 mt-4 pr-md-4">
                      <input type="file" id="file" class="dropify" data-default-file="<?php echo base_url().'/'.$advertisment['add_image'] ?>" data-max-file-size="2M" name="name" />
                      <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload advertisment image</p>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="validationCustom01">Description </label>
                    <textarea class="form-control" placeholder="Description" name="description"><?php print_r($advertisment['description'])?></textarea>  
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