@extends('layouts.app')

@section('title', $article['titulo'])
@section('description', \App\Article::limit_words(strip_tags($article['texto_uno']), 140))
@if((substr($article['imagen'], 0, 3) != 'htt') && (substr($article['imagen'], 0, 2) != '//'))
    @section('og_image', env('URL_ARTICLE_PATH') . $article['imagen'])
@else
    @section('og_image', $article['imagen'])
@endif
@section('head')
@endsection

@section('content')
    <div class="main_content_container">
        <div class="container">
            @include('elements.for_grid.space_block_navbar', ['classes' => ''])

            <div class="row">
                <div class="col-12 col-sm-9 bg-white mia-shadow py-2">
                    <h3 class="color-primary">{{ $article['titulo'] }}</h3>
                    <hr>
                    @if((substr($article['imagen'], 0, 3) != 'htt') && (substr($article['imagen'], 0, 2) != '//'))
                        <div class="img-clean-display img-cover"
                             style="background-image: url('{{ env('URL_ARTICLE_PATH') . $article['imagen'] }}')"></div>
                    @else
                        <div class="img-clean-display img-cover"
                             style="background-image: url('{{ $article['imagen'] }}')"></div>
                    @endif
                    @if(isset($article['codigo_api']) && !empty($article['codigo_api']))
                        <br>
                        <iframe class="embed-responsive-item img-clean-display" width="100%"
                                src="{{ str_replace(array('https://youtu.be/', 'https://www.youtube.com/watch?v='), 'https://youtube.be/embed/', $article['codigo_api']) }}?rel=0&autoplay=0&autohide=2&border=0&wmode=opaque&enablejsapi=1&modestbranding=1&controls=0&showinfo=0"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    @endif
                    <p>{!! $article['texto_uno'] !!}</p>
                    <strong>Visitas: {{ $article['visitas'] }}</strong>
                </div>
                <div class="col-12 col-sm-3">
                    <br class="hidden-sm-up">
                    <h5 class="color-primary">Compartir</h5>
                    <div class="share mt-1" id="share">
                        <div class="addthis_toolbox  addthis_default_style addthis_32x32_style"
                             data-url="http://mia937.elcaminoweb.com/articulo/{{ $article['id'] }}" data-title="mia">
                            <a class="addthis_button_facebook cursor-pointer"></a>
                            <a class="addthis_button_twitter cursor-pointer"></a>
                            <a class="addthis_button_google_plusone_share cursor-pointer"></a>
                            <a class="addthis_button_whatsapp cursor-pointer"></a>
                        </div>
                    </div>
                    <div class="bg-grid-default" style="height: 99%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h2 class="font_7">Artículos relacionados</h2>
                </div>
                <hr>
                @foreach($articles_related as $article_related)
                    <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                        <button class="ajax_link text-no-decoration"
                                data-href="{{ route('article_one', $article_related['id']) }}">
                            <div class="article_container row border">
                                @if((substr($article_related['imagen'], 0, 3) != 'htt') && (substr($article_related['imagen'], 0, 2) != '//'))
                                    <div class="col-12 multiple_article img-cover"
                                         style="background-image: url('{{ env('URL_ARTICLE_PATH') . $article_related['imagen'] }}')"></div>
                                @else
                                    <div class="col-12 multiple_article img-cover"
                                         style="background-image: url('{{ $article_related['imagen'] }}')"></div>
                                @endif
                                <div class="col-12 p-2 mt-2">
                                    <p class="date text-muted text-left">{{ $article_related['fecha'] }}</p>
                                    <p class="title font-weight-bold text-left">{{ $article_related['titulo'] }}</p>
                                    <p class="description text-muted text-left">{{ \App\Article::limit_words(strip_tags($article_related['texto_uno']), 35) }}
                                        ...</p>
                                </div>
                            </div>
                        </button>
                    </div>
                @endforeach
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div id="fb-comments" class="fb-comments"
                         data-href="http://mia937.elcaminoweb.com/articulo/{{ $article['id'] }}" data-width="100%"
                         data-numposts="5"></div>
                </div>
            </div>
        </div>
    </div>
    @include('elements.radio.live_radio_element')
@endsection

<div id="fb-root"></div>
@section('after_body')
    <style type="text/css">
        footer {
            position: absolute;
            /* bottom: -22px; */
            margin-bottom: 70px;
            width: 100%;
        }

        .slideInLeft, .addthis-smartlayers {
            display: none !important;
        }
    </style>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1765073390470250&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            // $("#at-share-dock").prependTo("#share");
            if ($(window).width() < 860) {
                $('iframe, img').each(function () {
                    $(this).css('width', '100%');
                });
            }
        });
    </script>
    <script async defer src="//www.instagram.com/embed.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afbebe2d2bf457e"
            async=”async”></script>
@endsection