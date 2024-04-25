<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   .glass_background {background: rgba( 255, 255, 255, 0.3 ); box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 ); backdrop-filter: blur( 6.5px ); -webkit-backdrop-filter: blur( 6.5px );}
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
<div class="container py-5">
	<div class="row">
        <!-- /col -->
		<?php
        $m = new Memeteca;
        $m->pintaProcesos();
        ?>
	</div>
</div>
 
 
  
</body>
</html>