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