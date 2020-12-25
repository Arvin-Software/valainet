<?php
$curr = 'dash';
include '../header.php';
if(isset($_GET['act'])){
    if($_GET['act'] == "del"){
        valai::DeleteAlert($_GET['id']);
        // echo 'success';
    }
}
?>
<a href="dash.php" class="btn btn-dark">Back</a>
<?php
    if(isset($_POST['submit'])){
        khatral::khquery('INSERT INTO process_moni VALUES(NULL, :nm, :stat, :ip, :group)', array(
            ':nm'=>$_POST['nm'],
            ':stat'=>"Failure",
            ':ip'=>$_POST['ip'],
            ':group'=>$_POST['group']
        ));
        echo 'process ' . $_POST['nm'] . ' is now being monitored';
    }
?>
<h3>Alert Creation</h3><hr>
<form action="alert.php?ip=<?php echo $_GET['ip']; ?>&group=<?php echo $_GET['group']; ?>" method="post">
    <div style="display: none">
        <input type="text" name="ip" id="ip" value="<?php echo $_GET['ip']; ?>">
        <input type="text" name="group" id="group" value="<?php echo $_GET['group']; ?>">
    </div>
    <div class="form-group">
        <label for="processnm">Process Name</label>
        <input type="text" name="nm" id="nm" class="form-control" required="">
    </div>
    <input type="submit" value="Save" id="submit" name="submit" class="btn btn-dark">
</form>
<br>
<hr>
<br>
<table class="table table-bordered">
    <tr>
        <th>Sl.No</th>
        <th>Process Name</th>
        <th>Actions</th>
    </tr>
    <?php
    $ret = khatral::khquery('SELECT * FROM process_moni WHERE moni_ip=:ip AND moni_group=:group', array(
        ':ip'=>$_GET['ip'],
        ':group'=>$_GET['group']
    ));
    $count = 0;
    foreach($ret as $p){
        $count += 1;
        echo '<tr><td>' . $count . '</td><td>' . $p['moni_nm'] . '</td><td><a href="alert.php?act=del&id=' . $p['moni_id'] . '&ip=' . $_GET['ip'] . '&group=' . $_GET['group'] . '" class="bg-danger p-2 text-white"> Delete</a></td></tr>';
    }
    ?>
</table>