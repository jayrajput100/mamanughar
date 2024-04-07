<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>exhibition</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">exhibition</a></li>
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
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-eye"></i> View Exhibition</span></h4>
                            </div>
                            <form method="post" action="<?php echo base_url().'/exhibition/edit'?>" style="margin-right: -500px;">
                                  <input type="hidden" name="id" value="<?php echo $exhibition['exhibition_id'] ?>">
                                  <button type="submit" class="btn btn-fill btn-fill-warning mr-2"><i class="fas fa-pencil-alt"></i> Edit Exhibition</button>
                            </form>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/exhibition/list"> <i class="fa fa-list"></i> List exhibition</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row mb-5 post-content"> 
                        <div class="col-md-6 order-md-0 order-1">
                                               
                                                 <p class="post-text"><label>Name : </label> <?php echo $exhibition['exhibition_name']?> </p>
                                                <p class="post-text"><label>Venue : </label> <?php echo $exhibition['exhibition_venue']?> </p>
                                                <p class="post-text"><label>City : </label> <?php echo $exhibition['exhibition_city']?> </p>

                                                <p class="post-text"><label>From Date(With Time) : </label> <?php echo $exhibition['exhibition_from_date']?> </p>
                                                <p class="post-text"><label>To Date(With Time) : </label> <?php echo $exhibition['exhibition_to_date']?> </p>
                                              
                         </div>
                        <?php if($exhibition['exhibition_logo']!='') { ?>
                        <div class="simple col-md-6">
                                                <p class="mb-5 s-text"><label>Logo :</label>
                                                  </p>
                                                <a class="image-popup-vertical-fit" href="<?php echo base_url().'/'.$exhibition['exhibition_logo'] ?>">
                                                    <img alt="image-gallery" src="<?php echo base_url().'/'.$exhibition['exhibition_logo'] ?>" class="img-fluid mb-4" width="150" height="100" >
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
</div>