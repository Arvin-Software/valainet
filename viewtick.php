<?php
$mainnav = 'serv';
include 'headerabout.php';
?>
<?php
    date_default_timezone_set('Asia/Kolkata');
    $date = date('dmYhis', time());
    $date1 = date('d/m/Y h:i:s', time());
    if(isset($_POST['submit'])){
        
        khatral::khquery('INSERT INTO per_stat VALUES(NULL, :nm, :usr, :conv, :timestam)', array(
            ':nm'=>$_GET['id'],
            ':usr'=>$_SESSION['unme'],
            ':conv'=>$_POST['mess'],
            ':timestam'=>$date1
        ));
        echo 'Message posted';
    }if(isset($_POST['submit1'])){
        khatral::khquery('INSERT INTO assign_tick VALUES(NULL, :tick_id, :userid, :usernm, :timestam)', array(
            ':tick_id'=>$_GET['id'],
            ':userid'=>$_POST['assign'],
            ':usernm'=>$_POST['assign'],
            ':timestam'=>$date1
        ));
        echo 'Technician Assigned';
    }
?>
<div class="container">
<a onclick="window.history.back();" href="#" class="btn btn-dark">Back</a>
    <table class="table border table-bordered">
        <tr class="bg-dark text-white">
            <th>Sl.No</th>
            <th>Particulars</th>
            <th>Details</th>
        </tr>
        <?php
            if(isset($_GET['comp'])){
                $ret = khatral::khquery('SELECT * FROM ticket_finish WHERE ticket_ri_id=:id', array(
                    ':id'=>$_GET['id']
                ));
            }else{
                $ret = khatral::khquery('SELECT * FROM ticket WHERE ticket_ri_id=:id', array(
                    ':id'=>$_GET['id']
                ));
            }
            foreach($ret as $p){
                echo '<tr><td>1</td><td>Reference Number</td><td>' . $p['ticket_ri_id'] . '</td></tr>';
                echo '<tr><td>2</td><td>Description</td><td>' . $p['ticket_mess'] . '</td></tr>';
                echo '<tr><td>3</td><td>IP</td><td>' . $p['ticket_ip'] . '</td></tr>';
                echo '<tr><td>4</td><td>Group</td><td>' . $p['ticket_group'] . '</td></tr>';
            }
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
    
    <?php
     if(isset($_GET['comp'])){
        echo '<br /><br /><h4 class="text-center text-success">This Service ticket has been closed</h4><br /><br />';
    }else{
        ?>
        <hr>
    <form action="viewtick.php?id=<?php echo $_GET['id']; ?>" method="post">
        <div class="form-group">
            <h3><label for="message">Your Message</label></h3>
            <textarea name="mess" id="mess" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Post Message" id="submit" name="submit" class="btn btn-dark">
        </div>
    </form>
    <?php
    if($assigned == 0){
       
    ?>
    <form action="viewtick.php?id=<?php echo $_GET['id']; ?>" method="post">
        <label for="assign">Assign To</label>
        <select name="assign" id="assign" required="" class="custom-select">
        <?php
            $ret = khatral::khquery('SELECT * FROM user WHERE user_typ=:typ', array(
                ':typ'=>"1"
            ));
            foreach($ret as $p){
                echo '<option>' . $p['user_nm'] . '</option>';
            }
        ?>
        </select>
        <input type="submit" value="Assign technician" id="submit1" name="submit1" class="btn btn-dark">
    </form>
    <?php
        }
    } 
    ?>
</div>