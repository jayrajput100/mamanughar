<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">

<div class="hero_in detail_page background-image" data-background="url(<?= base_url($advertisment['add_image'])?>)" style="background-image: url(&quot;<?= base_url($advertisment['add_image'])?>&quot;);">
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)" style="background-color: rgba(0, 0, 0, 0.5);">
				
				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="head"><div class="score"><p><span class="loc_open">Ad.</span></p></div></div>
								<h1><?php echo $advertisment['title'] ?></h1>
								
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="<?= base_url($advertisment['add_image'])?>" class="btn_hero" title="<?php echo $advertisment['title'] ?>" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
										 <!-- <a href="img/detail_2.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
										<a href="img/detail_3.jpg" title="Photo title" data-effect="mfp-zoom-in"></a> -->
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
		        		            <?php 
		        		           
		        		            ?>
		                               <h2 style="color:#f6964d"><?php echo $advertisment['title'] ?></h2>
		                                <div class="row">
		                                	<div class="col-md-4">
		                                		  <strong>Description</strong><br>
		                                		<p><?php echo !empty($advertisment['description'])?$advertisment['description']:'No Description Added yet !'  ?></p>
		                                	</div>
		                                	<div class="col-md-4">
			                                	<strong>Status :</strong><br>
	                                         	<p><span class="loc_open">Adv.</span></p>
                                            </div>
                                            <div class="col-md-4">
                                            	<strong>Supplier :</strong><br>
                                            	<p><?php echo $simple->fetch_supplier_name($advertisment['supplier_id']) ?></p> 
                                            </div>
		                                </div>
		                                	
		                                <!-- /row -->
		                            	</div>
		        </div>
		    </div>
</div>		        	
</main>	
<?= $this->endSection('content')?>