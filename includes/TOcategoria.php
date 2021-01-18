<?php
namespace es\fdi\ucm\aw;
class TOcategoria{

	private $idcategoria;
	private $nombre;

	public function __construct(){
		$idcategoria = "";
		$nombre = "";
	}

	public function getidcategoria(){
		return $this->idcategoria;
	}

	public function getnombre(){
		return $this->nombre;
	}

	public function setidcategoria($id){
		$this->idcategoria = $id;
	}

	public function setnombre($nombre){
		$this->nombre = $nombre;
	}
}
?>