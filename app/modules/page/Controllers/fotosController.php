<?php 

/**
*
*/

class Page_fotosController extends Page_mainController
{

	public function indexAction() 
	{
		$albumModel = new Page_Model_DbTable_Album();
		$filters = "";
		$order = "album_fecha DESC, orden ASC";
		$list = $albumModel->getListCount($filters,$order)[0];
		$amount = 2;
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
		$this->_view->album = $albumModel->getListPages($filters,$order,$start,$amount);
    }
    public function detalleAction(){
		$contenidoModel = new Page_Model_DbTable_Fotos();
		$albumModel = new Page_Model_DbTable_Album();
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->album = $albumModel->getById($identificador);
		$this->_view->fotos = $contenidoModel->getList("fotos_album=$identificador", "orden ASC");
	}
}