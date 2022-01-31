$(document).ready(function() {
    $("#btn_generate").bind({
        click: function(e) {


            var firstName = $("#firstName").val().trim();
            var lastName = $("#lastName").val().trim();
            var profession = $("#profession").val().trim();
            var email = $("#email").val().trim();
            var tel = $("#tel").val().trim();
            var website = $("#website").val().trim();
            var company = $("#company").val().trim();
            var logoImage = document.getElementById("openPreviewLogoBtn").files[0];
            var backgroundImage = document.getElementById("openBackgroundImageBtn").files[0];
            var jsonArray = {
                "backgroundColor": $("#preview").css("background-color"),
                "firstName": {
                    "top": $("#previewFirstName").css("top"),
                    "left": $("#previewFirstName").css("left"),
                    "width": $("#previewFirstName").css("width"),
                    "height": $("#previewFirstName").css("height"),
                    "fontSize": $("#previewFirstNameP").css("font-size")
                },
                "lastName": {
                    "top": $("#previewLastName").css("top"),
                    "left": $("#previewLastName").css("left"),
                    "width": $("#previewLastName").css("width"),
                    "height": $("#previewLastName").css("height"),
                    "fontSize": $("#previewLastNameP").css("fontSize")
                },
                "profession": {
                    "top": $("#previewProfession").css("top"),
                    "left": $("#previewProfession").css("left"),
                    "width": $("#previewProfession").css("width"),
                    "height": $("#previewProfession").css("height"),
                    "fontSize": $("#previewProfessionP").css("fontSize")
                },
                "email": {
                    "top": $("#previewEmail").css("top"),
                    "left": $("#previewEmail").css("left"),
                    "width": $("#previewEmail").css("width"),
                    "height": $("#previewEmail").css("height"),
                    "fontSize": $("#previewEmailP").css("fontSize")
                },
                "tel": {
                    "top": $("#previewTel").css("top"),
                    "left": $("#previewTel").css("left"),
                    "width": $("#previewTel").css("width"),
                    "height": $("#previewTel").css("height"),
                    "fontSize": $("#previewTelP").css("fontSize")
                },
                "website": {
                    "top": $("#previewWebsite").css("top"),
                    "left": $("#previewWebsite").css("left"),
                    "width": $("#previewWebsite").css("width"),
                    "height": $("#previewWebsite").css("height"),
                    "fontSize": $("#previewWebsiteP").css("fontSize")
                },
                "company": {
                    "top": $("#previewCompany").css("top"),
                    "left": $("#previewCompany").css("left"),
                    "width": $("#previewCompany").css("width"),
                    "height": $("#previewCompany").css("height"),
                    "fontSize": $("#previewCompanyP").css("fontSize")
                },
            }
            var jsonArray = JSON.stringify(jsonArray);


            if (!(firstName == "" && lastName == "" && profession == "" && email == "" && tel == "" && website == "" && company == "")) {
                var formData = new FormData();
                formData.append("firstName", firstName);
                formData.append("lastName", lastName);
                formData.append("profession", profession);
                formData.append("email", email);
                formData.append("tel", tel);
                formData.append("website", website);
                formData.append("company", company);
                formData.append("logoImage", logoImage);
                formData.append("backgroundImage", backgroundImage);
                formData.append("meta", jsonArray);


                
                $.ajax({
                    url: "./../php/writeNewCard.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                }).done(function(id) {
                    //alert(id);
                    //console.log(id);

                    $("#qrcodeDiv").show();
                    
                    var qrSize = 256;
                    
                    $("#qrcode").empty();
                    jQuery(function() {
                        jQuery('#qrcode').qrcode({
                            width: qrSize,
                            height: qrSize,
                            text: window.location.origin + "?id=" + id
                        });
                    })
                });
            }
        }
    });
    $("#qrcodeSaveBtn").bind({
        click: function (e) {
            var canvas = document.getElementById("qrcode").getElementsByTagName("canvas")[0];

            var link = document.createElement('a');
            link.download = "qrcode.png";
            link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            link.click();
        }
    });
    $("#qrcodePrintBtn").bind({
        click: function (e) {
            var canvas = document.getElementById("qrcode").getElementsByTagName("canvas")[0];

            printJS(canvas.toDataURL(), 'image');
        }
    });
});