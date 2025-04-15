<div class="noticias" style="background-image:url(/images/<?php echo $this->fondonoticia[0]->fondo_fondo ?>)">
    <div align="center"><h2>Noticias</h2></div>
    <div class="noticias-cafe">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="row">
                        <?php foreach ($this->noticias as $key => $noticia) { ?>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="descripcion-interna">
                                    <div class="descripcion">
                                        <a href="/page/noticias/detalle?id=<?php echo $noticia->contenido_id; ?>">
                                            <div class="imagen-noticia" align="center"><img src="/images/<?php echo $noticia->contenido_imagen ?>" alt=""></div>
                                        </a>
                                        <div class="titulo"><?php echo $noticia->contenido_titulo ?></div>
                                        <div><?php echo $noticia->contenido_introduccion ?></div>
                                        <div class="redes">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="fecha"><i class="far fa-clock"></i> <?php echo $noticia->contenido_fecha ?></div>
                                                </div>
                                                <div align="right"class="col-7 datos">
                                                    Compartir:
                                                    <a href="whatsapp://send?text=<?php echo $_SERVER['HTTP_HOST'] ?>/page/blog/detalle?id=<?php echo $contenido->contenido_id?>"><i class="fab fa-whatsapp"></i></i></a>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/blog/detalle?id=<?php echo $contenido->contenido_id ?>"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="https://twitter.com/home?status=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/blog/detalle?id=<?php echo $contenido->contenido_id ?>"><i class="fab fa-twitter"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="facebook">
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-page" data-href="https://www.facebook.com/galeriacafelibro/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/galeriacafelibro/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/galeriacafelibro/">Omega Web Systems</a></blockquote></div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="container">
        <div align="center">
            <ul class="pagination justify-content-center">
                <?php
                    $url = '/page/noticias';
                    if ($this->totalpages > 1) {
                        if ($this->page != 1)
                            echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($this->page-1).'"> &laquo; Anterior </a></li>';
                        for ($i=1;$i<=$this->totalpages;$i++) {
                            if ($this->page == $i)
                                echo '<li class="page-item active"><a class="page-link">'.$this->page.'</a></li>';
                            else
                                echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.$i.'">'.$i.'</a></li>  ';
                        }
                        if ($this->page != $this->totalpages)
                            echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($this->page+1).'">Siguiente &raquo;</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
