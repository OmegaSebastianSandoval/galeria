

<div class="banner-home">
	<?php echo $this->bannerprincipal; ?>
</div>
<nav class="headerHome">
	<a href="/" class="nav-brand">
		<img src="/skins/page/images/logogaleria.png" alt="Logo Principal Galería Café Libro">
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
			<a href="https://wa.me/573176608742?text=Hola,%20me%20gustaría%20recibir%20más%20información." target="_blank" class="nav-whatsapp nav-info">
				<span class="nav-icon">
					<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
						<g id="Capa_1-2" data-name="Capa 1">
							<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
						</g>
					</svg>
					<i class="fa-brands fa-whatsapp"></i>
				</span>
				<?php echo $this->infopage->info_pagina_whatsapp ?>
			</a>
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
					<a href="/page/bonos" class="nav-link">Bonos</a>
				</li>
				<li>
					<a href="/page/contactenos" class="nav-link">Contáctanos</a>
				</li>
			</ul>
		</div>
	</div>
</nav>


<!-- HEADER RESPONSIVE -->

<header>
	<nav class="main-nav">


		<input type="checkbox" id="check" />
		<label for="check" class="menu-btn">

			<a id="nav-toggle"><span></span></a>

		</label>

		<a href="/" class="logo"><img src="/skins/page/images/logogaleria.png" alt="Logo Principal Galería Café Libro"></a>

		<ul class="navlinks">
		<span class="titulo-menu-nav">Menú</span>

			<li class="desplegable"><a href="#"><span>Programación <i class="fas fa-angle-down"></i></span></a>
				<ul style="display: none;">
					<li><a href="/page/programacion">Eventos</a></li>
					<li><a href="/page/teatro">Teatro en el café</a></li>
					<li></li><a href="/page/eventosculturales">Eventos culturales</a></li>

				</ul>
			</li>
			<hr>
			<li><a href="/page/sedes">Sedes</a></li>
			<hr>
			<li><a href="/page/carta">Carta</a></li>
			<hr>
			<li><a href="/page/programacion/reserva">Reservas</a></li>
			<hr>
			<li><a href="/page/noticias">Noticias</a></li>
			<hr>
			<li class="desplegable"><a href="#"><span>Galería <i class="fas fa-angle-down"></i></span></a>
				<ul style="display: none;">
					<li><a href="/page/galeria">Imágenes</a></li>
					<li><a href="/page/videos">Videos</a></li>

				</ul>
			</li>
			<hr>
			<li><a href="/page/bonos">Bonos</a></li>
			<hr>
			<li><a href="/page/contactenos">Contáctanos</a></li>
			<hr>

			<div class="row row-header-responsive">
				<div class="contenedor-redes">
					<div class="nav-phone nav-info">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-solid fa-phone"></i>
						</span>
					</div>



					<?php echo $this->infopage->info_pagina_telefono ?>
				</div>


			</div>
			<hr>
			<div class="row row-header-responsive">
				<div class="contenedor-redes">
					<a href="https://wa.me/573176608742?text=Hola,%20me%20gustaría%20recibir%20más%20información." target="_blank" class="nav-whatsapp nav-info d-flex text-decoration-none">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
								<i class="fa-brands fa-whatsapp"></i>
						</span>

						<?php echo $this->infopage->info_pagina_whatsapp ?>
					</a>
				</div>
			</div>
			<hr>


			<div class="row row-header-responsive">
				<div class="contenedor-redes">
					<div class="nav-email nav-info">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
								<g id="Capa_1-2" data-name="Capa 1">
									<path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
								</g>
							</svg>
							<i class="fa-solid fa-envelope"></i>
						</span>
					</div>

					<?php echo $this->infopage->info_pagina_correos_contacto ?>

				</div>
			</div>
			<hr>

			<div class="row-header-responsive-icons">
				

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
		</ul>
	</nav>
</header>
<script>
	document.querySelector("#nav-toggle")
		.addEventListener("click", function() {
			this.classList.toggle("active");
		});


	$("header .desplegable").on("click", function() {
		if ($(window).width() < 992) {
			var ul = $(this).children('ul');
			if (ul.is(":visible")) {
				ul.hide(300);
			} else {
				ul.show(300);
			}
		}
	});
</script>