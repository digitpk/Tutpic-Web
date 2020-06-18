function toastAlert(heading,text,icon) {
    // icon mean type
    //You can use four different alert info, warning, success, and error message.
    $.toast({
        heading,
        text,
        position: 'top-right',
        loaderBg: '#ff6849',
        icon,
        hideAfter: 6000,
        stack: 6
    });
}

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

function deleteRecordAjax(url) {

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }).then((result) => {
        $.ajax({
            type: 'DELETE',
            url: url,
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (data) {
                showSuccess('Record Deleted Successfully.');
                setTimeout(() => {
                    location.reload();
                }, 1500);
            },
            error: function (error) {
                let message = 'Network error';
                if (error.responseJSON) {
                    message = error.responseJSON.message
                }
                showWarn(message)
            }
        });
    });
}
