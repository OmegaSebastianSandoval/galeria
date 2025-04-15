<style type="text/css">
	.form-control {
		border: hidden;
		background: #eeeeee;
	}

	.control-label {
		font-weight: bold;
	}
</style>


<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" method="post" action="<?php echo $this->routeform; ?>"  enctype="multipart/form-data" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->boleta_compra_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->boleta_compra_id; ?>" />
			<?php } ?>
			<div class="row">
				<div class="col-3 form-group">
					<label for="boleta_compra_tipoboleta" class="control-label">evento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-morado "></i></span>
						</div>
						<input type="text" value="<?= $this->content->titulo_evento; ?>" name="boleta_compra_tipoboleta" id="boleta_compra_tipoboleta" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="boleta_compra_tipoboleta" class="control-label">tipo boleta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-morado "></i></span>
						</div>
						<input type="text" value="<?= $this->content->tipo_boleta; ?>" name="boleta_compra_tipoboleta" id="boleta_compra_tipoboleta" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="boleta_compra_cantidad" class="control-label">cantidad</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-verde "></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_compra_cantidad; ?>" name="boleta_compra_cantidad" id="boleta_compra_cantidad" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<!--
				<div class="col-3 form-group">
					<label for="boleta_compra_documento"  class="control-label">documento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-cafe " ></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_compra_documento; ?>" name="boleta_compra_documento" id="boleta_compra_documento" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="boleta_compran_nombre"  class="control-label">nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-rojo-claro " ></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_compran_nombre; ?>" name="boleta_compran_nombre" id="boleta_compran_nombre" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="boleta_compra_telefono"  class="control-label">teléfono</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-azul " ></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_compra_telefono; ?>" name="boleta_compra_telefono" id="boleta_compra_telefono" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="boleta_compra_email"  class="control-label">email</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-verde-claro " ></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_compra_email; ?>" name="boleta_compra_email" id="boleta_compra_email" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="boleta_compra_fechacedula"  class="control-label">fecha expedición cédula</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-azul-claro " ></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_compra_fechacedula; ?>" name="boleta_compra_fechacedula" id="boleta_compra_fechacedula" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				-->
				<div class="col-3 form-group">
					<label for="boleta_compra_fecha" class="control-label">fecha transacción</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-rosado "></span>
						</div>
						<input type="text" value="<?php if ($this->content->boleta_compra_fecha) {
														echo $this->content->boleta_compra_fecha;
													} else {
														echo date('Y-m-d');
													} ?>" name="boleta_compra_fecha" id="boleta_compra_fecha" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="es">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="boleta_compra_codigo" class="control-label">código promocional</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-verde-claro "></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_compra_codigo; ?>" name="boleta_compra_codigo" id="boleta_compra_codigo" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group d-none">
					<label for="respuesta" class="control-label">respuesta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-rojo-claro "></i></span>
						</div>
						<input type="text" value="<?= $this->content->respuesta; ?>" name="respuesta" id="respuesta" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group d-none">
					<label for="validacion" class="control-label">validacion</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-verde "></i></span>
						</div>
						<input type="text" value="<?= $this->content->validacion; ?>" name="validacion" id="validacion" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="validacion2" class="control-label">validacion2</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-rosado "></i></span>
						</div>
						<input type="text" value="<?= $this->content->validacion2; ?>" name="validacion2" id="validacion2" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="entidad" class="control-label">entidad</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-cafe "></i></span>
						</div>
						<input type="text" value="<?= $this->content->entidad; ?>" name="entidad" id="entidad" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="boleta_compra_total" class="control-label">total</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-azul-claro "></i></span>
						</div>
						<input type="text" value="<?= number_format($this->content->boleta_compra_total); ?>" name="boleta_compra_total" id="boleta_compra_total" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<?php if ($this->content->vendor) { ?>
					<div class="col-3 form-group">
						<label for="boleta_compra_total" class="control-label">Vendedor</label>
						<label class="input-group">
							<div class="input-group-prepend">
								<span class="fondo-azul-claro "></i></span>
							</div>
							<input type="text" value="<?= $this->content->vendor ?>" name="vendor" id="vendor" class="form-control">
						</label>
						<div class="help-block with-errors"></div>
					</div>
				<?php } ?>
				<div class="col-3 form-group">
					<label for="" class="control-label">Estado de validación de la entrada</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="fondo-azul-claro "></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_compra_validacionentrada == 1 ? 'Entrada validada' : 'Entrada sin validar' ?>" name="" id="" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<?php if ($this->content->boleta_compra_validacionentrada == 1) { ?>
				<div align="center" class="alert alert-danger">Esta boleta ya se encuentra validada.</div>
			<?php } else { ?>
				<div class="row justify-content-center mt-4">

					<div class="col-4 form-group">
						<button class="btn btn-guardar btn-block" type="submit">Validar Entrada</button>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="botones-acciones">
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(".form-control").prop('readOnly', true);
</script>