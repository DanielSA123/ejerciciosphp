<?php ob_start() ?>
<div id="formLogin">
    <form action="index.php?ctl=acceder">
        <fieldset>
            <legend>Iniciar Sesion</legend>
            <?= isset($errores) ? '<p class="error">' . $errores . '</p>' : "" ?>
            <label>Usuario: <input type="text" name="usuario"></label>
            <label>Contraseña: <input type="password" name="password"></label>
            <input type="submit" name="login" value="Ingresar">
        </fieldset>
    </form>
    <a href="index.php?ctl=registrarse">Quiero registrarme</a>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>