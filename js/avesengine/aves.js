//Render the HTML
function renderHTML(id, func){
    console.log("HTML Setting : id - " + id + " : func - " + func)
    return id.innerHTML = func;
}
//Render the text
function renderText(id, func){
    console.log("Text Setting : id - " + id + " : func - " + func)
    return id.textContent = func
}
//Get Object ID
function getObjID(objNm){
    console.log('objnm ' + objNm)
    return document.getElementById(objNm);
}

function pageSwitch(func, contHolder){
    const mess = func
    return `document.getElementById('${contHolder}').innerHTML = '${mess}'`
}
export { renderHTML, renderText, getObjID, pageSwitch };