<?php ob_start() ?>
<div id="formSignup">
    <form action="" method="POST">
        <fieldset>
            <legend>Regístrate</legend>
            <label>Nombre: <input type="text" name="nombre"></label><br>
            <label>Direccion: <input type="text" name="direccion"></label><br>
            <label>Contraseña: <input type="password" name="password"></label><br>
            <input type="submit" name="registrarse" value="Registrarme">
        </fieldset>
    </form>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>