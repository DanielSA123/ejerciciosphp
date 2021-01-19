<?php
class AmigoException extends Exception
{
  private array $errores;

  public function __construct(string $mensaje, array $errores)
  {
    parent::__construct($mensaje);
    $this->errores = $errores;
  }

  public function getErrores(): array
  {
    return $this->errores;
  }
}
