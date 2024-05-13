<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliHome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!--HEader -->
    <!-- header Logeado-->
    <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark sticky-top" style="">
        <div class="container">
            <a class="navbar-brand" href="index.php?ctl=EliInicio"> <img
                    src="./img/eliesfloLogo.png" width="50"
                    class="d-inline-block align-top img-fluid" alt=""> <span editable="inline">EliEsFLo</span> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar1"
                aria-controls="myNavbar1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar1">
                <div lc-helper="shortcode" class="live-shortcode me-auto ms-2 my-2">
                    <!--  lc_nav_menu -->
                    <ul id="menu-menu-1" class="navbar-nav">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-32739"><a
                                href="index.php?ctl=EliReservarCita" class="nav-link ">Reserva tu cita</a>
                        </li>
                        <li
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                            <a href="index.php?ctl=EliProcesos" class="nav-link ">Procedimientos</a>
                        </li>
                        <li
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                            <a href="index.php?ctl=EliAddProcess" class="nav-link ">Agregar Procedimientos</a>
                        </li>
                    </ul>
                    <!-- /lc_nav_menu -->
                </div>
                <div class="lc-block ms-2 my-2">
                    <a class="navbar-text" href="https://wa.me/011234567890?text=I'm%20interested%20in%20your%20offer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="2em" height="2em"
                            lc-helper="svg-icon" fill="currentColor" class="me-2">
                            <path
                                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                            </path>
                        </svg>
                        Escribenos Ahora!
                    </a>
                </div>
                <div class="lc-block me-2 ms-2 my-2">
                    <div class="ms-lg-auto">
                        <a class="btn btn-outline-danger me-2" href="index.php?ctl=EliCerrarSesion">Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>