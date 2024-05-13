<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>EliEsFLo</title>
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

if(isset($errores)){
	print_r($errores);
}


?>
<!--body-->
   
<section class="position-relative d-flex align-items-center min-vh-100 bg-light mb-5 py-lg-5 pt-5 overflow-hidden">

	<div class="container-fluid g-0 col-xl-7 offset-xl-5 position-absolute top-0">
		<img class="w-100" style="object-fit:cover;object-position:50% 50%;" src="https://images.unsplash.com/photo-1549490349-8643362247b5?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080" srcset="https://images.unsplash.com/photo-1549490349-8643362247b5?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080 1080w, https://images.unsplash.com/photo-1549490349-8643362247b5??crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=150 150w, https://images.unsplash.com/photo-1549490349-8643362247b5??crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=300 300w, https://images.unsplash.com/photo-1549490349-8643362247b5??crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=768 768w, https://images.unsplash.com/photo-1549490349-8643362247b5??crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8OXx8cHVycGxlfGVufDB8MXx8fDE2NDYwNDUwNDY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1024 1024w" sizes="(max-width: 1080px) 100vw, 1080px" width="1080" height="" alt="Photo by Maria Orlova" lc-helper="image">
	</div>
	<div class="container position-relative zindex-5 py-5">
		<div class="row justify-content-md-start justify-content-center">
			<div class="col-sm-8 col-md-9 col-lg-8 mt-4 pt-2 text-md-start text-center">
				<div class="card card-body mb-md-5 p-md-5 mb-4 shadow">
					<div class="lc-block mb-4">
						<div class="d-inline-flex">
							<div><!-- Aqui ira un video de marketing del negocio -->
								<a href="https://www.youtube.com/watch?v=5AhZh4A7NLM"> 
									<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" viewBox="0 0 16 16" lc-helper="svg-icon" class="">
										<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"></path>
									</svg>
								</a>
							</div>

							<div class="ms-3 align-self-center" editable="rich">
								<p class="lead">La mejor estetica de Valencia</p>
							</div>
						</div>
					</div><!-- /lc-block -->
					<div class="lc-block mb-4">
						<div editable="rich">
							<h1 class="display-2 fw-bold">Embellece tu cuerpo y eleva tu alma.</h1>

						</div>
					</div><!-- /lc-block -->
					<div class="lc-block py-md-5 d-md-flex align-items-md-start">
						<div class="lc-block flex-shrink-0  mb-4"><!-- este enlace te llevara a una pagina donde se mostraran todos los procedimientos que tengamos en la base de datos -->
							<a class="btn btn-primary btn-lg" href="index.php?ctl=EliProcesos" role="button" lc-helper="button">Procedimientos</a>
						</div>
						<div class="lc-block ms-md-3">
							<div editable="rich">
								<p class="text-muted"> Con nuestra gran variedad de procedimientos alcanzaras tu belleza maxima.<br>Es hora de centrarte en ti misma y tener lo que te mereces.</p>
							</div>
						</div>
					</div><!-- /lc-block -->
				</div>
				<div class="lc-block" style="">
					<div class="d-inline-flex">
						<div>
							<a href="#features">
								<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" viewBox="0 0 16 16" style="" lc-helper="svg-icon" class="">
									<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"></path>
								</svg>
							</a>
						</div>

						<div class="ms-3 align-self-center" editable="rich">
							<p><a href="#features" class="lead">Sobre nosotros</a><br></p>
						</div>
					</div>
				</div><!-- /lc-block -->
			</div>
		</div>
	</div>
</section>
<section class="" id="features">
	<div class="container py-6">
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="lc-block">
					<div editable="rich">
						<h2 class="display-5 fw-bold">¿Porque EliEsFlo es tu mejor opcion?</h2>
					</div>
				</div><!-- /lc-block -->
			</div>
		</div>
		<div class="row mb-5 row-cols-1 row-cols-sm-3">
			<div class="col mb-3">
				<div class="card border-0">
					<div class="card-body">
						<div class="lc-block mb-5">

							<svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" fill="currentColor" class="bi bi-clock bg-light rounded p-3 text-primary" viewBox="0 0 16 16" lc-helper="svg-icon">
								<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
								<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
							</svg>

						</div>
						<div class="lc-block mb-3">
							<div editable="rich">

								<h2 class="h4">Experiencia en el area</h2>


							</div>
						</div>
						<div class="lc-block mb-5">
							<div editable="rich">
								<p> Expertos en belleza y bienestar, en EliEsFlo ofrecemos servicios de alta calidad respaldados por años de experiencia. Confía en nosotros para obtener resultados excepcionales en cada visita</p>
							</div>
						</div><!-- /lc-block -->
					</div>
				</div>
			</div><!-- /col -->
			<div class="col mb-3">
				<div class="card border-0 ">
					<div class="card-body">
						<div class="lc-block mb-5">

							<svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" fill="currentColor" class="bi bi-emoji-laughing bg-light rounded p-3 text-primary" viewBox="0 0 16 16" lc-helper="svg-icon">
								<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
								<path d="M12.331 9.5a1 1 0 0 1 0 1A5 5 0 0 1 8 13a5 5 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5M7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5"/>
							</svg>

						</div>
						<div class="lc-block mb-3">
							<div editable="rich">

								<h2 class="h4">Clientes satifechos</h2>


							</div>
						</div>
						<div class="lc-block mb-5">
							<div editable="rich">

								<p>Clientes satisfechos son nuestra mejor garantía. En EliEsFlo, nos enorgullece ofrecer servicios de alta calidad respaldados por la satisfacción de nuestros clientes.</p>
							</div>
						</div><!-- /lc-block -->
					</div>
				</div>
			</div><!-- /col -->
			<div class="col mb-3">
				<div class="card border-0">
					<div class="card-body">
						<div class="lc-block mb-5">

							<svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" fill="currentColor" class="bi bi-cash-stack bg-light rounded p-3 text-primary" viewBox="0 0 16 16" lc-helper="svg-icon">
								<path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
								<path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
							</svg>

						</div>
						<div class="lc-block mb-3">
							<div editable="rich">

								<h2 class="h4">Precios competentes</h2>


							</div>
						</div>
						<div class="lc-block mb-5">
							<div editable="rich">

								<p>Con precios competitivos, en EliEsFlo garantizamos accesibilidad sin sacrificar calidad. Nuestros servicios de primera clase están diseñados para satisfacer tus necesidades y presupuesto.</p>
							</div>
						</div><!-- /lc-block -->
					</div>
				</div>
			</div><!-- /col -->
		</div>
		
	</div>
