<?php ob_start();
?>
<h1>Registrarse</h1>
<form action="" method="post">
    <fieldset>
        <legend>Nuevo Usariuo</legend>
        <label>Usuario: <input type="text" name="usuario" value=""></label>
        <p class="error"><?= isset($errores['usu']) ? $errores['usu'] : "" ?></p>
        <br><br>
        <label>Contraseña: <input type="password" name="pass" value=""></label>
        <p class="error"><?= isset($errores['pass']) ? $errores['pass'] : "" ?></p>
        <br><br>
        <label>Repita la contraseña: <input type="password" name="passre" value=""></label>
        <br><br>
        <input type="submit" value="Registrarse" name="ok">
    </fieldset>
</form>

<?php
$contenido = ob_get_clean() ?>

<?php include 'base.php' ?>