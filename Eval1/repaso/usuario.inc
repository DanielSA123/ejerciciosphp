<?php
class Usuario
{
    private $nombre;
    private $apellido;
    private $edad;
    private $email;
    private $password;
    private $telefono;
    private $direccion_tipo;
    private $direccion_nombre;
    private $direccion_num;
    private $aficiones;

    public function __construct($nombre, $apellido, $email, $password, $telefono, $edad, $direccion_tipo, $direccion_nombre, $direccion_num, $aficiones)
    {
        if (!empty($error = $this->set_nombre(htmlspecialchars(trim($nombre))))) {
            $errores['nombre'] = $error;
        }
        if (!empty($error = $this->set_apellido(htmlspecialchars(trim($apellido))))) {
            $errores['apellido'] = $error;
        }
        if (!empty($error = $this->set_email(htmlspecialchars(trim($email))))) {
            $errores['email'] = $error;
        }
        if (!empty($error = $this->set_password(htmlspecialchars(trim($password))))) {
            $errores['password'] = $error;
        }
        if (!empty($error = $this->set_telefono(htmlspecialchars(trim($telefono))))) {
            $errores['telefono'] = $error;
        }
        if (!empty($error = $this->set_edad(htmlspecialchars(trim($edad))))) {
            $errores['edad'] = $error;
        }
        if (!empty($error = $this->set_direccion_tipo(htmlspecialchars(trim($direccion_tipo))))) {
            $errores['direccion_tipo'] = $error;
        }
        if (!empty($error = $this->set_direccion_nombre(htmlspecialchars(trim($direccion_nombre))))) {
            $errores['direccion_nombre'] = $error;
        }
        if (!empty($error = $this->set_direccion_num(htmlspecialchars(trim($direccion_num))))) {
            $errores['direccion_num'] = $error;
        }
        if (!empty($error = $this->set_aficiones($aficiones))) {
            $errores['aficiones'] = $error;
        }
        if (isset($errores)) {
            include 'usuarioException.inc';
            throw new UsuarioException("Errores del usuario", $errores);
        }
    }

    public function set_nombre($nombre)
    {
        if (empty($nombre)) {
            return 'El nombre es obligatorio';
        }
        $regEx = '/^[A-Z]\w*$/';
        if (!preg_match($regEx, $nombre)) {
            return 'En nombre debe empezar por mayusculas y solo puede contener letras';
        }
        $this->nombre = $nombre;
        return '';
    }
    public function set_apellido($apellido)
    {
        if (empty($apellido)) {
            return 'El apellido es obligatorio';
        }
        $regEx = '/^[A-Z]\w*$/';
        if (!preg_match($regEx, $apellido)) {
            return 'En apellido debe empezar por mayusculas y solo puede contener letras';
        }
        $this->apellido = $apellido;
        return '';
    }
    public function set_email($email)
    {
        if (empty($email)) {
            return 'El email es obligatorio';
        }
        $regEx = '/^.*@gmail.com$/';
        if (!preg_match($regEx, $email)) {
            return 'En email no es valido, solo se admiten direcciones de gmail';
        }
        $this->email = $email;
        return '';
    }
    public function set_password($password)
    {
        if (empty($password)) {
            return 'La contraseña es obligatoria';
        }
        $regEx = '/(.*[A-Z].*\d.*)||(.*\d.*[A-Z].*)/';
        if (!preg_match($regEx, $password)) {
            return 'La contraseña debe contener al menos una MAYUSCULA y un NUMERO';
        }
        $this->password = $password;
        return '';
    }
    public function set_telefono($telefono)
    {
        if (empty($telefono)) {
            return 'El telefono es obligatorio';
        }
        $regEx = '/^[679]\d{8}$/';
        if (!preg_match($regEx, $telefono)) {
            return 'El numero de telefono no es valido, evite poner prefijos o espacios entre los numeros';
        }
        $this->telefono = $telefono;
        return '';
    }
    public function set_edad($edad)
    {
        $this->edad = $edad;
        return '';
    }
    public function set_direccion_tipo($direccion_tipo)
    {
        $this->direccion_tipo = $direccion_tipo;
        return '';
    }
    public function set_direccion_nombre($direccion_nombre)
    {
        if (empty($direccion_nombre)) {
            return 'El nombre de la calle es obligatorio';
        }
        $this->direccion_nombre = $direccion_nombre;
        return '';
    }
    public function set_direccion_num($direccion_num)
    {
        if (empty($direccion_num)) {
            return 'El numero de la casa es obligatorio';
        }
        $regEx = '/^[1-9]?[0-9].-[1-9]?[0-9].$/';
        if (!(preg_match($regEx, $direccion_num) ||  ctype_digit($direccion_num))) {
            return 'El numero de la casa no es valido';
        }
        $this->direccion_num = $direccion_num;
        return '';
    }
    public function set_aficiones($aficiones)
    {
        $this->aficiones = $aficiones;
        return '';
    }
}