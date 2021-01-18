<?php
namespace es\fdi\ucm\aw;

    class DAOCarrito {

	public static function create($tCarrito) {

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$usuario = $tCarrito->getUsuario();
        $producto = $tCarrito->getProducto();
        $id = $tCarrito->getId();
        $cantidad = $tCarrito->getCantidad();
		$sql = sprintf("INSERT into carrito (usuario, producto, cantidad, id) values('%s', '%d', '%d', '%d')"
		, $conn->real_escape_string($usuario)
        , $conn->real_escape_string($producto)
		, $conn->real_escape_string($cantidad)
		, $conn->real_escape_string($id));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function read($id) {
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$sql = sprintf("SELECT * FROM carrito WHERE id = '%d'"
			, $conn->real_escape_string($id)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			$res = $resultado->fetch_assoc();
			$tCarrito = new TOcarrito();
			$tCarrito->setUsuario($res['usuario']);
			$tCarrito->setProducto($res['producto']);
			$tCarrito->setCantidad($res['cantidad']);
			$tCarrito->setId($res['id']);
		}
		return $tCarrito;
	}

	public static function updateCantidad($tCarrito) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$usuario = $tCarrito->getUsuario();
		$producto = $tCarrito->getProducto();
		$cantidad = $tCarrito->getCantidad();

		$sql = sprintf("SELECT * FROM carrito where usuario = '%s' AND producto = '%d'"
		, $conn->real_escape_string($usuario)
		, $conn->real_escape_string($producto));

		$resultado = $conn->query($sql);
		$res = $resultado->fetch_assoc();

		$cantidad = $cantidad + $res['cantidad'];
        
		$sql = sprintf("UPDATE carrito set cantidad='%d' where usuario = '%s' AND producto = '%d'"
		, $conn->real_escape_string($cantidad)
		, $conn->real_escape_string($usuario)
        , $conn->real_escape_string($producto));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function delete($id) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$sql = sprintf("DELETE from carrito where id = '%d'"
        , $conn->real_escape_string($id));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function listar($usuario){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$sql = sprintf("SELECT * FROM carrito WHERE usuario = '%s'"
			, $conn->real_escape_string($usuario)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			while($fila = $resultado->fetch_assoc()) {
				$carro = new TOcarrito();
				$carro->setUsuario($fila['usuario']);
				$carro->setProducto($fila['producto']);
				$carro->setId($fila['id']);
				$carro->setCantidad($fila['cantidad']);
				$listaCarro[] = $carro;
			}
		}
		return $listaCarro;
	}

	public static function comparar($tCarrito){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();	
		
		$usuario = $tCarrito->getUsuario();
		$producto = $tCarrito->getProducto();
		$cantidad = $tCarrito->getCantidad();
	    $sql = sprintf("SELECT * FROM carrito WHERE usuario = '%s' AND producto = '%d'"
	        , $conn->real_escape_string($usuario)
	        , $conn->real_escape_string($producto)
	        ); 
		$result = $conn->query($sql); 
		
		$res = $result->fetch_assoc();
	    if($result->num_rows > 0){ 
	        $state = 2; 
	       	self::updateCantidad($tCarrito); 
	    }
	    else{
	    	$state = 1; 
	    	self::create($tCarrito);
		}
	    return $state;
	}

	public static function borrarDelCarro($tCarrito){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();	
		
		$usuario = $tCarrito->getUsuario();
		$producto = $tCarrito->getProducto();
		$cantidad = $tCarrito->getCantidad();
	    $sql = sprintf("SELECT id FROM carrito WHERE usuario = '%s' AND producto = '%d'"
	        , $conn->real_escape_string($usuario)
	        , $conn->real_escape_string($producto)
	        ); 
		$result = $conn->query($sql); 

		$res = $result->fetch_assoc();
		
	    if($result->num_rows > 0){ 
	       	self::delete($res['id']); 
		}
		else return null;
	}
	public static function comprobarCantidad($tCarrito){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$id = $tCarrito->getId();
		$producto = $tCarrito->getProducto();
		$cantidad = $tCarrito->getCantidad();
		$sql = sprintf("SELECT cantidad FROM productos WHERE id = '%d'"
		, $conn->real_escape_string($producto));
		$resultado = $conn->query($sql);
		$res = $resultado->fetch_assoc();
		if($res['cantidad'] < $cantidad){
			return false;
		}
		else{
			return true;
		}
	}
	public static function updateCantidadOriginal($tCarrito) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$id = $tCarrito->getId();
		$usuario = $tCarrito->getUsuario();
		$producto = $tCarrito->getProducto();
		$cantidad = $tCarrito->getCantidad();
	
		$sql = sprintf("SELECT * FROM carrito where usuario = '%s' AND producto = '%d'"
		, $conn->real_escape_string($usuario)
		, $conn->real_escape_string($producto));
	
		$resultado = $conn->query($sql);
		$res = $resultado->fetch_assoc();
	
		$sql = sprintf("SELECT cantidad FROM productos WHERE id = '%d'"
		, $conn->real_escape_string($producto));
		$resultado = $conn->query($sql);
		$res2 = $resultado->fetch_assoc();
		$cantidad = $res2['cantidad'] - $res['cantidad'];

		$sql = sprintf("UPDATE productos set cantidad='%d' where id='%d'"
		, $conn->real_escape_string($cantidad)
		, $conn->real_escape_string($producto));

		$conn->query($sql);

		$sql = sprintf("DELETE from carrito where id = '%d'"
        , $conn->real_escape_string($id));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
}
?>