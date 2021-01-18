<?php
namespace es\fdi\ucm\aw;
class DAOcategoria{

	public static function create($categoria){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();		
		$idcategoria = $categoria->getidcategoria();
		$nombre = $categoria->getnombre();
		
		$sql = sprintf("INSERT into categorias (id, nombre)values('%d', '%s')"
		, $conn->real_escape_string($idcategoria)
		, $conn->real_escape_string($nombre)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function read($idcategoria){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM categorias WHERE id = '%d'"
			, $conn->real_escape_string($idcategoria)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			$res = $resultado->fetch_assoc();
			$categoria = new TOcategoria();
			$categoria->getidcategoria($res['id']);
			$categoria->setnombre($res['nombre']);
		}
		return $categoria;	
	}

	public static function update($categoria){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$idcategoria = $categoria->getidcategoria();
		$nombre = $categoria->getnombre();
		
		$sql = sprintf("UPDATE categorias set id = '%d', nombre='%s' where nombre='%d'"
			, $conn->real_escape_string($idcategoria)
			, $conn->real_escape_string($nombre)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function delete($idcategoria){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("DELETE FROM categorias WHERE id = '%d'"
			, $conn->real_escape_string($idcategoria)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}
}