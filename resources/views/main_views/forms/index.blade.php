@extends('layouts.app')

@section('title', 'mia 93.7 Esta boda es mía')
@section('description', 'mia 93.7 Esta boda es mia')
@section('og_image', env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo())

@section('content')
    <div class="main_content_container">
        @if(!$hide_banner)
            @include('elements.mia-hdear', ['main_banner', $main_banner])
        @endif

        <div class="container">
            @if(!$hide_banner)
                @include('elements.for_grid.space_block_header', ['classes' => ''])
            @else
                @include('elements.for_grid.space_block_navbar', ['classes' => ''])
            @endif

            <div class="row justify-content-center">
                @if (!is_null($observations) && $observations != '')
                    <div class="col-sm-12 col-md-8 col-lg-6 spi spd">
                        <div class="text-center txt-big-mia p-2 spi spd">
                            <h6>
                                {{ $observations }}
                            </h6>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row justify-content-center">
                @if (!is_null($mensaje) && $mensaje != '')
                    <div class="col-sm-12 col-md-8 col-lg-6 spi spd">
                        <div class="text-center txt-big-mia-msj p-2 spi spd">
                            <h6>
                                {{ $mensaje }}
                            </h6>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row justify-content-center">
                {{-- Form --}}
                @include('main_views.forms.common_form')
            </div>
        </div>
    </div>
    @include('elements.radio.live_radio_element')
    <style type="text/css">
        .bg-grid-secondary {
            background: linear-gradient(to bottom right, #bd3188, #e2008c) !important;
        }
    </style>
    <script src="/public/js/main_views/forms/bodamia.js"></script>
@endsection
