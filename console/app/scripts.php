<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-0 text-gray-800">Scripts Panel</h1>
    </div>
    <div class="row mb-4">
        <div class="col-xl-12 col-md-12 mb-12 fr">
            <a href="<?php echo $app_link; ?>file-manager.php" class="btn btn-sm btn-info shadow-sm fr"><i class="fa fa-file-code fa-sm text-white-50"></i> File Manager</a>
            <a href="<?php echo $app_link; ?>dashboard.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fa fa-tachometer-alt fa-sm text-white-50"></i> Dashboard</a>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12" id="server_moniter">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Scripts</h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-12 col-md-12 md-12">
                        <br>
                        <p>General Script <small>(Shell Script Only)</small>&nbsp;&nbsp;&nbsp;<a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=var/www/server-b-data&view=general.sh"><small>View <i class="fa fa-file"></i></small></a>&nbsp;&nbsp;&nbsp;<a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=var/www/server-b-data&edit=general.sh&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" type="general" class="noline script_play"><small>Run <i class="fa fa-play"></i></small></a>
                        <br>
                        <textarea id="general_script" readonly="" placeholder="Click edit button and save script" rows="10" cols="10" style="width: 500px;"><?php
                            $general_script = file_get_contents('/var/www/server-b-data/general.sh');
                            if($general_script != '') echo $general_script;
                            ?></textarea>
                        <br>
                        <p>Reboot / Restart Script <small>(Shell Script Only)</small>&nbsp;&nbsp;&nbsp;<a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=var/www/server-b-data&view=reboot.sh"><small>View <i class="fa fa-file"></i></small></a>&nbsp;&nbsp;&nbsp;<a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=var/www/server-b-data&edit=reboot.sh&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" type="reboot" class="noline script_play"><small>Run <i class="fa fa-play"></i></small></a>
                        <br>
                        <textarea id="reboot_script" readonly="" placeholder="Click edit button and save script" rows="10" cols="10" style="width: 500px;"><?php
                            $reboot_script = file_get_contents('/var/www/server-b-data/reboot.sh');
                            if($reboot_script != '') echo $reboot_script;
                            ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>

<!-- Info Modal-->
<div class="modal fade" id="info_modal" tabindex="-1" role="dialog" aria-labelledby="info_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-gray-100">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="info_modal_body" class="bg-white" style="width: 100%;height:100%;">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?php include('bottom.php'); ?>
<script>
    $(document).ready(function(){
        $(".script_play").click(function(){
            let type = $(this).attr('type');
            $.ajax({
                url: api_link + 'api_service.php?o=script_play&type=' + type,
                type: 'GET',
                dataType: 'text',
                success: function(data) {
                    $('#info_modal').modal('show');
                    if (data == '') data = '🚀 No data to show';
                    $('#info_modal_body').text(data);
                }
            });
        });
    });
</script>