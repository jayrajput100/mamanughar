<?php 

use App\Libraries\Simple;
$this->simple=new Simple();
?>
<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Supplier</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Supplier</a></li>
            <li class="active"><a href="#">View</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12 general-info">
        
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab flaticon-user-8"></i> View Supplier</span></h4>
                            </div>
                            <form method="post" action="<?php echo base_url().'/supplier/edit'?>" style="margin-right: -510px;">
                                  <input type="hidden" name="id" value="<?php echo $supplier['id'] ?>">
                                  <button type="submit" class="btn btn-fill btn-fill-warning mr-2"><i class="fas fa-pencil-alt"></i> Edit Supplier</button>
                                </form> 
                            <div class="actions align-self-center">
                              <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/supplier/list"> <i class="fa fa-list"></i> List Supplier</a>
                            </div>
                        </div>
                    </div>
                                      
                    <div class="card-body">
                      <ul class="nav nav-tabs  mb-4 " id="vValidation" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link nav-item active btn-rounded" id="rounded-pills-home-tab4" data-toggle="tab" href="#simple-ex-2-1" role="tab"  aria-selected="false"><i class="flaticon-home-fill-1"></i> Personal Information</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link nav-item btn-rounded" id="rounded-pills-profile-tab4" data-toggle="tab" href="#simple-ex-2-2" role="tab" aria-selected="true"><i class="fa fa-image"></i> Gallery</a>

                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link nav-item btn-rounded" id="ronded-pills-contact-tab4" data-toggle="tab" href="#simple-ex-2-3" role="tab" aria-selected="false"><i class="fa fa-file"></i> Catalog</a>
                                            </li>
                      </ul>
                      <div class="tab-content form-valid" id="vValidationContent">
                        <div class="tab-pane fade show active" id="simple-ex-2-1" role="tabpanel">
                         <div class="row">
                          <div class="col-md-5 ml-4">
                            <div class="row">
                              <div class="col-md-5">
                                <label>Name :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['supplier_name']?> </p>
                              </div>  
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <label>Contact person :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['contact_person']?> </p>
                              </div>
                            </div>

                          

                            <div class="row">
                              <div class="col-md-5">
                                <label>Mobile :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['mobile']?> </p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Alternate Mobile :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['alternate_mobile']?> </p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Email :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['email']?> </p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Alternate Email ID :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['alternate_email']?> </p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Phone No :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['phone_no']?> </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 ml-4">

                            <div class="row">
                              <div class="col-md-5">
                                <label>Location :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['location']?> </p>
                              </div> 
                            </div>
                           
                            <div class="row">
                              <div class="col-md-5">
                                <label>State :</label> 
                              </div>
                              <div class="col-md-7">
                                <?php foreach ($city as $key => $value) { ?>
                                  <?php if($value['city_id'] == $supplier['city_id']){?>
                                    <p> <?php echo $value['city_name'];?> </p>
                                  <?php } ?>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>State :</label> 
                              </div>
                              <div class="col-md-7">
                                <?php foreach ($state as $key => $value) { ?>
                                  <?php if($value['state_id'] == $supplier['state_id']){?>
                                    <p> <?php echo $value['state_name'];?> </p>
                                  <?php } ?>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Country :</label> 
                              </div>
                              <div class="col-md-7">
                                <?php foreach ($country as $key => $value) { ?>
                                  <?php if($value['country_id'] == $supplier['country_id']){?>
                                    <p><?php echo $value['country_name'];?> </p>
                                  <?php } ?>
                                <?php } ?>
                              </div>
                            </div>
                             <div class="row">
                              <div class="col-md-5">
                                <label>Pin Code :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['pin_code']?> </p>
                              </div> 
                            </div>
                          </div>
                         </div>
                         <div class="row mt-5">
                          <div class="col-md-5 ml-4">
                            <div class="row">
                              <div class="col-md-5">
                                <label>Business Category :</label> 
                              </div>
                              <div class="col-md-7">
                                <?php foreach ($business_category as $key => $value) { ?>
                                  <?php if($key == $supplier['business_category']){?>
                                    <p> <?php echo $value?> </p>
                                  <?php } ?>
                                <?php } ?>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <label>Supplier Type :</label> 
                              </div>
                              <div class="col-md-7">
                                <?php foreach ($supplier_type as $key => $value) { ?>
                                  <?php if($key == $supplier['supplier_type']){?>
                                    <p> <?php echo $value?> </p>
                                  <?php } ?>
                              <?php } ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Supplier website :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $supplier['website']?> </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 ml-4">
                            <div class="row">
                              <div class="col-md-5">
                                <label>Product Category:</label> 
                              </div>
                              <div class="col-md-7">
                                 <?php
                                   $cat_name=[]; 
                                   foreach (json_decode($supplier['category_id'],true) as $key => $value) 
                                   {
                                     $cat_name[]=$this->simple->json_decode_str_cat($value);

                                   }     
                                 ?>
                                <!--   <p><?php echo  implode(",",$cat_name); ?></p> -->
                                <p>
                                <?php 
                                foreach (array_unique($cat_name) as $key => $value) 
                                 { ?>
                                  <span class="mb-2 ml-2 badge badge-new"><?php echo $value ?></span>
                                  <?php } ?>
                                 </p>
                              </div>
                            </div>
                            
                           <!--  -->
                          </div>
                          <div class="col-md-5 ml-4">
                            <div class="row">
                              <div class="col-md-5">
                                <label>Product Sub Category:</label> 
                              </div>
                              <div class="col-md-7">
                                 <?php
                                   $sub_cat_name=[]; 
                                   foreach (json_decode($supplier['subcategory_id'],true) as $key => $value) 
                                   {
                                   
                                    $sub_cat_name[]=$this->simple->json_decode_str_sub_cat($value); 
                                     /*foreach ($value as $k => $v) 
                                     {
                                       
                                     }*/
                                     

                                   }    
                                 ?>
                                 <p>
                                <?php 
                                 foreach (array_unique($sub_cat_name) as $key => $value) 
                                  { ?>
                                  <span class="mb-2 ml-2 badge badge-new"><?php echo $value ?></span>
                                  <?php } ?>
                                 </p>
                                <!--   <p><?php echo  implode(",",$cat_name); ?></p> -->
                                
                              </div>
                            </div>
                            
                           <!--  -->
                          </div>
                        </div> 
                        </div>
                        <div class="tab-pane fade" id="simple-ex-2-2" role="tabpanel">
                          <div class="row">
                            <?php

                             if(is_array($gallery) && count($gallery)>0)
                             { 
                              foreach ($gallery as $key => $value) 
                              { ?>
                               
                              <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-4">
                                                <div class="contact-1 text-center">
                                                    
                                                    <div class="card-mid-section mb-4">
                                                       
                                                        <div class="team-content mb-4">
                                                          <div class="usr-profile mx-auto">
                                                             <img alt="admin-profile" src="<?php echo base_url() ?>/<?php echo $value['gallery_image_path'] ?>" class="rounded-circle">
                                                          </div>   
                                                        </div>
                                                    </div>
                                                    <div class="card-bottom-section">
                                                        <div class="social-media">
                                                          <?php 
                                                            if($value['gallery_status']=="Pending")
                                                            { ?>

                                                              
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    
                                                                    <div class="social-counts" onclick="change_gallery_status('<?php echo $value['gallery_id'] ?>','Approved','Approved')">
                                                                       <i class="icon-behance flaticon-single-tick mb-4"></i>
                                                                        <p>Accept</p>
                                                                    </div>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                   
                                                                    <div class="social-counts" onclick="change_gallery_status('<?php echo $value['gallery_id'] ?>','Rejected','Rejected')">
                                                                        <i class="icon-dribbble flaticon-square-cross mb-4"></i>
                                                                        <p>Reject</p>
                                                                    </div>
                                                                </li>
                                                                
                                                            </ul>
                                                          <?php } else if($value['gallery_status']=="Approved") { ?>
                                                           <ul class="list-inline">
                                                                
                                                                <li class="list-inline-item">
                                                                   
                                                                    <div class="social-counts" onclick="change_gallery_status('<?php echo $value['gallery_id'] ?>','Rejected','Rejected')">
                                                                        <i class="icon-dribbble flaticon-square-cross mb-4"></i>
                                                                        <p>Reject</p>
                                                                    </div>
                                                                </li>
                                                                
                                                            </ul>
                                                        <?php  } else { ?>
                                                         <ul class="list-inline">
                                                                
                                                                <li class="list-inline-item">
                                                                    
                                                                    <div class="social-counts" onclick="change_gallery_status('<?php echo $value['gallery_id'] ?>','Approved','Approved')">
                                                                       <i class="icon-behance flaticon-single-tick mb-4"></i>
                                                                        <p>Accept</p>
                                                                    </div>
                                                                </li>
                                                                
                                                            </ul>  
                                                      <?php  } ?>
                                                        </div>
                                                    </div>
                                                </div>
                              </div>
                             <?php 
                             } 
                            }
                          ?>
                          </div> 
                        </div>
                        <div class="tab-pane fade" id="simple-ex-2-3" role="tabpanel">
                          <div class="row">
                            <?php

                             if(is_array($catalog) && count($catalog)>0)
                             { 
                              foreach ($catalog as $key => $value) 
                              { ?>
                               
                              <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-4">
                                                <div class="contact-1 text-center">
                                                    
                                                    <div class="card-mid-section mb-4">
                                                       
                                                        <div class="team-content mb-4">
                                                          <div class="usr-profile mx-auto">
                                                            <?php echo $value['catalog_name'] ?>
                                                          </div>   
                                                        </div>
                                                    </div>
                                                    <div class="card-bottom-section">
                                                        <div class="social-media">
                                                           <?php 
                                                            if($value['catalog_status']=="Pending")
                                                            { ?>
                                                            <ul class="list-inline">
                                                              <li class="list-inline-item">
                                                                    
                                                                    <div class="social-counts" >
                                                                    <a href="<?php echo base_url() ?>/<?php echo $value['catalog_path'] ?>" target="_blank">  
                                                                      <i class="icon-behance flaticon-download mb-4"></i></a>
                                                                        <p>Download</p>
                                                                    </div>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    
                                                                    <div class="social-counts" onclick="change_catalog_status('<?php echo $value['catalog_id'] ?>','Approved','Approved')">
                                                                       <i class="icon-behance flaticon-single-tick mb-4"></i>
                                                                        <p>Accept</p>
                                                                    </div>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                   
                                                                    <div class="social-counts" onclick="change_catalog_status('<?php echo $value['catalog_id'] ?>','Rejected','Rejected')">
                                                                        <i class="icon-dribbble flaticon-square-cross mb-4"></i>
                                                                        <p>Reject</p>
                                                                    </div>
                                                                </li>
                                                                
                                                            </ul>
                                                           <?php } else if($value['catalog_status']=="Rejected") { ?>
                                                             <ul class="list-inline">
                                                              <li class="list-inline-item">
                                                                    
                                                                    <div class="social-counts" >
                                                                    <a href="<?php echo base_url() ?>/<?php echo $value['catalog_path'] ?>" target="_blank">  
                                                                      <i class="icon-behance flaticon-download mb-4"></i></a>
                                                                        <p>Download</p>
                                                                    </div>
                                                                </li>
                                                                 <li class="list-inline-item">
                                                                    
                                                                    <div class="social-counts" onclick="change_catalog_status('<?php echo $value['catalog_id'] ?>','Approved','Approved')">
                                                                       <i class="icon-behance flaticon-single-tick mb-4"></i>
                                                                        <p>Accept</p>
                                                                    </div>
                                                                </li>
                                                              
                                                             </ul> 
                                                          <?php  } else
                                                          { ?>
                                                          <ul class="list-inline">
                                                              <li class="list-inline-item">
                                                                    
                                                                    <div class="social-counts" >
                                                                    <a href="<?php echo base_url() ?>/<?php echo $value['catalog_path'] ?>" target="_blank">  
                                                                      <i class="icon-behance flaticon-download mb-4"></i></a>
                                                                        <p>Download</p>
                                                                    </div>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                   
                                                                    <div class="social-counts" onclick="change_catalog_status('<?php echo $value['catalog_id'] ?>','Rejected','Rejected')">
                                                                        <i class="icon-dribbble flaticon-square-cross mb-4"></i>
                                                                        <p>Reject</p>
                                                                    </div>
                                                                </li>
                                                          </ul>  
                                                         <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                              </div>
                             <?php 
                             } 
                            }
                          ?>
                          </div> 
                        </div>   
                      </div>  
                        
                    </div>  
                </div>
            </div>
      
      </div>
    </div>
  </div>
</div>
<!--  END CONTENT PART  -->
</div>
<!-- END MAIN CONTAINER -->