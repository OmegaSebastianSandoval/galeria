 <?php

    $detalle = $this->blogDetalle;
    $blogLatest = $this->blogLates;

    ?>

 <div class="titulo-imagen-menu">
     <img class="imagen-titulo" src="/skins/page/images/GCL-11.png" alt="Titulo Noticias - Galería Café Libro">
 </div>
 <section class="section-detalle-blog">


     <div class="container contenedor-detalle-blog">

         <a href="/page/noticias" class="btn btn-primary "><i class="fa-regular fa-circle-left"></i> Volver</a>

         <div class="row">
             <div class="col-sm-12 col-md-6 col-lg-4 mt-1 col-imagen-detalle-blog">

                 <div class="imagen-detalle-blog">
                     <img src="/images/<?php print_r($detalle->blog_imagen) ?>" alt="Noticia - Galería Café Libro <?php echo $detalle->blog_titulo ?>">
                 </div>

             </div>
             <div class="col-sm-12 col-md-6  col-lg-5 mt-1 col-contenido-detalle-blog shadow">


                 <div class="social-buttons-container">
                     <button class="circular-button"><i class="fas fa-share-alt"></i></button>
                     <div class="social-buttons-list">
                         <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.galeriacafelibro.com.co/page/fotos" target="_blank" class="social-button facebook"><i class="fab fa-facebook"></i></a>

                         <a href="https://twitter.com/intent/tweet?text=Visita%20el%20blog%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php print_r($detalle->blog_id) ?>" target="_blank" class="social-button twitter"><i class="fab fa-twitter"></i></a>
                
                         <a href="https://api.whatsapp.com/send?text=Visita%20el%20blog%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php print_r($detalle->blog_id) ?>" target="blank" class="social-button whatsapp"><i class="fab fa-whatsapp"></i></a>
                     </div>
                 </div>

                 <div class="titulo-detalle-blog">
                     <span><?php print_r($detalle->blog_titulo) ?></span>

                 </div>
                 <div class="fecha-detalle-blog">
                     <i class="fa-regular fa-calendar"></i> <span> <?php
                                                                    setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");

                                                                    echo strftime('%e de %B de %Y', strtotime($detalle->blog_fecha));

                                                                    ?></span>
                 </div>

                 <div class="texto-detalle-blog">
                     <p> <?php print_r($detalle->blog_texto) ?></p>

                 </div>

             </div>
             <div class="col-sm-12 col-md-12  col-lg-3 mt-1 col-mas-blog">
                 <span class="text-center">Noticias más importantes</span>
                 <div class="row">

                     <?php foreach ($blogLatest as $key => $value) : ?>
                         <div class="col-sm-12 col-md-4 col-lg-12">
                             <div class="card card-mas-blog">
                                 <div class="row no-gutters">
                                     <div class="col-md-4">
                                         <img class="img-card-mas-blog" src="/images/<?php print_r($value->blog_imagen) ?>" alt="Noticias - Galería Café Libro <?php print_r($value->blog_titulo) ?>">
                                     </div>
                                     <div class="col-md-8">
                                         <div class="card-body card-body-mas-blogs">
                                             <h5 class="card-title-mas-blog"><?php print_r($value->blog_titulo) ?></h5>
                                             <p class="card-text-mas-blog"><?php print_r($value->blog_texto) ?></p>

                                         </div>
                                         <div class="card-footer-mas-blog">
                                             <a href="/page/noticias/detalle?id=<?php print_r($value->blog_id) ?>" class="btn btn-sm btn-mas-blog">Ver más</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php endforeach ?>
                 </div>
             </div>
        </div>
    </div>
    
 </section>




 <script>
     const btnCompartir = document.querySelector('.circular-button')
     const botoneraCompartir = document.querySelector('.social-buttons-list')

     btnCompartir.addEventListener("click", function() {
         if (botoneraCompartir.style.opacity === "1") {
             botoneraCompartir.style.opacity = "0"
             botoneraCompartir.style.right = "10px"
             botoneraCompartir.style.pointerEvents = "none"


         } else {
             botoneraCompartir.style.opacity = "1"
             botoneraCompartir.style.right = "60px"
             botoneraCompartir.style.pointerEvents = "all"



         }
     })
 </script>