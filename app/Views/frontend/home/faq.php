<?= $this->extend('frontend/layout/front_layout2')?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<?= $this->section('content')?>

<div class="bg_gray margin_160_40">
			<div class="container margin_60_40">
				<div class="main_title center">
				    <span><em></em></span>
				    <h2>FAQ</h2>
				    
				</div>

				<div role="tablist" class="add_bottom_15 accordion_2" id="accordion_group">
			        
			         <?php 
			            foreach ($faq as $key => $value) 
			            { ?>
			            
			               <div class="card">
                             <div class="card-header" role="tab">
                                 <h5>
                                     <a data-toggle="collapse" href="#question<?php echo $key+1; ?>" aria-expanded="false" class="collapsed"><i class="indicator icon_plus"></i><?php echo $key+1; ?> : <?php echo $value['question']?> </a>
                                 </h5>
                             </div>
                             <div id="question<?php echo $key+1; ?>" class="collapse" role="tabpanel" data-parent="#accordion_group" style="">
                                 <div class="card-body">
                                      <p><?php echo $value['answer']?></p> 
                                 </div>
                             </div>
                         </div>
                           
			          
			            <?php   } ?>
			       
       
        
    </div>
			</div>
			<!-- /container -->
		</div>

<?= $this->endSection('content')?>