</section>
<section class="pt-6 bg-light">
	<div class="container">
		<div class="row">
			<div class="row">
				<div class="col-md-12">
					<div class="lc-block">
						<div editable="rich">
							<h2 class="display-5 fw-bold">Our latest projects:</h2>
						</div>
					</div><!-- /lc-block -->
					<div class="lc-block" style="">
						<div editable="rich">
							<p class="lead"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div><!-- /lc-block -->
				</div>
			</div>
		</div>
	</div>
</section>
<section class="bg-light">
	<div class="container py-5 d-flex flex-wrap justify-content-center">
		
		<?php 
		$m = new Memeteca;
		$m->pintaimgProcedimientos();
		?>
	</div>
</section>
<section class="">
	<div class="container py-5 my-4 bg-light text-dark rounded">

		<div class="row justify-content-center text-center mb-4">

			<div class="lc-block col-xl-8">
				<h1 editable="inline" class="fw-bold display-5">¿Que ofrecemos?</h1>
			</div><!-- /lc-block -->

		</div>
		<div class="row justify-content-center text-center mb-4">

			<div class="lc-block col-xl-8">
				<div editable="rich">
					<p class="text-muted rfs-8">Con EliEsFlo vas a conseguir lo que siempre has querido, gracias a la amplia gamma de procedimientos que estan esperando por ti </p>
				</div>
			</div><!-- /lc-block -->

		</div>

		<div class="row justify-content-center">
			<div class="col-md-12 col-xxl-8">
				<div class="lc-block">
					<div class="accordion accordion-flush" id="accordionFlushMyFAQ2">
						<div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow">

							<a editable="inline" class="fw-bold text-decoration-none text-dark h4 collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
								Faciales
							</a>

							<div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushMyFAQ2">
								<div class="accordion-body" editable="rich">Experimenta una revitalización completa con nuestros procedimientos de limpieza facial en EliEsFlo. Nuestros expertos en belleza te brindarán una experiencia relajante y efectiva, eliminando impurezas, células muertas y dejando tu piel radiante y rejuvenecida. Descubre el poder de una piel limpia y saludable con nuestros tratamientos de limpieza facial, diseñados para resaltar tu belleza natural y dejar una impresión duradera
									<p><a href="index.php?ctl=mostrarTipos&id=2&name=Facial" class="float-end">Echemos un vistazo</a><br></p>
								</div>
							</div>
						</div>
						<div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow"><a editable="inline" class="fw-bold text-decoration-none text-dark h4" href="#" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
								Corporales
							</a>

							<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushMyFAQ2">
								<div class="accordion-body" editable="rich">Sumérgete en un oasis de relajación y bienestar con nuestros masajes corporales en EliEsFlo. Te guiaremos en un viaje hacia la calma y el rejuvenecimiento, utilizando técnicas especializadas para aliviar la tensión muscular, mejorar la circulación y restaurar el equilibrio corporal. Experimenta la sensación de renovación mientras el estrés se disipa y la energía positiva fluye a través de tu ser.</div>
								<p><a href="index.php?ctl=mostrarTipos&id=1&name=corporal" class="float-end">Echemos un vistazo</a><br></p>
							</div>
						</div>
						<div class="lc-block accordion-item mb-5 p-md-4 card card-body shadow"><a editable="inline" class="fw-bold text-decoration-none text-dark h4" href="#" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
								Capilares
							</a>

							<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushMyFAQ2">
								<div class="accordion-body" editable="rich">Descubre la libertad de una piel suave y sin vello con nuestros tratamientos de depilación láser en EliEsFlo. Nuestra tecnología de vanguardia y nuestro equipo de profesionales certificados te ofrecen una solución segura, efectiva y de larga duración para eliminar el vello no deseado en cualquier parte del cuerpo. Olvídate de los métodos tradicionales de depilación y disfruta de una experiencia sin dolor y sin preocupaciones. Con nuestra depilación láser, podrás decir adiós al vello no deseado de forma permanente, revelando una piel suave y sedosa que te hará sentir segura y lista para cualquier ocasión.</div>
								<p><a href="index.php?ctl=mostrarTipos&id=3&name=capilar" class="float-end">Echemos un vistazo</a><br></p>
							</div>
						</div>
						
					</div>
				</div>
				<!-- /col -->
				<!-- /lc-block -->
			</div><!-- /col -->
		</div>
	</div>
