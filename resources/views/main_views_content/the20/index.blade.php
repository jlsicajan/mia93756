@if(!$hide_banner)
    @include('elements.mia-hdear', ['main_banner', $main_banner])
@endif
<link href="/public/css/main_views/the20.css" rel="stylesheet">
<div class="container">
    @if(!$hide_banner)
        @include('elements.for_grid.space_block_header', ['classes' => ''])
    @else
        @include('elements.for_grid.space_block_navbar', ['classes' => ''])
    @endif

    <div class="row justify-content-center">
        @foreach($the20 as $plus)
            @if(!empty($plus['audio']) && !empty($plus['imagen']))
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    @include('elements.the20.simple_player', ['gradient' => 1, 'music' => $plus])
                </div>
            @endif
        @endforeach
    </div>
</div>
<style type="text/css">
    .bg-grid-secondary{
        background: linear-gradient(to bottom right, #bd3188, #e2008c) !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        console.log('all ready');
        var current_background = '{!! $main_background !!}';
        $('body').css('background-image', 'url(' + current_background + ')');

        let meta_title = 'los 20';
        let meta_description = 'Radio mia 93.7 ' . meta_title;
        let meta_image = $('.navbar-logo').attr('data-logo-link');

        $('title').empty().text(meta_title);
        $('meta[property=\'og:title\']').attr('content', meta_title);

        $('meta[name=description]').attr('content', meta_description);
        $('meta[property=\'og:description\']').attr('content', meta_description);

        $('meta[property=\'og:image\']').attr('content', meta_image);
    });
</script>
<script src="/public/js/main_views/the20/the20.js"></script>
<script src="/public/js/nav_movements.js"></script>
