<?php
use App\Libraries\Simple;
$simple=new Simple();

?>
<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<main style="padding: 130px 0px;">

<div class="hero_in detail_page background-image" data-background="url(<?= base_url();?>/public/front-theme/img/logo1.png)" style="background-image: url(&quot;<?= base_url();?>/public/front-theme/img/logo1.png&quot;);">

			
			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)" style="background-color: rgba(0, 0, 0, 0.5);">
				
				<div class="container">
					<div class="main_info">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="head"><div class="score"><p><span class="loc_open">Approved</span></p></div></div>
								<h1><?php echo $institute['institute_name'] 
                                       
								 ?></h1>
								
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="<?= base_url();?>/public/front-theme/img/logo1.png" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
										
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
		                            	<p><?php print_r($institute['institute_name']) ?></p>
		                            	<div class="add_bottom_25"></div>
                                      	     
		                                

		                                
		                                
                                          
		                                <div class="other_info">
		                                <h2>Institute Details </h2>
		                                <div class="row">
		                                	<div class="col-md-4">
		                                		<h3>Institute Type</h3>
		                                		<p><?php echo $institute['institute_type']; ?><br></p>
		                                		<?php 
		                                		if($institute['institute_type']=="Testing")
		                                		{ ?>
                                                 <h3>Testing Type</h3>
		                                		<p><?php $test= $simple->fetch_test_name($institute['test_id']);
                                                         echo $test[0]['test_name'];  
		                                		 ?><br></p>
		                                		<?php } else{ ?>
                                                 <h3>Education Courses</h3>
                                                 <p><?php echo $institute['ins_course']?></p>
		                                		<?php } ?>	 
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Contact Details</h3>
		                                		<strong>Email Id</strong><br>
		                                		<p><?php echo $institute['institute_email']; ?><br></p>
		                                		<strong>Mobile No</strong><br>
		                                		<p><?php echo $institute['institute_mobile']; ?><br></p>
		                                		<strong>Phone No</strong><br>
		                                		<p><?php echo $institute['ins_phone_no']; ?><br></p>
		                                	</div>
		                                	<div class="col-md-4">
		                                		<h3>Other Details</h3>
		                                		<strong>Web Site</strong><br>
		                                		<a href="<?php echo $institute['institute_website']; ?>" target="_blank"><?php echo $institute['institute_website']; ?></a>
		                                		<p><strong>Contact Person Name</strong><br><?php echo $institute['institute_contact_person']; ?></p>
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