<?php $this->res;  ?>

<div class="titulo-imagen-menu">
    <img class="imagen-titulo" src="/skins/page/images/GCL-22.png" alt="Contáctanos Imagen Galería Café Libro">
</div>
<h1 class="visually-hidden">Contáctamos Galería Café Libro</h1>
<section class="contacto justify-content-center">
    <div class="container justify-content-center">


            <?php if ($this->res == 1) { ?>
                <div align="center" class="alert alert-success"> El mensaje se envió satisfactoriamente, muy pronto nos pondremos en contacto contigo.</div>
            <?php } else if ($this->res == 2) { ?>
                <div align="center" class="alert alert-danger">EL mensaje no se pudo enviar, intente de nuevo</div>
            <?php } ?>
            <form method="POST" onsubmit="return miFuncion(this)" action="/page/contactenos/enviar">
                <div class="row justify-content-center">
                <div class="col-sm-12 col-md-4 order-sm-1 order-md-2 contacto_info">
                        <div class="informacion-contacto-noresponsive">
                            <div class="informacion-contacto">
                                <span class="text-titulo-contactanos">Contáctanos</span>
                                <p><?php echo $this->infopage->info_pagina_informacion_contacto_footer ?></p>
                            </div>

                            <div class="informacion-contacto">
                                <span class="text-titulo-contactanos">Teléfono</span>

                                <p><i class="fa-solid fa-phone"></i> <?php echo $this->infopage->info_pagina_telefono ?></p>

                            </div>

                            <div class="informacion-contacto">
                                <span  class="text-titulo-contactanos">WhatsApp: </span>

                                <p> <i class="fa-brands fa-whatsapp"></i> <?php echo $this->infopage->info_pagina_whatsapp ?></p>

                            </div>

                            <span class="text-titulo-contactanos">Nuestras redes sociales: </span>
                            <br>
                            <div class="nav-social-media">


                                <?php if ($this->infopage->info_pagina_youtube) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-youtube"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_facebook) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_instagram) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-instagram"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_twitter) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-twitter"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_linkedin) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_linkedin ?>" target="_blank">
                                        <span class="nav-icon">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_pinterest) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-twitter"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_flickr) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-flickr"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                                <?php if ($this->infopage->info_pagina_tiktok) { ?>
                                    <a href="<?php echo $this->infopage->info_pagina_tiktok ?>" target="_blank">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Capa_2" data-name="Capa 2" viewBox="0 0 50.96 39.45">
                                                <g id="Capa_1-2" data-name="Capa 1">
                                                    <path class="icon-bg" d="M25.33,39.45c-5.12-.02-10.18-.45-15.09-2.08-4.53-1.5-7.6-4.47-8.95-9.01-1.76-5.9-1.73-11.86,.21-17.72C2.92,6.32,5.94,3.51,10.26,2.12,16.53,.09,22.99-.35,29.5,.25c3.42,.32,6.86,.82,10.2,1.6,5.74,1.35,9.13,5.15,10.42,10.86,1.11,4.93,1.15,9.86-.11,14.76-1.45,5.66-5.26,8.94-10.81,10.41-4.55,1.2-9.19,1.59-13.88,1.58Z" />
                                                </g>
                                            </svg>
                                            <i class="fa-brands fa-tiktok"></i>
                                        </span>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 order-sm-2 order-md-1">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4"></label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre:" required>
                            </div>
                        </div>
                        <input type="hidden" name="reason" class="form-control" placeholder="Nombre:" >
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4"></label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail:" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4"></label>
                                <input type="number" name="telefono" class="form-control" placeholder="Teléfono:" required>
                            </div>
                        </div>
                        <!-- <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4"></label>
                            <input type="text" name="ciudad" class="form-control"  placeholder="Ciudad:" required>
                        </div>
                    </div> -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4"></label>
                                <textarea style="resize:none;" class="form-control" name="mensaje" id="" rows="4" placeholder="Mensaje:" required></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="form-check" required>

                                <input style="height:20px; font-weight: bold;" class="form-check-input" type="checkbox" id="gridCheck" required>
                                <label class="form-check-label" for="gridCheck">
                                    Política de <a href="#" style="all:unset;" data-toggle="modal" data-target="#modalPoliticas"> <span class="span-politica-contactanos"> manejo de datos.</span></a>
                                </label>
                            </div>
                            <div class="g-recaptcha mt-3" data-sitekey="6LfFDZskAAAAAE2HmM7Z16hOOToYIWZC_31E61Sr"></div>

                        </div>
                    </div>


                  
                </div>


                <div class="boton-contactenos"><button type="submit"  class="btn btn-primary btnContactenos">Enviar Mensaje</button></div>
            </form>
      
    </div>
</section>




<!-- Modal politica de datos-->
<div class="modal fade" id="modalPoliticas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f6cd03;">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->infopage->info_pagina_titulo_politica_manejo_datos ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $this->infopage->info_pagina_descripcion_politica_manejo_datos ?>
            </div>
            <div class="modal-footer" style="background-color: #f6cd03;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function miFuncion(a) {
        var response = grecaptcha.getResponse();
        // console.log(response.length);
        if (response.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Captcha no verificado',
                confirmButtonColor: '#d33',

            })
            return false;
            event.preventDefault();
        } else {
            return true;
        }
    }
</script>