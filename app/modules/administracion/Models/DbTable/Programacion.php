<?php

/**
 * clase que genera la insercion y edicion  de programacion en la base de datos
 */
class Administracion_Model_DbTable_Programacion extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'programacion';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'programacion_id';

	/**
	 * insert recibe la informacion de un programacion y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data)
	{
		$programacion_nombre = $data['programacion_nombre'];
		$programacion_imagen = $data['programacion_imagen'];
		$programacion_costo = $data['programacion_costo'];
		$programacion_fecha = $data['programacion_fecha'];
		$programacion_hora = $data['programacion_hora'];
		$programacion_lugar = $data['programacion_lugar'];
		$programacion_descripcion = $data['programacion_descripcion'];

		$programacion_titulo_politica = $data['programacion_titulo_politica'];
		$programacion_descripcion_politica = $data['programacion_descripcion_politica'];

		$query = "INSERT INTO programacion( programacion_nombre, programacion_imagen, programacion_costo, programacion_fecha, programacion_hora, programacion_lugar, programacion_descripcion, programacion_titulo_politica, programacion_descripcion_politica) VALUES ( '$programacion_nombre', '$programacion_imagen', '$programacion_costo', '$programacion_fecha', '$programacion_hora', '$programacion_lugar', '$programacion_descripcion' , '$programacion_titulo_politica' ,'$programacion_descripcion_politica')";
		$res = $this->_conn->query($query);
		return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un programacion  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data, $id)
	{

		$programacion_nombre = $data['programacion_nombre'];
		$programacion_imagen = $data['programacion_imagen'];
		$programacion_costo = $data['programacion_costo'];
		$programacion_fecha = $data['programacion_fecha'];
		$programacion_hora = $data['programacion_hora'];
		$programacion_lugar = $data['programacion_lugar'];
		$programacion_descripcion = $data['programacion_descripcion'];

		$programacion_titulo_politica = $data['programacion_titulo_politica'];
		$programacion_descripcion_politica = $data['programacion_descripcion_politica'];

		$query = "UPDATE programacion SET  programacion_nombre = '$programacion_nombre', programacion_imagen = '$programacion_imagen', programacion_costo = '$programacion_costo', programacion_fecha = '$programacion_fecha', programacion_hora = '$programacion_hora', programacion_lugar = '$programacion_lugar', programacion_descripcion = '$programacion_descripcion', programacion_titulo_politica = '$programacion_titulo_politica', programacion_descripcion_politica = '$programacion_descripcion_politica' WHERE programacion_id = '" . $id . "'";
		$res = $this->_conn->query($query);
	}

	public function getTotalConTickets($filters = '')
{
    $filter = $filters ? "WHERE $filters" : "";
    $sql = "
        SELECT COUNT(*) AS total
        FROM (
            SELECT p.programacion_id
            FROM programacion p
            INNER JOIN tickets t ON t.ticket_evento_id = p.programacion_id
            $filter
            GROUP BY p.programacion_id
            HAVING COUNT(t.ticket_id) > 0
        ) AS sub
    ";

		$res = $this->_conn->query($sql)->fetchAsObject();
		return $res;
	}

	public function getListPagesConTickets($filters = '', $order = '', $start = 0, $amount = 10)
	{
		$filter = $filters ? "WHERE $filters" : "";
		$sql = "
        SELECT p.*, 
               COUNT(t.ticket_id) AS cantidadTickets,
               SUM(CASE WHEN t.ticket_estado = 2 THEN 1 ELSE 0 END) AS cantidadTicketsValidados
        FROM programacion p
        INNER JOIN tickets t ON t.ticket_evento_id = p.programacion_id
        $filter
        GROUP BY p.programacion_id
        HAVING COUNT(t.ticket_id) > 0
        ORDER BY $order
        LIMIT $start, $amount
    ";

		$res = $this->_conn->query($sql)->fetchAsObject();
		return $res;
	}
}
