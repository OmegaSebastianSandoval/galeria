<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />
			<?php } ?>
			<div class="row">
				<div class="col-12 form-group">
					<label for="codigo" class="control-label">codigo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->codigo; ?>" name="codigo" id="codigo" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">tipo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="tipo">
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_tipo as $key => $value) { echo $key ?>
								<option <?php if ($this->getObjectVariable($this->content, "tipo") == $key) {
											echo "selected";
										} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option >
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="valor" class="control-label">valor</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->valor; ?>" name="valor" id="valor" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="porcentaje" class="control-label">porcentaje</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->porcentaje; ?>" name="porcentaje" id="porcentaje" class="form-control">%
					</label>
					<div class="help-block with-errors"></div>
				</div>
			

				<div class="col-12 form-group">
					<label class="control-label">Evento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="evento"  required >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_eventos_vigentes AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"evento") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="usado" value="<?php echo $this->content->usado ?>">
				<input type="hidden" name="fecha_uso" value="<?php echo $this->content->fecha_uso ?>">
				<div class="col-12 form-group">
					<label class="control-label">activo</label>
					<input type="checkbox" name="activo" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'activo') == 1) {
																											echo "checked";
																										} ?>></input>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="fecha" value="<?php echo $this->content->fecha ?>">
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>