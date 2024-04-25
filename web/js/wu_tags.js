if(document.getElementById("id_cuenta").value == null){
    
}
var id_cuenta = document.getElementById("id_cuenta").value;
//Funcion para obtener todo
imprimirPostTag();

function imprimirPostTag(){

    var peticion3 = new Request("index.php?ctl=obtenerPostTag", {
        method: "post",
        body: ('id_cuenta=' + encodeURIComponent(id_cuenta)), // Pasa tu variable aquí
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
            // Puedes ajustar los encabezados según sea necesario
        }
    });

    fetch(peticion3)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error en la petición');
            }
        })
        .then(element => {
            element.forEach(post => {
                console.log("ppppp");
                console.log(post);
                console.log("ppppp");
                document.getElementById("divExtenso").innerHTML += '<img width="270" height="320" onclick="actualizarModal(' + post["post_id"] + ')" src="' + post['post_img'] + '" alt="meme"  class="extensa m-auto my-1 justify-self-center align-self-center">';

                document.getElementById("divEspecifico").innerHTML += '<div id="p' + post["post_id"] + '" class="container d-flex justify-content-center align-items-center"><div class="col card mb-3"><header class="d-flex justify-content-between align-items-center"><div class="infoUser d-flex justify-content-center align-items-end"><img width="50" height="50" src="' + post["user_profile_picture"] + '" class="rounded-5 imgUsuarioPost"></img><h5 class="card-title nombreUsuarioPost p-2 m-2"><a href="index.php?ctl=wuPrivada&id=' + post["user_id"] + '">@' + post["user_name"] + '</a></h5></div></header><p><strong>' + post["post_description"] + '</strong></p><div class="container lugarMeme"><img src="' + post["post_img"] + '" alt="" class="especifica"></div><div class="card-body"><p class="card-text"><div class="postInfo d-flex"><div class="like align-items-start d-flex"><button class="btnLike_'+post["post_id"]+'" value=0><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16"><path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"></path></svg></button><span class="align-self-start ms-2 contadorLikes_'+post["post_id"]+'">0</span></div><div class="tags align-self-end ms-3 d-flex flex-wrap" id="espacioTags' + post["post_id"] + '">';

                obtenerTagsPost(post["post_id"]); // Llamada a obtenerTagsPost
                imprimirLikes(post["post_id"])
                //document.getElementById("p" + post["post_id"]).firstChild.innerHTML += '<div class="comments"><div class="accordion accordion-flush" id="accordionFlushExample' + post["post_id"] + '"><div class="accordion-item"><h2 class="accordion-header"><button id="button'+post["post_id"]+'" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne' + post["post_id"] + '" aria-expanded="false" aria-controls="flush-collapseOne'+post["post_id"]+'"></button></h2><div id="flush-collapseOne' + post["post_id"] + '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample' + post["post_id"] + '"><div class="accordion-body"><!--Aqui podras agregar comentarios--><form action=""><label for="comentarioNuevo">Deja tu comentario:</label><input type="text" name="comentarioNuevo" id="" class="comentarioNuevo" maxlength="75" placeholder="Comenta"></form><!--Aqui se cargaran los comentarios--><div id="ComentariosPost'+post['post_id']+'" class="showComments scroll-width-thin scroll"></div>';
                
                

                
            });
        })
        .catch(error => {
            console.error('Error de fetch:', error);
        }
        )
        ;
}
function obtenerTagsPost(id_Post) {
    var peticion5 = new Request("index.php?ctl=obtenerTagsPost", {
        method: "post",
        body: ('idPost=' + encodeURIComponent(id_Post)),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    });

    fetch(peticion5)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error en la petición');
            }
        })
        .then(datos => {
            console.log(datos);
            datos.forEach(element => {
                console.log("cccc");
                console.log(element);
                console.log("cccc");
                document.getElementById("espacioTags" + id_Post).innerHTML += '<span class="mx-1"><a href="index.php?ctl=wuTags&id=' + element["ID"] + '">' + "#" + element["tag"] + '</a></span>';
            });
            document.getElementById("p" + id_Post).firstChild.innerHTML += '<div class="comments"><div class="accordion accordion-flush" id="accordionFlushExample' + id_Post + '"><div class="accordion-item "><h2 class="accordion-header"><button id="button'+id_Post+'" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne' + id_Post + '" aria-expanded="false" aria-controls="flush-collapseOne'+id_Post+'"></button></h2><div id="flush-collapseOne' + id_Post + '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample' + id_Post + '"><div class="accordion-body"><!--Aqui podras agregar comentarios--><div action="" id="f'+id_Post+'" ><input type="hidden" id="idPost'+id_Post+'" name="id_post" value="'+ id_Post +'"><label for="comentarioNuevo">Deja tu comentario:</label><input type="text" name="comentarioNuevo" id="comentario'+id_Post+'" class="comentarioNuevo" maxlength="75" placeholder="Comenta"></div><!--Aqui se cargaran los comentarios--><div id="ComentariosPost'+id_Post+'" class="w-100 showComments scroll-width-thin scroll"></div>';
            obtenerCommentsPost(id_Post);

        })
        .catch(error => {
            console.error('Error de fetch:', error);
        });
}

