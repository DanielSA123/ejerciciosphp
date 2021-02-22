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



  public function misLibros()
  {
    try {
      require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
      $misLibros = (new BibliotecaRepositorio())->findLibrosByUsuario($_SESSION['idUsuario']);
      include __DIR__ . '../../../app/plantillas/verPrestados.php';
    } catch (PDOException $ex) {
      var_dump($ex);
      //errores PDO
    } catch (Exception $ex) {
      //errores
    }
  }


  public function verGenero()
  {
    if (isset($_GET['nGenero'])) {
      $nombre = $_GET['nGenero'];
      try {
        require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
        $genero = (new BibliotecaRepositorio())->findGenerobyNombre($nombre);
        if (!$genero) {
          $vacio = "No se ha encontrado el genero que busca";
        }
        include __DIR__ . '../../../app/plantillas/verGenero.php';
      } catch (PDOException $ex) {
        var_dump($ex);
        //errores PDO
      } catch (Exception $ex) {
        //errores
      }
    }
  }
}
