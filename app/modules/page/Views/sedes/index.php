
<div class="titulo-imagen-sedes">
    <img class="imagen-titulo" src="/skins/page/images/titulo-sedes.png" alt="Sedes de Galer&iacute;a Caf&eacute; Libro en Bogot&aacute;">
</div>
<h1 class="visually-hidden">Sedes Galer&iacute;a Caf&eacute; Libro</h1>
<div class="container divSedes">
    <div class="row">
        <?php foreach ($this->sedes as $key => $sede) { ?>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 my-3">
                <div class="card cardSedes shadow h-100 mx-auto" id="cardSede-<?php echo $sede->sede_id ?>">
                    <div class="divCardImageSede">
                        <img src="/images/<?php echo $sede->sede_imagen ?>" class="cardImage" alt="Sede - Galer&iacute;a Caf&eacute; Libro  <?php echo $sede->sede_nombre ?>">
                    </div>
                    <ul class="list-group list-group-flush">

                        <div class="card-body text-center">
                            <h5 class="card-title titulo-cardSede">Sede - <?php echo $sede->sede_nombre ?></h5>

                            <div class="sede-info">
                                <span class="card-text texto-card text-cardSede">
                                    <i class="fa-solid iconoSede fa-diamond-turn-right"></i> <?php echo $sede->sede_direccion ?>
                                </span>
                                <span class="card-text texto-card text-cardSede">
                                    <i class="fa-solid iconoSede fa-phone"></i> <?php echo $sede->sede_telefono ?>
                                </span>
                            </div>

                            <div class="sede-descripcion mt-3">
                                <h5>Información adicional</h5>
                                <?php echo $sede->sede_descripcion ?>
                            </div>




                        </div>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<iframe src="https://www.google.com/maps/d/u/1/embed?mid=1_82j1xNCV9hQnAp1b8_LHJhkeG6ahmA&ehbc=2E312F&noprof=1" width="640" height="480"></iframe>

<style>
    iframe {
        width: 100% !important;
        /* height: auto !important; */
        aspect-ratio: 16/9;
    }
</style>