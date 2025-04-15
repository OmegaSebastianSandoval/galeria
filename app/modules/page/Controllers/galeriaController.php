<?php

/**
 *
 */

class Page_galeriaController extends Page_mainController
{
	// public $seccion_banner = 1;


	public function indexAction()
	{
		$albumModel = new Page_Model_DbTable_Album();
		$fotosModel = new Page_Model_DbTable_Fotos();


		$album = $albumModel->getList("", "orden ASC");
		foreach ($album as $key => $value) {
			$value->fotos = $fotosModel->getList("fotos_album = " . $value->album_id, "orden ASC");
		}
		$this->_view->album = $album;

		$videosModel  = new Page_Model_DbTable_Videos();
		$filters = "";
		$order = "videos_fecha DESC, orden ASC";
		$this->_view->videos = $videosModel->getList($filters, $order);
	}
	public function detalleAction()
	{
		$fotosModel = new Page_Model_DbTable_Fotos();
		$identificador = $this->_getSanitizedParam("id");


		$this->_view->albumDetalle = $fotosModel->getList("fotos_album = $identificador ");
	}
	public function detalleimagenAction()
	{
		$fotosModel = new Page_Model_DbTable_Fotos();
		$identificador = $this->_getSanitizedParam("id");
		
		$this->_view->detalle = $fotosModel->getById($identificador);
	
	}
}
