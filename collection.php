<?php
include 'header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">   
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-1 fade-in text-black bg-dark" style="padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'announce';
   include 'includenav.php';
   ?> 
</div>

<div class="col-xl-11 fade-in" id="" style="height: 100vh; padding: 1% 2% 2% 2%; background-color: #fff;">
<h3>Collection</h3><hr>
<?php
if(isset($_POST['submit'])){
    $groupnm = $_POST['nm'];
    $groupdescr = $_POST['descr'];
    khatral::khquery('INSERT INTO comp_group VALUES(NULL, :groupnm, :groupdescr)', array(
        ':groupnm'=>$groupnm,
        ':groupdescr'=>$groupdescr
    ));
}
?>
<form action="collection.php" method="post">
    <div class="from-group">
        <label for="collnm">Collection Name</label>
        <input type="text" name="nm" id="nm" required="" class="form-control">
    </div>
    <div class="form-group">
        <label for="descr">Collection Description</label>
        <textarea name="descr" id="descr" cols="30" rows="3" class="form-control" required=""></textarea>
    </div>
    <input type="submit" value="Save" id="submit" name="submit" class="btn btn-dark">
</form>
<br>
<hr>
<br>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Sl.No</th>
        <th>Collection Name</th>
        <th>Collection Description</th>
        <th>Systems</th>
    </tr>
    <?php
        $ret = khatral::khquerypar('SELECT * FROM comp_group');
        $count = 0;
        foreach($ret as $p){
            $res = khatral::khquery('SELECT * FROM stat WHERE act_group=:group', array(
                ':group'=>$p['group_nm']
            ));
            $active = 0;
            $inactive = 0;
            $total = 0;
            foreach($res as $pi){
                if($pi['act_stat'] == "success"){
                    $active += 1;
                }else{
                    $inactive += 1;
                }
                $total = $active + $inactive;
            }
            $count += 1;
            if($total != 0){
                $actper = round($active / $total * 100, 0);
                $inactper = round($inactive / $total * 100, 0);
            }else{
                $actper = 0;
                $inactper = 0;
            }
            echo '<tr><td>' . $count . '</td><td>' . $p['group_nm'] . '</td><td>' . $p['group_descr'] . '</td><td>
            ';
            ?>
            <div class="progress">
                <div class="progress-bar bg-success" style="width:<?php echo $actper; ?>%">
                    Active ( <?php echo $actper; ?>% )
                </div>
                <div class="progress-bar bg-danger" style="width:<?php echo $inactper; ?>%">
                    Not Active ( <?php echo $inactper; ?>% )
                </div>
            </div>
            <?php
            echo '
            </tr>';
        }
    ?>
</table>
</div>
</div>
