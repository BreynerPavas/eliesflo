<?php

class Controller
{
    public function wuInicio(){
        session_unset();
        session_destroy();
        require __DIR__."/../../web/templates/wu_login.php";
    }
    public function EliInicio(){
        require __DIR__."/../../web/templates/EliHome.php";
    }
    public function EliRegistro(){
        {
            $params = array(
                'mensaje' =>'',
                'correoRegistro' => '',
                'correoRegistroRepite' => '',
                'usuarioContrasenya' => '',
            );
            $errores = array();
            if (isset($_POST['bRegistrar'])) {
                $correoRegistro = recoge('correoRegistro');
                $correoRegistroRepite = recoge('correoRegistroRepite');  
                $usuarioContrasenya = recoge('usuarioContrasenya');
                $nombre = recoge('nombre');
    
                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral o la clase Validacion         
                cEmail($correoRegistro, "correo", $errores);
                cEmail($correoRegistroRepite, "correoRepite", $errores);
                cPasword($usuarioContrasenya, "contrasenya", $errores);
    
                $m = new Memeteca();
                if($m -> verificarEmailExistente($correoRegistro)){
                    $errores['mensaje'] = 'Esta direccion de correo ya esta en uso';
                }
                if($correoRegistro != $correoRegistroRepite){
                    $errores['mensaje'] = 'Asegurate de que los correos sean iguales';
                }
                print_r( $errores);
                if (empty($errores)) {
                    // Si no ha habido problema creo modelo y hago inserción     
                    try {
                        $m = new Memeteca();
                        $token = uniqid();
                        if ($m->insertarUsuario($correoRegistro, encriptar($usuarioContrasenya),$token,$nombre)) {
                            //enviar token por correo
                            //enviarToken($correoRegistro,$token);
                            $params['mensaje'] = 'Se ha registrado el usuario';
                            header('Location: index.php?ctl=EliInicio');
                        } else {
                            $params = array(
                                'correoRegistro' => $correoRegistro,
                                'usuarioContrasenya' => $usuarioContrasenya
                            );
    
                            $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                        }
                    } catch (Exception $e) {
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                        header('Location: index.php?ctl=EliInicio');
                    } catch (Error $e) {
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                        header('Location: index.php?ctl=EliInicio');
                    }
                } else {
                    $params = array(
                        'correoRegistro' => $correoRegistro,
                        'usuarioContrasenya' => $usuarioContrasenya,
                        'mensaje' => "ha habido un error"
                    );
                }
            }
    
    
            require __DIR__ . '/../../web/templates/EliHome.php';
        }
    }
    public function EliAddProcess(){
        require __DIR__."/../../web/templates/EliAddProcess.php";
    }
    public function EliLogin(){
        {
            try {
                $params = array(
                    'usuarioRegistro' => '',
                    'usuarioContrasenya' => '',
                    'mensaje' => ''
                );
                
                if (isset($_POST['bIniciarSesion'])) { 
                    $loginEmail = recoge('loginEmail');
                    $loginContrasenya = recoge('loginContrasenya');
    
                    // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral   
                    if (cEmail($loginEmail, "usuarioRegistro", $params)) {
                        // Si no ha habido problema creo modelo y hago consulta                    
                        $m = new Memeteca();
                        if ($usuario = $m->consultarUsuario($loginEmail)) {
                            // Compruebo si el password es correcto
                            if (comprobarhash($loginContrasenya, $usuario[0]['password'])) {  
                                // Obtenemos el resto de datos
                                
                                $_SESSION['idUsuario'] = $usuario[0]['id'];
                                $_SESSION['nombreUsuario'] = $usuario[0]['name'];
                                $_SESSION['nivel_usuario'] = $usuario[0]['level'];
                                header('Location: index.php?ctl=EliInicio');
                            }else{
                                $params = array(
                                    'usuarioRegistro' => $loginEmail,
                                    'usuarioContrasenya' => $loginContrasenya
                                );
                                $params['mensaje'] = 'No se ha podido iniciar sesión.';
                            }
                        } else {
                            $params = array(
                                'usuarioRegistro' => $loginEmail,
                                'usuarioContrasenya' => $loginContrasenya
                            );
                            $params['mensaje'] = 'No se ha podido iniciar sesión.';
                        }
                    } else {
                        $params = array(
                            'usuarioRegistro' => $loginEmail,
                            'usuarioContrasenya' => $loginContrasenya
                        );
                        $params['mensaje'] = 'Hay datos que no son correctos.';
                    }
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                header('Location: index.php?ctl=wuError');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                header('Location: index.php?ctl=wuError');
            }
            require __DIR__ . '/../../web/templates/EliHome.php';
        }
    }
    
    public function editProcedimiento(){
        $m = new Memeteca();
        $procedimiento = $m->obtenerProcedimiento($_GET["id"]);
        
        require __DIR__."/../../web/templates/EliEditProcedimiento.php";
    }
    public function wuLogin()
    {
        try {
            $params = array(
                'usuarioRegistro' => '',
                'usuarioContrasenya' => '',
                'mensaje' => ''
            );
            
            if ($_SESSION['nivel_usuario'] > 0) {
                header("location:index.php?ctl=wuInicio");
            }
            if (isset($_POST['bIniciarSesion'])) { 
                $loginEmail = recoge('loginEmail');
                $loginContrasenya = recoge('loginContrasenya');

                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral   
                if (cEmail($loginEmail, "usuarioRegistro", $params)) {
                    // Si no ha habido problema creo modelo y hago consulta                    
                    $m = new Memeteca();
                    if ($usuario = $m->consultarUsuario($loginEmail)) {
                        // Compruebo si el password es correcto
                        if (comprobarhash($loginContrasenya, $usuario[0]['password'])) {  
                            // Obtenemos el resto de datos
                            
                            $_SESSION['idUsuario'] = $usuario[0]['ID'];
                            $_SESSION['nombreUsuario'] = $usuario[0]['name'];
                            $_SESSION['nivel_usuario'] = $usuario[0]['level'];
                            $_SESSION['img'] = $usuario[0]['profilePicture'];
                            header('Location: index.php?ctl=wuRo');
                        }else{
                            $params = array(
                                'usuarioRegistro' => $loginEmail,
                                'usuarioContrasenya' => $loginContrasenya
                            );
                            $params['mensaje'] = 'No se ha podido iniciar sesión. Revisa tu cabeza.';
                        }
                    } else {
                        $params = array(
                            'usuarioRegistro' => $loginEmail,
                            'usuarioContrasenya' => $loginContrasenya
                        );
                        $params['mensaje'] = 'No se ha podido iniciar sesión. Revisa tu cabeza.';
                    }
                } else {
                    $params = array(
                        'usuarioRegistro' => $loginEmail,
                        'usuarioContrasenya' => $loginContrasenya
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa lo que escribes.';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=wuError');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=wuError');
        }
        require __DIR__ . '/../../web/templates/wu_login.php';
    }
    public function EliSubirComentario(){
        print_r($_REQUEST);
        $comentario = recoge("comment");
        $idPrecedimiento = $_REQUEST["id"];
        echo("<br>");
        print_r($_SESSION);
        $m = new Memeteca;
        if($m->anyadirComentario($comentario,$_SESSION["idUsuario"],$idPrecedimiento)){
            header('Location: index.php?ctl=EliProcedimientoEspecifico&id='.$idPrecedimiento);
        }
    }
    public function editarProcedimiento(){
        print_r($_REQUEST);
        $m = new Memeteca();
        $id=recoge("id");
        $nombre=recoge("nombreProcedimiento");
        $precio=recoge("precio");
        $descripcion=recoge("descripcion");
        $objetivo=recoge("objetivo");

        if($m->editarProcedimiento($id,$nombre,$precio,$descripcion,$objetivo)){
            header("location:index.php?ctl=EliProcedimientoEspecifico&id=".$id);
        }else{
            header("location:index.php?ctl=editProcedimiento&id=".$id);
        }
    }
    public function EliProcedimientoEspecifico(){
        
        
        $m = new Memeteca(); 
        
        $procedimiento = $m->obtenerProcedimiento($_GET["id"]);
        //print_r($procedimiento);


        require __DIR__."/../../web/templates/EliprocedimientoEspecifico.php";
    }
    public function EliReservarCita(){
        require __DIR__."/../../web/templates/EliReservarCita.php";
    }
    public function enviarReserva(){
        print_r($_POST);
        
    }
    public function subirReservacion(){
        print_r($_POST);
    }
    public function EliCerrarSesion(){
        session_unset();
        session_destroy();
        header('Location: index.php?ctl=EliInicio');
    }
    public function EliProcesos(){
        require __DIR__."/../../web/templates/EliProcesos.php";
    }
    public function mostrarTipos(){

        
        require __DIR__."/../../web/templates/EliMostrarTipos.php";
    }

    public function EliSubirProcess(){
        if($_SESSION["nivel_usuario"]<2){
            header('Location: index.php?ctl=EliInicio');
        }
        $errores = [];
        $name = recoge("name");
        $tipo = recoge("tipo");
        $price = recoge("price");
        $descripcion = recoge("descripcion");
        $goal = recoge("objetivo");
        cNum($price,"precio",$errores);
        cDescrUser($descripcion,"descripcion",$errores);
        cDescrUser($goal,"objetivo",$errores);
        if(empty($errores)){
            $img1 = cFile("foto1",$errores,Config::$extensionesValidas,Config::$rutaImagenes,Config::$maxFichero, false);
            if(empty($errores)){
                $img2 = cFile("foto2",$errores,Config::$extensionesValidas,Config::$rutaImagenes,Config::$maxFichero, false);
                if(empty($errores)){
                    $m = new Memeteca(); //ahora a subirlo a la BBDD
                    if($m-> subirProcedimiento($name,$tipo,$price,$descripcion,$goal,$img1,$img2)){
                        $id=$m->obtenerUltimoID();
                        header('Location: index.php?ctl=EliProcedimientoEspecifico&id='.$id);
                    }else{
                        header('Location: index.php?ctl=EliAddProcess');
                    }
                    
                    
                }else{
                    $mensaje = "error intentelo de nuevo";
                    header('Location: index.php?ctl=EliInicio');
                }
            }else{
                $mensaje = "error intentelo de nuevo";
                header('Location: index.php?ctl=EliInicio');
            }
        }else{
            $mensaje = "error intentelo de nuevo";
            header('Location: index.php?ctl=EliInicio');
        }


    }
    

    public function wuModificarUsuario(){
            if (isset($_POST['bModificar'])) {
                $errores = []; 
                $nombre = recoge("usuarioNombre");
                $descripcion = recoge("descripcionUsuario");

                cUser($nombre,"nombre",$errores);
                cDescrUser($descripcion,"descripcion",$errores);
                if(empty($errores)){
                    $img = cFile("fileImg",$errores,Config::$extensionesValidas,Config::$rutaImagenes,Config::$maxFichero, false);
                    if(empty($errores)){
                        $m = new Memeteca();
                        if($nombre!=""){
                            if(!($m->modificarNombreUsuario($_SESSION['idUsuario'],$nombre))){
                                header('Location: index.php?ctl=wuError');
                            }else{
                                $_SESSION['nombreUsuario'] = $nombre;
                            }
                        }
                        if($descripcion!=""){
                            if(!($m->modificarDescUsuario($_SESSION['idUsuario'],$descripcion))){
                                header('Location: index.php?ctl=wuError');
                            }
                        }
                        if(($img != $_SESSION['img'])){
                            if(!($m->modificarImgUsuario($_SESSION['idUsuario'],$img))){
                                header('Location: index.php?ctl=wuError');
                            }else{
                                $_SESSION['img'] = $img;
                            }
                        }
                        header('Location: index.php?ctl=wuPrivada&id='.$_SESSION['idUsuario']);
                    }
                }

            }require __DIR__."/../../web/templates/wu_modificarUsuario.php";
    }
    
    public function wuError(){
        require __DIR__ . '/../../web/templates/wuError.php';
    } 

    public function debug(){
        require __DIR__ . '/../../web/templates/debug.php';

    }
    public function wu_layout_dentro(){
        require __DIR__ . '/../../web/templates/wu_layout_dentro.php';

    }
    
    public function wuTermCond(){
        require __DIR__ . '/../../web/templates/wu_terminosCondiciones.php';
    }
    public function wuSubirComentario(){
        $errores = [];
        $comentario = recoge("comentarioNuevo");
        $id_post = recoge("id_post");
        cDescrUser($comentario,"comentario",$errores);
        if(empty($errores)){
            $m = new Memeteca();
            if($m->subirComentarioJSON($comentario,$_SESSION["idUsuario"],$id_post)){
                echo($_SERVER['HTTP_REFERER']);
                if (strpos($_SERVER['HTTP_REFERER'], "wuRo") !== false) {
                    header("location:index.php?ctl=wuRo#p".$id_post);
                } else if(strpos($_SERVER['HTTP_REFERER'], "wuPrivada") !== false){
                    header('location:index.php?ctl=wuPrivada&id='.$_SESSION["idUsuario"].'#p'.$id_post);
                }else{
                    header("location:".$_SERVER['HTTP_REFERER']);
                }
                //
            }
        }
        //
    }


    

    public function wuRo(){
        require __DIR__ . '/../../web/templates/wuRo.php';
    }
 
    public function wuRegistro()
    {
        if ($_SESSION['nivel_usuario'] > 0) {  
            header("location:index.php?ctl=wu_login.php");
        }


        $params = array(
            'mensaje' =>'',
            'correoRegistro' => '',
            'correoRegistroRepite' => '',
            'usuarioContrasenya' => '',
        );
        $errores = array();
        if (isset($_POST['bRegistrar'])) {
            $correoRegistro = recoge('correoRegistro');
            $correoRegistroRepite = recoge('correoRegistroRepite');  
            $usuarioContrasenya = recoge('usuarioContrasenya');

            // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral o la clase Validacion         
            cEmail($correoRegistro, "correo", $errores);
            cEmail($correoRegistroRepite, "correoRepite", $errores);
            cPasword($usuarioContrasenya, "contrasenya", $errores);

            $m = new Memeteca();
            if($m -> verificarEmailExistente($correoRegistro)){
                $errores['mensaje'] = 'Ya tienes cuenta aqui flipao.';
                $fallo = 2;
            }
            if($correoRegistro != $correoRegistroRepite){
                $errores['mensaje'] = 'No coinciden los correos, mira a ver si tienes doble personalidad.';
                $fallo = 1;
            }
            
            if (empty($errores)) {
                // Si no ha habido problema creo modelo y hago inserción     
                try {
                    $m = new Memeteca();
                    $token = uniqid();
                    if ($m->insertarUsuario($correoRegistro, encriptar($usuarioContrasenya),$token)) {
                        //enviar token por correo
                        enviarToken($correoRegistro,$token);
                        header('Location: index.php?ctl=wuLogin');
                    } else {
                        $params = array(
                            'correoRegistro' => $correoRegistro,
                            'usuarioContrasenya' => $usuarioContrasenya
                        );

                        $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                    }
                } catch (Exception $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header('Location: index.php?ctl=wuError');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                    header('Location: index.php?ctl=wuError');
                }
            } else {
                $params = array(
                    'correoRegistro' => $correoRegistro,
                    'usuarioContrasenya' => $usuarioContrasenya,
                    'mensaje' => ""
                );
                if($fallo == 1){
                    $params["mensaje"] = "No coinciden los correos, mira a ver si tienes doble personalidad";
                }else{
                    $params["mensaje"] = 'Ya tienes cuenta aqui flipao.';
                }
            }
        }


        require __DIR__ . '/../../web/templates/wu_formRegistro.php';
    }
    

    public function wuSubirPublicacion(){

        $params = array(
            "fileImg" => "",
            "tagsPublicacion" => "",
            "descripcionPublicacion" =>""
        );
        $errores = array();
        if(isset($_POST["bPublicar"])){
                       
            $tags = recoge("tagsPublicacion");
            $descripcion = recoge("descripcionPublicacion");

            $tags = cTags($tags,"tagsPublicacion",$errores);
            cTexto($descripcion,"descripcionPublicacion",$errores,75,0,true);
            if(empty($errores)){
                $fileimg = cFile("fileImg",$errores,Config::$extensionesValidas,Config::$rutaImagenes,Config::$maxFichero, true);
            }
            if(empty($errores)){
                $m = new Memeteca();
                $m->subirPost($descripcion,$fileimg,$_SESSION['idUsuario'],$tags);
                header("location:index.php?ctl=wuPrivada&id=".$_SESSION["idUsuario"]);

            }
        }
    }

    public function wuRellenar(){
        $errores = array();
        if (isset($_POST['bRegistrar'])) {

            $usuarioNombre = recoge("usuarioNombre");
            $descripcion = recoge("descripcionUsuario");
            $tags = recoge("recibeTags"); // no funciona
            
            cUser($usuarioNombre,"usuario",$errores);
            cDescrUser($descripcion,"descripcion",$errores);
            $arrayTags = explode("#",$tags);
            array_shift($arrayTags);
            
            $memeteca = new Memeteca();
            $consultaTags = $memeteca->obtenerTagsJSON();
            $tagsDisponibles = [];

            
            foreach ($consultaTags as $key => $value) {
                $tagsDisponibles[] = $value["tag"];
            }
            
            foreach ($arrayTags as $key => $value) {
                cSelect(substr($value,1),"tags",$tagsDisponibles,$errores);
            }
                  
            if (empty($errores)) {
                $fileimg = cFile("fileImg",$errores,Config::$extensionesValidas,Config::$rutaImagenes,Config::$maxFichero, false);
                if(empty($errores)){
                    try {
                        //vamos a obtener el id_user
                        $m = new Memeteca();
                            if($m -> rellenarUsuario($usuarioNombre,$descripcion,$_SESSION["idUsuario"],$fileimg)){
                                 foreach ($arrayTags as $key => $value) {
                                    $idTag = $m -> obtenerTagFromText($value);
                                    if(!($m -> rellenarUser_Tag($_SESSION["idUsuario"],$idTag["ID"]))){
                                        $params['mensaje'] = 'No se ha podido enlazar el tag con el usuario. Revisa el link de activacion.';
                                        header('Location: index.php?ctl=wuError');
                                    } else {
                                       header('Location: index.php?ctl=wuLogin');
                                    }
                                }
                                
                            } //falta la imagen 
                            else {
                            $params['mensaje'] = 'No se ha podido rellenar el usuario. Revisa el link de activacion.';
                        }
                    } catch (Exception $e) {
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                        header('Location: index.php?ctl=wuError');
                    } catch (Error $e) {
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                        header('Location: index.php?ctl=wuError');
                    }
                }     
                
                
            } else {
                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }else{
            $token = recoge("token");
            $m = new Memeteca();
            $id_user = $m -> obtenerIdFromToken($token);
            $_SESSION["idUsuario"] = $id_user["id_user"];

        }


        require __DIR__ . '/../../web/templates/wu_rellenarUsuario.php';
    }

    public function wuPostPrivada(){
        require __DIR__ . '../../web/templates/wu_privada.php';
    }

    public function wuCambiarPwd(){

        $errores = array();
        $m = new Memeteca();

    
        if(isset($_POST["bCambiarPwd"])){
            $contrasenya = recoge("usuarioContrasenya");
            $contrasenyaRepite = recoge("usuarioContrasenyaRepite");
            cPasword($contrasenya, "contrasenya", $errores);
            cPasword($contrasenyaRepite, "contrasenya", $errores);
            if($contrasenya != $contrasenyaRepite){
                $errores['mensaje'] = 'No coinciden las contraseñas, mira a ver si tienes doble personalidad.';
            }
            if(empty($errores)){
            if($m->actualizarPwd($_SESSION["id_temporal"],encriptar($contrasenya))){
                echo $contrasenya;
                echo $contrasenyaRepite;
                echo encriptar($contrasenya);
                header("location:index.php?ctl=wuLogin");
            }else{
                header("location:index.php?ctl=wuError");

            }
        }
            
        }else{
            $token = recoge("token");
            $id = $m -> obtenerIdFromToken($token)["id_user"];
            $_SESSION["id_temporal"] = $id;
        }
            require __DIR__ . '/../../web/templates/wu_cambiarPwd.php';
    }

    public function wuConfirmarCorreo(){
        $errores = array();

            if (isset($_POST['bConfirmarCorreo'])) { 
                $email = recoge('usuarioCorreo');
                try {

                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral   
                if (cEmail($email, "usuarioRegistro", $errores)) {
                    // Si no ha habido problema creo modelo y hago consulta                    
                    $m = new Memeteca();
                    if ($id = $m->obtenerIdFromCorreo($email)) {
                        $token = uniqid();
                        $m -> crearToken($token,$id[0]);
                        enviarCambioPwd($email,$token);
                    } else {
                    $params = array(
                        'usuarioRegistro' => $email,
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa lo que escribes.';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=wuError');
        }
    }
        require __DIR__ . '/../../web/templates/wu_confirmarCorreo.php';
    
    }

    public function wuAdministrador() {
        require __DIR__ . '/../../web/templates/wu_administrador.php';
    }
}


