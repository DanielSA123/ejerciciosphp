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
                die(var_dump("asdafsadfas"));
                $acceso = (new UsuarioRepositorio())->acceder($usuario, $pass);

                if ($acceso) {
                    die(var_dump("aaa"));
                    // header("Location:index.php");
                } else {
                    $errores = "Usuario o contraseña incorrectos";
                    include __DIR__ . '/../../app/plantillas/login.php';
                }
            } catch (PDOException $th) {
                die(var_dump($th));
            } catch (Exception $th) {
                die(var_dump($th));
            }
        }
        include __DIR__ . '/../../app/plantillas/login.php';
    }

    public function registrarse()
    {
        if (isset($_POST['registrarse'])) {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $password = $_POST['password'];
            try {
                $usuario = new Usuario($nombre, $direccion, $password);
                try {
                    require_once __DIR__ . '../../Repositorio/UsuarioRepositorio.inc';
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    if ((new UsuarioRepositorio())->registrarse($usuario, $direccion, $hash)) {
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
}
