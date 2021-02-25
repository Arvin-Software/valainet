<?php
include 'header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-2 fade-in border-right text-black" style="background-color: #F2F2F2; padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'dash';
   include 'includenav.php';
   ?> 
</div>

<div class="col-xl-10 bg-light fade-in shadow" id="" style=" padding: 1% 2% 2% 2%;">
<input type="text" name="ip" id="ip" style="display: none;" value="<?php echo $_GET['ip']; ?>">
<input type="text" name="group" id="group" style="display: none;" value="<?php echo $_GET['group']; ?>">
    <a href="dash.php" class="btn btn-dark" style="margin-left: 1.5%;">Back</a>
    <div class="row">
    <div class="col-xl-12">
    <div class="p-4">
    <div class="card border bor-ten ">
        <div class="card-header bg-dark  text-white">Basic Information</div>
        <div class="card-body">
            <table class="table table-all">
                <tr class="">
                    <th style="width: 10px;">SL.NO</th>
                    <th style="width: 30%;">Particulars</th>
                    <th>Details</th>
                </tr>
                <?php
                 $img = '';
                 $os = '';
                 $os_human = '';
                 $proc = '';
                 $moni = '';
                 $lap = '';
                $device = '';
                    $ret = khatral::khquery('SELECT * FROM comp_info WHERE comp_ip=:ip AND comp_group=:group', array(
                        ':ip'=>$_GET['ip'],
                        ':group'=>$_GET['group']
                    ));
                    foreach($ret as $p){
                       
                        if(strpos($p['comp_os'], "Windows") !== false){
                            $img = '../images/windows.svg';
                            $os = 'Windows Management Instrumentation';
                            $os_human = "Windows";
                        }else{
                            $img = '../images/linux.svg';
                            $os = "Bash Command Interface";
                            $os_human = 'Linux';
                        }
                        
                        if(strpos($p['comp_processor'], "AMD") !== false){
                            $proc = '../images/amd.svg';
                        }else{
                            $proc = '../images/intel.svg';
                        }
                        
                        if($p['display'] == '1920 X 1080'){
                            $moni = '(Full HD)';
                        }
                        
                        if(substr($p['comp_nm'], 0, 6) == 'LAPTOP'){
                            $lap = '../images/laptop.svg';
                            $device = 'Laptop';
                        }else{
                            // echo substr($p['comp_nm'], 0, 6);
                            $lap = '../images/pc.svg';
                            $device = 'Desktop / Workstation / Server';
                        }
                        echo '<tr><td>1</td><td>IP</td><td>' . $_GET['ip'] . '</td></tr>';
                        echo '<tr><td>2</td><td>Asset Tag</td><td><a href="asset.php?id=' . $p['comp_ip'] . '&group=' . $p['comp_group'] . '&asset=' . $p['comp_asset_tag'] . '">' . $p['comp_asset_tag'] . '</a></td></tr>';
                        echo '<tr><td>3</td><td>Name</td><td><img src="' . $lap . '" style="width: 24px;">&nbsp;&nbsp;' . $p['comp_nm'] . '</td></tr>';
                        echo '<tr><td>4</td><td>Operating System</td><td><img src="' . $img . '" style="width: 24px;">&nbsp;&nbsp;' . $p['comp_os'] . '</td></tr>';
                        echo '<tr><td>5</td><td>Processor</td><td><img src="' . $proc . '" style="width: 24px;">&nbsp;&nbsp;' . $p['comp_processor'] . '</td></tr>';
                        echo '<tr><td>6</td><td>Ram</td><td>' . $p['comp_ram_tot'] . '</td></tr>';
                        echo '<tr><td>7</td><td>Display</td><td>' . $p['display'] . '&nbsp;&nbsp;' . $moni . '</td></tr>';
                        $res = khatral::khquery('SELECT * FROM storag WHERE ip=:ip AND group_nm=:group', array(
                            ':ip'=>$_GET['ip'],
                            ':group'=>$_GET['group']
                        ));
                        $countx = 7;
                        $hrdcount = 0;
                        foreach($res as $pi){
                            $countx += 1;
                            $hrdcount += 1;
                            echo '<tr><td>' . $countx .'</td><td>Harddisk(' . $hrdcount . ')</td><td>' . $pi['nm'] . ' Size : ' . $pi['tot'] . '</td></tr>';
                        }
                    }
                ?>
            </table>
        </div>
        <div class="card-footer">Need information about this section click <a href="#">here</a></div>
    </div>
    <div class="card border bor-ten " style="margin-top: 5%;">
        <div class="card-header bg-dark  text-white">Operating System Information</div>
        <div class="card-body">
            <table class="table table-all">
                <tr class="">
                    <th style="width: 10px;">SL.NO</th>
                    <th style="width: 50%;">Particulars</th>
                    <th>Details</th>
                </tr>
                <?php
                    $ret = khatral::khquery('SELECT * FROM os WHERE os_ip=:ip AND os_group=:group', array(
                        ':ip'=>$_GET['ip'],
                        ':group'=>$_GET['group']
                    ));
                    foreach($ret as $p){
                        if($os_human == "Windows"){
                            echo '<tr><td>1</td><td>OS Architecture</td><td>' . $p['os_bit'] . ' - bit</td></tr>';
                            echo '<tr><td>2</td><td>OS Serial Number</td><td>' . $p['os_serial'] . '</td></tr>';
                            echo '<tr><td>3</td><td>OS Installed / Updated Date</td><td>' . $p['os_installed'] . '</td></tr>';
                            echo '<tr><td>4</td><td>System Running Since</td><td>' . $p['os_booted'] . '</td></tr>';
                            echo '<tr><td>5</td><td>System Connected to internet using IP</td><td>' . $p['os_extip'] . '</td></tr>';
                        }else{
                            echo '<tr><td>1</td><td>OS Architecture</td><td>' . $p['os_bit'] . '</td></tr>';
                            echo '<tr><td>2</td><td>Kernal Version</td><td>' . $p['os_installed'] . '</td></tr>';
                            echo '<tr><td>3</td><td>System Running Since</td><td>' . $p['os_booted'] . '</td></tr>';
                            echo '<tr><td>4</td><td>System Connected to internet using IP</td><td>' . $p['os_extip'] . '</td></tr>';
                        }
                    }
                ?>
                </table>
        </div>
        <div class="card-footer">Need information about this section click <a href="#">here</a></div>
    </div>
    </div>
    </div>
    <div class="col-xl-12">
        <div class="p-4">
        <div class="card border bor-ten ">
            <div class="card-header bg-dark text-white">Client Status</div>
            <div class="card-body">
                <table class="table table-all">
                    <tr class="">
                        <th style="width: 10px;">SL.NO</th>
                        <th style="width: 50%;">Particulars</th>
                        <th>Details</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Status</td>
                        <td id="inc"><img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>API Status</td>
                        <td id="inc1"><img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Valai Computer Monitor</td>
                        <td id="inc2"><img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Valai Action Execution service</td>
                        <td id="inc3"><img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Valai Agent (<?php echo $os_human; ?>)</td>
                        <td id="inc4"><img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Valai Agent Method</td>
                        <td id=""><?php echo $os; ?></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Valai Agent Timer Based Execution</td>
                        <td id="inc5"><img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Valai Agent Specification</td>
                        <td id=""><?php echo $device; ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">Need information about this section click <a href="#">here</a></div>
        </div>
        </div>
       
        <div class="p-4">
        <div class="card border bor-ten ">
            <div class="card-header bg-dark text-white">Process Monitor</div>
            <div class="card-body" id="incproc">
            </div>
            <div class="card-footer">Need information about this section click <a href="#">here</a></div>
        </div>
        </div>
        <?php
        if($os_human == "Windows"){
            ?>
        <div class="p-4"  style="display: none;">
            <div class="card border bor-ten ">
                <div class="card-header bg-dark text-white">Processes running in computer</div>
                <div class="card-body">
                    <a href="processrun.php?ip=<?php echo $_GET['ip']; ?>&group=<?php echo $_GET['group']; ?>">View</a>
                </div>
                <div class="card-footer">Need information about this section click <a href="#">here</a></div>
            </div>
        </div>
        <?php
        }
        ?>
        <div class="p-4">
            <div class="card border bor-ten ">
                <div class="card-header bg-dark text-white">IP Address to Monitor (Ping)</div>
                <div class="card-body">
                    <div id="incip"></div>
                    <a href="addip.php?ip=<?php echo $_GET['ip']; ?>&group=<?php echo $_GET['group']; ?>">Add IP address to monitor</a>
                </div>
                <div class="card-footer">Need information about this section click <a href="#">here</a></div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="fixed-bottom text-center">
&copy; 2021 Valai Net. All Rights Reserved.|
<?php include '../valai.php'; valai::DisplayVerBuild() ?> | An open source software
</div>
<script>
setInterval(function () {
        
        // alert('hello');
			$.post("/valainet/api.php",
            {
            act:"sayhello",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox: "influx"
            },
          function(data, status){
            // alert(data);
            if(data == 'hello'){
                $('#inc1').html('<img src="../images/tick.png" style="width: 20px;">&nbsp;&nbsp;ValaiNet Connected');
                // $('#inc1').show()
            }else{
                $('#inc1').html('<img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected');
            }
          });
           
    }, 1000);
    setInterval(function () {
        
        // alert('hello');
			$.post("/valainet/api.php",
            {
            act:"retprocstatx",
            ip:$('#ip').val(),
            nm:"stat",
            stat:"failure",
            inbox: "influx",
            group:$('#group').val()
            },
          function(data, status){
            // alert(data);
            
                $('#incproc').html(data);
                // $('#inc1').show()
            
          });
           
    }, 1000);
    setInterval(function () {
        
        // alert('hello');
			$.post("/valainet/api.php",
            {
            act:"retipstatx",
            ip:$('#ip').val(),
            nm:"stat",
            stat:"failure",
            inbox: "influx",
            group:$('#group').val()
            },
          function(data, status){
            // alert(data);
            
                $('#incip').html(data);
                // $('#inc1').show()
            
          });
           
    }, 1000);
    
setInterval(function () {
        $.post("/valainet/api.php",
            {
            act:"retstat",
            ip:$('#ip').val(),
            nm:"stat",
            stat:"failure",
            inbox: "influx",
            group:$('#group').val()
            },
          function(data, status){
            //   alert(data);
              if(data == "success"){

                $('#inc').html('<img src="../images/tick.png" style="width: 20px;">&nbsp;&nbsp;Connected');
                $('#inc2').html('<img src="../images/tick.png" style="width: 20px;">&nbsp;&nbsp;Connected');
                $('#inc3').html('<img src="../images/tick.png" style="width: 20px;">&nbsp;&nbsp;Connected');
                $('#inc4').html('<img src="../images/tick.png" style="width: 20px;">&nbsp;&nbsp;Up and Running');
                $('#inc5').html('<img src="../images/tick.png" style="width: 20px;">&nbsp;&nbsp;Working Properly');
              }else{
                $('#inc').html('<img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected');
                $('#inc2').html('<img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected');
                $('#inc3').html('<img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected');
                $('#inc4').html('<img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected');
                $('#inc5').html('<img src="../images/warning.svg" style="width: 20px;">&nbsp;&nbsp;Not Connected');
              }
            //   if(data == "success"){
            //     $('#ip1').html("Connected");
            //   }else{
            //       $('#ip1').html("Not Connected");
            //   }
            // alert(data);
          });
        }, 1000);		
</script>