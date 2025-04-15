<?php 
/**
* clase que genera la insercion y edicion  de fondos en la base de datos
*/
class Administracion_Model_DbTable_Fondos extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'fondos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'fondos_id';

	/**
	 * insert recibe la informacion de un fondos y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$fondo_nombre = $data['fondo_nombre'];
		$fondo_seccion = $data['fondo_seccion'];
		$fondo_fondo = $data['fondo_fondo'];
		$query = "INSERT INTO fondos( fondo_nombre, fondo_seccion, fondo_fondo) VALUES ( '$fondo_nombre', '$fondo_seccion', '$fondo_fondo')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un fondos  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$fondo_nombre = $data['fondo_nombre'];
		$fondo_seccion = $data['fondo_seccion'];
		$fondo_fondo = $data['fondo_fondo'];
		$query = "UPDATE fondos SET  fondo_nombre = '$fondo_nombre', fondo_seccion = '$fondo_seccion', fondo_fondo = '$fondo_fondo' WHERE fondos_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}