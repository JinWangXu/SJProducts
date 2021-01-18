<?php
namespace es\fdi\ucm\aw;

class FormularioLogin extends Form
{
    public function __construct() {
        parent::__construct('formularioLogin');
    }
        
    protected function generaCamposFormulario($datos)
    {
       return '
        <div class="login">
        <div class="login-header"><h1>Login</h1>
        </div>
        <div class="login-form">

        <h3>Nombre de usuario:</h3>
            <input type="text" id="nombre" name="nombreUsuario" placeholder="Nombre"><br>

        <h3>Password:</h3>
             <input type="password" name="password" placeholder="Contraseña"><br>

        <button type="submit" name="login">Entrar</button>
        </div> </div>
      ';
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;
                
        if ( empty($nombreUsuario) ) {
            $result[] = "El nombre de usuario no puede estar vacío";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) ) {
            $result[] = "El password no puede estar vacío.";
        }
        
        if (count($result) === 0) {
            $usuario = Usuario::login($nombreUsuario, $password);
            if ( ! $usuario ) {
                $result[] = "El usuario o el password no coinciden";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $nombreUsuario;
                $result = 'index.php';
            }
        }
        return $result;
    }
}