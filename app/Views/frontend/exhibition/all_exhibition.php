<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">

    <?php if(is_array($exhibition) || count($upcoming_exhibition) >= 1 || count($expired_exhibition) >= 1) { 
      $exhibition=array_chunk($exhibition,4); 
      $upcoming_exhibition=array_chunk($upcoming_exhibition,4); 
      $expired_exhibition=array_chunk($expired_exhibition,4);   
      
      ?>
      
      <div class="container margin_60_40">
            <div class="main_title center">
              <span><em></em></span>
              
              <p>Ongoing Exhibitions</p>
             
            </div>
          
                <?php 
                      foreach ($exhibition as $k => $v) 
                      { ?>
                     <div class="row">
                     <?php 
                       foreach ($v as $key => $value) 
                       { ?>
                              
                             
                      <div class="col-md-3" >      
                        <div class="item">
                            <div class="strip">
                                <figure>
                                  
                                    <?php if(isset($value['exhibition_logo'])) { ?>
                                       <img src="<?= base_url($value['exhibition_logo'])?>" data-src="<?= base_url($value['exhibition_logo'])?>" class="owl-lazy" alt="" style="opacity: 1;">
                                    <?php } ?> 
                                    <a href="<?php echo base_url().'/front/exhibition/'.$value['exhibition_id'] ?>" class="strip_info">
                                       
                                        <div class="item_title">
                                            <h3><?php echo $value['exhibition_name'] ?></h3>
                                            <small><?php echo $simple->str_to_date($value['exhibition_from_date'])   .' - '.  $simple->str_to_date($value['exhibition_to_date']) ?></small>
                                        </div>
                                    </a>
                                </figure>
                                <ul>
                                    <li><span class="loc_open">Ongoing</span></li>
                                    <li>
                                        <div class="score"><span><?php echo $value['exhibition_city'] ?></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      </div>
                       <?php } ?>
                     </div>    
                    <?php  
                        }  
                    ?>
                      
            <!-- /carousel -->
            <div class="main_title center">
              <span><em></em></span>
             
              <p>Upcoming  Exhibitions</p>
             
            </div>
            <?php 
                      foreach ($upcoming_exhibition as $k => $v) 
                      { ?>
                     <div class="row">
                     <?php 
                       foreach ($v as $key => $value) 
                       { ?>
                              
                             
                      <div class="col-md-3" >      
                        <div class="item">
                            <div class="strip">
                                <figure>
                                   
                                    <?php if(isset($value['exhibition_logo'])) { ?>
                                       <img src="<?= base_url($value['exhibition_logo'])?>" data-src="<?= base_url($value['exhibition_logo'])?>" class="owl-lazy" alt="" style="opacity: 1;">
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
                                        <div class="score"><span><?php echo $value['exhibition_city'] ?></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      </div>
                       <?php } ?>
                     </div>    
                    <?php  
                        }  
                    ?>
                 <div class="main_title center">
              <span><em></em></span>
             
              <p>Expired  Exhibitions</p>
             
            </div>
            
            <?php //echo "<pre>";  print_r($expired_exhibition);?>
            <?php 
                      foreach ($expired_exhibition as $k => $v) 
                      { ?>
                     <div class="row">
                     <?php 
                       foreach ($v as $key => $value) 
                       { ?>
                              
                             
                      <div class="col-md-3" >      
                        <div class="item">
                            <div class="strip">
                                <figure>
                                   
                                    <?php if(isset($value['exhibition_logo'])) { ?>
                                       <img src="<?= base_url($value['exhibition_logo'])?>" data-src="<?= base_url($value['exhibition_logo'])?>" class="owl-lazy" alt="" style="opacity: 1;">
                                    <?php } ?> 
                                    <a href="#" class="strip_info">
                                        
                                        <div class="item_title">
                                            <h3><?php echo $value['exhibition_name'] ?></h3>
                                            <small><?php echo $simple->str_to_date($value['exhibition_from_date'])   .' - '.  $simple->str_to_date($value['exhibition_to_date']) ?></small>
                                        </div>
                                    </a>
                                </figure>
                                <ul>
                                    <li><span class="loc_open">Expired</span></li>
                                    <li>
                                        <div class="score"><span><?php echo $value['exhibition_city'] ?></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      </div>
                       <?php } ?>
                     </div>    
                    <?php  
                        }  
                    ?>
    

      </div>
    <?php } ?>
    
</main>
<?= $this->endSection('content')?>