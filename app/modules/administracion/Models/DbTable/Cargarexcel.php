<?php 
/**
* clase que genera la insercion y edicion  de Cargar en la base de datos
*/
class Administracion_Model_DbTable_Cargarexcel extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'archivo';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'archivo_id';

	/**
	 * insert recibe la informacion de un Cargar y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$archivodocumento = $data['archivodocumento'];
		$query = "INSERT INTO archivo( archivodocumento) VALUES ( '$archivodocumento')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Cargar  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$archivodocumento = $data['archivodocumento'];
		$query = "UPDATE archivo SET  archivodocumento = '$archivodocumento' WHERE archivo_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}