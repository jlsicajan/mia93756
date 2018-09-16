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
                {{-- Formulario --}}
                <form class="col-sm-12 col-md-8 col-lg-6 form-mia-back" method="POST" data-href="/" action="/formulario/{{$category}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_token" value="{{ $category }}">
                    <div class="form-group">
                        <label for="nombre_completo">Nombre Completo</label>
                        <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" placeholder="Nombre completo..." required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_secundario">Nombre de la pareja</label>
                        <input type="text" class="form-control" name="nombre_secundario" id="nombre_secundario" placeholder="Nombre completo de la pareja..." required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">No. de Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="0000-0000" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com" required>
                    </div>
                    <div class="form-group">
                        <label for="historia">Cuéntanos tu historia: </label>
                        <textarea type="text" rows="5" class="form-control" name="historia" id="historia" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>

                    <button type="submit" class="btn btn-secondary">Enviar</button>
                    {{-- <button class="ajax_link nav-link {{ Request::is('contenido/' . $category . '/0' ) ? 'active' : '' }}"
                            data-href="/">
                        {{ $category }}
                    </button> --}}
                </form>
            </div>
        </div>
    </div>
    @include('elements.radio.live_radio_element')
    <style type="text/css">
        .bg-grid-secondary{
            background: linear-gradient(to bottom right, #bd3188, #e2008c) !important;
        }
    </style>
    <script src="/public/js/main_views/forms/bodamia.js"></script>
@endsection
