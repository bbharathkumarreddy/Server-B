<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php 
    $link = '';
    if(isset($_SERVER['QUERY_STRING'])) $link = $_SERVER['QUERY_STRING'];
    ?>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <iframe style="width:100%;height:1000px;" src="<?php echo 'http://' . $public_ip . ':' . $server_b_port . '/app/embed-filemanager.php?'.$link; ?>"></iframe>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('bottom.php'); ?>