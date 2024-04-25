<?php ob_start(); ?>
<!-- Pagina privada-->
<input type="hidden" value="<?php echo $_GET["id"] ?>" id="id_cuenta">
<!--Aqui va el perfil-->
<div class="container-fluid ">
  <svg xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;display:none" width="25" id="bSettings" height="25"
    fill="currentColor" class="bi bi-gear-fill float-end my-3 mx-2" viewBox="0 0 16 16">
    <path
      d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
  </svg>
  <div class="row row-cols-sm-3 row-cols-2 mt-4">
    <div class="follows d-flex flex-column align-items-center profileImg">
      <img width="100" height="100" class="img-thumbnail rounded-circle profileImg mt-1" id="imgUsuario">
      <p class="" id="nombreUsuario"></p>
      <button class="btn btn-success mb-3" id="bSeguir" value="0">Seguir</button>
    </div>
    <div class="d-flex flex-column justify-content-center">
      <p><span>Simps: </span><span id="seguidores"></span></p>
      <p><span>Buscados: </span><span id="seguidos"></span></p>
    </div>

    <div class="my-3" id="description">
      <span class="align-middle" id="descUsuario">
      </span>
    </div>
  </div>
</div>



<!--Botones para cambiar entre extensa y específica-->
<div class="btn-group-sm d-flex justify-content-around row-cols-2 mt-4" style="margin:-12px" role="group">
  <input type="radio" class="btn-check" name="tipoVista" id="vistaExtensa" checked>
  <label class="btn btn-sm" for="vistaExtensa">Extensa</label>

  <input type="radio" class="btn-check" name="tipoVista" id="vistaEspecifica">
  <label class="btn btn-sm" for="vistaEspecifica">Especifica</label>

</div>

<!--Imagenes de todas las publicaciones-->
<div class="container d-flex mt-4 flex-grow-0 flex-wrap d-flex" id="divExtenso">



</div>

<!--  Modal mostrar especifica -->

<!-- Button trigger modal -->


<!--Publicacion completa-->
<div class=" mt-4 d-flex container justify-content-center align-items-center d-none" id="divEspecifico">



</div>

<script type="text/javascript" src="./js/wu_privada.js"></script>





<script>

    var idLogeado = "<?= $_SESSION["idUsuario"] ?>";
    var idMostrado = document.getElementById("id_cuenta").value;
    console.log("idmostrado" + idMostrado);

    if (idLogeado == idMostrado) {
      document.getElementById("bSettings").style.display = "block";
      document.getElementById("bSeguir").style.display = "none"; //Para esconder el botón de seguir cuando estés en tu propia pagina privada.
    }


    // Breyner evento modificar usuario
    var nombreUsuarioPeticion = "";
    var imgUsuarioPeticion = "";

    var id_cuenta = document.getElementById("id_cuenta").value;



    var claseBase = "container d-flex mt-4 flex-grow-0 flex-wrap ";
    var especifica = document.getElementById("vistaEspecifica");
    var extensa = document.getElementById("vistaExtensa");
    var divEspecifica = document.getElementById("divEspecifico");
    var divExtenso = document.getElementById("divExtenso");
    
    especifica.addEventListener("click", function () {
      divExtenso.className = claseBase + "d-none";
      divEspecifica.className = claseBase + "d-flex";
    });
    extensa.addEventListener("click", function () {
      divExtenso.className = claseBase + "d-flex";
      divEspecifica.className = claseBase + "d-none";
    });



    imprimirSeguidos();
    imprimirSeguidores();
    checkSeguido();

    obtenerDatosUsuarios(id_cuenta);



  
</script>
<?php $contenido = ob_get_clean() ?>

<?php include 'wu_layout_dentro.php' ?>