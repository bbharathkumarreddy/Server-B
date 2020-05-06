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
     <div class="row">
        <div class="col-lg-2 mb-2">
            <a class="repo_btn" href="#repo_1"  tid="1">
            <div class="card bg-primary text-white shadow">
            <div class="card-body">
                Repository 1
                <div class="text-white-50 small">Blue</div>
            </div>
            </div>
            </a>
        </div>
        <div class="col-lg-2 mb-2">
            <a class="repo_btn" href="#repo_2" tid="2">
            <div class="card bg-success text-white shadow">
            <div class="card-body">
                Repository 2
                <div class="text-white-50 small">Green</div>
            </div>
            </div>
            </a>
        </div>
        <div class="col-lg-2 mb-2">
            <a class="repo_btn" href="#repo_3" tid="3">
            <div class="card bg-info text-white shadow">
            <div class="card-body">
                Repository 3
                <div class="text-white-50 small">Teal</div>
            </div>
            </div>
            </a>
        </div>
        <div class="col-lg-2 mb-2">
            <a class="repo_btn" href="#repo_4" tid="4">
            <div class="card bg-warning text-white shadow">
            <div class="card-body">
                Repository 4
                <div class="text-white-50 small">Yellow</div>
            </div>
            </div>
            </a>
        </div>
        <div class="col-lg-2 mb-2">
            <a class="repo_btn" href="#repo_5"  tid="5">
            <div class="card bg-danger text-white shadow">
            <div class="card-body">
                Repository 5
                <div class="text-white-50 small">Red</div>
            </div>
            </div>
            </a>
        </div>
    </div>
    <br>
    <?php
    ini_set('display_errors', '1');
    for ($i=1;$i<=5;$i++) {
        $git_trigger_enable = trim(shell_exec($getKey . ' git_trigger_enable_'.$i));
        $git_folder_path = trim(shell_exec($getKey . ' git_folder_path_'.$i));
        if ($git_trigger_enable == 'enable') {
            $git_trigger_checkbox = 'checked="true"';
            $alert_show = 'disp-none';
        } else {
            $git_trigger_checkbox = '';
            $alert_show = '';
        } ?>    
    <div class="row" id="repo_<?php echo $i; ?>" >
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-code-branch"></i> GIT Repository - <?php echo $i; ?><label class="switch fr m-0" style="margin-right: 60px !important;">
                        <p class="text-success fr m-0" style="margin-right: -56px !important;">&nbsp;&nbsp;enable</p>
                            <input type="checkbox" git="git_enable" tid="<?php echo $i; ?>" <?php echo $git_trigger_checkbox; ?> class="git_btn git_trigger_enable">
                            <span class="slider round"></span>
                        </label>
                        <p class="text-success fr m-0">disable&nbsp;&nbsp;</p></h6>
                </div>
                <div class="card-body row" style="display:none;" id="repo_panel_<?php echo $i; ?>" >
                    <div class="col-xs-12 col-md-12 md-12">
                        <div class="alert alert-danger <?php echo $alert_show; ?>" >
                            <strong>Attention!</strong> GIT Triggers is disabled; GIT Trigger webhook url works once enabled;
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 md-6">
                        <?php
                            $public_server_b_domain = trim(shell_exec($getKey . ' public_server_b_domain'));
        $public_ip = trim(shell_exec($getKey . ' public_ip'));
        $server_b_auth_key = trim(shell_exec($getKey . ' server_b_auth_key'));
                                                
        if ($public_server_b_domain != '') {
            $public_server_b_access = $public_server_b_domain;
        } else {
            $public_server_b_access = $public_ip;
        }
        $tid=base64_encode(openssl_encrypt($i, 'AES-256-CBC', $server_b_auth_key));
        $git_trigger_link = 'https://'.trim(shell_exec($getKey . ' server_b_username')).':'.trim(shell_exec($getKey . ' server_b_password')).'@'.$public_server_b_access.':'.trim(shell_exec($getKey . ' server_b_port')).'/api/git-update.php?key='.$server_b_auth_key.'&tid='.$tid; ?>
                        <button id="git_status_btn" git="status" tid="<?php echo $i; ?>" class="btn btn-sm btn-success shadow-sm mr-10 git_btn"><i class="fa fa-code-branch fa-sm text-white-50"></i> Git Status</button>
                        <a target="_blank" href="<?php echo $git_trigger_link; ?>" id="git_pull_btn" git="pull"  tid="<?php echo $i; ?>" class="btn btn-sm btn-info shadow-sm mr-10"><i class="fa fa-code-branch fa-sm text-white-50"></i> Git Pull - Update</a>
                        <button id="git_stash_btn" git="stash"  tid="<?php echo $i; ?>" class="btn btn-sm btn-warning shadow-sm mr-10 git_btn"><i class="fa fa-code-branch fa-sm text-white-50"></i> Git Stash</button>
                        <button id="git_reset_btn" git="reset"  tid="<?php echo $i; ?>" class="btn btn-sm btn-warning shadow-sm mr-10 git_btn"><i class="fa fa-code-branch fa-sm text-white-50"></i> Git Reset</button>
                        <br>
                        <br>
                        <br>
                        <h6>Folder<br><b><span><?php echo shell_exec($getKey . ' git_folder_path_'.$i); ?></span></b></h6>
                        <br>
                        <h6>GIT Trigger Webhook Url (Used for Github / Bitbucket)<br><a target="_blank" href="<?php echo $git_trigger_link; ?>"><b><span><?php echo $git_trigger_link; ?></span></b></a></h6>
                        <br>
                        <h6>Secret (Optional -> Used for Github / Bitbucket)<br><a href="javascript:;"><b><span><?php echo $server_b_auth_key; ?></span></b></a></h6>
                        <br>
                        <p>GIT Trigger History<a target="_blank"  class="noline" href="<?php echo $app_link; ?>file-manager.php?p=var/www/server-b-data&view=git_trigger_history_<?php echo $i; ?>.txt"> <small>View <i class="fa fa-file"></i></small></a>
                        <br>
                        <textarea id="trigger_history" readonly="" rows="10" cols="10" style="width: 500px;font-size:14px;color:darkgrey;"><?php
                            $git_trigger_history = file_get_contents('/var/www/server-b-data/git_trigger_history_'.$i.'.txt');
        if ($git_trigger_history == '') {
            echo 'No Git / Update Triggered';
        } else {
            echo $git_trigger_history;
        } ?>
                        </textarea>
                        <p>Folder Path <span class="text-danger">*</span>
                        <br><input class="folder_path" tid="<?php echo $i; ?>" type="text" placeholder="/var/www/html" style="width:500px;" value="<?php echo $git_folder_path; ?>"></p>
                        <p>GIT Repository <span class="text-danger">*</span> <small>(GIT Remote URL)</small>
                        <br>
                        <input class="git_repo" tid="<?php echo $i; ?>"  type="text" placeholder="https://github.com/username/great-project.git" style="width:500px;" value="<?php echo shell_exec($getKey . ' git_repo_'.$i); ?>"></p>
                        <p><span>GIT Username <span class="text-danger">*</span></span><span style="margin-left:157px;">GIT Password <span class="text-danger">*</span></span>
                        <br>
                        <input class="git_username" type="text" tid="<?php echo $i; ?>" placeholder="username" style="width:230px;" value="<?php echo trim(shell_exec($getKey . ' git_username_'.$i)); ?>"><input class="git_password" tid="<?php echo $i; ?>" type="text" placeholder="password" style="margin-left:40px;width:230px;" value="<?php echo shell_exec($getKey . ' git_password_'.$i); ?>"></p>
                        </p>
                        <p>GIT Branch <small>(Optional -> Default "master" Branch)</small>
                        <br>
                        <input class="git_branch" tid="<?php echo $i; ?>" type="text" placeholder="master" style="width:500px;" value="<?php echo trim(shell_exec($getKey . ' git_branch_'.$i)); ?>"></p>
                        <p>IP / CIDR List <small>(Optional -> Whitelist)</small>
                        <br>
                        <textarea class="ip_list" tid="<?php echo $i; ?>"  placeholder="10.2.2.2/28,172.63.65.5/32" rows="3" cols="10" style="width: 500px;"><?php echo trim(shell_exec($getKey . ' git_ip_list_'.$i)); ?></textarea>
                    </div>
                    <div class="col-xs-12 col-md-6 md-6">
                        <p><b>Auto Deployment Script</b> <small>(Optional -> Shell Script Only)</small> <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=<?php echo $git_folder_path; ?>&edit=deployment.sh&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a><br>                    
                        <small>Deployment scirpt runs once in git clone process.<br>
                        <b>deployment.sh</b> file should be present in your root git repository for auto deployment scripts to run
                        </small>
                        <br>
                        <textarea id="before_script" readonly="" placeholder="Click on edit button and save file" rows="10" cols="10" style="width: 500px;font-size:14px;color:darkgrey;"><?php
                            $before_script = file_get_contents($git_folder_path.'/deployment.sh');
        if ($before_script == '') {
            echo 'Click on edit button and save file';
        } else {
            echo $before_script;
        } ?>
                        </textarea>
                        <br>
                        <p><b>Before Update Script </b><small>(Optional -> Shell Script Only)</small> <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=<?php echo $git_folder_path; ?>&edit=before_update.sh&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                        <br>
                        <small>Before Update Script runs every time before git update or pull process triggers.<br>
                        <b>before_update.sh</b> file should be present in your root git repository for before git update process to run.
                        </small>
                        <br>
                        <textarea class="before_script" readonly="" placeholder="Click on edit button and save file" rows="10" cols="10" style="width: 500px;font-size:14px;color:darkgrey;"><?php
                            $before_script = file_get_contents($git_folder_path.'/before_update.sh');
        if ($before_script == '') {
            echo 'Click on edit button and save file';
        } else {
            echo $before_script;
        } ?>
                        </textarea>
                        <br>
                        <p><b>After Update Script </b><small>(Optional -> Shell Script Only)</small> <a target="_blank" class="noline" href="<?php echo $app_link; ?>file-manager.php?p=<?php echo $git_folder_path; ?>&edit=after_update.sh&env=ace"><small>Edit <i class="fa fa-edit"></i></small></a>
                        <br>
                        <small>After Update Script runs every time after git update or pull process triggers.<br>
                        <b>after_update.sh</b> file should be present in your root git repository for after git update process to run.
                        </small>
                        <br>
                        <textarea class="after_script" readonly="" placeholder="Click on edit button and save file" rows="10" cols="10" style="width: 500px;font-size:14px;color:darkgrey;"><?php
                            $after_script = file_get_contents($git_folder_path.'/after_update.sh');
        if ($after_script == '') {
            echo 'Click on edit button and save file';
        } else {
            echo $after_script;
        } ?>
                        </textarea>
                        <br>
                        <br>
                        <button tid="<?php echo $i; ?>" class="btn btn-success git_save" type="button" style="margin-left:440px;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php
    }
    ?>
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
        //let temp_git_folder_path = '<?php echo trim(shell_exec($getKey . ' git_folder_path')); ?>';
        //let temp_git_repo = '<?php echo trim(shell_exec($getKey . ' git_repo')); ?>';
        $('body').on('click','.git_btn',function(){
            // if(temp_git_folder_path == '' || temp_git_repo == '') { 
            //     alert('GIT Folder Path or GIT Repository is not configured');
            //     return 0;
            // }
            let mode = $(this).attr('git');
            let tid = $(this).attr('tid');
            if(mode == 'git_enable') {
                let git_trigger_enable = $('[tid="'+tid+'"].git_trigger_enable').is(":checked");
                if(git_trigger_enable) mode = 'git_trigger_enable';
                else mode = 'git_trigger_disable';
            }
            $.ajax({
                url: api_link + 'api_service.php?o=git_process&mode=' + mode+ '&tid=' + tid ,
                type: 'GET',
                dataType: 'text',
                success: function(data) {
                    $('#info_modal').modal('show');
                    if (data == '') data = '🚀 No data to show';
                    $('#info_modal_body').text(data);
                }
            });
        });
        
        $('body').on('click','.git_save',function(){
            let tid = $(this).attr('tid');
            let folder_path = $('[tid="'+tid+'"].folder_path').val();
            let git_repo = $('[tid="'+tid+'"].git_repo').val();
            let git_username = $('[tid="'+tid+'"].git_username').val();
            let git_password = $('[tid="'+tid+'"].git_password').val();
            let ip_list = $('[tid="'+tid+'"].ip_list').val();
            let git_branch = $('[tid="'+tid+'"].git_branch').val();

            $.ajax({
                url: api_link + 'api_service.php?o=git_save&folder_path=' + folder_path + '&git_repo=' + window.btoa(git_repo) + '&ip_list=' + ip_list + '&git_branch=' + git_branch + '&git_username=' + window.btoa(git_username) + '&git_password=' + window.btoa(git_password)+'&tid='+tid,
                type: 'GET',
                dataType: 'text',
                success: function(data) {
                    $('#info_modal').modal('show');
                    if (data == '') data = '🚀 No data to show';
                    $('#info_modal_body').text(data);
                }
            });
        });

        $('body').on('click','.repo_btn',function(){
            let tid = $(this).attr('tid');
            for(let i=1;i<=5;i++){
                if(i == tid) $('#repo_panel_'+i).show();
                else $('#repo_panel_'+i).hide();
            }
        });
    });
</script>