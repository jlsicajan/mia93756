@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
    <div class="main_content_container">
        @include('elements.mia-hdear', ['main_banner', $main_banner])
        <div class="container">
            @include('elements.for_grid.space_block_header', ['classes' => ''])

            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="font_7 content_title">CUÉNTAME MÁS > ALFOMBRA ROSA</h2>
                </div>
            </div>
            <div class="row">
                @foreach($articles_gthoy as $article_gthoy)
                    <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                        <button class="ajax_link text-no-decoration" data-href="{{ route('article_one', $article_gthoy['id']) }}">
                            <div class="article_container row border">
                                <div class="col-12 multiple_article img-cover"
                                     style="background-image: url('{{ $article_gthoy['imagen'] }}')">
                                </div>
                                <div class="col-12 p-2 mt-2">
                                    <p class="date text-muted text-left">{{ $article_gthoy['fecha'] }}</p>
                                    <p class="title font-weight-bold text-left">{{ $article_gthoy['titulo'] }}</p>
                                    <p class="description text-muted text-left">{{ \App\Article::limit_words(strip_tags($article_gthoy['texto_uno']), 35, $article_gthoy['encriptado']) }} ...</p>
                                </div>
                            </div>
                        </button>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    @include('elements.radio.live_radio_element')
    <style type="text/css">
        .article_content {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            max-height: 71.5%;
        }

        footer {
            position: absolute;
            /* bottom: -22px; */
            margin-bottom: 70px;
            width: 100%;
        }
    </style>
@endsection

@section('scripts')
@endsection