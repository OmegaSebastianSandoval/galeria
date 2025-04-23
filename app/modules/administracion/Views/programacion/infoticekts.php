<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form action="<?php echo $this->route; ?>" method="post">
		<div class="content-dashboard">
			<div class="row">
				<div class="col-6">
					<label>Nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="programacion_nombre" value="<?php echo $this->getObjectVariable($this->filters, 'programacion_nombre') ?>"></input>
					</label>
				</div>
				<!-- 	<div class="col-3">
		            <label>Imagen</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="programacion_imagen" value="<?php echo $this->getObjectVariable($this->filters, 'programacion_imagen') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>Lugar</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="programacion_lugar" value="<?php echo $this->getObjectVariable($this->filters, 'programacion_lugar') ?>"></input>
		            </label>
		        </div> -->
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

				</div>
			</div>
		</div>
		<div class="content-table">
			<table class=" table table-striped  table-hover table-administrator text-left">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Imagen</td>
						<td>Lugar</td>

						<td width="">Validados/Totales</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($this->lists as $content) { ?>
						<?php if ($content->cantidadTickets > 0) { ?>
							<?php $id =  $content->programacion_id; ?>
							<tr>
								<td><?= $content->programacion_nombre; ?></td>
								<td>
									<?php if ($content->programacion_imagen) { ?>
										<img src="/images/<?= $content->programacion_imagen; ?>" class="img-thumbnail thumbnail-administrator" />
									<?php } ?>
									<div><?= $content->programacion_imagen; ?></div>
								</td>
								<td><?= $content->programacion_lugar; ?></td>

								<td class="">
									<div>
										<?= $content->cantidadTicketsValidados; ?>/<?= $content->cantidadTickets; ?>

										<!-- <a class="btn btn-morado btn-sm" href="/administracion/boletaevento?evento=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Boleta"><i class="fas fa-pen-alt"></i></a> -->

									</div>

								</td>
								<td>
									<?php if ($content->cantidadTickets > 0) { ?>
										<button type="button" class="btn btn-sm btn-morado" data-toggle="modal" data-target="#modalGrafica" data-id="<?= $id ?>">
											<i class="fas fa-chart-bar"></i>
										</button>
									<?php } ?>


								</td>
							</tr>
						<?php } ?>

					<?php } ?>
				</tbody>
			</table>
		</div>
		<input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="order-route" value="<?php echo $this->route; ?>/order"><input type="hidden" id="page-route" value="<?php echo $this->route; ?>/changepage">
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
</div>
<div class="modal fade" id="modalGrafica" tabindex="-1" aria-labelledby="modalGraficaLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalGraficaLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<canvas id="ticketsgrafica" style="max-height: 100%;" class="chartjs-render-monitor"></canvas>
				<div id="resumenTickets" class="mt-3 text-center fw-bold" style="display: none;">
					<!-- contenido se llena dinámicamente -->
				</div>

				<div id="sinDatosMsg" class="alert alert-warning text-center" style="display: none;">
					No hay datos para mostrar.
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>