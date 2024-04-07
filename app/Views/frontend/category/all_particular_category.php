<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">
<div class="container margin_30_40">
	    <div class="row">
            
	    	<div class="col-lg-12">
	    	 <div class="row">
	    		    	
	    	<?php 
	    	 if(isset($subcategory))
	    	 {
	    	 	 if(is_array($subcategory) && count($subcategory)>=1)
	    	 	 { 
	    	 	 	foreach ($subcategory as $key => $value) 
	    	 	 	{ ?>
	    	 	 	 
	    	 	 	 <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
			            <div class="strip">
			                <figure>
			                  <!--   <span class="ribbon off"></span> -->
			                     
			                    <?php if($value['sub_cat_image_path'])
									{ ?>
									 <img src="<?php echo base_url($value['sub_cat_image_path']) ?>" data-src="<?php echo base_url($value['sub_cat_image_path']) ?>" alt="" class="img-fluid lazy center">
									<?php }
									else
									{ ?>
                                       <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
									<?php } ?>	
		                         

		                        
			                  
		                          
			                    <a href="#" id="sign-in" class="login strip_info">
			                        
			                        <div class="item_title">
			                            <h3><?php echo $value['sub_cat_name'] ?></h3>
			                            <small><?php echo $simple->json_decode_str_cat($value['category_id']) ?></small>
			                        </div>
			                    </a>
			                </figure>
			                <ul>
			                    
			                    <!-- <li>
			                        <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
			                    </li> -->
			                </ul>
			            </div>
			        </div>	 
	    	 	<?php  	
	    	         } 

	    	 	 }	
	    	 }	
	    	 ?>
		        
		       	    	
	    	
	        

	        
	    </div>
	    <!-- /row -->
	    
	</div>
	 </div>
	 <!-- DEBUG-VIEW START 1 ROOTPATH/system/Pager/Views/default_full.php -->


	 
	<!-- /container -->
            			

	</div>
</main>
<?= $this->endSection('content')?>