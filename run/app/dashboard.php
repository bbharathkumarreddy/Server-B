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
                    <h6 class="m-0 font-weight-bold text-primary">Network Analysis</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center small">
                        <div class="chart-pie pb-2">
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
                    <h6 class="m-0 font-weight-bold text-primary">Server</h6>
                </div>
                <!-- Card Body -->
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-3 m-auto text-center">
                                <a href="#"><i class="fas fa-play fa-2x text-success"></i><br>Start</a>
                            </div>
                            <div class="col-3 m-auto text-center">
                                <a href="#"><i class="fas fa-stop fa-2x text-danger"></i><br>Stop</a>
                            </div>
                            <div class="col-3 m-auto text-center">
                                <a href="#"><i class="fas fa-sync fa-2x text-info"></i><br>Restart</a>
                            </div>
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
                    <h6 class="m-0 font-weight-bold text-primary">Server B Update</h6>
                </div>
                <!-- Card Body -->
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-3 m-auto text-center">
                                <a id="update-btn" style="cursor: pointer;"><i class="fas fa-sync fa-2x text-info"></i><br>Update</a>
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
                $.ajax({
                    url: '/api/sys_command.php',
                    dataType: 'text',
                    type: 'get',
                    data:{cmd:command},
                    success: function(data) {
                        console.log(data);
                        alert('Already up to date');
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
                    },
                });
            }, 30000);
        });
    </script>
    <?php include_once('page-complete.php'); ?>