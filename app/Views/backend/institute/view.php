<?php 

use App\Libraries\Simple;
$this->simple=new Simple();
?>
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Institute</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Institute</a></li>
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
                               <h4 class="card-title"> <span class="caption-subject text-uppercase white ml-1"> <i class="fa fa-eye"></i> View Institute</span></h4>
                            </div>

                                 <form method="post" action="<?php echo base_url().'/institute/edit'?>" style="margin-right: -510px;">
                                  <input type="hidden" name="id" value="<?php echo $institute['institute_id'] ?>">
                                  <button type="submit" class="btn btn-fill btn-fill-warning mr-2"><i class="fas fa-pencil-alt"></i> Edit Institute</button>
                                </form> 
                            <div class="actions align-self-center">
                                <a class="btn btn-fill btn-fill-warning mr-2" href="<?php echo base_url(); ?>/institute/list"> <i class="fa fa-list"></i> List Institute</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row mb-5 post-content"> 
                        <div class="col-md-6 order-md-0 order-1">
                                               
                                                <p class="post-text"><label>Institute Name : </label> <?php echo $institute['institute_name']?> </p>
                                                <p class="post-text"><label>Contact Person Name : </label> <?php echo $institute['institute_contact_person']?> </p>
                                                <p class="post-text"><label>Email ID : </label> <?php echo $institute['institute_email']?> </p>
                                                <p class="post-text"><label>Phone No : </label> <?php echo $institute['ins_phone_no']?> </p>
                                              
                         </div>
                       
                        <div class="simple col-md-6">
                                                <p  class="post-text"><label>Institute Type : </label> <?php echo $institute['institute_type'] .' Institute'?> </p></label>
                                                  </p>
                                                 <?php 
                                                  if($institute['institute_type']=="Education")
                                                   { ?>
                                                    <p  class="post-text"><label>Institute Course : </label> <?php echo   implode(",",explode(",", $institute['ins_course']))?> </p></label>

                  
                                                   <?php } 
                                                   else 
                                                   { 

                                                     $test_id=explode(",",$institute['test_id']);
                                                     $test_name='';
                                                    foreach ($test_id as $key => $value) 
                                                     {
                                                       $fetch_test_name= $this->simple->fetch_test_name($value);
                                                       if($key==0)
                                                       {
                                                           $test_name=$fetch_test_name[0]['test_name'];
                                                       }
                                                       else
                                                       {
                                                           $test_name.=','.$fetch_test_name[0]['test_name']; 
                                                       } 
                                                     
                                                    }
                                                   echo '<p  class="post-text"><label>Testing Parameter : </label>'.$test_name.'</p></label>';
                                                      
                                                   }?> 

                                                 <p  class="post-text"> <label>Mobile No. : </label> <?php echo $institute['institute_mobile'] ?> </p>
                                                 <p class="post-text"><label>Website : </label> <?php echo $institute['institute_website'] ?> </p>
                                             
                                                
                        </div>
                         <?php if($institute['institute_image']!='') { ?>
                                             <div class="simple col-md-6">
                                                <p class="mb-5 s-text"><label>Institute Logo :</label>
                                                  </p>
                                                <a class="image-popup-vertical-fit" href="<?php echo base_url().'/'.$institute['institute_image'] ?>">
                                                    <img alt="image-gallery" src="<?php echo base_url().'/'.$institute['institute_image'] ?>" class="img-fluid mb-4" width="150" height="100" >
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