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

$fecha = new DateTime($this->compra->boleta_compra_fecha);
$dia = $fecha->format('d');
$mes = $meses[$fecha->format('F')];
$anio = $fecha->format('Y');
?>

<?php
switch ($this->tipoError) {

  case '1': ?>
    <div class="container">
      <a href="/validacion/eventos" class="btn btn-compra   p-2  my-3">
        <i class="fa-solid fa-arrow-left"></i> Volver al inicio
      </a>
      <div class="alert alert-danger">
        <h2 class="text-center">Error al validar el ticket</h2>
        <p class="text-center">El ticket no se encuentra en la base de datos o ya ha sido validado.</p>
        <p class="text-center">Por favor, verifique el código del ticket e intente nuevamente.</p>
      </div>
    </div>
    <?php break; ?>
  <?php
  case '2': ?>
    <div class="container">
      <a href="/validacion/eventos" class="btn btn-compra   p-2  my-3">
        <i class="fa-solid fa-arrow-left"></i> Volver a eventos
      </a>
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="imagen-evento">
            <img src="/images/<?= $this->compra->programacion_imagen ?>" alt="Evento" class="img-fluid" />
          </div>
        </div>
        <div class="col-12 col-md-6 position-relative">
          <h1><?= $this->compra->programacion_nombre ?></h1>
          <h2 class="mt-3 d-none">Identificador de la compra: <span><?= $this->compra->boleta_compra_id ?></span></h2>
          <div class="info mt-4">
            <h3 class="mt-3 d-none">Código del ticket: <span><?= $this->ticketInfo->ticket_uid ?></span></h3>
            <h3 class="mt-3 d-none">Fecha del evento: <span><?= $this->compra->programacion_fecha ?></span></h3>

          </div>

          <div class="info-validacion">
            <?php if ($this->ticketInfo->ticket_estado == 2) { ?>
              <h4>Estado del ticket: <span><?= $this->estadoTicket ?></span></h4>
              <h4>Fecha de la validación: <span><?= $this->ticketInfo->ticket_fecha_validacion ?></span></h4>
            <?php } else { ?>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <?php break; ?>
  <?php
  default: ?>
    <div class="container">
      <a href="/validacion/eventos" class="btn btn-compra   p-2  my-3">
        <i class="fa-solid fa-arrow-left"></i> Volver a eventos
      </a>
      <div class="alert alert-danger">
        <h2 class="text-center">Error al validar el ticket</h2>
        <p class="text-center">El ticket no se encuentra en la base de datos o ya ha sido validado.</p>
        <p class="text-center">Por favor, verifique el código del ticket e intente nuevamente.</p>
      </div>
      <?php break; ?>
  <?php
}
  ?>

  <style>
    header {
      height: 125px;
    }

    footer {
      height: 165px;
    }

    .contenedor-general {
      min-height: calc(100dvh - 290px);
      display: grid;
      place-items: center;
    }

    .imagen-evento {
      padding: 10px;
      border: 1px solid var(--color-tertiary);
    }

    h1 {
      font-size: 25px;
      font-weight: 600;
    }

    h2 {
      font-size: 20px;
      font-weight: 600;
      color: #000;
      width: 100%;
      color: var(--color-tertiary);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    h2 span {
      background-color: var(--color-amarillo);
      color: var(--color-fucsia);
      font-size: 18px;
      padding: 3px 10px;
      font-weight: 600;
    }

    h3 {
      font-size: 16px;
      font-weight: 600;
      color: #000;
      width: 100%;
      color: var(--color-tertiary);
      display: flex;
      justify-content: space-between;
      align-items: center;


    }

    h3 span {
      background-color: var(--color-amarillo);
      color: var(--color-fucsia);
      font-size: 18px;
      padding: 3px 10px;
      font-weight: 600;
    }

    h4 {
      font-size: 16px;
      font-weight: 600;
      color: #000;
      width: 100%;
      color: var(--color-tertiary);
      display: flex;
      justify-content: space-between;
      align-items: center;

    }

    h4 span {
      background-color: var(--color-rojo);
      color: #FFF;
      font-size: 18px;
      padding: 3px 10px;
      font-weight: 600;
    }

    .btn-compra {
      gap: 5px
    }

    .contenido-form {
      bottom: 0;
    }
    
  @media(width <=765px) {


.contenedor-general {
  /* min-height: auto; */
  height: auto !important;
  padding: 10px 0;
}


}
  </style>
  <!-- <div class="container">
  <div class="alert alert-danger">
    <h2 class="text-center">Error al validar el ticket</h2>
    <p class="text-center">El ticket no se encuentra en la base de datos o ya ha sido validado.</p>
    <p class="text-center">Por favor, verifique el código del ticket e intente nuevamente.</p>
  </div>
</div>
<style>
  header {
    height: 125px;
  }

  footer {
    height: 165px;
  }

  .contenedor-general {
    height: calc(100dvh - 290px);
    display: grid;
    place-items: center;
  }
</style> -->