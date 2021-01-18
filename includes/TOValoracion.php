<?php
namespace es\fdi\ucm\aw;

 class TOValoracion{
 	private $idValoracion;
	private $valoracion;
	private $idproducto;
	private $idUsuario;
 
	public function __construct(){
		$idValoracion = "";
		$valoracion = "";
		$idproducto = "";
		$idUsuario = "";
	}
	public function getIdValoracion(){
		return $this->idValoracion;
	}
	public function setIdValoracion($idValoracion){
		$this->idValoracion = $idValoracion;
	}
	public function getValoracion(){
		return $this->valoracion;
	}
	public function setValoracion($valoracion){
		$this->valoracion = $valoracion;
	}

	public function getidproducto(){
		return $this->idproducto;
	}
	public function setidproducto($idproducto){
		$this->idproducto = $idproducto;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}	
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
 }
?>