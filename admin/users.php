<?php
$mainnav = 'users';
include '../headerabout.php';
if(isset($_POST['submit'])){
    $ret = valai::InsertUsers($_POST['unme'], $_POST['pass'], $_POST['role']);
    if($ret == "0"){
      echo 'User inserted';
    }else{
      echo 'User already exists';
    }
}
?>
<style>
textarea:focus, 
textarea.form-control:focus, 
input.form-control:focus, 
input[type=text]:focus, 
input[type=password]:focus, 
input[type=email]:focus, 
input[type=number]:focus, 
.custom-select:focus,
.btn:focus,
[type=text].form-control:focus, 
[type=password].form-control:focus, 
[type=email].form-control:focus, 
[type=tel].form-control:focus, 
[contenteditable].form-control:focus {
  box-shadow: inset 0 -1px 0 #fff;
}
.btn:hover{
	background-color: #f6f6f6;
}
</style>
<!-- Button to Open the Modal -->
<div class="container-fluid">


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog shadow bor-twen" style="margin-top: 8%;">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      	<h4 class="text-center">User creation</h4>
        <p class="text-center">Create new user to manage access control</p>
        <form action="users.php" method="post" autocomplete="off">
			<div  style="padding-left: 10%; padding-right: 10%;">
				<div class="form-group row border">
					<label for="unm" class="col-sm-4 col-form-label">Username : </label>
					<div class="col-sm-8">
						<input type="text" name="unme" id="unme" style="border: none;" class="form-control" required="">
					</div>
				</div>
				<div class="form-group row border">
					<label for="pass" class="col-sm-4 col-form-label">Password : </label>
					<div class="col-sm-8">
						<input type="password" name="pass" id="pass" style="border: none;" class="form-control" required="">
					</div>
				</div>
				<div class="form-group row border">
					<label for="role" class="col-sm-4 col-form-label">Role : </label>
					<div class="col-sm-8">
						<select name="role" id="role" style="border: none;" class="custom-select">
							<option value="0">Local Admin</option>
							<option value="1">Technician</option>
						</select>
					</div>
				</div>
			</div>
			<hr>
            <div class="form-group">
            	<button type="submit" id="submit" name="submit" class="btn float-right text-dark"><b>Save</b></button><button type="button" class="btn float-right  border-right text-dark" data-dismiss="modal">Cancel</button>
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>
<div class="container" style="margin-top: 1%;">
<button type="button" class="btn text-primary" style="font-size: 16px;" data-toggle="modal" data-target="#myModal">
<i class="fas fa-plus"></i>&nbsp;&nbsp;New
</button>
<button data-toggle="modal" data-target="#myModal2" class="btn text-primary" style="font-size: 16px;"><i class="far fa-question-circle"></i>&nbsp;&nbsp;Help</button>
</div>
<hr>
<div class="container">
<h3 class="text-center">Access control</h3>

<table class="table border-bottom" style="margin-top: 2%;">
    <th class="border-right">Sl.NO</th>
    <th class="border-right">Name</th>
    <th class="border-right">Role</th>
    <th>Actions</th>
    <?php
        $ret = khatral::khquerypar('SELECT * FROM user');
        $count = 0;
        foreach($ret as $p){
			if($p['user_typ'] == "0"){
				$count += 1;
				echo '<tr><td class="border-right">' . $count . '</td><td class="border-right">' . $p['user_nm'] . '</td><td class="border-right">Local Admin</td><td><a href="colladd.php?id=' . $p['user_id'] . '">Add Collections to user</a></td></tr>';
      }else if($p['user_typ'] == "2"){
			}else{
				$count += 1;
				echo '<tr class=""><td class="border-right">' . $count . '</td><td class="border-right">' . $p['user_nm'] . '</td><td class="border-right">Technician</td><td>No action</td></tr>';
			}
            
        }
    ?>
</table>
<br>
<p>
Please refer to documentation by clicking help to learn more about access control
</p>
</div>