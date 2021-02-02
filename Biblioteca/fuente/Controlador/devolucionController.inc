<?php
// Ejemplo de controlador para página home de la aplicación
class DevolucionController
{ public function devolver()
    {
      require __DIR__ . '/../Repositorio/devolucionRepositorio.inc';

        $_SESSION['ejemplarDevuelto'] = $_POST['ejemplarDevuelto'];
        $ejemplarDevuelto = $_SESSION['ejemplarDevuelto'];
        $idUsuario = $_SESSION['idUsuario'];
        $dev = (new DevolucionRepositorio())->devolucionLibro($ejemplarDevuelto, $idUsuario);
        var_dump($dev);
      echo "<pre>";
      var_dump($_SESSION);
      echo "</pre>";
      require __DIR__ . '/../../app/plantillas/devolucion.php';
    }

  public function listaReservas(){
    require __DIR__."/../Repositorio/devolucionRepositorio.inc";
    $idUsuario = $_SESSION['idUsuario'];
    $lista = (new DevolucionRepositorio())->librosReservados($idUsuario);
    echo "<pre>";
  //  var_dump($lista);
    //var_dump($_SESSION);
    echo "</pre>";

    require __DIR__ . '/../../app/plantillas/devolucion.php';
  }
}
