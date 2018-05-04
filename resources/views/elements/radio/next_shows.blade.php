<div class="row flex-column align-items-start mb-28px ml-0">
    <div class="grid-header col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 color-white font_2_grid"> {{ $title }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block bg-grid-default col-12">
        @foreach($next_shows as $show)
            <div class="row flex-column next_show">
                <div class="time_next_show">
                    <p class="font_7"> {{ $show->Dia . ' ' . $show->inicio }}</p>
                </div>
                <div class="name_next_show">
                    <h5 class="helvetica-100"><i class="fa fa-heart color-primary" aria-hidden="true"></i>&nbsp;  &nbsp;  {{ $show->Titulo }}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style type="text/css">

    .helvetica-100{
        font-family: helvetica;
        font-weight: 100;
    }

    .next_show{
        padding: 20px;
        padding-top: 10px;
    }

    .time_next_show{
        border-bottom: 1px solid rgba(17, 17, 17, 0.8);
    }

    .time_next_show > p {
        margin-bottom: 0.5rem !important;
    }

    .name_next_show{
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(17, 17, 17, 0.8);
    }

    .font_7{
        font-size: 20px;
        color: #FF40A3;
        font-style: italic;

    }

    .color-primary{
        color: #FF40A3;
    }
</style>