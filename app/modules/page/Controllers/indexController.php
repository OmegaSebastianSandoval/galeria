<?php

/**
 *
 */

class Page_indexController extends Page_mainController
{
	// public $seccion_banner = 1;

	// public function indexAction()
	// {
	// 	// phpinfo();
	// $this->setLayout('page_home'); 
	// 	$this->template = new Page_Model_Template_Template($this->_view);
	// 	$infopageModel = new Page_Model_DbTable_Informacion();
	// 	$this->_view->infopage = $infopageModel->getById(1);
	// 	$mapaModel = new Page_Model_DbTable_Mapa();
	// 	$this->_view->mapa = $mapaModel->getList("", "orden ASC");
	// 	$header = $this->_view->getRoutPHP('modules/page/Views/partials/headerhome.php');
	// 	$this->getLayout()->setData("header",$header);
	// 	$footer = $this->_view->getRoutPHP('modules/page/Views/partials/footer.php');
	// 	$this->getLayout()->setData("footer",$footer);
	// 	$flotantes = $this->_view->getRoutPHP('modules/page/Views/partials/flotantes.php');
	// 	$this->getLayout()->setData("flotantes",$flotantes);
	// 	$this->_view->bannerprincipal = $this->template->bannerprincipal(1);
	// 	$this->_view->contenidohome = $this->template->getContentseccion(1);
	// 	$noticiasModel = new Page_Model_DbTable_Contenido();
	// 	$this->_view->noticias = $noticiasModel->getListPages("contenido_seccion = '2'", "contenido_fecha DESC, orden ASC",0,3);
	// 	$albumModel = new Page_Model_DbTable_Album();
	// 	$this->_view->album = $albumModel->getListPages("", "album_fecha DESC, orden ASC", 0,1);
	// 	$videosModel = new Page_Model_DbTable_Videos();
	// 	$this->_view->videos = $videosModel->getListPages("", "videos_fecha DESC, orden ASC",0,1);
	// 	$fondosModel = new Page_Model_DbTable_Fondos();
	// 	$this->_view->fondonoticia = $fondosModel->getList("fondo_seccion = '2'", "orden ASC");
	// }
	public function indexAction()
	{
		
		$this->_view->bannerprincipal = $this->template->bannerprincipal(1);
		$this->_view->contenidohome = $this->template->getContentseccion(1);
		
		
		$programacionModel = new Page_Model_DbTable_Programacion();
		$fechaactualevento = date('Y-m-d');
		$filters = " '$fechaactualevento' <= programacion_fecha";
		$order = "programacion_fecha ASC, orden ASC";
		$this->_view->programaciones =  $programacionModel->getList($filters, $order);

		
		$noticiasModel = new Page_Model_DbTable_Contenido();
		$this->_view->noticias = $noticiasModel->getListPages("contenido_seccion = '2'", "contenido_fecha DESC, orden ASC", 0, 6);
		$fotosModel = new Administracion_Model_DbTable_Fotos();
		$this->_view->fotos = $fotosModel->getList("", "fotos_fecha DESC LIMIT 6");
		$textoConocenos = new Page_Model_DbTable_Contenido();
		$this->_view->textoConocenos = $textoConocenos->getList("contenido_id='420'")[0];
		$blog = new Page_Model_DbTable_Blog();
		$order =  "blog_fecha DESC, orden ASC";
		$filters = "blog_estado='1' AND blog_importante = '1'";
		$this->_view->blog = $blog->getList($filters, $order);
	}
}
