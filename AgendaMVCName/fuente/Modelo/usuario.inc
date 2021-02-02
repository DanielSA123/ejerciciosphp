<?php

namespace miId\App\fuente\Modelo;

use Exception;

class Usuario
{
    private string $usu;
    private string $pass;
    private array $errores;

    public function __construct($usu, $pass, $passre)
    {
        $this->errores = [];
        if (!empty($error = $this->setPass($pass, $passre))) {
            $this->errores['pass'] = $error;
        } else {
            $this->pass = password_hash($pass, PASSWORD_DEFAULT);
        }
        if (!empty($error = $this->setUsu($usu))) {
            $this->errores['usu'] = $error;
        } else {
            $this->usu = $usu;
        }
    }

    public function setPass(string $pass, string $passre)
    {
        if ($pass == "") {
            return "La contraseña no puede estar vacia";
        }
        $expReg = '/^(?=.*[A-Z])(?=.*[!@#$&*?])(?=.*[0-9])(?=.*[a-z]).{8}$/';
        if (!preg_match($expReg, $pass)) {
            return 'La contraseña no cumple las condiciones de seguridad';
        }
        if ($pass != $passre) {
            return 'Las contraseñas no coinciden';
        }
        return "";
    }

    public static function isPassOk($pass)
    {
        //TODO: metodo para comprobar la contraseña al iniciar sesion
    }

    public function setUsu(string $usu)
    {
        if (strlen($usu) < 5) {
            return "El nombre de usuario de be tener al menos 5 caracteres";
        }
        return "";
    }
    public function getErrores()
    {
        return $this->errores;
    }

    public function getUsu()
    {
        return $this->usu;
    }
    public function getPass()
    {
        return $this->pass;
    }
}