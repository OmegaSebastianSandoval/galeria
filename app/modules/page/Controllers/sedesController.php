<?php 

/**
*
*/

class Page_sedesController extends Page_mainController
{

	// public $seccion_banner = 1;

	public function indexAction()
	{

		$this->_view->sedes = $this->template->getContentseccion(3);

		$sedesModel = new Page_Model_DbTable_Sedes();
        $this->_view->sedes = $sedesModel->getList();
	}

}