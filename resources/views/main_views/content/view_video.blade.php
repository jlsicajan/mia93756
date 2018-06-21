@extends('layouts.app')


@section('title', 'mia 93.7 ' . $content['path_info'])
@section('description', 'Radio mia 93.7 ' . $content['path_info'] )
@section('og_image', env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo())

@section('head')
@endsection

@section('content')
    <div class="main_content_container">
        @if(!$content['hide_banner'])
            @include('elements.mia-video-header', ['youtube_url' => $content['content'][0]['codigo_api']])
        @endif
        <div class="container">
            @if($content['hide_banner'])
                @include('elements.for_grid.space_block_navbar', ['classes' => ''])
            @else
                @include('elements.for_grid.space_block_header', ['classes' => 'z-1'])
            @endif

            <div class="row mb-5">
                <div class="col-12 content_title_container">
                    <h2 class="font_7 content_title">{{ $content['path_info'] }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach($content['content'] as $video)
                    <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2 p-4">
                        <div class="video_article_container row border">
                            <div class="col-12 p-0">
                                <iframe class="embed-responsive-item" width="100%" height="200px"
                                        src="{{ str_replace(array('https://youtu.be/', 'https://www.youtube.com/watch?v='), 'https://youtube.be/embed/', $video['codigo_api']) }}?rel=0&autoplay=0&autohide=2&border=0&wmode=opaque&enablejsapi=1&modestbranding=1&controls=1&showinfo=0"
                                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div class="col-12 p-2 mt-2">
                                <p class="date text-muted text-left">{{ date('d M, Y', strtotime($video['fecha'])) }}</p>
                                <p class="title font-weight-bold text-left">{{ $video['titulo'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    @include('elements.radio.live_radio_element')

@endsection

@section('scripts')
@endsection