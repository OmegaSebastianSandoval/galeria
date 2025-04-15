<?php

/**
 *
 */

class Page_consultaController extends Page_mainController
{

    public function indexAction()
    {
        ini_set("memory_limit", "-1");
        $this->consultartoken();
        $boletaModel = new Page_Model_DbTable_Boletacompra();
        $boletaeventoModel = new Page_Model_DbTable_Boletaevento();



        $transacciones = $this->gettransacciones();
        // Crear un nuevo array para almacenar los valores
        $valores_guardados = array();
        
        // Fecha actual en formato 'Y-m-d' (por ejemplo, '2024-02-29')
        $hoy = date('Y-m-d');

        // Fecha del día anterior
        $ayer = date('Y-m-d', strtotime('-1 day'));
        
        foreach ($transacciones as $transaccion) {
            $transaccioDetalle = ($this->consultartransaccion($transaccion["referencePayco"]));
            $boletaId = $transaccioDetalle["data"]["log"]["x_extra1"];
            $boleta = $boletaModel->getById($boletaId);
            
              if ($boleta->boleta_compra_fecha == $hoy || $boleta->boleta_compra_fecha == $ayer) {
            
                if ($boleta->respuesta != "Aceptada" && $boleta->validacion != "1" && $boleta->validacion2 != "Aceptada" ) {
                    // Si todos los campos son NULL
                    
                    //Actualizar estado
                    $respuesta = $transaccioDetalle["data"]["log"]['x_transaction_state'];
                    $estado = $transaccioDetalle["data"]["log"]['x_cod_transaction_state'];
                    $estadoTx = $transaccioDetalle["data"]["log"]['x_transaction_state'];
                    $franquicia = $transaccioDetalle["data"]["log"]['x_bank_name'];
                    $boletaModel->updateConfirmacion($respuesta, $estado, $estadoTx, $boletaId, $franquicia);
                    
                    if($estado==1){
                        //ACtualizar Cantidad de boletas
                        $cantidad =  $transaccioDetalle["data"]["log"]['x_extra2'];
    					$tipoboleta =  $transaccioDetalle["data"]["log"]['x_extra3'];
    					$boletacompra = $boletaeventoModel->getById($tipoboleta);
    					$cantidad2 = $boletacompra->boleta_evento_cantidad;
    					if ($cantidad < $cantidad2) {
    						$cantidadNueva = $cantidad2 - $cantidad;
    						$boletaeventoModel->editField($boletacompra->boleta_evento_id, 'boleta_evento_cantidad', $cantidadNueva);
    					}
    					
    					
    
    					//validarcodigo
    					$codigo =  $transaccioDetalle["data"]["log"]['x_extra4'];
    					if ($codigo != "") {
    						$codigoModel = new Administracion_Model_DbTable_Codigopromocional();
    						$codigo_list = $codigoModel->getList(" codigo='$codigo' ", "")[0];
    						$codigo_id = $codigo_list->id;
    						$fecha = date("Y-m-d H:i:s");
    						$codigoModel->editField($codigo_id, "usado", "1");
    						$codigoModel->editField($codigo_id, "fecha_uso", $fecha);
    					}
                        
                        
                         //Enviar QR
                        // $this->reenviarqrAction($boletaId);
                    }
                }
              }
            
        }



        Session::getInstance()->set('token_value', null);
    }

    public function gettransacciones()
    {

        $this->consultartoken();

        $curl = curl_init();

        $payment = array();
        $payment = Epayco::getInstance()->get();


        $url = $payment['url_apify'] . '/transaction';
        // Obtener la fecha y hora actual
        $fecha_actual = date('Y-m-d H:i:s');

        // Obtener la fecha y hora 30 minutos antes
        $fecha_15_minutos_antes = date('Y-m-d H:i:s', strtotime('-45 minutes'));
        //$fecha_15_minutos_antes = '2024-04-02 10:00:00';

        $fields = '
        {
            "filter":{
                "transactionInitialDate":"' . $fecha_15_minutos_antes . '",
                "transactionEndDate":"' . $fecha_actual . '"
            }
        }
        ';

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . Session::getInstance()->get('token_value')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        // echo"<pre>";
        // print_r($response);
        // echo"</pre>";
        return $response['data']['data'];
    }

    public function gettransaccionindAction()
    {
    }

    public function consultartransaccion($refetencia)
    {
        $curl = curl_init();

        $payment = array();
        $payment = Epayco::getInstance()->get();


        $url = $payment['url_apify'] . '/transaction/detail';

        $fields = '{
            "filter":{
                "referencePayco":' . $refetencia . '
            }
        }';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . Session::getInstance()->get('token_value')
            ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        // echo "<pre>";
        // print_r($response);
        // echo "</pre>";

        return $response;
    }

    public function consultartoken()
    {
        $this->setLayout('blanco');

        $payment = array();
        $payment = Epayco::getInstance()->get();


        $curl = curl_init();

        $url = $payment['url_apify'] . '/login';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERPWD, $payment['PUBLIC_KEY'] . ":" . $payment['PRIVATE_KEY']);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        curl_close($curl);

        // Decodificar el token
        $decoded_token = json_decode($data, true);
        // Obtener el valor del token
        $token_value = $decoded_token['token'];
        // Imprimir el valor del token
        Session::getInstance()->set('token_value', $token_value);

        // return $token_value;
    }
    
    	public function reenviarqrAction($id)
	{

		$boletaModel = new Page_Model_DbTable_Boletacompra();

		$content = $boletaModel->getById($id);
		if ($content->boleta_compra_id) {

			$fecha = date("Ymd");
			//$texto = "https://pruebas.galeriacafelibro.com.co/administracion/index?codigo=$id";
			$texto = "https://galeriacafelibro.com.co/administracion/index?codigo=$id";

			//$texto = "https://www.galeriacafelibro.com.co/administracion/validacionboleta/manage?codigo=$id";
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
	

}
