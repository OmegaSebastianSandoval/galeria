<?php 

/**
*
*/

class Page_noticiasController extends Page_mainController
{

	public function indexAction() 
	{
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$filters = "contenido_seccion = '2'";
		$order = "orden ASC";
		$list = $contenidoModel->getListCount($filters,$order)[0];
		$amount = 4;
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
		$this->_view->noticias = $contenidoModel->getListPages($filters,$order,$start,$amount);
		$fondosModel = new Page_Model_DbTable_Fondos();
		$this->_view->fondonoticia = $fondosModel->getList("fondo_seccion = '2'", "orden ASC");
    }
    public function detalleAction(){
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->detalle = $contenidoModel->getById($identificador);
		$this->_view->noticia = $contenidoModel->getList("contenido_seccion = '2'", "orden ASC");
	}
}