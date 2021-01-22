<?php

namespace miId\App\fuente\Modelo;

class Usuario
{
    private string $usu;
    private string $pas;

    public function setPass(string $pass)
    {
        if ($pass == "") {
        }
        $expReg = '/(?:[A-Z].*)(?:[a-z].*)(?:[0-9].*)(?:\W.*).{8,16}/';
        if (!preg_match($expReg, $pass)) {
            return 'La contraseña no cumple las condiciones de seguridad';
        }
    }
}
