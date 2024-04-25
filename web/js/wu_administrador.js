var select, table;
    select = document.getElementsByName("tablas")[0];
    table = document.getElementById("tabla");
    imprimirTabla();
    select.onchange = imprimirTabla;


function imprimirTabla() {
    table.innerHTML = "";
    var peticion = new Request(
        "index.php?ctl=obtenerTablas&tabla=" + select.value, {
        method: "get",
    }
    );

    fetch(peticion)
        .then(response => {
            if (response.ok) return response.json();
        })
        .then(json => {
            if (json[0] == undefined) return;

            let thead = document.createElement("thead");
            let trhead = document.createElement("tr");
            trhead.setAttribute("id", "tituloTabla");
            thead.appendChild(trhead);
            table.appendChild(thead);
            json = Object.entries(json);
            let rowTitulo = document.getElementById("tituloTabla");
            rowTitulo.innerHTML = "";
            let titulos = Object.entries(json[0][1]);
            titulos.forEach(element => {
                let th = document.createElement("th");
                th.setAttribute("scope", "col");
                th.textContent = element[0];
                rowTitulo.appendChild(th);
            })

            tbody = document.createElement("tbody");
            tbody.setAttribute("class", "table-group-divider");
            json.forEach(element => {
                let tr = document.createElement("tr");
                for (let key in element[1]) {
                    let th = document.createElement("th");
                    th.textContent = element[1][key];
                    tr.appendChild(th);
                }
                let btn = document.createElement("button");
                btn.innerText = "x";
                btn.addEventListener("click", function () {
                    //eliminamos del html
                    var idRow = btn.id;
                    var activo = "";
                    //FALTA MODIFICAR LA TABLA PARA QUE MUESTRE EL ESTADO DE "ACTIVO" Y QUE SE PUEDA VOLVER A ACTIVAR.
                    if (select.value == "users") { activo = this.parentNode.parentNode.childNodes[6].textContent}
                    else if(select.value == "comments") { activo = this.parentNode.parentNode.childNodes[3].textContent}
                    else if(select.value == "posts") { activo = this.parentNode.parentNode.childNodes[5].textContent}
                    //eliminarmos de base de datos

                    if (activo == "1"){
                    var peticion = new Request("index.php?ctl=desactivarFila&tabla=" + select.value + "&id=" + idRow, {
                        method: "get",
                    });

                    fetch(peticion)
                        .then(response => {
                            if (response.ok) {
                                return response;
                            } else {
                                throw new Error('Error en la petición');
                            }
                        })
                        .then(datos => {
                            if (select.value == "users") { this.parentNode.parentNode.childNodes[6].textContent = "0"}
                            else if(select.value == "comments") { this.parentNode.parentNode.childNodes[3].textContent = "0"}
                            else if(select.value == "posts") { this.parentNode.parentNode.childNodes[5].textContent = "0"}
                        })
                        .catch(error => {
                            console.error('Error de fetch:', error);
                        });
                    }else if(activo == "0"){
                        var peticion = new Request("index.php?ctl=activarFila&tabla=" + select.value + "&id=" + idRow, {
                            method: "get",
                        });
    
                        fetch(peticion)
                            .then(response => {
                                if (response.ok) {
                                    return response;
                                } else {
                                    throw new Error('Error en la petición');
                                }
                            })
                            .then(datos => {
                                if (select.value == "users") { this.parentNode.parentNode.childNodes[6].textContent = "1"}
                                else if(select.value == "comments") { this.parentNode.parentNode.childNodes[3].textContent = "1"}
                                else if(select.value == "posts") { this.parentNode.parentNode.childNodes[5].textContent = "1"}
                            })
                            .catch(error => {
                                console.error('Error de fetch:', error);
                            });
                    }
                })

                btn.id = element[1]["ID"];
                let th = document.createElement("th");
                th.appendChild(btn);
                tr.appendChild(th);
                tbody.appendChild(tr);
                table.appendChild(tbody);
            });
        });
}
