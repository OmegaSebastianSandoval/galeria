<div class="noticias">
    <div align="center">
        <h2>Fotos</h2>
    </div>
    <div class="multimedia">
        <div class="container">
            <div class="row">
                <?php foreach ($this->album as $key => $album) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="padding-fotos-interna">
                            <div class="fotos">
                                <a href="/page/fotos/detalle?id=<?php echo $album->album_id; ?>">
                                    <div><img src="/images/<?php echo $album->album_imagen ?>" alt=""></div>
                                </a>
                                <div>
                                    <h3><?php echo $album->album_nombre ?></h3>
                                </div>
                                <div><?php echo $album->album_descripcion ?></div>
                                <div class="redes">
                                    <div class="row">
                                        <div class="col-5">
                                            <div><?php echo $album->album_fecha ?></div>
                                        </div>
                                        <div class="col-7">
                                            <div class="compartir" align="right">Compartir:
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/blog/detalle?id=<?php echo $contenido->contenido_id ?>" target="blank"><i class="fab fa-facebook-f"></i></a>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/blog/detalle?id=<?php echo $contenido->contenido_id ?>" target="blank"><i class="fab fa-whatsapp"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div align="center">
        <ul class="pagination justify-content-center">
            <?php
            $url = '/page/fotos';
            if ($this->totalpages > 1) {
                if ($this->page != 1)
                    echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '"> &laquo; Anterior </a></li>';
                for ($i = 1; $i <= $this->totalpages; $i++) {
                    if ($this->page == $i)
                        echo '<li class="page-item active"><a class="page-link">' . $this->page . '</a></li>';
                    else
                        echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '">' . $i . '</a></li>  ';
                }
                if ($this->page != $this->totalpages)
                    echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '">Siguiente &raquo;</a></li>';
            }
            ?>
        </ul>
    </div>
</div>