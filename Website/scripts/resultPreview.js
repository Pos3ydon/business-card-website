function openLogoImage(event) {
    var selected = event.target.files[0];
    var fr = new FileReader();
    fr.onload = function (event) {
        document.getElementById("resultPreviewLogo").style.backgroundImage = "url('" + event.target.result + "')";
    }
    fr.readAsDataURL(event.target.files[0]);
}

function updateValue(sender, output) {
    document.getElementById(output).textContent = event.target.value;
}