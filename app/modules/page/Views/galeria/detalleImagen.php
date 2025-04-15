 <!-- <?php print_r($this->detalle->fotos_foto); ?> -->
 <div class="titulo-imagen-menu">
     <img class="imagen-titulo" src="/skins/page/images/GCL-23.png" alt="Titulo Menu">
 </div>

 <h1 class="titulo-detalle-album"><?php print_r($this->detalle->fotos_titulo) ?></h1>
 <h4 class="fecha-detalle-album"> <?php setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                                    echo strftime('%e de %B de %Y', strtotime($this->detalle->fotos_fecha));
                                    ?></h4>

 <section class="section-galeria-detalle shadow">

     <div class="container contenedor-detalle-album">

         <img src="/images/<?php print_r($this->detalle->fotos_foto) ?>" alt="">

     </div>


 </section>