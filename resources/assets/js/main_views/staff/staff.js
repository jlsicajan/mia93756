$('.keep_reading').unbind('click').click(function () {
    let staff_id = $(this).attr('data-staff-id');
    let staff_selected = staffs.find(st => st.id == staff_id);
    console.warn(staff_selected);
    // let user_selected = users_blog.find(us => us.id == staff_selected.usuario_id);


    console.log(users_blog);
    $('#staff_modal .modal-body').empty().html(staff_selected['texto']);
    $('#staff_modal .modal-title').empty().html(staff_selected['locutor']);
    console.log(staff_selected['texto']);
});