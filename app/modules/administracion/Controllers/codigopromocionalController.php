<?php

/**
 * Controlador de Codigopromocional que permite la  creacion, edicion  y eliminacion de los codigo promocionales del Sistema
 */
class Administracion_codigopromocionalController extends Administracion_mainController
{
	public $botonpanel = 15;

	/**
	 * $mainModel  instancia del modelo de  base de datos codigo promocionales
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
	protected $_csrf_section = "administracion_codigopromocional";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
	 * Inicializa las variables principales del controlador codigopromocional .
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
		$this->mainModel = new Administracion_Model_DbTable_Codigopromocional();
		$this->namefilter = "parametersfiltercodigopromocional";
		$this->route = "/administracion/codigopromocional";
		$this->namepages = "pages_codigopromocional";
		$this->namepageactual = "page_actual_codigopromocional";
		$this->_view->route = $this->route;
		if (Session::getInstance()->get($this->namepages)) {
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
	 * Recibe la informacion y  muestra un listado de  codigo promocionales con sus respectivos filtros.
	 *
	 * @return void.
	 */
	public function indexAction()
	{
		$title = "Administración de codigo promocionales";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters = (object)Session::getInstance()->get($this->namefilter);
		$this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = " fecha DESC ";
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
		$this->_view->list_tipo = $this->getTipo();
		$this->_view->list_eventos_vigentes = $this->getEventosVigentes();
	}

	/**
	 * Genera la Informacion necesaria para editar o crear un  codigo promocional  y muestra su formulario
	 *
	 * @return void.
	 */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_codigopromocional_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->list_tipo = $this->getTipo();
		$this->_view->list_eventos_vigentes = $this->getEventosVigentes();

		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if ($content->id) {
				$this->_view->content = $content;
				$this->_view->routeform = $this->route . "/update";
				$title = "Actualizar codigo promocional";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			} else {
				$this->_view->routeform = $this->route . "/insert";
				$title = "Crear codigo promocional";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route . "/insert";
			$title = "Crear codigo promocional";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
	 * Inserta la informacion de un codigo promocional  y redirecciona al listado de codigo promocionales.
	 *
	 * @return void.
	 */
	public function insertAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf) {
			$data = $this->getData();
			$id = $this->mainModel->insert($data);

			$data['id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'CREAR CODIGO PROMOCIONAL';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe un identificador  y Actualiza la informacion de un codigo promocional  y redirecciona al listado de codigo promocionales.
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
			if ($content->id) {
				$data = $this->getData();
				$this->mainModel->update($data, $id);
			}
			$data['id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'EDITAR CODIGO PROMOCIONAL';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe un identificador  y elimina un codigo promocional  y redirecciona al listado de codigo promocionales.
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
					$this->mainModel->deleteRegister($id);
					$data = (array)$content;
					$data['log_log'] = print_r($data, true);
					$data['log_tipo'] = 'BORRAR CODIGO PROMOCIONAL';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data);
				}
			}
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Codigopromocional.
	 *
	 * @return array con toda la informacion recibida del formulario.
	 */
	private function getData()
	{
		$data = array();
		$data['codigo'] = $this->_getSanitizedParam("codigo");
		if ($this->_getSanitizedParam("tipo") == '') {
			$data['tipo'] = '0';
		} else {
			$data['tipo'] = $this->_getSanitizedParam("tipo");
		}
		if ($this->_getSanitizedParam("valor") == '') {
			$data['valor'] = '0';
		} else {
			$data['valor'] = $this->_getSanitizedParam("valor");
		}
		if ($this->_getSanitizedParam("porcentaje") == '') {
			$data['porcentaje'] = '0';
		} else {
			$data['porcentaje'] = $this->_getSanitizedParam("porcentaje");
		}
		if ($this->_getSanitizedParam("evento") == '') {
			$data['evento'] = '0';
		} else {
			$data['evento'] = $this->_getSanitizedParam("evento");
		}
		if ($this->_getSanitizedParam("activo") == '') {
			$data['activo'] = '0';
		} else {
			$data['activo'] = $this->_getSanitizedParam("activo");
		}

		$data['fecha_uso'] = $this->_getSanitizedParam("fecha_uso");
		if ($this->_getSanitizedParam("usado") == '') {
			$data['usado'] = '0';
		} else {
			$data['usado'] = $this->_getSanitizedParam("usado");
		}
		if ($this->_getSanitizedParam("fecha") == '') {
			$data['fecha'] = date("Y-m-d H:i:s");
		} else {
			$data['fecha'] = $this->_getSanitizedParam("fecha");
		}

		return $data;
	}

