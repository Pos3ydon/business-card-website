
function openAppendFieldWindow() {
    document.getElementById("appendFieldWindowDiv").setAttribute("style", "display: block");
}

function closeAppendFieldWindow() {
    document.getElementById("appendFieldWindowDiv").setAttribute("style", "display: none");
}

function appendField(formId, buttonId) {
    document.getElementById(formId).setAttribute("style", "display: block");
    document.getElementById(buttonId).setAttribute("style", "display: none");

    closeAppendFieldWindow();
}

function deleteField(formId, buttonId) {
    document.getElementById(formId).setAttribute("style", "display: none");
    document.getElementById(buttonId).setAttribute("style", "display: block");
}