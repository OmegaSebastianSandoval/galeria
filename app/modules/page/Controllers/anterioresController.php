<?php 

/**
*
*/

class Page_anterioresController extends Page_mainController
{

	public function indexAction()
	{
		$programacionModel = new Page_Model_DbTable_Programacion();
		$fechaactualevento = date('Y-m-d');
		$filters = " '$fechaactualevento' > programacion_fecha AND programacion_tipoevento is null";
		$order = "programacion_fecha ASC, orden ASC";
		$list = $programacionModel->getListCount($filters,$order)[0];
		$amount = 9;
		$page = $this->_getSanitizedParam("page");
		if (!$page) {
		$start = 0;
		$page=1; 
		}
		else {
		$start = ($page - 1) * $amount;
		}
		$this->_view->totalpages = ceil($list->total/$amount);
		$this->_view->page = $page;
		$eventos = $programacionModel->getListPages($filters,$order,$start,$amount);
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

	public function detalleAction(){
		$programacionModel = new Page_Model_DbTable_Programacion();
		$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->detalle = $programacionModel->getById($identificador);
		$this->_view->boletas = $boletaeventoModel->getListJoin("boleta_evento_evento = '$identificador'","");

	}
	public function preciosAction(){
		header('Content-Type: application/json');
		$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
		$identificador = $this->_getSanitizedParam("id");
		$precio = $boletaeventoModel->getById($identificador);
		$precios  = array('precio' => $precio->boleta_evento_precio, 'servicio' => $precio->boleta_evento_precioadicional);
		$this->setLayout("blanco");
		echo json_encode($precios);
	}
	
	public function respuestaAction(){
		$programacionModel = new Page_Model_DbTable_Programacion();
		$consultadato1 = $programacionModel->getList("","programacion_id DESC");
		$evento = $consultadato1[0]->programacion_nombre;
		$boletacompraModel = new Page_Model_DbTable_Boletacompra();
		$consultadato = $boletacompraModel->getList("","boleta_compra_id DESC");
		$id = $consultadato[0]->boleta_compra_id;
		$tipoboleta = $consultadato[0]->boleta_compra_tipoboleta;
		$cantidad = $consultadato[0]->boleta_compra_cantidad;
		$documento = $consultadato[0]->boleta_compra_documento;
		$nombre = $consultadato[0]->boleta_compran_nombre;
		$fechacedula = $consultadato[0]->boleta_compra_fechacedula;
		$codigo = $consultadato[0]->boleta_compra_codigo;
		$total = $consultadato[0]->boleta_compra_total;
		$email = new Core_Model_Sendingemail($this->_view); 
		$email->enviarcorreo1($tipoboleta, $cantidad, $documento, $nombre, $fechacedula, $codigo, $total, $evento);
		$this->_view->tipoboleta = $tipoboleta;
		$this->_view->cantidad = $cantidad;
		$this->_view->documento = $documento;
		$this->_view->nombre = $nombre;
		$this->_view->fechacedula = $fechacedula;
		$this->_view->codigo = $codigo;
		$this->_view->total = $total;
		$this->_view->evento = $evento;
	}
	public function confirmacionAction(){
		$this->setLayout('blanco');
		$this->creararchivo();
		$boletaModel = new Page_Model_DbTable_Boletacompra();
		$consultadato = $boletaModel->getList("","boleta_compra_id DESC");
		$payu = Payu::getInstance()->get();
		 $ApiKey = $payu['apyKey'];
		$merchant_id = $this->_getSanitizedParam('merchant_id');
		$referenceCode = $this->_getSanitizedParam('reference_sale');
		$TX_VALUE = $this->_getSanitizedParam('value');
		$New_value = number_format($TX_VALUE, 1, '.', '');
		$currency = $this->_getSanitizedParam('currency');
		$transactionState = $this->_getSanitizedParam('state_pol');
		 $firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
		$firmacreada = md5($firma_cadena);
		$firma = $this->_getSanitizedParam('sign');
		$respuesta = $this->_getSanitizedParam('response_code_pol');
		$estado_pol = $this->_getSanitizedParam('state_pol') ;
		$fecha_procesamiento = $this->_getSanitizedParam('transaction_date');
		$ref_venta  = $referenceCode;

		if ($this->_getSanitizedParam('state_pol') == 4 ) {
		  $estadoTx = "Transacción aprobada";
		  $estado = 1;
		}
		else if ($this->_getSanitizedParam('state_pol') == 6 ) {
		  $estadoTx = "Transacción rechazada";
		   $estado = 2;
		}
		else if ($this->_getSanitizedParam('state_pol') == 5) {
		  $estadoTx = " Transacción expirada";
		   $estado = 2;
		}
		else {
		  $estadoTx=$this->_getSanitizedParam('response_message_pol');
		   $estado = 2;
		}
		if($firmacreada==$firma){ 
			echo "entro";
			$franquicia = $this->_getSanitizedParam('payment_method_name');
			$id = str_replace('gcf', '', $referenceCode);
			$reserva = $boletaModel->getById($id);
			$updateConfirmacion = $boletaModel->updateConfirmacion($respuesta,$estado, $estadoTx, $TX_VALUE, $id, $franquicia);
			if ($estado == 1) {
				$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
				$identificador = $reserva->boleta_evento_tipoboleta;
				$boleta = $boletaeventoModel->getById($identificador);
				$nuevacantidad = $boleta->boleta_evento_cantidad - $reserva->boleta_evento_cantidad;
				$boletaeventoModel->editField($identificador,'boleta_evento_cantidad ',$nuevacantidad);
			}
			$mail = new PHPMailer();
			$mail->Host = "localhost";
			$mail->From = "desarrollo3@omegawebsystems.com";
			$mail->FromName = "Galeria Cafe Libro";
			$mail->AddReplyTo("desarrollo3@omegawebsystems.com","Informacion");
			$mail->Subject = " .O. Pedido desde Galeria Cafe Libro .O.";
			$mail->AltBody = $mensaje;
			$mail->MsgHTML($mensaje);
			$mail->AddBCC("desarrollo3@omegawebsystems.com");
			$mail->AddAddress($consultadato->boleta_compra_email);
			$mail->IsHTML(true);
			if(!$mail->Send()) {
			  $alerta = 'Lo sentimos su mensaje no ha sido enviado';
			} else {
			  $alerta = 'Su mensaje se ha enviado correctamente';
			}
		}
	}
	
}