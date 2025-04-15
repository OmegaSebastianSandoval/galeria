<div class="container alto">


	<?php
	/* echo "<pre>";
	print_r($this->response); */
	// list_states	?>


	<div align="center">
		<h1>
			RESUMEN TRANSACCIÓN
		</h1>
	</div>

	<div class="tablaprincipal col-12">
		<div class="titulo_tabla1 row">
			<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Estado de la transacción</b></div>
			<div class="titulolinearespuesta col-sm-12 col-md-6">
				<span class=" text-uppercase h3 font-weight-bold text-">
					<?php echo $this->response->x_transaction_state; ?>
				</span>
			</div>
		</div>
		<hr>
		<div class="titulo_tabla1 row">
			<div class="titulolinearespuesta col-sm-12 col-md-6"><b>ID de la transacción</b></div>
			<div class="titulolinearespuesta col-sm-12 col-md-6">
				<?php echo $this->response->x_transaction_id; ?>

			</div>
		</div>
		<hr>

		<div class="titulo_tabla1 row">
			<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Fecha de la transacción</b></div>
			<div class="titulolinearespuesta col-sm-12 col-md-6">
				<?php echo $this->response->x_fecha_transaccion; ?>
			</div>
		</div>
		<hr>

		<!-- <div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Referencia de la transacción</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6">
				<?php echo $this->response->x_transaction_id; ?>
				</div>
			</div>
			<hr> -->


		<div class="titulo_tabla1 row">
			<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Valor total</b></div>
			<div class="titulolinearespuesta col-sm-12 col-md-6">
				$<?php echo number_format($this->response->x_amount); ?>
			</div>
		</div>
		<hr>

		<div class="titulo_tabla1 row">
			<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Moneda</b></div>
			<div class="titulolinearespuesta col-sm-12 col-md-6">
				<?php echo $this->response->x_currency_code; ?>
			</div>
		</div>
		<hr>

		<div class="titulo_tabla1 row">
			<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Descripción</b></div>
			<div class="titulolinearespuesta col-sm-12 col-md-6">
				<?php echo $this->response->x_description; ?>
			</div>
		</div>
		<hr>

		<div class="titulo_tabla1 row">
			<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Entidad:</b></div>
			<div class="titulolinearespuesta col-sm-12 col-md-6">
				<?php echo $this->response->x_bank_name; ?>

			</div>
			<hr>

			<?php
			$estadoTransaccion = $this->response->x_cod_transaction_state;

			$texto = '';

			switch ($estadoTransaccion) {
				case 1:
					$texto = '
						<p class="text-center mt-5">
							Estamos procesando tu solicitud y en breve recibirás la confirmación. Mientras tanto, prepárate para recibir un <strong>código QR con los detalles de tu compra</strong>. ¡Gracias por tu paciencia!
						</p>
					';
					break;
				case 2:
					$texto = '
						<p class="text-center mt-5">
							La transacción fue rechazada. Por favor, revisa los detalles y vuelve a intentarlo. Si necesitas ayuda, no dudes en contactarnos.
						</p>
					';
					break;
				case 3:
					$texto = '
						<p class="text-center mt-5">
							Tu transacción se encuentra pendiente de aprobación. Por favor, ten en cuenta que este proceso puede tardar hasta 20 minutos. Te notificaremos tan pronto como tengamos una respuesta.
						</p>
					';
					break;
				case 4:
					$texto = '
						<p class="text-center mt-5">
							Ocurrió un error y la transacción no pudo completarse. Por favor, verifica la información proporcionada e intenta nuevamente. Si el problema persiste, comunícate con nuestro soporte.
						</p>
					';
					break;
				case 6:
					$texto = '
						<p class="text-center mt-5">
							El dinero ha sido reintegrado al cliente pagador. Si necesitas más detalles o asistencia, no dudes en contactarnos.
						</p>
					';
					break;
				case 7:
					$texto = '
						<p class="text-center mt-5">
							La transacción está retenida mientras nuestro equipo de auditoría realiza la validación. Te informaremos tan pronto como tengamos más información.
						</p>
					';
					break;
				case 8:
					$texto = '
						<p class="text-center mt-5">
							Tu transacción ha sido iniciada. Estamos trabajando en ella y te notificaremos pronto con los detalles. Gracias por tu paciencia.
						</p>
					';
					break;
				case 9:
					$texto = '
						<p class="text-center mt-5">
							La transacción ha caducado debido a la falta de pago en el tiempo especificado. Si deseas realizar la compra, por favor, inicia una nueva transacción.
						</p>
					';
					break;
				case 10:
					$texto = '
						<p class="text-center mt-5">
							Parece que cerraste el navegador antes de completar el proceso. Si aún deseas realizar la compra, por favor, vuelve a intentarlo. Estamos aquí para ayudarte.
						</p>
					';
					break;
				case 11:
					$texto = '
						<p class="text-center mt-5">
							Has cancelado el proceso antes de su conclusión, pero la información ya ha sido registrada. Si necesitas asistencia o deseas continuar, por favor, contáctanos.
						</p>
					';
					break;
			}

			echo $texto;
			?>

		</div>




	</div>
	
	  <script>
    function getQueryParam(param) {
      location.search.substr(1)
        .split("&")
        .some(function(item) { // returns first occurence and stops
          return item.split("=")[0] == param && (param = item.split("=")[1])
        })
      return param
    }
    $(document).ready(function() {
      //llave publica del comercio

      //Referencia de payco que viene por url
      var ref_payco = getQueryParam('ref_payco');
      //Url Rest Metodo get, se pasa la llave y la ref_payco como paremetro
      var urlapp = "https://secure.epayco.co/validation/v1/reference/" + ref_payco;

      $.get(urlapp, function(response) {


        if (response.success) {

          if (response.data.x_cod_response == 1) {
            //Codigo personalizado
            alert("Transaccion Aprobada");

            console.log('transacción aceptada');
          }
          //Transaccion Rechazada
          if (response.data.x_cod_response == 2) {
            console.log('transacción rechazada');
          }
          //Transaccion Pendiente
          if (response.data.x_cod_response == 3) {
            console.log('transacción pendiente');
          }
          //Transaccion Fallida
          if (response.data.x_cod_response == 4) {
            console.log('transacción fallida');
          }

          $('#fecha').html(response.data.x_transaction_date);
          $('#respuesta').html(response.data.x_response);
          $('#referencia').text(response.data.x_id_invoice);
          $('#motivo').text(response.data.x_response_reason_text);
          $('#recibo').text(response.data.x_transaction_id);
          $('#banco').text(response.data.x_bank_name);
          $('#autorizacion').text(response.data.x_approval_code);
          $('#total').text(response.data.x_amount + ' ' + response.data.x_currency_code);


        } else {
          alert("Error consultando la información");
        }
      });

    });
  </script>

	<!-- <div class="col-12" style="visibility: hidden;">
					<br>
					<?php /* QRcode::png($this->texto, $this->ruta, $this->level, $this->tamanio, $this->framsize); */ ?>
					<span> Puedes descargar el código QR, también se envió al correo con el cual realizaste el pago</span>
					<div class="contenedor-qr"> -->
	<!-- <img src="http://newgaleriacafelibro.omegasolucionesweb.com/images/<?php echo $transactionId ?>.png" alt="qr registro compra">  -->
	<!-- <img src="https://www.galeriacafelibro.com.co/images/<?php echo $this->id ?>.png">

						<a class="btn btn-danger btn-block" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/images/<?php echo $this->id ?>.png" download>
							Descargar QR
						</a>
					</div>



				</div> -->