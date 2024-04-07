<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Innovation</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Innovation</a></li>
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
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-eye"></i> View Innovation</span></h4>
                            </div>
                            <form method="post" action="<?php echo base_url().'/innovaction/edit'?>" style="margin-right: -410px;">
                                  <input type="hidden" name="id" value="<?php echo $innovaction['innovaction_id'] ?>">
                                  <button type="submit" class="btn btn-fill btn-fill-warning mr-2"><i class="fas fa-pencil-alt"></i> Edit Innovation</button>
                                </form>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/innovaction/list"> <i class="fa fa-list"></i> List Innovation</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row mb-5 post-content"> 
                        <div class="col-md-6 order-md-0 order-1">
                                               
                                                <p class="post-text"><label>Title : </label> <?php echo $innovaction['innovaction_title']?> </p>
                                                <p class="post-text"><label>Description : </label> <?php echo $innovaction['innovaction_description']?> </p>
                                                <?php $supplier= $this->simple->fetch_supplier_details1($innovaction['supplier_id']); ?>
                                                <p class="post-text"><label>Supplier Name : </label> <?php echo $this->simple->fetch_supplier_name($innovaction['supplier_id'])?> </p>
                                                <p class="post-text"><label>Supplier Email ID : </label> <?php echo $supplier['email'] ?> </p>
                                                <p class="post-text"><label>Supplier Location : </label> <?php echo $supplier['location'] ?> </p>
                         </div>
                        <?php if($innovaction['innovaction_image']!='') { ?>
                        <div class="simple col-md-6">
                                                <p class="mb-5 s-text"><label> Image : </label>
                                                  </p>
                                                <a class="image-popup-vertical-fit" href="<?php echo base_url().'/'.$innovaction['innovaction_image'] ?>">
                                                    <img alt="image-gallery" src="<?php echo base_url().'/'.$innovaction['innovaction_image'] ?>" class="img-fluid mb-4" width="150" height="100" >
                                                </a>
                                                
                                            </div>
                        <?php  } ?>  
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