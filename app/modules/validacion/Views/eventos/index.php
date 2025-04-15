<div class="container d-flex justify-content-center align-items-center flex-column">
  <div class="p-4 shadow rounded-3 bg-light text-center">

    <strong> Hola!, <?= $this->user->user_user ?>.</strong><br>
    Bienvenido al sistema de validacion de tickets.<br>
    Ya puede abrir su aplicación para escanear los códigos QR.<br>
    <button onclick="startScanner()">Escanear QR</button>
    <div id="reader" style="width:300px;"></div>
    <div id="result"></div>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
      function startScanner() {
        const qr = new Html5Qrcode("reader");
        qr.start({
            facingMode: "environment"
          }, {
            fps: 10,
            qrbox: 250
          },
          (decodedText) => {
            document.getElementById("result").innerText = "QR: " + decodedText;
            qr.stop();
          }
        );
      }
    </script>



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