<div class="row flex-column align-items-end mb-28px p-2">
    <div class="card-primary bg-grid-secondary col-12 d-flex flex-row">
        <div class="col-6 h-100 d-flex align-items-center">
            <div class="music_image shadow d-flex justify-content-center align-items-center" style="background-image: url('{{ env('URL_SOURCE_MULTIMEDIA') . $music['imagen'] }}')"><span class="music_order">{{ $music['orden'] }}</span></div>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center col-6 h-100 live_show_description">
           <div>
                <h5 class="color-white">{{ $music['nombre'] }}</h5>
                <p class="color-white">{{ $music['artista'] }}</h5>
           </div>

            <div>
                <audio id="{{ $music['orden'] }}"><source src="{{ env('URL_SOURCE_MULTIMEDIA') . $music['audio'] }}" type="audio/mp3">Your browser does not support the audio element.</audio>
                <button data-for-music='{{ $music['orden'] }}' class="play_button color-white" type="button">
                    <i class="fa fa-play color-white"></i><i class="fa fa-pause"></i>
                </button>
            </div>
        </div>
    </div>
</div>