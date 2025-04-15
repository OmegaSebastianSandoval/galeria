<div class="banner-home">
	<?php echo $this->bannerprincipal; ?>
</div>


<nav class="headerHome d-none">
	<a href="/" class="nav-brand">
		<img src="/skins/page/images/logogaleria.png" alt="">
	</a>
	<div class="nav-top">
		<div class="nav-row left">
			<div class="nav-phone nav-info">
				<span class="nav-icon">
					<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
						<g id="Capa_1-2" data-name="Capa 1">
							<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
						</g>
					</svg>
					<i class="fa-solid fa-phone"></i>
				</span>
				<?php echo $this->infopage->info_pagina_telefono ?>
			</div>
			<div class="nav-whatsapp nav-info">
				<span class="nav-icon">
					<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
						<g id="Capa_1-2" data-name="Capa 1">
							<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
						</g>
					</svg>
					<i class="fa-brands fa-whatsapp"></i>
				</span>
				<?php echo $this->infopage->info_pagina_whatsapp ?>
			</div>
		</div>
		<div class="center">

		</div>
		<div class="nav-row right">
			<div class="nav-email nav-info">
				<span class="nav-icon">
					<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
						<g id="Capa_1-2" data-name="Capa 1">
							<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
						</g>
					</svg>
					<i class="fa-solid fa-envelope"></i>
				</span>
				<?php echo $this->infopage->info_pagina_correos_contacto ?>
			</div>
			<div class="nav-social-media">
				<?php if ($this->infopage->info_pagina_youtube) { ?>
					<a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-brands fa-youtube"></i>
						</span>
					</a>
				<?php } ?>
				<?php if ($this->infopage->info_pagina_facebook) { ?>
					<a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-brands fa-facebook-f"></i>
						</span>
					</a>
				<?php } ?>
				<?php if ($this->infopage->info_pagina_instagram) { ?>
					<a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-brands fa-instagram"></i>
						</span>
					</a>
				<?php } ?>
				<?php if ($this->infopage->info_pagina_twitter) { ?>
					<a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-brands fa-twitter"></i>
						</span>
					</a>
				<?php } ?>
				<?php if ($this->infopage->info_pagina_linkedin) { ?>
					<a href="<?php echo $this->infopage->info_pagina_linkedin ?>" target="_blank">
						<span class="nav-icon">
							<i class="fa-brands fa-linkedin-in"></i>
						</span>
					</a>
				<?php } ?>
				<?php if ($this->infopage->info_pagina_pinterest) { ?>
					<a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-brands fa-twitter"></i>
						</span>
					</a>
				<?php } ?>
				<?php if ($this->infopage->info_pagina_flickr) { ?>
					<a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-brands fa-flickr"></i>
						</span>
					</a>
				<?php } ?>
				<?php if ($this->infopage->info_pagina_tiktok) { ?>
					<a href="<?php echo $this->infopage->info_pagina_tiktok ?>" target="_blank">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-brands fa-tiktok"></i>
						</span>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="nav-bottom">
		<div class="nav-row left">
			<ul>
				<li class="dropdown">
					<a href="#" class="nav-link">Programación</a>
					<ul class="dropdown-menu">
						<li><a href="/page/programacion" style="font-size: 16px;">Eventos</a></li>
						<li><a href="/page/teatro" style="font-size: 16px;">Teatro en el café</a></li>
						<li><a href="/page/eventosculturales" style="font-size: 16px;">Eventos culturales</a></li>
					</ul>

				</li>
				<li>
					<a href="/page/sedes" class="nav-link">Sedes</a>
				</li>
				<li>
					<a href="/page/carta" class="nav-link">Carta</a>
				</li>
				<li>
					<a href="/page/programacion/reserva" class="nav-link">Reservas</a>
				</li>
			</ul>
		</div>
		<div class="nav-row center"></div>
		<div class="nav-row right">
			<ul>
				<li>
					<a href="/page/noticias" class="nav-link">Noticias</a>
				</li>
				<li class="dropdown">
					<a href="#" class="nav-link">Galería</a>
					<ul class="dropdown-menu">
						<li><a href="/page/galeria">Imágenes</a></li>
						<li><a href="/page/videos">Videos</a></li>
					</ul>
				</li>
				<li>
					<a href="/page/contactenos" class="nav-link">Contáctanos</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<h1 class="mt-3">Galería Café Libro | Música en Vivo y Cultura en Bogotá</h1>
	<div class="news-container">

		<div class="row">
			<div class="col-12 news-title">
				<img src="/skins/page/images/titulo-noticias.png" alt="Galería Café Libro - Prográmate con nuestros eventos">
			</div>

			<div class="col-12">
				<div class="news-slider-container">
					<div class="news-slider">

						<?php foreach ($this->programaciones as $programacion) { ?>

							<div class="news-slider-item">
								<div class="news-slider-item-wrapper">
									<div class="news-date">
										<span class="date-number">
											<?php echo getDateNumber($programacion->programacion_fecha) ?>
										</span>
										<span class="date-month">
											<?php echo getDateMonth($programacion->programacion_fecha) ?>
										</span>
									</div>
									<div class="row">
										<div class="col-sm-12 news-image">
											<img src="/images/<?php echo $programacion->programacion_imagen ?>" alt="Evento - Galería Café Libro - Programación <?php echo $programacion->programacion_nombre ?>">
										</div>
										<div class="col-sm-12 news-item-info">
											<div class="row">
												<div class="col-12 d-flex justify-content-center">
													<h3 class="news-item-title">
														<?php echo $programacion->programacion_nombre ?>
													</h3>
												</div>
												<div class="col-12 d-flex justify-content-center">
													<a href="/page/programacion/detalle?id=<?php echo $programacion->programacion_id ?>" class="news-view-more">
														Más información
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>







<div class="container">

	<div class="gallery-container-home">
		<div class="row">

		</div>
		<div class="left">
			<?php foreach ($this->fotos as $foto) : ?>
				<a href="/page/fotos/detalle?id=<?php echo $foto->fotos_album ?>" class="gallery-photo">
					<img src="/images/<?php echo $foto->fotos_foto ?>" alt="Evento - Galería Café Libro - Foto <?php echo $foto->fotos_titulo ?>">
				</a>
			<?php endforeach; ?>
		</div>
		<div class="right">
			<div class="row">
				<div class="col-12 gallery-title">
					<img src="/skins/page/images/titulo-galeria.png" alt="Galería Café Libro - Galería de imágenes">
				</div>
				<div class="col-12">
					<div class="d-flex justify-content-center mt-5">
						<?php echo $this->textoConocenos->contenido_descripcion ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<style>
	nav.header {
		display: none;
	}
</style>

<script type="text/javascript">

</script>
<?php

function getDateNumber($date)
{
	$date = date('d', strtotime($date));
	return $date;
}

function getDateMonth($date)
{
	$months = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];
	$date = date('m', strtotime($date));
	$date = $months[$date - 1];
	return $date;
}

?>