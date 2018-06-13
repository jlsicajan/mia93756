{{--*/ $days_map = array('none', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo') /*--}}
<ul class="nav nav-tabs nav-week-tabs hidden-md-down bg-white">
    @foreach($week_programation as $day)
        <li class="nav-item nav-week-item">
            <a class="nav-link nav-week-link color-primary {{ $day[0] }}" data-toggle="tab" href="#{{ $day[1] }}">{{ $day[1] }}</a>
        </li>
    @endforeach
</ul>
<div class="form-group hidden-md-up">
    <label for="select_day">SELECCIONE EL DIA</label>
    <select class="form-control" id="select_day">
        @foreach($week_programation as $day)
            <option @if($day[0] == 'active') selected @endif value="{{ $day[1] }}">{{ $day[1] }}</option>
        @endforeach
    </select>
</div>

<!-- Tab panes -->
<div class="tab-content tab-week-content">
    @foreach($week_programation as $index_main => $show)
        <div class="tab-pane tab-week-pane container {{ ($show[0] == 'inactive') ? 'fade' : 'active' }}" id="{{ $show[1] }}">
            <div class="row">
                @foreach($show[3] as $index_shows => $show_of_the_day)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
                        <div class="card p-1 week_show_image"
                             style="background-image: url('{{ env('URL_SOURCE_PROGRAM') . $show_of_the_day->Imagen }}');  width: 100%; height: 200px">
                            <div class="card-img-overlay d-flex flex-column">
                                @if(!empty($show_of_the_day->Titulo) && !$show_of_the_day->Titulo == '.')
                                    <h4 class="card-title color-white font_9">{{ $show_of_the_day->Titulo }}</h4>
                                @endif
                                <p class="card-text color-white font_9"> {{ $days_map[$show_of_the_day->dia_id] }}</p>
                                <p class="card-text color-white font_9"> {{ $show_of_the_day->inicio . ' - ' . $show_of_the_day->fin}}</p>
                                <button type="button" data-toggle="modal" data-target="#week_show_modal"
                                        data-main-position="{{ $index_main }}" data-show-position="{{ $index_shows }}"
                                        class="btn btn-primary more_info_week_shows">Ver mas
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endforeach
</div>
<script type="text/javascript">
    $('#select_day').on('change', function() {
        // alert( this.value );
        $('.tab-pane').removeClass('active');
        $('#' + this.value).removeClass('fade').addClass('active');
    })
</script>
<style type="text/css">
    .week_show_image {
        height: 185px;
        width: 180px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border: 5px solid white;
        box-shadow: -1px 2px 4px 0px rgba(0, 0, 0, 0.5);
    }
</style>