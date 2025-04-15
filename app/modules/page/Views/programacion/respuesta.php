<div class="container">
	<div class="row justify-content-center" style="margin-top:100px">
		<div class="col-lg-8 col-lg-offset-2 ">
			<h4 style="text-align:left"> Respuesta de la Transacción </h4>
			<hr>
		</div>
		<div class="col-lg-8 col-lg-offset-2 ">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>Referencia</td>
							<td id="referencia"></td>
						</tr>
						<tr>
							<td class="bold">Fecha</td>
							<td id="fecha" class=""></td>
						</tr>
						<tr>
							<td>Respuesta</td>
							<td id="respuesta"></td>
						</tr>
						<tr>
							<td>Motivo</td>
							<td id="motivo"></td>
						</tr>
						<tr>
							<td class="bold">Banco</td>
							<td class="" id="banco">
						</tr>
						<tr>
							<td class="bold">Recibo</td>
							<td id="recibo"></td>
						</tr>
						<tr>
							<td class="bold">Total</td>
							<td class="" id="total">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="mensaje"></div>



		</div>
	</div>
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
				var estadoTransaccion = response.data.x_cod_transaction_state; // Aquí asigna el valor correspondiente, por ejemplo: estadoTransaccion = 1;
				var texto = '';

				switch (estadoTransaccion) {
					case 1:
						texto = `
            <p class="text-center mt-5">
                Estamos procesando tu solicitud y en breve recibirás la confirmación. Mientras tanto, prepárate para recibir un <strong>correo con los detalles de tu compra</strong>. ¡Gracias por tu paciencia!
            </p>
        `;
						break;
					case 2:
						texto = `
            <p class="text-center mt-5">
                La transacción fue rechazada. Por favor, revisa los detalles y vuelve a intentarlo. Si necesitas ayuda, no dudes en contactarnos.
            </p>
        `;
						break;
					case 3:
						texto = `
            <p class="text-center mt-5">
                Tu transacción se encuentra pendiente de aprobación. Por favor, ten en cuenta que este proceso puede tardar hasta 20 minutos. Te notificaremos tan pronto como tengamos una respuesta.
            </p>
        `;
						break;
					case 4:
						texto = `
            <p class="text-center mt-5">
                Ocurrió un error y la transacción no pudo completarse. Por favor, verifica la información proporcionada e intenta nuevamente. Si el problema persiste, comunícate con nuestro soporte.
            </p>
        `;
						break;
					case 6:
						texto = `
            <p class="text-center mt-5">
                El dinero ha sido reintegrado al cliente pagador. Si necesitas más detalles o asistencia, no dudes en contactarnos.
            </p>
        `;
						break;
					case 7:
						texto = `
            <p class="text-center mt-5">
                La transacción está retenida mientras nuestro equipo de auditoría realiza la validación. Te informaremos tan pronto como tengamos más información.
            </p>
        `;
						break;
					case 8:
						texto = `
            <p class="text-center mt-5">
                Tu transacción ha sido iniciada. Estamos trabajando en ella y te notificaremos pronto con los detalles. Gracias por tu paciencia.
            </p>
        `;
						break;
					case 9:
						texto = `
            <p class="text-center mt-5">
                La transacción ha caducado debido a la falta de pago en el tiempo especificado. Si deseas realizar la compra, por favor, inicia una nueva transacción.
            </p>
        `;
						break;
					case 10:
						texto = `
            <p class="text-center mt-5">
                Parece que cerraste el navegador antes de completar el proceso. Si aún deseas realizar la compra, por favor, vuelve a intentarlo. Estamos aquí para ayudarte.
            </p>
        `;
						break;
					case 11:
						texto = `
            <p class="text-center mt-5">
                Has cancelado el proceso antes de su conclusión, pero la información ya ha sido registrada. Si necesitas asistencia o deseas continuar, por favor, contáctanos.
            </p>
        `;
						break;
					default:
						// Puedes manejar el caso por defecto, si lo deseas
						texto = `
            <p class="text-center mt-5">
                Estado de transacción desconocido.
            </p>
        `;
				}

				// Aquí puedes insertar el texto en tu documento, por ejemplo en un div con id "mensaje":
				document.getElementById('mensaje').innerHTML = texto;
			

              
				// Enviar el objeto como JSON usando fetch
				fetch('/page/programacion/respuesta2/', {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json' // Indicamos que enviamos JSON
						},
						body: JSON.stringify(response.data) // Convertimos el objeto a una cadena JSON
					})
					.then(res => res.json())
					.then(data => {
						console.log("Respuesta del servidor:", data);
					})
					.catch(error => {
						console.error("Error al enviar los datos:", error);
					});
			} else {
				alert("Error consultando la información");
			}
		});

	});
</script>
</body>

</html>