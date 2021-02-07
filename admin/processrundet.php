<?php
$curr = 'dash';
include '../header.php';

?>
<div style="display: none;">
<input type="text" name="ip" id="ip" value="<?php echo $_GET['ip']; ?>">
<input type="text" name="group" id="group" value="<?php echo $_GET['group']; ?>">
</div>
<div class="container" style="margin-top: 5%;">
    <a href="basicinfo.php?ip=<?php echo $_GET['ip']; ?>&group=<?php echo $_GET['group']; ?>#process" class="btn btn-dark" style="margin-left: 1.5%;">Back</a>
<!-- <a onclick="window.history.back();" href="#" class="btn btn-dark">Back</a> -->
    <div style="width: 45%;" class="mx-auto d-block">
    <canvas id="myChart" width="15" height="15">Loading...</canvas>
    </div>
    <div id="app" style="margin-bottom: 5%; margin-top: 5%;"></div>
    <hr>
    <h3>Latest 30 entries</h3>
    <div>
        <table class="table table-striped border">
            <tr class="bg-dark text-white">
                <th>SL.NO</th>
                <th>Process Name</th>
                <th>Failure Date</th>
            </tr>
            <?php
                $ret = khatral::khquery('SELECT * FROM down_record WHERE down_ip=:ip AND down_group=:group ORDER BY down_id DESC LIMIT 30', array(
                    ':ip'=>$_GET['ip'],
                    ':group'=>$_GET['group']
                ));
                $count = 0;
                foreach($ret as $p){
                    $count += 1;
                    echo '<tr><td>' . $count . '</td><td>' . $p['down_name'] . '</td><td>' . $p['down_mess'] . '</td></tr>';
                }
            ?>
        </table>
    </div>
    <script type="module" src="/valainet/js/components/issues/issues.js"></script>
</div>
<script>
  
    var ctx = document.getElementById('myChart');
  data = {
      datasets: [{  
          data: [10,20],
          fill: false,
          borderColor: 'red',
          label: "Number of alerts"
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      
      
      
  };
  
  var myPieChart = new Chart(ctx, {
        type: 'line',
      data: data,
      label: "Errors",
      options: {
            title: {
                display: true,
                text: 'Alerts for the last 5 days'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }]
            }
        }
  });
</script>