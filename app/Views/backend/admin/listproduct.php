<?php
use App\Libraries\Simple;
$this->simple=new Simple();
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/theme/assets/css/ecommerce/view_customers.css">
<!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>List Products</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="index-2.html"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="#">Product</a></li>
                                <li class="active"><a href="#">List Product</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Product List </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="ecommerce-product-customers" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Supplier</th>
                                                <th class="">Status</th>
                                                <th class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                        //print_r($product);
                                         foreach ($product as $key => $value) 
                                          { ?>
                                                
                                            <tr>
                                                <td class="customer-name-1"><?php echo ($value['third_subcategory_name']!='')?$value['third_subcategory_name']:$value['sub_cat_name']?></td>
                                                <td><?php echo $value['product_desc'] ?></td>
                                                <td><?php echo $this->simple->fetch_supplier_name($value['supplier_id']) ?></td>
                                                <td>
                                                   <?php 
                                                     if($value['product_status']=="Pending")
                                                     { ?>
                                                       <div class="d-flex">
                                                        <div class=" align-self-center d-m-primary  mr-1 data-marker"></div>
                                                        <span class="label label-primary">Pending</span>
                                                        </div>
                                                     <?php 
                                                       }else if($value['product_status']=="Approved")
                                                       { ?>
                                                          <div class="d-flex">
                                                            <div class=" align-self-center d-m-success  mr-1 data-marker"></div>
                                                            <span class="label label-success">Approved</span>
                                                           </div>
                                                      <?php  
                                                        }
                                                        else
                                                        { ?>
                                                             <div class="d-flex">
                                                                <div class=" align-self-center d-m-danger  mr-1 data-marker"></div>
                                                                <span class="label label-danger">Rejected</span>
                                                            </div>
                                                        <?php } ?>   
                                                    
                                                </td>
                                                <td class="">
                                                    <ul class="table-controls">
                                                        <li>
                                                            <a href="<?php echo base_url().'/'.'notification/viewproduct/'.$value['product_id'] ?>" data-toggle="tooltip" data-placement="top" title="View" >
                                                                <i class="flaticon-view"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Approved" onclick="change_status('<?php echo $value['product_id'] ?>','Approved','Approved')">
                                                                <i class="flaticon-single-tick"></i>
                                                            </a>
                                                        </li>
                                                       
                                                        <li>
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Rejected" onclick="change_status('<?php echo $value['product_id'] ?>','Rejected','Rejected')">
                                                                <i class="flaticon-square-cross"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                          <?php } ?>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT PART  -->