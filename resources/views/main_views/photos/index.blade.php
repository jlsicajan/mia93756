@extends('layouts.app')

@section('content')
    @include('elements.mia-hdear', ['title' => 'Fotos'])
    <div class="container">
        @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
        @include('elements.for_grid.middle_space_block', ['classes' => ''])

        <div class="row">
            <div class="col-12 col-md-6 py-md-4 pd-2rem">
                @if(isset($photos[0]) && !empty($photos[0]))
                    @foreach($photos[0] as $photos_left)
                        {{ json_encode($photos_left) }}
                    @endforeach
                @endif
            </div>
            <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                @if(isset($photos[1]) && !empty($photos[1]))
                    @foreach($photos[1] as $photos_right)
                        {{ json_encode($photos_right) }}
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
