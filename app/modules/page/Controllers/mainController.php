<?php 

/**
*
*/

class Page_mainController extends Controllers_Abstract
{

	public $template;

	public function init()
	{
		$this->setLayout('page_home');
		$this->template = new Page_Model_Template_Template($this->_view);
		$infopageModel = new Page_Model_DbTable_Informacion();
		$this->_view->infopage = $informacion = $infopageModel->getById(1);
		$mapaModel = new Page_Model_DbTable_Mapa();
		//Llamar banner desde la pagina
		$this->_view->bannerprincipal = $this->template->bannerprincipal($this->seccion_banner);
		$botonesModel = new Page_Model_DbTable_Publicidad();
		$this->_view->botones = $botonesModel->getList("publicidad_seccion='2' AND publicidad_estado='1'","orden ASC");
		
		$this->getLayout()->setData("meta_description", "$informacion->info_pagina_descripcion");
		$this->getLayout()->setData("meta_keywords", "$informacion->info_pagina_tags");
		$this->getLayout()->setData("scripts", "$informacion->info_pagina_scripts");
		$this->getLayout()->setData("metricas", "$informacion->info_pagina_metricas");



		$this->_view->mapa = $mapaModel->getList("", "orden ASC");
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
		$this->getLayout()->setData("header",$header);
		$footer = $this->_view->getRoutPHP('modules/page/Views/partials/footer.php');
		$this->getLayout()->setData("footer",$footer); 
			$flotantes = $this->_view->getRoutPHP('modules/page/Views/partials/flotantes.php');
		$this->getLayout()->setData("flotantes",$flotantes);
		$this->usuario();

	}


	public function usuario(){
		$userModel = new Core_Model_DbTable_User();
		$user = $userModel->getById(Session::getInstance()->get("kt_login_id"));
		if($user->user_id == 1){
			$this->editarpage = 1;
		}
	}

} 