<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
			.border_restaurant {border-bottom: dashed var(--bs-body-color)}<br />
		</style>
</head>
<body>
    <?php 
    if(isset($_SESSION["nivel_usuario"])){
        if($_SESSION["nivel_usuario"]==2){
            require __DIR__."/../../web/templates/EliHeaderAdmin.php";
        }else{
            if($_SESSION["nivel_usuario"]==1){
                require __DIR__."/../../web/templates/EliHeaderLogged.php";
            }else{
                require __DIR__."/../../web/templates/EliHeaderNotLogged.php";
            }
        }
    }else{
        require __DIR__."/../../web/templates/EliHeaderNotLogged.php";
    }
    ?>
     
  
<div class="container py-4">
	<div class="row mb-5">
		<div class="col-12">
			<div class="lc-block text-center">
				<div>
					<h2 class=""><?= $_GET["name"]?></h2>
					

				</div>
			</div>
		</div>
	</div>
	<!-- Menu Items -->
	<div class="row row-cols-1 row-cols-lg-2 g-4 g-xxl-5">
		<?php
        $m = new Memeteca;
        $m->pintaProcedimientosEspecificos($_GET["id"]);
        ?>
        
	</div>
</div>
 
 
  
</body>
</html>