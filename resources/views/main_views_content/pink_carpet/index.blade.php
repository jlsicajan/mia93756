@if(!$hide_banner)
    @include('elements.mia-hdear', ['main_banner', $main_banner])
@endif
<div class="container">
    @if(!$hide_banner)
        @include('elements.for_grid.space_block_header', ['classes' => ''])
    @else
        @include('elements.for_grid.space_block_navbar', ['classes' => ''])
    @endif

    <div class="row mb-5">
        <div class="col-12">
            <h2 class="font_7 content_title">CUÉNTAME MÁS > ALFOMBRA ROSA</h2>
        </div>
    </div>
    <div class="row articles_container">
        @if(isset($articles_gthoy[0]) && count($articles_gthoy[0]) > 0)
            @foreach($articles_gthoy[0] as $article_gthoy)
                <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <button class="ajax_link text-no-decoration"
                            data-href="{{ route('article_one', $article_gthoy['id']) }}">
                        <div class="article_container row border">
                            <div class="col-12 multiple_article img-cover"
                                 style="background-image: url('{{ $article_gthoy['imagen'] }}')">
                            </div>
                            <div class="col-12 p-2 mt-2">
                                <p class="date text-muted text-left">{{ $article_gthoy['fecha'] }}</p>
                                <p class="title font-weight-bold text-left">{{ $article_gthoy['titulo'] }}</p>
                                <p class="description text-muted text-left">{{ $article_gthoy['texto_uno'] }}
                                    ...</p>
                            </div>
                        </div>
                    </button>
                </div>
            @endforeach
        @endif
    </div>
    @include('elements.pagination', ['size' => $content_count_pag])

</div>
<script type="text/javascript">
    var articles = {!! json_encode($articles_gthoy) !!};
</script>
<script type="text/javascript">
    $(document).ready(function () {
        console.log('all ready');
        var current_background = '{!! $main_background !!}';
        $('body').css('background-image', 'url(' + current_background + ')');
    });
</script>
<script src="/public/js/nav_movements.js"></script>
<script src="/public/js/main_views/content/pagination_manager.js"></script>
