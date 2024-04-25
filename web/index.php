<?php

require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/libs/bSeguridad.php';
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classMemeteca.php';
require_once __DIR__ . '/../app/controlador/Controller.php';
require_once __DIR__ . '/../app/controlador/ControllerAJAX.php';
require_once __DIR__ . '/../app/libs/PHPMailer.php';

session_start(); // Se inicia la sesion
//Este logueado o no el usuario, siempre tendra un nivel_usuario

if (!isset($_SESSION['nivel_usuario'])) {
    $_SESSION['nivel_usuario'] = 0;
}


/**
 * Enrutamiento
 * Le añadimos el nivel mínimo que tiene que tener el usuario para ejecutar la acción
 **/
$map = array(
    "EliInicio" => array("controller"=>"Controller","action"=>"EliInicio","nivel_usuario"=>0),
    'EliRegistro' => array('controller' => 'Controller', 'action' => 'EliRegistro', 'nivel_usuario' => 0),
    'EliLogin' => array('controller' => 'Controller', 'action' => 'EliLogin', 'nivel_usuario' => 0),
    'EliAddProcess' => array('controller' => 'Controller', 'action' => 'EliAddProcess', 'nivel_usuario' => 2),
    'EliSubirProcess' => array('controller' => 'Controller', 'action' => 'EliSubirProcess', 'nivel_usuario' => 2),
    'EliProcedimientoEspecifico' => array('controller' => 'Controller', 'action' => 'EliProcedimientoEspecifico', 'nivel_usuario' => 0),
    'EliCerrarSesion' => array('controller' => 'Controller', 'action' => 'EliCerrarSesion', 'nivel_usuario' => 0),
    'EliProcesos' => array('controller' => 'Controller', 'action' => 'EliProcesos', 'nivel_usuario' => 0),
    'mostrarTipos' => array('controller' => 'Controller', 'action' => 'mostrarTipos', 'nivel_usuario' => 0),

    "wuInicio" => array("controller"=>"Controller","action"=>"wuInicio","nivel_usuario"=>0),
    'wuRegistro' => array('controller' => 'Controller', 'action' => 'wuRegistro', 'nivel_usuario' => 0),
    'wuLogin' => array('controller' => 'Controller', 'action' => 'wuLogin', 'nivel_usuario' => 0),
    'wuRo' => array('controller' => 'Controller', 'action' => 'wuRo', 'nivel_usuario' => 1),
    'wuPrivada' => array('controller' => 'Controller', 'action' => 'wuPrivada', 'nivel_usuario' => 1),
    'wuError' => array('controller' => 'Controller', 'action' => 'wuError', 'nivel_usuario' => 1),
    "wuSubirPublicacion" => array("controller" => "Controller", "action" => "wuSubirPublicacion", "nivel_usuario"=>1),
    "wuModificarUsuario" => array("controller" => "Controller", "action" => "wuModificarUsuario", "nivel_usuario"=>1),
    "wu_layout_dentro" =>array("controller"=>"Controller","action"=>"wu_layout_dentro","nivel_usuario"=>1),// BORRAR 
    'debug' => array('controller' => 'Controller', 'action' => 'debug', 'nivel_usuario' => 1),
    'wuRellenar' => array('controller' => 'Controller', 'action' => 'wuRellenar', 'nivel_usuario' => 0),
    'obtenerTags'=> array('controller' => 'ControllerAJAX', 'action' => 'obtenerTags', 'nivel_usuario' => 0),
    'obtenerSeguidos'=> array('controller' => 'ControllerAJAX', 'action' => 'obtenerSeguidos', 'nivel_usuario' => 1),
    'obtenerSeguidores'=> array('controller' => 'ControllerAJAX', 'action' => 'obtenerSeguidores', 'nivel_usuario' => 1),
    "obtenerTagsSeguidos" => array("controller" => "ControllerAJAX", "action" => "obtenerTagsSeguidos", "nivel_usuario" => 1),
    "obtenerUsuariosSeguidos" => array("controller" => "ControllerAJAX", "action" => "obtenerUsuariosSeguidos", "nivel_usuario" => 1),
    "obtenerTagsPost" => array("controller" => "ControllerAJAX", "action" => "obtenerTagsPost", "nivel_usuario" => 1),
    "obtenerPostUsuario" => array("controller" => "ControllerAJAX", "action" => "obtenerPostUsuario", "nivel_usuario" => 1),
    "obtenerDatosUsuario" => array("controller" => "ControllerAJAX", "action" => "obtenerDatosUsuario", "nivel_usuario" => 1),
    "wuAdministrador" => array('controller' => "Controller", "action" => "wuAdministrador", "nivel_usuario" => 2),
    "obtenerTablas" => array('controller' => "ControllerAJAX", "action" => "obtenerTablas", "nivel_usuario" => 2),
    "obtenerPostPrivada" => array("controller" => "ControllerAJAX", "action" => "obtenerPostPrivada", "nivel_usuario" => 1),
    'obtenerTagsPostPrivada'=> array('controller'=>'ControllerAJAX','action'=>'obtenerTagsPostPrivada','nivel_usuario'=>1),
    'obtenerCommentsPost'=> array('controller'=>'ControllerAJAX','action'=>'obtenerCommentsPost','nivel_usuario'=>1),
    "wuCambiarPwd" => array("controller" => "Controller", "action" => "wuCambiarPwd","nivel_usuario" => 0),
    "wuSubirComentario" => array("controller" => "Controller", "action" => "wuSubirComentario","nivel_usuario" => 1),
    "wuConfirmarCorreo" => array("controller"=>"Controller", "action" => "wuConfirmarCorreo", "nivel_usuario" => 1),
    "addSeguir" => array("controller"=>"ControllerAJAX","action"=>"addSeguir","nivel_usuario"=>1),
    "eliminarSeguir" => array("controller" => "ControllerAJAX", "action" => "eliminarSeguir", "nivel_usuario" => 1),
    "desactivarFila" => array('controller' => "ControllerAJAX", "action" => "desactivarFila", "nivel_usuario" => 2),
    "activarFila" => array('controller' => "ControllerAJAX", "action" => "activarFila", "nivel_usuario" => 2),
    "obtenerPostTag" => array('controller' => "ControllerAJAX", "action" => "obtenerPostTag", "nivel_usuario" => 1),
    "subirComments" => array('controller' => "ControllerAJAX", "action" => "subirComments", "nivel_usuario" => 1),
    "wuCerrarSesion"=> array('controller' => "Controller", "action" => "wuInicio", "nivel_usuario" => 1),
    "obtenerSugerenciaUsers" => array('controller' => "ControllerAJAX", "action" => "obtenerSugerenciaUsers", "nivel_usuario" => 1),
    "obtenerSugerenciasTags" => array('controller' => "ControllerAJAX", "action" => "obtenerSugerenciasTags", "nivel_usuario" => 1),
    "wuTags"=> array('controller' => "Controller", "action" => "wuTags", "nivel_usuario" => 1),
    "obtenerTagPorId"=> array('controller' => "ControllerAJAX", "action" => "obtenerTagPorId", "nivel_usuario" => 1),
    "addSeguirTag"=> array('controller' => "ControllerAJAX", "action" => "addSeguirTag", "nivel_usuario" => 1),
    "eliminarSeguirTag"=> array('controller' => "ControllerAJAX", "action" => "eliminarSeguirTag", "nivel_usuario" => 1),
    "wuTermCond"=> array('controller' => "Controller", "action" => "wuTermCond", "nivel_usuario" => 0),
    "obtenerLikesPost" => array("controller" => "ControllerAJAX", "action" => "obtenerLikesPost", "nivel_usuario" =>1),
    "addLike" => array("controller" => "ControllerAJAX", "action" => "addLike", "nivel_usuario" =>1),
    "quitarLike" => array("controller" => "ControllerAJAX", "action" => "quitarLike", "nivel_usuario" =>1)
     


);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] . '</p></body></html>';
        exit;
        /*
             * También podríamos poner $ruta=error; y mostraríamos una pantalla de error
             */
    }
} else {
    $ruta = 'EliInicio';
}
$controlador = $map[$ruta];

if (method_exists($controlador['controller'], $controlador['action'])) {
    if ($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']) {
        call_user_func(array(
            new $controlador['controller'],
            $controlador['action']
        ));
    }else{
        call_user_func(array(
            new $controlador['controller'],
            'EliInicio'
        )); 
    }
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
}
