<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOproductos as DAOproductos;
use es\fdi\ucm\aw\DAOUsuario as DAOUsuario;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="js/producto.js"></script>
	<link rel="stylesheet" href="css/cssCabecera.css" />
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/cssProductos.css">
	<title>Producto</title>
</head>
<body>
	<div class="contenedor">
		<?php
		require('includes/cabecera.php');
		?>
		<section class="main">

			<div class="gridprodContainer">

				<div class="gridprodContainer1">
					<?php
					$producto = DAOproductos::read($_GET["id"]);
					$_SESSION['producto'] = $producto->getidProducto();
					if(isset($_SESSION['nombre'])){
						$usuario = DAOUsuario::read($_SESSION['nombre']);
					}
					$valoracion = $producto->getidvaloracion();
					( isset($_SESSION["login"]))? $nomUser = $_SESSION['nombre'] : $nomUser = '';
					( $valoracion >= 5 )?  $val5 = 'checked ="checked"' : $val5 = '' ;
					( $valoracion >= 4 && $valoracion < 5)?  $val4 ='checked ="checked"' : $val4 = '' ;
					( $valoracion >= 3 && $valoracion < 4)?  $val3 = 'checked ="checked"' : $val3 = '' ;
					( $valoracion >= 2 && $valoracion < 3)?  $val2 = 'checked ="checked"' :$val2 =  '' ;
					( $valoracion >= 1 && $valoracion < 2)?  $val1 = 'checked ="checked"' : $val1 = '' ;

					echo '<div class="flexsubContainer1"> 
								<img src= '.$producto->getimagen().'  alt="imagen  foto "id="widthImgPel"> 
							</div>';
					
					echo '<div class="flexsubContainer2">';
					echo ' <h1> '.$producto->getnombre().'</h1>';
					echo ' <br><h2>'.$producto->getprecio().' € </h2>';
					echo '	
					<br><form>
					<p class="rate">
					<input type="hidden" id="idProducto" name="idProducto" value='.$producto->getidProducto().'>
					<input type="hidden" id="usuario" name="usuario" value="' . $nomUser . '">
					<input type="radio" id="star5" name="estrellas" value= 5 '. $val5 .'>
					<label for="star5"> &#9733; </label>
					<input type="radio" id="star4" name="estrellas" value= 4 '. $val4 .'>
					<label for="star4"> &#9733;</label>
					<input type="radio" id="star3" name="estrellas" value= 3 '. $val3 .'>
					<label for="star3"> &#9733;</label>
					<input type="radio" id="star2" name="estrellas" value= 2 '. $val2 .'>
					<label for="star2"> &#9733;</label>
					<input type="radio" id="star1" name="estrellas" value= 1 '. $val1 .'>
					<label for="star1"> &#9733;</label>
					</p>
				</form> ';
					echo '<br> <h4> Descripción: '.$producto->getdescr().' </h4> ';
					echo '<br> <h4>Stock: '.$producto->getcantidad().' </h4><br>'; 
					
					echo '<button class="decrementar">-</button>';
					echo '<input type="text" id="cantidad" value="1">';
					echo '<button class="incrementar">+</button>';
					echo '<br><br>';
					echo '<button id="addCarro" class="add_carro">Añadir al carrito 🛒</button>';
					echo ' </div>';


						
					?>
				</div>	


				<div class="gridprodContainer2">
					<h1>Comentarios</h1>
					<?php
					if(isset($_SESSION['nombre'])){
						?>

						<h3>Enviar comentario: </h3>

						<form method="post" id="formComentario">
							<fieldset>

								<table>
									<tr>
										<td>
											<label for="texto"> <?php echo'<img src= '.$usuario->geturlFoto().' alt="imagen" id="avatar"">'; ?> </label>
										</td>
										<td>
											<textarea id="texto" placeholder="Introduce tu comentario sobre el producto" name="texto" rows="5" style="width: 1186px; height: 104px;"></textarea>
										</td>
									</tr>
								</table>
								<input type="hidden" value="0" name="idComentario" id="idComentario">
								<input type="hidden" id="idproducto" name="idproducto" value="<?php echo $producto->getidProducto()  ?>">
								<input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION['nombre']?>">
								<input type="hidden" id="accionComentario" name="accionComentario" value="addComentario">
								<button type="submit" name="comentar" id="botonComentarios"> Comentar </button>
								<button type="reset" name="limpiar"  id="botonComentarios"> Limpiar </button>

							</fieldset></form>

							<span id="mensajeComentario"></span>
							<div id="mostrarComentario"></div>

							<script>cargarComentario();</script>
					</div>
					<?php
					 } 
					 else{
						echo '<p> Si quiere comentar y ver los comentarios, <a href="login.php">inicie sesión </a></p> <br>';
					 }
					 ?>
			</div>
		</section>
	</div>
	<?php
		require('includes/footer.php');
	?>
	</body>
</html>