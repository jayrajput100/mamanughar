<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">

<div class="hero_in detail_page background-image" data-background="url(<?= base_url($exhibition['exhibition_logo'])?>)" style="background-image: url(&quot;<?= base_url($exhibition['exhibition_logo'])?>&quot;);background-size:100% 100%;padding: 50px;background-origin: content-box;">
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)" style="background-color: rgba(0, 0, 0, 0.5);">
				
				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								
								<h1><?php echo $exhibition['exhibition_name'] ?></h1>
								
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="<?= base_url($exhibition['exhibition_logo'])?>" class="btn_hero" title="<?php echo $exhibition['exhibition_name'] ?>" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photo</a>
										
									</span>
									<!-- <a href="#0" class="btn_hero wishlist"><i class="icon_heart"></i>Wishlist</a> -->
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
		        	<div class="other_info">
		                                <h2 style="color:#f6964d"><?php echo $exhibition['exhibition_name'] ?></h2>
		                                <div class="row">
		                                	<div class="col-md-4">
		                                		
                                                <strong>Description</strong><br>
		                                		<p><?php echo $exhibition['exhibition_description']  ?></p>
		                                	</div>
		                                	<div class="col-md-4">	
		                                		<strong>Place</strong><br> 
		                                		<p><?php echo $exhibition['exhibition_venue']  ?></p>
		                                	</div>
		                                	<div class="col-md-4">	
		                                		<strong>Status</strong><br> 
		                                		<p><span class="loc_open"><?php echo $status ?></span></p>
		                                	</div>	
		                                	
		                                	 <!-- <div class="col-md-4">
		                                		<h3>Date :</h3>
		                                		<p><strong>Starting Date :</strong><br><?php 
                                                
                                                 echo $simple->str_to_date($exhibition['exhibition_from_date'])  ?></p>
		                                		<p><strong>Ending Date :</strong><br> <?php 
                                                
                                                 echo $simple->str_to_date($exhibition['exhibition_to_date'])  ?></p>
		                                		
		                                	</div>  -->
		                                	<!--  <div class="col-md-4">
		                                		<h3>Status</h3>
		                                		<p><span class="loc_open">Ongoing</span></p>
		                                		
		                                	</div>  -->
		                                </div>
		                                <div class="row">
                                           <div class="col-md-4">
		                                		
		                                		<p><strong>From Date :</strong><br><?php 
                                                
                                                 echo $simple->str_to_date($exhibition['exhibition_from_date'])  ?></p>
                                           </div>
                                           <div class="col-md-4">      
		                                		<p><strong>To Date :</strong><br> <?php 
                                                
                                                 echo $simple->str_to_date($exhibition['exhibition_to_date'])  ?></p>
		                                		
		                                	  </div>
		                                    </div>	
		                                </div>	

		                                <!-- /row -->
		                            	</div>
		        </div>
		    </div>
  </div>		        	
</main>	
<?= $this->endSection('content')?>