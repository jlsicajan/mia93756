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
            @foreach($content['content'] as $video)
                <div class="col-12 col-sm-9 col-md-6 col-lg-6 mb-28px">
                    <iframe class="embed-responsive-item" width="100%" height="315" src="{{ str_replace(array('https://youtu.be/', 'https://www.youtube.com/watch?v='), 'https://youtube.be/embed/', $video['codigo_api']) }}?rel=0&autoplay=0&autohide=2&border=0&wmode=opaque&enablejsapi=1&modestbranding=1&controls=0&showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <h4 class="font_7">{{ $video['titulo'] }}</h4>
                </div>
            @endforeach
        </div>

    </div>
</div>