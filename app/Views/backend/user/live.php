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
                        <h3>List User Live Entry</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="index-2.html"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="#">User</a></li>
                                <li class="active"><a href="#">List User Live Entry</a> </li>
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
                                        <h4>User Live Entry List </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="ecommerce-product-customers" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                
                                                <th>User Name</th>
                                                <th>Login Time</th>
                                                <th>Browser Name</th>
                                                <th class="">Ip Address</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                         foreach ($user_live as $key => $value) 
                                          { ?>
                                                
                                            <tr>
                                                <td class="customer-name-1"><?php 
                                                   $name=$this->simple->fetch_user_name($value['user_id']);
                                                  //print_r($name);
                                                  echo $name['fname'].' '.$name['lname'];
                                                  ?></td>
                                                <td><?php echo $value['log_in_date_time'] ?></td>
                                                <td><?php echo $value['browser_name'] ?></td>
                                                <td><?php echo $value['ip_address'] ?></td>
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