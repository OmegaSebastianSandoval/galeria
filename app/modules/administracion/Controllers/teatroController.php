<?php

/**
 * Controlador de Programacion que permite la  creacion, edicion  y eliminacion de los programacion del Sistema
 */
class Administracion_teatroController extends Administracion_mainController
{
	public $botonpanel = 9;

	/**
	 * $mainModel  instancia del modelo de  base de datos programacion
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
	protected $_csrf_section = "administracion_programacion";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
	 * Inicializa las variables principales del controlador programacion .
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
		$this->mainModel = new Administracion_Model_DbTable_Teatro();
		$this->namefilter = "parametersfilterteatro";
		$this->route = "/administracion/teatro";
		$this->namepages = "pages_teatro";
		$this->namepageactual = "page_actual_teatro";
		$this->_view->route = $this->route;
		if (Session::getInstance()->get($this->namepages)) {
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
	 * Recibe la informacion y  muestra un listado de  programacion con sus respectivos filtros.
	 *
	 * @return void.
	 */
	public function indexAction()
	{
		$title = "Administración de Teatro";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters = (object)Session::getInstance()->get($this->namefilter);
		$this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "orden ASC";
		$list = $this->mainModel->getList("$filters AND programacion_tipoevento = 'Teatro'", $order);
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
		$this->_view->lists = $this->mainModel->getListPages("$filters AND programacion_tipoevento = 'Teatro'", $order, $start, $amount);
		$this->_view->csrf_section = $this->_csrf_section;
	}

	/**
	 * Genera la Informacion necesaria para editar o crear un  programacion  y muestra su formulario
	 *
	 * @return void.
	 */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_programacion_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if ($content->programacion_id) {
				$this->_view->content = $content;
				$this->_view->routeform = $this->route . "/update";
				$title = "Actualizar teatro";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			} else {
				$this->_view->routeform = $this->route . "/insert";
				$title = "Crear teatro";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route . "/insert";
			$title = "Crear teatro";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}

		$vendedoresModel = new Administracion_Model_DbTable_Vendedores();
		$this->_view->vendors = $vendedoresModel->getList("", "");
	}

	public function enlaceAction()
	{
		$vendedoresModel = new Administracion_Model_DbTable_Vendedores();

		$id = $this->_getSanitizedParam("id");
		$vendor = $this->_getSanitizedParam('vendor');
		$list = $vendedoresModel->getById($vendor);
		$nombre = $list->id;
		$fecha = date("Ymd");

		//$texto = "https://www.galeriacafelibro.com.co/page/programacion/detalle?id=".$id."&vendor=".$vendor;
		$texto = "http://newgaleria.galeriacafelibro.com.co/programacion/detalle?vendor=" . $vendor . "&id=" . $id;
		$ruta = "images/" . $nombre . $fecha . ".png";
		$tamanio = 5;
		$level = "Q";
		$framsize = 3;

		$this->_view->id = $id;
		$this->_view->nombre = $nombre;
		$this->_view->fecha = $fecha;
		$this->_view->texto = $texto;
		$this->_view->ruta = $ruta;
		$this->_view->tamanio = $tamanio;
		$this->_view->level = $level;
		$this->_view->framsize = $framsize;
		$this->_view->vendor = $vendor;
	}

	/**
	 * Inserta la informacion de un programacion  y redirecciona al listado de programacion.
	 *
	 * @return void.
	 */
	public function insertAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf) {
			$data = $this->getData();
			$uploadImage =  new Core_Model_Upload_Image();
			if ($_FILES['programacion_imagen']['name'] != '') {
				$data['programacion_imagen'] = $uploadImage->upload("programacion_imagen");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id, $id);
			$data['programacion_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'CREAR PROGRAMACION';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe un identificador  y Actualiza la informacion de un programacion  y redirecciona al listado de programacion.
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
			if ($content->programacion_id) {
				$data = $this->getData();
				$uploadImage =  new Core_Model_Upload_Image();
				if ($_FILES['programacion_imagen']['name'] != '') {
					if ($content->programacion_imagen) {
						$uploadImage->delete($content->programacion_imagen);
					}
					$data['programacion_imagen'] = $uploadImage->upload("programacion_imagen");
				} else {
					$data['programacion_imagen'] = $content->programacion_imagen;
				}
				$this->mainModel->update($data, $id);
			}
			$data['programacion_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'EDITAR PROGRAMACION';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe un identificador  y elimina un programacion  y redirecciona al listado de programacion.
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
					$uploadImage =  new Core_Model_Upload_Image();
					if (isset($content->programacion_imagen) && $content->programacion_imagen != '') {
						$uploadImage->delete($content->programacion_imagen);
					}
					$this->mainModel->deleteRegister($id);
					$data = (array)$content;
					$data['log_log'] = print_r($data, true);
					$data['log_tipo'] = 'BORRAR PROGRAMACION';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data);
				}
			}
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Programacion.
	 *
	 * @return array con toda la informacion recibida del formulario.
	 */
	private function getData()
	{
		$data = array();

		$data['programacion_nombre'] = $this->_getSanitizedParam("programacion_nombre");
		$data['programacion_imagen'] = "";
		$data['programacion_costo'] = $this->_getSanitizedParam("programacion_costo");
		$data['programacion_fecha'] = $this->_getSanitizedParam("programacion_fecha");
		$data['programacion_hora'] = $this->_getSanitizedParam("programacion_hora");
		$data['programacion_lugar'] = $this->_getSanitizedParam("programacion_lugar");
		$data['programacion_descripcion'] = $this->_getSanitizedParamHtml("programacion_descripcion");
		$data['programacion_titulo_politica'] = $this->_getSanitizedParamHtml("programacion_titulo_politica");
		$data['programacion_descripcion_politica'] = $this->_getSanitizedParamHtml("programacion_descripcion_politica");

		return $data;
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
			if ($filters->programacion_nombre != '') {
				$filtros = $filtros . " AND programacion_nombre LIKE '%" . $filters->programacion_nombre . "%'";
			}
			if ($filters->programacion_imagen != '') {
				$filtros = $filtros . " AND programacion_imagen LIKE '%" . $filters->programacion_imagen . "%'";
			}
			if ($filters->programacion_lugar != '') {
				$filtros = $filtros . " AND programacion_lugar LIKE '%" . $filters->programacion_lugar . "%'";
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
			$parramsfilter['programacion_nombre'] =  $this->_getSanitizedParam("programacion_nombre");
			$parramsfilter['programacion_imagen'] =  $this->_getSanitizedParam("programacion_imagen");
			$parramsfilter['programacion_lugar'] =  $this->_getSanitizedParam("programacion_lugar");
			Session::getInstance()->set($this->namefilter, $parramsfilter);
		}
		if ($this->_getSanitizedParam("cleanfilter") == 1) {
			Session::getInstance()->set($this->namefilter, '');
			Session::getInstance()->set($this->namepageactual, 1);
		}
	}
}
