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
            --bs-card-border-color: lightgreen;
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
        .btn-check:checked + .btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check) + .btn:active {
        color: var(--bs-btn-active-color);
        background-color: var(--bs-btn-active-bg);
        border-color: lightgreen;
        }
        .text-bg-info {
        color: #000 !important;
        background-color: #90ee90!important;
        border-radius: 20px 20px 0px 0px!important;
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
            <img src="<?= $_SESSION["img"]?>" class="rounded-5" alt="" srcset="" data-bs-toggle="dropdown" aria-expanded="false" width="50"
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
                        <img src="<?= $_SESSION['img'] ?>" alt="" width="50" height="50" class="rounded-5" id="imgHeader">
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


    <!--Modal Post-->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <form action="index.php?ctl=wuSubirPublicacion" enctype="multipart/form-data" method="POST" id="formPost">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Vamos a Subir tu MOMAZO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-gray">
                        <!--Imagen de la publicacion-->
                        <div class="mb-3 container justify-content-center align-items-center d-flex"
                            onclick="filePicker()">
                            <img id="imagen" src="./img/noImagen.png" style="cursor: pointer;" alt=""
                                srcset="" width="250px" height="250px" class="img-thumbnail p-3">
                            <input type="file" class="d-none" name="fileImg" id="filePicker">
                        </div>
                        <!--informacion publicacion-->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">#</span>
                            <input id="tags" name="tagsPublicacion" type="text" class="form-control"
                                aria-label="Username" aria-describedby="basic-addon1" maxlength="20"
                                pattern="[a-zA-Z0-9]{1,20}">

                        </div>
                        <div class="container">
                            <p id="tags_Post" class="d-flex flex-wrap"></p>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea"
                                name="descripcionPublicacion"></textarea>
                            <label for="floatingTextarea">Descripción</label>
                        </div>
                    </div>

                    <div class="modal-footer container">
                        <input type="submit" disabled name="bPublicar" id="enviarPost" class="btn btn-primary vw-100"
                            data-bs-target="#exampleModalToggle" data-bs-toggle="modal" value="publicar">
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!--Modal Especifica-->
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-gray" id="cuerpoModal">

                </div>

                <div class="modal-footer container">
                    <input type="button" class="btn btn-primary vw-100" data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal" value="Cerrar">
                </div>
            </div>
        </div>

    </div>


    <!--Main-->
    <div class="container-lg d-flex pegado justify-content-between ">
        <div class="col pe-3 d-none col-lg-3 d-lg-block  ps-4">
            <ul class="list-group list-group-flush lista listaTags">

            </ul>
        </div>

        <div class="col d-none d-md-block col-md-3 pegado2 pe-4">
            <ul class="list-group list-group-flush lista listaUsuarios">

            </ul>
            <!--Solo cuando es la pantalla pequeña-->
            <hr class="d-none d-md-block d-lg-none">
            <ul class="list-group list-group-flush lista d-none d-md-block d-lg-none listaTags">

            </ul>
        </div>
    </div>

    <!--Publicacion-->
    <div class=" ms-md-1 ms-lg-0 d-flex publicacion m-auto">
        <div class="container" style="z-index:1019">
            <!--Aqui iran los posts-->
            <?php echo ($contenido) ?>

        </div>

    </div>

    <div class="offcanvas offcanvas-start sideBrey " tabindex="-1" id="offcanvasWithBackdrop"
        aria-labelledby="offcanvasWithBackdropLabel">
        <div class="offcanvas-header">
            <a href="index.php?ctl=wuRo"><img src="./img/Wuba_Logo.png" alt="" srcset="" width="60" height="60"></a>
            <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Sigue navegando</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <div>
                <ul class="list-group list-group-flush lista pe-2 listaUsuarios">
                </ul>
                <br>
                <div class="container">
                    <hr>
                </div>
                <br>

                <ul class="list-group list-group-flush lista px-2 listaTags">

                </ul>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script type="text/javascript" src="./js/wu_layout_dentro.js"></script>

</body>

</html>