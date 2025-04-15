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

$fecha = new DateTime($this->compra->programacion_fecha);
$dia = $fecha->format('d');
$mes = $meses[$fecha->format('F')];
$anio = $fecha->format('Y');
?>
<div class="container">
  <a href="/validacion/eventos" class="btn btn-compra   p-2  my-3">
    <i class="fa-solid fa-arrow-left"></i> Volver al inicio
  </a>
  <div class="row">
    <div class="col-12 col-md-6">
      <div class="imagen-evento">
        <img src="/images/<?= $this->compra->programacion_imagen ?>" alt="Evento" class="img-fluid" />
      </div>
    </div>
    <div class="col-12 col-md-6 position-relative">
      <h1><?= $this->compra->programacion_nombre ?></h1>
      <h2 class="mt-3">Identificador de la compra: <span><?= $this->compra->boleta_compra_id ?></span></h2>
      <div class="info">
        <h3 class="mt-3">Código del ticket: <span><?= $this->ticketInfo->ticket_uid ?></span></h3>
        <h3 class="mt-3">Fecha del evento: <span><?= $this->compra->programacion_fecha ?></span></h3>
        <h4 class="mt-3">
          Tickets validados/Tickets de la compra
          <span><?= $this->ticketsValidados ?>/<?= $this->ticketsTodos ?></span>
        </h4>
      </div>
      <div class="alert mt-3 text-center <?= $this->infoFecha["alert"] ?>">
        <i class="<?= $this->infoFecha["icono"] ?>"></i>
        <?= $this->infoFecha["mensaje"] ?><?= " $dia de $mes de $anio"; ?>
      </div>
      <div class="contenido-form position-absolute bottom-0  sticky-bottom w-100">

        <form action="/validacion/validar/registrar" class="w-100" id="formValidar">
          <input type="hidden" name="uid" value="<?= $this->ticketInfo->ticket_uid ?>">
          <input type="hidden" name="token" value="<?= $this->ticketInfo->ticket_token ?>">
          <input type="hidden" name="csrf" value="<?= $this->csrf ?>">
          <input type="hidden" name="csrf_section" value="<?= $this->csrf_section ?>">

          <button class="btn btn-compra  w-100 p-2 d-flex align-items-center gap-2 justify-content-center" type="button" <?= $this->ticketsTodos == $this->ticketsValidados  ? 'disabled' : '' ?> data-toggle="modal" data-target="#modalSubmit">
            <i class="fa-solid fa-check"></i> Validar
          </button>

          <!-- Modal -->
          <div class="modal fade" id="modalSubmit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    Validar ticket
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>¿Está seguro de validar el ticket?</p>
                  <p class="text-danger">Recuerde que una vez validado no podrá volver a validar el ticket.</p>
                </div>
                <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-outline-secondary w-100" data-dismiss="modal">Cancelar</button>
                  <button type="submit" <?= $this->ticketsTodos == $this->ticketsValidados  ? 'disabled' : '' ?> class="btn btn-dark w-100">Validar</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      </form>
    </div>
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
    min-height: calc(100dvh - 290px);
    display: grid;
    place-items: center;
  }

  .imagen-evento {
    padding: 10px;
    border: 1px solid var(--color-tertiary);
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
    background-color: var(--color-amarillo);
    color: var(--color-fucsia);
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
      min-height: auto;
      height: auto !important;
      padding: 10px 0;
    }


  }
</style>