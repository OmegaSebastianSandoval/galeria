<?php

/**
 *
 */

class Page_contactenosController extends Page_mainController
{
	// public $seccion_banner = 1;

	public function indexAction()
	{
		$this->_view->res = $this->_getSanitizedParam('res');
	}
	public function enviarAction()
	{

		$this->setLayout('blanco');
		$data = [''];
		$data['nombre'] = $this->_getSanitizedParam('nombre');
		$data['email'] = $this->_getSanitizedParam('email');
		$data['telefono'] = $this->_getSanitizedParam('telefono');
		$data['mensaje'] = $this->_getSanitizedParam('mensaje');
$data['reason'] = $this->_getSanitizedParam('reason');
        $email = new Core_Model_Sendingemail($this->_view);
        if($data['reason'] == '' && $data['mensaje']!= ''){
           $res = $email->enviarcorreo($data);
           header("Location: /page/contactenos?res=".$res);
        }
       
    	
    
		
	}
}
?>
