<?php
use App\Libraries\Simple;
$simple=new Simple();

?>
<?= $this->extend('frontend/layout/front_layout')?>
<style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>
<?= $this->section('content')?>
<?php if(isset($third_sub_category)){ ?>
  <?php	if(is_array($third_sub_category) && count($third_sub_category) >= 1){ ?>	
    <main >

    <?php 
    if($third_sub_category['image_path']!='')
    { ?>
       <div class="hero_in detail_page background-image" data-background="url(<?= base_url();?>/<?= $third_sub_category['image_path'] ?>)" style="background-image: url(&quot;<?= base_url();?>/<?= $third_sub_category['image_path'] ?>;">
    <?php }
    else
    { ?>
        <div class="hero_in detail_page background-image" data-background="url(<?= base_url();?>/public/front-theme/img/mag_icon.png)" style="background-image: url(&quot;<?= base_url();?>/public/front-theme/img/mag_icon.png">
    <?php } ?>	
    

			
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)" style="background-color: rgba(0, 0, 0, 0.5);">
				
				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="head"></div>
								<h1><?php echo $third_sub_category['third_subcategory_name'] 
                                       
								 ?></h1>
								
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										
										<!--  -->
									<?php 
								    if($third_sub_category['image_path']!='')
								    { ?>
								       
								       	 <a href="<?= base_url();?>/<?= $third_sub_category['image_path'] ?>" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
								    <?php }
								    else
								    { ?>
                                      <a href="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
								    <?php } ?>	 
									</span>
									
								</div>
							</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /main_info -->
				</div>
			</div>
		</div>
		<div class="container margin_detail" style="transform: none;">
		    <div class="row" style="transform: none;">
		        <div class="col-lg-12">

		            <div class="tabs_detail">
		               

		                <div class="tab-content" role="tablist">
		                    <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
		                        
		                        
		                            <div class="card-body info_content">
		                            	
                                      	     
		                                

		                                
		                                
                                          
		                                <div class="other_info">
		                                <h2>Product Details </h2>
		                                <div class="row">
		                                	<div class="col-md-6">
                                                <h3>Product Name</h3>
                                                <p><?php echo $third_sub_category['third_subcategory_name']?></p>
                                                <h3>Product Description</h3>
                                                <p><?php echo $third_sub_category['description']?></p>
                                                <h3>Category Name</h3>
                                                <p><?php echo $simple->json_decode_str_cat($third_sub_category['category_id']) ?></p>
                                                <h3>Sub Category Name</h3>
                                                <p><?php echo $simple->json_decode_str_sub_cat($third_sub_category['subcategory_id']) ?></p>
		                                	</div>	
		                                </div>
		                                 <h2>Pictures from our Admin</h2>
		                                  <div class="pictures magnific-gallery clearfix">
		                                  	<?php 
										    if($third_sub_category['image_path']!='')
										    { ?>
                                               <figure><a href="<?= base_url();?>/<?= $third_sub_category['image_path'] ?>" title="Photo title" data-effect="mfp-zoom-in"><img src="i<?= base_url();?>/<?= $third_sub_category['image_path'] ?>" data-src="<?= base_url();?>/<?= $third_sub_category['image_path'] ?>" class="lazy" alt=""></a></figure>
		                                   <?php } ?>
		                                  </div>	

		                                <!-- /row -->
		                            	</div>
		                            </div>
		                        
		                    </div>
		                    <!-- /tab -->

		                    
		                </div>
		                <!-- /tab-content -->
		            </div>
		            <!-- /tabs_detail -->
		        </div>
		        <!-- /col -->

		        

		    </div>
		    <!-- /row -->
		</div>
		        	
</main>	

  <?php } ?>
<?php } ?>

<?= $this->endSection('content')?>