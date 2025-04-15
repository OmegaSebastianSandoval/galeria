<?php

/**
 * 
 */
class Page_Model_DbTable_Boletacompra extends Db_Table
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

	public function insert($data)
	{

		$tipoboleta = $data['tipoboleta'];
		$cantidad = $data['cantidad'];
		$documento = $data['documento'];
		$nombre = $data['nombre'];
		$telefono = $data['telefono'];
		$email = $data['email'];
		$fechacedula = $data['fecha'];
		$fechanacimiento = $data['fechanacimiento'];
		$fechapago = $data['fechapago'];
		$codigo = $data['codigo'];
		$total = $data['total'];
		$vendor = $data['vendor'];
		$query = "INSERT INTO boleta_compra(boleta_compra_tipoboleta, boleta_compra_cantidad, boleta_compra_documento, boleta_compran_nombre, boleta_compra_telefono, boleta_compra_email, boleta_compra_fechacedula, boleta_compra_fechanacimiento, boleta_compra_fecha, boleta_compra_codigo, boleta_compra_total, vendor ) VALUES ( '$tipoboleta', '$cantidad', '$documento', '$nombre', '$telefono', '$email' , '$fechacedula', '$fechanacimiento', '$fechapago', '$codigo', '$total', '$vendor' )";
		$res = $this->_conn->query($query);
		return mysqli_insert_id($this->_conn->getConnection());
	}

	public function updateConfirmacion($respuesta, $estado, $estadoTx, $id, $franquicia)
	{
		if ($id != "") {
			$query = "UPDATE boleta_compra SET  respuesta = '$respuesta', validacion='$estado', validacion2='$estadoTx', entidad = '$franquicia' WHERE boleta_compra_id = '$id' ";
			$res = $this->_conn->query($query);
			return mysqli_insert_id($this->_conn->getConnection());
		}
	}

	public function getVentaInfo($id)
	{
		$stmt = "
        SELECT 
            bc.*, 
            be.*, 
            bt.*, 
            p.* 
        FROM boleta_compra bc
        JOIN boleta_evento be ON be.boleta_evento_id = bc.boleta_compra_tipoboleta
        JOIN boleta_tipo bt ON bt.boleta_tipo_id = be.boleta_evento_tipo
        JOIN programacion p ON p.programacion_id = be.boleta_evento_evento
        WHERE bc.boleta_compra_id = '$id'
    ";
		$res = $this->_conn->query($stmt)->fetchAsObject();
		return $res[0];
	}
}
