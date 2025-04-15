<?php
$blogs = $this->blog;

?>
<h1 class="visually-hidden">Noticias Galería Café Libro</h1>

<div class="titulo-imagen-menu">
    <img class="imagen-titulo" src="/skins/page/images/GCL-11.png" alt="Titulo Noticias - Galería Café Libro">
</div>
<section class="section-noticias py-4">
    <h1 class="visually-hidden">Noticias Galería Café Libro</h1>

    <div class="container container-blog">
        <div class="row no-gutters">
            <?php foreach ($blogs as $key => $value) : ?>

                <div class="col-sm-12 col-md-6 col-lg-4 m-0 p-2">

                    <div class="card card-noticia mx-auto">
                        <a class="noticia-card-image" href="/page/noticias/detalle?id=<?php echo $value->blog_id; ?>">
                            <?php if ($value->blog_imagen && file_exists(IMAGE_PATH . (string) $value->blog_imagen)) { ?>
                                <img src="/images/<?php echo $value->blog_imagen ?>" class="card-image" alt="Noticias - Galería Café Libro <?php echo $value->blog_titulo ?>">
                            <?php } else { ?>
                                <img src="/skins/page/images/blogstock.jpg" class="card-image" alt="Noticias - Galería Café Libro <?php echo $value->blog_titulo ?>">
                            <?php } ?>

                        </a>
                        <div class="card-body card-body-noticia">
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
                            <div class="content-titulo">
                                <h5 class="card-title"><?php echo $value->blog_titulo ?></h5>
                            </div>
                            <div class="card-text">
                                <?php echo $value->blog_texto ?>
                            </div>


                        </div>
                        <div class="card-footer card-footer-noticia">
                            <a href="/page/noticias/detalle?id=<?php echo $value->blog_id; ?>"><i class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            <?php endforeach ?>
        </div>
        <div align="center">

            <ul class="pagination justify-content-center">
                <?php
                $url = '/page/blog';
                $min = $this->page - 10;
                if ($min < 0) {
                    $min = 1;
                }
                $max = $this->page + 10;
                if ($this->totalpages > 1) {
                    if ($this->page != 1)
                        echo '<li class="page-item"><a class="page-link text-pagination" href="' . $url . '?page=' . ($this->page - 1) . '"> &laquo; Anterior </a></li>';
                    for ($i = 1; $i <= $this->totalpages; $i++) {
                        if ($this->page == $i) {
                            echo '<li class="page-item  fondo-pagination active"><a class="page-link  text-pagination">' . $this->page . '</a></li>';
                        } else {
                            if ($i <= $max and $i >= $min) {
                                echo '<li class="page-item fondo-pagination"><a class="page-link text-pagination" href="' . $url . '?page=' . $i . '">' . $i . '</a></li>  ';
                            }
                        }
                    }
                    if ($this->page != $this->totalpages)
                        echo '<li class="page-item"><a class="page-link text-pagination" href="' . $url . '?page=' . ($this->page + 1) . '">Siguiente &raquo;</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</section>