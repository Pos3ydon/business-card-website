$(document).ready(function() {
    
    $("#previewChangeBackgroundBtn").bind({
        mouseenter: function(e) {
            $("#changeBackgroundWindow").show();
        },
        mouseleave: function(e) {
            $("#changeBackgroundWindow").hide();
        }
    });
    $("#changeBackgroundWindow").bind({
        mouseenter: function(e) {
            $("#changeBackgroundWindow").show();
        },
        mouseleave: function(e) {
            $("#changeBackgroundWindow").hide();
        }
    });
    
    $("#changeBackgroundColorBtn").bind({
        input: function(e) {
            $("#preview").css("backgroundColor", event.target.value)
            $("#preview").css("backgroundImage", null)
        }
    });

    $("#openBackgroundImageBtn").bind({
        click: function(e) {
            this.value = null;
        },
        input: function(e) {
            var selected = e.target.files[0];
            var fr = new FileReader();
            fr.onload = function(e) {
                $("#preview").css("backgroundImage", "url('" + e.target.result + "')");
            }
            fr.readAsDataURL(e.target.files[0]);

            $("preview").css("#backgroundColor", null);
        }
    });
    
    $("#openPreviewLogoBtn").bind({
        input: function(e) {
            var selected = e.target.files[0];
	    if (selected.size/1024 >= 4096) {
            	alert("File too Big, please select a file less than 4mb");
		return;
	    }
            var fr = new FileReader();
            fr.onload = function(e) {
                $("#previewLogo").css("backgroundImage", "url('" + e.target.result + "')");
                $("#previewLogo").css("height", "90px");
                $("#previewLogo").css("width", "90px");
            }
            fr.readAsDataURL(e.target.files[0]);
        }
    });


    var ismousedown = false;
    var oldPosX = 0;
    var oldPosY = 0;
    $(".draggable").bind({
        mousedown: function(e) {
            ismousedown = true;
            oldPosX = e.clientX;
            oldPosY = e.clientY;
        },
        mousemove: function(e) {
            if (ismousedown) {
                var newPosX = oldPosX - e.clientX;
                var newPosY = oldPosY - e.clientY;
                oldPosX = e.clientX;
                oldPosY = e.clientY;

                var parent = $(this).parent();

                var moveX = this.parentElement.offsetLeft - newPosX;
                var moveY = this.parentElement.offsetTop - newPosY;
                if (moveX >= 0 && moveX < parseInt(parent.parent().css("width")) - parseInt(parent.css("width")))
                    parent.css("left", moveX + "px");
                if (moveY >= 0 && moveY < parseInt(parent.parent().css("height")) - parseInt(parent.css("height")))
                    parent.css("top", moveY + "px");
            }
        },
        mouseleave: function(e) {
            ismousedown = false;
        }
    });
    $(window).bind({
        mouseup: function(e) {
            ismousedown = false;
        }
    });

    $(".btn_previewChangeFontSize").bind({
        mousedown: function(e) {
            ismousedown = true;
            oldPosX = e.clientX;
            oldPosY = e.clientY;
        },
        mousemove: function(e) {
            var parent = $(this).parent();
            var div = parent.find("div");
            var p = div.find("div");

            if (ismousedown) {
                var moveX = oldPosX - e.clientX;
                var moveY = oldPosY - e.clientY;

                var oldWidth = parseInt(div.width());
                var oldHeight = parseInt(div.height());

                var newWidth = oldWidth - moveX;
                var newHeight = oldHeight - moveY;


                if (newWidth + parseInt(parent.css("left")) + 4 < parseInt(parent.parent().css("width")))
                    div.css("width", newWidth + 4 + "px");
                if (newHeight + parseInt(parent.css("top")) + 4 < parseInt(parent.parent().css("height")))
                    div.css("height", newHeight + 4 + "px");

                p.css("font-size", newHeight - 10 + "px");

                oldPosX = e.clientX;
                oldPosY = e.clientY;
            }
        }
    });
    
    // $("#previewLogo").bind({
    //     mouseenter: function(e) {
    //         this.hidden = false;
    //         this.style.display = "block";

    //         document.getElementById("movePreviewLogoBtn").style.display = "block";
    //         document.getElementById("deletePreviewLogoBtn").style.display = "block";
    //     },
    //     mouseleave: function(e) {
    //         document.getElementById("movePreviewLogoBtn").style.display = "none";
    //         document.getElementById("deletePreviewLogoBtn").style.display = "none";
    //     }
    // });
    // $("#movePreviewLogoBtn").bind({
    //     mouseenter: function(e) {
    //         this.style.display = "block";
    //     },
    //     mouseleave: function(e) {
    //         this.style.display = "none";
    //     }
    // });
    // $("#deletePreviewLogoBtn").bind({
    //     mouseenter: function(e) {
    //         this.style.display = "block";
    //     },
    //     mouseleave: function(e) {
    //         this.style.display = "none";
    //     }
    // });
});


function updateValue(output) {
    $("#" + output).text(event.target.value);
    //document.getElementById(output).textContent = event.target.value;
}