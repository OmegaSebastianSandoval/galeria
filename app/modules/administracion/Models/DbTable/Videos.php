<?php 
/**
* clase que genera la insercion y edicion  de videos en la base de datos
*/
class Administracion_Model_DbTable_Videos extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'videos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'videos_id';

	/**
	 * insert recibe la informacion de un videos y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$videos_titulo = $data['videos_titulo'];
		$videos_link = $data['videos_link'];
		$videos_fecha = $data['videos_fecha'];
		$query = "INSERT INTO videos( videos_titulo, videos_link, videos_fecha) VALUES ( '$videos_titulo', '$videos_link', '$videos_fecha')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un videos  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$videos_titulo = $data['videos_titulo'];
		$videos_link = $data['videos_link'];
		$videos_fecha = $data['videos_fecha'];
		$query = "UPDATE videos SET  videos_titulo = '$videos_titulo', videos_link = '$videos_link', videos_fecha = '$videos_fecha' WHERE videos_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}