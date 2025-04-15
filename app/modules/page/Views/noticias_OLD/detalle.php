<div class="detalle-noticias">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="descripcion-detalle">
                    <div class="imagen"> <img src="/images/<?php echo $this->detalle->contenido_imagen; ?>" alt=""> </div>
                    <div class="fecha"><?php  echo $this->detalle->contenido_fecha ?></div>
                    <div class="titulo"><h2><?php echo $this->detalle->contenido_titulo ?></h2></div>
                    <div><?php  echo $this->detalle->contenido_descripcion ?></div>
                </div>
                <div class="redes">
                    Compartir:
                    <a href="whatsapp://send?text=<?php echo $_SERVER['HTTP_HOST'] ?>/page/blog/detalle?id=<?php echo $contenido->contenido_id?>"><i class="fab fa-whatsapp"></i></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/blog/detalle?id=<?php echo $contenido->contenido_id ?>"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/home?status=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/blog/detalle?id=<?php echo $contenido->contenido_id ?>"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-sm-4">
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