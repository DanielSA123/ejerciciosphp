<?php

class Usuario
{
    private $nombre;
    private $direccion;
    private $telefono;
    private $email;
    private $errores;

    public function __construct($nombre, $direccion, $telefono, $email)
    {
        try {
            $this->setNombre($nombre);
        } catch (Exception $e) {
            $this->errores[] = $e->getMessage();
        }
        try {
            $this->setDireccion($direccion);
        } catch (Exception $e) {
            $this->errores[] = $e->getMessage();
        }
        try {
            $this->setTelefono($telefono);
        } catch (Exception $e) {
            $this->errores[] = $e->getMessage();
        }
        try {
            $this->setEmail($email);
        } catch (Exception $e) {
            $this->errores[] = $e->getMessage();
        }
    }

    public function setNombre($nombre)
    {
        if (empty($nombre)) {
            throw new Exception("El campo nombre es requerido.");
        } else {
            if (!preg_match("/^[a-zA-Z ]{3,20}$/", $nombre)) {
                throw new Exception("Solo se permiten letras y espacios en el nombre.");
            }
            $this->nombre = $nombre;
        }
    }
    public function setDireccion($direccion)
    {
        if (empty($direccion)) {
            throw new Exception("El campo direccion es requerido.");
        } else {
            if (strlen($direccion) < 8) {
                throw new Exception("La direccion debe tener al menos 8 caracteres.");
            }
            $this->direccion = $direccion;
        }
    }

    public function setTelefono($telefono)
    {
        if (empty($telefono)) {
            throw new Exception("El campo telefono es requerido.");
        } else {
            if (!preg_match("/^[679][0-9]{8}$/", $telefono)) {
                throw new Exception("No es un número de teléfono válido.");
            }
            $this->telefono = $telefono;
        }
    }

    public function setEmail($email)
    {
        if (empty($email)) {
            throw new Exception("El campo e-mail es requerido.");
        } else {
            if (!preg_match("/^[a-zA-Z]+@[a-z]+.[a-z]{2,4}$/", $email)) {
                throw new Exception("No es un e-mail válido.");
            }
            $this->email = $email;
        }
    }

    public function getErrores()
    {
        return $this->errores;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getEmail()
    {
        return $this->email;
    }
}