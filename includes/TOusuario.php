<?php
namespace es\fdi\ucm\aw;
/**
 * esta clase contiene los atributos de la tabla usuario
 */
class TOUsuario
{
	private $apodo;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $urlFoto;
	private $direccion;
	function __construct() {
		$apodo = '';
		$nombre = '';
		$apellidos = '';
		$email = '';
		$ntarjeta = 0;
		$password = '';
		$urlFoto = '';
		$direccion = '';
	}

	public function getApodo() {
		return $this->apodo;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function getApellidos() {
		return $this->apellidos;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getNtarjeta() {
		return $this->ntarjeta;
	}

	public function getContrasena() {
		return $this->password;
	}

	public function geturlFoto(){
		return $this->urlFoto;
	}

	public function getDireccion() {
		return $this->direccion;
	}

	public function setApodo($apodo) {
		$this->apodo = $apodo;
	}

	public function setNombre($_nombre) {
		$this->nombre = $_nombre;
	}

	public function setApellidos($_apellidos) {
		$this->apellidos = $_apellidos;
	}

	public function setEmail($_email) {
		$this->email = $_email;
	}

	public function setNtarjeta($_ntarjeta) {
		$this->ntarjeta = $_ntarjeta;
	}

	public function setContrasena($_contrasena) {
		$this->password = $_contrasena;
	}

	public function seturlFoto($_urlFoto){
		$this->urlFoto = $_urlFoto;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
}
?>