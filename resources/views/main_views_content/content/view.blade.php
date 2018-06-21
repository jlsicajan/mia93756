@if(!$content['hide_banner'])
    @include('elements.mia-hdear', ['main_banner' => $content['main_banner']])
@endif

<div class="container">

    @if($content['hide_banner'])
        @include('elements.for_grid.space_block_navbar', ['classes' => ''])
    @else
        @include('elements.for_grid.space_block_header', ['classes' => ''])
    @endif
    <div class="row mb-5">
        <div class="col-12 content_title_container">
            <h2 class="font_7 content_title">{{ $content['path_info'] }}</h2>
        </div>
    </div>
    @if(isset($content['main_elements']))
        @if(isset($content['main_elements']))
            @if($content['main_elements']['instagram'])
                <div class="row">
                    <div class="col-12 col-md-6">
                        @include("elements.for_grid.iframe")
                    </div>
                    <div class="col-12 col-md-6">
                        @include("elements.for_grid.fb_iframe")
                    </div>
                    <div class="col-12 col-md-6">
                        @include("elements.for_grid.twitter_iframe")
                    </div>
                </div>
            @endif
        @endif
    @endif
    <div class="row articles_container">
        @if(isset($content['content'][0]) && count($content['content'][0]) > 0)
            @foreach($content['content'][0] as $article)
                <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <button class="ajax_link text-no-decoration"
                            data-href="{{ route('article_one', $article['id']) }}">
                        <div class="article_container row border">
                            <div class="col-12 multiple_article img-cover"
                                 style="background-image: url('{{ $article['imagen'] }}')"></div>
                            <div class="col-12 p-2 mt-2">
                                <p class="date text-muted text-left">{{ date('d M, Y', strtotime($article['fecha'])) }}</p>
                                <p class="title font-weight-bold text-left">{{ $article['titulo'] }}</p>
                                <p class="description text-muted text-left">{{ $article['texto_uno'] }}...</p>
                            </div>
                        </div>
                    </button>
                </div>
            @endforeach
        @endif
    </div>
    @include('elements.pagination', ['size' => $content['content_count_pag']])
</div>
<script type="text/javascript">
    var articles = {!! json_encode($content['content']) !!};
    $(document).ready(function () {
        console.log('all ready');
        var current_background = '{!! $main_background !!}';
        $('body').css('background-image', 'url(' + current_background + ')');


        let meta_title = $('.content_title').text();
        let meta_description = 'Radio mia 93.7 ' . meta_title;
        let meta_image = $('.navbar-logo').attr('data-logo-link');

        $('title').empty().text(meta_title);
        $('meta[property=\'og:title\']').attr('content', meta_title);

        $('meta[name=description]').attr('content', meta_description);
        $('meta[property=\'og:description\']').attr('content', meta_description);

        $('meta[property=\'og:image\']').attr('content', meta_image);
    });
</script>
<script src="/public/js/nav_movements.js"></script>
<script src="/public/js/main_views/content/pagination_manager.js"></script>
