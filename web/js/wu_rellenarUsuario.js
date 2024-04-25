function filePicker() {
    document.getElementById("filePicker").click();
}

window.onload = function () {

    document.getElementById("formularioRellenar").addEventListener("submit", function () {
        var totalTags = document.getElementsByClassName("tag"); //Array
        var input = document.getElementById("recibeTags");
        for (var i = 0; i < totalTags.length; i++) {
            var tagname = "#" + totalTags[i].textContent.slice(0, -1); // Eliminar el '#' del inicio
            input.value += tagname;
        }
    });


    var peticion = new Request("index.php?ctl=obtenerTags", { method: "get" });

    fetch(peticion)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error en la petición');
            }
        })
        .then(tags => {
            console.log(tags); // Imprime el objeto JSON
            var tagsTotales = document.getElementById("tagsIniciales");

            tags.forEach(element => {
                var option = document.createElement("option");
                option.value = element["ID"];
                option.textContent = element["tag"];
                //console.log(element);
                tagsTotales.appendChild(option);
            });
            let caja = document.getElementById("cajaTags");
            let options = document.getElementsByTagName("option");

            [...options].forEach(option => {
                console.log(option);
                option.addEventListener('click', function () {
                    if (option.selected) {
                        let a = document.createElement("a");
                        a.setAttribute("href", "#");
                        a.onclick = function () {
                            caja.removeChild(this.parentNode);
                            option.disabled = false;
                        }
                        a.text = "x";

                        let div = document.createElement("div");
                        div.innerText = option.text;
                        div.appendChild(a);
                        div.setAttribute("class", "m-2 tag");
                        caja.appendChild(div);
                        option.disabled = true;
                    }
                });
            });

        });
    //




    let img = document.getElementById("imagen");
    let file = document.getElementById("filePicker");

    file.oninput = function () {
        let reader = new FileReader();
        reader.onload = function (e) {
            img.setAttribute("src", e.target.result)
        }
        reader.readAsDataURL(file.files[0]);
    }
}