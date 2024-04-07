  <style type="text/css">
      .ic
      {
        color: #fff;
    size: 42;
    font-size: 30px;
    font-weight: bolder;
      }
  </style>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/theme/assets/css/modules/modules-widgets.css">    
<!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Dashboard</h3>
                    </div>
                </div>
             

                <!-- CONTENT AREA -->
                 <div class="row layout-spacing ">
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                        <div class="activity-widget">
                            <div class="row">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-4 btc-balance">
                                    <div class="widget-wrapper text-center">
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                 <i class="flaticon-drugs mb-3 ic"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="widget-title">Products</p>
                                                <p class="widget-value"><?php echo $cnt_product ?></p>
                                            </div>
                                             <div class="stats col-md-12" style="color: #fff;font-size: 15px;"> 
                                                <a href="<?php echo base_url(); ?>/product/list" style="color: #ffff;text-align: center;"> <i class="fa fa-arrow-circle-right" style="color: #ffff;"></i> Go</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-4  btc-received">
                                    <div class="widget-wrapper text-center">
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                  <i class="fa fa-image mb-3 ic"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="widget-title">Gallery</p>
                                                <p class="widget-value"><?php echo count($cnt_gallery); ?>/10</p>
                                            </div>
                                             <div class="stats col-md-12" style="color: #fff;font-size: 15px;"> 
                                                <a href="<?php echo base_url(); ?>/sl/gallery/add" style="color: #ffff;text-align: center;"> <i class="fa fa-arrow-circle-right" style="color: #ffff;"></i> Go</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6  btc-total-transacts">
                                    <div class="widget-wrapper text-center">
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                  <i class="flaticon-user-11  mb-3 ic"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="widget-title">User Visited</p>
                                                <p class="widget-value"><?php echo count($supplierview); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6  innovaction">
                                    <div class="widget-wrapper text-center">
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <i class="flaticon-mail-fill mb-3 ic"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="widget-title">User Emailed</p>
                                                <p class="widget-value"><?php echo count($emaillog); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                     <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="activity-widget">
                            <div class="row">
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4 btc-sent">
                                    <div class="widget-wrapper text-center">
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                 <i class="fa fa-file mb-3 ic"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="widget-title">Catalog</p>
                                                <p class="widget-value"><?php echo count($cnt_catalog); ?>/1</p>
                                            </div>
                                             <div class="stats col-md-12" style="color: #fff;font-size: 15px;"> 
                                                <a href="<?php echo base_url(); ?>/sl/catalog/add" style="color: #ffff;text-align: center;"> <i class="fa fa-arrow-circle-right" style="color: #ffff;"></i> Go</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4 btc-iin">
                                    <div class="widget-wrapper text-center">
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                 <i class="fas fa-newspaper mb-3 ic"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="widget-title">Innovation</p>
                                                <p class="widget-value"><?php echo count($innovaction); ?></p>
                                            </div>
                                             <div class="stats col-md-12" style="color: #fff;font-size: 15px;"> 
                                                <a href="<?php echo base_url(); ?>/innovaction/list" style="color: #ffff;text-align: center;"> <i class="fa fa-arrow-circle-right" style="color: #ffff;"></i> Go</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                               
                            </div>
                         </div>       

                     </div>                 


                 </div>
                <?php 
                if($supplier['is_email_verified']=="Pending")
                {?>
                 <div class="row layout-spacing">
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        
                        <div class="widget-content widget-content-area h-100  br-4">
                            <div class="top-seller-container">
                                <div class="top-seller-header">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <p class="t-s-car-name"><?php echo $supplier['supplier_name'] ?></p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="top-seller-body">
                                    <div class="row">
                                       
                                        
                                        <div class="col-md-12 text-center mt-5">
                                            <button class="btn btn-danger btn-rounded mb-3" onclick="verify_email(<?php echo $supplier['id'] ?>,'<?php echo $supplier["email"] ?>')">
                                                Verify Email
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>   
                <?php } ?>

                  <div class="row" >
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="statbox widget box">
                            <div class="widget-header ">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Visited Your Profile </h4>
                                    </div>                 
                                </div>
                            </div>

                            <div class="widget-content-area ">

                                <div class="table-responsive new-products">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                
                                                <th>SR No.</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>User Mobile</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $i=1; 
                                           foreach ($supplierview as $key => $value) 
                                           { ?>
                                               
                                            <tr>
                                                
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value['user_name'] ?></td>
                                                <td><?php echo $value['user_email'] ?></td>
                                                <td><?php echo $value['user_mobile'] ?></td>
                                                
                                               
                                            </tr>
                                          <?php } ?>  

                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>   
              

                <!-- CONTENT AREA -->

            </div>
        </div>
        <!--  END CONTENT PART  -->
    

    </div>
    <!-- END MAIN CONTAINER -->