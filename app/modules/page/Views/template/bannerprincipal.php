<div class="fondo-banner-principal">
  <div class="slider-principal">
    <div id="carouselprincipal<?php echo $this->seccionbanner;  ?>" class="carousel slide" data-ride="carousel">
              <?php if (is_countable($this->banners) && count($this->banners) >= 2) { ?>

      <ol class="carousel-indicators">
        <?php foreach ($this->banners as $key => $banner){ ?>
        <li data-target="#carouselprincipal<?php echo $this->seccionbanner;  ?>" data-slide-to="0" <?php if($key==0
                    ){ ?>class="active" <?php }  ?>></li>
        <?php } ?>
      </ol>
            <?php } ?>

      <div class="carousel-inner">
        <?php foreach ($this->banners as $key => $banner){ ?>
          <?php if($banner->publicidad_enlace){ ?>
            <a href="<?php echo $banner->publicidad_enlace ?>" class="carousel-item <?php if($key == 0){ ?>active <?php } ?>"  <?php if($banner->publicidad_tipo_enlace == 1){ ?> target="_blank" <?php } ?> >
              <div class="contenedor-carrusel">
                <?php if($this->id_youtube($banner->publicidad_video) != false){ ?>
                  <div class="fondo-video-youtube">
                    <div class="banner-video-youtube" id="videobanner<?php echo $banner->publicidad_id;?> " data-video="<?php echo $this->id_youtube($banner->publicidad_video); ?>"></div>
                  </div>
                <?php } else { ?>
                  <div class="fondo-banner">
                    <img src="/images/<?php echo $banner->publicidad_imagen; ?>" alt="Galería Café Libro - Banner <?php echo $banner->publicidad_nombre; ?>">
                  </div>
                  <div class="fondo-imagen-responsive">
                    <img src="/images/<?php echo $banner->publicidad_imagenresponsive; ?>" alt="Galería Café Libro - Banner <?php echo $banner->publicidad_nombre; ?>">
                  </div>
                  <div class="banner-content">
                    <?php echo $banner->publicidad_descripcion ?>
                  </div>
                <?php } ?>
              </div>
            </a>
          <?php } else { ?>
            <div class="carousel-item <?php if($key == 0){ ?>active <?php } ?>">
              <div class="contenedor-carrusel">
                <?php if($this->id_youtube($banner->publicidad_video) != false){ ?>
                  <div class="fondo-video-youtube">
                    <div class="banner-video-youtube" id="videobanner<?php echo $banner->publicidad_id;?> " data-video="<?php echo $this->id_youtube($banner->publicidad_video); ?>"></div>
                  </div>
                <?php } else { ?>
                  <div class="fondo-banner">
                    <img src="/images/<?php echo $banner->publicidad_imagen; ?>" alt="Galería Café Libro - Banner <?php echo $banner->publicidad_nombre; ?>">
                  </div>
                  <div class="fondo-imagen-responsive">
                    <img src="/images/<?php echo $banner->publicidad_imagenresponsive; ?>" alt="Galería Café Libro - Banner <?php echo $banner->publicidad_nombre; ?>">
                  </div>
                  <div class="banner-content">
                    <?php echo $banner->publicidad_descripcion ?>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    <?php if (is_countable($this->banners) && count($this->banners) >= 2) { ?>
      <a class="carousel-control-prev" href="#carouselprincipal<?php echo $this->seccionbanner;  ?>" role="button"
        data-slide="prev">
        <span class="carrusel-izquierda" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselprincipal<?php echo $this->seccionbanner;  ?>" role="button"
        data-slide="next">
        <span class="carrusel-derecha" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="sr-only">Next</span>
      </a> 
     <?php } ?>
    </div>
  </div>
</div>