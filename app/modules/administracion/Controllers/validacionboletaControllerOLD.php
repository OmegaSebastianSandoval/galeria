<?php

/**
 * Controlador de Transacciones que permite la  creacion, edicion  y eliminacion de los transacciones boleteria del Sistema
 */
class Administracion_validacionboletaController extends Administracion_mainController
{
	public $botonpanel = 19;

	/**
	 * $mainModel  instancia del modelo de  base de datos transacciones boleteria
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
	protected $_csrf_section = "administracion_validaciones";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
	 * Inicializa las variables principales del controlador transacciones .
	 *
	 * @return void.
	 */
	public function init()
	{
		$id = Session::getInstance()->get("kt_login_id");
		$level = Session::getInstance()->get("kt_login_level");
		// echo $id; = 2
		// echo  $level; = 3
		//Seccion solo para validador
		//si es cargo gestor se redirecciona al panel 
		if (isset($id) && $id > 0 && $level == 2) {
			header('Location: /administracion/panel');
		}

		$this->mainModel = new Administracion_Model_DbTable_Validacion();
		$this->namefilter = "parametersfiltervalidaciones";
		$this->route = "/administracion/validacionboleta";
		$this->namepages = "pages_validaciones";
		$this->namepageactual = "page_actual_validaciones";
		$this->_view->route = $this->route;
		if (Session::getInstance()->get($this->namepages)) {
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
	 * Recibe la informacion y  muestra un listado de  transacciones boleteria con sus respectivos filtros.
	 *
	 * @return void.
	 */
	public function indexAction()
	{
		$title = "Administración de transacciones boleteria";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters = (object)Session::getInstance()->get($this->namefilter);

		$this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "boleta_compra_id DESC";

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
		$this->_view->lists = $lists = $this->mainModel->getListPages($filters, $order, $start, $amount);
		$this->_view->csrf_section = $this->_csrf_section;


		$programacionModel = new Administracion_Model_DbTable_Programacion();
		$boletaeventoModel = new Administracion_Model_DbTable_Boletaevento();
		$boletatipoModel = new Administracion_Model_DbTable_Boletatipo();
		$vendedoresModel = new Administracion_Model_DbTable_Vendedores();


		$this->_view->vendors = $vendedoresModel->getList("", "nombre ASC");

		foreach ($lists as $key => $value) {

			$boleta = $boletaeventoModel->getById($value->boleta_compra_tipoboleta);
			$evento_id = $boleta->boleta_evento_evento;
			$evento = $programacionModel->getById($evento_id);
			$value->titulo_evento = $evento->programacion_nombre;

			$boleta_tipo_id = $boleta->boleta_evento_tipo;
			$tipo = $boletatipoModel->getById($boleta_tipo_id);
			$value->tipo_boleta = $tipo->boleta_tipo_nombre;
		}
	}

	/**
	 * Genera la Informacion necesaria para editar o crear un  transaccion  y muestra su formulario
	 *
	 * @return void.
	 */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_validaciones_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];

		$this->_view->res = $this->_getSanitizedParam("res");


		$id = $this->_getSanitizedParam("codigo");
		$this->_view->codigo = 	$id;




		if ($id > 0) {

			$content = $this->mainModel->getById($id);
			if ($content->boleta_compra_id) {
				$this->_view->content = $content;
				$this->_view->routeform = $this->route . "/detalle";
				$title = "Validar Boleta";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}/*  else {
				$this->_view->routeform = $this->route . "/insert";
				$title = "Crear transaccion";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			} */
		} else {
			$this->_view->routeform = $this->route . "/detalle";
			$title = "Validar Boleta";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}


	public function updateAction()
	{
		$res = "";
		$id = $this->_getSanitizedParam("id");


		$this->mainModel->editField($id,  'boleta_compra_validacionentrada', '1');
		$res = 2;
		header('Location: ' . $this->route . '/manage?res=' . $res);

		/* $id = $this->_getSanitizedParam("codigo");
		$update = $this->mainModel->editField($id,  'boleta_compra_validacionentrada', '1');
		print_r($update); */
		// $mainModel = new Administracion_Model_DbTable_Validacion();


		/* 	$update = $mainModel->editField($id,"boleta_compra_validacionentrada","1");
		print_r($update); */

		//header('Location: ' . $this->route . '' . '');
		/* $this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");

		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf) {
			$id = $this->_getSanitizedParam("codigo");
			$update = $this->mainModel->editField($id,  'boleta_compra_validacionentrada', '1');
			echo $update;
			$content = $this->mainModel->getById($id);
			if ($content->boleta_compra_id) {
				$data = $this->getData();
				$this->mainModel->update($data, $id);
			} 
			$data['boleta_compra_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'VALIDAR BOLETA';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . ''); */
	}

	public function detalleAction()
	{



		$this->_view->route = $this->route;
		/* 	$this->_csrf_section = "manage_validaciones_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
	
		$this->_view->csrf_section = $this->_csrf_section;

		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];  */
		$id = $this->_getSanitizedParam("boleta_compra_validacionentrada");

		// $id = $this->_getSanitizedParam("id");

		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if ($content->boleta_compra_id) {
				$this->_view->content = $content;

				$this->_view->routeform = $this->route . "/update";
				$title = "Validar Boleta";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			} else {
				$this->_view->routeform = $this->route . "/insert";
				$title = "Crear transaccion";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route . "/insert";
			$title = "Validar Boleta";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}



		$programacionModel = new Administracion_Model_DbTable_Programacion();
		$boletaeventoModel = new Administracion_Model_DbTable_Boletaevento();
		$boletatipoModel = new Administracion_Model_DbTable_Boletatipo();

		$boleta = $boletaeventoModel->getById($content->boleta_compra_tipoboleta);
		$evento_id = $boleta->boleta_evento_evento;
		$evento = $programacionModel->getById($evento_id);
		$content->titulo_evento = $evento->programacion_nombre;

		$boleta_tipo_id = $boleta->boleta_evento_tipo;
		$tipo = $boletatipoModel->getById($boleta_tipo_id);
		$content->tipo_boleta = $tipo->boleta_tipo_nombre;

		$this->_view->content = $content;
	}


	public function detalleboletavalidadaAction()
	{



		$this->_view->route = $this->route;
		/* 	$this->_csrf_section = "manage_validaciones_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
	
		$this->_view->csrf_section = $this->_csrf_section;

		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];  */


		 $id = $this->_getSanitizedParam("id");

		
			$content = $this->mainModel->getById($id);
			
				$this->_view->content = $content;

				$this->_view->routeform = $this->route . "/update";
				$title = "Detalle Boleta Validada";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			
		



		$programacionModel = new Administracion_Model_DbTable_Programacion();
		$boletaeventoModel = new Administracion_Model_DbTable_Boletaevento();
		$boletatipoModel = new Administracion_Model_DbTable_Boletatipo();

		$boleta = $boletaeventoModel->getById($content->boleta_compra_tipoboleta);
		$evento_id = $boleta->boleta_evento_evento;
		$evento = $programacionModel->getById($evento_id);
		$content->titulo_evento = $evento->programacion_nombre;

		$boleta_tipo_id = $boleta->boleta_evento_tipo;
		$tipo = $boletatipoModel->getById($boleta_tipo_id);
		$content->tipo_boleta = $tipo->boleta_tipo_nombre;

		$this->_view->content = $content;
	}
	/**
	 * Inserta la informacion de un transaccion  y redirecciona al listado de transacciones boleteria.
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

			$data['boleta_compra_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'CREAR TRANSACCION';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe un identificador  y Actualiza la informacion de un transaccion  y redirecciona al listado de transacciones boleteria.
	 *
	 * @return void.
	 */


	/**
	 * Recibe un identificador  y elimina un transaccion  y redirecciona al listado de transacciones boleteria.
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
					$data['log_tipo'] = 'BORRAR TRANSACCION';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data);
				}
			}
		}
		header('Location: ' . $this->route . '' . '');
	}

	/**
	 * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Transacciones.
	 *
	 * @return array con toda la informacion recibida del formulario.
	 */
	private function getData()
	{
		$data = array();
		$data['boleta_compra_tipoboleta'] = $this->_getSanitizedParam("boleta_compra_tipoboleta");
		$data['boleta_compra_cantidad'] = $this->_getSanitizedParam("boleta_compra_cantidad");
		$data['boleta_compra_documento'] = $this->_getSanitizedParam("boleta_compra_documento");
		$data['boleta_compran_nombre'] = $this->_getSanitizedParam("boleta_compran_nombre");
		$data['boleta_compra_telefono'] = $this->_getSanitizedParam("boleta_compra_telefono");
		$data['boleta_compra_email'] = $this->_getSanitizedParam("boleta_compra_email");
		$data['boleta_compra_fechacedula'] = $this->_getSanitizedParam("boleta_compra_fechacedula");
		$data['boleta_compra_fecha'] = $this->_getSanitizedParam("boleta_compra_fecha");
		$data['boleta_compra_codigo'] = $this->_getSanitizedParam("boleta_compra_codigo");
		$data['respuesta'] = $this->_getSanitizedParam("respuesta");
		$data['validacion'] = $this->_getSanitizedParam("validacion");
		$data['validacion2'] = $this->_getSanitizedParam("validacion2");
		$data['entidad'] = $this->_getSanitizedParam("entidad");
		$data['boleta_compra_total'] = $this->_getSanitizedParam("boleta_compra_total");
		return $data;
	}
	/**
	 * Genera la consulta con los filtros de este controlador.
	 *
	 * @return array cadena con los filtros que se van a asignar a la base de datos
	 */
	protected function getFilter()
	{

		//filtrar y solo traer aprovados, descomentar después de solucionar que no se esté guardando el aprovado
		// $filtros = " 1 = 1 AND validacion!='0' ";

		$filtros = " 1 = 1 AND boleta_compra_validacionentrada = '1'  ";

		if (Session::getInstance()->get($this->namefilter) != "") {
			$filters = (object)Session::getInstance()->get($this->namefilter);
			if ($filters->boleta_compra_tipoboleta != '') {
				$filtros = $filtros . " AND boleta_compra_tipoboleta LIKE '%" . $filters->boleta_compra_tipoboleta . "%'";
			}
			if ($filters->boleta_compra_cantidad != '') {
				$filtros = $filtros . " AND boleta_compra_cantidad LIKE '%" . $filters->boleta_compra_cantidad . "%'";
			}
			if ($filters->boleta_compra_documento != '') {
				$filtros = $filtros . " AND boleta_compra_documento LIKE '%" . $filters->boleta_compra_documento . "%'";
			}
			if ($filters->boleta_compran_nombre != '') {
				$filtros = $filtros . " AND boleta_compran_nombre LIKE '%" . $filters->boleta_compran_nombre . "%'";
			}
			if ($filters->boleta_compra_telefono != '') {
				$filtros = $filtros . " AND boleta_compra_telefono LIKE '%" . $filters->boleta_compra_telefono . "%'";
			}
			if ($filters->boleta_compra_email != '') {
				$filtros = $filtros . " AND boleta_compra_email LIKE '%" . $filters->boleta_compra_email . "%'";
			}
			if ($filters->boleta_compra_fecha != '') {
				$filtros = $filtros . " AND boleta_compra_fecha LIKE '%" . $filters->boleta_compra_fecha . "%'";
			}

			if ($filters->vendor != '') {
				$filtros = $filtros . " AND vendor LIKE '%" . $filters->vendor . "%'";
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
			$parramsfilter['boleta_compra_tipoboleta'] =  $this->_getSanitizedParam("boleta_compra_tipoboleta");
			$parramsfilter['boleta_compra_cantidad'] =  $this->_getSanitizedParam("boleta_compra_cantidad");
			$parramsfilter['boleta_compra_documento'] =  $this->_getSanitizedParam("boleta_compra_documento");
			$parramsfilter['boleta_compran_nombre'] =  $this->_getSanitizedParam("boleta_compran_nombre");
			$parramsfilter['boleta_compra_telefono'] =  $this->_getSanitizedParam("boleta_compra_telefono");
			$parramsfilter['boleta_compra_email'] =  $this->_getSanitizedParam("boleta_compra_email");
			$parramsfilter['boleta_compra_fecha'] =  $this->_getSanitizedParam("boleta_compra_fecha");
			$parramsfilter['vendor'] =  $this->_getSanitizedParam("vendor");
			Session::getInstance()->set($this->namefilter, $parramsfilter);
		}
		if ($this->_getSanitizedParam("cleanfilter") == 1) {
			Session::getInstance()->set($this->namefilter, '');
			Session::getInstance()->set($this->namepageactual, 1);
		}
	}
}
