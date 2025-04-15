<?php

/**
 * clase que genera la insercion y edicion  de ticket en la base de datos
 */
class Administracion_Model_DbTable_Tickets extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'tickets';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'ticket_id';

	/**
	 * insert recibe la informacion de un ticket y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data)
	{
		$ticket_compra_id = $data['ticket_compra_id'];
		$ticket_numero_ticket = $data['ticket_numero_ticket'];
		$ticket_uid = $data['ticket_uid'];
		$ticket_token = $data['ticket_token'];
		$ticket_estado = $data['ticket_estado'];
		$ticket_fecha_creacion = $data['ticket_fecha_creacion'];
		$ticket_fecha_validacion = $data['ticket_fecha_validacion'];
		$ticket_metodo_validacion = $data['ticket_metodo_validacion'];
		$ticket_dispositivo_validacion = $data['ticket_dispositivo_validacion'];
		$ticket_ip_validacion = $data['ticket_ip_validacion'];
		$ticket_fecha_expiracion = $data['ticket_fecha_expiracion'];
		$ticket_observaciones = $data['ticket_observaciones'];
		$query = "INSERT INTO tickets( ticket_compra_id, ticket_numero_ticket, ticket_uid, ticket_token, ticket_estado, ticket_fecha_creacion, ticket_fecha_validacion, ticket_metodo_validacion, ticket_dispositivo_validacion, ticket_ip_validacion, ticket_fecha_expiracion, ticket_observaciones) VALUES ( '$ticket_compra_id', '$ticket_numero_ticket', '$ticket_uid', '$ticket_token', '$ticket_estado', '$ticket_fecha_creacion', '$ticket_fecha_validacion', '$ticket_metodo_validacion', '$ticket_dispositivo_validacion', '$ticket_ip_validacion', '$ticket_fecha_expiracion', '$ticket_observaciones')";
		$res = $this->_conn->query($query);
		return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un ticket  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data, $id)
	{

		$ticket_compra_id = $data['ticket_compra_id'];
		$ticket_numero_ticket = $data['ticket_numero_ticket'];
		$ticket_uid = $data['ticket_uid'];
		$ticket_token = $data['ticket_token'];
		$ticket_estado = $data['ticket_estado'];
		$ticket_fecha_creacion = $data['ticket_fecha_creacion'];
		$ticket_fecha_validacion = $data['ticket_fecha_validacion'];
		$ticket_metodo_validacion = $data['ticket_metodo_validacion'];
		$ticket_dispositivo_validacion = $data['ticket_dispositivo_validacion'];
		$ticket_ip_validacion = $data['ticket_ip_validacion'];
		$ticket_fecha_expiracion = $data['ticket_fecha_expiracion'];
		$ticket_observaciones = $data['ticket_observaciones'];
		$query = "UPDATE tickets SET  ticket_compra_id = '$ticket_compra_id', ticket_numero_ticket = '$ticket_numero_ticket', ticket_uid = '$ticket_uid', ticket_token = '$ticket_token', ticket_estado = '$ticket_estado', ticket_fecha_creacion = '$ticket_fecha_creacion', ticket_fecha_validacion = '$ticket_fecha_validacion', ticket_metodo_validacion = '$ticket_metodo_validacion', ticket_dispositivo_validacion = '$ticket_dispositivo_validacion', ticket_ip_validacion = '$ticket_ip_validacion', ticket_fecha_expiracion = '$ticket_fecha_expiracion', ticket_observaciones = '$ticket_observaciones' WHERE ticket_id = '" . $id . "'";
		$res = $this->_conn->query($query);
	}

	public function getNextTicketId()
	{
		$sql = "SELECT COALESCE(MAX(ticket_id), 0) + 1 AS next_id FROM tickets";
		$result = $this->_conn->query($sql)->fetchAsObject();
		return $result[0]->next_id;
	}
}
