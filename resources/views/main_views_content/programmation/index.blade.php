@if(!$hide_banner)
    @include('elements.mia-hdear', ['main_banner' => $main_banner])
@endif
<link href="public/css/elements/week_shows.css" rel="stylesheet">
<div class="container">
    @if(!$hide_banner)
        @include('elements.for_grid.space_block_header', ['classes' => ''])
    @else
        @include('elements.for_grid.space_block_navbar', ['classes' => ''])
    @endif

    <div class="row">
        <div class="col-12">
            @include("elements.radio.week_shows")
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="week_show_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var week_shows = {!! json_encode($week_programation) !!};
    $(document).ready(function () {
        console.log('all ready');
        var current_background = '{!! $main_background !!}';
        $('body').css('background-image', 'url(' + current_background + ')');
        let meta_title = 'Programacion';
        let meta_description = 'Radio mia 93.7 ' . meta_title;
        let meta_image = $('.navbar-logo').attr('data-logo-link');

        $('title').empty().text(meta_title);
        $('meta[property=\'og:title\']').attr('content', meta_title);

        $('meta[name=description]').attr('content', meta_description);
        $('meta[property=\'og:description\']').attr('content', meta_description);

        $('meta[property=\'og:image\']').attr('content', meta_image);
    });
</script>
<script src="/public/js/main_views/programmation/app.js"></script>
<script src="/public/js/nav_movements.js"></script>

