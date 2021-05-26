require('./bootstrap');

require('alpinejs');

window.Swal = require('sweetalert2');

$(document).ready(function(){
    $('.toggle-btn').click(function(){
        $('#sidebar').toggleClass('active');
        
});  
})