@extends('layouts.app')

@section('content')
    <div class="container-fluid mia-header">
        <div class="row justify-content-start">
            <div class="col-md-3 d-flex flex-column justify-content-center">
                <div class="title-container border-bottom-white border-top-white">
                    <h3 class="color-white display-2 font_3">Escucha</h3>
                    <h3 class="color-white display-2 font_3">Tu</h3>
                    <h3 class="color-white display-2 font_3">Corazon</h3>
                </div>
            </div>
            <div class="col-md-9"></div>
        </div>
    </div>
    <div class="container">
        @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
        @include('elements.for_grid.middle_space_block', ['classes' => ''])

        <div class="row">
            <div class="col-12 col-md-6 py-md-4 pd-2rem">
                @include('elements.for_grid.card_left', ['grid_content' => '', 'gradient' => 1])
                @foreach($articles[0] as $article_left)
                    @include('elements.for_grid.grid_left', ['title' => $article_left['titulo'], 'grid_content' => '', 'gradient' => 1, 'grid_content' => $article_left['texto_uno']])
                @endforeach
            </div>
            <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                @include('elements.radio.next_shows', ['title' => 'Proximos programas', 'gradient' => 1])
                @include("elements.radio.live_radio", ['position' => 'right', 'title' => 'RADIO EN LINEA', 'classes' => 'grid-header-primary', 'gradient' => 1])
                @foreach($articles[1] as $article_right)
                    @include('elements.for_grid.grid_right', ['title' => $article_right['titulo'], 'grid_content' => '', 'gradient' => 1, 'grid_content' => $article_right['texto_uno']])
                @endforeach
            </div>
        </div>

    </div>
@endsection
