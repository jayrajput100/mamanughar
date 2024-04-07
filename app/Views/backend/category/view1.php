<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Category</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Category</a></li>
            <li class="active"><a href="#">View</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <form class="needs-validation general-info" novalidate id="form">
            <input type="hidden" id="id" name="id" value="<?php echo $category['category_id'] ?>">
            <div class="info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab fa-product-hunt"></i> View Category</span></h4>
                            </div>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/category/list"> <i class="fa fa-list"></i> List Category</a>
                            </div>
                        </div>
                    </div>
                                    
                    <div class="card-body">
                        <div class="row">
                          <div class="col-lg-6 mb-4">
                            <blockquote class="blockquote">
                              <p> <label>Category Name :</label> <?php echo $category['category_name']?> </p>
                            </blockquote>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-lg-6 mb-4">
                            <blockquote class="blockquote">
                              <p><label>Category Description :</label> <?php echo $category['category_desc']?> </p>
                            </blockquote>
                          </div>
                        </div>
                        <?php if($category['category_image_path']!='') { ?>
                          <div class="row">
                            <div class="col-lg-6 mb-4">
                              <blockquote class="blockquote">
                                <p><label> Category Image :</label> </p><br/>
                                <img class="mr-sm-3 mr-2 usr-img" src="<?php echo base_url().'/'.$category['category_image_path'] ?>" alt="usr-img" width="100px;" height="100px">
                              </blockquote>
                            </div>  
                          </div> 
                        <?php } ?>
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