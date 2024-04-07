
function alert_json(str) {
  alert(JSON.stringify(str));
  ajaxindicatorstop();
}


function ajaxindicatorstart(text) {
  if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
    jQuery('body').append('<div id="resultLoading" style="display:none"><div><i class="flaticon-spinner-1 spin position-left"></i><div><h6>' + text + '</h6></div></div><div class="bg"></div></div>');
  }

  jQuery('#resultLoading').css({
    'width': '100%',
    'height': '100%',
    'position': 'fixed',
    'z-index': '10000000',
    'top': '0',
    'left': '0',
    'right': '0',
    'bottom': '0',
    'margin': 'auto'
  });

  jQuery('#resultLoading .bg').css({
    'background': '#000000',
    'opacity': '0.7',
    'width': '100%',
    'height': '100%',
    'position': 'absolute',
    'top': '0'
  });

  jQuery('#resultLoading>div:first').css({
    'width': '300px',
    'height': '75px',
    'text-align': 'center',
    'position': 'fixed',
    'top': '0',
    'left': '0',
    'right': '0',
    'bottom': '0',
    'margin': 'auto',
    'font-size': '16px',
    'z-index': '10',
    'color': '#ffffff'
  });

  jQuery('#resultLoading .bg').height('100%');
  jQuery('#resultLoading').fadeIn(300);
  jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop() {
  jQuery('#resultLoading .bg').height('100%');
  jQuery('#resultLoading').fadeOut(300);
  jQuery('body').css('cursor', 'default');
}
jQuery(document).ajaxStart(function() {
  //show ajax indicator
  ajaxindicatorstart('Loading data.. please wait..');
}).ajaxStop(function() {
  //hide ajax indicator
  ajaxindicatorstop();
});

var data = new FormData();
$(document).on('change', '#file', function() {
  var names = [];
  for (var i = 0; i < $(this).get(0).files.length; ++i) {
    names.push($(this).get(0).files[i].name);
    var ext = $(this).get(0).files[i].name.split('.').pop().toLowerCase();
    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
      msg_swal("Invalid Image File Format", "error");
    }
    // $("input[name=file]").val(names);
    var oFReader = new FileReader();
    oFReader.readAsDataURL($(this).get(0).files[0]);
    var f = ($(this).get(0).files[0]);
    var fsize = f.size || f.fileSize;
    if (fsize > 2000000) {
      msg_swal("Image File Size is very big!", "error");
    } else {
      //var files = $('input', '#customer_document_image').files[0];
      data.append("file", $(this).get(0).files[i]);
    }
  }
});


$("#form").submit(function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.
  var action    = $("#action").val();
  var actionmsg = "Please wait..."  // getting msg
  ajaxindicatorstart(actionmsg);
  // Get form
  if ($('#form')[0].checkValidity() == false) {
    e.preventDefault();
    ajaxindicatorstop();
    return false;
  } else {
    var form_data = $('#form').serializeArray();
    $.each(form_data, function(key, input) {
      data.append(input.name, input.value);
    });
    //alert(data);
    //File data
    $.ajax({
      method: "POST",
      url: base_url + '/' + action,
      data: data, // serializes the form's elements.
      contentType: false,
      processData: false,
      cache: false,
      success: function(data) {
        var result = $.parseJSON(data);
        ajaxindicatorstop();
      
        if (result == 1) {
          success_swal("Login Successfully !", 'dashboard');
        } else if (result == 2) {
          msg_swal("Password is incorrect !", "error");
        } else if (result == 0) {
          msg_swal("Email Id is not found !", "error");
        } 
        else if (result == 3) 
        {
          msg_swal("Password and Confirm Password Should be Same !", "error");
        }     
        else {
          if (result.type == "success") {
            success_swal1(result.msg, 'success');
          }
        }
      },
      error: function(data) {
        //alert_json(data);
        ajaxindicatorstop();
      }
    });
  }
});

