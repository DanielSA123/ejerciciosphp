<?php
// Ejemplo de controlador para página home de la aplicación
class SesionController
{ public function sesionDestroy()
    {
      require __DIR__ . '/../Repositorio/busquedaRepositorio.inc';
      session_destroy();
      $_SESSION['usuario'] = null;
      $_SESSION['idUsuario'] = null;
      //var_dump($todos);
      //$todos = (new BusquedaRepositorio())->inicio();
      require __DIR__ . '/../../app/plantillas/reserva.php';
    }

  public function iniciarSesion(){
    require __DIR__ . '/../Repositorio/sesionRepositorio.inc';
      try {
        $idUsuario = isset($_POST['idUsuario'])?$_POST['idUsuario']:"";
        if (!empty($idUsuario)) {
          $_SESSION['idUsuario'] = $idUsuario;
          $usu = (new SesionRepositorio())->inicioSesion($idUsuario);
          if (!empty($usu)) {
            $_SESSION['usuario'] = $usu;
            var_dump($_SESSION['usuario']);
            $_SESSION['errores'] = "";
          }
        } else{
          $_SESSION['errores']['usu'] = "Usuario y contraseña no coinciden.";
        }
      } catch (PDOException $ex) {
        die("Usuario y contraseña erroneos: " . $ex->getMessage());
      }
    require __DIR__ . '/../../app/plantillas/reserva.php';
  }

  public function formRegistro(){
    require __DIR__ . '/../Repositorio/sesionRepositorio.inc';

    require __DIR__ . '/../../app/plantillas/registro.php';
  }

  public function registro(){
    require __DIR__."/../Repositorio/sesionRepositorio.inc";
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    if (!empty($nombre) && !empty($direccion)) {
      $reg = (new SesionRepositorio())->addUsuario($nombre, $direccion);
    } else {
      $_SESSION['errores']['registro'] = "No se pudo realizar el registro. Compruebe que tiene todos los campos completados.";
    }

    require __DIR__ . '/../../app/plantillas/registro.php';
  }
}
