$(document).ready(function () {
    add_ajax_link_event();
    $(window).on('hashchange', function () {
        console.log($(this).val());
    });
});

window.addEventListener('popstate', function (e) {
    let url = window.location;
    console.log(url.href);
    load_page_jl(url.href);
});

function get_path_ajax_to_load(element) {
    let original_href = element.attr('data-href');
    page_to_load = original_href;
    window.history.pushState({"html": page_to_load, "pageTitle": original_href}, "", page_to_load);
    return page_to_load;
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

function add_ajax_link_event() {
    $('.ajax_link, .ajax_link_sm, .ajax_link_no_style').unbind('click').click(function () {
        let load_page_ajax = get_path_ajax_to_load($(this));
        console.log('load: ' + load_page_ajax);
        if (!isEmpty(load_page_ajax)) {
            load_page_jl(load_page_ajax);
        }
    });
}

function load_page_jl(page_to_load) {
    $('.ajax_link').removeClass('active');
    $(this).addClass('active');

    $('footer').hide();
    $('.loading').removeClass('d-none').addClass('d-flex');
    // alert(load_page_ajax);

    clean_main_content_container(function () {
        console.log('done!');
        $('footer').show();
        $('.menu-sm').css('display', 'none');
        $('.open-menu-sm').css('display', 'block');
        $('.close-menu-sm').css('display', 'none');

        setTimeout(function () {
            $('.loading').removeClass('d-flex').addClass('d-none');
            $(window).scrollTop(0);
            if (typeof addthis !== 'undefined') {
                addthis.toolbox('.addthis_toolbox');
            }
            FB.XFBML.parse();
        }, 800);

    }, page_to_load);

    $('.ajax_link_sm').removeClass('active');
}

//# sourceMappingURL=nav_movements.js.map
