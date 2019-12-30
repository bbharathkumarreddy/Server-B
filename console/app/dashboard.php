<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="#" class="btn btn-circle btn-sm btn-status-success"></a> Server Monitor</h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-3 col-md-2 md-2">
                        <div class="chart-pie">
                            <canvas id="chart_0" style="position: relative;top: -50px"></canvas>
                            <h5 style="position: relative;top:-200px;text-align:center;">80%</h5>
                            <div class="text-center" style="position: relative;top: -100px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle text-success"></i> CPU
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-md-2 md-2">
                        <div class="chart-pie">
                            <canvas id="chart_1" style="position: relative;top: -50px"></canvas>
                            <h5 style="position: relative;top:-200px;text-align:center;">30%</h5>
                            <div class="text-center" style="position: relative;top: -100px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Memory
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-md-2 md-2">
                        <div class="chart-pie">
                            <canvas id="chart_2" style="position: relative;top: -50px"></canvas>
                            <h5 style="position: relative;top:-200px;text-align:center;">30%</h5>
                            <div class="text-center" style="position: relative;top: -100px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle" style="color:#fd7e14"></i> Load
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-md-2 md-2">
                        <div class="chart-pie">
                            <canvas id="chart_3" style="position: relative;top: -50px"></canvas>
                            <h5 style="position: relative;top:-200px;text-align:center;">30%</h5>
                            <div class="text-center" style="position: relative;top: -100px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Disk
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-md-2 md-2">
                        <div class="chart-pie">
                            <canvas id="chart_4" style="position: relative;top: -50px"></canvas>
                            <h5 style="position: relative;top:-200px;text-align:center;">30%</h5>
                            <div class="text-center" style="position: relative;top: -100px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle" style="color: #f6c23e;"></i> Transfer
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-md-2 md-2 zz" title="Clear RAM" style="cursor: pointer;">
                        <div class="chart-pie">
                            <canvas id="chart_5" style="position: relative;top: -50px"></canvas>
                            <h1 class="zoom" style="position: relative;top:-208px;text-align:center;cursor:pointer;" title="Clear RAM"><i class="fas fa-memory"></i></h1>
                            <div class="text-center" style="position: relative;top: -125px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle text-dark"></i> Clear RAM
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('bottom.php'); ?>