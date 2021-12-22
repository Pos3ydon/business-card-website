$(document).ready(function() {
    $(".previewField").draggable();
    
    $("#previewChangeBackgroundBtn").bind({
        mouseenter: function(e) {
            document.getElementById("changeBackgroundWindow").style.display = "block";
            //document.getElementById("changeBackgroundWindow").setAttribute("style", "display: block");
        },
        mouseleave: function(e) {
            document.getElementById("changeBackgroundWindow").style.display = "none";
            //document.getElementById("changeBackgroundWindow").setAttribute("style", "display: none");
        }
    });
    
    $("#changeBackgroundWindow").bind({
        mouseenter: function(e) {
            document.getElementById("changeBackgroundWindow").style.display = "block";
            //document.getElementById("changeBackgroundWindow").setAttribute("style", "display: block");
        },
        mouseleave: function(e) {
            document.getElementById("changeBackgroundWindow").style.display = "none";
            //document.getElementById("changeBackgroundWindow").setAttribute("style", "display: none");
        }
    });
    
    $("#changeBackgroundColorBtn").bind({
        input: function(e) {
            document.getElementById("preview").style.backgroundColor = event.target.value;
            document.getElementById("preview").style.backgroundImage = null;
        }
    });
    
    $("#openBackgroundImageBtn").bind({
        click: function(e) {
            document.getElementById("openBackgroundImageBtn").value = null;
        },
        input: function(e) {
            var selected = e.target.files[0];
            var fr = new FileReader();
            fr.onload = function(e) {
                document.getElementById("preview").style.backgroundImage = "url('" + e.target.result + "')";
            }
            fr.readAsDataURL(e.target.files[0]);

            document.getElementById("preview").style.backgroundColor = null;
        }
    });
    
    $("#openPreviewLogoBtn").bind({
        input: function(e) {
            var selected = e.target.files[0];
            var fr = new FileReader();
            fr.onload = function(e) {
                document.getElementById("previewLogo").style.backgroundImage = "url('" + e.target.result + "')";
                document.getElementById("previewLogo").style.height = "90px";
                document.getElementById("previewLogo").style.width = "90px";
            }
            fr.readAsDataURL(e.target.files[0]);
        }
    });
    
    $("#previewLogo").bind({
        mouseenter: function(e) {
            document.getElementById("movePreviewLogoBtn").style.display = "block";
            document.getElementById("deletePreviewLogoBtn").style.display = "block";
        },
        mouseleave: function(e) {
            document.getElementById("movePreviewLogoBtn").style.display = "none";
            document.getElementById("deletePreviewLogoBtn").style.display = "none";
        }
    })
});


/*function openBackgroundImage(event) {
    var selected = event.target.files[0];
    var fr = new FileReader();
    fr.onload = function(event) {
        document.getElementById("preview").style.backgroundImage = "url('" + event.target.result + "')";
    }
    fr.readAsDataURL(event.target.files[0]);
    
    document.getElementById("preview").style.backgroundColor = null;
}*/

/*function changeBackgroundColor(event) {
    document.getElementById("preview").style.backgroundColor = event.target.value;
    document.getElementById("preview").style.backgroundImage = null;
}*/

/*function openLogoImage(event) {
    var selected = event.target.files[0];
    var fr = new FileReader();
    fr.onload = function(event) {
        document.getElementById("previewLogo").style.backgroundImage = "url('" + event.target.result + "')";
    }
    fr.readAsDataURL(event.target.files[0]);
}*/

function updateValue(output) {
    document.getElementById(output).textContent = event.target.value;
}