@extends('layouts.app')

@section('title', 'mia 93.7 programacion')
@section('description', 'Radio mia 93.7 conoce nuestro programa')
@section('og_image', env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo())

@section('head')
@endsection

@section('content')
    <div class="main_content_container">
        @if(!$hide_banner)
            @include('elements.mia-hdear', ['title' => $current_show['PAFF_titulo'],
            'custom_background' => $current_show['PAFF_image'],
            'custom_subtitle' => $current_show['PAFF_start'] . ' - ' . $current_show['PAFF_end']])
        @endif

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
    </div>
    @include('elements.radio.live_radio_element')
    <script type="text/javascript">
        var week_shows = {!! json_encode($week_programation) !!};
    </script>
    <script src="/public/js/main_views/programmation/app.js"></script>
@endsection

@section('scripts')
@endsection