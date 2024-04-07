<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Gallery</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Gallery</a></li>
            <li class="active"><a href="#">View</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
            <input type="hidden" id="id" name="id" value="<?php echo $gallery['gallery_id'] ?>">
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab fa-product-hunt"></i> View Gallery Image</span></h4>
                            </div>
                            <div class="actions align-self-center">
                                
                                


                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/sl/gallery/list"> <i class="fa fa-list"></i> List Gallery</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row mb-5 post-content">
                                            <div class="col-md-6 order-md-0 order-1">
                                               
                                                <p class="post-text"><label>Gallery Image Name :</label> <?php echo $gallery['gallery_image_name']?></p>
                                                
                                                
                                               
                                            </div>
                                             <?php if($gallery['gallery_image_path']!='') { ?>
                                             <div class="simple col-md-6">
                                                <p class="mb-5 s-text"><label>Gallery Image :</label>
                                                  </p>
                                                <a class="image-popup-vertical-fit" href="<?php echo base_url().'/'.$gallery['gallery_image_path'] ?>">
                                                    <img alt="image-gallery" src="<?php echo base_url().'/'.$gallery['gallery_image_path'] ?>" class="img-fluid mb-4" width="150" height="100" >
                                                </a>
                                                
                                            </div>
                                          <?php } ?>
                      </div>
                    </div>  
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  END CONTENT PART  -->
</div>
<!-- END MAIN CONTAINER -->  
                     