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
                <li class="active"><a href="#">Update</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 layout-spacing col-md-12">
               <form class="needs-validation general-info" novalidate id="form">
                <input type="hidden" id="action" name="action" value="faq/update">
                <input type="hidden" id="faq_id" name="faq_id" value="<?php echo $faq['faq_id'];?>">
                    <div class="info">
                        <div class="card card-theme">
                            <div class="card-heading">
                                <div class="portlet-title portlet-warning d-flex justify-content-between">
                                    <div class="caption  align-self-center">
                                        <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab fa-rocketchat"></i> Update-Faq</span></h4>
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
                                    <input type="text" class="form-control" name="question" id="validationCustom01" placeholder="Question" value="<?php print_r($faq['question'])?>"  required>
                                    <div class="invalid-feedback">
                                      Please provide a valid Quastion.
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustom02">Answer</label>
                                    <textarea class="form-control" name="answer" id="validationCustom02" required="true" placeholder="Answer"><?php print_r($faq['answer'])?></textarea>
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

                                          <?php if($value['category_id'] == $faq['category_id']){ ?>
                                            <option value="<?php echo $value['category_id'] ?>" selected><?php echo $value['category_name'] ?></option>
                                          <?php } else { ?>  
                                            <option value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
                                          <?php } ?>

                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback"> Please Select the Category </div>
                                    <div class="valid-feedback"> Looks good! </div>
                                  </div>
                                </div>
                                <?php //echo "<pre>"; print_r($subcategory);?>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustompersonname">Sub Category</label>
                                      <select class="form-control basic" name="subcategory_id" id="subcategory_id1" required onchange="subdrpchange1(this.value)">>
                                         <option>Select Category</option>
                                        <?php foreach ($subcategory as $key => $value) { ?>
                                          <?php if($value['category_id'] == $faq['category_id']){?>
                                            <?php if($value['subcategory_id'] == $faq['subcategory_id']){ ?>
                                              <option value="<?php echo $value['subcategory_id'] ?>" selected><?php echo $value['sub_cat_name'] ?></option>
                                            <?php } else { ?>  
                                              <option value="<?php echo $value['subcategory_id'] ?>"><?php echo $value['sub_cat_name'] ?></option>
                                            <?php } ?>
                                          <?php } ?>
                                        <?php } ?>

                                      </select>
                                      <div class="invalid-feedback"> Please Select the Category </div>
                                      <div class="valid-feedback">   Looks good! </div>
                                  </div>
                                </div>
                                <?php //echo "<pre>"; print_r($third_subcategory);?>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustomUsername">Third Subcategory</label>
                                    <select class="form-control basic" name="third_subcategory_id1" id="third_subcategory_id" required>
                                      <option>Please Select Third Subcategory</option>
                                      <?php foreach ($third_subcategory as $key => $value) { ?>
                                        <?php if($value['category_id'] == $faq['category_id']){?>
                                          <?php if($value['subcategory_id'] == $faq['subcategory_id']){ ?>
                                            <?php if($value['third_subcategory_id'] == $faq['third_subcategory_id']){ ?>
                                              <option value="<?php echo $value['third_subcategory_id'] ?>" selected><?php echo $value['third_subcategory_name'] ?></option>
                                            <?php } else { ?>  
                                              <option value="<?php echo $value['third_subcategory_id'] ?>"><?php echo $value['third_subcategory_name'] ?></option>
                                            <?php } ?>
                                          <?php } ?>
                                        <?php } ?>
                                      <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">Please Select Valid Third Subcategory</div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustom01">Image</label>
                                    <div class="ml-md-5 pr-md-4">
                                      <input type="file" id="file" class="dropify" data-default-file="<?php echo base_url().'/'.$faq['image_path'] ?>" data-max-file-size="2M" name="category_image" />
                                      <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Image</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12">
                                    <label for="validationCustomUsername">Description</label>
                                    <div class="input-group">
                                      <textarea type="text" class="form-control" name="description"  id="validationCustomEmail" placeholder="Description..." aria-describedby="inputGroupPrepend"><?php print_r($faq['description'])?> </textarea>
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