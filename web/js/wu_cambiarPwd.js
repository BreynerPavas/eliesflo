function checkPass() {
    var passwords = document.getElementsByTagName("input");
    if (passwords[0].value != passwords[1].value) {

        document.getElementById("error").className = "d-block";
        document.forms[0].reset();
        event.preventDefault();
    } else {
        document.forms[0].submit();
    }
}