<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form action="<?php echo $this->route; ?>" method="post">
		<div class="content-dashboard">
			<div class="row">
				<div class="col-3">
					<label>tipoboleta</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-azul "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="boleta_compra_tipoboleta" value="<?php echo $this->getObjectVariable($this->filters, 'boleta_compra_tipoboleta') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>cantidad</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-cafe "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="boleta_compra_cantidad" value="<?php echo $this->getObjectVariable($this->filters, 'boleta_compra_cantidad') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>documento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-rosado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="boleta_compra_documento" value="<?php echo $this->getObjectVariable($this->filters, 'boleta_compra_documento') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-azul-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="boleta_compran_nombre" value="<?php echo $this->getObjectVariable($this->filters, 'boleta_compran_nombre') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>telefono</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="boleta_compra_telefono" value="<?php echo $this->getObjectVariable($this->filters, 'boleta_compra_telefono') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>email</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-verde "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="boleta_compra_email" value="<?php echo $this->getObjectVariable($this->filters, 'boleta_compra_email') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>fecha</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro "><i class="fas fa-calendar-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="boleta_compra_fecha" value="<?php echo $this->getObjectVariable($this->filters, 'boleta_compra_fecha') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>Vendedor</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-verde "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<select class="form-control" id="vendor" name="vendor">
							<option value="" disabled selected>Seleccione</option>
							<option value="Galeria Cafe Libro">Galeria Cafe Libro</option>
							<?php foreach ($this->vendors as $key => $value) { ?>
								<option value="<?php echo $value->nombre ?>"><?php echo $value->nombre ?></option>
							<?php } ?>
						</select>
					</label>
				</div>
				<div class="col-3">
					<label>&nbsp;</label>
					<button type="submit" class="btn btn-block btn-azul"> <i class="fas fa-filter"></i> Filtrar</button>
				</div>
				<div class="col-3">
					<label>&nbsp;</label>
					<a class="btn btn-block btn-azul-claro " href="<?php echo $this->route; ?>?cleanfilter=1"> <i class="fas fa-eraser"></i> Limpiar Filtro</a>
				</div>
			</div>
		</div>
	</form>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			$min = $this->page - 10;
			if ($min < 0) {
				$min = 1;
			}
			$max = $this->page + 10;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item" ><a class="page-link"  href="' . $url . '?page=' . ($this->page - 1) . '"> &laquo; Anterior </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else {
						if ($i <= $max and $i >= $min) {
							echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a></li>  ';
						}
					}
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">Siguiente &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
	<div class="content-dashboard">
		<div class="franja-paginas">
			<div class="row">
				<div class="col-5">
					<div class="titulo-registro">Se encontraron <?php echo $this->register_number; ?> Registros</div>
				</div>
				<div class="col-3 text-right">
					<div class="texto-paginas">Registros por pagina:</div>
				</div>
				<div class="col-1">
					<select class="form-control form-control-sm selectpagination">
						<option value="20" <?php if ($this->pages == 20) {
												echo 'selected';
											} ?>>20</option>
						<option value="30" <?php if ($this->pages == 30) {
												echo 'selected';
											} ?>>30</option>
						<option value="50" <?php if ($this->pages == 50) {
												echo 'selected';
											} ?>>50</option>
						<option value="100" <?php if ($this->pages == 100) {
												echo 'selected';
											} ?>>100</option>
					</select>
				</div>
				<div class="col-3">
					<div class="text-right"><a class="btn btn-sm btn-success d-none" href="<?php echo $this->route . "\manage"; ?>"> <i class="fas fa-plus-square"></i> Crear Nuevo</a></div>
				</div>
			</div>
		</div>
		
				<?php if($this->error) {?>
        	<div class="alert mt-3 alert-danger" role="alert">
        	   <?php if($this->error == 1) {?>
                    La extensi&oacute;n GD no est&aacute; instalada o activada.
            	<?php }?>
            <?php if($this->error == 2) {?>
                    Error al generar el c&oacute;digo QR, no ser&aacute; posible descargar.
            	<?php }?>
            </div>
		<?php }?>
		
		<div class="content-table">
			<table class=" table table-striped  table-hover table-administrator text-left" style="font-size: 11px;">
				<thead>
					<tr>
					    <td  class="" >Codigo</td>
						<td>Evento</td>
						<td>Tipo boleta</td>
						<td>Cantidad</td>
						<!--
					<td>Documento</td>
					<td>Nombre</td>
					<td>Telefono</td>
					-->
						<td>Email</td>
						<td>Fecha</td>
					    <td>Fecha de nacimiento</td>
						<td>Total</td>
						<td>Estado</td>
						<td>Vendedor</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($this->lists as $content) { ?>
						<?php $id =  $content->boleta_compra_id; ?>
						<tr>
						    <td class="" style="font-size: 12px;"><?= $content->boleta_compra_id; ?></td>
							<td style="font-size: 12px;"><?= $content->titulo_evento; ?></td>
							<td style="font-size: 12px;"><?= $content->tipo_boleta; ?></td>
							<td style="font-size: 12px;"><?= $content->boleta_compra_cantidad; ?></td>
							<!--
						<td style="font-size: 12px;"><?= $content->boleta_compra_documento; ?></td>
						<td style="font-size: 12px;"><?= $content->boleta_compran_nombre; ?></td>
						<td style="font-size: 12px;"><?= $content->boleta_compra_telefono; ?></td>
						-->
							<td style="font-size: 12px;"><?= $content->boleta_compra_email; ?></td>
							<td style="font-size: 12px;"><?= $content->boleta_compra_fecha; ?></td>
							<td style="font-size: 12px;"><?= $content->boleta_compra_fechanacimiento; ?></td>

							<td style="font-size: 12px;"><?= ($content->boleta_compra_total > 0) ? number_format($content->boleta_compra_total) :$content->boleta_compra_total ; ?></td>
							<td style="font-size: 12px;"><?= $content->validacion2; ?></td>
							<td style="font-size: 12px;"><?= $content->vendor; ?></td>
							<td class="text-right">
								<div>
								    <?php if ($content->validacion == 0) { ?>
									<a class="btn btn-verde btn-sm" href="<?php echo $this->route; ?>/validar?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Validar"><i class="fa-solid fa-check"></i></a>

									<a class="btn btn-rojo btn-sm d-none" href="<?php echo $this->route; ?>/rechazar?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Rechazar"><i class="fa-solid fa-xmark"></i></a>

									<?php } ?>
									<?php if ($content->validacion == 1) { ?>
										<a class="btn btn-warning btn-sm" href="<?php echo $this->route; ?>/reenviarqr?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Reenviar QR"><i class="fa-solid fa-reply"></i></a>
									<?php } else {?>
										<a class="btn btn-warning btn-sm btn-rosado" href="<?php echo $this->route; ?>/reenviarqr?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Reenviar QR segunda vez"><i class="fa-solid fa-reply"></i></a>

									<?php } ?>
									<?php if ($content->validacion == 1) { ?>
								    	<a class="btn btn-morado btn-sm d-non" href="<?= $content->ruta; ?>" data-toggle="tooltip" data-placement="top" title="Descargar QR" download="<?= $id ?>.png"><i class="fa-solid fa-download"></i></a>
                                    <?php } ?>
									<a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/detalle?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Detalle"><i class="fas fa-eye"></i></a>
									<a class="btn btn-azul btn-sm d-none" href="<?php echo $this->route; ?>/manage?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pen-alt"></i></a>
									<span data-toggle="tooltip" data-placement="top" title="Eliminar"><a class="btn btn-rojo btn-sm d-none" data-toggle="modal" data-target="#modal<?= $id ?>"><i class="fas fa-trash-alt"></i></a></span>
								</div>
								<!-- Modal -->
								<div class="modal fade text-left" id="modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
												<div class="">¿Esta seguro de eliminar este registro?</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
												<a class="btn btn-danger" href="<?php echo $this->route; ?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf; ?><?php echo ''; ?>">Eliminar</a>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="page-route" value="<?php echo $this->route; ?>/changepage">
	</div>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			$min = $this->page - 10;
			if ($min < 0) {
				$min = 1;
			}
			$max = $this->page + 10;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '"> &laquo; Anterior </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else {
						if ($i <= $max and $i >= $min) {
							echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a></li>  ';
						}
					}
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">Siguiente &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
</div>