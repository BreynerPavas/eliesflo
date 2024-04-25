<?php

class Memeteca extends Modelo
{
    public function obtenerUltimoID(){
        return $this->conexion->lastInsertId();
    }
    public function subirProcedimiento($name,$tipo,$price,$descripcion,$goal,$img1,$img2){
        try {
            $consulta = "INSERT INTO eliesflo.procedimiento (`name`, `price`,`description`, `goal`,`picture1`, `picture2`,`id_tipoProcedimiento`) VALUES (:name, :price,:description,:goal,:picture1,:picture2,:id_tipoProcedimiento)";
            $result = $this->conexion->prepare($consulta);
            $result->bindValue(':name', $name);
            $result->bindValue(':price', $price);
            $result->bindValue(':description', $descripcion);
            $result->bindValue(':goal', $goal);
            $result->bindValue(':picture1', $img1);
            $result->bindValue(':picture2', $img1);
            $result->bindValue(':id_tipoProcedimiento', $tipo);
            return $result->execute();

        } catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
    }

    public function obtenerTagPorId($id){
        try{
            $consulta = "SELECT main_tags.tag FROM wuba.main_tags WHERE main_tags.ID = :id "; 
            $result = $this -> conexion -> prepare($consulta);
            $result -> bindParam(":id",$id);
            $result -> execute();
            return $result -> fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
    }

    public function obtenerSugerenciaUsers($sug){
        try{
            $consulta = "SELECT users.ID, users.name FROM wuba.users WHERE users.name LIKE :sug AND users.active =1 "; 
            $result = $this -> conexion -> prepare($consulta);
            $sugParam = '%'.$sug.'%';
            $result -> bindParam(":sug",$sugParam);
            $result -> execute();
            return $result -> fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
        
    }
    public function obtenerSugerenciasTags($sug){
        try{
            $consulta = "SELECT main_tags.ID, main_tags.tag FROM wuba.main_tags WHERE main_tags.tag LIKE :sug";
            $result = $this -> conexion -> prepare($consulta);
            $sugParam = '%'.$sug.'%';
            $result -> bindParam(":sug",$sugParam);
            $result -> execute();
            return $result -> fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
        
    }
    public function pintaTipoProcedimiento(){
        try{
            $consulta = "SELECT tipoprocedimiento.id, tipoprocedimiento.tipo  FROM eliesflo.tipoprocedimiento";
            $result = $this -> conexion -> prepare($consulta);
            $result -> execute();

            $tipos =  $result -> fetchAll(PDO::FETCH_ASSOC);
            echo('<div class="form-row mt-5">
            <div class="form-holder">
            <label for="tipo">Tipo Procedimiento:</label>
            <select name="tipo" id="tipo">');
            foreach ($tipos as $tipo) {
                echo('<option value="'.$tipo["id"].'">'.$tipo["tipo"].'</option>');
            }
            echo('</select>
			</div>');

        }catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
        
    }
    
    
    // Consulta modificada para IniciarSesion
    public function consultarUsuario($usuarioRegistro)
    {
        $consulta = "SELECT * FROM eliesflo.users WHERE email = :usuarioRegistro AND active=0";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':usuarioRegistro', $usuarioRegistro);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function rellenarUser_Tag($ID_User, $ID_Tag)
    {
        try {
            $consulta = "INSERT INTO wuba.user_maintag (`ID_User`, `ID_Tag`) VALUES (:ID_User, :ID_Tag)";
            $result = $this->conexion->prepare($consulta);
            $result->bindValue(':ID_User', $ID_User);
            $result->bindValue(':ID_Tag', $ID_Tag);

            return ($result->execute());
        } catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }

    }
    public function subirComentarioJSON($description,$id_user,$idPost){
        try {
            $consulta = "INSERT INTO wuba.comments (`description`, `id_user`) VALUES (:description, :id_user)";
            $result = $this->conexion->prepare($consulta);
            $result->bindValue(':description', $description);
            $result->bindValue(':id_user', $id_user);

            if($result->execute()){
                return $this->subirPost_Comment($idPost,$this->conexion->lastInsertId());
            }else{
                return false;
            }


        } catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
    }
    public function subirPost_Comment($ID_Post,$ID_Comment){
        try {
            $consulta = "INSERT INTO wuba.post_comment (`ID_Post`, `ID_Comment`) VALUES (:ID_Post, :ID_Comment)";
            $result = $this->conexion->prepare($consulta);
            $result->bindValue(':ID_Post', $ID_Post);
            $result->bindValue(':ID_Comment', $ID_Comment);

            return ($result->execute());
        } catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
    }


    public function rellenarUsuario($name, $description, $id_user, $profilePicture)
    { //falta img
        if ($profilePicture == null || $profilePicture == "") {
            $profilePicture2 = "./img/noImagen.png";
        }
        $consulta = 'UPDATE users SET name = :name , description = :description, active = :active, profilePicture = :profilePicture WHERE ID = :id_user';
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':name', $name);
        $result->bindValue(':description', $description);
        $result->bindValue(':active', 1);
        $result->bindValue(':id_user', $id_user);
        $result->bindValue(':profilePicture', $profilePicture);
        $result->execute();
        return ($result);
    }
    public function obtenerCommentsPostJSON($id){
        $consulta = "SELECT 
        c.ID AS comment_id,
        c.description AS comment_description,
        c.id_user AS user_id,
        u.name AS user_name,
        u.profilePicture AS user_profile_picture
    FROM 
        comments c
    JOIN 
        post_comment pc ON c.ID = pc.ID_Comment
    JOIN 
        users u ON c.id_user = u.ID
    WHERE 
        pc.ID_Post = :id_publicacion
    AND 
        c.active = 1
    ORDER BY c.ID DESC;
    ";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':id_publicacion', $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function obtenerDatosUsuarioJSON($id){

        $consulta = "SELECT ID, name, profilePicture, description  FROM wuba.users WHERE ID = :id";

        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':id', $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTagsJSON()
    {
        $consulta = "SELECT * FROM wuba.main_tags";
        $result = $this->conexion->prepare($consulta);
        $result->execute();

        $tags = $result->fetchAll(PDO::FETCH_ASSOC);
        return ($tags);
    }

    public function obtenerTagsPostJSON($idPost){
        $consulta = "SELECT ID, tag FROM wuba.main_tags 
        INNER JOIN post_maintag ON wuba.main_tags.ID = post_maintag.ID_MainTag 
        WHERE post_maintag.ID_Post = :idPost";

        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':idPost', $idPost);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerLikesPostJSON($id){
        $consulta = "SELECT COUNT(*) FROM wuba.post_likes
        WHERE post_likes.ID_Post = :idPost";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':idPost', $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerIdFromToken($token){
        $consulta = "SELECT id_user FROM wuba.tokens WHERE token = :token";

        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':token', $token);
        $result->execute();

        $id_user = $result->fetch(PDO::FETCH_ASSOC);
        $this->eliminarToken($token);
        return ($id_user);
    }

    public function eliminarToken($token){
        $consulta = "DELETE FROM tokens WHERE tokens.token = :token";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':token', $token);
        $result->execute();
    }
    
    public function obtenerPostUsuarioJSON($id)
    {
        $consulta = "SELECT * FROM wuba.posts WHERE id_user = :id AND active = 1 ORDER BY id DESC";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':id', $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerPostTagJSON($id)
    {
        $consulta = "SELECT p.ID AS post_id, p.description AS post_description, p.img AS post_img, p.id_user AS user_id, u.name AS user_name, u.profilePicture AS user_profile_picture FROM posts p JOIN post_maintag pm ON p.ID = pm.ID_Post JOIN main_tags mt ON pm.ID_MainTag = mt.ID JOIN users u ON p.id_user = u.ID WHERE mt.ID = :id; ";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':id', $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarPwd($id,$pwd){
        try{
        $consulta = 'UPDATE wuba.users SET users.password=:pwd WHERE ID = :id_user';
        $result = $this -> conexion -> prepare($consulta);
        $result -> bindParam(":pwd",$pwd);
        $result -> bindParam(":id_user",$id);
        $result -> execute();
        return $result;
        }catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }


    }
    

    public function obtenerIdFromCorreo($correo){
        try{
            $consulta = "SELECT users.ID FROM wuba.users WHERE eMail = :email";
            $result = $this -> conexion -> prepare($consulta);
            $result -> bindValue("email",$correo);
            $result -> execute();
            return $result -> fetch(PDO::FETCH_NUM);
        }catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
    }

    public function crearToken($token, $id)
    {
        try {
            $consulta2 = "INSERT INTO wuba.tokens (`token`, `id_user`) VALUES (:token, :id_user)";
            $result2 = $this->conexion->prepare($consulta2);
            $result2->bindValue(':token', $token);
            $result2->bindValue(':id_user', $id);
            $result2->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
    }

    /*
    public function activarUsuario($token){
        try{
            $consulta = "UPDATE wuba.users SET active = :active WHERE ID = (SELECT id_user FROM wuba.tokens WHERE token = :token";
            $result = $this -> conexion -> prepare($consulta);
            $result -> bindValue(":active","1");
            $result -> bindValue(":token",$token); 
            $result -> execute();
        }catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
        }
    }
    */

    public function obtenerTags()
    {
        $consulta = "SELECT * FROM wuba.main_tags";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return ($result->fetch(PDO::FETCH_ASSOC));
    }
    public function modificarNombreUsuario($idUsuario,$name){
        $consulta = 'UPDATE users SET name = :name WHERE ID = :id_user';
        $result = $this->conexion->prepare($consulta);

        $result->bindValue(':id_user', $idUsuario);
        $result->bindValue(':name', $name);
        $result->execute();
        return ($result);
    }
    public function modificarDescUsuario($idUsuario,$desc){
        $consulta = 'UPDATE users SET description = :description WHERE ID = :id_user';
        $result = $this->conexion->prepare($consulta);

        $result->bindValue(':id_user', $idUsuario);
        $result->bindValue(':description', $desc);
        $result->execute();
        return ($result);
    }
    public function modificarImgUsuario($idUsuario,$img){
        $consulta = 'UPDATE users SET profilePicture = :profilePicture WHERE ID = :id_user';
        $result = $this->conexion->prepare($consulta);

        $result->bindValue(':id_user', $idUsuario);
        $result->bindValue(':profilePicture', $img);
        $result->execute();
        return ($result);
    }

    public function obtenerTagFromText($tag)
    {
        $consulta = "SELECT ID FROM wuba.main_tags WHERE tag = :tag";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':tag', $tag);
        $result->execute();
        return ($result->fetch(PDO::FETCH_ASSOC));
    }


    public function obtenerTagsSeguidosJSON($idUsuario)
    {
        $consulta = "SELECT tag, ID FROM wuba.main_tags WHERE ID IN (SELECT ID_Tag FROM wuba.user_maintag WHERE ID_User = :id)";
        //Cambiar el 14 por la variable de sesión del usuario
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':id', $idUsuario);
        $result->execute();
        return ($result->fetchAll(PDO::FETCH_NUM));
    }
    public function obtenerProcedimiento($id){
        $consulta = 'SELECT 
        P.id,
        P.name AS nombre_procedimiento,
        P.price AS precio,
        P.description AS descripcion,
        P.goal AS objetivo,
        P.picture1 AS imagen1,
        P.picture2 AS imagen2,
        TP.tipo AS tipo_procedimiento
    FROM 
        Procedimiento AS P
    INNER JOIN 
        TipoProcedimiento AS TP ON P.id_tipoProcedimiento = TP.id
    WHERE 
        P.id = :id';
    $result = $this -> conexion -> prepare($consulta);
    $result->bindValue(':id', $id);
    $result->execute();
    return ($result->fetchAll(PDO::FETCH_ASSOC));

    }
    public function pintaProcesos(){
        $consulta = 'SELECT * FROM eliesflo.tipoprocedimiento';
        $result = $this -> conexion -> prepare($consulta);
        $result->execute();
        $tipos = ($result->fetchAll(PDO::FETCH_ASSOC));
        for($i = 0;$i< count($tipos);$i++){
            echo('
            <div class="col-lg-3 col-6 g-3 position-relative">
            <a href="index.php?ctl=mostrarTipos&id='.$tipos[$i]["id"].'&name='.$tipos[$i]["tipo"].'">
			<div class="lc-block position-absolute bottom-0 start-0 w-100 text-center ">
				<div editable="rich">
					<h3 class="glass_background mx-2 text-black">'.$tipos[$i]["tipo"].'</h3>
				</div>
			</div>
			<!-- /lc-block -->
			<div class="lc-block">
				<img class="img-fluid hover" src="'.$tipos[$i]["img"].'" alt="" loading="lazy">
			</div>
            </a>
			<!-- /lc-block -->
		    </div>
            ');
        }
    }
    public function pintaProcedimientosEspecificos($id){
        $consulta = 'SELECT * FROM eliesflo.procedimiento WHERE id_tipoProcedimiento = :id';
        $result = $this -> conexion -> prepare($consulta);
        $result->bindValue(':id', $id);
        $result->execute();
        $procedimientos = ($result->fetchAll(PDO::FETCH_ASSOC));
        for($i = 0;$i< count($procedimientos);$i++){
            echo(
                '<div class="col">
                <div class="d-grid d-sm-flex gap-3 gap-xl-4">
                    <div class="d-flex lc-block d-sm-block flex-shrink-0 col-sm-3"><a href="index.php?ctl=EliProcedimientoEspecifico&id='.$procedimientos[$i]["id"].'"><img class="rounded shadow w-100 food_images img-fluid" src="'.$procedimientos[$i]["picture1"].'" alt="Photo by Farhad Ibrahimzade" width="96" height="96"></a></div>
                    <div class="lc-block w-100">
                        <div class="d-flex gap-2 align-items-baseline">
                            <div>
                                <h3 class="h5 fw-bold"><a style="text-decoration: none; color: inherit;" href="index.php?ctl=EliProcedimientoEspecifico&id='.$procedimientos[$i]["id"].'">'.$procedimientos[$i]["name"].'</a></h3>
                            </div>
                            <div class="flex-grow-1 border_restaurant opacity-25"></div>
                            <div>
    
                                <strong class="h5">'.$procedimientos[$i]["price"].'€</strong>
    
                            </div>
                        </div>
                        <div class="lc-block opacity-50">
    
                            '.$procedimientos[$i]["description"].'
    
                        </div>
                    </div>
                </div>
            </div>'
            );
        }
    }


    public function obtenerUsuariosSeguidosJSON($idUsuario){
        $consulta = "SELECT users.ID,users.name, users.profilePicture FROM wuba.users WHERE active= 1 AND ID IN (SELECT ID_Following FROM wuba.user_following WHERE ID_User = :id); "; //Cambiar el 1 por la variable de sesión del usuario
        $result = $this -> conexion -> prepare($consulta);
        $result->bindValue(':id', $idUsuario);
        $result->execute();
        return ($result->fetchAll(PDO::FETCH_ASSOC));

    }



    public function obtenerSeguidos($idCuenta)
    {
        $consulta = "SELECT COUNT(*) AS total_following
        FROM user_following
        JOIN users ON user_following.ID_Following = users.ID
        WHERE user_following.ID_User = :idCuenta AND users.active = 1;
        ";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':idCuenta', $idCuenta);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC)['total_following'];
    }
    public function obtenerSeguidores($idCuenta)
    {
        $consulta = "SELECT COUNT(*) AS total_follower
        FROM user_follower
        JOIN users ON user_follower.ID_Follower = users.ID
        WHERE user_follower.ID_User = :idCuenta AND users.active = 1;";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':idCuenta', $idCuenta);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC)['total_follower'];
    }
    public function insertarUsuario($correoRegistro, $usuarioContrasenya, $token,$nombre)
    {
        $consulta = "INSERT INTO eliesflo.users (`email`, `password`,`active`,`level`,`name`) VALUES (:email, :password, :active, :level, :name)";
        $result = $this->conexion->prepare($consulta);
        $result->bindValue(':name', $nombre);
        $result->bindValue(':email', $correoRegistro);
        $result->bindValue(':password', $usuarioContrasenya);
        $result->bindValue(':active', 0);
        $result->bindValue(':level', 1);
        $result->execute();

        if ($result) {
            $id_user = $this->conexion->lastInsertId();
            $consulta2 = "INSERT INTO eliesflo.tokens (`token`, `id_user`) VALUES (:token, :id_user)";
            $result2 = $this->conexion->prepare($consulta2);
            $result2->bindValue(':token', $token);
            $result2->bindValue(':id_user', $id_user);
            $result2->execute();
            return $result2;
        }
        return $result;

    }

    public function subirPost($description,$img,$id_user,$tags){//la variable $id_user vendra de $_SESSION["ID"]
        try{
        $consulta = "INSERT INTO wuba.posts (`description`, `img`,`id_user`) VALUES (:description, :img ,:id_user)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':description', $description);
        $result->bindParam(':img', $img);
        $result->bindParam(':id_user',$id_user);
        $result->execute();// aqui si es true pasar a agregar tags en wuba.main_tags / agregar en wuba.post_maintag
        if($result){
            $this -> agregarTags($tags,$this->conexion->lastInsertId());
        }else{
            return $result;
        }
    }catch (PDOException $e) {
        error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
    }
    }

    public function agregarTags($arrTags, $id_post)
    {
        //Primero checkeo si existe el tag. Si existe, añado la relación, si no existe, añado el tag a su tabla y hago la relación.
        foreach ($arrTags as $tag) {
            try {
                $consulta = "SELECT ID FROM wuba.main_tags WHERE tag=:tag";
                $result = $this->conexion->prepare($consulta);
                $result->bindParam(':tag', $tag);
                $result->execute();
                $aux = $result->fetchAll(PDO::FETCH_ASSOC);
                if (count($aux) === 1) {
                    $id_tag = $aux[0]["ID"];
                } else {

                    $consulta = "INSERT INTO wuba.main_tags (tag) VALUES (:tag)";
                    $result = $this->conexion->prepare($consulta);
                    $result->bindParam(":tag", $tag);
                    $result->execute();
                    $id_tag = $this->conexion->lastInsertId();
                    echo "2";

                }

                echo "4";
                $consulta = "INSERT INTO wuba.post_maintag (ID_Post,ID_MainTag) VALUES (:id_post,:id_tag)";
                $result = $this->conexion->prepare($consulta);
                $result->bindParam(":id_post", $id_post);
                $result->bindParam(":id_tag", $id_tag);
                $result->execute();

            } catch (PDOException $e) {
                error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../app/log/logBD.txt");
            }
        }
        return $result;
    }
    public function consultarPost($id)
    {
        $consulta = "SELECT * FROM wuba.posts WHERE id_user=:id ";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_user', $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /*    //CODIGO DE CHATGPT DE CONSULTAR POST
        function obtenerPostsUsuario($idUsuario) {
        global $conn;

        // Consulta SQL
        $sql = "SELECT * FROM posts WHERE id_user = $idUsuario";

        // Ejecutar la consulta
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Crear un array para almacenar los posts
            $posts = array();

            // Obtener los datos de cada post
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }

            // Devolver el array de posts
            return $posts;
        } else {
            // Si no hay posts, devolver un array vacío
            return array();
        }
    } */

    // MODIFICR ESTA COONSULTA

    public function modificarUsuario($nombre, $apellido, $nombreUsuario, $contrasenya)
    {
        $consulta = "INSERT INTO wuba.users (nombre, apellido, nombreUsuario, contrasenya) VALUES (:nombre, :apellido, :nombreUsuario, :contrasenya)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':apellido', $apellido);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->bindParam(':contrasenya', $contrasenya);
        $result->execute();
        return $result;
    }
    

    public function obtenerTablas($tabla)
    {
        $consulta = "SELECT * FROM wuba.$tabla";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function desactivarFila($tabla, $id)
    {
            try {
                $consulta = "UPDATE $tabla SET active = 0 WHERE ID = :id";
                $result = $this->conexion->prepare($consulta);
                $result->bindParam(':id', $id);
                $result->execute();
            } catch (PDOException $e) {
                error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../logBD.txt");
            }
       
        }
    
        public function activarFila($tabla, $id)
        {
                try {
                    $consulta = "UPDATE $tabla SET active = 1 WHERE ID = :id";
                    $result = $this->conexion->prepare($consulta);
                    $result->bindParam(':id', $id);
                    $result->execute();
                } catch (PDOException $e) {
                    error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../logBD.txt");
                }
           
            }
    
            
    public function addSeguir($idMostrado)
    {
        $consulta = "INSERT INTO wuba.user_following (ID_User, ID_Following) VALUES (:idUser, :idFollowing)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $_SESSION["idUsuario"]);
        $result->bindParam(':idFollowing', $idMostrado);
        $result->execute();

        $consulta = "INSERT INTO wuba.user_follower (ID_User, ID_Follower) VALUES (:idUser, :idFollower)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $idMostrado);
        $result->bindParam(':idFollower', $_SESSION["idUsuario"]);
        $result->execute();

    }

    public function eliminarSeguir($idMostrado)
    {
        $consulta = "DELETE FROM  wuba.user_following WHERE ID_User=:idUser AND ID_Following=:idFollowing";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $_SESSION["idUsuario"]);
        $result->bindParam(':idFollowing', $idMostrado);
        $result->execute();

        $consulta = "DELETE FROM  wuba.user_follower WHERE ID_User=:idUser AND ID_Follower=:idFollower";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $idMostrado);
        $result->bindParam(':idFollower', $_SESSION["idUsuario"]);
        $result->execute();
    }

    public function addSeguirTag($id){
        $consulta = "INSERT INTO wuba.user_maintag (ID_User, ID_Tag) VALUES (:idUser, :idTag)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $_SESSION["idUsuario"]);
        $result->bindParam(':idTag', $id);
        $result->execute();
    }

    public function eliminarSeguirTag($id){
        $consulta = "DELETE FROM  wuba.user_maintag WHERE ID_User=:idUser AND ID_Tag=:idTag";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $_SESSION["idUsuario"]);
        $result->bindParam(':idTag', $id);
        $result->execute();
    }
    public function verificarEmailExistente($correoRegistro){
    // Preparar la consulta SQL para buscar el email en la base de datos
    $consulta = "SELECT COUNT(*) as count FROM eliesflo.users WHERE email = :email";
    $result = $this->conexion->prepare($consulta);
    $result->bindValue(':email', $correoRegistro);
    $result->execute();

    // Obtener el resultado de la consulta
    $fila = $result->fetch(PDO::FETCH_ASSOC);

    // Si la cantidad de filas con el email es mayor que 0, significa que el email existe
    return ($fila['count'] > 0);
    }

    public function obtenerLikesPost($id){
        try{
            $consulta = "SELECT * FROM wuba.post_likes WHERE ID_Post = :idPost";
            $result = $this -> conexion -> prepare($consulta);
            $result -> bindParam(":idPost",$id);
            $result -> execute();
            return $result -> fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../logBD.txt");
        }
    }

    public function addLike($id){
        try{
            $consulta = "INSERT INTO wuba.post_likes (ID_Post, ID_User) VALUES (:idPost, :idUser)";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':idPost', $id);
            $result->bindParam(':idUser', $_SESSION["idUsuario"]);
            $result->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../logBD.txt");
        }
    
    }

    public function quitarLike($id){
        try{
            $consulta = "DELETE FROM  wuba.post_likes WHERE ID_User=:idUser AND ID_Post=:idPost";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':idPost', $id);
            $result->bindParam(':idUser', $_SESSION["idUsuario"]);
            $result->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage() . "###Codigo: " . $e->getCode() . " " . microtime() . PHP_EOL, 3, "../logBD.txt");
        }

}


}   

?>