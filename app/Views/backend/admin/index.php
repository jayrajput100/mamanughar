<?php 
use App\Libraries\Simple;
$this->simple=new Simple();
?>
<style type="text/css">
    .t-sales-widget1 .trading-time .date-content {
    font-size: 18px;
    font-weight: 700;
    color: #ee3d50;
} 
.t-sales-widget1 .trading-time .timer-content {
    font-size: 32px;
    font-weight: 600;
    color: #3b3f5c;
}
.t-sales-widget1 .icon {
    font-size: 94px;
    vertical-align: middle;
    color: #e9ecef;
}  
.customer-name-1, .customer-name-2, .customer-name-3, .customer-name-4, .customer-name-5, .customer-name-6, .customer-name-7 {
    color: #e95f2b;
    font-weight: 600;
}
</style>

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
                    <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-sales-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-user-8"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Suppliers</p>
                                        <p class="widget-numeric-value"><?php echo $cnt_supplier; ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2" style="padding-left: 15px;"><a href="<?php echo base_url(); ?>/supplier/list" >Go <i class="flaticon-right-arrow"></i></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-order-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-drugs"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Products</p>
                                        <p class="widget-numeric-value"><?php echo $cnt_product; ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2" style="padding-left: 15px;"><a href="<?php echo base_url(); ?>/admin/listproduct" >Go <i class="flaticon-right-arrow"></i></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-customer-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-user-11"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Users</p>
                                        <p class="widget-numeric-value"><?php echo $cnt_user; ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2" style="padding-left: 15px;"><a href="<?php echo base_url(); ?>/user/list" >Go <i class="flaticon-right-arrow"></i></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-income-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-package"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Category</p>
                                        <p class="widget-numeric-value"><?php echo $cnt_category; ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2" style="padding-left: 15px;"><a href="<?php echo base_url(); ?>/category/list" >Go <i class="flaticon-right-arrow"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" style="margin-top: 15px">
                        
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-income-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="fab fa-rocketchat"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Faq</p>
                                        <p class="widget-numeric-value"><?php echo $cnt_faq; ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2" style="padding-left: 15px;"><a href="<?php echo base_url(); ?>/faq/list" >Go <i class="flaticon-right-arrow"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4" style="margin-top: 15px">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-customer-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-notes-2"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Test</p>
                                        <p class="widget-numeric-value"><?php echo $cnt_test; ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2" style="padding-left: 15px;"><a href="<?php echo base_url(); ?>/test/list" >Go <i class="flaticon-right-arrow"></i></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6" style="margin-top: 15px">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-order-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="fab fa-adversal"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Advertisment</p>
                                        <p class="widget-numeric-value"><?php echo $cnt_adv; ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2" style="padding-left: 15px;"><a href="<?php echo base_url(); ?>/advertisment/list" >Go <i class="flaticon-right-arrow"></i></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6" style="margin-top: 15px">
                        <div class="widget-content-area  data-widgets br-4">
                            <div class="widget  t-sales-widget">
                                <div class="media">
                                    <div class="icon ml-2">
                                        <i class="flaticon-notes-5"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <p class="widget-text mb-0">Exhibition</p>
                                        <p class="widget-numeric-value"><?php echo $cnt_exh; ?></p>
                                    </div>
                                </div>
                                <p class="widget-total-stats mt-2" style="padding-left: 15px;"><a href="<?php echo base_url(); ?>/exhibition/list" >Go <i class="flaticon-right-arrow"></i></a></p>
                            </div>
                        </div>
                    </div>


                 </div>   
                  <div class="row">

                    <div class="col-xl-6 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area raised-tickets p-0 br-4 h-100">
                            <div class=" table-header">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <p class="mb-0">Pending Product</p>
                                    </div>
                                    <div class="col-6 pl-0 text-right">
                                        <p class="mb-0">Action</p>
                                    </div>
                                </div>
                            </div>
                         <div class="mCustomScrollbar message-scroll" data-mcs-theme="minimal-dark">     
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>

                                        <?php 
                                        foreach ($product as $key => $value) 
                                            { 
                                              
                                             if($value['product_status']=="Pending")
                                              { 
                                            ?>
                                            
                                         
                                        <tr>
                                            <td>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <h6 class="usr-name"><?php echo ($value['third_category_id']!=0)?$this->simple->json_decode_str_third_sub_cat($value['third_category_id']):$this->simple->json_decode_str_sub_cat($value['sub_category_id']) ?></h6>
                                                        <p class="meta-info">
                                                             <span class="customer-name-1"><?php echo $this->simple->fetch_supplier_name($value['supplier_id']) ?>   - </span>
                                                            <i class="flaticon-stopwatch-1 mr-1"></i>
                                                            
                                                            <span class="meta-time"><?php echo  $this->simple->time_ago($value['date_created']) ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="action text-right">
                                                <a href="<?php echo base_url().'/'.'notification/viewproduct/'.$value['product_id'] ?>" data-toggle="tooltip" data-placement="top" title="View" >
                                                  <i class="flaticon-view-2 mb-2 t-inprogress bs-tooltip" data-placement="top" title="" data-original-title="View"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Approved" onclick="change_status('<?php echo $value['product_id'] ?>','Approved','Approved')">
                                                 <i class="flaticon-checked-1 t-solved mb-2 bs-tooltip" data-placement="top" title="" data-original-title="Approved"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Rejected" onclick="change_status('<?php echo $value['product_id'] ?>','Rejected','Rejected')">
                                                  <i class="flaticon-cancel-circle t-not-solved mb-2 bs-tooltip" data-placement="top" title="" data-original-title="Rejected"></i>
                                                </a>
                                               
                                               
                                            </td>
                                        </tr>
                                       <?php 
                                              } 
                                          } 
                                       ?>                                     
                                    </tbody>
                                </table>
                            </div>
                          </div>   
                        </div>
                    </div>

                    <!--  -->
                     <div class="col-xl-6 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area raised-tickets p-0 br-4 h-100">
                            <div class=" table-header">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <p class="mb-0">Pending Gallery Approval</p>
                                    </div>
                                    <div class="col-6 pl-0 text-right">
                                        <p class="mb-0">Action</p>
                                    </div>
                                </div>
                            </div>
                        <div class="mCustomScrollbar message-scroll" data-mcs-theme="minimal-dark">    
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>

                                        <?php 
                                        foreach ($gallery as $key => $value) 
                                            { 
                                              
                                             if($value['supplier_name']!="")
                                              { 
                                            ?>
                                            
                                         
                                        <tr>
                                            <td>
                                                <div class="media">
                                                   <img src="<?php echo base_url() ?>/<?php echo $value['gallery_image_path'] ?>" class="rounded-circle mr-4" alt="user">
                                                    <div class="media-body">
                                                        
                                                        <h6 class="usr-name"><?php echo $value['supplier_name'] ?></h6>
                                                        <p class="meta-info">
                                                           
                                                            <i class="flaticon-stopwatch-1 mr-1"></i>
                                                            
                                                            <span class="meta-time"><?php echo  $this->simple->time_ago($value['date_created']) ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="action text-right">
                                                <a href="<?php echo base_url().'/'.'gallery/viewsupplier/'.$value['gallery_id'] ?>" data-toggle="tooltip" data-placement="top" title="View" >
                                                  <i class="flaticon-view-2 mb-2 t-inprogress bs-tooltip" data-placement="top" title="" data-original-title="View"></i>
                                                </a>
                                               
                                               
                                               
                                            </td>
                                        </tr>
                                       <?php 
                                              } 
                                          } 
                                       ?>                                     
                                    </tbody>
                                </table>
                            </div>
                         </div>   
                      </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget-content-area raised-tickets p-0 br-4 h-100">
                            <div class=" table-header">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <p class="mb-0">Pending Catalog</p>
                                    </div>
                                    <div class="col-6 pl-0 text-right">
                                        <p class="mb-0">Action</p>
                                    </div>
                                </div>
                            </div>
                         <div class="mCustomScrollbar message-scroll" data-mcs-theme="minimal-dark">     
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>

                                        <?php 
                                        foreach ($catalog as $key => $value) 
                                            { 
                                              
                                             if($value['supplier_name']!="")
                                              { 
                                            ?>
                                            
                                         
                                        <tr>
                                            <td>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <h6 class="usr-name"><?php echo $value['supplier_name'] ?></h6>
                                                        <p class="meta-info">
                                                           
                                                            <i class="flaticon-stopwatch-1 mr-1"></i>
                                                            
                                                            <span class="meta-time"><?php echo  $this->simple->time_ago($value['date_created']) ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="action text-right">
                                               <a href="<?php echo base_url().'/'.'gallery/viewsuppliercatalog/'.$value['catalog_id'] ?>" data-toggle="tooltip" data-placement="top" title="View" >
                                                  <i class="flaticon-view-2 mb-2 t-inprogress bs-tooltip" data-placement="top" title="" data-original-title="View"></i>
                                                </a>
                                               
                                               
                                            </td>
                                        </tr>
                                       <?php 
                                              } 
                                          } 
                                       ?>                                     
                                    </tbody>
                                </table>
                            </div>
                          </div>   
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12 col-12 layout-spacing">
                                <div class="widget-content-area br-4 layout-spacing">
                                    <div class="widget  t-sales-widget1">
                                        <i class="flaticon-close-fill cancel-row"></i>
                                        <div class="row">
                                            <div class="col-md-7 col-sm-7 col-12">                                                
                                                <div class="trading-time mt-4">

                                                    <div class="d-flex date-content justify-content-center">
                                                        <div class="text-center">
                                                            <div id="week" class="d-inline"></div>
                                                            <div id="day" class="d-inline"> </div>
                                                            <div id="month" class="d-inline"></div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex timer-content justify-content-center mt-2">
                                                        <div id="hour" class=""></div>
                                                        <div id="minut" class=""></div>
                                                        <div id="sec" class=""></div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-12 text-center text-center">
                                                <i class="flaticon-wall-clock icon  mt-3"></i>
                                            </div>
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