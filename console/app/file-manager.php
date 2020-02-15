<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php 
    $link = '';
    if(isset($_SERVER['QUERY_STRING'])) $link = $_SERVER['QUERY_STRING'];
    ?>
    <div class="row mb-4">
        <div class="col-xl-12 col-md-12 mb-12 fr">
            <a href="<?php echo $app_link; ?>dashboard.php" class="btn btn-sm btn-info shadow-sm fr"><i class="fa fa-tachometer-alt fa-sm text-white-50"></i> Dashboard</a>
            <a href="<?php echo $app_link; ?>ssh.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fas fa fa-greater-than fa-sm text-white-50"></i> SSH</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <iframe style="width:100%;height:1000px;" src="<?php echo 'https://' . $public_server_b_access . ':' . $server_b_port . '/app/embed-filemanager.php?'.$link; ?>"></iframe>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('bottom.php'); ?>