const { defaultsDeep } = require('lodash');

require('./bootstrap');

$(document).on("click", ".edit", function () {
 //console.log('tu mas cliqué');
     var myBookId = $(this).data('id');
    $("#nameseance").val( myBookId );
    debug(myBookId);
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});
