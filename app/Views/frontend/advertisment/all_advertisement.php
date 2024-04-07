<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<style type="text/css">
  .widget {
    padding: 0;
    margin-top: 0;
    margin-bottom: 0;
}
.widget-content.widget-content-area.product-cat1 {
    background-color: #fff;
}
.widget-content-area {
    padding: 20px;
    position: relative;
    background-color: #fff;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
    -webkit-box-shadow: 0px 2px 4px rgba(126,142,177,0.12);
    box-shadow: 0px 2px 4px rgba(126,142,177,0.12);
}
.statbox .widget-content:before, .statbox .widget-content:after {
    display: table;
    content: "";
    line-height: 0;
    clear: both;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.product-cat1 span.badge {
    background-color: #e9b02b;
    margin-left: 15px;
    box-shadow: 0px 5px 20px 0 rgba(0, 0, 0, 0.3);
    will-change: opacity, transform;
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out;
}
.badge-success {
    color: #fff;
    background-color: #1abc9c;
}
.badge {
    font-weight: 600;
    line-height: 1.4;
    padding: 3px 6px;
    font-size: 12px;
    font-weight: 600;
}
.badge-success {
    color: #fff;
    background-color: #28a745;
}
.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.product-cat1 h5 {
    color: #070b0f;
    margin-top: 47px;
    margin-left: 15px;
}
.product-cat1 h3 {
    color: #ee3d50;
    margin-left: 15px;
    font-weight: 600;
}
.product-cat1 p {
    font-size: 13px;
    margin-left: 15px;
    color: #364477;
}

[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}
 .btn {
  background-color: #f7941d;
  -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    color: #fff;
    font-weight: 600;
    font-size: 14px;
    font-size: 0.875rem;
    border: 0;
    padding: 0 25px;
    height: 50px;
    cursor: pointer;
    outline: none;
    width: 50%;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    
    margin-right: -1px;
}
.image {
    opacity: 1;
    display: block;
    height: 310px;
    object-fit: contain;
    width: 100%;
    transition: .5s ease;
    backface-visibility: hidden;
    border: 1px solid #eee;
    padding: 10px;
}
.image1 {
    opacity: 1;
    display: block;
    height: 310px;
    object-fit: contain;
    width: 100%;
    transition: .5s ease;
    backface-visibility: hidden;
   
    padding: 10px;
}
.short_info {
    position: absolute;
    left: 0;
    bottom: 0;
    background: -webkit-linear-gradient(top,transparent,#000);
    background: linear-gradient(to bottom,transparent,#000);
    width: 100%;
    padding: 45px 10px 8px 5px;
    color: #fff;
}
.back{
  background-color: orange;
    padding: 15px;
    /* bottom: 12px; */
    /* position: absolute; */
    bottom: 10;
    /* left: 0; */
    width: 100%;  
}
</style>
<main style="padding: 130px 0px;">
<?php if(isset($advertisment)) { ?>
    <?php if(is_array($advertisment) && count($advertisment) >= 1) { ?>
     <div class="bg_gray container margin_60_40">
      <div class="main_title center">
        <span><em></em></span>
        <h2>Advertisment</h2>
        
       
      </div>
    <div class="row" id="lightgallery">  
     <?php 
     foreach ($advertisment as $key => $value) 
      { ?>
         
       
     <div class="col-xl-6 col-lg-6 col-md-6 layout-spacing" style="margin-top: 15px;">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area product-cat1">
                                    <div class="row mb-4" >
                                        
                                        <div class="col-xl-12 order-xl-2 col-lg-12 col-md-12 order-md-1 col-sm-6 text-center order-sm-2 order-1 mb-sm-0 mb-4 " >
                                          <a class="image-popup-vertical-fit" href="<?= base_url($value['add_image'])?>" title="<?php echo   $simple->fetch_supplier_name($value['supplier_id']) ?>">
                                          <?php if(isset($value['add_image'])) { ?>
                                            <img alt="image-product" src="<?= base_url($value['add_image'])?>" class="image1" >
                                          <?php }else{ ?>  
                                            <img alt="image-product" src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid" style="height: 195px;width: 195px">
                                          <?php } ?>
                                         </a> 
                                         <div class="back" >   
                                          <h3 style="color:white"><?php echo   $simple->fetch_supplier_name($value['supplier_id']) ?></h3>
                                         </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
      </div>

     <?php } ?>
   </div>
   </div> 
 <?php } ?>
<?php } ?> 
</main>
<?= $this->endSection('content')?>