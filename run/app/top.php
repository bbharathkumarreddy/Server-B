<?php $host = "http://".file_get_contents("/var/www/server-b-data/server_public_ip").":".file_get_contents("/var/www/server-b-data/server_b_port");
$host = str_replace("\n", "", $host); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The server b on your server">
    <meta name="author" content="server b">

    <title>Server B</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .btn-status-success {
            animation: fadeIn 0.5s infinite alternate;
            background-color: #1cc88a;
            transform: scale(0.9);
            animation-delay: 0.5s;
        }

        .btn-status-danger {
            animation: fadeIn 0.5s infinite alternate;
            background-color: #e74a3b;
            transform: scale(0.9);
            display: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0.3;
            }
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-hdd"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Server B</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <div class="col-12">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">

                            <small>Server</small><br> &nbsp;
                            <b style="font-size: smaller;"><?php readfile("/var/www/server-b-data/server_name") ?></b> &nbsp;
                            <b></b>
                            <br>
                            <small>Public IP</small><br> &nbsp;
                            <b><?php readfile("/var/www/server-b-data/server_public_ip") ?></b>
                            <br>
                            <small>Private IP</small><br> &nbsp;
                            <b><?php readfile("/var/www/server-b-data/server_int_ip") ?></b>
                        </div>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-desktop"></i>
                    <span>Website</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-chess-board"></i>
                    <span>Services</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $host.'/app/filemanager.php'; ?>">
                    <i class="fa fa-file-code"></i>
                    <span>File Manger</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $host.'/app/ssh.php'; ?>">
                    <i class="fa fa-greater-than"></i>
                    <span>SSH</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-tasks"></i>
                    <span>Cron</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-code-branch"></i>
                    <span>GIT Setup</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-cog"></i>
                    <span>Config</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-box-open"></i>
                    <span>Setup</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-box-open"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item btn-status" title="Server Running">
                            <a href="#" class="btn btn-circle btn-sm btn-status-success">

                            </a>
                        </li>
                        &nbsp;&nbsp;
                        <li class="nav-item btn-status" title="Server Stopped">
                            <a href="#" class="btn btn-circle btn-sm btn-status-danger">

                            </a>
                        </li>
                    </ul>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link" href="#">
                                <i class="fas fa-bell fa-qrcode"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                                <i class="fas fa-bell fa-user-shield"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->