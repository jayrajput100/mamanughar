<?= $this->extend('frontend/layout/front_layout')?>
<?= $this->section('content')?>
<?php if(isset($category)){ ?>
  <?php	if(is_array($category) && count($category) >= 1){ ?>	
		<main style="padding: 130px 0px;">
		  <div class="page_header element_to_stick">
		    <div class="container">
		      <div class="row">
		        <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		          <div class="breadcrumbs blog">
		            <ul>
		              <li><a href="#">Home</a></li>
		              <li><a href="#">Category</a></li>
		              <li>Sub Category</li>
		            </ul>
		          </div>
		        </div>
		        <div class="col-xl-4 col-lg-5 col-md-5">
		          <div class="search_bar_list">
		            <input type="text" class="form-control" placeholder="Search in blog...">
		            <input type="submit" value="Search">
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		  <?php foreach ($category as $key_c => $value_c) { ?>
		  <div class="container margin_30_40">
		  	<div class="main_title">
					<span><em></em></span>
					<h2><?php print_r($value_c['category_name']) ?></h2>
					
					<a href="<?= base_url('category/subcategory/'.$value_c['category_id']);?>">View All</a>
				</div>
		    <div class="row">
		      <div class="col-lg-12">
		        <div class="row">
		          <div class="col-md-4">
		            <article class="blog">
		              <figure>
		                <a href="<?= base_url('category/subcategory/'.$value_c['category_id']);?>">
		                	<img src="<?=base_url($value_c['category_image'])?>" alt="<?php print_r($value_c['category_name']);?>">
		                  <div class="preview"><span>Read more</span></div>
		                </a>
		              </figure>
		              <div class="post_info">
		                <small>Category - <?php print_r($value_c['date_created']) ?></small>
		                <h2>
		                	<a href="<?= base_url('category/subcategory/'.$value_c['category_id']);?>">
		                		<?php print_r($value_c['category_name']);?></a>
		                </h2>
		                <p><?php print_r($value_c['category_desc']) ?></p>
		                <ul>
		                  <li>
		                    <div class="thumb"><img src="<?=base_url()?>/public/front-theme/img/avatar.jpg" alt=""></div> Admin
		                  </li>
		                  <li><i class="icon_comment_alt"></i>20</li>
		                </ul>
		              </div>
		            </article>
		          </div>
		          <?php if(isset($value_c['categorydata'])){ ?>
  							<?php	if(is_array($value_c['categorydata']) && count($value_c['categorydata']) >= 1){ ?>	
				          <div class="col-md-8">
				           	<div class="row">

				           		<?php 
				           			$i = 1;
				           			$max_show = 6; // Maximum show 6 par category wise
				           		 ?>

				           		<?php foreach($value_c['categorydata'] as $key_sb => $value_sb) { ?>
				           			<?php if($max_show  >= $i) ?>
					           		<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
													<div class="strip">
													    <figure>
													    	
													      <img 
													        src="<?=base_url($value_sb['subcat_image'])?>" 
													        data-src="<?=base_url($value_sb['subcat_image'])?>" 
													        class="img-fluid lazy loaded" 
													        alt="<?php print_r($value_sb['sub_cat_name']) ?>" 
													        data-was-processed="true"
													        style="height:190px;">
													      <a href="#" class="strip_info">
													        <!-- <small><?php print_r($value_sb['sub_cat_name']) ?></small> -->
													        <div class="item_title">
													          <h3><?php print_r($value_sb['sub_cat_name']) ?></h3>
													            <!-- <small><?php print_r($value_sb['sub_cat_desc']) ?></small> -->
													        </div>
													      </a>
													    </figure>
													    
													</div>
												</div>
												<?php if ($i == $max_show) break; ?>
				           		<?php $i++; } ?>
										</div>
				          </div>
				        <?php } ?>
				      <?php } ?>
		        </div>
		      </div>
		    </div>
		  </div>
			<?php } ?>
		</main>
	<?php } ?>
<?php } ?>
<?= $this->endSection('content')?>