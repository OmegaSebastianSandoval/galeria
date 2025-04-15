<?php 
/**
* clase que genera la insercion y edicion  de menu en la base de datos
*/
class Administracion_Model_DbTable_Menu extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'menu';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'menu_id';

	/**
	 * insert recibe la informacion de un menu y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$menu_seccion = $data['menu_seccion'];
		$menu_nombre = $data['menu_nombre'];
		$menu_restaurante = $data['menu_restaurante'];
		$menu_bar = $data['menu_bar'];
		$menu_bar_link = $data['menu_bar_link'];
		$menu_restaurante_link = $data['menu_restaurante_link'];
		$menu_imagen = $data['menu_imagen'];
		$query = "INSERT INTO menu( menu_bar_link,menu_restaurante_link,menu_seccion, menu_nombre, menu_restaurante, menu_bar, menu_imagen) VALUES ('$menu_bar_link', '$menu_restaurante_link', '$menu_seccion', '$menu_nombre', '$menu_restaurante', '$menu_bar', '$menu_imagen')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un menu  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$menu_seccion = $data['menu_seccion'];
		$menu_nombre = $data['menu_nombre'];
		$menu_restaurante = $data['menu_restaurante'];
		$menu_bar = $data['menu_bar'];
		$menu_bar_link = $data['menu_bar_link'];
		$menu_restaurante_link = $data['menu_restaurante_link'];
		$menu_imagen = $data['menu_imagen'];

		$query = "UPDATE menu SET  menu_bar_link = '$menu_bar_link', menu_restaurante_link = '$menu_restaurante_link', menu_seccion = '$menu_seccion', menu_nombre = '$menu_nombre', menu_restaurante = '$menu_restaurante', menu_bar = '$menu_bar', menu_imagen = '$menu_imagen' WHERE menu_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}