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
                @include('elements.for_grid.grid_left', ['title' => 'NOTICIAS', 'grid_content' => '', 'gradient' => 1])
                @include('elements.for_grid.grid_left', ['title' => 'TITLE', 'grid_content' => '', 'gradient' => 1])
                @include('elements.for_grid.grid_left', ['title' => 'TITLE', 'grid_content' => '', 'classes' => 'grid-header-primary', 'gradient' => 1])
            </div>
            <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                @include('elements.for_grid.grid_right', ['title' => 'PROGRAMACIÓN', 'grid_content' => '', 'gradient' => 1])
                @include('elements.for_grid.grid_right', ['title' => 'TITLE', 'grid_content' => '', 'classes' => 'grid-header-primary', 'gradient' => 1])
                @include('elements.for_grid.grid_right', ['title' => 'TITLE', 'grid_content' => '', 'gradient' => 1])
                @include('elements.for_grid.card_right', ['grid_content' => '', 'gradient' => 1])

            </div>
        </div>
    </div>
@endsection
