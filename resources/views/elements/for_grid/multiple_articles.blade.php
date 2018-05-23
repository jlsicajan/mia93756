<div class="row flex-column align-items-end mb-28px">
    <div class="grid-header grid-header-double col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 font_2_grid_double color-white font_2_grid">{{ $title }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block grid-block-double bg-grid-default col-12">
        <div class="row">
            @foreach($articles as $article)
                <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <a class="text-no-decoration" href="{{ route('article_one', $article['id']) }}">
                        @if($article['autor'] == 'Gthoy')
                            <div class="multiple_article img-cover d-flex align-items-center flex-column justify-content-center p-2" style="background-image: url('{{ $article['imagen'] }}')">
                                <p class="text-shadow color-white font-weight-bold text-center">{{ $article['titulo'] }}</p>
                            </div>
                        @else
                            <div class="multiple_article img-cover d-flex align-items-center flex-column justify-content-center p-2" style="background-image: url('{{ env('URL_ARTICLE_PATH') . $article['imagen'] }}')">
                                <p class="text-shadow color-white font-weight-bold text-center">{{ $article['titulo'] }}</p>
                            </div>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>