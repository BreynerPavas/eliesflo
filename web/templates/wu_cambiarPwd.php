<?php ob_start()?>
<div class="card" style="width: 23rem;">
    <div class="d-flex justify-content-center">
        <img src="./img/Wuba_Logo.png" class="" height="200px" width="200px" alt="...">
    </div>
    <div class="card-body d-flex flex-column pt-0">
        <h5 class="card-title fw-bold text-center "> Ze me a olvidao' pisha </h5>
        <form action="index.php?ctl=wuCambiarPwd" class="needs-validation" novalidate method="POST" name="formPwd">
            <div>
                <label for="usuarioContrasenya" class="form-label ">Nueva Contraseña </label>
                <input type="password" class="form-control  usuarioContrasenya" name="usuarioContrasenya" required>
            </div>
            <div>
                <label for="usuarioContrasenya" class="form-label ">Repetir Contraseña </label>
                <input type="password" class="form-control  usuarioContrasenya" name="usuarioContrasenyaRepite" required>
                <span class="d-none" id="error">Vas borracho? pon lo mismo</span>
            </div>
            <div class="d-flex justify-content-center my-4">
                <button class="btn btn-primary" type="submit" name="bCambiarPwd" onclick="checkPass()">Esta no se
                    olvida prim</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="./js/wu_cambiarPwd.js"></script>


<?php $contenido=ob_get_clean()?>
<?php include 'wu_layout_fuera.php' ?>
