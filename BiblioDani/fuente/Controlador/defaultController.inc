<?php
// Ejemplo de controlador para página home de la aplicación
class DefaultController
{
  public function inicio()
  {
    try {
      require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
      $repo = new BibliotecaRepositorio();
      $generos = $repo->findAllGeneros();
      $idiomas = $repo->findIdiomas();
      $libros = $repo->findAllLibros();
    } catch (PDOException $ex) {
      var_dump($ex);
      //errores PDO
    } catch (Exception $ex) {
      //errores
    }
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }

  public function buscarLibro()
  {
    if (isset($_POST["buscar"])) {
      $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
      $autor = isset($_POST["autor"]) ? $_POST["autor"] : "";
      $genero = $_POST["genero"];
      $idioma = $_POST["idioma"];
      try {
        require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
        $libros = (new BibliotecaRepositorio())->findLibros($titulo, $autor, $genero, $idioma);
      } catch (PDOException $ex) {
        var_dump($ex);
        //errores PDO
      } catch (Exception $ex) {
        //errores
      }
      require __DIR__ . '/../../app/plantillas/buscarLibro.php';
    } else {
      header("Location : index.php");
    }
  }
}