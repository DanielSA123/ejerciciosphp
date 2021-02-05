<?php ob_start();
?>
<h1>Registrarse</h1>
<form action="" method="post">
    <!-- TODO: Agregar campos: Nombre,Apellidos,Calle,Ciudad,Provincia,CP,Email,Telefono  -->
    <fieldset>
        <legend>Datos personales</legend>
        <div class="row">
            <label>Nombre: <input type="text" name="datos[nombre]" required placeholder="Tu nombre"></label>
            <?= isset($errores['nombre']) ? '<p class="error">' . $errores['nombre'] . '</p><br>' : ''; ?>
            <label>Apellidos: <input type="text" name="datos[apellidos]" required placeholder="Tus apellidos"></label>
            <?= isset($errores['apellidos']) ? '<p class="error">' . $errores['apellidos'] . '</p><br>' : ''; ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Direccion</legend>
        <div class="row">
            <label>Calle: <input type="text" name="datos[calle]" required placeholder="calle,nº,piso"></label>
            <?= isset($errores['calle']) ? '<p class="error">' . $errores['calle'] . '</p><br>' : ''; ?>
            <label>Ciudad: <input type="text" name="datos[ciudad]" required placeholder="Ciudad"></label>
            <?= isset($errores['ciudad']) ? '<p class="error">' . $errores['ciudad'] . '</p><br>' : ''; ?>
        </div>
        <div class="row">
            <label>Provincia: <input type="text" name="datos[provincia]" required placeholder="Provincia"></label>
            <?= isset($errores['provincia']) ? '<p class="error">' . $errores['provincia'] . '</p><br>' : ''; ?>
            <label>CP: <input type="text" name="datos[cp]" required placeholder="####"></label>
            <?= isset($errores['cp']) ? '<p class="error">' . $errores['cp'] . '</p><br>' : ''; ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Datos de contacto</legend>
        <div class="row">
            <label>Email: <input type="text" name="datos[email]" required placeholder="Tu email"></label>
            <?= isset($errores['email']) ? '<p class="error">' . $errores['email'] . '</p><br>' : ''; ?>
            <label>Telefono: <input type="tel" name="datos[telefono]" required placeholder="Tu telefono"></label>
            <?= isset($errores['telefono']) ? '<p class="error">' . $errores['telefono'] . '</p><br>' : ''; ?>
        </div>
    </fieldset>

    <fieldset>
        <legend>Datos Usuario</legend>

        <label>Usuario: <input type="text" name="usu" value="" required></label>
        <p class="error"><?= isset($errores['usu']) ? $errores['usu'] : "" ?></p>
        <div class="row">
            <label>Contraseña: <input type="password" name="pass" value="" required></label>
            <p class="error"><?= isset($errores['pass']) ? $errores['pass'] : "" ?></p>
            <label>Repita la contraseña: <input type="password" name="passre" value="" required></label>
        </div>
    </fieldset>
    <input type="submit" value="Registrarse" name="ok">
</form>

<?php
$contenido = ob_get_clean() ?>

<?php include 'base.php' ?>