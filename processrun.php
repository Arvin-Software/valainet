<?php
include 'header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-1 fade-in border-right text-black bg-dark" style="padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'dash';
   include 'includenav.php';
   ?> 
</div>
<div class="col-xl-11 bg-light fade-in" id="" style=" padding: 1% 2% 2% 2%;">
<a href="basicinfo.php?ip=<?php echo $_GET['ip']; ?>&group=<?php echo $_GET['group']; ?>" class="btn btn-dark" style="margin-left: 1.5%;">Back</a>
    <table class="table table-bordered table-striped border shadow" style="width: 98%; margin-left: 1.5%;">
        <tr class="bg-dark text-white">
            <th>SL.NO</th>
            <th>Process Name</th>
            <th>ID</th>
            <th>Memory Used</th>
        </tr>
        <?php
            $ret = khatral::khquery('SELECT * FROM process_run WHERE pro_ip=:ip AND pro_group=:group', array(
                ':ip'=>$_GET['ip'],
                ':group'=>$_GET['group']
            ));
            $count = 1;
            foreach($ret as $p){
                echo '<tr><td>' . $count . '</td><td>' . $p['pro_nm'] . '</td><td>' . $p['proc_id'] . '</td><td>' . $p['pro_mem'] . ' KB</td></tr>';
                $count += 1;
            }
            
        ?>
    </table>
</div>