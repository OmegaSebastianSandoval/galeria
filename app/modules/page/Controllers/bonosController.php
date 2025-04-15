<?php

/**
 *
 */


class Page_bonosController extends Page_mainController
{

	public function indexAction()
	{
		$programacionModel = new Page_Model_DbTable_Programacion();
		$fechaactualevento = date('Y-m-d H:i:s');

		$filters = " '$fechaactualevento' <= programacion_fecha AND programacion_tipoevento is null AND programacion_bono = 1 ";
		$order = "programacion_fecha ASC, orden ASC";
		$list = $programacionModel->getListCount($filters, $order)[0];
		$amount = 12;
		$page = $this->_getSanitizedParam("page");
		if (!$page) {
			$start = 0;
			$page = 1;
		} else {
			$start = ($page - 1) * $amount;
		}
		$this->_view->totalpages = ceil($list->total / $amount);
		$this->_view->page = $page;
		$eventos = $programacionModel->getListPages($filters, $order, $start, $amount);
		$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
		$fechaactual = date('Y-m-d');
		$horaactual = date('H:i:s');
		$array = array();
		foreach ($eventos as $key => $evento) {
			$id = $evento->programacion_id;
			$array[$key] = [];
			$array[$key]['detalle'] = $evento;
			$array[$key]['boleteria'] = $boletaeventoModel->getList("boleta_evento_evento = '$id' AND ( '$fechaactual' < boleta_evento_fechalimite OR  ( '$fechaactual' = boleta_evento_fechalimite AND '$horaactual' <= boleta_evento_horalimite))", "");
		}
		$this->_view->programacion = $array;
	}
	public function reservaAction()
	{
		$programacionModel = new Page_Model_DbTable_Programacion();
		$identificador = $this->_getSanitizedParam("id");
		$this->_view->reserva = $programacionModel->getById($identificador);
	}
	public function detalleAction()
	{
		$programacionModel = new Page_Model_DbTable_Programacion();
		$boletaeventoModel = new Page_Model_DbTable_Boletaevento();
		$vendedoresModel = new Administracion_Model_DbTable_Vendedores();
		$identificador = $this->_getSanitizedParam("id");
		$vendor = $this->_getSanitizedParam("vendor");
		$vendors = $vendedoresModel->getList("id='$vendor'", "");
		foreach ($vendors as $key => $value) {
			$vendedor = $value->nombre;
		}
		$fechaActual = date("Y-m-d");
		$horaActual = date("H:i:s.u");
		$this->_view->vendor = $vendedor;
		$this->_view->detalle = $programacionModel->getById($identificador);
		$this->_view->boletas = $boletaeventoModel->getListJoin("boleta_evento_evento = '$identificador' AND ( '$fechaActual' < boleta_evento_fechalimite OR ( '$fechaActual'= boleta_evento_fechalimite AND  '$horaActual' <= boleta_evento_horalimite))", "");
		//	$this->_view->boletas = $boletaeventoModel->getListJoin("boleta_evento_evento = '$identificador' ", "");
		// 		$this->_view->boletas = $boletaeventoModel->getListJoin("boleta_evento_evento = '$identificador' AND  '$fechaActual' <= boleta_evento_fechalimite AND '$horaActual' <= boleta_evento_horalimite", "");
		$error = 1;
		$this->_view->error = $error;
	}
	
}
