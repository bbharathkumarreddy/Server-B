<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-0 text-gray-800">Nginx Config</h1>
    </div>
    <div class="row mb-4">
        <div class="col-xl-12 col-md-12 mb-12 fr">
            <a href="<?php echo $app_link; ?>dashboard.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fa fa-tachometer-alt fa-sm text-white-50"></i> Dashboard</a>
            <a href="<?php echo $app_link; ?>ssh.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fas fa fa-greater-than fa-sm text-white-50"></i> SSH</a>      
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12" id="server_moniter">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Nginx Config</h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-12 col-md-6 md-6">
                        <h4>Nginx Default Server Block</h4>
                        <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=etc/nginx/sites-enabled/&edit=default&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                        
                        <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=etc/ssl/default/&edit=ssl-cert.crt&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                        <br>
                        <textarea id="ssl_cert_crt" disabled="" placeholder="Click edit button and save certificate file" rows="20" cols="9" style="width: 500px;font-size:10px;"><?php
                            $general_script = file_get_contents('/etc/ssl/default/ssl-cert.crt');
                            if($general_script != '') echo $general_script;
                            ?></textarea>
                    </div>
                    <div class="col-xs-12 col-md-6 md-6">
                    <br>
                        <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=etc/ssl/default/&edit=ssl-cert.key&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                                         
                        <br>
                        <textarea id="ssl_cert_key" disabled="" placeholder="Click edit button and save key file" rows="20" cols="9" style="width: 500px;font-size:10px;"><?php
                            $general_script = file_get_contents('/etc/ssl/default/ssl-cert.key');
                            if($general_script != '') echo $general_script;
                            ?></textarea>
                           
                    </div>
                    <div class="card-body row">
                    </br>
                    <hr>
                    </br>
                    <div class="col-xs-12 col-md-6 md-6">    
                    </div>               
                        <ht>                        
                        <h4>Server B Panel - Block</h4>
                        <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=etc/nginx/sites-enabled/&edit=server-b-nginx.conf&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>

                        <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=etc/ssl/server-b/&edit=server-b-cert.crt&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                        
                        <br>

                        <textarea id="ssl_cert_crt" disabled="" placeholder="Click edit button and save certificate file" rows="20" cols="9" style="width: 500px;font-size:10px;"><?php
                            $general_script = file_get_contents('/etc/ssl/server-b/server-b-cert.crt');
                            if($general_script != '') echo $general_script;
                            ?></textarea>
                    </div>
                    <div class="col-xs-12 col-md-6 md-6">  
                    <br>
                    <br>
                    <br>
                        <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=etc/ssl/server-b/&edit=server-b-cert.key&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                        <br>
                        
                        <textarea id="ssl_cert_key" disabled="" placeholder="Click edit button and save key file" rows="20" cols="9" style="width: 500px;font-size:10px;"><?php
                            $general_script = file_get_contents('/etc/ssl/server-b/server-b-cert.key');
                            if($general_script != '') echo $general_script;
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