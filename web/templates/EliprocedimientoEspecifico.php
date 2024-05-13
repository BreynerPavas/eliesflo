<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
	<?php
	if (isset($_SESSION["nivel_usuario"])) {
		if ($_SESSION["nivel_usuario"] == 2) {
			require __DIR__ . "/../../web/templates/EliHeaderAdmin.php";
		} else {
			if ($_SESSION["nivel_usuario"] == 1) {
				require __DIR__ . "/../../web/templates/EliHeaderLogged.php";
			} else {
				require __DIR__ . "/../../web/templates/EliHeaderNotLogged.php";
			}
		}
	} else {
		require __DIR__ . "/../../web/templates/EliHeaderNotLogged.php";
	}
	?>
	<?php
	//print_r($procedimiento);
	?>
	<div class="container pt-4 pb-4">
		<div class="row">
			<div class="col-md-4 align-self-center">
				<div class="lc-block text-secondary">
					<div editable="rich"> 
						<p><?= $procedimiento[0]["tipo_procedimiento"] ?></p>
						<!-- aqui falta agregar un vinculo a tipoProcedimiento!-->
					</div>
				</div>
				<div class="lc-block border-bottom">

					<div editable="rich">
						<h1><?= $procedimiento[0]["nombre_procedimiento"] ?></h1>
						<h1><?= $procedimiento[0]["precio"] ?>€</h1>
						<a href='index.php?ctl=EliReservarCita&id=<?=$procedimiento[0]["id"]?>'><input type="button" value="Reservar Cita" class="rounded" ></a>
					</div>
				</div><!-- /lc-block -->
			</div><!-- /col -->
			<div class="col-md-4">
				<div class="lc-block mb-2">
					<img class="img-fluid" src="<?= $procedimiento[0]["imagen1"] ?>" alt="" loading="lazy">
				</div><!-- /lc-block -->
				<div class="lc-block">
					<div editable="rich">
						<p><?= $procedimiento[0]["descripcion"] ?>&nbsp;</p>
					</div>
				</div><!-- /lc-block -->
			</div><!-- /col -->
			<div class="col-md-4">
				<div class="lc-block">

					<div editable="rich">
						<p><?= $procedimiento[0]["objetivo"] ?></p>
					</div>
				</div><!-- /lc-block -->
				<div class="lc-block mb-2">
					<img class="img-fluid" src="<?= $procedimiento[0]["imagen2"] ?>" alt="" loading="lazy">
				</div><!-- /lc-block -->
			</div><!-- /col -->
		</div>
	</div>

	<div class="container">
		<hr>
	</div>
	<section style="background-color: #eee;">
		<div class="container my-5 py-5">
			<div class="row d-flex justify-content-center">
				<div class="col-md-12 col-lg-10 col-xl-8">
					<div class="card">
						<div class="card-body">
							<?php 
							$m = new Memeteca;
							$m->pintaComentario($_GET["id"]);
							?>
							


							<div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
								<form class="form-register" id="form-register" action="index.php?ctl=EliSubirComentario"
									method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?=$_GET["id"]?>">
									<div class="d-flex flex-start w-100">
										<div data-mdb-input-init class="form-outline w-100">
											<textarea class="form-control" id="textAreaExample" rows="4"
												style="background: #fff;" name="comment"></textarea>
											<label class="form-label" for="textAreaExample">Message</label>
										</div>
									</div>
									<div class="float-end mt-2 pt-1">
										<button type="submit" data-mdb-button-init data-mdb-ripple-init
											class="btn btn-primary btn-sm">Post
											comment</button>
										<button type="button" data-mdb-button-init data-mdb-ripple-init
											class="btn btn-outline-primary btn-sm">Cancel</button>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
	</section>





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>

</body>

</html>