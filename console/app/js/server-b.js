$(document).ready(function() {
    $(".serviceBtn").on("click", function() {
        var url = $(this).attr('link');
        var preText = $(this).attr('pre');
        var reload = $(this).attr('reload');
        console.log(reload)
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
});