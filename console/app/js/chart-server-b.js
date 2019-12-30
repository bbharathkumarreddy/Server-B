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

    var ctx = document.getElementById("chart_1");
    var chart_1_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Used", "Free", ],
            datasets: [{
                data: [30, 70],
                backgroundColor: ['#4268d6', '#eaecf4'],
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

    var ctx = document.getElementById("chart_2");
    var chart_2_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Load", "Ideal", ],
            datasets: [{
                data: [30, 70],
                backgroundColor: ['#fd7e14', '#eaecf4'],
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

    var ctx = document.getElementById("chart_3");
    var chart_3_def = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Disk", "Free", ],
            datasets: [{
                data: [70, 30],
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

});