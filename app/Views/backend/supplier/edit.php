<?php 

use App\Libraries\Simple;
$this->simple=new Simple();
?>
<div id="content" class="main-content">
  <div class="container">
      <div class="page-header">
        <div class="page-title">
          <h3>Supplier</h3>
          <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
              <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
              <li><a href="#">Supplier</a></li>
              <li class="active"><a href="#">Update</a></li>
            </ul>
          </div>
        </div>
      </div><!-- END Page Header -->
      <div class="row">
        <div class="col-lg-12 col-md-12 layout-spacing">
          <form class="needs-validation general-info" novalidate id="form">
          <input type="hidden" id="action" name="action" value="supplier/update">
          <input type="hidden" id="id" name="id" value="<?php print_r($supplier['id']);?>">
          <div class="info"> 
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Update Supplier</span></h4>
                  </div>
                  <div class="actions align-self-center">
                    <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/supplier/list"> <i class="fa fa-list"></i> List Supplier</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                 
                
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="validationCustom01">Supplier Name *</label>
                         <input type="text" class="form-control" id="validationCustom01" name="supplier_name" placeholder="Enter Supplier Name" required value="<?php print_r($supplier['supplier_name']);?>">
                         <div class="invalid-feedback">Please provide a valid Supplier Name</div>
                      </div>
                       <div class="form-group col-md-6">
                        <label for="validationCustom01">Contact Person Name *</label>
                          <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person Name" aria-describedby="inputGroupPrepend" required value="<?php print_r($supplier['contact_person']);?>" >
                         <div class="invalid-feedback">Please provide a valid Contact Person Name</div>
                      </div>
                    </div><!--  END First row  -->
                    <div class="form-row">
                      <div class="form-group col-md-3">
                         <label for="mobile">Mobile No. *</label>
                         <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile No." required value="<?php print_r($supplier['mobile']);?>">
                         <div class="invalid-feedback">Please provide a valid Mobile No.</div>
                      </div>
                       <div class="form-group col-md-3">
                            <label for="mobile">Alternate Mobile No.</label>
                            <input type="text" class="form-control" id="alternate_mobile" name="alternate_mobile" placeholder="Alternate Mobile No." value="<?php print_r($supplier['alternate_mobile']);?>">
                            <div class="invalid-feedback">Please provide a valid Alternate Mobile No.</div>
                      </div>
                      <div class="form-group col-md-3">
                            <label for="email">Email ID *</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID" required  value="<?php print_r($supplier['email']);?>">
                           <div class="invalid-feedback">Please provide a valid Email address</div>
                      </div>
                      <div class="form-group col-md-3">
                            <label for="email">Alternate Email ID</label>
                             <input type="email" class="form-control" id="alternate_email" name="alternate_email" placeholder="Alternate Email ID" value="<?php print_r($supplier['alternate_email']);?>">
                             <div class="invalid-feedback">Alternate Email ID</div>
                      </div>
                    </div><!--  END Second row  -->
                    <div class="form-row">
                      <div class="form-group col-md-4">
                         <label for="country_id">Country *</label>
                         <select class="form-control " required name="country_id" id="country_id" onchange="drpcountrychange(this.value)">
                            <option value="">Select Country</option>
                             <?php foreach ($country as $key => $value) { ?>
                            <?php if($value['country_id'] == $supplier['country_id']){?>
                              <option value="<?php echo $value['country_id'] ?>" selected><?php print_r($value['country_name']) ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $value['country_id'] ?>"><?php print_r($value['country_name']) ?></option>
                            <?php } ?>
                          <?php } ?>
                          </select>
                          <div class="invalid-feedback"> Please Select Country</div>
                          <div class="valid-feedback"> Looks good! </div>  
                      </div>
                      <div class="form-group col-md-4">
                         <label for="validationCustomUsername">State *</label>
                          <select class="form-control"  required name="state_id" id="state_id" onchange="drpstatechange(this.value)">
                            <option value="">Please select first country</option>
                             <?php foreach ($state as $key => $value) { ?>
                            <?php if($value['state_id'] == $supplier['state_id']){?>
                              <option value="<?php echo $value['state_id'] ?>" selected><?php print_r($value['state_name']) ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $value['state_id'] ?>"><?php print_r($value['state_name']) ?></option>
                            <?php } ?>
                          <?php } ?>
                          </select> 
                        <div class="invalid-feedback"> Please select State </div>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                      <div class="form-group col-md-4">
                             <label for="validationCustomUsername">City *</label>
                             <select class="form-control" required name="city_id" id="city_id">
                              <option value="">Please select first state</option>
                              <?php foreach ($city as $key => $value) { ?>
                              <?php if($value['city_id'] == $supplier['city_id']){?>
                                <option value="<?php echo $value['city_id'] ?>" selected><?php print_r($value['city_name']) ?></option>
                              <?php } else { ?>
                                <option value="<?php echo $value['city_id'] ?>"><?php print_r($value['city_name']) ?></option>
                              <?php } ?>
                            <?php } ?>
                             </select>
                             <div class="invalid-feedback"> Please select City</div>
                             <div class="valid-feedback"> Looks good! </div>
                      </div>
                      
                    </div><!--  END Third row  -->
                    <div class="form-row">
                      <div class="form-group col-md-6">
                         <label for="location">Location / Landmark</label>
                         <textarea type="text" rows="3" class="form-control" name="location"  id="location" placeholder="Location / Landmark" aria-describedby="inputGroupPrepend"><?php print_r($supplier['location']);?> </textarea>
                          <div class="invalid-feedback">Please provide a valid Location / Landmark</div> 
                      </div>
                      <div class="form-group col-md-6">
                         <label for="validationCustom01">Pin Code *</label>
                         <input type="text" class="form-control" id="validationCustom01" name="pin_code" placeholder="Enter Pin Code" required value="<?php print_r($supplier['pin_code']);?>">
                         <div class="invalid-feedback">Please provide a valid Pin Code</div>
                      </div>
                      
                      
                      
                    </div><!--  END Fourth row  -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="validationCustom01">Website *</label>
                          <input type="text" class="form-control" id="website" name="website" placeholder="Supplier website" aria-describedby="inputGroupPrepend" required value="<?php echo $supplier['website'] ?>">
                          <div class="invalid-feedback"> Please provide a valid Website</div>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="validationCustom01">Phone No</label>
                        
                          <input type="text" class="form-control mb-4" id="ph-number" name="phone_no" placeholder="(999) 999-9999" value="<?php echo $supplier['phone_no'] ?>">
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                    </div>  <!--  END Fifth row  -->
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="validationCustom01">Supplier Thumbnail</label>
                          
                             <div class="ml-md-5 pr-md-4">
                               <input type="file" id="file" class="dropify" data-default-file="<?php echo base_url().'/'.$supplier['supplier_image'] ?>" data-max-file-size="2M" name="supplier_image" />
                              <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Supplier Thumbnail</p>
                            </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                              <label for="business_category">Business Category *</label>
                             <select class="form-control " required name="business_category" id="business_category">
                              <option value="">Select business category</option>
                             <?php foreach ($business_category as $key => $value) { ?>
                              <?php if($key == $supplier['business_category']){?>
                                <option value="<?php print_r($key);?>" selected><?php print_r($value);?></option>
                              <?php } else { ?>
                                <option value="<?php print_r($key);?>"><?php print_r($value);?></option>
                              <?php } ?>  
                            <?php } ?>
                            </select>
                            <div class="invalid-feedback"> Please Select business category </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="validationCustompersonname">Company Status * </label>
                            <select class="form-control " required name="supplier_type">
                              <option value="">Select Company Status</option>
                               <?php foreach ($supplier_type as $key => $value) { ?>
                                <?php if($key == $supplier['supplier_type']){?>
                                  <option value="<?php print_r($key);?>" selected><?php print_r($value);?></option>
                                <?php } else { ?>
                                  <option value="<?php print_r($key);?>"><?php print_r($value);?></option>
                                <?php } ?>  
                              <?php } ?>
                            </select>
                            <div class="invalid-feedback"> Please supplier type... </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                    </div>  <!--  END Sixth row  -->
                  <?php
                    $i=0;
                    foreach ($product as $key => $v) 
                    { 
                        
                    ?>
                                              
                  
                    <div class="form-row" id="row_<?php echo $i?>">
                      <div class="form-group col-md-4">
                        <?php echo ($i==0)?'<label for="validationCustompersonname">Category *</label>':''?>
                         <input type="hidden" name="product_id[]" id="product_id_<?php echo $i ?>" value="<?php echo $v['product_id']?>">
                        <select class="form-control" name="category_id[]" id="category_id_<?php echo $i?>" required onchange="drpchange(this,0)">
                             <option value="">Please Select Category</option>
                           <?php foreach ($category as $key => $value) { ?>
                              <option value="<?php echo $value['category_id'] ?>" <?php echo ($value['category_id']==$v['category_id'])?'selected':'' ?>><?php echo $value['category_name'] ?></option>
                            <?php } ?>
                        </select>

                          <div class="invalid-feedback"> Please Select the category </div>
                          <div class="valid-feedback"> Looks good! </div>  
                       </div>
                       <div class="form-group col-md-4">
                         <?php echo ($i==0)?'<label for="validationCustompersonname">Sub Category *</label>':'' ?>
                        <select class=" form-control" name="subcategory_id[]" id="subcategory_id_<?php echo $i?>"  required onchange="subdrpchange(this,0)" data-actions-box="true">
                            <option value="">Please Select Category First</option>
                            <?php 
                              $subcategory= $this->simple->fetch_subcategory($v['category_id']);

                              foreach ($subcategory as $key => $value) { ?>
                              <option value="<?php echo $value['subcategory_id'] ?>" <?php echo ($value['subcategory_id']==$v['sub_category_id'])?'selected':'' ?>><?php echo $value['sub_cat_name'] ?></option>
                            <?php } ?>  
                        </select>
                          <div class="invalid-feedback"> Please Select the Sub Category </div>
                          <div class="valid-feedback"> Looks good! </div>  
                       </div>
                       <div class="form-group col-md-<?php echo ($i==0)?'4':'3'?>">
                          <?php echo ($i==0)?'<label for="validationCustompersonname">Product Name</label>':''?>
                        <select class=" form-control" name="third_subcategory_id[]" id="third_subcategory_id_<?php echo $i?>"  data-actions-box="true">
                         <option value="">Please Select Sub Category First</option>
                         <?php
                             $third_subcategory_id= $this->simple->fetch_third_subcategory($v['sub_category_id']);
                             foreach ($third_subcategory_id as $key => $value) { ?>
                              <option value="<?php echo $value['third_subcategory_id'] ?>" <?php echo ($value['third_subcategory_id']==$v['third_category_id'])?'selected':'' ?>><?php echo $value['third_subcategory_name'] ?></option>
                            <?php } ?>  
                             ?>
                        </select>
                          
                       </div>
                      <?php if($i!=0)
                      { ?>

                      
                       <div class="form-group col-md-1" style="margin-top:5px;">
                          <a href="javascript:void(0);" id="minus_row_<?php echo $i?>"  style="color:red" data-id="<?php echo $i?>" class="cat_row_delete"><i class="flaticon-delete-5"></i></a>   
                       </div> 
                       <?php } ?>     
                    </div><!--  END Sixth row  -->
                   <?php 
                      $i++;
                  } ?> 
                     <div id="add_row">

                    </div> 
                    <div class="form-row">
                     <button class="btn btn-primary mb-4 mr-2" type="button" id="add_new_row">Add Category Row</button>
                    </div> 
                    <br/> 
                             
              <div class="card-footer">
                <button class="btn btn-fill btn-fill-success mr-3 float-right" type="submit">Save</button>
                <button class="btn btn-fill btn-fill-warning mr-3 float-right" type="reset">Cancel</button>
              </div>               
            </div>
         </div>
        </form>   
       </div> 
      </div><!--  END row  -->
  </div><!-- END MAIN CONTAINER -->

</div><!--  END CONTENT PART  -->
   