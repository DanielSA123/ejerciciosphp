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
}