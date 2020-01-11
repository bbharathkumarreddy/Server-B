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
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/nginx.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Nginx</div>
                                    <i class="fas fa-download text-success" title="Install Nginx"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Nginx"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/php.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">PHP</div>
                                    <i class="fas fa-download text-success" title="Install PHP"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall PHP"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/mysql.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Mysql</div>
                                    <i class="fas fa-download text-success" title="Install Mysql"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Mysql"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:42px;" src="<?php echo $app_link . '/img/nodejs.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Node JS</div>
                                    <i class="fas fa-download text-success" title="Install Node JS"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Node JS"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-danger card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:52px;" src="<?php echo $app_link . '/img/npm.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">NPM</div>
                                    <i class="fas fa-download text-success" title="Install NPM"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall NPM"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/python.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Python</div>
                                    <i class="fas fa-download text-success" title="Install Python"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Python"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:32px;" src="<?php echo $app_link . '/img/apache.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Apache</div>
                                    <i class="fas fa-download text-success" title="Install Apache"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Apache"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:44px;" src="<?php echo $app_link . '/img/jupyter.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Jupyter</div>
                                    <i class="fas fa-download text-success" title="Install Jupyter"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Jupyter"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/redis.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Redis</div>
                                    <i class="fas fa-download text-success" title="Install Redis"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Redis"></i>
                                </div>
                            </div>
                        </div>
                    </div>                    
                     <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:44px;" src="<?php echo $app_link . '/img/mongodb.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">MongoDB</div>
                                    <i class="fas fa-download text-success" title="Install MongoDB"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall MongoDB"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:29px;" src="<?php echo $app_link . '/img/elasticsearch.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc" style="font-size: 12px !important;">Elasticsearch</div>
                                    <i class="fas fa-download text-success" title="Install Elasticsearch"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Elasticsearch"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:25px;" src="<?php echo $app_link . '/img/wordpress.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Wordpress</div>
                                    <i class="fas fa-download text-success" title="Install Wordpress"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Wordpress"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:32px;" src="<?php echo $app_link . '/img/magento.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Magento</div>
                                    <i class="fas fa-download text-success" title="Install Magento"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Magento"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:50px;" src="<?php echo $app_link . '/img/joomla.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Joomla</div>
                                    <i class="fas fa-download text-success" title="Install Joomla"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Joomla"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:42px;" src="<?php echo $app_link . '/img/drupal.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Drupal</div>
                                    <i class="fas fa-download text-success" title="Install Drupal"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Drupal"></i>
                                </div>
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