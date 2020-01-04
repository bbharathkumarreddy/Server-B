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
    setTimeout(function() {
        $.ajax({
            url: app_link + 'api_service.php?o=system_stat_current',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                console.log(data);

            }
        });
    }, 3000);
});