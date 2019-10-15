require('./bootstrap');
const feather = require('feather-icons');

require('./jquery.multi-select');

$(function(){
    feather.replace();
    $('#members').multiSelect()

    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $(this).next('.custom-file-label').html(fileName);
    });
});
