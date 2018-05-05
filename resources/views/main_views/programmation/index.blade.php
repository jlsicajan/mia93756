@extends('layouts.app')

@section('content')
@include('elements.mia-hdear', ['title' => $current_show['PAFF_titulo'], 
    'custom_background' => $current_show['PAFF_image'], 
    'custom_subtitle' => $current_show['PAFF_start'] . ' - ' . $current_show['PAFF_end']])
    <div class="container">
        @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
        @include('elements.for_grid.middle_space_block', ['classes' => ''])

        <div class="row">
            <div class="col-12 col-md-6 py-md-4 pd-2rem">
                @include('elements.radio.live_now_card', ['gradient' => 1, 'live_now' => $current_show])
                @include("elements.radio.live_radio", ['position' => 'left', 'title' => 'RADIO EN LINEA', 'classes' => 'grid-header-primary', 'gradient' => 1])
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
    $(document).ready(function(){
        $('.more_info_week_shows').unbind('click').click(function(){
            let main_position = $(this).attr('data-main-position');
            let show_position = $(this).attr('data-show-position');
            let time_slot = week_shows[main_position][3][show_position]['inicio'] + ' - ' + week_shows[main_position][3][show_position]['fin'];
            $('#week_show_modal .modal-title').empty().html(week_shows[main_position][3][show_position]['Titulo'] + ' ' + time_slot);
            $('#week_show_modal .modal-body').empty().html(week_shows[main_position][3][show_position]['Contenido']);
            console.log(main_position);
            console.log(show_position);
            console.log(week_shows[main_position][3][show_position]);
        });
    });
</script>
@endsection
