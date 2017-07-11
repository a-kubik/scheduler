var $ = require('jquery');

var forms = {

    submitDeleteForm : function(btn) {

        btn.siblings("form").submit();

    },

    fillSidebar: function(value) {
        document.getElementsByClassName('sidebar')[0].style.backgroundColor = value;
    },
    
    fillSidebarWithDefault() {
        document.getElementsByClassName('sidebar')[0].style.backgroundColor = '#2c2f3e';
        document.getElementById('sidebar-color').value = '#2c2f3e';
    }
};


$(document).ready(function() {

    $('.deleteBtn').click(function(e){
        e.preventDefault();
        forms.submitDeleteForm($(this));
    });
    
    $('#sidebar-color').change(function() {
        forms.fillSidebar($(this).val());
    });

    $('.default-color-btn').click(function() {
        forms.fillSidebarWithDefault();
    });

})
