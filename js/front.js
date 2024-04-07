/*jQuery(document).ajaxStart(function() {
  //show ajax indicator
  ajaxindicatorstart('Loading data.. please wait..');
}).ajaxStop(function() {
  //hide ajax indicator
  ajaxindicatorstop();
});*/
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
      data.append("file", $(this).get(0).files[i]);
    }
  }
});
function alert_json(str) 
{
  alert(JSON.stringify(str));
  ajaxindicatorstop();
}
function msg_swal(message, type) {
  swal({
    title: message,
    type: type,
    padding: '2em'
  });
  return true;
}
function msg_swal1(message, type) {
 
  swal({
   
    title: message,
    type: type,
    padding: '2em',
    width: '850px'
   
  });
  location.reload();
  return true;
}
 function view_supplier(id)
    {
      window.location.href=base_url+'/supplier/view_supplier/'+id;
    } 
var img = base_url+'/public/front-theme/img/loader.gif';
function ajaxindicatorstart(text) 
{
  if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') 
  {
    jQuery('body').append('<div id="resultLoading" style="display:none"><div><img style="width:30px;height:30px;" src='+img+'><div><h6>' + text + '</h6></div></div><div class="bg"></div></div>');
  }

  jQuery('.flaticon-spinner-1').css({
    'animation': 'spin 10s infinite linear',
    'font-family': 'flaticon !important',
    'speak': 'none',
    'font-style': 'normal',
    'display': 'inline-block',
    'font-weight': 'normal',
    'font-variant': 'normal',
    'text-transform': 'none',
    'line-height': 1,
    '-webkit-font-smoothing': 'antialiased',
  });

  jQuery('.spin').css({
     'animation': 'spin 10s infinite linear',
  });

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


function msg(message, type) {
  swal({
    title: message,
    type: type,
    padding: '2em'
  });
  return true;
}

function errot_msg(message, type) {
  swal({
    type: 'error',
    title: 'Oops...',
    text: message,
    //footer: '<a href>Why do I have this issue?</a>',
    padding: '2em'
  })
}

function success_reload(message, url) {
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

function success_redirect(message, url) {
  swal({
    title: message,
    type: "success",
    showConfirmButton: false,
    timer: 1500
  }).
  then(function(result) {
    window.location =  url;
    // location.reload();
  });
}

function login_msg(message, url) {
  const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    padding: '2em'
  });

  toast({
    type: 'success',
    title: 'Signed in successfully',
    padding: '2em',
  })
}


