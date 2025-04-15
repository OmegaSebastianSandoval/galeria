
<?php if ($this->levelCargo == 3) { ?>
	<ul>
		<li <?php if ($this->botonpanel == 19) { ?>class="activo" <?php } ?>><a href="/administracion/validacionboleta"><i class="fas fa-file-invoice"></i> Validación Boletas</a></li>
	</ul>

<?php } else { ?>
	<ul>
		<li <?php if ($this->botonpanel == 1) { ?>class="activo" <?php } ?>><a href="/administracion/panel"><i class="fas fa-info-circle"></i> Información pagina</a></li>
		<li <?php if ($this->botonpanel == 2) { ?>class="activo" <?php } ?>><a href="/administracion/publicidad"><i class="far fa-images"></i> Administrar Banner</a></li>
		<li <?php if ($this->botonpanel == 3) { ?>class="activo" <?php } ?>><a href="/administracion/contenido"><i class="fas fa-file-invoice"></i> Administrar Contenidos</a></li>
		<li <?php if ($this->botonpanel == 4) { ?>class="activo" <?php } ?>><a href="/administracion/album"><i class="fas fa-file-invoice"></i> Administrar Album</a></li>
		<li <?php if ($this->botonpanel == 5) { ?>class="activo" <?php } ?>><a href="/administracion/fotos"><i class="fas fa-file-invoice"></i> Administrar Fotos</a></li>
		<li <?php if ($this->botonpanel == 6) { ?>class="activo" <?php } ?>><a href="/administracion/videos"><i class="fas fa-file-invoice"></i> Administrar Videos</a></li>
		<li <?php if ($this->botonpanel == 7) { ?>class="activo" <?php } ?>><a href="/administracion/menu"><i class="fas fa-file-invoice"></i> Administrar Menú</a></li>
		<li <?php if ($this->botonpanel == 8) { ?>class="activo" <?php } ?>><a href="/administracion/programacion"><i class="fas fa-file-invoice"></i> Administrar Programación</a></li>
		<li <?php if ($this->botonpanel == 9) { ?>class="activo" <?php } ?>><a href="/administracion/teatro"><i class="fas fa-file-invoice"></i> Administrar Teatro</a></li>

		<li <?php if ($this->botonpanel == 10) { ?>class="activo" <?php } ?>><a href="/administracion/boletatipo"><i class="fas fa-file-invoice"></i> Administrar Tipo de boletería</a></li>
		<li <?php if ($this->botonpanel == 11) { ?>class="activo" <?php } ?>><a href="/administracion/sedes"><i class="fas fa-file-invoice"></i> Administrar Sedes</a></li>
		<li <?php if ($this->botonpanel == 12) { ?>class="activo" <?php } ?>><a href="/administracion/blog"><i class="fas fa-file-invoice"></i> Administrar Blog</a></li>

		<li <?php if ($this->botonpanel == 13) { ?>class="activo" <?php } ?>><a href="/administracion/vendedores"><i class="fas fa-file-invoice"></i> Administrar Vendedores</a></li>
		<li <?php if ($this->botonpanel == 14) { ?>class="activo" <?php } ?>><a href="/administracion/transacciones"><i class="fas fa-file-invoice"></i> Transacciones boletería</a></li>
		<li <?php if ($this->botonpanel == 15) { ?>class="activo" <?php } ?>><a href="/administracion/codigopromocional"><i class="fas fa-file-invoice"></i> Códigos promocionales</a></li>

		<li <?php if ($this->botonpanel == 16) { ?>class="activo" <?php } ?>><a href="/administracion/mapa"><i class="fas fa-file-invoice"></i> Administrar Mapa</a></li>
		<li <?php if ($this->botonpanel == 17) { ?>class="activo" <?php } ?>><a href="/administracion/fondos"><i class="fas fa-file-invoice"></i> Administrar Fondos de Index</a></li>
		<li <?php if ($this->botonpanel == 19) { ?>class="activo" <?php } ?>><a href="/administracion/validacionboleta"><i class="fas fa-file-invoice"></i> Validación Boletas</a></li>
		
		<li <?php if ($this->botonpanel == 18) { ?>class="activo" <?php } ?>><a href="/administracion/usuario"><i class="fas fa-users"></i> Administrar Usuarios</a></li>
	
	</ul>
<?php } ?>