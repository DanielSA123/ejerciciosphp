<?php


class ProvinciaRepositorio
{
    public function findAllProvincias(): array
    {
        $sql = "SELECT nombre
        FROM provincia";

        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->query($sql);
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
