import { getObjID, renderHTML, renderText } from "../../avesengine/aves.js"
function deleteSoftware(softId){
    const val = softId
    // return `
    // alert('${softId}')
    // `
    return `
    const payload = {
        act: 'delSoft',
        apikey: 'influx',
        softid: '${softId}',
    };
    console.log(payload);
    fetch('apivalai.php',{
        method: 'post',
        body: JSON.stringify(payload),
        headers:{
            'content-type': 'application/json'
        }
    }).then(function(response){
        return response.text();
    }).then(function(data){
        if(data == 'success'){
            document.getElementById('refresh').click();
        }else{
            alert('some error');
        }
    })
    `;
}
const payload = {
    act: 'retSoft',
    apikey: 'influx',
};
function retSoft(){
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
        console.log(data);
        var output = '<table class="table table-striped">';
        output += `<tr class="bg-dark text-white">
        <th>SL.NO</th>
        <th>Computer Name</th>
        <th>Description</th>
        <th>Purchase Date</th>
        <th>Warrenty Date</th>
        <th>Renewed Date</th>
        <th>Asset Code</th>
        <th>Location</th>
        <th>Actions</th>
        </tr>
        `;
        var count = 0;
        data.forEach(function(comp){
            count += 1;
            output += `
                <tr><td>${count}</td>
                <td>${comp.nm}</td><td>${comp.des}</td>
                <td>${comp.purdt}</td><td>${comp.expdt}</td>
                <td>${comp.rendt}</td><td>${comp.assetcode}</td>
                <td>${comp.loc}</td>
                <td><button id="${comp.nm}" class="btn btn btn-danger" onClick="${deleteSoftware(comp.id)}">Delete</button></td>
                </tr>
            `;
            
            getObjID('app').innerHTML = output;
        });
    })
    console.log("final");
}
export { retSoft }