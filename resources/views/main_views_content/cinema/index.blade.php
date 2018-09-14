@include('elements.mia-hdear', ['main_banner', $main_banner])
<div class="container">
    @include('elements.for_grid.space_block_header', ['classes' => ''])

    <div class="row">
        <div class="col-12 col-md-6 py-md-4 pd-2rem">
            @if(isset($movies[0]) && !empty($movies[0]))
                @foreach($movies[0] as $movies_left)
                    @include('elements.cinema.billboard', ['position' => 'left', 'movie' => $movies_left, 'gradient' => 1])
                @endforeach
            @endif
        </div>
        <div class="col-12 col-md-6 py-md-4 right-grid-resize">
            @if(isset($movies[1]) && !empty($movies[1]))
                @foreach($movies[1] as $movies_right)
                    @include('elements.cinema.billboard', ['position' => 'right', 'movie' => $movies_right, 'gradient' => 1])
                @endforeach
            @endif
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        console.log('all ready');
        var current_background = '{!! $main_background !!}';
        $('body').css('background-image', 'url(' + current_background + ')');
    });
</script>
<script src="/public/js/nav_movements.js"></script>
<style type="text/css">
    .movie_image {
        height: 250px;
        width: 180px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border: 5px solid white;
        box-shadow: -1px 2px 4px 0px rgba(0, 0, 0, 0.5);
    }

    .ytp-watermark {
        display: none !important;
    }
</style>
