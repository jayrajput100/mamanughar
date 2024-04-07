<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">
	<?php if(isset($subcategory)){ ?>
    <?php	if(is_array($subcategory) && count($subcategory) >= 1){ ?>
		  <div class="page_header element_to_stick ">
		    <div class="container">
		      <div class="row">
		        <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		          <div class="breadcrumbs">
		            <ul>
		              <li><a href="<?php echo base_url() ?>/home">Home</a></li>
		              <li ><a href="<?php echo base_url() ?>/category/subcategory/<?php echo $subcategory['category_id']  ?>" style="color:#f7941d"><?php print_r($subcategory['category_name']?$subcategory['category_name']:'') ?></a></li>
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
		  <?php if(isset($subcategory['subcategory'])){ ?>
	    	<?php	if(is_array($subcategory['subcategory']) && count($subcategory['subcategory']) >= 1){ 
                 //print_r($subcategory);  
	    		?>
				  <div class="container margin_30_40">
				    <div class="row">
				   
				      <div class="col-lg-12">
				        <div class="row">

				        	<?php 
				        	$url ='';
				        	foreach ($subcategory['subcategory'] as $key => $value) { ?>
				          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
				            <div class="strip">
				              <figure>
				               
				                 <?php if($value['subcat_image']!='') { ?>
				                <img src="<?= base_url($value['subcat_image'])?>" data-src="<?= base_url($value['subcat_image'])?>" class="img-fluid lazy" alt="" />
				               <?php }
				               else { ?>
                                 <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width:195px;">
				               <?php  } ?>
				               <?php 
                                 
                                 $cnt_third_cat=$simple->cnt_third_cat($value['subcategory_id']);
                                 //var_dump($cnt_third_cat);
                                 if($cnt_third_cat>1)
                                 {
                                 	$url=base_url('particular_third_sub_cat/'.$value['subcategory_id']);
                                 }
                                 else
                                 {
                                   $str='subcat_'.$value['subcategory_id'];
                                   $url=base_url('/search_data/'.$str);	
                                 }	
				               ?>
				                <a href="<?php print_r($url) ?>" class="strip_info">
				                
				                  <div class="item_title">
				                    <h3><?php print_r($value['sub_cat_name']?$value['sub_cat_name']:'') ?></h3>
				                    <small><?php echo $simple->json_decode_str_cat($subcategory['category_id']) ?></small>
				                   
				                  </div>
				                </a>
				              </figure>
				              
				            </div>
				          </div>
				          <?php } ?>
				        </div>
				        <!-- /row -->
				       
				      </div>
				      <!-- /col -->
				    </div>
				  </div>
				<?php } ?>
			<?php } ?>
		<?php } ?>
	<?php } ?>
</main>
<?= $this->endSection('content')?>