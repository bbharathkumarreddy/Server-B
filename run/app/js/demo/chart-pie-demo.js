// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example

var pie_chart_1 = new Chart(document.getElementById("pie_chart_1"), {
    type: 'doughnut',
    data: {
        labels: ["CPU", "Ideal CPU"],
        datasets: [{
            data: [70, 10],
            backgroundColor: ['#1cc88a', '#eaecf4'],
            hoverBackgroundColor: ['#17a673', '#eaecf4'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
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


var pie_chart_3 = new Chart(document.getElementById("pie_chart_3"), {
    type: 'doughnut',
    data: {
        labels: ["RAM", "Free RAM"],
        datasets: [{
            data: [70, 10],
            backgroundColor: ['#1cc88a', '#eaecf4'],
            hoverBackgroundColor: ['#17a673', '#eaecf4'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
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
pie_chart_3.data.datasets[0].data = [60, 40];
pie_chart_3.update();
setInterval(function() {
    $.ajax({
        url: '/api/sys_stat.php?live=true',
        dataType: 'json',
        type: 'get',
        success: function(data) {
            var mem_usage = parseInt(data.data[7]);
            var mem_tot = parseInt(data.data[8]);
            var mem_free = mem_tot - mem_usage;
            pie_chart_3.data.datasets[0].data = [mem_usage, mem_free];
            pie_chart_3.update();
        }
    });
}, 5000);