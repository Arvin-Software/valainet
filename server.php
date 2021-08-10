<?php
$server = 'server';
$inst="server";
include 'header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style="">
        <div class="col-lg-1 fade-in border-right text-black bg-dark" style="border-radius: 0px 0px 20px 0px; height: 20vh; padding: 80px 10px 180px 10px;">
   <?php
   $curr = 'dash';
//    include 'includenav.php';
   ?> 
   <!-- <div class="bg-primary">
   Server
   </div> -->
   <img src="images/valaiweb.svg" class="mx-auto d-block fade-in rounded-circle p-2" style="background-color: #fff; width: 88px; height: 88px; margin-top: 3%;" alt="logo">
   <!-- <h2 class="text-white p-4 text-center fnt-cur">Valai - Server</h2> -->
</div>

<div class="col-lg-11 fade-in" id="" style="height: 40vh; padding: 1% 2% 2% 2%;">
    <div id="inc">
        <div class="spinner-border text-dark"></div>
    </div>
    <br />
    <div id="inc1">
        <div class="spinner-border text-dark"></div>
    </div>
    <br>
    <div id="inc2">
        <div class="spinner-border text-dark"></div>
    </div>
    <br>
    <div id="inc3">
        <div class="spinner-border text-dark"></div>
    </div>
</div>

<script>
    $('#inc1').hide()
    $('#inc2').hide()
    $('#inc3').hide()
// alert('hello');
    setInterval(function () {
        
        // alert('hello');
			$.post("api.php",
            {
            act:"sayhello",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox:"influx"
            },
          function(data, status){
            // alert(data);
            if(data == 'hello'){
                $('#inc').html('<img src="images/tick.png" style="width: 32px;">&nbsp;&nbsp;Connection established to primary server');
                $('#inc1').show()
                $('#inc2').show()
                $('#inc3').show()
            }
          });
           
    }, 2000);
    setInterval(function () {
        
        // alert('hello');
			$.post("api.php",
            {
            act:"updatestatx",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox:"influx"
            },
          function(data, status){
            // alert(data);
            if(data == 'success'){
                $('#inc1').html('<img src="images/tick.png" style="width: 32px;">&nbsp;&nbsp;Server is booted up and running...');
            }else{
                $('#inc1').html('<img src="images/warning.svg" style="width: 28px;">&nbsp;&nbsp;Error booting up server please refer documentation ( error code : SERBT233501 )');
            }
          });
           
    }, 20000);
    setInterval(function () {
        
        // alert('hello');
			$.post("api.php",
            {
            act:"updateallproc",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox:"influx"
            },
          function(data, status){
            // alert(data);
            if(data == 'success'){
                $('#inc2').html('<img src="images/tick.png" style="width: 32px;">&nbsp;&nbsp;Process monitor server is booted up and running...');
            }else{
                $('#inc2').html('<img src="images/warning.svg" style="width: 28px;">&nbsp;&nbsp;Error booting up Process monitor server please refer documentation ( error code : SERBT433509X )');
            }
          });
           
    }, 20000);
    setInterval(function () {
        
        // alert('hello');
			$.post("api.php",
            {
            act:"updateallip",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox:"influx"
            },
          function(data, status){
            // alert(data);
            if(data == 'success'){
                $('#inc3').html('<img src="images/tick.png" style="width: 32px;">&nbsp;&nbsp;IP monitor server is booted up and running...');
            }else{
                $('#inc3').html('<img src="images/warning.svg" style="width: 28px;">&nbsp;&nbsp;Error booting up IP monitor server please refer documentation ( error code : SERBT433509X )');
            }
          });
           
    }, 20000);
    
</script>
</div>
<b class="bg-dark text-white p-2 bor-ten" style="font-size: 38px;">Valai Server</b><br><br>
This is a server page and it will not execute on its own. <br />
Please refer documentation for more information on how to access it and work with it. <br /> <br> 
<b class="bg-danger text-white p-2 bor-ten">Please don't close this window</b><br /><br />
<?php valai::DisplayVerBuild() ?> | An open source software<br />Copyright &copy; 2020-2021 Valainet. All Rights Reserved.