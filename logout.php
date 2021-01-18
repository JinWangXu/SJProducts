<?php
namespace es\fdi\ucm\aw;

require_once __DIR__.'/includes/config.php';

//Doble seguridad: unset + destroy
unset($_SESSION["login"]);
unset($_SESSION["esAdmin"]);
unset($_SESSION["nombre"]);


session_destroy();
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/cssCabecera.css" />
<title>Logout</title>
</head>

<body>
<?php
	require('includes/cabecera.php');
	?>
<div id="contenedor">


	<div id="contenido">
		<h1>Hasta pronto!</h1>
		<a class="loginBot" href="index.php">Volver a la página principal</a>
	</div>


</div>
<?php
	require('includes/footer.php');
?>
</body>
</html>