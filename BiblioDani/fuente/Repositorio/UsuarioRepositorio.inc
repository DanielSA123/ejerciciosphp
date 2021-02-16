<?php
class UsuarioRepositorio
{
    public function acceder($usuario, $password)
    {
        $sql = "SELECT idUsuario,nombre,pass,rol
        FROM usuario 
        where nombre = :nombre";

        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":nombre", $usuario);
            $stm->execute();
            $datos = $stm->fetch(PDO::FETCH_ASSOC);
            if ($datos) {
                if (password_verify($password, $datos['pass'])) {
                    $_SESSION['idUsuario'] = $datos['idUsuario'];
                    $_SESSION['usuario'] = $datos['nombre'];
                    $_SESSION['rol'] = $datos['rol'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return false;
            throw $ex;
        } catch (Exception $ex) {
            return false;
            throw $ex;
        } finally {
            unset($stm);
            unset($con);
        }
    }

    public function registrarse($usuario, $direccion, $password)
    {
        $sql = "INSERT INTO usuario(nombre,direccion,pass) 
        VALUES(:nombre,:direccion,:pass)";
        try {
            require_once __DIR__ . '/../../core/conexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":nombre", $usuario);
            $stm->bindValue(":direccion", $direccion);
            $stm->bindValue(":pass", $password);
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
    }
}
