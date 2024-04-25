<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/raleway-font.css">
	<link rel="stylesheet" type="text/css"
		href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css" />

	<title>EliEsFLo</title>
</head>
<?php


if (isset($params["mensaje"])) {
	echo $params["mensaje"];
}

?>

<body>
	<?php
	require __DIR__ . "/../../web/templates/EliHeaderAdmin.php";
	?>
  <?php 
	if(isset($mensaje)){
		echo($mensaje);
	}
  ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-content" style="background-image: url('img/wizard-v1.jpg')">
					<div class="wizard-v1-content">
						<div class="wizard-form">
							<form class="form-register" id="form-register" action="index.php?ctl=EliSubirProcess"
								method="post" enctype="multipart/form-data">
								<div id="form-total">
									<!-- SECTION 1 -->
									<h2>
										<span class="step-icon"><svg xmlns="http://www.w3.org/2000/svg"
												fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
												<path
													d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383z" />
											</svg></span>
										<span class="step-number">Paso 1</span>
										<span class="step-text">Informacion del procedimiento</span>
									</h2>
									<section>
										<div class="inner">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="username">Procedimiento:</label>
														<input type="text" placeholder="Nombre procedimiento"
															class="form-control" id="name" name="name" required>
													</div>
												</div>
											</div>
											<?php
											$m = new Memeteca;
											$m->pintaTipoProcedimiento();
											?>

											<div class="row mt-1">
												<div class="col-md-4" style="visibility:hidden">
													
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="confirm_password">Precio:</label>
														<input type="number" placeholder="Precio" class="form-control"
															id="price" name="price" required>
													</div>
												</div>
											</div>
										</div>
									</section>
									<!-- SECTION 2 -->
									<h2>
										<span class="step-icon"><svg xmlns="http://www.w3.org/2000/svg"
												fill="currentColor" class="bi bi-2-circle" viewBox="0 0 16 16">
												<path
													d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306" />
											</svg></span>
										<span class="step-number">Paso 2</span>
										<span class="step-text">Imagenes</span>
									</h2>
									<section>
										<div class="inner">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="foto1">Imagen 1:</label>
														<input type="file" name="foto1" class="card-number form-control"
															id="foto1" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="foto2">Imagen 2:</label>
														<input type="file" name="foto2" class="card-number form-control"
															id="foto2" required>
													</div>
												</div>
											</div>
										</div>
									</section>
									<!-- SECTION 3 -->
									<h2>
										<span class="step-icon"><svg xmlns="http://www.w3.org/2000/svg"
												fill="currentColor" class="bi bi-3-circle" viewBox="0 0 16 16">
												<path
													d="M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318" />
												<path
													d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8" />
											</svg></span>
										<span class="step-number">Paso 3</span>
										<span class="step-text">Informacion detallada</span>
									</h2>
									<section>
										<div class="inner">
											<div class="form-group">
												<label for="descripcion">Descripcion:</label>
												<textarea name="descripcion" id="descripcion" class="form-control"
													cols="60" rows="7"></textarea>
											</div>
											<div class="form-group">
												<label for="objetivo">Objetivo:</label>
												<textarea name="objetivo" id="objetivo" class="form-control" cols="60"
													rows="7"></textarea>
											</div>
										</div>
									</section>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>
	<script>
		
    window.onload = () => {
        ejecutarDespuesDeTresSegundos();
    }
	function ejecutarDespuesDeTresSegundos() {
    setTimeout(function() {
        // Coloca aquí el código que deseas ejecutar después de 3 segundos
        var boton = document.getElementById("boton").parentElement.parentElement;
        console.log(boton);
        boton.addEventListener("click", function () {
            var formulario = document.forms[0];
            var elementos = formulario.elements;
            var todosRellenados = true;

            console.log(elementos);
			for (var i = 0; i < elementos.length; i++) {
				var elemento = elementos[i];
				console.log(elemento.value);
				if(elemento.value==""){
					todosRellenados=false;
					break;
				} // Hacer algo con cada elemento
			}

            if (todosRellenados) {
                formulario.submit();
            } else {
                console.log("Al menos un elemento no está rellenado.");
            }
        })
    }, 1000); // 1000 milisegundos = 1 segundos
}



	</script>
</body>

</html>