<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-0 text-gray-800">GIT Panel</h1>
    </div>
    <div class="row mb-4">
        <div class="col-xl-12 col-md-12 mb-12 fr">
            <a href="<?php echo $app_link; ?>file-manager.php" class="btn btn-sm btn-info shadow-sm fr"><i class="fa fa-file-code fa-sm text-white-50"></i> File Manager</a>
            <a href="<?php echo $app_link; ?>dashboard.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fa fa-tachometer-alt fa-sm text-white-50"></i> Dashboard</a>
        </div>
    </div>
    <!-- Content Row -->
    <?php
        $git_trigger_enable = trim(shell_exec($getKey . ' git_trigger_enable'));
        if ($git_trigger_enable == 'enable') { $git_trigger_checkbox = 'checked="true"'; $alert_show = 'disp-none'; }
        else { $git_trigger_checkbox = ''; $alert_show = ''; }
     ?>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12" id="server_moniter">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-code-branch"></i> GIT Trigger &nbsp;&nbsp;&nbsp;<small><kbd>git status</kbd></small><label class="switch fr m-0" style="margin-right: 60px !important;">
                        <p class="text-success fr m-0" style="margin-right: -56px !important;">&nbsp;&nbsp;enable</p>
                            <input type="checkbox" git="git_enable" <?php echo $git_trigger_checkbox; ?> class="git_btn" id="git_trigger_enable">
                            <span class="slider round"></span>
                        </label>
                        <p class="text-success fr m-0">disable&nbsp;&nbsp;</p></h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-12 col-md-12 md-12">
                        <?php
                            $public_server_b_domain = trim(shell_exec($getKey . ' public_server_b_domain'));
                            $server_b_auth_key = trim(shell_exec($getKey . ' server_b_auth_key'));
                            if($public_server_b_domain == '') $public_server_b_domain = trim(shell_exec($getKey . ' public_ip'));
                            $git_trigger_link = 'https://'.trim(shell_exec($getKey . ' server_b_username')).':'.trim(shell_exec($getKey . ' server_b_password')).'@'.trim(shell_exec($getKey . ' public_server_b_domain')).':'.trim(shell_exec($getKey . ' server_b_port')).'/api/git-update.php?key='.$server_b_auth_key;
                        ?>
                        <div class="alert alert-danger <?php echo $alert_show; ?>" >
                            <strong>Attention!</strong> GIT Triggers is disabled; GIT Trigger webhook url works once enabled;
                        </div>
                        <button id="git_status_btn" git="status" class="btn btn-sm btn-success shadow-sm mr-10 git_btn"><i class="fa fa-code-branch fa-sm text-white-50"></i> Git Status</button>
                        <a target="_blank" href="<?php echo $git_trigger_link; ?>" id="git_pull_btn" git="pull" class="btn btn-sm btn-info shadow-sm mr-10"><i class="fa fa-code-branch fa-sm text-white-50"></i> Git Pull - Update</a>
                        <button id="git_stash_btn" git="stash" class="btn btn-sm btn-warning shadow-sm mr-10 git_btn"><i class="fa fa-code-branch fa-sm text-white-50"></i> Git Stash</button>
                        <button id="git_reset_btn" git="reset" class="btn btn-sm btn-warning shadow-sm mr-10 git_btn"><i class="fa fa-code-branch fa-sm text-white-50"></i> Git Reset</button>
                        <br>
                        <br>
                        <br>
                        <h6>Folder<br><b><span><?php echo shell_exec($getKey . ' git_folder_path'); ?></span></b></h6>
                        <br>
                        <h6>GIT Trigger Webhook Url (Used for Github / Bitbucket)<br><a target="_blank" href="<?php echo $git_trigger_link; ?>"><b><span><?php echo $git_trigger_link; ?></span></b></a></h6>
                        <br>
                        <h6>Secret (Optional -> Used for Github / Bitbucket)<br><a href="javascript:;"><b><span><?php echo $server_b_auth_key; ?></span></b></a></h6>
                        <br>
                        <p>GIT Trigger History<a target="_blank"  class="noline" href="<?php echo $app_link; ?>file-manager.php?p=var/www/server-b-data&view=git_trigger_history.txt"> <small>View <i class="fa fa-file"></i></small></a>
                        <br>
                        <textarea id="trigger_history" readonly="" rows="10" cols="10" style="width: 500px;font-size:14px;color:darkgrey;"><?php
                            $git_trigger_history = file_get_contents('/var/www/server-b-data/git_trigger_history.txt');
                            if($git_trigger_history == '') echo 'No Git / Update Triggered';
                            else echo $git_trigger_history;
                            ?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12" id="server_moniter">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-code-branch"></i> Git Config &nbsp;&nbsp;&nbsp;<small><kbd>git status</kbd></small></h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-12 col-md-12 md-12">
                        <p>Folder Path <span class="text-danger">*</span>
                        <br><input id="folder_path" type="text" placeholder="/var/www/html" style="width:500px;" value="<?php echo shell_exec($getKey . ' git_folder_path'); ?>"></p>
                        <p>GIT Repository <span class="text-danger">*</span>
                        <br>
                        <input id="git_repo" type="text" placeholder="https://github.com/username/repo-name" style="width:500px;" value="<?php echo shell_exec($getKey . ' git_repo'); ?>"></p>
                        <p><span>GIT Username</span><span style="margin-left:167px;">GIT Password</span>
                        <br>
                        <input id="git_username" type="text" placeholder="username" style="width:230px;" value="<?php echo shell_exec($getKey . ' git_username'); ?>"><input id="git_password" type="text" placeholder="password" style="margin-left:40px;width:230px;" value="<?php echo shell_exec($getKey . ' git_password'); ?>"></p>
                        </p>
                        <p>GIT Branch <small>(Optional -> Default "master" Branch)</small>
                        <br>
                        <input id="git_branch" type="text" placeholder="master" style="width:500px;" value="<?php echo shell_exec($getKey . ' git_branch'); ?>"></p>
                        <p>IP / CIDR List (Whitelist)
                        <br>
                        <textarea id="ip_list" placeholder="10.2.2.2/28,172.63.65.5/32" rows="3" cols="10" style="width: 500px;"><?php echo shell_exec($getKey . ' git_ip_list'); ?></textarea>
                        <p>Before Update Script <small>(Shell Script Only)</small> <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=var/www/server-b-data&edit=git_before_script.sh&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                        <br>
                        <textarea id="before_script" readonly="" placeholder="Click on edit button and save file" rows="10" cols="10" style="width: 500px;font-size:14px;color:darkgrey;"><?php
                            $before_script = file_get_contents('/var/www/server-b-data/git_before_script.sh');
                            if($before_script == '') echo 'Click on edit button and save file';
                            else echo $before_script;
                            ?>
                        </textarea>
                        <br>
                        <p>After Update Script <small>(Shell Script Only)</small> <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=var/www/server-b-data&edit=git_after_script.sh&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                        <br>
                        <textarea id="after_script" readonly="" placeholder="Click on edit button and save file" rows="10" cols="10" style="width: 500px;font-size:14px;color:darkgrey;"><?php
                            $after_script = file_get_contents('/var/www/server-b-data/git_after_script.sh');
                            if($after_script == '') echo 'Click on edit button and save file';
                            else echo $after_script;
                            ?>
                        </textarea>
                        <br>
                        <br>
                        <button id="git_save" class="btn btn-success" type="button" style="margin-left:440px;">Save</button>
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
        let temp_git_folder_path = '<?php echo trim(shell_exec($getKey . ' git_folder_path')); ?>';
        let temp_git_repo = '<?php echo trim(shell_exec($getKey . ' git_repo')); ?>';
        $('.git_btn').click(function(){
            if(temp_git_folder_path == '' || temp_git_repo == '') { 
                alert('GIT Folder Path or GIT Repository is not configured');
                return 0;
            }
            let mode = $(this).attr('git');
            if(mode == 'git_enable') {
                let git_trigger_enable = $('#git_trigger_enable').is(":checked");
                if(git_trigger_enable) mode = 'git_trigger_enable';
                else mode = 'git_trigger_disable';
            }
            $.ajax({
                url: api_link + 'api_service.php?o=git_process&mode=' + mode,
                type: 'GET',
                dataType: 'text',
                success: function(data) {
                    $('#info_modal').modal('show');
                    if (data == '') data = '🚀 No data to show';
                    $('#info_modal_body').text(data);
                }
            });
        });
        $("#git_save").click(function(){
            let folder_path = $('#folder_path').val();
            let git_repo = $('#git_repo').val();
            let git_username = $('#git_username').val();
            let git_password = $('#git_password').val();
            let ip_list = $('#ip_list').val();
            let git_branch = $('#git_branch').val();
            $.ajax({
                url: api_link + 'api_service.php?o=git_save&folder_path=' + folder_path + '&git_repo=' + window.btoa(git_repo) + '&ip_list=' + ip_list + '&git_branch=' + git_branch + '&git_username=' + window.btoa(git_username) + '&git_password=' + window.btoa(git_password),
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