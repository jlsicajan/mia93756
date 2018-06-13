$(document).ready(function(){
    $('.more_info_week_shows').unbind('click').click(function(){
        let main_position = $(this).attr('data-main-position');
        let show_position = $(this).attr('data-show-position');
        let time_slot = week_shows[main_position][3][show_position]['inicio'] + ' - ' + week_shows[main_position][3][show_position]['fin'];
        $('#week_show_modal .modal-title').empty().html(week_shows[main_position][3][show_position]['Titulo'] + ' ' + time_slot);
        $('#week_show_modal .modal-body').empty().html(week_shows[main_position][3][show_position]['Contenido']);

        let show_image = $('<div>').addClass('img-cover img-clean-display').css('background-image', 'url(' + url_source_program + week_shows[main_position][3][show_position]['Imagen'] + ')');
        $('#week_show_modal .modal-body').append(show_image);
        console.log(main_position);
        console.log(show_position);
        console.log(week_shows[main_position][3][show_position]);
    });
});
//# sourceMappingURL=app.js.map
