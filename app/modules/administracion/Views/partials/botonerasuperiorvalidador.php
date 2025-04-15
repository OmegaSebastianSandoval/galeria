<div class="container-fluid">
	<div class="row align-items-center">


		<div class="col-12">
			<div class="infousuario">

				<span><i class="fas fa-user-tie" aria-hidden="true"></i> Bienvenido(a): <?php echo $_SESSION['kt_login_name']; ?></span>
				<a href="/administracion/loginuser/logout" class="enlace-salir">Salir <i class="fas fa-sign-out-alt"></i></a></i>
			</div>
		</div>
	</div>


</div>



<style>
	body {
		min-width: 100% !important;
	}

	header {
		display: flex;
		align-items: center;
	}

	.content-dashboard {


		padding: 0;
	}

	.content-table {
		padding: 0;
		margin: 0;
	}

	.contenedor-general {
		min-height: 90vh;
	}
</style>