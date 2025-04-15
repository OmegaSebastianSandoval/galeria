<div class="titulo-imagen-sedes">
    <img class="imagen-titulo" src="/skins/page/images/GCL-36.png" alt="Detalle - Galería Café Libro">
</div>
<?php
$hoy = date('Y-m-d H:i:s');
if ($this->detalle->programacion_fecha <= $hoy) { ?>
    <div class="container">
        <div class="alert alert-warning " role="alert">
            <h4 class="alert-heading text-center">Lo sentimos, evento no encontrado</h4>



        </div>
    </div>

<?php } else { ?>



    <div class="container">

        <div class="row" style="justify-content: center;">
            <div class="col-sm-12 col-lg-6 evento">

                <img src="/images/<?php echo $this->detalle->programacion_imagen ?>" alt="Galería Café Libro - Programación <?php echo $this->detalle->programacion_nombre ?> " class="img-evento">

            </div>

            <div class="col-sm-12 col-lg-6 compra-info">

                <div class="descripcion-evento">

                    <h1><?php echo $this->detalle->programacion_nombre ?></h1>
                    <p><i class="fa-solid fa-calendar"></i>
                        <?php
                        setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                        echo strftime('%e de %B de %Y', strtotime($this->detalle->programacion_fecha));
                        ?>
                    </p>


                    <p><i class="fa-solid fa-clock"> </i> <?php echo $this->detalle->programacion_hora ?></p>
                    <p><i class="fa-solid fa-location-dot"> </i> <?php echo $this->detalle->programacion_lugar ?></p>
                    <div class="accordion acordion-descripcion" id="acordionDescripcion">
                        <button class="btn btn-block text-left collapsed btn-acordion" type="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo" onclick="ocultarAcordion()">
                            <i class="fa-solid fa-message"> </i> <span id="mostrar-ocultar-descripcion"> Ocultar descripción</span> <i class="fa-solid fa-angles-down"></i>
                        </button>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="info-descripcion" data-parent="#acordionDescripcion">
                            <div class="card-body">
                                <?php echo $this->detalle->programacion_descripcion ?>
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
                <?php if (count($this->boletas) > 0) { ?>
                    <div class="formulario-compra">
                        <form method="POST" action="/page/programacion/generarpago">
                            <div class="resaltado">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Tipo de Boleta</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control form-control-sm" id="boleta" name="tipoboleta" required>
                                            <?php foreach ($this->boletas as $key => $boleta) { ?>
                                                <option value="<?php echo $boleta->boleta_evento_id ?>" <?php if ($key == 0) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo $boleta->boleta_tipo_nombre ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="resaltado">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Cantidad</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control form-control-sm" id="cantidad" name="cantidad" required>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="padding-formulario">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Documento</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="documento" type="number" class="form-control form-control-sm" max="99999999999999" id="documento" placeholder="Documento" required>
                                    </div>
                                </div>
                            </div>
                            <div class="padding-formulario">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Nombre</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="nombre" type="text" class="form-control form-control-sm" id="nombre" maxlength="255" placeholder="Nombre" required>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="padding-formulario">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Teléfono</label>
                            </div>
                            <div class="col-sm-6">
                                <input name="telefono"type="text" class="form-control form-control-sm" id="inputEmail3" placeholder="Telefono" required>
                            </div>
                        </div>
                    </div>
                    -->
                            <div class="padding-formulario">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">E-mail</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="email" type="email" class="form-control form-control-sm" id="inputPassword3" placeholder="E-mail" required>
                                    </div>
                                </div>
                            </div>
                            <div class="padding-formulario">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Fecha nacimiento</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="fechanacimiento" type="date" class="form-control form-control-sm" id="" placeholder="Fecha de nacimiento" max="<?php echo date('Y-m-d', strtotime('-15 years')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!--
                    <div class="padding-formulario">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Fecha Expedición Cédula</label>
                        </div>
                        <div class="col-sm-6">
                            <input name="fecha" type="date" class="form-control form-control-sm" id="inputPassword3" placeholder="Fecha Expedición Cédula" required>
                        </div>
                    </div>
                    </div>
                    -->
                            <div class="resaltado">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Código Promocional</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-7">
                                                <input name="idevento" id="idevento" type="hidden" class="form-control form-control-sm" value="<?php echo $this->detalle->programacion_id ?>">

                                                <input name="codigo" id="codigo" type="text" class="form-control form-control-sm" placeholder="Código Promocional">
                                            </div>
                                            <div class="col-5">
                                                <input type="button" value="Aplicar" class="btn btn-verdeD btn-sm" onclick="aplicar_codigo();" />
                                            </div>
                                            <div id="error_codigo" class="col-12"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="valores">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Sub Total</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="txtsubtotal"></div>
                                        <input type="hidden" id="subtotal" name="subtotal">
                                    </div>
                                </div>
                            </div>
                            <div class="valores" id="subtotal2">
                            </div>
                            <div class="valores">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Servicio</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="txtservicio"></div>
                                        <input type="hidden" id="servicio" name="servicio">
                                    </div>
                                </div>
                            </div>
                            <div class="valores">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <label for="">Total</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="txttotal"></div>
                                        <input type="hidden" id="total" name="total">
                                    </div>
                                </div>
                            </div>
                            <div class="div-checkTerminos accordion " id="accordionExample" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor:pointer">
                                <div class="row">
                                    <div class="col-12">

                                        <input type="checkbox" id="checkTerminos" required>
                                        <label for="checkTerminos">Política de venta: </label>
                                        <!-- <button type="button" class="btn btn-politicas" data-toggle="modal" data-target="#modalPoliticaVenta">Ver más</button> -->

                                    </div>
                                </div>



                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body body-modal">
                                        <?php echo $this->detalle->programacion_descripcion_politica ?>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <input type="hidden" id="vendor" name="vendor" value="<?php if ($this->vendor == "") {
                                                                                        echo "Galeria Cafe Libro";
                                                                                    } else {
                                                                                        echo $this->vendor;
                                                                                    } ?>">


                            <div class="padding-formulario text-right">
                                <button type="submit" class="btn btn-amarillo">Comprar</button>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    </br>
    </br>


    <!-- Modal -->
    <div class="modal fade" id="modalPoliticaVenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header header-modal">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo $this->detalle->programacion_titulo_politica ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body-modal">
                    <?php echo $this->detalle->programacion_descripcion_politica ?>
                </div>
                <div class="modal-footer footer-modal">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    function precios() {
        let res = null
        var boleta = $("#boleta").val();
        $.get("/page/programacion/precios?id=" + boleta, function(response) {

            (typeof response === "object") ? res = response: res = JSON.parse(response)

            //  console.log(res)

            var cantidaboletas = parseInt(res.cantidad);
            newoption(cantidaboletas);
            var cantidad = $("#cantidad").val();
            var subtotal = res.precio * cantidad;
            var servicio = res.servicio * cantidad;
            var total = parseInt(subtotal) + parseInt(servicio);
            $("#txtsubtotal").html(number_format(subtotal));
            $("#txtservicio").html(number_format(servicio));
            $("#txttotal").html(number_format(total));
            $("#total").val(total);
            $("#subtotal").val(subtotal);
            $("#servicio").val(servicio);
        });
    }

    function newoption(cantidad) {
        var actual = $("#cantidad").val();
        if (parseInt(cantidad) > 20) {
            cantidad = 20;
        }
        $("#cantidad").html('');
        for (let i = 1; i <= parseInt(cantidad); i++) {
            if (parseInt(i) == parseInt(actual)) {
                $('#cantidad').append('<option value="' + i + '" selected="selected">' + i + '</option>');
            } else {
                $('#cantidad').append('<option value="' + i + '" >' + i + '</option>');
            }
        }
    }
    $("#boleta").on("change", function() {
        precios();
    });
    $("#cantidad").on("change", function() {
        precios();
    });
    precios();


    function aplicar_codigo() {
        var codigo = $("#codigo").val();
        var total = $("#total").val();
        var idevento = $("#idevento").val();

        if (total > 0) {
            $.post("/page/programacion/validarcodigo/", {
                "codigo": codigo,
                "idevento": idevento,
            }, function(res) {
                console.log(res);
                var error = '';
                var subtotal = document.getElementById("subtotal").value;
                var subtotal2 = 0;
                var total = 0;
                subtotal = Number(subtotal);
                valor = Number(res.valor);
                porcentaje = Number(res.porcentaje);

                if (res.existe == "1") {
                    if ((res.tipo == "1" && res.usado == "0") || res.tipo == "2") {
                        if (valor > 0) {
                            subtotal2 = subtotal - valor;
                        }
                        if (porcentaje > 0) {
                            subtotal2 = subtotal * (1 - porcentaje / 100);
                            subtotal2 = subtotal2.toFixed(0);
                        }

                        document.getElementById("subtotal2").innerHTML = '<div class="row"><div class="col-sm-6"><label for="">Sub Total con Descuento</label></div><div class="col-sm-6">' + number_format(subtotal2) + '</div></div>';
                        var servicio = document.getElementById("servicio").value;
                        var total = Number(subtotal2) + Number(servicio);

                        document.getElementById("total").value = total;
                        document.getElementById("txttotal").innerHTML = number_format(total);
                    } else {
                        error = "<?php echo ("el código ya fue usado"); ?>";
                    }
                } else if (res.existe == "3") {
                    error = '<?php echo ("el código no es válido"); ?>';

                } else {
                    error = '<?php echo ("el código no es válido"); ?>';
                }
                document.getElementById('error_codigo').innerHTML = error;

            });

        }
    }


    function number_format(number, decimals = 0, dec_point = ',', thousands_sep = '.') {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }





    function ocultarAcordion() {
        $('#collapseTwo').collapse('toggle');

        const icon = document.querySelector('.fa-solid.fa-angles-down');
        icon.classList.toggle('rotate');


        const acordion = document.querySelector('#collapseTwo')
        const span = document.querySelector('#mostrar-ocultar-descripcion')

        $('#collapseTwo').on('shown.bs.collapse', function() {
            span.innerHTML = `<span>Ocultar descripción</span>`

        }).on('hidden.bs.collapse', function() {
            span.innerHTML = `<span>Mostrar descripción</span>`

        })


    }
</script>

<script>
    document.getElementById("documento").addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    document.getElementById("nombre").addEventListener("input", function() {
        this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]/g, '');
    });
</script>