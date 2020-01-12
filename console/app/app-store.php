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
                    $list =  array(
                        "nginx" => array("name" => "nginx", "img" => "nginx.png", "width" => "55", "status" => true),
                        "php" => array("name" => "php", "img" => "php.png", "width" => "55", "status" => true),
                        "apache" => array("name" => "apache", "img" => "apache.png", "width" => "32", "css" => "app-card-danger", "status" => false),
                        "nodejs" => array("name" => "nodejs", "img" => "nodejs.png", "width" => "42", "status" => true),
                        "python" => array("name" => "python", "img" => "python.png", "width" => "50", "status" => true),
                        "golang" => array("name" => "golang", "img" => "golang.png", "width" => "48", "status" => true),
                        "mysql" => array("name" => "mysql", "img" => "mysql.png", "width" => "55", "status" => true),
                        "postgres" => array("name" => "postgres", "img" => "postgres.png", "width" => "31", "status" => true),
                        "mongodb" => array("name" => "mongodb", "img" => "mongodb.png", "width" => "44", "status" => true),
                        "elasticsearch" => array("name" => "elasticsearch", "img" => "elasticsearch.png", "width" => "29", "status" => true),
                        "redis" => array("name" => "redis", "img" => "redis.png", "width" => "38", "status" => true),
                        "npm" => array("name" => "npm", "img" => "npm.png", "width" => "54", "status" => true),
                        "jupyter" => array("name" => "jupyter", "img" => "jupyter.png", "width" => "44", "status" => true),
                        "shellbox" => array("name" => "shellbox", "img" => "shellinabox.png", "width" => "36", "status" => true)
                    );
                    $base_list =  array("nginx","php","apache","nodejs","python","golang","mysql","postgres","mongodb","elasticsearch","redis","npm","jupyter","shellbox");

                    foreach($base_list as $each){
                        if($each == "") { echo '<hr style="width: 100%;">'; continue; }
                        
                        $p = shell_exec('dpkg --get-selections | grep '.$list[$each]['name']);
                        $css = 'app-card-danger';
                        if (trim(strpos($p, $list[$each]['name'])) != '') $css = 'app-card-success';
                        if($list[$each]['name'] == 'elasticsearch') $list[$each]['name'] = 'Els.Search';
                        echo '<div class="'.$css.' card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:'.$list[$each]['width'].'px;" src="'. $app_link.'/img/'.$list[$each]['img'].'">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">'.$list[$each]['name'].'</div>
                                    <i class="fas fa-download text-success" title="Install '.$list[$each]['name'].'"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall '.$list[$each]['name'].'"></i>
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