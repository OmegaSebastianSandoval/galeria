<?php 

/**
*
*/

class Page_videosController extends Page_mainController
{

	public function indexAction() 
	{
		$contenidoModel = new Page_Model_DbTable_Videos();
		$filters = "";
		$order = "videos_fecha DESC, orden ASC";
		$list = $contenidoModel->getListCount($filters,$order)[0];
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
		$this->_view->videos = $contenidoModel->getListPages($filters,$order,$start,$amount);
    }
    public function detalleAction(){
		$contenidoModel = new Page_Model_DbTable_Videos();
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->detalle = $contenidoModel->getById($identificador);
	}
}