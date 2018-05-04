<div class="row flex-column align-items-end mb-28px">
    <div class="card-primary bg-grid-secondary col-12 d-flex flex-row">
        <div class="col-6 h-100 d-flex align-items-center">
            <div class="live_show_image shadow" style="background-image: url('{{ env('URL_SOURCE_PROGRAM') . $live_now['PAFF_image'] }}')"></div>
        </div>
        <div class="d-flex flex-column justify-content-center col-6 h-100 live_show_description">
            <span class="color-white bg-black display-4 text-uppercase paff_message">{{ $live_now['PAFF_message'] }}</span>
            <h5 class="color-white paff_title">{{ $live_now['PAFF_titulo'] }}</h5>
            <p class="color-white paff_time">{{ $live_now['PAFF_start'] . ' - ' . $live_now['PAFF_end'] }}</p>
        </div>
    </div>
</div>
<style type="text/css">
    .live_show_image{
        height: 185px;
        width: 180px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border: 5px solid white;
        box-shadow: -1px 2px 4px 0px rgba(0,0,0,0.5);
    }
    .live_show_description{

    }

    .bg-black{
        background-color: #000000;
    }

    .paff_title{
        font-weight: 300;
        margin-left: -20px;
        margin-top: 10px;
    }

    .paff_time{
        margin-left: -20px;
    }

    .paff_message{
        font-family: Arial;
        font-size: 45px;
        margin-left: -41px; /* quick solution :c*/
        padding-left: 20px;
    }
</style>