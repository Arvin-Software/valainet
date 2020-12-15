<?php
$curr = 'dash';
include 'header.php';
?>
<h3>Dashboard</h3><hr>
<div class="row">
<div class="col-lg-4 text-center">
<div style="width: 80%;" class="p-4 bor-ten">
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
  $.post("/valainet/api.php",
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
	</div>
</div>
</div>

<script>
	$.post("/valainet/api.php",
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
                $('#inc').html('<img src="/valainet/images/tick.png" style="width: 32px;">&nbsp;&nbsp;Server connection established');
                // $('#inc1').show()
            }
          });
          $.post("/valainet/api.php",
            {
            act:"retstatx",
            ip:"192.168.1.5",
            nm:"stat",
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
  setInterval(function () {
        
        // alert('hello');
			$.post("/valainet/api.php",
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
                $('#inc').html('<img src="/valainet/images/tick.png" style="width: 32px;">&nbsp;&nbsp;Server connection established');
                // $('#inc1').show()
            }
          });
           
    }, 500);
    setInterval(function () {
        $.post("/valainet/api.php",
            {
            act:"retstatx",
            ip:"192.168.1.5",
            nm:"stat",
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
        $.post("api.php",
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