<?php ob_start()

    //pasamos por $_SESSION['id_user'] index.php?ctl=wu_rellenarUsuario :id = id_user
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <section class="position-relative d-flex align-items-center min-vh-100 bg-light mb-5 py-lg-5 pt-5 overflow-hidden">

        <div class="container-fluid g-0 col-xl-7 offset-xl-5 position-absolute top-0">
            <img class="w-100" style="object-fit:cover;object-position:50% 50%;"
                src="https://images.unsplash.com/photo-1549490349-8643362247b5?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080"
                srcset="https://images.unsplash.com/photo-1549490349-8643362247b5?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080 1080w, https://images.unsplash.com/photo-1549490349-8643362247b5??crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=150 150w, https://images.unsplash.com/photo-1549490349-8643362247b5??crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=300 300w, https://images.unsplash.com/photo-1549490349-8643362247b5??crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=768 768w, https://images.unsplash.com/photo-1549490349-8643362247b5??crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1024 1024w"
                sizes="(max-width: 1080px) 100vw, 1080px" width="1080" height="" alt="Photo by Maria Orlova"
                lc-helper="image">
        </div>
        <div class="container position-relative zindex-5 py-5">
            <div class="row justify-content-md-start justify-content-center">
                <div class="col-sm-9 col-md-8 col-lg-5 mt-4 pt-2 text-md-start text-center">

                    <div class="card card-body mb-md-5 p-md-5 mb-4 shadow">
                    <h1>Rellenar datos usuario</h1>
                            <div class="d-inline-flex justify-content-center align-items-center d-flex">
                               

                                <form action="index.php?ctl=ElimodifyUser" method="POST" class="needs-validation"
                                    novalidate id="formularioRellenar" enctype="multipart/form-data">
                                    
                                    <div class="mb-3 pt-3 container justify-content-center align-items-center d-flex"
                                        id="divImg" onclick="filePicker()">
                                        <img id="imagen" src="./img/noImagen.png" alt="" width="250px" height="250px"
                                            class=" p-3 rounded-circle">
                                        <input type="file" class="d-none" name="fileImg" id="filePicker">
                                    </div>
                                    <div class="card-body d-flex flex-column pt-0">
                                        <div>
                                            <label for="tagsIniciales" class="form-label">Nombre y Apellidos: </label>
                                            <input type="text" class="form-control" id="usuarioNombre"
                                                name="usuarioNombre" placeholder="Nombre"
                                                aria-describedby="userHelpBlock" required>
                                            <div class="invalid-feedback">Revisa este campo, anda</div>
                                            <div id="userHelpBlock" class="form-text"></div>
                                        </div>
                                        <div class="d-flex justify-content-center my-4">
                                            <button class="btn btn-primary" type="submit"
                                                name="bRegistrar">Registarse!</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                    </div><!-- /lc-block -->

                </div><!-- /lc-block -->
            </div>
        </div>
        </div>
    </section>
</body>

<script type="text/javascript" src="./js/wu_rellenarUsuario.js"></script>