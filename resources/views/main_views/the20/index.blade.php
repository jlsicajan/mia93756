@extends('layouts.app')

@section('title', 'mia 93.7 La vida es mejor cantando')
@section('description', 'mia 93.7 La vida es mejor cantando')
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

            <div class="row">
                <?php 
                // 
                    $content = DB::table('empresa')->where('id', env("RADIO_ID"))->select('texto_multimedia')->first();
                ?>
                @if (!is_null($content) && $content->texto_multimedia != '')
                    <div class="col-sm-12 txt-col-12">
                        <div class="text-center txt-big-mia p-2">
                            <h3>
                                {{ $content->texto_multimedia }}
                            </h3>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row justify-content-center">
                
                @foreach($the20 as $plus)
                    @if(!empty($plus['audio']) && !empty($plus['imagen']))
                        <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                            @include('elements.the20.simple_player', ['gradient' => 1, 'music' => $plus])
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @include('elements.radio.live_radio_element')
    <style type="text/css">
        .bg-grid-secondary{
            background: linear-gradient(to bottom right, #bd3188, #e2008c) !important;
        }
    </style>
    <script src="/public/js/main_views/the20/the20.js"></script>
@endsection
