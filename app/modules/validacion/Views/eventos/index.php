<div class="container d-flex justify-content-center align-items-center flex-column">
  <div class="p-4 shadow rounded-3 bg-light text-center">

    <strong> Hola!, <?= $this->user->user_user ?>.</strong><br>
    Bienvenido al sistema de validacion de tickets y bonos.<br>
    Ya puede abrir su aplicación para escanear los códigos QR.<br>
    <br>
    <img src="/images_sales/assets/qrstock.jpg" alt="Logo QR" /><br>
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

  img {
    width: 100%;
    max-width: 140px;
    height: auto;
    padding: 10px;
  }
</style>