<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\Usuario as Usuario;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cssCabecera.css" />
	<link rel="stylesheet" type="text/css" href="css/cuenta.css">
	<title>Mi perfil</title>
</head>
<body>
	<div class="contenedor">
	<?php
		require('includes/cabecera.php');
	?>

	<section class="form_wrap">
	<?php
		$miCuenta = Usuario::buscaUsuario($_SESSION['nombre']);
		?>	
			<section class="contact_info">
			<section class="info_title">
				<?php echo '<h2> '.$miCuenta->getApodo().' </h2> <br>';

				echo '<img src=" '.$miCuenta->geturlFoto().'" id="imagenPerfil">';
				?>
				<br> <br>
				<!--<br> <br><a class="button" href="modificarCuenta.php"> Editar perfil</a><br> <br> <br>
				<a class="button" href="modificarPassword.php"> Cambiar contraseña</a><br> <br> <br>-->
				<a class="button" href="logout.php">Cerrar Sesión</a> <br> <br><br>
				<a class="button" href="borrarCuenta.php">Eliminar Cuenta</a> <br> <br>
			</section>
		</section>

		<div class="form_contact">
		<div class="user_info">

		<?php

	/*	if (isset($_SESSION['modificarPerfil'])) {
			echo '<h2> Datos modificados con éxito.</h2>';
			unset($_SESSION['modificarPerfil']);
		}
		elseif (isset($_SESSION['modificarPassword'])) {
			echo '<h2> Contraseña modificada con éxito.</h2>';
			unset($_SESSION['modificarPassword']);
		}*/
		
		
		echo "<h2>Información de la cuenta </h2><br>";
		echo "<p>Nickname: ".$miCuenta->getApodo()." </p><br>";
		echo "<p>Nombre: " .$miCuenta->getNombre(). "</p><br>";
		echo "<p>Apellidos: " .$miCuenta->getApellidos(). "</p><br>";
		echo "<p>Email: " . $miCuenta->getEmail() . "</p><br>";
		echo "<p>Dirección: " . $miCuenta->getDireccion() . "</p><br>";

	?>
		</div>
	</div>
</section>
</div>
<?php
		require('includes/footer.php');
	?>
</body>
</html>
