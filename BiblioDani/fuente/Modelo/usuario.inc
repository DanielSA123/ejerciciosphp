<?php
class Usuario
{
    private string $nombre;
    private string $direccion;
    private string $password;
    private array $errores;

    public function __construct($nombre, $direccion, $password)
    {
        if (!($this->setNombre($nombre))) {
            $this->errores['nombre'] = "Error en el nombre";
        }
        if (!($this->setDireccion($direccion))) {
            $this->errores['direccion'] = "Error en la direccion";
        }
        if (!($this->setPassword($password))) {
            $this->errores['password'] = "Error en el password";
        }
        if (isset($this->errores)) {
            throw new UsuarioException("Errores", $this->errores);
        }
    }


    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $expReg = '/^(?=.*[A-Z])(?=.*[!@#$&*?])(?=.*[0-9])(?=.*[a-z]).{8}$/';
        if (!preg_match($expReg, $password)) {
            return false;
        }
        $this->password = $password;

        return true;
    }

    /**
     * Get the value of direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return true;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return true;
    }
}
