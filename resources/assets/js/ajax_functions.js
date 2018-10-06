function submit_form(url, form_data, callback, method = 'post') {
    $.ajax({
        url: url,
        method: method,
        data: form_data,
        beforeSend: function () {
        },
        success: function (data) {
            callback();
        },
        error: function () {
            console.log("It was not saved");
        },
        complete: function () {
        }
    });
}