<?php
/**
* Controlador de Contenidos que permite la  creacion, edicion  y eliminacion de los contenidos del Sistema
*/
class Administracion_contenidosController extends Administracion_mainController
{
	public $botonpanel = 3;

	/**
	 * $mainModel  instancia del modelo de  base de datos contenidos
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
	protected $pages ;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "administracion_contenidos";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador contenidos .
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
		$this->mainModel = new Administracion_Model_DbTable_Contenidos();
		$this->namefilter = "parametersfiltercontenidos";
		$this->route = "/administracion/contenidos";
		$this->namepages ="pages_contenidos";
		$this->namepageactual ="page_actual_contenidos";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  contenidos con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Administración de contenidos";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "orden ASC";
		$list = $this->mainModel->getList($filters,$order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page && Session::getInstance()->get($this->namepageactual)) {
		   	$page = Session::getInstance()->get($this->namepageactual);
		   	$start = ($page - 1) * $amount;
		} else if(!$page){
			$start = 0;
		   	$page=1;
			Session::getInstance()->set($this->namepageactual,$page);
		} else {
			Session::getInstance()->set($this->namepageactual,$page);
		   	$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list)/$amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters,$order,$start,$amount);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->list_content_section = $this->getContentsection();
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  contenido  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_contenidos_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->list_content_section = $this->getContentsection();
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->content_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar contenido";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear contenido";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear contenido";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un contenido  y redirecciona al listado de contenidos.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadImage =  new Core_Model_Upload_Image();
			if($_FILES['content_image']['name'] != ''){
				$data['content_image'] = $uploadImage->upload("content_image");
			}
			$uploadDocument =  new Core_Model_Upload_Document();
			if($_FILES['content_banner']['name'] != ''){
				$data['content_banner'] = $uploadDocument->upload("content_banner");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id,$id);

			//LOG
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = "CREAR CONTENIDO";
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);

		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un contenido  y redirecciona al listado de contenidos.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->content_id) {
				$data = $this->getData();
				$uploadImage =  new Core_Model_Upload_Image();
				if($_FILES['content_image']['name'] != ''){
					if($content->content_image){
						$uploadImage->delete($content->content_image);
					}
					$data['content_image'] = $uploadImage->upload("content_image");
				} else {
					$data['content_image'] = $content->content_image;
				}
				$uploadDocument =  new Core_Model_Upload_Document();
				if($_FILES['content_banner']['name'] != ''){
					if($content->content_banner){
						$uploadDocument->delete($content->content_banner);
					}
					$data['content_banner'] = $uploadDocument->upload("content_banner");
				} else {
					$data['content_banner'] = $content->content_banner;
				}
				$this->mainModel->update($data,$id);

				//LOG
				$data['content_id']=$id;
				$data['log_log'] = print_r($data,true);
				$data['log_tipo'] = "ACTUALIZAR CONTENIDO";
				$logModel = new Administracion_Model_DbTable_Log();
				$logModel->insert($data);

			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y elimina un contenido  y redirecciona al listado de contenidos.
     *
     * @return void.
     */
	public function deleteAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf ) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$uploadImage =  new Core_Model_Upload_Image();
					if (isset($content->content_image) && $content->content_image != '') {
						$uploadImage->delete($content->content_image);
					}
					$uploadDocument =  new Core_Model_Upload_Document();
					if (isset($content->content_banner) && $content->content_banner != '') {
						$uploadDocument->delete($content->content_banner);
					}
					$this->mainModel->deleteRegister($id);

					//LOG
					$data = (array)$content;
					$data['content_id']=$id;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = "BORRAR CONTENIDO";
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data);

				}
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Contenidos.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['content_title'] = $this->_getSanitizedParam("content_title");
		$data['content_subtitle'] = $this->_getSanitizedParam("content_subtitle");
		$data['content_introduction'] = $this->_getSanitizedParamHtml("content_introduction");
		$data['content_description'] = $this->_getSanitizedParamHtml("content_description");
		$data['content_image'] = "";
		$data['content_banner'] = "";
		$data['content_section'] = $this->_getSanitizedParam("content_section");
		$data['content_delete'] = '1' ;
		$data['content_current_user'] = '0' ;
		$data['content_date'] = $this->_getSanitizedParam("content_date");
		$data['content_link'] = $this->_getSanitizedParam("content_link");
		return $data;
	}

	/**
     * Genera los valores del campo content_section.
     *
     * @return array cadena con los valores del campo content_section.
     */
	private function getContentsection()
	{
		$array = array();
		$array['Data'] = 'Data';
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
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->content_title != '') {
                $filtros = $filtros." AND content_title LIKE '%".$filters->content_title."%'";
            }
            if ($filters->content_image != '') {
                $filtros = $filtros." AND content_image LIKE '%".$filters->content_image."%'";
            }
            if ($filters->content_section != '') {
                $filtros = $filtros." AND content_section ='".$filters->content_section."'";
            }
            if ($filters->content_date != '') {
                $filtros = $filtros." AND content_date LIKE '%".$filters->content_date."%'";
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
        if ($this->getRequest()->isPost()== true) {
        	Session::getInstance()->set($this->namepageactual,1);
            $parramsfilter = array();
					$parramsfilter['content_title'] =  $this->_getSanitizedParam("content_title");
					$parramsfilter['content_image'] =  $this->_getSanitizedParam("content_image");
					$parramsfilter['content_section'] =  $this->_getSanitizedParam("content_section");
					$parramsfilter['content_date'] =  $this->_getSanitizedParam("content_date");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}