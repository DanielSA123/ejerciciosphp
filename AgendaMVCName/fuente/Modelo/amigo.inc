<?php

namespace miId\App\fuente\Modelo;

class Amigo
{
  private string  $ciudad;
  private string $nombre;
  private int $edad;
  private string $tlfno;

  public function __construct(array $datos, bool $nuevo = true)
  {
    if ($nuevo) {
      if (!empty($error = $this->setCiudad(htmlspecialchars(trim($datos['ciudad']))))) {
        $errores['ciudad'] = $error;
      }
      if (!empty($error = $this->setNombre(htmlspecialchars(trim($datos['nombre']))))) {
        $errores['nombre'] = $error;
      }
      if (!empty($error = $this->setEdad(htmlspecialchars(trim($datos['edad']))))) {
        $errores['edad'] = $error;
      }
      if (!empty($error = $this->setTlfno(htmlspecialchars(trim($datos['tlfno']))))) {
        $errores['tlfno'] = $error;
      }
      if (isset($errores)) {
        include 'AmigoException.inc';
        throw new AmigoException('Amigo con errores', $errores);
      }
    }
  }

  public function setCiudad(string $ciudad): string
  {
    $this->ciudad = $ciudad;
    return '';
  }
  public function setNombre(string $nombre): string
  {
    if (empty($nombre)) {
      return 'El campo Nombre es obligatorio';
    }
    $expReg = '/^[A-ZÑ][a-zñáéíóú]{0,15}[aeiouáéíóúnszlrd]( [A-ZÑ][a-zñáéíóú]{0,15}[aeiouáéíóúnszlrd])*$/';
    if (!preg_match($expReg, $nombre)) {
      return 'Nombre no es correcto';
    }
    $this->nombre = $nombre;
    return '';
  }
  public function setEdad(string $edad): string
  {
    if (empty($edad)) {
      return 'El campo Edad es obligatorio';
    }
    $expReg = '/^(1[89])|([2-9][0-9])$/';
    if (!preg_match($expReg, $edad)) {
      return 'Edad no es correcto';
    }
    $ed = intval($edad);
    if (($ed) > 45) {
      return 'Ese amigo es muy mayor';
    }
    $this->edad = $ed;
    return '';
  }
  public function setTlfno(string $tlfno): string
  {
    if (empty($tlfno)) {
      return 'El campo Teléfono es obligatorio';
    }
    $expReg = '/^[679][0-9]{8,8}$/';
    if (!preg_match($expReg, $tlfno)) {
      return 'Teléfono no es correcto';
    }
    $this->tlfno = $tlfno;
    return '';
  }

  public function getCiudad(): string
  {
    return $this->ciudad;
  }
  public function getNombre(): string
  {
    return $this->nombre;
  }
  public function getEdad(): int
  {
    return $this->edad;
  }
  public function getTlfno(): string
  {
    return $this->tlfno;
  }
}
