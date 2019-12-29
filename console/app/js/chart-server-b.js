$(document).ready(function() {
    $("body").click(function() {

    });

    var ctx = document.getElementById("chart_0");
    var chart_0_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["CPU", "Ideal", ],
            datasets: [{
                data: [90, 10],
                backgroundColor: ['#4e73df', '#eaecf4'],
                hoverBackgroundColor: ['#2858e5', '#eaecf4'],
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
            labels: ["CPU", "Ideal", ],
            datasets: [{
                data: [30, 70],
                backgroundColor: ['#1cc88a', '#eaecf4'],
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

});