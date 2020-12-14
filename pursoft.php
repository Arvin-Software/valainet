<?php
$mainnav = 'pur';
include 'headerabout.php';
if(isset($_GET['del'])){
$ret = khatral::khquery('DELETE FROM pur_soft WHERE soft_id=:id', array(
    ':id'=>$_GET['id']
));
}
?>
<div class="container" style="margin-top: 5%;">
<!-- <a onclick="window.history.back();" href="#" class="btn btn-dark">Back</a> -->
    <div class="form-group">
        <label for="Asset Code">Asset Code</label>
        <input type="text" name="assetcode" id="assetcode" class="form-control" value="">
    </div>
    <div class="form-group">
        <label for="nm">Software Name</label>
        <input type="text" name="softnm" id="softnm" class="form-control" required="">
    </div>
    <div class="form-group">
        <label for="Des">Software Description</label>
        <textarea name="softdes" id="softdes" cols="30" rows="3" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="loc">Location</label>
        <input type="text" name="loc" id="loc" class="form-control" value="">
    </div>
    <div class="form-group">
        <label for="install">Purchased Date</label>
        <input type="date" name="purchaseddt" id="purchaseddt" class="form-control" value="">
    </div>
    <div class="form-group">
        <label for="WarExp">Warrenty Expiration Date</label>
        <input type="date" name="wardt" id="wardt" class="form-control" value="">
    </div>
    <div class="form-group">
        <label for="LastServ">Last Renewed Date</label>
        <input type="date" name="lastrenew" id="lastrenew" class="form-control" value="">
    </div>
    <div id="error"></div>
    <div class="form-group">
        <button id="submit" name="submit" class="btn btn-dark">Save</button>&nbsp;&nbsp;
        <button id="refresh" name="refresh" class="btn btn-dark">Refresh</button>
    </div>
    <div id="app"></div>
    <script type="module" src="js/components/pursoft/pursoft.js"></script>
</div>