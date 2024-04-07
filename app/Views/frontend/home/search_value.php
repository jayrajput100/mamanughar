<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<?= $this->extend('frontend/layout/front_layout2')?>
<?= $this->section('content')?>
<style type="text/css">
	.badge-new {
    color: #fff;
    background-color: #f8538d;
}
.badge {
    font-weight: 600;
    line-height: 1.4;
    padding: 3px 6px;
    font-size: 12px;
    font-weight: 600;
}
.mb-2, .my-2 {
    margin-bottom: .5rem!important;
}
.ml-2, .mx-2 {
    margin-left: .5rem!important;
}
</style>
<?php 


?>
<main class="margin_160_40">
		<div class="page_header element_to_stick">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
		    			<div class="breadcrumbs">
				            <ul>

				                <li><a href="<?php echo base_url() ?>/home">Home</a></li>
				                <?php 
				                if(isset($sub_cat) && count($sub_cat)>0)
				                { ?>
                                   <li><a href="<?php echo base_url() ?>/category/subcategory/<?php echo $sub_cat[0]['category_id']  ?>" style="color:#f7941d"><?php echo $simple->json_decode_str_cat($sub_cat[0]['category_id']); ?></a></li>

				               <?php }
				                 if(isset($third_sub_cat) && count($third_sub_cat)>0)
				                 { 
                                   //print_r($third_sub_cat);  
				                 	?>
				                 	 <li><a href="<?php echo base_url() ?>/category/subcategory/<?php echo $third_sub_cat[0]['category_id']  ?>" ><?php echo $simple->json_decode_str_cat($third_sub_cat[0]['category_id']); ?></a></li>
				                	  <li><a href="<?php echo base_url() ?>/particular_third_sub_cat/<?php echo $third_sub_cat[0]['subcategory_id']  ?>" style="color:#f7941d"><?php echo $simple->json_decode_str_sub_cat($third_sub_cat[0]['subcategory_id']); ?></a></li>
				                <?php }
				                 if(isset($supplier) && count($supplier) > 0 )
				                 { ?>
                                        <li><a href="#" style="color:#f7941d"><?php echo $supplier[0]['supplier_name']; ?></a></li>
				                <?php  }	
				                 ?>	
				                
				                
				            </ul>
		       	 		</div>
		        		<h1>
		        		 </h1>
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
		<!-- /page_header -->

		
    <?php 
     if(isset($sub_cat))
     {
     	 if(is_array($sub_cat) && count($sub_cat))
     	 { ?>

     	 
	<div class="container margin_30_40">
	    <div class="row">
            
	    	<div class="col-lg-12">
	    		<div class="row">
	    	<?php
	    	$sess_data=session()->get('user_session');
	    	//print_r($sess_data);
	    		
	    	foreach ($sub_cat as $key => $value) 
	    	{ 
              //var_dump($value['product_image']);
               $url='';
		    	if(isset($sess_data['user_id']))
		    	{
		    		$url="next_step('".$value['subcategory_id']."_".$value['category_id']."')";
		    	}
		    	else
		    	{
		    		$url="signin()";
		    	}   
	    		?>
	    	
	    	
	        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" onclick="<?php echo $url ?>">
	            <div class="strip">
	                <figure>
	                   
	                     <?php if($value['sub_cat_image_path']!='') { ?>
                                     <img src="<?= base_url($value['sub_cat_image_path'])?>" data-src="<?= base_url($value['sub_cat_image_path'])?>" class="img-fluid lazy loaded" alt="" style="opacity: 1;height:210px;object-fit: contain;">
                         <?php } else{ ?>
                           <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
                        <?php } ?> 

                        
	                  
                         
	                    <a href="#" id="sign-in"  class="strip_info" >
	                     
	                        <div class="item_title">
	                            <h3><?php echo $value['sub_cat_name'] ?></h3>
	                           <small><?php echo $simple->json_decode_str_cat($value['category_id']) ?></small>
	                        </div>
	                    </a>
	                </figure>
	                <ul>
	                    <li><span></span></li>
	                   
	                </ul>
	            </div>
	        </div>
	       <?php } ?>


	        
	    </div>
	    <!-- /row -->
	    
	</div>
	 </div>
	 <?= $pager->links() ?>
	</div>
	<!-- /container -->
  <?php  
      }	
     } 
     ?>
      <?php 
     if(isset($third_sub_cat))
     {
     	 if(is_array($third_sub_cat) && count($third_sub_cat))
     	 { ?>

     	 
	<div class="container margin_30_40">
	    <div class="row">
            
	    	<div class="col-lg-12">
	    		<div class="row">
	    	<?php
	    	$sess_data=session()->get('user_session');
	    	//print_r($sess_data);
	    	//print_r($third_sub_cat);	
	    	foreach ($third_sub_cat as $key => $value) 
	    	{ 
              //var_dump($value['product_image']);
               $url='';
		    	if(isset($sess_data['user_id']))
		    	{
		    		$url="next_step_third('".$value['third_subcategory_id']."_".$value['subcategory_id']."_".$value['category_id']."')";
		    	}
		    	else
		    	{
		    		$url="signin()";
		    	}   
	    		?>
	    	
	    	
	        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" onclick="<?php echo $url ?>">
	            <div class="strip">
	                <figure>
	                    
	                     <?php if($value['image_path']!='') { ?>
                                     <img src="<?= base_url($value['image_path'])?>" data-src="<?= base_url($value['image_path'])?>" class="img-fluid lazy loaded" alt="" style="opacity: 1;height:210px;object-fit: contain;">
                         <?php } else{ ?>
                            <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
                        <?php } ?>  
                        
                       

                        
	                  
                         
	                    <a href="#" id="sign-in"  class="strip_info" >
	                     
	                        <div class="item_title">
	                            <h3><?php echo $value['third_subcategory_name'] ?></h3>
	                            <small><?php echo $simple->json_decode_str_cat($value['category_id'])  ?></small>
	                        </div>
	                    </a>
	                </figure>
	                <ul>
	                    <li><span></span></li>
	                   
	                </ul>
	            </div>
	        </div>
	       <?php } ?>


	        
	    </div>
	    <!-- /row -->
	    
	</div>
	 </div>
	 <?= $pager->links() ?>
	</div>
	<!-- /container -->
  <?php  
      }	
     } 
     ?>
     <?php 
     if(isset($supplier))
     {
     	 if(is_array($supplier) && count($supplier))
     	 { ?>

     	 
	<div class="container margin_30_40">
	    <div class="row">
          
	    	<div class="col-lg-12">
	    		<div class="row">
	    	<?php
	    	
	    	foreach ($supplier as $key => $value) 
	    	{ ?>
	    	
	    	
	        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
	            <div class="strip">
	                <figure >
	                    <span class="ribbon off"><?php echo $simple->fetch_city_name($value['city_id']); ?></span>
	                     <?php if($value['supplier_image']!='') { ?>
                                     <img src="<?= base_url($value['supplier_image'])?>" data-src="<?= base_url($value['supplier_image'])?>" class="img-fluid lazy loaded" alt="" style="opacity: 1;height:210px;object-fit: contain;">
                         <?php } else { ?>
                            <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
                        <?php } ?> 
	                  
                        <?php 
                        $user=session()->get('user_session');
                        //var_dump($user);
                       /* $url= isset($user)? base_url().'/supplier/view_supplier/'.$value['id']:base_url().'/signin';*/
                        $url='';
				    	if(isset($user))
				    	{
				    		$url="onclick='view_supplier(".$value['id'].")'";
				    	}
				    	else
				    	{
				    	    $pass_data=[
				    	      'url'=>'view_supplier',
				    	      'supplier_id'=>$value['id']	
				    	    ];
				    	    session()->set('pass_data',$pass_data);
				    		$url="onclick='signin()'";
				    	} 
                        ?> 
	                    <a href="#" class="strip_info" <?php echo $url ?>>
	                        <small><?php echo $simple->fetch_business_category_name($value['business_category'])  ?></small>
	                        <div class="item_title">
	                            <h3><?php  echo  $value['supplier_name']; ?></h3>
	                          
	                        </div>
	                    </a>
	                </figure>
	               
	            </div>
	        </div>
	       <?php } ?>


	        
	    </div>
	    <!-- /row -->
	    
              
               
	</div>
	 </div>
	 <?= $pager->links() ?>
	</div>
	<!-- /container -->
  <?php  
      }	
     } 
     ?>

	</main>
	<!-- /main -->
	<script type="text/javascript">
	 function signin()
	 {
	 	swal({
                title: "Please Login as User to see the supplier Details !",
        			    type: 'success',
        			    padding: '2em'
              }).then(function(result) {
                window.location.href=base_url+"/"+"signin";
              });
	 }
	 function next_step(subcategory_id)
	 {
	 	//alert(subcategory_id);
        window.location.href=base_url+"/"+"next_step_supplier/"+subcategory_id;

	 }
	 function next_step_third(id)
	 {
	 	//alert(subcategory_id);
        window.location.href=base_url+"/"+"next_step_third_supplier/"+id;

	 }
    </script>
<?= $this->endSection('content')?>
