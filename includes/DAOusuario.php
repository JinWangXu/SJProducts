<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class DAOUsuario
{
	public static function create($usuario) {

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$apodo = $usuario->getApodo();
		$nombre = $usuario->getNombre();
		$apellidos = $usuario->getApellidos();
		$email = $usuario->getEmail();
		$direccion = $usuario->getDireccion();
		$password = $usuario->getContrasena();
		$urlFoto = 'images/jin.jpg';

		$sql = sprintf("insert into usuario(nombre, apellidos, apodo, password, direccion, urlFoto, email) values('%s', '%s', '%s', '%s', '%s', '%s', '%s')"
		, $conn->real_escape_string($nombre)
		, $conn->real_escape_string($apellidos)
		, $conn->real_escape_string($apodo)
		, $conn->real_escape_string($password)
		, $conn->real_escape_string($direccion)
		, $conn->real_escape_string($urlFoto)
		, $conn->real_escape_string($email));

		if(!$resultado = $conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function read($apodo) {

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$sql=sprintf("select * from usuario where apodo='%s'", $conn->real_escape_string($apodo));
		$resultado = $conn->query($sql);

		if ($resultado->num_rows == 0){
			return NULL;
		}
		$datos = $resultado->fetch_assoc();

		$usuario = new TOUsuario();

		$usuario->setApodo($datos['apodo']);
		$usuario->setNombre($datos['nombre']);
		$usuario->setApellidos($datos['apellidos']);
		$usuario->setEmail($datos['email']);
		$usuario->setDireccion($datos['direccion']);
		$usuario->setContrasena($datos['password']);
		$usuario->seturlFoto($datos['urlFoto']);

		return $usuario;
	}

	public static function update($usuario) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$apodo = $usuario->getApodo();
		$nombre = $usuario->getNombre();
		$apellidos = $usuario->getApellidos();
		$email = $usuario->getEmail();
		$ntarjeta = $usuario->getNtarjeta();
		$contrasena = $usuario->getContrasena();
		$urlFoto = $usuario->geturlFoto();
		$sql = sprintf("update usuario set apodo='%s', nombre='%s', apellidos='%s', email='%s', ntarjeta='%d', contrasena='%s', urlfoto='%s' where apodo='%s'"
		, $conn->real_escape_string($apodo)
		, $conn->real_escape_string($nombre)
		, $conn->real_escape_string($apellidos)
		, $conn->real_escape_string($email)
		, $conn->real_escape_string($ntarjeta)
		, $conn->real_escape_string($contrasena)
		, $conn->real_escape_string($urlFoto));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function delete($apodo) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$sql = sprintf("DELETE from usuario where apodo='%s'"
		, $conn->real_escape_string($apodo));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
}

?>