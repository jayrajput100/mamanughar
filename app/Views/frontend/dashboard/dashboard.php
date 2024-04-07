<?php
use App\Libraries\Simple;
$simple=new Simple();
$fetch_all_city=$simple->fetch_all_city();

?>
<?= $this->extend('frontend/layout/front_layout')?>
<!--  BEGIN MAIN CONTAINER  -->
<?= $this->section('content')?>
<style type="text/css">
    .custom-search-input input[type='submit']{
        background-color: #f7941d;
        height: 140%;
    }
    
  .select2-container{
    width: 240px !important;
  }
  .custom-search-input {
    padding: 10px 20px 10px 0px;
    border: 2px solid #f1941e;
    
  }
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
    -webkit-box-shadow: 0px 2px 4px rgba(126, 142, 177, 0.12);
    box-shadow: 0px 2px 4px rgba(126, 142, 177, 0.12);
  }

  .statbox .widget-content:before,
  .statbox .widget-content:after {
    display: table;
    content: "";
    line-height: 0;
    clear: both;
  }

  .mb-4,
  .my-4 {
    margin-bottom: 1.5rem !important;
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
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
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

  [type=button]:not(:disabled),
  [type=reset]:not(:disabled),
  [type=submit]:not(:disabled),
  button:not(:disabled) {
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
    background: -webkit-linear-gradient(top, transparent, #000);
    background: linear-gradient(to bottom, transparent, #000);
    width: 100%;
    padding: 45px 10px 8px 5px;
    color: #fff;
  }

  .select2-container {
    font-size: 20px;
    margin-top: 20px;
    font-weight: 500;
  }
    
  .select2-container--default .select2-selection--single {
    background-color: #354454;
    border: none;
    border-radius: 1px;
    
  }
  .select2-selection__rendered{
    color: #fff !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: #fff transparent transparent transparent;
  }
  .back {
    background-color: orange;
    padding: 15px;
    /* bottom: 12px; */
    /* position: absolute; */
    bottom: 10;
    /* left: 0; */
    width: 100%;
  }
</style>
<main>
  <div class="hero_single version_2" style="background: #f6f1d3  center center no-repeat;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">
    <div class="opacity-mask" style="background-color:#f6f1d3 !important;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-12 col-md-8">
            <h1>Find Your Packaging</h1>
            <p></p>
            <form method="post" action="<?php echo base_url('/home/search_result');?>">
              <div class="row no-gutters custom-search-input" >

                <div class="col-lg-4" style="background-color: #354454;
                    border-top-left-radius: 50px;
                    border-bottom-left-radius: 50px;
                    margin-top: -10px;
                    margin-bottom: -10px;">
                  <select class="required wide js-example-responsive custom_select" name="city_id" id="city_id">
                    <option value="All">All City</option>
                    <?php foreach ($fetch_all_city as $key => $value) { ?>
                    <option value="<?php echo $value['city_id'] ?>"><?php echo $value['city_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control" name="search_query" type="text" id="autocomplete-dynamic" placeholder="Search Any Product OR Category ..." required="true">
                    <input type="hidden" name="search_type" id="search_type">
                    <input type="hidden" name="search_value" id="search_value">

                    <i class="icon_search"></i>
                  </div>
                </div>
                <!--  -->

                <div class="col-lg-2">
                  <input type="submit" value="Search">
                </div>
              </div>
              <!-- /row -->
            </form>
          </div>
        </div>
        <!-- /row -->
      </div>
    </div>
    <div class="wave hero"></div>
  </div>
  <!-- /hero_single -->
  <?php if(isset($categorydata)) { ?>
  <?php if(is_array($categorydata) && count($categorydata) >= 1) { ?>
  <div class="bg_gray">
    <div class="container margin_60_40">
      <div class="main_title center">
        <span><em></em></span>
        <h2>Popular Categories</h2>
      
      </div>
      <div class="row">
        <?php foreach ($categorydata as $key => $value) { ?>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
          <div class="strip">
            <figure style="height: 232px !important;">

              <img src="<?php echo base_url($value['category_image_path'])  ?>" data-src="<?php echo base_url($value['category_image_path'])  ?>" class="img-fluid lazy loaded" alt="" data-was-processed="true">
              <a href="<?php echo base_url() .'/category/subcategory/'.$value['category_id'] ?>" class="strip_info">

                <div class="item_title">
                  <h3><?php echo $value['category_name'] ?></h3>

                </div>
              </a>
            </figure>

          </div>
        </div>
        <?php  }  ?>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php } ?>
 <?php if(isset($advertisment)) { ?>
  <?php if(is_array($advertisment) && count($advertisment) >= 1) { ?>
  <div class="bg_gray container margin_60_40">
    <div class="main_title center">
      <span><em></em></span>
      <h2>Advertisment</h2>
      <a href="<?php echo base_url('/all_advertisement') ?>">View All</a>
    </div>
    <?php //echo "<pre>"; print_r($advertisment); ?>
    <div class="row" id="carousel-home1">
      <div class="owl-carousel owl-theme carousel_4 owl-loaded owl-drag jx" id="owl-carousel1">
        <div class="owl-stage-outer">
          <div class="owl-stage" >
            <?php foreach ($advertisment as $key => $value) { ?>
            <?php //if($key==0){?>
            <div class="col-xl-3 col-lg-3 col-md-3 layout-spacing owl-item">
              <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area product-cat1">
                  <div class="row">
                    <div class="col-xl-12 order-xl-2 col-lg-12 col-md-12 order-md-1 col-sm-6 order-sm-2 order-1 mb-sm-0">
                      <a class="image-popup-vertical-fit" href="<?= base_url($value['add_image'])?>" title="<?php echo   $simple->fetch_supplier_name($value['supplier_id']) ?>">
                        <?php if(isset($value['add_image'])) { ?>
                        <img alt="image-product" src="<?= base_url($value['add_image'])?>" class="image1" style="height:350px !important">
                        <?php }else{ ?>
                        <img alt="image-product" src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid" style="height: 195px;width: 195px">
                        <?php } ?>
                      </a>
                        <div class="post_info">
                        <h3 class="text-center"><?php print_r($value['title']); ?></h3>
                        <p class="addReadMore showlesscontent" style="text-align:justify"><?php print_r($value['description']); ?></p>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php //} ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php } ?>

  <?php if(isset($exhibition) || isset($upcoming_exhibition)) { ?>
  <?php if((is_array($exhibition) && count($exhibition) >= 1) || (is_array($upcoming_exhibition) && count($upcoming_exhibition) >= 1)) { ?>
  <div class="container margin_60_40">
    <div class="main_title center">
      <span><em></em></span>
      <h2>Exhibitions</h2>
      <p>Ongoing/Upcoming Exhibitions</p>
      <a href="<?php echo base_url('/all_exhibition') ?>">View All</a>
    </div>
    <div id="carousel-home">
      <div class="owl-carousel owl-theme carousel_4 owl-loaded owl-drag">

        <div class="owl-stage-outer">
          <div class="owl-stage" style="transform: translate3d(-317px, 0px, 0px); transition: all 0.25s ease 0s; width: 2223px;">

            <?php foreach ($exhibition as $key => $value) { ?>
            <div class="owl-item active" style="width: 297.5px; margin-right: 20px;">
              <div class="item">
                <div class="strip">
                  <figure>
                    <?php if(isset($value['exhibition_logo'])) { ?>
                    <img src="<?= base_url($value['exhibition_logo'])?>" data-src="<?= base_url($value['exhibition_logo'])?>" class="owl-lazy" alt="" style="opacity: 1;">
                    <?php } else{  ?>
                    <img alt="image-product" src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid" style="height:195px;width:195px;">
                    <?php } ?>
                    <a href="<?php echo base_url().'/front/exhibition/'.$value['exhibition_id'] ?>" class="strip_info">

                      <div class="item_title">
                        <h3><?php echo $value['exhibition_name'] ?>111</h3>
                        <small><?php echo $simple->str_to_date($value['exhibition_from_date'])   .' - '.  $simple->str_to_date($value['exhibition_to_date']) ?></small>
                      </div>
                    </a>
                  </figure>
                  <ul>
                    <li><span class="loc_open">Ongoing</span></li>
                    <li>
                      <div class="score"><span><?php echo $value['exhibition_city']  ?></span></div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php foreach ($upcoming_exhibition as $key => $value) { ?>
            <div class="owl-item active" style="width: 297.5px; margin-right: 20px;">
              <div class="item">
                <div class="strip">
                  <figure>
                    <?php if(isset($value['exhibition_logo'])) { ?>
                    <img src="<?= base_url($value['exhibition_logo'])?>" data-src="<?= base_url($value['exhibition_logo'])?>" class="owl-lazy" alt="" style="opacity: 1;">
                    <?php } else{  ?>
                    <img alt="image-product" src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid" style="height: 195px;width:195px">
                    <?php } ?>
                    <a href="<?php echo base_url().'/front/exhibition/'.$value['exhibition_id'] ?>" class="strip_info">

                      <div class="item_title">
                        <h3><?php echo $value['exhibition_name'] ?></h3>
                        <small><?php echo $simple->str_to_date($value['exhibition_from_date'])   .' - '.  $simple->str_to_date($value['exhibition_to_date']) ?></small>
                      </div>
                    </a>
                  </figure>
                  <ul>
                    <li><span class="loc_open">Upcoming</span></li>
                    <li>
                      <div class="score"><span><?php echo $value['exhibition_city']  ?></span></div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <?php } ?>
            <div class="owl-nav">
              <button type="button" role="presentation" class="owl-prev"><i class="arrow_carrot-left"></i></button>
              <button type="button" role="presentation" class="owl-next"><i class="arrow_carrot-right"></i></button>
            </div>
            <div class="owl-dots disabled"></div>
          </div>
          <!-- /carousel -->
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php } ?>
 <style type="text/css">
    .morecontent span {
        display: none;
    }
    .ReadMore {
        display: visible;
    }
    a:focus {
        color: #ff0303;
        text-decoration: none;
        outline: none;
    }
</style>
</main>
<?= $this->endSection('content')?>