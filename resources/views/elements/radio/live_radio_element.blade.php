<div class="container-fluid">
    <div class="row">
        <div class="col-12 live_radio_element bg-grid-default d-flex align-items-center justify-content-around">
            <audio id="live_player">
                <source src="https://rcn.radioonlinehd.net:8010/mia937" type="audio/mp3">Your browser does not support the audio element.
            </audio>
            <button class="play_live_button" type="button"><i class="fa fa-play"></i><i class="fa fa-pause"></i></button>
            <button class="vol_live_down" onclick="document.getElementById('live_player').volume -= 0.1">Vol - </button>
            <button class="vol_live_up" onclick="document.getElementById('live_player').volume += 0.1">Vol + </button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.play_live_button > .fa-pause').show();
        $('.play_live_button > .fa-play').hide();
        toggle_radio();
    });
    var playing = true;
    var radio = document.getElementById('live_player');

    $('.play_live_button').unbind('click').click(function(){
        console.log(radio.paused);
        toggle_radio();
    });

    function toggle_radio(){
        if(radio.paused == false){
            radio.pause();
            $('.play_live_button > .fa-pause').hide();
            $('.play_live_button > .fa-play').show();
        }else{
            radio.play();
            $('.play_live_button > .fa-pause').show();
            $('.play_live_button > .fa-play').hide();
        }
    }
</script>