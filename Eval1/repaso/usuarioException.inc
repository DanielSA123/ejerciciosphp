<?php

class UsuarioException extends Exception
{
    private $errores;

    function __construct($mensaje, $errores)
    {
        parent::__construct($mensaje);
        $this->errores = $errores;
    }

    function getErrores()
    {
        return $this->errores;
    }
}