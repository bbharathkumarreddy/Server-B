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
                let cpu = parseFloat(data[1]) * 100;
                let load_5 = parseFloat(data[3]) * 100;

                let memory_used = parseInt(data[7]);
                let memory_total = parseInt(data[8]);
                let memory_free = memory_total - memory_used;
                let memory_used_per = ((memory_used / memory_total) * 100).toFixed(0);

                chart_0_def.data.datasets.data.push(cpu, 100 - cpu);
                chart_1_def.data.datasets.data.push(load_5, 100 - load_5);
                chart_2_def.data.datasets.data.push(memory_used, memory_total);
                chart_0_def.update();
                chart_1_def.update();
                chart_2_def.update();
            }
        });
    }, 3000);
});