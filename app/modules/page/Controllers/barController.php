<?php 

/**
*
*/

class Page_barController extends Page_mainController
{

	public function indexAction()
	{
        $this->_view->bar = $this->template->getContentseccion(5);
        $menuModel = new Page_Model_DbTable_Menu();
        $this->_view->restaurante = $menuModel->getList("menu_seccion='1'", "orden ASC");
        $this->_view->bares = $menuModel->getList("menu_seccion='2'", "orden ASC");
	}

}