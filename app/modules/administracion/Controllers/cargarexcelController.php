<?php

/**
 * Controlador de Cargarexcel que permite la  creacion, edicion  y eliminacion de los Cargar del Sistema
 */

class Administracion_cargarexcelController extends Administracion_mainController
{
	public $botonpanel = 5;

	/**
	 * $mainModel  instancia del modelo de  base de datos Cargar
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
	protected $_csrf_section = "administracion_cargarexcel";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
	 * Inicializa las variables principales del controlador cargarexcel .
	 *
	 * @return void.
	 */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Cargarexcel();
		$this->namefilter = "parametersfiltercargarexcel";
		$this->route = "/administracion/cargarexcel";
		$this->namepages = "pages_cargarexcel";
		$this->namepageactual = "page_actual_cargarexcel";
		$this->_view->route = $this->route;
		if (Session::getInstance()->get($this->namepages)) {
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
	 * Recibe la informacion y  muestra un listado de  Cargar con sus respectivos filtros.
	 *
	 * @return void.
	 */
	public function indexAction()
	{
		$title = "Aministración de Cargar";
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
	}

	/**
	 * Genera la Informacion necesaria para editar o crear un  Cargar  y muestra su formulario
	 *
	 * @return void.
	 */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_cargarexcel_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if ($content->archivo_id) {
				$this->_view->content = $content;
				$this->_view->routeform = $this->route . "/update";
				$title = "Actualizar Cargar";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			} else {
				$this->_view->routeform = $this->route . "/insert";
				$title = "Crear Cargar";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route . "/insert";
			$title = "Crear Cargar";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
	 * Inserta la informacion de un Cargar  y redirecciona al listado de Cargar.
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
			if ($_FILES['archivodocumento']['name'] != '') {
				$data['archivodocumento'] = $uploadDocument->upload("archivodocumento");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id, $id);
			$data['archivo_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'CREAR CARGAR';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe un identificador  y Actualiza la informacion de un Cargar  y redirecciona al listado de Cargar.
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
			if ($content->archivo_id) {
				$data = $this->getData();
				$uploadDocument =  new Core_Model_Upload_Document();
				if ($_FILES['archivodocumento']['name'] != '') {
					if ($content->archivodocumento) {
						$uploadDocument->delete($content->archivodocumento);
					}
					$data['archivodocumento'] = $uploadDocument->upload("archivodocumento");
				} else {
					$data['archivodocumento'] = $content->archivodocumento;
				}
				$this->mainModel->update($data, $id);
			}
			$data['archivo_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'EDITAR CARGAR';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		// header('Location: '.$this->route.''.'');
		header('Location: ' . $this->route . '/cargar' . '');
	}

	public function cargarAction()
	{

		// Establecer el diseño de la página
		$this->setLayout('blanco');

		// Obtener el nombre del archivo de la base de datos
		$archivo = $this->mainModel->getById(1);
		$archivo = $archivo->archivodocumento;
		$inputFileName = FILE_PATH . $archivo;

		// Cargar el archivo de Excel
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
		$infoExcel = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

		$fotosModel = new Administracion_Model_DbTable_Fotos();

		$error = true;
		// Iterar sobre cada fila del archivo Excel
		for ($i = 2; $i <= count($infoExcel); $i++) {
			$fila = $infoExcel[$i];
			$data = [
				'fotos_titulo' => $fila['A'],
				'fotos_foto' => $fila['B'],
				'fotos_fecha' => $this->convertDateFormat($fila['C']),
				'fotos_album' => $fila['D'],
				'fotos_descripcion' => $fila['E']

			];

			// Verificar y procesar usuario en tabla de cedulas
			if ($data['fotos_titulo'] && $data['fotos_foto']) {
				$imagen = $fotosModel->getList("fotos_foto='" . $data['fotos_foto'] . "'", "")[0];
				if ($imagen) {
					$error = false;
					$fotosModel->editField($imagen->fotos_id, "fotos_titulo", $data['fotos_titulo']);
					$fotosModel->editField($imagen->fotos_id, "fotos_fecha", $data['fotos_fecha']);
					$fotosModel->editField($imagen->fotos_id, "fotos_album", $data['fotos_album']);
					$fotosModel->editField($imagen->fotos_id, "fotos_descripcion", $data['fotos_descripcion']);
				} else {
					$error = false;
					 $fotosModel->insert($data);
				}
			}
		}

		// Redireccionar después de procesar todas las filas
		if (!$error) {
			Session::getInstance()->set("error_carga", "Archivo cargado correctamente");
			Session::getInstance()->set("error_type", "success");
			header('Location: /administracion/fotos' . '');
		} else {
			Session::getInstance()->set("error_carga", "El archivo no fue cargado correctamente");
			Session::getInstance()->set("error_type", "danger");
			header('Location: /administracion/fotos' . '');
		}
	}
	/**
	 * Recibe un identificador  y elimina un Cargar  y redirecciona al listado de Cargar.
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
					if (isset($content->archivodocumento) && $content->archivodocumento != '') {
						$uploadDocument->delete($content->archivodocumento);
					}
					$this->mainModel->deleteRegister($id);
					$data = (array)$content;
					$data['log_log'] = print_r($data, true);
					$data['log_tipo'] = 'BORRAR CARGAR';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data);
				}
			}
		}
		header('Location: ' . $this->route . '' . '');
	}
	
	function convertDateFormat($date) {
    $dateObj = DateTime::createFromFormat('d/m/Y', $date);
    return $dateObj ? $dateObj->format('Y-m-d') : false;
}

	/**
	 * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Cargarexcel.
	 *
	 * @return array con toda la informacion recibida del formulario.
	 */
	private function getData()
	{
		$data = array();
		$data['archivodocumento'] = "";
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
			if ($filters->archivodocumento != '') {
				$filtros = $filtros . " AND archivodocumento LIKE '%" . $filters->archivodocumento . "%'";
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
			$parramsfilter['archivodocumento'] =  $this->_getSanitizedParam("archivodocumento");
			Session::getInstance()->set($this->namefilter, $parramsfilter);
		}
		if ($this->_getSanitizedParam("cleanfilter") == 1) {
			Session::getInstance()->set($this->namefilter, '');
			Session::getInstance()->set($this->namepageactual, 1);
		}
	}
}
