<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->content_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->content_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-12 form-group">
					<label for="content_title"  class="control-label">content_title</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->content_title; ?>" name="content_title" id="content_title" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="content_subtitle"  class="control-label">content_subtitle</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->content_subtitle; ?>" name="content_subtitle" id="content_subtitle" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="content_introduction" class="form-label" >content_introduction</label>
					<textarea name="content_introduction" id="content_introduction"   class="form-control tinyeditor" rows="10"   ><?= $this->content->content_introduction; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="content_description" class="form-label" >content_description</label>
					<textarea name="content_description" id="content_description"   class="form-control tinyeditor" rows="10"   ><?= $this->content->content_description; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="content_image" >content_image</label>
					<input type="file" name="content_image" id="content_image" class="form-control  file-image" data-buttonName="btn-primary" onchange="validarimagen('content_image');" accept="image/gif, image/jpg, image/jpeg, image/png"  >
					<div class="help-block with-errors"></div>
					<?php if($this->content->content_image) { ?>
						<div id="imagen_content_image">
							<img src="/images/<?= $this->content->content_image; ?>"  class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('content_image','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-12 form-group">
					<label for="content_banner" >content_banner</label>
					<input type="file" name="content_banner" id="content_banner" class="form-control  file-document" data-buttonName="btn-primary" onchange="validardocumento('content_banner');" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" >
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">content_section</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="content_section"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_content_section AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"content_section") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="content_delete"  value="<?php echo $this->content->content_delete ?>">
				<input type="hidden" name="content_current_user"  value="<?php echo $this->content->content_current_user ?>">
				<div class="col-12 form-group">
					<label for="content_date"  class="control-label">content_date</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-calendar-alt"></i></span>
						</div>
					<input type="text" value="<?php if($this->content->content_date){ echo $this->content->content_date; } else { echo date('Y-m-d'); } ?>" name="content_date" id="content_date" class="form-control"   data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="es"  >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="content_link"  class="control-label">content_link</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->content_link; ?>" name="content_link" id="content_link" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>