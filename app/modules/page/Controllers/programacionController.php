<?php

/**
 *
 */
class MYPDF extends TCPDF
{

	//Page header
	public function Header()
	{
		$img_file = PUBLIC_PATH . '/images_sales/assets/FondoEnt.jpg';
		$w = $this->getPageWidth();
		$h = $this->getPageHeight();

		// resize = true (último parámetro en 1) para forzar que llene toda la página
		$this->Image($img_file, 0, 0, $w, $h, '', '', '', false, 300, '', false, false, 1);
	}
}

class Page_programacionController extends Page_mainController
{

	public function indexAction()
	{
		$programacionModel = new Page_Model_DbTable_Programacion();
		$fechaactualevento = date('Y-m-d H:i:s');

		$filters = " '$fechaactualevento' <= programacion_fecha AND programacion_tipoevento is null AND (programacion_bono IS NULL OR programacion_bono != 1) ";
		$order = "programacion_fecha ASC, orden ASC";
		$list = $programacionModel->getListCount($filters, $order)[0];
		$amount = 10;
		$page = $this->_getSanitizedParam("page");
		if (!$page) {
			$start = 0;
			$page = 1;
		} else {
			$start = ($page - 1) * $amount;
		}
		$this->_view->totalpages = ceil($list->total / $amount);
		$this->_view->page = $page;
		$eventos = $programacionModel->getListPages($filters, $order, $start, $amount);
		$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
		$fechaactual = date('Y-m-d');
		$horaactual = date('H:i:s');
		$array = array();
		foreach ($eventos as $key => $evento) {
			$id = $evento->programacion_id;
			$array[$key] = [];
			$array[$key]['detalle'] = $evento;
			$array[$key]['boleteria'] = $boletaeventoModel->getList("boleta_evento_evento = '$id' AND ( '$fechaactual' < boleta_evento_fechalimite OR  ( '$fechaactual' = boleta_evento_fechalimite AND '$horaactual' <= boleta_evento_horalimite))", "");
		}
		$this->_view->programacion = $array;
	}
	public function reservaAction()
	{
		$programacionModel = new Page_Model_DbTable_Programacion();
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->reserva = $programacionModel->getById($identificador);
	}
	public function detalleAction()
	{
		$programacionModel = new Page_Model_DbTable_Programacion();
		$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
		$vendedoresModel = new Administracion_Model_DbTable_Vendedores();
		$identificador = $this->_getSanitizedParam("id");
		$vendor = $this->_getSanitizedParam("vendor");
		$vendors = $vendedoresModel->getList("id='$vendor'", "");
		foreach ($vendors as $key => $value) {
			$vendedor = $value->nombre;
		}
		$fechaActual = date("Y-m-d");
		$horaActual = date("H:i:s.u");
		$this->_view->vendor = $vendedor;
		$this->_view->detalle = $programacionModel->getById($identificador);
		$this->_view->boletas = $boletaeventoModel->getListJoin("boleta_evento_evento = '$identificador' AND ( '$fechaActual' < boleta_evento_fechalimite OR ( '$fechaActual'= boleta_evento_fechalimite AND  '$horaActual' <= boleta_evento_horalimite))", "");
		//	$this->_view->boletas = $boletaeventoModel->getListJoin("boleta_evento_evento = '$identificador' ", "");
		// 		$this->_view->boletas = $boletaeventoModel->getListJoin("boleta_evento_evento = '$identificador' AND  '$fechaActual' <= boleta_evento_fechalimite AND '$horaActual' <= boleta_evento_horalimite", "");
		$error = 1;
		$this->_view->error = $error;
	}
	public function preciosAction()
	{
		header('Content-Type: application/json');
		$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
		$identificador = $this->_getSanitizedParam("id");
		$precio = $boletaeventoModel->getById($identificador);
		$precios = array('precio' => $precio->boleta_evento_precio, 'servicio' => $precio->boleta_evento_precioadicional, 'cantidad' => $precio->boleta_evento_cantidad);
		$this->setLayout("blanco");
		echo json_encode($precios);
	}
	public function generarpagoAction()
	{

		$programacionModel = new Page_Model_DbTable_Programacion();
		$boletacompraModel = new Page_Model_DbTable_Boletacompra();
		$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
		$codigoModel = new Administracion_Model_DbTable_Codigopromocional();
		$vendedoresModel = new Administracion_Model_DbTable_Vendedores();
		$this->setLayout("blanco");

		$data = array();
		$data['tipoboleta'] = $this->_getSanitizedParam("tipoboleta");
		$data['cantidad'] = $this->_getSanitizedParam("cantidad");
		$data['documento'] = $this->_getSanitizedParam("documento");
		$data['nombre']  = $this->_getSanitizedParam("nombre");
		//$data['telefono'] = $this->_getSanitizedParam("telefono");
		$data['email'] = $this->_getSanitizedParam('email');
		$data['fecha'] = $this->_getSanitizedParam('fecha');
		$data['fechanacimiento'] = $this->_getSanitizedParam('fechanacimiento');

		$data['fechapago'] = date("Y-m-d");
		$data['codigo'] = $this->_getSanitizedParam('codigo');
		$data['vendor'] = $this->_getSanitizedParam("vendor");


		//print_r($data);
		$this->_view->vendor = $data['vendor'];
		$this->_view->correo = $data['email'];
		$this->_view->nombre = $data['nombre'];
		//$this->_view->telefono = $data['telefono'];
		$this->_view->cedula = $data['documento'];

		$boletacompra = $boletaeventoModel->getById($data['tipoboleta']);

		$data['total'] = $this->_getSanitizedParam('total');

		$identificador = $data['tipoboleta'];

		// Cantidad de usuario
		$cantidad = $data['cantidad'];
		$cantidad2 = $boletacompra->boleta_evento_cantidad;
		if ($cantidad < $cantidad2) {
			//$data['total'] = ( $data['cantidad']*  $boletacompra->boleta_evento_precio ) + ( $data['cantidad']*  $boletacompra->boleta_evento_precioadicional)  ;
			$idboleta = $boletacompraModel->insert($data);
			$cantidadNueva = $cantidad2 - $cantidad;
			//$update = $boletaeventoModel->editField($boletacompra->boleta_evento_id, 'boleta_evento_cantidad', $cantidadNueva);
			$this->_view->cantidad = $cantidad;
			$this->_view->datoscompra = $boletaeventoModel->getListJoin("boleta_evento_id = '$identificador'", "")[0];

			$this->_view->idboleta = $idboleta;
			$this->_view->cantidadboleta = $data['cantidad'];
			$this->_view->tipoboleta = $data['tipoboleta'];
			if ($data['codigo']) {
				$this->_view->codigo = $data['codigo'];
			}



			$payment = array();
			$payment = Epayco::getInstance()->get();
			$payment['amount'] = $data['total'];
			$this->_view->payment = $payment;


			$this->_view->enviarpago = 1;
		} else {
			$error = 2;
			$this->_view->error = $error;
			header("Location: /page/programacion/detalle?id=" . $boletacompra->boleta_evento_evento . "&error=" . $error);
		}
	}
	public function respuestaAction()
	{
		$ref = $this->_getSanitizedParam('ref_payco');

		$response = json_decode(file_get_contents('https://secure.epayco.co/validation/v1/reference/' . $ref));
		$data = array();
		$data['log_log'] = print_r($response, true);
		$data['log_tipo'] = 'EPAYCO RESPUESTA';
		$logModel = new Administracion_Model_DbTable_Log();
		//$logModel->insert($data);

		$this->_view->response = $response->data;
		$this->_view->list_states = $this->states();
	}
	public function respuesta2Action()
	{


		$this->setLayout('blanco');

		// Lee la entrada cruda
		$inputJSON = file_get_contents('php://input');
		// Decodifica el JSON a un array o a un objeto PHP
		$response = json_decode($inputJSON, true);


		$data = array();
		$data['log_log'] = print_r($response, true);
		$data['log_tipo'] = 'EPAYCO RESPUESTA';
		$logModel = new Administracion_Model_DbTable_Log();
		$logModel->insert($data);

		// Puedes procesar la información y devolver una respuesta, por ejemplo:
		$response = [
			'status' => 'ok',
			'mensaje' => 'Datos recibidos',
			'datos' => $data
		];

		// Devuelve la respuesta en JSON
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function confirmacionAction()
	{
		ini_set("memory_limit", "-1");


		$this->setLayout('blanco');
		http_response_code(200);
		header("HTTP/1.1 200 OK");
		header('Status: 200');

		$epayco = Epayco::getInstance()->get();
		$p_cust_id_cliente = $epayco['P_CUST_ID_CLIENTE'];
		$p_key = $epayco['P_KEY'];

		$x_ref_payco = $_REQUEST['x_ref_payco'];
		$x_transaction_id = $_REQUEST['x_transaction_id'];
		$x_amount = $_REQUEST['x_amount'];
		$x_currency_code = $_REQUEST['x_currency_code'];
		$x_signature = $_REQUEST['x_signature'];

		$data2 = array();
		$data2['log_tipo'] = 'EPAYCO CONFIRMACION INICIO';

		$signature = hash('sha256', $p_cust_id_cliente . '^' . $p_key . '^' . $x_ref_payco . '^' . $x_transaction_id . '^' . $x_amount . '^' . $x_currency_code);

		//Validamos la firma
		if ($x_signature == $signature) {
			/*Si la firma esta bien podemos verificar los estado de la transacción*/
			$x_cod_response = $_REQUEST['x_cod_response'];
			switch ((int) $x_cod_response) {
				case 1:
					# code transacción aceptada
					$data2['log_tipo'] = 'EPAYCO CONFIRMACION ACEPTADA';


					$id = $_REQUEST['x_extra1'];


					$respuesta = $_REQUEST['x_transaction_state'];
					$estado = $_REQUEST['x_cod_transaction_state'];
					$estadoTx = $_REQUEST['x_transaction_state'];

					$franquicia = $_REQUEST['x_bank_name'];
					if ($_REQUEST['x_cod_transaction_state'] == 1) {
						$boletaModel = new Page_Model_DbTable_Boletacompra();
						$boletaeventoModel = new Page_Model_DbTable_Boletaevento();

						$boletaModel->updateConfirmacion($respuesta, $estado, $estadoTx, $id, $franquicia);
						// $this->reenviarqrAction($id);
						$this->enviarBoleteria($id);
					}

					$cantidad = $_REQUEST['x_extra2'];
					$tipoboleta = $_REQUEST['x_extra3'];

					$boletacompra = $boletaeventoModel->getById($tipoboleta);

					$cantidad2 = $boletacompra->boleta_evento_cantidad;

					if ($cantidad < $cantidad2) {
						$cantidadNueva = $cantidad2 - $cantidad;
						$boletaeventoModel->editField($boletacompra->boleta_evento_id, 'boleta_evento_cantidad', $cantidadNueva);
					}

					//validarcodigo
					$codigo = $_REQUEST['x_extra4'];
					if ($codigo != "") {
						$codigoModel = new Administracion_Model_DbTable_Codigopromocional();
						$codigo_list = $codigoModel->getList(" codigo='$codigo' ", "")[0];
						$codigo_id = $codigo_list->id;
						$fecha = date("Y-m-d H:i:s");
						$codigoModel->editField($codigo_id, "usado", "1");
						$codigoModel->editField($codigo_id, "fecha_uso", $fecha);
					}

					//echo "transacción aceptada";
					break;
				case 2:
					# code transacción rechazada
					$data2['log_tipo'] = 'EPAYCO CONFIRMACION RECHAZADA';

					$id = $_REQUEST['x_extra1'];
					$respuesta = $_REQUEST['x_transaction_state'];
					$estado = $_REQUEST['x_cod_transaction_state'];
					$estadoTx = $_REQUEST['x_transaction_state'];
					$franquicia = $_REQUEST['x_bank_name'];
					$boletaModel = new Page_Model_DbTable_Boletacompra();
					$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
					$boletaModel->updateConfirmacion($respuesta, $estado, $estadoTx, $id, $franquicia);

					//echo "transacción rechazada";
					break;
				case 3:
					# code transacción pendiente
					$data2['log_tipo'] = 'EPAYCO CONFIRMACION PENDIENTE';

					$id = $_REQUEST['x_extra1'];
					$respuesta = $_REQUEST['x_transaction_state'];
					$estado = $_REQUEST['x_cod_transaction_state'];
					$estadoTx = $_REQUEST['x_transaction_state'];
					$franquicia = $_REQUEST['x_bank_name'];
					$boletaModel = new Page_Model_DbTable_Boletacompra();
					$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
					$boletaModel->updateConfirmacion($respuesta, $estado, $estadoTx, $id, $franquicia);

					//echo "transacción pendiente";
					break;
				case 4:
					# code transacción fallida
					$data2['log_tipo'] = 'EPAYCO CONFIRMACION FALLIDA';

					$id = $_REQUEST['x_extra1'];
					$respuesta = $_REQUEST['x_transaction_state'];
					$estado = $_REQUEST['x_cod_transaction_state'];
					$estadoTx = $_REQUEST['x_transaction_state'];
					$franquicia = $_REQUEST['x_bank_name'];
					$boletaModel = new Page_Model_DbTable_Boletacompra();
					$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
					$boletaModel->updateConfirmacion($respuesta, $estado, $estadoTx, $id, $franquicia);

					//echo "transacción fallida";
					break;
			}
		} else {
			$data2['log_tipo'] = 'EPAYCO Firma no válida';
			echo ("Firma no válida");
		}


		$data2['log_log'] = print_r($_REQUEST, true);
		$logModel = new Administracion_Model_DbTable_Log();
		$logModel->insert($data2);
	}
	public function getstate($state)
	{
		$states = array();
		$states[1] = 'Transacción aprobada';
		$states[4] = 'Transacción rechazada por entidad financiera';
		$states[5] = 'Transacción rechazada por el banco';
		$states[6] = 'Fondos insuficientes';
		$states[7] = 'Tarjeta inválida';
		$states[9] = 'Tarjeta vencida';
		$states[10] = 'Tarjeta restringida';
		$states[12] = 'Fecha de expiración o código de seguridad inválidos';
		$states[13] = 'Reintentar pago';
		$states[14] = 'Transacción inválida';
		$states[17] = 'El valor excede el máximo permitido por la entidad';
		$states[19] = '	Transacción abandonada por el pagador';
		$states[22] = 'Tarjeta no autorizada para comprar por internet';
		$states[23] = 'Transacción rechazada por sospecha de fraude';
		$states[9995] = 'Certificado digital no encotnradoe';
		$states[9996] = 'Error tratando de cominicarse con el banco';
		$states[9997] = 'Error comunicándose con la entidad financiera';
		$states[9998] = 'Transacción no permitida';
		$states[9999] = 'error';
		$states[20] = 'Transacción expirada';
		if (isset($states[$state])) {
			return $states[$state];
		} else {
			return '';
		}
	}

	public function validarcodigoAction()
	{
		ini_set("display_errors", 0);
		header('Content-Type:application/json');
		$this->setLayout('blanco');
		$codigo = $this->_getSanitizedParam("codigo");
		$idevento = $this->_getSanitizedParam("idevento");

		$codigoModel = new Administracion_Model_DbTable_Codigopromocional();
		$codigo_list = $codigoModel->getList(" codigo='$codigo' AND activo='1' ", "");

		$existe = 0;

		if (count($codigo_list) > 0 && $idevento == $codigo_list[0]->evento) {
			$existe = 1;
		}
		/* 	if ($codigo_list[0]->evento != $idevento) {
				$existe = 3;
			} */
		$tipo = $codigo_list[0]->tipo;
		$usado = $codigo_list[0]->usado;
		$valor = $codigo_list[0]->valor;
		$porcentaje = $codigo_list[0]->porcentaje;
		$evento = $codigo_list[0]->evento;


		$respuesta['existe'] = $existe;
		$respuesta['tipo'] = $tipo;
		$respuesta['usado'] = $usado;
		$respuesta['valor'] = $valor;
		$respuesta['porcentaje'] = $porcentaje;
		$respuesta['idevento'] = $idevento;
		$respuesta['evento'] = $evento;


		echo json_encode($respuesta);
	}

	public function creararchivo()
	{
		$contenido = json_encode($_POST);
		$nombre_archivo = 'prueba2.txt';
		fopen($nombre_archivo, 'a+');
		// Asegurarse primero de que el archivo existe y puede escribirse sobre el. 
		if (is_writable($nombre_archivo)) {

			// En nuestro ejemplo estamos abriendo $nombre_archivo en modo de adicion. 
			// El apuntador de archivo se encuentra al final del archivo, asi que 
			// alli es donde ira $contenido cuando llamemos fwrite(). 
			if (!$gestor = fopen($nombre_archivo, 'a')) {
				exit;
			}

			// Escribir $contenido a nuestro arcivo abierto. 
			if (fwrite($gestor, $contenido) === FALSE) {
				exit;
			}



			fclose($gestor);
		} else {
		}
	}
	public function states()
	{
		$array = array();
		$array['1'] = 'Aceptada';
		$array['2'] = 'Rechazada';
		$array['3'] = 'Pendiente';
		$array['4'] = 'Fallida';
		$array['6'] = 'Reversada';
		$array['7'] = 'Retenida';
		$array['8'] = 'Iniciada';
		$array['9'] = 'Caducada';
		$array['10'] = 'Abandonada';
		$array['11'] = 'Cancelada';
		return $array;
	}

	public function testAction()
	{
		ini_set("memory_limit", "-1");

	
		// $id = 19038;
		 $id = 19040;
		$id = 19046;
		$id = 19049;
		// $id = 19053;

		$this->enviarBoleteria($id);
	}
	public function enviarBoleteria($id)
	{
		$this->setLayout('blanco');
		$boletaModel = new Page_Model_DbTable_Boletacompra();

		$ticketsModel = new Administracion_Model_DbTable_Tickets();

		$infoVenta = $boletaModel->getVentaInfo($id);

		$cantidad = $infoVenta->boleta_compra_cantidad;
		$compraId = $infoVenta->boleta_compra_id;

		$evento = $infoVenta->boleta_evento_evento;

		//validar que ya no se hayan creado los tickets
		$ticketsExisten = $ticketsModel->getList("ticket_compra_id = '$compraId' AND ticket_evento_id = '$evento'");
		if ($ticketsExisten && count($ticketsExisten) == $cantidad) {
			$logModel = new Administracion_Model_DbTable_Log();
			$dataLog = array();
			$dataLog['log_log'] = print_r($ticketsExisten, true);
			$dataLog['log_tipo'] = "QR NO GENERADOS PARA LA COMPRA $compraId";
			$logModel->insert($dataLog);
			return;
		}


		$fechaEventoFinal = strtotime("$infoVenta->programacion_fecha + 1 day");
		$qrsGenerados = [];

		// Iterar desde 1 hasta la cantidad de boletos comprados
		for ($i = 1; $i <= $cantidad; $i++) {

			$dataTicket = [
				"ticket_compra_id" => $compraId,
				"ticket_numero_ticket" => $i,
				"ticket_estado" => 1,
				"ticket_fecha_creacion" => date("Y-m-d H:i:s"),
				"ticket_fecha_expiracion" => date("Y-m-d H:i:s", $fechaEventoFinal)
			];

			$nextId = $ticketsModel->getNextTicketId();
			$id = $ticketsModel->insert($dataTicket);
			$token = base_convert($id, 10, 36);
			$yearMonth = date("Ym", strtotime($infoVenta->programacion_fecha));
			$customUid = "T-{$yearMonth}-" . str_pad($nextId, 7, "0", STR_PAD_LEFT);
			$baseString = "{$compraId}-{$infoVenta->boleta_compra_email}-{$yearMonth}-{$nextId}";
			$token = substr(base_convert(hash('sha256', $baseString), 16, 36), 0, 12);
			$ticketsModel->editField($id, "ticket_uid ", $customUid);
			$ticketsModel->editField($id, "ticket_token", $token);
			$ticketsModel->editField($id, "ticket_evento_id", $infoVenta->boleta_evento_evento);
			$ticket = $ticketsModel->getById($id);

			$qrsGenerados[] =	[
				"ticket_id" => $id,
				"ticket_uid" => $customUid,
				"ticket_token" => $token,
				"ticket_numero_ticket" => $i,
				"ticket_fecha_expiracion" => date("Y-m-d H:i:s", $fechaEventoFinal),
				"rutaQR" => $this->generarQR($customUid, $token),
				"email" => $infoVenta->boleta_compra_email,
				"nombre" => $infoVenta->boleta_compra_nombre,
				"telefono" => $infoVenta->boleta_compra_telefono,
				"estado" => $ticket->ticket_estado,
			];
			$this->generarpdfs($infoVenta, $ticket);
		}

		$logModel = new Administracion_Model_DbTable_Log();
		$dataLog = array();
		$dataLog['log_log'] = print_r($qrsGenerados, true);
		$dataLog['log_tipo'] = 'QR GENERADOS';
		$logModel->insert($dataLog);
		$email = new Core_Model_Sendingemail($this->_view);
		$email->generarCorreoBoleteria($infoVenta, $qrsGenerados);
		/* echo "<pre>";
		print_r($qrsGenerados);
		echo "</pre>"; */
	}
	public  function generarQR($uid, $token)
	{
		if (APPLICATION_ENV == 'development') {
			$textoQR = "http://192.168.150.4:8043/validacion?uid={$uid}&token={$token}";
		} else {

			$textoQR = "https://www.galeriacafelibro.com.co/validacion?uid={$uid}&token={$token}";
		}
		$rutaQR = "images_sales/qrs/{$uid}.png";
		QRcode::png($textoQR, $rutaQR, "Q", 5, 3);

		return $rutaQR;
	}


	//SE USA PARA GENERAR EL CORREO.
	public function generarcorreo($infoVenta, $tickets)
	{
		$this->setLayout('blanco');
		$this->_view->tickets = $tickets;
		$this->_view->infoVenta = $infoVenta;
	}
	public function generarpdfs($infoVenta, $ticket)
	{
		$this->setLayout('blanco');
		$this->_view->ticket = $ticket;
		$this->_view->infoVenta = $infoVenta;
		// print_r($ticket);


		/* 	echo "<pre>";
			print_r($infoVenta);
			echo "</pre>";
 */
		// Crear nueva instancia de TCPDF
		$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// Establece márgenes en 0
		$pdf->SetMargins(10, 10, 10);
		$pdf->SetHeaderMargin(0);
		$pdf->SetFooterMargin(0);

		// Desactiva el auto page break para evitar márgenes adicionales
		$pdf->SetAutoPageBreak(false, 0);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// Agregar una página
		$pdf->AddPage();

		// Escribir contenido en el PDF
		$pdf->SetFont('helvetica', '', 12);
		$content = $this->_view->getRoutPHP('modules/page/Views/template/generarpdf.php');
		// echo $content;
		$pdf->writeHTML($content, true, false, true, false, '');
		ob_clean();

		// Salvar el archivo o mostrarlo en el navegador
		$name = PDFS_PATH . "ticket_{$ticket->ticket_uid}.pdf";
		$pdf->Output($name, 'F'); // 'I' para mostrar en navegador, 'D' para descargar
	}


	public function reenviarqrAction($id)
	{

		$boletaModel = new Page_Model_DbTable_Boletacompra();
		$idTest = $this->_getSanitizedParam("idTest");
		if ($idTest) {
			$id = $idTest;
		}
		$content = $boletaModel->getById($id);

		// print_r($content);
		if ($content->boleta_compra_id) {

			$fecha = date("Ymd");
			//$texto = "https://pruebas.galeriacafelibro.com.co/administracion/index?codigo=$id";
			//$texto = "https://www.galeriacafelibro.com.co/administracion/validacionboleta/manage?codigo=$id";
			$texto = "https://www.galeriacafelibro.com.co/administracion/index?codigo=$id";
			// $ruta = "http://newgaleriacafelibro.omegasolucionesweb.com/images/".$id.".png";
			$ruta = "images/" . $id . ".png";

			$tamanio = 5;
			$level = "Q";
			$framsize = 3;
			$this->_view->id = $id;
			$this->_view->fecha = $fecha;
			$this->_view->texto = $texto;
			$this->_view->ruta = $ruta;

			QRcode::png($texto, $ruta, $level, $tamanio, $framsize);
			$email = new Core_Model_Sendingemail($this->_view);
			$email->reenviarQR($content->boleta_compra_id);
		}
	}


	public function leerpdfAction()
	{
		$this->setLayout('blanco');
		if (isset($_GET['token'])) {
			$token = $this->_getSanitizedParam("token");

			$ruta = $this->decryptString($token);

			if ($ruta && file_exists($ruta)) {
				header("Content-Type: application/pdf");
				readfile($ruta);
				exit;
			} else {
				echo "❌ Archivo no encontrado o token inválido.";
				exit;
			}
		} else {
			echo "❌ Token no proporcionado.";
			exit;
		}
	}
	function decryptString($encryptedString, $key = 'omegagaleria2025')
	{
		$data = base64_decode($encryptedString);
		$iv = substr($data, 0, 16);
		$encrypted = substr($data, 16);
		return openssl_decrypt($encrypted, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
	}
}
