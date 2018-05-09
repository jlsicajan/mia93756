@extends('layouts.app')

@section('content')
@include('elements.mia-hdear', ['title' => 'Los 20'])
<div class="container">
    @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
    @include('elements.for_grid.middle_space_block', ['classes' => ''])


    <div class="row justify-content-center">
        @foreach($the20 as $plus)
        <div class="col-12 col-sm-9 col-md-6 col-lg-4">
         @include('elements.the20.simple_player', ['gradient' => 1, 'music' => $plus])
     </div>
     @endforeach
 </div>
</div>
<style type="text/css">
.music_image{
    height: 185px;
    width: 180px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    border: 5px solid white;
    box-shadow: -1px 2px 4px 0px rgba(0,0,0,0.5);


}

.music_order{
    color: white;
    font-size: 55px;
    text-shadow: 2px 2px black;
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
    font-size: 28px;
    margin-left: -41px; /* quick solution :c*/
    padding-left: 20px;
}

.play_button, .pause_button{
    border: 2px solid white !important;
}

.bg-grid-secondary{
    background: linear-gradient(to bottom right, #bd3188, #e2008c) !important;
}


</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('.play_button > .fa-pause').hide();
        $('.play_button > .fa-play').show();
    });
    var music_selected = 0;
    var button_selected;

    $('.play_button').unbind('click').click(function(){
        console.log("clicked");
        let id_one = $(this).attr('data-for-music');
        music_selected = document.getElementById(id_one);
        button_selected = $(this);

         $('audio').each(function(){
            let id_other = $(this).attr('id');

            if(id_other != id_one){
                $(this).next().attr('data-is-playing', 0);
                let music_one = document.getElementById(id_other);
                music_one.pause();
                music_one.currentTime = 0;
            }
        });

        let status_one = button_selected.attr('data-is-playing');
        if(status_one == 1){
            music_selected.pause();
            $('.play_button > .fa-pause').hide();
            $('.play_button > .fa-play').show();
            button_selected.find('.fa-pause').hide();
            button_selected.find('.fa-play').show();
            button_selected.attr('data-is-playing', 0);
        }else{
            music_selected.play();
            $('.play_button > .fa-pause').hide();
            $('.play_button > .fa-play').show();
            button_selected.find('.fa-pause').show();
            button_selected.find('.fa-play').hide();
            button_selected.attr('data-is-playing', 1);
        }
    });

</script>
@endsection
