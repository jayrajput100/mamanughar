<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Sub Category</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Sub Category</a></li>
            <li class="active"><a href="#">Edit</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12 layout-spacing col-md-12">
            <form class="needs-validation general-info" novalidate id="form">
                <input type="hidden" id="action" name="action" value="subcategory/update">
                <input type="hidden" id="subcategory_id" name="subcategory_id" value="<?php echo $subcategory['subcategory_id'] ?>">
                <div class="info">
                    <div class="card card-theme">
                        <div class="card-heading">
                            <div class="portlet-title portlet-warning d-flex justify-content-between">
                                <div class="caption  align-self-center">
                                   <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fas fa-pencil-alt"></i> Edit Sub Category</span></h4>
                                </div>
                                <div class="actions align-self-center">
                                    <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/subcategory/list"> <i class="fa fa-list"></i> List Sub Category</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                              <div class="col-md-12">
                                <label for="validationCustom01">Sub Category Name </label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Category Name"  required name="sub_cat_name" id="sub_cat_name" value="<?php echo $subcategory['sub_cat_name'] ?>">
                                <div class="invalid-feedback">
                                  Please provide a valid Category Name.
                                </div>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-12">
                                <label for="validationCustompersonname">Category</label>
                                <select class="form-control basic" name="category_id" id="category_id" required>
                                  <option value="">Select Category</option>
                                  <?php foreach ($category as $key => $value){ ?>
                                  <option value="<?php echo $value['category_id'] ?>" <?php echo ($value['category_id']==$subcategory['category_id'])?'selected=true':''?>><?php echo $value['category_name'] ?></option>
                                  <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                  Please Select the Category
                                </div>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-12">
                                <label for="validationCustom01">Category Description </label>
                                <textarea class="form-control" placeholder="Category Description" name="sub_cat_desc" value="<?php echo $subcategory['sub_cat_desc'] ?>"><?php echo $subcategory['sub_cat_desc'] ?></textarea>  
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-12">
                                <label for="validationCustom01">Sub Category Image</label>
                                <div class="ml-md-5 mt-4 pr-md-4">
                                  <input type="file" id="file" class="dropify" data-default-file="<?php echo base_url().'/'.$subcategory['sub_cat_image_path'] ?>" data-max-file-size="2M" name="category_image" />
                                  <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Sub Category Image</p>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-fill btn-fill-success mb-4 mr-3 float-right" type="submit">Update</button>
                            <button class="btn btn-fill btn-fill-warning mb-4 mr-3 float-right" type="reset">Cancel</button>
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