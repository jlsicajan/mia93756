$(document).ready(function(){
    $('.ajax_link').unbind('click').click(function(){
        let load_page_ajax = get_path_ajax_to_load($(this));
        $('.ajax_link').removeClass('active');
        $(this).addClass('active');

        $('.footer').hide();
        $('.loading').removeClass('d-none').addClass('d-flex');
        // alert(load_page_ajax);

        clean_main_content_container(function () {
            console.log('done!');
            $('.footer').show();
            setTimeout(function(){
                $('.loading').removeClass('d-flex').addClass('d-none');
                $(window).scrollTop(0);
                addthis.toolbox('.addthis_toolbox')
            }, 800);

        }, load_page_ajax);
    });

    $('.ajax_link_sm').unbind('click').click(function(){
        let load_page_ajax = get_path_ajax_to_load($(this));
        $('.ajax_link_sm').removeClass('active');
        $(this).addClass('active');

        $('.footer').hide();
        // alert(load_page_ajax);
        $('.loading').removeClass('d-none').addClass('d-flex');

        clean_main_content_container(function () {
            console.log('done!');
            $('.footer').show();
            $('.menu-sm').css('display', 'none');
            $('.open-menu-sm').css('display', 'block');
            $('.close-menu-sm').css('display', 'none');
            setTimeout(function(){
                $('.loading').removeClass('d-flex').addClass('d-none');
                $(window).scrollTop(0);
                addthis.toolbox('.addthis_toolbox');
            }, 800);

        }, load_page_ajax);
    });

});


function get_path_ajax_to_load(element){
    let original_href = element.attr('data-href');
    page_to_load = original_href;

    window.history.pushState({"html": page_to_load,"pageTitle":original_href},"", page_to_load);

    return page_to_load;
}

//# sourceMappingURL=nav_movements.js.map
