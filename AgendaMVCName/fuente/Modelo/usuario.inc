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
        if (!empty($error = $this->setPass($pass, $passre))) {
            $this->errores['pass'] = $error;
        }
        if (!empty($error = $this->setUsu($usu))) {
            $this->errores['usu'] = $error;
        }
        if ($this->errores) {
            throw new Exception("hay errores");
        }
        $this->usu = $usu;
        $this->pass = $pass;
    }

    public function setPass(string $pass, string $passre)
    {
        if ($pass == "") {
            return "La contraseña no puede estar vacia";
        }
        $expReg = '/(?:[A-Z].*)(?:[a-z].*)(?:[0-9].*)(?:\W.*).{8,16}/';
        if (!preg_match($expReg, $pass)) {
            return 'La contraseña no cumple las condiciones de seguridad';
        }
        if ($pass != $passre) {
            return 'Las contraseñas no coinciden';
        }
        return "";
    }
    public function setUsu(string $usu)
    {
        if (sizeof($usu) < 5) {
            return "El nombre de usuario de be tener al menos 5 caracteres";
        }
        return "";
    }
    public function getErrores()
    {
        return $this->errores;
    }
}