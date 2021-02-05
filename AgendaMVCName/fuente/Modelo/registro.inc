<?php

namespace miId\App\fuente\Modelo;

class Registro
{
    private string $nombre;
    private string $apellidos;
    private string $calle;
    private string $ciudad;
    private string $provincia;
    private string $cp;
    private string $email;
    private string $telefono;

    public function __construct(array $datos, $nuevo = true)
    {
        if ($nuevo) {
            if ($this->setNombre($datos['nombre'])) {
                $this->nombre = $datos['nombre'];
            } else {
                $error['nombre'] = "Error nombre";
            }
            if ($this->setApellidos($datos['apellidos'])) {
                $this->apellidos = $datos['apellidos'];
            } else {
                $error['apellidos'] = "Error apellido";
            }
            if ($this->setCalle($datos['calle'])) {
                $this->calle = $datos['calle'];
            } else {
                $error['calle'] = "Error calle";
            }
            if ($this->setCiudad($datos['ciudad'])) {
                $this->ciudad = $datos['ciudad'];
            } else {
                $error['ciudad'] = "Error ciudad";
            }
            if ($this->setProvincia($datos['provincia'])) {
                $this->provincia = $datos['provincia'];
            } else {
                $error['provincia'] = "Error provincia";
            }
            if ($this->setCp($datos['cp'])) {
                $this->cp = $datos['cp'];
            } else {
                $error['cp'] = "Error CP";
            }
            if ($this->setEmail($datos['email'])) {
                $this->email = $datos['email'];
            } else {
                $error['email'] = "Error email";
            }
            if ($this->setTelefono($datos['telefono'])) {
                $this->telefono = $datos['telefono'];
            } else {
                $error['telefono'] = "Error telefono";
            }

            if (isset($error)) {
                throw new AmigoException('Error en el registro', $error);
            }
        }
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  bool
     */
    public function setNombre($nombre)
    {
        if (strpos($nombre, "--")) {
            return false;
        }
        $this->nombre = $nombre;
        return true;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */
    public function setApellidos($apellidos)
    {
        if (strpos($apellidos, "--")) {
            return false;
        }
        $this->apellidos = $apellidos;
        return true;
    }

    /**
     * Get the value of calle
     */
    public function getCalle(): string
    {
        return $this->calle;
    }

    /**
     * Set the value of calle
     *
     * @return  self
     */
    public function setCalle($calle)
    {
        if (strpos($calle, "--")) {
            return false;
        }
        $this->calle = $calle;

        return true;
    }

    /**
     * Get the value of ciudad
     */
    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return true;
    }

    /**
     * Get the value of provincia
     */
    public function getProvincia(): string
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return true;
    }

    /**
     * Get the value of cp
     */
    public function getCp(): string
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return true;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {

        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $this->email = $email;

        return true;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $regexp = '/^[679][0-9]{8,8}$/';
        if (!preg_match($regexp, $telefono)) {
            return false;
        }
        $this->telefono = $telefono;

        return true;
    }
}