import { getObjID, renderHTML, renderText } from "../../avesengine/aves.js"
// import { retSoft } from './retsoft.js';
import { retequip } from './retequip.js';
function nonit(assetCode, coll, equipNm, equipDes, equipLoc, equipPurDt, equipWarDt, equipRenDt, errorId){
    const asCde = getObjID(assetCode).value;
    const equipName = getObjID(equipNm).value;
    const equipDescr = getObjID(equipDes).value;
    const equipLocation = getObjID(equipLoc).value;
    const equipPurchaseDt = getObjID(equipPurDt).value;
    const equipWarrentyDt = getObjID(equipWarDt).value;
    const equipRenewedDt = getObjID(equipRenDt).value;
    const equipcoll = getObjID(coll).value;
    if(equipcoll != '' && asCde != '' && equipName != '' && equipDescr != '' && equipLocation != '' && equipPurchaseDt != '' && equipWarrentyDt != '' && equipRenewedDt != ''){
        const payload = {
            act: 'insertequip',
            apikey: 'influx',
            ascode: asCde,
            equipcollec: equipcoll,
            equipNm: equipName,
            equipDes: equipDescr,
            equipLoc: equipLocation,
            equipPurDt: equipPurchaseDt,
            equipWarDt: equipWarrentyDt,
            equipRenDt: equipRenewedDt,
        };
        fetch('apivalai.php',{
            method: 'post',
            body: JSON.stringify(payload),
            headers:{
                'content-type': 'application/json'
            }
        }).then(function(response){
            return response.text();
        }).then(function(data){
            console.log(data);
        }).catch(function(error){
            console.log(error);
        })
        const errorMess = `
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Information Saved.
            </div>
        `;
        getObjID(assetCode).value = '';
        getObjID(coll).value = '';
        getObjID(equipNm).value = '';
        getObjID(equipDes).value = '';
        getObjID(equipPurDt).value = '';
        getObjID(equipWarDt).value = '';
        getObjID(equipRenDt).value = '';
        getObjID(equipLoc).value = '';
        renderHTML(getObjID(errorId), errorMess);
        document.getElementById('refresh').click();
    }else{
        const errorMess = `
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> Please fill all the fields.
            </div>
        `;
        renderHTML(getObjID(errorId), errorMess);
        // alert('sorry one of your field is empty');
    }
}
getObjID('submit').addEventListener('click', function(){
    nonit('assetcode', 'coll', 'equipnm', 'equipdes', 'loc', 'purchaseddt', 'wardt', 'lastrenew', 'error');
    
})
getObjID('refresh').addEventListener('click', function(){
    // alert('hello');
    getObjID('app').innerHTML = '';
    
})
window.addEventListener('DOMContentLoaded', (event) => {
    // retequip();
    console.log('DOM fully loaded and parsed');
    
});
getObjID('collsel').addEventListener('change', function(){
    var e = getObjID('collsel');
    var value = e.options[e.selectedIndex].value;
    var text = e.options[e.selectedIndex].text;
    // alert(text);
    retequip(text);
})