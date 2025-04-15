<?php $this->res;  ?>

<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->boleta_compra_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->boleta_compra_id; ?>" />
			<?php } ?>
			<div class="row justify-content-center">
			<?php if ($this->res == 2) { ?>
                <div align="center" class="alert alert-success"> Boleta validada correctamente.</div>
            <?php } else  { ?>
                <!-- <div align="center" class="alert alert-danger">EL mensaje no se pudo enviar, intente de nuevo</div> -->
            <?php } ?>
				<div class="col-lg-4 form-group">
					<label for="boleta_compra_validacionentrada" class="control-label">C&oacute;digo Boleta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->codigo ?   $this->codigo : ''; ?>" name="boleta_compra_validacionentrada" id="boleta_compra_validacionentrada" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>
			</div>


			<div class="row justify-content-center mt-4">

				<div class="col-lg-4 form-group">
					<button class="btn btn-guardar btn-block" type="submit">Buscar Boleta</button>
				</div>
			</div>


			<div class="botones-acciones">

				<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
			</div>
	</form>
</div>