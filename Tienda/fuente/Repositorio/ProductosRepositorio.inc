<?php
class ProductosRepositorio
{
    public function findProductoById(int $id): array
    {
        $sql = "SELECT id,nombre,nombre_corto,descripcion,pvp,familia
         FROM productos 
         WHERE id=:id";

        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute([":id" => $id]);
            return $stm->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            throw $ex;
        } finally {
            $stm = null;
            $con = null;
        }
    }
    public function findAllProductos(): array
    {
        $sql = "SELECT id,nombre,pvp
         FROM productos
         ORDER BY nombre";

        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            throw $ex;
        } finally {
            $stm = null;
            $con = null;
        }
    }
}
