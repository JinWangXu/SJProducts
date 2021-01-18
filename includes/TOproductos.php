<?php 
namespace es\fdi\ucm\aw;

class TOproductos{

	private $idproducto;
	private $idvaloracion;
	private $nombre;
	private $descricion;
	private $precio;
	private $cantidad;
	private $categoria;
	private $imagen;

	function __construct(){
		$idproducto = "";
		$nombre = "";
	 	$descricion = "";
	 	$precio = "";
	 	$cantidad = "";
		$categoria = "";
		$imagen = "";
	}

	public function getidProducto(){
		return $this->idproducto;
	}
	public function getidValoracion(){
		return $this->idvaloracion;
	}
	public function getnombre(){
		return $this->nombre;
	}

	public function getdescr(){
		return $this->descricion;
	}

	public function getprecio(){
		return $this->precio;
	}

	public function getcantidad(){
		return $this->cantidad;
	}

	public function getcategoria(){
		return $this->categoria;
	}

	public function getimagen(){
		return $this->imagen;
	}

	public function setidProducto($id){
		 $this->idproducto = $id;
	}
	public function setidvaloracion($idvaloracion){
		$this->idvaloracion = $idvaloracion;
   }
	public function setnombre($nombre){
		 $this->nombre = $nombre;
	}

	public function setdescr($desc){
		 $this->descricion = $desc;
	}

	public function setprecio($precio){
		 $this->precio = $precio;
	}

	public function setcantidad($cantidad){
		 $this->cantidad = $cantidad;
	}

	public function setcategoria($categoria){
		 $this->categoria = $categoria;
	}

	public function setimagen($imagen){
		$this->imagen = $imagen;
	}
}

?>