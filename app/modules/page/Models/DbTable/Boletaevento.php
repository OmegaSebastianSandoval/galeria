<?php 

/**
* 
*/
class Page_Model_DbTable_Boletaevento extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'boleta_evento';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'boleta_evento_id';

	public function getListJoin($filters = '',$order = '')
    {
        $filter = '';
        if($filters != ''){
            $filter = ' WHERE '.$filters;
        }
        $orders ="";
        if($order != ''){
            $orders = ' ORDER BY '.$order;
        }
        $select = 'SELECT * FROM ('.$this->_name.' LEFT JOIN boleta_tipo ON boleta_evento_tipo = boleta_tipo_id) LEFT JOIN programacion ON boleta_evento_evento = programacion_id'.$filter.' '.$orders;
        $res = $this->_conn->query( $select )->fetchAsObject();
        return $res;
    }
}