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
            height: 100vh;
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

        /* li:hover {
            background-color: lightgreen;
        } */

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
            z-index: 9999;
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

        .comentario svg {
            flex-shrink: 0;
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
    </style>
</head>

<body>
    <!--Header movil-->
    <?php
    include("EliHeaderNotLogged.php");
    ?>

    <!--Header Grande-->



  


    <!--Main-->

            <?php echo ($contenido) ?>

        </div>

    </div>

  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/wu_layout_dentro.js"></script>

</body>

</html>