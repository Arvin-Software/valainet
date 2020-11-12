<?php
include 'header.php';
include 'valai.php';
if(isset($_POST['submit'])){
    valai::InsertUsers($_POST['unme'], $_POST['pass'], $_POST['role']);
    echo 'Users inserted';
}
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-1 fade-in text-black bg-dark" style="padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'user';
   include 'includenav.php';
   ?> 
</div>

<div class="col-xl-11 fade-in" id="" style="height: 100vh; padding: 1% 2% 2% 2%; background-color: #fff;">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
  Create New
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Creation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="users.php" method="post">
            <div class="form-group">
                <label for="unm">User Name</label>
                <input type="text" name="unme" id="unme" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="custom-select">
                    <option value="0">Local Admin</option>
                    <option value="1">Technician</option>
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
    <th>Name</th>
    <th>Role</th>
    <th>Actions</th>
    <?php
        $ret = khatral::khquerypar('SELECT * FROM user');
        $count = 1;
        foreach($ret as $p){
			if($p['user_typ'] == "0"){
				echo '<tr><td>' . $count . '</td><td>' . $p['user_nm'] . '</td><td>'. $p['user_typ'] . '</td><td><a href="colladd.php?id=' . $p['user_id'] . '">Add Collections to user</a></td></tr>';
			}else{
				echo '<tr><td>' . $count . '</td><td>' . $p['user_nm'] . '</td><td>'. $p['user_typ'] . '</td></tr>';
			}
            $count += 1;
        }
    ?>
</table>