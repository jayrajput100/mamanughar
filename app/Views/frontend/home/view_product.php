<?php
use App\Libraries\Simple;
$simple=new Simple();

?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">

<div class="hero_in detail_page background-image" data-background="url(<?= base_url($product['product_image'])?>)" style="background-image: url(&quot;<?= base_url($product['product_image'])?>&quot;);">

			
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)" style="background-color: rgba(0, 0, 0, 0.5);">
				
				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="head"><div class="score"><p><span class="loc_open">Approved</span></p></div></div>
								<h1><?php //echo $['exhibition_name'] 
                                       if($product['third_category_id']==0)
                                       {
                                       	echo $simple->json_decode_str_sub_cat($product['sub_category_id']);
		                              }
		                              else
		                              {
		                              	echo $simple->json_decode_str_third_sub_cat($product['sub_category_id']);
		                              }		
								 ?></h1>
								
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="<?= base_url($product['product_image'])?>" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
										
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
		                <ul class="nav nav-tabs" role="tablist">
		                    <li class="nav-item">
		                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Information</a>
		                    </li>
		                    <!-- <li class="nav-item">
		                        <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Reviews</a>
		                    </li> -->
		                </ul>

		                <div class="tab-content" role="tablist">
		                    <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
		                        <div class="card-header" role="tab" id="heading-A">
		                            <h5>
		                                <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
		                                    Information
		                                </a>
		                            </h5>
		                        </div>
		                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
		                            <div class="card-body info_content">
		                            	<p><?php print_r($product['product_desc']) ?></p>
		                            	<div class="add_bottom_25"></div>
                                     <?php   if(isset($product_image))
		                                    {
		                                    	if(is_array($product_image) && count($product_image)>=1)
		                                    	{
		                                 ?>   	     
		                                <h2>Product Gallery</h2>
		                                <div class="pictures magnific-gallery clearfix">
		                                   <?php 
		                                   //print_r($product_image);
		                                    
                                                   foreach ($product_image as $key => $value) 
                                                   {
                                                     	
                                                       
		                                    		?>
                                                  
                                                      <figure><a href="<?php echo  base_url($value['product_image_url']) ?>" title="<?php echo $value['product_image_name']?>" data-effect="mfp-zoom-in">
                                                      	<img src="<?php echo base_url($value['product_image_url']) ?>" data-src="<?php echo  base_url($value['product_image_url']) ?>" class="lazy loaded" alt="" data-was-processed="true"></a></figure>
		                                    <?php }	
		                                         }

		                                    }	 ?>
		                                   
		                                   
		                                </div>
		                                <!-- /pictures -->

		                                
		                                
                                         <?php 
                                         $supplier=$simple->fetch_supplier_details($product['supplier_id']);
                                         //print_r($supplier);  
                                         ?>  
		                                <div class="other_info">
		                                <h2>Supplier Details -- (<?php echo $supplier['supplier_name'] ?>)</h2>
		                                <div class="row">
		                                	<div class="col-md-4">
		                                		<h3>Location</h3>
		                                		<p><?php echo $supplier['location']; ?><br></p>
		                                		<strong>City</strong><br>
		                                		<p><?php echo $simple->fetch_city_name($supplier['city_id']); ?><br></p>
		                                		<strong>State</strong><br>
		                                		<p><?php echo $simple->fetch_state_name($supplier['state_id']); ?><br></p>
		                                		<strong>Country</strong><br>
		                                		<p>India<br></p>
		                                		<strong>Pin Code</strong><br>
		                                		<p><?php echo $supplier['pin_code']?><br></p>
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Contact Details</h3>
		                                		<p><strong>Email ID</strong><br><?php echo $supplier['email']; ?> </p><p>
		                                		</p><p><strong>Aleternate Email ID</strong><br> <?php echo $supplier['alternate_email']; ?></p>
		                                		<p><strong>Mobile No</strong><br><?php echo $supplier['mobile']; ?> </p><p>
		                                		</p><p><strong>Aleternate Mobile No</strong><br> <?php echo $supplier['alternate_mobile']; ?></p>
		                                	</p><p><strong>Phone No</strong><br> <?php echo $supplier['phone_no']; ?></p>
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Other Details</h3>
		                                		<p><strong>Website</strong><br><a href="<?php echo $supplier['website']; ?>" target="_blank"><?php echo $supplier['website']; ?></a></p>
		                                		<p><strong>Contact Person Name</strong><br><?php echo $supplier['contact_person']; ?></p>
		                                	</div>
		                                </div>
		                                <!-- /row -->
		                            	</div>
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

<?= $this->endSection('content')?>