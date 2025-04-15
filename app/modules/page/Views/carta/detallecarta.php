<div class="titulo-imagen-menu-detalle mt-5">
    <img class="imagen-titulo" src="/skins/page/images/titulo-menu.png" alt="Titulo Menú - Galería Café Libro">
</div>


<h1 class="text-center mt-5">Carta - <?php print_r($this->carta->menu_nombre) ?></h1>

<div class="contaier mt-5 justify-content-center" style="display: flex;">
    
    <iframe src = "/components/web/viewer.html?file=/files/<?php echo $this->carta->menu_restaurante ?>" width=' 90% ' height=' 1000 ' allowfullscreen webkitallowfullscreen></iframe>

</div>

