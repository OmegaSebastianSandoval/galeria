<?php 

/**
*
*/

class Page_confirmacionController extends Page_mainController
{

	public function indexAction()
	{
        $boletaModel = new Page_Model_DbTable_Boletacompra();
		$id = $this->_getSanitizedParam("id");
		$pedido = $boletaModel->getById($id);
		$this->_view->id = $id;
		$this->_view->pedido = $pedido;
		//$llave="9i3f026cyCM1JGqKF34MJi6t1Z";/////llave de usuario de pruebas 2
		$usuario_id=$_REQUEST['merchantId'];
		//$ref_venta=$_REQUEST['referenceCode'];

		$ref_venta = $this->_getSanitizedParam('reference_sale');
		$aux = explode("_",$ref_venta);
		$pedido_id = $aux[0];

		$valor=$_REQUEST['amount'];
		$moneda=$_REQUEST['currency'];
		$state_pol=$_REQUEST['state_pol'];
		$firma_cadena= "$llave~$usuario_id~$ref_venta~$valor~$moneda~$state_pol";
		$firmacreada = md5($firma_cadena);//firma que generaron ustedes
		$firma =$_REQUEST['signature'];//firma que envía nuestro sistema
		//$ref_venta=$_REQUEST['reference_sale'];
		$fecha_procesamiento=$_REQUEST['transaction_date'];
		$ref_pol=$_REQUEST['ref_pol'];
		$cus=$_REQUEST['cus'];
		$extra1=$_REQUEST['extra1'];
		$banco_pse=$_REQUEST['banco_pse'];
		//$productos = $pedidosModel->getList("productospedidos_pedido = '$pedido_id'","");
		$pedidoCorreo= $boletaModel->getById($pedido_id);

		if($_REQUEST['state_pol'] == 6 && $_REQUEST['response_code_pol'] == 5)
		{$stateTx = "Transacci&oacute;n fallida";}
		else if($_REQUEST['state_pol'] == 6 && $_REQUEST['response_code_pol'] == 4)
		{$stateTx = "Transacci&oacute;n rechazada";}
		else if($_REQUEST['state_pol'] == 12 && $_REQUEST['response_code_pol'] == 9994)
		{$stateTx = "Pendiente, Por favor revisar si el d&eacute;bito fue realizado en el Banco";}
		else if($_REQUEST['state_pol'] == 4 && $_REQUEST['response_code_pol'] == 1)
		{$stateTx = "Transacci&oacute;n aprobada";
		}
		else
		{$stateTx=$_REQUEST['mensaje'];}
		
		if($_REQUEST['state_pol']==""){
		    http_response_code(400);
		}

        
		 $state= $this->_getSanitizedParam('state_pol');
			$boletaModel->editField($pedido_id,"validacion",$state);
			//$formularioModel->editField($pedido_id,"pedido_fecha",$fecha_procesamiento." ".date("H:i:s"));
			echo $state;
            if ($estado == 1) {
				$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
				$identificador = $reserva->boleta_evento_tipoboleta;
				$boleta = $boletaeventoModel->getById($identificador);
				$nuevacantidad = $boleta->boleta_evento_cantidad - $reserva->boleta_evento_cantidad;
				$boletaeventoModel->editField($identificador,'boleta_evento_cantidad ',$nuevacantidad);
				
				$email = new Core_Model_Sendingemail($this->_view); 
		        $email->enviarcorreo1();
			}
		
	}
	

}