</section>

<section class="bg-light py-6" style="">
	<div class="container py-4 mt-2">

		<div class="row">
			<div class="col-md-6 offset-md-3 mb-2">
				<div class="lc-block text-center">
					<h2 editable="inline" class="mb-3 display-5 fw-bold">Comentarios de clientes</h2>
				</div>
			</div>
		</div>

		<div class="lc-block">
			<div id="carouselTestimonial" class="carousel slide pb-4" data-bs-ride="carousel">
				<div class="carousel-inner px-5">
					<div class="carousel-item active">
						<div class="row">
							<div class="lc-block mb-4 d-flex justify-content-center">
								<div class="position-relative mt-5">
									<img alt="" class="rounded-circle" src="./img/eliesfloLogo.png" style="" loading="lazy" width="300" lc-helper="image">
			
				
				
				
								</div>
							</div>
				
							<div class="col-md-6 offset-md-3">
				
								<div class="lc-block text-center">
									<div editable="rich">
										<p class="text-muted lead">Fue una experiencia increible, geniales profesionales y personas.</p>
									</div>
				
									<div editable="rich">
										<h5><strong> Breyner Pavas</strong></h5>
									</div>
				
									<small editable="inline" class="text-secondary" style="letter-spacing:1px">CEO of Acme Inc. </small>
								</div><!-- /lc-block -->
							</div><!-- /col -->
						</div>
					</div>
					<?php
					$m = new Memeteca;
					$m->pintaCarrousel();
					?>
				</div>
				<div class="w-100 text-center mt-4">
					<a class="carousel-control-prev position-relative d-inline me-4" href="#carouselTestimonial" data-bs-slide="prev">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="text-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
						</svg>
						<span class="visually-hidden">Previous</span>
					</a>
					<a class="carousel-control-next position-relative d-inline" href="#carouselTestimonial" data-bs-slide="next">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="text-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
						</svg>
						<span class="visually-hidden">Next</span>
					</a>
				</div>
			</div>
		</div>
		<!-- /lc-block -->
	

	</div>
</section>
<section class="">
	<div class="container px-4 py-5 my-5 text-center">
		<div class="lc-block mb-5">
			<div editable="rich">

				<h2 class="fw-bold display-5">Nuestra Oficina</h2>

			</div>
		</div>

		<div class="row justify-content-center mb-5">
			<div class="position-relative col"><img class="rounded shadow-lg wp-image-529 img-fluid" style="filter: brightness(0.8);aspect-ratio: 16 / 9; object-fit:cover" src="./img/oficina.jpg" loading="lazy" width="1080" height="768" srcset="" alt="Photo by Slidebean" lc-helper="image"> </div>
		</div>
	</div>
</section>
<section>
	<div class="container py-5">
		<div class="row min-vh-50 align-items-center justify-content-center">
			<div class="col-lg-9 col-xl-8 text-center bg-dark text-white p-5">
				<div class="lc-block mb-4">
					<div editable="rich">
						<h2 class="display-3 fw-bolder">Encuentranos</h2>
						<p>En nuestras modernas instalaciones en EliEsFlo, creamos un ambiente acogedor y profesional donde te sentirás como en casa. Nuestras oficinas están diseñadas para brindarte comodidad y privacidad mientras disfrutas de nuestros servicios de belleza y bienestar.</p>

					</div>
				</div><!-- /lc-block -->
				<div class="lc-block mb-5">
					<a class="btn btn-lg btn-light" href="https://maps.app.goo.gl/RiVZEAWQooLdQo1fA" role="button">VIEW MAP</a>
				</div><!-- /lc-block -->
				<div class="lc-block border-top col-md-6 offset-md-3">
					<div editable="rich">
						<h2 class="fw-bolder"><br></h2>
					</div>
				</div>
				<div class="lc-block mb-4">
					<div editable="rich">
						<h2 class="fw-bolder">Horario</h2>
					</div>
				</div>
				<div class="lc-block">
					<div editable="rich">
						<p>Lunes a Viernes -> 8:00am – 2:00pm / 3:00pm - 8:00pm<br>
						Sabado -> 9:00am - 2:00pm</p>
					</div>
				</div><!-- /lc-block -->
			</div><!-- /col -->
		</div>
	</div>
</section>

  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>