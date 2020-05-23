<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-0 text-gray-800"><i class="fab fa-slack" style="font-weight:100"></i> Slack | Triggers Setup</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary"> Setup</h6>
                </div>
                <div class="card-body row">
                    <div class="col-xs-12 col-md-12 md-12">
                        Slack Webhook URL or HTTPS Trigger URL <small>(POST HTTPS URL)</small>
                        <br>
                        <input class="slack_webhook_url" type="text" placeholder="https://hooks.slack.com/services/A0FDFVFGR64/DOIRJGSAMPLE22Q58D47GTJFR"  style="width:100%" value="<?php echo shell_exec($getKey . ' slack_webhook_url'); ?>">
                    </div>
                    <br><br><br><br>
                    <div class="col-xs-12 col-md-6 md-6">
                        Slack Name <small>(Slack Only Config)</small>
                        <br>
                        <input class="slack_name" type="text" placeholder="Server B" style="width:100%" value="<?php echo shell_exec($getKey . ' slack_name'); ?>">
                    </div>
                    <br><br><br><br>
                    <div class="col-xs-12 col-md-6 md-6">
                        Slack Icon Url <small>(Slack Only Config)</small>
                        <br>
                        <input class="slack_icon_url" type="text" placeholder="https://example.com/small-icon" style="width:100%" value="<?php echo shell_exec($getKey . ' slack_icon_url'); ?>">
                        <br><br><br>    
                    </div>
                    <div class="col-xs-12 col-md-6 md-6">
                    </div>
                    <div class="col-xs-12 col-md-6 md-6">                    
                        <button class="btn btn-success" style="float:right;" type="button" id="save_config">Save Configuration</button>          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>

<?php include('bottom.php'); ?>
<script>
    $(document).ready(function(){
        $("#save_config").click(function(){
            if (!confirm('Do you want to save slack and triggers configuration')) return 0;
            
            let slack_webhook_url = window.btoa($('#slack_webhook_url').val());
            let slack_name = window.btoa($('#slack_name').val());
            let slack_icon_url = window.btoa($('#slack_icon_url').val());

            $.ajax({
                url: api_link + 'api_service.php?o=slack_update&slack_webhook_url=' + slack_webhook_url + '&slack_name=' + slack_name + '&slack_icon_url=' + slack_icon_url,
                type: 'GET',
                dataType: 'text',
                success: function(data) {
                    alert(data);
                }
            });
        });
    });
</script>