<?php

$detalle = $this->blogDetalle;
$blogLatest = $this->blogLates;

?>

<div class="titulo-imagen-menu">
    <img class="imagen-titulo" src="/skins/page/images/GCL-11.png" alt="Titulo Noticias - Galería Café Libro">
</div>
<section class="section-noticias">


    <div class="container contenedor-detalle-blog">

        <a href="/page/noticias" class="btn btn-primary mt-2"><i class="fa-regular fa-circle-left"></i> Volver</a>

        <div class="row">

            <div class="col-sm-12 col-md-8  col-lg-9 mt-1 col-contenido-detalle-noticia">


                <div class="social-buttons-container">
                    <button class="circular-button"><i class="fas fa-share-alt"></i></button>
                    <div class="social-buttons-list">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.galeriacafelibro.com.co/page/fotos" target="_blank" class="social-button facebook"><i class="fab fa-facebook"></i></a>

                        <a href="https://twitter.com/intent/tweet?text=Visita%20el%20blog%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php print_r($detalle->blog_id) ?>" target="_blank" class="social-button twitter"><i class="fab fa-twitter"></i></a>

                        <a href="https://api.whatsapp.com/send?text=Visita%20el%20blog%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/noticias/detalle?id=<?php print_r($detalle->blog_id) ?>" target="blank" class="social-button whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="titulo-detalle-noticia">
                    <h2><?php echo $detalle->blog_titulo ?></h2>
                </div>
                <div class="imagen-detalle-noticia">

                    <?php if ($detalle->blog_imagen && file_exists(IMAGE_PATH . (string) $detalle->blog_imagen)) { ?>
                        <img src="/images/<?php echo $detalle->blog_imagen ?>" alt="Noticia - Galería Café Libro <?php echo $detalle->blog_titulo ?>">
                    <?php } else { ?>
                        <img src="/skins/page/images/blogstock.jpg" class="card-image" alt="Noticias - Galería Café Libro <?php echo $value->blog_titulo ?>">
                    <?php } ?>

                </div>
                <div class="fecha-detalle-noticia">
                    <span>
                        <?php
                        $formatter = new IntlDateFormatter(
                            'es_ES',
                            IntlDateFormatter::FULL,
                            IntlDateFormatter::NONE,
                            'America/Bogota', // o tu zona horaria
                            IntlDateFormatter::GREGORIAN,
                            "d 'de' MMMM 'de' Y"
                        );
                        ?>

                        <?php
                        echo $formatter->format(new DateTime($detalle->blog_fecha))
                        ?></span>
                </div>

                <div class="texto-detalle-noticia">
                    <p> <?php print_r($detalle->blog_texto) ?></p>

                </div>

            </div>
            <div class="col-sm-12 col-md-12  col-lg-3 mt-1 col-mas-blog">
                <span class="text-start">Noticias más importantes</span>
                <div class="row mt-2">

                    <?php foreach ($blogLatest as $key => $value) : ?>
                        <div class="col-sm-12 col-md-4 col-lg-12">
                            <div class="card card-mas-blog">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <a href="/page/noticias/detalle?id=<?php print_r($value->blog_id) ?>">
                                            <?php if ($value->blog_imagen && file_exists(IMAGE_PATH . (string) $value->blog_imagen)) { ?>
                                                <img src="/images/<?php echo $value->blog_imagen ?>" class="card-image card-image-detalle" alt="Noticias - Galería Café Libro <?php echo $value->blog_titulo ?>">
                                            <?php } else { ?>
                                                <img src="/skins/page/images/blogstock.jpg" class="card-image card-image-detalle" alt="Noticias - Galería Café Libro <?php echo $value->blog_titulo ?>">
                                            <?php } ?>
                                        </a>

                                    </div>
                                    <div class="col-12">
                                        <div class="card-body card-body-mas-blogs">
                                            <?php
                                            $formatter = new IntlDateFormatter(
                                                'es_ES',
                                                IntlDateFormatter::FULL,
                                                IntlDateFormatter::NONE,
                                                'America/Bogota', // o tu zona horaria
                                                IntlDateFormatter::GREGORIAN,
                                                "d 'de' MMMM 'de' Y"
                                            );
                                            ?>
                                            <span class="date">
                                                <?php echo $formatter->format(new DateTime($value->blog_fecha)) ?>
                                            </span>
                                            <a href="/page/noticias/detalle?id=<?php print_r($value->blog_id) ?>">
                                                <h5 class="card-title-mas-blog"><?php print_r($value->blog_titulo) ?></h5>
                                            </a>
                                            <div class="card-text-mas-blog mt-2">
                                                <?php print_r($value->blog_texto) ?>
                                            </div>

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