

$(document).ready(function drop () {
    $('.select2').select2();
})

// window.onload=  function drop() {
//     console.log(1)
// }

function loadingStart(title = null) {
    swal({
        title: title ? title : 'Loading',
        allowEscapeKey: false,
        allowOutsideClick: false,
        onOpen: () => {
            swal.showLoading()
        }
    });
}

function loadingStop() {
    swal.close()
}

function showSuccess(title) {
    swal({
        position: 'top-end',
        type: 'success',
        title: title,
        showConfirmButton: false,
        timer: 1500
    })
}

function showWarn(title) {
    swal({
        position: 'center',
        type: 'warning',
        title: title,
        showConfirmButton: true,
    })
}


function formSubmit(method, url, redirect, data, message = null) {
    loadingStart();
    $('.error').removeClass('error');
    $('.help-block').remove();
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (r) {
            showSuccess(message ? message : 'Task Done')
            setTimeout(function () {
                window.location = redirect;
            }, 1500)
        },
        error: function (r) {
            let errors = r.responseJSON ? r.responseJSON.errors : [];
            $.each(errors, function (i, e) {
                $('#' + i).parent().addClass('error');
                $('#' + i).after('<div class="help-block"><ul role="alert"><li>' + e[0] + '</li></ul></div>');
            })
            loadingStop()
            showWarn(r.responseJSON.message)
        }
    })
}
