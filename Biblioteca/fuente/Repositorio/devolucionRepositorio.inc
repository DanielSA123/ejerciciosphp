<?php
class DevolucionRepositorio {
    public function devolucionLibro(int $idEjemplar, int $idUsuario):bool{
    $sql = "UPDATE Ejemplar set idUsuario = null where id = $idEjemplar and idUsuario = $idUsuario";
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

  public function librosReservados(int $idUsuario){
    $sql = "SELECT id from Ejemplar where idUsuario = $idUsuario";
    try {
      require __DIR__ . "/../../core/conexionBd.inc";
      $con = (new ConexionBd())->getConexion();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
      throw $ex;
      return false;
    } finally {
      $con = null;
      $stm = null;
    }
  }
}
