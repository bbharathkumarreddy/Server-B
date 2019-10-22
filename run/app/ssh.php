<?php include_once('top.php'); ?>
<div class="container-fluid">
<?php $public_ip = readfile("/var/www/server-b-data/server_public_ip"); ?>
<?php $server_b_port = readfile("/var/www/server-b-data/server_b_port"); ?>
<iframe src="http://<?php echo $public_ip.':'.$server_b_port; ?>/" frameborder="0" style="width:100%;height:600px;"></iframe>

</div>
<?php include_once('bottom.php'); ?>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script>
    $(document).ready(function() {

    });
</script>
<?php include_once('page-complete.php'); ?>