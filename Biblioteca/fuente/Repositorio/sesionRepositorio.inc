<?php
class SesionRepositorio {
    public function inicioSesion(int $idUsuario){
    $sql = "SELECT nombre from usuario where id = $idUsuario";
    try {
      require __DIR__. "/../../core/conexionBd.inc";
      $con = (new ConexionBd())->getConexion();
      $stm = $con->prepare($sql);
      $stm->execute();
      $usu = $stm->fetch(PDO::FETCH_ASSOC);
      return $usu;
    } catch (PDOException $ex) {
      throw $ex;
      return false;
    } finally {
      $con = null;
      $stm = null;
    }
  }

  public function addUsuario(string $nombre, string $direccion):bool{
    $sql = "INSERT INTO Usuario(tipo, nombre, direccion) VALUES('usuario', '$nombre', '$direccion')";
    try {
      require __DIR__. "/../../core/conexionBd.inc";
      $con = (new ConexionBd())->getConexion();
      $stm = $con->prepare($sql);
      $stm->execute();
      return true;
    } catch (PDOException $ex) {
      throw $ex;
      return false;
    } finally {
      $con = null;
      $stm = null;
    }
  }
}
