<?php
class Libros
{
  public function getLibro(): array
  {
    $sql = "SELECT titulo, autor, nombre as genero, idioma, resumen
              FROM libro as l INNER JOIN genero as g ON l.idGenero = g.idGenero
             WHERE l.idLibro = :id";
    require_once __DIR__ . "/../core/conexionBd.inc";
    $id = rand(1, 20);
    try {
      $con = (new ConexionBd())->getConexion();
      $snt = $con->prepare($sql);
      $snt->bindValue(':id', $id, PDO::PARAM_INT);
      $snt->execute();
      if ($fila = $snt->fetch(PDO::FETCH_ASSOC)) {
        return $fila;
      } else {
        return [];
      }
    } catch (PDOException $ex) {
      $ex->getMessage();
    } finally {
      $snt = null;
      $con = null;
    }
  }
}
