window.onload = () => {
    // Obtener el elemento select
    var selectServicios = document.getElementById("selectServicios");

    // Obtener los datos del servidor (suponiendo que 'json' contiene los datos)
    var peticion = new Request("index.php?ctl=procedimientoReservas", {
        method: "get"
    });

    fetch(peticion)
        .then(response => {
            if (response.ok) return response.json();
        })
        .then(json => {
            // Iterar sobre los datos y agregar opciones al select
            json.forEach(servicio => {
                var option = new Option(servicio.name, servicio.id);
                option.addEventListener("change",function(){
                    //var precio = document.getElementById("precio").innerHTML = servicio.price;
                });
                selectServicios.appendChild(option);
                
            });

            // Inicializar Select2
            $(selectServicios).select2({
                placeholder: "Selecciona un servicio",
                allowClear: true
            });
        });
        document.getElementById("bEnviar").addEventListener("click",function(){
            document.getElementById("calendario").className = "embed-responsive embed-responsive-16by9 d-block";
            var peticion = new Request("index.php?ctl=subirReservacion&id="+selectServicios.value, {
                method: "get"
            });

        });
};

