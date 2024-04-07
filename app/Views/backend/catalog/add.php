<style type="text/css">
   .dz-preview .dz-image img{
        width: 100% !important;
        height: 100% !important;
        object-fit: cover;
      }
       #upload-label i:hover {
  color: #444;
  font-size: 9.4rem;
  -webkit-transition: width 2s;
}
#uploadlabel,#uploadlabel h3,#uploadlabel i:hover {
    cursor: pointer !important;
}
#uploadlabel
{
 border:1px dashed #121213
}
</style>
<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h3>Catalog</h3>
        <div class="crumbs">
          <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Catalog</a></li>
            <li class="active"><a href="#">Add</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 layout-spacing col-md-12">
        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Catalog </h4>
                                    </div>      
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form class="dropzone-file-area1 dropzone dropzone-file-area--success dz-clickable" action="<?php echo base_url() ?>/sl/catalog/add" id="dropzone-file-area-one" id="catalog">
                                    <h3 class="dropzone-file-area__msg-title">Multiple File Upload.</h3> 
                                    
                                      <div class="needsclick dz-clickable" id="uploadlabel">
                                        
                                        <i class="flaticon-file-upload-line d-block mt-3 mb-3"></i>
                                      
                                    </div>    
                                   
                                    
                                </form>
                            </div>
                        </div>
      </div>
    </div>
  </div>
</div>
<!--  END CONTENT PART  -->
</div>
<!-- END MAIN CONTAINER -->