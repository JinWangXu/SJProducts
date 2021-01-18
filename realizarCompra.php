<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOcarrito as DAOcarrito;
use es\fdi\ucm\aw\TOcarrito as TOcarrito;

if(!empty($_SESSION['nombre'])){ 
    $carro = DAOcarrito::listar($_SESSION['nombre']);
    $vacio = true;
    foreach($carro as $tCarrito){
        $comprobarCantidad = DAOcarrito::comprobarCantidad($tCarrito);
        if($comprobarCantidad){
            $ok = true;
        DAOcarrito::updateCantidadOriginal($tCarrito);
        }
        else{
            $ok = false;
        }
        $vacio = false;
    }
    if($ok){
        $state = 1;
    }
    else{
        $state = 2;
    }
    if($vacio){
        $state = 3;
    }
	$response = array(
		'state' => $state
	);

	echo json_encode($response);
}
else{
    $state = 4;
    $response = array(
		'state' => $state
	);

	echo json_encode($response);
}
?>