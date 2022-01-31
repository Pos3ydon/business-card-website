<!DOCTYPE html>

<html>

<head>
    <title>Create Business Card</title>


    <link rel="icon" href="./../images/website_icon.svg">

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
    <link rel="stylesheet" href="./../styles/resultPreviewStructure.css">
    <!-- Qr-Code -->
    <link rel="stylesheet" href="./../styles/qrcode.css">


    <link rel="stylesheet" href="./../main_style_high-priority.css">
</head>

<body>
    <?php
        //include("pages/menu_bar.php");
    ?>

    <div id="container">
        <div id="mainFormDiv">
            <div id="mainForm">
                <div id="formFirstName" class="formField">
                    <button class="deleteFieldBtn" onclick="deleteField('formFirstName', 'btn_firstName')" tabindex="-1"></button>
                    <label class="formFieldLabel">First name:</label>
                    <input id="firstName" class="formFieldInput" type="text" placeholder="First Name" oninput="this.value = this.value.replace(/[^ \u00C0-\u017Fa-zA-Z]/g, ''); updateValue('previewFirstNameP')" name="firstName" maxlength="255">
                </div>
                <div id="formLastName" class="formField">
                    <button class="deleteFieldBtn" onclick="deleteField('formLastName', 'btn_lastName')" tabindex="-1"></button>
                    <label class="formFieldLabel">Last name:</label>
                    <input id="lastName" class="formFieldInput" type="text" placeholder="Last Name" oninput="this.value = this.value.replace(/[^ \u00C0-\u017Fa-zA-Z]/g, ''); updateValue('previewLastNameP')" name="lastName" maxlength="255">
                </div>
                <div id="formProfession" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formProfession', 'btn_profession')" tabindex="-1"></button>
                    <label class="formFieldLabel">Profession:</label>
                    <input id="profession" class="formFieldInput" type="profession" placeholder="Profession" oninput="updateValue('previewProfessionP')" name="profession" maxlength="255">
                </div>
                <div id="formEmail" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formEmail', 'btn_email')" tabindex="-1"></button>
                    <label class="formFieldLabel">E-Mail:</label>
                    <input id="email" class="formFieldInput" type="email" placeholder="E-Mail" oninput="updateValue('previewEmailP')" name="email" maxlength="255">
                </div>
                <div id="formTel" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formTel', 'btn_tel')" tabindex="-1"></button>
                    <label class="formFieldLabel">Telefon:</label>
                    <input id="tel" class="formFieldInput" type="tel" placeholder="Tel." oninput="this.value = this.value.replace(/[^\+ 0-9]/g, ''); updateValue('previewTelP')" name="tel" maxlength="255">
                </div>
                <div id="formWebsite" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formWebsite', 'btn_website')" tabindex="-1"></button>
                    <label class="formFieldLabel">Website:</label>
                    <input id="website" class="formFieldInput" type="url" placeholder="Website" oninput="updateValue('previewWebsiteP')" name="website"maxlength="255">
                </div>
                <div id="formCompany" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formCompany', 'btn_company')" tabindex="-1"></button>
                    <label class="formFieldLabel">Company:</label>
                    <input id="company" class="formFieldInput" type="company" placeholder="Company" oninput="updateValue('previewCompanyP')" name="company" maxlength="255">
                </div>
                <!-- <div id="formFirmensitz" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formFirmensitz', 'btn_firmensitz')"></button>
                    <label class="formFieldLabel">Company:</label>
                    <input id="Firmensitz" class="formFieldInput" type="text" placeholder="Firmensitz" oninput="updateValue('previewfirmensitzP')" name="firmensitz" maxlength="255">
                </div>
                <div id="formBirthdate" class="formField" hidden>
                    <button class="deleteFieldBtn" onclick="deleteField('formBirthdate', 'btn_birthdate')"></button>
                    <label class="formFieldLabel">Company:</label>
                    <input id="birthdate" class="formFieldInput" type="text" placeholder="Birthdate" oninput="updateValue('previewBirthdateP')" name="birthdate" maxlength="255">
                </div> -->

                <div id="mainFormButtons">
                    <input type="button" id="btn_openAppendFieldWindow" class="btn btn-primary" value="Add new field">

                    <button id="btn_generate" class="btn btn-success" onclick="//generateCode()">Generate QR-Code</button>
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
                                <label>Color:</label>
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
                    <!-- <div id="previewFirstName" class="previewField">
                        <div class="draggable">
                            <p id="previewFirstNameP"></p>
                        </div>
                    </div> -->
                    <div id="previewFirstName" class="previewField">
                        <div class="draggable">
                            <div id="previewFirstNameP"></div>
                        </div>
                        <button class="btn_previewChangeFontSize" hidden></button>
                    </div>
                    <div id="previewLastName" class="previewField">
                        <div class="draggable">
                            <div id="previewLastNameP"></div>
                        </div>
                        <button class="btn_previewChangeFontSize" hidden></button>
                    </div>
                    <div id="previewProfession" class="previewField">
                        <div class="draggable">
                            <div id="previewProfessionP"></div>
                        </div>
                        <button class="btn_previewChangeFontSize" hidden></button>
                    </div>
                    <div id="previewEmail" class="previewField">
                        <div class="draggable">
                            <div id="previewEmailP"></div>
                        </div>
                        <button class="btn_previewChangeFontSize" hidden></button>
                    </div>
                    <div id="previewTel" class="previewField">
                        <div class="draggable">
                            <div id="previewTelP"></div>
                        </div>
                        <button class="btn_previewChangeFontSize" hidden></button>
                    </div>
                    <div id="previewWebsite" class="previewField">
                        <div class="draggable">
                            <div id="previewWebsiteP"></div>
                        </div>
                        <button class="btn_previewChangeFontSize" hidden></button>
                    </div>
                    <div id="previewCompany" class="previewField">
                        <div class="draggable">
                            <div id="previewCompanyP"></div>
                        </div>
                        <button class="btn_previewChangeFontSize" hidden></button>
                    </div>
                    <!-- <div id="previewFirmensitz" class="previewField draggable">
                        <p id="previewFirmensitzP"></p>
                    </div>
                    <div id="previewGeburtsdatum" class="previewField draggable">
                        <p id="previewGeburtsdatumP"></p>
                    </div> -->
                </div>
            </div>
            <div id="qrcodeDiv" hidden>
                <div id="qrcode"></div>
                <button id="qrcodeSaveBtn" class="btn btn-primary">Save</button>
                <button id="qrcodePrintBtn" class="btn btn-primary">Print</button>
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
<!-- <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<!-- <script type="text/javascript" src="./../libs/jquery-qrcode-master/src/qrcode.js"></script>
<script type="text/javascript" src="./../libs/jquery-qrcode-master/src/jquery.qrcode.js"></script>
<script type="text/javascript" src="./../libs/jquery-qrcode-master/jquery.qrcode.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<script src="./../scripts/resultPreview.js"></script>
<script src="./../scripts/appendField.js"></script>
<script src="./../scripts/qrCode.js"></script>

<script>
    
</script>

</html>