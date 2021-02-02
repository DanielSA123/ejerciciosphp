<?php ob_start();
?>
<h1>Registrarse</h1>
<form action="" method="post">
    <!-- TODO: Agregar campos: Nombre,Apellidos,Calle,Ciudad,Provincia,CP,Email,Telefono  -->
    <fieldset>
        <legend>Datos personales</legend>
        <div class="row">
            <label>Nombre: <input type="text" name="datos[nombre]" required placeholder="Tu nombre"></label>
            <label>Apellidos: <input type="text" name="datos[apellidos]" required placeholder="Tus apellidos"></label>
        </div>
    </fieldset>
    <fieldset>
        <legend>Direccion</legend>
        <div class="row">
            <label>Calle: <input type="text" name="datos[calle]" required placeholder="calle,nº,piso"></label>
            <label>Ciudad: <input type="text" name="datos[ciudad]" required placeholder="Ciudad"></label>
        </div>
        <div class="row">
            <label>Provincia: <input type="text" name="datos[provincia]" required placeholder="Provincia"></label>
            <label>CP: <input type="text" name="datos[cp]" required placeholder="####"></label>
        </div>
    </fieldset>
    <fieldset>
        <legend>Datos de contacto</legend>
        <div class="row">
            <label>Email: <input type="text" name="datos[email]" required placeholder="Tu email"></label>
            <label>Telefono: <input type="tel" name="datos[telefono]" required placeholder="Tu telefono"></label>
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