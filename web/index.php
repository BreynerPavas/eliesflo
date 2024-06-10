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
    'ElirellenarUsuario' => array('controller' => 'Controller', 'action' => 'ElirellenarUsuario', 'nivel_usuario' => 0),
    //'ElimodifyUser' => array('controller' => 'Controller', 'action' => 'ElimodifyUser', 'nivel_usuario' => 0),
    'EliSubirComentario' => array('controller' => 'Controller', 'action' => 'EliSubirComentario', 'nivel_usuario' => 1),
    'EliReservarCita' => array('controller' => 'Controller', 'action' => 'EliReservarCita', 'nivel_usuario' => 1),
    'procedimientoReservas' => array('controller' => 'ControllerAJAX', 'action' => 'procedimientoReservas', 'nivel_usuario' => 1),
    'enviarReserva' => array('controller' => 'Controller', 'action' => 'enviarReserva', 'nivel_usuario' => 1),
    'subirReservacion' => array('controller' => 'Controller', 'action' => 'subirReservacion', 'nivel_usuario' => 1),
    'wuTermCond' => array('controller' => 'Controller', 'action' => 'wuTermCond', 'nivel_usuario' => 0),
    'editProcedimiento' => array('controller' => 'Controller', 'action' => 'editProcedimiento', 'nivel_usuario' => 2),
    'editarProcedimiento' => array('controller' => 'Controller', 'action' => 'editarProcedimiento', 'nivel_usuario' => 2),

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
