<?php ob_start() ?>
<!-- Pagina privada-->
<input type="hidden" value="<?php echo $_GET["id"] ?>" id="id_cuenta">
<!--Aqui va el perfil-->




<!--Botones para cambiar entre extensa y específica-->
<div class="d-flex justify-content-around row-cols-2 mt-4" style="margin: -12px">
  <p id="nombreTag" class="text-center"></p>
  <button class="btn btn-success mb-3" id="bSeguir" value="0">Seguir</button>
</div>
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

<script type="text/javascript" src="./js/wu_tags.js"></script>





<script>
  var idLogeado = "<?= $_SESSION["idUsuario"] ?>";
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
    
  
</script>
<?php $contenido = ob_get_clean() ?>

<?php include 'wu_layout_dentro.php' ?>