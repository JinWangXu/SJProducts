<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOcarrito as DAOcarrito;
use es\fdi\ucm\aw\TOcarrito as TOcarrito;

if(!empty($_POST['producto']) && !empty($_POST['usuario'])){ 

    $tCarrito = new TOcarrito();
	$tCarrito->setUsuario($_POST['usuario']);
    $tCarrito->setProducto($_POST['producto']);
    $tCarrito->setCantidad($_POST['cantidad']);

	$state = DAOcarrito::comparar($tCarrito);

	$response = array(
		'state' => $state
	);

	echo json_encode($response);
}
else{

}
?>