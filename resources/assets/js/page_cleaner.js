$(document).ready(function () {
    alert('it works');
    $('.change_page').unbind('click').click(function(){
        $('.main_content_container').empty();
        $('.main_content_container').load('https://www.google.com.gt/');
        console.log('cleaned');
    });
});