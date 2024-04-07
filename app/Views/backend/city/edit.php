<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>City</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">State</a></li>
            <li class="active"><a href="#">Edit</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
            <input type="hidden" id="action" name="action" value="city/update">
            <input type="hidden" id="city_id" name="city_id" value="<?php print_r($city['city_id']);?>">
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-plus"></i> Edit City</span></h4>
                            </div>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/city/list"> <i class="fa fa-list"></i> List City</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                          <div class="col-md-12">
                            <label for="validationCustom01">City Name </label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="City Name..."  required name="city_name" id="city_name" value="<?php print_r($city['city_name']);?>">
                            <div class="invalid-feedback">
                              Please provide a valid City Name.
                            </div>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-12">
                            <label for="validationCustompersonname">Country</label>
                            <select class="form-control basic" name="country_id" id="country_id" onchange="drpcountrychange(this.value)">
                              <option value="">Select Country</option>
                              <?php foreach ($country as $key => $value) { ?>
                                <?php if($value['country_id'] == $city['country_id']){ ?>
                                  <option value="<?php echo $value['country_id'];?>" selected><?php echo $value['country_name'];?></option>
                                <?php } else { ?>
                                  <option value="<?php echo $value['country_id'];?>"><?php echo $value['country_name'];?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>
                            <div class="invalid-feedback">Please Select the Country</div>
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-12">
                            <label for="validationCustompersonname">State</label>
                            <select class="form-control basic" name="state_id" id="state_id" required>
                              <option>Select State</option>
                              <?php foreach ($state as $key => $value) { ?>
                                <?php if($value['country_id'] == $city['country_id']){ ?>
                                  <?php if($value['state_id'] == $city['state_id']){ ?>
                                    <option value="<?php echo $value['state_id'];?>" selected><?php echo $value['state_name'];?></option>
                                  <?php } else { ?>
                                    <option value="<?php echo $value['state_id'];?>"><?php echo $value['state_name'];?></option>
                                  <?php } ?>
                                <?php } ?>
                              <?php } ?>
                            </select>
                            <div class="invalid-feedback">Please Select the State</div>
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-12">
                            <label for="validationCustom01">City Description </label>
                            <textarea class="form-control" placeholder="City note" name="note"><?php print_r($city['note']);?></textarea>  
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