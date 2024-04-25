window.onload = () => {
    var modificar = document.getElementById("modificarUsuario");
    modificar.addEventListener("submit", function () {
        document.getElementById("nombreUsuarioLogeado").textContent = document.getElementById("nombreUsuario").textContent;
        document.getElementById("imgHeader").setAttribute("src", document.getElementById("imgUsuario").getAttribute("src"));
    });
}

function filePicker2() {
    document.getElementById("filePicker2").click();
}

function handleFileSelect2(event) {
    const file = event.target.files[0];
    const img = document.getElementById("imagen2");
    const reader = new FileReader();

    reader.onload = function (e) {
        img.setAttribute("src", e.target.result);
    };

    reader.readAsDataURL(file);
}


document.getElementById("imagen2").addEventListener("click", filePicker2);
document.getElementById("filePicker2").addEventListener("change", handleFileSelect2);

(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})