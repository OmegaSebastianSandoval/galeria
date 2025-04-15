<?php 
/**
* clase que genera la insercion y edicion  de codigo promocionales en la base de datos
*/
class Administracion_Model_DbTable_Codigopromocional extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'codigo_promocional';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un codigo promocional y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$codigo = $data['codigo'];
		$tipo = $data['tipo'];
		$valor = $data['valor'];
		$porcentaje = $data['porcentaje'];
		$evento = $data['evento'];
		$usado = $data['usado'];
		$fecha_uso = $data['fecha_uso'];

		$activo = $data['activo'];
		$fecha = $data['fecha'];
		$query = "INSERT INTO codigo_promocional( codigo, tipo, valor, porcentaje, evento, usado, fecha_uso, activo, fecha) VALUES ( '$codigo', '$tipo', '$valor', '$porcentaje', '$evento', '$usado', '$fecha_uso', '$activo', '$fecha')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un codigo promocional  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$codigo = $data['codigo'];
		$tipo = $data['tipo'];
		$valor = $data['valor'];
		$porcentaje = $data['porcentaje'];
		$evento = $data['evento'];
		$usado = $data['usado'];
		$fecha_uso = $data['fecha_uso'];
		$activo = $data['activo'];
		$fecha = $data['fecha'];
		$query = "UPDATE codigo_promocional SET  codigo = '$codigo', tipo = '$tipo', valor = '$valor', porcentaje = '$porcentaje', evento = '$evento',usado = '$usado', fecha_uso = '$fecha_uso', activo = '$activo', fecha = '$fecha' WHERE id = '".$id."'";
		$res = $this->_conn->query($query);
	}
	
}