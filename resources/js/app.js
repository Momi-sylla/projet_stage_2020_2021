const { defaultsDeep } = require('lodash');

require('./bootstrap');

$(document).on("click", ".edit", function () {
 //console.log('tu mas cliqué');
     var myBookId = $(this).data('id');
    $("#nameseance").val( myBookId );
   // console.log($("#nameseance").val());
    /* $("input:checkbox:not(:checked)").each(function(){
         if($("#nameseance").val())
     });*/

});

$(document).on("click", ".addconstraint", function () {
    //console.log('tu mas cliqué');
        var x = $(this).data('id');
       $("#constraint").val( x );
   
   });

   $(document).on("click", ".deletions", function () {
  //  console.log('tu mas cliqué');
        var x = $(this).data('id');
       $("#cont").val( x );
   
   });
   $(document).on("click", ".deletematiere", function () {
      console.log('tu mas cliqué');
          var x = $(this).data('id');
         $("#valeursup").val( x );
     
     });

     $(document).on("click", ".deleteuser", function () {
        console.log('tu mas cliqué');
            var x = $(this).data('id');
           $("#valeurusersup").val( x );
       
       });
  
   setTimeout(function() {
    $('#messagesuccess').fadeOut('slow');
    },1000); 
   
