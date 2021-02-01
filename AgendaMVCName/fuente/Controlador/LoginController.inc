<?php

namespace miId\App\fuente\Controlador;

use Exception;
use miId\App\fuente\Modelo\Usuario;
use miId\App\fuente\Repositorio\UsuarioRepositorio;
use PDOException;

class LoginController
{
    public function iniciarSesion()
    {
        if (isset($_POST['ok'])) {
            // require_once __DIR__ . '/../Repositorio/UsuarioRepositorio.inc';
            $error = (new UsuarioRepositorio())->findPass($_POST['usuario'], $_POST['pass']);
            if (empty($error)) {
                header('Location: index.php');
            } else {
                include __DIR__ . '/../../app/plantillas/login.php';
            }
        } else {
            include __DIR__ . '/../../app/plantillas/login.php';
        }
    }
    public function cerrarSesion()
    {
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
            header('Location: index.php');
        }
    }

    public function registrarUsuario()
    {
        if (isset($_POST['ok'])) {
            $usu = $_POST['usu'];
            $pass = $_POST['pass'];
            $passre = $_POST['passre'];
            require_once __DIR__ . '/../Modelo/usuario.inc';
            $usuario = new Usuario($usu, $pass, $passre);
            if (!$errores = $usuario->getErrores()) {
                // require_once __DIR__ . '/../Repositorio/UsuarioRepositorio.inc';
                try {
                    if ((new UsuarioRepositorio)->registrarUsuario($usu, $pass)) {
                        header('Location: index.php');
                    } else {
                        //errores
                    }
                } catch (PDOException $ex) {
                    echo "Error 1";
                } catch (Exception $ex) {
                    echo "Error 2";
                }
            } else {
                include __DIR__ . '/../../app/plantillas/registrar.php';
            }
        } else {
            include __DIR__ . '/../../app/plantillas/registrar.php';
        }
    }
}