	/**
	 * Genera los valores del campo tipo.
	 *
	 * @return array cadena con los valores del campo tipo.
	 */
	private function getTipo()
	{
		$array = array();
		$array['1'] = 'Un solo uso';
		$array['2'] = 'Multiples usos';
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
			if ($filters->codigo != '') {
				$filtros = $filtros . " AND codigo LIKE '%" . $filters->codigo . "%'";
			}
			if ($filters->tipo != '') {
				$filtros = $filtros . " AND tipo ='" . $filters->tipo . "'";
			}
			if ($filters->valor != '') {
				$filtros = $filtros . " AND valor LIKE '%" . $filters->valor . "%'";
			}
			if ($filters->porcentaje != '') {
				$filtros = $filtros . " AND porcentaje LIKE '%" . $filters->porcentaje . "%'";
			}
			if ($filters->usado != '') {
				$filtros = $filtros . " AND usado LIKE '%" . $filters->usado . "%'";
			}
			if ($filters->fecha_uso != '') {
				$filtros = $filtros . " AND fecha_uso LIKE '%" . $filters->fecha_uso . "%'";
			}
			if ($filters->activo != '') {
				$filtros = $filtros . " AND activo LIKE '%" . $filters->activo . "%'";
			}
			if ($filters->fecha != '') {
				$filtros = $filtros . " AND fecha LIKE '%" . $filters->fecha . "%'";
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
			$parramsfilter['codigo'] =  $this->_getSanitizedParam("codigo");
			$parramsfilter['tipo'] =  $this->_getSanitizedParam("tipo");
			$parramsfilter['valor'] =  $this->_getSanitizedParam("valor");
			$parramsfilter['porcentaje'] =  $this->_getSanitizedParam("porcentaje");
			$parramsfilter['evento'] =  $this->_getSanitizedParam("evento");
			$parramsfilter['usado'] =  $this->_getSanitizedParam("usado");
			$parramsfilter['fecha_uso'] =  $this->_getSanitizedParam("fecha_uso");
			$parramsfilter['activo'] =  $this->_getSanitizedParam("activo");
			$parramsfilter['fecha'] =  $this->_getSanitizedParam("fecha");
			Session::getInstance()->set($this->namefilter, $parramsfilter);
		}
		if ($this->_getSanitizedParam("cleanfilter") == 1) {
			Session::getInstance()->set($this->namefilter, '');
			Session::getInstance()->set($this->namepageactual, 1);
		}
	}

	/**
	 * Genera los valores del campo Album.
	 *
	 * @return array cadena con los valores del campo Album.
	 */
	private function getEventosVigentes()
	{

		//consultar los eventos que aun no han pasado
		$fechaactual = date('Y-m-d');
		$horaactual = date('H:i:s');

		$programacionModel = new Administracion_Model_DbTable_Programacion();


		$data = $programacionModel->getList("'$fechaactual' < programacion_fecha  OR  ( '$fechaactual' = programacion_fecha AND '$horaactual' <= programacion_hora)", "programacion_id DESC");
		$array = array();
		foreach ($data as $key => $value) {
			$array[$value->programacion_id] = $value->programacion_nombre;
		}
		return $array;
	}
}
