 <ul class="nav nav-tabs hidden-xs-down">
  @foreach($week_programation as $day)
  <li class="nav-item">
    <a class="nav-link color-primary {{ $day[0] }}" data-toggle="tab" href="#{{ $day[1] }}">{{ $day[1] }}</a>
  </li>
  @endforeach
</ul>

<!-- Tab panes -->
<div class="tab-content">
  @foreach($week_programation as $index_main => $show)
  <div class="tab-pane container {{ ($show[0] == 'inactive') ? 'fade' : 'active' }}" id="{{ $show[1] }}">
    <div class="row">
      @foreach($show[3] as $index_shows => $show_of_the_day)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
          <div class="card p-1 week_show_image" style="background-image: url('{{ env('URL_SOURCE_PROGRAM') . $show_of_the_day->Imagen }}');  width: 100%; height: 200px">
            <div class=" shadow"></div>
            <div class="card-img-overlay">
              <h4 class="card-title color-white">{{ $show_of_the_day->Titulo }}</h4>
              <p class="card-text color-white"> {{ $show_of_the_day->inicio }}</p>
              <button type="button"  data-toggle="modal" data-target="#week_show_modal" data-main-position="{{ $index_main }}" data-show-position="{{ $index_shows }}" class="btn btn-primary more_info_week_shows">Ver mas</button>
            </div>
          </div>   
        </div> 
      @endforeach
    </div>

  </div>
  @endforeach
</div>

<style type="text/css">
  .week_show_image{
        height: 185px;
        width: 180px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border: 5px solid white;
        box-shadow: -1px 2px 4px 0px rgba(0,0,0,0.5);
    }
</style>