<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->programacion_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->programacion_id; ?>" />
			<?php } ?>
			<div class="row">
				<div class="col-2 form-group">
					<label class="control-label">¿Es bono?</label>
					<br>
					<input type="checkbox" name="programacion_bono" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'programacion_bono') == 1) {
																																																				echo "checked";
																																																			} ?>></input>
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-6 form-group">
					<label for="programacion_nombre" class="control-label">Nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->programacion_nombre; ?>" name="programacion_nombre" id="programacion_nombre" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="programacion_imagen">Imagen</label>
					<input type="file" name="programacion_imagen" id="programacion_imagen" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png">
					<div class="help-block with-errors"></div>
					<?php if ($this->content->programacion_imagen) { ?>
						<div id="imagen_programacion_imagen">
							<img src="/images/<?= $this->content->programacion_imagen; ?>" class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('programacion_imagen','<?php echo $this->route . "/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove"></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-6 form-group">
					<label for="programacion_costo" class="control-label">Costo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->programacion_costo; ?>" name="programacion_costo" id="programacion_costo" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="programacion_fecha" class="control-label">Fecha</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-calendar-alt"></i></span>
						</div>
						<input type="datetime-local" value="<?php if ($this->content->programacion_fecha) {
																									echo $this->content->programacion_fecha;
																								} ?>" name="programacion_fecha" id="programacion_fecha" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="programacion_hora" class="control-label">Hora</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->programacion_hora; ?>" name="programacion_hora" id="programacion_hora" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="programacion_lugar" class="control-label">Lugar</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->programacion_lugar; ?>" name="programacion_lugar" id="programacion_lugar" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="programacion_descripcion" class="form-label">Descripcion</label>
					<textarea name="programacion_descripcion" id="programacion_descripcion" class="form-control tinyeditor" rows="10"><?= $this->content->programacion_descripcion; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>

				<!-- titulo y descripicon de politica de datos de la programacion -->
				<div class="col-12 form-group">
					<label for="programacion_titulo_politica" class="form-label">Titulo política de venta</label>
					<textarea name="programacion_titulo_politica" id="programacion_titulo_politica" class="form-control tinyeditor" rows="10"><?= $this->content->programacion_titulo_politica; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="programacion_descripcion_politica" class="form-label">Descripción política de venta</label>
					<textarea name="programacion_descripcion_politica" id="programacion_descripcion_politica" class="form-control tinyeditor" rows="10"><?= $this->content->programacion_descripcion_politica; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
	<div class="row">
		<div class="content-dashboard col-12">
			<div class="col-12">
				<h4 class="text-center">Asignar vendedor</h4>
			</div>

			<div class="col-12">

				<form action="/administracion/programacion/enlace" method="post">

					<label class="input-group w-50 m-auto">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-verde "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<select class="form-control" id="vendor" name="vendor">
							<option value="" selected disabled>Seleccione..</option>
							<?php foreach ($this->vendors as $key => $value) { ?>
								<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php } ?>
						</select>
					</label>
					<input type="hidden" name="id" id="id" value="<?= $this->content->programacion_id; ?>" />
					<div class="col-md-12 d-flex justify-content-center">
						<button class="btn btn-guardar mt-3 d-flex" type="submit">Generar enlace</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>