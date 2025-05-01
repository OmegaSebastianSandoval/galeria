<?php

/**
 *
 */

class Validacion_validarController extends Validacion_mainController
{
	protected $_csrf_section = "validacion";


	public function init()
	{
		if (!Session::getInstance()->get("user")) {
			header('Location: /validacion/');
			exit;
		}
		parent::init();
	}

	public function indexAction()
	{

		Session::getInstance()->set("error_validacion", "");

		$this->_csrf_section = "validacion_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];


		$uid = $this->_getSanitizedParam("uid");
		$token = $this->_getSanitizedParam("token");

		$this->_view->uid = $uid;
		$this->_view->token = $token;



		$ticketInfo = $this->infoTicket($uid, $token);
		if (!$ticketInfo) {
			Session::getInstance()->set("error_validacion", "El ticket no existe.");
		}
		if ($ticketInfo->ticket_estado != 1) {
			Session::getInstance()->set("error_validacion", "El ticket ya fue validado.");
		}


		$compra = $this->validarCompra($uid, $token);
		if (!$compra) {
			Session::getInstance()->set("error_validacion", "El ticket no se encuentra asociado a una compra, contacte al administrador.");
		}

		/* $tokenRegenerado = $this->validarToken($compra, $ticketInfo);
		if (!$tokenRegenerado) {
			Session::getInstance()->set("error_validacion", "Error al validar el token, contacte al administrador - 1.");
		}
		if ($tokenRegenerado != $token) {
			Session::getInstance()->set("error_validacion", "El token no es valido, contacte al administrador - 2.");
		} */

		if (Session::getInstance()->get("error_validacion")) {
			header("Location: /validacion/validar/error?uid={$uid}&token={$token}");
			exit;
		}


		// $compra->programacion_fecha = '2025-04-10 23:30:00';

		$estadoFecha = $this->validarFechaEvento($compra->programacion_fecha);
		$this->_view->infoFecha = $this->getFechasTipos()[$estadoFecha];


		$ticektsModel = new Administracion_Model_DbTable_Tickets();

		$ticketsTodos = $ticektsModel->getList("ticket_compra_id = {$compra->boleta_compra_id}", "ticket_id ASC");

		$ticketsSinValidar = [];
		$ticketsValidados = [];

		foreach ($ticketsTodos as $ticket) {
			if ($ticket->ticket_estado == 1) {
				$ticketsSinValidar[] = $ticket;
			} elseif ($ticket->ticket_estado == 2) {
				$ticketsValidados[] = $ticket;
			}
		}


		/* echo "<pre>";
		print_r($compra);
		echo "</pre>"; */
		$this->_view->compra = $compra;
		$this->_view->ticketInfo = $ticketInfo;
		$this->_view->ticketsSinValidar = count($ticketsSinValidar);
		$this->_view->ticketsValidados = count($ticketsValidados);
		$this->_view->ticketsTodos = count($ticketsTodos);
	}


