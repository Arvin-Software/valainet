<?php
include 'header.php';
include '../valai.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-2 fade-in text-black" style="background-color: #F2F2F2;padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'tickets';
   include 'includenav.php';
   ?> 
</div>

<div class="col-xl-10 fade-in shadow" id="" style="height: 100vh; padding: 1% 2% 2% 2%; background-color: #fff;">
<div class="table-responsive">
<table class="table table-bordered" style="margin-top: 2%;">
    <th>Sl.NO</th>
    <th>Ref. No</th>
    <th>IP Address / Title</th>
    <th>Description</th>
    <th>actions</th>
    <?php

        $ret = khatral::khquery('SELECT assign_tick.assign_tick_id, ticket.ticket_ri_id, ticket.ticket_ip, ticket.ticket_id, ticket.ticket_mess FROM assign_tick LEFT JOIN ticket ON assign_tick.assign_tick_id = ticket.ticket_ri_id WHERE assign_tick.assign_user_nm=:unm', array(
            ':unm'=>$_SESSION['unme_real']
        ));
        $count = 1;
        foreach($ret as $p){
            if(isset($p['ticket_ri_id'])){
                echo '<tr><td>' . $count . '</td><td><a href="viewtick.php?id=' . $p['ticket_ri_id'] . '">' . $p['ticket_ri_id'] . '</a></td><td>'. $p['ticket_ip'] . '</td><td>' . $p['ticket_mess'] . '</td><td><a href="viewtick.php?id=' . $p['ticket_ri_id'] . '">View Ticket</a></td></tr>';
                $count += 1;
            }
        }
    ?>
</table>
</div>