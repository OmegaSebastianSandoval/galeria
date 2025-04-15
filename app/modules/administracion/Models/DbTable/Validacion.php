<?php 
/**
* clase que genera la insercion y edicion  de transacciones boleteria en la base de datos
*/
class Administracion_Model_DbTable_Validacion extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'boleta_compra';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'boleta_compra_id';

	/**
	 * insert recibe la informacion de un transaccion y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$boleta_compra_tipoboleta = $data['boleta_compra_tipoboleta'];
		$boleta_compra_cantidad = $data['boleta_compra_cantidad'];
		$boleta_compra_documento = $data['boleta_compra_documento'];
		$boleta_compran_nombre = $data['boleta_compran_nombre'];
		$boleta_compra_telefono = $data['boleta_compra_telefono'];
		$boleta_compra_email = $data['boleta_compra_email'];
		$boleta_compra_fechacedula = $data['boleta_compra_fechacedula'];
		$boleta_compra_fecha = $data['boleta_compra_fecha'];
		$boleta_compra_codigo = $data['boleta_compra_codigo'];
		$respuesta = $data['respuesta'];
		$validacion = $data['validacion'];
		$validacion2 = $data['validacion2'];
		$entidad = $data['entidad'];
		$boleta_compra_total = $data['boleta_compra_total'];
		$query = "INSERT INTO boleta_compra( boleta_compra_tipoboleta, boleta_compra_cantidad, boleta_compra_documento, boleta_compran_nombre, boleta_compra_telefono, boleta_compra_email, boleta_compra_fechacedula, boleta_compra_fecha, boleta_compra_codigo, respuesta, validacion, validacion2, entidad, boleta_compra_total) VALUES ( '$boleta_compra_tipoboleta', '$boleta_compra_cantidad', '$boleta_compra_documento', '$boleta_compran_nombre', '$boleta_compra_telefono', '$boleta_compra_email', '$boleta_compra_fechacedula', '$boleta_compra_fecha', '$boleta_compra_codigo', '$respuesta', '$validacion', '$validacion2', '$entidad', '$boleta_compra_total')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un transaccion  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$boleta_compra_tipoboleta = $data['boleta_compra_tipoboleta'];
		$boleta_compra_cantidad = $data['boleta_compra_cantidad'];
		$boleta_compra_documento = $data['boleta_compra_documento'];
		$boleta_compran_nombre = $data['boleta_compran_nombre'];
		$boleta_compra_telefono = $data['boleta_compra_telefono'];
		$boleta_compra_email = $data['boleta_compra_email'];
		$boleta_compra_fechacedula = $data['boleta_compra_fechacedula'];
		$boleta_compra_fecha = $data['boleta_compra_fecha'];
		$boleta_compra_codigo = $data['boleta_compra_codigo'];
		$respuesta = $data['respuesta'];
		$validacion = $data['validacion'];
		$validacion2 = $data['validacion2'];
		$entidad = $data['entidad'];
		$boleta_compra_total = $data['boleta_compra_total'];
		$query = "UPDATE boleta_compra SET  boleta_compra_tipoboleta = '$boleta_compra_tipoboleta', boleta_compra_cantidad = '$boleta_compra_cantidad', boleta_compra_documento = '$boleta_compra_documento', boleta_compran_nombre = '$boleta_compran_nombre', boleta_compra_telefono = '$boleta_compra_telefono', boleta_compra_email = '$boleta_compra_email', boleta_compra_fechacedula = '$boleta_compra_fechacedula', boleta_compra_fecha = '$boleta_compra_fecha', boleta_compra_codigo = '$boleta_compra_codigo', respuesta = '$respuesta', validacion = '$validacion', validacion2 = '$validacion2', entidad = '$entidad', boleta_compra_total = '$boleta_compra_total' WHERE boleta_compra_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}