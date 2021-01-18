<?php
namespace es\fdi\ucm\aw;

class Usuario
{

    public static function login($apodo, $password)
    {
        $user = self::buscaUsuario($apodo);
        if (isset($user) && self::compruebaPassword($password, $user->getContrasena())) {
            return $user;
        }
    return false;
    }

    public static function buscaUsuario($apodo)
    {
        $result = DAOusuario::read($apodo);
        return $result;
    }
    
    public static function crea($nombre, $apellidos, $apodo, $password, $direccion, $email)
   {
        $user = self::buscaUsuario($apodo);
        if (isset($user)) {
            return false;
        }
        $usuario = new TOUsuario();

        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setApodo($apodo); 
        $usuario->setContrasena(self::hashPassword($password));
        $usuario->setdireccion($direccion);
        $usuario->setEmail($email);
        return self::inserta($usuario);
    }
    //self::hashPassword($password)
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, [rand()]);
    }
    
    private static function inserta($usuario)
    {
        $creado = DAOUsuario::create($usuario);
        return $creado;
    }
    
    public static function modificar($nombre, $apellidos, $usuario, $email, $nombreImagen){
            $usuario = DAOUsuario::read($_SESSION['usuario']);

            if (mb_strlen($nombre) > 0) {
                $usuario->setNombre($nombre);
            }
            if (mb_strlen($apellidos) > 0) {
                $usuario->setApellidos($apellidos);
            }
            if (mb_strlen($email) > 0) {
                $usuario->setEmail($email);
            }
            
            /*if (mb_strlen($nombreImagen) > 0) {
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/SJProducts/media/usuario/';
                move_uploaded_file($_FILES['avatar']['tmp_name'], $carpetaDestino . $nombreImagen);
                $nuevoNombre = $carpetaDestino;
                $nuevoNombre .= $apodo;
                $nuevoNombre .= '.';
                $nuevoNombre .= pathinfo($nombreImagen, PATHINFO_EXTENSION);
                rename($carpetaDestino.$nombreImagen, $nuevoNombre);
                $usuario->setUrlFoto('media/usuario/'. $apodo . '.' . pathinfo($nombreImagen, PATHINFO_EXTENSION));
            }*/
            
                
            return DAOUsuario::update($usuario);
    }

     public static function borrarUsuario($apodo)
    {                
        return DAOUsuario::delete($apodo);
    }

    public static function compruebaPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

   public static function cambiarPassword($apodo, $password){
        $usuario = self::buscaUsuario($apodo);

        $usuario->setContrasena(self::hashPassword($password));
        
        return DAOUsuario::update($usuario);
    }
}