var data2 = new FormData();
$(".cat").click(function(e)
{
  e.preventDefault();
  ajaxindicatorstart('Please wait...');


  var action = $("#action_"+this.id).val();
  
  // Get form
  if ($('#popup_form_'+this.id)[0].checkValidity() == false) {
    e.preventDefault();
    ajaxindicatorstop();
    return false;
  } 
  else 
  {
    var form_data = $('#popup_form_'+this.id).serializeArray();
    $.each(form_data, function(key, input) {
      data2.append(input.name, input.value);
    });


    var url = base_url + '/'+ action ;
    $.ajax({
      method: "POST",
      url: url,
      data: data2, // serializes the form's elements.
      contentType: false,
      processData: false,
      cache: false,
      success: function(data) {
        var result = $.parseJSON(data);
        ajaxindicatorstop();
        if (result == 1) {
          success_swal("Login Successfully !", 'dashboard');
        } else if (result == 2) {
          msg_swal("Password is incorrect !", "error");
        } else if (result == 0) {
          msg_swal("Email Id is not found !", "error");
        } else {
          if (result.type == "success") {
            success_swal1(result.msg, 'success');
          }
        }
      },
      error: function(data) {
        alert_json(data);
      }
    });
    
  }
});
function drpchange1(id)
{
  $.ajax({
    method: "POST",
    url: base_url + '/third_subcategory/' + 'getsubcategory1',
    data: {id: id},
    success: function(data) {
      $("#subcategory_id").empty();
      $("#third_subcategory_id").empty();
      var result = $.parseJSON(data);
      var html = '';
      var thirddrp = '';
      if(result.subcategory.length != 0){
        html = '<option>Please select subcategory</option>';
        $.each(result.subcategory, function(key, val) {
          if(val.sub_cat_name == null){
            html = '<option>Please add subcategory</option>';
          }else{
            html += '<option value="'+val.subcategory_id+'">'+ val.sub_cat_name +'</option>';
          }
          thirddrp = '<option>Please select first subcategory</option>';
        }); 
      }else{
        html = '<option>Please add subcategory...</option>';
        thirddrp = '<option>Please select subcategory</option>';
      }
      $("#subcategory_id1").empty().append(html);
      
    },
    error: function(data){
      alert('something wrong...');
    }
  });
}

