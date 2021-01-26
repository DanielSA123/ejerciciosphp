<?php

namespace miId\App\fuente\Modelo;

class Usuario
{
    private string $usu;
    private string $pas;

    public function setPass(string $pass)
    {
        if ($pass == "") {
            return "La contraseña no puede estar vacia";
        }
        $expReg = '/(?:[A-Z].*)(?:[a-z].*)(?:[0-9].*)(?:\W.*).{8,16}/';
        if (!preg_match($expReg, $pass)) {
            return 'La contraseña no cumple las condiciones de seguridad';
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
}