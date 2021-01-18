<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOproductos as DAOproductos;
use es\fdi\ucm\aw\DAOcategoria as DAOcategoria;
use es\fdi\ucm\aw\TOproductos as TOproductos;
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/cssCabecera.css" />

	<link rel="stylesheet" href="css/estilos.css">

	<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
	<script src="js/script.js"></script>
	<title>Productos</title>
</head>
<body>
	<?php
	require('includes/cabecera.php');
	?>
	<div class="wrap">
		<h1>Escoge un producto</h1>
		<div class="store-wrapper">
			<div class="category_list">
				<a href="#" class="category_item" category="all">Todo</a>
				<a href="#" class="category_item" category="ordenadores">Ordenadores</a>
				<a href="#" class="category_item" category="portatiles">Portátiles</a>
				<a href="#" class="category_item" category="smartphones">Smartphones</a>
				<a href="#" class="category_item" category="monitores">Monitores</a>
				<a href="#" class="category_item" category="audifonos">Sonido</a>
			</div>
			<section class="products-list">
			<?php
				$listaProductos = DAOproductos::listarProductos();
				foreach($listaProductos as $producto){
					$categoria = DAOcategoria::read($producto->getcategoria());
					echo'<div class="product-item" category='.$categoria->getnombre().'>
						<img src='.$producto->getimagen().' alt="" >
						<a href="productoConcreto.php?id='.$producto->getidProducto().'">'.$producto->getnombre().'</a>
					</div>';
				}
				?>
			</section>
		</div>
	</div>
<?php
	require('includes/footer.php');
?>
</body>
</html>