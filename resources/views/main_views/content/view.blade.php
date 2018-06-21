@extends('layouts.app')

@section('title', 'mia 93.7 ' . $content['path_info'])
@section('description', 'Radio mia 93.7 ' . $content['path_info'] )
@section('og_image', env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo())

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
                        <div class="col-12 col-md-6">
                            @include("elements.for_grid.fb_iframe")
                        </div>
                        <div class="col-12 col-md-6">
                            @include("elements.for_grid.twitter_iframe")
                        </div>
                    </div>
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
    </div>
    <div id="fb-root"></div>
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
    <script type="text/javascript">
        var articles = {!! json_encode($content['content']) !!};
    </script>
    <script src="/public/js/main_views/content/pagination_manager.js"></script>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=167238943956140&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection