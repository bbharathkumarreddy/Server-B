<?php include_once('top.php'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-lg-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 150px !important;">
                        <canvas class="myPieChart_1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> CPU
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">System Monitoring</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center small">
                        <div class="chart-pie pb-2" >
                            <canvas id="line-chart-sys-monit"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Network Analysis</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center small">
                        <div class="chart-pie pb-2" >
                            <canvas id="line-chart-2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Server B</h6>
                </div>
                <!-- Card Body -->
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-3 m-auto text-center">
                                <a id="update-btn" style="cursor: pointer;"><i class="fas fa-sync fa-2x text-info"></i><br>Update Server B</a>
                            </div>
                            <div class="col-3 m-auto text-center">
                                <a class="" command="start"><i class="fas fa-play fa-2x text"></i><br>Start Server</a>
                            </div>
                            <div class="col-3 m-auto text-center">
                                <a class="command-btn" command="shutdown" href="javascript:;"><i class="fas fa-stop fa-2x text-danger"></i><br>Stop Server</a>
                            </div>
                            <div class="col-3 m-auto text-center">
                                <a class="command-btn" command="reboot" href="javascript:;"><i class="fas fa-sync fa-2x text-info"></i><br>Restart Server</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('bottom.php'); ?>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- <script src="js/demo/line-chart.js"></script> -->
    <script>
        $(document).ready(function() {
            var sample = {"data":[["1572490982","0.00","0.00,","0.00,","0.00","2.2","9.6","337","579","4092411","494223","4586634"],
["1572491041","0.00","0.00,","0.00,","0.00","2.2","9.6","337","579","4103777","505427","4609204"],
["1572491102","0.00","0.00,","0.00,","0.00","2.2","9.6","337","579","4115953","511883","4627836"],
["1572491162","0.00","0.00,","0.00,","0.00","2.2","9.6","337","579","4129135","519214","4648349"],
["1572491221","0.00","0.00,","0.00,","0.00","2.2","9.6","337","579","4139987","524747","4664734"],
["1572491282","0.00","0.00,","0.00,","0.00","2.2","9.6","337","579","4152701","531638","4684339"],
["1572491342","0.00","0.00,","0.00,","0.00","2.2","9.6","336","579","4164967","537575","4702542"],
["1572491401","0.00","0.00,","0.00,","0.00","2.2","9.6","339","579","4177847","544932","4722779"],
["1572491462","0.00","0.00,","0.00,","0.00","2.2","9.6","339","579","4187701","555501","4743202"],
["1572491522","0.00","0.00,","0.00,","0.00","2.2","9.6","338","579","4193281","560714","4753995"],
["1572491581","0.00","0.00,","0.00,","0.00","2.2","9.6","338","579","4203633","566357","4769990"],
["1572491642","0.00","0.00,","0.00,","0.00","2.2","9.6","338","579","4214623","572688","4787311"],
["1572491702","0.00","0.00,","0.00,","0.00","2.2","9.6","338","579","4227287","579763","4807050"]]};

function timestamp_date(timestamp){
                var d = new Date(timestamp*1000); //get a date object                
                
                let t=('0'+d.getUTCHours()).slice(-2) + ':' + ('0' + d.getUTCMinutes()).slice(-2);
                


                var date = d.getDate();
                var hours = d.getHours();
                var minutes = d.getMinutes();
                hours = hours == 0 ? 12: hours; //if it is 0, then make it 12
                var ampm = "AM";
                ampm = hours > 12 ? "PM": "AM";
                hours = hours > 12 ? hours - 12: hours; //if more than 12, reduce 12 and set am/pm flag
                hours = ( "0" + hours ).slice(-2); //pad with 0
                minute = ( "0" + d.getMinutes() ).slice(-2); //pad with 0
                var time = hours + ":" + minute + " " + ampm ;
                var timeTemp = hours + ":" + minute;
                console.log([timestamp,time,timeTemp,t]);
                return([time,timeTemp,t]);
            }
            

            
            $('#update-btn').click(function() {
                $.ajax({
                    url: '/api/update-server-b.php',
                    dataType: 'text',
                    type: 'get',
                    success: function(data) {
                        data =$.trim(data.replace(/[\t\n]+/g, ' '))
                        if(data.includes('Already up to date')){
                            alert('Already up to date');
                        }
                        else{                            
                            alert('Update Successful');
                            location.reload(true);
                        }
                    },
                });
            });

            $('.command-btn').click(function() {
                var command = $(this).attr('command');
                alert('Please wait for '+command);
                $.ajax({
                    url: '/api/sys_command.php',
                    dataType: 'text',
                    type: 'get',
                    data:{cmd:command},
                    success: function(data) {
                        console.log(data);
                        alert(data);
                    },
                });
            });
            let template = '[TIMESTAMP,CPU,LOAD_1,LOAD_5,LOAD_15,DISK_USAGE,DISK_TOTAL,MEM_USAGE,MEM_TOTAL,NET_RECEIVED,NET_TRANSMITTED,NET_TOTAL,DATETIME,DATETIME]';
            $.ajax({
                url: '/api/sys_stat.php',
                dataType: 'json',
                type: 'get',
                success: function(data) {   
                    //data = sample;   
                    var data_set_1 = [];              
                    for(var i=0;i<data.data.length;i++){
                        var timestamp_date_1 = timestamp_date(data.data[i][0]);
                        data.data[i].push(timestamp_date_1[1],timestamp_date_1[0]);   // insert datetime                     
                        data_set_1.push(data.data[i][7]); 
                    }
                    console.log(data)
                    let timeArr = time_series();
                    console.log('Time')
                    console.log(timeArr[0])
                    let new_data_arr = [];
                    let tempIndexFound = -1;
                    for(var j=0;j<timeArr[0].length;j++){
                        let tempData = [];
                
                        for(var k=0;k<data.data.length;k++){
                            tempIndexFound = -1;
                            if(data.data[k].indexOf(timeArr[0][j]) > 0){
                                tempIndexFound = k;
                                break;                                
                            }
                        }
                        if(tempIndexFound > 0){
                            tempData= data.data[k];
                        }
                        else{
                            tempData.push(NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,timeArr[1][j],timeArr[0][j]);
                        }
                        new_data_arr.push(tempData)
                    }
                    console.log(new_data_arr,j)
                    dd_0 = []; // label time
                    dd_1 = []; // cpu
                    dd_2 = []; // load 1
                    dd_3 = []; // load 5
                    dd_4 = []; // load 15
                    dd_5 = []; // disk usage
                    dd_6 = []; // disk total
                    dd_7 = []; // mem usage
                    dd_8 = []; // mem total
                    dd_9 = []; // NET_RECEIVED
                    dd_10 = []; // NET_TRANSMITTED
                    dd_11 = []; // NET_TOTAL
                    for(var r=1;r<new_data_arr.length;r++){
                        dd_0.push(new_data_arr[r][13]);
                        dd_1.push(new_data_arr[r][1]);
                        dd_2.push(new_data_arr[r][2]);
                        dd_3.push(new_data_arr[r][3]);
                        dd_4.push(new_data_arr[r][4]);
                        dd_5.push(new_data_arr[r][5]);
                        dd_6.push(new_data_arr[r][6]);
                        dd_7.push(new_data_arr[r][7]);
                        dd_8.push(new_data_arr[r][8]);
                        dd_9.push(new_data_arr[r][9]);
                        dd_10.push(new_data_arr[r][10]);
                        dd_11.push(new_data_arr[r][11]);
                    }
                    var line_chart_sys_monit = document.getElementById('line-chart-sys-monit');
                    var line_chart_sys_monit = new Chart(line_chart_sys_monit, {
                        type: 'line',
                        data: {
                            labels: dd_0,
                            datasets: [{
                                data: dd_1,
                                label: "CPU",
                                borderColor: "#e74a3b",
                                fill: false
                            }, {
                                data: dd_2,
                                label: "Load 1",
                                borderColor: "#4E73DD",
                                fill: false
                            }, {
                                data: dd_3,
                                label: "Load 5",
                                borderColor: "#4E73DD",
                                fill: false
                            }, {
                                data: dd_4,
                                label: "Load 15",
                                borderColor: "#f6c23e",
                                fill: false
                            },{
                                data: dd_5,
                                label: "Disk Usage",
                                borderColor: "#f6c23e",
                                fill: false
                            },{
                                data: dd_6,
                                label: "Disk Total",
                                borderColor: "#f6c23e",
                                fill: false
                            },{
                                data: dd_7,
                                label: "Mem Usage",
                                borderColor: "#f6c23e",
                                fill: false
                            },{
                                data: dd_8,
                                label: "Mem Total",
                                borderColor: "#f6c23e",
                                fill: false
                            }]
                        },
                        options: {
                            responsive: true,
                            title: {
                                display: false,
                                text: 'System Monitoring'
                            }
                        }
                    });

                }
            });
            var t = 10000;
            setInterval(function(){
                $.ajax({
                    url: '/',
                    dataType: 'json',
                    type: 'get',
                    success: function(data) {
                        
                        console.log(data);
                        for(var i=0;i<data.data.length;i++){
                            var cr_dt = new Date();
                            var cr_time = dt.getDate()+" "+ dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                           
                            
                            var dt = new Date(data.data[i][0]);
                            var time = dt.getDate()+" "+ dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                           
                            
                            
                            
                        }
                        var date = new Date(data.data[12][0]*1000);
                        var months_arr = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

                        // Year
                        var year = date.getFullYear();

                        // Month
                        var month = months_arr[date.getMonth()];

                        // Day
                        var day = date.getDate();

                        // Hours
                        var hours = date.getHours();

                        // Minutes
                        var minutes = "0" + date.getMinutes();

                        // Seconds
                        var seconds = "0" + date.getSeconds();

                        // Display date time in MM-dd-yyyy h:m:s format
                        var convdataTime = hours + ':' + minutes.substr(-2);
                        
                        mylinechart_2.data.labels.push(convdataTime);
                        mylinechart_2.data.labels.splice(0,1);
                        mylinechart_2.update();
                    },
                });
            }, t);

            function time_series(){
                var d = new Date(); //get a date object
                //d.setHours(0,0,0,0); //reassign it to today's midnight
                d.setMinutes(d.getMinutes() - 16);

                var date = d.getDate();
                var timeArr = [];
                var timeArrTemp = [];
                var i=0;
                while ( date == d.getDate() )
                {
                var hours = d.getHours();
                var minutes = d.getMinutes();
                hours = hours == 0 ? 12: hours; //if it is 0, then make it 12
                var ampm = "AM";
                ampm = hours > 12 ? "PM": "AM";
                hours = hours > 12 ? hours - 12: hours; //if more than 12, reduce 12 and set am/pm flag
                hours = ( "0" + hours ).slice(-2); //pad with 0
                minute = ( "0" + d.getMinutes() ).slice(-2); //pad with 0
                timeArr.push( hours + ":" + minute + " " + ampm );
                timeArrTemp.push(hours + ":" + minute);
                d.setMinutes( d.getMinutes() + 1); //increment by 5 minutes 
                i++;               
                if(i>16){
                    break;
                }
                }        
                return([timeArr,timeArrTemp]);
            }
        });
    </script>
    <?php include_once('page-complete.php'); ?>