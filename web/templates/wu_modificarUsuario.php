<?php ob_start();

//pasamos por $_SESSION['id_user'] index.php?ctl=wu_rellenarUsuario :id = id_user

?>



<div class="d-flex vh-100 justify-content-center align-items-center">
    <div class="card" style="width: 23rem;">
        <form id="modificarUsuario" action="index.php?ctl=wuModificarUsuario" name="wuModificarUsuario" method="POST" class="needs-validation" novalidate id="formularioRellenar" enctype="multipart/form-data">
            <div class="mb-3 pt-3 container justify-content-center align-items-center d-flex" id="divImg" onclick="filePicker2()">
                <img id="imagen2" src="<?= $_SESSION["img"] ?>" alt="" width="250px" height="250px" class=" p-3 rounded-circle">
                <input type="file" class="d-none" name="fileImg" id="filePicker2">
            </div>
            <div class="card-body d-flex flex-column pt-0">
                <div>
                    <input type="text" class="form-control" id="usuarioNombre" name="usuarioNombre" placeholder="Nombre macabro lerele lerele" aria-describedby="userHelpBlock" required>
                    <div class="invalid-feedback">Revisa este campo, anda</div>
                    <div id="userHelpBlock" class="form-text"> (PONER EL FORMATO) </div>
                </div>
                <div>
                    <textarea name="descripcionUsuario" id="descripcionUsuario" class="form-control mt-3" cols="10" rows="2"></textarea>
                </div>
                <div class="d-flex justify-content-center my-4">
                    <button class="btn btn-primary" type="submit" name="bModificar">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="./js/wu_modificarUsuario.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php $contenido = ob_get_clean() ?>

<?php include 'wu_layout_dentro.php' ?>