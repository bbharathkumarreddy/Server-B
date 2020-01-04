$(document).ready(function() {
    var ctx = document.getElementById("chart_0");
    var chart_0_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["CPU", "Ideal", ],
            datasets: [{
                data: [90, 10],
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
            labels: ["Load", "Ideal", ],
            datasets: [{
                data: [30, 70],
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
            labels: ["Used", "Free", ],
            datasets: [{
                data: [30, 70],
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
            labels: ["Disk", "Free", ],
            datasets: [{
                data: [70, 30],
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
            labels: ["Ingress", "Egress", ],
            datasets: [{
                data: [45, 55],
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
        },
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

                chart_0_def.data.datasets[0].data = [cpu, 100 - cpu];
                chart_1_def.data.datasets[0].data = [load_5, 100 - load_5];
                chart_2_def.data.datasets[0].data = [memory_used, memory_total];

                chart_0_def.update();
                chart_1_def.update();
                chart_2_def.update();

                $('#chart_0_val').html(cpu);
                $('#chart_1_val').html(load_5);
                $('#chart_3_val').html(memory_used_per);
            }
        });
    }, 3000);
});