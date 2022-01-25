<!DOCTYPE html>

<html>

<head>
    <link rel="icon" href="./../images/icon.png">

    <link rel="stylesheet" href="./../main_style_low-priority.css">

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    
    <!-- Main form -->
    <link rel="stylesheet" href="./../styles/mainForm.css">
    <!-- Append field window -->
    <link rel="stylesheet" href="./../styles/appendField.css">
    <!-- Result preview -->
    <link rel="stylesheet" href="./../styles/resultPreview.css">
    <!-- Qr-Code -->
    <link rel="stylesheet" href="./../styles/qrcode.css">


    <link rel="stylesheet" href="./../main_style_high-priority.css">

</head>

<body>
    <?php
    //include("pages/menu_bar.php");
    // $firstName = "";
    // $lastName = "";
    // $profession = "";
    // $email = "";
    // $website = "";
    // $company = "";

    // print_r($_POST);
    ?>

    <div id="container">
        <div id="mainFormDiv">
            <div id="mainForm">
                <div id="formFirstName" class="formField">
                    <button class="deleteFieldBtn" onclick="deleteField('formFirstName', 'btn_firstName')"></button>
                    <label>First name:</label>
                    <input id="firstName" class="formFieldInput" type="text" placeholder="First Name" oninput="updateValue('previewFirstNameP')" name="firstName" maxlength="10">
                </div>
                <div id="formLastName" class="formField">
                    <button class="deleteFieldBtn" onclick="deleteField('formLastName', 'btn_lastName')"></button>
                    <label>Last name:</label>
                    <input id="lastName" class="formFieldInput" type="text" placeholder="Last Name" oninput="updateValue('previewLastNameP')" name="lastName" maxlength="10">
                </div>
                <div id="formProfession" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formProfession', 'btn_profession')"></button>
                    <label>Profession:</label>
                    <input id="profession" class="formFieldInput" type="profession" placeholder="Profession" oninput="updateValue('previewProfessionP')" name="profession" maxlength="10">
                </div>
                <div id="formEmail" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formEmail', 'btn_email')"></button>
                    <label>E-Mail:</label>
                    <input id="email" class="formFieldInput" type="email" placeholder="E-Mail" oninput="updateValue('previewEmailP')" name="email" maxlength="20">
                </div>
                <div id="formTel" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formTel', 'btn_tel')"></button>
                    <label>Telefon:</label>
                    <input id="tel" class="formFieldInput" type="tel" placeholder="Tel." oninput="updateValue('previewTelP')" name="tel" maxlength="10">
                </div>
                <div id="formWebsite" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formWebsite', 'btn_website')"></button>
                    <label>Website:</label>
                    <input id="website" class="formFieldInput" type="url" placeholder="Website" oninput="updateValue('previewWebsiteP')" name="website"maxlength="10">
                </div>
                <div id="formCompany" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formCompany', 'btn_company')"></button>
                    <label>Company:</label>
                    <input id="company" class="formFieldInput" type="company" placeholder="Company" oninput="updateValue('previewCompanyP')" name="company" maxlength="10">
                </div>

                <div id="mainFormButtons">
                    <input type="button" id="new_textfield" class="btn btn-primary" value="Add new field">

                    <button id="btn_generate" class="btn btn-success" onclick="generateCode()">Generate QR-Code</button>
                </div>
            </div>

        </div>

        <div id="resultDiv">
            <div id="previewDiv">
                <div id="preview">
                    <button id="previewChangeBackgroundBtn"></button>
                    <div id="changeBackgroundWindow" hidden>
                        <div id="changeBackgroundWindowContent">
                            <div>
                                <label>Colour:</label>
                                <input id="changeBackgroundColorBtn" type="color" value="#808080">
                            </div>
                            <div>
                                <label>Image:</label>
                                <button id="openBackgroundImageBtnBtn" onclick="document.getElementById('openBackgroundImageBtn').click()"></button>
                                <input id="openBackgroundImageBtn" type="file" accept=".jpg, .png, .gif, .svg">
                            </div>
                        </div>
                    </div>

                    <div id="previewLogo" class="previewField">
                        <div>
                            <button onclick="document.getElementById('openPreviewLogoBtn').click()">Edit</button>
                            <input id="openPreviewLogoBtn" type="file" accept=".jpg, .png, .gif, .svg">
                            <!-- <button id="movePreviewLogoBtn"></button>
                                <button id="deletePreviewLogoBtn"></button> -->
                        </div>
                    </div>
                    <div id="previewFirstName">
                        <p id="previewFirstNameP" class="previewField"></p>
                    </div>
                    <div id="previewLastName" class="previewField">
                        <p id="previewLastNameP"></p>
                    </div>
                    <div id="previewProfession" class="previewField">
                        <p id="previewProfessionP"></p>
                    </div>
                    <div id="previewEmail" class="previewField">
                        <p id="previewEmailP"></p>
                    </div>
                    <div id="previewTel" class="previewField">
                        <p id="previewTelP"></p>
                    </div>
                    <div id="previewWebsite" class="previewField">
                        <p id="previewWebsiteP"></p>
                    </div>
                    <div id="previewCompany" class="previewField">
                        <p id="previewCompanyP"></p>
                    </div>
                </div>
            </div>
            <div id="qrcodeDiv">
                <div id="qrcode"></div>
            </div>

        </div>
    </div>

    <div id="appendFieldWindowDiv">
        <div id="appendFieldWindow">
            <p id="appendFieldWindowTitle">Add Input Field</p>

            <button id="btn_firstName" class="appendFieldButton btn btn-secondary" onclick="appendField('formFirstName', 'btn_firstName')" style="display: none;">First name</button>
            <button id="btn_lastName" class="appendFieldButton btn btn-secondary" onclick="appendField('formLastName', 'btn_lastName')" style="display: none;">Last name</button>
            <button id="btn_profession" class="appendFieldButton btn btn-secondary" onclick="appendField('formProfession', 'btn_profession')" style="display: block;">Profession</button>
            <button id="btn_email" class="appendFieldButton btn btn-secondary" onclick="appendField('formEmail', 'btn_email')" style="display: block;">E-Mail</button>
            <button id="btn_tel" class="appendFieldButton btn btn-secondary" onclick="appendField('formTel', 'btn_tel')" style="display: block;">Tel.</button>
            <button id="btn_website" class="appendFieldButton btn btn-secondary" onclick="appendField('formWebsite', 'btn_website')" style="display: block;">Website</button>
            <button id="btn_company" class="appendFieldButton btn btn-secondary" onclick="appendField('formCompany', 'btn_company')" style="display: block;">Company</button>
            <button id="btn_closeAppendFieldWindow" class="btn btn-danger">Cancel</button>
        </div>
    </div>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script type="text/javascript" src="./../libs/jquery-qrcode-master/src/qrcode.js"></script>
