<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row mb-4">
        <div class="col-xl-12 col-md-12 mb-12 fr">
            <a href="<?php echo $app_link; ?>file-manager.php" class="btn btn-sm btn-info shadow-sm fr"><i class="fa fa-file-code fa-sm text-white-50"></i> File Manager</a>
            <a href="<?php echo $app_link; ?>ssh.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fas fa fa-greater-than fa-sm text-white-50"></i> SSH</a>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12" id="server_moniter">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="#" class="btn btn-circle btn-sm btn-status-success"></a> Server Monitor &nbsp;&nbsp;&nbsp;<small><kbd>top</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>free -m</kbd></small><small class="fr">Refresh Time:<?php echo $dashboard_refresh / 1000; ?>s</small></h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-3 col-md-2 md-2">
                        <div class="chart-pie">
                            <canvas id="chart_0" style="position: relative;top: -50px"></canvas>
                            <h5 style="position: relative;top:-200px;text-align:center;"><span id="chart_0_val">0</span>%</h5>
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
                            <h5 style="position: relative;top:-200px;text-align:center;"><span id="chart_1_val">0</span>%</h5>
                            <div class="text-center" style="position: relative;top: -100px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle" style="color:#fd7e14"></i> Load
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-md-2 md-2">
                        <div class="chart-pie">
                            <canvas id="chart_2" style="position: relative;top: -50px"></canvas>
                            <h5 style="position: relative;top:-200px;text-align:center;"><span id="chart_2_val">0</span>%</h5>
                            <div class="text-center" style="position: relative;top: -100px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Memory
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-md-2 md-2">
                        <div class="chart-pie">
                            <canvas id="chart_3" style="position: relative;top: -50px"></canvas>
                            <h5 style="position: relative;top:-200px;text-align:center;"><span id="chart_3_val">0</span>%</h5>
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
                            <h5 style="position: relative;top:-200px;text-align:center;" title="Ratio"><span id="chart_4_val">0:0</span></h5>
                            <div class="text-center" style="position: relative;top: -100px;">
                                <h5 class="mr-2">
                                    <i class="fas fa-circle" style="color: #f6c23e;"></i> Transfer
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="clear_ram" class="col-xs-3 col-md-2 md-2 zz" title="Clear RAM" style="cursor: pointer;">
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
    <br><br>
    <div class="row">
        <div class="col-xl-7 col-md-7 mb-7">
            <div class="card shadow mb-12" id="services">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Services&nbsp;&nbsp;&nbsp;<small><kbd>systemctl service status</kbd></small></h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-12 col-md-12 md-12">
                        <?php
                        $s = shell_exec($service . ' service_status_all');
                        $s = explode("\n", $s);
                        $service_count = 0;
                        $service_run_count = 0;
                        $service_stop_count = 0;
                        foreach ($s as $service_text_each) {
                            $service_count++;
                            if (strpos($service_text_each, '[ + ]') !== false) {
                                $service_run_count++;
                                $status_text = 'Running';
                                $status_icon = '<div class="col-xs-3 col-md-3 md-3 pointer"><i class="fas fa-circle text-success"></i>&nbsp;&nbsp;<span>Running</span></div>';
                                $service_text_each = trim(str_replace('[ + ]', ' ', $service_text_each));
                            } else if (strpos($service_text_each, '[ - ]') !== false) {
                                $service_stop_count++;
                                $status_text = 'Stopped';
                                $status_icon = '<div class="col-xs-3 col-md-3 md-3 ht-35 pointer"><i class="fas fa-circle text-danger"></i>&nbsp;&nbsp;<span>Stopped</span></div>';
                                $service_text_each = trim(str_replace('[ - ]', ' ', $service_text_each));
                            }
                            echo '<div class="row">
                                   ' . $status_icon . '
                                    <div class="col-xs-6 col-md-6 md-6 ht-35"><span>' . $service_text_each . ' Service<span></div>
                                    <div class="col-xs-3 col-md-3 md-3 ht-35">
                                        <div>
                                            <a href="#" class="serviceBtn" reload=true pre="Starting Service: ' . $service_text_each . '" link="' . $api_link . 'api_service.php?o=service_start&service_name=' . $service_text_each . '"><i class="fas fa-play text-success pointer" title="Start Service"></i></a> &nbsp; &nbsp;
                                            <a href="#" class="serviceBtn" reload=true pre="Stopping Service: ' . $service_text_each . '" link="' . $api_link . 'api_service.php?o=service_stop&service_name=' . $service_text_each . '"><i class="fas fa-stop text-danger pointer" title="Stop Service"></i></a> &nbsp; &nbsp;
                                            <a href="#" class="serviceBtn" reload=true pre="Restarting Service: ' . $service_text_each . '" link="' . $api_link . 'api_service.php?o=service_restart&service_name=' . $service_text_each . '"><i class="fas fa-redo-alt text-info pointer" title="Restart Service"></i></a> &nbsp; &nbsp;
                                            <a href="#" class="serviceBtn" reload=false pre="Fetching Service Status: ' . $service_text_each . '" link="' . $api_link . 'api_service.php?o=service_status&service_name=' . $service_text_each . '"><i class="fas fa-info text-primary pointer" title="Service Status"></i></a> &nbsp; &nbsp;
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-min4">';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-md-5 mb-5">
            <div class="card shadow" id="server_control">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Server Control &nbsp;&nbsp;&nbsp;<small><kbd>shutdown -h now</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>reboot now</kbd></small></h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-4 col-md-4 md-4 pointer" title="Start Server">
                        <h6><i class="fas fa-play text-success"></i>&nbsp;&nbsp;<span>Start</span></h6>
                    </div>
                    <div class="col-xs-4 col-md-4 md-4 pointer" title="Shutdown Server">
                        <a class="noline" target="_blank" href="<?php echo $api_link . 'api_service.php?o=shutdown'; ?>">
                            <h6><i class="fas fa-stop text-danger"></i>&nbsp;&nbsp;<span>Shutdown</span></h6>
                        </a>
                    </div>
                    <div class="col-xs-4 col-md-4 md-4 pointer" title="Restart Server">
                        <a class="noline" target="_blank" href="<?php echo $api_link . 'api_service.php?o=restart'; ?>">
                            <h6><i class="fas fa-redo-alt text-info"></i>&nbsp;&nbsp;<span>Restart</span></h6>
                        </a>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-xs-4 col-md-4 md-4 pointer" title="Ping 1 Link from config">
                        <a class="noline" target="_blank" href="<?php echo shell_exec($getKey . ' ping_1_link'); ?>">
                            <h6><i class="fas fa-table-tennis text-success"></i>&nbsp;&nbsp;<span>Ping 1</span></h6>
                        </a>
                    </div>
                    <div class="col-xs-4 col-md-4 md-4 pointer" title="Ping 2 Link from config">
                        <a class="noline" target="_blank" href="<?php echo shell_exec($getKey . ' ping_2_link'); ?>">
                            <h6><i class="fas fa-table-tennis text-dark"></i>&nbsp;&nbsp;<span>Ping 2</span></h6>
                        </a>
                    </div>
                    <div class="col-xs-4 col-md-4 md-4 pointer" title="Hosting Link from config">
                        <a class="noline" target="_blank" href="<?php echo shell_exec($getKey . ' hosting_link'); ?>">
                            <h6><i class="fas fa-server text-primary"></i>&nbsp;&nbsp;<span>Hosting</span></h6>
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow" id="ufw_firewall">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">UFW Firewall <small><kbd>ufw status</kbd></small>&nbsp;&nbsp;&nbsp;<p class="text-success fr m-0">&nbsp;&nbsp;enable</p>
                        <?php
                        $ufw_status_string = shell_exec('ufw status numbered');
                        if (!strpos($ufw_status_string, 'inactive') !== false) $ufw_status = 'checked="true"';
                        else $ufw_status = '';
                        ?>
                        <label class="switch fr m-0">
                            <input type="checkbox" style="" id="ufw_status_switch" <?php echo $ufw_status; ?>>
                            <span class="slider round"></span>
                        </label>
                        <p class="text-success fr m-0">disable&nbsp;&nbsp;</p>
                    </h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-12 col-md-12 md-12 pointer">
                        <div class="col-xs-12 col-md-12 md-12">
                            <small>
                                <table border="1px solid #797b85;" style="width: 100%;">
                                    <?php
                                    if ($ufw_status != '') {
                                        $ufw_status_arr = explode("\n", $ufw_status_string);
                                        foreach ($ufw_status_arr as $li) {
                                            if ($li[0] != '[') continue;
                                            $ufw_single = explode(']', $li);
                                            $ufw_no = $ufw_single[0] . ']';
                                            $ufw_ext_no = str_replace('[', '', $ufw_no);
                                            $ufw_id = trim(str_replace(']', '', $ufw_ext_no));
                                            $ufw_each = $ufw_single[1];
                                            echo '<tr>
                                                <td class="text-black">' . $ufw_no . '</td>
                                                <td class="pl-2">' . $ufw_each . '<span title="Delete Rule" class="ufw_id_close fr fs-15 text-danger" value="' . $ufw_each . '" ufw_id="' . $ufw_id . '" >x</span></td>
                                             </tr>';
                                        }
                                    } else {
                                        echo '<tr>
                                            <td><b>UFW Firewall Disabled</b></td>
                                        </tr>';
                                    }
                                    ?>
                                </table>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Server Info&nbsp;&nbsp;&nbsp;<small><kbd>uname -a</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>lshw</kbd></small></h6>
                </div>
                <div class="card-body row" id="info">
                    <div class="col-xs-12 col-md-12 md-12">
                        <small>
                            <table border="1px solid #797b85;" style="width: 100%;">
                                <tr>
                                    <td class="text-black">Server Name</td>
                                    <td class="pl-2"><?php echo shell_exec($getKey . ' server_name'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">Operating System</td>
                                    <td class="pl-2"><?php echo shell_exec($service . ' get_os'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">Public IP</td>
                                    <td class="pl-2"><?php echo shell_exec($getKey . ' public_ip'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">Private IP</td>
                                    <td class="pl-2"><?php echo shell_exec($getKey . ' private_ip'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">Domain</td>
                                    <td class="pl-2"><?php echo shell_exec($getKey . ' domain'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">Uptime</td>
                                    <td class="pl-2"><?php echo shell_exec('uptime -p'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">CPU</td>
                                    <td class="pl-2"><?php echo shell_exec($service . ' get_cpu_info'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">CPU Speed</td>
                                    <td class="pl-2"><?php echo shell_exec($service . ' get_cpu_speed'); ?> GHz</td>
                                </tr>
                                <tr>
                                    <td class="text-black">CPU Cores</td>
                                    <td class="pl-2"><?php echo shell_exec($service . ' get_cpu_cores'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">RAM Size</td>
                                    <td class="pl-2"><?php echo shell_exec($service . ' get_mem'); ?>MB</td>
                                </tr>
                                <tr>
                                    <td class="text-black">Disk Size</td>
                                    <td class="pl-2"><?php echo shell_exec($service . ' get_disk'); ?>GB</td>
                                </tr>
                                <tr>
                                    <td class="text-black">MAC Adddress</td>
                                    <td class="pl-2"><?php echo shell_exec($service . ' get_mac_address'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">PHP user</td>
                                    <td class="pl-2"><?php echo shell_exec($service . ' whoami'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">Services Count</td>
                                    <td class="pl-2"><?php echo $service_count ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">Running Services Count</td>
                                    <td class="pl-2"><?php echo $service_run_count ?></td>
                                </tr>
                                <tr>
                                    <td class="text-black">Stopper Services Count</td>
                                    <td class="pl-2"><?php echo $service_stop_count ?></td>
                                </tr>
                            </table>
                        </small>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow" id="config">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Config&nbsp;&nbsp;&nbsp;<small><kbd>bash $server_b getallKey</kbd></small></h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-12 col-md-12 md-12">
                        <small>
                            <table border="1px solid #797b85;" style="width: 100%;">
                                <tr>
                                    <td class="text-black">Key</td>
                                    <td class="text-black pl-2">Value</td>
                                </tr>
                                <?php
                                $getallKey = shell_exec($service . ' getallKey');
                                $getallKey_split_line = explode("\n", $getallKey);
                                foreach ($getallKey_split_line as $key) {
                                    $k = explode('=', $key);
                                    if ($k[0] == '') continue;
                                    $k[1] = str_replace("'", '', $k[1]);
                                    echo '<tr>
                                                <td class="text-black">' . $k[0] . '</td>
                                                <td class="pl-2">' . $k[1] . '</td>
                                              </tr>';
                                }
                                ?>
                            </table>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12" id="log_point">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Easy Access Point (Log & Config File) &nbsp;&nbsp;&nbsp;<small><kbd>bash $server_b getLogFile</kbd></small>&nbsp;&nbsp;&nbsp;<a href="#" class="fr d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="add_log_point" data-toggle="modal" data-target="#logpoint_modal"><i class="fas fa-plus fa-sm text-white-50"></i> Add File</a><small><a target="_blank" href="<?php echo $app_file_manager_link . 'p=' . $server_b_data . '&env=ace&edit=logpoint.sh'; ?>" class="fr noline mr-10 mt-10">Raw Listing File</a></small></h6>
                </div>
                <div class="card-body">
                    <?php
                    $getLogFile = shell_exec($service . ' getLogFile');
                    $getLogFileSplit = explode("\n", $getLogFile);
                    foreach ($getLogFileSplit as $index => $getLogFileLine) {
                        if ($getLogFileLine == "") continue;
                        $getLogFileEach = explode(" ", $getLogFileLine);
                        $file_link = explode('/', $getLogFileEach[1]);
                        $link_length = sizeof($file_link);
                        $file_identifier = $getLogFileEach[0];
                        $file_path_full = $getLogFileEach[1];
                        $file_name = $file_link[$link_length - 1];
                        array_pop($file_link);
                        $file_path = str_replace('/' . $file_name, '', $file_path_full);
                        $c = $index + 1;
                        echo '<div class="row">
                        <div class="col-xl-4 col-md-4 mb-4 mb-0">
                            <p class="mb-0">' . $c . '.  ' . $getLogFileEach[0] . '</p>
                        </div>
                        <div class="col-xl-8 col-md-8 mb-8 mb-0">
                            <a class="noline" target="_blank" href="' . $app_link . 'file-manager.php?p=' . $file_path . '&view=' . $file_name . '">
                                <p class="mb-0">' . $getLogFileEach[1] . '</p>
                            </a>                            
                        </div>
                    </div>
                    <hr class="mt-10">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12" id="cron_manager">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cron Manager&nbsp;&nbsp;&nbsp;<small><kbd>crontab -l</kbd></small><a href="#" class="fr d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" id="publish_cron_file"><i class="fas fa-plus fa-sm text-white-50"></i> Step 2 Publish Cron File</a><a href="<?php echo $app_file_manager_link . 'p=' . $server_b_data . '&env=ace&edit=temp_cron'; ?>" target="_blank" class="fr d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-10" id="update_cron_file"><i class="fas fa-plus fa-sm text-white-50"></i> Step 1 Update Cron File</a></h6>
                </div>
                <div class="card-body">
                    <?php
                    $get_cron_file = shell_exec($service . ' get_cron_file');
                    $get_cron_each = explode("\n", $get_cron_file);
                    foreach ($get_cron_each as $key) {
                        if ($key == '') continue;
                        echo '<div class="row">
                        <div class="col-xl-12 col-md-12 mb-12 mb-0">
                            <a class="noline" >
                                <p class="mb-0">' . $key . '</p>
                            </a>                            
                        </div>
                    </div>
                    <hr class="mt-10">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>

<!-- Logpoint Modal-->
<div class="modal fade" id="logpoint_modal" tabindex="-1" role="dialog" aria-labelledby="logpoint_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add File</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>File Name: <input id="file_name" type="text" placeholder="foo-bar"></p>
                <p>File Path: &nbsp;&nbsp;<input id="file_path" type="text" placeholder="/var/www/foo-bar.log"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="button" id="add_file_confirm">Add File</button>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
<?php include('bottom.php'); ?>