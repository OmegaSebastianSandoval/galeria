<div class="container alto">
	<?php
	//cambiar por la producción después de las pruebas
	//$ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
	
    $ApiKey = "m2zwYiTtLuZ5EE0fMskv5nYAy0";

	$merchant_id = $_REQUEST['merchantId'];
	$referenceCode = $_REQUEST['referenceCode'];
	$TX_VALUE = $_REQUEST['TX_VALUE'];
	$New_value = number_format($TX_VALUE, 1, '.', '');
	$currency = $_REQUEST['currency'];
	$transactionState = $_REQUEST['transactionState'];
	$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
	$firmacreada = md5($firma_cadena);
	$firma = $_REQUEST['signature'];
	$reference_pol = $_REQUEST['reference_pol'];
	$cus = $_REQUEST['cus'];
	$extra1 = $_REQUEST['description'];
	$pseBank = $_REQUEST['pseBank'];
	$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
	$transactionId = $_REQUEST['transactionId'];

	if ($_REQUEST['transactionState'] == 4) {
		$estadoTx = "Transacción aprobada";
	} else if ($_REQUEST['transactionState'] == 6) {
		$estadoTx = "Transacción rechazada";
	} else if ($_REQUEST['transactionState'] == 104) {
		$estadoTx = "Error";
	} else if ($_REQUEST['transactionState'] == 7) {
		$estadoTx = "Transacción pendiente";
	} else {
		$estadoTx = $_REQUEST['mensaje'];
	}


	if (strtoupper($firma) == strtoupper($firmacreada)) { ?>
		<div align="center">
			<h1>
				RESUMEN TRANSACCIÓN
			</h1>
		</div>

		<div class="tablaprincipal col-12">
			<div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b >Estado de la transacción</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6"><span class=" text-uppercase h3 font-weight-bold text-<?php
			
				  if ( $_REQUEST['transactionState'] == 4) {
					echo 'success';} else if ($_REQUEST['transactionState'] == 6) {echo 'danger';}
				?> "><?php echo $estadoTx; ?></span></div>
			</div>
			<hr>
			<div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b>ID de la transacción</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6"><?php echo $transactionId; ?></div>
			</div>
			<hr>

			<div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Referencia de la venta</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6"><?php echo $reference_pol; ?></div>
			</div>
			<hr>

			<div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Referencia de la transacción</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6"><?php echo $referenceCode; ?></div>
			</div>
			<hr>

			<div class="titulo_tabla1 row">
				<?php
				if ($pseBank != null) {
				?>
					<div class="titulo_tabla1 row">
						<div class="titulolinearespuesta col-sm-12 col-md-6"><b>cus</b></div>
						<div class="titulolinearespuesta col-sm-12 col-md-6"><b><?php echo $cus; ?> </div>
					</div>
					<div class="row">
						<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Banco</b></div>
						<div class="titulolinearespuesta col-sm-12 col-md-6"><?php echo $pseBank; ?> </div>
					</div>
				<?php
				}
				?>
			</div>
			<?php
			if ($pseBank != null) {
			?>
				<hr>
			<?php
			}
			?>
			<div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Valor total</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6">$<?php echo number_format($TX_VALUE); ?></div>
			</div>
			<hr>

			<div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Moneda</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6"><?php echo $currency; ?></div>
			</div>
			<hr>

			<div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Descripción</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6"><?php echo ($extra1); ?></div>
			</div>
			<hr>

			<div class="titulo_tabla1 row">
				<div class="titulolinearespuesta col-sm-12 col-md-6"><b>Entidad:</b></div>
				<div class="titulolinearespuesta col-sm-12 col-md-6"><?php echo ($lapPaymentMethod); ?></div>

			</div>
			<hr>
			
			<?php if ($_REQUEST['transactionState'] == 4) {?>
				
			
			<div class="titulo_tabla1 row">

	                <div class="justify-content-center p-3 w-100"  >

						<p class="text-center"> 
							En los próximos minutos validaremos tu solicitud y será enviado un <strong>codigo QR con la información de tu compra.</strong> </p>
					</div>

				<div class="col-12" style="visibility: hidden;">
					<br>
					<?php QRcode::png($this->texto, $this->ruta, $this->level, $this->tamanio, $this->framsize); ?>
					<span> Puedes descargar el código QR, también se envió al correo con el cual realizaste el pago</span>
					<div class="contenedor-qr">
						<!-- <img src="http://newgaleriacafelibro.omegasolucionesweb.com/images/<?php echo $transactionId ?>.png" alt="qr registro compra"> -->
						<img src="https://www.galeriacafelibro.com.co/images/<?php echo $this->id ?>.png">

						<a class="btn btn-danger btn-block" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/images/<?php echo $this->id ?>.png" download>
							Descargar QR
						</a>
					</div>



				</div>
			</div>
			<?php } ?>
		</div>


	<?php

	} else {
	?>
		<h1 class="titulos">Error validando firma digital.</h1>
	<?php
	}
	?>
</div>