<?php
class UsuarioController
{
    public function iniciarSesion()
    {


        if (isset($_POST['ok'])) {
            $nombre = $_POST['usu'];
            $pass = $_POST['pass'];
            require_once __DIR__ . '/../Repositorio/UsuarioRepositorio.inc';
            $error = (new UsuarioRepositorio())->findPass($nombre, $pass);
            if (empty($error)) {
                $_SESSION['nombre'] = $nombre;
                header('Location: index.php?ctl=listaDeProductos');
            }
        }
        include __DIR__ . '/../../app/plantillas/iniciaSesion.php';
    }


    public function cerrarSesion()
    {
        unset($_SESSION['nombre']);
        unset($_SESSION['cesta']);
        session_unset();
        //session_abort();
        session_destroy();
        header("Location: index.php");
    }
}