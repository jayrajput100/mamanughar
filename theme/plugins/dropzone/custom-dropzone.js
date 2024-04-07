var DropzoneDemo= {
    clickable: true,
    init:function() 
    {
        Dropzone.options.dropzoneFileAreaOne= {
            paramName:"file",
            maxFiles:1,
            maxFilesize:5,
            addRemoveLinks:!0,
            clickable: "#uploadlabel",
            accept:function(e, o) {
                "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
            },
            error: function(file, message,xhr) 
            {   
                 
                if(xhr!=undefined)
                {    
                swal({
                title: "Maximum 1 Files Allowed to Upload !",
                type: "error",
                padding: '2em'
              });
               $("#uploadlabel").hide();
              }
              else
              {
                  
                   swal({
                title: "Maximum 5 mb files allowed to upload !",
                type: "error",
                padding: '2em'
              });
              }  
                
             
             if (file) this.removeFile(file);
            
            }
        },
        Dropzone.options.dropzoneFileAreaTwo= {
            paramName:"file",
            maxFiles:10,
            maxFilesize:1,
            addRemoveLinks:!0,
            clickable: "#uploadlabel",
            accept:function(e, o) 
            {    
               
                "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
            },
            error: function(file, message,xhr) 
            {   
                 if(xhr!=undefined)
                {    
                swal({
                title: "Maximum 10 Files Allowed to Upload !",
                type: "error",
                padding: '2em'
              });
               $("#uploadlabel").hide();  
              }
              else
              {
                  
                   swal({
                title: "Maximum 1 mb files allowed to upload !",
                type: "error",
                padding: '2em'
              });
              }  
             
             if (file) this.removeFile(file);
             
            }
           


        }

    },

};
DropzoneDemo.init();































