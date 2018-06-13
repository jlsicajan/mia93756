$('.keep_reading').unbind('click').click(function () {
    let staff_id = $(this).attr('data-staff-id');
    let staff_selected = staffs.find(st => st.id == staff_id);
    console.warn(staff_selected);
    // let user_selected = users_blog.find(us => us.id == staff_selected.usuario_id);


    console.log(users_blog);
    $('#staff_modal .modal-body').empty().html(staff_selected['texto']);
    $('#staff_modal .modal-title').empty().html(staff_selected['locutor']);
    let staff_image = $('<div>').addClass('img-cover img-clean-display').css('background-image', 'url(' + url_source + '/uploads/staff/' + staff_selected['imagen'] + ')');
    $('#staff_modal .modal-body').append(staff_image);

    console.log(staff_selected['texto']);
});
//# sourceMappingURL=staff.js.map
