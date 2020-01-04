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
                    if (reload) location.reload();
                },
                error: function(request, error) {
                    alert(error);
                    location.reload();
                }
            });
        }
    });
});