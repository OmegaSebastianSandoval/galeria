<!-- <?php echo ($this->detalle->videos_id)  ?> -->
<div align="center" style="margin-top: 200px;">
    <h2>Videos</h2>
</div>
<section class="section-galeria-videos">

    <div class="container pt-3 pb-3">
        <div class="card-video">
            <div class="video-container">
                <iframe width="560" height="315" src="<?php echo $this->detalle->videos_link ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="details">
                <h2><?php echo $this->detalle->videos_titulo ?></h2>
                <p> <?php
                    setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");

                    echo strftime('%e de %B de %Y', strtotime($this->detalle->videos_fecha));

                    ?></p>


            </div>
            <hr>

            <div class="details-compartir">


                <span class="share-text">Compartir: </span>
                <div class="share-icons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/videos/detalle?id=<?php echo $this->detalle->videos_id ?>" target="_blank">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                <g id="Capa_1-2" data-name="Capa 1">
                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                </g>
                            </svg>
                            <i class="fa-brands fa-facebook-f"></i>
                        </span>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=Mira%20este%20video%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/videos/detalle?id=<?php echo $this->detalle->videos_id ?>" target="_blank">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                <g id="Capa_1-2" data-name="Capa 1">
                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                </g>
                            </svg>
                            <i class="fa-brands fa-twitter"></i>
                        </span>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=Mira%20este%20video%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/videos/detalle?id=<?php echo $this->detalle->videos_id ?>" target="_blank">
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


    </div>
</section>