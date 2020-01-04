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
    //"'${TIMESTAMP}','${CPU}','${LOAD_1}','${LOAD_5}','${LOAD_15}','${DISK_USAGE}','${DISK_TOTAL}','${MEM_USAGE}','${MEM_TOTAL}','${NET_RECEIVED}','${NET_TRANSMITTED}','${NET_TOTAL}'"
    setInterval(function() {
        $.ajax({
            url: api_link + 'api_service.php?o=system_stat_current',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                let cpu =
                    let load_5 =
                        chart_0_def.data.datasets.data.push(data[1]);
            }
        });
    }, 3000);
});