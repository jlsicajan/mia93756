$(document).ready(function () {
    $('.change_page').unbind('click').click(function(){
        clean_main_content_container(function(){console.log('listo!')}, 'programacion_ajax')
    });
});

function clean_main_content_container(callback, page_to_load){
    $('.main_content_container').empty();
    $('.main_content_container').load(page_to_load);
    callback();
}