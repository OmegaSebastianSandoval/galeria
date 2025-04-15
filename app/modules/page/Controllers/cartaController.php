<?php

/**
 *
 */

class Page_cartaController extends Page_mainController
{
	// public $seccion_banner = 1;

	public function indexAction()
	{
		$this->_view->restaurante = $this->template->getContentseccion(4);
		$menuModel = new Page_Model_DbTable_Menu();
		$this->_view->resta = $menuModel->getList("menu_seccion='1'", "orden ASC");

		$menuFondo = new Page_Model_DbTable_Contenido();
		$this->_view->imagenFondo = $menuFondo->getList("contenido_id='417'")[0];
	}
	public function detalleAction()
	{
		$this->_view->restaurante = $this->template->getContentseccion(4);
		$menuModel = new Page_Model_DbTable_Menu();
		$this->_view->resta = $menuModel->getList("menu_seccion='1'", "orden ASC");
	}
	public function detallecartaAction()
	{
		$menuModel = new Page_Model_DbTable_Menu();
		$id = $this->_getSanitizedParam("id");
		$this->_view->carta = $menuModel->getById($id);
	}
}
