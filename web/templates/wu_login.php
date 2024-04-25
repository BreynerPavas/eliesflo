<?php ob_start()?>
<div class="card" style="width: 23rem;">
    <div class="d-flex justify-content-center">
       <img src="./img/Wuba_logo.png" class="" height="200px" width="200px" alt="...">
    </div>
    <div class="card-body d-flex flex-column pt-0">
        <h5 class="card-title fw-bold text-center d-none d-lg-block"> Wubba Luba Dub Dub! </h5>
        <?php
        ?>
        <form action="index.php?ctl=wuLogin" class="needs-validation" novalidate method="POST" name="formLogin">
            <div>
                <label for="usuarioRegistro" class="form-label d-block"> Correo </label>
                <input type="text" class="form-control" id="usuarioRegistro" name="loginEmail" pattern="^[a-zA-Z][a-zA-Z0-9\-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$" required>
                <div class="invalid-feedback">Te has rayado bro</div>
            </div>
            <div>
                <label for="usuarioContrasenya" class="form-label d-block"> Contraseña </label>
                <input type="password" class="form-control" id="usuarioContrasenya" name="loginContrasenya" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
                <div class="invalid-feedback">La otra contraseña, manin</div>
            </div>
            <?php 
            if(!empty($params["mensaje"])){
                echo($params["mensaje"]);
            }
            ?>
            <div class="d-flex justify-content-center my-4">
                <button class="btn btn-primary" type="submit" name="bIniciarSesion">Entrar!</button>
            </div>
        </form>

        <p class="fw-light">
            <span>No tienes una cuenta?</span><a href="index.php?ctl=wuRegistro">Venga, enrrollate</a>
        </p>
        <p class="fw-light">
            <span>Has olvidado la contraseña?</span><a href="index.php?ctl=wuConfirmarCorreo">Deja los porros</a>
        </p>
    </div>
</div>
<script type="text/javascript" src="./js/wu_login.js"></script>

<?php $contenido=ob_get_clean()?>
<?php include 'wu_layout_fuera.php' ?>
