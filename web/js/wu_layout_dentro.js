window.onload = function () {



    var tags = document.getElementById("tags");
    tags.addEventListener("input", habilitarEnviar);


    document.getElementById('formPost').addEventListener('submit', function (event) {
        var tagsParaInput = document.getElementsByClassName("totalTags");
        for (var i = 0; i < tagsParaInput.length; i++) {
            var tags = document.getElementById("tags");
            var textoAux = (tagsParaInput[i].textContent).slice(0, -1); // textContent tomara tambien la X cuidado
            tags.value += textoAux;
        }

    });
    imprimirTags();
    imprimirUsuarios();
    document.getElementById("buscador").onkeyup = sugerirBusquedas;
}
//FUNCIONALIDAD PARA SUGERIR BUSQUEDAS
function sugerirBusquedas(){

    let buscador = document.getElementById("buscador");
    let divSugerencias =  document.getElementById("sugerenciasBusqueda");

    if(buscador.value.length <=1 ){
        divSugerencias.innerHTML ="";
        divSugerencias.style.display = "none";
    }else{
    
        if(buscador.value.slice(0,1)=="@"){
            var peticion = new Request("index.php?ctl=obtenerSugerenciaUsers&sug="+buscador.value.slice(1), {
                method: "get"
            });
            fetch(peticion)
            .then(response => {
                if (response.ok) return response.json();
                else console.log(response);
            })
            .then(json => {
                if(json.length == 0 ) return;
                divSugerencias.innerHTML="";
                json = Object.entries(json);
                let ul = document.createElement("ul");
                ul.style.listStyle = "none";
                ul.style.paddingLeft = "0";
                json.forEach(element =>{
                    let a = document.createElement("a");
                    a.setAttribute("href","index.php?ctl=wuPrivada&id="+element[1]["ID"]);
                    a.textContent = "@"+element[1]["name"];
                    let li = document.createElement("li");
                    li.appendChild(a);
                    ul.appendChild(li);
                })
                divSugerencias.appendChild(ul);
                divSugerencias.style.display = "block";

            });
        }else if(buscador.value.slice(0,1)=="#"){
            var peticion = new Request("index.php?ctl=obtenerSugerenciasTags&sug="+buscador.value.slice(1).toLowerCase(), {
                method: "get"
            });
            fetch(peticion)
            .then(response => {
                if (response.ok) return response.json();
                else console.log(response);
            })
            .then(json => {
                if(json.length == 0 ) return;
                divSugerencias.innerHTML="";
                json = Object.entries(json);
                let ul = document.createElement("ul");
                ul.style.listStyle = "none";
                ul.style.paddingLeft = "0";
                json.forEach(element =>{
                    let a = document.createElement("a");
                    a.setAttribute("href","index.php?ctl=wuTags&id="+element[1]["ID"]);
                    a.textContent = "#"+element[1]["tag"];
                    let li = document.createElement("li");
                    li.appendChild(a);
                    ul.appendChild(li);
                })
                divSugerencias.appendChild(ul);
                divSugerencias.style.display = "block";

            });
        }else{
            
            return;
        }

       
    }
}
//JS DEL MODAL SUBIR POST
function setupImagePickerModal() {
    function filePicker() {
        document.getElementById("filePicker").click();
    }

    function handleFileSelect(event) {
        const file = event.target.files[0];
        const img = document.getElementById("imagen");
        const reader = new FileReader();

        reader.onload = function (e) {
            img.setAttribute("src", e.target.result);
        };

        reader.readAsDataURL(file);
    }

    document.getElementById("imagen").addEventListener("click", filePicker);
    document.getElementById("filePicker").addEventListener("change", handleFileSelect);
}

// Llamar a la función setupImagePickerModal para inicializar la funcionalidad en el segundo formulario
setupImagePickerModal();

function habilitarEnviar() {
    let file = document.getElementById("filePicker");
    var tags = document.getElementById("tags_Post");
    var boton = document.getElementById("enviarPost");
    if (file.value != "" && tags.childElementCount != 0) {
        boton.removeAttribute("disabled");
    } else {
        boton.setAttribute("disabled", "true");
    }

}


