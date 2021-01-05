<?php
$mainnav = 'users';
include '../headerabout.php';
?>
<?php
if(isset($_POST['submit'])){
    valai::InsertModl($_POST['coll'], $_GET['id']);
    echo 'Collections inserted';
}
if(isset($_GET['iddel'])){
    valai::DeleteModl($_GET['iddel']);
    echo 'Collection deleted';
}
?>
<br><br>
<div class="container">
<a onclick="window.history.back();" href="#" class="btn btn-dark">Back</a>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
  Add Collections
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Collections to add</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="colladd.php?id=<?php echo $_GET['id']; ?>" method="post">
            
            <div class="form-group">
                <label for="role">Collections</label>
                <select name="coll" id="coll" class="custom-select">
                   <?php
                        $ret = khatral::khquerypar('SELECT * FROM comp_group');
                        foreach($ret as $p){
                            echo '<option>' . $p['group_nm'] . '</option>';
                        }
                   ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Save" id="submit" name="submit" class="btn btn-dark">
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>

<table class="table table-bordered" style="margin-top: 2%;">
    <th>Sl.NO</th>
    <th>Collection Name</th>
    <th>Actions</th>
    <?php
        $ret = khatral::khquery('SELECT * FROM modl WHERE modl_user=:id', array(
            ':id'=>$_GET['id']
        ));
        $count = 1;
        foreach($ret as $p){
            echo '<tr><td>' . $count . '</td><td>' . $p['modl_nm'] . '</td><td><a href="colladd.php?iddel=' . $p['modl_id'] . '&id=' . $_GET['id'] . '">Delete</a></td></tr>';
            $count += 1;
        }
    ?>
</table>