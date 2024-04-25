<?php ob_start() ?>
   
        <div class=" mt-4 container justify-content-center align-items-center" id="wuRo">
          
          
          
        </div>

    <script>var idLogeado = "<?= $_SESSION["idUsuario"] ?>";</script>
    <script type="text/javascript" src="./js/wu_Ro.js"></script>

<?php $contenido = ob_get_clean() ?>

<?php include 'wu_layout_dentro.php'?>