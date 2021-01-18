<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormBorrarCuenta as FormBorrarCuenta;


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cssCabecera.css">
	<link rel="stylesheet" type="text/css" href="css/editCuenta.css">
	<title>Borrar Cuenta</title>
</head>
<body>
<?php
	require('includes/cabecera.php');
	?>

<section class="contenidoCuenta">

	<?php
		if(!isset($_SESSION["login"])){
			header("location:index.php");
			
			echo "<p>Por favor <a href=\"login.php\">inicie sesión </a></p>";
		}

		$form = new FormBorrarCuenta();
$html = $form->gestiona();

	?>

</section>
</section>
</div>
	<?php require('includes/footer.php'); ?>
</body>
</html>