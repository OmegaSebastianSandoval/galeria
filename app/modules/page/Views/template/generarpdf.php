<?php
$meses = [
  'January' => 'enero',
  'February' => 'febrero',
  'March' => 'marzo',
  'April' => 'abril',
  'May' => 'mayo',
  'June' => 'junio',
  'July' => 'julio',
  'August' => 'agosto',
  'September' => 'septiembre',
  'October' => 'octubre',
  'November' => 'noviembre',
  'December' => 'diciembre'
];

$fecha = new DateTime($this->infoVenta->boleta_compra_fecha);
$dia = $fecha->format('d');
$mes = $meses[$fecha->format('F')];
$anio = $fecha->format('Y');

$pedidoId = $this->infoVenta->boleta_compra_id;
$evento = $this->infoVenta->programacion_nombre;
$cantidad = intval($this->infoVenta->boleta_compra_cantidad);
$servicio = intval($this->infoVenta->boleta_evento_precioadicional);
$precio = intval($this->infoVenta->boleta_evento_precio);

$total = ($cantidad * $precio) + ($cantidad * $servicio);

$entidad = $this->infoVenta->entidad;
$email = $this->infoVenta->boleta_compra_email;
$lugar = $this->infoVenta->programacion_lugar;
$documento = $this->infoVenta->boleta_compra_documento;
$nombre = $this->infoVenta->boleta_compran_nombre;
?>
<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <br>

  <tr>
    <!-- Columna izquierda -->
    <td width="50%" align="center" valign="top">
      <img src="/images_sales/assets/logogaleria.png" width="140" height="140" alt="Logo" />
      <br>
      <br>
      <img src="/images/<?= $this->infoVenta->programacion_imagen; ?>" alt="<?= $this->infoVenta->programacion_nombre; ?>" title="<?= $this->infoVenta->programacion_nombre; ?>" width="450" style="border:5px solid #dc1979 " />
    </td>

    <!-- Columna derecha -->
    <td width="50%" valign="top" align="center">
      <br>
      <br>
      <table border="0" cellpadding="6" cellspacing="0" width="100%">
        <tr>
          <!-- Celda vacía que ocupa el 100% menos 200px -->
          <td width="57%">&nbsp;</td>

          <!-- Celda con el identificador -->
          <td width="200" style="background-color: #ffff00; color: #dc1979; font-size: 18px; font-weight: bold; text-align: center;">
            <?= $this->ticket->ticket_uid ?>
          </td>
        </tr>
      </table>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <!-- Información -->
      <span style="font-size: 27px; font-weight: bold; color:#fff"><?= $nombre ?></span>
      <br>
      <br>
      <span style="font-size: 25px; color: #ffcc00; font-weight: 500;"><?= $evento ?></span>
      <br>

      <span style="font-size: 25px; color: #FFF; font-weight: 500;"><?= "$dia de $mes de $anio"; ?></span>
      <br>
      <span style="font-size: 19px;color: #FFF; font-weight: 500;">$<?= $precio >= 0 ? number_format($precio * $cantidad) : $precio   ?> más servicio de $ <?= $servicio >= 0 ? number_format($servicio * $cantidad) : $servicio   ?> (IVA Incluido)</span>
      <br>
      <br>

      <table border="0" valign="top" align="center"  width="90%">
        <tr>
          <td width="70%"align="right">
            <br>
            <br>
            <br>
            <div align="center" style="text-align:end; font-size: 25px; color: #ffcc00; font-weight: 500;">
              <!-- Galería Cafe Libro -->
              <?= $lugar ?>
            </div>

          </td>
          <!-- Celda con el identificador -->
          <td width="30%">
            <img src="<?= IMAGE_QRS_PATH . $this->ticket->ticket_uid . ".png" ?>" alt="qr" width="140" height="140" />
           
          </td>
        </tr>
      </table>


      <div style="font-size: 16px; color: #FFF;">
        El ingreso es únicamente para mayores de 18 años<br />
        Te recomendamos llegar al teatro 30 minutos antes de la función<br />
        Te recordamos que solo se permite el ingreso al teatro hasta 10 minutos después de iniciada la función<br />
        Dudas o problemas puedes escribir a nuestro PQR (+57) 3045538387
      </div>
    </td>
  </tr>
</table>
