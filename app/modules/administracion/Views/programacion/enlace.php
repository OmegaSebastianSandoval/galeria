<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-3 mb-3">
                <h3 class="text-center">Enlace</h3>
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <input id="enlace" class="form-control w-100" type="text" value="<?php echo $this->texto ?>">
        </div>
        <div class="col-md-12 d-flex justify-content-center pt-3">
            <button class="btn btn-copiar btn-success" data-clipboard-target="#enlace">Copiar al portapapeles</button>           
        </div>

        <hr>

        <div class="col-md-12 mt-3 mb-3">
            <h3 class="text-center">Codigo QR</h3>
        </div>
        <div class="col-md-12 d-flex justify-content-center">

            <?php QRcode::png($this->texto, $this->ruta, $this->level, $this->tamanio, $this->framsize); ?>
            <img src="https://www.galeriacafelibro.com.co/images/<?php echo $this->nombre ?><?php echo $this->fecha ?>.png" download="https://www.galeriacafelibro.com.co/images/<?php echo $this->nombre ?><?php echo $this->fecha ?>.png" alt="">
        </div>
        <div class="col-md-12 d-flex justify-content-center pt-3">
            <a class="btn btn-danger" href="/images/<?php echo $this->nombre ?><?php echo $this->fecha ?>.png" download="<?php echo $this->nombre ?><?php echo $this->fecha ?>.png">Descargar imagen</a>           
        </div>
    </div>
</div>


<script>
    var clipboard = new Clipboard('.btn-copiar');
</script>