<script type="text/javascript" src="./../libs/jquery-qrcode-master/src/jquery.qrcode.js"></script>
<script type="text/javascript" src="./../libs/jquery-qrcode-master/jquery.qrcode.min.js"></script>

<script src="./../scripts/resultPreview.js"></script>
<script src="./../scripts/appendField.js"></script>

<script>
    function generateCode() {
        //alert($("#openPreviewLogoBtn").val());

        var formData = new FormData();
        formData.append("firstName", $("#firstName").val());
        formData.append("lastName", $("#lastName").val());
        formData.append("profession", $("#profession").val());
        formData.append("email", $("#email").val());
        formData.append("tel", $("#tel").val());
        formData.append("website", $("#website").val());
        formData.append("company", $("#company").val());
        formData.append("logoImage", document.getElementById("openPreviewLogoBtn").files[0]);
        formData.append("backgroundColor", $("#preview").css("background-color"));
        formData.append("backgroundImage", document.getElementById("openBackgroundImageBtn").files[0]);

        
        $.ajax({
            url: "./../php/writeNewCard.php",
            type: "POST",
            data: formData,/*{
                /*"firstName": $("#firstName").val(),
                "lastName": $("#lastName").val(),
                "profession": $("#profession").val(),
                "email": $("#email").val(),
                "tel": $("#tel").val(),
                "website": $("#website").val(),
                "company": $("#company").val(),
                "logoImage": $("#openPreviewLogoBtn").val(),
                "backgroundColor": $("#preview").css("background-color"),
                "backgroundImage": $("#openBackgroundImageBtn").val()
                formData
            }*/
            processData: false,
            contentType: false,
        }).done(function(id) {
            //alert(id);
            
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
</script>

</html>