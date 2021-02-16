<?php
class usuarioController
{
    public function acceder()
    {
        if (isset($_POST['login'])) {
            $usuario = $_POST['usuario'];
            $pass = $_POST['password'];
            try {
                require_once __DIR__ . '../../Repositorio/UsuarioRepositorio.inc';

                $acceso = (new UsuarioRepositorio())->acceder($usuario, $pass);

                if ($acceso) {
                    header("Location:index.php");
                } else {
                    $errores = "Usuario o contraseña incorrectos";
                    include __DIR__ . '/../../app/plantillas/login.php';
                }
            } catch (PDOException $th) {
                die(var_dump($th));
            } catch (Exception $th) {
                die(var_dump($th));
            }
        } else {
            include __DIR__ . '/../../app/plantillas/login.php';
        }
    }

    public function registrarse()
    {
        if (isset($_POST['registrarse'])) {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $password = $_POST['password'];
            try {
                require_once __DIR__ . '../../Modelo/usuario.inc';
                $usuario = new Usuario($nombre, $direccion, $password);
                try {
                    require_once __DIR__ . '../../Repositorio/UsuarioRepositorio.inc';
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    if ((new UsuarioRepositorio())->registrarse($nombre, $direccion, $hash)) {
                        header("Location:index.php");
                    }
                } catch (PDOException $th) {
                    var_dump($th);
                } catch (Exception $th) {
                    var_dump($th);
                }
            } catch (UsuarioException $ex) {
                $errores = $ex->getErrores();
                include __DIR__ . '/../../app/plantillas/registrarse.php';
            }
        } else {
            include __DIR__ . '/../../app/plantillas/registrarse.php';
        }
    }

    public function salir()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
}