function actualizarModal(idPost) {
    var especifica = document.getElementById("vistaEspecifica");
    var extensa = document.getElementById("vistaExtensa");

    especifica.click();
    irAPost(idPost);

}
function irAPost(idPost){
    console.log(document.getElementById("p"+idPost));
    var targetElement = document.getElementById("p"+idPost);
    targetElement.scrollIntoView();
}
function obtenerCommentsPost(id) {
    var peticion4 = new Request("index.php?ctl=obtenerCommentsPost", {
        method: "post",
        body: 'idPost=' + encodeURIComponent(id),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    });

    fetch(peticion4)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la petición: ' + response.statusText);
            }
            return response.json();
        })
        .then(datos => {
            document.getElementById('f'+id).addEventListener("keypress", function(event) {
                // Verificar si la tecla presionada es "Enter"
                console.log("s");
                if (event.key === "Enter") {
                    // Evitar el envío automático del formulario
                    console.log("enter");
                    var comentario = document.getElementById("comentario"+id).value;
                    var idPost = document.getElementById("idPost"+id).value;
                    console.log(comentario);
                    console.log(idPost);
                    var peticion3 = new Request("index.php?ctl=subirComments", {
                        method: "post",
                        body: 'comentario=' + encodeURIComponent(comentario) + '&idPost=' + encodeURIComponent(idPost), // Pasa tu variable aquí
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                            // Puedes ajustar los encabezados según sea necesario
                        }
                    });
                    fetch(peticion3)
                        .then(response => {
                            if (response.ok) {
                                var cadena = document.getElementById("verUsuario").getAttribute("href");
                                var partes = cadena.split("="); // Divide la cadena en partes usando "=" como delimitador
                                var ultimoElemento = partes[partes.length - 1];
                                document.getElementById("comentario"+id).value = "";
                                (document.getElementById("ComentariosPost"+id)).innerHTML = '<div class="comentario d-flex align-items-center mt-3"><a href="index.php?ctl=wuPrivada&id='+ultimoElemento+'"><img class="rounded-5" width="30" src="'+ document.getElementById("imgHeader").getAttribute("src") +'"><a></img><p class="mx-2 flex-wrap">'+comentario+'</p></div>' + document.getElementById("ComentariosPost"+id).innerHTML;
                            } else {
                                throw new Error('Error en la petición');
                            }
                        })
                        .then(datos => {
                            console.log("terminado");
                        })
                        .catch(error => {
                            console.error('Error de fetch:', error);
                
                        });
                    // Tu lógica adicional aquí, si es necesaria
                }
            });

            datos.forEach(comentario => {
            document.getElementById("ComentariosPost"+id).innerHTML += '<div id="c'+comentario["comment_id"]+'" class="comentario d-flex align-items-center mt-3"><a href="index.php?ctl=wuPrivada&id='+comentario['user_id']+'"><img class="rounded-5" width="30" src="'+comentario["user_profile_picture"]+'"></a></img><p class="mt-0 mx-2 flex-wrap">'+comentario["comment_description"]+'</p></div>';

            });
            
        })
        .catch(error => {
            console.error('Error de fetch:', error);
        });
}

