<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php 
    $link = '';
    if(isset($_GET['link']))
    {
        $link = base64_decode($_GET['link']);
    }
    ?>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <iframe style="width:100%;height:1000px;" src="<?php echo 'http://' . $public_ip . ':' . $server_b_port . '/app/tinyfilemanager.php?p='.$link; ?>"></iframe>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('bottom.php'); ?>