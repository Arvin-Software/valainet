<?php
$curr = 'dash';
include '../header.php';
if(isset($_POST['submit'])){
    khatral::khquery('DELETE FROM asset WHERE asset_code=:code', array(
        ':code'=>$_GET['asset']
    ));
    khatral::khquery('INSERT INTO asset VALUES(NULL, :code, :loc, :inst, :war_exp, :lastserv, :ip, :group)', array(
        ':code'=>$_GET['asset'],
        ':loc'=>$_POST['loc'],
        ':inst'=>$_POST['instdt'],
        ':war_exp'=>$_POST['wardt'],
        ':lastserv'=>$_POST['lastserv'],
        ':ip'=>$_GET['id'],
        ':group'=>$_GET['group']
    ));
    echo 'Information Saved';
}
?>
<a onclick="window.history.back();" href="#" class="btn btn-dark">Back</a>
<div class="container">
    <?php
    echo '<form action="asset.php?id=' . $_GET['id'] . '&group=' . $_GET['group'] . '&asset=' . $_GET['asset'] . '" method="post">';
    $ret = khatral::khquery('SELECT * FROM asset WHERE asset_code=:code', array(
        ':code'=>$_GET['asset']
    ));
    $loc = '';
    $inst= '';
    $warexp = '';
    $lastserv = '';
    foreach($ret as $p){
        $loc = $p['asset_loc'];
        $inst = $p['asset_inst'];
        $warexp = $p['asset_war_exp'];
        $lastserv = $p['asset_last_serv'];
    }
    ?>
    <div class="form-group">
        <label for="Asset Code">Asset Code</label>
        <input type="text" name="assetcode" id="assetcode" class="form-control" disabled="" value="<?php echo $_GET['asset']; ?>">
    </div>
    <div class="form-group">
        <label for="loc">Location</label>
        <input type="text" name="loc" id="loc" class="form-control" value="<?php echo $loc; ?>">
    </div>
    <div class="form-group">
        <label for="install">Installed Date</label>
        <input type="date" name="instdt" id="instdt" class="form-control" value="<?php echo $inst; ?>">
    </div>
    <div class="form-group">
        <label for="WarExp">Warrenty Expiration Date</label>
        <input type="date" name="wardt" id="wardt" class="form-control" value="<?php echo $warexp; ?>">
    </div>
    <div class="form-group">
        <label for="LastServ">Last Serviced Date</label>
        <input type="date" name="lastserv" id="lastserv" class="form-control" value="<?php echo $lastserv; ?>">
    </div>
    <div class="form-group">
        <input type="submit" value="Save Details" id="submit" name="submit" class="btn btn-dark">
    </div>
    </form>

</div>