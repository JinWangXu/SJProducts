<?php
namespace es\fdi\ucm\aw;
use es\fdi\ucm\aw\TOproductos as TOproductos;
class DAOproductos{

	public static function create($producto){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();		
		$idproducto = $producto->getidProducto();
		$nombre = $producto->getnombre();
		$descripcion = $producto->getdescr();
		$precio = $producto->getprecio();
		$cantidad = $producto->getcantidad();
		$categoria = $producto->getcategoria();
		$imagen = $producto->getimagen();
		$idvaloracion = $producto->getidvaloracion();
		$sql = sprintf("INSERT into productos (id, nombre, descripcion, precio, cantidad, categoria, imagen, idValoracion)values('%d', '%s', '%s', '%d', '%d', '%d', '%s', '%d')"
		, $conn->real_escape_string($idproducto)
		, $conn->real_escape_string($nombre)
		, $conn->real_escape_string($descripcion)
		, $conn->real_escape_string($precio)
		, $conn->real_escape_string($cantidad) 
		, $conn->real_escape_string($categoria)
		, $conn->real_escape_string($imagen)
		, $conn->real_escape_string($idvaloracion)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function read($idproducto){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM productos WHERE id = '%d'"
			, $conn->real_escape_string($idproducto)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			$res = $resultado->fetch_assoc();
			$producto = new TOproductos();
			$producto->setidProducto($res['id']);
			$producto->setNombre($res['nombre']);
			$producto->setdescr($res['descripcion']);
			$producto->setprecio($res['precio']);
			$producto->setcantidad($res['cantidad']);
			$producto->setcategoria($res['categoria']);
			$producto->setImagen($res['imagen']);
			$producto->setidvaloracion($res['idValoracion']);
		}
		return $producto;		
	}

	public static function listarProductos(){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM productos");
		$resultado = $conn->query($sql);

		if ($resultado->num_rows == 0){
			return NULL;
		}

		while($res = $resultado->fetch_assoc()){
		$producto = new TOproductos();
		$producto->setidProducto($res['id']);
		$producto->setNombre($res['nombre']);
		$producto->setdescr($res['descripcion']);
		$producto->setprecio($res['precio']);
		$producto->setcantidad($res['cantidad']);
		$producto->setcategoria($res['categoria']);
		$producto->setImagen($res['imagen']);
		$producto->setidvaloracion($res['idValoracion']);
		$listaProductos[] = $producto;
		}
		return $listaProductos;
	}



	public static function update($producto){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$idproducto = $producto->getidProducto();
		$nombre = $producto->getnombre();
		$descripcion = $producto->getdescr();
		$precio = $producto->getprecio();
		$cantidad = $producto->getcantidad();
		$categoria = $producto->getcategoria();
		$imagen = $producto->getimagen();
		$idvaloracion = $producto->getidvaloracion();
		$sql = sprintf("UPDATE productos set id = '%d', nombre='%s', descripcion='%s', precio='%d', cantidad='%d', categoria='%d', imagen='%s', idValoracion='%d'where producto='%d'"
			, $conn->real_escape_string($idproducto)
			, $conn->real_escape_string($nombre)
			, $conn->real_escape_string($descripcion)
			, $conn->real_escape_string($precio)
			, $conn->real_escape_string($cantidad)
			, $conn->real_escape_string($categoria)
			, $conn->real_escape_string($imagen)
			, $conn->real_escape_string($idvaloracion)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function delete($idproducto){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("DELETE FROM productos WHERE id = '%d'"
			, $conn->real_escape_string($idproducto)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function cambiarCantidad($idproducto, $cantidad){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("UPDATE FROM productos set cantidad='%d' WHERE id = '%d'"
			, $conn->real_escape_string($cantidad)
			, $conn->real_escape_string($idproducto)
		);
	}
}