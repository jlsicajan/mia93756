@extends('layouts.app')

@section('title', 'mia 93.7')
@section('description', 'Radio mia 93.7 escucha tu corazon')
@section('og_image', env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo())

@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
    <div class="main_content_container">
        @include('elements.mia-hdear', ['main_banner', $main_banner])
        <div class="container">
            @include('elements.for_grid.space_block_header', ['classes' => 'z-0'])

            <div class="row">
                <div class="col-12 col-md-6 py-md-4 pd-2rem">
                    @include('elements.radio.live_now_card', ['gradient' => 1, 'live_now' => $current_show])
                    @include('elements.section.card-left', ['background_url' => $to_20_background, 'link' => $to_20_url])
                </div>
                <div class="col-12 col-md-6 py-md-4 right-grid-resize">
                    @include("elements.for_grid.iframe", ['classes' => 'inverted bg-white', 'inverted' => 1])
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 py-md-4 px-6rem">
                    @if(isset($home_categories[1]) && !empty($home_categories[1]))
                        @if(isset($home_categories[1]['articles']) && !empty($home_categories[1]['articles']))
                            @include('elements.for_grid.multiple_articles', ['title' => $home_categories[1]['nombre'], 'gradient' => 0, 'inverted' => 1, 'category_id' => $home_categories[1]['id'], 'articles' => $home_categories[1]['articles'], 'classes' => 'inverted bg-white'])
                        @endif
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-22 col-md-6 py-md-4 pd-2rem">
                    @if(isset($home_categories[2]) && !empty($home_categories[2]))
                        @if(isset($home_categories[2]['articles']) && !empty($home_categories[2]['articles']))
                            @include('elements.for_grid.multiple_articles_left', ['title' => $home_categories[2]['nombre'], 'gradient' => 0, 'inverted' => 1, 'category_id' => $home_categories[2]['id'], 'articles' => $home_categories[2]['articles'], 'classes' => 'inverted bg-white'])
                        @endif
                    @endif
                </div>
                <div class="col-32 col-md-6 py-md-4 right-grid-resize">
                    @if(isset($home_categories[3]) && !empty($home_categories[3]))
                        @if(isset($home_categories[3]['articles']) && !empty($home_categories[3]['articles']))
                            @include('elements.for_grid.multiple_articles_right', ['title' => $home_categories[3]['nombre'], 'gradient' => 0, 'inverted' => 1, 'category_id' => $home_categories[3]['id'], 'articles' => $home_categories[3]['articles'], 'classes' => 'inverted bg-white'])
                        @endif
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @include("elements.radio.week_shows")
                </div>
            </div>
        </div>
    </div>
    @include('elements.radio.live_radio_element')
    <style type="text/css">
        .article_content {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            max-height: 71.5%;
        }

        .font_7 {
            font-size: 20px;
            color: #FF40A3;
            font-style: italic;

        }
    </style>
    <div class="modal fade" id="week_show_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title color-primary"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var week_shows = {!! json_encode($week_programation) !!};
        $(document).ready(function(){
            $('.more_info_week_shows').unbind('click').click(function(){
            });
        });
    </script>
    <script src="/public/js/main_views/programmation/app.js"></script>
@endsection

@section('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection