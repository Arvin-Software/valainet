<?php
$curr = 'mod';
include '../header.php';
?>
<!-- <a href="dash.php" class="btn btn-dark">Back</a> -->
<?php
    if(isset($_GET['id'])){
        valai::DeleteAlerts($_GET['id']);
        // echo 'Alert Dismissed';
    }
?>
<h3 class="text-center" style=" margin-bottom: 2%;"><img src="../images/warning.svg" style="width: 30px; margin-bottom: 1%;"><br />Alerts</h3>
<table class="table border-bottom">
    <tr>
        <th class="border-right">Sl.No</th>
        <th class="border-right">Timestamp</th>
        <th class="border-right">Process Name</th>
        <th class="border-right">Status</th>
        <th class="border-right">IP</th>
        <th class="border-right">Group</th>
        <th>Actions</th>
    </tr>
    <?php
    $ret = khatral::khquerypar('SELECT * FROM alerts');
    $count = 0;
    foreach($ret as $p){
        $count += 1;
        // echo $p['alert_id'] . '</br>';
        $id = $p['alert_id'];
        echo '<tr><td class="border-right">' . $count . '</td><td class="border-right">' . $p['alert_time'] . '</td><td class="border-right">' . $p['alert_nm'] . '</td><td class="border-right">' . $p['alert_mess'] . '</td><td class="border-right"><a href="basicinfo.php?ip=' . $p['alert_ip'] . '&group=' . $p['alert_group'] . '#process">' . $p['alert_ip'] . '</a></td><td class="border-right">' . $p['alert_group'] . '</td>
        <td><a href="alertview.php?id='. $id . '">Delete</a></td>
        </tr>';
    }
    ?>
</table>