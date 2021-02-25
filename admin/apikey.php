<?php
$curr = 'api';
include '../header.php';
if(isset($_GET['id'])){
    valai::deleteApiKey($_GET['id']);
}
?>
<h3>Api Key Creation</h3>
<?php
if(isset($_POST['submit'])){
    $nm = $_POST['nm'];
    $descr = $_POST['descr'];
    valai::insertApiKey($nm, $descr);
}
?>
<div class="container-fluid">
    <form action="apikey.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="nm" id="nm" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="des">Description</label>
            <textarea name="descr" id="descr" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Save" id="submit" name="submit" class="btn btn-dark">
        </div>
    </form>
</div>
<hr>
<div class="container-fluid">
    <table class="table table-bordered">
        <tr>
            <th>Sl.No</th>
            <th>Name</th>
            <th>Description</th>
            <th>API Key</th>
            <th>Actions</th>
        </tr>
        <?php
            $ret = khatral::khquerypar('SELECT * FROM api_key');
            $count = 0;
            foreach($ret as $p){
                $count += 1;
                echo '<tr><td>' . $count . '</td>';
                echo '<td>' . $p['api_name'] . '</td>';
                echo '<td>' . $p['api_description'] . '</td>';
                echo '<td>' . $p['api_key_hash'] . '</td>';
                echo '<td><a href="apikey.php?act=del&id=' . $p['api_id'] . '" class="btn btn-danger">Delete</a></td>';
                echo '</tr>';
            }
        ?>
    </table>
</div>