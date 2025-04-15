<div class="titulo-imagen-menu-detalle">
    <img class="imagen-titulo" src="/skins/page/images/titulo-menu.png" alt="Titulo Menu">
</div>
<section>

    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($this->resta as $key => $menu) { ?>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="card cardMenu  mt-3 mx-auto">
                        <div class="divCardImage">
                            <img src="/images/<?php echo $menu->menu_imagen ?>" class="cardImage" alt="Imagen menu">
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title titulo-card">Sede - <?php echo $menu->menu_nombre ?></h5>
                            <!-- <p class="card-text"></p> -->
                            <a href="/page/carta/detalleCarta?id=<?php echo $menu->menu_id ?>" class="btn btn-primary mx-auto  btnCard btn-lg btn-block">Ver menú</a>
                            <!--  <a href="/files/<?php echo $menu->menu_restaurante ?>" class="btn btn-primary mx-auto  btnCard btn-lg btn-block" target="_blank">Menú Restaurante</a>
                        <a href="/files/<?php echo $menu->menu_bar ?>" class="btn btn-primary mx-auto  btnCard btn-lg btn-block" target="_blank">Menú Bar</a>
 -->

                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>