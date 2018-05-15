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
                        @include('elements.for_photos.photo_container', ['photo' => $photos_left, 'position' => 'left'])
                    @endforeach
                @endif
            </div>
            <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                @if(isset($photos[1]) && !empty($photos[1]))
                    @foreach($photos[1] as $photos_right)
                        @include('elements.for_photos.photo_container', ['photo' => $photos_right, 'position' => 'right'])
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <style type="text/css">
    .grid-photo-block{
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
@endsection