<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Exhibition</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Exhibition</a></li>
            <li class="active"><a href="#">Update</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
            <input type="hidden" id="action" name="action" value="exhibition/update">
            <input type="hidden" id="id" name="id" value="<?php echo $exhibition['exhibition_id'] ?>">
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab fa-product-hunt"></i> Update Exhibition</span></h4>
                            </div>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/exhibition/list"> <i class="fa fa-list"></i> List Exhibition</a>
                            </div>
                        </div>
                    </div>
                                    
                    <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="validationCustom01"> Exhibition Name *</label>
                    <input type="text" class="form-control" id="validationCustom01" name="exhibition_name" placeholder="Exhibition Name" required value="<?php echo $exhibition['exhibition_name']?>">
                    <div class="invalid-feedback">
                      Please provide a valid Exhibition Name.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom01">Exhibition Venue *</label>
                    <input type="text" class="form-control" id="validationCustom01" name="exhibition_venue" placeholder="Venue" required value="<?php echo $exhibition['exhibition_venue']?>">
                    <div class="invalid-feedback">
                      Please provide a valid Exhibition Venue.
                    </div>
                  </div>
                   <div class="col-md-4">
                    <label for="validationCustom01">Exhibition City *</label>
                    <input type="text" class="form-control" id="validationCustom01" name="exhibition_city" placeholder="City" required value="<?php echo $exhibition['exhibition_city']?>">
                    <div class="invalid-feedback">
                      Please provide a valid Exhibition City.
                    </div>
                  </div>
                  
                </div>
                 <div class="form-row">
                  <div class="col-md-6">
                    <label for="validationCustom01">From Date(With Time) *</label>
                    <input type="text" class="form-control" name="from_date" value="<?php echo $exhibition['exhibition_from_date']?>" />
                    <div class="invalid-feedback">
                      Please provide a valid Exhibition From Date(With Time).
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom01">To Date(With Time) *</label>
                    <input type="text" class="form-control" name="to_date" value="<?php echo $exhibition['exhibition_to_date']?>" />
                    <div class="invalid-feedback">
                      Please provide a valid Exhibition To Date(With Time).
                    </div>
                  </div>
                  
                </div>

                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="validationCustom01">Logo</label>
                    <div class="ml-md-5 pr-md-4">
                      <input type="file" id="file" class="dropify" data-default-file="<?php echo base_url().'/'.$exhibition['exhibition_logo'] ?>" data-max-file-size="2M" name="file"  />
                      <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Image</p>
                    </div>
                  </div>
                 </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="validationCustom01">Description </label>
                    <textarea class="form-control" placeholder="Description" name="exhibition_description"><?php echo $exhibition['exhibition_description']?></textarea>  
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