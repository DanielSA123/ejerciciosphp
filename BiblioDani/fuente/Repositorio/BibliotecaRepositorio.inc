<?php
class BibliotecaRepositorio
{
    public function findAllLibros()
    {

        $sql = "SELECT idLibro,titulo,autor,g.nombre,idioma,resumen
        FROM libro l INNER JOIN genero g on 
        l.idGenero = g.idGenero";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }

    public function findLibros($titulo, $autor, $genero, $idioma)
    {
        $sql = " SELECT idLibro,titulo,autor,g.nombre,idioma,resumen
        FROM libro l INNER JOIN genero g on 
        l.idGenero = g.idGenero
        WHERE 1=1";
        if (!empty($titulo))
            $sql = $sql . ' AND titulo LIKE \'%' . $titulo . '%\'';
        if (!empty($autor))
            $sql = $sql . ' AND autor LIKE \'%' . $autor . '%\'';
        if (!empty($genero))
            $sql = $sql .  ' AND g.nombre LIKE \'%' . $genero . '%\'';
        if (!empty($idioma))
            $sql = $sql . ' AND idioma LIKE \'%' . $idioma . '%\'';


        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }

    public function findLibrosByUsuario($idUsuario)
    {
        $sql = "SELECT idEjemplar,titulo,idUsuario
                FROM ejemplar e INNER JOIN libro l
                ON e.idLibro = l.idLibro
                WHERE idUsuario = :idUsuario";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":idUsuario", $idUsuario);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }

    public function findIdiomas()
    {
        $sql = "SELECT DISTINCT idioma
        FROM libro";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }

    public function findEjemplaresByIdLibro($idLibro)
    {
        $sql = "SELECT idEjemplar,idLibro,idUsuario
        FROM ejemplar 
        WHERE idLibro = :idLibro
        AND idUsuario IS NULL";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":idLibro", $idLibro);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }
    public function findAllGeneros()
    {
        $sql = "SELECT nombre FROM genero";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }
    public function findGenerobyNombre($nombre)
    {
        $sql = "SELECT nombre,descripcion 
        FROM genero
        WHERE nombre = :nombre";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":nombre", $nombre);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }

    public function addReserva($idEjemplar, $idUsuario)
    {
        $sql = 'INSERT INTO reservas(idEjemplar,idUsuario)
        values(:idEjemplar,:idUsuario)';
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":idUsuario", $idUsuario);
            $stm->bindValue(":idEjemplar", $idEjemplar);
            $stm->execute();
            return true;
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
        return false;
    }

    public function prestarEjemplar($idEjemplar, $idUsuario, $idReserva)
    {
        $sql = "UPDATE ejemplar 
                SET idUsuario = :idUsuario
                WHERE idEjemplar = :idEjemplar";
        $sql2 = "DELETE reservas WHERE idReserva = :idReserva";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":idUsuario", $idUsuario);
            $stm->bindValue(":idEjemplar", $idEjemplar);
            $stm->execute();
            $stm = $con->prepare($sql2);
            $stm->bindValue(":idReserva", $idReserva);
            $stm->execute();
            return true;
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
        return false;
    }

    public function devolverEjemplar($idEjemplar)
    {
        $sql = "UPDATE ejemplar
        SET idUsuario = NULL
        WHERE idEjemplar = :idEjemplar";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":idEjemplar", $idEjemplar);
            $stm->execute();
            return true;
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
        return false;
    }

    public function getReservas()
    {
        $sql = 'SELECT idReserva,r.idEjemplar,titulo,nombre,r.idUsuario
            FROM reservas r 
            INNER JOIN ejemplar e on e.idEjemplar = r.idEjemplar 
            INNER JOIN libro l on e.idLibro = l.idLibro
            INNER JOIN usuario u on u.idUsuario = r.idUsuario';
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
        return false;
    }

    public function getPrestados()
    {
        $sql = "SELECT idEjemplar,titulo,nombre
        FROM ejemplar e 
        INNER JOIN libro l ON e.idLibro = l.idLibro
        INNER JOIN usuario u on u.idUsuario = e.idUsuario";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }
}
