<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->blog_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->blog_id; ?>" />
			<?php }?>
			<div class="row">
		<div class="col-6 form-group">
			<label   class="control-label">Activar</label>
				<input type="checkbox" name="blog_estado" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'blog_estado') == 1) { echo "checked";} ?>   ></input>
				<div class="help-block with-errors"></div>
		</div>
		<div class="col-6 form-group">
			<label   class="control-label">Blog importante</label>
				<input type="checkbox" name="blog_importante" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'blog_importante') == 1) { echo "checked";} ?>   ></input>
				<div class="help-block with-errors"></div>
		</div>
				<div class="col-6 form-group">
					<label for="blog_titulo"  class="control-label">Titulo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->blog_titulo; ?>" name="blog_titulo" id="blog_titulo" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="blog_imagen" >Imagen</label>
					<input type="file" name="blog_imagen" id="blog_imagen" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png"  >
					<div class="help-block with-errors"></div>
					<?php if($this->content->blog_imagen) { ?>
						<div id="imagen_blog_imagen">
							<img src="/images/<?= $this->content->blog_imagen; ?>"  class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('blog_imagen','<?php echo $this->route."/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove" ></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-6 form-group">
					<label for="blog_fecha"  class="control-label">Fecha</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="fas fa-calendar-alt"></i></span>
						</div>
					<input type="text" value="<?php if($this->content->blog_fecha){ echo $this->content->blog_fecha; } else { echo date('Y-m-d'); } ?>" name="blog_fecha" id="blog_fecha" class="form-control"   data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="es"  >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="blog_texto" class="form-label" >Texto</label>
					<textarea name="blog_texto" id="blog_texto"   class="form-control tinyeditor" rows="10"   ><?= $this->content->blog_texto; ?></textarea>
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