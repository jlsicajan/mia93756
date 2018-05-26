@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    @include('elements.mia-hdear', ['main_banner', $main_banner])

    <div class="container main_content_container">
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
                        <div class="multiple_article img-cover d-flex align-items-center flex-column justify-content-center p-2" style="background-image: url('{{ $article_gthoy['imagen'] }}')">
                        </div>
                        <p class="color-primary font-weight-bold text-center">{{ $article_gthoy['titulo'] }}</p>
                    </button>
                </div>
            @endforeach
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

        footer{
            position: absolute;
            /* bottom: -22px; */
            margin-bottom: 70px;
            width: 100%;
        }
    </style>
@endsection

@section('scripts')
@endsection