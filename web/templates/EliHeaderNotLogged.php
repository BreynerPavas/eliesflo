<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <!--HEader -->
    <!-- header No Logeado-->
	<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark sticky-top" style="">
        <div class="container">
        <a class="navbar-brand" href="index.php?ctl=EliInicio"> <img src="./img/eliesfloLogo.png" width="50" class="d-inline-block align-top img-fluid" alt=""> <span editable="inline">EliEsFLo</span> </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar1" aria-controls="myNavbar1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="myNavbar1">
            <div lc-helper="shortcode" class="live-shortcode me-auto"> 
              <!--  lc_nav_menu -->
                <ul id="menu-menu-1" class="navbar-nav">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738"><a href="index.php?ctl=EliProcesos" class="nav-link ">Procedimientos</a></li>
                </ul> 
                <!-- /lc_nav_menu -->
            </div>
            <div class="ms-lg-auto d-flex flex-column flex-sm-row align-items-start">
    <a class="btn btn-outline-primary me-2 mb-2 mb-sm-0 w-auto" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">Iniciar Sesión</a>
    <a class="btn btn-outline-success me-2 w-auto" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrarse</a>
</div>


        </div>
    </div>
  </nav><!-- Modal Inicio Session -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sign up for free</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="index.php?ctl=EliLogin" class="needs-validation" novalidate method="POST" name="EliLogin">
            <div>
                <label for="usuarioRegistro" class="form-label d-block"> Correo </label>
                <input type="text" class="form-control" id="usuarioRegistro" name="loginEmail" pattern="^[a-zA-Z][a-zA-Z0-9\-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$" required>
                <div class="invalid-feedback">Correo no valido</div>
            </div>
            <div>
                <label for="usuarioContrasenya" class="form-label d-block"> Contraseña </label>
                <input type="password" class="form-control" id="usuarioContrasenya" name="loginContrasenya" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
                <div class="invalid-feedback">Contraseña no valida</div>
            </div>
            <a href="">Has olvidado tu contraseña?</a>
            <?php 
            if(!empty($params["mensaje"])){
                echo($params["mensaje"]);
            }
            ?>
            <div class="d-flex justify-content-center my-4">
                <button class="btn btn-primary" type="submit" name="bIniciarSesion">Iniciar Sesion</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Registro -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sign up for free</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="needs-validation" novalidate id="EliHeaderNotLogged" name="EliHeaderNotLogged" action="index.php?ctl=EliRegistro" method="POST">
                          <div>
                            <label for="nombre" class="form-label"> Nombre </label>
                            <input type="email" class="form-control" id="nombre" name="nombre" required>
                          </div>
                          <div>
                            <label for="usuarioCorreo" class="form-label"> Correo </label>
                            <input type="email" class="form-control" id="correoRegistro" name="correoRegistro" pattern="^[a-zA-Z][a-zA-Z0-9\-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$"  required>
                            <div class="invalid-feedback">Correo electronico no valido</div>
                            <!-- pattern="^[a-zA-Z][a-zA-Z0-9-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$" -->
                        </div>
                        <div>
                            <label for="usuarioCorreoRepite" class="form-label"> Repite correo </label>
                            <input type="email" class="form-control" id="correoRepite2" name="correoRegistroRepite" pattern="^[a-zA-Z][a-zA-Z0-9\-_]{1,29}@[a-z][a-z.]{1,15}.[a-z]{2,}$"  required>
                            <div class="invalid-feedback">Los correos deben de ser iguales</div>
                        </div>
                        <div>
                            <label for="usuarioContrasenya" class="form-label"> Contraseña </label>
                            <input type="password" class="form-control" id="usuarioContrasenya" name="usuarioContrasenya" aria-describedby="passwordHelpBlock" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
                            <div id="passwordHelpBlock" class="form-text">
                                Para su seguridad: Entre 8 y 16 caracteres y al menos una mayúscula, una minúscula, un número y un símbolo.
                            </div>
                            <!--  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$"-->
                        </div>
                        <div class="form-check mt-4">
                            <input type="checkbox" name="terminosPrivacidad" id="terminosPrivacidad" class="from-check-input" required>
                            <label for="terminosPrivacidad" class="form-check-label d-inline">Al hacer clic en "Registrarse", acepta los <a href="index.php?ctl=wuTermCond">Términos y condiciones</a> de EliesFlo.</label>
                            <div class="invalid-feedback"> Para poder continuar debes aceptar los terminos y condiciones</div>
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


  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>