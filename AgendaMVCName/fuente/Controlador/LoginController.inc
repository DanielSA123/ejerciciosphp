<?php

namespace miId\App\fuente\Controlador;

use AmigoException;
use Exception;
use miId\App\fuente\Modelo\Usuario;
use miId\App\fuente\Modelo\Registro;
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
            unset($_SESSION['infSesion']);

            header('Location: index.php');
        }
    }

    public function registrarUsuario()
    {
        if (isset($_POST['ok'])) {
            $usu = $_POST['usu'];
            $pass = $_POST['pass'];
            $passre = $_POST['passre'];
            $datos = $_POST['datos'];
            $usuarioRepo = new UsuarioRepositorio();
            try {
                $registro = new Registro($datos);
            } catch (AmigoException $ex) {
                $errores = $ex->getErrores();
            }
            if (!isset($errores)) {
                $usuario = new Usuario($usu, $pass, $passre);

                if (!$errores = $usuario->getErrores()) {
                    // require_once __DIR__ . '/../Repositorio/UsuarioRepositorio.inc';
                    try {

                        $_SESSION["infSesion"] = $usuarioRepo->addInfUsuario($registro, $usuario);
                        $_SESSION['login'] = true;
                        header('Location: index.php');
                    } catch (PDOException $ex) {
                        var_dump($ex->getMessage());
                    } catch (Exception $ex) {
                        echo "Error 2";
                    }
                } else {
                    include __DIR__ . '/../../app/plantillas/registrar.php';
                }
            } else {
                include __DIR__ . '/../../app/plantillas/registrar.php';
            }
        } else {
            include __DIR__ . '/../../app/plantillas/registrar.php';
        }
    }
}