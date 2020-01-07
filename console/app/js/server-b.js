$(document).ready(function() {
    $(".serviceBtn").on("click", function() {
        var url = $(this).attr('link');
        var preText = $(this).attr('pre');
        var reload = $(this).attr('reload');
        var c = confirm(preText);
        if (c) {
            $.ajax({
                url,
                type: 'GET',
                dataType: 'text',
                success: function(data) {
                    alert(data);
                    if (reload == 'true') { location.reload(); }
                },
                error: function(request, error) {
                    alert(error);
                    if (reload == 'true') { location.reload(); }
                }
            });
        }
    });

    $("#clear_ram").on("click", function() {
        $.ajax({
            url: api_link + 'api_service.php?o=clear_ram',
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                alert('RAM Cleared');
            }
        });
    });

    $("#add_file_confirm").on("click", function() {
        var file_name = $('#file_name').val().replace(/ /g, "_");
        var file_path = $('#file_path').val().replace(/ /g, "_");
        if (file_name == '' || file_path == '') {
            alert('File Name or File Path is mandatory');
            return false;
        }
        $.ajax({
            url: api_link + 'api_service.php?o=add_log_point&file_name=' + file_name + '&file_path=' + file_path,
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                alert('File added to File Log Point');
                location.reload();
                $('#logpoint_modal').modal('hide');
            }
        });
    });

    $(document).on("click", ".remove_file_point", function() {
        var file_name = $(this).attr('file_name')
        if (!confirm('Do you want to log point file: ' + file_name)) return 0;
        if (file_name == '') {
            alert('File Name or File Path is mandatory');
            return false;
        }
        $.ajax({
            url: api_link + 'api_service.php?o=remove_log_point&file_name=' + file_name,
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                alert('File removed from File Log Point');
                location.reload();
            }
        });
    });

    $(document).on("click", "#publish_cron_file", function() {
        if (!confirm('Do you want to publish cron')) return 0;
        $.ajax({
            url: api_link + 'api_service.php?o=publish_cron_file',
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                alert('Cron Published Successfully');
                location.reload();
            }
        });
    });

    $(document).on("change", "#ufw_status_switch", function() {
        let ufw_status = $('#ufw_status_switch').is(":checked");
        let message = 'Do you want disable ubuntu firewall.';
        if (ufw_status) message = 'Do you want enable ubuntu firewall.';
        if (!confirm(message)) return 0;
        $.ajax({
            url: api_link + 'api_service.php?o=update_ufw_status&status=' + ufw_status,
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                alert('Ubuntu Firewall Updated');
                location.reload();
            }
        });
    });

    $(document).on("click", ".ufw_id_close", function() {
        let ufw_id = $(this).attr('ufw_id');
        if (!confirm('Do you want to delete UFW Firewall Rule ID:' + ufw_id)) return 0;
        $.ajax({
            url: api_link + 'api_service.php?o=remove_ufw_rule&id=' + ufw_id,
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                alert('UFW Ubuntu Firewall Updated');
                location.reload();
            }
        });
    });
});