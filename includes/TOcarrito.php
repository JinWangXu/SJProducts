<?php
namespace es\fdi\ucm\aw;
class TOCarrito
{
	private $usuario;
    private $producto;
	private $cantidad;
	private $id;

	function __construct() {
		$usuario = '';
		$producto = '';
		$cantidad = '';
		$id = '';
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function getProducto() {
		return $this->producto;
	}
	
	public function getCantidad() {
		return $this->cantidad;
	}

	public function getId() {
		return $this->id;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function setProducto($producto) {
		$this->producto = $producto;
    }

	public function setCantidad($cantidad) {
		$this->cantidad = $cantidad;
	}

	public function setId($id) {
		$this->id = $id;
    }  
}

?>