<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>User</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">User</a></li>
            <li class="active"><a href="#">View</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        
            <div class=" general-info info">
                <div class="card card-theme">
                    <div class="card-heading">
                        <div class="portlet-title portlet-warning d-flex justify-content-between">
                            <div class="caption  align-self-center">
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fab fa-product-hunt"></i> View User</span></h4>
                            </div>
                            <form method="post" action="<?php echo base_url().'/user/edit'?>" style="margin-right: -610px;">
                                  <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                                  <button type="submit" class="btn btn-fill btn-fill-warning mr-2"><i class="fas fa-pencil-alt"></i> Edit User</button>
                                </form>
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/user/list"> <i class="fa fa-list"></i> List User</a>
                            </div>
                        </div>
                    </div>
                                    
                    <div class="card-body">
                        <div class="row mb-5 post-content"> 
                        <div class="col-md-6 order-md-0 order-1">
                                               
                                                <p class="post-text"><label>Name :</label> <?php echo $user['fname']?>  <?php echo $user['lname']?></p>
                                                <p class="post-text"><label>Email :</label> <?php echo $user['email']?> </p>
                                                <p class="post-text"><label>Mobile :</label> <?php echo $user['mobile']?> </p>
                                              
                         </div>
                       
                        <div class="simple col-md-6">
                                                <p class="post-text"><label>Company Name :</label> <?php echo $user['company_name']?> </p>
                                                <p  class="post-text"><label>Gender :</label> <?php echo $user['gender']?> </p>
                                                  </p>
                                                 <p  class="post-text"> <label>Address :</label> <?php echo $user['address']?> </p>
                                                
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