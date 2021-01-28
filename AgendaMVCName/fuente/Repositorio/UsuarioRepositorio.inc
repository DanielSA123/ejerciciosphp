<?php

namespace miId\App\fuente\Repositorio;

use miId\App\fuente\Nucleo\ConexionBd;

class UsuarioRepositorio
{
    public function findPass(string $usu, string $pass)
    {
        $sql = "SELECT idUsuario,pass 
        FROM usuario
         WHERE usuario = :usu";
        require_once __DIR__ . '/../nucleo/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":usu", $usu);
            $stm->execute();
            $lectura =  $stm->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            throw $ex;
        } catch (\Exception $ex) {
            throw $ex;
        } finally {
            $stm = null;
            $con = null;
        }
        if (!empty($lectura)) {
            if (password_verify($pass, $lectura[0]['pass'])) {
                $_SESSION['login'] = $lectura[0]['idUsuario'];
                return "";
            } else {
                return $error = "El usuario o contraseña es incorrecto";
            }
        } else {
            return $error = "El usuario o contraseña es incorrecto";
        }
    }

    function registrarUsuario($usu, $pass)
    {
        $sql = "INSERT INTO usuario(usuario,pass) values(:usu,:pass)";
        $guardar = password_hash($pass, PASSWORD_DEFAULT);
        require_once __DIR__ . '/../nucleo/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":usu", $usu);
            $stm->bindValue(":pass", $guardar);
            return $stm->execute();
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