	public function registrarAction()
	{
		// Establece un layout vacío
		$this->setLayout('blanco');
		// Recibe los datos enviados en formato JSON
		$user = Session::getInstance()->get("user");
		// Sanitiza y obtiene los datos necesarios
		$uid = $this->_getSanitizedParam("uid");
		$token = $this->_getSanitizedParam("token");
		$csrf = $this->_getSanitizedParam("csrf");

		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] !== $csrf) {

			$response = [
				'status' => 'error',
				'message' => 'Token CSRF inválido.',
			];
			echo json_encode($response);
			return;
		}

		$this->_view->uid = $uid;
		$this->_view->token = $token;

		$ticketsModel = new Administracion_Model_DbTable_Tickets();
		$ticketInfo = $ticketsModel->getList("ticket_uid = '$uid' AND ticket_token = '$token'")[0];
		$id = $ticketInfo->ticket_id;
		if (!$ticketInfo) {
			$response = [
				'status' => 'error',
				'message' => 'El ticket no existe.',
			];
			echo json_encode($response);
			return;
		}

		$ticketsModel->editField($id, "ticket_estado", 2);
		$ticketsModel->editField($id, "ticket_fecha_validacion", date("Y-m-d H:i:s"));
		$ticketsModel->editField($id, "ticket_metodo_validacion", "validacion manual");
		$ticketsModel->editField($id, "ticket_dispositivo_validacion", $_SERVER['HTTP_USER_AGENT']);
		$ticketsModel->editField($id, "ticket_ip_validacion", $_SERVER['REMOTE_ADDR']);
		$ticketsModel->editField($id, "ticket_usuario_validador", $user->user_id);

		$ticketsTotal = $ticketsModel->getList("ticket_compra_id = {$ticketInfo->ticket_compra_id}");
		$ticketsValidadosPorCompra =  $ticketsModel->getList("ticket_compra_id = {$ticketInfo->ticket_compra_id} AND ticket_estado = 2");

		if (
			count($ticketsTotal) >= 1 &&
			(count($ticketsTotal) == count($ticketsValidadosPorCompra))
		) {
			$boletaModel = new Page_Model_DbTable_Boletacompra();
			$boletaModel->editField($ticketInfo->ticket_compra_id, "boleta_compra_validacionentrada", 1);
		}

		$ticketActualizado = $ticketsModel->getById($id);
		if ($ticketActualizado->ticket_estado == 2) {
			$response = [
				'status' => 'success',
				'message' => 'Ticket validado correctamente.',
				// 'redirect' => "/validacion/eventos/evento?id={$ticketInfo->ticket_evento_id}",
				'redirect' => "/validacion/eventos",
			];
			echo json_encode($response);
			return;
		} else {
			$response = [
				'status' => 'error',
				'message' => 'Error al validar el ticket.',
			];
			echo json_encode($response);
			return;
		}

		/* if ($ticketInfo->ticket_estado == 1) {
			$data['ticket_estado'] = 2;
			$ticketsModel->update($data, "ticket_id = {$ticketInfo->ticket_id}");
			header("Location: /validacion/validar/?uid={$uid}&token={$token}");
			exit;
		}
		header("Location: /validacion/validar/error?uid={$uid}&token={$token}");
		exit; */
	}
	public function errorAction()
	{
		$uid = $this->_getSanitizedParam("uid");
		$token = $this->_getSanitizedParam("token");

		$this->_view->uid = $uid;
		$this->_view->token = $token;


		$ticketInfo = $this->infoTicket($uid, $token);
		if (!$ticketInfo) {
			$this->_view->error = "El ticket no existe.";
			$this->_view->tipoError = 1;
		}
		if ($ticketInfo->ticket_estado != 1) {
			$this->_view->error =  "El ticket ya fue validado.";
			$this->_view->tipoError = 2;
		}


		$compra = $this->validarCompra($uid, $token);
		if (!$compra) {
			$this->_view->error = "El ticket no se encuentra asociado a una compra, contacte al administrador.";
			$this->_view->tipoError = 3;
		}
		$this->_view->compra = $compra;
		$this->_view->ticketInfo = $ticketInfo;
		$this->_view->estadoTicket = $this->getEstadosTickets()[$ticketInfo->ticket_estado];
	}
	public function infoTicket($uid, $token)
	{
		$ticketsModel = new Administracion_Model_DbTable_Tickets();
		$ticketInfo = $ticketsModel->getList("ticket_uid = '$uid' AND ticket_token = '$token'")[0];
		return $ticketInfo;
	}

	public function validarCompra($uid, $token)
	{
		$boletaModel = new Page_Model_DbTable_Boletacompra();
		$ticketsModel = new Administracion_Model_DbTable_Tickets();


		$ticket = $ticketsModel->getList("ticket_uid = '$uid' AND ticket_token = '$token'")[0];


		$compra = $boletaModel->getVentaInfo($ticket->ticket_compra_id);
		return $compra;
	}

	public function validarToken($compra, $ticket)
	{

		// Regenerar el token usando los mismos datos con los que fue creado
		$yearMonth = date("Ym", strtotime($compra->programacion_fecha));
		$baseString = "{$compra->boleta_compra_id}-{$compra->boleta_compra_email}-{$yearMonth}-{$ticket->ticket_id}";
		$generatedToken = substr(base_convert(hash('sha256', $baseString), 16, 36), 0, 12);

		return $generatedToken;
	}
	function validarFechaEvento(string $fechaEvento): string
	{
		$evento = new DateTime($fechaEvento);
		$eventoDia = $evento->format('Y-m-d');

		$hoy = date('Y-m-d');
		$ayer = date('Y-m-d', strtotime('-1 day'));
		$mañana = date('Y-m-d', strtotime('+1 day'));

		if ($eventoDia === $hoy) {
			return 'hoy';
		} elseif ($eventoDia === $ayer) {
			return 'ayer';
		} elseif ($eventoDia === $mañana) {
			return 'mañana';
		} else {
			return 'otro';
		}
	}

	public function getFechasTipos()
	{
		$array = [];
		$array['hoy'] = [
			'texto' => 'Hoy',
			'mensaje' => 'El evento es hoy,',
			'alert' => 'alert-success',
			'icono' => 'fa-solid fa-calendar-check',
		];
		$array['ayer'] = [
			'texto' => 'Ayer',
			'mensaje' => 'El evento fue ayer,',
			'alert' => 'alert-warning',
			'icono' => 'fa-solid fa-calendar-xmark',
		];
		$array['mañana'] = [
			'texto' => 'Mañana',
			'mensaje' => 'El evento es mañana,',
			'alert' => 'alert-warning',
			'icono' => 'fa-solid fa-calendar-day',
		];
		$array['otro'] = [
			'texto' => 'Otro día',
			'mensaje' => 'La fecha del evento es: ',
			'alert' => 'alert-danger',
			'icono' => 'fa-solid fa-calendar-xmark',
		];
		return $array;
	}
	public function getEstadosTickets()
	{
		$data = [];
		$data[1] = 'Sin validar';
		$data[2] = 'Validado';
		return $data;
	}
}
