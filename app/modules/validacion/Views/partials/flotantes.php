

 <div class="floating-btn d-none">


 <?php foreach ($this->botones as $key => $boton) { ?>

     <a href="<?php echo $boton->publicidad_enlace ?>" target="<?php echo $boton->publicidad_tipo_enlace == 1 ? '_blank' : '' ?>">
         <img src="/images/<?php echo $boton->publicidad_imagen ?>" alt="Botón Flotante - Galería Café Libro <?php echo $boton->publicidad_nombre ?> ">
     </a>
<!--      <a href="/page/programacion/reserva">
         <img src="/skins/page/images/GCL_reserva.png" alt="floating button">
     </a> -->
     <?php } ?>
 </div>

