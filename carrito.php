<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOcarrito as DAOcarrito;
use es\fdi\ucm\aw\DAOproductos;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/cssCarro.css">
    <link rel="stylesheet" href="css/cssCabecera.css">
    <script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
    <script type="text/javascript" src="js/producto.js"></script>
	<script src="js/realizarCompra.js"></script>
    
  </head>
  <body>
  <?php require('includes/cabecera.php');
  if(isset($_SESSION['nombre'])){
      $listaCarro = DAOcarrito::listar($_SESSION['nombre']);
      echo '<h1> TU CARRITO DE LA COMPRA </h1>';
        if(isset($listaCarro)) {
            echo'<table>
            <tr>
                <td>Imagen</td>
                <td>Producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Total</td>
            </tr>';
            foreach($listaCarro as $prCarro){
                $producto = DAOproductos::read($prCarro->getProducto());
                echo'<tr> 
                    <td><img src="'.$producto->getImagen().'" </td>
                    <td>'.$producto->getnombre().' </td>
                    <td> '.$producto->getprecio().' </td>
                    <td> '.$prCarro->getcantidad().' </td>
                    <td>'.$producto->getprecio()*$prCarro->getcantidad().'  </td>
                    <td> <input type="button" class= "delCarro" name="'.$producto->getidProducto().'" value="❎"> </td>
                </tr>';
              }
            echo '</table>
            <br> <br>
            <button class="comprar">Realizar compra</button>';
        }
  }
    require('includes/footer.php');
  ?>
</body>
</html>