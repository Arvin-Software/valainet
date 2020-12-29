<?php
$curr = 'dash';
include '../header.php';
if(isset($_GET['act'])){
    if($_GET['act'] == "del"){
        valai::DeleteIpMoni($_GET['id']);
        // echo 'success';
    }
}
?>
<a href="dash.php" class="btn btn-dark">Back</a>
<?php
    if(isset($_POST['submit'])){
        khatral::khquery('INSERT INTO ip_addr_moni VALUES(NULL, :ip_addr, :stat, :ip, :group)', array(
            ':ip_addr'=>$_POST['ipaddr'],
            ':stat'=>"Failure",
            ':ip'=>$_POST['ip'],
            ':group'=>$_POST['group']
        ));
        echo 'IP Address ' . $_POST['ipaddr'] . ' is now being monitored from this computer / server';
    }
?>
<h3>IP Address Montoring(Ping)</h3><hr>
<form action="addip.php?ip=<?php echo $_GET['ip']; ?>&group=<?php echo $_GET['group']; ?>" method="post">
    <div style="display: none">
        <input type="text" name="ip" id="ip" value="<?php echo $_GET['ip']; ?>">
        <input type="text" name="group" id="group" value="<?php echo $_GET['group']; ?>">
    </div>
    <div class="form-group">
        <label for="ipaddr">IP Address</label>
        <input type="text" name="ipaddr" id="ipaddr" class="form-control" required="">
    </div>
    <input type="submit" value="Save" id="submit" name="submit" class="btn btn-dark">
</form>
<br>
<hr>
<br>
<table class="table table-bordered">
    <tr>
        <th>Sl.No</th>
        <th>IP Address</th>
        <th>Actions</th>
    </tr>
    <?php
    $ret = khatral::khquery('SELECT * FROM ip_addr_moni WHERE aip_ip=:ip AND aip_group=:group', array(
        ':ip'=>$_GET['ip'],
        ':group'=>$_GET['group']
    ));
    $count = 0;
    foreach($ret as $p){
        $count += 1;
        echo '<tr><td>' . $count . '</td><td>' . $p['aip_nm'] . '</td><td><a href="addip.php?act=del&id=' . $p['aip_id'] . '&ip=' . $_GET['ip'] . '&group=' . $_GET['group'] . '" class="bg-danger p-2 text-white"> Delete</a></td></tr>';
    }
    ?>
</table>