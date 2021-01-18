<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOValoracion as DAOValoracion;
use es\fdi\ucm\aw\TOValoracion as TOValoracion;


if(!empty($_SESSION['producto']) && !empty($_SESSION['nombre']) && !empty($_POST['ratingNum'])){ 

    $tValoracion = new TOValoracion();
	$tValoracion->setValoracion(intVal($_POST['ratingNum']));
	$tValoracion->setidproducto($_SESSION['producto']);
	$tValoracion->setIdUsuario($_SESSION['nombre']);

	$status = DAOValoracion::comparar($tValoracion);

	if($status == 1){

		$ok = DAOValoracion::create($tValoracion);
	}
    
	$media = DAOValoracion::media($tValoracion);

	$response = array( 
        'data' => $media,
        'status' => $status 
    );

	echo json_encode($response);     

} 
else{
    $status = 3;
    $response = array( 
        'status' => $status 
    );
    echo json_encode($response); 
}
?>
