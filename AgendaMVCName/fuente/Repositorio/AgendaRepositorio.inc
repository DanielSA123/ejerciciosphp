<?php


class AgendaRepositorio
{
    public function findAllAmigos($conId = false): array
    {
        if ($conId) {
            $sql = 'SELECT a.Nombre,Edad,Telefono,p.nombre as Provincia,idAgenda 
            FROM agenda a INNER JOIN provincia p on  a.codProvincia = p.codProvincia';
        } else {
            $sql = 'SELECT a.Nombre,Edad,Telefono,p.nombre as Provincia 
                FROM agenda a INNER JOIN provincia p on  a.codProvincia = p.codProvincia';
        }
        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            $stm = null;
            $con = null;
        }
    }



    public function addAmigo(Amigo $amigo): bool
    {
        $sql = 'INSERT INTO agenda(nombre,edad,telefono,codProvincia)
         SELECT :nombre,:edad,:telefono,codProvincia
         FROM provincia
         WHERE nombre = :provincia';
        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":nombre", $amigo->getNombre());
            $stm->bindValue(":edad", $amigo->getEdad());
            $stm->bindValue(":telefono", $amigo->getTlfno());
            $stm->bindValue(":provincia", $amigo->getCiudad());
            return $stm->execute();
        } catch (PDOException $ex) {
            throw $ex;
            return false;
        } catch (Exception $ex) {
            throw $ex;
            return false;
        } finally {
            $stm = null;
            $con = null;
        }

        return true;
    }

    public function deleteAmigo(int $id)
    {
        $sql = "DELETE agenda
        WHERE idAgenda = $id";

        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            return (bool) $con->exec($sql);
        } catch (PDOException $ex) {
            throw $ex;
            return false;
        } catch (Exception $ex) {
            throw $ex;
            return false;
        } finally {
            $con = null;
        }
    }

    public function findAllByNombreOrProvincia(string $busqueda): array
    {
        $sql = "SELECT a.Nombre,Edad,Telefono,p.nombre as Provincia 
                FROM agenda a INNER JOIN provincia p on  a.codProvincia = p.codProvincia
                WHERE p.nombre LIKE :busca 
                OR a.Nombre LIKE :buscaN";

        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $busqueda = '%' . $busqueda . '%';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":busca", $busqueda);
            $stm->bindValue(":buscaN", $busqueda);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
            return false;
        } catch (Exception $ex) {
            throw $ex;
            return false;
        } finally {
            $stm = null;
            $con = null;
        }
    }
}
