require('./bootstrap');
const feather = require('feather-icons');

$(function(){
    feather.replace();

    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $(this).next('.custom-file-label').html(fileName);
    });
});
