<div class="container">
    @include('elements.for_grid.space_block_header', ['classes' => ''])

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
