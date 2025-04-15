<!-- <?php print_r($this->albumDetalle) ?> -->
<div class="titulo-imagen-menu">
    <img class="imagen-titulo" src="/skins/page/images/GCL-23.png" alt="Titulo Menu">
</div>

<h1 class="titulo-detalle-album"><?php print_r($this->albumDetalle[0]->fotos_titulo) ?></h1>
<h4 class="fecha-detalle-album"> <?php setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                                    echo strftime('%e de %B de %Y', strtotime($this->albumDetalle[0]->fotos_fecha));
                                    ?></h4>

<section class="section-galeria-detalle shadow">

    <div class="container contenedor-detalle-album">
        <div class="sliderDetalleAlbum">
            <?php foreach ($this->albumDetalle as $key => $data) { ?>
                <div class="imagen-album-detalle">
                    <img class="imagen-album" src="/images/<?php echo $data->fotos_foto ?>">
                </div>
            <?php } ?>
        </div>
    </div>


</section>
<script>
    $('.sliderDetalleAlbum').slick({
        /* autoplay: true,
        autoplaySpeed: 3000, */
        arrows: true,
        dots: false
    });
</script>