
    <div class="container">

        <div align="center" class="titulo-fotos mt-md-5">
            <h1><?php echo $this->album->album_nombre ?></h2>
        </div>

        <div align="center" class="descripcion-fotos"><?php echo $this->album->album_descripcion ?></div>
        <div class="detalle-fotos">
            <div class="wrapper">
                <div class="my-slider">
                    <?php foreach ($this->fotos as $key => $foto) { ?>

                        <img style="object-fit:contain;" src="/images/<?php echo $foto->fotos_foto ?>" alt="Imagen Galería Café Libro <?php echo $foto->fotos_titulo ?>">
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

<style>

</style>

<script type="text/javascript">
    $(document).ready(function() {

        $("#carousel_container").carousel({
            pause: 5000,
            quantity: 1,
            auto: 'false',
            sizes: {
                '960': 3,
                '768': 2,
                '576': 1,
            }
        });
    });

    $(document).ready(function() {
        $('.my-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            speed: 300,
            infinite: true,
            autoplaySpeed: 5000,
            autoplay: true,
            responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>

<!--  <div class="row">
            <div class="col-12">
                <div id='carousel_container'>
                    <div class='left_scroll'><i class="fas fa-chevron-left"></i></div>
                    <div class="carousel_inner">
                        <div align="center"class="noticias"><h2><?php echo $this->album->album_nombre ?></h2></div>
                        <div align="center"><?php echo $this->album->album_descripcion ?></div>
                        <ul>
                        <?php foreach ($this->fotos as $key => $foto) { ?>
                            <li> 
                                <div class="carrusel-detalle">
                                    <div class="detalle" align="center" >
                                        <div align="center"><img src="/images/<?php echo $foto->fotos_foto ?>" alt=""></div>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class='right_scroll'><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div> -->