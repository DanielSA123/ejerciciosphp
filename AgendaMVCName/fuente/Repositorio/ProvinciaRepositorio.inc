<?php

namespace miId\App\fuente\Repositorio;

use miId\App\fuente\Nucleo;

class ProvinciaRepositorio
{
    public function findAllProvincias(): array
    {
        $sql = "SELECT nombre
        FROM provincia";

        require_once __DIR__ . '/../nucleo/conexionBd.inc';
        try {
            $con = (new Nucleo\ConexionBd())->getConexion();
            $stm = $con->query($sql);
            return $stm->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }
}