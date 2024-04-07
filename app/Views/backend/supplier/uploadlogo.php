
<div id="content" class="main-content">
  <div class="container">
      <div class="page-header">
        <div class="page-title">
          <h3>Supplier</h3>
          <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
              <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
              <li><a href="#">Supplier</a></li>
              <li class="active"><a href="#">Upload Logo</a></li>
            </ul>
          </div>
        </div>
      </div><!-- END Page Header -->
      <div class="row">
        <div class="col-lg-12 col-md-12 layout-spacing">
          <form class="needs-validation general-info" novalidate id="form">
           <input type="hidden" id="action" name="action" value="sl/upload"> 
           <input type="hidden" id="id" name="id" value="<?php echo $supplier['id'] ?>">
          <div class="info"> 
            <div class="card card-theme">
              <div class="card-heading">
                <div class="portlet-title portlet-warning d-flex justify-content-between">
                  <div class="caption  align-self-center">
                    <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="flaticon-user-plus"></i> Upload Supplier Logo</span></h4>
                  </div>
                  
                </div>
              </div>
              <div class="card-body">
                 <div class="col-lg-4 col-md-5">
                    <div class="upload ml-md-5 mt-4 pr-md-4">
                      <input type="file" id="file" class="dropify" data-default-file="<?php echo base_url($supplier['supplier_image']) ?>" data-max-file-size="1M" name="supplier_image" />
                      <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Supplier Logo</p>
                    </div>
                  </div>
                
                     
                    
                             
                             
            </div>
            <div class="card-footer">
                <button class="btn btn-fill btn-fill-success mr-3 float-right" type="submit">Save</button>
                <a href="<?php echo previous_url() ?>" name="cancel" class="btn btn-fill btn-fill-warning mr-3 float-right">Cancel</a>
              </div>
         </div>
        </form>   
       </div> 
    </div><!--  END row  -->
  </div><!-- END MAIN CONTAINER -->

</div><!--  END CONTENT PART  -->
</div>
<!-- END MAIN CONTAINER -->