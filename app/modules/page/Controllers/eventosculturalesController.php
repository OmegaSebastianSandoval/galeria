<?php

/**
 *
 */

class Page_eventosculturalesController extends Page_mainController
{

    public function indexAction()
    {
         $publicidadModel = new Page_Model_DbTable_Publicidad();
        $this->_view->banner = $publicidadModel->getList("publicidad_seccion='4'","")[0];
        $programacionModel = new Page_Model_DbTable_Teatro();
        $fechaactualevento = date('Y-m-d H:i:s');
        $filters = " '$fechaactualevento' <= programacion_fecha  AND programacion_tipoevento = 'Eventos'";
        $order = "programacion_fecha ASC, orden ASC";
        $list = $programacionModel->getListCount($filters, $order)[0];
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
   
}
