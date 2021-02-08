<?php

namespace miId\App\fuente\Repositorio;

use miId\App\fuente\Nucleo\ConexionBd;
use miId\App\fuente\Modelo\Registro;
use miId\App\fuente\Modelo\Usuario;

class UsuarioRepositorio
{
    public function findPass(string $usu, string $pass)
    {
        $sql = "SELECT u.idUsuario,pass, r.nombre
        FROM usuario u INNER JOIN registro r on r.idUsuario = u.idUsuario
         WHERE u.usuario = :usu";
        // require_once __DIR__ . '/../nucleo/conexionBd.inc';
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

                $_SESSION['login'] = true;
                $_SESSION['usuario'] = $lectura[0]['idUsuario'];
                $_SESSION['nombreUsuario'] = $lectura[0]['nombre'];
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
        $sql = "INSERT INTO usuario(usuario,pass,rol) values(:usu,:pass,'usuarios')";
        $guardar = password_hash($pass, PASSWORD_DEFAULT);
        // require_once __DIR__ . '/../nucleo/conexionBd.inc';
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



    function addInfUsuario(Registro $obj, Usuario $usu)
    {
        $sql = 'exec addUsuario @nombre = :nom ,
        @apellidos = :ape ,
        @calle =:calle ,
        @ciudad =:ciudad ,
        @provincia=:provincia ,
        @cp=:cp ,
        @email=:email ,
        @telefono=:tel ,
        @usuario=:usu ,
        @pass=:pass ;
        ';

        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            var_dump($obj);
            var_dump($usu);
            $stm->bindValue(":nom", $obj->getNombre());
            $stm->bindValue(":ape", $obj->getApellidos());
            $stm->bindValue(":calle", $obj->getCalle());
            $stm->bindValue(":ciudad", $obj->getCiudad());
            $stm->bindValue(":provincia", $obj->getProvincia());
            $stm->bindValue(":cp", $obj->getCp());
            $stm->bindValue(":email", $obj->getEmail());
            $stm->bindValue(":tel", $obj->getTelefono());
            $stm->bindValue(":usu", $usu->getUsu());
            $stm->bindValue(":pass", $usu->getPass());

            $stm->execute();
            // $stm->nextRowset();
            return $stm->fetch(\PDO::FETCH_ASSOC);
            return true;
        } catch (\PDOException $ex) {
            throw $ex;
            return false;
        } catch (\Exception $ex) {
            throw $ex;
            return false;
        } finally {
            unset($con);
        }
    }

    public function findNomIdUsu(string $usuario)
    {
        $sql = 'SELECT u.idUsuario ,r.nombre
                FROM usuario u INNER JOIN registro r
                ON u.idUsuario = r.idUsuario
                WHERE u.usuario = :usu';
        try {
            $con = (new ConexionBd())->getConexion();
            $stm = $con->prepare($sql);
            $stm->bindValue(":usu", $usuario);
            $stm->execute();
            return $stm->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $th) {
            throw $th;
        } catch (\Exception $th) {
            throw $th;
        }
    }
}