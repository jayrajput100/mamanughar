<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
    <div class="container">
        <div class="page-header">
          <div class="page-title">
            <h3>Faq</h3>
            <div class="crumbs">
              <ul id="breadcrumbs" class="breadcrumb">
                <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
                <li><a href="#">Faq</a></li>
                <li class="active"><a href="#">Add</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 layout-spacing col-md-12">
               <form class="needs-validation general-info" novalidate id="form">
                <input type="hidden" id="action" name="action" value="faq/add">
                    <div class="info">
                        <div class="card card-theme">
                            <div class="card-heading">
                                <div class="portlet-title portlet-warning d-flex justify-content-between">
                                    <div class="caption  align-self-center">
                                        <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab fa-rocketchat"></i> Add-Faq</span></h4>
                                    </div>
                                    <div class="actions align-self-center">
                                       <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/faq/list"> <i class="fa fa-list"></i> List Faq</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustom01">Question</label>
                                    <input type="text" class="form-control" name="question" id="validationCustom01" placeholder="Question"  required>
                                    <div class="invalid-feedback">
                                      Please provide a valid Quastion.
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustom02">Answer</label>
                                    <textarea class="form-control" name="answer" id="validationCustom02" required="true" placeholder="Answer"></textarea>
                                    <div class="invalid-feedback">
                                      Please provide a valid answer.
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustompersonname">Category</label>
                                    <select class="form-control basic" name="category_id" id="category_id" required onchange="drpchange1(this.value)">
                                      <option>Select Category</option>
                                        <?php foreach ($category as $key => $value) { ?>
                                          <option value="<?php echo $value['category_id'] ?>">
                                            <?php echo $value['category_name'] ?>
                                          </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback"> Please Select the Category </div>
                                    <div class="valid-feedback"> Looks good! </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustompersonname">Sub Category</label>
                                      <select class="form-control basic" name="subcategory_id" id="subcategory_id1" required onchange="subdrpchange1(this.value)">
                                        <option>Please Select the Category</option>
                                      </select>
                                      <div class="invalid-feedback"> Please Select the Category </div>
                                      <div class="valid-feedback">   Looks good! </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustomUsername">Third Subcategory</label>
                                    <select class="form-control basic" name="third_subcategory_id" id="third_subcategory_id1" >
                                      <option>Please Select the Sub Category</option>
                                    </select>
                                    <div class="invalid-feedback">
                                      Please Select Valid Sub - Category
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustom01">Image</label>
                                    <div class="ml-md-5 pr-md-4">
                                      <input type="file" id="file" class="dropify" data-default-file="" data-max-file-size="2M" name="category_image"/>
                                      <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Image</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustomUsername">Description</label>
                                    <div class="input-group">
                                      <textarea type="text" class="form-control" name="description"  id="validationCustomEmail" placeholder="Description..." aria-describedby="inputGroupPrepend"> </textarea>
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