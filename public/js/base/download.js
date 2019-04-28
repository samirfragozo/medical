function _download() {
    ajaxRequest(crud + '?download=true', null, 'GET', downloadFile, dataTable);
}

function downloadFile(response){
    let a = document.createElement("a");
    a.href = response.file;
    a.download = response.name;
    document.body.appendChild(a);
    a.click();
    a.remove();
}