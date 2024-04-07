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
				                <li><a href="#">Search Result</a></li>
				                
				            </ul>
		       	 		</div>
		        		 <h1><?php echo isset($institute)?count($institute):'' ?> Institute
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
         //print_r($institute);  
	     if(isset($institute))
	     {
	     	 if(is_array($institute) && count($institute)>0)
	     	 { 
               
               //print_r($institute);
	           foreach ($institute as $key => $value) 
	           {
	           	  if($institute[0]['institute_type']=="Testing")
                  {
	           	    $types1[$key]=explode(',',$value['test_id']);
 
	           	  }
	           	  else
	           	  {
                   $types1[$key]=explode(',',$value['ins_course']);
                   //json_decode($value['ins_course'],true);  	           	  	
	           	  }	
	           }
	           
	           foreach ($types1 as $key => $value) 
	           {
	           	 if(isset($value) && count($value) >0)
	           	 { 
	           	  foreach ($value as $k => $v) 
	           	  {
	           	  	$types1[]=$v;
	           	  }
	           	 } 
	           }
	            
	          
	                
      	 	?>
    <input type="hidden" name="institute_type" id="institute_type" value="<?php echo isset($institute[0]['institute_type'])?$institute[0]['institute_type']:'' ?>">  	 	
   
	<div class="container margin_30_40">
	    <div class="row">
           <aside class="col-lg-3" id="sidebar_fixed" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
					
					
				<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="clearfix">
					<div class="sort_select">
							<select name="sort" id="sort" onchange="filter_institute()">
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
							<h4><a href="#filter_2" data-toggle="collapse" class="opened">
							<?php 
                               if(isset($institute[0]['institute_type'])=="Testing")
                               {
                               	echo "Testing Types";
                               }
                               else
                               {
                               	echo "Types OF Courses";
                               }
   
							?></a></h4>
							<div class="collapse show" id="filter_2">
								<?php 
								 
	                               $types=$simple->institute_type($institute[0]['institute_type']);
	                              
								?>
								<ul>
									<?php 
									foreach ($types as $key => $value) 
									{ 
                                     $checked='';
                                     //print_r($value['test_id']);
                                    /*$types1=json_decode($types,true);*/
                                    if(isset($institute[0]['institute_type'])=="Testing")
                                    { 
                                     if(in_array($value['test_id'],$types1))
                                     {
                                       //echo 'hi';	
                                      $checked="checked"; 

                                     }

                                    }
                                    else
                                     {
                                     	if(in_array($key,$types1))
	                                     {
	                                       //echo 'hi';	
	                                      $checked="checked"; 

	                                     }
                                     	
                                     } 
                              

										?>
										<li>
									        <label class="container_check"><?php 
									        
                                           if(isset($institute[0]['institute_type'])=="Testing")
                                           {
									         echo $value['test_name'];
									       }
									       else
									       {
									       	echo $value;
									       }   

									        ?><small></small>
									            <input type="checkbox" name="institute_type[]" value="<?php 
									            

									           if(isset($institute[0]['institute_type'])=="Testing")
	                                           {
										         echo $value['test_id'];
										       }
										       else
										       {
										       	echo $key;
										       }

									             ?>" onclick="filter_institute()" <?php echo $checked ?>>
									            <span class="checkmark"></span>
									        </label>
									    </li>
									<?php } ?>
								    
								   
								</ul>
							</div>
						</div>
						
						
						
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
                            <img src="/public/front-theme/img/logo1.png" data-src="/public/front-theme/img/logo1.png" class="img-fluid lazy loaded" alt="" style="opacity: 1;">
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


	        
	    </div>
	    <!-- /row -->
	    
	</div>
  	      <?php 
  	       }
  	       else
  	       { ?>

  	       	
  	<div class="container">
	    <div class="row">
	      <div class="banner version_2">
				<div class="wrapper d-flex align-items-center opacity-mask justify-content-center text-center" data-opacity-mask="rgba(0, 0, 0, 0)" style="background-color: rgba(0, 0, 0, 0);">
					<div>
						<img src="<?= base_url();?>/public/front-theme/img/logo.png" width="200" height="100" alt="" class="logo_normal">
						
						<p style="color:#f7941d">Go to Contact us or email us on admin@packagio.in to get the supplier information for this Institute. </p>
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

	 
    </script>
<?= $this->endSection('content')?>
