<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Product</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Product</a></li>
            <li class="active"><a href="#">Add</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form" enctype="multipart/form-data">
            <input type="hidden" id="action" name="action" value="product/add">
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-plus"></i> Add Product</span></h4>
                            </div>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/product/list"> <i class="fa fa-list"></i> List Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                       

                        <div class="form-row">
                          <div class="col-md-12 mb-2">
                            <label for="validationCustompersonname">Category</label>
                            <?php //qprint_r($category); ?>
                            <select class="form-control " name="category_id" id="category_id" required onchange="drpchange1(this.value)" >
                              <option value="">Please Select Category</option>
                             <?php 
                              $category_id=session()->get('category_id'); 
                              
                               foreach ($category as $key => $value) 
                                { 
                                 
                                  ?>
                                    <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                              <?php 
                                 } 
                              ?>
                            </select>
                            <div class="invalid-feedback"> Please Select the category </div>
                            <div class="valid-feedback"> Looks good! </div> 
                          </div>
                        </div>
                         
                        <div class="form-row">
                          <label for="validationCustompersonname">Product Sub Category</label>
                          <select class="form-control " name="subcategory_id" id="subcategory_id" required onchange="subdrpchange(this.value)">
                            <option value="">Please Select Category</option>
                          </select> 
                          <div class="invalid-feedback"> Please Select Subcategory</div>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="form-row">
                         <label for="validationCustompersonname">Product Third Subcategory</label>
                          <select class="form-control " name="third_subcategory_id" id="third_subcategory_id">
                             <option value="">Please Select Sub Category</option>
                          </select>
                          <div class="invalid-feedback"> Please select third subcategory</div>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>    
                         <!--  <div class="form-row">
                          <div class="col-md-12 mb-2">
                            <label for="validationCustom01">Product Description </label>
                            <textarea class="form-control" placeholder="Product Description" name="product_desc"></textarea>  
                            <div class="valid-feedback"> Looks good! </div>
                          </div>
                        </div> -->
                          
                        <div class="form-row">
                          <div class="col-md-12 mb-2">
                            <!-- <label for="validationCustom01">Product Image</label>
                            <div class="ml-md-5 pr-md-4">
                              <input type="file" id="file" class="dropify" data-default-file="" data-max-file-size="2M" name="product_image" multiple/>
                              <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Product Image</p>
                            </div>
                            <div class="valid-feedback"> Looks good! </div> -->
                       
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