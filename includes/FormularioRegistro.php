<?php
namespace es\fdi\ucm\aw;
class FormularioRegistro extends Form
{
    public function __construct() {
        parent::__construct('formularioRegistro');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreUsuario = '';
        $nombre = '';
        $apellidos = '';
        $direccion = '';
        $email = '';
        if ($datos) {
            $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : $nombreUsuario;
            $nombre = isset($datos['nombre']) ? $datos['nombre'] : $nombre;
        }
        $html = '
                <div class="login">
                <div class="login-header"><h1>Registro</h1></div>
                <div class="login-form">

                <h3>Nickname:</h3> 
                <input type="text" id="nick" name="nombreUsuario" placeholder="Nickname" required>

                <h3>Nombre:</h3> 
                <input type="text" id="nombrecompleto" name="nombre" placeholder="Nombre de usuario" required>
		
                <h3>Apellidos:</h3> 
                <input type="text" id="passwd" name="apellidos" placeholder="Apellidos" required>
            
                <h3>Direccion:</h3> 
                <input type="text" name="direccion" id="direccion" placeholder="Direccion">
           
                <h3>email:</h3> 
                <input type="text" id="correo" name="email" placeholder="Email" required>
            
                <h3>Password:</h3> 
                <input type="password" id="passwd" name="password" required>
			
            <h3>Vuelve a introducir el Password:</h3>
            <input type="password" id="passwd" name="password2">
            <br> <br> <br>

            <button type="submit" name="signin">Registrar</button>
            </div>
            </div>
       ';
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        

        $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;

        $apellidos = isset($datos['apellidos']) ? $datos['apellidos'] : null;

        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;
        
        if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 ) {
            $result[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $result[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password2 = isset($datos['password2']) ? $datos['password2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $result[] = "Los passwords deben coincidir";
        }

        $direccion = isset($datos['direccion']) ? $datos['direccion'] : null;
        $email = isset($datos['email']) ? $datos['email'] : null;
        if (count($result) === 0) {
            $user = Usuario::crea($nombre, $apellidos, $nombreUsuario, $password, $direccion, $email);
            if (!$user) {
                $result[] = "El usuario ya existe";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $nombreUsuario;
                $result = 'index.php';
            }
        }
        return $result;
    }
}