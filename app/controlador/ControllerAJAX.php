<?php

class ControllerAJAX
{
    function subirComments(){
        $comentario = $_REQUEST["comentario"];
        $idPost = $_REQUEST["idPost"];
        $m = new Memeteca();
        $consulta = ($m->subirComentarioJSON($comentario,$_SESSION["idUsuario"],$idPost));
        echo $consulta;
    }
    function obtenerTags(){
        $m = new Memeteca();
        $consulta = ($m->obtenerTagsJSON());
        $consulta = json_encode($consulta);
        header('Content-type: application/json');
        echo $consulta;
    }
    //Método que se encarga de cargar el menu que corresponda según el tipo de usuario

    function obtenerTagsSeguidos(){
        $m = new Memeteca();
        $consulta = $m -> obtenerTagsSeguidosJSON($_SESSION["idUsuario"]);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
        
    }
    function procedimientoReservas(){
        $m = new Memeteca();
        $consulta = $m -> obtenerProcediemientos();
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }
    function obtenerCommentsPost(){
        $id = $_REQUEST["idPost"];
        $m = new Memeteca();
        $consulta = $m -> obtenerCommentsPostJSON($id);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }
        function obtenerPostUsuario(){
        $id = $_REQUEST["id"];
        $m = new Memeteca();
        $consulta = $m -> obtenerPostUsuarioJSON($id);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }
    function obtenerPostTag(){
        $id = $_REQUEST["id_cuenta"];
        $m = new Memeteca();
        $consulta = $m -> obtenerPostTagJSON($id);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }
    function obtenerTagsPost(){
        $idPost = $_REQUEST["idPost"];
        $m = new Memeteca();
        $consulta = $m -> obtenerTagsPostJSON($idPost);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }

    // function obtenerLikesPost(){
    //     $idPost=$_GET["idPost"];
    //     $m = new Memeteca();
    //     $consulta = $m -> obtenerLikesPostJSON($_SESSION["idPost"]);
    //     echo $consulta;
    // }

    function obtenerUsuariosSeguidos(){
        $m = new Memeteca();
        $consulta = $m -> obtenerUsuariosSeguidosJSON($_SESSION['idUsuario']);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }
    
    function seguirCuenta($id_cuenta){ // este valor deberia ser dado por enlace ctl=wuPrivada&id_cuenta=n
        $id_user = $_SESSION["id_user"];
        $m = new Memeteca();
        //$consulta = $m -> seguirCuenta(); 
    }
    function obtenerDatosUsuario(){
        $id_cuenta = $_REQUEST["id_cuenta"];
        $m = new Memeteca();
        $consulta = $m -> obtenerDatosUsuarioJSON($id_cuenta);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;

    }

    function obtenerTablas(){
        $m = new Memeteca();
        $consulta = $m -> obtenerTablas($_GET["tabla"]);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }

    function obtenerSeguidos(){
        $id_cuenta=$_REQUEST["id_cuenta"];
        $m = new Memeteca();
        $consulta = $m -> obtenerSeguidos($id_cuenta);
        echo $consulta;
    }
    function obtenerSeguidores(){
        $id_cuenta=$_REQUEST["id_cuenta"];
        $m = new Memeteca();
        $consulta = $m -> obtenerSeguidores($id_cuenta);
        echo $consulta;

    }
    
    function desactivarFila() {
        $idRow = $_GET["id"]; 
        $tabla = $_GET["tabla"];
        $m = new Memeteca();
        $m->desactivarFila($tabla, $idRow);
    }
    function activarFila() {
        $idRow = $_GET["id"]; 
        $tabla = $_GET["tabla"];
        $m = new Memeteca();
        $m->activarFila($tabla, $idRow);
    }
    function addSeguir(){
        $idMostrado = $_GET["idMostrado"];
        $m = new Memeteca();
        $consulta = $m -> addSeguir($idMostrado);
    
    }

    function eliminarSeguir(){
        $idMostrado = $_GET["idMostrado"];
        $m = new Memeteca();
        $consulta = $m -> eliminarSeguir($idMostrado);
    }

    /*function obtenerPostPrivada(){
        $m = new Memeteca();
        $_SESSION['idUsuario']=7;
        $_SESSION['nombreUsuario']="AJsdfljk";
        $_SESSION['img']="asdfgasd";
        $consulta = $m -> consultarPostJSON();
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }*/

    public function obtenerTagsPostPrivada(){
        if(empty($errores)){
            $_SESSION['idUsuario']=7;
            $id=$_SESSION['idUsuario'];
            $m = new Memeteca();
            $m->consultarTagPostPrivada($id);
        }
    }

    public function obtenerSugerenciaUsers(){
        $sug = $_GET["sug"];
        $m = new Memeteca();
        $consulta = $m -> obtenerSugerenciaUsers($sug);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;

    }


    public function obtenerSugerenciasTags(){
        $sug = $_GET["sug"];
        $m = new Memeteca();
        $consulta = $m -> obtenerSugerenciasTags($sug);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;

    }
    
    public function obtenerTagPorId(){
        $id = $_GET["id"];
        $m = new Memeteca();
        $consulta = $m -> obtenerTagPorId($id);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;

    }

    
    function addSeguirTag(){
        $idMostrado = $_GET["idMostrado"];
        $m = new Memeteca();
        $m -> addSeguirTag($idMostrado);
    
    }

    function eliminarSeguirTag(){
        $idMostrado = $_GET["idMostrado"];
        $m = new Memeteca();
        $m -> eliminarSeguirTag($idMostrado);
    }

    function obtenerLikesPost(){
        $id = $_GET["idPost"];
        $m = new Memeteca();
        $consulta = $m -> obtenerLikesPost($id);
        $consulta = json_encode($consulta);
        header("Content-type: application/json");
        echo $consulta;
    }

    function addLike(){
        $id = $_GET["idPost"];
        $m = new Memeteca();
        $m -> addLike($id);
    
    }

    function quitarLike(){
        $id = $_GET["idPost"];
        $m = new Memeteca();
        $m -> quitarLike($id);
    
    }
}
