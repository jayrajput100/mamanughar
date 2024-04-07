<!--  BEGIN FOOTER  -->
    <footer class="footer-section theme-footer">

        <div class="footer-section-1  sidebar-theme">
            
        </div>

        <div class="footer-section-2 container-fluid">
            <div class="row">
                <div id="toggle-grid" class="col-xl-7 col-md-6 col-sm-6 col-12 text-sm-left text-center">
                  <!--  <ul class="list-inline links ml-sm-5">
                        <li class="list-inline-item mr-3">
                            <a href="javascript:void(0);">Home</a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="javascript:void(0);">Blog</a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="javascript:void(0);">About</a>
                        </li>
                        
                    </ul>-->
                </div>
                <div class="col-xl-5 col-md-6 col-sm-6 col-12">
                    <ul class="list-inline mb-0 d-flex justify-content-sm-end justify-content-center mr-sm-3 ml-sm-0 mx-3">
                        <li class="list-inline-item  mr-3">
                            <p class="bottom-footer">&#xA9; 2020 <a target="_blank" href="#">Packagio</a></p>
                        </li>
                        <li class="list-inline-item align-self-center">
                            <div class="scrollTop"><i class="flaticon-up-arrow-fill-1"></i></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--  END FOOTER  -->
    <?php 
        use App\Libraries\Simple;
        $this->simple=new Simple();
        $id = session()->get('id');
        $user_type = session()->get('user_type');
        if ($user_type == "admin" && $id != '') 
        {
           $profile =$this->simple->fetch_admin_data($id); 
          
       
     ?>
      <!--  BEGIN CONTROL SIDEBAR  -->
      <aside class="control-sidebar control-sidebar-light-color cs-content">
          <div class="">

              <div class="row">
                  <div class="col-md-12 text-right">
                      <div class="close-sidebar">
                          <i class="flaticon-close-fill p-3 toggle-control-sidebar"></i>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="usr-info text-center mb-5">
                          <img alt="admin-profile" src="<?php echo base_url(); ?>/<?php echo $profile[0]['admin_image_path'] ?>" class="img-fluid rounded-circle mb-3">
                          <div class=" mt-2">
                              <h5 class="usr-name mb-0"><?php echo $profile[0]['admin_name']?></h5>
                              <p class="usr-occupation mb-0 mt-1">Super Admin</p>
                          </div>
                      </div>
                  </div>
              </div>

                <div class="tab-navigation-section text-center mb-5 mt-3">
                  <ul class="nav nav-tabs nav-justified mx-2">
                      <li class="nav-item">
                          <a  href="<?php echo base_url().'/profile' ?>" class="nav-link rounded-circle active show">
                              <p class="mb-0">Profile</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?php echo base_url().'/admin/logout' ?>" class="nav-link rounded-circle">
                              <p class="mb-0">Log Out</p>
                          </a>
                      </li>
                      
                  </ul>
              </div>
      </aside>
      <!--  END CONTROL SIDEBAR  -->
   <?php } else { 
       $id = session()->get('id');
       $profile =$this->simple->fetch_supplier_name($id);         

    ?>
         <!--  BEGIN CONTROL SIDEBAR  -->
      <aside class="control-sidebar control-sidebar-light-color cs-content">
          <div class="">

              <div class="row">
                  <div class="col-md-12 text-right">
                      <div class="close-sidebar">
                          <i class="flaticon-close-fill p-3 toggle-control-sidebar"></i>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="usr-info text-center mb-5">
                         
                          <div class=" mt-2">
                              <h5 class="usr-name mb-0"><?php echo $profile?></h5>
                              <p class="usr-occupation mb-0 mt-1">Supplier</p>
                          </div>
                      </div>
                  </div>
              </div>

                <div class="tab-navigation-section text-center mb-5 mt-3">
                  <ul class="nav nav-tabs nav-justified mx-2">
                      <li class="nav-item">
                          <a  href="<?php echo base_url().'/sl/profile' ?>" class="nav-link rounded-circle active show">
                              <p class="mb-0">Profile</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?php echo base_url().'/sl/logout' ?>" class="nav-link rounded-circle">
                              <p class="mb-0">Log Out</p>
                          </a>
                      </li>
                      
                  </ul>
              </div>
      </aside>
      <!--  END CONTROL SIDEBAR  -->

  <?php  } ?>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url(); ?>/theme/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/assets/js/loader.js"></script>
    <script src="<?php echo base_url(); ?>/theme/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="<?php echo base_url(); ?>/theme/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
     <script src="<?php echo base_url(); ?>/theme/plugins/charts/chartist/chartist.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/calendar/pignose/moment.latest.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/calendar/pignose/pignose.calendar.js"></script>
    <!-- <script src="<?php echo base_url(); ?>/theme/plugins/progressbar/progressbar.min.js"></script> -->
  <!--   <script src="<?php echo base_url(); ?>/theme/assets/js/default-dashboard/default-custom.js"></script> -->
    <script src="<?php echo base_url(); ?>/theme/assets/js/support-chat.js"></script>


    <script src="<?php echo base_url(); ?>/theme/assets/js/forms/bootstrap_validation/bs_validation_script.js"></script>


    <script src="<?php echo base_url(); ?>/theme/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="<?php echo base_url(); ?>/theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="<?php echo base_url(); ?>/theme/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url(); ?>/theme/assets/js/design-js/design.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/date_time_pickers/bootstrap_date_range_picker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/date_time_pickers/bootstrap_date_range_picker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/timepicker/jquery.timepicker.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/date_time_pickers/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/date_time_pickers/bootstrap_date_range_picker/daterangepicker_examples.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/timepicker/custom-timepicker.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    
    
    <script src="<?php echo base_url(); ?>/theme/plugins/dropify/dropify.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>    
    <script src="<?php echo base_url(); ?>/theme/assets/js/custom.js"></script>
    <script>
        $('.dropify').dropify({
            messages: { 'default': 'Click to Upload or Drag n Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
        });
    </script>
    <script src="<?php echo base_url(); ?>/theme/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/sweetalerts/custom-sweetalert.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/select2/custom-select2.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/popup/custom-maginfic-popup.js"></script>
    <script src="<?php echo base_url(); ?>/theme/assets/js/components/custom-scroll_bars_basic.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/input-mask/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/input-mask/input-mask.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/form-repeater/jquery.repeater.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/treeview/jstree.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/jqvalidation/jqBootstrapValidation-1.3.7.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/jqvalidation/custom-jqBootstrapValidation.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="<?php echo base_url(); ?>/theme/plugins/treeview/custom-jstree.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/dropzone/dropzone.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/dropzone/custom-dropzone.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/file-upload/file-upload-with-preview.js"></script>
      <?php 
      if(session()->get('user_type')=='admin' )
        {   ?>
            <script src="<?php echo base_url(); ?>/js/admin.js"></script>
        <?php } else
        { ?>
             <script src="<?php echo base_url(); ?>/js/sl.js"></script>
        <?php } ?>
            
    

</body>
<script>
    $('#html5-extension').DataTable({
      dom: '<"row"<"col-md-12"<"row"<"col-md-3"l><"col-md-6"B><"col-md-3"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5 mb-md-0 mb-5"i><"col-md-7"p>>>>',
      buttons: {
        buttons: [{
            extend: 'copy',
            className: 'btn btn-fill btn-fill-warning'
          },
          {
            extend: 'csv',
            className: 'btn btn-fill btn-fill-warning'
          },
          {
            extend: 'excel',
            className: 'btn btn-fill btn-fill-warning'
          },
          {
            extend: 'print',
            className: 'btn btn-fill btn-fill-warning'
          }
        ]
      },
      "language": {
        "paginate": {
          "previous": "<i class='flaticon-arrow-left-1'></i>",
          "next": "<i class='flaticon-arrow-right'></i>"
        },
        "info": "Showing page _PAGE_ of _PAGES_"
      }
    });
</script>
<!-- Mirrored from designreset.com/preview-equation/default-light/pages_blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jun 2020 10:40:22 GMT -->
</html>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    function loader() {
      $.blockUI({
        message: '<div class="blockui-default-message"><i class="fa fa-circle-o-notch fa-spin"></i><h6>Please Wait..</h6></div>',
        overlayCSS: {
          background: 'rgba(24, 44, 68, 0.8)',
          opacity: 1,
          zIndex: 9999,
          cursor: 'wait',
          position: 'absolute'
        },
        css: {
          zIndex: 9999,
          width: '20%',
          top: '45%',
          left: '38%',
          hight: '12%'
        },
        blockMsgClass: 'block-msg-message-loader'
      });
    }
    
    function loader_timeout() {
      setTimeout($.unblockUI);
    }
</script>
<style>
    .btn-fill[class*="btn-fill-"] {
        font-size:0.6875rem;
    }  
</style>
<script type="text/javascript">
  $('input[name="from_date"]').daterangepicker({
    timePicker: true,
    singleDatePicker: true,
    timePickerIncrement: 30,
    startDate: moment(),
    locale: {
      format: 'DD/MM/YYYY h:mm A'
    },
    // drops: 'up'
  });
  $('input[name="to_date"]').daterangepicker({
    timePicker: true,
    singleDatePicker: true,
    timePickerIncrement: 30,
    startDate: moment().add('d', 1).toDate(),
    locale: {
      format: 'DD/MM/YYYY h:mm A'
    },
    // drops: 'up'
  })
</script>
  <script>
        var product_customers = $('#ecommerce-product-customers').DataTable({
            "lengthMenu": [ 10, 20, 50, 100 ],
            drawCallback: function( settings ) { $('[data-toggle="tooltip"]').tooltip(); },
           
            
            "language": {
                "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
     
    </script>
<script type="text/javascript">
    var d = new Date();
var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
$("#month").html(monthNames[d.getMonth()] + '' );
$("#day").html(d.getDate() + '&nbsp;');
var weekNames = ["Sunday","Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
$("#week").html(weekNames[d.getDay()] + ',');
function timer() {
  var d = new Date();
  var h = d.getHours(),
      mm = d.getMinutes(),
      ss = d.getSeconds(),
      hh = h;
  if (hh >= 12) {
    hh = h - 12;
    dd= 'PM';
  }
  if (hh === 0) {
    hh = 12;
  }
  hh = hh<10?'0'+hh:hh;
  mm = mm<10?'0'+mm:mm;
  ss = ss<10?'0'+ss:ss;
      
  $("#hour").html(hh + ':');
  $("#minut").html(mm + ':');
  $("#sec").html(ss);

}
setInterval(function(){ timer();}, 1000);
</script> 
 <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
 <script type="text/javascript">
   Dropzone.autoDiscover = false;
$(".dropzone-file-area").dropzone({
  maxFiles: 10,
  init: function() 
  { 
    myDropzone = this;
    $.ajax({
      url: base_url +'/sl/gallery/fetch_images',
      type: 'post',
     
      dataType: 'json',
      success: function(response){

        $.each(response, function(key,value) 
        {
          var mockFile = { name: value.gallery_image_name, size: value.gallery_image_size };

          myDropzone.emit("addedfile", mockFile);
          myDropzone.emit("thumbnail", mockFile, base_url + '/'+value.gallery_image_path);
          myDropzone.emit("complete", mockFile);

        });

      }
    });
  },
  removedfile:function(file)
  {
         var fileName = file.name;

           
         $.ajax({
           type: 'POST',
           url: base_url +'/sl/gallery/delete_file',
           data: {name: fileName,request: 'delete'},
           sucess: function(data)
           {
              console.log('success: ' + data);
           }
         });
  
         var _ref;
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
  }

});
$(".dropzone-file-area1").dropzone({
 maxFiles: 1,   
  init: function() 
  { 
    myDropzone = this;
    $.ajax({
      url: base_url +'/sl/catalog/fetch_files',
      type: 'post',
     
      dataType: 'json',
      success: function(response){

        $.each(response, function(key,value) 
        {
          var mockFile = { name: value.catalog_name, size: value.catalog_size };

          myDropzone.emit("addedfile", mockFile);
          myDropzone.emit("thumbnail", mockFile, base_url + '/uploads/catalog/download.png');
          myDropzone.emit("complete", mockFile);

        });

      }
    });
  },
  removedfile:function(file)
  {
         var fileName = file.name;

           
         $.ajax({
           type: 'POST',
           url: base_url +'/sl/catalog/delete_file',
           data: {name: fileName,request: 'delete'},
           sucess: function(data)
           {
              console.log('success: ' + data);
           }
         });
  
         var _ref;
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
  }

});
 </script>   