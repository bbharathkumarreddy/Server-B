var line_chart = document.getElementById('line-chart');
var mylinechart = new Chart(line_chart, {
    type: 'line',
    data: {
        labels: [100, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 100, 200, 100, 30],
        datasets: [{
            data: [600, 170, 178, 190, 0, 0, 0, 03, 276, 408, 547, 675, 600],
            label: "Ingress",
            borderColor: "#1cc88a",
            fill: false
        }, {
            data: [282, 350, 411, 502, 635, 809, 947, 250, 0, 300],
            label: "Egress",
            borderColor: "#4E73DD",
            fill: false
        }, {
            data: [168, 600, 178, 190, 203, 276, 408, 547, 675, 734],
            label: "Total Ingress",
            borderColor: "#e74a3b",
            fill: false
        }, {
            data: [40, 0, 10, 16, 24, 150, 74, 167, 508, 784],
            label: "Total Egress",
            borderColor: "#f6c23e",
            fill: false
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'World population per region (in millions)'
        }
    }
});