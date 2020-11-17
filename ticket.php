<?php
include 'header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-1 fade-in text-black bg-dark" style="padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'tickets';
   include 'includenav.php';
   ?> 
</div>

<div class="col-xl-11 fade-in" id="" style="height: 100vh; padding: 1% 2% 2% 2%; background-color: #fff;">
<?php
if(isset($_POST['submit'])){
    date_default_timezone_set('Asia/Kolkata');
    $date = date('dmYhis', time());
    $date1 = date('d/m/Y h:i:s', time());
    khatral::khquery('INSERT INTO ticket VALUES(NULL, :tick_id, :mess, :ip, :group, :wherenm, :unm)', array(
        ':tick_id'=>'valai' . $date,
        ':mess'=>$_POST['des'],
        ':ip'=>$_POST['ip'],
        ':group'=>$_POST['gro'],
        ':wherenm'=>'admin',
        ':unm'=>$_SESSION['unme']
    ));
    echo 'ticket raised';
}
?>
<a href="comptick.php" class="btn btn-dark">View Completed</a>
<!-- <a href="dash.php" class="btn btn-dark">Back</a> -->
<!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
  Create New
</button> -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ticket Creation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="ticket.php" method="post">
            <div class="form-group">
                <label for="ip">Select IP</label>
                <select name="ip" id="ip" class="custom-select">
                    <?php
                      
                        $res = khatral::khquerypar('SELECT * FROM comp_info');
                        foreach($res as $pi){
                            echo '<option value="' . $pi['comp_ip'] . '">' . $pi['comp_ip'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Ticket Description</label>
                <input type="text" name="gro" id="gro" style="display: none;" value="<?php echo $me; ?>">
                <textarea name="des" id="des" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Create and Forward" id="submit" name="submit" class="btn btn-dark">
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>
<table class="table table-bordered" style="margin-top: 2%;">
    <th>Sl.NO</th>
    <th>Ref. No</th>
    <th>IP</th>
    <th>Description</th>
    <th>actions</th>
    <?php
        $ret = khatral::khquerypar('SELECT * FROM ticket');
        $count = 1;
        foreach($ret as $p){
            echo '<tr><td>' . $count . '</td><td>' . $p['ticket_ri_id'] . '</td><td>'. $p['ticket_ip'] . '</td><td>' . $p['ticket_mess'] . '</td><td><a href="viewtick.php?id=' . $p['ticket_ri_id'] . '">View Ticket</a></td></tr>';
            $count += 1;
        }
    ?>
</table>