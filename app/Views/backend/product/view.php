
<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Product</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Product</a></li>
            <li class="active"><a href="#">View</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
           
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab fa-product-hunt"></i> View Product</span></h4>
                            </div>
                            <div class="actions align-self-center">
                              <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/product/list"> <i class="fa fa-list"></i> List Product</a>
                            </div>
                        </div>
                    </div>
                                      
                   <div class="card-body">
                        <div class="row">
                          <div class="col-md-5 ml-4">
                            <div class="row">
                              <div class="col-md-5">
                                <label>Product Name :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo ($product['third_subcategory_name']!='')?$product['third_subcategory_name']:$product['sub_cat_name']?> </p>
                              </div>  
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Product Description :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $product['product_desc']?> </p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <label>Product Category :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $product['category_name']?> </p>
                              </div>
                            </div>
                             <?php 
                             if($product['third_subcategory_name']!='')
                             { ?> 
                              <div class="row">
                              <div class="col-md-5">
                                <label>Product Sub Category :</label> 
                              </div>
                              <div class="col-md-7">
                                <p> <?php echo $product['sub_cat_name']?> </p>
                              </div>
                            </div>

                             <?php } ?> 
                            
                          </div>
                          <div class="col-md-5 ml-4">

                            
                            <div class="row">
                              <div class="col-md-5">
                                <label>Product Status :</label> 
                              </div>
                               <div class="col-md-6">
                                <p> <?php echo $product['product_status'] ?> </p>
                              </div> 
                            </div>
                            <?php if($product['product_image']!='') { ?>
                            <div class="row">
                              <div class="simple col-lg-6 mb-4">
                               
                                  <p class="mb-5 s-text"><label>Category Image :</label>
                                                  </p>
                                  <!-- <img class="mr-sm-3 mr-2 usr-img" src="<?php echo base_url().'/'.$product['product_image'] ?>" alt="usr-img" width="100px;" height="100px">  -->
                                     <a class="image-popup-vertical-fit" href="<?php echo base_url().'/'.$product['product_image'] ?>">
                                                    <img alt="image-gallery" src="<?php echo base_url().'/'.$product['product_image'] ?>" class="img-fluid mb-4" width="150" height="100" >
                                                </a>
                             
                              </div>
                              
                                               
                                              
                                                
                                            
                           
                           <?php } ?>
                            
                            
                          </div>
                        </div>
                        
                    </div>  
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