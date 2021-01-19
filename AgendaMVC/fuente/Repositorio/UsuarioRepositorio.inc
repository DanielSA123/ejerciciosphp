<?php
class UsuarioRepositorio
{
    public function findPass(string $usu, string $pass)
    {
        $sql = "SELECT pass 
        FROM usuario
         WHERE usuario = :usu";
        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":usu", $usu);
            $stm->execute();
            $lectura =  $stm->fetchAll(PDO::FETCH_ASSOC);
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

        if (password_verify($pass, $lectura)) {
            $_SESSION['login'] = true;
        } else {
            /* error */
        }
    }
}