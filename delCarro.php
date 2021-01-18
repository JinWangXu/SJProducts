<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOcarrito as DAOcarrito;
use es\fdi\ucm\aw\TOcarrito as TOcarrito;

if(!empty($_POST['producto']) && !empty($_SESSION['nombre'])){ 

    $tCarrito = new TOcarrito();
	$tCarrito->setUsuario($_SESSION['nombre']);
    $tCarrito->setProducto($_POST['producto']);

	$state = DAOcarrito::borrarDelCarro($tCarrito);

	$response = array(
		'state' => $state
	);

	echo json_encode($response);
}
else{

}
?>