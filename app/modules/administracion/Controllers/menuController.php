<?php

/**
 * Controlador de Menu que permite la  creacion, edicion  y eliminacion de los menu del Sistema
 */
class Administracion_menuController extends Administracion_mainController
{
	public $botonpanel = 7;

	/**
	 * $mainModel  instancia del modelo de  base de datos menu
	 * @var modeloContenidos
	 */
	public $mainModel;

	/**
	 * $route  url del controlador base
	 * @var string
	 */
	protected $route;

	/**
	 * $pages cantidad de registros a mostrar por pagina]
	 * @var integer
	 */
	protected $pages;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "administracion_menu";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
	 * Inicializa las variables principales del controlador menu .
	 *
	 * @return void.
	 */
	public function init()
	{
		$id = Session::getInstance()->get("kt_login_id");
		$level = Session::getInstance()->get("kt_login_level");
		//si es cargo 3 o validador se redirecciona al panel 
		if (isset($id) && $id > 0 && $level == 3) {
			header('Location: /administracion/panel');
		}
		$this->mainModel = new Administracion_Model_DbTable_Menu();
		$this->namefilter = "parametersfiltermenu";
		$this->route = "/administracion/menu";
		$this->namepages = "pages_menu";
		$this->namepageactual = "page_actual_menu";
		$this->_view->route = $this->route;
		if (Session::getInstance()->get($this->namepages)) {
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
	 * Recibe la informacion y  muestra un listado de  menu con sus respectivos filtros.
	 *
	 * @return void.
	 */
	public function indexAction()
	{
		$title = "Administración de menu";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters = (object)Session::getInstance()->get($this->namefilter);
		$this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "orden ASC";
		$list = $this->mainModel->getList($filters, $order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page && Session::getInstance()->get($this->namepageactual)) {
			$page = Session::getInstance()->get($this->namepageactual);
			$start = ($page - 1) * $amount;
		} else if (!$page) {
			$start = 0;
			$page = 1;
			Session::getInstance()->set($this->namepageactual, $page);
		} else {
			Session::getInstance()->set($this->namepageactual, $page);
			$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list) / $amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters, $order, $start, $amount);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->list_menu_seccion = $this->getMenuseccion();
	}

	/**
	 * Genera la Informacion necesaria para editar o crear un  menu  y muestra su formulario
	 *
	 * @return void.
	 */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_menu_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->list_menu_seccion = $this->getMenuseccion();
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if ($content->menu_id) {
				$this->_view->content = $content;
				$this->_view->routeform = $this->route . "/update";
				$title = "Actualizar menu";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			} else {
				$this->_view->routeform = $this->route . "/insert";
				$title = "Crear menu";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route . "/insert";
			$title = "Crear menu";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
	 * Inserta la informacion de un menu  y redirecciona al listado de menu.
	 *
	 * @return void.
	 */
	public function insertAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf) {
			$data = $this->getData();
			$uploadDocument =  new Core_Model_Upload_Document();
			if ($_FILES['menu_restaurante']['name'] != '') {
				$data['menu_restaurante'] = $uploadDocument->upload("menu_restaurante");
			}
			if ($_FILES['menu_bar']['name'] != '') {
				$data['menu_bar'] = $uploadDocument->upload("menu_bar");
			}

			$uploadImage = new Core_Model_Upload_Image();
			if($_FILES['menu_imagen']['name'] != ''){
				$data['menu_imagen'] = $uploadImage->upload("menu_imagen");
			}

			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id, $id);
			$data['menu_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'CREAR MENU';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe un identificador  y Actualiza la informacion de un menu  y redirecciona al listado de menu.
	 *
	 * @return void.
	 */
	public function updateAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->menu_id) {
				$data = $this->getData();
				$uploadDocument =  new Core_Model_Upload_Document();
				$uploadImage =  new Core_Model_Upload_Image();
				
				if ($_FILES['menu_restaurante']['name'] != '') {
					if ($content->menu_restaurante) {
						$uploadDocument->delete($content->menu_restaurante);
					}
					$data['menu_restaurante'] = $uploadDocument->upload("menu_restaurante");
				} else {
					$data['menu_restaurante'] = $content->menu_restaurante;
				}

				if ($_FILES['menu_bar']['name'] != '') {
					if ($content->menu_bar) {
						$uploadDocument->delete($content->menu_bar);
					}
					$data['menu_bar'] = $uploadDocument->upload("menu_bar");
				} else {
					$data['menu_bar'] = $content->menu_bar;
				}

				if ($_FILES['menu_imagen']['name'] != '') {
					if ($content->menu_imagen) {
						$uploadImage->delete($content->menu_imagen);
					}
					$data['menu_imagen'] = $uploadImage->upload("menu_imagen");
				} else {
					$data['menu_imagen'] = $content->menu_imagen;
				}

				$this->mainModel->update($data, $id);
			}
			$data['menu_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'EDITAR MENU';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe un identificador  y elimdeleteina un menu  y redirecciona al listado de menu.
	 *
	 * @return void.
	 */
	public function deleteAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$uploadDocument =  new Core_Model_Upload_Document();
					if (isset($content->menu_restaurante) && $content->menu_restaurante != '') {
						$uploadDocument->delete($content->menu_restaurante);
					}

					if (isset($content->menu_bar) && $content->menu_bar != '') {
						$uploadDocument->delete($content->menu_bar);
					}
					$this->mainModel->deleteRegister($id);
					$data = (array)$content;
					$data['log_log'] = print_r($data, true);
					$data['log_tipo'] = 'BORRAR MENU';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data);
				}
			}
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Menu.
	 *
	 * @return array con toda la informacion recibida del formulario.
	 */
	private function getData()
	{
		$data = array();
		if ($this->_getSanitizedParam("menu_seccion") == '') {
			$data['menu_seccion'] = '0';
		} else {
			$data['menu_seccion'] = $this->_getSanitizedParam("menu_seccion");
		}
		$data['menu_nombre'] = $this->_getSanitizedParam("menu_nombre");
		$data['menu_bar_link'] = $this->_getSanitizedParam("menu_bar_link");
		$data['menu_restaurante_link'] = $this->_getSanitizedParam("menu_restaurante_link");
		$data['menu_restaurante'] = "";
		$data['menu_bar'] = "";
		$data['menu_imagen'] = "";
		return $data;
	}

	/**
	 * Genera los valores del campo Seccion.
	 *
	 * @return array cadena con los valores del campo Seccion.
	 */
	private function getMenuseccion()
	{
		$array = array();
		$array['1'] = 'Restaurante';
/* 		$array['2'] = 'Bar'; */
		return $array;
	}

	/**
	 * Genera la consulta con los filtros de este controlador.
	 *
	 * @return array cadena con los filtros que se van a asignar a la base de datos
	 */
	protected function getFilter()
	{
		$filtros = " 1 = 1 ";
		if (Session::getInstance()->get($this->namefilter) != "") {
			$filters = (object)Session::getInstance()->get($this->namefilter);
			if ($filters->menu_seccion != '') {
				$filtros = $filtros . " AND menu_seccion ='" . $filters->menu_seccion . "'";
			}
			if ($filters->menu_nombre != '') {
				$filtros = $filtros . " AND menu_nombre LIKE '%" . $filters->menu_nombre . "%'";
			}
		}
		return $filtros;
	}

	/**
	 * Recibe y asigna los filtros de este controlador
	 *
	 * @return void
	 */
	protected function filters()
	{
		if ($this->getRequest()->isPost() == true) {
			Session::getInstance()->set($this->namepageactual, 1);
			$parramsfilter = array();
			$parramsfilter['menu_seccion'] =  $this->_getSanitizedParam("menu_seccion");
			$parramsfilter['menu_nombre'] =  $this->_getSanitizedParam("menu_nombre");
			Session::getInstance()->set($this->namefilter, $parramsfilter);
		}
		if ($this->_getSanitizedParam("cleanfilter") == 1) {
			Session::getInstance()->set($this->namefilter, '');
			Session::getInstance()->set($this->namepageactual, 1);
		}
	}
}
