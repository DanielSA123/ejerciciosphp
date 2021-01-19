<?php ob_start() ?>

<h1>Inicio de sesion</h1>

<form action="" method="post">
    <fieldset>
        <legend>Login</legend>
        <label>Usuario: <input type="text" name="usuario" value=""></label>
        <br><br>
        <label>Contraseña: <input type="password" name="pass" value=""></label>
        <br><br>
        <input type="submit" value="Iniciar Sesion" name="ok">
    </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>