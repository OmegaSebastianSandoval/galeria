<nav class="headerHome">
	<a href="/validacion" class="nav-brand">
		<img src="/skins/page/images/logogaleria.png" alt="Logo Principal Galería Café Libro">
	</a>
	<div class="nav-top">
		<div class="nav-row left">

		</div>
		<div class="center">

		</div>
		<div class="nav-row right">

		</div>
	</div>
	<div class="nav-bottom">
		<div class="nav-row left">

		</div>
		<div class="nav-row center"></div>
		<div class="nav-row right">
			<?php if (Session::getInstance()->get('user')) { ?>
				<span class="nav-user">Hola, <?php echo Session::getInstance()->get('user')->user_user; ?>

					<a href="/validacion/index/logout" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> </a>
				</span>
			<?php } ?>

		</div>
	</div>
</nav>


<!-- HEADER RESPONSIVE -->


<nav class="main-nav">


	<!-- <input type="checkbox" id="check" />
	<label for="check" class="menu-btn d-none">

		<a id="nav-toggle"><span></span></a>

	</label> -->


	<a href="/" class="logo"><img src="/skins/page/images/logogaleria.png" alt="Logo Principal Galería Café Libro"></a>

	<?php if (Session::getInstance()->get('user')) { ?>
		<span class="nav-user">Hola, <?php echo Session::getInstance()->get('user')->user_user; ?>

			<a href="/validacion/index/logout" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> </a>
		</span>
	<?php } ?><!-- 
	<ul class="navlinks d-none">
		<span class="titulo-menu-nav">Menú</span>

		<li class="desplegable"><a href="#"><span>Programación <i class="fas fa-angle-down"></i></span></a>
			<ul style="display: none;">
				<li><a href="/page/programacion">Eventos</a></li>
				<li><a href="/page/teatro">Teatro en el café</a></li>
				<li></li><a href="/page/eventosculturales">Eventos culturales</a>
		</li>

	</ul>

	<hr>
	<li><a href="/page/sedes">Sedes</a></li>
	<hr>
	</ul> -->
</nav>
<style>
	nav.headerHome .nav-row.right {
		justify-content: flex-end;
	}

	.nav-user {
		color: #FFF;
		display: flex;
		align-items: center;
		gap: 5px;
		font-size: 17px;
	}

	.nav-user a {
		padding: 5px !important;
		line-height: 1;
	}


	@media(width <=765px) {

		header {
			height: 75px !important;

			position: sticky;
			top: 0;
		}
		.main-nav{
			display: flex !important;
			align-items: center !important;

			padding: 0 15px;
		}
		.logo {
       
        margin-top: -59px;
    }
		.nav-user{
			width: 100%;
			justify-content: end;
		}
		.footer-bottom * {
			font-size: 15px;
		}

		footer {
			height: 80px !important;
		}

		footer .footer-bottom {
			min-height: 80px !important;

		}

		.contenedor-general {
			height: calc(100dvh - 155px) !important;

		}

		h1 {
			margin-top: 15px;
		}

		.contenido-form {
			position: relative !important;
		}

		h4 {
			font-size: 15px !important;

		}

		h4 span {

			font-size: 16px !important;

		}
	}
</style>
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