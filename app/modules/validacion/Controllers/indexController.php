<?php

/**
 *
 */

class Validacion_indexController extends Validacion_mainController
{
	protected $mainModel;
	protected $route;
	protected $_csrf_section = "login_validacion";
	public $csrf;
	public function init()
	{
		$this->mainModel = new Core_Model_DbTable_User();
		$this->route = '/validacion/';
		$this->_view->route = $this->route;
		$this->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		parent::init();
	}

	public function indexAction()
	{
		$user = Session::getInstance()->get("user");
		$uid = $this->_getSanitizedParam("uid");
		$token = $this->_getSanitizedParam("token");
		if ($user) {
			if ($uid && $token) {
				header("Location: /validacion/validar/?uid={$uid}&token={$token}");
				exit;
			} else {
				header('Location: /validacion/eventos/');
			}
			exit;
		}
		$csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];


		$this->_view->csrf = $csrf;
		$this->_view->uid = $uid;
		$this->_view->token = $token;
		$this->_view->error_login = Session::getInstance()->get("error_login");
		Session::getInstance()->set("error_login", "");
	}
	public function validarusuarioAction()
	{
		Session::getInstance()->set("error_login", "");
		$isPost = $this->getRequest()->isPost();
		$user = $this->_getSanitizedParam("user");
		$password = $this->_getSanitizedParam("password");

		$uid = $this->_getSanitizedParam("uid");
		$token = $this->_getSanitizedParam("token");

		$csrf = $this->_getSanitizedParam("csrf");

		if (!$isPost || !$user || !$password || $this->csrf !== $csrf) {
			Session::getInstance()->set("error_login", "Lo sentimos ocurrio un error intente de nuevo.");
			if ($uid && $token) {
				header("Location: /validacion/?uid={$uid}&token={$token}");
			} else {
				header('Location: /validacion/?v=1');
			}
			exit;
		}
		$userModel = new core_Model_DbTable_User();

		if (!$userModel->autenticateUser($user, $password)) {
			Session::getInstance()->set("error_login", "El Usuario o Contraseña son incorrectos.");

			if ($uid && $token) {
			
				header("Location: /validacion/?uid={$uid}&token={$token}");
			} else {
				header('Location: /validacion/?v=2');
			}
			exit;
		}
		$resUser = $userModel->searchUserByUser($user);

		if ($resUser->user_state != 1) {
			Session::getInstance()->set("error_login", "El Usuario se encuentra inactivo.");
			if ($uid && $token) {
				header("Location: /validacion/?uid={$uid}&token={$token}");
			} else {
				header('Location: /validacion/?v=3');
			}
			exit;
		}

		Session::getInstance()->set("user", $resUser);

		if ($uid && $token) {
			header("Location: /validacion/validar/?uid={$uid}&token={$token}");
			exit;
		}


		//LOG
		$data['log_tipo'] = "LOGIN";
		$data['log_usuario'] = $resUser->user_user;
		$logModel = new Administracion_Model_DbTable_Log();
		$logModel->insert($data);

		header('Location: /validacion/eventos/');
		exit;
	}

	public function logoutAction()
	{
		Session::getInstance()->set("user", "");
		Session::getInstance()->set("error_login", "");
		header('Location: /validacion/');
		exit;
	}
}
