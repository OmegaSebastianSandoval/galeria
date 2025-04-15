<?php 
/**
* clase que genera la insercion y edicion  de Blog en la base de datos
*/
class Administracion_Model_DbTable_Blog extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'blog';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'blog_id';

	/**
	 * insert recibe la informacion de un Blog y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$blog_estado = $data['blog_estado'];
		$blog_titulo = $data['blog_titulo'];
		$blog_imagen = $data['blog_imagen'];
		$blog_fecha = $data['blog_fecha'];
		$blog_texto = $data['blog_texto'];
		$blog_importante = $data['blog_importante'];

		$query = "INSERT INTO blog( blog_estado, blog_titulo, blog_imagen, blog_fecha, blog_texto, blog_importante) VALUES ( '$blog_estado', '$blog_titulo', '$blog_imagen', '$blog_fecha', '$blog_texto', '$blog_importante')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Blog  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$blog_estado = $data['blog_estado'];
		$blog_titulo = $data['blog_titulo'];
		$blog_imagen = $data['blog_imagen'];
		$blog_fecha = $data['blog_fecha'];
		$blog_texto = $data['blog_texto'];
		$blog_importante = $data['blog_importante'];
		$query = "UPDATE blog SET  blog_estado = '$blog_estado', blog_titulo = '$blog_titulo', blog_imagen = '$blog_imagen', blog_fecha = '$blog_fecha', blog_texto = '$blog_texto', blog_importante = '$blog_importante' WHERE blog_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}