function confirm_delete(message) {
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Delete',
    padding: '2em'
  }).then(function(result) {
    if (result.value) {
      swal(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    }
  }) 
}


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
  var actionmsg = $("#actionmsg").val();  // getting msg
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
    //File data;
    
    $.ajax({
      method: "POST",
      url: base_url + '/' + action,
      data: data, // serializes the form's elements.
      contentType: false,
      processData: false,
      cache: false,
      success: function(data) 
      {
       var result = $.parseJSON(data);
        ajaxindicatorstop();
       //alert_json(result);
       

       if (result == 1) 
       {
          success_redirect("Login Successfully !", 'home');
        } else if (result == 2) {
          msg_swal("Password is incorrect !", "error");
        } else if (result == 0) {
          msg_swal("Email Id is not found !", "error");
        } 
        else if (result == 3) 
        {
          msg_swal("Password and Confirm Password Should be Same !", "error");
        }     
        else 
        { 
          //alert_json(result);
          if(result.code==4)
          {
            success_redirect(result.msg,result.url);
          }
          else if(result.code==5)
          {
            msg_swal1(result.msg,result.type);
          } 
          else if (result.type == "success") 
          {
            success_reload(result.msg, 'success');
          }
          else
          {
            errot_msg(result.msg,result.type);
          }  
        }
      },
      error: function(data) {
        errot_msg();
        //alert_json(data);
        //ajaxindicatorstop();
      }
    });
  }
});
function drpcountrychange(id)
{
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
function resend_otp()
{ 
   $.ajax({
    method: "POST",
    url: base_url + '/signup/' + 'resend_otp',
  
    success: function(data) 
    {
      var result = $.parseJSON(data);
        ajaxindicatorstop();
       /* alert_json(result);*/
       

       if (result == 1) 
       {
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
        else 
        { 
          //alert_json(result);
          if(result.code==4)
          {
            success_redirect(result.msg,result.url);
          }  
          else if (result.type == "success") 
          {
            success_reload(result.msg, 'success');
          }
          else
          {
            errot_msg(result.msg,result.type);
          }  
        }
    },
    error:function(data)
    {
        alert('something wrong...');
    }  
   });
}
function resend_supplier_otp()
{
   $.ajax({
    method: "POST",
    url: base_url + '/signup/' + 'resend_supplier_otp',
  
    success: function(data) 
    {
      var result = $.parseJSON(data);
        ajaxindicatorstop();
       /* alert_json(result);*/
       

       if (result == 1) 
       {
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
        else 
        { 
          //alert_json(result);
          if(result.code==4)
          {
            success_redirect(result.msg,result.url);
          }  
          else if (result.type == "success") 
          {
            success_reload(result.msg, 'success');
          }
          else
          {
            errot_msg(result.msg,result.type);
          }  
        }
    },
    error:function(data)
    {
        alert('something wrong...');
    }  
   });

}
// Category Addition
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
                //html+=' <option value=" ">Please Select Category  First </option>';
                $.each(result.subcategory, function(k, v) 
                {   
                  
                  
                   $.each(v, function(key, val) 
                   {
                        html += '<option value="'+val.subcategory_id+'">'+ val.sub_cat_name +'</option>';
                    }); 
                });
               
              //alert(html);
              //var  html2=' <option value=" ">Please Select Sub Category First </option>';
              //$("#third_subcategory_id_"+row).empty().append(html2);
              $("#subcategory_id_"+row).empty().append(html);
              $("#subcategory_id_"+row).attr('name','subcategory_id[]');
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
                html +='<span class="new-control-indicator"></span>&nbsp;&nbsp;&nbsp;'+   val.third_subcategory_name +'';
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
$(".selectpicker").selectpicker({
      style: 'btn-info',
      size: 4
  });
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
  html+='<div class="row mb4" id="row_'+num_rows+'" style="margin-top: 30px;">';
  html+=' <div class="col-4 mb2"><div class="form-group">';
  html+='<select class="form-control selectpicker required" name="category_id[]" id="category_id_'+num_rows+'" required onchange="drpchange(this,'+num_rows+')">';
  var cl='';
  $.ajax({
                   type: "POST",
                   url:base_url+"/category/fetch_category",
                   async:false,
                   success:function(data)
                   {
                     var result=$.parseJSON(data);
                     cl+='<option value="">Your Category</option>';
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
  //html+='<div class="invalid-feedback"> Please Select the Category </div><div class="valid-feedback"> Looks good! </div> ';
  html+='</div></div>';
  html+=' <div class="col-4 mb2"><div class="form-group">';
  html+='<select class="selectpicker form-control" name="subcategory_id[]" id="subcategory_id_'+num_rows+'"  required onchange="subdrpchange(this,'+num_rows+')" multiple>';
 
  html+='</select>';
  //html+='<div class="invalid-feedback"> Please Select the Sub Category </div><div class="valid-feedback"> Looks good! </div> ';
  html+='</div></div>';
  html+='<div class="col-3 mb2"><div class="form-group">';
  html+='<div id="third_subcategory_id_'+num_rows+'">';
  
  html+='</div>';
  html+='</div></div>';
  html+='<div class="form-group col-md-1" style="margin-top:5px;">';
  html+='<a href="javascript:void(0);" id="minus_row_'+num_rows+'"  data-id="'+num_rows+'" class="cat_row_delete"><i class="icon_trash"  style="color:red"></i></a>';
  html+='</div>';
  html+='</div>';
  
  return html; 
}
$("body").on("click", ".cat_row_delete", function () 
{
    var data_id=$(this).attr('data-id');
    var id=$(this).data('id');
    $("#row_"+ data_id).remove();
    var qty_length = $("select[name*='category_id']");
    /*for(var p=id;p<=qty_length.length;p++) 
    {
      var r=p-1;
      $('#category_id_'+p).attr('id','category_id_'+r);
      $('#subcategory_id_'+p).attr('id','subcategory_id_'+r);
      $('#minus_row_'+p).attr('id', 'minus_row_'+r);
      $('#row_'+p).attr('id', 'row_'+r);

    }   
*/
}); 

$( "#autocomplete-dynamic" ).autocomplete({
              serviceUrl: base_url+"/home/get_autocomplete",
              transformResult: function(response) 
              {
                 var result =$.parseJSON(response);
                  
                  return {
                    suggestions: $.map(result.suggestions, function(v,k) 
                    {
                       return { value: v, data:k };
                    })
                };
              },
              /*formatResult: function(suggestion, currentValue){
                if (suggestion.data === null) {
                  return "Create a new tag";
                }
                return suggestion.value;
              },*/
               onSelect: function (suggestion) 
               { 
                  //alert(suggestion.data);
                  var d=suggestion.data;
                  var sp=d.split(",");
                  $("#search_type").val(sp[0]);
                  $("#search_value").val(sp[1]);
               },
               onInvalidateSelection: function() 
               {
                  $('#search_type').val('');
                  $('#search_value').val('');
                  $("#autocomplete-dynamic").val('');
               },
               onSearchError:function (query, jqXHR, textStatus, errorThrown) 
               {
                 /* errot_msg("No Result Found !","error");
                  $('#search_type').val('');
                  $('#search_value').val('');
                  $("#autocomplete-dynamic").val('');*/

               }

 });


///
 function filter()
    {
        // 3 filters value
        var category_id=$("#category_id").val();
        var subcategory_id=$("#subcategory_id").val();

        // 1 dropdown value
        var first_filter_value=$("#sort").find(':selected').val();
        // 2 check box value 
       
        var second_filter_value=[];  
        $("input[name=\'business_category[]\']:checked").map(function() {
           second_filter_value.push($(this).val());
        });
        // 3 check box value
        var third_filter_value=[];
        $("input[name=\'sub_cat_id[]\']:checked").map(function() {
           third_filter_value.push($(this).val());
        });
       if(second_filter_value.length!=0)
       {
          //call the Ajax To Fetch The Data By Filter
            $.ajax({
                   type: "POST",
                   url: base_url+"/home/filter_code", 
                   data:{first_filter_value:first_filter_value,second_filter_value:second_filter_value,third_filter_value:third_filter_value,category_id:category_id,subcategory_id:subcategory_id},
                   success:function(data)
                   {
                    ajaxindicatorstop();
                    //alert(data);

                    $("#filter_chng").empty().html(data);
                   },
                   error:function(data)
                   {
                    alert("error");
                   }
            });

       }
       else
       {
         alert("please Select business_category");
         $("#filter_chng").empty();
       } 

        
         

    }
    function filter_third_sub_cat()
    {
        // 3 filters value
        var category_id=$("#category_id").val();
        var subcategory_id=$("#subcategory_id").val();
        var third_category_id=$("#third_category_id").val();

        // 1 dropdown value
        var first_filter_value=$("#sort").find(':selected').val();
        // 2 check box value 
       
        var second_filter_value=[];  
        $("input[name=\'business_category[]\']:checked").map(function() {
           second_filter_value.push($(this).val());
        });
        // 3 check box value
        var third_filter_value=[];
        $("input[name=\'third_subcategory_id[]\']:checked").map(function() {
           third_filter_value.push($(this).val());
        });
      if(second_filter_value.length!=0)
      {
        //call the Ajax To Fetch The Data By Filter
         $.ajax({
                   type: "POST",
                   url: base_url+"/home/filter_third_sub_cat", 
                   data:{first_filter_value:first_filter_value,second_filter_value:second_filter_value,third_filter_value:third_filter_value,category_id:category_id,subcategory_id:subcategory_id,third_category_id:third_category_id},
                   success:function(data)
                   {
                    ajaxindicatorstop();
                    //alert(data);

                    $("#filter_chng").empty().html(data);
                   },
                   error:function(data)
                   {
                    alert("error");
                   }
            });
      }
      else
       {
         alert("please Select business_category");
         $("#filter_chng").empty();
       }   
      
    }
    function filter_institute()
    {
        var first_filter_value=$("#sort").find(':selected').val();
        // 2 check box value 
       
        var second_filter_value=[];  
        $("input[name=\'institute_type[]\']:checked").map(function() {
           second_filter_value.push($(this).val());
        });

        var institute_type=$("#institute_type").val();
        //alert_json(institute_type);
       
        $.ajax({
                   type: "POST",
                   url: base_url+"/home/filter_institute", 
                   data:{first_filter_value:first_filter_value,second_filter_value:second_filter_value,institute_type:institute_type},
                   success:function(data)
                   {
                    ajaxindicatorstop();
                    //alert(data);
                    //alert(data);  
                    $("#filter_chng").empty().html(data);
                   },
                   error:function(data)
                   {
                    alert("error");
                   }
            });   


    }
/*$('.strip').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled:true
        }
    });
});      */

 $(".show_hide1").on("click", function () {
        var txt = $(".show_link").is(':visible') ? 'Read More' : 'Read Less';
        $(".show_hide1").text(txt);
        $(this).next('.show_link').slideToggle(200);
    });
 function sh()
 {
     $("#otp_section").hide();
     $(".wizard-header").hide();
     $("#bottom-wizard").hide();
     $("#collapseFilters").show();

 }
 function send_otp()
 { 
   ajaxindicatorstart('Please Wait');
   var user_mobile=$("#user_mobile").val();
   if(user_mobile.length!='10')
   {
    msg_swal('Mobile Number Should be 10 Digit !', 'error');
   }
   else
   {
    $.ajax({
    method: "POST",
    url: base_url + '/signup/' + 'resend_sms',
    data:{user_mobile:user_mobile},
  
    success: function(data) 
    {
      var result=$.parseJSON(data);
      ajaxindicatorstop();
      msg_swal(result.msg,result.type);
      $("#collapseFilters").hide();
      $("#otp_section").show();
      $(".wizard-header").show();
      $("#bottom-wizard").show();
    

    },
    error:function(data)
    {
        alert('something wrong...');
    }  
   });
   } 
 }
 function send_supplier_otp()
 {
   ajaxindicatorstart('Please Wait');
   var supplier_mobile=$("#supplier_mobile").val();
   if(supplier_mobile.length!='10')
   {
    msg_swal('Mobile Number Should be 10 Digit !', 'error');
   }
   else
   {
    $.ajax({
    method: "POST",
    url: base_url + '/signup/' + 'resend_sms_supplier',
    data:{supplier_mobile:supplier_mobile},
  
    success: function(data) 
    {
      var result=$.parseJSON(data);
      ajaxindicatorstop();
      msg_swal(result.msg,result.type);
      $("#collapseFilters").hide();
      $("#otp_section").show();
      $(".wizard-header").show();
      $("#bottom-wizard").show();
    

    },
    error:function(data)
    {
        alert('something wrong...');
    }  
   });
   } 
 }
 function go_back()
 {
      $("#collapseFilters").hide();
      $("#otp_section").show();
      $(".wizard-header").show();
      $("#bottom-wizard").show();

 }
function X()
{
   swal({
    title: "Your Email Successfully Verified !",
    type: "success",
    showConfirmButton: false,
    timer: 1500
  }).
  then(function(result) 
  {
    window.location = base_url+'/signin';
    
  });

}
function sendusermail()
{
  var email_id=$("#user_email").val();
  var user_id=$("#user_id").val();
  if(email_id=='')
  {
      msg_swal("Please Enter Your Email ID!", "error");
  }
  else if( !validateEmail(email_id)) 
  { 
      msg_swal("Please Enter Proper Email ID", "error");
  }
  else
  {    
       ajaxindicatorstart('Please Wait');
       $.ajax({
        method: "POST",
        url: base_url + '/profile/' + 'sendusermail',
        data: {user_id: user_id,email_id:email_id},
        success: function(data) 
        {

          var result=$.parseJSON(data);
          ajaxindicatorstop();
          msg_swal(result.msg, result.type);
        },
        error:function(data)
        {
          alert("error");
        }  
       });    
  }  
}
 function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}