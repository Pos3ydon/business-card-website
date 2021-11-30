$(document).ready(function(){
    $("#previewChangeBackgroundButton").bind({
        mouseenter: function(e) {
            document.getElementById("changeBackgroundWindow").setAttribute("style", "display: block");
        },
        mouseleave: function(e){
            document.getElementById("changeBackgroundWindow").setAttribute("style", "display: none");
        }
    });
    
    $("#changeBackgroundWindow").bind({
        mouseenter: function(e) {
            document.getElementById("changeBackgroundWindow").setAttribute("style", "display: block");
        },
        mouseleave: function(e){
            document.getElementById("changeBackgroundWindow").setAttribute("style", "display: none");
        }
    });
    
    $("#openBackgroundImageBtn").bind({
       click: function(e){
           document.getElementById("openBackgroundImageBtn").value = null;
       } 
    });
});


function openLogoImage(event) {
    var selected = event.target.files[0];
    var fr = new FileReader();
    fr.onload = function (event) {
        document.getElementById("previewLogo").style.backgroundImage = "url('" + event.target.result + "')";
    }
    fr.readAsDataURL(event.target.files[0]);
}

function updateValue(sender, output) {
    document.getElementById(output).textContent = event.target.value;
}

function changeBackgroundColor(event) {
    document.getElementById("preview").style.backgroundColor = event.target.value;
    document.getElementById("preview").style.backgroundImage = null;
}

function openBackgroundImage(event) {
    var selected = event.target.files[0];
    var fr = new FileReader();
    fr.onload = function (event) {
        document.getElementById("preview").style.backgroundImage = "url('" + event.target.result + "')";
    }
    fr.readAsDataURL(event.target.files[0]);
    
    document.getElementById("preview").style.backgroundColor = null;
}