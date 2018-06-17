<div class="row flex-column align-items-end mb-28px">
    <div class="grid-header grid-header-double col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 font_2_grid_double color-white font_2_grid">{{ $title }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block grid-block-double bg-grid-default col-12">
        <div class="row">
            @foreach($articles as $article_related)
                <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <button class="ajax_link text-no-decoration"
                            data-href="{{ route('article_one', $article_related['id']) }}">
                        <div class="article_container_home row border">
                            @if((substr($article_related['imagen'], 0, 3) != 'htt') && (substr($article_related['imagen'], 0, 2) != '//'))
                                <div class="col-12 multiple_article img-cover"
                                     style="background-image: url('{{ env('URL_ARTICLE_PATH') . $article_related['imagen'] }}')"></div>
                            @else
                                <div class="col-12 multiple_article img-cover"
                                     style="background-image: url('{{ $article_related['imagen'] }}')"></div>
                            @endif
                            <div class="col-12 p-2 mt-2">
                                <p class="date text-muted text-left">{{ date('d M, Y', strtotime($article_related['fecha'])) }}</p>
                                <p class="title font-weight-bold text-left">{{ $article_related['titulo'] }}</p>
                                <p class="description text-muted text-left">{{ \App\Article::limit_words(strip_tags($article_related['texto_uno']), 17) }}
                                    ...</p>
                            </div>
                        </div>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>