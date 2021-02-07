import { getObjID, renderHTML, renderText } from "../../avesengine/aves.js"
function retissues(){
    var ipaddr = getObjID('ip').value;
    var group = getObjID('group').value;
    const payload = {
        act: 'retissues',
        apikey: 'influx',
        ip: ipaddr,
        group: group
    };
    function sayHello(){
        return "alert('hello 1')";
    }
    fetch('apivalai.php',{
        method: 'post',
        body: JSON.stringify(payload),
        headers:{
            'content-type': 'application/json'
        }
    }).then(function(response){
        return response.json();
    }).then(function(data){
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
        if(data.length >0){
            console.log(data);
            var output = '<table class="table table-striped border">';
            output += `<tr class="bg-dark text-white">
            <th>SL.NO</th>
            <th>Date</th>
            <th>Count</th>
            </tr>
            `;
            var count = 0;
            removeData(myPieChart);
            removeData(myPieChart);
            data.forEach(function(comp){
                count += 1;
                addData(myPieChart, comp.date,  comp.count);
                output += `
                    <tr><td>${count}</td>
                    <td>${comp.date}</td>
                    <td>${comp.count}</td>
                    </tr>
                `;
                
                getObjID('app').innerHTML = output;
            });
        }else{
            var output = '<h4 class="text-center text-danger">No value to show</h4>';
            getObjID('app').innerHTML = output;
        }
    })
    console.log("final");
}
export { retissues }