<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Test</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Test</a></li>
            <li class="active"><a href="#">View</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        
            <div class="general-info info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab fa-product-hunt"></i> View Test</span></h4>
                            </div>
                            <form method="post" action="<?php echo base_url().'/test/edit'?>" style="margin-right: -643px;">
                                  <input type="hidden" name="id" value="<?php echo $test['test_id'] ?>">
                                  <button type="submit" class="btn btn-fill btn-fill-warning mr-2"><i class="fas fa-pencil-alt"></i> Edit Test</button>
                            </form>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/test/list"> <i class="fa fa-list"></i> List Test</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row mb-5 post-content">
                                            <div class="col-md-12 order-md-0 order-1">
                                               
                                                <p class="post-text"><label>Testing Parameter Name :</label> <?php echo $test['test_name']?></p>
                                             
                                                
                                               
                                            </div>
                                            
                      </div>
                    </div>  
                </div>
            </div>
      
      </div>
    </div>
  </div>
</div>
<!--  END CONTENT PART  -->
</div>
<!-- END MAIN CONTAINER -->  
                     