<?php
// Ejemplo de controlador para página home de la aplicación
class DefaultController
{
  public function inicio()
  {
    try {
      require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
      $libros = (new BibliotecaRepositorio())->findAllLibros();
    } catch (PDOException $ex) {
      var_dump($ex);
      //errores PDO
    } catch (Exception $ex) {
      //errores
    }
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }
}