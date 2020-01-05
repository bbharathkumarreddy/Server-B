$(function () {
    var controller_url = '';
    //tasks list page
    $('.run_task').click(function () {
        run_task({task_id: $(this).attr('href')});
        return false;
    });
    $('#select_all').change(function () {
        if ($(this).prop('checked'))
            $('.task_checkbox').prop('checked', 'checked');
        else
            $('.task_checkbox').prop('checked', '');
    });
    $('#execute_action').click(function () {
        var action = $('#action').find('option:selected').val();
        var tasks = $('.task_checkbox:checked').map(function () {
            return $(this).val();
        }).get();
        if ('Run' == action) {
            run_task({task_id: tasks});
        } else {
            $.post(controller_url + '?m=tasksUpdate', {task_id: tasks, action: action}, function () {
                window.location.reload();
            });
        }
        return false;
    });
    $('.show_output').click(function () {
        $.post(controller_url + '?m=getOutput', {task_run_id: $(this).attr('href')}, function (data) {
            $('#output_container').html(data);
            return false;
        })
    });
    $('#run_custom_task').click(function () {
        run_task({custom_task: $('#command').val()});
        return false;
    });

    function run_task(data) {
        if (confirm('Are you sure?')) {
            $('#output_section').show();
            $('#task_output_container').text('Running...');
            $.post(controller_url + '?m=runTask', data, function (data) {
                $('#task_output_container').html(data);
            }).fail(function () {
                alert('Server error has occurred');
            });
        }
    }

    //edit page
    $('#method').change(function () {
        $('#command').val($(this).val());
    });

    function getRunDates() {
        $.post(controller_url + '?m=getDates', {time: $('#time').val()}, function (data) {
            $('#dates_list').html(data);
        })
    }

    var $time = $('#time');
    $time.change(function () {
        getRunDates();
    });
    if ($time.length)
        getRunDates();

    $('#times').change(function () {
        $('#time').val($(this).val());
        getRunDates();
    });

    //export page
    $('#parse_crontab_form').submit(function () {
        $.post(controller_url + '?m=parseCrontab', $(this).serialize(), function (data) {
            /*var list = '';
            data.forEach(function (element) {
                element.forEach(function (el) {
                    list += '' + el + '<br>';
                });
                list += '<hr>';
            });*/
            $('#parse_result').html(data);
        });
        return false;
    });
    $('#export_form').submit(function () {
        $.post(controller_url + '?m=exportTasks', $(this).serialize(), function (data) {
            var list = '';
            data.forEach(function (element) {
                list += '' + element + '<br>';
            });
            $('#export_result').html(list);
        }, 'json');
        return false;
    });
});