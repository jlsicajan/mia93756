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
            <div class="row">
                <div class="col-12 col-md-6 py-md-4 pd-2rem">
                    @if(isset($content['content'][0]) && !empty($content['content'][0]))
                        @foreach($content['content'][0] as $article_left)
                            @include('elements.for_grid.grid_left', ['title' => $article_left['titulo'], 'grid_content' => '', 'gradient' => 1, 'grid_content' => $article_left])
                        @endforeach
                    @endif
                </div>
                <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                    @if(isset($content['content'][1]) && !empty($content['content'][1]))
                        @foreach($content['content'][1] as $article_right)
                            @include('elements.for_grid.grid_right', ['title' => $article_right['titulo'], 'grid_content' => '', 'gradient' => 1, 'grid_content' => $article_right])
                        @endforeach
                    @endif
                </div>
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