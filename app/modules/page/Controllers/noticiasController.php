<?php

/**
 *
 */

class Page_noticiasController extends Page_mainController
{
	// public $seccion_banner = 1;

	public function indexAction()
	{
		// $this->_view->restaurante = $this->template->getContentseccion(4);
		$blog = new Page_Model_DbTable_Blog();
		$order =  "blog_fecha DESC, orden ASC";
		$filters = "blog_estado='1'";
		$list = $blog->getListCount($filters, $order)[0];

		$amount = 10;
		$page = $this->_getSanitizedParam("page");
		if (!$page) {
			$start = 0;
			$page = 1;
		} else {
			$start = ($page - 1) * $amount;
		}
		$this->_view->totalpages = ceil($list->total / $amount);
		$this->_view->page = $page;
		$this->_view->blog = $blog->getListPages($filters, $order, $start, $amount);
	}
	public function detalleAction()
	{
		// $this->_view->restaurante = $this->template->getContentseccion(4);
		$blog = new Page_Model_DbTable_Blog();
		$identificador = $this->_getSanitizedParam("id");
		$blogLates = new Page_Model_DbTable_Blog();

		$this->_view->blogDetalle = $blog->getById($identificador);
		$this->_view->blogLates = $blogLates->getList("blog_id != '$identificador' AND blog_estado='1' AND blog_importante='1'", "orden DESC LIMIT 3");
	}
}
