@extends('layouts.app')

@section('content')
    @include('elements.mia-hdear', ['title' => 'Staff'])
    <div class="container">
        @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
        @include('elements.for_grid.middle_space_block', ['classes' => ''])

        <div class="row">
            <div class="col-12 col-md-6 py-md-4 pd-2rem">
                @include('elements.for_grid.grid_left', ['title' => 'TITLE', 'grid_content' => '', 'gradient' => 1])
                @include('elements.for_grid.grid_left', ['title' => 'TITLE', 'grid_content' => '', 'gradient' => 1])
                @include('elements.for_grid.grid_left', ['title' => 'TITLE', 'grid_content' => '', 'classes' => 'grid-header-primary', 'gradient' => 1])
            </div>
            <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                @include('elements.for_grid.grid_right', ['title' => 'TITLE', 'grid_content' => '', 'gradient' => 1])
                @include('elements.for_grid.grid_right', ['title' => 'TITLE', 'grid_content' => '', 'classes' => 'grid-header-primary', 'gradient' => 1])
                @include('elements.for_grid.grid_right', ['title' => 'TITLE', 'grid_content' => '', 'gradient' => 1])
            </div>
        </div>
    </div>
@endsection
