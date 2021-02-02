<?php
// Ejemplo de controlador para página home de la aplicación
class DefaultController
{ public function inicio()
  {
    require __DIR__ . '/../Repositorio/busquedaRepositorio.inc';
    $_SESSION['usuario'] = null;
    $todos = (new BusquedaRepositorio())->inicio();
    //var_dump($todos);
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }

  public function sacarDatos(){
    require __DIR__ . '/../Repositorio/busquedaRepositorio.inc';
    $genero = "";
    $titulo = "";
    $idioma = "";
    $autor = "";
    if (isset($_POST['buscar'])) {
      //var_dump($_POST);
      $genero = $_POST['genero'];
      $titulo = $_POST['titulo'];
      $idioma = $_POST['idioma'];
      $autor = $_POST['autor'];
      //echo "$genero, $titulo, $idioma, $autor";
      $datos = (new BusquedaRepositorio())->buscarDatos($genero, $titulo, $idioma, $autor);
      //var_dump($datos);
    } else{
      return "Rellene las casillas.";
    }
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }

  public function mostrarReserva(){
    require __DIR__ . '/../Repositorio/busquedaRepositorio.inc';
    $_SESSION['idLibro'] = $_POST['idLibro'];
    $idLibro = $_SESSION['idLibro'];
    $librosDisponibles = (new BusquedaRepositorio())->verReservas($idLibro);

    //$_SESSION['idEjemplar'] = $librosDisponibles[0]['id'];
    var_dump($_POST);
    echo "<pre>";
    //var_dump($librosDisponibles);
    echo "</pre>";

    var_dump($_SESSION);
    require __DIR__ . '/../../app/plantillas/datosLibro.php';
  }

  public function hacerReserva(){
    require __DIR__ . '/../Repositorio/busquedaRepositorio.inc';
    $ids = (new BusquedaRepositorio())->idsDeEjemplar($_SESSION['idLibro']);
    $_SESSION['ids'] = $ids;
    require __DIR__ . '/../../app/plantillas/reserva.php';
  }

  public function reserva(){
    require __DIR__ . '/../Repositorio/busquedaRepositorio.inc';
    try {
      if (isset($_POST['enviar'])) {
        $_SESSION['idEjemplar'] = $_POST['idEjemplar'];
        $idEjemplar = $_SESSION['idEjemplar'];
        $idLibro = $_SESSION['idLibro'];
        if (isset($_POST['entrar'])) {
          $usu = $_SESSION['usuario'];
          if ($usu) {
            $idUsuario = $_SESSION['idUsuario'];
            $reserva = (new BusquedaRepositorio())->reservar($idEjemplar, $idUsuario);
          } else {
            $_SESSION['errores']['reserva'] = "Reserva no realizada. Compruebe que ha iniciado sesión y escogido un ejemplar.";
          }
        }else {
          $_SESSION['errores']['reserva'] = "Reserva no realizada. Compruebe que ha iniciado sesión y escogido un ejemplar.";
        }
      }
    } catch (PDOException $ex) {
      die("Usuario y contraseña erroneos: " . $ex->getMessage());
    }

    require __DIR__ . '/../../app/plantillas/reserva.php';
  }
}
