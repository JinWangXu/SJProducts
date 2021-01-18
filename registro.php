<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormularioRegistro as FormularioRegistro;
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/cssCabecera.css" />
<link rel="stylesheet" type="text/css" href="css/login.css">
<title>Registro</title>
</head>

<body>
<?php
	require('includes/cabecera.php');
?>
<div id="contenedor">

	<section class="contenidoLogin">
		
<?php 
    $form = new FormularioRegistro(); $form->gestiona();
?>
</div>
</div>
<?php
	require('includes/footer.php');
?>
</body>
</html>