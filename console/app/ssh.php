<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SSH</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <iframe style="width:100%;height:600px;" src="<?php echo 'http://' . $public_ip . ':' . $shell_in_box_access_port; ?>"></iframe>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('bottom.php'); ?>