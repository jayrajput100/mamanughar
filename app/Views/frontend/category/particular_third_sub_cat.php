<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">
	<div class="page_header element_to_stick ">
		    <div class="container">
		      <div class="row">
		        <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		          <div class="breadcrumbs">
		            <ul>
		              <li><a href="<?php echo base_url() ?>/home">Home</a></li>
		              <li><a href="<?php echo base_url() ?>/category/subcategory/<?php echo $third_subcategory[0]['category_id']  ?>"><?php echo $simple->json_decode_str_cat($third_subcategory[0]['category_id']); ?></a></li>
		               <li><a href="<?php echo base_url() ?>/particular_third_sub_cat/<?php echo $third_subcategory[0]['subcategory_id']  ?>" style="color:#f7941d"><?php echo $simple->json_decode_str_sub_cat($third_subcategory[0]['subcategory_id']); ?></a></li>
		            </ul>
		          </div>
		          <!-- <h1>145 restaurants in Convent Street 2983</h1> -->
		        </div>
		        <div class="col-xl-4 col-lg-5 col-md-5">
		    			<div class="search_bar_list">
						  <form method="post" action="<?php echo base_url('/home/search_result');?>">
						    <input class="form-control" name="search_query" type="text" id="autocomplete-dynamic" placeholder="Search Any Product OR Category ..." required="true">
		                    <input type="hidden" name="search_type" id="search_type">
		                    <input type="hidden" name="search_value" id="search_value">
                            <input type="submit" value="Search">
			                
						  </form>	
						</div>
		    		</div>
		      </div>
		      <!-- /row -->
		    </div>
		  </div>
<div class="container margin_30_40">
	    <div class="row">
           
	    	<div class="col-lg-12">
	    	 <div class="row">
	    		    	
	    	<?php 
	    	 if(isset($third_subcategory))
	    	 {
	    	 	 if(is_array($third_subcategory) && count($third_subcategory)>=1)
	    	 	 { 
	    	 	 	foreach ($third_subcategory as $key => $value) 
	    	 	 	{ ?>
	    	 	 	 
	    	 	 	 <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
			            <div class="strip">
			                <figure>
			                  <!--   <span class="ribbon off"></span> -->
			                     
			                    <?php if($value['image_path'])
									{ ?>
									 <img src="<?php echo base_url($value['image_path']) ?>" data-src="<?php echo base_url($value['image_path']) ?>" alt="" class="img-fluid lazy center">
									<?php }
									else
									{ ?>
                                       <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
									<?php } ?>	
		                         

		                        
			                    <?php 
		                           $str='thirdsubcat_'.$value['third_subcategory_id'];
                                   $url=base_url('/search_data/'.$str);	  
			                    ?>
			                    <a href="<?php echo $url; ?>"  class="login strip_info">
			                       
			                        <div class="item_title">
			                            <h3><?php echo $value['third_subcategory_name'] ?></h3>
			                             <small><?php echo $simple->json_decode_str_sub_cat($value['subcategory_id']) ?></small>
			                           
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