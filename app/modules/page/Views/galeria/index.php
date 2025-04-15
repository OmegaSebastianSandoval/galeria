<?php

$array = $this->album;
$arrayVideos = $this->videos;


?>

<div class="titulo-imagen-menu">
  <img class="imagen-titulo" src="/skins/page/images/GCL-23.png" alt="Titulo Galería - Galería Café Libro">

</div>
<div align="center" class="titulo-fotos-galeria">
<h1 class="visually-hidden">Galería de Fotos Galería Café Libro</h1>
  <h2>Fotos</h2>
</div>
<section class="section-galeria">
  <div class="container">

    <!-- Galeria de fotos -->
    <div class="row rowSlider">
      <?php for ($i = 0; $i < count($this->album); $i++) { ?>
        <!-- <span> <?php print_r($this->album[$i]->album_nombre); ?></span> -->
        <?php $arrayFotos = $this->album[$i]->fotos;
        $tituloAlbum = $this->album[$i]->album_nombre;
        $idAlbum = $this->album[$i]->album_id; ?>


        <div class="col-sm-12 col-md-6 col-xl-4 divSlider">

          <div class="sliderGaleria">

            <?php for ($f = 0; $f < count($arrayFotos); $f++) { ?>
              <figure class="divImgGaleria">
                <a href="/images/<?php echo ($arrayFotos[$f]->fotos_foto); ?>" class="lightgallery" data-tweet-text="Mira esta imagen de Galería Café Libro" data-facebook-text="Mira esta imagen de Galería Café Libro" data-facebook-share-url="<?php echo $_SERVER['HTTP_HOST'] ?>/page/galeria/detalleImagen?id=<?php echo $idAlbum ?>" data-twitter-share-url="<?php echo $_SERVER['HTTP_HOST'] ?>/page/galeria/detalleImagen?id=<?php echo $idAlbum ?>" data-reddit-title="slide title">

                  <img class="imgSliderGaleria" data-title="Galería - Galería Café Libro <?php echo  $tituloAlbum ?>" src="/images/<?php echo ($arrayFotos[$f]->fotos_foto); ?>"  alt="Galería - Galería Café Libro <?php echo ($arrayFotos[$f]->fotos_titulo); ?>" />


                </a>
              </figure>

            <?php } ?>

          </div>

          <div class="overlay">
            <div class="row" style="height: 100%;">
              <div class="col-12 mt-1 my-2 text-center div-titulocompartir">

                <span class="titulo-galeria"><?php print_r($tituloAlbum); ?></span>

              </div>
              <div class="col-12 compartir-galeria">

                <span class="text-compartir-album">Compartir Álbum: </span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/galeria/detalle?id=<?php echo $idAlbum ?>" target="_blank">
                  <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                      <g id="Capa_1-2" data-name="Capa 1">
                        <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                      </g>
                    </svg>
                    <i class="fa-brands fa-facebook-f"></i>
                  </span>
                </a>
                <a href="https://twitter.com/intent/tweet?text=Mira%20este%20álbum%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/galeria/detalle?id=<?php echo $idAlbum ?>" target="_blank">
                  <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                      <g id="Capa_1-2" data-name="Capa 1">
                        <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                      </g>
                    </svg>
                    <i class="fa-brands fa-twitter"></i>
                  </span>
                </a>
                <a href="https://api.whatsapp.com/send?text=Mira%20este%20álbum%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/galeria/detalle?id=<?php echo $idAlbum ?>" target="_blank">
                  <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                      <g id="Capa_1-2" data-name="Capa 1">
                        <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                      </g>
                    </svg>
                    <i class="fa-brands fa-whatsapp"></i>
                  </span>
                </a>


              </div>
            </div>


          </div>
          <!--   <div class="overlay-compartir">
            <div class="text">Compartir Álbum: </div>
          </div> -->
        </div>

      <?php } ?>

    </div>



</section>









<style>
  .lg-dropdown {
    background-color: red;
  }
</style>

<script>
  // init slick slider
  $('.sliderGaleria').slick({
    dots: true,
    arrows: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
  });

  // slick light gallery
  $('.sliderGaleria').lightGallery({
    selector: '.slick-slide:not(.slick-cloned) .lightgallery',
    titleElement: 'data-title',
    pinterest: false,
    googlePlus: false,





    //selectWithin: '.slick-slide:not(.slick-cloned)'
  });
</script>