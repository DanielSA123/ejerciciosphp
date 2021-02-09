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
}
