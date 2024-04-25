<!DOCTYPE html>
<html lang="en" data-bs-theme=dark>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        a {
            font-size: 17px;
            color: white;
        }

        .publicacion {
            position: relative;
            height: 20000px;
            background-color: #212529;
            margin: auto;
            width: 100%;
            left: 0;
        }

        @media(width>768px) {
            .publicacion {
                width: 66%;
                left: 30%;
                top: -500px;

            }
        }

        @media(width>992px) {
            .publicacion {
                width: 39%;
                top: -500px;
            }
        }


        .search {
            width: 50%;
        }

        li:hover {
            background-color: lightgreen;
        }

        .container-lg {

            padding-right: calc(var(--bs-gutter-x) * 0.001);
            padding-left: calc(var(--bs-gutter-x) * 0.001);

        }

        /* .dropdown-menu .dropUser:hover {
        background-color: lightgreen;
        } */
        hr {
            border: 1px solid lightgreen;

        }

        header {
            background-color: #212529;
        }

        .pegado {
            position: -webkit-sticky;
            position: sticky;
            top: 61px;
            z-index: 500;

        }

        .pegado2 {
            position: -webkit-sticky;
            position: sticky;
            z-index: 500;
            right: 0;
            top: 61px;
            height: 500px;
            max-height: 500px;
        }

        .card {
            background-color: #212529;
            padding: 3px;
        }

        .lugarMeme img {
            width: 100%;
        }

        .accordion-button:not(.collapsed) {
            background-color: #212529;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .comentarioNuevo {
            width: 100%;
        }

        .comentario{
            width: 100%;
        }

        .showComments {
            overflow-y: scroll;
            max-height: 300px;
        }

        .card {
            background-color: #212529;
        }

        #menuUser {
            z-index: 9999 !important;
        }

        .scroll {
            overflow: scroll;
            display: inline-block;
        }

        .scroll-width-thin {
            scrollbar-width: thin;
        }

        #sugerenciasBusqueda {
            position: absolute;
            display: none;
        }

        #sugerenciasBusqueda a {
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        #sugerenciasBusqueda a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <!--Header movil-->
    <header class="border-bottom container-fluid d-md-none d-flex justify-content-between align-items-center sticky-top"
        data-bs-theme=dark>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop"
                aria-controls="offcanvasWithBackdrop">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
            <a href="index.php?ctl=wuRo"><img src="./img/Wuba_Logo.png" alt="" srcset="" width="60" height="60"></a>
        </div>
        <div>
            <img src="<?= $_SESSION["img"]?>" alt="" srcset="" data-bs-toggle="dropdown" aria-expanded="false" width="50"
                style="cursor: pointer;">
            <ul class="dropdown-menu">
                <li class="dropUser"><a class="dropdown-item"
                        href="index.php?ctl=wuPrivada&id=<?= $_SESSION['idUsuario'] ?>">Ver Perfil</a></li>
                <li class="dropUser"><span class="dropdown-item" style="cursor: pointer;" href="#"
                        data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Añadir publicacion</span></li>

                <li class="dropUser"><a class="dropdown-item" href="index.php?ctl=wuCerrarSesion">Cerrar sesion</a></li>
                <?php if($_SESSION["nivel_usuario"] == 2) echo "<li class='dropUser'><a class='dropdown-item' href='index.php?ctl=wuAdministrador'>Administrar</a></li>"?>
            </ul>
        </div>
    </header>

    <!--Header Grande-->
    <header class="border-bottom container-fluid d-none d-md-block sticky-top">
        <div class=" d-flex flex-wrap justify-content-between align-items-center">
            <a href="index.php?ctl=wuRo" class="d-flex align-items-center me-lg-auto link-body-emphasis text-decoration-none">
                <img src="./img/Wuba_Logo.png" alt="" srcset="" width="60" height="60">
                <span class="fs-4 ms-4">WuBa

                </span>

            </a>

            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto search" role="search" action="index.php"
                method="POST">
                <input type="search" class="form-control"
                    placeholder="Escribe # o @ primero dependiendo que quieres buscar" aria-label="Search"
                    id="buscador">
                <div id="sugerenciasBusqueda" class="bg-dark"></div>
            </form>



            <div class="text-end justify-content-center align-items-center d-flex flex-shrink-1">
                <!--Nombre de usuario-->
                <span id="nombreUsuarioLogeado">
                    <?= $_SESSION["nombreUsuario"] ?>
                </span>
                <!--Imagen usuario-->
                <div class="flex-shrink-0 dropdown " id="menuUser">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $_SESSION['img'] ?>" alt="" width="50" height="50" class="" id="imgHeader">
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" id="verUsuario" href="index.php?ctl=wuPrivada&id=<?= $_SESSION['idUsuario'] ?>">Ver
                                perfil</a></li>
                        <li class="dropUser"><span class="dropdown-item" style="cursor: pointer;" href="#"
                                data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Añadir publicacion</span>
                        </li>
                        <li><a class="dropdown-item" href="index.php?ctl=wuCerrarSesion">Cerrar sesion</a></li>
                        <?php if($_SESSION["nivel_usuario"] == 2) echo "<li class='dropUser'><a class='dropdown-item' href='index.php?ctl=wuAdministrador'>Administrar</a></li>"?>

                    </ul>
                </div>
            </div>
        </div>
    </header>


<?php
pintaSelect(Config::$tablasAdmin, "tablas");
?>

<table class="table" id="tabla">

</table>
<script type="text/javascript" src="./js/wu_administrador.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>


