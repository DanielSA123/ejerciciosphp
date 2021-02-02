<?php
class BusquedaRepositorio {
  public function inicio(){
    $sql = "SELECT l.id, l.titulo, g.nombre as genero, l.autor, l.idioma, l.resumen, g.descripcion
            from Libro as l inner join Genero as g
            on l.idGenero = g.id";
    try {
      require __DIR__. "/../../core/conexionBd.inc";
      $con = (new ConexionBd())->getConexion();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
      throw $ex;
    } finally {
      $stm = null;
      $con = null;
    }
  }

  public function buscarDatos(string $genero, string $titulo, string $idioma, string $autor){
    //no funciona
    /*
    select * from Genero
    select * from Libro
    select * from Ejemplar
    select * from Usuario

    declare @texto nvarchar (50);
    set @texto = 'Novela';
    select @texto;
    declare @tipo nvarchar (50);
    set @tipo = 'nombre';
    select @tipo;
    select l.titulo, g.nombre as genero, l.autor, l.idioma, l.resumen
    from Libro as l inner join Genero as g
    on l.idGenero = g.id
    where nombre = @texto
    */
    $sql = "SELECT l.id, l.titulo, g.nombre as genero, l.autor, l.idioma, l.resumen, g.descripcion
            from Libro as l inner join Genero as g
            on l.idGenero = g.id
            where nombre LIKE '%'+:genero+'%' AND titulo LIKE '%'+:titulo+'%' AND idioma LIKE '%'+:idioma+'%' AND autor LIKE '%'+:autor+'%'";


    /* EN SQL FUNCIONA

    declare @autor nvarchar (50);
    set @autor = 'Jorge';
    declare @genero nvarchar (50);
    set @genero = 'Novela';
    declare @titulo nvarchar (50);
    set @titulo = null;
    declare @idioma nvarchar (50);
    set @idioma = '';

    $sql = "SELECT l.id, l.titulo, g.nombre as genero, l.autor, l.idioma, l.resumen, g.descripcion
            from Libro as l inner join Genero as g
            on l.idGenero = g.id
            where nombre LIKE '%$genero%' AND titulo LIKE '%$titulo%' AND idioma LIKE '%$idioma%' AND autor LIKE '%$autor%'";

    SELECT l.titulo, g.nombre as genero, l.autor, l.idioma, l.resumen, g.descripcion
    from Libro as l inner join Genero as g
    on l.idGenero = g.id
    where nombre LIKE '%'+@genero+'%' or titulo LIKE '%'+@titulo+'%' or idioma LIKE '%'+@idioma+'%' or autor LIKE '%'+@autor+'%'
    */
    try {
      require __DIR__. "/../../core/conexionBd.inc";
      $con = (new ConexionBd())->getConexion();
      $stm = $con->prepare($sql);
      $stm->bindValue(':genero', $genero);
      $stm->bindValue(':titulo', $titulo);
      $stm->bindValue(':idioma', $idioma);
      $stm->bindValue(':autor', $autor);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
      throw $ex;
    } finally {
      $stm = null;
      $con = null;
    }
  }

  public function verReservas(int $idLibro){//muestra los datos y si hay libros disponibles para reservar
    $sql = "SELECT l.titulo, l.autor, g.nombre as genero, l.idioma, l.resumen, e.idLibro, e.idUsuario
            from Genero as g inner join Libro as l
            on l.idGenero = g.id
            inner join Ejemplar as e
            on l.id = e.idLibro
            where e.idLibro = $idLibro";
    try {
      require __DIR__. "/../../core/conexionBd.inc";
      $con = (new ConexionBd())->getConexion();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
      throw $ex;
    } finally {
      $stm = null;
      $con = null;
    }
  }

  public function idsDeEjemplar(int $idLibro){//recoge los id de los libros disponibles para reservar
    $sql = "SELECT id from Ejemplar where idLibro = $idLibro and idUsuario is NULL";
    try {
      require __DIR__. "/../../core/conexionBd.inc";
      $con = (new ConexionBd())->getConexion();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
      throw $ex;
      return false;
    } finally {
      $stm = null;
      $con = null;
    }
  }

  /*public function inicioSesion(int $idUsuario){
    $sql = "SELECT nombre from usuario where id = $idUsuario";
    try {
      require __DIR__. "/../../core/conexionBd.inc";
      $con = (new ConexionBd())->getConexion();
      $stm = $con->prepare($sql);
      $stm->execute();
      $usu = $stm->fetch(PDO::FETCH_ASSOC);
      /*if ($stm) {
        $_SESSION['nombreUsuario'] = $stm['nombre'];
      }*/
      /*return $usu;
    } catch (PDOException $ex) {
      return false;
      throw $ex;
    } finally {
      $con = null;
      $stm = null;
    }
  }*/

  public function reservar(int $idEjemplar, int $idUsuario):bool{
    $sql = "UPDATE Ejemplar SET idUsuario = $idUsuario WHERE id = $idEjemplar";
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
