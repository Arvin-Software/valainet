<?php
include 'header.php';
?>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-xl-2 fade-in text-black bg-dark" style="background-color: #F2F2F2; padding: 0px 0px 0px 0px;">
   <?php
   $curr = 'dash';
   include 'includenav.php';
   ?> 
</div>

<div class="col-xl-10 fade-in shadow" id="" style="height: 100vh; padding: 1% 2% 2% 2%;">
<h3>Dashboard</h3><hr>
<div class="row">
<div class="col-lg-4 text-center">
<div style="width: 80%;" class="p-4 bor-ten">
<?php
// echo $_SESSION['unme'];
	$ret = khatral::khquery('SELECT * FROM modl WHERE modl_user=:user', array(
		':user'=>$_SESSION['unme']
	));
	$me = '';
	foreach($ret as $p){
		$me = $p['modl_nm'];
	}
?>
<input type="text" name="modl" id="modl" style="display: none;" value="<?php echo $me; ?>">
<h3>Connection overview</h3><br>
<label for="load" id="loading" name="loading">Loading Data...</label>
<canvas id="myChart" width="15" height="15">Loading...</canvas>
<script>
  function addData(chart, label, data) {
      chart.data.labels.push(label);
      chart.data.datasets.forEach((dataset) => {
          dataset.data.push(data);
      });
      chart.update(0);
  }

  function removeData(chart) {
      chart.data.labels.pop();
      chart.data.datasets.forEach((dataset) => {
          dataset.data.pop();
      });
      chart.update(0);
  }
  var ctx = document.getElementById('myChart');
  data = {
      datasets: [{
          data: [10,20],
          backgroundColor: [
                      'rgb(75, 192, 192)',
                      'rgb(255, 99, 132)',           
          ],
          hoverBorderColor: 'rgba(0,0,0,0.5)',
          hoverBorderWidth: 5,
          borderColor: 'rgba(0,0,0,0.3)'
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [
          'Active',
          'Inactive'
      ],
      
      
  };
  
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: data,
      options: {
            legend: {
                display: true,
                position: 'top',
            },
        }
  });
  $.post("../test.php",
            {
            act:"rettot",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox: "influx"
            },
          function(data, status){
            var obj = JSON.parse(data);
            var ctx = document.getElementById('myChart');
            // alert(ctx);
            removeData(myPieChart);
            removeData(myPieChart);
            // // removeData(ctx);
            // myPieChart.data.datasets[0] = obj.active;
            // myPieChart.update
            addData(myPieChart, "active",  obj.active);
            addData(myPieChart, "inactive", obj.inactive);
            $('#loading').hide();
            // alert(obj.active);
            // alert(data);
              // $('#inc1').html(data);
              
            //   if(data == "success"){
            //     $('#ip1').html("Connected");
            //   }else{
            //       $('#ip1').html("Not Connected");
            //   }
            // alert(data);
          });
</script>
</div>
</div>
	<div class="col-lg-8">
		<div class="p-4 bor-ten">
			<div id="inc">
				<div class="spinner-border text-primary"></div>&nbsp;&nbsp;Connecting to primary server please wait...
			</div>
			<br />
			<div id="inc1" style="">
				<div class="spinner-border text-primary"></div>&nbsp;&nbsp;Connecting to interface please wait...
			</div>
		</div>
		<!-- <div class="text-center fixed-bottom">
		&copy; 2020 Valai Net. All Rights Reserved.|
		Build Number : 020920200236am-alpha-r101 | An open source software<br />
    <b class="bg-danger text-white">This software is in alpha version so it is not for production. The api is not protected so use it at your own risk.</b>
		</div> -->
	</div>
</div>
</div>

<!-- <div class="text-center">
&copy; 2020 Valai(வலை). All Rights Reserved.| &copy; 2020 Arvin Soft R & D |
Build Number : 180820201150pm-alpha-r100
</div> -->

<script>
  setInterval(function () {
        
        // alert('hello');
			$.post("../test.php",
            {
            act:"sayhello",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox: "influx"
            },
          function(data, status){
            // alert(data);
            if(data == 'hello'){
                $('#inc').html('<img src="../images/tick.png" style="width: 32px;">&nbsp;&nbsp;Server connection established');
                // $('#inc1').show()
            }
          });
           
    }, 500);
    setInterval(function () {
        $.post("../test.php",
            {
            act:"retstatxuser",
            ip:"192.168.1.5",
            nm:$('#modl').val(),
            stat:"failure",
            inbox: "influx"
            },
          function(data, status){
              $('#inc1').html(data);
              
            //   if(data == "success"){
            //     $('#ip1').html("Connected");
            //   }else{
            //       $('#ip1').html("Not Connected");
            //   }
            // alert(data);
          });
        }, 1000);		
        setInterval(function () {
        $.post("../test.php",
            {
            act:"rettot",
            ip:"192.168.1.5",
            nm:"stat",
            stat:"failure",
            inbox: "influx"
            },
          function(data, status){
            var obj = JSON.parse(data);
            var ctx = document.getElementById('myChart');
            // alert(ctx);
            removeData(myPieChart);
            removeData(myPieChart);
            // // removeData(ctx);
            // myPieChart.data.datasets[0] = obj.active;
            // myPieChart.update
            addData(myPieChart, "active",  obj.active);
            addData(myPieChart, "inactive", obj.inactive);
            $('#loading').hide();
            // alert(obj.active);
            // alert(data);
              // $('#inc1').html(data);
              
            //   if(data == "success"){
            //     $('#ip1').html("Connected");
            //   }else{
            //       $('#ip1').html("Not Connected");
            //   }
            // alert(data);
          });
        }, 10000);		
</script>
</body>
</html>
<?php

?>
<!-- <a href="loginhandle/logout.php">Logout</a> -->