//var k=0;
function drpchange(id,row)
{ 
   
      var category_id=[];
      var category_name=[];
      category_id.push($("#category_id_"+row+" option:selected").val());
      var kem_id=$("#category_id_"+row+" option:selected").val();

      $.ajax({
        method: "POST",
        url: base_url + '/third_subcategory/' + 'getsubcategory',
        data: {id: category_id},
        success: function(data) 
        {
           var result = $.parseJSON(data);
           var html = '';
           var thirddrp = '';
       
           if(result.subcategory.length != 0)
           {  
                html+=' <option value=" ">Please Select Category  First </option>';
                $.each(result.subcategory, function(k, v) 
                {   
                  
                  
                   $.each(v, function(key, val) 
                   {
                        html += '<option value="'+val.subcategory_id+'">'+ val.sub_cat_name +'</option>';
                    }); 
                });
               
              //alert(html);
              var  html2=' <option value=" ">Please Select Sub Category First </option>';
              $("#third_subcategory_id_"+row).empty().append(html2);
              $("#subcategory_id_"+row).empty().append(html);
              $("#subcategory_id_"+row).attr('name','subcategory_id['+kem_id+'][]');
              $(".selectpicker").selectpicker('refresh');
           } 
          
        
        },
        error: function(data){
          alert('something wrong...');
        }
      });
  
}
function subdrpchange(id,row)
{  

   var sub_category_id=[];
   var sub_category_name=[];
 /*  sub_category_id.push($("#subcategory_id_"+row+" option:selected").val());*/
   /*alert($('.sub  option:selected').val());*/
     var options = $("#subcategory_id_"+row+" option:selected"); 

     $(options).each(function(){
        sub_category_id.push( $(this).val() ); 
        // or $(this).val() for 'id'
    });
    
    $.ajax({
      method: "POST",
      url: base_url + '/faq/' + 'getthirdsubcategory',
      data: {id: sub_category_id},
      success: function(data) 
      {
     
   
     if(data!='')
     {
     
      var result = $.parseJSON(data);
      var html = '';
      
      if(result.third_subcategory.length != 0)
      {   

          //html +='<optgroup label="'+sub_category_name+'">';
          //html+=' <option value=" ">Please Select Sub Category First </option>';
          $.each(result.third_subcategory, function(k, v) 
          { 
            $.each(v, function(key, val) 
            { 

               //html += '<option value="'+val.third_subcategory_id+'">'+ val.third_subcategory_name +'</option>';
                html +='<div class="n-chk">';
                html +='<label class="new-control new-checkbox checkbox-outline-success">'
                html +='<input type="checkbox" name="third_subcategory_id['+val.subcategory_id+'][]" value="'+val.third_subcategory_id+'" class="new-control-input">';
                html +='<span class="new-control-indicator"></span>'+ val.third_subcategory_name +'';
                html +='</label>';
                html+='</div>';
            }); 
          }); 
       // html +='</optgroup>';
      }
      
      $("#third_subcategory_id_"+row).empty().append(html);
     
      /*
      
      $("#third_subcategory_id_"+row).selectpicker('refresh');*/
     }
     

    },
    error: function(data)
    {
      alert('something wrong...');
    }
  });
}
function drpcountrychange(id){
  $.ajax({
    method: "POST",
    url: base_url + '/city/' + 'getstate',
    data: {id: id},
    success: function(data) {
      $("#state_id").empty();
      var html = '';
      var result = $.parseJSON(data);
      html += '<option value="">Please select state</option>';
      if(result.state.length != 0){
        $.each(result.state, function(key, val) {
          if(val.state_name == null){
            html = '<option>Please add state</option>';
          }else{
            html += '<option value="'+val.state_id+'">'+ val.state_name +'</option>';
          }
        });
      }else{
        html = '<option>Please add state</option>';
      } 
      $("#state_id").append(html);
    },
    error: function(data){
      alert('something wrong...');
    }
  });
}
function drpstatechange(id){
  $.ajax({
    method: "POST",
    url: base_url + '/city/' + 'getcity',
    data: {id: id},
    success: function(data) {
      $("#city_id").empty();
      var html = '';
      var result = $.parseJSON(data);
      if(result.city.length != 0){
        html = '<option value="">Please select city</option>';
        $.each(result.city, function(key, val) {
          if(val.city_name == null){
            html = '<option>Please add state...</option>';
          }else{
            html += '<option value="'+val.city_id+'">'+ val.city_name +'</option>';
          }
        });
      }else{
        html = '<option>Please select add city</option>';
      } 
      $("#city_id").append(html);
    },
    error: function(data){
      alert('something wrong...');
    }
  });
}

function success_swal(message, url) {
  swal({
    title: message,
    type: "success",
    showConfirmButton: false,
    timer: 1500
  }).
  then(function(result) {
    window.location = base_url + '/' + url;
    // location.reload();
  });
}

function success_swal1(message, url) {
  swal({
    title: message,
    type: "success",
    showConfirmButton: false,
    timer: 1500
  }).
  then(function(result) {
    //window.location = base_url +'/'+url;
    location.reload();
  });
}

function msg_swal(message, type) {
  swal({
    title: message,
    type: type,
    padding: '2em'
  });
  return true;
}

function row_delete(id, table_name, table_title, url, column) {
  swal({
    title: 'Are you sure to delete ' + table_title + ' ?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Delete',
    padding: '2em'
  }).
  then(function(result) {
    if (result.value) {
      ajaxindicatorstart('Please wait...');
      $.ajax({
        method: "POST",
        url: base_url + '/admin/' + 'delete',
        data: {
          id: id,
          table_name: table_name,
          column: column
        },
        success: function(data) {
          ajaxindicatorstop();
          var result = $.parseJSON(data);
          if (result.type == "success") {
            msg_swal(result.msg, 'success');
            //location.reload();
          }
          location.reload();
        },
        error: function(data) {}
      });
    }
  });
}

