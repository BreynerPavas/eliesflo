<?php ob_start() ?>
            <div class="card" style="width: 23rem;">
                <div class="d-flex justify-content-center">
                    <img src="./img/Wuba_logo.png" class="" height="200px" width="200px" alt="...">
                </div>
                <div class="card-body d-flex flex-column pt-0">
                    <h5 class="card-title fw-bold text-center d-none d-lg-block"> Wubba Luba Dub Dub! </h5>
                    <form class="needs-validation" novalidate id="wu_formRegistro" name="wu_formRegistro" action="index.php?ctl=wuRegistro" method="POST">
                        <div>
                            <label for="usuarioCorreo" class="form-label"> Correo </label>
                            <input type="email" class="form-control" id="correoRegistro" name="correoRegistro" pattern="^[a-zA-Z][a-zA-Z0-9\-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$"  required>
                            <div class="invalid-feedback">Revisa este campo, anda</div>
                            <!-- pattern="^[a-zA-Z][a-zA-Z0-9-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$" -->
                        </div>
                        <div>
                            <label for="usuarioCorreoRepite" class="form-label"> Repite correo </label>
                            <input type="email" class="form-control" id="correoRepite2" name="correoRegistroRepite" onblur="validEmail()" pattern="^[a-zA-Z][a-zA-Z0-9\-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$"  required>
                            <div class="invalid-feedback">Ni copiar y pegar sabes</div>
                        </div>
                        <div>
                            <label for="usuarioContrasenya" class="form-label"> Contraseña </label>
                            <input type="password" class="form-control" id="usuarioContrasenya" name="usuarioContrasenya" aria-describedby="passwordHelpBlock" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
                            <div id="passwordHelpBlock" class="form-text">
                                Melón, tienes que poner lo que te de la gana entre 8 y 16 caracteres y al menos una mayúscula, una minúscula, un número y un símbolo.
                            </div>
                            <div class="invalid-feedback">A ver si aprendemos a leer las condiciones</div>
                            <!--  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$"-->
                        </div>
                        <div class="form-check mt-4">
                            <input type="checkbox" name="terminosPrivacidad" id="terminosPrivacidad" class="from-check-input" required>
                            <label for="terminosPrivacidad" class="form-check-label d-inline">Al hacer clic en "Registrarse", acepta los <a href="index.php?ctl=wuTermCond">Términos y condiciones</a> de Wubba Bactan.</label>
                            <div class="invalid-feedback"> Acepta aunque no te lo hayas leído, copón</div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <p><?php
                             if(!empty($params["mensaje"])){
                                echo($params["mensaje"]);
                            }
                             ?></p><br>
                            <button class="btn btn-primary" type="submit" name="bRegistrar">Registarse!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php $contenido = ob_get_clean() ?>

<?php include 'wu_layout_fuera.php' ?>
