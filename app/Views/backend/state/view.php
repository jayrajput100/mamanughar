<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>State</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">State</a></li>
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
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-eye"></i> View State</span></h4>
                            </div>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/state/list"> <i class="fa fa-list"></i> List State</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12 mb-4">
                            <blockquote class="blockquote">
                              <p> <label>State Name : </label> <?php echo $state['state_name']?> </p>
                            </blockquote>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 mb-4">
                            <blockquote class="blockquote">
                              <p> <label>State Description : </label> <?php echo $state['note']?> </p>
                            </blockquote>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 mb-4">
                            <blockquote class="blockquote">
                              <p><label> Country Name : </label> <?php echo $state['country_name']?> </p>
                            </blockquote>
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