

<?php ob_start() 

//pasamos por $_SESSION['id_user'] index.php?ctl=wu_rellenarUsuario :id = id_user
?>
    
    
    <div class="container-fluid bg-primary">
        <div class="d-flex vh-100 justify-content-center align-items-center">
            <div class="card" style="width: 23rem;">
                <form action="index.php?ctl=wuRellenar" method="POST" class="needs-validation" novalidate id="formularioRellenar" enctype="multipart/form-data">
                <div class="mb-3 pt-3 container justify-content-center align-items-center d-flex"id="divImg" onclick="filePicker()">
                    <img id="imagen" src="./img/noImagen.png" alt="" width="250px"
                        height="250px" class=" p-3 rounded-circle">
                    <input type="file" class="d-none" name="fileImg" id="filePicker">
                </div>
                <div class="card-body d-flex flex-column pt-0">
                    <div>
                        <input type="text" class="form-control" id="usuarioNombre" name="usuarioNombre"
                            placeholder="Nombre macabro lerele lerele" aria-describedby="userHelpBlock" required>
                        <div class="invalid-feedback">Revisa este campo, anda</div>
                        <div id="userHelpBlock" class="form-text"></div>
                    </div>
                    <div>
                        <textarea name="descripcionUsuario" id="descripcionUsuario" class="form-control mt-3" cols="10" rows="2"></textarea>
                    </div>
                    <div>
                        <label for="tagsIniciales" class="form-label">Selecciona algunos tags para empezar: </label>
                        <select name="tagsIniciales" id="tagsIniciales" class="w-100">
                          
                        
                            
                        </select>
                        <input type="text" name="recibeTags" id="recibeTags" class="d-none">
                        <div class="bg-secondary w-100 d-flex  flex-wrap mt-2" id="cajaTags">

                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <button class="btn btn-primary" type="submit" name="bRegistrar">Registarse!</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./js/wu_rellenarUsuario.js"></script>

       

    </script>

<?php $contenido = ob_get_clean() ?>

<?php include 'wu_layout_fuera.php' ?>