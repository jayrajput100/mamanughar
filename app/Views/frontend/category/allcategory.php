<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<style type="text/css">
   .image {
    opacity: 1;
    display: block;
    height: 414px;
    object-fit: contain;
    width: 100%;
    transition: .5s ease;
    backface-visibility: hidden;
   
    padding: 10px;
}
.image2 {
    opacity: 1;
    display: block;
    height: 207px;
    object-fit: contain;
    width: 100%;
    transition: .5s ease;
    backface-visibility: hidden;
   
   
}
[data-icon]:before {
    font-size: 130px !important;
    margin-left: 0px;
  }

</style>
<main class="margin_160_40">
   <div class="white_bg">
    <!--<div class="main_title center">
        <span><em></em></span>
        <h2>All Categories</h2>
     </div>   -->
    <?php if(isset($fetch_three_tier)){?>
      <?php if(is_array($fetch_three_tier) && count($fetch_three_tier) >= 1){?>
        <?php foreach ($fetch_three_tier as $key => $value){ ?>
          <div class="container margin_40_40">
            <div class="main_title center">
              <span><em></em></span>
              <h2><?php echo $value['category_name']?></h2>
             
              <?php $subcat = (count($value['subcat']));?>
             
                <a href="<?php echo base_url()?>/category/subcategory/<?php echo $value['category_id'] ?>">View All</a>
             
            </div>

            <div class="owl-carousel owl-theme carousel_4 center xj">
              <?php foreach ($value['subcat']  as $k => $v){ ?>  
                <div class="item ">
                  <div class="strip">
                    <figure>
                   
                      <?php if($v['sub_cat_image']){ ?>
                        <img src="<?php echo base_url($v['sub_cat_image']);?>" data-src="<?php echo base_url($v['sub_cat_image']);?>" class="image2" alt="">
                      <?php } else { ?>
                        <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" alt="" class="img-fluid lazy loaded" data-was-processed="true" style="height:195px;width:195px">
                      <?php } ?>  
                      <?php 
                                 
                                 $cnt_third_cat=$simple->cnt_third_cat($v['sub_cat_id']);
                                 //var_dump($cnt_third_cat);
                                 if($cnt_third_cat>1)
                                 {
                                  $url=base_url('particular_third_sub_cat/'.$v['sub_cat_id']);
                                 }
                                 else
                                 {
                                   $str='subcat_'.$v['sub_cat_id'];
                                   $url=base_url('/search_data/'.$str); 
                                 }  
                       ?>
                      <a href="<?php echo $url; ?>" class="strip_info">
                     
                        <div class="item_title">
                          <h3><?php echo $v['sub_cat_name'] ?></h3>
                         
                        </div>
                      </a>
                    </figure>
                    <!-- <ul>
                      <li><span class="loc_open">Now Open</span></li>
                      <li>
                        <div class="score">
                          <span>Superb<em>350 Reviews</em></span>
                          <strong>8.9</strong>
                        </div>
                      </li>
                    </ul> -->
                  </div>
                </div>
              <?php } ?>  
            </div>
            <p class="text-center d-block d-md-block d-lg-none">
              <a href="<?php echo base_url('all_particular_category/'.$value['category_id']) ?>" class="btn_1">View All</a>
            </p>
          </div>
        <?php } ?>
      <?php } ?>
    <?php } ?>    
       
    <!--<div class="container margin_60_40">
      <div class="main_title center">
        <span><em></em></span>
        <h2>All Categories</h2>
      </div>
       <?php if(isset($fetch_three_tier)){?>
        <?php if(is_array($fetch_three_tier) && count($fetch_three_tier) >= 1){?>
          <div class="row small-gutters categories_grid" >
             <?php foreach ($fetch_three_tier as $key => $value) { ?>  
              <div class="col-sm-12 col-md-6">
                 <a href="<?php echo base_url()?>/category/subcategory/<?php echo $value['category_id'] ?>">
                        <img src="<?php echo base_url($value['category_image']);?>" data-src="<?php echo base_url($value['category_image']);?>" alt="" class="image" data-was-processed="true" >
                        <div class="wrapper" style="padding-bottom: 30px;"><h2><?php echo $value['category_name']?></h2></div> 
                  </a>      
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="row small-gutters mt-md-0 mt-sm-2">
                  <?php 
                          $i=1;
                          foreach ($value['subcat']  as $k => $v){ 
                            if($i<=3){
                              $i++; ?>
                              <div class="col-sm-6 margin">
                                <a href="<?php echo base_url().'/search_data/subcat_'.$v['sub_cat_id']; ?>">
                                  <?php if($v['sub_cat_image']){ ?>
                                    <img   src="<?php echo base_url($v['sub_cat_image'])?>" data-src="<?php echo base_url($v['sub_cat_image']) ?>" alt="" class="image2" data-was-processed="true">
                                  <?php } else { ?>
                                    <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/logo1.png" alt="" class="image2" data-was-processed="true">
                                  <?php } ?>
                                  <div class="wrapper" style="padding-bottom: 30px;">
                                    <h2 style="font-size:18px;"><?php echo $v['sub_cat_name'] ?></h2>
                                  </div>
                                </a>
                              </div>

                              <?php 
                            }
                          }
                        ?>  
                        <div class="col-sm-6 margin">
                          <a href="<?php echo base_url('all_particular_category/'.$value['category_id']) ?>">
                            <div class="fs10" title="View All Category" aria-hidden="true" data-icon=""></div>
                          </a>
                        </div>          
                </div>    
              </div>
            <?php } ?>      
          </div>
        <?php } ?>
      <?php } ?>  
    </div>-->
   </div>  
</main>
<style type="text/css">
  [data-icon]:before {
    font-size: 130px !important;
    margin-left: 0px;
  }
  .categories_grid a .wrapper {
     padding: 15px 10px 3px 7px;
  }
  .owl-stage{
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  
  .main_title.center p {
    font-weight: 500;
    font-size: 0.75rem;
  }
</style>
<?= $this->endSection('content')?>