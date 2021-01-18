
<header id="main-header">
    <a id="logo-header">
		<img src="logoSJProducts1.PNG" alt="logo" width="50">
	</a>
    <nav>
		<ul>   
        <li><a href='index.php'>Inicio</a> </li>
        <li><a href='productos.php'>Productos</a> </li>
        <li><a href='carrito.php'>Carrito</a> </li>
        <?php
		if(!isset($_SESSION["login"])){
			echo ' 
			<li><a class="loginBot" href="login.php">Login</a>  </li>
			<li><a class="loginBot" href="registro.php">Registrarse</a> </li>
			';
        }
        else{
            echo ' 
            <li><a class="loginBot" href="miPerfil.php">Perfil</a>  </li>
            <li> <a class="loginBot" href="logout.php">Cerrar Sesión</a> </li>
			';
        }
        ?>
    </ul>
	</nav>
</header>