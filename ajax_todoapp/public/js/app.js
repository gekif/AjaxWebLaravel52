$('.show-todolist-modal').click(function (event) {
    event.preventDefault();

    var url = $(this).attr('href');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#todo-list-body').html(response);
        }
    });

    $('#todo-list-save-btn').click(function (event) {
        event.preventDefault();

        var form = $('#todo-list-body form'),
            url = form.attr('action'),
            method = 'POST';

        // Reset error message
        form.find('.help-block').remove();
        form.find('.form-group').removeClass('has-error');

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            success: function (response) {
                $('#todo-list').prepend(response);
            },
            error: function (xhr) {
                var errors = xhr.responseJSON;

                if ($.isEmptyObject(errors) === false) {
                    $.each(errors, function (key, value) {
                        $('#' + key)
                            .closest('.form-group')
                            .addClass('has-error')
                            .append('<span class="help-block"><strong>' + value + '</strong></span>')
                    });
                }
            }
        });
    });

    $('#todolist-modal').modal('show');
});

$('.show-task-modal').click(function (event) {
    event.preventDefault();
    $('#task-modal').modal('show');
});


$(function () {
    $('input[type=checkbox]').iCheck({
        checkboxClass: 'icheckbox_square-green',
        increaseArea: '20%'
    });

    $('#check-all').on('ifChecked', function (event) {
        $('.check-item').iCheck('check');
    });

    $('#check-all').on('ifUnchecked', function (event) {
        $('.check-item').iCheck('uncheck');
    });
});