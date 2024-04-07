<?php
use App\Libraries\Simple;
$simple=new Simple();

?> <?= $this->extend('frontend/layout/front_layout')?> <?= $this->section('content')?> <style type="text/css">
  .badge-info {
    color: #fff;
    background-color: #4d4be4;
  }

  .badge-new {
    color: #fff;
    background-color: #f8538d;
  }

  .badge {
    font-weight: 600;
    line-height: 1.4;
    padding: 3px 6px;
    font-size: 12px;
    font-weight: 600;
  }

  .mb-2,
  .my-2 {
    margin-bottom: .5rem !important;
  }

  .ml-2,
  .mx-2 {
    margin-left: .5rem !important;
  }
  .tabs_detail .nav-tabs
  {
        border-bottom: none !important;
  }
</style>
<main style="padding: 130px 0px;">
  <div class="hero_in detail_page background-image" data-background="url(<?= base_url($supplier['supplier_image'])?>)" style="background-image: url(&quot;<?= base_url($supplier['supplier_image'])?>&quot;);background-size:auto 100%;padding: 50px;
    background-origin: content-box;">
    <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0)" style="background-color: rgba(0, 0, 0, 0);">
      <div class="container">
        <div class="main_info">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6">
              <div class="head">
                <div class="score">
                  <p><span class="loc_open">Verified</span></p>
                </div>
              </div>
              <h1 style="color:#f7941d"><?php echo $supplier['supplier_name']?></h1>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-6">
              <div class="buttons clearfix">
                <span class="magnific-gallery">
                  <a href="<?= base_url($supplier['supplier_image'])?>" class="btn_hero" title="<?php echo $supplier['supplier_name']?>" data-effect="mfp-zoom-in"><i class="icon_image"></i>View Photo</a>
                </span>
              </div>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /main_info -->
      </div>
    </div>
  </div>
  <div class="container margin_detail" style="transform: none;">
    <div class="row" style="transform: none;">
      <div class="col-lg-12">
        <div class="tabs_detail">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Information</a>
            </li>
            <li class="nav-item">
              <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Gallery</a>
            </li>
             <li class="nav-item">
              <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Products</a>
            </li>
          </ul>
          <div class="tab-content" role="tablist">
            <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
              <div class="card-header" role="tab" id="heading-A">
                <h5>
                  <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A"> Information </a>
                </h5>
              </div>
              <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                <div class="card-body info_content">
               
                 
                  <div class="other_info">
                    <h2>How to get to Supplier Details</h2>

                    <div class="row">
                      <div class="col-md-4">
                        <strong>Description</strong><br>
                        <p style="text-align:justify"><?php echo !empty($supplier['supplier_description'])?$supplier['supplier_description']:'Not Yet Added Description'; ?>
                       
                        </p>
                        <br/>
                        <strong>Website</strong><br>
                        <p><a href="http://<?php echo $supplier['website'] ?>" target="_blank"><?php echo !empty($supplier['website'])?$supplier['website']:'Not Yet Added Website'; ?></a>
                       
                        </p>
                        <br/>
                        <strong>Business Category</strong><br>
                        <p><?php echo $simple->fetch_business_category_name($supplier['business_category'])  ?>
                       
                        </p>
                        

                      </div>

                      <div class="col-md-4">
                         <strong>Contact Person Name</strong><br>
                          <p><?php echo !empty($supplier['contact_person'])?$supplier['contact_person']:'Not Yet Added Contact Person Name'; ?>
                         
                          </p>
                          <strong>Address</strong><br>
                           <p class="">
                            <?php echo $supplier['location'];?><br>
                            <?php echo $simple->fetch_city_name($supplier['city_id']);?>, <?php echo $simple->fetch_state_name($supplier['state_id']);?><br>
                            India - <?php echo $supplier['pin_code']?>
                          </p>
                          <br/>
                         <?php 
                         if(count($catalog)>0)
                         { ?>
                              <a href="<?php echo base_url() ?>/<?php echo $catalog[0]['catalog_path'] ?>" class="btn_1  mb_5" target="_blank">Download Catalog</a>
                         <?php } ?>  
                      </div>
                      
                      <div class="col-xl-4 col-lg-4" id="sidebar_fixed" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                        <!-- /box_booking -->
                        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 796.172px;">
                          <div class="box_booking">
                            <div class="head">
                              <h3>Contact to Supplier</h3>
                            </div>
                            <!-- /head -->
                            <div class="main">
                              <form id="form">
                                <input type="hidden" id="action" value="emailtosupplier">
                                <input type="hidden" id="actionmsg" value="Please wait...">
                                <input type="hidden" name="supplier_name" value="<?php echo $supplier['supplier_name']?>">
                                <input type="hidden" name="supplier_email" value="<?php echo $supplier['email']?>">
                                <input type="hidden" id="supplier_id" name="supplier_id" value="<?php echo $supplier['id'] ?>">
                                <div class="form-group">
                                  <input class="form-control required error" placeholder="Subject" name="subject" required="true">
                                </div>
                                <div class="form-group">
                                  <textarea class="form-control required error" placeholder="Message" name="message" required="true"></textarea>
                                </div>
                                <button type="submit" class="btn_1 full-width mb_5">Contact Supplier</button>
                                <div class="text-center"><small>Or email us at <strong>admin@packagio.in</strong></small></div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /tab -->
            </div>
            <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-A">
              <div class="card-header" role="tab" id="heading-B">
                <h5>
                  <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="true" aria-controls="collapse-B"> Information </a>
                </h5>
              </div>
              <div class="card-body info_content">
               
                <div class="other_info">
                  <h2>Pictures from Supplier</h2>
                  <div class="magnific-gallery clearfix">
                    <div class="row"> 
                    <?php 
                    $cnt=sizeof($gallery);
                    $remaining_size=$cnt- 4;
                    foreach($gallery as $key=>$value)
                    {
                     ?> 
                      <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="strip">
                          <figure>
                          <a href="<?= base_url();?>/<?= $value['gallery_image_path'] ?>" title="<?= $value['gallery_image_name'] ?>" data-effect="mfp-zoom-in">

                            <img src="i<?= base_url();?>/<?= $value['gallery_image_path'] ?>" data-src="<?= base_url();?>/<?= $value['gallery_image_path'] ?>" class="lazy loaded" alt="" style="height:190px;object-fit:contain;"> </a>
                          
                          </figure>
                        </div>
                      </div> 
                   
                      
                  <?php   } ?> 
                    </div>
                  </div>

                 

                </div>
              </div>
            </div>
            <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
              <div class="card-header" role="tab" id="heading-C">
                <h5>
                  <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="true" aria-controls="collapse-C"> Other Products </a>
                </h5>
              </div>
              <div class="card-body info_content">
                
                <div class="other_info">
                  <h2>Products</h2>
                  <div class="magnific-gallery clearfix">
                    <div class="row"> 
                      <table class="table">
                <thead>
                  <th>Sr No.</th>
                  <th>Product Name</th>
                </thead>
                <tbody>
                 <?php
                 $i=1;
                /* print_r($product); */
                 foreach ($product as $key => $value) 
                 { ?>
                   <tr>
                     <td><?php echo $i++ ?></td>
                     <td><?php echo $simple->callback_product_name($value['third_category_id'],$value['sub_category_id']); ?></td>
                   </tr> 
                 <?php } ?> 
                </tbody>
              </table>
                    </div>
                  </div>

                 

                </div>
              </div>
              
            </div>  
            <!-- /tab-content -->
          </div>
          <!-- /tabs_detail -->
        </div>
        <!-- /col -->
      </div>
      <!-- /row -->
    </div>
</main> <?= $this->endSection('content')?>