@include('elements.mia-hdear', ['main_banner', $main_banner])
<div class="container">
    @include('elements.for_grid.space_block_header', ['classes' => ''])


    <div class="row">
        <div class="col-12 col-md-6 py-md-4 pd-2rem">
            @if(isset($photos[0]) && !empty($photos[0]))
                @foreach($photos[0] as $photos_left)
                    @include('elements.for_photos.photo_container', ['photo' => $photos_left, 'position' => 'left'])
                @endforeach
            @endif
        </div>
        <div class="col-12 col-md-6 py-md-4 right-grid-resize">
            @if(isset($photos[1]) && !empty($photos[1]))
                @foreach($photos[1] as $photos_right)
                    @include('elements.for_photos.photo_container', ['photo' => $photos_right, 'position' => 'right'])
                @endforeach
            @endif
        </div>
    </div>
</div>
<script src="/public/js/nav_movements.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        console.log('all ready');
        var current_background = '{!! $main_background !!}';
        $('body').css('background-image', 'url(' + current_background + ')');
    });
</script>
<style type="text/css">
    .grid-photo-block {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
