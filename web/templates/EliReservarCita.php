<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        @media (max-width: 767px) {
            .embed-responsive-item {
                height: 1280px;
            }
        }

        @media (min-width: 768px) {
            .embed-responsive-item {
                height: 800px;
            }
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION["nivel_usuario"])) {
        if ($_SESSION["nivel_usuario"] == 2) {
            require __DIR__ . "/../../web/templates/EliHeaderAdmin.php";
        } else {
            if ($_SESSION["nivel_usuario"] == 1) {
                require __DIR__ . "/../../web/templates/EliHeaderLogged.php";
            } else {
                require __DIR__ . "/../../web/templates/EliHeaderNotLogged.php";
            }
        }
    } else {
        require __DIR__ . "/../../web/templates/EliHeaderNotLogged.php";
    }

    if (isset($_GET["id"])) { ?>


<iframe class="embed-responsive-item"
                    src="https://calendar.google.com/calendar/u/0/appointments/schedules/AcZssZ1rrvgAez49HtyldQKdpkIwoMPcsE-0QY27ambJvFM9cjpxZGVpNeKAZzTzmFc_iQPKAeL0oowF"
                    style="border: 0; width: 100%;" frameborder="0" scrolling="no"></iframe>
            </div>

            < <?php

    }else{?>
                <form action="index.php?ctl=enviarReserva" method="POST" id="formulario">
                    <div class="container d-flex mt-5">
                        <select id="selectServicios" name="procedimiento"
                            class="w-50"><!-- Opciones se cargarán dinámicamente con JavaScript --></select>
                            <input type="button" id="bEnviar" value="Agendar" class="mx-3 rounded">
                    </div>
                </form>
                <div class="container embed-responsive embed-responsive-16by9 d-none" id="calendario">
                <iframe class="embed-responsive-item"
                    src="https://calendar.google.com/calendar/u/0/appointments/schedules/AcZssZ1rrvgAez49HtyldQKdpkIwoMPcsE-0QY27ambJvFM9cjpxZGVpNeKAZzTzmFc_iQPKAeL0oowF"
                    style="border: 0; width: 100%;" frameborder="0" scrolling="no"></iframe>
            </div>
    </div>

<?php } ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript" src="./js/EliReservarCita.js"></script>

</body>

</html>