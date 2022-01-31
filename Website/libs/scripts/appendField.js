$(document).ready(function() {
    $("#btn_openAppendFieldWindow").bind({
        click: function(e) {
            $("#appendFieldWindowDiv").show();
        }
    });
    $("#btn_closeAppendFieldWindow").bind({
        click: function(e) {
            $("#appendFieldWindowDiv").hide();
        }
    });
});

function appendField(formId, buttonId) {
    $("#" + formId).show();
    $("#" + buttonId).hide();
    // document.getElementById(formId).style.display = "block";
    // document.getElementById(buttonId).style.display = "none";

    $(".formField").each(function(index) {
        if ($(this).css("display") == "none") {
            return false;
        }

        if (index == 6) {
            $("#btn_closeAppendFieldWindow").click();
            $("#btn_openAppendFieldWindow").hide();
        }
    });
}

function deleteField(formId, buttonId) {
    $("#" + formId).hide();
    $("#" + buttonId).show();
    // document.getElementById(formId).style.display = "none";
    // document.getElementById(buttonId).style.display = "block";

    var input = $('#' + formId).find("input");
    input.val("");
    input.trigger("input");
    
    $(".formField").each(function(index) {
        if ($(this).css("display") == "none") {
            $("#btn_openAppendFieldWindow").show();
            return false;
        }
    });
}