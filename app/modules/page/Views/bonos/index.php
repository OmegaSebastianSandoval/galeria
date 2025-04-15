
<div class="fondo-teatro" style="position: relative;">

    <div class="titulo-imagen-sedes mb-3">
        <img class="imagen-titulo" src="/skins/page/images/GCL-35.png" alt="Titulo Galeria">
    </div>
    <div align="center" class="titulo-fotos-galeria">
        <h1>Bonos Regalo Galería Café Libro</h2>
    </div>
</div>
<section class="section-programacion  section-eventos">
    <div class="container contenedorTeatro">
        <div class="row row-programacion justify-content-center">
            <?php foreach ($this->programacion as $key => $data) { ?>
                <?php $programacion = $data['detalle'] ?>
                <?php $descripcion = $programacion->programacion_descripcion ?>

                <div class="col-sm-12 col-md-12 col-lg-4  col-programacion">

                    <div class="card card-programacion">
                        <div class="div-img-programacion">
                            <img src="/images/<?php echo $programacion->programacion_imagen ?>"  alt="Bonos Regalo - Galería Café Libro <?php echo $programacion->programacion_nombre ?>" class="card-img-top card-img-programacion">
                        </div>
                        <div class="card-body card-body-programacion">
                            <h5 class="card-title titulo-card-programacion"><?php echo $programacion->programacion_nombre ?></h5>
                            <p><i class="fa-solid fa-calendar"></i> <span>
                                    <?php
                                    setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");

                                    echo strftime('%e de %B de %Y', strtotime($programacion->programacion_fecha));

                                    ?>
                                </span></p>
                            <p><i class="fa-solid fa-clock"></i> <span><?php echo $programacion->programacion_hora ?></span></p>
                            <p><i class="fa-solid fa-dollar-sign"></i> <span><?php echo $programacion->programacion_costo ?></span></p>
                            <p><i class="fa-solid fa-location-dot"></i> <span><?php echo $programacion->programacion_lugar ?></span></p>
                            <p><i class="fa-solid fa-message"></i>

                                <?php
                                echo "<button type='button' class='btn btn-primary btn-descripcion' data-toggle='modal' data-target='#modalDescripcion' data-texto='$descripcion
                             '>Ver descripción </button>";
                                ?>


                            </p>
                            <!-- Modal -->


                        </div>

                        <div class="card-footer card-footer-programacion">
                            <div class="row">
                                <?php if ($data["boleteria"]) { ?>
                                    <div class="col-md-6">
                                        <a class="card-link btn btn-block btn-compra mt-1" href="/page/programacion/detalle?id=<?php echo $programacion->programacion_id; ?>">Comprar</a>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                    <?php } else { ?>
                                        <div class="col-12">
                                        <?php } ?>
                                        <a class="card-link btn btn-block btn-reserva mt-1" href="/page/programacion/reserva?id=<?php echo $programacion->programacion_id; ?>">Reservar en Línea</a>
                                        </div>
                                    </div>

                            </div>

                            <div class="social-buttons-programacion">

                                <div class="social-buttons-list-programacion">
                                    <span>Compartir: </span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $_SERVER['HTTP_HOST'] ?>/page/proprogramacion/detalle?id=<?php echo $programacion->programacion_id ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </span>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=Mira%20la%20programación%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/proprogramacion/detalle?id=<?php echo $programacion->programacion_id ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-twitter"></i>
                                        </span>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text=Mira%20la%20programación%20de%20Galería%20Café%20Libro%20<?php echo $_SERVER['HTTP_HOST'] ?>/page/proprogramacion/detalle?id=<?php echo $programacion->programacion_id ?>" target="_blank">
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

                <?php } ?>
                </div>

                <ul class="pagination justify-content-center">
                    <?php
                    $url = '/page/programacion';
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
                <!-- <div class="boton-anteriores" align="center">
                    <a class="btn btn-anteriores" href="/page/anterioreseventosculturales">Eventos Anteriores</a>
                </div> -->
        </div>
</section>



<!-- Modal -->
<div class="modal fade modaldesc" id="modalDescripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header header-modal">
                <h5 class="modal-title" id="exampleModalLabel">Descripción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body body-modal">

            </div>
            <div class="modal-footer footer-modal">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#modalDescripcion').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var texto = button.data('texto');
            var modal = $(this);
            modal.find('.modal-body').html(texto);
        });
    });
</script>
