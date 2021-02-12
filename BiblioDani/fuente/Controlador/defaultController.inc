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

  public function reservarEjemplar()
  {
    if (isset($_SESSION['usuario'])) {
      if (isset($_POST['reservar'])) {
        $ejemplar = $_POST['ejemplar'];
        try {
          require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
          if ((new BibliotecaRepositorio())->reservarEjemplar($ejemplar, $_SESSION['idUsuario'])) {
            $_SESSION['reservado'] = "La reserva se ha realizado correctamente";
            header('Location:index.php');
          }
        } catch (PDOException $ex) {
          var_dump($ex);
          //errores PDO
        } catch (Exception $ex) {
          //errores
        }
      }
    } else {
      header('Location: index.php?ctl=acceder');
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

  public function devolverEjemplar()
  {
    if (isset($_POST['devolver'])) {
      $ejemplar = $_POST['ejemplar'];
      $usuario = $_POST['usuario'];
      if ($_SESSION['idUsuario'] == $usuario) {
        try {
          require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
          if ((new BibliotecaRepositorio())->devolverEjemplar($ejemplar)) {
            $_SESSION['devolver'] = "El libro se ha devuelto a la biblioteca";
            header('Location: index.php');
          }
        } catch (PDOException $ex) {
          var_dump($ex);
          //errores PDO
        } catch (Exception $ex) {
          //errores
        }
      }
    }
  }
}