@extends('layouts.app')

@section('head')
@endsection

@section('content')
@include('elements.mia-hdear', ['main_banner', $main_banner])
<div class="container main_content_container">
    @include('elements.for_grid.space_block_header', ['classes' => ''])

    <div class="row">
        <div class="col-12">
           <h3 class="color-primary">{{ $article['titulo'] }}</h3>
           <hr>
           <p>{!! $article['texto_uno'] !!}</p>
           <strong>Visitas: {{ $article['visitas'] }}</strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h2 class="font_7">Articulos relacionados</h2>
        </div>
        <hr>
        @foreach($articles_related as $article_related)
            <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                <button class="ajax_link text-no-decoration" data-href="{{ route('article_one', $article_related['id']) }}">
                    @if($article_related['autor'] == 'Gthoy')
                        <div class="multiple_article img-cover d-flex align-items-center flex-column justify-content-center p-2" style="background-image: url('{{ $article_related['imagen'] }}')">
                        </div>
                        <p class="color-primary font-weight-bold text-center">{{ $article_related['titulo'] }}</p>
                    @else
                        <div class="multiple_article img-cover d-flex align-items-center flex-column justify-content-center p-2" style="background-image: url('{{ env('URL_ARTICLE_PATH') . $article_related['imagen'] }}')">
                        </div>
                        <p class="color-primary font-weight-bold text-center">{{ $article_related['titulo'] }}</p>
                    @endif
                </button>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row this">
        <div class="col-12">
            <div class="share" id="share">
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                    <a class="addthis_button_facebook"></a>
                    <a class="addthis_button_twitter"></a>
                    <a class="addthis_button_google_plusone_share"></a>
                    <a class="addthis_button_linkedin"></a>
                    <a class="addthis_button_compact"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="fb-comments" data-href="http://mia937.elcaminoweb.com/articulo/{{ $article['id'] }}" data-width="100%" data-numposts="5"></div>
        </div>
    </div>
</div>
@include('elements.radio.live_radio_element')
@endsection

<div id="fb-root"></div>
@section('after_body')
<style type="text/css">
    footer{
        position: absolute;
        /* bottom: -22px; */
        margin-bottom: 70px;
        width: 100%;
    }
    .slideInLeft, .addthis-smartlayers{
        display: none !important;
    }
</style>
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1765073390470250&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
    $(document).ready(function(){
        // $("#at-share-dock").prependTo("#share");
        if ($(window).width() < 860) {
            $('iframe, img').each(function(){
                $(this).css('width', '100%');
            });
        }
    });
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afbebe2d2bf457e"></script>
@endsection