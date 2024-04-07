<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout2')?>
<?= $this->section('content')?>
<style type="text/css">
	.badge-new {
    color: #fff;
    background-color: #f8538d;
}
.badge {
    font-weight: 600;
    line-height: 1.4;
    padding: 3px 6px;
    font-size: 12px;
    font-weight: 600;
}
.mb-2, .my-2 {
    margin-bottom: .5rem!important;
}
.ml-2, .mx-2 {
    margin-left: .5rem!important;
}
</style>
<?php 


?>
<main>
		<div class="page_header element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		    			<div class="breadcrumbs">
				            <ul>
				                <li><a href="#">Home</a></li>
				                <li><a href="#">Search Result</a></li>
				                
				            </ul>
		       	 		</div>
		        		<h1>
		        		<?php
		        		 if(isset($product))
                         {
                         	echo count($product) .' Supplier Product';
                         }
                         else if(isset($supplier))
                         {
                         	echo count($supplier).' Supplier';
                         }
                         else
                         {
                         	echo count($institute).' Institute';
                         } 
		        		?> </h1>
		    		</div>
		    		<div class="col-xl-4 col-lg-5 col-md-5">
		    			<div class="search_bar_list">
							<input type="text" class="form-control" placeholder="Search again...">
							<input type="submit" value="Search">
						</div>
		    		</div>
		    	</div>
		    	<!-- /row -->		       
		    </div>
		</div>
		<!-- /page_header -->

		<!-- <div class="filters_full clearfix">
		    <div class="container">
		        <div class="sort_select">
		            <select name="sort" id="sort">
		                <option value="popularity" selected="selected">Sort by Popularity</option>
		                <option value="rating">Sort by Average rating</option>
		                <option value="date">Sort by newness</option>
		                <option value="price">Sort by Price: low to high</option>
		                <option value="price-desc">Sort by Price: high to low</option>
		            </select>
		        </div>
		        <a class="btn_map mobile btn_filters" data-toggle="collapse" href="#collapseMap"><i class="icon_pin_alt"></i></a>
		        <a href="#collapseFilters" data-toggle="collapse" class="btn_filters"><i class="icon_adjust-vert"></i><span>Filters</span></a>
		    </div>
		</div>
		 /filters_full -->

		<!-- <div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		 /Map -->

	<!-- 	<div class="collapse filters_2" id="collapseFilters">
		    <div class="container margin_detail">
		        <div class="row">
		            <div class="col-md-4">
		                <div class="filter_type">
		                    <h6>Categories</h6>
		                    <ul>
		                        <li>
		                            <label class="container_check">Pizza - Italian <small>12</small>
		                                <input type="checkbox">
		                                <span class="checkmark"></span>
		                            </label>
		                        </li>
		                        <li>
		                            <label class="container_check">Japanese - Sushi <small>24</small>
		                                <input type="checkbox">
		                                <span class="checkmark"></span>
		                            </label>
		                        </li>
		                        <li>
		                            <label class="container_check">Burghers <small>23</small>
		                                <input type="checkbox">
		                                <span class="checkmark"></span>
		                            </label>
		                        </li>
		                        <li>
		                            <label class="container_check">Vegetarian <small>11</small>
		                                <input type="checkbox">
		                                <span class="checkmark"></span>
		                            </label>
		                        </li>
		                    </ul>
		                </div>
		            </div>
		            <div class="col-md-4">
		                <div class="filter_type">
		                    <h6>Rating</h6>
		                    <ul>
		                        <li>
		                            <label class="container_check">Superb 9+ <small>06</small>
		                                <input type="checkbox">
		                                <span class="checkmark"></span>
		                            </label>
		                        </li>
		                        <li>
		                            <label class="container_check">Very Good 8+ <small>12</small>
		                                <input type="checkbox">
		                                <span class="checkmark"></span>
		                            </label>
		                        </li>
		                        <li>
		                            <label class="container_check">Good 7+ <small>17</small>
		                                <input type="checkbox">
		                                <span class="checkmark"></span>
		                            </label>
		                        </li>
		                        <li>
		                            <label class="container_check">Pleasant 6+ <small>43</small>
		                                <input type="checkbox">
		                                <span class="checkmark"></span>
		                            </label>
		                        </li>
		                    </ul>
		                </div>
		            </div>
		            <div class="col-md-4">
		                <div class="filter_type">
		                    <h6>Distance</h6>
		                    <div class="distance"> Radius around selected destination <span></span> km</div>
		                    <div><input type="range" min="10" max="100" step="10" value="30" data-orientation="horizontal"></div>
		                </div>
		            </div>
		        </div>
		     
		    </div>
		</div>  -->
    <?php 
     if(isset($product))
     {
     	 if(is_array($product) && count($product))
     	 { ?>

     	 
	<div class="container margin_30_40">
	    <div class="row">
            <div class="col-lg-3"></div>
	    	<div class="col-lg-9">
	    		<div class="row">
	    	<?php
	    	
	    	foreach ($product as $key => $value) 
	    	{ 
              //var_dump($value['product_image']);

	    		?>
	    	
	    	
	        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
	            <div class="strip">
	                <figure>
	                    <span class="ribbon off"><?php echo  $simple->fetch_supplier_name($value['supplier_id']); ?></span>
	                     <?php if($value['product_image']!='') { ?>
                                     <img src="<?= base_url($value['product_image'])?>" data-src="<?= base_url($value['product_image'])?>" class="img-fluid lazy loaded" alt="" style="opacity: 1;">
                         <?php } else{ ?>
                             <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
                        <?php } ?> 

                        
	                  
                        <?php 
                        $user=session()->get('user_session');
                        //var_dump($user);
                        $url= isset($user)? base_url().'/product/view_product/'.$value['product_id']:base_url().'/signin';
                        ?>  
	                    <a href="<?php echo $url ?>" id="sign-in"  class="login strip_info" >
	                        <small><?php echo  $simple->json_decode_str_cat($value['category_id']); ?></small>
	                        <div class="item_title">
	                            <h3><?php 
	                              if($value['third_category_id']==0)
	                              {
	                              	echo $simple->json_decode_str_sub_cat($value['sub_category_id']);
	                              }
	                              else
	                              {
	                              	echo $simple->json_decode_str_third_sub_cat($value['sub_category_id']);
	                              }	

	                              ?></h3>
	                            <small><?php echo $simple->str_rep($value['product_desc'])  ?></small>
	                        </div>
	                    </a>
	                </figure>
	                <ul>
	                    <li><span><?php echo $simple->fetch_supplier_city_name($value['supplier_id'])?></span></li>
	                    <!-- <li>
	                        <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
	                    </li> -->
	                </ul>
	            </div>
	        </div>
	       <?php } ?>


	        
	    </div>
	    <!-- /row -->
	    
	</div>
	 </div>
	 <?= $pager->links() ?>
	</div>
	<!-- /container -->
  <?php  
      }	
     } 
     ?>
     <?php 
     if(isset($supplier))
     {
     	 if(is_array($supplier) && count($supplier))
     	 { ?>

     	 
	<div class="container margin_30_40">
	    <div class="row">
            <div class="col-lg-3"></div>
	    	<div class="col-lg-9">
	    		<div class="row">
	    	<?php
	    	
	    	foreach ($supplier as $key => $value) 
	    	{ ?>
	    	
	    	
	        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
	            <div class="strip">
	                <figure>
	                    <span class="ribbon off"><?php echo $simple->fetch_city_name($value['city_id']); ?></span>
	                     <?php if($value['supplier_image']!='') { ?>
                                     <img src="<?= base_url($value['supplier_image'])?>" data-src="<?= base_url($value['supplier_image'])?>" class="img-fluid lazy loaded" alt="" style="opacity: 1;">
                         <?php } else { ?>
                            <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
                        <?php } ?> 
	                  
                        <?php 
                        $user=session()->get('user_session');
                        //var_dump($user);
                        $url= isset($user)? base_url().'/supplier/view_supplier/'.$value['id']:base_url().'/signin';
                        ?> 
	                    <a href="<?php echo $url ?>" class="strip_info">
	                         <?php 
	                              $cat_name=[]; 
                                   foreach (json_decode($value['category_id'],true) as $key => $v) 
                                   {
                                     $cat_name[]=$simple->json_decode_str_cat($v);

                                   }  
                                 
                                    ?>
	                        <div class="item_title">
	                            <h3><?php  echo  $value['supplier_name']; ?></h3>
	                            <small><?php echo $simple->str_rep($value['supplier_description'])  ?></small>
	                        </div>
	                    </a>
	                </figure>
	                <ul>
	                    <li>
	                    	<?php foreach (array_unique($cat_name) as $key => $v) 
                                  { ?>
                                  <span class="mb-2 ml-2 badge badge-new"><?php echo $v; ?></span>
                                  <?php } ?>

	                    </li>
	                    <!-- <li>
	                        <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
	                    </li> -->
	                </ul>
	            </div>
	        </div>
	       <?php } ?>


	        
	    </div>
	    <!-- /row -->
	    
              
               
	</div>
	 </div>
	 <?= $pager->links() ?>
	</div>
	<!-- /container -->
  <?php  
      }	
     } 
     ?>
     <?php 
     if(isset($institute))
     {
     	 if(is_array($institute) && count($institute))
     	 { ?>

     	 
	<div class="container margin_30_40">
	    <div class="row">
            <div class="col-lg-3"></div>
	    	<div class="col-lg-9">
	    		<div class="row">
	    	<?php
	    	
	    	foreach ($institute as $key => $value) 
	    	{ ?>
	    	
	    	
	        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
	            <div class="strip">
	                <figure>
	                    <span class="ribbon off"><?php  
	                      $test=$simple->fetch_test_name($value['test_id']);
                          echo $test[0]['test_name'];                                
	                      ?></span>
	                    
                       <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;">
                         
	                     <?php 
                        $user=session()->get('user_session');
                        //var_dump($user);
                        $url= isset($user)? base_url().'/institute/view_institute/'.$value['institute_id']:base_url().'/signin';
                        ?> 

	                    <a href="<?php echo $url ?>" class="strip_info">
	                        
	                        <div class="item_title">
	                            <h3><?php  echo  $value['institute_name'].' ('.$value['institute_type'].')'; ?></h3>
	                            <small><?php echo $simple->str_rep($value['institute_contact_person'])  ?></small>
	                        </div>
	                    </a>
	                </figure>
	                <ul>
	                    <li>
	                    	

	                    </li>
	                    <!-- <li>
	                        <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
	                    </li> -->
	                </ul>
	            </div>
	        </div>
	       <?php } ?>


	        
	    </div>
	    <!-- /row -->
	    
	</div>
	 </div>
	 <?= $pager->links() ?>
	</div>
	<!-- /container -->
  <?php  
      }	
     } 
     ?>			

	</main>
	<!-- /main -->
	<script type="text/javascript">
	
</script>
<?= $this->endSection('content')?>
