@extends('layouts.app')

@section('title', 'mia 93.7 fotos')
@section('description', 'Radio mia 93.7 galeria')
@section('og_image', env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo())

@section('content')
    <div class="main_content_container">
        @include('elements.mia-hdear', ['main_banner', $main_banner])
        <div class="container">
            @include('elements.for_grid.space_block_header', ['classes' => ''])

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
    </div>
    @include('elements.radio.live_radio_element')
    <style type="text/css">
    .grid-photo-block{
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
@endsection