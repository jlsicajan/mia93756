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
        </div>
        <div class="col-12 col-md-6 py-md-4 right-grid-resize">
            @include('elements.radio.next_shows', ['title' => 'Proximos programas', 'gradient' => 1])
            @include("elements.radio.live_radio", ['position' => 'right', 'title' => 'RADIO EN LINEA', 'classes' => 'grid-header-primary', 'gradient' => 1])
        </div>
    </div>
@endsection
