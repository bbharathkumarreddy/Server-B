<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-0 text-gray-800">App Store</h1>
    </div>
    <div class="row mb-4">
        <div class="col-xl-12 col-md-12 mb-12 fr">
            <a href="<?php echo $app_link; ?>file-manager.php" class="btn btn-sm btn-info shadow-sm fr"><i class="fa fa-file-code fa-sm text-white-50"></i> File Manager</a>
            <a href="<?php echo $app_link; ?>dashboard.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fa fa-tachometer-alt fa-sm text-white-50"></i> Dashboard</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow mb-12" id="services">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Apps</h6>
                </div>
                <div class="card-body row ma">
                    <?php
                    include('../api/app_list.php');
                    foreach($base_list as $each){
                        if($each == "") { echo '<hr style="width: 100%;">'; continue; }
                        
                        $p = shell_exec('dpkg --get-selections | grep '.$app_list[$each]['name']);
                        $css = 'app-card-danger';
                        $disp_show = 'block';
                        if (trim(strpos($p, $app_list[$each]['name'])) != '') $css = 'app-card-success';
                        
                        if(!isset($app_list[$each]['display'])) $app_list[$each]['display'] = $app_list[$each]['name'];
                    

                        if($app_list[$each]['protect'] == true) $disp_show = 'none';
                        echo '<div class="'.$css.' card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:'.$app_list[$each]['width'].'px;" src="'. $app_link.'/img/'.$app_list[$each]['img'].'">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">'.$app_list[$each]['display'].'</div>
                                    <i class="fas fa-download text-success install_app" app_name="'.$app_list[$each]['name'].'" style="display:'.$disp_show.';" title="Install '.$app_list[$each]['name'].'"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger delete_app" app_name="'.$app_list[$each]['name'].'" style="display:'.$disp_show.';" title="Unistall '.$app_list[$each]['name'].'"></i>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('bottom.php'); ?>