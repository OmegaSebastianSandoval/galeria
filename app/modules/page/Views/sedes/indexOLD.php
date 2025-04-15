<div class="titulo-imagen-sedes">
    <img class="imagen-titulo" src="/skins/page/images/titulo-sedes.png" alt="Titulo Galeria">
</div>
<section class="section-sedes">
    <img class="" src="/skins/page/images/sedes_r.png" alt="">

    <div class="container divSedes">
        <!-- <?php print_r($this->sedes); ?> -->

        <div class="row">
            <?php foreach ($this->sedes as $key => $sede) { ?>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="card cardSedes  mt-3 mx-auto" >
                        <div class="divCardImageSede">
                            <img src="/images/<?php echo $sede->sede_imagen ?>" class="cardImage" alt="Imagen menu">
                        </div>
                        <ul class="list-group list-group-flush">

                            <div class="card-body text-center">
                                <h5 class="card-title titulo-cardSede">Sede - <?php echo $sede->sede_nombre ?></h5>
                                <p class="card-text texto-card text-cardSede"><i class="fa-solid iconoSede fa-diamond-turn-right"></i> <?php echo $sede->sede_direccion ?>
                                    &nbsp; &nbsp;
                                    <i class="fa-solid iconoSede fa-phone"></i> <?php echo $sede->sede_telefono ?>
                                </p>
                                <!-- <p class="card-text  texto-card text-cardSede"><i class="fa-solid fa-phone"></i> <?php echo $sede->sede_telefono ?></p> -->

                            </div>
                        </ul>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
</section>