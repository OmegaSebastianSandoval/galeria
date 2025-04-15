<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->menu_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->menu_id; ?>" />
			<?php } ?>
			<div class="row">
				<div class="col-6 form-group">
					<label class="control-label">Seccion</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro "><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="menu_seccion" required>
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_menu_seccion as $key => $value) { ?>
								<option <?php if ($this->getObjectVariable($this->content, "menu_seccion") == $key) {
											echo "selected";
										} ?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="menu_nombre" class="control-label">Nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->menu_nombre; ?>" name="menu_nombre" id="menu_nombre" class="form-control" required>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="menu_restaurante">Carta</label>
					<input type="file" name="menu_restaurante" id="menu_restaurante" class="form-control  file-document" data-buttonName="btn-primary" onchange="validardocumento('menu_restaurante');" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf">
					<div class="help-block with-errors"></div>
					<?php if($this->content->menu_restaurante) { ?>
						<div id="archivo_menu_restaurante">
							<div><?php echo $this->content->menu_restaurante; ?></div>
							<div><button class="btn btn-danger btn-sm" type="button" onclick="r('menu_restaurante','<?php echo $this->route."/delete"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Archivo</button></div>
						</div>
					<?php } ?>
				</div>
				
<!-- 				<div class="col-6 form-group">
					<label for="menu_bar">Bar</label>
					<input type="file" name="menu_bar" id="menu_bar" class="form-control  file-document" data-buttonName="btn-primary" onchange="validardocumento('menu_bar');" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf">
					<div class="help-block with-errors"></div>
				</div> -->
				<!-- 				<div clss="col-6 form-group">
					<label for="menu_restaurante_link"  class="control-label">Link Restaurante</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" vaalue="<?= $this->content->menu_restaurante_link; ?>" name="menu_restaurante_link" id="menu_restaurante_link" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div> -->
			
				<div class="col-6 form-group">
					<label for="menu_imagen">Foto</label>
					<input type="file" name="menu_imagen" id="menu_imagen" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png">
					<div class="help-block with-errors"></div>
					<?php if ($this->content->menu_imagen) { ?>
						<div id="imagen_menu_imagen">
							<img src="/images/<?= $this->content->menu_imagen; ?>" class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('menu_imagen','<?php echo $this->route . "/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove"></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>

				<!-- 				<div class="col-6 form-group">
					<label for="menu_bar_link"  class="control-label">Link Bar</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->menu_bar_link; ?>" name="menu_bar_link" id="menu_bar_link" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div> -->
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>