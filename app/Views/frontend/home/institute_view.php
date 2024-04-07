<?php
use App\Libraries\Simple;
$simple=new Simple();
?>

		
	    	<?php
	    	
	    		
	    	foreach ($institute as $key => $value) 
	    	{ 
             
	    		?>
	    	
	    	
	        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6" >
	            <div class="strip">
	                <figure>
	                    <span class="ribbon off"><?php echo $value['institute_type']  ?></span>
	                     <?php if($value['institute_image']!='') { ?>
                                     <img src="<?= base_url($value['institute_image'])?>" data-src="" class="img-fluid lazy loaded" alt="" style="opacity: 1;">
                         <?php } else{ ?>
                            <img src="/public/front-theme/img/mag_icon.png" data-src="/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
                        <?php } ?> 

                        
	                  
                         
	                    <a href="#" id="sign-in"  class="strip_info" >
	                    
	                        <div class="item_title">

	                            <h3><?php echo $value['institute_name'] ?></h3>
	                          
	                        </div>
	                    </a>
	                </figure>
	                <ul>
	                    <li><span></span></li>
	                   
	                </ul>
	            </div>
	        </div>
	       <?php } ?>


	   