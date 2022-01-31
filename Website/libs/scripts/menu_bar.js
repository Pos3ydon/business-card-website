window.onload = function() {
    aObj = document.getElementById("navBar").getElementsByTagName("a");
    for(i = 0; i < aObj.length; i++) {
        if(document.location.href.indexOf(aObj[i].href) >= 0) {
            aObj[i].className = "active";
            break;
        }
    }
}

$(document).ready(function() {
    $("#navBarAcc").bind({
        mouseenter: function(e) {
            document.getElementById("navBarAccDropdown").style.display = "block";
        },
        mouseleave: function(e) {
            document.getElementById("navBarAccDropdown").style.display = "none";
        }
    })
})