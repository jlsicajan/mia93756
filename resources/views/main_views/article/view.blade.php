@extends('layouts.app')

@section('head')
@endsection

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
        <div class="col-12">
           <h3 class="color-primary">{{ $article['titulo'] }}</h3>
           <hr>
           <p>{!! $article['texto_uno'] !!}</p>
        </div>
    </div>

</div>
@endsection

@section('scripts')
@endsection