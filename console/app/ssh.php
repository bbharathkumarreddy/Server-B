<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SSH</h1>
    </div>
    <div class="row mb-4">
        <div class="col-xl-12 col-md-12 mb-12 fr">
            <a href="<?php echo $app_link; ?>file-manager.php" class="btn btn-sm btn-info shadow-sm fr"><i class="fa fa-file-code fa-sm text-white-50"></i> File Manager</a>
            <a href="<?php echo $app_link; ?>ssh.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fas fa fa-greater-than fa-sm text-white-50"></i> SSH</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <iframe style="width:100%;height:593px;" src="<?php echo 'http://' . $public_ip . ':' . $shell_in_box_access_port; ?>"></iframe>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('bottom.php'); ?>