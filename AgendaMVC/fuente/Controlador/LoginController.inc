<?php
class LoginController
{
    public function iniciarSesion()
    {
        if (isset($_POST['ok'])) {
            require_once __DIR__ . '/../Repositorio/UsuarioRepositorio.inc';
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
}