import { getObjID } from '../js/avesengine/aves.js'
// const payload = {
//     act: 'retsamplejson',
//     apikey: '61170bva084bb0vaf3185avaf34d20vae35dcc',
//     ip: '192.168.1.10',
//     group: 'home computer'
// };
// fetch('apijson.php',{
//     method: 'post',
//     body: JSON.stringify(payload),
//     headers:{
//         'Content-Type': 'application/json'
//     }
// }).then(function(response){
//     return response.json();
// }).then(function(data){
//     console.log(data)
//     var output = '';
//     for(i=0; i<data['count']; i++){
//         output+= `
//         <ul>
//             <li>mm : ${data['mm' + i]} </li>
//         </ul>
//     `
     
//     // output += 'something';
//     document.getElementById('app').innerHTML = output;
//     }
//     console.log(data);
// }).catch(function(error){
//     console.log(error);
// })
function fetchAPI(){
    const payload = {
        act: 'retstatx',
        apikey: '61170bva084bb0vaf3185avaf34d20vae35dcc',
        ip: '192.168.1.10',
        group: 'home computer'
    };
    fetch('apijson.php',{
        method: 'post',
        body: JSON.stringify(payload),
        headers:{
            'Content-Type': 'application/json'
        }
    }).then(function(response){
        console.log(response)
        return response.json();
    }).then(function(data){
        console.log(data)
        var output = '<table>';
        data.forEach(function(comp){
            let online = 'yes'
            if(comp.stat=="success"){
                online = 'yes'
            }else{
                online = 'no'
            }
            output += `
            <tr>
            <td>
                ${comp.ip}
            </td>
            <td>
                ${comp.asset}
            </td>
            <td>
                ${online}
            </td>
            <td>
                ${comp.group}
            </td>
            <td>
                ${comp.nm}
            </td>
            </tr>
            `
            getObjID('app').innerHTML = output
            // document.getElementById('app').innerHTML = output
        });
    }).catch(function(error){
        console.log(error);
    })
}
getObjID('refresh').addEventListener('click', function(){
    fetchAPI();
})