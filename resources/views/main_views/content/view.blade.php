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
        <div class="row mb-5">
            <div class="col-12 content_title_container">
                <h2 class="font_7 content_title">{{ $path_info }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 py-md-4 pd-2rem">
                @if(isset($articles[0]) && !empty($articles[0]))
                    @foreach($articles[0] as $article_left)
                        @include('elements.for_grid.grid_left', ['title' => $article_left['titulo'], 'grid_content' => '', 'gradient' => 1, 'grid_content' => $article_left])
                    @endforeach
                @endif
            </div>
            <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                @if(isset($articles[1]) && !empty($articles[1]))
                    @foreach($articles[1] as $article_right)
                        @include('elements.for_grid.grid_right', ['title' => $article_right['titulo'], 'grid_content' => '', 'gradient' => 1, 'grid_content' => $article_right])
                    @endforeach
                @endif
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

        .font_7 {
            font-size: 20px;
            color: #FF40A3;
            font-style: italic;

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