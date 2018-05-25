$(document).ready(function(){
    $('.ajax_link').unbind('click').click(function(){
        let page_to_load = $(this).attr('data-href');
        let location = window.location;
        console.log(location);
        console.log(page_to_load);

        page_to_load = page_to_load.replace('http://mia937.elcaminoweb.com/', '');
        page_to_load = page_to_load.replace(location, '');

        let load_page_ajax = location + page_to_load + '_ajax';
        alert(load_page_ajax);
        clean_main_content_container(function () {
            console.log('done!');
        }, load_page_ajax);
    });

});
