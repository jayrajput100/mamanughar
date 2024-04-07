<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Third Subcategory</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Third Subcategory</a></li>
            <li class="active"><a href="#">View</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <div class="general-info">
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-eye"></i> Third Subcategory</span></h4>
                            </div>
                            <form method="post" action="<?php echo base_url().'/third_subcategory/edit'?>" style="margin-right: -338px;">
                                  <input type="hidden" name="id" value="<?php echo $third_subcategory['third_subcategory_id'] ?>">
                                  <button type="submit" class="btn btn-fill btn-fill-warning mr-2"><i class="fas fa-pencil-alt"></i> Edit Third Subcategory</button>
                            </form> 
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/third_subcategory/list"> <i class="fa fa-list"></i> List Third Subcategory</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row mb-5 post-content"> 
                        <div class="col-md-6 order-md-0 order-1">
                                               
                                                <p class="post-text"><label>Name : </label> <?php echo $third_subcategory['third_subcategory_name']?> </p>
                                                <p class="post-text"><label>Sub Category Name : </label> <?php echo $third_subcategory['sub_cat_name']?> </p>
                                                <p class="post-text"><label>Category Name : </label> <?php echo $third_subcategory['category_name']?> </p>
                                                <p class="post-text"><label>Description : </label> <?php echo $third_subcategory['description']?> </p>
                         </div>
                        <?php if($third_subcategory['image_path']!='') { ?>
                                               <div class="simple col-md-6">
                                                <p class="mb-5 s-text"><label>Third Subcategory Image :</label>
                                                  </p>
                                                <a class="image-popup-vertical-fit" href="<?php echo base_url().'/'.$third_subcategory['image_path']?>">
                                                    <img alt="image-gallery" src="<?php echo base_url().'/'.$third_subcategory['image_path']?>" class="img-fluid mb-4" width="150" height="100" >
                                                </a>
                                                
                                            </div>
                        <?php } ?>  
                      </div> 
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>