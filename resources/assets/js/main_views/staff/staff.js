$('.keep_reading').unbind('click').click(function () {
    let staff_id = $(this).attr('data-staff-id');
    let staff_selected = staffs.find(st => st.id == staff_id);
    console.warn(staff_selected);
    // let user_selected = users_blog.find(us => us.id == staff_selected.usuario_id);

    console.log(users_blog);
    $('#staff_modal .modal-title').empty().html(staff_selected['locutor']);

    $('#staff_modal .modal-body').empty().html(staff_selected['texto']);

    let container = $('<div>').addClass('row staff_description p-3');

    let staff_image = $('<div>').addClass('img-cover img-clean-display').css('background-image', 'url(' + url_source + '/uploads/staff/' + staff_selected['imagen'] + ')');
    let second_staff_image = $('<div>').addClass('img-cover img-clean-display').css('background-image', 'url(' + url_source + '/uploads/staff/' + staff_selected['imagen_dos'] + ')');

    container.append([$('<div>').addClass('col-12 col-md-12 mb-2 p-3').append(staff_image), $('<div>').addClass('col-12 col-md-12 mb-2 p-3').append(second_staff_image)]);
    $('#staff_modal .modal-body').append(container);

    console.log(staff_selected['texto']);
});
//# sourceMappingURL=staff.js.map

//# sourceMappingURL=staff.js.map
