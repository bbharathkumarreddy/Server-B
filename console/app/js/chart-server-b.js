$(document).ready(function() {
    var ctx = document.getElementById("chart_0");
    var chart_0_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["CPU (%)", "Ideal (%)", ],
            datasets: [{
                data: [0, 100],
                backgroundColor: ['#1cc88a', '#f8f9fc'],
                hoverBackgroundColor: ['#17a673', '#eaecf4'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    var ctx = document.getElementById("chart_1");
    var chart_1_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Load (%)", "Ideal (%)", ],
            datasets: [{
                data: [0, 100],
                backgroundColor: ['#fd7e14', '#f8f9fc'],
                hoverBackgroundColor: ['#da6402', '#eaecf4'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    var ctx = document.getElementById("chart_2");
    var chart_2_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Used (MB)", "Free (MB)", ],
            datasets: [{
                data: [0, 100],
                backgroundColor: ['#4268d6', '#f8f9fc'],
                hoverBackgroundColor: ['#3763e1', '#eaecf4'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    var ctx = document.getElementById("chart_3");
    var chart_3_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Disk (GB)", "Free (GB)", ],
            datasets: [{
                data: [0, 100],
                backgroundColor: ['#1cc88a', '#f8f9fc'],
                hoverBackgroundColor: ['#17a673', '#eaecf4'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    var ctx = document.getElementById("chart_4");
    var chart_4_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Ingress MB", "Egress MB", ],
            datasets: [{
                data: [50, 50],
                backgroundColor: ['#f6c23e', '#36b9cc'],
                hoverBackgroundColor: ['#f3b515', '#0aacc3'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    var ctx = document.getElementById("chart_5");
    var chart_5_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Clear Ram"],
            datasets: [{
                data: [100, 0],
                backgroundColor: ['#5a5c69', '#5a5c69'],
                hoverBackgroundColor: ['#383838', '#383838'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 0,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        }
    });

    //"'${TIMESTAMP}','${CPU}','${LOAD_1}','${LOAD_5}','${LOAD_15}','${DISK_USAGE}','${DISK_TOTAL}','${MEM_USAGE}','${MEM_TOTAL}','${NET_RECEIVED}','${NET_TRANSMITTED}','${NET_TOTAL}'"
    setInterval(function() {
        chart_update();
    }, dashboard_refresh);

    chart_update();

    function chart_update() {
        $.ajax({
            url: api_link + 'api_service.php?o=system_stat_current',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                let cpu = (parseFloat(data[1]) * 100).toFixed(0);
                let load_5 = (parseFloat(data[3]) * 100).toFixed(0);

                let memory_used = parseInt(data[7]);
                let memory_total = parseInt(data[8]);
                let memory_free = memory_total - memory_used;
                let memory_used_per = ((memory_used / memory_total) * 100).toFixed(0);

                let disk_total = parseFloat(data[6]).toFixed(0);
                let disk_used = parseFloat(data[5]).toFixed(0);
                let disk_free = disk_total - disk_used;
                let disk_used_per = ((disk_used / disk_total) * 100).toFixed(0);

                let ingress = (parseFloat(data[9]) / 1000).toFixed(0); // ingress
                let egress = (parseFloat(data[10]) / 1000).toFixed(0); // ingress
                let data_ratio = (egress / ingress).toFixed(0);

                chart_0_def.data.datasets[0].data = [cpu, 100 - cpu];
                chart_1_def.data.datasets[0].data = [load_5, 100 - load_5];
                chart_2_def.data.datasets[0].data = [memory_used, memory_free];
                chart_3_def.data.datasets[0].data = [disk_used, disk_free];
                chart_4_def.data.datasets[0].data = [ingress, egress];

                chart_0_def.update();
                chart_1_def.update();
                chart_2_def.update();
                chart_3_def.update();
                chart_4_def.update();

                $('#chart_0_val').html(cpu);
                $('#chart_1_val').html(load_5);
                $('#chart_2_val').html(memory_used_per);
                $('#chart_3_val').html(disk_used_per);
                $('#chart_4_val').html(data_ratio);

            }
        });
    }
});