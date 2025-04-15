<?php 

/**
*
*/

class Page_restauranteController extends Page_mainController
{

	public function indexAction()
	{
        $this->_view->restaurante = $this->template->getContentseccion(4);
        $menuModel = new Page_Model_DbTable_Menu();
        $this->_view->resta = $menuModel->getList("menu_seccion='1'", "orden ASC");
	}

}