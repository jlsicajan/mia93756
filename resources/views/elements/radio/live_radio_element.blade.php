<div class="container-fluid">
    <div class="row">
        <div class="col-12 live_radio_element bg-grid-default d-flex align-items-center justify-content-around">
            <audio autoplay id="live_player"><source src="http://96.127.183.74:8612/live" type="audio/mp3">Your browser does not support the audio element.</audio>
            <button class="play_button" type="button"><i class="fa fa-play"></i><i class="fa fa-pause"></i></button>
            <button class="change_page">boton magico</button>
            <button class="load_page">load</button>

            <button class="vol_down" onclick="document.getElementById('live_player').volume -= 0.1">Vol - </button>
            <button class="vol_up" onclick="document.getElementById('live_player').volume += 0.1">Vol + </button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.play_button > .fa-pause').show();
        $('.play_button > .fa-play').hide();
    });
    var playing = true;
    var radio = document.getElementById('live_player');

    $('.play_button').unbind('click').click(function(){
        console.log(radio.paused);
        toggle_radio();
    });

    function toggle_radio(){
        if(radio.paused == false){
            radio.pause();
            $('.play_button > .fa-pause').hide();
            $('.play_button > .fa-play').show();
        }else{
            radio.play();
            $('.play_button > .fa-pause').show();
            $('.play_button > .fa-play').hide();
        }
    }
</script>
<style type="text/css">
    .live_radio_element {
        height: 70px;
        position: fixed;
        bottom: 0;
        z-index: 20;
    }

    .play_button, .pause_button{
        background: transparent;
        border: none;
        border: 2px solid black;
        height: 50px;
        border-radius: 50%;
        width: 50px;
        font-size: 25px;
        play: flex;

    /*&:focus{*/
         /*outline: none;*/
     /*}*/
    }
    .play_button{
        padding-left: 6px;
    }

    .vol_up, .vol_down{
        background: transparent;
        border: none;
        font-size: 25px;
    }
</style>