@extends('layouts.app')

@section('head')
@endsection

@section('content')
    <div class="main_content_container">
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
                @if($content['main_elements']['instagram'])
                    <div class="row">
                        <div class="col-12 col-md-6">
                            @include("elements.for_grid.iframe")
                        </div>
                        <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                        </div>
                    </div>
                @endif
            @endif
            <div class="row">
                @foreach($content['content'] as $article)
                    <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                        <button class="ajax_link text-no-decoration"
                                data-href="{{ route('article_one', $article['id']) }}">
                            <div class="article_container row border">
                                @if((substr($article['imagen'], 0, 3) != 'htt') && (substr($article['imagen'], 0, 2) != '//'))
                                    <div class="col-12 multiple_article img-cover"
                                         style="background-image: url('{{ env('URL_ARTICLE_PATH') . $article['imagen'] }}')"></div>
                                @else
                                    <div class="col-12 multiple_article img-cover"
                                         style="background-image: url('{{ $article['imagen'] }}')"></div>
                                @endif
                                <div class="col-12 p-2 mt-2">
                                    <p class="date text-muted text-left">{{ $article['fecha'] }}</p>
                                    <p class="title font-weight-bold text-left">{{ $article['titulo'] }}</p>
                                    <p class="description text-muted text-left">{{ \App\Article::limit_words(strip_tags($article['texto_uno']), 35) }}
                                        ...</p>
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