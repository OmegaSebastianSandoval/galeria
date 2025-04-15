<?php 
/**
* clase que genera la insercion y edicion  de Sedes en la base de datos
*/
class Administracion_Model_DbTable_Sedes extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'sedes';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'sede_id';

	/**
	 * insert recibe la informacion de un Sedes y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$sede_estado = $data['sede_estado'];
		$sede_nombre = $data['sede_nombre'];
		$sede_telefono = $data['sede_telefono'];
		$sede_direccion = $data['sede_direccion'];
		$sede_imagen = $data['sede_imagen'];
		$query = "INSERT INTO sedes( sede_estado, sede_nombre, sede_telefono, sede_direccion, sede_imagen) VALUES ( '$sede_estado', '$sede_nombre', '$sede_telefono', '$sede_direccion', '$sede_imagen')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Sedes  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$sede_estado = $data['sede_estado'];
		$sede_nombre = $data['sede_nombre'];
		$sede_telefono = $data['sede_telefono'];
		$sede_direccion = $data['sede_direccion'];
		$sede_imagen = $data['sede_imagen'];
		$query = "UPDATE sedes SET  sede_estado = '$sede_estado', sede_nombre = '$sede_nombre', sede_telefono = '$sede_telefono', sede_direccion = '$sede_direccion', sede_imagen = '$sede_imagen' WHERE sede_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}