//FUNCIÓN PARA IMPRIMIR EN LOS LADOS LOS TAGS SEGUIDOS
function imprimirTags() {

    var peticion = new Request("index.php?ctl=obtenerTagsSeguidos", {
        method: "get"
    });

    fetch(peticion)
        .then(response => {
            if (response.ok) return response.json();
        })
        .then(json => {
            // No necesitas convertir a array de entradas, ya que fetch() convierte a JSON automáticamente
            // json = Object.entries(json);
            
            if (Object.keys(json).length === 0) return; // Verificar si el objeto JSON está vacío
            
            let listas = document.getElementsByClassName("listaTags");

            [...listas].forEach(element => {

                let tagsToDisplay = getRandomUniqueTags(json, 4);
                tagsToDisplay.forEach(tag => {
                    let li = document.createElement("li");
                    li.setAttribute("class", "list-group-item");
                    let a = document.createElement("a");
                    a.setAttribute("class", "text-decoration-none");
                    a.setAttribute("href","index.php?ctl=wuTags&id="+tag[1]);
                    a.textContent = "#"+tag[0];
                    li.appendChild(a);
                    element.appendChild(li);
                });
            });
        });
}

// Función para obtener tags únicos de la lista de forma aleatoria
function getRandomUniqueTags(tagsList, count) {
    let shuffledTags = tagsList.slice(); // Clonar la lista para no modificar la original
    for (let i = shuffledTags.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [shuffledTags[i], shuffledTags[j]] = [shuffledTags[j], shuffledTags[i]];
    }
    return shuffledTags.slice(0, count);
}

//FUNCIÓN PARA IMPRIMIR EN LOS LADOS LOS USUARIOS SEGUIDOS
function imprimirUsuarios() {
    var peticion = new Request("index.php?ctl=obtenerUsuariosSeguidos", { method: "get" });

    fetch(peticion)
        .then(response => {
            if (response.ok) return response.json();
            else new Error("Error en la petición");
        })
        .then(json => {
            json = Object.entries(json);
            let listas = document.getElementsByClassName("listaUsuarios");
            [...listas].forEach(element => {
                let usersToDisplay = getRandomUniqueUsers(json, 4); // Obtener 4 usuarios únicos de la lista
                usersToDisplay.forEach(user => {
                    let li = document.createElement("li");
                    li.setAttribute("class", "list-group-item");
                    let a = document.createElement("a");
                    a.setAttribute("class", "text-decoration-none");
                    a.setAttribute("href", "index.php?ctl=wuPrivada&id=" + user[1]["ID"]);
                    let img = document.createElement("img");
                    img.setAttribute("src", user[1]["profilePicture"]);
                    img.setAttribute("width", "30");
                    img.setAttribute("height", "30");
                    img.className="rounded-5";
                    a.appendChild(img);
                    a.innerHTML += " @" + user[1]["name"];
                    li.appendChild(a);
                    element.appendChild(li);

                });
            });
        });
}
// Función para obtener usuarios únicos de la lista de forma aleatoria
function getRandomUniqueUsers(usersList, count) {
    let shuffledUsers = usersList.slice(); // Clonar la lista para no modificar la original
    for (let i = shuffledUsers.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [shuffledUsers[i], shuffledUsers[j]] = [shuffledUsers[j], shuffledUsers[i]];
    }
    return shuffledUsers.slice(0, count);
}

//FUNCIÓN PARA COMPROBAR LOS TAGS A LA HORA DE SUBIR POST
$("#tags").keypress(
    function (event) {

        if (event.which == '13') {

            if (document.getElementById("tags").value == "") {
                return;
            }


            if (!document.getElementById("tags").checkValidity()) {
                alert("El tag no mola, entre 1 y 20 letras y solo letras y número nano");
                return;
            }
            if (document.getElementById("tags_Post").childElementCount >= 5) {
                alert("No se pueden poner más de 5 tags. Breyner hazme esto bonito <3");
                return;
            }
            //controlamos el agregar tags
            var tag = document.getElementById("tags");
            var pTags = document.getElementById("tags_Post");


            var spanAux = document.createElement("span");
            spanAux.textContent = "#" + tag.value.toLowerCase();
            spanAux.className = "me-2 totalTags d-flex justify-content-center align-items-center";
            var spanX = document.createElement("span");
            spanX.textContent = "X";
            spanX.className = "border ms-1 px-1 d-flex justify-content-center align-items-center";
            spanX.setAttribute("style", "color:red;cursor:pointer;border-radius:5px");
            spanX.addEventListener("click", () => {
                pTags.removeChild(spanX.parentElement);
                habilitarEnviar();
            });
            spanAux.appendChild(spanX);
            tag.value = "";
            pTags.appendChild(spanAux);
            event.preventDefault();
            habilitarEnviar();

        }
    });

