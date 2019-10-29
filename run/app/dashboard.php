<?php include_once('top.php'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">System Monitoring</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center small">
                        <div class="chart-pie pb-2" >
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Network Analysis</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center small">
                        <div class="chart-pie pb-2" >
                            <canvas id="line-chart-2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Server B</h6>
                </div>
                <!-- Card Body -->
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-3 m-auto text-center">
                                <a id="update-btn" style="cursor: pointer;"><i class="fas fa-sync fa-2x text-info"></i><br>Update Server B</a>
                            </div>
                            <div class="col-3 m-auto text-center">
                                <a class="" command="start"><i class="fas fa-play fa-2x text"></i><br>Start Server</a>
                            </div>
                            <div class="col-3 m-auto text-center">
                                <a class="command-btn" command="shutdown" href="javascript:;"><i class="fas fa-stop fa-2x text-danger"></i><br>Stop Server</a>
                            </div>
                            <div class="col-3 m-auto text-center">
                                <a class="command-btn" command="reboot" href="javascript:;"><i class="fas fa-sync fa-2x text-info"></i><br>Restart Server</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('bottom.php'); ?>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/line-chart.js"></script>
    <script>
        $(document).ready(function() {
            $('#update-btn').click(function() {
                $.ajax({
                    url: '/api/update-server-b.php',
                    dataType: 'text',
                    type: 'get',
                    success: function(data) {
                        data =$.trim(data.replace(/[\t\n]+/g, ' '))
                        if(data.includes('Already up to date')){
                            alert('Already up to date');
                        }
                        else{                            
                            alert('Update Successful');
                            location.reload(true);
                        }
                    },
                });
            });

            $('.command-btn').click(function() {
                var command = $(this).attr('command');
                alert('Please wait for '+command);
                $.ajax({
                    url: '/api/sys_command.php',
                    dataType: 'text',
                    type: 'get',
                    data:{cmd:command},
                    success: function(data) {
                        console.log(data);
                        alert(data);
                    },
                });
            });


            setInterval(function(){
                $.ajax({
                    url: '/api/sys_stat.php',
                    dataType: 'json',
                    type: 'get',
                    success: function(data) {
                        
                        console.log(data)
                        for(var i=0;i<data.data.length;i++){
                            var dt = new Date();
                            var time = dt.getDate()+" "+ dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                            console.log(time)
                        }
                    },
                });
            }, 2000);

            var line_chart_2 = document.getElementById('line-chart-2');
            var mylinechart_2 = new Chart(line_chart_2, {
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

            setInterval(function(){ 

                
                mylinechart_2.data.datasets[Math.floor((Math.random() * 3) + 1)].data[Math.floor((Math.random() * 10) + 1)] = Math.floor((Math.random() * 500) + 1);//this update the value of may
                mylinechart_2.data.datasets.forEach((dataset) => {
                    dataset.data.push(Math.floor((Math.random() * 800) + 1));
                });
                mylinechart_2.data.labels.push(Math.floor((Math.random() * 100) + 1));
                mylinechart_2.data.labels.splice(0,1);
                mylinechart_2.update();
             }, 10000);
        });
    </script>
    <?php include_once('page-complete.php'); ?>