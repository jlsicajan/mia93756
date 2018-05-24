<div class="row flex-column align-items-start mb-28px ml-0">
    <div class="grid-header col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 color-white font_2_grid">{{ $title }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block bg-grid-default col-12">
    	<div class="row">
            @foreach($articles as $article)
                <div class="d-block col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <a class="text-no-decoration" href="{{ route('article_one', $article['id']) }}">
                        @if($article['autor'] == 'Gthoy')
                            <div class="multiple_article img-cover d-flex align-items-center flex-column justify-content-center p-2" style="background-image: url('{{ $article['imagen'] }}')"></div>
                            <p class="color-primary font-weight-bold text-center">{{ $article['titulo'] }}</p>
                        @else
                            <div class="multiple_article img-cover d-flex align-items-center flex-column justify-content-center p-2" style="background-image: url('{{ env('URL_ARTICLE_PATH') . $article['imagen'] }}')"></div>
                            <p class="color-primary font-weight-bold text-center">{{ $article['titulo'] }}</p>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>