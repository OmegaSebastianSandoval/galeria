<?php 
/**
* clase que genera la insercion y edicion  de fotos en la base de datos
*/
class Administracion_Model_DbTable_Fotos extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'fotos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'fotos_id';

	/**
	 * insert recibe la informacion de un fotos y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$fotos_titulo = $data['fotos_titulo'];
		$fotos_foto = $data['fotos_foto'];
		$fotos_fecha = $data['fotos_fecha'];
		$fotos_album = $data['fotos_album'];
		$fotos_descripcion = $data['fotos_descripcion'];
		$query = "INSERT INTO fotos( fotos_titulo, fotos_foto, fotos_fecha, fotos_album, fotos_descripcion) VALUES ( '$fotos_titulo', '$fotos_foto', '$fotos_fecha', '$fotos_album', '$fotos_descripcion')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un fotos  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$fotos_titulo = $data['fotos_titulo'];
		$fotos_foto = $data['fotos_foto'];
		$fotos_fecha = $data['fotos_fecha'];
		$fotos_album = $data['fotos_album'];
		$fotos_descripcion = $data['fotos_descripcion'];
		$query = "UPDATE fotos SET  fotos_titulo = '$fotos_titulo', fotos_foto = '$fotos_foto', fotos_fecha = '$fotos_fecha', fotos_album = '$fotos_album', fotos_descripcion = '$fotos_descripcion' WHERE fotos_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}