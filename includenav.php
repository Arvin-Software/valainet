<?php
$ret = khatral::khquerypar('SELECT COUNT(alert_id) AS total_alerts FROM alerts');
$count = 0;
foreach($ret as $p){
    $count = $p['total_alerts'];
}
?>
<nav class="navbar navbar-light navbar-expand-lg px-0 flex-row" style="">
    <button class="navbar-toggler  bg-white" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarWEX" style="border-radius: 20px 20px 20px 20px; padding: 0px 0px 0px 0px;">
        <div class="nav flex-md-column flex-column" style="overflow: auto;  width: 100%; padding: 0px 0px 0px 0px;">
            <a style="margin-bottom: 5%;" href="dash.php" <?php if($curr == 'dash'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb "';} ?>  id="users" name="users"><img src="/valainet/images/valai.svg" class="" style="width: 28px;">&nbsp;&nbsp;Dashboard</a>
            <a href="collection.php" style="margin-bottom: 5%;" <?php if($curr == 'announce'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb bor-none"';} ?>  id="dash" name="dash"><img src="/valainet/images/ping.svg" class="" style="width: 28px;">&nbsp;&nbsp;Collections</a>
            <a href="alertview.php" style="margin-bottom: 5%;" <?php if($curr == 'mod'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb bor-none"';} ?>  id="dash" name="dash"><img src="/valainet/images/warning.svg" class="" style="width: 28px;">&nbsp;&nbsp;Alerts <span class="badge badge-danger float-right" id="incalert" name="incalert" style="margin-top: 2%;"></span></a>
            <a href="apikey.php" style="margin-bottom: 5%;" <?php if($curr == 'api'){ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb btn-col bor-none"';} else{ echo 'class=" btn-nav nav-item nav-link btn text-left btn-bb bor-none"';} ?>  id="dash" name="dash"><img src="/valainet/images/api.svg" class="" style="width: 28px;">&nbsp;&nbsp;API settings</a>
        </div>
    </div>
</nav>
<script>
    setInterval(function () {
        
        // alert('hello');
			$.post("../api.php",
            {
            act:"retalertcount",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox:"influx"
            },
          function(data, status){
            //   alert(data);
            if(data > 0){
                $('#incalert').html(data);
                $('#incalert').show();
            }else{
                $('#incalert').hide();
            }
          });
           
    }, 200);
</script>