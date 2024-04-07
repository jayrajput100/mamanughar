 <div class="bg_gray">
        <div class="container margin_60_40">
          <div class="main_title center">
            <span><em></em></span>
            <h2>Popular Categories</h2>
            <p>Popular Categories By Supplier</p>
          </div>
        <div class="row portfolio"> 
         <?php 
           foreach ($categorydata as $key => $value) 
           { ?>
            
             <a href="<?php echo base_url() .'/category/subcategory/'.$value['category_id'] ?>" class="card">
                <div class="content">
                  <span class="title"><?php echo $value['category_name'] ?></span>
                 <!--  <span class="category">Mobile / Design / Rebranding</span> -->
                </div>
                <div class="image">
                  <img src="<?php echo base_url($value['category_image_path'])  ?>" data-src="<?php echo base_url($value['category_image_path'])  ?>" alt="" />
                </div>
              </a> 
         <?php  }  ?> 
        </div>  
        </div>
      </div> 