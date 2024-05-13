<?php

class Config {
    public static $mvc_bd_hostname = "localhost";
    public static $mvc_bd_nombre = "eliesflo";
    public static $mvc_bd_usuario = "root";
    public static $mvc_bd_clave = "";
    public static $mvc_vis_css = "estilo.css";
    public static $vista = __DIR__ . '/../templates/inicio.php';
    public static $menu = __DIR__ . '/../templates/menuInvitado.php';

    public static $extensionesValidas = ["jpg","jpeg","png","webp"];
    public static $rutaImagenes = "./img";
    public static $maxFichero = 3000000;
    public static $tablasAdmin = ["users", "posts", "comments"];
    
}
?>