$(document).ready(function() {
    $("#new_textfield").bind({
        click: function(e) {
            document.getElementById("appendFieldWindowDiv").style.display = "block";
        }
    });
    $("#btn_closeAppendFieldWindow").bind({
        click: function(e) {
            document.getElementById("appendFieldWindowDiv").style.display = "none";
        }
    });
});


/*function openAppendFieldWindow() {
    document.getElementById("appendFieldWindowDiv").setAttribute("style", "display: block");
}*/

/*function closeAppendFieldWindow() {
    document.getElementById("appendFieldWindowDiv").setAttribute("style", "display: none");
}*/

function appendField(formId, buttonId) {
    document.getElementById(formId).style.display = "block";
    document.getElementById(buttonId).style.display = "none";
    //document.getElementById(formId).setAttribute("style", "display: block");
    //document.getElementById(buttonId).setAttribute("style", "display: none");
}

function deleteField(formId, buttonId) {
    //document.getElementById(formId).getElementsByTagName("input")[0].value = "";
    document.getElementById(formId).getElementsByTagName("input")[0].oninput();
    document.getElementById(formId).style.display = "none";
    document.getElementById(buttonId).style.display = "block";
    /*document.getElementById(formId).getElementsByTagName("input")[0].value = "";
    document.getElementById(formId).getElementsByTagName("input")[0].oninput();
    document.getElementById(formId).setAttribute("style", "display: none");
    document.getElementById(buttonId).setAttribute("style", "display: block");*/
}