function change_status(product_id,status,title) 
{
  swal({
    title: 'Are you sure want to  ' + title + ' this Product  ?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
    padding: '2em'
  }).
  then(function(result) {
    if (result.value) 
    {
      ajaxindicatorstart('Please wait...');
      $.ajax({
        method: "POST",
        url: base_url + '/admin/' + 'change_status',
        data: {
          product_id: product_id,
          status: status,
         
        },
        success: function(data) {
          ajaxindicatorstop();
          var result = $.parseJSON(data);
          if (result.type == "success") {
            msg_swal(result.msg, 'success');
            //location.reload();
          }
          location.reload();
        },
        error: function(data) {}
      });
    }
  });
}
function change_gallery_status(gallery_id,status,title)
{
  swal({
    title: 'Are you sure want to  ' + title + ' this Gallery Image  ?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
    padding: '2em'
  }).
  then(function(result) {
    if (result.value) 
    {
      ajaxindicatorstart('Please wait...');
      $.ajax({
        method: "POST",
        url: base_url + '/gallery/' + 'change_status',
        data: {
          gallery_id: gallery_id,
          status: status,
         
        },
        success: function(data) {
          ajaxindicatorstop();
          var result = $.parseJSON(data);
          if (result.type == "success") {
            msg_swal(result.msg, 'success');
            //location.reload();
          }
          location.reload();
        },
        error: function(data) {}
      });
    }
  });
}
function change_catalog_status(catalog_id,status,title)
{
  swal({
    title: 'Are you sure want to  ' + title + ' this Catalog ?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
    padding: '2em'
  }).
  then(function(result) {
    if (result.value) 
    {
      ajaxindicatorstart('Please wait...');
      $.ajax({
        method: "POST",
        url: base_url + '/catalog/' + 'change_status',
        data: {
          catalog_id: catalog_id,
          status: status,
         
        },
        success: function(data) {
          ajaxindicatorstop();
          var result = $.parseJSON(data);
          if (result.type == "success") {
            msg_swal(result.msg, 'success');
            //location.reload();
          }
          location.reload();
        },
        error: function(data) {}
      });
    }
  });
}
function subdrpchange1(id)
{
  $.ajax({
    method: "POST",
    url: base_url + '/admin/' + 'getthirdsubcategory',
    data: {id: id},
    success: function(data) {
      
      $("#third_subcategory_id1").empty();
      var result = $.parseJSON(data);
      //alert_json(result);
      var html = '';
      var thirddrp = '';
      if(result!= null)
      {
        html = '<option value="">Please select Third Category</option>';
        $.each(result, function(key, val) 
        {
           //alert(JSON.stringify(val));
          html += '<option value="'+val.third_subcategory_id+'">'+ val.third_subcategory_name +'</option>';
         
        }); 
      }
      else
      {
        
        html += '<option>Please add third category</option>';
       
      }
      $("#third_subcategory_id1").empty().append(html);
      
    },
    error: function(data){
      alert('something wrong...');
    }
  }); 
}
// add extra Row
var num_rows=0;
$("#add_new_row").bind("click", function () 
{  
  var row = $("select[name*='category_id']").length; 
  num_rows=row ; 
   
  var ars=add_new_row(); 
  $("#add_row").append(ars);
   $(".selectpicker").selectpicker('refresh');
 
});
function add_new_row()
{
  
  var html='';
  html+='<div class="form-row" id="row_'+num_rows+'">';
  html+='<div class="form-group col-md-4">';
  html+='<select class="form-control" name="category_id[]" id="category_id_'+num_rows+'" required onchange="drpchange(this,'+num_rows+')">';
  var cl='';
  $.ajax({
                   type: "POST",
                   url:base_url+"/category/fetch_category",
                   async:false,
                   success:function(data)
                   {
                     var result=$.parseJSON(data);
                   
                     $.each(result,function(k,v)
                     {
                        
                       cl+='<option value="'+v.category_id+'">'+v.category_name+'</option>';   

                     });

                   },
                   error:function(data)
                   {
                    alert("error");
                   }
            });
  html+=cl;
  html+='</select>';
  html+='<div class="invalid-feedback"> Please Select the Category </div><div class="valid-feedback"> Looks good! </div> ';
  html+='</div>';
  html+='<div class="form-group col-md-4">';
  html+='<select class="selectpicker form-control" name="subcategory_id[]" id="subcategory_id_'+num_rows+'"  required onchange="subdrpchange(this,'+num_rows+')" multiple>';
 
  html+='</select>';
  html+='<div class="invalid-feedback"> Please Select the Sub Category </div><div class="valid-feedback"> Looks good! </div> ';
  html+='</div>';
  html+='<div class="form-group col-md-3">';
  html+='  <div id="third_subcategory_id_'+num_rows+'">';
  
  html+='</div>';
  html+='</div>';
  html+='<div class="form-group col-md-1" style="margin-top:5px;">';
  html+='<a href="javascript:void(0);" id="minus_row_'+num_rows+'"  style="color:red" data-id="'+num_rows+'" class="cat_row_delete"><i class="flaticon-delete-5"></i></a>';
  html+='</div>';
  html+='</div>';
  
  return html; 
}
function select_type(val)
{
  var html='';


  if(val=="Testing")
  {    
       var cl;
       html+='<label for="validationCustom01">Testing Parameter *</label>';
       html +='<select class="selectpicker" multiple required name="test_id[]" id="test_id">';
       $.ajax({
                   type: "POST",
                   url:base_url+"/test/fetch_test",
                   async:false,
                   success:function(data)
                   {
                     var result=$.parseJSON(data);
                   
                     $.each(result,function(k,v)
                     {
                        
                       cl+='<option value="'+v.test_id+'">'+v.test_name+'</option>';   

                     });

                   },
                   error:function(data)
                   {
                    alert("error");
                   }
            });
      html+=cl;
      html+='</select>';
      html+='<div class="invalid-feedback">Please Select a valid Testing Parameter.</div>';

  }
  else
  {
     
     html+='<label for="validationCustom01">Institute Course *</label>';
     html +='<select class="selectpicker" multiple required name="ins_course[]" id="ins_course">';
     html+='<option value="Diploma">Diploma</option>';
     html+='<option value="PG-Diploma">PG. Diploma</option>';
     html+='<option value="BE">BE/B.Tech</option>';
     html+='<option value="ME">ME/M.Tech</option>';
     html+='<option value="Phd">PHD</option>';
     html+='</select>';
     html+='<div class="invalid-feedback">Please Select a valid Institute Course.</div>';

  }  
  $("#ins_name").attr('class','col-md-4');
  $("#ins_type").attr('class','col-md-4');  
  $("#test_or_edu").empty().html(html);
  $(".selectpicker").selectpicker('refresh');
}
$("body").on("click", ".cat_row_delete", function () 
{   
    num_rows--;
    var data_id=$(this).attr('data-id');
    $("#row_"+data_id).remove();
    /*var row_length = $("select[name*='category_id']");
    for(var p=1;p<=row_length.length;p++) 
    {
      var r=p-1;
      $('#category_id_'+p).attr('id','category_id_'+r);
      $('#subcategory_id_'+p).attr('id','subcategory_id_'+r);
      $('#third_subcategory_id_'+p).attr('id','third_subcategory_id_'+r);
      $('#minus_row_'+p).attr('id', 'minus_row_'+r);
      $('#row_'+p).attr('id', 'row_'+r);

    }*/   

});