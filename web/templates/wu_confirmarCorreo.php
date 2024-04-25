<?php ob_start() ?>
<div class="card" style="width: 23rem;">
    <div class="d-flex justify-content-center">
        <img src="./img/Wuba_Logo.png" class="" height="200px" width="200px" alt="...">
    </div>
    <div class="card-body d-flex flex-column pt-0">
        <h5 class="card-title fw-bold text-center "> Ze me a olvidao' pisha </h5>
        <form action="index.php?ctl=wuConfirmarCorreo" class="needs-validation" novalidate method="POST" name="formPwd">
            <div>
                <label for="usuarioCorreo" class="form-label"> Correo </label>
                <input type="email" class="form-control" id="usuarioCorreo" name="usuarioCorreo"
                    pattern="^[a-zA-Z][a-zA-Z0-9\-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$" required>
                <div class="invalid-feedback">Revisa este campo, anda</div>
            </div>
            <div class="d-flex justify-content-center my-4">
                <button class="btn btn-primary" type="submit" name="bConfirmarCorreo"> fino señores! </button>
            </div>

            <!-- Poner un popup como que se ha enviado un correo, si no te llega es por que el correo está mal o intenta engañarnos xd-->
        </form>
    </div>
</div>

<?php $contenido=ob_get_clean()?>
<?php include 'wu_layout_fuera.php' ?>
