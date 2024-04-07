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
				                <li><a href="#">Home</a></li>
				                <li><a href="#">Search Result</a></li>
				                
				            </ul>
		       	 		</div>
		        		<h1><?php echo isset($supplier)?count($supplier):'' ?> Supplier
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
     if(isset($supplier))
     {
     	 if(is_array($supplier) && count($supplier))
     	 { 

            foreach ($supplier as $key => $value) 
	    	{
              $business_category1[]=$value['business_category'];   
            }
            //print_r($business_category1); 

     	 	?>

    <input type="hidden" name="subcategory_id" id="subcategory_id" value="<?php echo $subcategory_id ?>">
    <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id ?>"> 	 
	<div class="container margin_30_40">
	    <div class="row">
           <aside class="col-lg-3" id="sidebar_fixed" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
					
					
				<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="clearfix">
					<div class="sort_select">
							<select name="sort" id="sort" onchange="filter()">
                                <option value="asc" selected="selected">Sort by Ascending</option>
                                <option value="desc">Sort by Descending</option>
                                <option value="new">Sort by newness</option>
                                
							</select>
						</div>
						<!-- <a href="#0" class="open_filters btn_filters"><i class="icon_adjust-vert"></i>
							<span>Filters</span></a> -->
					</div>
					<div class="filter_col">
						<div class="inner_bt">
							<a href="#" class="open_filters"><i class="icon_close"></i></a>
						</div>
						<div class="filter_type">
							<h4><a href="#filter_2" data-toggle="collapse" class="opened">Business Category</a></h4>
							<div class="collapse show" id="filter_2">
								<?php 
								 $Business_Category=$simple->Business_Category();
								?>
								<ul>
									<?php 
									foreach ($Business_Category as $key => $value) 
									{ 
                                     $checked='';
                                     //echo $value;
                                     if(in_array($key,$business_category1))
                                     {
                                      $checked="checked"; 

                                     }


										?>
										<li>
									        <label class="container_check"><?php echo $value ?><small></small>
									            <input type="checkbox" name="business_category[]" value="<?php echo $key ?>" onclick="filter()" <?php echo $checked ?>>
									            <span class="checkmark"></span>
									        </label>
									    </li>
									<?php } ?>
								    
								   
								</ul>
							</div>
						</div>
						<div class="filter_type">
							<h4><a href="#filter_1" data-toggle="collapse" class="opened">Sub Categories</a></h4>
							<div class="collapse show" id="filter_1">
								
								<ul>
								 <?php 
								   if(isset($sub_cat))
								   {
								   	if(is_array($sub_cat) && count($sub_cat)>=1)
								   	{
								   		foreach ($sub_cat as $key => $value) 
								   		{ ?>
								   		<li>
									        <label class="container_check"> <?php echo $value['sub_cat_name'] ?><small></small>
									            <input type="checkbox" name="sub_cat_id[]" value="<?php echo $value['subcategory_id'] ?>" <?php echo ($value['subcategory_id']==$subcategory_id)?"checked":'' ?> onclick="filter()">
									            <span class="checkmark"></span>
									        </label>
								        </li>
								   		
								   		<?php }
								   	}	
								   } 
								  ?> 	
								    
								   
								</ul>
							</div>
							<!-- /filter_type -->
						</div>
						<!-- /filter_type -->
						
						
						<!-- /filter_type -->
						<!-- <div class="buttons">
							<a href="#0" class="btn_1 full-width">Filter</a>
						</div> -->
					</div>
					
				</div>
				</aside>
	    <div class="col-lg-9">
	    	<div class="row" id="filter_chng">
	    	<?php
	    	
	    		
	    	foreach ($supplier as $key => $value) 
	    	{ 
               
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
	    	
	    	
	        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6" <?php echo $url ?>>
	            <div class="strip">
	                <figure>
	                    <span class="ribbon off"><?php echo $simple->fetch_city_name($value['city_id'])  ?></span>
	                     <?php if($value['supplier_image']!='') { ?>
                                     <img src="<?= base_url($value['supplier_image'])?>" data-src="<?= base_url($value['supplier_image'])?>" class="img-fluid lazy loaded" alt="" style="opacity: 1;">
                         <?php } else{ ?>
                            <img src="<?= base_url();?>/public/front-theme/img/mag_icon.png" data-src="<?= base_url();?>/public/front-theme/img/mag_icon.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;height: 195px;width: 195px">
                        <?php } ?> 

                        
	                  
                         
	                    <a href="#"  class="strip_info" >
	                     <small><?php echo $simple->fetch_business_category_name($value['business_category'])  ?></small>
	                        <div class="item_title">

	                            <h3><?php echo $value['supplier_name'] ?></h3>
	                           
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
	
	</div>
	<!-- /container -->
  <?php  
      }
      else
     { ?>
       <div class="container ">
	    <div class="row">
	      <div class="banner version_2">
				<div class="wrapper d-flex align-items-center opacity-mask justify-content-center text-center" data-opacity-mask="rgba(0, 0, 0, 0)" style="background-color: rgba(0, 0, 0, 0);">
					<div>
						<img src="<?= base_url();?>/public/front-theme/img/logo.png" width="200" height="100" alt="" class="logo_normal">
						
						<p style="color:#f7941d">Go to Contact us or email us on admin@packagio.in to get the supplier information for this category. </p>
						<a href="<?php echo base_url() ?>/contact" class="btn_1 ">Contact Us</a>
					</div>
				</div>
				<!-- /wrapper -->
			</div>
	    </div>
	   </div> 	

     <?php } 
    
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
