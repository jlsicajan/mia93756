<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <div class="container">
        @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
        @include('elements.for_grid.middle_space_block', ['classes' => ''])

        <div class="row">
            <div class="col-12 col-md-6 py-md-4 pd-2rem">
                @include('elements.radio.live_now_card', ['gradient' => 1, 'live_now' => $current_show])
                @include('elements.news.news_card')
            </div>
            <div class="col-12 col-md-6 py-md-4">
                @include('elements.radio.next_shows', ['title' => 'Proximos programas', 'gradient' => 1])
            </div>
        </div>
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
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="/public/js/main_views/programmation/app.js"></script>

