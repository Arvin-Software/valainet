<?php
include 'header.php';
include '../valai.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-2 fade-in text-black" style="background-color: #F2F2F2; padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'tickets';
   include 'includenav.php';
   ?> 
</div>

<div class="col-xl-10 fade-in shadow" id="" style="height: 100vh; padding: 1% 2% 2% 2%; background-color: #fff; overflow:auto;">
<?php
    if(isset($_POST['submit'])){
        if($_POST['act'] == "0"){
            date_default_timezone_set('Asia/Kolkata');
            $date = date('dmYhis', time());
            $date1 = date('d/m/Y h:i:s', time());
            khatral::khquery('INSERT INTO per_stat VALUES(NULL, :nm, :usr, :conv, :timestam)', array(
                ':nm'=>$_GET['id'],
                ':usr'=>$_SESSION['unme_real'],
                ':conv'=>$_POST['mess'],
                ':timestam'=>$date1
            ));
            echo 'Message posted';
        }else if($_POST['act'] == "1"){
            date_default_timezone_set('Asia/Kolkata');
            $date = date('dmYhis', time());
            $date1 = date('d/m/Y h:i:s', time());
            khatral::khquery('INSERT INTO per_stat VALUES(NULL, :nm, :usr, :conv, :timestam)', array(
                ':nm'=>$_GET['id'],
                ':usr'=>$_SESSION['unme_real'],
                ':conv'=>$_POST['mess'],
                ':timestam'=>$date1
            ));
            echo 'Message posted';
        }else if($_POST['act'] == "2"){
            
            date_default_timezone_set('Asia/Kolkata');
            $date = date('dmYhis', time());
            $date1 = date('d/m/Y h:i:s', time());
            khatral::khquery('INSERT INTO per_stat VALUES(NULL, :nm, :usr, :conv, :timestam)', array(
                ':nm'=>$_GET['id'],
                ':usr'=>$_SESSION['unme_real'],
                ':conv'=>$_POST['mess'],
                ':timestam'=>$date1
            ));
            valai::UpdateTickComplete($_GET['id']);
            echo 'completed';
        }
    }
?>
<a href="ticket.php" class="btn-dark btn">Back</a>
    
        <?php
            $ret = khatral::khquery('SELECT * FROM ticket WHERE ticket_ri_id=:id', array(
                ':id'=>$_GET['id']
            ));
            $vald = 0;
            foreach($ret as $p){
                $vald = 1;
                echo '<table class="table border table-bordered">
                <tr class="bg-dark text-white">
                    <th>Sl.No</th>
                    <th>Particulars</th>
                    <th>Details</th>
                </tr>';
                echo '<tr><td>1</td><td>Reference Number</td><td>' . $p['ticket_ri_id'] . '</td></tr>';
                echo '<tr><td>2</td><td>Description</td><td>' . $p['ticket_mess'] . '</td></tr>';
                echo '<tr><td>3</td><td>IP Address / Title</td><td>' . $p['ticket_ip'] . '</td></tr>';
                echo '<tr><td>4</td><td>Group</td><td>' . $p['ticket_group'] . '</td></tr>';
                echo '<tr><td>6</td><td>Actions</td><td><a href="basicinfo.php?ip=' . $p['ticket_ip'] . '&group=' . $p['ticket_group'] . '">View info</a></td></tr>';
            }
            if($vald ==1){
            $res = khatral::khquery('SELECT * FROM assign_tick WHERE assign_tick_id=:id', array(
                ':id'=>$_GET['id']
            ));
            $count = 0;
            $assigned = 0;
            foreach($res as $p){
                $count += 1;
            }
            if($count > 0){
                echo '<tr><td>5</td><td>Assigned</td><td>Yes</td></tr>';
                echo '<tr><td>6</td><td>Assigned to</td><td>' . $p['assign_user_nm'] . '</td></tr>';
                $assigned = 1;
            }else{
                echo '<tr><td>5</td><td>Assigned</td><td>No</td></tr>';
                $assigned = 0;
            }
            
        ?>
    </table>
    <hr>
    <h3>Messages</h3>
    <table class="table table-bordered border">
        <tr>
            <th>SL.NO</th>
            <th>User</th>
            <th>Message</th>
            <th>Timestamp</th>
            <?php
                $ret = khatral::khquery('SELECT * FROM per_stat WHERE ticket_nm=:id', array(
                    ':id'=>$_GET['id']
                ));
                $count = 0;
                foreach($ret as $p){
                    $count += 1;
                    echo '<tr><td>' . $count . '</td><td>' . $p['user_nm'] . '</td><td>' . $p['conv'] . '</td><td>' . $p['timestam'] . '</td></tr>';
                }
            ?>
        </tr>
    </table>
    <form action="viewtick.php?id=<?php echo $_GET['id']; ?>" method="post">
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="mess" id="mess" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="act">Action</label>
            <select name="act" id="act" class="custom-select">
                <option value="0">Save Message</option>
                <option value="1">Pending for purchase</option>
                <option value="2">Completed</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Post Message" id="submit" name="submit" class="btn btn-dark">
        </div>
    </form>
    <?php
            }
    ?>
</div>