//FUNCIÓN PARA IMPRIMIR EL TITULO DEL TAG
imprimirTagPagina();
function imprimirTagPagina(){
    
    let peticion = new Request("index.php?ctl=obtenerTagPorId&id="+id_cuenta, { method: "get" });

    fetch(peticion).
    then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Error en la petición');
        }
    }).
    then(json =>{
        //console.log("pablo: "+json[0]["tag"]);
        document.getElementById("nombreTag").textContent ="#"+json[0]["tag"];
    });
}
//FUNCION PARA COMPROBAR SI EL TAG MOSTRADO ES SEGUIDO O NO
checkSeguidoTag();
function checkSeguidoTag() {
    var peticion = new Request("index.php?ctl=obtenerTagsSeguidos", { method: "get" });
    fetch(peticion)
        .then(response => {
            if (response.ok) return response.json();
            else new Error("Error en la petición");
        })
        .then(json => {
            json = Object.entries(json);

            //PABLO: bucle para cambiar el texto del botón bSeguir para adecuarse a la realidad

            for (let ind in json) {
                if (json[ind][1][1] == id_cuenta) {
                    bSeguir.textContent = "Dejar de seguir";
                    bSeguir.value = "1";
                    break;
                }
            }
        });


}


//PABLO: Funcionalidad del botón bSeguir para seguir o dejar de seguir gente (1 = siguiento; 0 = no siguiendo)
let bSeguir = document.getElementById("bSeguir");
bSeguir.addEventListener("click", function () {
    if (bSeguir.value === "1") {
        let peticion = new Request("index.php?ctl=eliminarSeguirTag&idMostrado=" + id_cuenta, {
            method: "get"
        });
        fetch(peticion)
            .then(response => {
                if (response.ok) {

                } else {

                }
            })
            .then(datos => {
                bSeguir.textContent = "Seguir";
                bSeguir.value = "0";
            });
    }
    else if (bSeguir.value === "0") {
        let peticion = new Request("index.php?ctl=addSeguirTag&idMostrado=" + id_cuenta, {
            method: "get"
        });
        fetch(peticion)
            .then(response => {
                if (response.ok) {

                } else {

                }
            })
            .then(datos => {
                bSeguir.textContent = "Dejar de seguir";
                bSeguir.value = "1";
            });
    }
});


//FUNCIÓN PARA IMPIMIR LOS LIKES
function imprimirLikes(idPost){

    let peticion = new Request("index.php?ctl=obtenerLikesPost&idPost="+idPost,{method: "get"});
    fetch(peticion)
    .then(response =>{
        if(response.ok) return response.json();
        else new Error("Error en la petición");
    })
    .then(json =>{
        json = Object.entries(json);
        let contadorLikesElements = document.querySelectorAll(".contadorLikes_" + idPost);
        contadorLikesElements.forEach(element => {
            element.textContent = json.length;
        });

        let btnLikeElements = document.querySelectorAll(".btnLike_" + idPost);
        btnLikeElements.forEach(element => {
            for (let ind in json) {
                if (json[ind][1]["ID_User"] == idLogeado) {
                    element.value = 1;
                    break;
                }
            }
        });
        darLike(idPost);

    });
        

};
    

//FUNCIÓN PARA DAR LIKES
function darLike(idPost) {

    let btnElements = document.querySelectorAll(".btnLike_" + idPost);

    btnElements.forEach(btn => {
        btn.onclick = function() {
            if (this.value == 1) {
                let peticion = new Request("index.php?ctl=quitarLike&idPost=" + idPost, { method: "get" });
                fetch(peticion)
                    .then(response => {
                        if (!response.ok) new Error("Error en la petición");
                    })
                    .then(json => {
                        let contadorElements = document.querySelectorAll(".contadorLikes_" + idPost);
                        contadorElements.forEach(cont => {
                            let nCont = parseInt(cont.textContent);
                            cont.textContent = nCont - 1;
                        });
                        this.value = 0;
                    });
            } else if (this.value == 0) {
                let peticion = new Request("index.php?ctl=addLike&idPost=" + idPost, { method: "get" });
                fetch(peticion)
                    .then(response => {
                        if (!response.ok) new Error("Error en la petición");
                    })
                    .then(json => {
                        let contadorElements = document.querySelectorAll(".contadorLikes_" + idPost);
                        contadorElements.forEach(cont => {
                            let nCont = parseInt(cont.textContent);
                            cont.textContent = nCont + 1;
                        });
                        this.value = 1;
                    });
            }
        }
    });


} 
