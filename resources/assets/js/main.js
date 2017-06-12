var $ = require('jquery');

var forms = {

    submitDeleteForm : function(btn) {

        btn.siblings("form").submit();

    }


};


$(document).ready(function() {

    $('.deleteBtn').click(function(e){
        e.preventDefault();
        forms.submitDeleteForm($(this));
    })

})
