$(document).ready(function(){
    console.log("helloe ther");
    console.log(articles);
    $('.pagination_button').unbind('click').click(function(){
        let article_pag_value = $(this).attr('data-pag');
        $(this).parent().siblings().removeClass('active');
        $(this).parent().addClass('active');
        show_articles_by_page(article_pag_value);
    });
});

function show_articles_by_page(page){
    $('.articles_container').empty();
    console.log("show articles by oage");
    console.info(page);
    console.dir(articles[page]);
    articles[page].forEach(function(e, el){
        console.log("here is one");
        console.dir(e.autor);
        let article_element_builded = build_article_element(e);
        $('.articles_container').append(article_element_builded);
    });
    // $(window).scrollTop(20);
    add_ajax_link_event();
}

function build_article_element(article_info){
    let block_div = $('<div>').addClass('d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2');
    let button_container = $('<button>').addClass('ajax_link text-no-decoration').attr('data-href', article_info.link_url);
    let article_container = $('<div>').addClass('article_container row border');
    let article_container_image = $('<div>').addClass('col-12 multiple_article img-cover').css('background-image', 'url(' + article_info.imagen + ')');

    let article_date = moment(article_info.fecha).format('DD MMM YYYY');

    let article_container_body = $('<div>').addClass('col-12 p-2 mt-2')
        .append('<p class="date text-muted text-left">' + article_date + '</p>')
        .append('<p class="title font-weight-bold text-left">' + article_info.titulo + '</p>')
        .append('<p class="description text-muted text-left">' + article_info.texto_uno + '</p>');

    article_container.append([article_container_image, article_container_body]);
    button_container.append(article_container);
    block_div.append(button_container);

    return block_div;
}