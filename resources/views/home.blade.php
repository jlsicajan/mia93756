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
                    @include("elements.for_grid.iframe")
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 py-md-4 px-6rem">
                    @if(isset($home_categories[1]) && !empty($home_categories[1]))
                        @if(isset($home_categories[1]['articles']) && !empty($home_categories[1]['articles']))
                            @include('elements.for_grid.multiple_articles', ['title' => $home_categories[1]['nombre'], 'gradient' => 1, 'category_id' => $home_categories[1]['id'], 'articles' => $home_categories[1]['articles']])
                        @endif
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-22 col-md-6 py-md-4 pd-2rem">
                    @if(isset($home_categories[2]) && !empty($home_categories[2]))
                        @if(isset($home_categories[2]['articles']) && !empty($home_categories[2]['articles']))
                            @include('elements.for_grid.multiple_articles_left', ['title' => $home_categories[2]['nombre'], 'gradient' => 2, 'category_id' => $home_categories[2]['id'], 'articles' => $home_categories[2]['articles']])
                        @endif
                    @endif
                </div>
                <div class="col-32 col-md-6 py-md-4 right-grid-resize">
                    @if(isset($home_categories[3]) && !empty($home_categories[3]))
                        @if(isset($home_categories[3]['articles']) && !empty($home_categories[3]['articles']))
                            @include('elements.for_grid.multiple_articles_right', ['title' => $home_categories[3]['nombre'], 'gradient' => 3, 'category_id' => $home_categories[3]['id'], 'articles' => $home_categories[3]['articles']])
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
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var week_shows = {!! json_encode($week_programation) !!};
        $(document).ready(function(){
            $('.more_info_week_shows').unbind('click').click(function(){
                let main_position = $(this).attr('data-main-position');
                let show_position = $(this).attr('data-show-position');
                let time_slot = week_shows[main_position][3][show_position]['inicio'] + ' - ' + week_shows[main_position][3][show_position]['fin'];
                $('#week_show_modal .modal-title').empty().html(week_shows[main_position][3][show_position]['Titulo'] + ' ' + time_slot);
                $('#week_show_modal .modal-body').empty().html(week_shows[main_position][3][show_position]['Contenido']);
                console.log(main_position);
                console.log(show_position);
                console.log(week_shows[main_position][3][show_position]);
            });
        });
    </script>
@endsection

@section('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection