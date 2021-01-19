<?php
class Pizza
{
    private $tipo;
    private $tamanio;
    private $masa;
    private $extras;
    private $cantidad;
    private $precio;
    private $precioTipo = ["Barbacoa" => 5,
        "Margarita" => 6,
        "4 Estaciones" => 5.5,
        "4 Quesos" => 6.5,
        "Carbonara" => 6,
        "Mediterranea" => 6,
        "Romana" => 6.5];
    private $precioTamanio = ["Normal" => 2,
        "Grande" => 3,
        "Familiar" => 5];
    private $precioMasa = ["normal" => 2,
        "fina" => 1.5];
    private $precioExtra = ["queso" => 2,
        "pimiento" => 2,
        "cebolla" => 1.5,
        "jamon" => 3,
        "pollo" => 3];

    public function __construct()
    {
        $tipo = "";
        $tamanio = "";
        $masa = "";
        $extras = [];
        $cantidad = "";
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    public function getTamanio()
    {
        return $this->tamanio;
    }
    public function getMasa()
    {
        return $this->masa;
    }
    public function getExtras()
    {
        return $this->extras;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function setTamanio($tamanio)
    {
        $this->tamanio = $tamanio;
    }
    public function setMasa($masa)
    {
        if (empty($masa)) {
            throw new Exception("El campo masa es obligatorio");
        } else {
            $this->masa = $masa;
        }

    }
    public function setExtras($extras)
    {
        $this->extras = $extras;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function precio()
    {
        $this->precio = $this->precioTipo[$this->tipo];
        $this->precio += $this->precioTamanio[$this->tamanio];
        $this->precio += $this->precioMasa[$this->masa];
        foreach ($this->extras as $value) {
            $this->precio += $this->precioExtra[$value];
        }
        return $this->precio * $this->cantidad;
    }
}