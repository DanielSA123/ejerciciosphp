<?php
class Libros
{ public function getLibro():array
  { $sql="SELECT titulo, autor, nombre as genero, idioma, resumen
            FROM Libro as l INNER JOIN Genero as g ON l.idGenero = g.id
           WHERE l.id = :id";
    require_once __DIR__ . "/../core/conexionBd.inc";
    $id=rand(1,20);
    try
    { $con = (new ConexionBd())->getConexion();
      $snt = $con->prepare($sql);
      $snt->bindValue(':id', $id, PDO::PARAM_INT);
      $snt->execute();
      if($fila = $snt->fetch(PDO::FETCH_ASSOC))
      { return $fila;
      }else
      { return [];
      }
    }catch(PDOException $ex)
    { throw $ex;
    }finally
    { $snt = null;
      $con = null;
    }
  }
}
