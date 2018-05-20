@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    @include('elements.mia-hdear', ['main_banner', $main_banner])

    <div class="container">
        {{-- @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down']) --}}
        @include('elements.for_grid.middle_space_block', ['classes' => ''])
        @include('elements.for_grid.middle_space_block', ['classes' => 'hidden-sm-down'])
        @include('elements.for_grid.middle_space_block', ['classes' => 'hidden-sm-down'])

        <div class="row">
            <div class="col-12 col-md-6 py-md-4 pd-2rem">
                @include('elements.radio.live_now_card', ['gradient' => 1, 'live_now' => $current_show])
                {{--@include('elements.news.news_card')--}}
            </div>
            <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                {{--@include("elements.for_grid.iframe", ['iframe_url' => ''])--}}
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 py-md-4 px-6rem">
                @if(isset($home_categories[1]) && !empty($home_categories[1]))
                    @if(isset($home_categories[1]['articles']) && !empty($home_categories[1]['articles']))
                        @include('elements.for_grid.multiple_articles', ['title' => $home_categories[1]['nombre'], 'gradient' => 1, 'category_id' => $home_categories[1]['id'], 'articles' => $home_categories[1]['articles']])
                    @endif
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 py-md-4 pd-2rem">
                @if(isset($home_categories[2]) && !empty($home_categories[2]))
                    @if(isset($home_categories[2]['articles']) && !empty($home_categories[2]['articles']))
                    @endif
                @endif
            </div>
            <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                @if(isset($home_categories[3]) && !empty($home_categories[3]))
                    @if(isset($home_categories[3]['articles']) && !empty($home_categories[3]['articles']))
                    @endif
                @endif
            </div>
        </div>

    </div>
    <style type="text/css">
        .article_content {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            max-height: 71.5%;
        }

        .font_7 {
            font-size: 20px;
            color: #FF40A3;
            font-style: italic;

        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection