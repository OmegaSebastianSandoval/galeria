<?php

/**
 *
 */

class Validacion_eventosController extends Validacion_mainController
{
	protected $mainModel;
	protected $route;
	protected $_csrf_section = "eventos";
	public $csrf;
	public function init()
	{
		if (!Session::getInstance()->get("user")) {
			header('Location: /validacion/');
			exit;
		}
		parent::init();
	}

	public function indexAction()
	{
		$user = Session::getInstance()->get("user");

		$this->_view->user = $user;


	}
	public function eventoAction()
	{
		$user = Session::getInstance()->get("user");
		$this->_view->user = $user;

	}
}
