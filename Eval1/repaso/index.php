<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Repaso</title>
</head>

<body>
    <?php
    if (isset($_POST['ok'])) {
        include 'usuario.inc';
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telefono = $_POST['telefono'];
        $edad = isset($_POST['edad']) ? $_POST['edad'] : false;
        $direccion_tipo = $_POST['direccion_tipo'];
        $direccion_nombre = $_POST['direccion_nombre'];
        $direccion_num = $_POST['direccion_num'];
        $aficiones = [];
        isset($_POST['Correr']) ? $aficiones[] = $_POST['Correr'] : '';
        isset($_POST['Bailar']) ? $aficiones[] = $_POST['Bailar'] : '';
        isset($_POST['Astronomia']) ? $aficiones[] = $_POST['Astronomia'] : '';
        isset($_POST['Musica']) ? $aficiones[] = $_POST['Musica'] : '';
        isset($_POST['Programar']) ? $aficiones[] = $_POST['Programar'] : '';
        isset($_POST['Fiesta']) ? $aficiones[] = $_POST['Fiesta'] : '';
        try {
            $usuario = new Usuario($nombre, $apellido, $email, $password, $telefono, $edad, $direccion_tipo, $direccion_nombre, $direccion_num, $aficiones);
        } catch (UsuarioException $ex) {
            $errores = $ex->getErrores();
        }
    }
    ?>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <legend>Introduce tus datos para registrarte</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>">
            <?= isset($errores['nombre']) ? '<span class="error">' . $errores['nombre'] . '</span>' : '' ?>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido"
                value="<?= isset($_POST['apellido']) ? $_POST['apellido'] : '' ?>">
            <?= isset($errores['apellido']) ? '<span class="error">' . $errores['apellido'] . '</span>' : '' ?>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
            <?= isset($errores['email']) ? '<span class="error">' . $errores['email'] . '</span>' : '' ?>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password"
                value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
            <?= isset($errores['password']) ? '<span class="error">' . $errores['password'] . '</span>' : '' ?>
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" id="telefono"
                value="<?= isset($_POST['telefono']) ? $_POST['telefono'] : '' ?>">
            <?= isset($errores['telefono']) ? '<span class="error">' . $errores['telefono'] . '</span>' : '' ?>
            <label for="edad">Edad:</label>
            <input type="radio" name="edad" id="mas18" value="true"
                <?= (isset($_POST['edad']) && $_POST['edad'] == 'true') ? 'checked' : '' ?>>Mayor de 18</input>
            <input type="radio" name="edad" id="menos18" value="false"
                <?= (isset($_POST['edad']) && $_POST['edad'] == 'false') ? 'checked' : '' ?>>Menor de 18</input>
            <?= isset($errores['edad']) ? '<span class="error">' . $errores['edad'] . '</span>' : '' ?>
            <label for="direccion_tipo">Tipo de calle:</label>
            <select name="direccion_tipo" id="direccion_tipo">
                <?= isset($_POST['direccion_tipo']) ? '<option vlue="' . $_POST['direccion_tipo'] . '">' . $_POST['direccion_tipo'] . '</option>' : '' ?>
                <option value="Calle">Calle</option>
                <option value="Avenida">Avenida</option>
                <option value="Rotonda">Rotonda</option>
            </select>
            <?= isset($errores['direccion_tipo']) ? '<span class="error">' . $errores['direccion_tipo'] . '</span>' : '' ?>
            <label for="direccion_nombre">Nombre de la Calle:</label>
            <input type="text" name="direccion_nombre" id="direccion_nombre"
                value="<?= isset($_POST['direccion_nombre']) ? $_POST['direccion_nombre'] : '' ?>">
            <?= isset($errores['direccion_nombre']) ? '<span class="error">' . $errores['direccion_nombre'] . '</span>' : '' ?>
            <label for="direccion_num">Número de la casa:</label>
            <input type="number" name="direccion_num" id="direccion_num"
                value="<?= isset($_POST['direccion_num']) ? $_POST['direccion_num'] : '' ?>">
            <?= isset($errores['direccion_num']) ? '<span class="error">' . $errores['direccion_num'] . '</span>' : '' ?>
            <label for="aficion">Aficiones:</label>
            <input type="checkbox" name="Correr" id="Correr" value="Correr"
                <?= isset($_POST['Correr']) ?  'checked' : '' ?>>Correr</input>
            <input type="checkbox" name="Bailar" id="Bailar" value="Bailar"
                <?= isset($_POST['Bailar']) ?  'checked' : ''; ?>>Bailar</input>
            <input type="checkbox" name="Astronomia" id="Astonomia" value="Astonomia"
                <?= isset($_POST['Astronomia']) ?  'checked' : ''; ?>>Astonomia</input>
            <input type="checkbox" name="Musica" id="Musica" value="Musica
             <?= isset($_POST['Musica']) ? 'checked' : ''; ?>">Musica</input>
            <input type="checkbox" name="Programar" id="Programar" value="Programar"
                <?= isset($_POST['Programar']) ?  'checked' : ''; ?>>Programar</input>
            <input type="checkbox" name="Fiesta" id="Fiesta" value="Fiesta"
                <?= isset($_POST['Fiesta']) ?  'checked' : ''; ?>>Fiesta</input>
            <?= isset($errores['aficiones']) ? '<span class="error">' . $errores['aficiones'] . '</span>' : '' ?>
            <br>
            <input type="submit" name="ok" value="Enviar">
        </fieldset>
    </form>
</body>

</html>