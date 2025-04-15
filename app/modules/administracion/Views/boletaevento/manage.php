    <script src="https://cdn.metroui.org.ua/current/metro.js"></script>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/current/metro.css">

<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->boleta_evento_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->boleta_evento_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-6 form-group">
					<label class="control-label">Tipo de Boleta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="boleta_evento_tipo"  required >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_boleta_evento_tipo AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"boleta_evento_tipo") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="boleta_evento_cantidad"  class="control-label">Cantidad</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_evento_cantidad; ?>" name="boleta_evento_cantidad" id="boleta_evento_cantidad" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="boleta_evento_saldo"  class="control-label">Saldo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_evento_saldo; ?>" name="boleta_evento_saldo" id="boleta_evento_saldo" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="boleta_evento_evento"  value="<?php if($this->content->boleta_evento_evento){ echo $this->content->boleta_evento_evento; } else { echo $this->evento; } ?>">
				<div class="col-6 form-group">
					<label for="boleta_evento_precio"  class="control-label">Precio</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_evento_precio; ?>" name="boleta_evento_precio" id="boleta_evento_precio" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="boleta_evento_precioadicional"  class="control-label">Precio adicional</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->boleta_evento_precioadicional; ?>" name="boleta_evento_precioadicional" id="boleta_evento_precioadicional" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="boleta_evento_fechalimite"  class="control-label">Fecha limite</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-calendar-alt"></i></span>
						</div>
					<input type="text" value="<?php if($this->content->boleta_evento_fechalimite){ echo $this->content->boleta_evento_fechalimite; } else { echo date('Y-m-d'); } ?>" name="boleta_evento_fechalimite" id="boleta_evento_fechalimite" class="form-control"   data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="es"  >
					</label>
					<div class="help-block with-errors"></div> 
				</div>
				<div class="col-4 form-group">
					<label for="boleta_evento_horalimite"  class="control-label">hora limite</label>
					<label class="input-group  timepicker">
					<input data-role="timepicker" value="<?php if($this->content->boleta_evento_horalimite){ echo $this->content->boleta_evento_horalimite; } else { echo date('H:i:s'); } ?>"   name="boleta_evento_horalimite" id="boleta_evento_horalimite" >
					</label>
					<div class="help-block with-errors"></div>
				</div>

			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>?evento=<?php if($this->content->boleta_evento_evento){ echo $this->content->boleta_evento_evento; } else { echo $this->evento; } ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>
<script>

	$(document).ready(function () {
    // $('#boleta_evento_horalimite').timepicker({
    //     showMeridian: false,  // Opción para formato 24 horas
    //     minuteStep: 1, 
    //     defaultTime: false
    // });

   
});
</script>