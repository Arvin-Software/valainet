import { getObjID, renderHTML, renderText } from "/valainet/js/avesengine/aves.js"
import { retSoft } from './retsoft.js';
function pursoft(assetCode, softNm, softDes, softLoc, softPurDt, softWarDt, softRenDt, errorId){
    const asCde = getObjID(assetCode).value;
    const softName = getObjID(softNm).value;
    const softDescr = getObjID(softDes).value;
    const softLocation = getObjID(softLoc).value;
    const softPurchaseDt = getObjID(softPurDt).value;
    const softWarrentyDt = getObjID(softWarDt).value;
    const softRenewedDt = getObjID(softRenDt).value;
    if(asCde != '' && softName != '' && softDescr != '' && softLocation != '' && softPurchaseDt != '' && softWarrentyDt != '' && softRenewedDt != ''){
        const payload = {
            act: 'insertSoft',
            apikey: 'influx',
            ascode: asCde,
            softNm: softName,
            softDes: softDescr,
            softLoc: softLocation,
            softPurDt: softPurchaseDt,
            softWarDt: softWarrentyDt,
            softRenDt: softRenewedDt,
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
        })
        const errorMess = `
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Information Saved.
            </div>
        `;
        getObjID(assetCode).value = '';
        getObjID(softNm).value = '';
        getObjID(softDes).value = '';
        getObjID(softPurDt).value = '';
        getObjID(softWarDt).value = '';
        getObjID(softRenDt).value = '';
        getObjID(softLoc).value = '';
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
    pursoft('assetcode', 'softnm', 'softdes', 'loc', 'purchaseddt', 'wardt', 'lastrenew', 'error');
    
})
getObjID('refresh').addEventListener('click', function(){
    retSoft();
})
window.addEventListener('DOMContentLoaded', (event) => {
    retSoft();
    console.log('DOM fully loaded and parsed');
    
});
