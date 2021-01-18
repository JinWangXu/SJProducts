<?php

namespace es\fdi\ucm\aw;


class DAOValoracion {
	
	public static function create($tValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();		

		$idValoracion = $tValoracion->getIdValoracion();
		$valoracion = $tValoracion->getValoracion();
		$idproducto = $tValoracion->getidproducto();
		$idUsuario = $tValoracion->getIdUsuario();

		$sql = sprintf("INSERT into valoracion (idproducto, idusuario, valoracion)values('%d', '%s', '%d')"
		, $conn->real_escape_string($idproducto)
		, $conn->real_escape_string($idUsuario)
		, $conn->real_escape_string($valoracion)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function read($idValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$sql = sprintf("SELECT * FROM valoracion WHERE idvaloracion = '%d'"
			, $conn->real_escape_string($idValoracion)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			$res = $resultado->fetch_assoc();
			$tValoracion = new TOValoracion();
			$tValoracion->setIdValoracion($res['idvaloracion']);
			$tValoracion->setValoracion($res['valoracion']);
			$tValoracion->setidproducto($res['idproducto']);
			$tValoracion->setIdUsuario($res['idusuario']);
		}
		return $tValoracion;		
	}

	public static function update($tValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$idValoracion = $tValoracion->getIdValoracion();
		$valoracion = $tValoracion->getValoracion();
		$idproducto = $tValoracion->getidproducto();
		$idUsuario = $tValoracion->getIdUsuario();

		$sql = sprintf("UPDATE valoracion set idvaloracion = '%d', valoracion='%d', idproducto='%d', idusuario='%s' where idValoracion='%d'"
			, $conn->real_escape_string($idValoracion)
			, $conn->real_escape_string($valoracion)
			, $conn->real_escape_string($idproducto)
			, $conn->real_escape_string($idUsuario)
			, $conn->real_escape_string($idValoracion)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function delete($idValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("DELETE FROM valoracion WHERE idvaloracion = '%d'"
			, $conn->real_escape_string($idValoracion)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}
	public static function comparar($tValoracion){
				$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();	
		$status = 1; 
		$idValoracion = $tValoracion->getIdValoracion();
		$valoracion = $tValoracion->getValoracion();
		$idproducto = $tValoracion->getidproducto();
		$idUsuario = $tValoracion->getIdUsuario();
	    $sql = sprintf("SELECT * FROM valoracion WHERE idusuario = '%s' AND idproducto = '%d'"
	        , $conn->real_escape_string($idUsuario)
	        , $conn->real_escape_string($idproducto)
	        ); 
	    $result = $conn->query($sql); 
	     
	    if($result->num_rows > 0){ 
	        $status = 2; 
	        $sql = sprintf("UPDATE valoracion SET valoracion.valoracion = '%d' WHERE idusuario = '%s' AND idproducto = '%d'"
	            , $conn->real_escape_string($valoracion)  
	            , $conn->real_escape_string($idUsuario)
	            , $conn->real_escape_string($idproducto)
	            ); 
	        $conn->query($sql); 
	    }
	    return $status;
	}
	public static function media($tValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();	
		$idValoracion = $tValoracion->getIdValoracion();
		$valoracion = $tValoracion->getValoracion();
		$idproducto = $tValoracion->getidproducto();
		$idUsuario = $tValoracion->getIdUsuario();

		$sql =  sprintf("SELECT * FROM valoracion WHERE idproducto = '%d'"
        ,$conn->real_escape_string($idproducto)
        );
        $rows = $conn->query($sql);
        $cantValoradas = $rows->num_rows;

        $sql =  sprintf("SELECT SUM(valoracion.valoracion) AS total FROM valoracion WHERE idproducto = '%d'"
        ,$conn->real_escape_string($idproducto)
        );
        $resultado = $conn->query($sql);
        $arrayT = $resultado->fetch_assoc();
        $total = $arrayT['total'];
        $media = $total / $cantValoradas;

        $sql =  sprintf("UPDATE productos SET idValoracion = '%f' WHERE id = '%d'"
             ,$conn->real_escape_string($media)
             ,$conn->real_escape_string($idproducto)
             );
        $conn->query($sql);
        return $media;
	}
}

?>