<?php 
/**
* clase que genera la insercion y edicion  de mapa en la base de datos
*/
class Administracion_Model_DbTable_Mapa extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'mapa';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'mapa_id';

	/**
	 * insert recibe la informacion de un mapa y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$mapa_latitud = $data['mapa_latitud'];
		$mapa_longitud = $data['mapa_longitud'];
		$query = "INSERT INTO mapa( mapa_latitud, mapa_longitud) VALUES ( '$mapa_latitud', '$mapa_longitud')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un mapa  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$mapa_latitud = $data['mapa_latitud'];
		$mapa_longitud = $data['mapa_longitud'];
		$query = "UPDATE mapa SET  mapa_latitud = '$mapa_latitud', mapa_longitud = '$mapa_longitud' WHERE mapa_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}