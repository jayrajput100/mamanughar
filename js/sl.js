function alert_json(str) {
  alert(JSON.stringify(str));
}
var data = new FormData();
function vpb_image_preview(vpb_selector_) 
{
var id = 1, last_id = last_cid = '';
$.each(vpb_selector_.files, function(vpb_o_, file)
{
 
if (file.name.length>0) {
if (!file.type.match('image.*')) {
return true;
} // Do not add files which are not images
else {
//Clear previous previewed files and start again
$('#vpb-display-preview').html('');
var reader = new FileReader();
reader.onload = function(e)
{
    $('#vpb-display-preview').append(
    '<div class="col-md-3"><div id="selector_'+vpb_o_+'" class="vpb_wrapper"> \
    <img style="width:200px;height:100px;" class="vpb_image_style" class="img-thumbnail" src="' + e.target.result + '" \
    title="'+ escape(file.name) +'" /><br /> \
    <a style="cursor:pointer;padding-top:5px;color:red;" title="Click here to remove '+ escape(file.name) +'" \
    onclick="vpb_remove_selected(\''+vpb_o_+'\',\''+file.name+'\')">Remove</a> \
    </div></div>');
}
reader.readAsDataURL(file);

var vpb_files = document.getElementById('vpb-data-file').files;
//data.append("file", vpb_files);

data.delete("file[]");
$.each(vpb_files, function(keys, values)
{
  var im = values;
  var mf = values.size || values.fileSize;
  if (mf > 2000000) {
  msg_swal("Image File Size is very big!", "error");
  } 
  else
  { 
   
  

   data.append("file[]", values);
  }
});
}
}
else {
return false;
}
});
}
function vpb_image_preview1(vpb_selector_) 
{
var id = 1, last_id = last_cid = '';
$.each(vpb_selector_.files, function(vpb_o_, file)
{
 
if (file.name.length>0) {
if (!file.type.match('image.*')) {
return true;
} // Do not add files which are not images
else {
//Clear previous previewed files and start again
//$('#vpb-display-preview').html('');
var reader = new FileReader();
reader.onload = function(e)
{
    $('#vpb-display-preview').append(
    '<div class="col-md-3"><div id="selector_'+vpb_o_+'" class="vpb_wrapper"> \
    <img style="width:200px;height:100px;" class="vpb_image_style" class="img-thumbnail" src="' + e.target.result + '" \
    title="'+ escape(file.name) +'" /><br /> \
    <a style="cursor:pointer;padding-top:5px;color:red;" title="Click here to remove '+ escape(file.name) +'" \
    onclick="vpb_remove_selected(\''+vpb_o_+'\',\''+file.name+'\')">Remove</a> \
    </div></div>');
}
reader.readAsDataURL(file);

var vpb_files = document.getElementById('vpb-data-file').files;
//data.append("file", vpb_files);

data.delete("file[]");
$.each(vpb_files, function(keys, values)
{
  var im = values;
  var mf = values.size || values.fileSize;
  if (mf > 2000000) {
  msg_swal("Image File Size is very big!", "error");
  } 
  else
  { 
   
  

   data.append("file[]", values);
  }
});
}
}
else {
return false;
}
});
}
function vpb_remove_selected(id,name)
{
  $('#v-add-'+id).remove();
  $('#selector_'+id).fadeOut();
}
function vpb_remove_selected1(id,name)
{
  $('#col_'+id).remove();
  $('#v-add-'+id).remove();
  $('#selector_'+id).fadeOut();
}
var data = new FormData();
$(document).on('change', '#file', function() {
  var names = [];
  for (var i = 0; i < $(this).get(0).files.length; ++i) {
    names.push($(this).get(0).files[i].name);
    var ext = $(this).get(0).files[i].name.split('.').pop().toLowerCase();
    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg','pdf']) == -1) {
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
      data.append("single_file", $(this).get(0).files[i]);
    }
  }
});
$(document).on('change', '#file', function() {
  var names = [];
  for (var i = 0; i < $(this).get(0).files.length; ++i) {
    names.push($(this).get(0).files[i].name);
    var ext = $(this).get(0).files[i].name.split('.').pop().toLowerCase();
    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg','pdf']) == -1) {
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
  loader();
  var action = $("#action").val();
  // Get form
  if ($('#form')[0].checkValidity() == false) {
    e.preventDefault();
    loader_timeout();
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
        loader_timeout();
       /* alert_json(result);*/
        if (result == 1) {
          success_swal("Login Successfully !", 'sl/dashboard');
        } else if (result == 2) {
          msg_swal("Password is incorrect !", "error");
        } else if (result == 0) {
          msg_swal("Email Id is not found !", "error");
        }
        else if (result == 3) {
          msg_swal("Password and Confirm Password Shuold be Same !", "error");
        } 
        else {
          if (result.type == "success") {
            success_swal1(result.msg, 'success');
          }
        }
      },
      error: function(data) 
      {  loader_timeout();
        alert_json(data);
      }
    });
  }
});
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
      //loader();
      $.ajax({
        method: "POST",
        url: base_url + '/admin/' + 'delete',
        data: {
          id: id,
          table_name: table_name,
          column: column
        },
        success: function(data) {
          //loader_timeout();
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


// 

function drpchange1(id)
{
  $.ajax({
    method: "POST",
    url: base_url + '/sl/' + 'getsubcategory',
    data: {id: id},
    success: function(data) {
      $("#subcategory_id").empty();
      $("#third_subcategory_id").empty();
      var result = $.parseJSON(data);
      var html = '';
      var thirddrp = '';
      if(result!= null)
      {
        html = '<option value="">Please select subcategory</option>';
       
        $.each(result.subcategory, function(key, val) 
        {
           //alert(JSON.stringify(val));
          html += '<option value="'+val.subcategory_id+'">'+ val.sub_cat_name +'</option>';
         
        }); 
        thirddrp = '<option>Please select subcategory</option>';
      }
      else
      {
        
        html += '<option>Please add subcategory</option>';
        thirddrp = '<option>Please select subcategory</option>';
      }
      $("#subcategory_id").empty().append(html);
      $("#third_subcategory_id").empty().append(thirddrp);
    },
    error: function(data){
      alert('something wrong...');
    }
  });
}
function subdrpchange(id)
{
  $.ajax({
    method: "POST",
    url: base_url + '/sl/' + 'getthirdsubcategory',
    data: {id: id},
    success: function(data) {
      
      $("#third_subcategory_id").empty();
      var result = $.parseJSON(data);
      var html = '';
      var thirddrp = '';
      if(result!= null)
      {
      
        $.each(result.third_subcategory, function(key, val) 
        {
           //alert(JSON.stringify(val));
          html += '<option value="'+val.third_subcategory_id+'">'+ val.third_subcategory_name +'</option>';
         
        }); 
      }
      else
      {
        
        html += '<option>Please add third category</option>';
       
      }
      $("#third_subcategory_id").empty().append(html);
      
    },
    error: function(data){
      alert('something wrong...');
    }
  }); 
}
function drpchange(id)
{ 
    var category_id=[];
      var category_name=[];
       $("select[name=\'category_id[]\'] :selected").map(function(i, el) {
           category_id.push($(el).val());
           category_name.push($(el).text());
       }).get();   
  

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
               
                $.each(result.subcategory, function(k, v) 
                {   
                  
                   html +='<optgroup label="'+category_name[k]+'">';
                   $.each(v, function(key, val) 
                   {
                        html += '<option value="'+val.subcategory_id+'">'+ val.sub_cat_name +'</option>';
                    }); 
                });
               html +='</optgroup>';
              
              $("#third_subcategory_id").empty();
              $("#subcategory_id").empty().append(html);
           } 
        
        },
        error: function(data){
          alert('something wrong...');
        }
      });
  
}
function subdrpchange1(id)
{ 
 var sub_category_id=[];
      var sub_category_name=[];
       $("select[name=\'subcategory_id[]\'] :selected").map(function(i, el) {
           sub_category_id.push($(el).val());
           sub_category_name.push($(el).text());
       }).get(); 
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
      //alert_json(result);
      if(result.third_subcategory.length != 0)
      {
          //html +='<optgroup label="'+sub_category_name+'">';
          $.each(result.third_subcategory, function(k, v) 
          { 
            $.each(v, function(key, val) 
            {
               html += '<option value="'+val.third_subcategory_id+'">'+ val.third_subcategory_name +'</option>';
            }); 
          }); 
       // html +='</optgroup>';
      }
      
      $("#third_subcategory_id").empty().append(html);
     }
    },
    error: function(data)
    {
      alert('something wrong...');
    }
  });
}
function verify_email(supplier_id,supplier_email)
{ 
   loader();
   $.ajax({
    method: "POST",
    url: base_url + '/sl/' + 'verify_email',
    data: {supplier_id: supplier_id,supplier_email:supplier_email},
    success: function(data) 
    {

      var result=$.parseJSON(data);
      loader_timeout();
      msg_swal(result.msg, result.type);
    },
    error:function(data)
    {
      alert("error");
    }  
   });  
}

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
  html+='<select class="form-control" name="subcategory_id[]" id="subcategory_id_'+num_rows+'"  required onchange="subdrpchange(this,'+num_rows+')" >';
 
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