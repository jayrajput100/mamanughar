<?php
use App\Libraries\Simple;
$simple=new Simple();
?>


<?php
//echo '<pre>';
//echo 'LINE: ' . __LINE__ . ' Module ' . __CLASS__ . '<br>';
//var_dump($supplier);
//echo '</pre>';
?>
<?php
	    	
	    		
	    	foreach ($supplier as $key => $value) 
	    	{ 
              
	    		?>
	    	
	    	
	        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6" >
	            <div class="strip">
	                <figure>
	                    <span class="ribbon off"><?php echo $simple->fetch_city_name($value['city_id'])  ?></span>
	                     <?php if($value['supplier_image']!='') { ?>
                                     <img src="<?= base_url($value['supplier_image'])?>" data-src="<?= base_url($value['supplier_image'])?>" class="img-fluid lazy loaded" alt="" style="opacity: 1;">
                         <?php } else{ ?>
                             <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
                        <?php } ?> 

                        
	                  
                         
	                    <a href="#" id="sign-in"  class="strip_info" >
	                     <small><?php echo $simple->fetch_business_category_name($value['business_category'])  ?></small>
	                        <div class="item_title">

	                            <h3><?php echo $value['supplier_name'] ?></h3>
	                            <small><?php echo $simple->str_rep($value['supplier_description'])  ?></small>
	                        </div>
	                    </a>
	                </figure>
	                <ul>
	                    <li><span></span></li>
	                   
	                </ul>
	            </div>
	        </div>
	       <?php } ?>
      